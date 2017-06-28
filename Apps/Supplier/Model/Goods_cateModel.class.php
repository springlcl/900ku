<?php
/**
 * Created by PhpStorm.
 * User: wwkil
 * Date: 2017/4/21
 * Time: 14:49
 */

namespace Supplier\Model;
use Think\Model;


class Goods_cateModel extends Model
{
	/*
	 * @function getCates 通过获取parent_id获取其下的子分类
	 * @para [integer]  $cateId 父分类的ID,parent_id
	 * @para [integer]  $level  三级分类中的级别
	 * @para [integer]  $exid   展厅ID 默认为0
	 * @para [integer]  $attach 是否查询附加信息 默认为"真"
	 * @return [array] $cateId下第$level级的子分类集合数组
	 * **/
	public function getCate($cateId,$level,$attach = true){
		// 查询所有分类待程序筛选
		$sql = "SELECT gcid AS cid,gc_name AS cname,parent_id AS pid,type_id FROM bd_goods_cate ORDER BY sort_order";
		$result = $this->query($sql);
		$res = getChild($result,'cid','pid',$cateId,$level);
		// 将返回结果的最后一个数组弹出用作查询属性名与属性值的条件
		$last = array_pop($res);
		// 将数组恢复
		$res[] = $last;
		// 判断弹出数组是否为二维数组,if the result is true then catch the first element
		$last = is_array($last[0])?$last[0]:$last;
		if($attach){
			// 实例化商品属性名模型取出属性名与属性值
			$model = new \Supplier\Model\Goods_attr_nameModel();
			$attr = $model -> getAttrs($last['type_id']);
			$type = $last['type_id'];
			$result = array(
				'cate'  => $res,
				'error' => 100,
				'attr'  => $attr,
                'type'  => $type
			);
		}else{
			$result = $res;
		}
		return $result;
	}





}