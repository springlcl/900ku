<?php
namespace Admin\Model;
use Think\Model;

class PropertyModel extends Model
{
    protected $tableName = 'property';

    //获取列表信息带分页
    function getList($where = array()){
        $count = $this-> where($where)->count();
        $Page= new \Think\Page($count,10);              // 实例化分页类 传入总记录数
        $show  = $Page->show();                         // 分页显示输出
        $datalist = $this -> where($where)->order('pro_id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $data['datalist'] = $datalist;
        $data['page'] = $show;                    // 赋值分页输出

        return $data;
    }

    //查询单条信息
    function getOnce($id){
    	return $this -> where('pro_id ='.$id) -> find();
    }

    //修改指定ID数据
	function updateOne($id,$data){
		return $this -> data($data)->where('pro_id='.$id)->save();
	}

    //删除数据
	function delOne($id)
    {
        return $this->where('pro_id ='.$id)->delete();
    }



}