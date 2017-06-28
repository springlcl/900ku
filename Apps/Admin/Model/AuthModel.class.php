<?php
namespace Admin\Model;
use Think\Model;

class AuthModel extends Model
{
    protected $tableName = 'cg_auth';

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

    //待认证/认证的采购商
    function getAuthUser($where = array(),$where1 = array()){
        $count = $this->alias('auth')-> where($where)->count();
        $Page= new \Think\Page($count,10);              // 实例化分页类 传入总记录数
        $show  = $Page->show();
        $list = $this
            ->alias('auth')
            ->field('user.*,auth.status')
            ->join('left join bd_user as user on user.uid = auth.uid')
            ->where($where1)
            ->limit($Page->firstRow.','.$Page->listRows)
            ->select();

        $data['datalist'] = $list;
        $data['page'] = $show;
        return $data;
    }



}