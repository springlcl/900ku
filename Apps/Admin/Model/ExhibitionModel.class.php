<?php
namespace Admin\Model;
use Think\Model;

class ExhibitionModel extends Model
{
    protected $tableName = 'exhibition_hall';

    //获取列表信息带分页
    function getList($where = array()){
        $count = $this-> where($where)->count();
        $Page= new \Think\Page($count,10);              // 实例化分页类 传入总记录数
        $show  = $Page->show();                         // 分页显示输出
        $datalist = $this -> where($where)->limit($Page->firstRow.','.$Page->listRows)->select();
    	foreach ($datalist as $k => $v)
    	{
    	    $type = M('main_category')->field('mc_name')->where('mcid='.$v['mcid'])->find();
            $datalist[$k]['mc_name'] = $type['mc_name'];
        }
        $data['datalist'] = $datalist;
        $data['page'] = $show;                    // 赋值分页输出

        return $data;
    }

    //只获取展厅字段的全部信息
    function getLists($where = array()){
        $datalist = $this -> where($where)->select();
        return $datalist;
    }

    //查询单条信息
    function getOnce($where){
        $list = $this -> where($where) -> find();
        $type = M('main_category')->field('mc_name')->where('mcid='.$list['mcid'])->find();
        $list['mc_name'] = $type['mc_name'];
        $type = M('model')->field('model_name')->where('mid='.$list['mid'])->find();
        $list['model_name'] = $type['model_name'];
        return $list;
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
  /*  function getCount($where){
        return $this -> where($where) -> count();
    }*/
    //查询友情链接分类
    function getClassList(){
        return M('flink_type')->field('type_id,type_name')->select();
    }

    //数量
    function getCount($where){
        return $count = $this-> where($where)->count();
    }



}