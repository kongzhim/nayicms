<?php

class CommonAction extends Action{
	public function _initialize(){
        import('@.Tool.ORG.Cookie');
        if(!isset($_SESSION['admin'])){
            $this->redirect('Public/login');
        }
    }

    public function removeFile($path){
        $thumb = '..'.$path;
        if(file_exists($thumb)){
            unlink($thumb);
        }  
    }
}