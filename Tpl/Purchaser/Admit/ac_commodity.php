<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>0405-准入商品01</title>
	<link rel="stylesheet" href="__PUR_PUBLIC__/css/reset.css">
	<link rel="stylesheet" href="__PUR_PUBLIC__/css/icons.css">
	<link rel="stylesheet" href="__PUR_PUBLIC__/css/style.css">
	<style>
		/*.admittance_goods_edit_box .tips{width: 100px;}*/
	</style>
</head>
<body>
	<div class="wh1200auto clearfix">
		<!-- 左边导航 -->
		<include file='Public/leftBar' />
		<!-- 右边内容 -->
		<div class="right_content fl">
			
			<div class="right_con_down shop_0405">
				<form method="post" action="">
				<div class="title_ty">
					<span class="tit_name">商品列表</span>
					<select name="status" id="" class="btn-150x30 pdl10 mgl25 col-666">
						<option value="">全部</option>
						<option value="3">变更中</option>
					</select>
					<input type="text" name="gname" placeholder="商品名称" class="btn-150x30 pdl10 mgl25 col-666">
					<select name="lm" id="" class="btn-150x30 pdl10 mgl25 col-666">
						<option value="">供应商分类</option>
						<volist id='arrs' name="arr">
						<option value="{$arrs.mcid}">{$arrs.mc_name}</option>
						</volist>
					</select>
					<select name="mc" id="" class="btn-150x30 pdl10 mgl25 col-666">
						<option value="">供应商名称</option>
						<volist id='arr' name="arr">
							<option value="{$arr.exid}">{$arr.ex_name}</option>
						</volist>
					</select>
					<button class="btn-80x30 bg-slv col-fff bor-r5 mgl25">搜索</button>
					</form>
				</div>
				
				<div class="commodity_list">
					<table>
						<tr>
							<th class="wh70">序号</th>
							<th class="wh230">商品信息</th>
							<th>商品编号</th>
							<th class="w140">价格</th>
							<th>分类</th>
							<th>已采购</th>
							<th>备注</th>					
							<th>操作</th>					
						</tr>
						<volist id="str" name="str">
						<tr class="rel">
							<td>
								<input type="checkbox" name='message' value="{$str.aid}" class="msg">
								<span class="mgl10">{$xuhao++}</span>
							</td>
							<td class="text-left clearfix ">
								<div class="img fl mgr10 por">
									<img class="btn-80x80" src="{$str.goods_thumb}" alt="">
									<if condition="$str.status eq 3">
										<span class="bg-red-tm pd2 poa col-fff" style="top: 0">价格变更中</span>
									</if>
								</div>
								<div class="text">
									<h3 class="col-qlv">{$str.ex_name}</h3>
									<if condition="$str.alias eq ''">
										<h4 class="mgt5">{$str.goods_name}</h4>
										<else/>
										<h4 class="mgt5">{$str.alias} </h4>
									</if>
									<img src="__SUP_PUBLIC__/images/qianbi.png" alt="" class="qianBi btn_show">
					                <div class="dj_box">
					                    <input type="text" >
					                    <button class="blan">确定</button>
					                    <button class="lhui" onclick="dj_hide()">取消</button>
					                </div>
									<h5 class="mgt5 col-666">
										<span class="mgr10"><?php $i = explode(',',$str['attributes']); echo $i[0]; ?></span>
										<span><?php $i = explode(',',$str['attributes']); echo $i[1]; ?></span>
									</h5>
								</div>
							</td>
							<input type="hidden" class="aid" value="{$str.aid}">
							<td>
							<if condition="$str.number neq ''">
                              <span > {$str.number}</span>
                              <else/>
                              <span>{$str.goods_sn}</span>
                          	</if>
                              <img src="__SUP_PUBLIC__/images/qianbi.png" class="bianhao">
                              <div class="dj_boxs">
                                  <input type="text" >
                                  <button class="blans">确定</button>
                                  <button class="lhui" onclick="dj_hides()">取消</button>
                              </div>
							</td>
							<td>
								<h5 class="mgb10"><span class="text-del">￥{$str.goods_price}</span></h5>
								<if condition="$str.status eq 3">
								<h5 class="mgb10"><span class="text-del">￥{$str.price}</span>
									<span class="fw600 col-red fs-16">➡</span>
									<span class="fw600 col-red fs-14">￥{$str.xiugai}</span>
								</h5>
								<else/>
								<h5 class="mgb10">									
									<span class="fw600 col-red fs-14">￥{$str.price}</span>
								</h5>
								</if>
							</td>
							<td>
								<span>{$str.fname|fefault="无自定义分组"} 
								  <img src="__SUP_PUBLIC__/images/qianbi.png" class="zhuangtai">
	                              <div class="dj_boxx">
	                                  <select name="fid">
	                                  	<volist id='data' name='datas'>
	                                    <option value="{$data.fid}">{$data.fname}
	                                    </volist>
	                                  </select>
	                                  <button class="blanx">确定</button>
	                                  <button class="lhui" onclick="dj_hidee()">取消</button>
	                              </div>
								</span>
							</td>
							<td><span>{$str.shuliang} </span></td>
							<td>
								<if condition="$str.remarks eq ''">
								<span>{$str.remark}</span>
								<else/>
								</span>{$str.remarks}</span>
								</if>
							<img src="__SUP_PUBLIC__/images/qianbi.png" alt="" class="qianBi beiz">
				                <div class="beizhu">
				                    <input type="text">
				                    <button class="blan">确定</button>
				                    <button class="lhui" onclick="dj_hidex()">取消</button>
				                </div>
							</td>
							<td>
								<if condition="$str.status eq 3">
								<button class="btn-70x35 col-fff bg-red2 bor-r5 jg_biangang jiage" goodsid="{$str.goods_id}">确认价格</button>
								</if>
								<if condition="$str.status neq 2 and $str.status neq 0">
								<button class="btn-70x35 col-fff bg-slv bor-r5 admittance_goods_edit_btn bianji fenlei" goodsid="{$str.goods_id}" pid="{$str.pid}">编辑</button>
								</if>
							</td>
						</tr>
						</volist>
					</table>
					<div class="pl_operation mgt20 mgl20">
						<input type="checkbox" class="checkAll">
						<button class="btn-80x30 mgl10 bg-slv bor-r5 col-fff qx">取消准入</button>
					</div>
				</div>
				<div class="clearfix pages">
					{$page}
				</div>
				<div class="record_info">版权所有:900库 [京ICP备1000000001号-1]</div>
			</div>
		</div>
	</div>
</body>

<!-- 批量准入 -->
<div class="pd30 pl_operation_cen" style="display: none;">
	<table class="w630 kuang">
		<tr>
			<th class="w350">商品信息</th>
			<th>原价</th>
			<th>协议价</th>
			<th>操作</th>
		</tr>
	</table>
	<div class="center mgt30"><button class="bg-slv col-fff fs-14 btn-150x30 bor-r5 qxzr" qxzr="">取消准入</button></div>
</div>
<!-- 协议价格变更 -->
<div class="pd30 jg_biangang_cen" style="display: none;">
	<table class="w630">
		<tr>
			<th class="w350">商品信息</th>
			<th>价格变更</th>
			<th>变更时间</th>
		</tr>
		<tr>
			<td>
				<div class="clearfix">
					<span class="fl pdl10 pdt10" >1</span>
					<img  class="fl btn-40x40 mgl10" src="__PUR_PUBLIC__/images/print1.png" alt="">
					<div class="fl text-left mgl10" >
						<h6 class="mgt5 text-over w270">2017春夏新款丝巾小方包韩版手提女包柳钉柳钉链条</h6>
						<p class="mgt10"><span class="mgr5">尺寸:M</span><span class="mgr5">颜色:黑色</span><span class="col-999">编号:1234567800</span></p>
					</div>
				</div>				
			</td>
			<input type="hidden" class="zhunruid" value="">
			<td>
				<h5 class="mgb10"><span class="text-del">￥<span class="text-del jiujia">200.00</span></span>
					<span class="fw600 col-red fs-16">➡</span><span class="fw600 col-red fs-14">￥<span class="xinjia">150.00</span></span></h5>
			</td>
			<td>
				<h5 class="mgb10 riqi">2017-03-07</h5>
			</td>
		</tr>
	</table>
	<div class="center mgt30"><button class="bg-slv col-fff fs-14 btn-150x30 bor-r5 queren">确认价格</button>
	<button class="bg-slv col-fff fs-14 btn-150x30 bor-r5 guanbi">关闭</button></div>
</div>
<!-- 准入商品编辑弹出层 -->
<div class="pd30 admittance_goods_edit_box" style="display: none;">
	<ul>
		<li class="clearfix mgt20">
			<div class="tips mgr10 wh80 text-right mgl35 dis_inb fl">
				<img src="__PUR_PUBLIC__/images/print1.png" class="btn-80x80 tupian" alt=""></div>
			<div class="dis_inb fl pdt10">
				<h4 class="names">2017春夏新款丝巾小方包韩版手提女包柳钉柳钉链条</h4>
				<p class="mgt10"><span class="mgr10">尺寸:M</span>
					<span class="mgr10">颜色:黑色</span>
					<span class="col-999">编号:<span class="bian">1234567800</span></span></p>
			</div>
		</li>
		<li class="mgt20">
			<span class="tips mgr10 wh80 text-right mgl35">添加昵称:</span>
			<input type="text" class="btn-380x30 nick">
		</li>
		<li class="mgt20">
			<span class="tips mgr10 wh80 text-right mgl35 ">编号:</span>
			<input type="text" class="btn-380x30 code">
		</li>
		<li class="mgt20">
			<span class="tips mgr10 wh80 text-right mgl35">分类:</span>
			<select name="fid" id="" class="btn-380x30 st">
			</select>
		</li>
		<li class="mgt20">
			<span class="tips mgr10 wh80 text-right mgl35 ">备注:</span>
			<input type="text" class="btn-380x30 rms">
		</li>
	</ul>
	<div class="center mgt30">
		<button class="bg-slv col-fff fs-14 btn-150x30 bor-r5 baocun" gsid="">保存</button></div>
</div>
<script type="text/javascript" src="__PUR_PUBLIC__/js/jquery.min.js"></script>
<script type="text/javascript" src="__PUR_PUBLIC__/layer/layer.js"></script>
<script type="text/javascript" src="__PUR_PUBLIC__/js/js.js"></script>
<script>
	
  	function hide_price_change() {$('.price_change').hide(0);};
	$(".I_pencil").on("click",function(){
		hide_price_change();
		$(this).parents('td').find('.price_change').show(0);
	});
  // 隐藏价格修改

	//layer.closeAll();
	
	// $(".lay_queding").on("click",function () {
	// 	// alert(1)
	// 	layer.closeAll();
	// });
	

	//全选
	$('.checkAll').click(function(){
		$('.msg').attr("checked",this.checked);
	});

		// 批量准入弹出层
	$(".qx").on("click",function () {
		var ids = $("input:checkbox[name='message']:checked").map(function(index,elem) {
            return $(elem).val();
        }).get().join(','); 
        $('.tan').remove();
        $('.qxzr').attr('qxzr',ids);
		$.ajax({
			data : {aid:ids},
			type : 'post',
			dataType : 'json',
			url : "{:U('Admit/ejects')}",
			success:function(data){
				$.each(data,function(key,val){
					
						$('.kuang').append('<tr class="tan" aid='+val.aid+'><td><div class="clearfix"><span class="fl pdl10 pdt10" >'+(key*1+1)+'</span><img  class="fl btn-40x40 mgl10" src="'+val.goods_thumb+'" alt=""><div class="fl text-left mgl10" ><h6 class="mgt5 text-over w270">'+val.goods_name+'</h6><p class="mgt10"><span class="mgr5">尺寸:M</span><span class="mgr5">颜色:黑色</span><span class="col-999">编号:'+val.goods_sn+'</span></p></div></div></td><td><span class="text-del">￥'+val.goods_price+'</span></td><td><input type="text" value="￥'+val.price+'" class="col-red btn-80x30 bor_1ddd center"></td><td><span onclick ="addCustomer(this)" class="cur-p">取消</span></td></tr>);');				
					
				});
				layer.open({
				  type: 1,
				  title: ['取消准入', 'font-size:18px;text-align: center;font-weight:600;'],
				  skin: 'layui-layer-rim', //加上边框
				  area: ['700px', 'auto%'], //宽高
				  content: $('.pl_operation_cen'),
				});
			}
		});
	});

	function addCustomer(element){
		var a = element.parentNode.parentNode;
		var parent = a.parentNode;
		parent.removeChild(a);
	}

	//查询分类
	$('.fenlei').click(function(){
		var pid = $('.fenlei').attr('pid');
		$.ajax({
			type : 'post',
			dataType : 'json',
			data : {'pid':pid},
			url : "{:U('Admit/grouping')}",
			success:function(data){
				$.each(data,function(key,val){
					$('.st').append('<option value="'+val.fid+'">'+val.fname+'</option>');
				});
			}
		})
	})


	//批量取消准入
	$('.qxzr').click(function(){
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
			data : {'id':str},
			url : "{:U('Admit/set_plqx')}",
			success:function(data){
				if(data){
					location.reload();
				}
			}
		})
	});
		
		// 商品价格变更信息弹出层
	$(".jg_biangang").on("click",function () {
		layer.open({
		  type: 1,
		  title: ['商品价格变更信息', 'font-size:18px;text-align: center;font-weight:600;'],
		  skin: 'layui-layer-rim', //加上边框
		  area: ['700px', 'auto%'], //宽高
		  content: $('.jg_biangang_cen')
		});
	});
		// 准入商品编辑弹出层
	$(".admittance_goods_edit_btn").on("click",function () {
		layer.open({
		  type: 1,
		  title: ['准入商品信息编辑', 'font-size:18px;text-align: center;font-weight:600;'],
		  skin: 'layui-layer-rim', //加上边框
		  area: ['600px', 'auto%'], //宽高
		  content: $('.admittance_goods_edit_box')
		});
	});
	$('.bianji').click(function(){
		var goodsid = $(this).attr('goodsid');
		// alert(goodsid);
		$.ajax({
			data : {'goodsid':goodsid},
			type : 'post',
			dataType : 'json',
			url : "{:U('Admit/gs_cont')}",
			success:function(data){
				$('.names').text(data.goods_name);
				$('.bian').text(data.goods_sn);
				$('.tupian').attr('src',data.goods_thumb);
				$('.baocun').attr('gsid',data.goods_id);
			}
		})
	});

	$('.baocun').click(function(){
		var id = $(this).attr('gsid');
		var nick = $('.nick').val();
		var code = $('.code').val();
		var rms = $('.rms').val();
		var fid = $('.st').val();
		// alert(fid);
		$.ajax({
			type : 'post',
			dataType : 'json',
			url : "{:U('Admit/set_rms')}",
			data : {'aid':id,'alias':nick,'number':code,'remarks':rms,'fid':fid},
			success:function(data){
				location.reload();
			}
		})
	});


	//确认调整价格信息
	$('.jiage').click(function(){
		var id = $(this).attr('goodsid');
		$.ajax({
			data : {'aid':id},
			type : 'post',
			dataType : 'json',
			url : "{:U('Admit/eject')}",
			success:function(data){
				$('.mgl10').attr('src',data.goods_thumb);
				$('.w270').text(data.goods_name);
				$('.jiujia').text(data.price);
				$('.xinjia').text(data.xiugai);
				$('.zhunruid').attr('value',data.aid);
				$('.bianhao').text(data.goods_sn);
				$('.riqi').text(data.riqi);
			}
		})
	});
	//确认价格
	$('.queren').click(function(){
		var id = $('.zhunruid').val();
		var jg = $('.xinjia').text();
		// alert(jg);
		$.ajax({
			type : 'post',
			dataType : 'json',
			data : {'aid':id,'status':'1','price':jg},
			url : "{:U('Admit/set_price')}",
			success:function(data){
				location.reload();
			}
		});
	});


	//关闭准入
	$('.guanbi').click(function(){
		var id = $('.zhunruid').val();
		$.ajax({
			type : 'post',
			dataType : 'json',
			data : {'aid':id,'status':'0'},
			url : "{:U('Admit/set_price')}",
			success:function(data){
				location.reload();
			}
		});
	})


//弹出框修改商品信息
$(".btn_show").click(function () {
$(this).parent().find(".dj_box").show(1);
		});
  function dj_hide() {$(".dj_box").hide(1);};
  function dj_hides() {$(".dj_boxs").hide(1);};
  function dj_hidex() {$(".beizhu").hide(1);};
  function dj_hidee() {$(".dj_boxx").hide(1);};
  $('.dj_box .blan').click(function(){
  	var name = $(this).parent().find('input').val();
  	if(name==""){
  		alert('请输入名称');
  	}else{
  		var aid = $(this).parents().find('.aid').val();
  		$.ajax({
  			type : 'post',
  			dataType : 'json',
  			url : "{:U('Admit/set_content')}",
  			data : {'aid':aid,'alias':name},
  			success:function(data){
  				location.reload();
  			}
  		})
  		$('.dj_box').hide(1);
  	}
  		

  });



  //通过点击编号后面的铅笔显示输入框
  $(".bianhao").click(function () {
    $(this).parent().find(".dj_boxs").show(1);
  });
  $('.dj_boxs .blans').click(function(){
  	var bian = $(this).parent().find('input').val();
  	if(bian==""){
  		alert('请输入编号');
  	}else{
  		var aid = $(this).parents().find('.aid').val();
	  	$.ajax({
	  			type : 'post',
	  			dataType : 'json',
	  			url : "{:U('Admit/set_content')}",
	  			data : {'aid':aid,'number':bian},
	  			success:function(data){
	  				location.reload();
	  			}
	  		})
	  		$('.dj_boxs').hide(1);
  	}
  	
  })


  //点击备注后面的铅笔弹出框
  $('.beiz').click(function(){
  	$(this).parent().find('.beizhu').show(1);
  })
  $('.beizhu .blan').click(function(){
  	var rm = $(this).parent().find('input').val();
  	if(rm==""){
  		alert('请输入备注')
  		}else{
	  			var aid = $(this).parents().find('.aid').val();
	  			$.ajax({
	  			type : 'post',
	  			dataType : 'json',
	  			url : "{:U('Admit/set_content')}",
	  			data : {'aid':aid,'remarks':rm},
	  			success:function(data){
	  				location.reload();
	  			}
		  		});
		  		$('.beizhu').hide(1);
  		}
  	
  });


  //修改商品分类
  $('.blanx').click(function(){
  	var fid = $(this).parent().find('select').val();
  	var aid = $(this).parents().find('.aid').val();
  	$.ajax({
  			type : 'post',
  			dataType : 'json',
  			url : "{:U('Admit/set_content')}",
  			data : {'aid':aid,'fid':fid},
  			success:function(data){
  				location.reload();
  			}
	  		});
  		$('.dj_boxx').hide(1);
  })


  $('.zhuangtai').click(function(){
  	$(this).parent().find('.dj_boxx').show(1);
  })


</script>
</html>
<style>
#img img{
  border: 1px solid #ddd;
    height: 62px;
    margin-left: 5.4%;
    padding: 5px;
    width: 62px;
}
.show {
    padding-left: 155px;
}

.dj_box,.dj_boxs,.beizhu,.dj_boxx{
  display:none;
}
div.dj_box,div.dj_boxs,div.beizhu,div.dj_boxx {
    background: #fff none repeat scroll 0 0;
    border: 1px solid #0575e1;
    border-radius: 5px;
    padding: 10px 15px;
    position: absolute;
  }
.dj_box input,.dj_boxs input,.beizhu input {
  float:left;
  line-height:19px;
  height: 28px;
  padding: 0 10px;
  width: 100px;
}
.blan,.blans,.blanx {
    background: #0077dd none repeat scroll 0 0;
    border-radius: 1px;
    color: #fff;
    height: 28px;
    margin: 0 5px;
    width: 46px;
}
.lhui {
    background: #79b6ec none repeat scroll 0 0;
    border-radius: 1px;
    color: #fff;
    height: 28px;
    width: 46px;
}
.btn_show,.bianhao,.beiz {
  cursor:pointer;
}

div.beizhu {
    left:708px;
  }


  .pages {
    float:right;
  } 
  .pages a,  
  .pages span {  
      display: inline-block;  
      padding: 2px 5px;  
      margin: 0 1px;  
      border: 1px solid #f0f0f0;  
      -webkit-border-radius: 3px;  
      -moz-border-radius: 3px;  
      border-radius: 3px;  
  }  
    
  .pages a,  
  .pages li {  
      display: inline-block;  
      list-style: none;  
      text-decoration: none;  
      color: #58A0D3;  
  }  
    
  .pages a.first,  
  .pages a.prev,  
  .pages a.next,  
  .pages a.end {  
      margin: 0;  
  }  
    
  .pages a:hover {  
      border-color: #50A8E6;  
  }  
    
  .pages span.current {  
      background: #50A8E6;  
      color: #FFF;  
      font-weight: 700;  
      border-color: #50A8E6;  
  }  
  .pages {
    font-size:18px;
  }
</style>