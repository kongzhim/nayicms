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
    <form action='<?php echo U("listorder");?>' method='post'>
    <table class='table table-bordered'>
        <tr>
            <th width="3%" scope="col">排序</th>
            <th width="4%" scope="col">id</th>
            <th width="23%" scope="col">标题</th>
            <th width="20%" scope="col">URL</th>
            <th width="35%" scope="col">预览</th>
            <th width="15%" scope="col">操作</th>
        </tr>
        <?php if(is_array($list)): foreach($list as $key=>$v): ?><tr>
            <td><input type="text" name='list[<?php echo ($v["id"]); ?>]' style='width:25px;text-align:center;' value='<?php echo ($v["listorder"]); ?>'></td>
            <td><?php echo ($v["id"]); ?></td>
            <td><?php echo ($v["title"]); ?></td>
            <td><?php echo ($v["url"]); ?></td>
            <td><img src='<?php echo ($v["thumb"]); ?>' width=200 height=80></td>
            <td align='center'>
                <a href='<?php echo U("edit","id=".$v["id"]);?>' class='btn btn-primary'>编辑</a>
                <a href='javascript:;' onclick="del('<?php echo U('delete','id='.$v['id']);?>')" class='btn btn-primary'>删除</a>
            </td>
        </tr><?php endforeach; endif; ?>
        <tr>
            <td colspan='7' align='left'>
                <input type="submit" class='btn-info' value='排序'>
            </td>
        </tr>
        <tr><td colspan="7" class='page' align='right'><?php echo ($page); ?></td></tr>
    </table>
    </form>
    </div>
</div>
</body>
</html>