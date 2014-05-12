<?php
class MessageModel extends Model{
    protected $_validate = array(
        array('title','require','标题必须'),
        array('name','require','姓名必须'),
        array('phone','require','电话必须'),
        array('content','require','内容必须'),
    );

    protected $_auto=array(
        array('inputtime','time',1,'function'),
        array('status',0,1),
        array('isshow',0,1),
    );
}


?>