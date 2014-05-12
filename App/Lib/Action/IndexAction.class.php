<?php
class IndexAction extends PublicAction {
    public function index(){
        $this->assign('title',C('title'));
        $this->assign('seo',C('seo'));
        $this->assign('description',C('description'));
	    $this->display();
    }
}