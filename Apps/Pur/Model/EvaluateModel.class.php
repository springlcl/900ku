<?php
namespace Wap\Model;
use Think\Model;
class EvaluateModel extends Model{
    //查询评论get_comment
    public function get_comment($id){
        //依据仪器ID得到评论条数等信息
        $temp = $this -> field('content,score,uid') -> where("eid = $id") -> select();
        //循环查找user表中的用户名及用户头像
        $user = new \Wap\Model\UserModel();
        foreach($temp as $key => $value){
            $u = $user -> field('username,avatar') -> where("uid = $value[uid]") -> find();
            $res[$key] = array_merge($temp[$key],$u);
        }
        //将数组进行合并形成查询结果
        return $res;
    }
}