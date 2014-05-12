<?php
$config = require './config.ini.php';

$array = array(

    /* 模板相关配置 */
    'TMPL_PARSE_STRING' => array(
        '__STATIC__' => __ROOT__ . '/Public/static',
        '__IMG__'    => __ROOT__ . '/Public/'.APP_NAME.'/images',
        '__CSS__'    => __ROOT__ . '/Public/'.APP_NAME.'/css',
        '__JS__'     => __ROOT__ . '/Public/'.APP_NAME.'/js',
        '__UPLOADS__' => __ROOT__ . '/Uploads',
    ),
    'TAGLIB_LOAD' 	=> true,
    'APP_AUTOLOAD_PATH'=>'@.TagLib',
    'TAGLIB_PRE_LOAD' => 'cms' ,
    'TAGLIB_BUILD_IN' => 'Cx,Cms' ,

    'URL_ROUTER_ON'   => true, //开启路由
    'URL_ROUTE_RULES' => array( //定义路由规则
        'news/:id\d'               => 'News/index',
        'cate/:id\d'           => 'Category/index',
        'page/:id\d'               => 'Page/index',
        'goods/:id\d'               => 'Goods/index',
    ),
);
return array_merge($config,$array);
?>