<?php
return array(
	/* 数据库配置 */
    'DB_TYPE'   => 'mysql', // 数据库类型
    'DB_HOST'   => '127.0.0.1', // 服务器地址
    'DB_NAME'   => 'cms2', // 数据库名
    'DB_USER'   => 'root', // 用户名
    'DB_PWD'    => '111',  // 密码
    'DB_PORT'   => '3306', // 端口
    'DB_PREFIX' => 'tp_', // 数据库表前缀


    'URL_CASE_INSENSITIVE' =>true, //url忽略大小写

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
?>