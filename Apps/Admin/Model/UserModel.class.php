<?php
namespace Admin\Model;
use Think\Model;

class UserModel extends Model
{
    protected $tableName = 'user';//数据表
    //protected $tablePrefix = 'bd_'; //数据表前缀
    //protected $dbName = 'topdb'; //用于操作当前数据库以外的数据表
	protected $_validate = array(
							array('uname','require','帐号不能为空'),
							array('upwd','require','密码不能为空'),
							array('code','require','验证码不能为空'),
							array('uname',"#^[a-zA-Z]{1}\w{4,12}$#",'帐号格式不正确',0,'regex',3),
							array('upwd','/^[!@#$%^&*()_+`\-=:\';"<>,.\/\w]{5,12}$/','密码格式不正确',0,'regex',3),
							array('code',"#^[A-Za-z0-9]{4}$#",'验证码格式不正确',0,'regex',3),
						);

    /* *数据库应用领域表查询函数
         *参数：	第一个关联数组，键值为用户表字段名，
        *			作为用户查询的条件。
        *		第二个为索引数组，值为需要需要查询的
        *			字段
        *返回值：关联数组，键值为用户表字段名，值为
        *		用户表中的字段值,(仅查询一条数据)，如
        *		果错误，返回FALSE
        */
    public function selectAll($where = 'terid > 0'){
        $data = $this -> where($where) -> select();
        return $data;
    }

    //获取列表信息带分页
    function getList($where = array()){
        $count = $this-> where($where)->count();
        $Page= new \Think\Page($count,10);              // 实例化分页类 传入总记录数
        $show  = $Page->show();                         // 分页显示输出
        $datalist = $this -> where($where)->limit($Page->firstRow.','.$Page->listRows)->select();
        /*foreach ($datalist as $k => $v)
        {
            $type = M('flink_type')->field('type_name')->where('type_id='.$v['type_id'])->find();
            $datalist[$k]['type_name'] = $type['type_name'];
        }*/
        $data['datalist'] = $datalist;
        $data['page'] = $show;                    // 赋值分页输出

        return $data;
    }

    //查询单条信息
    function getOnce($where){
        return $this -> where($where) -> find();
    }

    //修改指定ID数据
    function updateOne($where,$data){
        return $this -> data($data)->where($where)->save();
    }
}















