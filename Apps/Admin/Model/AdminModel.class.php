<?php
namespace Admin\Model;
use Think\Model;

class AdminModel extends Model
{
    protected $tableName = 'admin';

    //获取列表信息带分页
    function getList($where = array())
    {
        $count = $this->alias('a')-> where($where)->count();
        $Page= new \Think\Page($count,10);              // 实例化分页类 传入总记录数
        $show  = $Page->show();                         // 分页显示输出
        $datalist = $this->alias('a')
            ->field('a.*,role.role_name')
            ->join('bd_admin_role as role on role.rid = a.rid')
            ->where($where)->order('a.add_time desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $data['datalist'] = $datalist;
        $data['page'] = $show;                    // 赋值分页输出

        return $data;
    }

    //查询单条信息
    function getOnce($id)
    {
        return  $this->alias('a')
            ->field('a.*,role.role_name')
            ->join('bd_admin_role as role on role.rid = a.rid')
            ->where('aid ='.$id)->find();
    }

    function getRole()
    {
        return M('admin_role')->where('status=0')->order('add_time desc')->select();
    }

    //只获取管理员字段的全部信息
    function getLists($where = array()){
        $datalist = $this -> where($where)->select();
        return $datalist;
    }


    //删除数据
	/*function delOne($id)
    {
        return $this->where('coid ='.$id)->delete();
    }*/
}