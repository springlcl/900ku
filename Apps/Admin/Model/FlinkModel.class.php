<?php
namespace Admin\Model;
use Think\Model;

class FlinkModel extends Model
{
    protected $tableName = 'flink';

    //获取列表信息带分页
    function getList($where = array()){
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

    //查询单条信息
    function getOnce($where){
    	return $this -> where($where) -> find();
    }

    //修改指定ID数据
	function updateOneFlink($fid,$data){
		return $this -> data($data)->where('flink_id='.$fid)->save();
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
    //查询友情链接分类
    function getClassList(){
        return M('flink_type')->field('type_id,type_name')->select();
    }



}