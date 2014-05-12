<?php
class CacheAction extends CommonAction {
    public function index(){
        header("Content-type:text/html; charset=utf-8");
        import("@.Tool.ORG.Dir");
        if (is_dir(HOME_PATH."Runtime")){
            Dir::delDir(HOME_PATH."Runtime");
        }
        $str = '<div style="color:red;">';
        $str .= "<strong>1.</strong>".HOME_PATH."Runtime/Cache&nbsp;清除完成！<br />";
        $str .= "<strong>2.</strong>".HOME_PATH."Runtime/Data&nbsp;清除完成！<br />";
        $str .= "<strong>3.</strong>".HOME_PATH."Runtime/Logs&nbsp;清除完成！<br />";
        $str .= "<strong>4.</strong>".HOME_PATH."Runtime/Temp&nbsp;清除完成！<br />";
        $str .= "<strong>5.</strong>".HOME_PATH."Runtime/~runtime.php&nbsp;清除完成！<br /><br />";
        if (is_dir(APP_PATH."Runtime")){
            Dir::delDir(APP_PATH."Runtime");
        }
        $str .= "<strong>6.</strong>".APP_PATH."Runtime/Cache&nbsp;清除完成！<br />";
        $str .= "<strong>7.</strong>".APP_PATH."Runtime/Data&nbsp;清除完成！<br />";
        $str .= "<strong>8.</strong>".APP_PATH."Runtime/Logs&nbsp;清除完成！<br />";
        $str .= "<strong>9.</strong>".APP_PATH."Runtime/Temp&nbsp;清除完成！<br />";
        $str .= "<strong>10.</strong>".APP_PATH."Runtime/~runtime.php&nbsp;清除完成！<br />";
        $str .= '</div>';

        echo $str;
    }
}


?>