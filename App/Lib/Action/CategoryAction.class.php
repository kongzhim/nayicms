<?php
class CategoryAction extends PublicAction{
    protected $table = 'Category';
    public function category(){
        $catid = $_GET['id'] ? I('id',0,'intval') : 0;
        if($catid != 0){
            $cate = M($this->table)->find($catid);
            if(!$cate) $this->redirect('/');        
        } else {
            $cate = M($this->table)->find($catid);
        }
        $this->assign('catid',$catid);
        
        if($cate['child']){
            //标题，关键字赋值
            $this->seo($cate);

            if(!empty($cate['dir'])){
                $this->display('category_'.$cate['dir']);
            } else {
                $this->display('category');
            }
        } else {
            if(!empty($cate['dir'])){
                $this->display('list_'.$cate['dir']);
            } else {
                $this->display('list');
            }
        }
    }

    protected function seo($cate){
        $title = !empty($cate['seotitle']) ? $cate['seotitle'] : $cate['catname'].'-'.C('title');
        $key = !empty($cate['seokey']) ? $cate['seokey'] : C('key');
        $des = !empty($cate['seodes']) ? $cate['seodes'] : C('description');

        $this->assign('title',$title);
        $this->assign('key',$key);
        $this->assign('description',$des);
    }
}


?>