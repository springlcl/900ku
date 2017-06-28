<?php
/**
 * Created by PhpStorm.
 * User: wwkil
 * Date: 2017/4/26
 * Time: 18:38
 */

namespace Supplier\Model;
use Think\Model;

class Goods_attr_nameModel extends Model
{
	public function getAttrs($type){
		if($type){
			// construct SQL sentence
			$sql = "SELECT n.attr_id AS nid,n.attr_name AS aname,v.attr_id AS aid,v.attr_val AS aval FROM bd_goods_attr_name AS n INNER JOIN bd_goods_attr_val AS v ON n.attr_id = v.name_id WHERE n.type_id = $type";
			// get the result of attributes
			$attr = $this -> query($sql);
			// initialize result array
			$temp = array();
			// traverse attributes array to construct the result array
			foreach($attr as $key => $val){
				$temp[$val['aname']][] = $val;
			}
			// return data
			return $temp;
		}
	}
}