<?php
/**
 * Created by PhpStorm.
 * User: Gaby
 * Date: 2017-04-12
 * Time: 10:03
 * 供应商首页控制器
 */
namespace Sup\Controller;
use Sup\Controller\SupController;
    class LoginController extends SupController
    {

    /**
     *供应商微信端--登录控制器
     *
     */

    public function index()
    {
        if (IS_POST)
        {//从微信授权里得到unionid进行判断是否已注册
            $post = I('post.');
            if($post['type'] ==1)
            {
                //供应商
                $where = 'unionid = 1 and pt_role = 2 and role=0';
            }elseif ($post['type'] ==2)
            {
                //业务员
                $where = 'unionid = 2 and pt_role = 2 and role=2';
            }else{
                //其他角色
                $where = 'unionid = 3 and pt_role = 2 and role=2';
            }

            if(!$where)
            {
                $this->error('无查询条件');
            }

            $info = M('user')->where($where)->find();

            if($info)
            {
                $this->success('登录成功',U('index/index'));
            }else{
                $this->error('登录失败',U('login/index'));
            }
            exit();
        }



        $this->display("Login/index");
    }


        /*以下暂未启用*/




    /**
     * 后台登录页
     *
     */
    public function indexs()
    {
        /*if (session('is_login_check_code') == md5(session('rand').session('adm_uid')))
        {
            $this->redirect('Index/index');exit();
        }*/

         //-------生成唯一随机串防CSRF攻击
        $state  = md5(uniqid(rand(), TRUE));
        $_SESSION["wx_state"]    =   $state; //存到SESSION
        $callback  =  'http://www.900ku.com/supplier.php/login/code/user_type/1';
        //redirect('https://open.weixin.qq.com/connect/qrconnect?appid=wxbdc5610cc59c1631&redirect_uri=https%3A%2F%2Fpassport.yhd.com%2Fwechat%2Fcallback.do&response_type=code&scope=snsapi_login&state=3d6be0a4035d839573b04816624a415e#wechat_redirect');
        redirect('https://open.weixin.qq.com/connect/qrconnect?appid='.C('WEB_APP_ID').'&redirect_uri='.$callback.'&response_type=code&scope=snsapi_login&state='.$state.'#wechat_redirect');
    }


public function code()
{
    /*if($_GET['state']!=$_SESSION["wx_state"])
    {
      exit("5001");
    }*/

    $url='https://api.weixin.qq.com/sns/oauth2/access_token?appid='.C('WEB_APP_ID').'&secret='.C('WEB_APP_SECRET').'&code='.$_GET['code'].'&grant_type=authorization_code&user_type=1';

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_URL, $url);
    $json =  curl_exec($ch);
    curl_close($ch);

    $arr=json_decode($json,1);

    //得到 access_token 与 openid

/*
Array
(
    [access_token] => HIgfj0t1b5C6XhTQcslQgRFBozMLEZgtFPBUeCSln8w58nwW7BkVQhdLCXHvyyAvV230Vd8kstrvQ_xVxJFVU_t_a8_Qmv4XPQU5jI5uGBU
    [expires_in] => 7200i
    [refresh_token] => Um7wQSXEsWLxyiL1PPhSxSXzoBvsd2nucM5TvcJ3GdziNXHYeNLxzr2alBjNOhW_-lYDBmEvv7Tsnv-FzJT4ahBriVAz0oKDFtx3tL4xzLQ
    [openid] => osBF1wES7gMrbhYRl7zDR_VR1ReQ
    [scope] => snsapi_login
    [unionid] => ow5Snw4Hm-ELXpPwyXI1JoxCFX8c
)
*/
    $url='https://api.weixin.qq.com/sns/userinfo?access_token='.$arr['access_token'].'&openid='.$arr['openid'].'&lang=zh_CN';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_URL, $url);
    $json =  curl_exec($ch);
    curl_close($ch);
    $wechatUserInfo=json_decode($json,1);
    //得到 用户资料
    //p_die($wechatUserInfo);
/*
Array
(
    [openid] => osBF1wES7gMrbhYRl7zDR_VR1ReQ
    [nickname] =>  北冥の鱼 
    [sex] => 1
    [language] => zh_CN
    [city] => 海淀
    [province] => 北京
    [country] => 中国
    [headimgurl] => http://wx.qlogo.cn/mmopen/XXIe63Ko7247X1Nn3gCp4hdJrmFuNZZbk9Pp0uAqR58Epicq4ibg86PLkMEk7l5bRkptLr9XQfibyicbTD7CXnEwjSJ2r97I6KBl/0
    [privilege] => Array
        (
        )

    [unionid] => ow5Snw4Hm-ELXpPwyXI1JoxCFX8c
)
*/
    //查询用户信息是否已经注册
    $where['openid'] = $wechatUserInfo['openid'];
    $where['pt_role'] = $_GET['user_type'];
    $userInfo = M('user')->where($where)->find();

    if(!$userInfo)
    {//用户不存在则注册
  
        /**
         * 获取授权后的用户资料 $access_token $openid
         * @return array {openid,nickname,sex,province,city,country,headimgurl,privilege,[unionid]}
         * 注意：unionid字段 只有在用户将公众号绑定到微信开放平台账号后，才会出现。建议调用前用isset()检测一下
         */

        $randStr = str_shuffle('abcdefghijklmnopqrstuvwxyz1234567890');
        $saveName = time().substr($randStr,0,4).'.png';
        $headimg = put_file_from_url_content($wechatUserInfo['headimgurl'],$saveName,'./Uploads/supplier/headimg/');

        //将获取到的用户信息写入数据库
        $username = preg_replace('~\xEE[\x80-\xBF][\x80-\xBF]|\xEF[\x81-\x83][\x80-\xBF]~', '', $wechatUserInfo['nickname']);
        //从供应商前台处注册进来的平台角色为供应商，展厅角色为系统管理员
        $data= array(
            'username'       =>$username,
            'headimg'        =>$headimg,
            'pt_role'        =>$_GET['user_type'],
            'belong'         =>0,
            'role'           =>0,
            'add_time'       =>time(),
            'openid'         =>$wechatUserInfo['openid'],
            'unionid'        =>$wechatUserInfo['unionid']
        );
        //$sql = M('User')->fetchSql(true)->add($data);
        //echo $sql;
        $int = M('user')->add($data);
        if($int){
            $this->doLogin($wechatUserInfo['openid']);
        }else{
            die('授权失败！');
        }
    }else{
        $this->doLogin($userInfo['openid']);
    }

}

   /**
     * 通过openid进行登录
     *
     * */
    public function doLogin($openid)
    {
        $where['openid'] = $openid;
        $where['pt_role'] = $_GET['user_type'];
        $userInfo = M('user')->where($where)->find();

        //判断用户是否被禁用
        if(!$userInfo || $userInfo['status']==1)
        {
             $this->error('您暂无权限登录该系统！',U('Login/index'));
        }

        $data['last_time'] = time();
        $data['last_ip'] = ip2long(getClientIP());

        M('user')->where($where)->save($data);
        
        //设置加密验证串
        $rand = random(6,1);
        session('rand',$rand);
        $key = md5($rand.$userInfo['aid']);
        session('is_login_check_code',$key);
        session('sup_uid',$userInfo['uid']);
        session('sup_username',$userInfo['username']);
        session('sup_headimg',$userInfo['headimg']);
        session('belong',$userInfo['belong']);

        //查询是否有已经创建展厅了，如果没有则跳转到创建展厅页面，如果已创建则跳转到展厅列表页面
        $int = M('exhibition_hall')->where('uid = '.$userInfo['uid'])->select();

        if($int){
            $this->redirect('index/index');
        }else{
            $this->redirect('store/index');
        }
    }

    /**
     * 退出登录
     *
     */
    public function quit()
    {
        session('is_login_check_code',null);
        session('rand',null);
        session('sup_uid',null);
        session('sup_username',null);
        session('sup_headimg',null);
        session(null);
        session_destroy();
        $this->success('退出成功',U('Login/index'));
    }




/*以下方法暂未使用*/









    /**
     * 登录
     *
     */

    //user表模拟登陆
    public function login()
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
/*    public function quit()
    {
        $uid = I('get.uid');
        $suid = session('sup_uid');
        if($uid == $suid) {
            session('sup_uid',null);
            session(null);
            session_destroy();
            $this->success('退出成功',U('Login/Supplier_login'));
        }
    }*/



}
?>