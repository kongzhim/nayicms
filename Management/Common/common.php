<?php
//测试用的打印函数
function p($arr){
    echo '<pre>';
    return print_r($arr);
}
//时间格式化
function myDate($time,$str = 'Y-m-d H:i:s'){
    return date($str,$time);
}
//递归节点
function nodeMerge($node,$pid=0){
    $arr = array();
    foreach($node as $v){
        if($v['pid'] == $pid){
            $v['child'] = nodeMerge($node,$v['id']);
            $arr[] = $v;
        }
    }
    return $arr;
}

//checked选项判断
function checked($n,$m){
    if($n==$m){
        return 'checked="checked"';
    }
}
//selected选项判断
function selected($n,$m){
    if($n==$m){
        return 'selected="selected"';
    }
}
/**
 * 字符串截取，支持中文和其他编码
 * @static
 * @access public
 * @param string $str 需要转换的字符串
 * @param string $start 开始位置
 * @param string $length 截取长度
 * @param string $charset 编码格式
 * @param string $suffix 截断显示字符
 * @return string
 */
function msubstr($str, $length, $start=0, $charset="utf-8", $suffix=true) {
    if(function_exists("mb_substr"))
        $slice = mb_substr($str, $start, $length, $charset);
    elseif(function_exists('iconv_substr')) {
        $slice = iconv_substr($str,$start,$length,$charset);
        if(false === $slice) {
            $slice = '';
        }
    }else{
        $re['utf-8']   = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|[\xe0-\xef][\x80-\xbf]{2}|[\xf0-\xff][\x80-\xbf]{3}/";
        $re['gb2312'] = "/[\x01-\x7f]|[\xb0-\xf7][\xa0-\xfe]/";
        $re['gbk']    = "/[\x01-\x7f]|[\x81-\xfe][\x40-\xfe]/";
        $re['big5']   = "/[\x01-\x7f]|[\x81-\xfe]([\x40-\x7e]|\xa1-\xfe])/";
        preg_match_all($re[$charset], $str, $match);
        $slice = join("",array_slice($match[0], $start, $length));
    }
    return $suffix ? $slice.'...' : $slice;
}
//递归栏目
function getTree(&$data,$pid = 0,$count = 0) {
    $number = 1;
    if(!isset($data['odl'])){
        $data=array('new'=>array(),'odl'=>$data);
    }
    foreach ($data['odl'] as $k => $v){
        if($v['pid']==$pid){
            $v['count'] = $count;
            $data['new'][]=$v;
            unset($data['odl'][$k]);
            getTree($data,$v['id'],$count+1);
            $number++;
        } 
    }
    return $data['new'] ;
}

//添加空格
function nbsp($num = 0){
    $nbsp = '&nbsp;&nbsp;&nbsp;&nbsp;';
    for($i=0;$i<$num;$i++){
        $nbsp .= $nbsp;
    }
    return $nbsp;
}
//根据文章catid获取栏目名称
function getCatname($id){
    if(!intval($id)) return false;
    return M('Category')->where('id='.$id)->getField('catname');
}
function checkCatid($id){
    if($id<=0) return false;
}
?>