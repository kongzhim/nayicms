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
        <?php $server = $_SERVER;?>
        <table width="100%" border="1" cellspacing="0" cellpadding="0"  bordercolor="#c8c7cc" background="#f5f5f5"style="border-collapse:collapse;">
            <tr bgcolor="f5f5f5">
            <td height="62" colspan="2" align="center">登陆信息</td>
            </tr>
            <tr>
            <td width="29%" height="35" align="center">本次登陆时间</td>
            <td width="71%" height="35" align="center"><?php echo myDate(session('nowtime'));?></td>
            </tr>
            <tr>
            <td width="29%" height="35" align="center">本次登陆ip</td>
            <td width="71%" height="35" align="center"><?php echo session('nowip');?></td>
            </tr>
            <tr>
            <td width="29%" height="35" align="center">上次登陆时间</td>
            <td width="71%" height="35" align="center"><?php echo myDate(session('lasttime'));?></td>
            </tr>
            <tr>
            <td width="29%" height="35" align="center">上次登陆ip</td>
            <td width="71%" height="35" align="center"><?php echo session('lastip');?></td>
            </tr>
        </table>
        <table width="100%" border="1" cellspacing="0" cellpadding="0"  bordercolor="#c8c7cc" background="#f5f5f5"style="border-collapse:collapse;">
            <tr bgcolor="f5f5f5">
            <td height="62" colspan="2" align="center">服务器环境信息</td>
            </tr>
            <tr>
            <td width="29%" height="35" align="center">显示站点物理路径</td>
            <td width="71%" height="35" align="center">http://<?php echo ($server["SERVER_NAME"]); ?></td>
            </tr>
            <tr>
            <td width="29%" height="35" align="center">服务器IP地址</td>
            <td width="71%" height="35" align="center"><?php echo ($server["SERVER_ADDR"]); ?></td>
            </tr>
            <tr>
            <td width="29%" height="35" align="center">显示执行SCRIPT的虚拟路径</td>
            <td width="71%" height="35" align="center"><?php echo ($server["SCRIPT_NAME"]); ?></td>
            </tr>
            <tr>
            <td width="29%" height="35" align="center">返回服务器的主机名，DNS别名，或IP地址</td>
            <td width="71%" height="35" align="center"><?php echo ($server["HTTP_HOST"]); ?></td>
            </tr>
            <tr>
            <td width="29%" height="35" align="center">返回服务器处理请求的端口</td>
            <td width="71%" height="35" align="center"><?php echo ($server["SERVER_PORT"]); ?></td>
            </tr>
            <tr>
            <td width="29%" height="35" align="center">协议的名称和版本</td>
            <td width="71%" height="35" align="center"><?php echo ($server["SERVER_PROTOCOL"]); ?></td>
            </tr>
            <tr>
            <td width="29%" height="35" align="center">服务器操作系统</td>
            <td width="71%" height="35" align="center"><?php echo ($server["SERVER_SOFTWARE"]); ?></td>
            </tr>
        </table>
    </div>
</div>
</body>
</html>