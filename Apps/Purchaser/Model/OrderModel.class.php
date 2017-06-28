<?php
/**
 * Created by PhpStorm.
 * User: wwkil
 * Date: 2017/6/12
 * Time: 14:52
 */

namespace Purchaser\Model;
use Think\Model;

class OrderModel extends Model
{
    public function getOrders($dataList = array(), $pur = 0, $pt_role, $access = 0){
        /*初始化页码*/
        $page = empty($dataList['page']) ? 1 : $dataList['page'];
        /*每页限制15个订单*/
        $size = 15;
        /*定义起始页码*/
        $start = ($page-1)*$size;
        /*查询字段*/
        $field = 'o.oid AS id,o.created AS start,o.comp_time AS end,o.pre_time AS pre,o.send_time AS sent,o.insp_time AS inspection,o.order_code AS code,o.pur_id AS purchaser,o.total AS sum,o.paid_amount AS paid,o.paid_deadline AS deadline,o.status AS state,o.pay_stat AS ps,o.deal_stat AS ds,o.is_access AS oss,o.pay AS should,e.ex_name AS exhibition,a.prepayment AS prepercent,a.payment_ratio AS ratpercent,a.inspection AS insppercent,a.warranty AS warrpercent,warranty_pt AS promis,g.goods_id AS gid,g.sku_id AS sid,g.goods_name AS gname,g.goods_price AS gprice,g.goods_code AS gcode,g.goods_thumb AS gthumb,g.goods_count AS gcount,g.goods_preprice AS gpreprice,g.goods_total AS gtotal,g.standards';
        /*构造where子句开始*/
        $where = 'o.pur_id = '.$pur.' AND o.is_return = 0 AND o.is_access = '.$access;
        if(strlen($dataList['kw']) > 0) $where .= ' AND (o.order_code LIKE "%'.$dataList['kw'].'%" OR g.goods_name LIKE "%'.$dataList['kw'].'%") ';
        if(strlen($dataList['sup']) > 0) $where .= ' AND o.exid IN ('.$dataList['sup'].') ';
        if(strlen($dataList['pro']) > 0) $where .= 'AND o.pid IN ('.$dataList['pro'].') ';
        if(!empty($dataList['paid'])) $where .= ' AND o.pay_stat IN ('.$dataList['paid'].')';
        if(!empty($dataList['ord'])) $where .= ' AND o.deal_stat IN ('.$dataList['ord'].')';
        if(strlen($dataList['start']) > 0 && strlen($dataList['end']) > 0) $where .= ' AND o.comp_time BETWEEN '.$dataList['start'].' AND '.$dataList['end'];
        /*where子句构造完毕*/
        /*查询总条目数的sql*/
        if(empty($dataList['page'])){
            $count = $this -> field('count(distinct o.oid) AS num') -> alias('o') -> where($where) -> join(' INNER JOIN bd_order_goods AS g ON o.oid = g.oid') -> find();
        }
        $sql_d = 'SELECT '.$field.' FROM bd_order AS o INNER JOIN bd_admit AS a ON o.pur_id = a.uid AND o.pid = a.pid AND o.exid = a.exid INNER JOIN bd_exhibition_hall AS e ON e.exid = o.exid INNER JOIN bd_order_goods AS g ON o.oid = g.oid WHERE '.$where.' LIMIT '.$start.','.$size;
        $data = $this -> query($sql_d);
        $i = 0;
        foreach($data as $key => $value){
            $array[$key] = array_chunk($value,22,true);
            $diff = array_diff_assoc($array[$key][0],$array[$key-1][0]);
            $array[$key][1]['standards'] = explode(',', $array[$key][1]['standards']);
            if(!empty($diff)){
                $i++;
                $result[$i] = $array[$key][0];
                $result[$i]['goods'][] = $array[$key][1];
            }else{
                if(empty($result[$i])) $result[$i] = $array[$key][0];
                $result[$i]['goods'][] = $array[$key][1];
            }
            /*交易状态、订单状态、进度条显示状态*/
            $data = array(
                'ps'        => $value['ps'],
                'ds'        => $value['ds'],
                'stat'      => $value['state'],
                'pt'        => $pt_role,
                'oid'       => $value['id'],
                'pre'       => $value['prepercent'],
                'rat'       => $value['ratpercent'],
                'insp'      => $value['insppercent'],
                'warr'      => $value['warrpercent'],
                'oss'       => $value['oss'],
            );

            $stat = $this->getStat($data);
            $result[$i] = array_merge($result[$i],$stat);
        }
        $result = init_time($result,'Y-m-d',true);
        $arr = array(
            'count' => $count['num'],
            'data'  => $result,
        );
        return $arr;
    }

    protected function getStat($dataList){
        $value = array();
        if($dataList['pt'] == 2){
            if($dataList['oss'] == 1){
                switch ($dataList['ps']){
                    case 0:
                        $value['pss'] = '待付预付款';
                        break;
                    case 1:
                        $value['pss'] = '预付款已付';
                        break;
                    case 2:
                        $value['pss'] = '发货款已付';
                        break;
                    case 3:
                        $value['pss'] = '验收款已付';
                        break;
                    case 4:
                        $value['pss'] = '质保金已付';
                        break;
                }
                switch ($dataList['ds']){
                    case 0:
                        $value['dss'] = '商品下单';
                        $value['button']    = array(array('bg-clv btn-70x25 col-fff bor-r5 mgb10 pay_button','button','立即付款'),array('btn-lan-80 dis_inb cancel_order_btn','button','取消订单'),array('btn-lan-80 dis_inb datil_button mgt10','button','查看详情','url'=>U('detail',array('oid'=>$dataList['oid']))));
                        $value['explain']   = '(预付款'.$dataList['pre'].'%)';
                        break;
                    case 1:
                        $value['dss'] = '支付预付款';
                        $value['button']    = array(array('btn-lan-80 dis_inb apply_refund_btn','button','申请退款'),array('btn-lan-80 dis_inb datil_button mgt10','button','查看详情','url'=>U('detail',array('oid'=>$dataList['oid']))));
                        break;
                    case 2:
                        $value['dss'] = '商品出库';
                        $value['button']    = array(array('bg-clv btn-70x25 col-fff bor-r5 mgb10 pay_button','button','立即付款'),array('btn-lan-80 dis_inb apply_refund_btn','button','申请退款'),array('btn-lan-80 dis_inb datil_button mgt10','button','查看详情','url'=>U('detail',array('oid'=>$dataList['oid']))));
                        $value['explain']   = '(发货款'.$dataList['rat'].'%)';
                        break;
                    case 3:
                        $value['dss'] = '支付发货款';
                        $value['button']    = array(array('btn-lan-80 dis_inb apply_refund_btn','button','申请退款'),array('btn-lan-80 dis_inb datil_button mgt10','button','查看详情','url'=>U('detail',array('oid'=>$dataList['oid']))));
                        break;
                    case 4:
                        $value['dss'] = '供应商发货';
                        $value['button']    = array(array('mgb10','span',$dataList['deadline']),array('bg-clv btn-70x25 col-fff bor-r5 mgb10 confirm_button','button','确认收货'),array('btn-lan-80 dis_inb apply_refund_btn','button','申请退款'),array('btn-lan-80 dis_inb datil_button mgt10','button','查看详情','url'=>U('detail',array('oid'=>$dataList['oid']))));
                        $value['explain']   = '(验收款'.$dataList['insp'].'%)';
                        break;
                    case 5:
                        $value['dss'] = '待供应商确认验收款';
                        $value['button']    = array(array('btn-lan-80 dis_inb datil_button mgt10','button','查看详情','url'=>U('detail',array('oid'=>$dataList['oid']))));
                        break;
                    case 6:
                        $value['dss'] = '支付质保金';
                        $value['button']    = array(array('bg-clv btn-70x25 col-fff bor-r5 mgb10 pay_button','button','立即付款'), array('btn-lan-80 dis_inb datil_button mgt10','button','查看详情','url'=>U('detail',array('oid'=>$dataList['oid']))));
                        $value['explain']   = '(验收款'.$dataList['warr'].'%)';
                        break;
                    case 7:
                        $value['dss'] = '订单完成';
                        $value['button']    = array(array('btn-lan-80 dis_inb datil_button mgt10','button','查看详情','url'=>U('detail',array('oid'=>$dataList['oid']))));
                        break;
                    case 8:
                        $value['dss'] = '退款申请中';
                        break;
                    case 9:
                        $value['dss'] = '退款/退货中';
                        break;
                    case 10:
                        $value['dss'] = '交易关闭';
                        break;
                }
            }elseif ($dataList['oss'] == 0){

            }
        }
        return $value;
    }

    protected function getSame($data){
        $arr = array();
        foreach($data as $key => $value){
            if($value['oid'] != $data[$key-1]['oid']){

            }
        }
    }
}