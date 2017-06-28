<?php
namespace Admin\Model;
use Think\Model;

class ProjectModel extends Model
{
    protected $tableName = 'cg_project';

    //获取列表信息带分页
    function getList($where = array(),$where2 = array()){
        $count = $this-> where($where)->count();
        $Page= new \Think\Page($count,10);              // 实例化分页类 传入总记录数
        $show  = $Page->show();                         // 分页显示输出
        $datalist = $this -> where($where)->order('sort_order')->limit($Page->firstRow.','.$Page->listRows)->select();
        foreach ($datalist as $k => $v)
    	{
    	    $type = M('exhibition_hall')->field('ex_name')->where($where2)->find();
            $datalist[$k]['ex_name'] = $type['ex_name'];
        }
        $data['datalist'] = $datalist;
        $data['page'] = $show;                    // 赋值分页输出

        return $data;
    }


    //只获取采购商项目字段的全部信息
    function getLists($where = array()){
        $datalist = $this -> where($where)->select();
        return $datalist;
    }

    //查询单条信息
    function getOnce($where){
    	return $this -> where($where) -> find();
    }

    //修改指定ID数据
	function updateOne($where,$data){
		return $this -> data($data)->where($where)->save();
	}

    //删除数据
	function delOne($where)
    {
        return $this->where($where)->delete();
    }

    //添加数据
    function addData($add){
        return $this -> data($add)->add();
    }

    //总数
    function getCount($where){
        return $this -> where($where) -> count();
    }
    //查询分类
   /* function getClassList(){
        return M('flink_type')->field('type_id,type_name')->select();
    }*/



}