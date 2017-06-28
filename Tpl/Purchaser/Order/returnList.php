<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>退货列表</title>
	<link rel="stylesheet" href="__PUR_PUBLIC__/css/reset.css">
	<link rel="stylesheet" href="__PUR_PUBLIC__/css/icons.css">
	<link rel="stylesheet" href="__PUR_PUBLIC__/css/style.css">
</head>
<body>
	<div class="wh1200auto clearfix">
		<!-- 左边导航 -->
        <include file="Public/leftBar"/>
		<!-- 右边内容 -->
		<div class="right_content fl">
			<div class="right_con_down bg-fff invoice_0505 ">
				    <div class="cont_lump cont_lump_sell cont_lump_qpolice cont_lump_Return_goods">
                    <div class="title_ty ">
                       <span class="tit_name">退货列表</span>
                    </div>
       <div class="con">

        <div class="kuangzi">
            <div class="doods_nav_head font-weight600" style="padding:10px 20px;">
                <span style="width: 60px;margin-right: 8px;">产品信息</span>
                <span style="width: 20%;margin-left: 1.5%;text-align: left;">&nbsp;</span>
                <span style="width: 8%;margin-left: 2.8%;">退货类型</span>
                <span style="width: 7%;margin-left: 2.8%;">退货状态</span>
                <span style="width: 7%;margin-left: 2.3%;">退货数量</span>
                <span style="width: 8.1%;margin-left: 2.5%;">退货时间</span>
                <span style="margin-left: 2.5%;width:6%;">买家</span>
                <span style="margin-left: 2%;width: 7%;">交易操作</span>
            </div>
            <div class="goodsShow">
                <ul class="bor_1ddd">
                    <volist name="return" id="r">
                    <li class="goods_item">
                        <div class="goods_item_mian clearfix">
                            <div class="print fl"  style="width: 58px;height: 58px;">
                                <img src="__UPLOADS__/{$r.goods_thumb}" alt="">
                            </div>
                            <div class="txt">
                                <p class="bh">{$r.goods_name}</p>
                                <p class=" mgt5">净重：{$r.goods_weight}</p>
                            </div>
                            <div class="page_view">{$r.return_type}</div>
                            <div class="sales"><p>{$r.state}</p><a href="{:U('detail',array('oid'=>$r['oid']))}"><p class="col-lan">订单详情</p></a></div>
                            <div class="stock">{$r.goods_count}</div>
                            <div class="date"><p>{$r.return_time|date='Y-m-d',###} </p><p>{$r.return_time|date='H:i:s',###}</p></div>
                            <div class="buyers">张小凡</div>
                           <a href="{:U('returnView',array('oid'=>$r['rid']))}"><div class="operation col-lan"> 查看退货</div></a>
                        </div>
                    </li>
                    </volist>
                </ul>
            </div>
            <div class="goodDown clearfix">
                <ul class="pagination" id="pagination" count="{$count}">
                </ul>
            </div>
        </div>
      </div>
    </div>
				<div class="record_info">版权所有:900库 [京ICP备1000000001号-1]</div>
			</div>
		</div>
	</div>
</body>
<script type="text/javascript" src="__PUR_PUBLIC__/js/jquery.min.js"></script>
<script type="text/javascript" src="__PUR_PUBLIC__/layer/layer.js"></script>
<script type="text/javascript" src="__PUR_PUBLIC__/laydate/laydate.js"></script>
<script type="text/javascript" src="__PUR_PUBLIC__/js/js.js"></script>
</html>