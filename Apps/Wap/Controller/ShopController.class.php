<?php
/**
 * 900ku前台供应商pc端前台展厅首页(平台前端展示控制器)
 */
namespace Wap\Controller;
use Common\Controller\BaseController;

class ShopController extends WapController
{
	public function index()
	{
		if(I('get.exid')){
			$exid=I('get.exid');
			session('gexid',$exid);
		}else{
			$exid=session('gexid');
		}
		$exgoods=new \Wap\Model\goodsModel();
		$where='g.exid='.$exid.' and g.is_sell=0';
		$order='g.add_time desc';
		$g=$exgoods->goodsdata($where,$order);
		//商品数
		$this->assign( array('ex'=>$g['exmess'],'cate'=>$g['allcate'],'data'=>$g['data'],'page'=>$g['page']) );
		$this->display('Shop/index');
	}

	//按分类查找商品
	public function search_cate()
	{
		$excid=I('get.excid');
		$exid=session('gexid');
		$exgoods=new \Wap\Model\goodsModel();
		$where='g.exid='.$exid.' and g.is_sell=0 and g.ex_goods_cid='.$excid;
		$order='g.add_time desc';
		$g=$exgoods->goodsdata($where,$order);
		//商品数
		$this->assign( array('ex'=>$g['exmess'],'cate'=>$g['allcate'],'data'=>$g['data'],'page'=>$g['page']) );
		$this->display('Shop/index');
	}

}
?>