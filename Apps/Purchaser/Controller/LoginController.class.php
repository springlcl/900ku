<?php
/**
 * 采购商模块下的登陆控制器
 */
namespace Purchaser\Controller;
use Purchaser\Controller\PurController;

class LoginController extends PurController
{
	//模拟登陆
	public function index()
	{
		$this->display('Login/Pur_login');	
	}

	//模拟登陆判定
	public function judge()
	{
		//接收uid
		$uid=$_POST['uid'];
		//uid存入session中
		session('Pur_uid',$uid);
        $userid=M('user')->field('uid')->where('uid='.$uid.' and status=1 and pt_role=2')->find();
            if($userid){
                $this->error('您的账号被禁用',U('login/index'));
                exit;
            }
		//实例化认证表
		$db=M('cg_auth');
		//查询是否有此id且未禁用并不是审核未通过,或者user表中有此业务员，有则进入采购商后台主页,没有则注册
		$cgs=$db->alias('a')
                ->join('bd_user as u on a.uid=u.uid')
                ->field('a.uid')->where('a.uid='.$uid.' and a.status!=1 and u.status=0')->find();
        $ywy=M('user')->field('uid')->where('uid='.$uid.' and pt_role=2')->find();
		if($cgs || $ywy){
            $now=time();
            $login_time=M('user')->where('uid='.$uid)->save(array('login_time'=>$now));
            if($login_time){
                $this->success('登陆成功',U('Index/Pur_iteming'));    
            }
			
		}else{
            
            $loguid=$db->field('uid')->where('uid='.$uid)->find();
            if($loguid){
                $this->error('请修改您的信息',U('login/reg_show'));
            }else{
                $this->error('请注册您的信息',U('login/reg_show'));
            }                
            

			
		}

	}

	//采购商认证
	public function reg_show()
	{
		$this->display('Login/Pur_reg');
	}

	//认证提交
	public function reg()
	{
	if(IS_POST){
	$uid=session('Pur_uid');
    $upload = new \Think\Upload();// 实例化上传类  
    $upload->maxSize   =     3145728 ;// 设置附件上传大小  
    $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型  
    $upload->rootPath  =     './Uploads/'; // 设置附件上传根目录  
    $upload->savePath  =     'Purchaser/'.$uid.'/license/'; // 设置附件上传（子）目录  
    // 上传文件   
    $info   =   $upload->upload();
    //营业执照路径
    $_POST['license']=$info['thumb']["savepath"].$info['thumb']["savename"];
    //实例化城市表
    $city=M('city');
    //地区转化为中文存储
    //判断地区是否有值
            if($_POST['area']){
                $_POST['area_code']=$_POST['area'];
                $a=$_POST['area'];
                $adata=$city->field('id,num,city')->where('num='.$a)->find();
                $_POST['area']=$adata['city'];
            }else{
            	$_POST['area_code']=$_POST['city'];
            }
            $p=$_POST['province'];
            $c=$_POST['city'];
            $pdata=$city->field('id,num,city')->where('num='.$p)->find();
            $cdata=$city->field('id,num,city')->where('num='.$c)->find();
            $_POST['province']=$pdata['city'];
            $_POST['city']=$cdata['city']; 
    //注册信息,进入采购商认证cg_auth表 
    $db=M('cg_auth');
    $data=$db->create();
    // var_dump($data);
    // exit;
    if($data){
        $nowtime=time();
        $setuid=$db->field('uid')->where('uid='.$uid)->find();
        if($setuid){
            $data['status']=0;
            // dump($data);
            // exit;
            $res=$db->where('uid='.$uid)->save($data);
            $login_time=M('user')->where('uid='.$uid)->save(array('login_time'=>$nowtime));
            if($res){
                $this->success('修改成功',U('Index/Pur_iteming'));
            }else{
                $this->error('修改失败',U('Login/reg_show'));
            }
        }else{
        $data['add_time']=$nowtime;
        $res=$db->add($data);
    //注册进入user表
        $ures=M('user')->add(array('uid'=>$uid,'pt_role'=>2,'login_time'=>$nowtime,'add_time'=>$nowtime));
            if($res){
                $this->success('注册成功',U('Index/Pur_iteming'));
            }else{
                $this->error('注册失败',U('Login/reg_show'));
            }
        }
    }else{
    	$this->display('Login/Pur_login');
    }
		}else{

		$this->display('Login/Pur_login');

		}
	}


}