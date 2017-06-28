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
class IndexController extends SupController
{
    /* 供应商--控制器 */

    /**
     * 供应商--选择公司/展厅首页
     *
     */
    public function index()
    {
    	//实例化展厅表
    	$db=M('exhibition_hall');
    	//获取当前登录用户的uid
    	$uid=session('sup_uid');
        //判断是供应商还是业务员
        $items=M('user')
        ->field('uid,item,status,pt_role')
        ->where('uid='.$uid.' and status=0 and pt_role=1')
        ->find();
        //供应商展厅信息
        if($items['item']==0){

        //获取当前用户所创建的所有未禁用展厅
        $exhibition=$db->alias('ex')
        ->field('ex.exid,ex.uid,ex.ex_name,ex.company')
        ->where('ex.uid='.$uid.' and status=0')
        ->select();
        $count=count($exhibition);
        $Page= new \Think\Page($count,6);              // 实例化分页类 传入总记录数
        // 进行分页数据查询
        $datalist=$db->alias('ex')
        ->field('ex.exid,ex.uid,ex.ex_name,ex.company,ex.add_time')
        ->where('ex.uid='.$uid.' and status=0')
        ->order('ex.add_time desc')
        ->limit($Page->firstRow.','.$Page->listRows)
        ->select();
        //获取当前用户所注册公司名称
        $company=$db->field('company')->where('uid='.$uid)->find();
        //业务员展厅信息
        }else{

        //获取当前用户所关联的未禁用展厅
        $item=M('user')->field('uid,pt_role,item,status,leader')
        ->where('uid='.$uid.' and status=0 and pt_role=1')->find();
        $items=$item['item'];
        $exhibition=$db->alias('ex')
        ->field('ex.exid,ex.uid,ex.ex_name,ex.company')
        ->where('ex.status=0 and  ex.exid in '."(".$items.")")
        ->select();
        $count=count($exhibition);
        $Page= new \Think\Page($count,6);              // 实例化分页类 传入总记录数
        // 进行分页数据查询
        $datalist=$db->alias('ex')
        ->field('ex.exid,ex.uid,ex.ex_name,ex.company,ex.add_time')
        ->where('ex.status=0 and  ex.exid in '."(".$items.")")
        ->order('ex.add_time desc')
        ->limit($Page->firstRow.','.$Page->listRows)
        ->select();
        //获取当前用户首个展厅公司名称
        $company=$datalist[0];
        }
        //分页样式
        $Page -> setConfig('header','共%TOTAL_ROW%个');
        $Page -> setConfig('first','首页');
        $Page -> setConfig('last','共%TOTAL_PAGE%页');
        $Page -> setConfig('prev','上一页');
        $Page -> setConfig('next','下一页');
        $Page -> setConfig('link','indexpagenumb');//pagenumb 会替换成页码
        $Page -> setConfig('theme','%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
        $show=$Page->show();
        //渲染页面
        $this->assign('count',$count);  
        $this->assign('page',$show);                    // 赋值分页输出
    	$this->assign('exs',$datalist);
    	$this->assign('com',$company);
        $this->display('Index/Supplier_index');
    }


    //展厅修改页面
    public function edit_show()
    {
     	//查询经营类目及经营模式
        $cate=M('main_category')->field('mcid,mc_name,sort_order')->select();
        $model=M('model')->field('mid,model_name,sort_order')->select();
        $this->assign('cate',$cate);
        $this->assign('model',$model);
        //获取展厅exid 
        $exid=I('get.exid');
        //var_dump($exid);
        //获取展厅信息
        $exmess=M('exhibition_hall')
        ->alias('ex')
        ->field('m.mid,a.mcid,m.model_name,a.mc_name,ex.exid,ex.uid,ex.ex_name,ex.company,ex.username,ex.tel,ex.license,ex.street
            ,ex.province,ex.city,ex.area,ex.area_code')
        ->join('bd_main_category as a on ex.mcid = a.mcid')
        ->join('bd_model as m on ex.mid = m.mid')
        ->where('ex.exid='.$exid)
        //->fetchSql(true)
        ->find();
        //var_dump($exmess);
        //地区中文转化为code编码
        $city=M('city');
        $pdata=$city->field('id,num,city')->where('city="'.$exmess['province'].'"')->find();
        $cdata=$city->field('id,num,city')->where('city="'.$exmess['city'].'"')->find();
        $adata=$city->field('id,num,city')->where('city="'.$exmess['area'].'"')->find();
        $pcode=$pdata['num'];
        $ccode=$cdata['num'];
        $acode=$adata['num'];
        //var_dump($pcode,$ccode,$acode);
        $this->assign(array('p'=>$pcode,'cc'=>$ccode,'a'=>$acode));
        $this->assign('ex',$exmess);
    	$this->display('Index/Supplier_index_edit');
    }


    //展厅修改
    public function edit()
    {
        //获取展厅exid
        $exid=I('post.exid');
        //var_dump($exid);
        if(IS_POST)
        {
            $db=M('exhibition_hall');
            //将post接收省市区code转化为中文存储
            $_POST['area_code']=$_POST['area'];
            $city=M('city');
            $p=$_POST['province'];
            $c=$_POST['city'];
            $a=$_POST['area'];
            if($a){
                $adata=$city->field('id,num,city')->where('num='.$a)->find();
                $_POST['area']=$adata['city'];
                $_POST['area_code']=$a;
            }else{
                $_POST['area']=null;
                $_POST['area_code']=0;
            }
            $pdata=$city->field('id,num,city')->where('num='.$p)->find();
            $cdata=$city->field('id,num,city')->where('num='.$c)->find();
            
            $_POST['province']=$pdata['city'];
            $_POST['city']=$cdata['city'];
            
            $data=$db->create();
            // var_dump($data);
            // exit;
            //$data['is_auth']=0;
            if($data){
                $result=$db->where('exid='.$exid)->save($data);
                if($result){
                    $this->success('修改成功',U('Index/index'));
                }else{
                    $this->error('修改失败',U('Index/index'));
                }
            }else{
                    $this->error('修改失败',U('Index/index'));
            }
        }
    }

    //展厅删除(禁用)
    public function del()
    {
    	//获取展厅exid
    	$exid=I('post.exid');
    	//执行删除操作
    	$result=M('exhibition_hall')->where('exid='.$exid)->save(array('status'=>1));
    	//成功删除后返回ajax结果
    	if($result){
    		$data=TRUE;
    	}else{
    		$data=NULL;
    	}
    	echo json_encode($data);
    }

    //展厅跳转至渠道管理
    public function admin()
    {
        $exid=I('get.exid');
        session('exid',$exid);
       // $this->success('渠道管理',U('Channel/selasman'));
        header("location:".U('Channel/selasman'));

    }

    //展厅跳转至订单管理
    public function order()
    {
        $exid=I('get.exid');
        session('exid',$exid);
       // $this->success('订单管理',U('Order/access_order'));
       header("location:".U('Order/access_order'));
    }

    //展厅跳转至待确认收款
    public function money()
    {
        $exid=I('get.exid');
        session('exid',$exid);
       // $this->success('待确认收款',U('Order/ar_order'));
        header("location:".U('Order/ar_order'));
    }

    //展厅跳转至业务员结算
    public function admoney()
    {
        $exid=I('get.exid');
        session('exid',$exid);
       // $this->success('业务员结算',U('Myincome/income_at'));
        header("location:".U('Myincome/income_at'));
    }
}