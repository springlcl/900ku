<!DOCTYPE html>
<html>


<!-- Mirrored from www.zi-han.net/theme/hplus/index_v3.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:18:46 GMT -->
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">


	<title>我的奖金 - 900ku后台</title>
    <link href="__ADMIN_PUBLIC__/css/bootstrap.min14ed.css?v=3.3.6" rel="stylesheet">
    <link href="__ADMIN_PUBLIC__/css/font-awesome.min93e3.css?v=4.4.0" rel="stylesheet">
    <link href="__ADMIN_PUBLIC__/css/plugins/bootstrap-table/bootstrap-table.min.css" rel="stylesheet">
    <link href="__ADMIN_PUBLIC__/css/animate.min.css" rel="stylesheet">
    <link href="__ADMIN_PUBLIC__/css/style.min862f.css?v=4.1.0" rel="stylesheet">

</head>

<body class="gray-bg">
<div class="wrapper wrapper-content">
	<div class="row">
		<div class="col-sm-4">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<!--<span class="label label-success pull-right">月</span>-->
					<h5>帐号余额</h5>
				</div>
				<div class="ibox-content">
					<h1 class="no-margins">480.00</h1>
					<div class="stat-percent font-bold text-success">98.00
					</div>
					<small>交易中</small>
				</div>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<span class="label label-info pull-right"></span>
					<h5>可提现</h5>
				</div>
				<div class="ibox-content">
					<h1 class="no-margins" style="width: 100%;">275.00 <button type="button" class="btn btn-sm btn-primary"　style="float:right;"> 提现</button></h1>
					<div class="stat-percent font-bold text-info">
					</div>
					<small> 　</small>
				</div>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<span class="label label-primary pull-right"></span>
					<h5>已提现</h5>
				</div>
				<div class="ibox-content">
					<h1 class="no-margins">106.00</h1>
					<div class="stat-percent font-bold text-navy">
					</div>
					<small>　</small>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<h5></h5>
				</div>
				<div class="ibox-content">

					<div class="tabs-container">
						<ul class="nav nav-tabs">
							<li class="active"><a data-toggle="tab" href="#tab-1" aria-expanded="true"> 收入金额</a>
							</li>
							<li class=""><a data-toggle="tab" href="#tab-2" aria-expanded="false">收支明细</a>
							</li>
						</ul>
						<div class="tab-content">
							<div id="tab-1" class="tab-pane active">
								<div class="panel-body">
									<div class="row">
										<form role="form" class="form-inline">

											<div class="form-group">
												<label class="sr-only"></label>
												<select class="input-sm form-control input-s-sm inline">
													<option value="0">付款方式</option>
													<option value="1">认证</option>
													<option value="1">未认证</option>
												</select>
											</div>
											<div class="form-group" id="data_5">
												<label class="font-noraml">成交时间：</label>
												<div class="input-daterange input-group" id="datepicker">
													<input type="text" class="laydate-icon input-sm form-control layer-date" name="start" id="start" value="2014-11-11" placeholder="开始日期"/>
													<span class="input-group-addon">到</span>
													<input type="text" class="laydate-icon input-sm form-control layer-date" name="end" id="end" value="2014-11-17" placeholder="结束日期"/>
												</div>
											</div>
											<div class="checkbox m-l m-r-xs">
												<a href="">最近7天</a>　<a href="">最近30天</a>
												<!--<label class="i-checks">
                                                    <input type="checkbox"><i></i> 自动登录</label>-->
											</div>
											<button class="btn btn-white" type="submit" style="height: 30px;margin-top:5px;">查询</button>
										</form>
									</div>
									<div class="table-responsive">
										<table class="table table-hover">
											<thead>
											<tr>
												<th>订单编号</th>
												<th>收入（元）</th>
												<th>付款方式</th>
												<th>时间</th>
											</tr>
											</thead>
											<tbody>
											<tr>
												<td>1</td>
												<td>500</td>
												<td>银行转帐</td>
												<td>2017-05-10 18:32:11</td>
											</tr>
											<tr>
												<td>2</td>
												<td>500</td>
												<td>银行转帐</td>
												<td>2017-05-10 18:32:11</td>
											</tr>
											</tbody>
										</table>
									</div>



								</div>
							</div>
							<div id="tab-2" class="tab-pane">
								<div class="panel-body">

									<div class="row">
										<form role="form" class="form-inline">

											<div class="form-group">
												<label class="sr-only"></label>
												<select class="input-sm form-control input-s-sm inline">
													<option value="0">付款方式</option>
													<option value="1">认证</option>
													<option value="1">未认证</option>
												</select>
											</div>
											<div class="form-group">
												<label class="font-noraml">成交时间：</label>
												<div class="input-daterange input-group">
													<input type="text" class="laydate-icon input-sm form-control layer-date" name="start" id="starts" value="2014-11-11" placeholder="开始日期"/>
													<span class="input-group-addon">到</span>
													<input type="text" class="laydate-icon input-sm form-control layer-date" name="end" id="ends" value="2014-11-17" placeholder="结束日期"/>
												</div>
											</div>
											<div class="checkbox m-l m-r-xs">
												<a href="">最近7天</a>　<a href="">最近30天</a>
												<!--<label class="i-checks">
                                                    <input type="checkbox"><i></i> 自动登录</label>-->
											</div>
											<button class="btn btn-white" type="submit" style="height: 30px;margin-top:5px;">查询</button>
										</form>
									</div>
									<div class="table-responsive">
										<table class="table table-hover">
											<thead>
											<tr>
												<th>订单编号</th>
												<th>付款方式</th>
												<th>收入（元）</th>
												<th>时间</th>
											</tr>
											</thead>
											<tbody>
											<tr>
												<td>1</td>
												<td>发货款</td>
												<td>500</td>
												<td>2017-05-10 18:32:11</td>
											</tr>
											<tr>
												<td>2</td>
												<td>发货款</td>
												<td>500</td>
												<td>2017-05-10 18:32:11</td>
											</tr>
											</tbody>
										</table>
									</div>


								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-8 col-sm-offset-3">
								<div class="checkbox">
									<label>
										<!-- <input type="checkbox" class="checkbox" id="agree" name="agree"> 我已经认真阅读并同意《商品发布协议》 -->
									</label>
								</div>
							</div>
						</div>

					</div>






				</div>

			</div>
		</div>
	</div>



</div>

	<script src="__ADMIN_PUBLIC__/js/jquery.min.js?v=2.1.4"></script>
	<script src="__ADMIN_PUBLIC__/js/bootstrap.min.js?v=3.3.6"></script>
    <script src="__ADMIN_PUBLIC__/js/content.min.js?v=1.0.0"></script>

</body>


<!-- Mirrored from www.zi-han.net/theme/hplus/index_v3.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:18:49 GMT -->
</html>
