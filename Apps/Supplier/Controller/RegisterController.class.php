<?php
namespace Supplier\Controller;
	class RegisterController extends SupController
	{
	/* 供应商--注册控制器 */

     /**
     * 注册
     *
     */


     	//注册页面
     	public function index()
     	{
     		//查询经营类目及经营模式
            $cate=M('main_category')->field('mcid,mc_name,sort_order')->select();
            $model=M('model')->field('mid,model_name,sort_order')->select();
            $this->assign('cate',$cate);
            $this->assign('model',$model);
            $this->display('Register/Supplier_register');
     	}


     	//注册加入数据库
		public function Reg_add()
		{
			//实例化展厅表
			$db=M('exhibition_hall');
			if($_POST){
    		//对图片的处理,TP自带的upload，注意，提交表单的图片name为thumb
    		$thumb = ($_FILES['thumb']['error']!=4) ? $_FILES['thumb'] : NULL;
    		if(!empty($thumb))
    		{
    			$_POST['license'] = uploadimg($thumb);
    		}
			}
			//将用户uid存入数据库(暂时假设)
			//$_POST['uid']=1;
			$_POST['uid'] = session('sup_uid');
			//创建数据
	    	$data=$db->create();
	    	//判断数据是否创建成功
	    	if($data){
	    	//添加至数据库
	    	$result=$db->add($data);
	    		//判断添加是否成功
	    		if($result){
	    			//跳转至选择展厅模板页面
	    			//A('Register')->ex_model();
	    			//$exid=$result['exid'];
	    			//var_dump($result);
	    			$this->success("添加成功",U("Register/ex_model",array('exid'=>$result)));
	    			//$this->display('Register/Supplier_register_model');
	    		}else{
	    			$this->error('添加失败',U('Register/index'));
	    		}
	    	}else{
	    	$this->error('数据创建失败',U('Register/index'));
	    	}

	    }
	    //选择展厅模板页面
	    public function ex_model()
	    {
	    	$exid=I('get.exid');
	    	//var_dump($exid);
	    	$this->assign('exid',$exid);
	    	$this->display('Register/Supplier_register_model');
	    }

	    //添加展厅确认模板后跳转至首页
	    public function sure_model(){
	    	$exid=I('post.exid');
	    	$mol=I('post.mol');
	    	$db=M('exhibition_hall');
	    	$res=$db->where('exid='.$exid)->save(array('template'=>$mol));
	    	if($res){
	    		$data=TRUE;
	    	}else{
	    		$data=NULL;
	    	}
	    	echo json_encode($data);
	    }
	}
?>