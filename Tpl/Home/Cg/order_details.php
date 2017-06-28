<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="wap-font-scale" content="no">
  <title>订单详情</title>
    <link rel="stylesheet" href="__HOME_PUBLIC__/finance/css/exhibition_hall_style.css">
  <link rel="stylesheet" href="__HOME_PUBLIC__/finance/css/swiper.min.css">
  <link rel="stylesheet" href="__HOME_PUBLIC__/finance/css/icons.css">
  <link rel="stylesheet" href="__HOME_PUBLIC__/finance/css/reset.css">
  <link rel="stylesheet" href="__HOME_PUBLIC__/finance/css/style.css">
</head>
<body>
 <include file="Public/Cgheader" />
<!-- ++++++++++++++++++++++++++++++++++++++ -->
    <div class="wh1200auto">
      <div class="right_con_down bg-fff staff_0607 bor_1ddd">
        <div class="clearfix container min-w" id="app-container">
          <div class="cont_lump cont_lump_sell cont_lump_order1">
            <div class="title_ty ">
              <span class="tit_name">订单详情</span>
            </div>
           <div class="orderFlow">
              <ul class="clearfix mgauto center">

                <if condition="$od['status'] eq 0">
<li><img style="width:1100px;" src="__HOME_PUBLIC__/finance/images/order-status1.png" alt=""></li>
                 <elseif condition="$od['status'] eq 1"/>
<li><img style="width:1100px;" src="__HOME_PUBLIC__/finance/images/order-status2.png" alt=""></li>                
                 <elseif condition="$od['status'] eq 2"/>
<li><img style="width:1100px;" src="__HOME_PUBLIC__/finance/images/order-status2.png" alt=""></li>
                 <elseif condition="$od['status'] eq 3"/>
<li><img style="width:1100px;" src="__HOME_PUBLIC__/finance/images/order-status2.png" alt=""></li>
                 <elseif condition="$od['status'] eq 4"/>
<li><img style="width:1100px;" src="__HOME_PUBLIC__/finance/images/order-status2.png" alt=""></li>
                 <elseif condition="$od['status'] eq 5"/>
<li><img style="width:1100px;" src="__HOME_PUBLIC__/finance/images/order-status2.png" alt=""></li>
                 <elseif condition="$od['status'] eq 6"/>
<li><img style="width:1100px;" src="__HOME_PUBLIC__/finance/images/order-status2.png" alt=""></li>
                 <elseif condition="$od['status'] eq 7"/>
<li><img style="width:1100px;" src="__HOME_PUBLIC__/finance/images/order-status2.png" alt=""></li>
<!--                  <elseif condition="$od['status'] eq 8"/>
<li><img style="width:1100px;" src="__HOME_PUBLIC__/finance/images/order-return7.png" alt=""></li>
                 <elseif condition="$od['status'] eq 9"/>
<li><img style="width:1100px;" src="__HOME_PUBLIC__/finance/images/order-return8.png" alt=""></li>
                 <elseif condition="$od['status'] eq 10"/>
<li><img style="width:1100px;" src="__HOME_PUBLIC__/finance/images/order-return9.png" alt=""></li> -->
               </if>
               
                <!-- <li>
                <h5>商品下单</h5>
                <h6>2016-03-23 12:12</h6>
                </li>
                <li>
                <h5>支付预付款</h5>
                <h6>2016-03-23 12:12</h6>
                </li>
                <li>
                <h5>商品出库</h5>
                <h6>2016-03-23 12:12</h6>
                </li>
                <li>
                <h5>支付发货款</h5>
                <h6>2016-03-23 12:12</h6>
                </li>
                <li>
                <h5>供应商发货</h5>
                <h6>2016-03-23 12:12</h6>
                </li>
                <li>
                <h5>验收付款</h5>
                <h6>2016-03-23 12:12</h6>
                </li>
                <li>
                <h5>付质保金</h5>
                <h6>2016-03-23 12:12</h6>
                </li>
                <li>
                <h5>订单完成</h5>
                <h6>2016-03-23 12:12</h6>
                </li> -->
              </ul>
            </div> 
         <div class="orderSwitch">
          <span class="active">订单详情</span>
          <span>付款记录</span>
          <span>出库/物流</span>
        </div>
        <div class="con">
            <div class="general lump1 logistics">
                <ul class="dingjiaxiangqingad clearfix">
                    <li class="diangdanxiangqingl fl">
                        <p>供应商：{$order.exhibition}</p>
                        <p>地区：{$order.city}</p>
                        <p>联系人：{$order.receive_name}-{$order.receive_call}</p>
                    </li>
                    <li class="diangdanxiangqingl fl">
                         <p>订单号：{$order.order_code}</p>
                         <p>业务员：{$order.cname}</p>
                         <p>收货地址：{$order.receive_addr}</p>
                    </li>
                    <li class="diangdanxiangqingl fl">
                        <p>结算方式：支付</p>
                        <p>付款状态：{$order.pay_stat}</p>
                        <p>订单状态：<span class="col-red">{$order.sts}</span></p>
                    </li>
                </ul>
                <form action="" method="get" class="danxuank">
                    <!-- <label><input name="Fruit" type="radio" checked value="" class="mgl20"/>按时间排序</label>
                    <label><input name="Fruit" type="radio" value="" class="mgr10 mgl20"/>按商品分类排序</label> -->
                </form>
                <div class="l_nav clearfix">
                    <span class="lo_num">序号</span>
                    <span class="lo_img">&nbsp;</span>
                    <span class="lo_name">商品</span>
                    <!-- <span class="lo_spec">单位</span> -->
                    <span class="lo_dgs">数量</span>
                    <span class="lo_stock">单价</span>
                    <span class="lo_remarks">小计</span>

                </div>
                <div class="l_list">
                <volist name="goods" id="good">
                    <ul class="clearfix">
                        <li class="lo_num">{$i}</li>
                        <li class="lo_img"><img src="__UPLOADS__/{$good.goods_thumb}" alt=""></li>
                        <li class="lo_name col-lan2"><p>{$good.goods_name}</p></li>
                        <!-- <li class="lo_spec col-999">个</li> -->
                        <li class="lo_dgs">{$good.goods_count}</li>
                        <li class="lo_stock">￥{$good.goods_price}</li>
                        <li class="lo_remarks col-red">￥{$good.goods_total}</li>

                    </ul>
                </volist>
                </div>
                <div class="cubeizhu clearfix">
                  <div class="nei_beizhu fl">
                      <p>备注</p>
                  </div>
                  <div class="shangxia fl">
                    <div class="dingdanbeizhu clearfix">
                      <span class="peisong"> 订单备注：</span>
                      <p class="yitiaoxian fl">{$order.remark}</p>
                    </div>
                    <div class="dingdanbeizhu clearfix">
                      <span class="peisong">内部沟通：</span>
                      <p class="yitiaoxian fl">{$order.}</p>
                    </div>
                  </div>
                </div>
                <div class="cubeizhu clearfix">
                  <div class="nei_beizhu fl">
                      <p>快递</p>
                  </div>
                  <div class="shangxia fl">
                    <div class="dingdanbeizhu clearfix">
                      <span class="peisong">配送方式：</span>
                      <p class="yitiaoxian fl">
                        <span>{$order.ex_name}</span>
                      </p>
                    </div>
                    <div class="dingdanbeizhu clearfix">
                      <span class="peisong">运单号：</span>
                      <p class="yitiaoxian fl"><span>{$order.express_code}</span><span class="lanse">查看物流信息</span></p>
                    </div>
                  </div>
                </div>
                <div class="dingdancaozuojilu">
                    <h3>订单操作记录</h3>
                    <div class="caozuo"><b>
                      <span style="width: 16%;display: inline-block;">操作时间</span>
                      <span style="width: 10.8%;display: inline-block;text-align: center;">操作人员</span>
                      <span style="width: 12.6%;display: inline-block;text-align: center;"> 操作类型</span>
                      <span style="width: 11.7%;display: inline-block;text-align: center;">操作日志</span></b>
                    </div>
                    <volist name="log" id="l">
                    <div class="time">
                      <div class="fl shijian">{$l.add_time|date='Y-m-d H:i:s',###}</div>

                      <div class="fl renyuan">{$l.username}</div>

                       <div class="fl l_leixing">{$l.type}</div>

                       <div class="fl l_rizhi">{$l.content}</div>
                    </div>
                    </volist>
                </div>
            </div>
            <div class="lump1 record">
                <div class="moneys mgt20 fs-18">
                    <span class="col-666">应付金额：￥{$order.total}</span>
                    <span class="col-666">已付金额：￥{$order.paid_amount}</span>
                    <span class="col-red">未付金额：￥<?php echo sprintf("%.2f", ($order['total']-$order['paid_amount'])); ?></span>
                </div>
                <div class="l_nav clearfix">
                    <span class="or_num">&nbsp;</span>
                    <span class="or_addnum">单号</span>
                    <span class="or_date">时间</span>
                    <span class="re_money">付款金额</span>
                    <span class="re_pay">支付方式</span>
                    <span class="re_gathering">收款帐号</span>
                    <span class="re_state">付款状态</span>
                    <span class="re_remarks">备注</span>
                    <span class="re_operate">操作</span>
                </div>
                <div class="l_list">
                    <volist name="records" id="record">
                    <ul class="clearfix">
                        <li class="or_num">{$i}</li>
                        <li class="or_addnum">{$record.bank_code}</li>
                        <li class="or_date">{$record.add_time|date='Y-m-d H:i:s',###}</li>
                        <li class="re_money">￥{$record.amount}</li>
                        <li class="re_pay">{$record.paid}</li>
                        <li class="re_gathering">{$record.account_charge|default='默认账号'}</li>
                        <li class="re_state">{$record.confirm}</li>
                        <li class="re_remarks">{$record.remark|default='----'}</li>
                        <li class="re_operate" rid="{$record.pid}"><a  href="#" class="col-lan">查看详情</a></li>
                    </ul>
                    </volist>

                </div>
            </div>
            <div class="lump1 logistics">
                <div class="lo_tit mgt20 clearfix">
                    <span class="col-666 fs-16">待出库清单</span>
                    <!-- <button class="btn-70x30 fr mgt10 bg-slv">确认出库</button> -->
                </div>
                <div class="l_nav clearfix">
                    <span class="lo_num">&nbsp;</span>
                    <span class="lo_img">&nbsp;</span>
                    <span class="lo_name">商品</span>
                    <span class="lo_spec">商品规格</span>
                    <span class="lo_dgs">订购数</span>
                    <span class="lo_stock">实际库存</span>
                    <!-- <span class="lo_remarks">备注</span> -->
                </div>
                <div class="l_list">
                <volist name="goods" id="good">
                    <ul class="clearfix">
                        <li class="lo_num">{$i}</li>
                        <li class="lo_img"><img src="/Uploads/{$good.goods_thumb}" alt=""></li>
                        <li class="lo_name col-lan2"><p>{$good.goods_name}</p></li>
                        <li class="lo_spec col-999"><volist name="good['standards']" id="s"><p>{$s}</p></volist></li>
                        <li class="lo_dgs">{$good.goods_count}</li>
                        <li class="lo_stock">{$good.goods_num}</li>
                        <!-- <li class="lo_remarks">----</li> -->
                    </ul>
                    </volist>
                </div>
                <div class="lo_tit mgt20 clearfix">
                    <span class="col-666 font-size16">物流</span>
                </div>
                <ul class="logistics_list">
                    <volist name="expInfo_data" id="dd" key="k">
                    <li <if condition="$k eq 1">class="active"</if>><i></i><span class="date">{$dd.time}</span>{$dd.context}</li>
                    </volist>
                </ul>
            </div>
        </div>
    </div>
    <!-- 底部 == 版权 -->

</div>
<div class="protection"  >
    <div class="tanchu_box tanchu_box700 order_501" >
        <h3 class="q_details">付款记录详情</h3>
        <ul class="kehuxinxibiao">
            <li><span>供应商：</span><span></span></li>
            <li><span>&nbsp;</span></li>
            <li><span>银行单号：</span><span></span></li>
            <li><span>金额：</span><span></span></li>
            <li><span>收支类型：</span><span></span></li>
            <li><span>状态：</span><span></span></li>
            <li><span>订单号：</span><span></span></li>
            <li><span>&nbsp;</span></li>
            <li><span>支付方式：</span><span></span></li>
            <li><span>付款日期：</span><span></span></li>
            <li><span>收款账号：</span><span></span></li>
            <li><span>&nbsp;</span></li>
            <li><span>&nbsp;</span></li>
            <li class="mgt25 clearfix"><span class="mgt10">支付证明：</span><div class="fr" style="margin-right: 89px;"><img class="" src="__PUR_PUBLIC__/images/pingzheng.png" alt=""></div></li>
            <li class="mgt25 "><span>提交时间：</span><span></span></li>
            <li><span>备注：</span><span></span></li>
        </ul>
    </div>
</div>
      </div>  
    </div>
<!-- ++++++++++++++++++++++++++++++++++++++ -->

<include file="Public/Foot" />
</body>
</body>
<script type="text/javascript" src="__HOME_PUBLIC__/finance/js/jquery.min.js"></script>
<!-- <script type="text/javascript" src="__HOME_PUBLIC__/finance/js/js.js"></script> -->
<script type="text/javascript" src="__PUR_PUBLIC__/layer/layer.js"></script>
<script type="text/javascript" src="__PUR_PUBLIC__/laydate/laydate.js"></script>
<script type="text/javascript" src="__PUR_PUBLIC__/js/js.js"></script>

</html>