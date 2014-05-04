<?php
class NewsModel extends Model{
    protected $_validate = array(
        array('title','require','标题必须'),
        array('catid','checkCatid','请选择栏目',0,'function'),
        array('content','require','内容必须'),
    );

    protected $_auto=array(
        array('inputtime','time',1,'function'),
        array('updatetime','time',3,'function'),
    );
}


?>