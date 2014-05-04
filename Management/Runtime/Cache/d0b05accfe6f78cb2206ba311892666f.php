<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>网站管理后台</title>
<link href="../Public/css/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src='../Public/js/jquery.min.js'></script>
</head>

<body>
<div class="serv_right" style='padding:20px;'>
    <div class="tableaa">
    <form action='<?php echo U("addNodeHandle");?>' method='post'>
    <input type='hidden' value='<?php echo ($level); ?>' name='level'>
    <input type='hidden' value='<?php echo ($pid); ?>' name='pid'>
    <table class='table table-bordered'>
        <th colspan='2'>添加<?php echo ($name); ?></th>
        <tr>
            <td align='right' width='100'><?php echo ($name); ?>名称</td>
            <td>
                <input type='text' name='name' class='input'/>
            </td>
        </tr>
        <tr>
            <td align='right'><?php echo ($name); ?>描述</td>
            <td>
                <input type='text' name='title' class='input'/>
            </td>
        </tr>
        <tr>
            <td align='right'>是否开启</td>
            <td>
                <input type='radio' name='status' value='1' checked='checked'/>是
                <input type='radio' name='status' value='0'>否
            </td>
        </tr>
        <tr>
            <td align='right'>排序</td>
            <td>
                <input type='text' name='sort' value='0' class='input'/>
            </td>
        </tr>
        <tr>
            <td align='right'></td>
            <td>
                <input type='submit' value='提交' class='btn btn-primary' />
            </td>
        </tr>
    </table>
    </form>
    </div>
</div>
</body>
</html>