<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title><?php echo ($title); ?></title>
</head>
<body>
<?php $field=array("id","catname","ismenu","ispage","child");$where = array("ismenu"=>1,"pid"=>0);$_CATE = M('Category')->where($where)->field($field)->order('listorder DESC')->limit("0,25")->select();foreach($_CATE as $k=>$data): echo ($data["catname"]); ?><br>
    <?php $field=array("id","catname","ismenu","ispage","child");$where = array("ismenu"=>1,"pid"=>$data['id']);$_CATE = M('Category')->where($where)->field($field)->order('listorder DESC')->limit("0,25")->select();foreach($_CATE as $k=>$v):?>---<?php echo ($v["catname"]); ?><br><?php endforeach; endforeach;?>

<?php $_LISTS = D('News')->lists(2,2,0,"listorder DESC,inputtime DESC");foreach($_LISTS as $k=>$data): echo ($list["title"]); ?><br><?php endforeach; ?>

<?php import("@.Tool.ORG.Page");$where = "catid=2";$count = M('News')->where($where)->count();$Page = new Page($count,2);echo $Page->show();?>

<?php $_BANNER = M('Banner')->limit(25)->order("listorder DESC,id DESC")->select();foreach($_BANNER as $k=>$banner): ?><img src='<?php echo ($banner["thumb"]); ?>' width=200 height=100><br><br><?php endforeach; ?>

<?php $_LINK = M('Link')->limit(25)->order("listorder DESC,id DESC")->select();foreach($_LINK as $k=>$link): echo ($link["title"]); ?><br><br><?php endforeach; ?>
</body>
</html>