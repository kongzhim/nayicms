<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>网站管理后台</title>
</head>

<frameset rows="113,*" cols="*" framespacing="0" frameborder="1" border="false" id="frame" scrolling="no">
  <frame name="top" scrolling="no" src="<?php echo U('Public/top','','');?>" noresize="noresize">
  <frameset framespacing="0" border="false" cols="220,*" frameborder="0" scrolling="yes">
    <frame name="left" scrolling="auto" marginwidth="0" marginheight="0" src="<?php echo U('Public/menu','','');?>" noresize="noresize">
    <frame name="main" scrolling="auto" src="<?php echo U('Public/main','','');?>">
  </frameset>
<noframes>
  <body leftmargin="2" topmargin="0" marginwidth="0" marginheight="0">
    <p>你的浏览器版本过低！！！本系统要求IE5及以上版本才能使用本系统。</p>
  </body>
</noframes>
</html>