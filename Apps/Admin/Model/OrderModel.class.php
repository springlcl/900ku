<?php
namespace Admin\Model;
use Think\Model;

class OrderModel extends Model
{
    protected $tableName = 'order';

    //获取列表信息带分页
    function getList($where = array())
    {
        $count = $this->alias('o')->where($where)->count();
        $Page= new \Think\Page($count,10);              // 实例化分页类 传入总记录数
        $show  = $Page->show();                         // 分页显示输出
        $datalist = $this->alias('o')
            ->field('o.*,sup.username as sup_name,pur.username as pur_name')
            ->join('bd_user as sup on sup.uid = o.sup_id')
            ->join('bd_user as pur on pur.uid = o.pur_id')
            /*->join('bd_exhibition_hall as ex on ex.exid = g.exid')*/
            ->where($where)->order('o.created desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        foreach ($datalist as $k => $v)
        {
            $goods = M('order_goods')->field('goods_name,goods_price,goods_count')->where('oid='.$v['oid'])->find();
            $datalist[$k]['goods_name'] = $goods['goods_name'];
            $datalist[$k]['goods_price'] = $goods['goods_price'];
            $datalist[$k]['goods_count'] = $goods['goods_count'];
        }
        $data['datalist'] = $datalist;
        $data['page'] = $show;                    // 赋值分页输出

        return $data;
    }



    //查询单条信息
    function getOnce($id)
    {
        $data['info'] = $this->alias('o')
            ->field('o.*,ex.ex_name,ex.province,ex.city,ex.area,pro.pro_name,rec.receive_name,rec.receive_call')
            ->join('bd_exhibition_hall as ex on ex.exid = o.exid')
            ->join('bd_cg_project as pro on pro.pid = o.pid')
            ->join('bd_receive as rec on rec.rec_id = o.rec_id')
            /*->join('bd_exhibition_hall as ex on ex.exid = g.exid')*/
            ->where('o.oid = '.$id)->find();

            if($data['info']['express_id'])
            {
                $express = M('express')->where('eid = '.$data['info']['express_id'])->find();
                $data['info']['kuaidi_name'] = $express['ex_name'];
                $data['info']['kuaidi_code'] = $express['ex_code'];
            }else{
                $data['info']['kuaidi_name'] = '';
                $data['info']['kuaidi_code'] = '';
            }

        $data['goods'] = M('order_goods')->alias('go')
            ->field('o.order_code,go.goods_thumb,go.goods_name,go.goods_price,go.goods_count,go.goods_total,go.standards,g.goods_num')
            ->join('bd_goods as g on g.goods_id = go.goods_id')
            ->join('bd_order as o on o.oid = go.oid')
            ->where('go.oid = '.$id)->select();

        $data['order_log'] = M('order_log')->alias('log')->field('log.*,u.username')->join('bd_user as u on u.uid = log.uid')->where('log.oid = '.$id)->select();

        return $data;
    }

    //删除数据
	/*function delOne($id)
    {
        return $this->where('coid ='.$id)->delete();
    }*/
}