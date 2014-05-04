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
            <th width="4%" scope="col"><input type='checkbox' class='allchecked' /></th>
            <th width="4%" scope="col">id</th>
            <th width="25%" scope="col">标题</th>
            <th width="15%" scope="col">姓名</th>
            <th width="15%" scope="col">电话</th>
            <th width="15%" scope="col">时间</th>
            <th width="12%" scope="col">操作</th>
        </tr>
        <?php if(is_array($list)): foreach($list as $key=>$v): ?><tr>
            <td><input type="checkbox" name='ids[]' value='<?php echo ($v["id"]); ?>'></td>
            <td><?php echo ($v["id"]); ?></td>
            <td><?php echo ($v["title"]); if($v['status'] == 0): ?><font style='color:red;font-size:12px;margin-left:10px;'>新</font><?php endif; ?></td>
            <td><?php echo ($v["name"]); ?></td>
            <td><?php echo ($v["phone"]); ?></td>
            <td><?php echo (mydate($v["inputtime"])); ?></td>
            <td align='center'>
                <a href='<?php echo U("read","id=".$v["id"]);?>' class='btn btn-primary'>阅读</a>
                <a href='javascript:;' onclick="del('<?php echo U('delete','id='.$v['id']);?>')" class='btn btn-primary'>删除</a>
            </td>
        </tr><?php endforeach; endif; ?>
        <tr>
            <td colspan='7' align='left'>
                <span class='btn-info checked'>反选</span>
                <input type="button" class='btn-info' onclick="alldel('<?php echo U('alldel','','');?>')" value='删除'>
            </td>
        </tr>
        <tr><td colspan="7" class='page' align='right'><?php echo ($page); ?></td></tr>
    </table>
    </form>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.checked').click(function(){
               $('input[name="ids[]"]').each(function(){
                    if($(this).attr('checked')){
                        $(this).attr('checked',false);
                        $('.allchecked').attr('checked',false);
                    }else{
                        $(this).attr('checked',true);
                    }
               }) 
            });
            $('.allchecked').click(function(){
                if($(this).attr('checked')){
                    $('input[name="ids[]"]').each(function(){
                        $(this).attr('checked',true);
                    })
                }else{
                    $('input[name="ids[]"]').each(function(){
                        $(this).attr('checked',false);
                    })
                }

            });
            $('input[name="ids[]"]').click(function(){
                if($(this).attr('checked')){
                    return true;
                }else{
                    $('.allchecked').attr('checked',false);
                }
            });
        });
        function alldel(ur){
            var url = ur;
            var ids = new Array();
            var n = 0;
            $('input[name="ids[]"]').each(function(){
                if($(this).attr('checked')){
                    ids[n] = $(this).val();
                    n++;
                }
            });
            if(ids==''){
                alert('请选择文章');
            } else {    
                if(confirm('确定删除所选？')){
                    $.ajax({
                        type: 'post',
                        url: ur,
                        data: "ids="+ids,
                        success: function(msg){
                            if(msg=='成功'){
                                alert('成功');
                                window.location.reload();
                            } else {
                                alert('失败');
                            }
                        }
                    });       
                }
            }
        }
    </script>
    </div>
</div>
</body>
</html>