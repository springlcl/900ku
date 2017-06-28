<?php
namespace Admin\Controller;
use Admin\Controller\AdminController;
use Vendor\Csv;

class OrderController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 订单管理--准入订单列表
     */
    public function zhunru()
    {
        if(IS_POST)
        {
            $post = I('post.');

            if($post['type']==2)
            {
                $where = 'o.is_access = 1';
                if ($post['exid'] != 0)
                {   $where = (!$where)?'':$where.' and ';
                    $where .= 'o.exid ='.$post['exid'];
                }

                if ($post['pid'] != 0)
                {
                    $where = (!$where)?'':$where.' and ';
                    $where .= 'o.pid ='.$post['pid'];
                }

                if ($post['order_status'] != 0)
                {
                    $where = (!$where)?'':$where.' and ';
                    $where .= 'o.status ='.$post['order_status'];
                }

                if ($post['pay_status'] != 0)
                {
                    $where = (!$where)?'':$where.' and ';
                    $where .= 'o.pay_stat ='.$post['pay_status'];
                }

                if($post['time_start'])
                {
                    $time_start = strtotime(date('Y-m-d',strtotime($post['time_start'])));
                    $time_end = strtotime(date('Y-m-d',strtotime($post['time_end'])));
                    $today = strtotime(date('Y-m-d',time()));

                    if ($time_start < $today && $time_start < $time_end)
                    {
                        $where = (!$where)?'':$where.' and ';
                        $where .= 'o.created < '.$time_end.' and o.created > '.$time_start;
                    }
                }

            }else{
                $like = $post['search'];
                $where = "o.is_access = 1 and o.order_code like '%".$like."%'";

            }

            $datalist = M('order')->alias('o')
                ->field('o.*,sup.username as sup_name,pur.username as pur_name')
                ->join('bd_user as sup on sup.uid = o.sup_id')
                ->join('bd_user as pur on pur.uid = o.pur_id')
                ->where($where)->order('o.created desc')->select();
            foreach ($datalist as $k => $v)
            {
                $goods = M('order_goods')->field('goods_name,goods_price,goods_count')->where('oid='.$v['oid'])->find();
                $datalist[$k]['goods_name'] = $goods['goods_name'];
                $datalist[$k]['goods_price'] = $goods['goods_price'];
                $datalist[$k]['goods_count'] = $goods['goods_count'];
            }


            $this->assign('datalist',$datalist);
        }else{
            $data = D('order')->getList('o.is_access = 1');
            $this->assign('datalist',$data['datalist']);
            $this->assign('page',$data['page']);
        }

        $ex = D('exhibition')->getLists();
        $pro = D('project')->getLists();

        $this->assign('zhanting',$ex);
        $this->assign('project',$pro);
        $this->display('Order/order_zhunru');
    }

    /**
     * 订单管理--准入订单列表--7天/10天链接
     */
    public function limitday()
    {
        if(IS_GET)
        {
            $get = I('get.day');
            if($get == 2)
            {
                $time = time()- 30*24*3600;
            }else{
                $time = time()- 7*24*3600;
            }

            $where = 'o.is_access = 1 and o.created > '.$time;
            $datalist = M('order')->alias('o')
                ->field('o.*,sup.username as sup_name,pur.username as pur_name')
                ->join('bd_user as sup on sup.uid = o.sup_id')
                ->join('bd_user as pur on pur.uid = o.pur_id')
                ->where($where)->order('o.created desc')->select();
            foreach ($datalist as $k => $v)
            {
                $goods = M('order_goods')->field('goods_name,goods_price,goods_count')->where('oid='.$v['oid'])->find();
                $datalist[$k]['goods_name'] = $goods['goods_name'];
                $datalist[$k]['goods_price'] = $goods['goods_price'];
                $datalist[$k]['goods_count'] = $goods['goods_count'];
            }

            $ex = D('exhibition')->getLists();
            $pro = D('project')->getLists();
            $this->assign('zhanting',$ex);
            $this->assign('project',$pro);
            $this->assign('datalist',$datalist);
            $this->display('Order/order_zhunru');

        }else{
            $this->redirect('order/zhunru');
        }
    }

    /**
     * 订单管理--准入订单列表--订单详情
     */
    public function zhunru_info()
    {
        $id = I('get.oid');
        if (!$id)
        {
            $this->redirect('order/zhunru');exit();
        }

        $data = D('order')->getOnce($id);

        //查询物流信息
        //$expInfo = showapi_expInfo('shunfeng','883420070249072469');
        $expInfo_json = showapi_expInfo('zhongtong','441472438266');
        $expInfo = json_decode($expInfo_json,true);
        $expInfo_data = $expInfo['showapi_res_body']['data'];
        $this->assign('info',$data['info']);
        $this->assign('goods',$data['goods']);
        $this->assign('log',$data['order_log']);
        $this->assign('expInfo_data',$expInfo_data);
        $this->display('Order/order_zhunru_info');

    }


    /**
     * 订单管理-- 非准入 --订单列表
     */
    public function zhunru_no()
    {
        if(IS_POST)
        {
            $post = I('post.');

            if($post['type']==2)
            {
                $where = 'o.is_access = 0';
                if ($post['exid'] != 0)
                {   $where = (!$where)?'':$where.' and ';
                    $where .= 'o.exid ='.$post['exid'];
                }

                if ($post['pid'] != 0)
                {
                    $where = (!$where)?'':$where.' and ';
                    $where .= 'o.pid ='.$post['pid'];
                }

                if ($post['order_status'] != 0)
                {
                    $where = (!$where)?'':$where.' and ';
                    $where .= 'o.status ='.$post['order_status'];
                }

                if ($post['pay_status'] != 0)
                {
                    $where = (!$where)?'':$where.' and ';
                    $where .= 'o.pay_stat ='.$post['pay_status'];
                }

                if($post['time_start'])
                {
                    $time_start = strtotime(date('Y-m-d',strtotime($post['time_start'])));
                    $time_end = strtotime(date('Y-m-d',strtotime($post['time_end'])));
                    $today = strtotime(date('Y-m-d',time()));

                    if ($time_start < $today && $time_start < $time_end)
                    {
                        $where = (!$where)?'':$where.' and ';
                        $where .= 'o.created < '.$time_end.' and o.created > '.$time_start;
                    }
                }

            }else{
                $like = $post['search'];
                $where = "o.is_access = 0 and o.order_code like '%".$like."%'";

            }

            $datalist = M('order')->alias('o')
                ->field('o.*,sup.username as sup_name,pur.username as pur_name')
                ->join('bd_user as sup on sup.uid = o.sup_id')
                ->join('bd_user as pur on pur.uid = o.pur_id')
                ->where($where)->order('o.created desc')->select();
            foreach ($datalist as $k => $v)
            {
                $goods = M('order_goods')->field('goods_name,goods_price,goods_count')->where('oid='.$v['oid'])->find();
                $datalist[$k]['goods_name'] = $goods['goods_name'];
                $datalist[$k]['goods_price'] = $goods['goods_price'];
                $datalist[$k]['goods_count'] = $goods['goods_count'];
            }


            $this->assign('datalist',$datalist);
        }else{
            $data = D('order')->getList('o.is_access = 0');
            $this->assign('datalist',$data['datalist']);
            $this->assign('page',$data['page']);
        }

        $ex = D('exhibition')->getLists();
        $pro = D('project')->getLists();

        $this->assign('zhanting',$ex);
        $this->assign('project',$pro);
        $this->display('Order/order_zhunru_no');
    }

    /**
     * 订单管理--非准入--订单列表--7天/10天链接
     */
    public function limitday_no()
    {
        if(IS_GET)
        {
            $get = I('get.day');
            if($get == 2)
            {
                $time = time()- 7*24*3600;
            }else{
                $time = time()- 30*24*3600;
            }

            $where = 'o.is_access = 0 and o.created > '.$time;
            $datalist = M('order')->alias('o')
                ->field('o.*,sup.username as sup_name,pur.username as pur_name')
                ->join('bd_user as sup on sup.uid = o.sup_id')
                ->join('bd_user as pur on pur.uid = o.pur_id')
                ->where($where)->order('o.created desc')->select();

            foreach ($datalist as $k => $v)
            {
                $goods = M('order_goods')->field('goods_name,goods_price,goods_count')->where('oid='.$v['oid'])->find();
                $datalist[$k]['goods_name'] = $goods['goods_name'];
                $datalist[$k]['goods_price'] = $goods['goods_price'];
                $datalist[$k]['goods_count'] = $goods['goods_count'];
            }

            $ex = D('exhibition')->getLists();
            $pro = D('project')->getLists();
            $this->assign('zhanting',$ex);
            $this->assign('project',$pro);
            $this->assign('datalist',$datalist);
            $this->display('Order/order_zhunru_no');

        }else{
            $this->redirect('order/zhunru_no');
        }
    }

    /**
     * 订单管理--非准入订单列表--订单详情
     */
    public function zhunru_no_info()
    {
        $id = I('get.oid');
        if (!$id)
        {
            $this->redirect('order/zhunru_no');exit();
        }

        $data = D('order')->getOnce($id);


        //查询物流信息
        //$expInfo = showapi_expInfo('shunfeng','883420070249072469');
        $expInfo_json = showapi_expInfo('zhongtong','441472438266');
        $expInfo = json_decode($expInfo_json,true);
        $expInfo_data = $expInfo['showapi_res_body']['data'];
        $this->assign('info',$data['info']);
        $this->assign('goods',$data['goods']);
        $this->assign('log',$data['order_log']);
        $this->assign('expInfo_data',$expInfo_data);
        $this->display('Order/order_zhunru_no_info');

    }

    /**
     * 商品管理--商品列表 - -退货
     */
    public function return_goods()
    {
        if(IS_POST)
        {
            $post = I('post.');

            if($post['type']==2)
            {
                $where = 'o.is_return=1';
                if ($post['exid'] != 0)
                {
                    $where = (!$where)?'':$where.' and ';
                    $where .= 'o.exid ='.$post['exid'];
                }

                if ($post['pid'] != 0)
                {
                    $where = (!$where)?'':$where.' and ';
                    $where .= 'o.pid ='.$post['pid'];
                }

                if ($post['order_status'] != 0)
                {
                    $where = (!$where)?'':$where.' and ';
                    $where .= 'o.status ='.$post['order_status'];
                }

                if ($post['pay_status'] != 0)
                {
                    $where = (!$where)?'':$where.' and ';
                    $where .= 'o.pay_stat ='.$post['pay_status'];
                }

                if($post['time_start'])
                {
                    $time_start = strtotime(date('Y-m-d',strtotime($post['time_start'])));
                    $time_end = strtotime(date('Y-m-d',strtotime($post['time_end'])));
                    $today = strtotime(date('Y-m-d',time()));

                    if ($time_start < $today && $time_start < $time_end)
                    {
                        $where = (!$where)?'':$where.' and ';
                        $where .= 'o.created < '.$time_end.' and o.created > '.$time_start;
                    }
                }

            }else{
                $like = $post['search'];
                $where = "o.is_return=1 and o.order_code like '%".$like."%'";

            }

            $datalist = M('order')->alias('o')
                ->field('o.*,sup.username as sup_name,pur.username as pur_name')
                ->join('bd_user as sup on sup.uid = o.sup_id')
                ->join('bd_user as pur on pur.uid = o.pur_id')
                ->where($where)->order('o.created desc')->select();
            foreach ($datalist as $k => $v)
            {
                $goods = M('order_goods')->field('goods_name,goods_price,goods_count')->where('oid='.$v['oid'])->find();
                $datalist[$k]['goods_name'] = $goods['goods_name'];
                $datalist[$k]['goods_price'] = $goods['goods_price'];
                $datalist[$k]['goods_count'] = $goods['goods_count'];
            }


            $this->assign('datalist',$datalist);
        }else{
            $where = "o.is_return=1";
            $data = D('order')->getList($where);
            $this->assign('datalist',$data['datalist']);
            $this->assign('page',$data['page']);
        }

        $ex = D('exhibition')->getLists();
        $pro = D('project')->getLists();

        $this->assign('zhanting',$ex);
        $this->assign('project',$pro);
        $this->display('Order/order_tuihuo');
    }
    /**
     * 商品管理--商品列表  - -退货   7天and 30天
     */
    public function limitday_return()
    {
        if(IS_GET)
        {
            $get = I('get.day');
            if($get == 2)
            {
                $time = time()- 30*24*3600;
            }else{
                $time = time()- 7*24*3600;
            }

            $where = 'o.is_access=0 and o.created > '.$time;

            $datalist = M('order')->alias('o')
                ->field('o.*,sup.username as sup_name,pur.username as pur_name')
                ->join('bd_user as sup on sup.uid = o.sup_id')
                ->join('bd_user as pur on pur.uid = o.pur_id')
                ->where($where)->order('o.created desc')->select();

            foreach ($datalist as $k => $v)
            {
                $goods = M('order_goods')->field('goods_name,goods_price,goods_count')->where('oid='.$v['oid'])->find();
                $datalist[$k]['goods_name'] = $goods['goods_name'];
                $datalist[$k]['goods_price'] = $goods['goods_price'];
                $datalist[$k]['goods_count'] = $goods['goods_count'];
            }

            $ex = D('exhibition')->getLists();
            $pro = D('project')->getLists();
            $this->assign('zhanting',$ex);
            $this->assign('project',$pro);
            $this->assign('datalist',$datalist);
            $this->display('Order/order_tuihuo');

        }else{
            $this->redirect('order/return_goods');
        }
    }

    /**
     * 订单管理--退货--订单详情
     */
    public function return_goods_info()
    {
        $id = I('get.oid');
        if (!$id)
        {
            $this->redirect('order/return_goods');exit();
        }

        $data = D('order')->getOnce($id);

        //查询物流信息
        //$expInfo = showapi_expInfo('shunfeng','883420070249072469');
        $expInfo_json = showapi_expInfo('zhongtong','441472438266');
        $expInfo = json_decode($expInfo_json,true);
        $expInfo_data = $expInfo['showapi_res_body']['data'];
        $this->assign('info',$data['info']);
        $this->assign('goods',$data['goods']);
        $this->assign('expInfo_data',$expInfo_data);
        $this->display('Order/order_tuihuo_info');

    }

    function order(){
        $arr = [];
        if(IS_GET){
            $post = I('get.');
            if($post['ex_goods_cid'])
                $goods_list['ex_goods_cid'] = $goods_where['ex_goods_cid'] = $post['ex_goods_cid'];
        }
        //供应商
        $exhibition = D('Exhibition');
        $goods = D('Goods');
        $where['is_auth'] =  1;
        $exh_list = $exhibition -> getLists($where);
        //总数
        $goods_where['is_sell'] = 1;
        $goods_count = $goods -> getCount($goods_where);

        //销售总额
        $goods_sum = $goods -> getSum($goods_where,'goods_sale_num');

        //商品列表
        $goods_list['is_auth'] =  1;
        $list =$goods -> getGoodsOrder($goods_list);
        foreach($list['datalist'] as $k => $v){
            $goods_only_where = array('goods_id' => $v['goods_id']);
            $goods_counts_only = $goods -> getGoodsCount($goods_only_where);
            $total = $v['goods_price']*$v['goods_sale_num'];
            $list['datalist'][$k]['goods_count'] = $goods_counts_only;
            $list['datalist'][$k]['total'] = $total;

        }

        //商品分类
        $cate = $goods -> getGoodsCate();
        $list_count = '';
        foreach($cate as $k => $v){
            $cate_list[] = '"'.$v['gc_name'].'"';
            $zhi_where = array('goods_cate_id' => $v['gcid'],'is_sell'=>1);
            $zhi = $goods ->getCount($zhi_where);
            $list_count  .=  "{value:".$zhi.",name:'".  $v['gc_name']."'},";
        }
        $cate = implode(',',$cate_list);

        $this -> assign(get_defined_vars());
        $this -> display();
    }

    function top(){
        $goods = D('Goods');
        $list_count = '';
        //商品列表
        $goods_list['is_auth'] =  1;
        $list =$goods -> getGoodsOrder($goods_list);
        foreach($list['datalist'] as $k => $v){
            $goods_only_where = array('goods_id' => $v['goods_id']);
            $goods_counts_only = $goods -> getGoodsCount($goods_only_where);
            $total = $v['goods_price']*$v['goods_sale_num'];
            $list['datalist'][$k]['goods_count'] = $goods_counts_only;
            $list['datalist'][$k]['total'] = $total;
            $cate_list[] = '"'.$v['goods_name'].'"';
            $list_count  .=  "{value:".$v['goods_sale_num'].",name:'".  $v['goods_name']."'},";
        }

        //前10的商品
        $cate = implode(',',$cate_list);

        $this -> assign(get_defined_vars());
        $this -> display();
    }

    /**
     * 订单管理--订单统计
     */
    function dingdan()
    {
        $time[] = strtotime(date('Y-m-d',time()));
        $time[] = strtotime(date('Y-m-d',time()-24*3600));
        $time[] = strtotime(date('Y-m-d',time()-2*24*3600));
        $time[] = strtotime(date('Y-m-d',time()-3*24*3600));
        $time[] = strtotime(date('Y-m-d',time()-4*24*3600));
        $time[] = strtotime(date('Y-m-d',time()-5*24*3600));
        $time[] = strtotime(date('Y-m-d',time()-6*24*3600));
        if(IS_POST)
        {
            $post = I('post.');
            foreach ($time as $key=>$val)
            {
                $orders[$key]['day'] = date('m-d',$val);
                $where = 'is_auth = 1';
                if ($post['exid'] != 0)
                {
                    $where = (!$where)?'':$where.' and ';
                    $where .= 'exid ='.$post['exid'];
                }

                if ($post['kehu'] != 0)
                {
                    $where = (!$where)?'':$where.' and ';
                    $where .= 'kehu ='.$post['kehu'];
                }

                if ($post['quyu'] != 0)
                {
                    $where = (!$where)?'':$where.' and ';
                    $where .= 'area_code ='.$post['quyu'];
                }

                //只选择采购商的话则直接查询订单
                if ($post['exid'] == 0 and $post['kehu'] == 0 and $post['quyu'] == 0 and $post['pid'] != 0)
                {
                    $orders[$key]['orders'] = M('order')->where('pid = '.$post['pid'].' and created > '.$val.' and created < '.($val+24*3600))->select();
                    $orders[$key]['counts'] = count($orders[$key]['orders']);
                    $num[$key] = count($orders[$key]['orders']);
                }else{
                    $ex = M('exhibition_hall')->where($where)->select();

                    foreach ($ex as $k => $v)
                    {
                        if($post['pid'] != 0)
                        {
                            $orders[$key]['orders'] = M('order')->where('exid = '.$v['exid'].' and pid = '.$post['pid'].' and created > '.$val.' and created < '.($val+24*3600))->select();
                            $orders[$key]['counts'] = count($orders[$key]['orders']);
                            $num[$key] = count($orders[$key]['orders']);
                        }else{
                            $orders[$key]['orders'] = M('order')->where('exid = '.$v['exid'].' and created > '.$val.' and created < '.($val+24*3600))->select();
                            $orders[$key]['counts'] = count($orders[$key]['orders']);
                            $num[$key] = count($orders[$key]['orders']);
                        }
                    }
                }
            }

        }else{
            foreach ($time as $key=>$val)
            {
                $orders[$key]['day'] = date('m-d',$val);
                $orders[$key]['orders'] = M('order')->where('created > '.$val.' and created < '.($val+24*3600))->select();
                $orders[$key]['counts'] = count($orders[$key]['orders']);
                $num[$key] = count($orders[$key]['orders']);
            }
        }
        //曲线数据
        $data = implode(',',$num);

        //供应商
        $exhibition = D('Exhibition');
        $hall_where = array('is_auth'=>1);
        $exh_list = $exhibition -> getLists($hall_where);

        //采购商
        $project = D('Project');
        $project_where['status'] = 1;
        $project_list = $project -> getLists($project_where);

        //区域经理
        $admin = D('Admin');
        $admin_where1['rid'] = 2;
        $qu_list = $admin -> getLists($admin_where1);

        //客户经理
        $admin_where2['rid'] = 3;
        $ke_list = $admin -> getLists($admin_where2);



        //七天
        for($i = 0;$i<7;$i++){
            $qi[] = '"'.date('m-d', strtotime('-'.$i.' days')).'"';
        }
        $tian = implode(',',$qi);

        $goods = D('Goods');
        foreach($orders[0]['orders'] as $k => $v){
            $goods_order_where['oid'] = $v['oid'];
            $goods_name = $goods -> getGoodsCateOnly($goods_order_where);
            $v['goods_name'] = $goods_name['gc_name'];

            //采购商
            $project_where['pid'] = $v['pur_id'];
            $project_once = $project -> getOnce($project_where);
            $v['project_name'] = $project_once['pro_name'];

            $order_list[] = $v;
        }

        $this -> assign(get_defined_vars());
        $this -> display();
    }

    /**
     * 商品管理--商品列表 - -银行汇款订单
     */
    public function order_bank(){
        if(IS_POST)
        {
            $post = I('post.');

            if($post['type']==2)
            {
                $where = 'pre.paid_way = 1';
                if ($post['exid'] != 0)
                {
                    $where = (!$where)?'':$where.' and ';
                    $where .= 'o.exid ='.$post['exid'];
                }

                if ($post['pid'] != 0)
                {
                    $where = (!$where)?'':$where.' and ';
                    $where .= 'o.pid ='.$post['pid'];
                }

                if ($post['order_status'] != 0)
                {
                    $where = (!$where)?'':$where.' and ';
                    $where .= 'o.status ='.$post['order_status'];
                }

                if ($post['pay_status'] != 0)
                {
                    $where = (!$where)?'':$where.' and ';
                    $where .= 'o.pay_stat ='.$post['pay_status'];
                }

                if($post['time_start'])
                {
                    $time_start = strtotime(date('Y-m-d',strtotime($post['time_start'])));
                    $time_end = strtotime(date('Y-m-d',strtotime($post['time_end'])));
                    $today = strtotime(date('Y-m-d',time()));

                    if ($time_start < $today && $time_start < $time_end)
                    {
                        $where = (!$where)?'':$where.' and ';
                        $where .= 'o.created < '.$time_end.' and o.created > '.$time_start;
                    }
                }

            }else{
                $like = $post['search'];
                $where = "pre.paid_way = 1 and o.order_code like '%".$like."%'";

            }

            $data = M('paid_record')->alias('pre')
                ->field('o.*,sup.username as sup_name,pur.username as pur_name')
                ->join('bd_order as o on o.oid = pre.oid')
                ->join('bd_exhibition_hall as ex on ex.exid = o.exid')
                ->join('bd_cg_project as pro on pro.pid = o.pid')//项目表
                ->join('bd_user as sup on sup.uid = o.sup_id')
                ->join('bd_user as pur on pur.uid = o.pur_id')
                ->where($where)->select();

            foreach ($data as $k => $v)
            {
                $goods = M('order_goods')->field('goods_name,goods_price,goods_count')
                    ->where('oid='.$v['oid'])->find();
                $data[$k]['goods_name'] = $goods['goods_name'];
                $data[$k]['goods_price'] = $goods['goods_price'];
                $data[$k]['goods_count'] = $goods['goods_count'];
            }
            //$this->assign('datalist',$data);
        }else{
            $where = "pre.paid_way = 1";
            $data = M('paid_record')->alias('pre')
                ->field('o.*,sup.username as sup_name,pur.username as pur_name')
                ->join('bd_order as o on o.oid = pre.oid')
                ->join('bd_exhibition_hall as ex on ex.exid = o.exid')
                ->join('bd_cg_project as pro on pro.pid = o.pid')
                ->join('bd_user as sup on sup.uid = o.sup_id')
                ->join('bd_user as pur on pur.uid = o.pur_id')
                ->where($where)->select();

            foreach ($data as $k => $v)
            {
                $goods = M('order_goods')->field('goods_name,goods_price,goods_count')
                    ->where('oid='.$v['oid'])->find();
                $data[$k]['goods_name'] = $goods['goods_name'];
                $data[$k]['goods_price'] = $goods['goods_price'];
                $data[$k]['goods_count'] = $goods['goods_count'];
            }
        }
        $this->assign('data',$data);
        $ex = D('exhibition')->getLists();
        $pro = D('project')->getLists();
        $this->assign('zhanting',$ex);
        $this->assign('project',$pro);
        $this->display('order/order_bank');
    }


    /**
     * 订单管理--银行汇款--订单列表--7天/10天链接
     */
    public function limitday_bank()
    {
        if(IS_GET)
        {
            $get = I('get.day');
            if($get == 2)
            {
                $time = time()- 30*24*3600;
            }else{
                $time = time()- 7*24*3600;
            }
            $where = 'pre.paid_way = 1 and o.created > '.$time;
            $data = M('paid_record')->alias('pre')
                ->field('o.*,sup.username as sup_name,pur.username as pur_name')
                ->join('bd_order as o on o.oid = pre.oid')
                ->join('bd_exhibition_hall as ex on ex.exid = o.exid')
                ->join('bd_cg_project as pro on pro.pid = o.pid')
                ->join('bd_user as sup on sup.uid = o.sup_id')
                ->join('bd_user as pur on pur.uid = o.pur_id')
                ->where($where)->select();

            foreach ($data as $k => $v)
            {
                $goods = M('order_goods')->field('goods_name,goods_price,goods_count')
                    ->where('oid='.$v['oid'])->find();
                $data[$k]['goods_name'] = $goods['goods_name'];
                $data[$k]['goods_price'] = $goods['goods_price'];
                $data[$k]['goods_count'] = $goods['goods_count'];
            }

            $this->assign('datalist',$data);
            $ex = D('exhibition')->getLists();
            $pro = D('project')->getLists();
            $this->assign('zhanting',$ex);
            $this->assign('project',$pro);
            $this->display('order/order_bank');

        }else{
            $this->redirect('order/order_bank');
        }
    }

    /**
     * 订单管理--银行汇款--订单详情
     */
    public function return_bank_info()
    {
        $id = I('get.oid');
        if (!$id)
        {
            $this->redirect('order/order_bank');exit();
        }

        $data = D('order')->getOnce($id);

        //查询物流信息
        //$expInfo = showapi_expInfo('shunfeng','883420070249072469');
        $expInfo_json = showapi_expInfo('zhongtong','441472438266');
        $expInfo = json_decode($expInfo_json,true);
        $expInfo_data = $expInfo['showapi_res_body']['data'];
        $this->assign('info',$data['info']);
        $this->assign('goods',$data['goods']);
        $this->assign('expInfo_data',$expInfo_data);
        $this->display('order/order_bank_info');
    }
    /**
     * 财务管理--平台对账--已结算
     */
    public function duizhang_jiesuan(){
        if(IS_POST)
        {
            $post = I('post.');

            if($post['type']==2)
            {
                $where = 'pre.is_jiesuan = 1';
                if ($post['exid'] != 0)
                {
                    $where = (!$where)?'':$where.' and ';
                    $where .= 'o.exid ='.$post['exid'];
                }

                if ($post['pid'] != 0)
                {
                    $where = (!$where)?'':$where.' and ';
                    $where .= 'o.pid ='.$post['pid'];
                }

                if ($post['order_status'] != 0)
                {
                    $where = (!$where)?'':$where.' and ';
                    $where .= 'o.status ='.$post['order_status'];
                }

                if ($post['pay_status'] != 0)
                {
                    $where = (!$where)?'':$where.' and ';
                    $where .= 'o.pay_stat ='.$post['pay_status'];
                }

                if($post['time_start'])
                {
                    $time_start = strtotime(date('Y-m-d',strtotime($post['time_start'])));
                    $time_end = strtotime(date('Y-m-d',strtotime($post['time_end'])));
                    $today = strtotime(date('Y-m-d',time()));

                    if ($time_start < $today && $time_start < $time_end)
                    {
                        $where = (!$where)?'':$where.' and ';
                        $where .= 'pre.paid_time < '.$time_end.' and pre.paid_time > '.$time_start;
                    }
                }

            }else{
                $like = $post['search'];
                $where = "pre.is_jiesuan = 1 and o.order_code like '%".$like."%'";

            }

            $data = M('paid_record')->alias('pre')
                ->field('o.*,sup.username as sup_name,pur.username as pur_name,pre.pid,pre.paid_time,pre.paid_way,pre.is_confirm,pre.bank_code,pre.total')
                ->join('bd_order as o on o.oid = pre.oid')
                ->join('bd_exhibition_hall as ex on ex.exid = o.exid')
                ->join('bd_cg_project as pro on pro.pid = o.pid')
                ->join('bd_user as sup on sup.uid = o.sup_id')
                ->join('bd_user as pur on pur.uid = o.pur_id')
                ->where($where)->select();

            foreach ($data as $k => $v)
            {
                $goods = M('order_goods')->field('goods_name,goods_price,goods_count')
                    ->where('oid='.$v['oid'])->find();
                $data[$k]['goods_name'] = $goods['goods_name'];
                $data[$k]['goods_price'] = $goods['goods_price'];
                $data[$k]['goods_count'] = $goods['goods_count'];
            }
            //$this->assign('datalist',$data);
        }else{
            $where = "pre.is_jiesuan = 1";
            $data = M('paid_record')->alias('pre')
                ->field('o.*,sup.username as sup_name,pur.username as pur_name,pre.pid,pre.paid_time,pre.paid_way,pre.is_confirm,pre.bank_code,pre.total')
                ->join('bd_order as o on o.oid = pre.oid')
                ->join('bd_exhibition_hall as ex on ex.exid = o.exid')
                ->join('bd_cg_project as pro on pro.pid = o.pid')
                ->join('bd_user as sup on sup.uid = o.sup_id')
                ->join('bd_user as pur on pur.uid = o.pur_id')
                ->where($where)->select();

            foreach ($data as $k => $v)
            {
                $goods = M('order_goods')->field('goods_name,goods_price,goods_count')
                    ->where('oid='.$v['oid'])->find();
                $data[$k]['goods_name'] = $goods['goods_name'];
                $data[$k]['goods_price'] = $goods['goods_price'];
                $data[$k]['goods_count'] = $goods['goods_count'];
            }
        }
        $this->assign('data',$data);
        $ex = D('exhibition')->getLists();
        $pro = D('project')->getLists();
        $this->assign('zhanting',$ex);
        $this->assign('project',$pro);
        $this->display('order/caiwu_duizhang_jiesuan');
    }

    /**
     * 财务管理--平台对账--已结算--7天/30天链接
     */
    public function limitday_tongji_jiesuan()
    {
        if(IS_GET)
        {
            $get = I('get.day');
            if($get == 2)
            {
                $time = time()- 30*24*3600;
            }else{
                $time = time()- 7*24*3600;
            }
            $where = 'pre.is_jiesuan = 1 and pre.paid_time > '.$time;
            //echo $where;
            $data = M('paid_record')->alias('pre')
                ->field('o.*,sup.username as sup_name,pur.username as pur_name,pre.pid,pre.paid_time,pre.bank_code,pre.paid_way,pre.is_confirm,pre.total')
                ->join('bd_order as o on o.oid = pre.oid')
                ->join('bd_exhibition_hall as ex on ex.exid = o.exid')
                ->join('bd_cg_project as pro on pro.pid = o.pid')
                ->join('bd_user as sup on sup.uid = o.sup_id')
                ->join('bd_user as pur on pur.uid = o.pur_id')
                ->where($where)->select();

            foreach ($data as $k => $v)
            {
                $goods = M('order_goods')->field('goods_name,goods_price,goods_count')
                    ->where('oid='.$v['oid'])->find();
                $data[$k]['goods_name'] = $goods['goods_name'];
                $data[$k]['goods_price'] = $goods['goods_price'];
                $data[$k]['goods_count'] = $goods['goods_count'];
            }
            $this->assign('datalist',$data);
            $ex = D('exhibition')->getLists();
            $pro = D('project')->getLists();
            $this->assign('zhanting',$ex);
            $this->assign('project',$pro);
            $this->display('order/caiwu_duizhang_jiesuan');

        }else{
            $this->redirect('order/duizhang_jiesuan');
        }
    }
    /**
     * 财务管理--平台对账--已结算---导出
     *
     */
    public function duizhang_jiesuan_csv()
    {
        $data = M('paid_record')->alias('pre')
            ->field('pre.pid,pur.username as pur_name,o.order_code,pre.total,o.pay_stat,pre.paid_time,pre.bank_code,pre.paid_way,sup.username as sup_name,pre.is_confirm')
            ->join('bd_order as o on o.oid = pre.oid')
            ->join('bd_exhibition_hall as ex on ex.exid = o.exid')
            ->join('bd_cg_project as pro on pro.pid = o.pid')
            ->join('bd_user as sup on sup.uid = o.sup_id')
            ->join('bd_user as pur on pur.uid = o.pur_id')
            ->where('pre.is_jiesuan = 1')->select();

        foreach($data as $key => $value)
        {
            $data[$key]['paid_time'] = date("Y-m-d H:i:s", $value['paid_time']);
            $data[$key]['paid_way'] = ($value['paid_way']==1)?'线下银行':'线上支付';
            $data[$key]['is_confirm'] = ($value['is_confirm']==1)?'已通过':'待审核';
            if($value['pay_stat']==1){
                $data[$key]['pay_stat'] = '预付款';
            }elseif ($value['pay_stat']==2){
                $data[$key]['pay_stat'] = '发货款';
            }elseif ($value['pay_stat']==3){
                $data[$key]['pay_stat'] = '验收款';
            }elseif ($value['pay_stat']==4){
                $data[$key]['pay_stat'] = '质保金';
            };
        }
        $csv = new Csv();
        $title = array('序号','采购商','订单号','付款金额','款项','付款时间','支付单号','支付渠道','供应商/展厅','状态');
        $csv -> put_csv($data,$title);
    }
    /**
     * 财务管理--平台对账--待结算
     */
    public function duizhang_daijiesuan(){
        if(IS_POST)
        {
            $post = I('post.');

            if($post['type']==2)
            {
                $where = 'pre.is_jiesuan = 0';
                if ($post['exid'] != 0)
                {
                    $where = (!$where)?'':$where.' and ';
                    $where .= 'o.exid ='.$post['exid'];
                }

                if ($post['pid'] != 0)
                {
                    $where = (!$where)?'':$where.' and ';
                    $where .= 'o.pid ='.$post['pid'];
                }

                if ($post['order_status'] != 0)
                {
                    $where = (!$where)?'':$where.' and ';
                    $where .= 'o.status ='.$post['order_status'];
                }

                if ($post['pay_status'] != 0)
                {
                    $where = (!$where)?'':$where.' and ';
                    $where .= 'o.pay_stat ='.$post['pay_status'];
                }

                if($post['time_start'])
                {
                    $time_start = strtotime(date('Y-m-d',strtotime($post['time_start'])));
                    $time_end = strtotime(date('Y-m-d',strtotime($post['time_end'])));
                    $today = strtotime(date('Y-m-d',time()));

                    if ($time_start < $today && $time_start < $time_end)
                    {
                        $where = (!$where)?'':$where.' and ';
                        $where .= 'pre.paid_time < '.$time_end.' and pre.paid_time > '.$time_start;
                    }
                }

            }else{
                $like = $post['search'];
                $where = "pre.is_jiesuan = 0 and o.order_code like '%".$like."%'";

            }

            $data = M('paid_record')->alias('pre')
                ->field('o.*,sup.username as sup_name,pur.username as pur_name,pre.pid,pre.paid_time,pre.paid_way,pre.is_confirm,pre.bank_code,pre.total')
                ->join('bd_order as o on o.oid = pre.oid')
                ->join('bd_exhibition_hall as ex on ex.exid = o.exid')
                ->join('bd_cg_project as pro on pro.pid = o.pid')
                ->join('bd_user as sup on sup.uid = o.sup_id')
                ->join('bd_user as pur on pur.uid = o.pur_id')
                ->where($where)->select();

            foreach ($data as $k => $v)
            {
                $goods = M('order_goods')->field('goods_name,goods_price,goods_count')
                    ->where('oid='.$v['oid'])->find();
                $data[$k]['goods_name'] = $goods['goods_name'];
                $data[$k]['goods_price'] = $goods['goods_price'];
                $data[$k]['goods_count'] = $goods['goods_count'];
            }
            //$this->assign('datalist',$data);
        }else{
            $where = "pre.is_jiesuan = 0";
            $data = M('paid_record')->alias('pre')
                ->field('o.*,sup.username as sup_name,pur.username as pur_name,pre.pid,pre.paid_time,pre.paid_way,pre.is_confirm,pre.bank_code,pre.total')
                ->join('bd_order as o on o.oid = pre.oid')
                ->join('bd_exhibition_hall as ex on ex.exid = o.exid')
                ->join('bd_cg_project as pro on pro.pid = o.pid')
                ->join('bd_user as sup on sup.uid = o.sup_id')
                ->join('bd_user as pur on pur.uid = o.pur_id')
                ->where($where)->select();

            foreach ($data as $k => $v)
            {
                $goods = M('order_goods')->field('goods_name,goods_price,goods_count')
                    ->where('oid='.$v['oid'])->find();
                $data[$k]['goods_name'] = $goods['goods_name'];
                $data[$k]['goods_price'] = $goods['goods_price'];
                $data[$k]['goods_count'] = $goods['goods_count'];
            }
        }
        $this->assign('data',$data);
        $ex = D('exhibition')->getLists();
        $pro = D('project')->getLists();
        $this->assign('zhanting',$ex);
        $this->assign('project',$pro);
        $this->display('order/caiwu_duizhang_daijiesuan');
    }

    /**
     * 财务管理--平台对账--待结算--7天/30天链接
     */
    public function limitday_tongji_daijiesuan()
    {
        if(IS_GET)
        {
            $get = I('get.day');
            if($get == 2)
            {
                $time = time()- 30*24*3600;
            }else{
                $time = time()- 7*24*3600;
            }
            $where = 'pre.is_jiesuan = 1 and pre.paid_time > '.$time;
            //echo $where;
            $data = M('paid_record')->alias('pre')
                ->field('o.*,sup.username as sup_name,pur.username as pur_name,pre.pid,pre.paid_time,pre.bank_code,pre.paid_way,pre.is_confirm')
                ->join('bd_order as o on o.oid = pre.oid')
                ->join('bd_exhibition_hall as ex on ex.exid = o.exid')
                ->join('bd_cg_project as pro on pro.pid = o.pid')
                ->join('bd_user as sup on sup.uid = o.sup_id')
                ->join('bd_user as pur on pur.uid = o.pur_id')
                ->where($where)->select();

            foreach ($data as $k => $v)
            {
                $goods = M('order_goods')->field('goods_name,goods_price,goods_count')
                    ->where('oid='.$v['oid'])->find();
                $data[$k]['goods_name'] = $goods['goods_name'];
                $data[$k]['goods_price'] = $goods['goods_price'];
                $data[$k]['goods_count'] = $goods['goods_count'];
            }
            $this->assign('datalist',$data);
            $ex = D('exhibition')->getLists();
            $pro = D('project')->getLists();
            $this->assign('zhanting',$ex);
            $this->assign('project',$pro);
            $this->display('order/caiwu_duizhang_daijiesuan');

        }else{
            $this->redirect('order/duizhang_daijiesuan');
        }
    }
    /**
     * 财务管理--平台对账--待结算---导出
     *
     */
    public function duizhang_daijiesuan_csv()
    {
        $data = M('paid_record')->alias('pre')
            ->field('pre.pid,pur.username as pur_name,o.order_code,pre.total,o.pay_stat,pre.paid_time,pre.bank_code,pre.paid_way,sup.username as sup_name,pre.is_confirm')
            ->join('bd_order as o on o.oid = pre.oid')
            ->join('bd_exhibition_hall as ex on ex.exid = o.exid')
            ->join('bd_cg_project as pro on pro.pid = o.pid')
            ->join('bd_user as sup on sup.uid = o.sup_id')
            ->join('bd_user as pur on pur.uid = o.pur_id')
            ->where('pre.is_jiesuan = 1')->select();

        foreach($data as $key => $value)
        {
            $data[$key]['paid_time'] = date("Y-m-d H:i:s", $value['paid_time']);
            $data[$key]['paid_way'] = ($value['paid_way']==1)?'线下银行':'线上支付';
            $data[$key]['is_confirm'] = ($value['is_confirm']==1)?'已通过':'待审核';
            if($value['pay_stat']==1){
                $data[$key]['pay_stat'] = '预付款';
            }elseif ($value['pay_stat']==2){
                $data[$key]['pay_stat'] = '发货款';
            }elseif ($value['pay_stat']==3){
                $data[$key]['pay_stat'] = '验收款';
            }elseif ($value['pay_stat']==4){
                $data[$key]['pay_stat'] = '质保金';
            };
        }
        $csv = new Csv();
        $title = array('序号','采购商','订单号','付款金额','款项','付款时间','支付单号','支付渠道','供应商/展厅','状态');
        $csv -> put_csv($data,$title);
    }

    /**
     * 财务管理--交易明细
     */
    public function duizhang_mingxi(){
        if(IS_POST)
        {
            $post = I('post.');

            if($post['type']==2)
            {
                $where = '';
                if ($post['exid'] != 0)
                {
                    $where = (!$where)?'':$where.' and ';
                    $where .= 'o.exid ='.$post['exid'];
                }

                if ($post['pid'] != 0)
                {
                    $where = (!$where)?'':$where.' and ';
                    $where .= 'o.pid ='.$post['pid'];
                }

                if ($post['order_status'] != 0)
                {
                    $where = (!$where)?'':$where.' and ';
                    $where .= 'o.status ='.$post['order_status'];
                }

                if ($post['pay_status'] != 0)
                {
                    $where = (!$where)?'':$where.' and ';
                    $where .= 'o.pay_stat ='.$post['pay_status'];
                }

                if($post['time_start'])
                {
                    $time_start = strtotime(date('Y-m-d',strtotime($post['time_start'])));
                    $time_end = strtotime(date('Y-m-d',strtotime($post['time_end'])));
                    $today = strtotime(date('Y-m-d',time()));

                    if ($time_start < $today && $time_start < $time_end)
                    {
                        $where = (!$where)?'':$where.' and ';
                        $where .= 'pre.paid_time < '.$time_end.' and pre.paid_time > '.$time_start;
                    }
                }

            }else{
                $like = $post['search'];
                $where = " o.order_code like '%".$like."%'";

            }

            $data = M('paid_record')->alias('pre')
                ->field('o.*,sup.username as sup_name,pur.username as pur_name,pre.*')
                ->join('bd_order as o on o.oid = pre.oid')
                ->join('bd_exhibition_hall as ex on ex.exid = o.exid')
                ->join('bd_cg_project as pro on pro.pid = o.pid')
                ->join('bd_user as sup on sup.uid = o.sup_id')
                ->join('bd_user as pur on pur.uid = o.pur_id')
                ->where($where)->select();

            foreach ($data as $k => $v)
            {
                $goods = M('order_goods')->field('goods_name,goods_price,goods_count')
                    ->where('oid='.$v['oid'])->find();
                $data[$k]['goods_name'] = $goods['goods_name'];
                $data[$k]['goods_price'] = $goods['goods_price'];
                $data[$k]['goods_count'] = $goods['goods_count'];
                $data[$k]['gys_pay'] = $data[$k]['total'] - $data[$k]['ticheng_one']-$data[$k]['ticheng_two']-$data[$k]['ticheng_three']-$data[$k]['pingtai']-$data[$k]['quyu_pay']-$data[$k]['kehu_pay'];
            }
            //$this->assign('datalist',$data);
        }else{
            $where = "";
            $data = M('paid_record')->alias('pre')
                ->field('o.*,sup.username as sup_name,pur.username as pur_name,pre.*')
                ->join('bd_order as o on o.oid = pre.oid')
                ->join('bd_exhibition_hall as ex on ex.exid = o.exid')
                ->join('bd_cg_project as pro on pro.pid = o.pid')
                ->join('bd_user as sup on sup.uid = o.sup_id')
                ->join('bd_user as pur on pur.uid = o.pur_id')
                ->where($where)->select();

            foreach ($data as $k => $v)
            {
                $goods = M('order_goods')->field('goods_name,goods_price,goods_count')
                    ->where('oid='.$v['oid'])->find();
                $data[$k]['goods_name'] = $goods['goods_name'];
                $data[$k]['goods_price'] = $goods['goods_price'];
                $data[$k]['goods_count'] = $goods['goods_count'];
                $data[$k]['goods_count'] = $goods['goods_count'];
                $data[$k]['gys_pay'] = $data[$k]['total'] - $data[$k]['ticheng_one']-$data[$k]['ticheng_two']-$data[$k]['ticheng_three']-$data[$k]['pingtai']-$data[$k]['quyu_pay']-$data[$k]['kehu_pay'];
            }
        }
        $this->assign('data',$data);
        $ex = D('exhibition')->getLists();
        $pro = D('project')->getLists();
        $this->assign('zhanting',$ex);
        $this->assign('project',$pro);
        $this->display('order/caiwu_duizhang_mingxi');
    }

    /**
     * 财务管理--交易明细--7天/30天链接
     */
    public function limitday_tongji_mingxi()
    {
        if(IS_GET)
        {
            $get = I('get.day');
            if($get == 2)
            {
                $time = time()- 30*24*3600;
            }else{
                $time = time()- 7*24*3600;
            }
            $where = 'pre.is_jiesuan = 1 and pre.paid_time > '.$time;
            //echo $where;
            $data = M('paid_record')->alias('pre')
                ->field('o.*,sup.username as sup_name,pur.username as pur_name,pre.*')
                ->join('bd_order as o on o.oid = pre.oid')
                ->join('bd_exhibition_hall as ex on ex.exid = o.exid')
                ->join('bd_cg_project as pro on pro.pid = o.pid')
                ->join('bd_user as sup on sup.uid = o.sup_id')
                ->join('bd_user as pur on pur.uid = o.pur_id')
                ->where($where)->select();

            foreach ($data as $k => $v)
            {
                $goods = M('order_goods')->field('goods_name,goods_price,goods_count')
                    ->where('oid='.$v['oid'])->find();
                $data[$k]['goods_name'] = $goods['goods_name'];
                $data[$k]['goods_price'] = $goods['goods_price'];
                $data[$k]['goods_count'] = $goods['goods_count'];
                $data[$k]['gys_pay'] = $data[$k]['total'] - $data[$k]['ticheng_one']-$data[$k]['ticheng_two']-$data[$k]['ticheng_three']-$data[$k]['pingtai']-$data[$k]['quyu_pay']-$data[$k]['kehu_pay'];
            }
            $this->assign('datalist',$data);
            $ex = D('exhibition')->getLists();
            $pro = D('project')->getLists();
            $this->assign('zhanting',$ex);
            $this->assign('project',$pro);
            $this->display('order/caiwu_duizhang_mingxi');

        }else{
            $this->redirect('order/duizhang_mingxi');
        }
    }
    /**
     * 财务管理--交易明细---导出
     *
     */
    public function duizhang_mingxi_csv()
    {
        $data = M('paid_record')->alias('pre')
            ->field('pre.pid,pur.username as pur_name,o.order_code,pre.total,o.pay_stat,sup.username as sup_name,pre.ticheng_one,pre.ticheng_two,pre.ticheng_three,pre.pingtai,pre.quyu_pay,pre.kehu_pay,pre.paid_time,pre.bank_code,pre.is_confirm')
            ->join('bd_order as o on o.oid = pre.oid')
            ->join('bd_exhibition_hall as ex on ex.exid = o.exid')
            ->join('bd_cg_project as pro on pro.pid = o.pid')
            ->join('bd_user as sup on sup.uid = o.sup_id')
            ->join('bd_user as pur on pur.uid = o.pur_id')
            ->where('pre.is_jiesuan = 1')->select();

        foreach($data as $key => $value)
        {
            $data[$key]['paid_time']    = date("Y-m-d H:i:s", $value['paid_time']);
            //$data[$key]['paid_way'] = ($value['paid_way']==1)?'线下银行':'线上支付';
            $data[$key]['is_confirm'] = ($value['is_confirm']==1)?'已到账':'处理中';
            if($value['pay_stat']==1){
                $data[$key]['pay_stat'] = '预付款';
            }elseif ($value['pay_stat']==2){
                $data[$key]['pay_stat'] = '发货款';
            }elseif ($value['pay_stat']==3){
                $data[$key]['pay_stat'] = '验收款';
            }elseif ($value['pay_stat']==4){
                $data[$key]['pay_stat'] = '质保金';
            };
            $data[$key]['gys_pay'] = ($data[$key]['total'] - $data[$key]['ticheng_one']-$data[$key]['ticheng_two']-$data[$key]['ticheng_three']-$data[$key]['pingtai']-$data[$key]['quyu_pay']-$data[$key]['kehu_pay']);
        }
        $csv = new Csv();
        $title = array('序号','采购商','订单号','付款金额','款项','供应商/展厅','一级业务员提成','二级业务员提成','三级业务员提成','平台服务费','区域经理提成','客户经理提成','结算时间','支付单号','状态','供应商收款');
        $csv -> put_csv($data,$title);
    }

    /**
     * 财务管理--白名单
     *
     */
    public function baimingdan()
    {
        $this->display('order/caiwu_baimingdan');
    }


}