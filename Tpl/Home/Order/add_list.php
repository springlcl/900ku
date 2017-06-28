<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="wap-font-scale" content="no">
	<title>前台首页</title>
    <link rel="stylesheet" href="__HOME_CG_PUBLIC__/css/exhibition_hall_style.css">
	<link rel="stylesheet" href="__HOME_CG_PUBLIC__/css/swiper.min.css">
	<link rel="stylesheet" href="__HOME_CG_PUBLIC__/css/icons.css">
	<link rel="stylesheet" href="__HOME_CG_PUBLIC__/css/reset.css">
	<link rel="stylesheet" href="__HOME_CG_PUBLIC__/css/style.css">
</head>
<body>
<include file="Public/Cgheader" />
	<div class="above-buyer">
	    <h3 class="above-buyershop">
	        <i></i>
	        商品已成功加入采购清单！
	    </h3>  
	    <div class="buyershop clearfix">
	        <div class="fl left">
	            <img src="__UPLOADS__/{$data.thumb}" alt="">
	        </div>
	        <div class="fl right ">
	            <p class="mgt10">
	                {$data.goods_name}
	            </p>
	            <p class="colo-hui">
	                <span><?php $i = explode(",",$data['sku']); echo $i[0]; ?>　</span>
                    <span class="mgl25"><?php $i = explode(",",$data['sku']); echo $i[1]; ?> </span>　
	            </p>
	        </div>
	    </div>
	    <div class="buyeranniu">
           <a href="{:U('purchase_list')}"><button>去采购清单结算</button></a>
	    </div>
	</div> 

    <div style="overflow:hidden" class="shopping_banner0">
        <div class="shopping_one_new wh1200auto">
			<div class="lump">
				<h3 class="lump_title">常够清单<!-- <a class="" href="">更多</a> --></h3>
				<ul class="goods_list clearfix">
					<volist name="goods" id="vo">
						<li class="w200 bor_1ddd mgt20  fl">
							<img class="btn-200x200" src="__HOME_CG_PUBLIC__/images/zn (1).jpg" alt="">
							<div class="text pd10">
								<h5 class="col-666 fw600">采购商商品名称</h5>
								<p class="mgt10">Xiaomi/小米 小米手机5c 4g松果芯片超拍照学生手机</p>
								<h6 class="mgt10 fw600">￥450.00</h6>
							</div>
						</li>
					</volist>
					<li class="w200 bor_1ddd mgt20  fl">
						<img class="btn-200x200" src="__HOME_CG_PUBLIC__/images/zn (2).jpg" alt="">
						<div class="text pd10">
							<h5 class="col-666 fw600">采购商商品名称</h5>
							<p class="mgt10">Xiaomi/小米 小米手机5c 4g松果芯片超拍照学生手机</p>
							<h6 class="mgt10 fw600">￥450.00</h6>
						</div>
					</li>
					<li class="w200 bor_1ddd mgt20  fl">
						<img class="btn-200x200" src="__HOME_CG_PUBLIC__/images/zn (3).jpg" alt="">
						<div class="text pd10">
							<h5 class="col-666 fw600">采购商商品名称</h5>
							<p class="mgt10">Xiaomi/小米 小米手机5c 4g松果芯片超拍照学生手机</p>
							<h6 class="mgt10 fw600">￥450.00</h6>
						</div>
					</li>
					<li class="w200 bor_1ddd mgt20  fl">
						<img class="btn-200x200" src="__HOME_CG_PUBLIC__/images/zn (4).jpg" alt="">
						<div class="text pd10">
							<h5 class="col-666 fw600">采购商商品名称</h5>
							<p class="mgt10">Xiaomi/小米 小米手机5c 4g松果芯片超拍照学生手机</p>
							<h6 class="mgt10 fw600">￥450.00</h6>
						</div>
					</li>
					<li class="w200 bor_1ddd mgt20  fl">
						<img class="btn-200x200" src="__HOME_CG_PUBLIC__/images/zn (5).jpg" alt="">
						<div class="text pd10">
							<h5 class="col-666 fw600">采购商商品名称</h5>
							<p class="mgt10">Xiaomi/小米 小米手机5c 4g松果芯片超拍照学生手机</p>
							<h6 class="mgt10 fw600">￥450.00</h6>
						</div>
					</li>
				</ul>
			</div>
        </div>
    </div>
    <include file="Public/Foot" />
</body>
<script type="text/javascript" src="__HOME_CG_PUBLIC__/js/jquery.min.js"></script>
<script type="text/javascript" src="__HOME_CG_PUBLIC__/js/swiper.min.js"></script>
<script type="text/javascript" src="__HOME_CG_PUBLIC__/js/js.js"></script>
</html>