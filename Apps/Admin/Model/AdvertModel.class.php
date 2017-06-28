<?php
/**
 * Created by PhpStorm.
 * User: XZQ
 * Date: 2017/6/12
 * Time: 0:52
 */

namespace Admin\Model;
use Think\Model;

class AdvertModel extends Model
{

    protected $tableName = 'ads';

    //查询广告列表
    function getNavList($where){
        return M('ads')->field('tid,type_name,biaoshi,type')->where($where)->order('tid asc')->select();
    }

    //查询单条信息
    function getOnce($where){
        return $this -> where($where) -> find();
    }

    //修改指定ID数据
    function updateOne($id,$data){
        return $this -> data($data)->where('aid='.$id)->save();
    }

    //查询广告分类列表
    function getClassList(){
        return M('ad_type')->field('tid,type_name,biaoshi,type')->select();
    }










    //获取列表信息带分页
    function getList($where){
        $count = $this-> where($where)->count();
        $Page= new \Think\Page($count,10);              // 实例化分页类 传入总记录数
        $show  = $Page->show();                         // 分页显示输出
        $datalist = $this -> field('flink_id,type_id,webname,url,remark,add_time,sort_order,is_show')-> where($where)->order('sort_order desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        foreach ($datalist as $k => $v)
        {
            $type = M('flink_type')->field('type_name')->where('type_id='.$v['type_id'])->find();
            $datalist[$k]['type_name'] = $type['type_name'];
        }
        $data['datalist'] = $datalist;
        $data['page'] = $show;                    // 赋值分页输出

        return $data;
    }





    //修改数据
    function delOneFlink($fid)
    {
        return $this->where('flink_id ='.$fid)->delete();
    }

    //总数
    /*  function getCount($where){
          return $this -> where($where) -> count();
      }*/




}