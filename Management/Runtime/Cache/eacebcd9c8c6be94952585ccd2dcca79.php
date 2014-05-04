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
        <th width="13%" align='right'>栏目名称：</th>
        <td width="87%"><input type='text' name='catname' class='input'></td>
      </tr>
      <tr>
        <th align='right'>父栏目：</th>
        <td>
            <select name='pid' class='select'>
                <option value='0'>===顶级栏目===</option>
                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value='<?php echo ($vo["id"]); ?>' <?php echo selected($vo['id'],$info['pid']);?>>
                          <?php echo nbsp($vo['count']);?>└─<?php echo ($vo["catname"]); ?>
                    </option><?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
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
        <th align='right'>模板名称：</th>
        <td>
				        <input type="text" name='dir' class='input'>
            <font style='color:red;margin-left:10px;'>视需要添加，不需要勿填！</font>
        </td>
      </tr>
      <tr>
        <th align='right'>导航：</th>
        <td><input type='radio' name='ismenu' value='1'>是<input type='radio' name='ismenu' value='0'>否</td>
      </tr>
      <tr>
        <th align='right'>单页：</th>
        <td><input type='radio' name='ispage' value='1'>是<input type='radio' name='ispage' value='0'>否</td>
      </tr>
      <tr>
        <th align='right'>SEO(标题)：</th>
        <td><input type='text' name='seotitle' class='input'></td>
      </tr>
      <tr>
        <th align='right'>SEO(关键字)：</th>
        <td><input type='text' name='seokey' class='input'></td>
      </tr>
      <tr>
        <th align='right'>SEO(描述)：</th>
        <td><textarea name='seodes' class='seotext'></textarea></td>
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