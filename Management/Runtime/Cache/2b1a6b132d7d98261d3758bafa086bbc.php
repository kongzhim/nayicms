<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>纳一科技后台管理</title>
<link href="../Public/css/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src='../Public/js/jquery.min.js'></script>
<script type="text/javascript">
$(function(){
    $('form').submit(function(){
        if('' === $.trim($("input[name='username']").val())){
            alert('用户名不能为空');
            return false;
        }
        if('' === $.trim($("input[name='password']").val())){
            alert('密码不能为空');
            return false;
        }
        if('' === $.trim($("input[name='verify']").val())){
            alert('验证码不能为空');
            return false;
        }
    });
});
</script>
</head>

<body>
<form method="post" action="<?php echo U('login','','');?>">
<div class="login">
<h5><img src="../Public/images/top_bga.jpg" width="411" height="10" /> </h5>
<div class="login_nei">
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="35">用户名</td>
          </tr>
          <tr>
            <td height="38"><input type="text" class="texab" name='username'/></td>
          </tr>
          <tr>
            <td height="35">密  码</td>
          </tr>
          <tr>
            <td height="38"><input type="password" class="texab" name='password'/></td>
          </tr>
          <tr>
            <td height="35">验证码 </td>
          </tr>
          <tr>
            <td height="38" valign="middle"><input type="text" class="texab" name='verify'/></td>
          </tr>
          <tr>
          	<td><img src="<?php echo U('verify','','');?>/" onclick="this.src+=Math.random()" alt="图片看不清？点击重新得到验证码!" title="图片看不清？点击重新得到验证码!" style="cursor:pointer;" width='258' /></td>
          </tr>
        </table>

</div>
<div class="anniu">
	<div class="anniu_nei">
    	<input type="submit" value="登录" class="tijiao" /><input type="reset" value="重置"class="tijiao" />
    </div>
</div>
<h5><img src="../Public/images/top_bgb.jpg" width="411" height="10" /></h5>
</div>
</form>
</body>
</html>