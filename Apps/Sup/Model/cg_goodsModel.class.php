<?php
namespace Wap\Model;
use Think\Model;

class cg_goodsModel extends Model
{
	/*
	 * @function cgdata 					封装采购项目展览数据
	 * @para1   [string]    $where       	查询条件
	 * @para2   [string]    $order       	查询排序条件	 
	 * @return  [array]          			集合数组
	 * **/
	
	public function cgdata($where,$order)
	{
		$db=M('cg_goods');
		$datac=$db->alias('g')->field('g.cgid,g.cg_name,g.cg_num,g.cg_username,g.cg_phone,g.cg_company,g.cg_detail,g.cg_status,g.cg_add_time,g.cg_cate')->join('bd_goods_type as t on g.cg_cate=t.type_id ')->where($where)->select();
		$count=count($datac);
		$Page= new \Think\Page($count,10);
		$cgdata=$db->alias('g')->field('g.cgid,g.cg_name,g.cg_num,g.cg_username,g.cg_phone,g.cg_company,g.cg_detail,g.cg_status,g.cg_add_time,g.cg_cate')->join('bd_goods_type as t on g.cg_cate=t.type_id ')->where($where)->order($order)->limit($Page->firstRow.','.$Page->listRows)->select();
		if($cgdata){

		}else{
			$cgdata=0;
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
        return array('cgdata'=>$cgdata,'page'=>$show);
	}

}
?>