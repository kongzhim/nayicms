<?php
class MessageAction extends PublicAction{
    protected $table = 'Message';
    public function index(){
        if(!IS_POST){
            $title = '在线留言-'.C('title');
            $this->assign('title',$title);
            $this->display('Category:message');
        } else {
            if(C('verify')){
                $verify = I('verify');
                import('@.Tool.ORG.Verify');
                $verifys = new Verify();
                if(!$verifys->check($verify,1)){
                    $this->error('验证码输入错误！');
                }
            }
            $message = D($this->table);
            if(!$message->create()){
                $this->error($message->getError());
            }
            $message->add() ? $this->success('感谢您的留言，请候佳音。',U('index','','')) : $this->error('留言失败。');
        }

    }


    //验证码
    public function verify(){
        $arr = array(
            'fontsize'  =>  12,
            'length'    =>  4,
        );
        import('@.Tool.ORG.Verify');
        $verify = new Verify($arr);
        $verify->entry(1);
    }
}


?>