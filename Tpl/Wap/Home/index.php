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
    <link rel="stylesheet" href="__WAP_PUBLIC__/css/exhibition_hall_style.css">
	<link rel="stylesheet" href="__WAP_PUBLIC__/css/swiper.min.css">
	<link rel="stylesheet" href="__WAP_PUBLIC__/css/icons.css">
	<link rel="stylesheet" href="__WAP_PUBLIC__/css/reset.css">
	<link rel="stylesheet" href="__WAP_PUBLIC__/css/style.css">
</head>
<body>
<include file="Public/Header" />
	<div class="he_zhongjian ">
       	<div class="he_content clearfix">
       			<ul class="dianzichanpin fl">
       				<volist name="cate" id="c">
       				<!-- <li class="col-slv">• 电子产品</li> -->
       				<li>• {$c.gc_name}</li>
					</volist>
       			</ul>
       			<div class="he-tupian">
       				<img src="__WAP_PUBLIC__/images/zhongguotu.png" alt="">
       			</div>
       			<div class="he_zhangxiansheng fl">
       				<a href="{:U('Cg/index')}">
       				<div class="zuishangmian clearfix">
       					<div class="left fl">
       						<img src="__WAP_PUBLIC__/images/52x52.png" alt="">
       					</div>
       					<div class="right fl">
       						<p class="mgl10 mgt5">打开手机微信</p>
       						<p class="mgl10">扫描二维码登录</p>
       					</div>
       				</div>
       				</a>
       				<div class="dierge clearfix">
       						<div class="left fl"><img src="__WAP_PUBLIC__/images/xiaofangzi.png" alt=""></div>
       						<div class="right fl">{$exnum}个展厅</div>
       				</div>
       				<div class="disange clearfix">
       						<div class="left fl"><img src="__WAP_PUBLIC__/images/xiaoqiche.png" alt=""></div>
       						<div class="right fl">{$asknum}个求购信息</div>
       				</div>
       				<div class="mgl5 mgt10"><img src="__WAP_PUBLIC__/images/qiugouxinxi.png" alt=""></div>
       				<ul class="maoxi">
       					<volist name="ask" id="a">
       						<!-- <li class="mgl20"><span>• 电子产品</span><span class="mgl20">帽子</span></li> -->
       						<li><span>• {$a.cg_name}</span><span class="mgl20">{$a.type_name}</span></li>
						</volist>
       				</ul>
       				<a href="{:U('Asktobuy/index')}"><div class="dianjichakanxiangqing"><button>点击查看详情&nbsp;&gt;</button></a></div>
       			</div>
       		
       	</div>
    </div>
    
   
        <!-- <div class="shopping_banner">
            <a href="">
                <img src="__WAP_PUBLIC__/images/shopping_banner.png" alt="">
            </a>
        </div> -->
       
        <div class="shopping_one_new wh1200auto clearfix">
			<div class="lump">
				<h3 class="lump_title">今日推荐 <!-- <a class="" href="">更多</a> --></h3>
				<ul class="goods_list clearfix">
					<volist name="recgoods" id="g">
				 
					<li class="w200 bor_1ddd mgt20  fl">
						<a href="{:U('Goods/index')}">
              <img class="btn-200x200" src="__WAP_PUBLIC__/images/zn (1).jpg" alt="">
						<!-- <img class="btn-200x200" src="__WAP_PUBLIC__/images/{$g.goods_img}" alt=""> -->
						<div class="text pd10">
							<h5 class="col-666 fw600">{$g.goods_name}</h5>
							<p class="mgt10">{$g.goods_introduce}</p>
							<h6 class="mgt10 fw600">￥{$g.goods_price}</h6>
						</div>
              </a>
					</li>
			
					</volist>
					
				</ul>
			</div>	
        </div>
		<div class="shopping_one_new wh1200auto">
			<div class="lump">
				<h3 class="lump_title">{$lastc[0]['gc_name']} <!-- <a class="" href="0102-900库商品页面.html">更多</a> --></h3>
				<ul class="goods_list clearfix">
					<volist name="goodsfirst" id="gf">
					<li class="w200 bor_1ddd mgt20  fl">
            <a href="{:U('Goods/index')}">
				<!-- 		<img class="btn-200x200" src="__WAP_PUBLIC__/images/{$gf.goods_img}" alt=""> -->
						<img class="btn-200x200" src="__WAP_PUBLIC__/images/zn (1).jpg" alt="">
						<div class="text pd10">
							<h5 class="col-666 fw600">{$gf.goods_name}</h5>
							<p class="mgt10">{$gf.goods_introduce}</p>
							<h6 class="mgt10 fw600">￥{$gf.goods_price}</h6>
						</div>
          </a>
					</li>
					</volist>
				</ul>
			</div>	
        </div>
        <div class="shopping_one_new wh1200auto">
			<div class="lump">
				<h3 class="lump_title">{$lastc[1]['gc_name']} <!-- <a class="" href="">更多</a> --></h3>
				<ul class="goods_list clearfix">
					<volist name="goodstwo" id="gt">
					<li class="w200 bor_1ddd mgt20  fl">
            <a href="{:U('Goods/index')}">
<!-- 						<img class="btn-200x200" src="__WAP_PUBLIC__/images/{$gt.goods_img}" alt=""> -->
						<img class="btn-200x200" src="__WAP_PUBLIC__/images/zn (1).jpg" alt="">
						<div class="text pd10">
							<h5 class="col-666 fw600">{$gt.goods_name}</h5>
							<p class="mgt10">{$gt.goods_introduce}</p>
							<h6 class="mgt10 fw600">￥{$gt.goods_price}</h6>
						</div>
          </a>
					</li>
					</volist>
				</ul>
			</div>
			
        </div>

        
    </div>
    <div class="index_end index_list_end">
        <ul>
            <li>
                <span>新手指南</span>
                <a href="">了解900库</a>
                <a href="">登录900库</a>
                <a href="">供应商入门</a>
                <a href="">采购商入门</a>
            </li>
            <li>
                <span>供应商服务</span>
                <a href="">商家服务</a>
            </li>
            <li>
                <span>采购商服务</span>
                <a href="">找供应商</a>
                <a href="">采购平台</a>
            </li>
            <li>
                <span>900库服务</span>
                <a href="">在线客服</a>
                <a href="">帮助中心</a>
                <a href="">联系我们</a>
                <a href="">手机APP下载</a>
            </li>
            <li>
                <span>交易安全</span>
                <a href="">买卖防骗</a>
                <a href="">投诉举报</a>
            </li>
            <li>
                <span>关注900库公众号</span>
                <img src="__WAP_PUBLIC__/images/index_end_tbc.png" alt="">
            </li>
        </ul>
    </div>
	<footer>
        <div>
            <span>
                <a href="">关于900库</a>
                <a href="">帮助中心</a>
                <a href="">开放平台</a>
                <a href="">诚招英才</a>
                <a href="">联系我们</a>
                <a href="">网站合作</a>
                <a href="">法律声明</a>
            </span>
        </div>
    	<div class="literary"><span>© 2003-2016 9co.COM 版权所有</span></div>
    </footer>
</body>
<script type="text/javascript" src="__WAP_PUBLIC__/js/jquery.min.js"></script>
<script type="text/javascript" src="__WAP_PUBLIC__/js/swiper.min.js"></script>
<script type="text/javascript" src="__WAP_PUBLIC__/js/js.js"></script>
<script>
    var swiper = new Swiper('.swiper-container', {
        pagination: '.swiper-pagination',
        slidesPerView: 3,
        slidesPerColumn: 1,
        paginationClickable: true,
        spaceBetween: 30,
        autoplay:3000
    });
</script>
</html>