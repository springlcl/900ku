<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>发票管理</title>
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
			<div class="right_con_down bg-fff invoice_0505">
				<div class="title_ty">
					<span class="tit_name">订单开票记录</span>
				</div>
				<div class="title_ty_smart clearfix ">
					<a href="{:U('admi')}"><span class="fs-14 mgl15 col-slv fw600">订单开票记录</span></a>
					<i class="ico_all I_shuxian porb2"></i>
					<a href="{:U('wait_for')}"><span class="fs-14 ">待确认发票</span></a>
					<i class="ico_all I_shuxian porb2"></i>
					<a href="{:U('confirm')}"><span class="fs-14">已确认发票</span></a>
					<i class="ico_all I_shuxian porb2"></i>
					<a href="{:U('rejected')}"><span class="fs-14">已拒绝发票</span></a>
				</div>
				<form action="{:U('admi')}" method="post">
				<div class="title_ty_smart clearfix">
					<span class="mgl15 mgr5">项目名称</span>
					<select name="item" id=""  class="btn-120x30">
              <option value="0">全部项目</option>
              <volist name="item" id="i">
              <option <?php if($pitem && $pitem==$i['pid']){ echo "selected='selected'";}?> value="{$i.pid}">{$i.pro_name}</option>
            </volist>
            </select>
					<span class="mgl15 mgr5">供应商</span>
					<select name="exid" id=""  class="btn-120x30">
              <option value="0">全部供应商</option>
              <volist name="res" id="r">
              <option <?php if($pexid && $pexid==$r['exid']){ echo "selected='selected'";}?>  value="{$r.exid}">{$r.ex_name}</option>
            </volist>
            </select>
					<span class="mgl15 mgr5">订单号</span>
            <input <?php if($porder_code){ echo "value='$porder_code'";}?> name="order_code" type="text"  class="btn-120x30">
            <span class="mgw10">起止时间</span>
            <input <?php if($pstart){ echo "value='$pstart'";}?>  name="start" class="btn-80x30 pdl10 laydate-icon" type="text" id="wrong_start" >
            <span class="mgw10">-</span>
            <input <?php if($pend){ echo "value='$pend'";}?>  name="end" class="btn-80x30 pdl10 laydate-icon" type="text" id="wrong_end" >
            <button class="btn-60x30 bg-slv col-fff fs-14 mgl10 ">搜索</button>
          </div>
			</form>
				<div class="o_invoice_record_right">
				   
				    <ul>
				       <li>商品信息</li>
				       <li>单价（元）</li>
				       <li>实付单价（元）</li>
				       <li>数量</li>
				       <li>小计（元）</li>
				       <li>发票信息</li>
				       <li>操作</li>
				   </ul>
<!-- 				    <div class="list">
				       <div>
				            <div class="mgr30">
				                <span>订单号：<a class="color_red">80000000000141601</a></span>
				            </div>
				            <div class="mgr30">
				                企业内部订单标号：<div>未同步</div>
				            </div>
				            <div class="mgr30">
				            	<span>下单时间：</span>
				           		<a>2016-10-01 15:48:16</a>
				            </div>
				           	<div class="mgr30">
					           <span>供应商：</span>
					           <a class="style">永一集团阀门有限公司</a>
				           </div>
				       </div>
				       <div>
				       		<span class="mgl10">订单状态：<a>交易中</a></span>
				       </div>
				       <ol>
				            <li>
				                <img src="__PUR_PUBLIC__/images/goods_1.png" alt="">
				                <span>AS超声波流量计</span>
				            </li>
				            <li>
				                <span>100000.00</span>
				            </li>
				            <li>
				                <span>100000.00</span>
				            </li>
				            <li>
				                <span>下单量：<a>1</a></span>
				                <span>已开票：<a>0</a></span>
				            </li>
				            <li>
				                <span>10000.00</span>
				            </li>
				            <li>
				                <span>待开</span>
				            </li>
				            <li>
				                <a class="history_invoice">开票历史</a>
				                <div class="o_invoice_record_hover">
				                    <table border="0" cellpadding="0" cellspacing="0">
				                        <tbody><tr>
				                            <td>该商品的开票历史如下</td>
				                            <td colspan="6"><img class="o_invoice_record_hoverxxx" src="images/o_invoice_record_hoverxxx.png" alt=""></td>
				                        </tr>
				                        <tr>
				                            <td>序号</td>
				                            <td>开票日期</td>
				                            <td>发票编号（同批次发票）</td>
				                            <td>开票金额</td>
				                            <td>发票状态</td>
				                            <td>快递公司</td>
				                            <td>快递单号</td>
				                        </tr>
				                        <tr>
				                            <td>1</td>
				                            <td>1016-10-19</td>
				                            <td>1234556</td>
				                            <td>￥10000.00</td>
				                            <td>已确认</td>
				                            <td>圆通快递</td>
				                            <td>123456</td>
				                        </tr>
				                        <tr>
				                            <td>已开票总金额</td>
				                            <td colspan="6" class="color_red">￥10000.00</td>
				                        </tr>
				                    </tbody></table>
				                </div>
				            </li>
				       </ol>
				       <div class="list_bottom1">
				           <div class="fl">
				           		<span>最新开票时间</span><span>2011-01-01 12:01:01</span>
				           </div>
				           <div class="fr">
				           		<span>待开票合计:</span><span>￥140.00</span>
				           		<span>已开票合计:</span><span class="col-red">￥140.00</span>
				           </div>
				       </div>
				   </div>
				    <div class="list">
				       <div>
				            <div class="mgr30">
				                <span>订单号：<a class="color_red">80000000000141601</a></span>
				            </div>
				            <div class="mgr30">
				                企业内部订单标号：<div>未同步</div>
				            </div>
				            <div class="mgr30">
				            	<span>下单时间：</span>
				           		<a>2016-10-01 15:48:16</a>
				            </div>
				           	<div class="mgr30">
					           <span>供应商：</span>
					           <a class="style">永一集团阀门有限公司</a>
				           </div>
				       </div>
				       <div>
				       		<span class="mgl10">订单状态：<a>交易中</a></span>
				       </div>
				       <ol>
				            <li>
				                <img src="__PUR_PUBLIC__/images/goods_1.png" alt="">
				                <span>AS超声波流量计</span>
				            </li>
				            <li>
				                <span>100000.00</span>
				            </li>
				            <li>
				                <span>100000.00</span>
				            </li>
				            <li>
				                <span>下单量：<a>1</a></span>
				                <span>已开票：<a>0</a></span>
				            </li>
				            <li>
				                <span>10000.00</span>
				            </li>
				            <li>
				                <span>待开</span>
				            </li>
				            <li>
				                <a class="history_invoice">开票历史</a>
				                <div class="o_invoice_record_hover">
				                    <table border="0" cellpadding="0" cellspacing="0">
				                        <tbody><tr>
				                            <td>该商品的开票历史如下</td>
				                            <td colspan="6"><img class="o_invoice_record_hoverxxx" src="images/o_invoice_record_hoverxxx.png" alt=""></td>
				                        </tr>
				                        <tr>
				                            <td>序号</td>
				                            <td>开票日期</td>
				                            <td>发票编号（同批次发票）</td>
				                            <td>开票金额</td>
				                            <td>发票状态</td>
				                            <td>快递公司</td>
				                            <td>快递单号</td>
				                        </tr>
				                        <tr>
				                            <td>1</td>
				                            <td>1016-10-19</td>
				                            <td>1234556</td>
				                            <td>￥10000.00</td>
				                            <td>已确认</td>
				                            <td>圆通快递</td>
				                            <td>123456</td>
				                        </tr>
				                        <tr>
				                            <td>已开票总金额</td>
				                            <td colspan="6" class="color_red">￥10000.00</td>
				                        </tr>
				                    </tbody></table>
				                </div>
				            </li>
				       </ol>
				       <div class="list_bottom1">
				           <div class="fl">
				           		<span>最新开票时间</span><span>2011-01-01 12:01:01</span>
				           </div>
				           <div class="fr">
				           		<span>待开票合计:</span><span>￥140.00</span>
				           		<span>已开票合计:</span><span class="col-red">￥140.00</span>
				           </div>
				       </div>
				   </div> -->
				</div>
				<!-- <div class="clearfix">
					<ul class="pagination clearfix" id="aa" >
						<li class="bor-0">
						    <span class="pg_pre">共4页</span>
						</li>
						<li>
						    <span class="pg_pre">上一页</span>
						</li>
						<li>
						    <span class="pg_curr">1</span>
						</li>
						<li>
						    <a class="pg_link" href="">2</a>
						</li>
						<li>
						    <a class="pg_link" href="">3</a>
						</li>
						<li>
						    <a class="pg_link" href="">4</a>
						</li>
						<li>
						    <a class="pg_next" href="">下一页</a>
						</li>
					</ul>
				</div> -->
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

</html> 