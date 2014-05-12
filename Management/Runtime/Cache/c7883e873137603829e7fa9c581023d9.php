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
    <form action='<?php echo U("add");?>' method='post'>
    <table class='table'>
      <tr>
        <th width="13%" align='right'>名称：</th>
        <td width="87%"><input type='text' name='title' class='input'></td>
      </tr>
      <tr>
        <th align='right'>URL:</th>
        <td>
            <input type='text' name='url' class='input'>
        </td>
      </tr>
      <tr>
        <th align='right'>缩略图：</th>
        <td>
	        <input id="url" type="text" name='thumb' class='input'>
	        <input id="image" type="button" value="选择图片">
        </td>
      </tr>
      <tr>
        <th></th>
        <td align='left'><input type='submit' class='sub-btn' value='提交'></td>
      </tr>
    </table>
    </form>
    <script type="text/javascript">
        imageUp('image','url');
    </script>
    </div>
</div>
</body>
</html>