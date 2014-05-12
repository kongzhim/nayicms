<?php

class MessageAction extends CommonAction{
	protected $table='Message';
	public function index(){
        Cookie::set('_currentUrl_', __SELF__);
        import('@.Tool.ORG.Page');
        $count = M($this->table)->where(1)->count();
        $Page = new Page($count,15);
        $show = $Page->show();
        $list = M($this->table)->where(1)->order('inputtime DESC')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('page',$show);
        $this->assign('list',$list);
        $this->display();
	}

	public function delete(){
        $id = I('id',0,'intval');
        if($id <= 0){
            $this->error('Id is wrong');
        }
        if(M($this->table)->where('id='.$id)->delete()){
            $this->assign('jumpUrl',Cookie::get('_currentUrl_'));
            $this->success('删除成功');
        } else {
            $this->error('删除失败');
        }
	}

	public function alldel(){
        if(!IS_AJAX){
            return false;
        }
        $ids = I('ids');
        $res = M($this->table)->where('id in('.$ids.')')->delete();
        if($res){
            echo '成功';
        } else {
            echo '失败';
        }
	}

	public function read(){
		$id = I('id',0,'intval');
		if($id<=0){
			$this->error('Id is wrong');
		}
		M($this->table)->where('id='.$id)->setField('status',1);
		$this->assign('info',M($this->table)->where('id='.$id)->find())->display();
	}

	public function answer(){
		$id = I('id',0,'intval');
		if($id<=0){
			$this->error('Id is wrong');
		}
		M($this->table)->where('id='.$id)->setField('answer',$_POST['answer']) ? $this->success('成功',U('index')) : $this->error('错误');
	}

    public function isshow(){
        if(!IS_AJAX){
            return false;
        } else {
            $is = $_POST['isshow'];
            $id = intval($_POST['id']);
            if($id<=0){
                return false;
            }
            M($this->table)->where('id='.$id)->setField('isshow',$is) ? $this->ajaxReturn('1') : $this->ajaxReturn('0');
        }
    }
}