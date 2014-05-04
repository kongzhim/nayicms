<?php
return array(
     /* 数据库设置 */
    'DB_TYPE'               => 'mysql',     // 数据库类型
    'DB_HOST'               => 'localhost', // 服务器地址
    'DB_NAME'               => 'cms2',          // 数据库名
    'DB_USER'               => 'root',      // 用户名
    'DB_PWD'                => '111',          // 密码
    'DB_PORT'               => '',        // 端口
    'DB_PREFIX'             => 'tp_',    // 数据库表前缀
    
    /* 模板相关配置 */
    'TMPL_PARSE_STRING'=>array(
        '__PUBLIC__'=>__ROOT__.'/'.APP_NAME.'/Tpl/Public',
        '__UPLOADS__'=>__ROOT__.'/Uploads',
        '__STATIC__' => __ROOT__.'/Public/static',
    ),
    

);
?>