<?php
namespace Admin\Controller;
use Admin\Controller\AdminController;

class UserController extends AdminController
{
    /**
     * 用户管理--采购商列表
     */
    function caigoushang(){
        $user = D('User');
        if(IS_POST){
            $post = I('post.');
            $where['real_name'] = array('like','%'.$post['username'].'%');
        }
        $where['pt_role'] = 2;
        $list = $user -> getList($where);
        $project = D('Project');
        foreach ($list['datalist'] as $k => $v){
            $ex_where['uid'] = $v['uid'];
            $ex_count = $project -> getCount($ex_where);
            //$v['count'] = $ex_count;
            $list['datalist'][$k]['count'] = $ex_count;
        }

        $this -> assign('list',$list);
        $this -> display();
    }

    /**
     * 用户管理--采购商详情
     */
    function user_info(){
        $user = D('user');
        $auth = D('Auth');
        if(IS_GET){
            $get = I('get.');
            $where['uid'] = $get['uid'];
        }

        if(IS_POST){
            $post = I('post.');
            if($post['is_auth']) $data['status'] = $post['status'] -1 ;
            $where1['uid'] = $post['uid'];
            if($post['is_auth']) $data1['status'] = $post['is_auth']-1;
            if($post['remark']) $data1['remarks'] = $post['remark'];

            $user->startTrans();
            $ok = $user -> updateOne($where1,$data);
            $ok2 = $auth -> updateOne($where1,$data1);

            if($ok || $ok2){
                $user->commit();
                if(isset($post['type'])){
                    $this -> success('修改成功',U('user/is_auth'));
                }else{
                    $this -> success('修改成功',U('user/caigoushang'));
                }

            }else{
                $user->rollback();
                if(isset($post['type'])){
                    $this->error('修改失败', U('user/is_auth'));
                }else {
                    $this->error('修改失败', U('user/caigoushang'));
                }
            }
            exit;
        }

        $list = $user -> getOnce($where);
        $where1['uid'] = $list['uid'];
        $lists = $auth -> getOnce($where1);
        $list['info'] = $lists;
        $this -> assign('list',$list);
        $this -> assign('get',$get);
        $this->display('User/caigoushang_edit');
    }

    /**
     * 用户管理--待认证列表
     */

    function is_auth(){

        $user = D('user');
        $auth = D('Auth');
        if(IS_POST){
            $post = I('post.');
            $where1['user.real_name'] = array('like','%'.$post['username'].'%');
        }

        $where1['auth.status'] = $where['auth.status'] = 0;
        $list = $auth -> getAuthUser($where,$where1);
        $this -> assign('list',$list);
        $this->display('User/caigoushang_auth');
    }

    /**
     * 用户管理--用户列表(采购商未提交认证用户)
     */
    function index(){
        $user = D('User');
        if(IS_POST){
            $like = I('post.query');
            $where = "((u.username like '%".$like."%') or (u.remarks like '%".$like."%')) and (u.pt_role=2 AND u.is_auth=0)";
            $arr = M('User')->alias('u')
                ->field('uid,headimg,username,add_time,last_time,mobile,last_ip,is_auth,remarks')
                ->where($where)
                -> order('uid asc')
                ->select();

        }else{
            $where = "pt_role=2 AND is_auth=0";
            $aa = D('User') -> getList($where);
            $arr = $aa['datalist'];
        }
        /**$arr = M('User')->alias('u')
        ->field('uid,headimg,username,add_time,last_time,mobile,last_ip,is_auth,remarks')
        ->where($where)
        -> order('uid asc')
        ->select();**/
        //$arr = D('User')->alias('u') -> getList($where);
        $this -> assign('data',$arr);
        $this->display('User/index');
    }
    /**
     * 用户管理--用户列表(采购商未提交认证用户)  --编辑-备注
     */
    function index_deit_remarks(){
        $user = D('User');
        if(IS_POST)
        {
            $uid =  I('post.uid');
            $n = $user ->where('uid='.$uid) -> save(I('post.'));
            if($n){
                $this->success('修改成功',U('User/index'));
            }else{
                $this->error('修改失败',U('User/index'));
            }
            exit();
        }
    }

    /**
     * 用户管理--用户列表--导出
     *
     */
    public function user_csv()
    {
        $db = M('User');
        $data = $db->alias('g')
            ->field('uid,username,add_time,last_time,mobile,last_ip')
            //->join('bd_goods_cate as gc on gc.gcid = g.goods_cate_id')
            //->join('bd_exhibition_hall as ex on ex.exid = g.exid')
            ->order('g.uid asc')->select();

        foreach($data as $key => $value)
        {
            $data[$key]['add_time'] = date("Y-m-d H:i:s", $value['add_time']);
            $data[$key]['last_time'] = date("Y-m-d H:i:s", $value['add_time']);
        }
        $csv = new Csv();
        $title = array('序号','昵称','注册时间','最后登录时间','手机号','最后登陆IP');
        $csv -> put_csv($data,$title);
    }



}