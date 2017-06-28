<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>已付款查询</title>
	<link rel="stylesheet" href="__PUR_PUBLIC__/css/reset.css">
	<link rel="stylesheet" href="__PUR_PUBLIC__/css/icons.css">
	<link rel="stylesheet" href="__PUR_PUBLIC__/css/style.css">
	<style>
	    .query_0502 .con .wr_list .wr_lump .xq_lump_list #xq_lump_li{border-bottom: 1px solid #ddd;margin: 10px 0;padding-bottom: 10px;}
	    .query_0502 .con .wr_list .wr_lump .xq_lump_list #xq_lump_li:last-child{border-bottom: 0;padding-bottom: 0;}
	</style>
</head>
<body>
	<div class="wh1200auto clearfix">
		<!-- 左边导航 -->
		<include file='Public/leftBar' />
		<!-- 右边内容 -->
		<div class="right_content fl">
			<div class="right_con_down query_0502 bg-fff">
				<div class="title_ty">
					<span class="tit_name">应付款查询</span>
							<span class="mgw10">付款金额: <i class="col-red fs-20 fw600 porb3">￥{$total}</i></span>
				</div>
				<div class="title_ty_smart clearfix condition">
					<div class="fl">
						<form action="{:U('financial/paid')}" method="post" class="fl">
							<input type="text" class="btn-120x30 pdl10 " placeholder="订单号" name="search">
							<!-- <input type="hidden" name="type" value="1">
							<button class="btn-60x30 bg-slv col-fff fs-14 mgw10 ">搜索</button>
						</form>
						<form action="{:U('financial/paid')}"  method="post" class="fl">
							<input type="hidden" name="type" value="2"> -->
							<select class="btn-120x30" name="exid">
	                            <option value="0">供应商</option>
	                            <volist name="zhanting" id="vo">
	                                <option <?php if($vo['exid']==$exidj){ echo "selected='selected'";} ?> value="{$vo.exid}">{$vo.ex_name}</option>
	                            </volist>
	                        </select>
							<select class="btn-120x30"  name="pid">
	                            <option value="0">全部项目</option>
	                            <volist name="project" id="vo">
	                                <option <?php if($vo['pid']==$porj){ echo "selected='selected'";} ?> value="{$vo.pid}">{$vo.pro_name}</option>
	                            </volist>
	                        </select>
							<span class="mgw10">成交时间：</span>
							<input type="text" class="btn-80x30 pdl10 laydate-icon" name="time_start" id="start" value="<?= date('Y-m-d',time());?>" placeholder="开始日期"/ >
							<span class="mgw10">-</span>
							<input type="text" class="btn-80x30 pdl10 laydate-icon" name="time_end" id="end" value="<?= date('Y-m-d',time());?>" placeholder="结束日期"/>



							<button class="btn-60x30 bg-slv col-fff fs-14 mgl10 ">查询</button>
						</form>
					</div>
					<div class="fr">
						
					</div>
				</div>
				<div class="con">
				    <ul class="wr_nav bg-fb clearfix">
				        <li class="wr_img">&nbsp;</li>
				        <li class="wr_info">商品信息</li>
				        <li class="wr_price">单价</li>
				        <li class="wr_num">数量</li>
				        <li class="wr_pay">付款状态</li>
				        <li class="wr_this">金额</li>
				        <li class="wr_deal">本次需支付</li>
				        <li class="wr_operation">交易操作</li>
				    </ul>
				    <ul class="wr_list">
					    <if condition="$datalist">
		                    <volist name="datalist" id="vo" key='k'>
		                    <!-- <foreach name="list" item="vo"> -->
						        <li class="wr_lump">
						            <div class="wr_tit clearfix bg-f5 pd10">
						                <div class="fl">
						                    <span class="font-weight600 mgl10">{$vo['created']|date="Y-m-d H:i:s",###}</span>
						                    <span class="font-weight400 mgl20 mgr35">订单号:{$vo.order_code}</span>
						                    <span class="mgl35 pdl35 col-clv">供应商:{$vo.ex_name}</span>
						                </div>
						            </div>
						            <ul class="wr_con clearfix">
						                <div class="xq_lump_list fl">
						                	<volist name="vo['goods']" id="v">
								                <div id="xq_lump_li" class="xq_lump_li clearfix">
									                <li class="wr_img"><img src="__UPLOADS__/goods/{$v.goods_thumb}" alt="">{$v.goods_thumb}</li>
									                <li class="wr_info">
									                    <p>{$v.goods_name}</p>
									                    <p class="mgt10">{$v.goods_code}</p>
									                    <p class="col-999 mgt10">{$v.standards}</p>
									                </li>
									                <li class="wr_price">
									                    <p class="text-del col-999">￥{$v.goods_preprice}</p>
									                    <p class="col-red mgt10">￥{$v.goods_price}</p>
									                </li>
									                <li class="wr_num">{$v.goods_count}</li>
								                </div>
								            </volist>
						                </div>
						                <li class="wr_pay">
						                	<if condition="$vo.is_access eq 0">未付款
	                                            <else/>
							                	<if condition="$vo.pay_stat eq 1">预付款已付
	                                                <elseif condition="$name eq 2"/>发货款已付
	                                                <elseif condition="$name eq 3"/>验收款已付
	                                                <elseif condition="$name eq 4"/>质保金已付
	                                                <else/>待付预付款
	                                            </if>
                                           	</if>
						                </li>
						                <li class="wr_this">
						                    <p>{$vo.total}元</p>
						                    <p class=" mgt20">已付 {$vo.paid_amount}元</p>
						                </li>
						                <li class="wr_deal">
						                    <p class="fw600 col-red fs-16">{$vo.pay}元</p>
						                </li>
						                <li class="wr_operation">
						                	<p><a href="{:U('Financial/index/oid/'.$vo['oid'])}" ><button class="bg-clv btn-70x25 col-fff bor-r5 mgb10">立即付款</button></a></p>
						                    <div class="por">
					                    		<button class="btn-lan-80 dis_inb chakan_fkxq" oid='{$vo.oid}'>查看详情</button>
						                    	<div class="dingdantankuang sanjiao_right_lan">
					                                <div class="clearfix dingdanjine">
					                                  <p class="fl">订单金额：<span class="col-red">￥{$vo.total}</span></p>
					                                  <p class="fl mgl35">已付金额：￥{$vo.paid_amount}</p>
					                                </div>
					                                <table>

					                                </table>
					                            </div>
						                    </div>
						                </li>
						            </ul>
						            <div class="foot clearfix">
						            <if condition="$vo.is_access eq 0">
										<ul class="flow flow_jiaxing fl" style="background: url(__PUR_PUBLIC__/images/cont_lump_sell_wrongOrder_bj{$vo['status']}.png) no-repeat center 0;">

						                </ul>
						            	<else />
						            	<ul class="flow flow_jiaxing fl" style="background: url(__PUR_PUBLIC__/images/query_0502_wrongOrder_bj{$vo['status']}.png) no-repeat center 0;">
						                    <!-- <li>商品下单</li>
						                    <li>支付预付款</li>
						                    <li>商品出库</li>
						                    <li>支付发货款</li>
						                    <li>供应商发货</li>
						                    <li>验收付款</li>
						                    <li>付质保金</li>
						                    <li>订单完成</li> -->
						                </ul>
						            </if>
						                
						            </div>
						        </li>
		                    </volist>
		                    <else />
		                    <tr><li class="center pdt30">暂无数据</li></tr>
		                </if>
				    </ul>
				</div>
				<div class="clearfix">
					<ul class="pagination clearfix" id="aa" >
						{$page}
					</ul>
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
    <script>
        $(document).ready(function(){
            var start={elem:"#start",format:"YYYY-MM-DD",max:"2099-06-16 23:59:59",istime:false,istoday:false,choose:function(datas){end.min=datas;end.start=datas}};
            var end={elem:"#end",format:"YYYY-MM-DD",max:"2099-06-16 23:59:59",istime:false,istoday:false,choose:function(datas){start.max=datas}};
            laydate(start);laydate(end);
        });
    </script>
	<script>

        $('.chakan_fkxq').click(function () {
        	var oid = $(this).attr('oid');
			$.ajax({
			    type : 'post',
			    dataType : 'json',
			    data : {'oid':oid},
			    url : "{:U('Financial/paid_info')}",
			    success: function(data)
                    {
                        if(data)
                        {
                        	console.log(data);
                            $('.wr_operation .dingdantankuang table').html(data);
                        }
                    }
			});
        });


	</script>
</html>