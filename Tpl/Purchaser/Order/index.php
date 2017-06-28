<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>0607</title>
	<link rel="stylesheet" href="__PUR_PUBLIC__/css/reset.css">
	<link rel="stylesheet" href="__PUR_PUBLIC__/css/icons.css">
	<link rel="stylesheet" href="__PUR_PUBLIC__/css/style.css">
	<style>

	    	.payment_main{width:965px;height:auto;background: #fff;margin:0 auto;position: relative;}
	       .payment_main_logo{float: left;margin-top: 30px;margin-left: 20px;width: 60px;height: 60px;}
	       .payment_main .goods_box{float: none;display: block;overflow: hidden;}
	       .payment_main ul{float: left;margin-top: 30px;margin-left: 20px;}
	       .payment_main ul li{line-height:25px;color:#3B302E;}
	       .payment_main div div{float: left;}
	       .payment_main ul li div:nth-child(1){float: left;}
	       .payment_main ul li div:nth-child(2){float: left;}
	       .payment_main div img{float: left;margin-top: 30px;}
	       .payment_main .payment_yu{position: absolute;right: 0;bottom: 20px;font-size:20px;color:#E81E2D;height: 30px;width:200px;}

	</style>
</head>
<body>
	<div class="wh1200auto clearfix">
		<!-- 左边导航 -->
		<include file="Public/leftBar" />
		<!-- 右边内容 -->
        <div class="right_content fl">
            <div class="right_con_down bg-fff staff_0607 bor_1ddd">
                <div class="clearfix container min-w" id="app-container">
                    <div class="cont_lump cont_lump_sell cont_lump_order1">
		                <div class="title_ty ">
		                   <span class="tit_name">选择支付方式</span>
		                </div>

				        <div class="con">
				            <div class="general lump1 logistics">
				                <div class="payment_main">
						            	<volist name="goods.data" id="g">
						            <div class="goods_box">
						            		<img class="payment_main_logo" src="./images/print1.png" alt="">
							            <ul>
							                <li>
							                    <div>商品名称：</div>
							                    <div>{$g.goods_name}</div>
							                    <br>
							                </li>
							                <li>
							                    <div>卖家昵称：</div>
							                    <div>{$g.ex_name}</div>
							                    <br>
							                </li>
							                <li>
							                    <div>交易金额：</div>
							                    <div>{$g.goods_total}元</div>
							                    <br>
							                </li>
							                <li>
							                    <div>购买时间：</div>
							                    <div>{$g.created|date='Y-m-d H:i:s',###}</div>
							                    <br>
							                </li>
							                <li>
							                    <div>付款方式：</div>
							                    <div>{$g.acc}</div>
							                    <br>
							                </li>
							                <li>
							                    <div>交易号：</div>
							                    <div>{$g.order_code}</div>
							                    <br>
							                </li>
							            </ul>
						            </div>
						            </volist>
						            <div class="payment_yu">
						                <div>{$order.state}：{$order.pay}</div>
						                <div style="color:#000;font-size:12px;margin-top: 6px;">元</div>
						                <div class="payment_change"></div>
						                <br>
						            </div>
						        </div>
				                <div class="center">
				                	{$u}
				                	<!-- <button class="btn-150x40 bg-slv bor-r5 col-fff fs-16 mg20 online">线上支付</button> -->
				                	<button class="btn-150x40 bg-slv bor-r5 col-fff fs-16 mg20 offline">线下支付</button>
				                </div>
				            </div>
				        </div>
				    </div>
				    <!-- 底部 == 版权 -->

				</div>

				<div class="record_info">版权所有:900库 [京ICP备1000000001号-1]</div>
        	</div>
        </div>
    </div>
</body>
<script type="text/javascript" src="__PUR_PUBLIC__/js/jquery.min.js"></script>
<script type="text/javascript" src="__PUR_PUBLIC__/layer/layer.js"></script>
<script type="text/javascript" src="__PUR_PUBLIC__/laydate/laydate.js"></script>
<script type="text/javascript" src="js/js.js"></script>
<script type="text/javascript">
	$(function(){
		$('.center a').addClass('btn-150x40 bg-slv bor-r5 col-fff fs-16 mg20 online').html('线上支付').attr('style','padding:10px 35px;');
	});
	$('.offline').click(function(){
	    location.href = '{:U('offLine',array('oid'=> $order['oid']))}';
    });
</script>
</html>