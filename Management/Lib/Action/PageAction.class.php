<?php

class PageAction extends CommonAction{
    protected $table='Page';

    public function edit(){
        if(!IS_POST){
            $id = I('id',0,'intval');
            if($id <= 0){
                $this->error('id is wrong');
            }
            $info = M($this->table)->where('catid='.$id)->find();
            $this->assign('info',$info)->display();
        }else{
            M($this->table)->create();
            M($this->table)->save() ? $this->success('成功',U('Category/index')) : $this->error('失败');
        }
    }
}


?>