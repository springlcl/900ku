<?php
/*
*
*
*   准入管理控制器
*
*/


namespace Purchaser\Controller;
use Purchaser\Controller\PurController;
class AdmitController extends PurController
 {
 	//准入供应商
 	public function ac_provider()
 	{
 		//模拟用户id
 		$uid = 1;
 		//查询展厅信息
 		$data = D('admit')
 		->field('bd_admit.channel,bd_admit.gengxin,bd_admit.quantity,bd_admit.remarks,bd_main_category.mc_name,bd_exhibition_hall.ex_name,bd_exhibition_hall.username,bd_exhibition_hall.tel,bd_exhibition_hall.license,bd_exhibition_hall.exid')
 		->join('bd_exhibition_hall on bd_admit.exid = bd_exhibition_hall.exid')
 		->join('bd_main_category on bd_exhibition_hall.mcid = bd_main_category.mcid')
 		->where('bd_admit.uid='.$uid)
 		->select();
 		$this->assign('xuhao',1);
 		$this->assign('data',$data);
 		$this->display();
 	}


 	//查询供应商
 	public function query()
 	{
 		$name = I('post.ename');
 		$name = "'$name'";
 		$data = D('admit')->join('bd_exhibition_hall on bd_admit.exid = bd_exhibition_hall.exid')
 		->join('bd_main_category on bd_exhibition_hall.mcid = bd_main_category.mcid')
 		->where('bd_exhibition_hall.ex_name='.$name)->select();
 		if(!$data)
 		{
 			$this->display('ac_provider');die;
 		}
 		$this->assign('xuhao','1');
 		$this->assign('data',$data);
 		$this->display('ac_provider');
 		
 	}


 	//准入管理
 	public function admin_st()
 	{		
 			//获取展厅id
 			$id = I('get.exid');
 			//通过展厅id查询商品分类
 			$fenlei = D('access_table')
 			->distinct(true)
 			->field('bd_goods_cate.gc_name,bd_goods_cate.gcid')
 			->join('bd_goods on bd_access_table.gid=bd_goods.goods_id')
 			->join('bd_goods_cate on bd_goods.goods_cate_id=bd_goods_cate.gcid')
 			->where('bd_access_table.exid='.$id)
 			->select();
 			$this->assign('fenlei',$fenlei);
 			$fen = I('post.fen');
 			//根据展厅id查询展厅信息及协议款比例
	 		$data = D('admit')
	 		->field('bd_admit.*,bd_exhibition_hall.*,bd_admit.status as zt')
	 		->join('bd_exhibition_hall on bd_admit.exid = bd_exhibition_hall.exid')
	 		->where('bd_admit.exid='.$id)->find();
	 		$name = I('post.gname');
	 		$status = I('post.status');
	 		$cond['bd_access_table.status'] = array('like',"%$status%");
	 		$cond['bd_goods.goods_name'] = array('like',"%$name%");
	 		$cond['bd_goods.goods_cate_id'] = array('like',"%$fen%");
	 		$cond['admit_id'] = $id;
	 		//根据展厅id查询商品
	 		$str = D('access_table')
	 		->field('bd_access_table.price,bd_access_table.aid as tbid,bd_goods_sku.attributes,bd_access_table.xiugai,bd_access_table.goods_price,bd_goods.goods_name,bd_goods.goods_thumb,bd_access_table.status')
	 		->join('bd_goods on bd_access_table.gid=bd_goods.goods_id')
	 		->join('bd_goods_sku on bd_goods_sku.goods_id=bd_goods.goods_id')
	 		->where($cond)->select();
	 		//查询准入商品和待准入商品
	        $strs = D('admit')->where('exid='.$id)->find();
	        $zhunru = count(D('access_table')->where("admit_id=%d and status!=%d and status!=%d",$strs['id'],0,2)->select());
	        $dai = count(D('access_table')->where("admit_id=%d and status=%d",$strs['id'],2)->select());
	        $this->assign('zhunru',$zhunru);
	        $this->assign('dai',$dai);
	 		$this->assign('xuhao','1');
	 		$this->assign('str',$str);
	 		$this->assign('data',$data);
	 		$this->display();
 	}


 	//设置货款比例
 	public function set_payment()
 	{
 		$data = I('post.');
		$result = D('admit')->save($data);
		if($result)
		{
			$this->success('设置协议款成功',U('ac_provider'),1);
		}
		else
		{
			$this->error('设置失败，请重新设置');
		}
 	}


 	//协议价格弹出框内容
 	public function eject()
 	{
 		$id = I('post.aid');
 		$str = D('access_table')
 		->field('bd_access_table.xiugai,bd_access_table.bg_time,bd_access_table.price,bd_goods.goods_sn,bd_access_table.aid,bd_goods_sku.attributes,bd_access_table.goods_price,bd_goods.goods_name,bd_goods.goods_thumb,bd_access_table.status')
 		->join('bd_goods on bd_access_table.gid=bd_goods.goods_id')
 		->join('bd_goods_sku on bd_goods_sku.goods_id=bd_goods.goods_id')
 		->where('bd_access_table.aid='.$id)->find();
 		$str['riqi'] = date('Y-m-d',$str['bg_time']);
 		$str['shijian'] = date('H:i:s',$str['bg_time']);
 		// dump($str);die;
 		$this->ajaxReturn($str);
 	}



 	public function ejects()
 	{
 		$id = I('post.aid');
 		$cond['bd_access_table.aid'] = array('in',$id);
 		$str = D('access_table')
 		->field('bd_access_table.bg_time,bd_access_table.price,bd_goods.goods_sn,bd_access_table.aid,bd_goods_sku.attributes,bd_access_table.goods_price,bd_goods.goods_name,bd_goods.goods_thumb,bd_access_table.status')
 		->join('bd_goods on bd_access_table.gid=bd_goods.goods_id')
 		->join('bd_goods_sku on bd_goods_sku.goods_id=bd_goods.goods_id')
 		->where($cond)->select();
 		// dump($str);die;
 		$this->ajaxReturn($str);
 	}

 	//修改协议价格
 	public function set_price()
 	{
 		$data = I('post.');
 		$result = D('access_table')->save($data);
 		$adid = I('post.adid');
        $where['status'] = array('in','1,3,5');
        $where['exid'] = $adid;
        $fan = count(D('access_table')->where($where)->select());
        $conds['id'] = $adid;
        $conds['quantity'] = $fan;
        D('admit')->save($conds);
        $w['status'] = array('in','2,5');
        $w['exid'] = $adid;
        $f = count(D('access_table')->where($w)->select());
        $c['id'] = $adid;
        $c['gaijia'] = $f;
        D('admit')->save($c);
 		$this->ajaxReturn($result);
 	}


 	//确认修改协议价格
 	public function set_prices()
 	{
 		$data = I('post.');
 		$result = D('access_table')->save($data);
 		$adid = I('post.adid');
        $where['status'] = array('in','3,4');
        $where['exid'] = $adid;
        $fan = count(D('access_table')->where($where)->select());
        $conds['id'] = $adid;
        $conds['gengxin'] = $fan;
        D('admit')->save($conds);
 		$this->ajaxReturn($result);
 	}



 	//取消调整价格
 	public function set_pricey()
 	{
 		$data = I('post.');
 		$result = D('access_table')->save($data);
 		$adid = I('post.adid');
        $where['status'] = 5;
        $where['exid'] = $adid;
        $fan = count(D('access_table')->where($where)->select());
        $conds['id'] = $adid;
        $conds['gaijia'] = $fan;
        D('admit')->save($conds);
 		$this->ajaxReturn($result);
 	}



 	//修改协议价格更新
 	public function set_pricex()
 	{
 		$data = I('post.');
 		$result = D('access_table')->save($data);
 		$adid = I('post.adid');
        $where['status'] = 5;
        $where['exid'] = $adid;
        $fan = count(D('access_table')->where($where)->select());
        $conds['id'] = $adid;
        $conds['gaijia'] = $fan;
        D('admit')->save($conds);
 		$this->ajaxReturn($result);
 	}


 	//准入商品
 	public function ac_commodity()
 	{

 		//准入供应商id
 		$cond['admit_id'] = 2;
 		//获取用户所输入的商品名称
 		$name = I('post.gname');
 		//获取所选择的状态
 		$st = I('post.status');
 		//获取所选择的类目
 		$lm = I('post.lm');
 		//获取所选择的展厅名称
 		$mc = I('post.mc');
 		$cond['bd_goods.goods_name'] = array('like',"%$name%");
 		$cond['bd_access_table.status'] = array('like',"%$st%");
 		$cond['bd_exhibition_hall.mcid'] = array('like',"%$lm%");
 		$cond['bd_access_table.exid'] = array('like',"%$mc%");
 		$cond['bd_access_table.status'] = array('in','1,3,4,5');
 		$str = D('access_table')
	 		->field('bd_access_table.shuliang,bd_access_table.xiugai,bd_access_table.pid,bd_exhibition_hall.ex_name,bd_cg_group.fname,bd_goods.goods_id,bd_goods.remark,bd_access_table.remarks,bd_access_table.alias,bd_access_table.number,bd_goods.goods_sn,bd_access_table.price,bd_access_table.aid,bd_goods_sku.attributes,bd_access_table.goods_price,bd_goods.goods_name,bd_goods.goods_thumb,bd_access_table.status')
	 		->join('bd_goods on bd_access_table.gid=bd_goods.goods_id')
	 		->join('bd_goods_sku on bd_goods_sku.goods_id=bd_goods.goods_id')
	 		->join('bd_cg_group on bd_access_table.fid=bd_cg_group.fid')
	 		->join('bd_exhibition_hall on bd_access_table.exid=bd_exhibition_hall.exid')
	 		->where($cond)->select();
	 		// dump($str);die;
	 	$data = D('cg_group')->where('pid=2')->select();
	 	//查询展厅名称和所营类目uid应该为session中的uid；
	 	$arr = D('admit')
	 	->field('bd_exhibition_hall.ex_name,bd_main_category.mc_name,bd_exhibition_hall.mcid,bd_exhibition_hall.exid')
	 	->join('bd_exhibition_hall on bd_admit.exid=bd_exhibition_hall.exid')
	 	->join('bd_main_category on bd_exhibition_hall.mcid=bd_main_category.mcid')
	 	// ->join('bd_access_table on bd_access_table.admit_id=bd_admit.id')
	 	->where('bd_admit.uid=1')->select();
	 	$this->assign('arr',$arr);
	 	$this->assign('datas',$data);
	 	$this->assign('str',$str);
	 	$this->assign('xuhao',1);
 		$this->display();
 	}

 	//获取商品分组在弹出框展示
 	public function grouping()
 	{
 		$pid = I('post.pid');
 		$data = D('cg_group')->where('pid='.$pid)->select();
 		$this->ajaxReturn($data);
 	}


 	//商品编辑弹出框显示内容
 	public function gs_cont()
 	{
 		$id = I('post.goodsid');
 		$data = D('goods')->field('goods_id,goods_name,goods_sn,goods_thumb')
 		->where('goods_id='.$id)->find();
 		// dump($data);die;
 		$this->ajaxReturn($data);
 	}


 	//修改商品别名，编号，备注
 	public function set_content()
 	{
 		$data = I('post.');
 		$result = D('access_table')->save($data);
 		$this->ajaxReturn($result);
 	}


 	//设置商品别名，编号，分组，备注
 	public function set_rms()
 	{
 		$data = I('post.');
 		$result = D('access_table')->save($data);
 		$this->ajaxReturn($result);
 	}


 	//商品分类
 	public function ification()
 	{
 		if(IS_POST)
 		{
 			$data = I('post.');
 			$data['pid'] = 2;
 			$result = D('cg_group')->add($data);
 			$this->ajaxReturn($result);
 		}
 		else
 		{
 			$str = D('cg_group')->where('pid=2')->select();
	 		$this->assign('str',$str);
	 		$this->display();
 		}
 		
 	}

 	//批量准入
 	public function set_zhunru()
 	{
 		$id = I('post.aid');
 		$cond['aid'] = array('in',$id);
 		$cond['status'] = 2;
 		$result = D('access_table')->save($cond);
 		$this->ajaxReturn($result);
 	}


 	//批量取消准入
 	public function set_plqx()
 	{
 		$id = I('post.id');
 		$cond['aid'] = array('in',$id);
 		$cond['status'] = 0;
 		$result = D('access_table')->save($cond);
 		$this->ajaxReturn($result);
 	}


 	//删除分组名称
 	public function del_name()
 	{
 		$fid = I('post.fid');
 		$result = D('cg_group')->delete($fid);
 		$this->ajaxReturn($result);
 	}


 	//修改分组名称
 	public function edit_name()
 	{
 		$data = I('post.');
 		$result = D('cg_group')->save($data);
 		$this->ajaxReturn($result);
 	}
 }