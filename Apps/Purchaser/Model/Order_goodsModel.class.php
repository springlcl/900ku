<?php
/**
 * Created by PhpStorm.
 * User: wwkil
 * Date: 2017/6/12
 * Time: 0:13
 */

namespace Purchaser\Model;
use \Think\Model;

class Order_goodsModel extends Model
{
    public function getSimple($rowList,$access){
        foreach($rowList as $key => $value){
            $id[] = $value['oid'];
        }
        $ids = implode(',', $id);
        $goods = M('Order_goods') -> where('oid in('.$ids.') AND is_access = '.$access) -> select();
        foreach($rowList as $key =>$value){
            foreach($goods as $k => $v){
                $v['standards'] = explode(',', $v['standards']);
                if($value['oid'] == $v['oid']) $rowList[$key]['goods'][] = $v;
            }
        }
        return $rowList;
    }
}