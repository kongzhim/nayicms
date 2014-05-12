<?php
$config = require '../config.ini.php';

$arr = array(
    
    /* 模板相关配置 */
    'TMPL_PARSE_STRING'=>array(
        '__PUBLIC__'=>__ROOT__.'/'.APP_NAME.'/Tpl/Public',
        '__UPLOADS__'=>__ROOT__.'/Uploads',
        '__STATIC__' => __ROOT__.'/Public/static',
    ),
    

);

return array_merge($config,$arr);
?>