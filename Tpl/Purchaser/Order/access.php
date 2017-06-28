<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>准入订单</title>
	<link rel="stylesheet" href="__PUR_PUBLIC__/css/reset.css">
	<link rel="stylesheet" href="__PUR_PUBLIC__/css/icons.css">
	<link rel="stylesheet" href="__PUR_PUBLIC__/css/style.css">
	<link rel="stylesheet" href="__PUR_PUBLIC__/layer/skin/default/layer.css">
	<link rel="stylesheet" href="__PUBLIC__/plugins/layui/css/layui.css">
	<style>

	</style>
</head>
<body>
	<div class="wh1200auto clearfix">
		<!-- 左边导航 -->
        <include file="Public/leftBar"/>
		<!-- 右边内容 -->
		<div class="right_content fl" url="{$url}">
			<div class="right_con_down bg-fff admittance_0601 query_0502">
				<div class="title_ty">
					<a href="javascript:void();"><span class="tit_name mgl20 active">准入订单<i class="tishi_num porb-2">{$remind.access}</i></span></a>
					<a href="{:U('nonAccess')}"><span class="fs-18 fw600 mgl20 col-999">非准入订单<i class="tishi_num porb-2">{$remind.nonacc}</i></span></a>
				</div>
                <div class="title_ty_smart clearfix condition">
					<div class="mgb20 mgl20">
						<input type="text" class="btn-220x30 pdl10 sou_inp" placeholder="输入商品标题或订单号进行搜索"><input type="button" class="btn-80x32 bor_1ddd bg-f5 cur-p search" value="订单搜索">
					</div>
					<div class="mgb20 mgl20">
						<span class="wh60">供应商</span>
						<select class="btn-120x30 mgr30" name="sup" id="">
                            <volist name="admit" id="ad">
							<option value="{$ad.exid}">{$ad.ex_name}</option>
                            </volist>
						</select>
						<span class="wh60">项目筛选</span>
						<select class="btn-120x30 mgr30" name="project" id="">
                            <volist name="project" id="p"><option <if condition="strlen($p['pid']) gt 1">selected="selected"</if> value="{$p.pid}">{$p.pro_name}</option></volist>
						</select>
						<span class="mgl35">成交时间</span>
						<input type="text" id="wrong_start" class="btn-150x30 bor_1ddd pdl10 laydate-icon" placeholder="请选择时间范围起始">
						<input type="text" id="wrong_end" class="btn-150x30 bor_1ddd pdl10 laydate-icon" placeholder="请选择时间范围结束">
					</div>
					<div class="mgb20 mgl20">
						<span class="wh60">付款状态</span>
						<select class="btn-120x30 mgr30" name="paid" id="">
							<option value="0,1,2,3,4" selected="selected">全部状态</option>
							<option value="0">待付预付款</option>
							<option value="1">预付款已付</option>
							<option value="2">发货款已付</option>
							<option value="3">验收款已付</option>
							<option value="4">质保金已付</option>
						</select>
						<span class="wh60">订单状态</span>
						<select class="btn-120x30 mgr30" name="ord" id="" >
							<option value="0,1,2,3,4,5,6,7" selected="selected">全部状态</option>
							<option value="0">已下单</option>
							<option value="1">支付预付款</option>
							<option value="2">商品出库</option>
							<option value="3">支付发货款</option>
							<option value="4">供应商发货</option>
							<option value="5">支付验收款</option>
							<option value="6">支付质保金</option>
							<option value="7">订单完成</option>
						</select>
						<button class="mgl35 btn-80x30 bg-slv col-fff search">搜索</button>
					</div>
				</div>
				<div class="con">
				    <ul class="wr_nav bg-fb clearfix">
				        <li class="wr_img">&nbsp;</li>
				        <li class="wr_info">商品信息</li>
				        <li class="wr_price">单价</li>
				        <li class="wr_num">数量</li>
				        <li class="wr_pay">
				        	<select name="" id="" class="porb-2">
				        		<option value="">付款状态</option>
				        	</select>
				        </li>
				        <li class="wr_this">
				        	<select name="" id="" class="porb-2">
				        		<option value="">交易状态</option>
				        	</select>
				        </li>
				        <li class="wr_deal">本次需支付</li>
				        <li class="wr_operation">交易操作</li>
				    </ul>
				    <ul class="wr_list">
                        <volist name="orders" id="ords" >
				    	<li class="wr_lump" order="{$ords.id}" exid="{$ords.exid}">
				            <div class="wr_tit clearfix bg-f5 pd10">
				                <div class="fl">
				                    <span class="font-weight600 mgl10">{$ords.start}</span>
				                    <span class="font-weight400 mgl20 mgr35">订单号:{$ords.code}</span>
				                    <span class="mgl35 pdl35 col-clv">供应商:{$ords.exhibition}</span>

				                </div>
				                <div class="fr">
				                    <span class="fw600 mgl10 col-red">总额:￥{$ords.sum}</span>
				                    <span class="fw600 mgl10 col-red">已付:￥{$ords.paid}</span>
				                </div>
				            </div>
				            <ul class="wr_con clearfix">
				                <div class="xq_lump_list fl">
                                    <volist name="ords['goods']" id="g">
					                <div class="xq_lump_li clearfix">
						                <li class="wr_img"><img src="__UPLOADS__/{$g.gthumb}" alt=""></li>
						                <li class="wr_info">
						                    <p>{$g.gname}</p>
						                    <p class="mgt10">{$g.gcode}</p>
						                    <p class="col-999 mgt10"><volist name="g.standards" id="s"><span>{$s}</span>&nbsp;</volist></p>
						                </li>
						                <li class="wr_price">
						                    <p class="text-del col-999">￥{$g.gpreprice}</p>
						                    <p class=" mgt10">￥{$g.gprice}</p>
						                </li>
						                <li class="wr_num">{$g.gcount}</li>
					                </div>
                                    </volist>
				                </div>
				                <li class="wr_pay">{$ords.pss}</li>
				                <li class="wr_this">
				                    <p>{$ords.dss}</p>
				                    <div class="mgt20 por">
                                        <gt name="ords.state" value="4">
                                        <span class="cur-p chakan_wlxq mgb20">查看物流</span>
                                        <div class="commodity_information wuliuxqtankuang sanjiao_right_lan">
                                            <ul>
                                                <li>
                                                    <div class="lo_tit clearfix">
                                                        <span class="col-666 fs-16">物流</span>
                                                    </div>
                                                    <ul class="logistics_list">
                                                        <li class="active"><i></i><span class="date">2017-03-20 12：23：34</span>已签收 感谢您对900库的支持</li>
                                                        <li><i></i><span class="date">2017-03-20 12：23：34</span>北京转运中心】派件人: 肖敏 派件中 派件员电话13082581920</li>
                                                        <li><i></i><span class="date">2017-03-20 12：23：34</span>北京转运中心】 已收入</li>
                                                        <li><i></i><span class="date">2017-03-20 12：23：34</span>河北省廊坊市公司】 已发出 下一站 【北京转运中心】</li>
                                                        <li><i></i><span class="date">2017-03-20 12：23：34</span>河北省廊坊市公司】 已打包</li>
                                                        <li><i></i><span class="date">2017-03-20 12：23：34</span>河北省廊坊市市区四部公司】 已收件</li>
                                                        <li><i></i><span class="date">2017-03-20 12：23：34</span>河北省廊坊市市区四部公司】 取件人: 霍清 已收件</li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                        </gt>
				                    	<span class="col-lan cur-p chakan_fkxq">订单详情</span>
                                        <div class="dingdantankuang sanjiao_right_lan
                                        <gt name='ords.status' value='4'>top_-127</gt>">
			                                <div class="clearfix dingdanjine">
			                                  <p class="fl">订单金额：<span class="col-red">￥{$ords.sum}</span></p>
			                                  <p class="fl mgl35">已付金额：￥{$ords.paid}</p>
			                                </div>
			                                <table>
			                                  <tr>
			                                    <th>付款阶段</th>
			                                    <th>付款金额</th>
			                                    <th>付款状态</th>
			                                    <th>付款时间</th>
			                                  </tr>
			                                  <tr>
			                                    <td><i></i>预付款</td>
			                                    <td class="">￥<?php echo ($ords['sum']*$ords['prepercent']/100) ?></td>
                                                  <td class=""><gt name="ords.ps" value="0">已付款<else /> <button class="fs-14 col-fff bg-slv btn-60x30 bor-r5 pay_button" type="button">付款</button></gt></td>
			                                    <td><if condition="$ords['pre'] neq 0 && $ords['ps'] gt 0">{$ords.pre}</if></td>
			                                  </tr>
			                                  <tr>
			                                    <td><i></i>发货款</td>
                                                  <td class="">￥<?php echo ($ords['sum']*$ords['ratpercent']/100) ?></td>
                                                  <td class=""><eq name="ords.ps" value="1"><button class="fs-14 col-fff bg-slv btn-60x30 bor-r5 pay_button" type="button">付款</button></eq><gt name="ords.ps" value="1">已付款</gt></td>
                                                  <td><if condition="$ords['sent'] neq 0 && $ords['ps'] gt 1">{$ords.sent}</if></td>
			                                  </tr>
			                                  <tr>
			                                    <td><i></i>验收合格</td>
                                                  <td class="">￥<?php echo ($ords['sum']*$ords['insppercent']/100) ?></td>
                                                  <td class=""><eq name="ords.ps" value="2"><button class="fs-14 col-fff bg-slv btn-60x30 bor-r5 pay_button" type="button">付款</button></eq><gt name="ords.ps" value="2">已付款</gt></td>
                                                  <td><if condition="$ords['inspection'] neq 0 && $ords['ps'] gt 2">{$ords.inspction}</if></td>
			                                  </tr>
			                                  <tr>
			                                    <td><i></i>质保</td>
                                                  <td class="">￥<?php echo ($ords['sum']*$ords['warrpercent']/100) ?></td>
                                                  <td class=""><eq name="ords.ps" value="3"><button class="fs-14 col-fff bg-slv btn-60x30 bor-r5 pay_button" type="button">付款</button></eq><gt name="ords.ps" value="3">已付款</gt></td>
                                                  <td><if condition="$ords['end'] neq 0 && $ords['ps'] gt 3">{$ords.end}</if></td>
			                                  </tr>
			                                </table>
			                            </div>
				                    </div>
				                </li>
                                <neq name="ords.should" value="0">
                                    <li class="wr_deal">
                                        <p class="fw600 col-juse fs-18">{$ords.should}元</p>
                                        <p class="col-999 mgt20">{$ords.explain}</p>
                                    </li>
                                </neq>
                                <li class="wr_operation">
                                    <volist name="ords['button']" id="b">
                                        <p><{$b.1} class="{$b.0}" <notempty name="b.url">url="{$b.url}"</notempty>>{$b.2}</{$b.1}></p>
                                    </volist>
                                </li>
                            </ul>
				            <div class="foot clearfix">
				                <ul class="flow flow_jiaxing fl status{$ords.state}">
<!--				                    <li>商品下单</li>-->
<!--				                    <li>支付预付款</li>-->
<!--                                    <li>商品出库</li>-->
<!--                                    <li>支付发货款</li>-->
<!--				                    <li>供应商发货</li>-->
<!--				                    <li>支付验收款</li>-->
<!--				                    <li>付质保金</li>-->
<!--				                    <li>订单完成</li>-->
				                </ul>
				            </div>
				        </li>
                        </volist>
				    </ul>
				</div>
				<div class="clearfix">
                    <ul class="pagination" id="pagination" count="{$count}" cond=""></ul>
                    <div class="page_total fr" style="padding:33px 10px;">
                        共有<b style="color:#c6ffc6">{$count}</b>张订单
                    </div>
				</div>
				<div class="record_info">版权所有:900库 [京ICP备1000000001号-1]</div>
			</div>
		</div>
	</div>
</body>
<!-- 申请退款弹出层 -->
<div class="pd30 apply_refund_box" style="display: none;">
	<ul class="bor_1ddd pdb20">
		<li class="mgt20">
			<span class="tips mgr10 wh80 text-right mgl35">退货理由:</span>
			<select name="reason" id="" class="btn-380x30">
				<option value="重复下单">重复下单</option>
				<option value="不想买了">不想买了</option>
				<option value="订单信息错误">订单信息错误</option>
			</select>
            <input name="order" type="hidden" value=""/>
            <input type="hidden" name="exid" value=""/>
		</li>
		<li class="mgt20">
			<span class="tips mgr10 wh80 text-right mgl35">手机号码:</span>
			<input type="text" name="rcall" class="btn-380x30">
		</li>
		<li class="mgt20">
			<span class="tips mgr10 wh80 text-right mgl35">退货原因:</span>
			<textarea name="rreason" class="btn-380x80"></textarea>
		</li>
<!--		<li class="mgt20">-->
<!--			<span class="tips mgr10 wh80 text-right mgl35">退货数量:</span>-->
<!--			<input type="text" name="rcount" class="btn-380x30">-->
<!--		</li>-->
		<li class="mgt20 clearfix upload_li">
			<span class="tips mgr10 wh80 text-right mgl35 fl">退货图片:</span>
			<div class="dis_inb fl">
				<h6>请上传图片</h6>
				<div class="fl upload_sm" style="width: 60px;height: 60px;margin: 15px 0 20px 0;">
					<input id="upload" onChange="ajaxFileUpload('',this.id)" type="file" name="rpic" class="upload_1"; datatype="*" nullmsg="图片">
                    <input type="hidden" name="pic" value=""/>
				</div>
			</div>
        </li>
		<li class="mgt20">
			<span class="tips mgr10 wh80 text-right mgl35">&nbsp;</span>
			<button class="bg-slv col-fff fs-14 btn-150x30 bor-r5 rbutton">确认提交</button>
		</li>
	</ul>
</div>
<script type="text/javascript" src="__PUBLIC__/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/plugins/layui/layui.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/ajaxfileupload.js"></script>
<script type="text/javascript" src="__PUR_PUBLIC__/layer/layer.js"></script>
<script type="text/javascript" src="__PUR_PUBLIC__/laydate/laydate.js"></script>
<script type="text/javascript" src="__PUR_PUBLIC__/js/js.js"></script>
<script type="text/javascript" src="__PUR_PUBLIC__/js/access.js"></script>
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



	// 申请退款弹出层
	$(".apply_refund_btn").on("click",function () {
		layer.open({
		  type: 1,
		  title: ['退款申请单', 'font-size:18px;text-align: center;font-weight:600;'],
		  skin: 'layui-layer-rim', //加上边框
		  area: ['600px', 'auto%'], //宽高
		  content: $('.apply_refund_box')
		});
		// 点击减号  删除图片
		$(".apply_refund_box .upload_li .I_xy_jianhao").click(function () {
			$(this).parent().remove();
		});
	});
    function ajaxFileUpload(frm,upload) {
        $.ajaxFileUpload({
                url             : '{:U('uploadImg')}', //需要链接到服务器地址
                secureuri       : false,
                fileElementId   : upload, //文件选择框的id属性
                dataType        : 'json', //服务器返回的格式
                success     : function(data,status) //相当于java中try语句块的用法
                {
                    $('input[name="pic"]:hidden').val(data.path);
//                    $('#__content__').html(data);
                },
                error : function(data, status, e) //相当于java中catch语句块的用法
                {
                    $('#__content__').html('添加失败');
                }
            });

    }
</script>

</html>