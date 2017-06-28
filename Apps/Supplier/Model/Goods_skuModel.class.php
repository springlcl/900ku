<?php
/**
 * Created by PhpStorm.
 * User: wwkil
 * Date: 2017/5/8
 * Time: 17:49
 */

namespace Supplier\Model;
use Think\Model;

class Goods_skuModel extends Model
{

	public function addSku($post,$id){
		for($i = 0;$i < 3;$i++){
			if(!empty($post['property'.($i+1)]) && !empty($post['value'.($i+1).'_values'])){
				$property['property'][] = $post['property'.($i+1)];
				$property['values'][] = $post['value'.($i+1).'_values'];
			}
		}
		// 属性集群
		$pros = getSku($property);
		// 遍历形成最终最终sku数组
		foreach ($pros as $key => $value){
			$res[$key] = array(
				'goods_id'          => $id,
				'goods_weight'      => $post['weight'][$key],
				'goods_price'       => $post['price'][$key],
				'goods_num'         => $post['stock'][$key],
				'goods_code'        => $post['code'][$key],
				'goods_sale_num'    => $post['count'][$key],
				'attributes'        => $pros[$key],
			);
		}
		$result = $this -> addAll($res);
		if(!$result){
			$msg = $this -> getDbError();

			return $msg;
		}
		return true;
	}

	public function editSku($post,$id){
        for($i = 0;$i < 3;$i++){
            if(!empty($post['property'.($i+1)]) && !empty($post['value'.($i+1).'_values'])){
                $property['property'][] = $post['property'.($i+1)];
                $property['values'][] = $post['value'.($i+1).'_values'];
            }
        }
        // 属性集群
        $pros = getSku($property);
        // 遍历形成最终最终sku数组
        if(isset($post['skuid'][0])){
            foreach ($pros as $key => $value){
                $res[$key] = array(
                    'goods_id'          => $id,
                    'sku_id'            => $post['skuid'][$key],
                    'goods_weight'      => $post['weight'][$key],
                    'goods_price'       => $post['price'][$key],
                    'goods_num'         => $post['stock'][$key],
                    'goods_code'        => $post['code'][$key],
                    'goods_sale_num'    => $post['count'][$key],
                    'attributes'        => $value,
                );
            }
            $result = $this -> saveAll($res);
        }else{
            foreach ($pros as $key => $value){
                $res[$key] = array(
                    'goods_id'          => $id,
                    'goods_weight'      => $post['weight'][$key],
                    'goods_price'       => $post['price'][$key],
                    'goods_num'         => $post['stock'][$key],
                    'goods_code'        => $post['code'][$key],
                    'goods_sale_num'    => $post['count'][$key],
                    'attributes'        => $value,
                );
            }
            $stat = $this -> where('goods_id = '.$id) -> delete();
            if(!!$stat) $result = $this -> addAll($res);
        }
        if(!$result){
            $msg = $this -> getError();
            if(empty($msg)){
                $msg = '未有商品规格更改！';
            }
            return $msg;
        }
        return true;
    }
}