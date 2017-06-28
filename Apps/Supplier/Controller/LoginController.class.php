<?php
/**
 * Created by PhpStorm.
 * User: Gaby
 * Date: 2017-04-12
 * Time: 10:03
 * 供应商首页控制器
 */
namespace Supplier\Controller;
use Supplier\Controller\SupController;
    class LoginController extends SupController
    {
    /* 供应商--登录控制器 */

    /**
     * 登录
     *
     */

    //user表模拟登陆
    public function index()
    {
        //判断是否是表单提交
        if(IS_POST){
        //实例化user表,查询id是否已经注册
            $db=M('user');
            $uid=I('post.uid');
        //直接将uid存进session    
            session('sup_uid',$uid);
            //直接判断若是业务员是否被禁用
            $ywid=$db->field('uid')
            ->where('uid='.$uid.' and item!=0 and pt_role=1 and status=1')
            ->find();
            if($ywid){
                $this->error('您的权限被禁用',U('Login/index'));
            }
            //判断是否是供应商或者未禁用业务员
            $result=$db->field('uid')->where('uid='.$uid.' and status=0 and pt_role=1')->find();
            if($result){
                //修改登录时间
                $now=time();
                $tres=$db->where('uid='.$uid)->save(array('login_time'=>$now));
                //进入供应商首页
                //A('Index')->index();
                $this->success('登陆成功',U('Index/index'));
                exit();
            }else{
        //没有此用户进入注册用户信息页面
                $this->display('Login/supplier_user_reg');
        //查询经营类目及经营模式
            // $cate=M('main_category')->field('mcid,mc_name,sort_order')->select();
            // $model=M('model')->field('mid,model_name,sort_order')->select();
            // $this->assign('cate',$cate);
            // $this->assign('model',$model);
            // $this->display('Register/Supplier_register');
           
                exit();
            } 


        }
        $this->display("Login/Supplier_login");
    }


    //用户模拟注册
    public function user_reg(){
        //判断是否是表单提交
        if(IS_POST){
            $db=M('user');
            //记录添加时间
            $_POST['add_time']=time();
            //记录首次登陆时间
            $_POST['login_time']=time();
            //判定当前为供应商后台用户
            $_POST['pt_role']=1;
            //处理头像
            $thumb = ($_FILES['thumb']['error']!=4) ? $_FILES['thumb'] : NULL;
            if(!empty($thumb))
            {
                $_POST['headimg'] = uploadimg($thumb);
            }
            $_POST['uid']=session('sup_uid');
            $res=$db->create();
            //判断数据是否创建成功
            if($res){
            //判断创建成功，添加至数据库
            $addResult=$db->add();
            if($addResult){

            //查询经营类目及经营模式
                    $cate=M('main_category')->field('mcid,mc_name,sort_order')->select();
                    $model=M('model')->field('mid,model_name,sort_order')->select();
                    $this->assign('cate',$cate);
                    $this->assign('model',$model);
                    $this->display('Register/Supplier_register');
                    exit();
            }else{
                    $this->error('添加失败',U('Login/supplier_user_reg'));
                    exit(); 
            }
            //数据创建失败
            }else{
                $this->error('数据创建失败',U('Login/supplier_user_reg'));
                exit(); 
            }
        }
        $this->display("Login/Supplier_login");
    }



    //微信模拟登陆
    public function out()
    {
        if(IS_POST)
        {
        //模拟得到用户openid
        $openid=I('post.wx_openid');
        //实例化用户表，查询是否有该用户
        $result=M('supplier')->field('uid,wx_openid')->where('wx_openid='.$openid)->find();
        //判断有此用户则直接将uid存进session
        if($result){
            session('sup_uid',$result['uid']);
            //进入供应商首页
            //A('Index')->index();
            $this->success('登陆成功',U('Index/index'));
            exit();
        //没有此用户则存入数据库，并将uid存进session
        }else{
            //创建数据
            $_POST['add_time']=time();
            $newUser=M('supplier')->create();
            //判断创建成功，添加至数据库
            if($newUser){
                $addResult=M('supplier')->add();
                //判断添加成功，将uid存进session，并跳转页面
                if($addResult){
                    $newResult=M('supplier')->field('uid,wx_openid')->where('wx_openid='.$openid)->find();
                    session('sup_uid',$newResult['uid']);
                    //查询经营类目及经营模式
                    $cate=M('main_category')->field('mcid,mc_name,sort_order')->select();
                    $model=M('model')->field('mid,model_name,sort_order')->select();
                    $this->assign('cate',$cate);
                    $this->assign('model',$model);
                    $this->display('Register/Supplier_register');
                    exit();
                //添加失败返回信息
                }else{
                    $this->error('添加失败',U('Login/Supplier_login'));
                    exit();
                }
            //创建失败返回信息
            }else{
            $this->error('数据创建失败',U('Login/Supplier_login'));
            exit();
            }
        }
    }
       $this->display('Login/Supplier_login');
    }

    /**
     * 退出登录
     *
     */
    public function quit()
    {
        $uid = I('get.uid');
        $suid = session('sup_uid');
        if($uid == $suid) {
            session('sup_uid',null);
            session(null);
            session_destroy();
            $this->success('退出成功',U('Login/Supplier_login'));
        }
    }



}
?>