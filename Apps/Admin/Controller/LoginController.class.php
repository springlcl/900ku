<?php
namespace Admin\Controller;
use Common\Controller\BaseController;

class LoginController extends BaseController
{
    /**
     * 后台登录页
     *
     */
    public function index()
    {
        if(IS_POST)
        {
            $check_code = I('post.login_check_code');

            $login_check_code = !empty($check_code) ? I('post.login_check_code') : '';

            if($login_check_code != $_SESSION['login_check_code'])
            {
                $this -> error('请不要频繁登录!',U('login/index'));
            }


            //实例化自定义用户表
            $db = M('Admin');
            $mArr = $db->create();//数据创建
            if($mArr) {//创建成功
                /*$code = I('post.code');//用户输入的验证码

                $verify = new \Think\Verify();
                if(!$verify->check($code,1)) //判断验证码
                {
                    $this->error('验证码错误');
                }*/
                //查询用户
                $ini['username'] = $mArr['username'];
                $userArr = $db->where($ini)->find();
                if($userArr) {
                    if(md5($mArr['password'])==$userArr['password']) //判断密码
                    {
                        session('UNAME',$userArr['username']);
                        session('UID',$userArr['uid']);
                        //设置加密验证串
                        $rand = random(6,1);
                        session('rand',$rand);
                        $key = md5($rand.$userArr['uid']);
                        session('is_login_check_code',$key);

                        $this->success('登录成功',U('Index/index'));
                    }else {
                        $this->error('密码错误');
                    }
                }else {
                    $this->error('用户名错误');
                }
            }else {
                $this->error('数据创建失败:'.$db->getError());
            }
            exit();
        }
        
        session('login_check_code',random(6,1));
        $this->display('Public/login');
    }

    /**
     * 退出登录
     *
     */
    public function quit()
    {
        $uid = I('get.uid');
        $suid = session('UID');
        if($uid == $suid) {
            session('is_login_check_code',null);
            session('UID',null);
            session('UNAME',null);
            session(null);
            session_destroy();
            $this->success('退出成功',U('Login/index'));
        }
    }
}