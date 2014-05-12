<?php
class PageAction extends PublicAction{
    protected $table = 'Page';
    public function index(){
        $id = I('id',0,'intval');
        if($id==0) $this->redirect('/');
        $res = M($this->table)->where('catid='.$id)->find();
        if(!$res) $this->redirect('/');
        $this->seo($res);
        //栏目信息
        $cate = M('category')->where('id='.$res['catid'])->find();
        $this->assign('catid',$res['catid']);
        //详细内容
        $info = M($this->table)->where('id='.$id)->find($id);
        $this->assign('info',$info);

        if($cate['dir']){
            $this->display('Category:page_'.$cate['dir']);
        }else{
            $this->display('Category:page');
        }

    }

    protected function seo($info){
        $title = !empty($info['seotitle']) ? $info['seotitle'] : $info['title'].'-'.C('title');
        $key = !empty($info['seokey']) ? $info['seokey'] : C('key');
        $des = !empty($info['seodes']) ? $info['seodes'] : C('description');

        $this->assign('title',$title);
        $this->assign('key',$key);
        $this->assign('description',$des);
    }
}


?>