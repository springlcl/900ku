<?php
namespace Admin\Model;
use Think\Model;
class permissionsModel extends Model{
    //添加权限
    public function add_priv($data){
        //格式化数据将控制器及方法组合并构建数组
        foreach($data as $key => $value){
            if($key !== 'ac' && $key !== 'co'){
                $post[$key] = $value;
            }
        }
        $post['created_at'] = time();
        $post['name'] = strtolower($data['co'].'-'.$data['ac']);
        //将数据写入数据库
        return $this -> table('bd_permissions') -> add($post);
    }
}