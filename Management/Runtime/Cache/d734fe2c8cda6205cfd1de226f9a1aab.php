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
        <script type="text/javascript">
            $(function(){
                $('form').submit(function(){
                    var m = $.trim($("input[name='password1']").val());
                    var m1 = $.trim($("input[name='password2']").val());
                    if('' === $.trim($("input[name='password']").val())){
                        alert('旧密码不能为空');
                        return false;
                    }
                    if('' === m){
                        alert('密码不能为空');
                        return false;
                    }
                    if('' === m1){
                        alert('重复密码不能为空');
                        return false;
                    }
                    if(m != m1){
                        alert('新密码不一致');
                        return false;
                    }
                });
            });
        </script>
        <form action="<?php echo U('password');?>" method='post' />
        <table class='table table-bordered'>
            <tr bgcolor="f5f5f5">
                <td colspan="2"><b>密码修改</b></td>
            </tr>
            <tr>
                <td align='right'>旧密码</td>
                <td><input type='password' name='password' class='input'/></td>
            </tr>
            <tr>
                <td align='right' width=100>新密码</td>
                <td><input type='password' name='password1' class='input'/></td>
            </tr>
            <tr>
                <td align='right'>重复新密码</td>
                <td><input type='password' name='password2' class='input'/></td>
            </tr>
            <tr>
                <td align='right'></td>
                <td><input type='submit' class='btn btn-primary' value='提交'></td>
            </tr>
        </table>
        </form>
    </div>
</div>
</body>
</html>