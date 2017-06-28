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
    <link rel="stylesheet" href="__HOME_PUBLIC__/css/exhibition_hall_style.css">
	<link rel="stylesheet" href="__HOME_PUBLIC__/css/swiper.min.css">
	<link rel="stylesheet" href="__HOME_PUBLIC__/css/icons.css">
	<link rel="stylesheet" href="__HOME_PUBLIC__/css/reset.css">
	<link rel="stylesheet" href="__HOME_PUBLIC__/css/style.css">
  <style>
  .swiper-container {
        width: 820px;
        height: 480px;
    }
</style>
</head>
<body>
<include file="Public/Header" />
	<div class="he_zhongjian ">
       	<div class="he_content clearfix">
       			<ul class="dianzichanpin fl">
       				<volist name="arr" id="a">
       				<!-- <li class="col-slv">• 电子产品</li> -->
       				<a href="{:U('Goods/goods',array('cid'=>$a['gcid']))}"><li>• {$a.gc_name}
              <div class="zi_box">
                  <dl>
                    <volist name="a['son']" id="r">
                    <a href="{:U('Goods/goods',array('cid'=>$r['gcid']))}"><dd>{$r['gc_name']}</dd></a>
                    </volist>
                  </dl>
                </div>

              </li></a>
					</volist>
       			</ul>

       			<div class="he-tupian">

       				<div class="swiper-container">
                <div class="swiper-wrapper">
                <volist name="ninepic" id="vo">
                  <div class="swiper-slide"><img src="__UPLOADS__/image/vert/{$vo.thumb}" alt=""></div>
                  </volist>
                </div>
                <div class="swiper-pagination"></div>
              </div>

       			</div>
       			<div class="he_zhangxiansheng fl">
<!--        				<a href="{:U('Cg/index')}">
       				<div class="zuishangmian clearfix">
       					<div class="left fl">
       						<img src="__HOME_PUBLIC__/images/52x52.png" alt="">
       					</div>
       					<div class="right fl">
       						<p class="mgl10 mgt5">打开手机微信</p>
       						<p class="mgl10">扫描二维码登录</p>
       					</div>
       				</div>
       				</a> -->
       				<div class="dierge clearfix">
       						<div class="left fl"><img src="__HOME_PUBLIC__/images/xiaofangzi.png" alt=""></div>
       						<div class="right fl">{$exnum}个展厅</div>
       				</div>
       				<div class="disange clearfix">
       						<div class="left fl"><img src="__HOME_PUBLIC__/images/xiaoqiche.png" alt=""></div>
       						<div class="right fl">{$asknum}个求购信息</div>
       				</div>
       				<div class="mgl5 mgt10"><img src="__HOME_PUBLIC__/images/qiugouxinxi.png" alt=""></div>
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
                <img src="__HOME_PUBLIC__/images/shopping_banner.png" alt="">
            </a>
        </div> -->
       
        <div class="shopping_one_new wh1200auto clearfix">
			<div class="lump">
				<h3 class="lump_title">今日推荐 <!-- <a class="" href="">更多</a> --></h3>
				<ul class="goods_list clearfix">
					<volist name="recgoods" id="g">
				 
					<li class="w200 bor_1ddd mgt20  fl" style="width:200px;height:250px;">
						<a href="{:U('Goods/index',array('id'=>$g['goods_id']))}">
              <img class="btn-200x200" src="__UPLOADS__/{$g.goods_thumb}" alt="">
						<!-- <img class="btn-200x200" src="__HOME_PUBLIC__/images/{$g.goods_img}" alt=""> -->
						<div class="text pd10">
							<h5 class="col-666 fw600">{$g.goods_name}</h5>
							<p class="mgt10">{$g.rec_remark}</p>
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
					<li class="w200 bor_1ddd mgt20  fl" style="width:200px;height:250px;">
            <a href="{:U('Goods/index',array('id'=>$gf['goods_id']))}">
				<!-- 		<img class="btn-200x200" src="__HOME_PUBLIC__/images/{$gf.goods_img}" alt=""> -->
						<img class="btn-200x200" src="__UPLOADS__/{$gf.goods_thumb}" alt="">
						<div class="text pd10">
							<h5 class="col-666 fw600">{$gf.goods_name}</h5>
							<p class="mgt10">{$gf.rec_remark}</p>
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
					<li class="w200 bor_1ddd mgt20  fl" style="width:200px;height:250px;">
            <a href="{:U('Goods/index',array('id'=>$gt['goods_id']))}">
<!-- 						<img class="btn-200x200" src="__HOME_PUBLIC__/images/{$gt.goods_img}" alt=""> -->
						<img class="btn-200x200" src="__UPLOADS__/{$gt.goods_thumb}" alt="">
						<div class="text pd10">
							<h5 class="col-666 fw600">{$gt.goods_name}</h5>
							<p class="mgt10">{$gt.rec_remark}</p>
							<h6 class="mgt10 fw600">￥{$gt.goods_price}</h6>
						</div>
          </a>
					</li>
					</volist>
				</ul>
			</div>
			
        </div>

        
    </div>
   <include file="Public/Foot" />
</body>
<script type="text/javascript" src="__HOME_PUBLIC__/js/jquery.min.js"></script>
<script type="text/javascript" src="__HOME_PUBLIC__/js/swiper.min.js"></script>
<script type="text/javascript" src="__HOME_PUBLIC__/js/js.js"></script>
<script>
    var swiper = new Swiper('.swiper-container', {
        pagination: '.swiper-pagination',
        slidesPerView: 1,
        slidesPerColumn: 1,
        paginationClickable: true,
        spaceBetween: 30,
        autoplay:3000
    });
</script>
</html>
