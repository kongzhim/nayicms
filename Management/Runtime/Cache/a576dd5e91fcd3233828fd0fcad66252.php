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

    <table class='table table-bordered'>
        <tr>
            <th width="20%">时间</th>
            <td width="80%"><?php echo (mydate($info["inputtime"])); ?></td>
        </tr>
        <tr>
            <th width="20%">标题</th>
            <td width="80%"><?php echo ($info["title"]); ?></td>
        </tr>
        <tr>
            <th>内容</th>
            <td><?php echo ($info["content"]); ?></td>
        </tr>
        <tr>
            <th colspan="2"></th>
        </tr>
        <tr>
            <th>姓名</th>
            <td><?php echo ($info["name"]); ?></td>
        </tr>
        <tr>
            <th>邮箱</th>
            <td><?php echo ($info["email"]); ?></td>
        </tr>
        <tr>
            <th>电话</th>
            <td><?php echo ($info["phone"]); ?></td>
        </tr>
    </table>

<!-- 	<div style='margin-top:30px;'>
		<form action="<?php echo U('answer');?>" method="post">
		<input type="hidden" name='id' value='<?php echo ($info["id"]); ?>'>
		<p style='margin-bottom:10px;'>
			<textarea name="answer" class='textarea'></textarea>
		</p>
		<p>
			<input type="submit" value="回复" class='btn btn-primary' />
		</p>
		</form>
	</div> -->
    </div>
</div>
</body>
</html>