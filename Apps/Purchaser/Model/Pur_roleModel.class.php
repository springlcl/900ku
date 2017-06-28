<?php
/**
 * Created by PhpStorm.
 * User: wwkil
 * Date: 2017/6/6
 * Time: 16:19
 */

namespace Purchaser\Model;
use Think\Model;

class Pur_roleModel extends Model
{
    /**
     * @param $dataList [array]     [数据清单，该角色的数据]
     * @param $belong   [numeric]   [从属采购商的ID]
     * @param $action   [string]    [操作的动作添加或者更新]
     * @return [mixed]  [返回数据错误时为字符串，成功时返回数值]
     */
    public function role($dataList,$belong,$action='add'){
        $pers = (count($dataList['per']) > 0) ? implode(',',$dataList['per']) : 0;
        $map['per_id'] = array('in',$pers);
        $perssions = M('pur_permission')
            -> field('per_path')
            -> where($map)
            -> select();
        $path = '';
        foreach ($perssions as $val) {
            if(!empty($val['per_path'])) $path .= $val['per_path'].',';
        }
        $path = rtrim($path,',');
        $data = array(
            'role_name'     => $dataList['name'],           // 角色名称
            'description'   => $dataList['desc'],           // 角色职责描述
            'role_pers'     => $pers,                       // 角色权限ID集合
            'role_paths'    => $path,                       // 角色地址栏路径
            'pur_id'        => $belong,                     // 角色采购商ID
        );
        if(!empty($dataList['rid'])) $data['role_id'] = $dataList['rid'];
        $rule = array(
            // 验证字段,验证方法,错误提示信息,验证条件0/1/2,验证方法所使用的规则,验证时间
            array('role_name', 'require', '必须有一个角色名称', 1, '', 3),
            array('role_name', '0,20', '角色名称不得超过20个字符', 1, 'length', 3),
            array('description', 'require', '必须填写角色职责描述', 1, '', 3),
            array('description', '0,255', '角色描述不得超过255个字符', 1, 'length', 3),
        );
        if(!$this -> validate($rule) -> create($data)){
            return $this -> getError();
        }else{
            $result = $this -> $action($data);
            return $result;
        }
    }

    public function getAuth($role){
        $pers = $this -> field('role_pers') -> where('role_id = '.$role) -> find();
        $auth = M('pur_permission')
            -> field('per_name AS name,per_id AS id,per_pid AS pid')
            -> where('per_id in ('.$pers['role_pers'].')')
            -> select();
        $auth = gettree($auth,'id','pid');
        return $auth;
//        dump($auth);die;
    }
}