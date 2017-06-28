<?php
namespace Admin\Controller;
use Admin\Controller\AdminController;
use Vendor\Csv;

class GoodsController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 商品管理--商品列表
     */
    public function listing()
    {
        if(IS_POST)
        {
            $post = I('post.');

            if($post['type']==2)
            {
                $where['goods_cate_id'] = $post['gcid'];
            }elseif($post['type']==3)
            {
                $where['ex.exid'] = $post['exid'];
            }else{
                $like = $post['search'];
                $where = "(g.goods_id like '%".$like."%') or (g.goods_name like '%".$like."%')";

            }

            $search = M('goods')->alias('g')
                ->field('g.*,gc.gc_name,ex.ex_name')
                ->join('bd_goods_cate as gc on gc.gcid = g.goods_cate_id')
                ->join('bd_exhibition_hall as ex on ex.exid = g.exid')
                ->where($where)->order('g.add_time desc')->select();
            $this->assign('datalist',$search);
        }else{
            $db = D('goods');
            $data = $db->getList();
            $this->assign('datalist',$data['datalist']);
            $this->assign('page',$data['page']);
        }

        $fenlei = $this->getCateList();
        $exhibition = D('exhibition')->getLists();


        $this->assign('fenlei',$fenlei);
        $this->assign('exhibition',$exhibition);

        $this->display('Goods/goods_list');
    }

    /**
     * 商品列表导出
     *
     */
    public function goods_csv()
    {
        $db = M('goods');
        $data = $db->alias('g')
            ->field('g.goods_id,g.goods_name,gc.gc_name,ex.ex_name,g.goods_price,g.goods_num,g.goods_sale_num,g.add_time,g.is_jinyong')
            ->join('bd_goods_cate as gc on gc.gcid = g.goods_cate_id')
            ->join('bd_exhibition_hall as ex on ex.exid = g.exid')
            ->order('g.add_time desc')->select();

        foreach($data as $key => $value)
        {
            $data[$key]['add_time'] = date("Y-m-d H:i:s", $value['add_time']);
            $data[$key]['is_jinyong'] = ($value['is_jinyong']==1)?'禁用':'正常';
        }
        $csv = new Csv();
        $title = array('商品编号','商品名称','商品分类','展厅','价格','数量','销量','发布时间','状态');
        $csv -> put_csv($data,$title);
    }

    /*
     *商品管理--商品管理-禁用商品
     *
     */
    public function goods_jinyong()
    {
        if(IS_GET)
        {
            $gid = I('get.gid');
            $db = M('goods');
            $info = $db->where('goods_id='.$gid)->find();
            if($info['is_jinyong']==0)
            {
                $data['is_jinyong'] = 1;
            }else{
                $data['is_jinyong'] = 0;
            }

            $int = $db->where('goods_id='.$gid)->save($data);

            if($info['is_jinyong']==0)
            {
                if($int){
                    $this->success('禁用成功',U('goods/listing'));
                }else {
                    $this->error('禁用失败',U('goods/listing'));
                }
            }else{
                if($int){
                    $this->success('启用成功',U('goods/listing'));
                }else {
                    $this->error('启用失败',U('goods/listing'));
                }
            }
        }
    }

    /**
     * 商品管理--商品分类列表
     */
    public function fenlei()
    {
        if(IS_POST)
        {
            $e = I('post.cid');
            if($e == 1){
                $datalist = M('goods_cate')->where('parent_id = 0')->select();
            }else if($e == 2){
                $datalist = M('goods_cate')->where('parent_id != 0')->select();
            }else{
                $datalist = $this->getCateList();
            }
        }else{
            $datalist = $this->getCateList();
        }

        $this->assign('datalist',$datalist);
        $this->display('Goods/goods_class');
    }

    /*
    *商品管理--商品添加分类
    *
    */
    public function fenleiadd()
    {
        if(IS_POST)
        {
            $db = M('goods_cate');
            $memberArr = $db->create();
            if($memberArr) {
                $n = $db->data($memberArr)->add();
                if($n) {
                    $this->success('添加成功',U('goods/fenlei'));
                }else {
                    $this->error('添加失败',U('goods/fenleiadd'));
                }
            }else {
                $this->error('数据创建失败',U('goods/fenlei'));
            }
            exit();
        }
        //商品分类一级分类
        $cates = M('goods_cate')->where(array('parent_id'=>0,'status'=>0))->select();

        //商品类型
        $goods_type = M('goods_type')->select();

        $this->assign('goods_cate',$cates);
        $this->assign('goods_type',$goods_type);
        $this->display('goods/goods_class_add');
    }

    /**
     * 系统设置--友情链接--更新指定分类
     */
    public function fenlei_edit()
    {
        $db = M('goods_cate');
        if(IS_POST)
        {
            $memberArr = $db->create();
            if($memberArr) {
                $n = $db->data($memberArr)->where('gcid='.$memberArr['gcid'])->save();
                if($n) {
                    $this->success('修改成功',U('goods/fenlei'));
                }else {
                    $this->error('修改失败',U('goods/fenlei'));
                }
            }else {
                $this->error('数据创建失败',U('goods/fenlei'));
            }
            exit();
        }

        $gcid = I('get.fid');
        if(!$gcid)
        {
            $this->error('该分类不存在！',U('goods/fenlei'));
        }

        $data = $db->where('gcid='.$gcid)->find();

        //商品分类一级分类
        $cates = $db->where(array('parent_id'=>0,'status'=>0))->select();
        //商品类型
        $goods_type = M('goods_type')->select();

        $this->assign('goods_cate',$cates);
        $this->assign('goods_type',$goods_type);
        $this->assign('data',$data);
        $this->display('goods/goods_class_edit');
    }

    /*
    *商品管理--商品分类无限分类递归查询
    *
    */
    public function getCateList($gcid=0,&$result=array(),$spac=0)
    {
        $spac = $spac+1;
        $category = M('goods_cate');
        $map['parent_id'] = $gcid;
        $res = $category->field('*')->where($map)->order('sort_order asc,gcid asc')->select();
        foreach ($res as $key => $value)
        {

            if($spac==1){
                $value['gc_name']=$value['gc_name'];
            }else{
                $value['gc_name']='|'.str_repeat('—— ', $spac-1).$value['gc_name'];
            }

            $result[]=$value;
            $this->getCateList($value['gcid'],$result,$spac);
        }
        return $result;
    }

    /*
    *商品管理--修改商品分类排序
    *
    */
    public function updatesort(){
        $id = I('post.cid');
        $value=I('post.sort');
        if($id!='') {
            $class = M('goods_cate');
            $array=array('sort_order'=>$value);
            $int = $class->where('gcid='.$id)->save($array);
            if($int)
            {
                $data = TRUE;
            }else{
                $data = NULL;
            }
            echo json_encode($data);
        }
    }

    /*
    *商品管理--删除分类
    *
    */
    public function catedel(){
        $id = I('post.cid');
        if($id!='') {
            $class = M('goods_cate');
            $gs = M('goods')->where('goods_cate_id = '.$id)->select();
            if(!$gs){
                $int = $class->where('gcid='.$id)->delete();
                if($int){
                    $data = TRUE;
                }else{
                    $data = NULL;
                }
            }else{
                $data = NULL;
            }

            echo json_encode($data);
        }
    }

    /*
    *商品管理--自定义商品属性列表及添加
    *
    */
    public function property()
    {
        $db = D('property');
        if(IS_POST)
        {
            $memberArr = $db->create();
            if($memberArr) {
                $n = $db->add();
                if($n) {
                    $this->success('添加成功',U('goods/property'));
                }else {
                    $this->error('添加失败',U('goods/property'));
                }
            }else {
                $this->error('数据创建失败',U('goods/property'));
            }
            exit();
        }
        $data = $db->getList();

        $this->assign('datalist',$data['datalist']);
        $this->assign('page',$data['page']);

        $this->display('goods/goods_property');
    }

    /**
     * 商品管理--自定义商品属性编辑
     */
    public function property_edit()
    {
        $db = D('property');
        if(IS_POST)
        {
            $memberArr = $db->create();
            if($memberArr) {
                $n = $db->updateOne($memberArr['pro_id'],$memberArr);
                if($n) {
                    $this->success('修改成功',U('goods/property'));
                }else {
                    $this->error('修改失败',U('goods/property'));
                }
            }else {
                $this->error('数据创建失败',U('goods/property'));
            }
            exit();
        }
        $id = I('get.pid');
        if(!$id)
        {
            $this->error('您所编辑的属性不存在！',U('goods/property'));
        }

        $data = $db->getOnce($id);

        $this->assign('data',$data);
        $this->display('goods/goods_property_edit');
    }

    /*
     *商品管理--删除自定义商品属性
     *
     */
    public function property_del(){
        $id = I('post.cid');
        if($id!='')
        {
            $int = D('property')->delOne($id);
            if($int){
                $data = TRUE;
            }else{
                $data = NULL;
            }
        }
        echo json_encode($data);
    }

    /*
  *商品管理--删除自定义商品属性
  *
  */
    public function zhunru()
    {
        $mdb = D('access');
        if(IS_POST)
        {
            $post = I('post.');
            if($post['type']==1)
            {
                if ($post['cid']==1)
                {
                    $where = "ex.ex_name like '%".$post['search']."%'";
                }elseif($post['cid']==2){
                    $where = 'ac.gid ='.$post['search'];
                }else{
                    $where = "g.goods_name like '%".$post['search']."%'";
                }
            }else
            {
                $where = 'g.goods_cate_id ='.$post['cid'];
            }
            $data = $mdb->getList($where);
        }else{

            $data = $mdb->getList();
        }

        $fenlei = $this->getCateList();
        //p($data['datalist']);
        $this->assign('datalist',$data['datalist']);
        $this->assign('fenlei',$fenlei);
        $this->display('goods/goods_zhunru');
    }

    /**
     * 商品列表导出
     *
     */
    public function zhunru_csv()
    {
        $db = M('access_table');
        $data = $db->alias('ac')
            ->field('ac.gid,g.goods_name,gc.gc_name,ex.ex_name,g.goods_price,g.goods_num,g.goods_sale_num,g.add_time,g.is_jinyong')
            ->join('bd_goods as g on g.goods_id = ac.gid')
            ->join('bd_goods_cate as gc on gc.gcid = g.goods_cate_id')
            ->join('bd_exhibition_hall as ex on ex.exid = ac.exid')
            ->order('ac.aid desc')->select();

        foreach($data as $key => $value)
        {
            $data[$key]['add_time'] = date("Y-m-d H:i:s", $value['add_time']);
            $data[$key]['is_jinyong'] = ($value['is_jinyong']==1)?'禁用':'正常';
        }
        $csv = new Csv();
        $title = array('商品编号','商品名称','商品分类','展厅','价格','数量','销量','发布时间','状态');
        $csv -> put_csv($data,$title);
    }




    /*
    *商品管理--商品评论列表
    *
    */
    public function comment()
    {
        if(IS_POST)
        {
            $like = I('post.search');
            $search = M('comment')->alias('c')
                ->field('c.*,u.username,g.goods_name,ex.ex_name')
                ->join('bd_user as u on u.uid = c.uid')
                ->join('bd_goods as g on g.goods_id = c.gid')
                ->join('bd_exhibition_hall as ex on ex.exid = c.exid')
                ->where("(g.goods_name like '%".$like."%') or (ex.ex_name like '%".$like."%') or (c.content like '".$like."')")->order('c.add_time desc')->select();
            $this->assign('datalist',$search);
        }else{
            $db = D('comment');
            $data = $db->getList();

            $this->assign('datalist',$data['datalist']);
            $this->assign('page',$data['page']);
        }

        $this->display('goods/goods_comment');
    }

    /*
     *商品管理--查看指定评论
     *
     */
    public function comview()
    {
        $db = D('comment');
        $id = I('get.coid');
        if(!$id)
        {
            $this->error('您所查看的评论不存在！',U('goods/comment'));
        }

        $data = $db->getOnce($id);

        $this->assign('data',$data);
        $this->display('goods/goods_comment_view');
    }

    /*
     *商品管理--删除指定评论
     *
     */
    public function comdel()
    {
        $id = I('post.cid');
        if($id!='')
        {
            $int = D('comment')->delOne($id);
            if($int){
                $data = TRUE;
            }else{
                $data = NULL;
            }
        }
        echo json_encode($data);
    }

    /*
     *商品管理--商品举报列表
     *
     */
    public function jubao()
    {
        $db = M('jubao');

        if(IS_POST)
        {
            $like = I('post.search');
            $search = $db->alias('j')
                ->field('j.*,u.username,g.goods_name,g.is_jinyong,ex.ex_name')
                ->join('bd_user as u on u.uid = j.uid')
                ->join('bd_goods as g on g.goods_id = j.gid')
                ->join('bd_exhibition_hall as ex on ex.exid = j.exid')
                ->where("(g.goods_name like '%".$like."%') or (ex.ex_name like '%".$like."%') or (u.username like '".$like."')")->order('j.add_time desc')->select();

            $this->assign('datalist',$search);
        }else{

            $where = array('j.status'=>0);
            $count = $db->alias('j')->where($where)->count();
            $Page= new \Think\Page($count,10);              // 实例化分页类 传入总记录数
            $show  = $Page->show();                         // 分页显示输出
            $datalist = $db->alias('j')
                ->field('j.*,u.username,g.goods_name,g.is_jinyong,ex.ex_name')
                ->join('bd_user as u on u.uid = j.uid')
                ->join('bd_goods as g on g.goods_id = j.gid')
                ->join('bd_exhibition_hall as ex on ex.exid = j.exid')
                ->where($where)->order('j.add_time desc')->limit($Page->firstRow.','.$Page->listRows)->select();
            $this->assign('datalist',$datalist);
            $this->assign('page',$show);
        }

        $this->display('goods/goods_jubao');
    }

    /*
     *商品管理--商品举报-禁用商品
     *
     */
    public function jinyong()
    {
        if(IS_GET)
        {
            $gid = I('get.gid');
            $db = M('goods');
            $info = $db->where('goods_id='.$gid)->find();
            if($info['is_jinyong']==0)
            {
                $data['is_jinyong'] = 1;
            }else{
                $data['is_jinyong'] = 0;
            }

            $int = $db->where('goods_id='.$gid)->save($data);

            if($info['is_jinyong']==0)
            {
                if($int){
                    $this->success('禁用成功',U('goods/jubao'));
                }else {
                    $this->error('禁用失败',U('goods/jubao'));
                }
            }else{
                if($int){
                    $this->success('启用成功',U('goods/jubao'));
                }else {
                    $this->error('启用失败',U('goods/jubao'));
                }
            }
        }
    }
    /*
         *商品管理--商品举报-驳回举报信息
         *
         */
    public function bohui()
    {
        $jid = I('get.jid');
        if(!$jid){
            $this->error('您所操作的信息不存在！',U('goods/jubao'));
        }
        $data['status'] = 1;
        $int = M('jubao')->where('jid='.$jid)->save($data);
        if($int){
            $this->success('驳回成功',U('goods/jubao'));
        }else {
            $this->error('驳回失败',U('goods/jubao'));
        }
    }



}