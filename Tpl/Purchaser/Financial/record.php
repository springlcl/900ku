<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>付款记录</title>
	<link rel="stylesheet" href="__PUR_PUBLIC__/css/reset.css">
	<link rel="stylesheet" href="__PUR_PUBLIC__/css/icons.css">
	<link rel="stylesheet" href="__PUR_PUBLIC__/css/style.css">
</head>
<body>
	<div class="wh1200auto clearfix">
		<!-- 左边导航 -->
		<include file='Public/leftBar' />
		<!-- 右边内容 -->
		<div class="right_content fl">
			<div class="right_con_down query_0502 record_0504 bg-fff">
				<div class="title_ty">
					<span class="tit_name">付款记录</span>
				</div>
          		<form action="{:U('Financial/record')}" method="post">
				<div class="title_ty_smart clearfix condition">
					<div class="fl tianshu_xuanze">
						<span class="mgw20">付款记录</span>
						<button name="one" value="1" class="btn-80x30 bor_1ddd mgr20 <?php if($one){ echo "active";}?> ">7日数据</button>
						<button name="two" value="2" class="btn-80x30 bor_1ddd mgr20 <?php if($two){ echo "active";}?>">30日数据</button>
					</div>
					<!-- <div class="fr">
						<a href="{:U('Financial/record_csv')}" class="btn-80x30 col-qlv bor_1qlv mgr10" style="display: inline-block;text-align: center;line-height: 30px;">下载表单</a>
					</div> -->
				</div>
				<div class="title_ty_smart clearfix condition">
					<div class="fl">
						<span class="mgw10">付款金额: <i class="col-red fs-20 fw600 porb3">￥{$total}</i></span>
						<input  name="order_code" type="text" class="btn-120x30 pdl10 mgl20" placeholder="订单号">
						<select class="btn-120x30" name="exid">
                            <option value="0">供应商</option>
                            <volist name="zhanting" id="vo">
                                <option value="{$vo.exid}">{$vo.ex_name}</option>
                            </volist>
                        </select>
						<select class="btn-120x30" name="status" id="">
							<option value="0">全部付款状态</option>
							<option  value="1">预付款</option>
							<option   value="2">发货款</option>
							<option   value="3">验收款</option>
							<option   value="4">质保金</option>
						</select>
						<span class="mgw10">起止时间</span>
						<input   name="start" class="btn-80x30 pdl10 laydate-icon" type="text" id="wrong_start" >
						<span class="mgw10">-</span>
						<input   name="end" class="btn-80x30 pdl10 laydate-icon" type="text" id="wrong_end" >
						<button class="btn-60x30 bg-slv col-fff fs-14 mgl10 ">搜索</button>
					</div>
					<div class="fr">
						
					</div>
				</div>
	        </form>
				<div class="con">
				    <ul class="wr_nav bg-fb clearfix">
				        <li class="wr_img">&nbsp;</li>
				        <li class="wr_info">商品信息</li>
				        <li class="wr_price">单价</li>
				        <li class="wr_num">数量</li>
				        <li class="wr_pay">订单金额</li>
				        <li class="wr_this">本次支付</li>
				        <li class="wr_deal">支付方式</li>
				        <li class="wr_operation">收款状态</li>
				        <li class="wr_ply_time">付款时间</li>
				    </ul>
				    <ul class="wr_list">
				    	
	            		<volist name="pr" id="p">
					        <li class="wr_lump">
					            <div class="wr_tit clearfix bg-f5 pd10">
					                <div class="fl">
					                    <span class="font-weight600 mgl10"><?=date('Y-m-d',$p['created']);?></span>
		                                <span class="font-weight400 mgl20 mgr35">订单号:{$p.order_code}</span>
		                                <span class="mgl35 pdl35 col-clv">供应商:{$p.ex_name}</span>
					                </div>
					            </div>
					            <ul class="wr_con clearfix">
					                <div class="xq_lump_list fl">
										<volist name="p['goods']" id="og">
											<volist name="og" id="g">
												<div class="xq_lump_li clearfix">
													<li class="wr_img"><img src="__UPLOADS__/{$g.goods_thumb}" alt=""></li>
													<li class="wr_info">
													<p>{$g.goods_name}</p>
													<p class="mgt10">{$g.goods_code}</p>
													<p class="col-999 mgt10">{$g.standards}</p>
													</li>
													<li class="wr_price">
													<p class="text-del col-999">￥{$g.goods_preprice}</p>
													<p class="col-red mgt10">￥{$g.goods_price}</p>
													</li>
													<li class="wr_num">{$g.goods_count}</li>
												</div>
											</volist>
										</volist>
					                </div>
					                <li class="wr_pay">
					                	<p>{$p.total}元</p>
					                    <p class=" mgt20">已付 {$p.paid_amount}元</p>
					                </li>
					                <li class="wr_this">
					                    <p class="col-juse fw600 fs-16">{$p.total}元</p>
										<p class="col-999 mgt15">
											<if condition="$p['service_type'] eq 1" >(预付款{$p.prepayment}%)
												<elseif condition="$p['service_type'] eq 2" />(发货款{$p.payment_ratio}%)
												<elseif condition="$p['service_type'] eq 3" />(验收款{$p.inspection}%)
												<elseif condition="$p['service_type'] eq 4" />(质保金{$p.warranty}%)
												<elseif condition="$p['service_type'] eq 5" />(退款)
											</if>
										</p>
					                </li>
					                <li class="wr_deal">
					                    <if condition="$vo.paid_way eq 1">银行转账
                                            <elseif condition="$name eq 0"/>线上转账
                                        </if>
					                </li>
					                <li class="wr_operation">
					                	<if condition="$p['status'] eq 0">
			                              商品下单
			                              <elseif  condition="$p['status'] eq 1" />
			                              支付预付款
			                              <elseif  condition="$p['status'] eq 2" />
			                              商品出库
			                              <elseif  condition="$p['status'] eq 3" />
			                              支付发货款
			                              <elseif  condition="$p['status'] eq 4" />
			                              供应商发货
			                              <elseif  condition="$p['status'] eq 5" />
			                              付验收款
			                              <elseif  condition="$p['status'] eq 6" />
			                              付质保金
			                              <elseif  condition="$p['status'] eq 7" />
			                              订单完成
			                            </if>
					                </li>
					                <li class="wr_ply_time">
					                	<div class="fkxq_btn">
					                		<button class="btn-lan-80 dis_inb chakan_fkxq" oid='{$p.oid}'>查看详情</button>
					                		<div class="dingdantankuang sanjiao_right_lan">
				                                <div class="clearfix dingdanjine">
				                                  <p class="fl">订单金额：<span class="col-red">￥{$p.total}</span></p>
				                                  <p class="fl mgl35">已付金额：￥{$p.paid_amount}</p>
				                                </div>
				                                <table>

				                                </table>
				                            </div>
					                	</div>
					                	<p class="mgt10"><?=date('Y-m-d',$p['paid_time'])?></p>
                            			<p class="mgt10"><?=date('H:i',$p['paid_time'])?></p>
					                </li>
					            </ul>
					            <div class="foot clearfix">
									<if condition="$p.is_access eq 0">
										<ul class="flow flow_jiaxing fl" style="background: url(__PUR_PUBLIC__/images/cont_lump_sell_wrongOrder_bj{$p['status']}.png) no-repeat center 0;">

						                </ul>
						            	<else />
						            	<ul class="flow flow_jiaxing fl" style="background: url(__PUR_PUBLIC__/images/query_0502_wrongOrder_bj{$p['status']}.png) no-repeat center 0;">
	
						                </ul>
						            </if>
					            </div>
					        </li>
					    </volist>
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
    var start = {
      elem: '#wrong_start',
      format: 'YYYY/MM/DD',
      min: '1900-01-01 00:00:00', //最小日期
      max: laydate.now(), //最大日期
      istime: false,
      istoday: false,
      choose: function(datas){
         end.min = datas; //开始日选好后，重置结束日的最小日期
         end.start = datas //将结束日的初始值设定为开始日
      }
    };
    var end = {
      elem: '#wrong_end',
      format: 'YYYY/MM/DD',
      min: '1900-01-01 00:00:00', //最小日期
      max: laydate.now(),
      istime: false,
      istoday: false,
      choose: function(datas){
        start.max = datas; //结束日选好后，重置开始日的最大日期
      }
    };
    laydate(start);
    laydate(end);
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
                            $('.wr_ply_time .dingdantankuang table').html(data);
                        }
                    }
			});
        });

</script>

</html>