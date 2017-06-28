<?php
/**
 * 900ku前台首页(平台前端展示控制器)
 */
namespace Wap\Controller;
use Common\Controller\BaseController;

class HomeController extends WapController
{
	public function index()
	{
		$db=M('goods');
		//查找推荐商品
		$goods=$db->field('goods_id,goods_name,goods_thumb,goods_img,original_img,is_rec,goods_introduce,goods_price')->where('is_rec=1')->limit('0,5')->select();
		//查找所有商品分类
		$c=M('goods_cate');
		$goodsc=$c->field('gc_name')->where('parent_id=0')->select();
		//查找没有下级分类的最下级分类
		$sql="select * from bd_goods_cate where gcid not in(
        select t1.parent_id from bd_goods_cate t1 join bd_goods_cate t2 on t1.parent_id = t2.gcid) 
        and (
        parent_id!=0 or (parent_id=0 and gcid not in(
        select t1.parent_id from bd_goods_cate t1 join bd_goods_cate t2 on t1.parent_id = t2.gcid
        )))";
        $lastc=M()->query($sql);
		//第一个商品分类下10个推荐商品
		$goodsfirst=$db->field('goods_id,goods_name,goods_thumb,goods_img,original_img,is_rec,goods_introduce,goods_price')->where('is_rec=1 and goods_cate_id='.$lastc[0]['gcid'])->limit('0,10')->select();
		//第二个商品分类下10个推荐商品
		$goodstwo=$db->field('goods_id,goods_name,goods_thumb,goods_img,original_img,is_rec,goods_introduce,goods_price')->where('is_rec=1 and goods_cate_id='.$lastc[1]['gcid'])->limit('0,10')->select();
		//总共认证展厅数目
		$allex=M('exhibition_hall')->where('is_auth=1 and status=0')->select();
		$exnum=count($allex);
		//总共求购信息
		$allaskgoods=M('cg_goods')->where('cg_status=0')->select();
		$asknum=count($allaskgoods);
		//求购推荐信息6个
		$ask=M('cg_goods')->alias('g')->field('g.cgid,g.cg_name,g.cg_cate,t.type_name')->join('bd_goods_type as t on g.cg_cate= t.type_id ')->limit('0,6')->where('g.cg_is_rec=1 and cg_status=0')->order('g.cg_add_time desc')->select();
		$this->assign(array('recgoods'=>$goods,'cate'=>$goodsc,'lastc'=>$lastc,'goodsfirst'=>$goodsfirst,'goodstwo'=>$goodstwo,'exnum'=>$exnum,'asknum'=>$asknum,'ask'=>$ask));
		$this->display("Home/index");
	}




	
}
?>
