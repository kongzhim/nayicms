<?php

//后台公共类

class PublicAction extends Action{
    public $title = '';
	public function _initialize(){
        $this->config();
    }
    public function _empty(){
    	$this->redirect('/');
    }
    //全局配置
    public function config(){
    	$config = M('Config')->where('id=1')->find();
    	$expand = M('Expand')->where(1)->select();
    	C($config);
    	foreach($expand as $v){
    		C($v['name'],$v['value']);
    	}
        
    }
}
?>