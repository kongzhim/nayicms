<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>网站管理后台</title>
<link href="../Public/css/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src='../Public/js/jquery.min.js'></script>
<link rel="stylesheet" href="__STATIC__/kindeditor/themes/default/default.css" />
<script charset="utf-8" src="__STATIC__/kindeditor/kindeditor-min.js"></script>
<script charset="utf-8" src="__STATIC__/kindeditor/lang/zh_CN.js"></script>
<script charset="utf-8" src="../Public/js/cms.js"></script>
</head>

<body>
<div class="serv_right" style='padding:20px;'>
    <div class="tableaa">
    <form action='<?php echo U("index");?>' method='post'>
    <input type='hidden' name='id' value='1' />
    <table class='table'>
      <tr>
        <td width="16%" align='right'>网站名称：</td>
        <td width="84%"><input type='text' name='title' class='input' value='<?php echo ($info["title"]); ?>'></td>
      </tr>
      <tr>
        <td align='right'>关键词：</td>
        <td><input type='text' name='key' class='input' value='<?php echo ($info["key"]); ?>'></td>
      </tr>
      <tr>
        <td align='right'>描述：</td>
        <td><input type='text' name='description' class='input' value='<?php echo ($info["description"]); ?>'></td>
      </tr>
      <tr>
        <td align='right'>版权：</td>
        <td><textarea name='copy' class='textarea'><?php echo ($info["copy"]); ?></textarea></td>
      </tr>
      <tr>
        <td align='right'>验证码：</td>
        <td><input type='radio' name='verify' value='1' <?php echo checked(1,$info['verify']);?>>显示<input type='radio' name='verify' value='0' <?php echo checked(0,$info['verify']);?>>不显示</td>
      </tr>
      <tr>
        <td align='right'></td>
        <td><input type='submit' value='提交' class='btn btn-primary'/></td>
      </tr>
    </table>
    </form>
    <script type="text/javascript">
        editor('1','copy');
    </script>
    </div>
</div>
</body>
</html>