<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>网站管理后台</title>
<link href="../Public/css/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src='../Public/js/jquery.min.js'></script>
<style type="text/css">
html{overflow-x:hidden;}
.xiala dt{cursor:pointer;}
</style>
<script type="text/javascript">
$(function(){
    $('dt').siblings().hide();
    $('dt').eq(0).siblings().show();
    $('dt').click(function(){
        $(this).siblings().toggle('slow');
    })
});
</script>
<base target='main' />
</head>

<body>
<div class="xiala">
    <!-- <dl>
        <dt><a>权限管理</a></dt>
        <dd><a href="<?php echo U('Rbac/Role','','');?>">角色列表</a></dd>
        <dd><a href="<?php echo U('Rbac/addRole','','');?>">添加角色</a></dd>
        <dd><a href="<?php echo U('Rbac/Node','','');?>">节点列表</a></dd>
        <dd><a href="<?php echo U('Rbac/addNode','','');?>">添加节点</a></dd>
    </dl> -->
    <dl>
        <dt><a>系统配置</a></dt>
        <dd><a href="<?php echo U('Config/index','','');?>">基本配置</a></dd>
        <dd><a href="<?php echo U('Expand/index','','');?>">扩展配置</a></dd>
    </dl>
    <dl>
        <dt><a>栏目管理</a></dt>
        <dd><a href="<?php echo U('Category/index','','');?>">栏目列表</a></dd>
        <dd><a href="<?php echo U('Category/add','','');?>">添加栏目</a></dd>
    </dl>
    <dl>
        <dt><a>内容管理</a></dt>
        <dd><a href="<?php echo U('News/index','','');?>">内容列表</a></dd>
        <dd><a href="<?php echo U('News/add','','');?>">添加内容</a></dd>
    </dl>
    <dl>
        <dt><a>banner管理</a></dt>
        <dd><a href="<?php echo U('Banner/index','','');?>">banner列表</a></dd>
        <dd><a href="<?php echo U('Banner/add','','');?>">添加banner</a></dd>
    </dl>
    <dl>
        <dt><a>友情链接</a></dt>
        <dd><a href="<?php echo U('Link/index','','');?>">链接列表</a></dd>
        <dd><a href="<?php echo U('Link/add','','');?>">添加链接</a></dd>
    </dl>
    <dl>
        <dt><a>留言管理</a></dt>
        <dd><a href="<?php echo U('Message/index','','');?>">留言列表</a></dd>
    </dl>
</div>

</body>
</html>