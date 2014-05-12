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
            <th width='50'>排序</th>
            <th width=50>栏目id</th>
            <th>栏目名称</th>
            <th width=200>操作</th>
        </tr>
        <?php if(is_array($list)): foreach($list as $key=>$v): ?><tr>
					       <td align='center'><input type="text" name='list[<?php echo ($v["id"]); ?>]' style='width:30px;text-align:center;' value='<?php echo ($v["listorder"]); ?>'></td>
            <td align='center'><?php echo ($v["id"]); ?></td>
            <td><?php if(($v['count']) != "0"): echo (nbsp($v['count'])); ?>├─<?php endif; echo ($v["catname"]); ?></td>
            <td align='center'>
                <a href="<?php echo U('Page/edit','id='.$v['id']);?>" class='a-btn'>编辑</a> &nbsp;&nbsp;&nbsp;
                <a href="<?php echo U('edit','id='.$v['id']);?>" class='a-btn'>修改</a> &nbsp;&nbsp;&nbsp;
                <a href="javascript:" onclick="del('<?php echo U('delete','id='.$v['id']);?>')" class='a-btn'>删除</a>
            </td>
        </tr><?php endforeach; endif; ?>
        <tr><td colspan='4' align='left'><input type="submit" class='btn-info' value='排序'></td></tr>
    </table>
    </form>
    </div>
</div>
</body>
</html>