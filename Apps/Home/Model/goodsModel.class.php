<?php
namespace Home\Model;
use Think\Model;

class goodsModel extends Model
{
	/*
	 * @function goodsdata 					封装展厅展览数据
	 * @para1   [string]    $where   		查询条件
	 * @para2   [string]    $order       	查询排序条件
	 * @para3   [int]    	$shownum       	每页显示个数
	 * @return  [array]          			集合数组
	 * **/
	
	public function goodsdata($where,$order,$shownum)
	{
		$db=M('goods');
		//分类商品
		$goods=$db->alias('g')->field('g.goods_id,g.goods_sn,g.uid,g.exid,g.goods_cate_id,g.goods_type,g.goods_name,g.goods_thumb,g.goods_img,g.goods_num,g.is_creat_ord,g.goods_price,g.goods_postage,g.remark,g.is_rec,g.goods_introduce,g.is_sell,g.sort,g.add_time,c.excname')->join(' bd_ex_cate as c on g.ex_goods_cid=c.excid')->where($where)->order($order)->select();
		$count=count($goods);
		$Page= new \Think\Page($count,$shownum);
		$goodsdata=$db->alias('g')->field('g.goods_id,g.goods_sn,g.uid,g.exid,g.goods_cate_id,g.goods_type,g.goods_name,g.goods_thumb,g.goods_img,g.goods_num,g.is_creat_ord,g.goods_price,g.goods_postage,g.remark,g.rec_remark,g.is_rec,g.goods_introduce,g.is_sell,g.sort,g.add_time,c.excname')->join(' bd_ex_cate as c on g.ex_goods_cid=c.excid')->where($where)->order($order)->limit($Page->firstRow.','.$Page->listRows)->select();
		if($goodsdata){

		}else{
			$goodsdata=0;
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
        //所有展厅分类
        $exid=session('gexid');
        $allcate=M('ex_cate')->field('excid,exid,excname,sort_order,add_time')->where('exid='.$exid)->select();
        //展厅数据
        $exmess=M('exhibition_hall')->alias('e')->field('e.exid,e.uid,e.ex_name,e.mcid,e.mid,e.company,e.username,e.tel,e.license,e.province,e.city,e.area,e.street,e.area_code,e.template,e.pv,e.uv,e.is_auth,e.add_time,e.ex_logo,e.ex_intro,e.status,e.warn_num,c.mcid,c.mc_name,c.sort_order,m.model_name')->join('bd_main_category as c on e.mcid=c.mcid')->join('bd_model as m on e.mid=m.mid ')->where('e.exid='.$exid)->find();
        //该展厅下商品
        $ex_goods=M('goods')->where('exid='.$exid.' and is_sell=0')->select();
        $exgnum=count($ex_goods);
        return(array('data'=>$goodsdata,'page'=>$show,'exmess'=>$exmess,'allcate'=>$allcate,'egn'=>$exgnum));		
	}

}
?>