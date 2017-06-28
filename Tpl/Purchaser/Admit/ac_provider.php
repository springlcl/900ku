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
			<div class="right_con_down admittance_con">
				<div class="pdh25 clearfix">
					<form action="query" method="post">
					<span>供应商名称：</span>
					<input name="ename" type="text" class="btn-220x30 mgl10 pdl10">
					<button class="btn-60x30 bg-slv mgl10 col-fff">搜素</button>
					</form>
					<button class="fr col-fff bg-slv btn-150x30">寻找供应商</button>
				</div>
				<table class="supplier_liat">
					<tr>
						<th>序号</th>
						<th class="info">供应商信息</th>
						<th>联系人</th>
						<th>联系电话</th>
						<th>来源</th>
						<th>准入商品数</th>
						<th>备注</th>
						<th>操作</th>
					</tr>
					<volist id='data' name='data'>
					<tr>
						<td>{$xuhao++}</td>
						<td class="clearfix">
							<div class="img fl">
								<img src="__UPLOADS__/supplier/zhizhao/{$data.license}" alt="">
							</div>
							<div class="fl text-left mgl10">
								<h3 class="fw600 mgt10">{$data.ex_name}</h3>
								<h6 class="mgt15">主营类目：{$data.mc_name}</h6>
							</div>
						</td>
						<td>{$data.username}</td>
						<td>{$data.tel}</td>
						<if condition="$data.channel eq 1">
						<td>PC添加</td>
						<else/>
						<td>扫码添加</td>
						</if>
						<td class="col-red">{$data.quantity|default="0"}</td>
						<td>{$data.remarks}</td>
						<td><a href="__URL__/admin_st/exid/{$data.exid}">
								<button class="btn-90x35 bg-slv col-fff bor-r5">准入管理
									<i class="tishi_num">{$data.gengxin|default="0"}
									</i>
								</button>
							</a>
						</td>
					</tr>
					</volist>
					
				</table>
				<div class="clearfix pages">
					{$page}
				</div>
				<div class="record_info">版权所有:900库 [京ICP备1000000001号-1]</div>
			</div>
		</div>
	</div>
</body>
<script type="text/javascript" src="__PUR_PUBLIC__/js/jquery.min.js"></script>
<script type="text/javascript" src="__PUR_PUBLIC__/laydate/laydate.js"></script>
<script type="text/javascript" src="__PUR_PUBLIC__/js/js.js"></script>
</html>
<style>
.btn-150x30 {
	margin-top:-30px;
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