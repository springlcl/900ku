<?php
/**
 * 900ku前台企业展厅(平台前端展示控制器)
 */
namespace Home\Controller;
use Common\Controller\BaseController;

class SearchController extends WapController
{
	//企业展厅页面显示
	public function index()
	{
		//查询展厅数据,默认按创建时间排序
		$ex=new \Home\Model\exhibition_hallModel();
		$where='e.status=0 and e.is_auth=1';
		$order='e.add_time desc';
		$exdata=$ex->exdata($where,$order);
		//渲染界面,展厅数据，分页，店铺分类
		$tencate=array_slice($exdata['allcate'],0,10);
		$lastcate=array_slice($exdata['allcate'],10);
		// dump($exdata['exdata']);
		// exit;
		$this->assign( array('exdata'=>$exdata['exdata'],'page'=>$exdata['page'],'allcate'=>$tencate,'lastcate'=>$lastcate,'goodex'=>$exdata['goodex']) );
		$this->display("Search/index");
	}

	//展厅按人气排序
	public function order_uv()
	{
		//查询展厅数据,按人气排序
		$ex=new \Home\Model\exhibition_hallModel();
		$where='e.status=0 and e.is_auth=1';
		$order='e.uv desc';
		$exdata=$ex->exdata($where,$order);
		//渲染界面,展厅数据，分页，店铺分类
		$tencate=array_slice($exdata['allcate'],0,10);
		$lastcate=array_slice($exdata['allcate'],10);
		$this->assign( array('exdata'=>$exdata['exdata'],'page'=>$exdata['page'],'allcate'=>$tencate,'lastcate'=>$lastcate,'goodex'=>$exdata['goodex']) );
		// dump(__SELF__);
		// exit;
		//$url=str_replace('.html', '', $url);
		//$url=__SELF__.'/order/2';
		
		// if(strpos(__SELF__,'uvorder')){
		// 	$url=__SELF__;
		// }else{
		// 	$url=__SELF__.'/uvorder/2';
		// }
		// $url=str_replace('.html', '', $url);
		// $this->assign('url',$url);
		$this->display("Search/index");		
	}

	//展厅按分类搜索
	public function search_cate()
	{
		$mcid=I('get.mcid');
		$ex=new \Home\Model\exhibition_hallModel();
		$where='e.status=0 and e.is_auth=1 and c.mcid='.$mcid;
		$order='e.add_time desc';
		$exdata=$ex->exdata($where,$order);

		// if(strpos(__SELF__,'mcid')){
		// 	$url=__SELF__;
		// }else{
		// 	$url=__SELF__."/mcid/$mcid";
		// }
		// $url=str_replace('.html', '', $url);
		// $this->assign('url',$url);
		//渲染界面,展厅数据，分页，店铺分类
		$tencate=array_slice($exdata['allcate'],0,10);
		$lastcate=array_slice($exdata['allcate'],10);
		$this->assign( array('exdata'=>$exdata['exdata'],'page'=>$exdata['page'],'allcate'=>$tencate,'lastcate'=>$lastcate,'goodex'=>$exdata['goodex']) );
		$this->display("Search/index");		
	}

	//展厅按地区搜索
	public function search_area()
	{
		// dump($_POST['c']);
		// dump($_POST['p']);
		$p=$_POST['p'];
		$c=$_POST['c'];
		$ex=new \Home\Model\exhibition_hallModel();
		$where='e.status=0 and e.is_auth=1 and e.city like "'.$c.'%"';
		$order='e.add_time desc';
		$exdata=$ex->exdata($where,$order);
		//渲染界面,展厅数据，分页，店铺分类
		$tencate=array_slice($exdata['allcate'],0,10);
		$lastcate=array_slice($exdata['allcate'],10);
		$this->assign( array('exdata'=>$exdata['exdata'],'page'=>$exdata['page'],'allcate'=>$tencate,'lastcate'=>$lastcate,'goodex'=>$exdata['goodex']) );
		$this->display("Search/index");	

	}

	//导航栏搜索
	public function find()
	{
		//dump($_POST);
		//搜索内容
		$text=$_POST['text'];
		//搜索类型

		if($_POST['type']=="ex"){
		$ex=new \Home\Model\exhibition_hallModel();
		$where='e.status=0 and e.is_auth=1 and e.ex_name like "'.$text.'%"';
		$order='e.add_time desc';
		$exdata=$ex->exdata($where,$order);
		//渲染界面,展厅数据，分页，店铺分类
		$tencate=array_slice($exdata['allcate'],0,10);
		$lastcate=array_slice($exdata['allcate'],10);
		$this->assign( array('exdata'=>$exdata['exdata'],'page'=>$exdata['page'],'allcate'=>$tencate,'lastcate'=>$lastcate,'goodex'=>$exdata['goodex']) );
		$this->display("Search/index");			
		}

		if($_POST['type']=="good"){
		$exgoods=new \Home\Model\goodsModel();
		$where='g.is_sell=0 and g.goods_name like "'.$text.'%"';
		$order='g.add_time desc';
		$shownum=30;
		$g=$exgoods->goodsdata($where,$order,$shownum);

		$this->assign(array('lastc'=>$lastc,'goods'=>$g['data'],'page'=>$g['page'],'cname'=>$cname));
		$this->display('Goods/goods');
		}
	}




	
}
?>