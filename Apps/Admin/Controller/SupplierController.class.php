<?php
namespace Admin\Controller;
use Admin\Controller\AdminController;

class SupplierController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 供应商管理--供应商列表
     */
    public function user()
    {
        $user = D('User');
        if(IS_POST){
            $post = I('post.');
            $where['real_name'] = array('like','%'.$post['username'].'%');
        }
        $where['pt_role'] = 1;
        $list = $user -> getList($where);
        $ex_list = D('Exhibition');
        foreach ($list['datalist'] as $k => $v){
            $ex_where['uid'] = $v['uid'];
            $ex_count = $ex_list -> getCount($ex_where);
            //$v['count'] = $ex_count;
            $list['datalist'][$k]['count'] = $ex_count;
        }

        $this -> assign('list',$list);
        $this->display('Supplier/user');
    }

    /**
     * 供应商管理--供应商详情
     */
    function user_info(){
        $user = D('user');
        if(IS_GET){
            $get = I('get.');
            $where['uid'] = $get['uid'];
        }

        if(IS_POST){
            $post = I('post.');
            $data['username'] = $post['username'];
            $data['mobile'] = $post['mobile'];
            $data['sign'] = $post['sign'];
            //$data['username'] = $post['username'];
            $data['status'] = $post['status'];
            $where1['uid'] = $post['uid'];
            $ok = $user -> updateOne($where1,$data);
            if($ok){
                $this -> success('修改成功',U('supplier/user'));
            }else{
                $this -> error('修改失败',U('supplier/user'));
            }
            exit;
        }

        $list = $user -> getOnce($where);
        $this -> assign('list',$list);
        $this->display('Supplier/gongyingshang_edit');
    }

    /**
     * 供应商管理--展厅列表
     */
    public function zhanting()
    {
        $where = array();
        if(IS_POST){
            $post = I('post.');
            if($post['ex_name']){
                $where['ex_name'] = array('like','%'.$post['ex_name'].'%');
            }
            if($post['mcid']){
                $where['mcid'] = $post['mcid'];
            }
            if($post['is_auth']){
                $where['is_auth'] = $post['is_auth']-1;
            }
            if($post['status']){
                $where['status'] = $post['status']-1;
            }
            if($post['city']){
                $where['area_code'] = $post['city'];
            }
            if($post['area']){
                $where['area_code'] = $post['area'];
            }

        }
        $ex_list = D('Exhibition');
        $list = $ex_list -> getList($where);
        $supplier = D('supplier');
        $where1['status'] = 0;
        $catelist = $supplier -> getListCate($where1);


        $this -> assign('catelist',$catelist);
        $this -> assign('list',$list);
        $this->display('Supplier/zhanting');
    }

    /**
     * 供应商管理--展厅详情
     */
    function zt_info(){
        $ex_list = D('Exhibition');
        if(IS_GET){
            $get = I('get.');
            $where['exid'] = $get['exid'];
        }
        $list = $ex_list->getOnce($where);
        $this -> assign('vo',$list);
        $this->display('Supplier/zhanting_info');
    }

    /**
     * 供应商管理--展厅分组
     */
    public function fenzu()
    {
        $where = $where2 = array();
        if(IS_POST){
            $post = I('post.');

            if($post['excname']){
                $where['excname'] = array('like','%'.$post['excname'].'%');
            }
            if($post['exid']){
                $where2['exid'] = $where['exid'] = $post['exid'];
            }
        }
        $cate = D('Cate');
        $list = $cate -> getList($where,$where2);

        $exhibition = D('Exhibition');
        $exh_list = $exhibition -> getLists();

        $this -> assign('list',$list);
        $this -> assign('exh_list',$exh_list);
        $this->display('Supplier/fenzu');
    }

    /**
     * 供应商管理--展厅分组删除
     */
    function cateDel(){
        if(IS_POST){
            $cate = D('Cate');
            $post = I('post.');
            $where = array('excid' => $post['excid']);
            $del = $cate -> delOne($where);
            if($del){
                $this -> success('删除成功',U('supplier/fenzu'));
            }else{
                $this -> error('删除失败',U('supplier/fenzu'));
            }
        }
    }

    /**
     * 供应商管理--主营类目
     */
    public function zhuying()
    {
        $supplier = D('Supplier');
        $where = array();
        if(IS_POST){
            $post = I('post.');
            $where = array('mc_name' => $post['name']);
        }
        $list = $supplier -> getList($where);
        $this -> assign('list',$list);
        $this->display('Supplier/zhuying');
    }

    /**
     * 供应商管理--主营添加/修改
     */
    public function zy_add(){
        $supplier = D('Supplier');
        if(IS_GET){
            $get = I('get.');
            $where = array('mcid' => $get['mcid']);
            $once = $supplier -> getOnce($where);
            $this -> assign('once',$once);
        }
        if(IS_POST){
            $post = I('post.');
            $data['mc_name'] = $post['mc_name'];
            $data['sort_order'] = $post['sort_order'];
            $data['status'] = $post['status'];
            if($post['mc_id']){
                $where = array('mcid' => $post['mc_id']);
                $ok = $supplier -> updateOne($where,$data);
            }else{
                $ok = $supplier -> addData($data);
            }

            if($ok){
                $this -> success('成功',U('supplier/zhuying'));
            }else{
                $this -> error('失败',U('supplier/zhuying'));
            }
            exit;
        }
        $this->display('Supplier/zhanting_zhuying_add');
    }

    /**
     * 供应商管理--主营删除
     */
    public function suppDel(){
        if(IS_POST){
            $supplier = D('Supplier');
            $post = I('post.');
            $where = array('mcid' => $post['mcid']);
            $del = $supplier -> delOne($where);
            if($del){
                $this -> success('删除成功',U('supplier/zhuying'));
            }else{
                $this -> error('删除失败',U('supplier/zhuying'));
            }
        }
    }

    /**
     * 供应商管理--经营模式
     */
    public function moshi()
    {
        $model = D('Model');
        $list = $model -> getList();
        $this -> assign('list',$list);
        $this->display('Supplier/moshi');
    }

    /**
     * 供应商管理--经营模式删除
     */
    public function modelDel(){
        if(IS_POST){
            $supplier = D('Model');
            $post = I('post.');
            $where = array('mid' => $post['mid']);
            $del = $supplier -> delOne($where);
            if($del){
                $this -> success('删除成功',U('supplier/moshi'));
            }else{
                $this -> error('删除失败',U('supplier/moshi'));
            }
        }
    }

    /**
     * 供应商管理--经营模式编辑页
     */
    public function modelEdit(){
        if(IS_POST){
            $post = I('post.');
            $model = D('Model');
            $where['mid'] = $post['mid'];
            $list = $model -> getOnce($where);
            $this -> assign('list',$list);
            $this->display();
        }
    }

    /**
     * 供应商管理--经营模式编辑
     */
    public function modelDoEdit(){
        if(IS_POST){
            $supplier = D('Model');
            $post = I('post.');
            $where = array('mid' => $post['mid']);
            $data = array('model_name'=>$post['model_name']);
            $del = $supplier -> updateOne($where,$data);
            if($del){
                $this -> success('编辑成功',U('supplier/moshi'));
            }else{
                $this -> error('编辑失败',U('supplier/moshi'));
            }
        }
    }

    /**
     * 供应商管理--经营模式添加
     */
    public function modelDoAdd(){
        if(IS_POST){
            $supplier = D('Model');
            $post = I('post.');
            $data = array('model_name'=>$post['model_name']);
            $del = $supplier -> addData($data);
            if($del){
                $this -> success('添加成功',U('supplier/moshi'));
            }else{
                $this -> error('添加失败',U('supplier/moshi'));
            }
        }
    }



}