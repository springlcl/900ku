<?php
namespace Admin\Model;
use Think\Model;

class CommentModel extends Model
{
    protected $tableName = 'comment';

    //获取列表信息带分页
    function getList($where = array())
    {
        $count = $this-> where($where)->count();
        $Page= new \Think\Page($count,10);              // 实例化分页类 传入总记录数
        $show  = $Page->show();                         // 分页显示输出
        $datalist = $this->alias('c')
            ->field('c.*,u.username,g.goods_name,ex.ex_name')
            ->join('bd_user as u on u.uid = c.uid')
            ->join('bd_goods as g on g.goods_id = c.gid')
            ->join('bd_exhibition_hall as ex on ex.exid = c.exid')
            ->where($where)->order('c.add_time desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $data['datalist'] = $datalist;
        $data['page'] = $show;                    // 赋值分页输出

        return $data;
    }

    //查询单条信息
    function getOnce($id)
    {
        return  $this->alias('c')
            ->field('c.*,u.username,g.goods_name,ex.ex_name')
            ->join('bd_user as u on u.uid = c.uid')
            ->join('bd_goods as g on g.goods_id = c.gid')
            ->join('bd_exhibition_hall as ex on ex.exid = c.exid')
            ->where('coid ='.$id)->order('c.add_time desc')->find();
    }

    //删除数据
	function delOne($id)
    {
        return $this->where('coid ='.$id)->delete();
    }



}