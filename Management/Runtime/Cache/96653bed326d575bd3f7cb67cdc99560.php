<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>网站管理后台</title>
<link href="../Public/css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
<table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff">
  <tr>
    <td width="238" height="55" align="center" valign="middle"><img src="../Public/images/logo.jpg" width="126" height="19"></td>
    <td width="1128" height="55" align="right" valign="middle" style="padding-right:10px;font-size:12px;font-weight:bold">
          &nbsp;&nbsp;&nbsp;&nbsp;欢迎您： <span style="font-size:14px;font-weight:bold;color:#f4701b">
            <?php echo session('admin');?>
            </span> 
            
          &nbsp;[<a href="<?php echo U('Public/password','','');?>" target="main"  class="one">修改密码</a>]
          &nbsp;[<a href="__ROOT__/" target="_blank"  class="one">前台首页</a>]
          &nbsp;[<a href="<?php echo U('Public/main','','');?>" target="main"  class="one">后台起始页</a>]
          &nbsp;[<a href="<?php echo U('Cache/index','','');?>" target="main"  style="color:red;">清除缓存</a>]
          &nbsp;[<a href="<?php echo U('Public/loginout','','');?>" target="_parent" style="color:red;">退出系统</a>]
     </td>
  </tr>
  <tr>
    <td height="54" colspan="2" valign="middle" style="background:#f5f5f5; border-bottom:1px solid #c8c7cc; border-top:1px solid #c8c7cc; padding-left:250px;">
    	<div class="mukuaia">
        </div>
    </td>
  </tr>
  
</table>

</body>
</html>