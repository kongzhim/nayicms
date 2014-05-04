<?php
class ExpandAction extends CommonAction{
    protected $table = 'Expand';
    public function index(){
        $list = M($this->table)->select();
        $this->assign('list',$list)->display();
    }

    public function add(){
        if(!IS_POST){
            $this->display();
        } else {
            $name = I('name');
            if(empty($name)){
                $this->error('标识名不能为空');
            }
            $str = M($this->table)->where('name="'.$name.'"')->getField('name');
            if($str){
                $this->error('标识名重复');
            }
            M($this->table)->create();
            M($this->table)->add() ? $this->success('添加成功',U('index')) : $this->error('添加失败');
        }
    }

    public function edit(){
        if(!IS_POST){
            $id = I('id',0,'intval');
            if($id <= 0){
                $this->error('非法参数');
            }
            $this->assign('info',M($this->table)->where('id='.$id)->find())->display();
        } else {
            M($this->table)->create();
            M($this->table)->save() ? $this->success('编辑成功',U('index')) : $this->error('编辑失败');
        }
    }

    public function delete(){
        $id = I('id',0,'intval');
        if($id <= 0){
            $this->error('非法参数');
        }
        M($this->table)->where('id='.$id)->delete() ?  $this->success('删除成功',U('index')) : $this->error('删除失败');
    }

}


?>