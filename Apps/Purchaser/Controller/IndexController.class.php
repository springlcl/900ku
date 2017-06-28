<?php
/**
 * 采购商模块下的公司项目控制器
 */
namespace Purchaser\Controller;
use Purchaser\Controller\PurController;

class IndexController extends PurController
{
	
	//采购商首页,公司项目后台页面，进行中项目
	public function Pur_iteming()
	{
		$uid=session('Pur_uid');
		$purwhere='p.uid='.$uid.' and p.status=0 ';
		$userwhere='p.status=0 ';
		$Item=new \Purchaser\Model\cg_projectModel();
		$result=$Item->Itemdata($purwhere,$userwhere);
		if($result['com']){
			session('com',$result['com']);
		}
		//创建项目中新增管理员信息
		$admin=M('user')->field('uid,username')->where('pt_role=2 and item!=0 and status=0')->select();
		$this->assign('admin',$admin);
		$this->assign('Iteming',$result['Itemingdata']);
		$this->assign('page',$result['page']);
		$this->assign('com',$result['com']);
		$this->display('Item/Pur_iteming');
	}

	//新建项目
	public function new_item()
	{
		if(IS_POST)
	{
	//添加时间
    $_POST['add_time']=time();
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
            $_POST['uid']=session('Pur_uid');
    //创建数据
            $db=M('cg_project');
    		$data=$db->create();
    		$res=$db->add($data);
    		if($res){
    			$this->success('创建项目成功',U('Index/Pur_iteming',array('pid'=>$res)));
    		}
		}
	}

	//ajax修改项目状态，1关闭
	public function close()
	{
		$pid=I('post.pid');
		$time=time();
		$res=M('cg_project')->where('Pid='.$pid)->save(array('status'=>1,'deat_time'=>$time));
		if($res){
			$data=TRUE;
		}else{
			$data=NULL;
		}
		echo json_encode($data);
	}

	//ajax修改项目状态，0开启
	public function open()
	{
		$pid=I('post.pid');
		$res=M('cg_project')->where('Pid='.$pid)->save(array('status'=>0));
		if($res){
			$data=TRUE;
		}else{
			$data=NULL;
		}
		echo json_encode($data);
	}

	//历史项目
	public function Pur_olditem()
	{
		$uid=session('Pur_uid');
		$purwhere='p.uid='.$uid.' and p.status=1';
		$userwhere='p.status=1';
		$Item=new \Purchaser\Model\cg_projectModel();
		$result=$Item->Itemdata($purwhere,$userwhere);
		if(!$result['com']){
			$result['com']=session('com');
		}
		//创建项目中新增管理员信息
		$admin=M('user')->field('uid,username')->where('pt_role=2 and item!=0 and status=0')->select();
		$this->assign('admin',$admin);
		$this->assign('Iteming',$result['Itemingdata']);
		$this->assign('page',$result['page']);
		$this->assign('com',$result['com']);
		$this->display('Item/Pur_olditem');
	}


	//项目筛选
	public function chooseing()
	{
	if($_POST['start']){
		$start=strtotime($_POST['start']);	
	}else{
		$start=0;
	}
	if($_POST['end']){
		$end=strtotime($_POST['end']);
	}else{
		$end=0;
	}

	if($start==0){
		$s=null;
	}else{
		$s=date('Y-m-d',$start);
	}
	if($end==0){
		$e=null;
	}else{
		$e=date('Y-m-d',$end);
	}

		$uid=session('Pur_uid');
	if($_POST['type']==0){
		$purwhere='p.uid='.$uid.' and ( p.add_time between '.$start.' and '.$end. ') and p.status=0';
		$userwhere='( p.add_time between '.$start.' and '.$end. ')and p.status=0';
	}else{
		$userwhere='( p.add_time between '.$start.' and '.$end. ')and p.status=1';
		$purwhere='p.uid='.$uid.' and ( p.add_time between '.$start.' and '.$end. ') and p.status=1';
	}
		
		$Item=new \Purchaser\Model\cg_projectModel();
		$result=$Item->Itemdata($purwhere,$userwhere);
		if(!$result['com']){
			$result['com']=session('com');
		}
		$this->assign('Iteming',$result['Itemingdata']);
		$this->assign('page',$result['page']);
		$this->assign('com',$result['com']);
		$this->assign(array('s'=>$s,'e'=>$e));
	if($_POST['type']==0){
		$this->display('Item/Pur_iteming');
	}else{
		$this->display('Item/Pur_olditem');
	}		
		
	} 


	//项目编辑数据
	public function find_edit()
	{
		$pid=I('post.pid');
		$data=M('cg_project')->alias('p')
		->field('p.Pid,p.uid,p.pro_name,p.manager,p.province,p.city,
			p.area,p.street,p.area_code,p.area_level,p.company,p.taxpayer_num,p.bank_name,
			p.bank_account,p.com_address,p.com_tel,p.add_time,p.deat_time,p.status')
		->where('Pid='.$pid)->find();
		if($data){
			echo json_encode($data);
		}
	}

	//项目编辑
	public function edit_item()
	{
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
    //创建数据
            $db=M('cg_project');
            $pid=$_POST['pid'];
    		$data=$db->create();
    		if($data){
    			$res=$db->where('pid='.$pid)->save($data);
    			if($res){
    				$this->success('编辑成功',U('Index/Pur_iteming'));
    			}else{
    				$this->error('编辑失败',U('Index/Pur_iteming'));
    			}
    		}else{
    			$this->error('数据创建失败',U('Index/Pur_iteming'));
    		}

	}



}