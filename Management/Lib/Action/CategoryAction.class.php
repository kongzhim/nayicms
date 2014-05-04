<?php
class CategoryAction extends CommonAction{
    protected $table = 'Category';
    public function index(){
        $this->cateList();
        $this->display();
    }

    public function add(){
        if(!IS_POST){
            $this->cateList();
            $this->display();
        } else {
            $pid = I('pid',0,'intval');
            M($this->table)->create();
            if($id = M($this->table)->add()){
                //一个栏目添加成功后需要更新的数据
                //1.栏目是顶级栏目时；更新本身id组合
                //2.栏目是子级栏目时；
                    //父级栏目更新数据：child=1，arrchild = $id,$childid；新添栏目id，拼接已有childid
                    //子栏目更新数据：parent=1; arrparent=$pid,$arrpid 新添栏目父id，拼接已有parentid
                if($pid>0){
                    $this->addId($id,$pid);
                } else {
                    $data = array(
                        'arrparent' => 0,
                        'arrchild' => $id
                    );
                    M($this->table)->where('id='.$id)->save($data);
                }
                $pagedata = array(
                    'catid' => $id,
                    'title' => I('catname')
                );
                M('Page')->add($pagedata);
                $this->success('添加成功',U('index'));
            } else {
                $this->error('添加失败');
            }
        }
    }

    public function edit(){
        if(!IS_POST){
            $id = I('id',0,'intval');
            if($id==0){
                $this->error('非法参数');
            }
            $info = M($this->table)->where('id='.$id)->find();
            $this->cateList();
            $this->assign('info',$info)->display();
        } else {
            $id = I('id');
            $pid = I('pid');
            //验证父栏目合法性
            $this->pidOk($pid);
            //删除没用的缩略图
            if($_POST['yulan'] != $_POST['thumb']){
                $this->removeFile($_POST['yulan']);
            }
            M($this->table)->create();
            if(M($this->table)->save()){
                $this->success('修改成功',U('index'));
                $this->updateId();
            } else {
                $this->error('修改失败');
            }

        }
    }
    public function delete(){
        $id = I('id',0,'intval');
        if($id<=0){
            $this->error('非法参数');
        }
        if(M($this->table)->where('id='.$id)->getfield('child')){
            $this->error('此栏目下有子栏目，请先删除子栏目');
        }
        if(M('News')->where('catid='.$id)->find()){
            $this->error('此栏目下有文章，请先删除文章');
        }
        $thumb = M($this->table)->where('id='.$id)->getfield('thumb');
        $this->removeFile($thumb);
        M('Page')->where('catid='.$id)->delete();
        M($this->table)->where('id='.$id)->delete() ? $this->success('删除成功') : $this->error('删除失败');

    }

    public function listorder(){
    	if(!IS_POST){
    		$this->error('非法请求');
    	}
    	$arr = I('list','');
    	$num = 0;
    	$data = array();
    	foreach($arr as $k=>$v){
    		$data[$num]['id'] = $k;
    		$data[$num]['listorder'] = $v;
    		$num++;
    	}
    	foreach($data as $n){
	    	if(M($this->table)->where($n)->find()){
    			continue;
    		}else{
    			M($this->table)->save($n);
    		}
    	}
    	$this->redirect('index');
    }

    //栏目赋值
    protected function cateList(){
        $list = M($this->table)->order('listorder DESC,id')->select();
        $list = getTree($list);
        $this->assign('list',$list);
    }

    //添加栏目时附属属性id组合
    protected function addId($id,$pid){
        if(empty($id) || empty($pid)){
            return false;
        }
        //更改所有父级子栏目的id组合
        $pids = $this->pids($id);
        for($i=0;$i<count($pids);$i++){
            if($pids[$i]!=0){
                $childids = M($this->table)->where('id='.$pids[$i])->getField('arrchild');
                $data = array(
                    'child' => 1,
                    'arrchild' => $childids.','.$id
                );
                M($this->table)->where('id='.$pids[$i])->save($data);
            }
        }
        //更改自身的父栏目id组合
        $parentids = M($this->table)->where('id='.$pid)->getField('arrparent');
        $sundata = array(
            'parent' => 1,
            'arrparent' => $parentids.','.$pid,
            'arrchild' => $id
        );
        M($this->table)->where('id='.$id)->save($sundata);
    }
    //编辑栏目时附属属性id组合 $id,$pid,$oldpid
    /*思路一：1.子栏目转成顶级栏目
                2.顶级栏目转成子栏目
                3.父栏目带着子栏目转到其他栏目
      思路二：
                a.当做新栏目重新定义id组合，即调用saveId()；
                b.找出旧pid的顶级栏目，循环更新所有栏目id组合
      思路三：  
                phpcms是目录全循环重新赋值
    */
    protected function updateId(){
        $category = M($this->table)->field('id,pid')->select();
        foreach($category as $v){
            $parent = $v['pid']==0 ? 0 : 1;
            $pids = array_unique($this->pids($v['id'],'a'.$v['id']));
            //p($pids);
            $attrparent = implode(',',$pids);

            $childids = array_unique($this->childs($v['id'],'b'.$v['id']));
            $child = !empty($childids) ? 1 : 0;
            $attrchild = !empty($childids) ? implode(',',$childids).','.$v['id'] : $v['id'];
            $data = array(
                'id' => $v['id'],
                'parent' => $parent,
                'arrparent' => $attrparent,
                'child' => $child,
                'arrchild' => $attrchild
            );
            M($this->table)->save($data);
            //p($data);
        }
    }
    //父栏目合法性
    protected function pidOk($pid){
        if($pid<=0) return false;
        $childid = M($this->table)->where('id='.$id)->getField('arrchild');
        $arrid = explode(',',$childid);
        if(in_array($pid,$arrid)){
            $this->error('父栏目不能为本身和子栏目！');
        }
    }
    //递归找父栏目id
    protected function pids($id,$array){
        static $arr = array();
        $pid = M($this->table)->where('id='.$id)->getField('pid');
        $arr[$array][] = $pid;
        if($pid){
            $this->pids($pid,$array);
        }
        return $arr[$array];
    }
    //递归找子栏目id
    protected function childs($id,$array){
        if($id<=0) return false;
        static $arr = array();
        $childid = M($this->table)->where('pid='.$id)->field('id')->select();
        if($childid){
            foreach($childid as $v){
                $this->childs($v['id'],$array);
                $arr[$array][] = $v['id'];
            }
        }

        return $arr[$array];
    }
}


?>