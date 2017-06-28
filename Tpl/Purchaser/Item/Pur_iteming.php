<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>进行中项目</title>
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
			<div class="right_con_down company_project_con">
				<div class="top pdl30 pdt25 bg-fff">
					<h3 class="fs-24 fw600">{$com.company}<span class="fs-12 col-999 mgl35">{$com.province}{$com.city}{$com.area}{$com.street}</span></h3>
				<if condition="$role eq 1">
					<div><button class="btn-150x40 bg-slv bor-r5 col-fff fs-16 mgt20 new_project_bnt">新建项目/子公司</button></div>
				</if>
					<div class="tit center mgauto">
						<a href="{:U('Index/Pur_iteming')}"><span class="btn-150x40 sanjiao_bottom_lan_quan bg-slv col-fff">进行中项目</span></a>
						<a href="{:U('Index/Pur_olditem')}"><span class="btn-150x40">历史项目</span></a>
					</div>
				</div>
				<form action="{:U('Index/chooseing')}" method="post">
				<div class="time_choice"><span class="col-666">选择时间</span><input id="wrong_start" name="start" value="{$s}" class="btn-80x20 mgw10 bor-r3 pdl10" type="text"><span class="col-999">至</span><input id="wrong_end" name="end" value="{$e}" class="btn-80x20 mgw10 bor-r3 pdl10" type="text"><button id="choose" class="btn-50x20 bg-slv col-fff bor-r3 mgl15">筛选</button></div>
				<input type="hidden" name="type" value="0" />
			</form>
				<ul class="project_list clearfix">
					<if condition="$Iteming neq 0">
						<volist name="Iteming" id="it">
					<li class="lupm">
						<div>
							<span class="wh130 fs-16 fw600">{$it.pro_name}</span>
							<span class="col-666" pid="{$it.pid}">编辑</span>
							<a href="{:U('Employee/stuffManage')}"><span class="col-666 mgw10">人员配置</span></a>
							<select name="" class="myselect">
								<option value="0" selected="selected">已开启</option>
								<option id="status" style="cursor: pointer;" value="{$it.pid}">关闭</option>
							</select>
						</div>
						<div class="mgt15">
							<span class="wh130">项目负责人:<?php $res=M('user')->field('username')->where('uid='.$it['manager'])->find(); echo $res['username'];?></span>
							<span>联系号码:123456789</span>
						</div>
						<div class="btn-300x50 mgt15 overflow">
							<span>项目地址:</span>
							<span>{$it.province}{$it.city}{$it.area}{$it.street}</span>
						</div>
						<div class="clearfix mgt10">
							<a href="{:U('Financial/paid')}"><span class="fl col-lan fs-16">订单待付款<i class="bor-r50 bg-red num center mgl5 col-fff fs-14">
							<?php
									$pdata = M('user')->field('item')->where($it['uid'])->find();
							        $whereNum['deal_stat'] = array('in','0,2,4,6');
							        $whereNum['pid'] = $it['pid'];
							        $count = M('order')->where($whereNum)->count();
							        echo $count;
							?>
							</i></span></a>
							<span class="fr mgt5 mgr15"><?=date('Y-m-d',$it['add_time']) ?></span>
						</div>
					</li>
				</volist>
		

					<else />

					<div class="no_data mgt35 pdt30 center">
						<i class="ico_all I_no_data"></i>
						<span class="fs-16">对不起，暂无相关信息！</span>
						<h6 class="col-999 mgt20">温馨提示: 请在左上角点击"<span class="col-lan">新建项目/子公司</span>"来添加数据.</h6>
					</div>

				</if>

					
				</ul>
				<ul class="pagination pages">
					{$page}
				</ul>
				<!-- <ul class="pagination">
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
				</ul> -->
				<div class="record_info">版权所有:900库 [京ICP备1000000001号-1]</div>
			</div>
		</div>
	</div>

<!-- 新建项目 -->
<div class="protection n">
	<div class="tanchu_box tanchu_big pdt35 new_project_box n">
		<span class="gb gb_tanchu"><i class="ico_all I_guanbi"></i></span>
		<h3 class="pdh35 fs-24 fw600 mgt35 center">创建项目</h3>
		<form action="{:U('Index/new_item')}" method="post" enctype="multipart/form-data" class="yanzhengform">
			<dl>
				<dt><span class="tips">项目基本信息</span></dt>
				<dd>
					<span class="tips">项目名称:</span>
					<input type="text" name="pro_name" class="btn-300x30 pdl10" datatype="*" nullmsg="请输入项目名称">
				</dd>
				<dd class="citys">
					<span class="tips">项目联系地址:</span>
					<select name="province" id="" class="btn-90x30 mgr15">
						<option value="1">选择省</option>
					</select><select name="city" id="" class="btn-90x30 mgr15">
						<option value="1">选择市</option>
					</select><select name="area" id="" class="btn-90x30 mgr15">
						<option value="1">选择区</option>
					</select>
				</dd>
				<dd>
					<span class="tips">&nbsp;</span>
					<input type="text" name="street" class="btn-300x30 pdl10" placeholder="请输入详细地址"  datatype="*" nullmsg="请输入详细地址">
				</dd>
				<dt><span class="tips">发票信息</span></dt>
				<dd>
					<span class="tips">单位名称:</span>
					<input type="text" name="company" class="btn-300x30 pdl10" datatype="*" nullmsg="请输单位名称">
				</dd>
				<dd>
					<span class="tips">纳税人识别码:</span>
					<input type="text" name="taxpayer_num" class="btn-300x30 pdl10"  datatype="*" nullmsg="请输入纳税人识别码">
				</dd>
				<dd>
					<span class="tips">开户银行:</span>
					<input type="text" name="bank_name" class="btn-300x30 pdl10"  datatype="*" nullmsg="请输入开户银行">
				</dd>
				<dd>
					<span class="tips">银行帐号:</span>
					<input type="text" name="bank_account" class="btn-300x30 pdl10"  datatype="*" nullmsg="请输入银行账号">
				</dd>
				<dd>
					<span class="tips">注册地址:</span>
					<input type="text" name="com_address" class="btn-300x30 pdl10" datatype="*" nullmsg="请输入注册地址">
				</dd>
				<dd>
					<span class="tips">注册电话:</span>
					<input type="text" name="com_tel" class="btn-300x30 pdl10" datatype="m" nullmsg="请输入注册电话">
				</dd>
				<dt><span class="tips">管理员信息</span></dt>
				<dd>
					<span class="tips">管理员信息:</span>
					<!-- <input type="text" class="btn-150x30"  datatype="*" nullmsg="请输入管理员信息"> -->
					<select name="manager" class="btn-150x30"  datatype="*" nullmsg="请输入管理员信息">
						<volist name="admin" id="ad">
						<option value="{$ad.uid}">{$ad.username}</option>
						</volist>
					</select>
					<a  href="{:U('Employee/add')}" style="text-align: center;display: inline-block;line-height: 30px;" id="adduser" type="button" class="btn-80x30 mgl10 bg-slv col-fff bor-r5" >新增管理员</a>
				</dd>
<!-- 				<div id="hidiv" style="display:none">
					<dd>
						<span class="tips">管理员二维码:</span>
						<img src="__PUR_PUBLIC__/images/index_end_tbc.png" alt="" class="btn-80x80 pdl10">
						<span class="wh200 col-999 mgt20 mgl10">注：请用项目管理员个人微信扫码进行绑定，成为该项目管理员！绑定成功显示：您好，已绑定成功！</span>
					</dd>
					<dd>
						<span class="tips">管理员姓名:</span>
						<input type="text" class="btn-300x30 pdl10" >
					</dd>
					<dd>
						<span class="tips">手机号码:</span>
						<input type="text" class="btn-300x30 pdl10" >
					</dd>
					<dd>
						<span class="tips">输入验证码:</span>
						<input type="text" class="btn-300x30 pdl10" >
					</dd>
				</div> -->
				<dd class="center">
					<button class="bg-slv fs-14 col-fff btn-220x40 gb_tanchu1">立即创建</button>
				</dd>
			</dl>
		</form>

	</div>
</div>



<!-- 编辑项目 -->
<div class="protection e">
	<div class="tanchu_box tanchu_big pdt35 new_project_box e">
		<span class="gb gb_tanchu"><i class="ico_all I_guanbi"></i></span>
		<h3 class="pdh35 fs-24 fw600 mgt35 center">编辑项目</h3>
		<form action="{:U('Index/edit_item')}" method="post" enctype="multipart/form-data" class="yanzhengform">
			<dl>
				<input type="hidden" id="pid" name="pid" value="" />
				<dt><span class="tips">项目基本信息</span></dt>
				<dd>
					<span class="tips">项目名称:</span>
					<input type="text" name="pro_name" id="pro_name" class="btn-300x30 pdl10" datatype="*" nullmsg="请输入项目名称">
				</dd>
				<dd class="citys">
					<span class="tips">项目联系地址:</span>
					<select name="province" id="" class="btn-90x30 mgr15">
						<option value="1">选择省</option>
					</select><select name="city" id="" class="btn-90x30 mgr15">
						<option value="1">选择市</option>
					</select><select name="area" id="" class="btn-90x30 mgr15">
						<option value="1">选择区</option>
					</select>
				</dd>
				<dd>
					<span class="tips">&nbsp;</span>
					<input type="text" id="street" name="street" class="btn-300x30 pdl10" placeholder="请输入详细地址"  datatype="*" nullmsg="请输入详细地址">
				</dd>
				<dt><span class="tips">发票信息</span></dt>
				<dd>
					<span class="tips">单位名称:</span>
					<input type="text" id="company" name="company" class="btn-300x30 pdl10" datatype="*" nullmsg="请输单位名称">
				</dd>
				<dd>
					<span class="tips">纳税人识别码:</span>
					<input type="text" id="taxpayer_num" name="taxpayer_num" class="btn-300x30 pdl10"  datatype="*" nullmsg="请输入纳税人识别码">
				</dd>
				<dd>
					<span class="tips">开户银行:</span>
					<input type="text" id="bank_name" name="bank_name" class="btn-300x30 pdl10"  datatype="*" nullmsg="请输入开户银行">
				</dd>
				<dd>
					<span class="tips">银行帐号:</span>
					<input type="text" id="bank_account" name="bank_account" class="btn-300x30 pdl10"  datatype="*" nullmsg="请输入银行账号">
				</dd>
				<dd>
					<span class="tips">注册地址:</span>
					<input type="text" id="com_address" name="com_address" class="btn-300x30 pdl10" datatype="*" nullmsg="请输入注册地址">
				</dd>
				<dd>
					<span class="tips">注册电话:</span>
					<input type="text" id="com_tel" name="com_tel" class="btn-300x30 pdl10" datatype="m" nullmsg="请输入注册电话">
				</dd>
				<dt><span class="tips">管理员信息</span></dt>
				<dd>
					<span class="tips">管理员信息:</span>
					<!-- <input type="text" class="btn-150x30"  datatype="*" nullmsg="请输入管理员信息"> -->
					<select id="manager" name="manager" class="btn-150x30">
						<!-- <option id="edit" value=""></option> -->
							<volist name="admin" id="ad">
						<option value="{$ad.uid}">{$ad.username}</option>
					</volist>
					</select>
					<input type="button" id="edit" class="btn-80x30 mgl10 bg-slv col-fff bor-r5" value="新增管理员">
				</dd>
				<div id="editdiv" style="display:none;">
				<dd>
					<span class="tips">管理员二维码:</span>
					<img src="__PUR_PUBLIC__/images/index_end_tbc.png" alt="" class="btn-80x80 pdl10">
					<span class="wh200 col-999 mgt20 mgl10">注：请用项目管理员个人微信扫码进行绑定，成为该项目管理员！绑定成功显示：您好，已绑定成功！</span>
				</dd>
				<dd>
					<span class="tips">管理员姓名:</span>
					<input type="text" class="btn-300x30 pdl10" > <!-- datatype="*" nullmsg="请输入管理员姓名" -->
				</dd>
				<dd>
					<span class="tips">手机号码:</span>
					<input type="text" class="btn-300x30 pdl10" ><!-- datatype="m" nullmsg="请输入管理员手机号" -->
				</dd>
				<dd>
					<span class="tips">输入验证码:</span>
					<input type="text" class="btn-300x30 pdl10" > <!-- datatype="*" nullmsg="请输入验证码" -->
				</dd>
			</div>
				<dd class="center">
					<button class="bg-slv fs-14 col-fff btn-220x40 gb_tanchu1">立即编辑</button>
				</dd>
			</dl>
		</form>
	</div>
</div>
</body>
<script type="text/javascript" src="__PUR_PUBLIC__/js/jquery.min.js"></script>
<script type="text/javascript" src="http://validform.rjboy.cn/Validform/v5.3.2/Validform_v5.3.2_min.js"></script>
<script type="text/javascript" src="__PUR_PUBLIC__/laydate/laydate.js"></script>
<script type="text/javascript" src="__PUR_PUBLIC__/js/jquery.city.js"></script>
<script type="text/javascript" src="__PUR_PUBLIC__/js/js.js"></script>
<script>
	//点击项目关闭
	$(".myselect").change(function(){
		var pid=$(this).val();
		$.ajax({
			type:'post',
			url:"{:U('Index/close')}",
			data:{'pid':pid},
			dataType:'json',
			async:false,
			success:function(data)
			{
				if(data){
					location.reload();
				}
			}
		})
	});

	//筛选
	$("#choose").bind('click',function(){
		var start=$("#wrong_start").val();
		var end=$("#wrong_end").val();
		location.href="{:U('Index/chooseing',array('s'=>start,'e'=>end))}";
	});

	  //选择时间
    var start = {
      elem: '#wrong_start',
      format: 'YYYY/MM/DD ',
      min: '1900-01-01 ', //最小日期
      max: laydate.now(), //最大日期
      istoday: false,
      choose: function(datas){
         end.min = datas; //开始日选好后，重置结束日的最小日期
         end.start = datas //将结束日的初始值设定为开始日
      }
    };
    var end = {
      elem: '#wrong_end',
      format: 'YYYY/MM/DD ',
      min: '1900-01-01 ', //最小日期
      max: laydate.now(),
      istoday: false,
      choose: function(datas){
        start.max = datas; //结束日选好后，重置开始日的最大日期
      }
    };
    laydate(start);
    laydate(end);


    // 城市选择
    $('.citys').citys({code:110000});
       // 验证
    $(".yanzhengform").Validform({
        tiptype:function(msg,o,cssctl){
            var objtip=$("#msgdemo2");
            cssctl(objtip,o.type);
            objtip.text(msg);
        }
    });

    // 弹出 新建项目的弹框
    $(".new_project_bnt").click(function () {
    	$(".protection.n").show(0);
    	$(".new_project_box.n").show(0);

    });

    // 弹出 编辑项目的弹框
    $(".col-666").click(function () {
    	$(".protection.e").show(0);
    	$(".new_project_box.e").show(0);
    	var pid=$(this).attr('pid');
		$.ajax({
			type:'post',
			url:"{:U('Index/find_edit')}",
			data:{'pid':pid},
			dataType:'json',
			async:false,
			success:function(data)
			{
				if(data){
					var cond = new Object();
					cond.code = data.area_code;
					$('.citys').citys(cond);
					$("#pro_name").val(data.pro_name);
					$("#street").val(data.street);
					$("#company").val(data.company);
					$("#taxpayer_num").val(data.taxpayer_num);
					$("#bank_name").val(data.bank_name);
					$("#bank_account").val(data.bank_account);
					$("#com_address").val(data.com_address);
					$("#com_tel").val(data.com_tel);
					$("#pid").val(pid);
					$("#manager").prepend("<option selected='selected' value='"+data['manager']+"'>"+data['mname']+"</option>");
				}
			}
		})
    });


    //采购员的信息新增展示
    $("#adduser").click(function(){
    	$("#hidiv").show();
    	
    })
   	//采购员的信息编辑展示
    $("#edit").click(function(){
    	$("#editdiv").show();
    	
    })

</script>
 <style> 
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
</html>