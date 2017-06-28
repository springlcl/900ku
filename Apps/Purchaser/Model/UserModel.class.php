<?php
/**
 * Created by PhpStorm.
 * User: wwkil
 * Date: 2017/5/26
 * Time: 15:56
 */

namespace Purchaser\Model;
use Think\Model;

class UserModel extends Model
{
    /**
     * @param $data     [array]     查询条件的的$_POST数组
     * @param $belong   [numeric]   员工所属的采购商管理员ID
     * @param $uid      [numeric]   员工自身的ID
     * @return array 返回值：count=》总条目数，dataList=》数据清单
     */
    public function selUser($data,$belong,$uid){
        /*初始化页码*/
        $page = isset($data['page']) ? $data['page'] : 1;
        $size = 15;
        $start = ($page - 1) * $size;
        /*定义sql查询域*/
        $field = 'u.uid AS id,u.user_num AS code,u.headimg AS avatar,u.username AS name,u.real_name AS `real`,u.mobile AS phone_num,u.email AS em_address,u.status AS stat,p.pro_name AS project,r.role_name AS role ';
        /*定义连表字符串*/
        $join = 'bd_user AS u LEFT JOIN bd_cg_project AS p ON p.pid = u.item LEFT JOIN bd_pur_role AS r ON u.role = r.role_id ';
        /*where子句开始*/
        $where = 'u.pt_role = 2 AND u.belong = '.$belong.' AND u.uid != '.$uid;
        if (strlen($data['project'])>0) $where .= ' AND u.item in ('.$data['project'].')';
        if (strlen($data['role'])>0) $where .= ' AND u.role in ('.$data['role'].')';
        if (strlen($data['status'])>0) $where .= ' AND u.status in ('.$data['status'].')';
        if (strlen($data['key'])) $where .= ' AND ( u.real_name LIKE "%'.$data['key'].'%" OR u.username LIKE "%'.$data['key'].'%")';
        /*where子句结束*/
        /*查询数据总和*/
        $sql_c = 'SELECT count(*) AS `count` FROM '.$join.'WHERE ('.$where.') ';
        $count = $this -> query($sql_c);
        /*查询分页数据*/
        $sql = 'SELECT '.$field.'FROM '.$join.'WHERE ('.$where.') LIMIT '.$start.','.$size;
//        dump($sql);die;
        $users = $this -> query($sql);
        $arr = array(
            'count'     => $count[0]['count'],
            'dataList'  => $users,
        );
        return $arr;
    }

    public function addUser ($dataList) {
//        dump($dataList);die;
        /*罗列数据*/
        $data = array(
            'pt_role'   => 2,                           // 平台角色1为供应商2为采购商
            'belong'    => $dataList['manager'],        // 从属供应商ID
            'username'  => $dataList['name'],           // 用户昵称
            'mobile'    => $dataList['phone'],          // 手机号
            'email'     => $dataList['em'],             // 电子邮箱
            'item'      => $dataList['project'],        // 项目/展厅
            'role'      => $dataList['role'],           // 用户组（角色）
            'user_num'  => $dataList['code'],           // 员工编号
            'headimg'   => $dataList['avatar'],         // 头像地址
            'real_name' => $dataList['real'],           // 真实名字
            'add_time'  => time(),                      // 添加时间（戳）
            'status'    => 1                            // 默认用户状态（启用、禁用）
        );
        /*测试阶段数据为空时将数据固定化，待后期清除*/
//        $data['item'] = is_null($data['item']) ? 0 : $data['item'];
        $data['role'] = is_null($data['role']) ? 0 : $data['role'];
        $data['headimg'] = is_null($data['headimg']) ? 0 : $data['headimg'];
//        $data['real_name'] = is_null($data['real_name']) ? 0 : $data['real_name'];
        /*固定化必要数据结束*/
        /*动态验证每个字段是否符合数据库数据类型*/
        $rule = array(
            // 验证字段,验证方法,错误提示信息,验证条件0/1/2,验证方法所使用的规则,验证时间
            array('username', 'require', '账户昵称不能为空！', 1, 'regex', 1),
            array('mobile', 'mobile', '手机号码格式错误！', 1, 'regex', 1),
            array('email', 'email', '电子邮箱格式错误！', 1, 'regex', 1),
            array('user_num', '0,20', '员工编号不得超过20位', 1, 'length', 1),
//            array('item', 'require', '该员工必须有一个项目', 1, '', 1),
//            array('role', 'require', '该员工必须有一个角色', 1, '', 1),
//            array('headimg', 'require', '必须有一个员工头像', 1, '', 1),
//            array('real_name', 'require', '真实姓名不得为空', 1, '', 1),
        );
        /*动态验证结束*/
        /*创建数据是否成功，并返回数据*/
        if(!$this -> validate($rule) -> create($data)){
            return $this -> getError();
        }else{
            $uid = $this -> add($data);
            return $uid;
        }
    }

    public function changeStat($dataList){
        // 遍历数组构造saveAll方法需要的数据格式
        foreach ($dataList['ids'] as $key => $value) {
            $data[$key]['uid'] = $value;
            $data[$key]['status'] = $dataList['stat'];
        }
        // 使用saveAll方法更新数据
        $result = $this -> saveAll($data);
        // 更新成功返回数据为更新的条目数
        if(is_numeric($result) && $result == count($data)) {
            $arr = array(
                'status'    => 'success',
                'ids'       => $dataList['ids']
            );
        } else {
            $arr = array(
                'status'  => 'error',
            );
        }
        return $arr;
    }


    public function editUser($dataList,$belong){
        /*罗列数据*/
        $data = array(
            'uid'       => $dataList['uid'],            // 用户ID主键
            'pt_role'   => 2,                           // 平台角色1为供应商2为采购商
            'belong'    => $belong,                     // 从属供应商ID
            'username'  => $dataList['name'],           // 用户昵称
            'mobile'    => $dataList['phone'],          // 手机号
            'email'     => $dataList['em'],             // 电子邮箱
            'item'      => $dataList['project'],        // 项目/展厅
            'role'      => $dataList['role'],           // 用户组（角色）
            'user_num'  => $dataList['code'],           // 员工编号
            'headimg'   => $dataList['avatar'],         // 头像地址
            'real_name' => $dataList['real'],           // 真实名字
            'add_time'  => time(),                      // 添加时间（戳）
            'status'    => 1                            // 默认用户状态（启用、禁用）
        );
        /*测试阶段数据为空时将数据固定化，待后期清除*/
        $data['headimg'] = is_null($data['headimg']) ? 0 : $data['headimg'];
        /*固定化必要数据结束*/
        /*动态验证每个字段是否符合数据库数据类型*/
        $rule = array(
            // 验证字段,验证方法,错误提示信息,验证条件0/1/2,验证方法所使用的规则,验证时间
            array('username', 'require', '账户昵称不能为空！', 1, 'regex', 2),
            array('mobile', 'mobile', '手机号码格式错误！', 1, 'regex', 2),
            array('email', 'email', '电子邮箱格式错误！', 1, 'regex', 2),
            array('user_num', '0,20', '员工编号不得超过20位', 1, 'length', 2),
            array('item', 'require', '该员工必须有一个项目', 1, '', 2),
            array('role', 'require', '该员工必须有一个角色', 1, '', 2),
            array('headimg', 'require', '必须有一个员工头像', 1, '', 2),
            array('real_name', 'require', '真实姓名不得为空', 1, '', 2),
        );
        /*动态验证结束*/
        if(!$this -> validate($rule) -> create($data)){
            return $this -> getError();
        }else{
            $uid = $this -> save($data);
            return $uid;
        }
    }
}