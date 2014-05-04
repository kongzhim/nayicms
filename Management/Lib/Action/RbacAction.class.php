<?php
class RbacAction extends CommonAction{
    //用户列表
    public function index(){
    
    }

    //角色列表
    public function role(){
        $this->assign('list',M('Role')->select())->display();
    }

    //节点列表
    public function node(){
        $node = M('Node')->field('id,name,title,pid')->order('sort DESC')->select();
        $node = nodeMerge($node);
        $this->assign('list',$node)->display();
    }

    //添加用户
    public function addUser(){
    
    }

    //添加角色
    public function addRole(){
        $this->display();
    }
    public function addRoleHandle(){
        if(!IS_POST){
            $this->redirect('addRole');
        }
        M('Role')->create();
        M('Role')->add() ? $this->success('添加成功',U('addRole')) : $this->error('添加失败');
    }

    //添加节点
    public function addNode(){
        $level = I('level',1,'intval');
        $pid = I('pid',0,'intval');

        $name = '';
        switch($level){
            case 1 :
                $name='应用';
                break;
            case 2 :
                $name = '控制器';
                break;
            case 3 :
                $name = '方法';
                break;
        }
        $this->assign('name',$name);
        $this->assign('pid',$pid);
        $this->assign('level',$level);
        $this->display();
    }
    public function addNodeHandle(){
        if(!IS_POST){
            $this->redirect('addNode');
        }
        M('Node')->create();
        M('Node')->add() ? $this->success('添加成功',U('addNode')) : $this->error('添加失败');
    }
    
}


?>