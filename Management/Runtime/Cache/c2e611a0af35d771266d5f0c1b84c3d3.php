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
    <a href="<?php echo U('index');?>"><h3 class='btn btn-primary' style='width:55px;margin-bottom:10px;'>配置列表</h3></a>
    <form action='<?php echo U("add");?>' method='post'>
    <table class='table'>
        <tr>
            <td width="17%"><div align="right">配置标识</div></td>
            <td width="83%"><input type='text' name='name' class='input'>只允许英文字母。</td>
        </tr>
        <tr>
            <td><div align="right">配置别名</div></td>
            <td><input type='text' name='cname' class='input'></td>
        </tr>
        <tr>
            <td><div align="right">配置值</div></td>
            <td><textarea name='value' class='textarea'></textarea></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><input type='submit' value='提交' class='ie-btn'></td>
        </tr>
    </table>
    </form>
    <script type="text/javascript">
        editor(1,'value');
        $('form').submit(function(){
            if(false == emp('input','name','配置标识')){
                return false;
            }
        });
    </script>
    </div>
</div>
</body>
</html>