<?php

class NewsAction extends CommonAction{
    protected $table = 'News';
    public function index(){
        $catid = I('catid',0,'intval');
        $this->assign('catid',$catid);

        if($catid){
            $where = 'catid='.$catid;
        } else {
            $where = 1;
        }
        Cookie::set('_currentUrl_', __SELF__);
        import('@.Tool.ORG.Page');
        $count = M($this->table)->where($where)->count();
        $Page = new Page($count,15);
        $show = $Page->show();
        $new = M($this->table)->where($where)->field('id,catid,title,listorder,inputtime,updatetime,thumb')->order('listorder DESC,inputtime DESC')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('page',$show);
        $this->assign('list',$new);
        $this->newsCat();
        $this->display();
    }

    public function add(){
        if(!IS_POST){
            $this->newsCat();
            $this->display();
        } else {
            $news = D($this->table);
            if(!$news->create()){
                $this->error($news->getError());
            } else {
                $news->add() ? $this->success('成功',U('index')) : $this->error('错误');
            }
        }
    }

    public function edit(){
        if(!IS_POST){
            $id = I('id',0,'intval');
            if($id <= 0){
                $this->error('id is wrong');
            }
            $info = M($this->table)->where('id='.$id)->find();
            $this->newsCat();
            $this->assign('info',$info);
            $this->display();
        }else{
            $news = D($this->table);
            //附件处理
            if(!$_POST['yulan'] && $_POST['yulan'] != $_POST['thumb']){
                $path = '..'.$_POST['yulan'];
                if(file_exists($path)){
                    unlink($path);
                }
            }
            if(!$news->create()){
                $this->error($news->getError());
            }
            if($news->save()){
                $this->assign('jumpUrl',Cookie::get('_currentUrl_'));
                $this->success('成功');
            } else {
                $this->error('失败');
            }
        }
    }

    public function delete(){
        $id = I('id',0,'intval');
        if($id <= 0){
            $this->error('Id is wrong');
        }
        $thumb = M($this->table)->where('id='.$id)->getfield('thumb');
        if($thumb){
            $path = '..'.$thumb;
            if(file_exists($path)){
                unlink($path);
            }
        }
        if(M($this->table)->where('id='.$id)->delete()){
            $this->assign('jumpUrl',Cookie::get('_currentUrl_'));
            $this->success('删除成功');
        } else {
            $this->error('删除失败');
        }
    }
    //排序
    public function order(){
        if(!IS_POST){
            $this->error('非法请求');
        }
        $arr = I('list');
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

    //批量删除
    public function alldel(){
        if(!IS_AJAX){
            return false;
        }
        $ids = I('ids');
        //删除附件
        $thumb = M($this->table)->where('id in('.$ids.')')->field('thumb')->select();
        foreach($thumb as $v){
            $path = '..'.$v['thumb'];
            if(file_exists($path)){
                unlink($path);
            }
        }
        $res = M($this->table)->where('id in('.$ids.')')->delete();
        if($res){
            echo '成功';
        } else {
            echo '失败';
        }
    }

    //新闻栏目列表
    protected function newsCat(){
        $cat = M('Category')->where('ispage=0')->field('id,pid,catname')->select();
        $arr = getTree($cat);
        $this->assign('category',$arr);
    }

}

?>