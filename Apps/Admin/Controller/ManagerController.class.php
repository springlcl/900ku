<?php
namespace Admin\Controller;
use Admin\Controller\AdminController;

class ManagerController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 管理员管理--管理员列表
     */
    function admin_list()
    {
        $db = D('admin');
        if(IS_POST)
        {
            $post = I('post.');

            if($post['type']==2)
            {
                $where = ($post['rid']!=0)?'a.rid='.$post['rid']:'';
            }else{
                $like = $post['search'];
                $where = "(a.username like '%".$like."%')";

            }

            $search = $db->alias('a')
                ->field('a.*,role.role_name')
                ->join('bd_admin_role as role on role.rid = a.rid')
                ->where($where)->select();
            $this->assign('datalist',$search);
        }else{
            $data = $db->getList();
            $this->assign('datalist',$data['datalist']);
            $this->assign('page',$data['page']);
        }

        //查询管理员角色
        $roles = M('admin_role')->where('status = 0')->select();
        $this->assign('roles',$roles);

        $this->display('Manager/admin_list');
    }

    /**
     * 管理员管理--管理员列表--编辑指定管理员信息
     */
    public function admin_edit()
    {
        $mdb = D('admin');
        if(IS_POST)
        {
            //$_POST['last_time'] = time();
            //$_POST['last_ip'] = ip2long (getClientIP());
            $memberArr = $mdb->create();
            if($memberArr) {
                $n = $mdb->where('aid='.$memberArr['aid'])->save($memberArr);
                if($n) {
                    $this->success('修改成功',U('manager/admin_list'));
                }else {
                    $this->error('修改失败',U('manager/admin_list'));
                }
            }else {
                $this->error('数据创建失败',U('system/admin_list'));
            }
            exit();
        }
        $id = I('get.aid');

        if(!$id)
        {
            $this->error('您所要编辑的信息不存在！',U('manager/admin_list'));
        }

        $data = $mdb->getOnce($id);
        $role = $mdb->getRole();


        $this->assign('role',$role);
        $this->assign('data',$data);
        $this->display();
    }
    /**
     * 管理员管理--管理员列表--删除指定管理员信息
     */
    public function admin_del()
    {
        $mdb = D('admin');
        $n = $mdb->delete(I('aid'));
        if($n) {
            $this->success('删除成功',U('manager/admin_list'));
        }else {
            $this->error('删除失败',U('manager/admin_list'));
        }
    }

    /**
     * 管理员管理--管理员角色/分组列表
     */
    function role_list()
    {
        if(IS_POST){
            $db = M('admin_role');
            $_POST['add_time'] = time();
            $_POST['last_time'] = time();
            $memberArr = $db->create();
//            var_dump($memberArr);
            if($memberArr) {
                $n = $db->add($memberArr);
                if($n) {
                    $this->success('添加成功',U('manager/role_list'));
                }else {
                    $this->error('添加失败',U('manager/role_list'));
                }
            }else {
                $this->error('数据创建失败',U('system/role_list'));
            }
            exit();
        }
        $datalist = M('admin_role')->select();
        $this->assign('datalist',$datalist);
        $this->display('Manager/admin_role_list');
    }
    /**
     * 管理员管理--管理员分组--编辑
     */
    public function admin_role_list_edit()
    {
        $mdb = M('admin_role');
        if(IS_POST)
        {
            $_POST['last_time'] = time();
            $memberArr = $mdb->create();
            if($memberArr) {
                $n = $mdb->where('rid='.$memberArr['rid'])->save($memberArr);
                if($n) {
                    $this->success('修改成功',U('manager/role_list'));
                }else {
                    $this->error('修改失败',U('manager/role_list'));
                }
            }else {
                $this->error('数据创建失败',U('system/role_list'));
            }
            exit();
        }
        $id = I('get.rid');
        if(!$id)
        {
            $this->error('您所要编辑的信息不存在！',U('manager/role_list'));
        }

        $data = M('admin_role')->find($id);
        $this->assign('data',$data);
        $this->display();
    }

    /**
     * 管理员管理--管理员分组--删除
     */
    public function admin_role_list_del()
    {

        $id = I('get.rid');
        if($id<3)
        {
            $this->error('系统设置，您无权限删除！',U('manager/role_list'));
        }

        $db = M('admin_role');
        $n = $db->delete($id);
        if($n) {
            $this->success('删除成功',U('manager/role_list'));
        }else {
            $this->error('删除失败',U('manager/role_list'));
        }
    }

    /**
     * 管理员管理--区域管理员
     */
    public function admin_region_list()
    {
        $db = D('admin');
        if(IS_POST)
        {
            $post = I('post.');
            $like = $post['search'];
            $where = "a.rid = 2 and (a.username like '%".$like."%')";

            $search = $db->alias('a')
                ->field('a.*,role.role_name')
                ->join('bd_admin_role as role on role.rid = a.rid')
                ->where($where)->select();
            $this->assign('datalist',$search);
        }else{
            $data = $db->getList('a.rid = 2');
            $this->assign('datalist',$data['datalist']);
            $this->assign('page',$data['page']);
        }

        $this->display('Manager/admin_region_list');
    }

    /**
     * 管理员管理--区域管理员--编辑
     */
    public function admin_region_list_edit()
    {
        $mdb = D('admin');
        if(IS_POST)
        {

            //$_POST['last_time'] = time();
            //$_POST['last_ip'] = ip2long (getClientIP());
            if(I('post.area')){
                $add_code = I('post.area');
                $_POST['code'] = I('post.city');
            }else{
                $add_code = I('post.city');
                $_POST['code'] = I('post.city');
            }
            $memberArr = $mdb->create();
            if($memberArr) {
                $n = $mdb->where('aid='.$memberArr['aid'])->save($memberArr);
                if($n) {
                    $this->success('修改成功',U('manager/admin_region_list'));
                }else {
                    $this->error('修改失败',U('manager/admin_region_list'));
                }
            }else {
                $this->error('数据创建失败',U('system/admin_region_list'));
            }
            exit();
        }
        $id = I('get.aid');

        if(!$id)
        {
            $this->error('您所要编辑的信息不存在！',U('manager/admin_region_list'));
        }

        $data = $mdb->getOnce($id);
        $role = $mdb->getRole();


        $this->assign('role',$role);
        $this->assign('data',$data);
        $this->display();
    }
    /**
     * 管理员管理--区域管理员--删除
     */
    public function admin_region_list_del()
    {
        $mdb = D('admin');
        $n = $mdb->delete(I('aid'));
        if($n) {
            $this->success('删除成功',U('manager/admin_region_list'));
        }else {
            $this->error('删除失败',U('manager/admin_region_list'));
        }
    }

    /**
     * 管理员管理--客户经理
     */
    public function admin_customer_list()
    {
        $db = D('admin');
        if(IS_POST)
        {
            $post = I('post.');
            $like = $post['search'];
            $where = "a.rid = 3 and (a.username like '%".$like."%')";

            $search = $db->alias('a')
                ->field('a.*,role.role_name')
                ->join('bd_admin_role as role on role.rid = a.rid')
                ->where($where)->select();
            $this->assign('datalist',$search);
        }else{
            $data = $db->getList('a.rid = 3');
            $this->assign('datalist',$data['datalist']);
            $this->assign('page',$data['page']);
        }

        $this->display('Manager/admin_customer_list');
    }

    /**
     * 管理员管理--客户经理--编辑
     */
    public function admin_customer_list_edit()
    {
        $mdb = D('admin');
        if(IS_POST)
        {
            //$_POST['last_time'] = time();
            //$_POST['last_ip'] = ip2long (getClientIP());
            if(I('post.area')){
                $add_code = I('post.area');
                $_POST['code'] = I('post.city');
            }else{
                $add_code = I('post.city');
                $_POST['code'] = I('post.city');
            }
            $memberArr = $mdb->create();
            if($memberArr) {
                $n = $mdb->where('aid='.$memberArr['aid'])->save($memberArr);
                if($n) {
                    $this->success('修改成功',U('manager/admin_customer_list'));
                }else {
                    $this->error('修改失败',U('manager/admin_customer_list'));
                }
            }else {
                $this->error('数据创建失败',U('system/admin_customer_list'));
            }
            exit();
        }
        $id = I('get.aid');

        if(!$id)
        {
            $this->error('您所要编辑的信息不存在！',U('manager/admin_customer_list'));
        }

        $data = $mdb->getOnce($id);
        $role = $mdb->getRole();


        $this->assign('role',$role);
        $this->assign('data',$data);
        $this->display();
    }
    /**
     * 管理员管理--客户经理--删除
     */
    public function admin_customer_list_del()
    {
        $mdb = D('admin');
        $n = $mdb->delete(I('aid'));
        if($n) {
            $this->success('删除成功',U('manager/admin_customer_list'));
        }else {
            $this->error('删除失败',U('manager/admin_customer_list'));
        }
    }
    /**
     * 管理员管理--我的奖金
     */
    public function reward()
    {
        $this->display('Manager/reward');
    }
    /**
     * 管理员管理--绑定银行卡
     */
    public function reward_bank()
    {
        /*$uid = session('adm_uid');*/

        $uid = 1;

        if(IS_POST){
            $post = I('post.');
            if($post['realname'])
                $arr['realname'] = $post['realname'];

            if($post['certificates'])
                $arr['certificates'] = $post['certificates'];

            if($post['certificates_num'])
                $arr['certificates_num'] = $post['certificates_num'];

            if($post['bank_id'])
                $arr['bank_id'] = $post['bank_id'];

            if($post['bank_num'])
                $arr['bank_num'] = $post['bank_num'];

            $data = M('Admin')->where('aid ='.$uid)->save($arr);

            if($data)
                $this -> success('成功');
            else
                $this -> error('失败');

            exit;
        }








        $admin = M('Admin') -> where('aid='.$uid) -> find();

        //银行卡'

        $bank = M('Bank') -> where('status=0')-> select();



        $this -> assign(get_defined_vars());
        $this->display('Manager/reward_bank');
    }

    /**
     * 管理员管理--管理员奖金分配
     */
    public function admin_reward_set()
    {
        if(IS_POST){
            $post = I('post.');

            if($post['quyu_status'])
                $arr['quyu_status'] = $post['quyu_status'] -1;

            if($post['quyu_default'])
                $arr['quyu_default'] = $post['quyu_default'];

            if($post['province_xs'])
                $arr['province_xs'] = $post['province_xs'];

            if($post['province_xx'])
                $arr['province_xx'] = $post['province_xx'];

            if($post['city_xs'])
                $arr['city_xs'] = $post['city_xs'];

            if($post['city_xx'])
                $arr['city_xx'] = $post['city_xx'];

            if($post['area_xs'])
                $arr['area_xs'] = $post['area_xs'];

            if($post['area_xx'])
                $arr['area_xx'] = $post['area_xx'];

            if($post['kehu_status'])
                $arr['kehu_status'] = $post['kehu_status'] -1 ;

            if($post['kehu_default'])
                $arr['kehu_default'] = $post['kehu_default'];

            $data = M('admin_reward_set')->where('rsid =1')->save($arr);

            if($data)
                $this -> success('成功');
            else
                $this -> error('失败');

            exit;
        }


        $data = M('admin_reward_set')->where('rsid =1')->find();
        $this->assign('data',$data);
        $this->display('Manager/admin_reward_set');
    }

}