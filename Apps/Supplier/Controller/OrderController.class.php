<?php
/**
 * Created by PhpStorm.
 * User: Gaby
 * Date: 2017-04-12
 * Time: 10:03
 * 供应商首页控制器
 */
namespace Supplier\Controller;
use Supplier\Controller\SupController;

class OrderController extends SupController
{
    /* 供应商--后台订单管理控制器 */

    /**
     * 订单管理--XXXX
     *
     */
    //准入订单页面
    public function access_order()
    {
        $this->display();
    }
    //准入订单详情
    public function order_details()
    {
        $this->display();
    }
    //非准入订单页面
    public function not_order()
    {
    	$this->display();
    }
    //退货列表
    public function return_list()
    {
    	$this->display();
    }
    //加星订单
    public function add_order()
    {
    	$this->display();
    }
    //商品统计
    public function modity_statis()
    {
    	$this->display();
    }
    //订单统计
    public function order_statis()
    {
    	$this->display();
    }
    //订单应收款
    public function ar_order()
    {
    	$this->display();
    }
    //收款记录
    public function ct_recorde()
    {
    	$this->display();
    }
    //收支明细
    public function detail()
    {
        $this->display();
    }
    //待开发票
    public function open_invoice()
    {
    	$this->display();
    }
    //待确认发票
    public function cf_invoice()
    {
        $this->display();
    }
    //确认发票
    public function confirm_invoice()
    {
        $this->display();
    }
    //已拒绝发票
    public function refuse_invoice()
    {
        $this->display();
    }

}