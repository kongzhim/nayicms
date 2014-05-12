<?php
//测试用的打印函数
function p($arr){
    echo '<pre>';
    return print_r($arr);
}
//获取栏目field值
function categorys($catid,$field='catname'){
    $catid = intval($catid);
    return M('Category')->where('id='.$catid)->getField($field);
}
//url格式化
function caturl($catid,$ispage='0'){
    if($ispage){
        return U('page/'.$catid,'','');
    } else {
        return U('cate/'.$catid,'','');
    }
}
function newsurl($id){
    return U('news/'.$id,'','');
}
function goodsurl($id){
    return U('goods/'.$id,'','');
}

//时间格式化
function myDate($time,$str = 'Y-m-d H:i:s'){
    return date($str,$time);
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
//当前位置
function catpos($catid,$tag=' > '){
    $parent = M('Category')->where('id='.$catid)->getField('arrparent');
    $arr = explode(',',$parent);
    if(count($arr)==1 && $arr[0] == 0){
        $ispage = M('Category')->where('id='.$catid)->getField('ispage');
        return $tag . '<a href="'.caturl($catid,$ispage).'">'.categorys($catid,'catname').'</a>';
    }
    $arrs = pids($catid);
    array_pop($arrs);
    $newarr = array_reverse($arrs);
    $str = '';
    for($i=0;$i<count($newarr);$i++){
        $ispage = categorys($newarr[$i],'ispage');
        $str .= $tag . '<a href='.caturl($newarr[$i],$ispage).'>'.categorys($newarr[$i],'catname').'</a>';
    }
    $str .= $tag . categorys($catid,'catname');
    return $str;
}
//递归找父栏目id
function pids($id){
    static $arr = array();
    $pid = M('Category')->where('id='.$id)->getField('pid');
    $arr[] = $pid;
    if($pid){
        pids($pid);
    }
    return $arr;
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
    return $suffix ? $slice : $slice;
}

//递归栏目
function catTree(&$data,$pid = 0,$count = 0) {
    $number = 1;
    if(!isset($data['odl'])){
        $data=array('new'=>array(),'odl'=>$data);
    }
    foreach ($data['odl'] as $k => $v){
        if($v['pid']==$pid){
            $v['count'] = $count;
            $data['new'][]=$v;
            unset($data['odl'][$k]);
            catTree($data,$v['id'],$count+1);
            $number++;
        } 
    }
    return $data['new'] ;
}

?>