<?php

//后台公共类

class PublicAction extends Action{
    public function index(){
        $this->redirect('Index/index');
    }
    public function top(){
        $this->checkuser();
        $this->display();
    }

    public function main(){
        $this->checkuser();
        $this->display();
    }

    public function menu(){
        $this->checkuser();
        $this->display();
    }
    //修改密码，RBAC需要修改
    public function password(){
        $this->checkuser();
        if(!IS_POST){
            $this->display();
        } else {
            $oldpass = I('password','','md5');
            $newpass = I('password1','','md5');
            $map = array(
                'username' => 'admin',
                'password' => $oldpass,
            );
            if(!$res = M('Admin')->where($map)->find()){
                $this->error('旧密码输入错误！');
            }
            $map['id'] = $res['id'];
            $map['password'] = $newpass;
            M('Admin')->save($map);
            $this->success('修改成功，下次登陆生效',U('password'));

        }
    }
    //登陆，RBAC需要修改
    public function login(){
        if(isset($_SESSION['admin'])){
            $this->redirect('Index/index');
        }
        if(!IS_POST){
            $this->display();
        } else {
            $verify = I('verify');
            import('@.Tool.ORG.Verify');
            $verifys = new Verify();
            if(!$verifys->check($verify,1)){
                $this->error('验证码输入错误！');
            }
            
            $data = array(
                'username' => I('username'),
                'password' => I('password','','md5')
            );
            $info = M('Admin')->where($data)->find();
            if(!$info){
                $this->error('用户名或密码错误');
            } else {
                session('admin',$info['username']);
                session('lasttime',$info['logintime']);
                session('lastip',$info['loginip']);
                session('nowtime',time());
                session('nowip',get_client_ip());
                $logininfo = array(
                    'logintime' => time(),
                    'loginip'   => get_client_ip()
                );
                M('Admin')->where($data)->save($logininfo);
                $this->success('登陆成功',U('Index/index'));
            }
        }
    }
    //退出
    public function loginout(){
        if(isset($_SESSION['admin'])){
            session(null);
            session('[destroy]');
            $this->success('退出成功！', U('login'));
        } else {
            $this->redirect('login');
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
    //验证登陆，RBAC需要修改
    protected function checkuser(){
        if(!isset($_SESSION['admin'])){
            $this->redirect('index');
        }
    }
}
?>