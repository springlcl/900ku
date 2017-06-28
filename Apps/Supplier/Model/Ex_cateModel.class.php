<?php
/**
 * Created by PhpStorm.
 * User: wwkil
 * Date: 2017/4/21
 * Time: 15:10
 */

namespace Supplier\Model;
use Think\Model;


class Ex_cateModel extends Model
{
	/*
	 * @function getGroup 查询展厅内分组
	 * @para1   [string]    $name       查询的分类名
	 * @para2   [integer]   $hall       展厅ID
	 * @return  [array]     $cateId     分组名称集合数组
	 * **/
	public function getGroup($name,$hall){
		$sql = 'SELECT excname AS cname,excid AS cid FROM bd_ex_cate WHERE exid = '.$hall.' AND (excname LIKE "%'.$name.'%" OR excname LIKE "'.$name.'%" OR excname LIKE "%'.$name.'") ORDER BY sort_order';
		$result = $this -> query($sql);
		if(is_array($result)){
			$result['error'] = 200;
			return $result;
		}else{
			return array('msg' => '没有展厅分组信息!','error' => 201);
		}
	}


	public function getCateDetail($exid,$key='',$page=1){
		$size = 10;
		$p = $page ? $page : 1;
		$start = ($p-1)*$size;
		if(empty($key)){
			$where = 'exid = '.$exid;

		}else{
			$where = 'exid = '.$exid.' AND (excname LIKE "%'.$key.'%" OR excname LIKE "'.$key.'%" OR excname LIKE "%'.$key.'")';
		}
		$cate = $this
			-> field('excid AS cid,excname AS cname,sort_order AS sort,add_time AS crea')
			-> where($where)
			-> limit($start.','.$size)
			-> select();
		$count = $this -> where($where) -> count();
		foreach($cate as $key => $value){
			$cid = $value['cid'];
			$cate[$key]['onsale'] = M('goods')->where('exid = '.$exid.' AND ex_goods_cid = '.$cid.' AND is_sell = 1')->count();
			$cate[$key]['stock'] = M('goods')-> where('exid = '.$exid.' AND ex_goods_cid = '.$cid.' AND is_sell = 0')->count();
		}
		$cate = init_time($cate,'Y-m-d',true);
		$arr = array(
			'cate'  => $cate,
			'count' => $count,
		);
		return $arr;
	}

}