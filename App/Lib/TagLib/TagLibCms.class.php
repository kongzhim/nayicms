<?php

class TagLibCms extends TagLib {
    //标签定义
    protected $tags=array(
        'category'=>array('attr'=>'catid,order,num,return','close'=>1,'level'=>3),  //栏目标签
        'lists'=>array('attr'=>'catid,order,num,return,moreinfo','close'=>1,'level'=>3),       //文章列表
        'page'=>array('attr'=>'catid,num','close'=>0),                              //分页
        'link'=>array('attr'=>'num,return','close'=>1),                             //友链
        'banner'=>array('attr'=>'num,return','close'=>1),                           //banner
        'prev'=>array('attr'=>'catid,id','close'=>0),//上一页
        'next'=>array('attr'=>'catid,id','close'=>0) //下一页
    );
    
    public function _category($attr,$content){
        $tag=$this->parseXmlAttr($attr,'category');
        $num = $tag['num'] ? $tag['num'] : 25;                      //数目
        $catid = $tag['catid'];                                     //父栏目id
        $order = $tag['order'] ? $tag['order'] : 'listorder DESC';  //排序条件
        $return = $tag['return'] ? $tag['return'] : 'data';         //返回数据名称
        $str = '<?php ';
        $str .= '$field=array("id","catname","ismenu","ispage","child");';
        $str .= '$where = array("ismenu"=>1,"pid"=>'.$catid.');';
        $str .= '$_CATE = M(\'Category\')->where($where)->field($field)->order(\''.$order.'\')->limit("0,'.$num.'")->select();';
        $str .= 'foreach($_CATE as $k=>$'.$return.'):?>';
        $str .= $content;
        $str .= "<?php endforeach;?>";
        return $str;

    }
    public function _lists($attr,$content){
        $tag=$this->parseXmlAttr($attr,'lists');
        $num = $tag['num'] ? $tag['num'] : 25;
        $catid = $tag['catid'];
        $order = $tag['order'] ? $tag['order'] : 'listorder DESC,inputtime DESC';
        $return = $tag['return'] ? $tag['return'] : 'data';
        $moreinfo = $tag['moreinfo'] ? 1 : 0;

        $str = '<?php ';
        $str .= '$_LISTS = D(\'News\')->lists('.$catid.','.$num.','.$moreinfo.',"'.$order.'");';
        $str .= 'foreach($_LISTS as $k=>$'.$return.'): ?>';
        $str .= $content;
        $str .= '<?php endforeach; ?>';
        return $str;
    }

    public function _page($attr){
        $tag=$this->parseXmlAttr($attr,'page');
        $num = $tag['num'] ? $tag['num'] : 25;
        $catid = $tag['catid'];
        
        $str = '<?php ';
        $str .= 'import("@.Tool.ORG.Page");';
        $str .= '$where = "catid='.$catid.'";';
        $str .= '$count = M(\'News\')->where($where)->count();';
        $str .= '$Page = new Page($count,'.$num.');';
        $str .= 'echo $Page->show();?>';

        return $str;
        
    }
    public function _link($attr,$content){
        $tag = $this->parseXmlAttr($attr,'link');
        $num = $tag['num'] ? $tag['num'] : 25;
        $return = $tag['return'] ? $tag['return'] : 'link';

        $str = '<?php ';
        $str .= '$_LINK = M(\'Link\')->limit('.$num.')->order("listorder DESC,id DESC")->select();';
        $str .= 'foreach($_LINK as $k=>$'.$return.'): ?>';
        $str .= $content;
        $str .= '<?php endforeach; ?>';
        return $str;
    }
    public function _banner($attr,$content){
        $tag = $this->parseXmlAttr($attr,'banner');
        $num = $tag['num'] ? $tag['num'] : 25;
        $return = $tag['return'] ? $tag['return'] : 'banner';

        $str = '<?php ';
        $str .= '$_BANNER = M(\'Banner\')->limit('.$num.')->order("listorder DESC,id DESC")->select();';
        $str .= 'foreach($_BANNER as $k=>$'.$return.'): ?>';
        $str .= $content;
        $str .= '<?php endforeach; ?>';
        return $str;
    }
    public function _prev($attr){
        $tag = $this->parseXmlAttr($attr,'prev');
        $catid = $tag['catid'] ? $tag['catid'] : 0;
        $id = $tag['id'] ? $tag['id'] : 0;
        if(!$catid || !$id){
            return '';
        }
        $str = '<?php ';
        $str .= '$_PREV = D(\'News\')->prev('.$catid.','.$id.');';
        $str .= 'echo $_PREV;?>';
        return $str;
    }

    public function _next($attr){
        $tag = $this->parseXmlAttr($attr,'prev');
        $catid = $tag['catid'] ? $tag['catid'] : 0;
        $id = $tag['id'] ? $tag['id'] : 0;
        if(!$catid || !$id){
            return '';
        }
        $str = '<?php ';
        $str .= '$_NEXT = D(\'News\')->next('.$catid.','.$id.');';
        $str .= 'echo $_NEXT;?>';
        return $str;
    }
}