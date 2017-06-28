<?php
/**
 * 900ku前台企业展厅(平台前端展示控制器)
 */
namespace Wap\Controller;
use Common\Controller\BaseController;

class SearchController extends WapController
{
	//企业展厅页面显示
	public function index()
	{
		//查询展厅数据,默认按创建时间排序
		$ex=new \Wap\Model\exhibition_hallModel();
		$where='e.status=0 and e.is_auth=1';
		$order='e.add_time desc';
		$exdata=$ex->exdata($where,$order);
		//渲染界面,展厅数据，分页，店铺分类
		$this->assign( array('exdata'=>$exdata['exdata'],'page'=>$exdata['page'],'allcate'=>$exdata['allcate'],'goodex'=>$exdata['goodex']) );
		$this->display("Search/index");
	}

	//展厅按人气排序
	public function order_uv()
	{
		//查询展厅数据,按人气排序
		$ex=new \Wap\Model\exhibition_hallModel();
		$where='e.status=0 and e.is_auth=1';
		$order='e.uv desc';
		$exdata=$ex->exdata($where,$order);
		//渲染界面,展厅数据，分页，店铺分类
		$this->assign( array('exdata'=>$exdata['exdata'],'page'=>$exdata['page'],'allcate'=>$exdata['allcate'],'goodex'=>$exdata['goodex']) );
		$this->display("Search/index");		
	}

	//展厅按分类搜索
	public function search_cate()
	{
		$mcid=I('get.mcid');
		$ex=new \Wap\Model\exhibition_hallModel();
		$where='e.status=0 and e.is_auth=1 and c.mcid='.$mcid;
		$order='e.add_time desc';
		$exdata=$ex->exdata($where,$order);
		//渲染界面,展厅数据，分页，店铺分类
		$this->assign( array('exdata'=>$exdata['exdata'],'page'=>$exdata['page'],'allcate'=>$exdata['allcate'],'goodex'=>$exdata['goodex']) );
		$this->display("Search/index");		
	}




	
}
?>