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
    <form action='<?php echo U("addRoleHandle");?>' method='post'>
    <table class='table table-bordered'>
        <th colspan='5'>节点列表</th>
        <tr>
            <th width='100'>节点id</th>
            <th>节点名称</th>
            <th>节点描述</th>
            <th width=100>开启状态</th>
            <th width=200>操作</th>
        </tr>
        <?php if(is_array($list)): foreach($list as $key=>$v): ?><tr>
            <td align='center'><input type='checkbox' name='ids[]' value='<?php echo ($v["id"]); ?>'/></td>
            <td><?php echo ($v["name"]); ?></td>
            <td><?php echo ($v["title"]); ?></td>
            <td align='center'><?php if($v["status"]): ?>开启<?php else: ?>关闭<?php endif; ?></td>
            <td align='center'>
                <a href="<?php echo U('addNode',array(pid=>$v['id'],level=>'2'));?>">添加节点</a>&nbsp;|&nbsp;更改&nbsp;|&nbsp;删除
            </td>
        </tr><?php endforeach; endif; ?>
    </table>
    </form>
    </div>
</div>
</body>
</html>