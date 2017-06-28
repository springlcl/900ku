<?php
/**
 * 900ku前台求购中心(平台前端展示控制器)
 */
namespace Wap\Controller;
use Common\Controller\BaseController;

class AsktobuyController extends WapController
{
	//求购中心首页
	public function index()
	{
		$where="g.cg_status=0";
		$order="g.cg_add_time desc";
		$cgdata=new \Wap\Model\cg_goodsModel();
		$alldata=$cgdata->cgdata($where,$order);
		$this->assign('alldata',$alldata['cgdata']);
		$this->assign('page',$alldata['page']);
		$this->display("Asktobuy/index");
	}

	//帮我找货页面
	public function find()
	{
		$db=M('goods_type');
		$type=$db->field('type_id,type_name')->select();
		$this->assign('type',$type);
		$this->display("Asktobuy/asktobuy");
	}

	//采购信息注册
	public function inputdata()
	{
		$db=M('cg_goods');
		$_POST['cg_add_time']=time();
		$data=$db->create();
		// dump($data);
		$res=$db->add($data);
		if($res){
			$this->success('找货成功',U('Asktobuy/index'));
		}else{
			$this->error('找货失败',U('Asktobuy/index'));
		}
	}




	
}
?>