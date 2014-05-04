<?php
class ConfigAction extends CommonAction{
    public function index(){
        if(!IS_POST){
            $this->assign('info',M('Config')->where('id=1')->find())->display();
        } else {
            M('Config')->create();
            M('Config')->save() ? $this->success('成功',U('index')) : $this->error('失败');
        }
    }

}


?>