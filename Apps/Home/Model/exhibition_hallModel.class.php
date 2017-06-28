<?php
namespace Home\Model;
use Think\Model;

class exhibition_hallModel extends Model
{
	/*
	 * @function exdata 					封装展厅展览数据
	 * @para1   [string]    $where   		查询条件
	 * @para2   [string]    $order       	查询排序条件
	 * @return  [array]          			集合数组
	 * **/
	
	public function exdata($where,$order)
	{
		//实例化展厅表
		$ex=M('exhibition_hall');
		//查询展厅数据
		$exdatac=$ex->alias('e')->field('e.exid,e.uid,e.ex_name,e.mcid,e.mid,e.company,e.username,e.tel,e.license,e.province,e.city,e.area,e.street,e.area_code,e.template,e.pv,e.uv,e.is_auth,e.add_time,e.ex_logo,e.ex_intro,e.status,e.warn_num,c.mc_name,c.sort_order,m.model_name')->join('bd_main_category as c on e.mcid=c.mcid')->join('bd_model as m on e.mid=m.mid ')->where($where)->order($order)->select();
		$count=count($exdatac);
		$Page= new \Think\Page($count,5);
		$exdata=$ex->alias('e')->field('e.exid,e.uid,e.ex_name,e.mcid,e.mid,e.company,e.username,e.tel,e.license,e.province,e.city,e.area,e.street,e.area_code,e.template,e.pv,e.uv,e.is_auth,e.add_time,e.ex_logo,e.ex_intro,e.status,e.warn_num,c.mcid,c.mc_name,c.sort_order,m.model_name')->join('bd_main_category as c on e.mcid=c.mcid')->join('bd_model as m on e.mid=m.mid ')->where($where)->order($order)->limit($Page->firstRow.','.$Page->listRows)->select();
		if($exdata){

		}else{
			$exdata=0;
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
		//店铺所有类目
		$cate=M('main_category');
		$allcate=$cate->field('mcid,mc_name,sort_order')->order('sort_order desc')->select();
		//优质展厅
		$goodex=$ex->alias('e')->field('e.exid,e.uid,e.ex_name,e.tel,e.province,e.city,e.area,e.ex_logo')->where('e.is_auth=1 and e.status=0')->order('e.uv desc')->limit('0,2')->select();
        //展厅数据，分页，店铺分类,优质展厅
        return array('exdata'=>$exdata,'page'=>$show,'allcate'=>$allcate,'goodex'=>$goodex);

	}
}
?>