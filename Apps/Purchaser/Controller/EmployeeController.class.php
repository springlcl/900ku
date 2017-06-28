<?php
/**
 * Created by PhpStorm.
 * User: wwkil
 * Date: 2017/5/18
 * Time: 15:49
 */

namespace Purchaser\Controller;
use Purchaser\Controller\PurController;

class EmployeeController extends PurController
{
    public function __construct(){
        parent::__construct();
//        session('uid',3);
//        session('belong',0);
        $this -> uid = session('pur_uid');
        $this -> belong = session('pur_belong') == 0 ? $this -> uid : session('pur_belong');
        $this -> url = __CONTROLLER__;
        if(IS_POST) $this -> post = I('post.');
    }

    /*
     * 员工管理主页面
     */
    public function stuffManage(){
        /*查询登录用户的信息*/
        $user = M('user')
            -> field('item,leader,pt_role,role')
            -> where('status = 1 AND uid = '.$this->uid)
            -> find();
        /*获取从属关系，若采购商管理员belong字段为0，下属人员为采购商管理员ID*/
        $belong = $this -> belong;
        /*根绝项目字段值取得不同的查询条件*/
        $pwhere = $user['item'] == 0 ? 'uid = '.$belong.' AND status = 1' : 'uid = '.$belong.' AND pid = '.$user['item'].' AND status = 1';
        /*取得项目下拉菜单的id及名称*/
        $project = M('cg_project')
            -> field('pid,pro_name,uid')
            -> where($pwhere)
            -> order('add_time DESC')
            -> select();
        unset($pwhere);
        if($user['item'] == 0){
            $temp = array(
                'pid'       => 0,
                'pro_name'  => '集团管理',
            );
            array_unshift($project,$temp);
            unset($temp);
        }
        if(count($project)-1 > 1){
            // 遍历该用户所属项目的数组
            foreach($project as $value){
                if($value['pid'] != 0){
                    $items[] = $value['pid'];
                }
            }
            // 通过所属项目数组取得“所有项目”的值
            $item = implode(',',$items);
            $i = array(
                'pid'        => $item,
                'pro_name'      => '所有项目',
            );
            array_unshift($project,$i);
            unset($i,$item,$items);
        }

        /*根据用户用户组ID取得不同的查询条件*/
        $rwhere = 'pur_id = '.$belong;
        /*取得用户组下拉列表的值*/
        $role = M('pur_role')
            -> field('role_id,role_name')
            -> where($rwhere)
            -> select();
        $temp = array(
            'role_id'   => 0,
            'role_name' => '未分配角色',
        );
        array_unshift($role,$temp);

        // 遍历登录用户能查看得所用用户组
        foreach ($role as $value) {
            $groups[] = $value['role_id'];
        }
        // 取得“所有角色”项的值
        $group = implode(',',$groups);
        $g = array(
            'role_id'   => $group,
            'role_name' => '所有角色',
        );
        array_unshift($role,$g);
//        dump($role);die;
        // 查询该用户可以查看的用户列表
        $users = M('user')
            -> field('u.uid,u.user_num,u.headimg,u.username,u.real_name,u.mobile,u.email,u.status,p.pro_name,r.role_name')
            -> alias('u')
            -> join('bd_cg_project AS p ON p.pid = u.item','left')
            -> join('bd_pur_role AS r ON r.role_id = u.role','left')
            -> where('u.pt_role = 2 AND u.belong = '.$belong.' AND u.uid != '.$this -> uid)
            -> limit('0,15')
            -> select();
        /*查询可查看的用户总数*/
        $count = M('user')
            -> alias('u')
            -> join('bd_cg_project AS p ON p.pid = u.item','left')
            -> join('bd_pur_role AS r ON r.role_id = u.role','left')
            -> where('u.pt_role = 2 AND u.belong = '.$belong.' AND u.uid != '.$this -> uid)
            -> count();
        /*分配数据至模板*/
        $this -> assign('count',$count);        // 该用户可查看的用户数量
        $this -> assign('role',$role);          // 用户组列表
        $this -> assign('users',$users);        // 用户列表
        $this -> assign('user',$user);          // 该用户的信息数组
        $this -> assign('pro',$project);        // 项目列表
        $this -> assign('e','<option>暂无角色</option>');
        $this -> assign('empty','<tr><td class="col-lan2" colspan="9" style="font-size: 20px;">暂无员工</td></tr>');                                        // 当用户列查询数据叙数据为空时的提示信息
        $this -> display();
    }

    /*AJAX发送请求，请求该供应商下的员工数据*/
    public function getUsers(){
        $model = new \Purchaser\Model\UserModel();
        $users = $model -> selUser($this -> post,$this -> belong,$this->uid);
        $this -> ajaxReturn($users);
    }

    /**
     * 禁用员工账号
     */
    public function ignoreUser(){
        $model = new \Purchaser\Model\UserModel();
        $result = $model -> changeStat($this -> post);
        $this -> ajaxReturn($result);
    }


    public function add(){
        if(IS_GET){
            $users = M('user')
                -> field('uid,real_name,role')
                -> where('belong = '.$this -> belong.' AND uid != '.$this ->uid)
                -> select();
            $role = M('pur_role')
                -> field('role_id,role_name')
                -> where('pur_id = '.$this -> belong)
                -> select();
            $this -> assign('users', $users);
            $this -> assign('role', $role);
            $this -> display();
        } elseif (IS_POST) {
            $data = array(
                'uid'   => $this -> post['user'],
                'role'  => $this -> post['role'],
            );
            $result = M('user')
                -> save($data);
            if(!$result) {
                $this -> error('更新用户组失败！', '', 2);
            } else {
                $this -> success('更新用户组成功！', U('stuffManage'), 2);
            }
        }


    }

    public function addDetail(){
        if(IS_GET){
            $project = M('cg_project')
                -> field('pid,pro_name')
                -> where('uid = '.$this->belong)
                -> select();
            $role = M('pur_role')
                -> field('role_id,role_name')
                -> where('pur_id = '.$this -> belong)
                -> select();
            $this -> assign('role',$role);
            $this -> assign('pro',$project);
            $this -> display();
        }elseif (IS_POST){
            $model = new \Purchaser\Model\UserModel();
            $result = $model -> addUser($this->post);
            if(is_numeric($result)){
                $this -> success('添加员工成功！',U('stuffManage'),3);
            }elseif (is_string($result)){
                $this -> error($result,'',2);
            }
        }
    }

    public function roleAuth(){
        $model = new \Purchaser\Model\Pur_roleModel();
        $result = $model -> getAuth($this->post['rid']);
        if(is_array($result)){
            $arr = array(
                'data'      => $result,
                'errorcode' => 300,
            );
        }
        exit($this -> ajaxReturn($arr));
    }

    public function edit(){
        if(IS_GET){
            $id = I('get.uid');
            $user = M('user')
                -> field('uid,user_num,headimg,username,real_name,mobile,email,status,item,role')
                -> where('pt_role = 2 AND belong = '.$this -> belong.' AND uid = '.$id)
                -> find();
            $role = M('pur_role')
                -> field('role_id,role_name,role_pers')
                -> where('pur_id = '.$this -> belong)
                -> select();
            foreach($role as $value){
                if($value['role_id'] == $user['role']) $pers = $value['role_pers'];
            }
            $permission = M('pur_permission')
                -> field('per_name,per_id,per_pid')
                -> where('per_id in ('.$pers.')')
                -> select();
            $permission = gettree($permission,'per_id','per_pid');
            $project = M('cg_project')
                -> field('pid,pro_name')
                -> where('uid = '.$this->belong)
                -> select();
            $this -> assign('role',$role);
            $this -> assign('user',$user);
            $this -> assign('pro',$project);
            $this -> assign('per',$permission);
            $this -> display();
        }elseif (IS_POST){
            $model = new \Purchaser\Model\UserModel();
            $result = $model -> editUser($this->post,$this -> belong);
            if(is_numeric($result)){
                $this -> success('编辑员工信息成功！',U('stuffManage'),2);
            }elseif (is_string($result)){
                $this -> error($result,'',2);
            }
        }
    }

    public function roleList(){
        $role = M('pur_role')
            -> field('role_id,role_name,description')
            -> where('pur_id = '.$this -> belong)
            -> limit('0,15')
            -> select();
        $this -> assign('role', $role);
        $this -> display();
    }

    public function getRole(){
        if(IS_AJAX && IS_POST){
            $word = $this -> post['word'];
            $role = M('pur_role')
                -> field('role_id AS id,role_name AS name,description AS d')
                -> where('pur_id = '.$this -> belong.' AND (role_name LIKE "%'.$word.'%" OR description LIKE "%'.$word.'%")')
                -> select();
            exit($this -> ajaxReturn(array('data' => $role,'errorcode' => 300)));
        }
    }


    public function addRole() {
        if (IS_GET) {
            $per = M('pur_permission')
                -> field('per_id,per_name,per_title,per_pid,per_module,per_controller,per_action,per_path,per_show')
                -> order('per_pid,per_sort')
                -> select();
            $permission = gettree($per,'per_id','per_pid');
            $this -> assign('permission',$permission);
            $this -> display();
        } elseif (IS_POST) {
            $model = new \Purchaser\Model\Pur_roleModel();
            $result = $model -> role($this -> post,$this -> belong);
            if(is_numeric($result)){
                $this -> success('添加角色成功',U('roleList'),2);
            } elseif (is_string($result)){
                $this -> error($result,'',2);
            }

        }

    }

    public function editRole(){
        if (IS_GET) {
            $id = I('get.rid');
            $role = M('pur_role')
                -> field('role_name,description,role_pers')
                -> where('role_id = '.$id)
                -> find();
            $pers = explode(',',$role['role_pers']);
            $per = M('pur_permission')
                -> field('per_id,per_name,per_title,per_pid,per_module,per_controller,per_action,per_path,per_show')
                -> order('per_pid,per_sort')
                -> select();
            $permission = gettree($per,'per_id','per_pid');
            $this -> assign('role',$role);
            $this -> assign('pers',$pers);
            $this -> assign('permission',$permission);
            $this -> display();
        } else {
            $model = new \Purchaser\Model\Pur_roleModel();
            $result = $model -> role($this -> post,$this -> belong,'save');
            if(is_numeric($result)){
                $this -> success('修改角色成功',U('roleList'),2);
            } elseif (is_string($result)){
                $this -> error($result,'',2);
            }
        }
    }

    public function delRole(){
        // 只有AJAX请求删除命令才被接受
        if(IS_AJAX){
            // 查找该用户下的员工数量
            $check = M('user')
                -> where('belong = '.$this -> belong.' AND role = '.$this -> post['rid'])
                -> count();
            // 判断是否有员工使用该用户组
            if(is_numeric($check) && $check > 0){
                $arr = array(
                    'message'   => '有员工被划分至该用户组，请将员工转移至其他用户组后再删除本用户组',
                    'errorcode' => 102,
                );
            } elseif (is_bool($check)) {
                $arr = array(
                    'message'   => '查询分组状态失败，请重试！',
                    'errorcode' => 101,
                );
            } elseif (is_numeric($check) && $check === '0'){        // 没有员工时删除该用户组
                $result = M('pur_role')
                    -> delete($this -> post['rid']);
                if (!$result) {
                    $arr = array(
                        'message'   => '删除失败，请重试！',
                        'errorcode' => 201,
                    );
                } else {
                    $arr = array(
                        'message'   => '删除用户组成功！',
                        'errorcode' => 300,
                    );
                }
            }
            exit($this -> ajaxReturn($arr));
        }
    }

}