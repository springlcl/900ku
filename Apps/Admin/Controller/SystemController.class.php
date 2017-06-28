<?php
namespace Admin\Controller;
use Admin\Controller\AdminController;

class SystemController extends AdminController
{
    /*系统设置*/
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 系统设置--基本配置
     */
    public function index()
    {
        if(IS_POST)
        {
            $db = M('system');
            $memberArr = $db->create();
            if($memberArr) {
                $n = $db->data($memberArr)->where('id=1')->save();
                if($n) {
                    $this->success('更新成功',U('system/index'));
                }else {
                    $this->error('更新失败',U('system/index'));
                }
            }else {
                $this->error('数据创建失败',U('system/index'));
            }
            exit();
        }
        $data = M('system')->where('id=1')->find();
        $this->assign('data',$data);
        $this->display('System/index');
    }

    /**
     * 系统设置--友情链接
     */
    public function flink()
    {
        $flinkdb = D('flink');
        if(IS_POST)
        {
            $e = I('post.cid');
            if($e == 0){
                $data = $flinkdb->getList();
            }else{
                $where = 'type_id='.I('post.cid');
                $data = $flinkdb->getList($where);
            }
        }else{
            $data = $flinkdb->getList();
        }
        $fenlei = $flinkdb->getClassList();

        $this->assign('datalist',$data['datalist']);
        $this->assign('page',$data['page']);
        $this->assign('fenlei',$fenlei);

        $this->display('System/flink');
    }

    /**
     * 系统设置--友情链接--添加友情链接
     */
    public function flink_add()
    {
        if(IS_POST)
        {
            $db = M('flink');
            $_POST['add_time'] = time();
            $memberArr = $db->create();
            if($memberArr) {
                $n = $db->data($memberArr)->save();
                if($n) {
                    $this->success('添加成功',U('system/flink'));
                }else {
                    $this->error('添加失败',U('system/flink_add'));
                }
            }else {
                $this->error('数据创建失败',U('system/flink'));
            }
            exit();
        }
        $flinkdb = D('flink');
        $fenlei = $flinkdb->getClassList();
        $this->assign('fenlei',$fenlei);
        $this->display();
    }

    /**
     * 系统设置--友情链接--更新指定友情链接
     */
    public function flink_edit()
    {
        $flinkdb = D('flink');
        if(IS_POST)
        {
            $db = M('flink');
            $_POST['add_time'] = time();
            $memberArr = $db->create();
            if($memberArr) {
                $n = $flinkdb->updateOneFlink($memberArr['flink_id'],$memberArr);
                if($n) {
                    $this->success('修改成功',U('system/flink'));
                }else {
                    $this->error('修改失败',U('system/flink'));
                }
            }else {
                $this->error('数据创建失败',U('system/flink'));
            }
            exit();
        }
        $where = 'flink_id ='.I('get.fid');
        $data = $flinkdb->getOnce($where);
        $fenlei = $flinkdb->getClassList();
        $this->assign('fenlei',$fenlei);
        $this->assign('data',$data);
        $this->display();
    }

    /**
     * 系统设置--友情链接--删除指定友情链接
     */
    public function flink_del(){
        $db = D('flink');
        $n = $db->delOneFlink(I('get.fid'));
        if($n) {
            $this->success('删除成功',U('system/flink'));
        }else {
            $this->error('删除失败',U('system/flink'));
        }
    }

    /**
     * 系统设置--广告管理
     */
    public function vert()
    {
        $mdb = D('ad_type');
        $fenlei = $mdb->field('tid,type_name,biaoshi,type') ->order('tid asc')->select();
        $this->assign('fenlei',$fenlei);
        $this->display('System/vert');
    }
    /**
     * 系统设置--广告管理-- 一级广告编辑
     */
    public function advert_first_edit()
    {
        $mdb = D('ad_type');
        if(IS_POST)
        {
            $_POST['add_time'] = time();
            $tid =  I('post.tid');
            $a = $mdb ->where('tid='.$tid) -> save(I('post.'));
            if($a == 1){
                $this->success('修改成功',U('system/vert'));
            }else{
                $this->error('修改失败',U('system/vert'));
            }
            exit();
        }
        $arr = $mdb ->find(I('fid'));
        $this -> assign('arr',$arr);
        $this->display('System/advert_first_edit');
    }
    /**
     * 系统设置--广告管理--广告列表管理
     */
    public function advert_list()
    {
        $mdb = D('advert');
        if(IS_POST)
        {
            //$db = M('nav');
            $_POST['add_time'] = time();
            $memberArr = $mdb->create();
            if($memberArr) {
                $n = $mdb->add();
                if($n) {
                    $this->success('添加成功',U('system/advert_list/fid/'.$memberArr['tid']));
                }else {
                    $this->error('添加失败',U('system/advert_list/fid/'.$memberArr['tid']));
                }
            }else {
                $this->error('数据创建失败',U('system/vert'));
            }
            exit();
        }

        $fid = I('get.fid');
        if(!$fid)
        {
            $this->error('您查询的页面不存在',U('system/vert'));
        }
        $where = 'tid ='.$fid;
        $datalist = $mdb -> where($where) -> order('tid asc')->select();
        $this->assign('fenlei',$datalist);
        $this->display('System/advert_list');
    }
    /**
     * 系统设置--广告管理--编辑指定广告
     */
    public function advert_edit()
    {
        $mdb = D('advert');
        if(IS_POST)
        {
            $_POST['add_time'] = time();
            $memberArr = $mdb->create(I('post.'));
            if($memberArr) {
                $n = $mdb->updateOne($memberArr['aid'],$memberArr);
                //$n = $mdb->where(I('aid'))->save(I('post.'));
                if($n) {
                    $this->success('修改成功',U('system/advert_list/fid/'.$memberArr['tid']));
                }else {
                    $this->error('修改失败',U('system/advert/fid/'.$memberArr['tid']));
                }
            }else {
                $this->error('数据创建失败',U('system/vert'));
            }
            exit();
        }
        $where = 'aid ='.I('get.aid');
        echo $where;
        $data = $mdb-> where($where) ->find();
        $fenlei = $mdb->getClassList();
        $this->assign('fenlei',$fenlei);
        $this->assign('data',$data);
        $this->display();
    }
    /**
     * 系统设置--广告管理--删除指定广告
     */
    public function advert_del(){
        $mdb = D('advert');
        $id = I('get.aid');
        $where = 'aid ='.$id;
        $data = $mdb->getOnce($where);
        $n = $mdb->delete(I('get.aid'));
        if($n) {
            $this->success('删除成功',U('system/advert_list/fid/'.$data['tid']));
        }else {
            $this->error('删除失败',U('system/advert_list/fid/'.$data['tid']));
        }
    }
    /**
     * 系统设置--导航管理--导航分类管理
     */
    public function nav()
    {
        if(IS_POST)
        {
            $db = M('nav_type');
            $memberArr = $db->create();
            if($memberArr) {
                $n = $db->add();
                if($n) {
                    $this->success('添加成功',U('system/nav'));
                }else {
                    $this->error('添加失败',U('system/nav'));
                }
            }else {
                $this->error('数据创建失败',U('system/nav'));
            }
            exit();
        }
        $mdb = D('nav');
        $fenlei = $mdb->getClassList();
        $this->assign('fenlei',$fenlei);
        $this->display('System/nav');
    }
    /**
     * 系统设置--导航管理-- 一级导航编辑
     */
    public function nav_first_edit()
    {
        $mdb = M('nav_type');
        if(IS_POST)
        {
            $_POST['add_time'] = time();
            $nav_type_id =  I('post.nav_type_id');
            $a = $mdb ->where('nav_type_id='.$nav_type_id) -> save(I('post.'));
            if($a == 1){
                $this->success('修改成功',U('system/nav'));
            }else{
                $this->error('修改失败',U('system/nav'));
            }
            exit();
        }
        $arr = $mdb ->find(I('fid'));
        $this -> assign('arr',$arr);
        $this->display('System/nav_first_edit');

    }
    /**
     * 系统设置--导航管理--导航列表管理
     */
    public function nav_list()
    {
        $mdb = D('nav');
        if(IS_POST)
        {
            //$db = M('nav');
            $_POST['add_time'] = time();
            $memberArr = $mdb->create();
            if($memberArr) {
                $n = $mdb->add();
                if($n) {
                    $this->success('添加成功',U('system/nav_list/fid/'.$memberArr['nav_type_id']));
                }else {
                    $this->error('添加失败',U('system/nav_list/fid/'.$memberArr['nav_type_id']));
                }
            }else {
                $this->error('数据创建失败',U('system/nav'));
            }
            exit();
        }

        $fid = I('get.fid');
        if(!$fid)
        {
            $this->error('您查询的页面不存在',U('system/nav'));
        }
        $where = 'nav_type_id ='.$fid;
        $datalist = $mdb->getNavList($where);
        //导航分类
        $fenlei = $mdb->getClassList();
        $this->assign('fenlei',$fenlei);
        $this->assign('datalist',$datalist);
        $this->display('System/nav_list');

    }

    /**
     * 系统设置--导航管理--编辑指定导航
     */
    public function nav_edit()
    {

        $mdb = D('nav');
        if(IS_POST)
        {
            $_POST['add_time'] = time();
            $memberArr = $mdb->create(I('post.'));
            if($memberArr) {
                $n = $mdb->updateOne($memberArr['nav_id'],$memberArr);
                if($n) {
                    $this->success('修改成功',U('system/nav_list/fid/'.$memberArr['nav_type_id']));
                }else {
                    $this->error('修改失败',U('system/nav_list/fid/'.$memberArr['nav_type_id']));
                }
            }else {
                $this->error('数据创建失败',U('system/nav'));
            }
            exit();
        }
        $where = 'nav_id ='.I('get.nid');
        $data = $mdb->getOnce($where);
        $fenlei = $mdb->getClassList();
        $this->assign('fenlei',$fenlei);
        $this->assign('data',$data);
        $this->display();
    }

    /**
     * 系统设置--导航管理--删除指定导航
     */
    public function nav_del(){
        $mdb = D('nav');
        $id = I('get.nid');
        $where = 'nav_id ='.$id;
        $data = $mdb->getOnce($where);
        $n = $mdb->delete(I('get.nid'));
        if($n) {
            $this->success('删除成功',U('system/nav_list/fid/'.$data['nav_type_id']));
        }else {
            $this->error('删除失败',U('system/nav_list/fid/'.$data['nav_type_id']));
        }
    }

    /**
     * 系统设置--导航管理--导航分类管理
     */
   /* public function nav()
    {
        if(IS_POST)
        {
            $db = M('nav_type');
            $memberArr = $db->create();
            if($memberArr) {
                $n = $db->add();
                if($n) {
                    $this->success('添加成功',U('system/nav'));
                }else {
                    $this->error('添加失败',U('system/nav'));
                }
            }else {
                $this->error('数据创建失败',U('system/nav'));
            }
            exit();
        }
        $mdb = D('nav');
        $fenlei = $mdb->getClassList();
        $this->assign('fenlei',$fenlei);
        $this->display('System/nav');
    }*/
    /**
     * 系统设置--导航管理--导航列表管理
     */
  /*  public function nav_list()
    {
        $mdb = D('nav');
        if(IS_POST)
        {
            //$db = M('nav');
            $_POST['add_time'] = time();
            $memberArr = $mdb->create();
            if($memberArr) {
                $n = $mdb->add();
                if($n) {
                    $this->success('添加成功',U('system/nav_list/fid/'.$memberArr['nav_type_id']));
                }else {
                    $this->error('添加失败',U('system/nav_list/fid/'.$memberArr['nav_type_id']));
                }
            }else {
                $this->error('数据创建失败',U('system/nav'));
            }
            exit();
        }

        $fid = I('get.fid');
        if(!$fid)
        {
            $this->error('您查询的页面不存在',U('system/nav'));
        }
        $where = 'nav_type_id ='.$fid;
        $datalist = $mdb->getNavList($where);
        //导航分类
        $fenlei = $mdb->getClassList();
        $this->assign('fenlei',$fenlei);
        $this->assign('datalist',$datalist);
        $this->display('System/nav_list');

    }*/
    /**
     * 系统设置--导航管理--编辑指定导航
     */
   /* public function nav_edit()
    {

        $mdb = D('nav');
        if(IS_POST)
        {
            $_POST['add_time'] = time();
            $memberArr = $mdb->create();
            if($memberArr) {
                $n = $mdb->updateOne($memberArr['nav_id'],$memberArr);
                if($n) {
                    $this->success('修改成功',U('system/nav_list/fid/'.$memberArr['nav_type_id']));
                }else {
                    $this->error('修改失败',U('system/nav_list/fid/'.$memberArr['nav_type_id']));
                }
            }else {
                $this->error('数据创建失败',U('system/nav'));
            }
            exit();
        }
        $where = 'nav_id ='.I('get.nid');
        $data = $mdb->getOnce($where);
        $fenlei = $mdb->getClassList();
        $this->assign('fenlei',$fenlei);
        $this->assign('data',$data);
        $this->display();
    }*/

    /**
     * 系统设置--导航管理--删除指定导航
     */
    /*public function nav_del(){
        $mdb = D('nav');
        $id = I('get.nid');
        if(!$id)
        {
            $this->error('您查询的页面不存在',U('system/nav'));
        }
        $where = 'nav_id ='.$id;
        $data = $mdb->getOnce($where);
        $n = $mdb->delOneFlink($id);
        if($n) {
            $this->success('删除成功',U('system/nav_list/fid/'.$data['nav_type_id']));
        }else {
            $this->error('删除失败',U('system/nav_list/fid/'.$data['nav_type_id']));
        }
    }*/

    /**
     * 系统设置--热门搜索词
     */
    public function keyword()
    {
        $keyword = D('keyword');
        $arr = $keyword ->field('sid,name,url,sort_order,add_time')->order('sort_order asc')->select();
        $this -> assign('keyword',$arr);
        $this->display('System/keyword');
    }
    /**
     * 系统设置--热门搜索词----添加热门搜索词
     */
    public function keyword_add()
    {
        if(IS_POST)
        {
            $keyword = D('keyword');
            $_POST['add_time'] = time();
            if($keyword->create(I('post.'))){
                $keyword -> add(I('post.'));
                $this->success('添加成功',U('system/keyword'));
            }else{
                $this->error('添加失败',U('system/keyword'));
            }
            exit();
        }
    }
    /**
     * 系统设置--热门搜索词----编辑热门搜索词
     */
    public function keyword_edit()
    {
        $keyword = D('keyword');
        if(IS_POST)
        {
            $keyword = D('keyword');
            $_POST['add_time'] = time();
            if($keyword->create(I('post.'))){
                $sid =  I('post.sid');
                $keyword ->where('sid='.$sid) -> save(I('post.'));
                $this->success('修改成功',U('system/keyword'));
            }else{
                $this->error('修改失败',U('system/keyword'));
            }
            exit();
        }
        $arr = $keyword ->find(I('sid'));
        //var_dump($arr);
        $this -> assign('arr',$arr);
        $this->display();
    }
    /**
     * 系统设置--热门搜索词----删除热门搜索词
     */
    public function keyword_del()
    {
        $db = D('keyword');
//        $aa = I('sid');
        $n = $db->delete(I('sid'));
        if($n) {
            $this->success('删除成功',U('system/keyword'));
        }else {
            $this->error('删除失败',U('system/keyword'));
        }
    }
    /**
     * 系统设置--快递公司
     */
    public function kuaidi()
    {

        $kuaidi = D('kuaidi');
        $arr = $kuaidi ->field('eid,ex_name,ex_code,ex_url,add_time,status')->order('eid asc')->select();
        $this -> assign('kuaidi',$arr);
        $this->display('System/kuaidi');
    }
    /**
     * 系统设置--快递公司 --  添加
     */
    public function kuaidi_add()
    {

        if(IS_POST)
        {
            $kuaidi = D('kuaidi');
            $_POST['add_time'] = time();
            if($kuaidi->create(I('post.'))){
                $kuaidi -> add(I('post.'));
                $this->success('添加成功',U('system/kuaidi'));
            }else{
                $this->error('添加失败',U('system/kuaidi'));
            }
            exit();
        }
    }
    /**
     * 系统设置--快递公司 --  修改
     */
    public function kuaidi_edit()
    {
        $kuaidi = D('kuaidi');
        if(IS_POST)
        {
            $kuaidi = D('kuaidi');
            $_POST['add_time'] = time();
            if($kuaidi->create(I('post.'))){
                $eid =  I('post.eid');
                $kuaidi ->where('eid='.$eid) -> save(I('post.'));
                $this->success('修改成功',U('system/kuaidi'));
            }else{
                $this->error('修改失败',U('system/kuaidi'));
            }
            exit();
        }
        $arr = $kuaidi ->find(I('eid'));
        //var_dump($arr);
        $this -> assign('arr',$arr);
        $this->display();
    }
    /**
     * 系统设置--快递公司 --  删除
     */
    public function kuaidi_del()
    {
        $db = D('kuaidi');
        $n = $db->delete(I('eid'));
        if($n) {
            $this->success('删除成功',U('system/kuaidi'));
        }else {
            $this->error('删除失败',U('system/kuaidi'));
        }
    }
    /**
     * 系统设置--敏感词
     */
    public function mingan()
    {

        $mingan = D('mingan');
        $arr = $mingan ->field('mid,name')->order('mid asc')->select();
        $this -> assign('mingan',$arr);
        $this->display('System/mingan');
    }
    /**
     * 系统设置--敏感词--添加
     */
    public function mingan_add()
    {
        if(IS_POST)
        {
            $mingan = D('mingan');
            //$_POST['add_time'] = time();
            if($mingan->create(I('post.'))){
                $mingan -> add(I('post.'));
                $this->success('添加成功',U('system/mingan'));
            }else{
                $this->error('添加失败',U('system/mingan'));
            }
            exit();
        }
    }
    /**
     * 系统设置--敏感词--编辑
     */
    public function mingan_edit()
    {

        $mingan = D('mingan');
        if(IS_POST)
        {
            $mingan = D('mingan');
            //$_POST['add_time'] = time();
            if($mingan->create(I('post.'))){
                $mid =  I('post.mid');
                $mingan ->where('mid='.$mid) -> save(I('post.'));
                $this->success('修改成功',U('system/mingan'));
            }else{
                $this->error('修改失败',U('system/mingan'));
            }
            exit();
        }
        $arr = $mingan ->find(I('mid'));
        //var_dump($arr);
        $this -> assign('arr',$arr);
        $this->display();
    }
    /**
     * 系统设置--敏感词--删除
     */
    public function mingan_del()
    {

        $db = D('mingan');
        $n = $db->delete(I('mid'));
        if($n) {
            $this->success('删除成功',U('system/mingan'));
        }else {
            $this->error('删除失败',U('system/mingan'));
        }
    }
    /**
     * 系统设置--收款银行
     */
    public function bank()
    {

        $bank = D('bank');
        $arr = $bank ->field('bid,name,status')->order('bid asc')->select();
        $this -> assign('bank',$arr);
        $this->display('System/bank');
    }
    /**
     * 系统设置--收款银行--添加
     */
    public function bank_add()
    {
        if(IS_POST)
        {
            $bank = D('bank');
            //$_POST['add_time'] = time();
            if($bank->create(I('post.'))){
                $bank -> add(I('post.'));
                $this->success('添加成功',U('system/bank'));
            }else{
                $this->error('添加失败',U('system/bank'));
            }
            exit();
        }
    }
    /**
     * 系统设置--收款银行--编辑
     */
    public function bank_edit()
    {

        $bank = D('bank');
        if(IS_POST)
        {
            $bank = D('bank');
            //$_POST['add_time'] = time();
            if($bank->create(I('post.'))){
                $bid =  I('post.bid');
                $bank ->where('bid='.$bid) -> save(I('post.'));
                $this->success('修改成功',U('system/bank'));
            }else{
                $this->error('修改失败',U('system/bank'));
            }
            exit();
        }
        $arr = $bank ->find(I('bid'));
        //var_dump($arr);
        $this -> assign('arr',$arr);
        $this->display();
    }
    /**
     * 系统设置--收款银行--删除
     */
    public function bank_del()
    {

        $db = D('bank');
        $n = $db->delete(I('bid'));
        if($n) {
            $this->success('删除成功',U('system/bank'));
        }else {
            $this->error('删除失败',U('system/bank'));
        }
    }

    /**
     * 系统设置--海报推广设置
     */
    public function haibao()
    {
        $this->display('System/haibao');
    }



}