<?php
namespace Purchaser\Model;
use Think\Model;

class cg_projectModel extends Model
{
	/*
	 * @function Item 		封装采购商项目展览数据
	 * @para1   [string]    $where       	查询条件
	 * @return  [array]          			集合数组
	 * **/
	
	public function Itemdata($purwhere,$userwhere)
	{
		$uid=session('Pur_uid');
		//判断是采购商还是采购员
		$deuid=M('cg_auth')->field('uid')->where('uid='.$uid)->find();
		if($deuid){
		//采购商进入数据
		$db=M('cg_project');
		$Iteming=$db->alias('p')->field('p.Pid,p.uid,p.pro_name,p.manager,p.province,p.city,
			p.area,p.street,p.area_code,p.area_level,p.company,p.taxpayer_num,p.bank_name,
			p.bank_account,p.com_address,p.com_tel,p.add_time,p.deat_time,p.status')
		->where($purwhere)->select();
		$count=count($Iteming);
		$Page= new \Think\Page($count,6);  // 实例化分页类 传入总记录数
		$Itemingdata=$db->alias('p')
		->field('p.Pid,p.uid,p.pro_name,p.manager,p.province,p.city,
			p.area,p.street,p.area_code,p.area_level,p.company,p.taxpayer_num,p.bank_name,
			p.bank_account,p.com_address,p.com_tel,p.add_time,p.deat_time,p.status')
		->where($purwhere)
		->order('p.add_time desc')
		->limit($Page->firstRow.','.$Page->listRows)
		->select();
		// $show=$Page->show();
		if($Itemingdata){
			
		}else{
			$Itemingdata=0;
		} 
		//获取该用户公司信息
		$com=M('cg_auth')->field('Aid,uid,company,province,city,area,street')
						->where('uid='.$uid)->find();			
		}else{
		//采购员进入项目数据
		$db=M('cg_project');
		$pro=M('user')->field('uid,item')->where('uid='.$uid)->find();
		$items=$pro['item'];
		$Iteming=$db->alias('p')
		->field('p.Pid,p.uid,p.pro_name,p.manager,p.province,p.city,
			p.area,p.street,p.area_code,p.area_level,p.company,p.taxpayer_num,p.bank_name,
			p.bank_account,p.com_address,p.com_tel,p.add_time,p.deat_time,p.status')
		->where($userwhere.' and p.Pid in '."(".$items.")")
		->select();
		$count=count($Iteming);
		$Page= new \Think\Page($count,6);  // 实例化分页类 传入总记录数
		$Itemingdata=$db->alias('p')
		->field('p.Pid,p.uid,p.pro_name,p.manager,p.province,p.city,
			p.area,p.street,p.area_code,p.area_level,p.company,p.taxpayer_num,p.bank_name,
			p.bank_account,p.com_address,p.com_tel,p.add_time,p.deat_time,p.status')
		->where($userwhere.' and p.Pid in '."(".$items.")")
		->order('p.add_time desc')
		->limit($Page->firstRow.','.$Page->listRows)
		->select();
		// $show=$Page->show();
		if($Itemingdata){
			
		}else{
			$Itemingdata=0;
		} 
		//获取该用户公司信息
		if($Itemingdata[0]){
		$com=M('cg_auth')
		->field('Aid,uid,company,province,city,area,street')
		->where('uid='.$Itemingdata[0]['uid'])
		->find();	
		}
			
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

		return array('Itemingdata'=>$Itemingdata,'page'=>$show,'com'=>$com);
	}
}
?>