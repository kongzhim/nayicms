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
    <a href="<?php echo U('add');?>"><h3 class='btn btn-primary' style='width:55px;margin-bottom:10px;'>添加配置</h3></a>
    <table class='table'>
      <tr>
        <th width="7%">编号</th>
        <th width="24%">配置标识</th>
        <th width="51%">配置别名</th>
        <th width="18%">操作</th>
      </tr>
        <?php if(is_array($list)): foreach($list as $key=>$v): ?><tr>
            <td><?php echo ($v["id"]); ?></td>
            <td><?php echo ($v["name"]); ?></td>
            <td><?php echo ($v["cname"]); ?></td>
            <td><a href="<?php echo U('edit','id='.$v['id']);?>">更新内容</a>&nbsp;&nbsp;&nbsp;<a href="javascript:" onclick="del('<?php echo U('delete','id='.$v['id']);?>')">删除</a></td>
          </tr><?php endforeach; endif; ?>
    </table>
    </div>
</div>
</body>
</html>