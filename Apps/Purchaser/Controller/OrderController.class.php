<?php
/**
 * Created by PhpStorm.
 * User: wwkil
 * Date: 2017/6/8
 * Time: 9:54
 */

namespace Purchaser\Controller;
use Purchaser\Controller\PurController;

class OrderController extends PurController
{
    public function __construct()
    {
        parent::__construct();
        session('uid',3);
        session('belong',0);
        $this -> uid = session('uid');
        $this -> belong = session('belong') == 0 ? $this -> uid : session('belong');
        $this -> url = __CONTROLLER__;
        if(IS_POST) $this -> post = I('post.');
    }

    /*准入订单页面*/
    public function access(){
        /*查询用户信息*/
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
            -> field('pid,pro_name')
            -> where($pwhere)
            -> order('add_time DESC')
            -> select();
        unset($pwhere);
        $access = 1;
        /*项目大于1个时将出现所有项目*/
        if(count($project) > 1){
            $pros = '';
            foreach($project AS $value){
                $pros .= $value['pid'].',';
            }
            $pros = rtrim($pros, ',');
            $p = array(
                'pid'       => $pros,
                'pro_name'  => '全部项目',
            );
            array_unshift($project,$p);
            unset($p);
        }
        /*全部项目结束*/
        $admit = M('admit') -> alias('a') -> field('a.exid,e.ex_name') -> join('bd_exhibition_hall AS e ON a.exid = e.exid') -> where('a.uid = '.$this -> belong.' AND a.pid in ('.$pros.')') -> select();
        /*多个供应商展厅时遍历取出全部供应商*/
        if(count($admit) > 1){
            $ads = '';
            foreach($admit AS $value){
                $ads .= $value['pid'].',';
            }
            $ads = rtrim($pros, ',');
            $p = array(
                'exid'      => $ads,
                'ex_name'   => '全部供应商',
            );
            array_unshift($admit,$p);
            unset($p,$ads);
        }
        $model = new \Purchaser\Model\OrderModel();
        $orders = $model -> getOrders(array(),$this -> belong,$user['pt_role'],1);
//        dump($orders);die;
        $count = count($orders['data']);
        $this -> assign('project', $project);
        $this -> assign('count', $count);
        $this -> assign('admit', $admit);
        $this -> assign('orders', $orders['data']);
        $this -> assign('emptyL','<li class="wr_list"><div style="font-size: 18px;magin:0 auto;text-align: center;">暂无采购订单</div></li>');
        $this -> display();
    }

    /*非准入订单页面*/
    public function nonAccess(){
        /*查询用户信息*/
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
            -> field('pid,pro_name')
            -> where($pwhere)
            -> order('add_time DESC')
            -> select();
        unset($pwhere);
        $access = 1;
        /*项目大于1个时将出现所有项目*/
        if(count($project) > 1){
            $pros = '';
            foreach($project AS $value){
                $pros .= $value['pid'].',';
            }
            $pros = rtrim($pros, ',');
            $p = array(
                'pid'       => $pros,
                'pro_name'  => '全部项目',
            );
            array_unshift($project,$p);
            unset($p);
        }
        /*全部项目结束*/
        $admit = M('admit') -> alias('a') -> field('a.exid,e.ex_name') -> join('bd_exhibition_hall AS e ON a.exid = e.exid') -> where('a.uid = '.$this -> belong.' AND a.pid in ('.$pros.')') -> select();
        /*多个供应商展厅时遍历取出全部供应商*/
        if(count($admit) > 1){
            $ads = '';
            foreach($admit AS $value){
                $ads .= $value['pid'].',';
            }
            $ads = rtrim($pros, ',');
            $p = array(
                'exid'      => $ads,
                'ex_name'   => '全部供应商',
            );
            array_unshift($admit,$p);
            unset($p,$ads);
        }
        $model = new \Purchaser\Model\OrderModel();
        $orders = $model -> getOrders(array(),$this -> belong,$user['pt_role'],0);
//        dump($orders);die;
        $count = $orders['count'];
        $this -> assign('project', $project);
        $this -> assign('count', $count);
        $this -> assign('admit', $admit);
        $this -> assign('orders', $orders['data']);
        $this -> assign('emptyL','<li class="wr_list"><div style="font-size: 18px;magin:0 auto;text-align: center;">暂无采购订单</div></li>');
        $this -> display();
    }

    /*筛选订单*/
    public function getOrder(){
        $access = 1;
        $model = new \Purchaser\Model\OrderModel();
        $orders = $model -> getOrders($this -> post,$this -> belong,$access);
        $this -> ajaxReturn($orders);
        dump($this -> post);die;
    }


    /*退货列表*/
    public function returnList(){
        $this -> display();
    }

    /*订单详情页*/
    public function detail(){
        $this -> display();
    }
}