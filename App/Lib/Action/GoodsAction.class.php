<?php
class GoodsAction extends PublicAction{
    protected $table = 'News';
    public function index(){
        $id = I('id',0,'intval');
        if($id==0) $this->redirect('/');
        $res = M($this->table)->where('id='.$id)->find();
        if(!$res) $this->redirect('/');
        $this->seo($res);
        //栏目信息
        $cate = M('category')->where('id='.$res['catid'])->find();
        $this->assign('pid',$cate['pid']);
        $this->assign('child',M('Category')->where('id='.$cate['pid'])->getField('child'));
        $this->assign('catid',$res['catid']);
        //详细内容
        $this->assign('info',$res);

        if($cate['dir']){
            $this->display('Category:goods_'.$cate['dir']);
        }else{
            $this->display('Category:goods');
        }

    }

    protected function seo($info){
        $catname = categorys($info['catid']);
        $title = !empty($info['seotitle']) ? $info['seotitle'] : $info['title'].'-'.$catname.'-'.C('title');
        $key = !empty($info['seokey']) ? $info['seokey'] : C('key');
        $des = !empty($info['seodes']) ? $info['seodes'] : C('description');

        $this->assign('title',$title);
        $this->assign('key',$key);
        $this->assign('description',$des);
    }


}


?>