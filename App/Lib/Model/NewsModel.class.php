<?php
class NewsModel extends Model{
    protected $table = 'News';
    public function prev($catid,$id){
        $res = M($this->table)->where('catid='.$catid.' and id < '.$id)->find();
        if(!$res){
            return '无';
        } else {
            return '<a href='.newsurl($res['id']).'>'.$res['title'].'</a>';
        }
    }
    
    public function next($catid,$id){
        $res = M($this->table)->where('catid='.$catid.' and id > '.$id)->find();
        if(!$res){
            return '无';
        } else {
            return '<a href='.newsurl($res['id']).'>'.$res['title'].'</a>';
        }
    }
    public function lists($catid,$num,$moreinfo,$order){
        if($moreinfo){
            $field= true;
        }else{
            $field=array("id","catid","thumb","title","inputtime");
        }
        $one = M('Category')->where('id='.$catid)->find();
        if($one['child']){
            $where='catid in('.$one['arrchild'].')';
        } else {
            $where = 'catid = '.$catid;
        }
        $res = M('News')->where($where)->field($field)->order($order)->page(!empty($_GET["p"])?$_GET["p"]:1,$num)->select();
        return $res;
    }
}


?>