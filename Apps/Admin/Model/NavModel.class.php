<?php
namespace Admin\Model;
use Think\Model;

class NavModel extends Model
{
    protected $tableName = 'nav';

    //查询导航列表
    function getNavList($where = array()){
        return M('nav')->field('nav_id,nav_type_id,nav_name,url,add_time,sort_order')->where($where)->order('sort_order asc')->select();
    }

    //查询单条信息
    function getOnce($where){
        return $this -> where($where) -> find();
    }

    //修改指定ID数据
    function updateOne($id,$data){
        return $this -> data($data)->where('nav_id='.$id)->save();
    }

    //查询导航分类列表
    function getClassList(){
        return M('nav_type')->field('nav_type_id,type_name,biaoshi,liebiao')->select();
    }
}