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
use Think\Controller;
use Think\Page;
class StoreController extends SupController
{
    /* 供应商--后台展厅管理控制器 */

    /**
     * 展厅管理--XXXX
     *
     */
     	//展厅创建页面
     	public function index()
     	{
     		//查询经营类目及经营模式
            $cate=M('main_category')->field('mcid,mc_name,sort_order')->select();
            $model=M('model')->field('mid,model_name,sort_order')->select();
            $this->assign('cate',$cate);
            $this->assign('model',$model);
            $this->display('Register/Supplier_register');
     	}


     	//展厅创建成功加入数据库
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
			//添加时间
			$_POST['add_time']=date("Y-m-d");
			//将用户uid存入数据库
			$_POST['uid'] = session('sup_uid');
            //实例化城市表
            $city=M('city');
            //将post接收省市区code转化为中文存储
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
	    			// $this->success("添加成功",U("Store/ex_model",array('exid'=>$result)));
                    header("location:".U("Store/ex_model",array('exid'=>$result)));
	    			//$this->display('Register/Supplier_register_model');
	    		}else{
	    			$this->error('添加失败',U('Store/index'));
	    		}
	    	}else{
	    	$this->error('数据创建失败',U('Store/index'));
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


        //业务概况
    	public function mess_services()
    	{
            //获取展厅exid
            if($_GET['exid']){
                $exid=I('get.exid');
                session('exid',$exid); 
            }else{
                $exid=session('exid');
            }
            //获取前七天日期(月份-日期)
            for ($i=1; $i <=7 ; $i++) { 
                $week[]=date("m-d",strtotime("-".$i." day"));
            }
            //倒序 下脚标为6-倒数第七天
            krsort($week);
            //查询这七天的订单总金额(日订单总金额=日订货金额-日退货金额)

            $this->assign('week',$week);


    		$this->display('Store/Ex_index');
    	}

        //浏览概况
        public function serMess()
        {

            $exid=session('exid');
            //获取前七天日期(年-月份-日期)
            for ($i=1; $i <=7 ; $i++) { 
                $week[]=date("Y-m-d",strtotime("-".$i." day"));
            }
            //倒序 下脚标为6-倒数第七天
            krsort($week);
            //获取前七天的时间戳
            for ($i=1; $i <=7 ; $i++) { 
                $wt=date("Y-m-d",strtotime("-".$i." day"));
                $wtime[]=strtotime($wt);
            }
            krsort($wtime);
            // var_dump($wtime);
            // exit;
            //查询这七天的展厅浏览次数，展厅浏览人数，商品浏览次数，人数，商品用户次数
            $num=M('ex_see');
            for ($i=6; $i >=0 ; $i--) { 
                $res=$num->field('time,ex_see,ex_user,goods_see,goods_user,goods_usernum')
                    ->where("exid=".$exid." and time='$wtime[$i]'" )
                    //->fetchSql(true)
                    ->find();
                if($res){
                     $all[]=$res;
                }else{
                    $all[]=0;
                }  
            }
            // dump($all);
            // exit;
            //渲染页面
            $this->assign('all',$all);
            $this->assign('week',$week);            


            $exmess=M('exhibition_hall')->field('exid,ex_name,is_auth')->where('exid='.$exid)->find();

            $this->assign('ex',$exmess);
        	$this->display('Store/Ex_serveMess');
        }
        //选择模板
        public function choose_model()
        {
        	$exid=session('exid');
        	$db=M('exhibition_hall');
        	$mol=$db->field('template')->where('exid='.$exid)->find();
        	$this->assign('mol',$mol);
            $this->display('Store/Ex_model');
        }


        //高级定制页面
        public function tempwap()
        {
        	$exid=session('exid');
        	$db=M('ex_tempwap');
        	$tid=$db->where('exid='.$exid)->find();
        	if($tid){
        	$t=$db->field('tid,exid,lb_show,seach_show,notice_show,notice_content,
                gid1,gid2,gid3,gid4,gid5,mofang_goods,
        		mofang_show,goods_show_1,goods_show_2,goods_show_3,goods_show_4,goods_show_5')
        		->where('exid='.$exid)->find();
            //获取魔方区域商品信息
            $mfgid=$t['mofang_goods'];
            $mfgid=explode(",",$mfgid);
            $mfgoods=array();
            for ($i=0; $i <count($mfgid) ; $i++) { 
                $good=M('goods')->field('goods_id,goods_name,goods_thumb')
                                ->where('goods_id='.$mfgid[$i])->find();
                $mfgoods[]=$good;
            }
            // echo "<pre>";
            // var_dump($mfgoods);
            // echo "<pre>";
            // exit;
            if($mfgoods[0]!==null){
            $this->assign('mfgoods',$mfgoods);    
            }
            //获取商品栏推荐商品
            for ($i=1; $i <=5 ; $i++) { 
                $fivegood[]=M('goods')->field('goods_id,goods_name,goods_thumb')
                //->fetchSql(true)
                ->where("goods_id=".$t['gid'.$i])
                ->find();
            }
            $this->assign('fg',$fivegood);

        	$this->assign('t',$t);	
        	}
        //商品分类，三级分类添加商品
            //总分类
            $cate=M('goods_cate')->field('gcid,gc_name,parent_id,sort_order')->select();
            //一级分类
            $onec=M('goods_cate')->field('gcid,gc_name,parent_id,sort_order')->where('parent_id=0')
                    ->select();
            // var_dump($onec);
            // exit;
            $this->assign('cate',$cate);
            $this->assign('onec',$onec);
        	$this->display('Store/Ex_tempwap');
        }


        //寻找商品下级分类
        public function select_cate()
        {
            $cid=I("post.cid");
            $data=M('goods_cate')->field('gcid,gc_name,parent_id,sort_order')
                                ->order('sort_order desc')->where('parent_id='.$cid)->select();
            echo json_encode($data);
        }


        //高级定制中添加商品由分类查找对应的商品
        public function select_good()
        {
            $cid=I('post.cid');
            if(I("post.exid")){
                $exid=I('post.exid');
            }else{
                $exid=false;
            }
            if(I("post.page")){
                $page=I('post.page');
            }else{
                $page=1;
            }
            $db=M('goods');
            if($exid==false){
            //没有展厅id，只查询分类
            $data1=$db->field('goods_id,goods_cate_id,goods_name,goods_thumb')
            ->where('goods_cate_id='.$cid)
            ->select();
            $count=count($data1);
            $Page= new \Think\Page($count,8);              // 实例化分页类 传入总记录数
            $show  = $Page->show();                         // 分页显示输出
            // 进行分页数据查询
            $data['goods']=$db->field('goods_id,goods_cate_id,goods_name,goods_thumb')
            ->where('goods_cate_id='.$cid)
            ->order('add_time')
            ->limit(($page-1)*8,8)
            ->select();
            $p= ceil($count/8);
            $data['page']=$p;                 
            }else{
            //有展厅id，查询展厅下商品信息
            $data1=$db->field('goods_id,goods_cate_id,goods_name,goods_thumb')
            ->where('goods_cate_id='.$cid.' and exid='.$exid)
            ->select();
            $count=count($data1);
            $Page= new \Think\Page($count,8);              // 实例化分页类 传入总记录数
            $show  = $Page->show();                         // 分页显示输出
            // 进行分页数据查询
            $data['goods']=$db->field('goods_id,goods_cate_id,goods_name,goods_thumb')
            ->where('goods_cate_id='.$cid.' and exid='.$exid)
            ->order('add_time')
            ->limit(($page-1)*8,8)
            ->select();
            $p= ceil($count/8);
            $data['page']=$p;               
            }
           
            //var_dump($data);
            //var_dump($show);                       
            echo json_encode($data);
        }


        //获取添加商品中选中提交的商品信息
        public function goods_img()
        {
            $ids=I("post.gids");
            $gids=implode(",",$ids);
            $gids=str_replace('"','',$gids);
            $data=M('goods')->field('goods_id,goods_thumb')
                    ->where('goods_id in ('.$gids.')')->select();
            echo json_encode($data);
        }


        //添加商品中搜索商品分类
        public function search_goods()
        {
            $exid=I('post.exid');
            $text=I('post.text');
            if(I("post.page")){
                $page=I('post.page');
            }else{
                $page=1;
            }
            $gid=M('goods_cate')->field('gcid')->where("gc_name='$text'")->find();
            $data1=M('goods')->field('goods_id,goods_thumb,goods_name')//->fetchSql(true)
                     ->where('goods_cate_id='.$gid['gcid'].' && exid='.$exid)
                     ->select();

            $count=count($data1);
            $Page= new \Think\Page($count,8);              // 实例化分页类 传入总记录数
            $show  = $Page->show();                         // 分页显示输出
            // 进行分页数据查询
            $data['goods']=M('goods')->field('goods_id,goods_thumb,goods_name')//->fetchSql(true)
                     ->where('goods_cate_id='.$gid['gcid'].' && exid='.$exid)
                     ->order('add_time')
                     ->limit(($page-1)*8,8)
                     ->select();
            $p= ceil($count/8);
            $data['page']=$p;
            //var_dump($gid);
            //$data=$text;

            echo json_encode($data);
        }

        //高级定制确定修改
        public function sure_temp()
        {
        	$exid=I('post.exid');
        	$lb_show=I('post.c1');
        	$seach_show=I('post.c2');
        	$notice_show=I("post.c3");
        	$notice_content=I("post.gg");
        	$mofang_show=I("post.c4");
        	$goods_show_1=I('post.c5');
        	$goods_show_2=I('post.c6');
        	$goods_show_3=I('post.c7');
        	$goods_show_4=I('post.c8');
        	$goods_show_5=I('post.c9');
            //商品栏推荐商品
            for ($i=1; $i <6 ; $i++) { 
                if(I('post.g'.$i)){
                    $var = 'g'.$i;
                    $$var=I('post.g'.$i);
                }else{
                    $var = 'g'.$i;
                    $$var=0;
                }
            }

            //魔方推荐商品添加
            if(I("post.mfgids")){
            $mfgids=I("post.mfgids");
            //删除第一个空数组
            unset($mfgids[0]);
            $mfgids=implode(",", $mfgids);                
            }else{
            $mfgids=0;    
            }

        	$db=M('ex_tempwap');
        	$updata=array('gid1'=>$g1,'gid2'=>$g2,'gid3'=>$g3,'gid4'=>$g4,'gid5'=>$g5,'mofang_goods'=>$mfgids,'exid'=>$exid,'lb_show'=>$lb_show,'seach_show'=>$seach_show,'notice_show'=>$notice_show
        		,'mofang_show'=>$mofang_show,'goods_show_1'=>$goods_show_1,'goods_show_2'=>$goods_show_2
        		,'goods_show_3'=>$goods_show_3,'goods_show_4'=>$goods_show_4,'goods_show_5'=>$goods_show_5,
        		'notice_content'=>$notice_content);
        	$tid=$db->where('exid='.$exid)->find();
        	if($tid){
        		$res=$db->where('exid='.$exid)->save($updata);
        	}else{
        		$res=$db->add($updata);
        	}
	    	if($res){
	    		$data=TRUE;
	    	}else{
	    		$data=NULL;
	    	}
	    	echo json_encode($data);
        }










    //修改PC端广告
    public function add_ad()
    {
        if(IS_POST)
        {

            $data = I('post.');
            $result = D('ex_ad')->save($data);
            if($result)
            {
                $this->success('修改成功',U('ad_list'),1);
            }
            else
            {
                $this->error('修改失败');
            }
        }
        else
        {
            $id = I('get.id');
            $data = D('ex_ad')->where('ad_id='.$id)->find();
            $this->assign('data',$data);
            $this->display();
        }
        
    }
    //修改状态隐藏显示按钮
    public function state()
    {
        $data = I('post.');
        $result = D('ex_ad')->save($data);
        $this->ajaxReturn($result);
    }
    //广告列表
    public function ad_list()
    {
        // session_start();
        $exid = I('get.exid');
        session('exid',$exid);
        $id = session('exid');
        // dump($exid);die;
        $ma = 0;
        $dia = 1;
        //查询展厅id为43的pc端广告信息
        $str = D('ex_ad')->where("exid=%d and media_type=%d",$id,$ma)->select();
        //查询展厅id为43的手机端广告信息
        $data = D('ex_ad')->where("exid=%d and media_type=%d",$id,$dia)->limit(1)->select();
        // dump($data);die;
        //分配手机广告信息到模板
        $this->assign('data',$data);
        //分配pc端广告信息到模板
        $this->assign('str',$str);
        //分配pc端序号
        $this->assign('xu','1');
        //手机端序号分配
        $this->assign('hao','1');
        $this->display();
        
        
    }
    //删除广告
    public function del()
    {
        $id = I('post.kid');
        //根据获取的广告id删除广告
        $result = D('ex_ad')->where('ad_id='.$id)->delete();
        $this->ajaxReturn($result);
    }
    //我的文件
    public function my_docum()
    {   
         if(IS_POST)
        {
            //判断文件是否上传
            if($_FILES['file']['error'] != 0)
            {
                $this->error('上传错误');die;
            }
            //设置上传类型
            $arr = array('jpg','png','jpeg','gif','bmp');
            //获取上传文件名称
            $filename = $_FILES['file']['name'];
            //获取文件扩展名
            $ext = pathinfo($filename,PATHINFO_EXTENSION);
            //判读上传类型是否正确
            if(!in_array($ext,$arr))
            {
                $this->error("上传类型不正确");die;
            }
            //获取文件临时存储路径
            $source = $_FILES['file']['tmp_name'];
            //设置文件路径和文件名称
            $dest = "./Uploads/image/".uniqid("S_",true).".".$ext;
            //把文件从临时存放的地移动到自己设置的文件夹中
            move_uploaded_file($source,$dest);
            //设置上传文件时间
            $data['add_time'] = time();
            //将文件路径截取掉第一个点存放到数据库中
            $data['thumb'] = substr($dest,1);
            //将文件名存放到数据库
            $data['pic_name'] = $filename;
            $data['exid'] = session('exid');
            $result = D('pic')->add($data);
            $this->ajaxReturn($result);
        }
        else
        {
            $id = session('exid');
            $data = D('pic')->where('exid='.$id)->select();
            $this->assign('data',$data);
            $this->display();
        }
        
    }

    //ajax设置我的文件中图片名称
    public function set_name()
    {
        $data = I('post.');
        $result = D('pic')->save($data);
        $this->ajaxReturn($result);
    }

    
    //删除我的文件中的图片
    public function pic_del()
    {
        $id = I('post.kid');
        $result = D('pic')->delete($id);
        $this->ajaxReturn($result);
    }
    //客服列表
    public function customer_list()
    {

        $id = session('exid');
        // 实例化Data数据对象
        $Data = M('ex_kefu');
        $map = 'exid='.$id;
        $p = isset($_GET['p'])? (I('get.p')-1) : 0;
        // 查询满足要求的总记录数 $map表示查询条件
        $count = $Data->where($map)->count();
        // 实例化分页类 传入总记录数
        $Page = new Page($count);
        //设置每页显示行数
        $Page->listRows   = 5;  
        //设置上一页下一页的样式
        $Page->setConfig('prev','上一页');
        $Page->setConfig('next','下一页');
        // 分页显示输出
        $show = $Page->show();
        // dump($show);die;
        // 进行分页数据查询
        // $Page->firstRow 起始条数 $Page->listRows 获取多少条
        $data = $Data->where($map)->order('kid')->limit($p.','.$Page->listRows)->select(); 
        // dump($data);die;
        $this->assign('xuhao','1');
        // 赋值数据集
        $this->assign('data',$data);
        // 赋值分页输出
        $this->assign('page',$show);
        $this->display();
    }
    //添加客服
    public function add_customer()
    {
        

        if(IS_POST)
        {

            if($_FILES['file']['error'] != 0)
            {
                $this->error('上传错误');die;
            }
            $arr = array('jpg','png','jpeg','gif','bmp');
            $filename = $_FILES['file']['name'];
            $ext = pathinfo($filename,PATHINFO_EXTENSION);
            if(!in_array($ext,$arr))
            {
                $this->error("上传类型不正确");die;
            }
            $source = $_FILES['file']['tmp_name'];
            $dest = "./Uploads/image/".uniqid("S_",true).".".$ext;
            move_uploaded_file($source,$dest);
            $data = I('post.');
            //设置添加时间
            $data['add_time'] =time();
            //模拟用户id
            $data['uid'] = session('sup_uid');
            //模拟展厅id
            $data['exid'] = session('exid');
            //截取图片路径前面的点存储路径到数据库
            $data['qcode'] = substr($dest,1);
            // dump($data);die;
            $kefu = D('ex_kefu');
            if($kefu->add($data))
            {
                $this->success('添加成功',U('customer_list'));
            }
            else
            {
                $this->error('添加失败');
            } 
        }
        else
        {
            $this->display();
        }
        
    }
    //修改客服信息
    public function modify()
    {
        if(IS_POST)
        {
            // if($_FILES['file']['error'] != 0)
            // {
            //     $this->error('上传错误');die;
            // }
            // $arr = array('jpg','png','jpeg','gif','bmp');
            // $filename = $_FILES['file']['name'];
            // $ext = pathinfo($filename,PATHINFO_EXTENSION);
            // if(!in_array($ext,$arr))
            // {
            //     $this->error("上传类型不正确");die;
            // }
            // $source = $_FILES['file']['tmp_name'];
            // $dest = "./Uploads/image/".uniqid("S_",true).".".$ext;
            // move_uploaded_file($source,$dest);
            $data = I('post.');
            // $data['qcode'] = substr($dest,1);
            $ke = D('ex_kefu');
            if($ke->save($data))
            {
                $this->success('修改成功',U('customer_list'));
            }
            else
            {
                $this->error('修改失败');
            }
        }
        else
        {
            $id = I('get.id');
            $kefu = D('ex_kefu')->where('kid='.$id)->find();
            $this->assign('kefu',$kefu);
            $this->display();
        }
        
    }
    //删除客服
    public function cus_del()
    {
        $id = I('post.kid');
        // echo $id;die;
        $kefu = D('ex_kefu');
        $result = $kefu->where('kid='.$id)->delete();
        $this->ajaxReturn($result);
    }
    //供应商认证
    public function supplier_cf()
    {
        //创建者的ID
        $uid = session('sup_uid');
        //根据用户id查询数据
        $data = D('exhibition_hall')->where('uid='.$uid)->find();
        // dump($data);die;
        $this->assign('data',$data);
        //获取主营类目id
        $mcid = $data['mcid'];
        //通过主营类目的id查询主营类目
        $category = D('main_category')->where('mcid='.$mcid)->find();
        $this->assign('category',$category);
        //获取经营模式id
        $mid  = $data['mid'];
        //通过经营模式id查询经营模式
        $pattern = D('model')->where('mid='.$mid)->find();
        $this->assign('pattern',$pattern);
        // 通过uid查询用户昵称
        $str = D('user')->where('uid='.$uid)->find();
        $this->assign('str',$str);
        $this->display();
    }




    //AJAX上传图片
    public function upload(){

        error_reporting(0);
        $picname = $_FILES['mypic']['name'];

        $arr = array('jpg','png','jpeg','gif','bmp');
        $ext = pathinfo($picname,PATHINFO_EXTENSION);
        if(!in_array($ext, $arr))
        {
            $this->error("上传类型错误");die;
        }
        $picsize = $_FILES['mypic']['size'];
        $pic_path = "./Uploads/face/".uniqid("S_",true).$picname;
        move_uploaded_file($_FILES['mypic']['tmp_name'],$pic_path);
        $pic_path = substr($pic_path,1);
        echo json_encode($pic_path);

    }





}