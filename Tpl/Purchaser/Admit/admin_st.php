<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>0201-采购商首页-01</title>
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
			<div class="right_con_down shop_index">
				<div  class="head_info clearfix bor_1ddd pd20 mgt20 bg-fff">
					<div class="fl">
						<img class="btn-100x100" src="__UPLOADS__/supplier/zhizhao/{$data.license}" alt="">
					</div>
					<ul class="fl mgl20">
						<li>供应商:{$data.ex_name}</li>
						<li>入驻时间:{$data.add_time|date="Y-m-d",###}</li>
						<li>已准入商品:{$zhunru|default='0'}</li>
						<li>联系人:{$data.username}</li>
						<li>审核状态:
							<if condition="$data.is_auth eq 1">
							<img class="tupian" src="__PUR_PUBLIC__/images/dianpuhuang.png">已认证
							<else/>
							<img class="tupian" src="__PUR_PUBLIC__/images/dianpuhui.png">未认证
							</if>
						</li>
						<li>待准入商品:{$dai|default='0'}</li>
						<li>联系电话:{$data.tel}</li>
					</ul>
				</div>
				<div class="title_ty">
					<span class="tit_name">协议付款比例</span>
				</div>
				<div class="q_fukuang">
		         <table>
		          <tr>
		            <th>
		                付款阶段
		            </th>
		            <th>
		              付款比例
		            </th>
		          </tr>
		          <form action="{:U('Admit/set_payment')}" method="post">
		          <tr>
		            <td>
		              <i class="duihao"></i>预付款
		            </td>
		            <td><input name="prepayment" type="text" value="{$data.prepayment}"><span>%</span></td>
		          </tr>
		          <tr>
		            <td><i class="duihao"></i>发货款</td>
		            <td><input name="payment_ratio" type="text" value="{$data.payment_ratio}" ><span>%</span></td>
		          </tr>
		          <tr>
		            <td><i class="duihao"></i>验货款</td>
		            <td><input name="inspection" type="text" value="{$data.inspection}"><span>%</span></td>
		          </tr>
		          <input type="hidden" class="adid" name="id" value="{$data.exid}">
		          <input type="hidden" name="status" value="0">
		          <tr>
		            <td><i class="cuohao"></i>质保金</td>
		            <td><input name="warranty" type="text" value="{$data.warranty}"><span>%</span>
		            	<span style="display: inline-block;margin-left: 20px;">质保期：
		            	<select name="warranty_pt" id=""><option value="一">一个月</option><option value="二">二个月</option><option value="三">三个月</option></select></span></td>
		          </tr>
		         </table>
		        <if condition="$data.zt eq 1">
		          <div class="zt">已同意！</div>
		          <div class="center pd20"><button class="btn-150x40 bor-r5 bg-slv col-fff fs-16">重新修改</button></div> 
		       	</div>
		       	</if>
		       	 <if condition="$data.zt eq 2">
		          <div class="zt">已拒绝！</div>
		          <div class="center pd20"><button class="btn-150x40 bor-r5 bg-slv col-fff fs-16">重新修改</button></div> 
		       	</div>
		       	</if>
		       	 <if condition="$data.zt eq 0">
		          <div class="center pd20"><button class="btn-150x40 bor-r5 bg-slv col-fff fs-16">重新修改</button></div> 
		       	</div>
		       	</if>
		       	 <if condition="$data.zt eq 3">
		          <div class="center pd20"><button class="btn-150x40 bor-r5 bg-slv col-fff fs-16">提交</button></div> 
		       	</div>
		       	</if>
		       	</form>
		       	<form method="post" action="">
					<div class="title_ty">
						<span class="tit_name">商品列表</span>
						<select name="fen" id="" class="btn-150x30 pdl10 mgl25 col-666">
							<option value="">商品分类</option>
							<volist id='fenlei' name='fenlei'>
							<option value="{$fenlei.gcid}">{$fenlei.gc_name}</option>
							</volist>
						</select>
						<select name="status" id="" class="btn-150x30 pdl10 mgl25 col-666">
							<option value="">状态</option>
							<option value="1">已准入</option>
							<option value="2">准入中</option>
							<option value="3">调价中</option>
							<option value="0">未准入</option>
						</select>
						<input type="text" name="gname" placeholder="商品名称" class="btn-150x30 pdl10 mgl25 col-666">
						<button class="btn-80x30 bg-slv col-fff bor-r5 mgl25">搜索</button>
					</div>
				</form>
				<div class="commodity_list">
					<table>
						<tr>
							<th class="wh80">序号</th>
							<th class="commodity_info">商品信息</th>
							<th>价格</th>
							<th>状态</th>					
							<th>操作</th>					
						</tr>
						<volist id="str" name="str">

						<tr>
							<td>
								<if condition="$str.status eq 0">
								<input type="checkbox" value="{$str.tbid}" name='message' checked="checked" class="msg">
								<else/>
								<input type="checkbox" value="{$str.tbid}" name='message' class="msg">
								</if>
								<span class="mgl10">{$xuhao++}</span>
							</td>
							<td class="text-left clearfix">
								<div class="img fl mgr10 por">
									<img class="btn-80x80" src="{$str.goods_thumb}" alt="">
									<if condition="$str.status eq 3">
										<span class="bg-red-tm pd2 poa col-fff" style="top: 0">价格变更中</span>
									</if>
								</div>
								
								<div class="text">
									<h4 class="mgt10">{$str.goods_name}</h4>
									<h5 class="mgt10 col-666"><span class="mgr10">尺寸：M</span><span>颜色：黑色</span></h5>
								</div>
							</td>

							<td class="por">
								<h5 class="mgb10"><span class="text-del">￥{$str.goods_price}</span></h5>
						
								<if condition="($str.status eq 5) OR ($str.status eq 3)">
								<h5 class="mgb10"><span class="text-del">￥{$str.price}</span>
									<span class="fw600 col-red fs-16">➡</span>
									<span class="fw600 col-red fs-14">￥{$str.xiugai}</span>
										<if condition="$str.status eq 0">
										<i class="ico_all I_pencil cur-p"></i>
										</if>
										<if condition="$str.status eq 1">
										<i class="ico_all I_pencil cur-p"></i>
										</if>
								</h5>
								<else/>
								<h5 class="mgb10">
									<span class="fw600 col-red fs-14">￥{$str.price}</span>
										<if condition="$str.status eq 0">
										<i class="ico_all I_pencil cur-p"></i>
										</if>
										<if condition="$str.status eq 1">
										<i class="ico_all I_pencil cur-p"></i>
										</if>
								</h5>
								</if>

								<div class="price_change sanjiao_right_lan bor-r5 pd10 bg-fff">
									<input type="text" class="btn-170x50 bor_1ddd pdw10">
									<button class="btn-50x30 col-fff mgw5 bg-lan lay_queding">确定</button>
									<button class="btn-50x30 col-fff bg-lan2 lay_quxiao" onclick="hide_price_change()">取消</button>
								</div>
							</td>
							<if condition="$str.status eq 0">
								<td>未准入</td>
								<td><button class="btn-70x35 col-fff bg-slv bor-r5 protocol_price_btn" gid="{$str.tbid}">准入</button></td>
							</if>
							<if condition="$str.status eq 1">
								<td>已准入</td>
								<td><button class="btn-70x35 col-fff bg-slv bor-r5 quxiao" gid="{$str.tbid}">取消准入</button></td>
							</if>
							<if condition="$str.status eq 2">
								<td>准入中</td>
								<td><button class="btn-70x35 col-fff bg-slv bor-r5 quxiao" gid="{$str.tbid}">取消</button></td>
							</if>
							<if condition="$str.status eq 3">
								<td>调价中</td>
								<td><button class="btn-70x35 col-fff bg-red2 bor-r5 jg_biangang" gid="{$str.tbid}">确认调价</button></td>
							</if>
							<if condition="$str.status eq 5">
								<td>调价中</td>
								<td><button class="btn-70x35 col-fff bg-slv bor-r5 qxtj" gid="{$str.tbid}">取消调价</button></td>
							</if>
						</tr>
						</volist>
					</table>
					<div class="pl_operation mgt20 mgl20">
						<input type="checkbox" class="checkAll">
						<button class="btn-80x30 mgl10 bg-slv bor-r5 col-fff piliang">批量准入</button>
						<span class="col-999 mgl10">（后台：默认为准入全部勾选）</span>图片链接快照
					</div>
				</div>
				<div class="clearfix">
					{$page}
				</div>
				<div class="record_info">版权所有:900库 [京ICP备1000000001号-1]</div>
			</div>
		</div>
	</div>
</body>
<!-- 价格变更 -->
<div class="pd30 jg_biangang_cen" style="display: none;">
	<table class="w630">
		<tr>
			<th class="w350">商品信息</th>
			<th>市场价格</th>
			<th>准入价格</th>
			<th>生效时间</th>
		</tr>
		<tr>
			<td>
				<div class="clearfix">
					<span class="fl pdl10 pdt10" >1</span>
					<img  class="fl btn-40x40 mgl10" src="__PUR_PUBLIC__/images/print1.png" alt="">
					<div class="fl text-left mgl10" >
						<h6 class="mgt5 text-over w270">2017春夏新款丝巾小方包韩版手提女包柳钉柳钉链条</h6>
						<p class="mgt10"><span class="mgr5">尺寸:M</span><span class="mgr5">颜色:黑色</span>
							<span class="col-999">编号:<span class="bianhao">1234567800</span></span></p>
					</div>
				</div>				
			</td>
			<td>
				<span class="text-del">￥<span class="text-del yj">200.00</span></span>
			</td>
			<td>
				<h5 class="mgb10"><span class="text-del">￥<span class="text-del xj">200.00</span></span>
					<span class="fw600 col-red fs-16">➡</span>
					<span class="fw600 col-red fs-14">￥
						<span class="fw600 col-red fs-14 xinjia">200.00</span>
					</span>
				</h5>
			</td>
			<input type="hidden" class="zhunruid" value="">
			<td>
				<p class="riqi"></p>
				<p class="shijian"></p>
			</td>
		</tr>
	</table>
	<div class="center mgt30"><button class="bg-slv col-fff fs-14 btn-150x30 bor-r5 bian">准入</button></div>
</div>
<!-- 协议价格变更 -->
<div class="pd30 protocol_price_box" style="display: none;">
	<table class="w630">
		<tr>
			<th class="w350">商品信息</th>
			<th>原价</th>
			<th>协议价格</th>
		</tr>
		<tr>
			<td>
				<div class="clearfix">
					<span class="fl pdl10 pdt10" >1</span>
					<img  class="fl btn-40x40 mgl10" src="__PUR_PUBLIC__/images/print1.png" alt="">
					<div class="fl text-left mgl10" >
						<h6 class="mgt5 text-over w270">2017春夏新款丝巾小方包韩版手提女包柳钉柳钉链条</h6>
						<p class="mgt10"><span class="mgr5">尺寸:M</span><span class="mgr5">颜色:黑色</span>
							<span class="col-999">编号:<span class="bianhao">1234567800</span></span></p>
					</div>
				</div>				
			</td>
			<input type="hidden" class="gid" value="">
			<td>
				<span class="text-del">￥200.00</span>
			</td>
			<td>
			<input type="text" value="150.00" class="fw600 col-red fs-14 mgb10 btn-80x30 center xieyijia">
			</td>
		</tr>
	</table>
	<div class="center mgt30"><button class="bg-slv col-fff fs-14 btn-150x30 bor-r5 zhunru">准入</button></div>
</div>
<!-- 批量准入 -->
<div class="pd30 pl_operation_cen" style="display: none;">
	<table class="w630 tb kuang">
		<tr>
			<th class="w350">商品信息</th>
			<th>原价</th>
			<th>协议价</th>
			<th>操作</th>
		</tr>		
	</table>
	<div class="center mgt30">
		<button class="bg-slv col-fff fs-14 btn-150x30 bor-r5 plzr" zrid="">准入</button>
	</div>
</div>
<script type="text/javascript" src="__PUR_PUBLIC__/js/jquery.min.js"></script>
<script type="text/javascript" src="__PUR_PUBLIC__/layer/layer.js"></script>
<script type="text/javascript" src="__PUR_PUBLIC__/js/js.js"></script>
<script>

	// 点击小铅笔   弹出修改输入框
  	function hide_price_change() {$('.price_change').hide(0);};
	$(".I_pencil").on("click",function(){
		hide_price_change();
		$(this).parents('td').find('.price_change').show(0);
	});


	//全选
	$('.checkAll').click(function(){
		$('.msg').attr("checked",this.checked);
	})

	//更改价格
	$('.lay_queding').click(function(){
		var jiage = $(this).parents().find('.pdw10').val();
		var gid = $(this).parents().find('.btn-70x35').attr('gid');
		var adid = $(this).parents().find('.adid').val();
		// alert(jiage);
		if(jiage == ""){
			alert('请输入价格');
		}
		// $('.price_change').hide(0);
		$.ajax({
			dataType : 'json',
			type : 'post',
			url : "{:U('Admit/set_pricex')}",
			data : {'xiugai':jiage,'aid':gid,'status':'5','adid':adid},
			success:function(data){
				location.reload();
			}
		})
	});



	//协议价格弹出框内容
	$('.protocol_price_btn').click(function(){
		var tbid = $(this).attr('gid');
		
		// alert(tbid);
		$.ajax({
			data : {'aid':tbid},
			type : 'post',
			dataType : 'json',
			url : "{:U('Admit/eject')}",
			success:function(data){
				$('.mgl10').attr('src',data.goods_thumb);
				$('.w270').text(data.goods_name);
				$('.text-del').text('￥'+data.goods_price);
				$('.center').attr('value',data.price);
				$('.gid').attr('value',data.aid);
				$('.bianhao').text(data.goods_sn);

			}
		})
	})



	//确认准入
	$('.zhunru').click(function(){
		var gid = $('.gid').val();
		var price = $('.xieyijia').val();
		var adid = $(this).parents().find('.adid').val();
		$.ajax({
			type : 'post',
			dataType : 'json',
			data : {'aid':gid,'price':price,'status':'2','adid':adid},
			url : "{:U('Admit/set_price')}",
			success:function(data){
				location.reload();
			}
		})
	})


	//确认供应商调价
	$('.jg_biangang').click(function(){
		var tbid = $(this).attr('gid');
		// alert(tbid);
		$.ajax({
			data : {'aid':tbid},
			type : 'post',
			dataType : 'json',
			url : "{:U('Admit/eject')}",
			success:function(data){
				$('.mgl10').attr('src',data.goods_thumb);
				$('.w270').text(data.goods_name);
				$('.yj').text(data.goods_price);
				$('.xj').text(data.price);
				$('.xinjia').text(data.xiugai);
				$('.zhunruid').attr('value',data.aid);
				$('.bianhao').text(data.goods_sn);
				$('.shijian').text(data.shijian);
				$('.riqi').text(data.riqi);
			}
		})
	})


	//取消准入
	$('.quxiao').click(function(){
		var gid = $(this).attr('gid');
		var adid = $(this).parents().find('.adid').val();
		$.ajax({
			type : 'post',
			dataType : 'json',
			data : {'aid':gid,'status':'0','adid':adid},
			url : "{:U('Admit/set_price')}",
			success:function(data){
				location.reload();
			}
		})
	});

	//取消调价
	$('.qxtj').click(function(){
		var gid = $(this).attr('gid');
		var adid = $(this).parents().find('.adid').val();
		$.ajax({
			type : 'post',
			dataType : 'json',
			data : {'aid':gid,'status':'1','adid':adid},
			url : "{:U('Admit/set_pricey')}",
			success:function(data){
				location.reload();
			}
		})
	});


	//确认变更价格
	$('.bian').click(function(){
		var gid = $(this).parents().find('.zhunruid').val();
		var jg = $('.xinjia').text();
		var adid = $(this).parents().find('.adid').val();
		// alert(jg);
		$.ajax({
			type : 'post',
			dataType : 'json',
			data : {'aid':gid,'status':'1','price':jg,'adid':adid},
			url : "{:U('Admit/set_prices')}",
			success:function(data){
				location.reload();
			}
		})
	})

		// 批量准入弹出层
	$(".pl_operation button").on("click",function () {

		var ids = $("input:checkbox[name='message']:checked").map(function(index,elem) {
            return $(elem).val();
        }).get().join(','); 
		$('.tan').remove();
        $('.plzr').attr('zrid',ids);
        $.ajax({
			data : {aid:ids},
			type : 'post',
			dataType : 'json',
			url : "{:U('Admit/ejects')}",
			success:function(data){
				$.each(data,function(key,val){
					
						$('.kuang').append('<tr class="tan" aid='+val.aid+'><td><div class="clearfix"><span class="fl pdl10 pdt10" >'+(key*1+1)+'</span><img  class="fl btn-40x40 mgl10" src="'+val.goods_thumb+'" alt=""><div class="fl text-left mgl10" ><h6 class="mgt5 text-over w270">'+val.goods_name+'</h6><p class="mgt10"><span class="mgr5">尺寸:M</span><span class="mgr5">颜色:黑色</span><span class="col-999">编号:'+val.goods_sn+'</span></p></div></div></td><td><span class="text-del">￥'+val.goods_price+'</span></td><td><input type="text" value="￥'+val.price+'" class="col-red btn-80x30 bor_1ddd center"></td><td><button onclick ="addCustomer(this)" class="cur-p qx">取消</button></td></tr>);');

					
				});

				layer.open({
				  type: 1,
				  title: ['申请准入', 'font-size:18px;text-align: center;font-weight:600;'],
				  skin: 'layui-layer-rim', //加上边框
				  area: ['700px', 'auto%'], //宽高
				  content: $('.pl_operation_cen'),
				});
			}
		});
		
	});
	

	//点击弹出框的取消移除要取消的数据
	function addCustomer(element){
		var a = element.parentNode.parentNode;
		var parent = a.parentNode;
		parent.removeChild(a);
	}



	//批量准入
	$('.plzr').click(function(){
		var trs = $('.tan');
		var str = "";
		for(i=0;i<trs.length;i++){
			
			 str += $('.tan:eq('+i+')').attr('aid') + ",";
		}
		if (str.length > 0) {
			    str = str.substr(0,str.length - 1);
			   }


		$.ajax({
			type : 'post',
			dataType : 'json',
			data : {'aid':str,'status':1},
			url : "{:U('Admit/set_zhunru')}",
			success:function(data){
				if(data){
					location.reload();
				}
			}
		})
	})
	

		// 价格变更弹出层
	$(".jg_biangang").on("click",function () {
		layer.open({
		  type: 1,
		  title: ['价格变更', 'font-size:18px;text-align: center;font-weight:600;'],
		  skin: 'layui-layer-rim', //加上边框
		  area: ['700px', 'auto%'], //宽高
		  content: $('.jg_biangang_cen')
		});
	});
		// 协议价格弹出层
	$(".protocol_price_btn").on("click",function () {
		layer.open({
		  type: 1,
		  title: ['协议价格', 'font-size:18px;text-align: center;font-weight:600;'],
		  skin: 'layui-layer-rim', //加上边框
		  area: ['700px', 'auto%'], //宽高
		  content: $('.protocol_price_box')
		});
	});


</script>
</html>
<style>
.tupian {
	margin:0 5px;
}
.zt {
	margin-left:452px;
	color:red;
	font-size: 18px;
}
</style>
