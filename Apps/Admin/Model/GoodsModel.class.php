<?php
namespace Admin\Model;
use Think\Model;

class GoodsModel extends Model
{
    protected $tableName = 'goods';

    //获取列表信息带分页
    function getList($where = array())
    {
        $count = $this-> where($where)->count();
        $Page= new \Think\Page($count,10);              // 实例化分页类 传入总记录数
        $show  = $Page->show();                         // 分页显示输出
        $datalist = $this->alias('g')
            ->field('g.*,gc.gc_name,ex.ex_name')
            ->join('bd_goods_cate as gc on gc.gcid = g.goods_cate_id')
            ->join('bd_exhibition_hall as ex on ex.exid = g.exid')
            ->where($where)->order('g.add_time desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $data['datalist'] = $datalist;
        $data['page'] = $show;                    // 赋值分页输出

        return $data;
    }

    //查询单条信息
    /*function getOnce($id)
    {
        return  $this->alias('c')
            ->field('c.*,u.username,g.goods_name,ex.ex_name')
            ->join('bd_user as u on u.uid = c.uid')
            ->join('bd_goods as g on g.goods_id = c.gid')
            ->join('bd_exhibition_hall as ex on ex.exid = c.exid')
            ->where('coid ='.$id)->order('c.add_time desc')->find();
    }*/

    //删除数据
	/*function delOne($id)
    {
        return $this->where('coid ='.$id)->delete();
    }*/

    //总数
    function getCount($where){
        return $count = $this-> where($where)->count();
    }

    //销售总额
    function getSum($where,$sum){
        return $count = $this-> where($where)->sum($sum);
    }

    //统计商品订单
    function getGoodsOrder($where){
        $count = $this-> where($where)->count();
        $Page= new \Think\Page($count,10);              // 实例化分页类 传入总记录数
        $show  = $Page->show();
        $datalist =  $this ->where($where)->order('goods_sale_num desc,add_time desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $data['datalist'] = $datalist;
        $data['page'] = $show;                    // 赋值分页输出

        return $data;
    }

    //商品数量
    function getGoodsCount($where){
        return M('order_goods')->where($where)->count();
    }

    //商品分类--所有
    function getGoodsCate(){
        return M('goods_cate') -> where('status=0') -> select();
    }

    //商品分类--单个
    function getGoodsCateOnly(){
        return M('goods_cate') -> where('status=0') -> find();
    }
}