<?php
class LinkModel extends Model{
    protected $_validate = array(
        array('title','require','标题必须'),
        array('thumb','require','图片必须'),
    );
}


?>