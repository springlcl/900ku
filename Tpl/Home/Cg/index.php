<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="wap-font-scale" content="no">
	<title>采购商前台首页</title>
    <link rel="stylesheet" href="__HOME_PUBLIC__/cg/css/exhibition_hall_style.css">
	<link rel="stylesheet" href="__HOME_PUBLIC__/cg/css/swiper.min.css">
	<link rel="stylesheet" href="__HOME_PUBLIC__/cg/css/icons.css">
	<link rel="stylesheet" href="__HOME_PUBLIC__/cg/css/reset.css">
	<link rel="stylesheet" href="__HOME_PUBLIC__/cg/css/style.css">
    <style>
        .shopping_list_nav .shopping_nav .shopping_nav_quan .shopping_fenlei ul li{cursor: pointer;
    font-size: 14px;
    text-align: center;
    width: 100%;
}
        .shopping_list_nav .shopping_nav .shopping_nav_quan .shopping_fenlei ul li a{padding-right: 0;font-size: 16px;
            float: none;width: auto;color: #fff;background: transparent;border:0;padding-left: 0px;margin-top: 0px;height: auto;}
    </style>
</head>
<body>
    <div class="mask"></div>
    <header class="shopping_index_head">
        <div class="shopping_head_top">
            <div class="shopping_nav">
                <div class="shopping_left">
                    <a href="{:U('Home/index')}"><span>Hi，欢迎来900库</span></a>
                </div>
                <div class="shopping_right">
                    <a href="{:U('Order/purchase_list')}"><span >采购清单<a>{$cnum}</a>件</span></a>
                    <span id="in">
                       我的账户 >

                      <!--  <div id="out" style="display:none"> -->
                        <a href="{:U('Login/quit')}"><span id="out" style="display:none">退出登录</span></a>
                      <!--  </div> -->
                    </span>
                    <span>
                       微信版
                    </span>
                    <span>
                       900库APP
                    </span>
                    <!-- <span><a style="color:#A998BA" href="../backstage_page/admit_management.html">管理后台</a>
                       
                    </span> -->
                </div>
            </div>
        </div>
        <a id="db"></a>
        <div class="shopping_head_con">
            <div class="shopping_logo">
                <div><img style="width:60px;height:60px;" src="__UPLOADS__/purchaser/headimg/<?=session('cg_headimg');?>" alt=""></div>
                <div class="shopping_title"><a href="{:U('Cg/index',array('itemid'=>$itid))}">{$itname}</a>
                    <ul>
                        <li>请选择要切换的项目</li>
                        <volist name="items" id="item">
                       <li onclick="window.location.href='{:U('Cg/index',array('itemid'=>$item['pid']))}'">{$item.pro_name}</li>
            			</volist>
                    </ul>
                </div>
                <div class="shopping_xiala"><img src="__HOME_PUBLIC__/cg/images/shopping_xiala.png" alt=""></div>
            </div>
            <div class="shopping_search">
                <form action="{:U('Cg/admit')}" method="post">
                <div class="shopping_ss">
                    <input type="search" name="user_search" placeholder="商品名称/编号" style='-webkit-appearance:none;height:33px;'>
                    <div class="shopping_but onselectstart" onselectstart="return false;">
                        <button style="font-size:20px;">搜索</button>
                    </div>
                </div>
            </form>
            </div>
			
           <!--  <a href="0305购物车详情01.html">
                <div class="shopping_add_shopping_cart"></div>
                <div class="shopping_add_shopping_cart">采购清单</div>
            </a> -->
        </div>
    </header>

    <div class="shopping_list_nav">
        <div class="shopping_nav">
            <span href="" class="shopping_nav_quan">平台商品分类
                <div class="shopping_fenlei">
                    <ul style="position:relative">
                        <li style="height:20px;line-height:20px;color:#00A199;font-size: 16px;">准入商品分类
                        </li>
                        <volist name="group" id="g">
                        <li class="fname" fid="{$g.fid}" pid="{$g.pid}"><a href="{:U('Cg/admit',array('fid'=>$g['fid']))}">{$g.fname}</a></li>
                        </volist>
                        <li  class="go_index">
                            <a href="{:U('Home/index')}" >去900库首页</a>
                        </li>
                    </ul>
                </div>
            </span>
            <a class="style" href="{:U('Cg/index')}">首页</a>
            <a href="{:U('Cg/admit',array('pid'=>$itid))}">供应商列表</a>
            <a href="{:U('Cg/cg_admit_order',array('pid'=>$itname['pid']))}">订单</a>
            <a href="{:U('Cg/finance')}">财务统计</a>
            <a href="{:U('Cg/news')}">消息</a>
            <!-- <div class="shopping_list_nav_right">
                <div><img src="__HOME_PUBLIC__/cg/images/shopping_self.jpg" alt=""></div>
                <div>账号：1865265222</div>
                <div class="shopping_changeTu"></div>
                <div class="shopping_hidden_left">
                    <ul>
                        <li>切换项目</li>
                        <li>项目设置</li>
                        <li>公司设置</li>
                        <li>账号设置</li>
                        <li>退出登陆</li>
                    </ul>
                </div>
            </div> -->
        </div>
    </div>
    <div style="overflow:hidden" class="shopping_banner0">
        <!-- <div class="shopping_banner">
            <a href="">
                <img src="__HOME_PUBLIC__/cg/images/shopping_banner.png" alt="">
            </a>
        </div> -->
        <div class="shopping_one_goods mgt20">
            <a id="cg"></a>
            
            <div class="shopping_one_goods_title">
                <span class="shopping_one_goods_title_big">常购商品</span>
                <!-- <a href="" class="fs-18 col-999">更多</a> -->
            </div>
		    <div class="changgou_goods">
			    <!-- Swiper -->
			    <div class="swiper-container">
			        <div class="swiper-wrapper">
			       <if condition=" $goods[0]">
			            <div class="swiper-slide">
		            		 <a href="{:U('Cg/cg_goods',array('sku_id'=>$goods[0]['sku_id']))}"> <img style='width:100%;height:300px;' src="__UPLOADS__/{$goods[0]['goods_thumb']}" alt=""></a>
							<div class="pd25">
								<h5 class="col-666 fw600">{$goods[0]['goods_name']}</h5>
								<p class="mgt10">{$goods[0]['rec_remark']}</p>
								<h6 class="mgt10 fw600">￥{$goods[0]['goods_price']}</h6>
							</div>
			            </div>
                        <else  />
                        <div class="swiper-slide">
                             <a href="{:U('Cg/cg_goods',array('sku_id'=>$goods[0]['sku_id']))}"> <img style='width:100%;height:300px;' src="__UPLOADS__/{$goods[0]['goods_thumb']}" alt=""></a>
                            <div class="pd25">
                                <h5 class="col-666 fw600"></h5>
                                <p class="mgt10"></p>
                                <h6 class="mgt10 fw600"></h6>
                            </div>
                        </div>
                        
                        

			      </if>
                  <if condition=" $goods[1]">
			            <div class="swiper-slide">
		            		<a href="{:U('Cg/cg_goods',array('sku_id'=>$goods[1]['sku_id']))}"> <img style='width:100%;height:300px;' src="__UPLOADS__/{$goods[1]['goods_thumb']}" alt=""></a>
							<div class="pd25">
								<h5 class="col-666 fw600">{$goods[1]['goods_name']}</h5>
								<p class="mgt10">{$goods[1]['rec_remark']}</p>
								<h6 class="mgt10 fw600">￥{$goods[1]['goods_price']}</h6>
							</div>
			            </div>
                        <else />
                        <div class="swiper-slide">
                             <a href="{:U('Cg/cg_goods',array('sku_id'=>$goods[0]['sku_id']))}"> <img style='width:100%;height:300px;' src="__UPLOADS__/{$goods[0]['goods_thumb']}" alt=""></a>
                            <div class="pd25">
                                <h5 class="col-666 fw600"></h5>
                                <p class="mgt10"></p>
                                <h6 class="mgt10 fw600"></h6>
                            </div>
                        </div>
                    </if>
                  <if condition=" $goods[2]">
			            <div class="swiper-slide">
		            		<a href="{:U('Cg/cg_goods',array('sku_id'=>$goods[2]['sku_id']))}"> <img style='width:100%;height:300px;' src="__UPLOADS__/{$goods[2]['goods_thumb']}" alt=""></a>
							<div class="pd25">
								<h5 class="col-666 fw600">{$goods[2]['goods_name']}</h5>
								<p class="mgt10">{$goods[2]['rec_remark']}</p>
								<h6 class="mgt10 fw600">￥{$goods[2]['goods_price']}</h6>
							</div>
			            </div>
                        <else />
                        <div class="swiper-slide">
                             <a href="{:U('Cg/cg_goods',array('sku_id'=>$goods[0]['sku_id']))}"> <img style='width:100%;height:300px;' src="__UPLOADS__/{$goods[0]['goods_thumb']}" alt=""></a>
                            <div class="pd25">
                                <h5 class="col-666 fw600"></h5>
                                <p class="mgt10"></p>
                                <h6 class="mgt10 fw600"></h6>
                            </div>
                        </div>
                    </if>
                  <if condition=" $goods[3]">
			            <div class="swiper-slide">
		            		<a href="{:U('Cg/cg_goods',array('sku_id'=>$goods[3]['sku_id']))}"> <img style='width:100%;height:300px;' src="__UPLOADS__/{$goods[3]['goods_thumb']}" alt=""></a>
							<div class="pd25">
								<h5 class="col-666 fw600">{$goods[3]['goods_name']}</h5>
								<p class="mgt10">{$goods[3]['rec_remark']}</p>
								<h6 class="mgt10 fw600">￥{$goods[3]['goods_price']}</h6>
							</div>
			            </div>
                        <else />
                        <div class="swiper-slide">
                             <a href="{:U('Cg/cg_goods',array('sku_id'=>$goods[0]['sku_id']))}"> <img style='width:100%;height:300px;' src="__UPLOADS__/{$goods[0]['goods_thumb']}" alt=""></a>
                            <div class="pd25">
                                <h5 class="col-666 fw600"></h5>
                                <p class="mgt10"></p>
                                <h6 class="mgt10 fw600"></h6>
                            </div>
                        </div>
                     </if>
                  <if condition=" $goods[4]">   
			            <div class="swiper-slide">
		            		<a href="{:U('Cg/cg_goods',array('sku_id'=>$goods[4]['sku_id']))}">  <img style='width:100%;height:300px;' src="__UPLOADS__/{$goods[4]['goods_thumb']}" alt=""></a>
							<div class="pd25">
								<h5 class="col-666 fw600">{$goods[4]['goods_name']}</h5>
								<p class="mgt10">{$goods[4]['rec_remark']}</p>
								<h6 class="mgt10 fw600">￥{$goods[4]['goods_price']}</h6>
							</div>
			            </div>
                    </if>
                  <if condition=" $goods[0]">
			            <div class="swiper-slide">
		            		<a href="{:U('Cg/cg_goods',array('sku_id'=>$goods[0]['sku_id']))}"> <img style='width:100%;height:300px;' src="__UPLOADS__/{$goods[0]['goods_thumb']}" alt=""></a>
							<div class="pd25">
								<h5 class="col-666 fw600">{$goods[0]['goods_name']}</h5>
								<p class="mgt10">{$goods[0]['rec_remark']}</p>
								<h6 class="mgt10 fw600">￥{$goods[0]['goods_price']}</h6>
							</div>
			            </div>
                    </if>
                  <if condition=" $goods[1]">
			            <div class="swiper-slide">
		            		<a href="{:U('Cg/cg_goods',array('sku_id'=>$goods[1]['sku_id']))}"> <img style='width:100%;height:300px;' src="__UPLOADS__/{$goods[1]['goods_thumb']}" alt=""></a>
							<div class="pd25">
								<h5 class="col-666 fw600">{$goods[1]['goods_name']}</h5>
								<p class="mgt10">{$goods[1]['rec_remark']}</p>
								<h6 class="mgt10 fw600">￥{$goods[1]['goods_price']}</h6>
							</div>
			            </div>
                    </if>
			        </div>
			        <!-- Add Pagination -->
			        <div class="swiper-pagination"></div>
			    </div>
		    </div>
        </div>


        <div class="shopping_one_new wh1200auto">
			<div class="lump">
				<h3 class="lump_title">{$yesex[0]['ex_name']} <!-- <a class="" href="0401-商品.html">更多</a> --></h3>
				<ul class="goods_list clearfix">
					<volist name="yesgoods_one" id="one">
				
					<li class="w200 bor_1ddd mgt20  fl" style="width:200px;height:250px;">
						<a href="{:U('Cg/cg_goods',array('sku_id'=>$one['sku_id']))}">
						<img class="btn-200x200" src="__UPLOADS__/{$one.goods_thumb}" alt="">
						<!-- <img class="btn-200x200" src="__HOME_PUBLIC__/cg/images/zn (1).jpg" alt=""> -->
						<div class="text pd10">
							<h5 class="col-666 fw600">{$one.goods_name}</h5>
							<p class="mgt10">{$one.rec_remark}</p>
							<h6 class="mgt10 fw600">￥{$one.goods_price}</h6>
						</div>
						</a>
					</li>
				
				</volist>
				</ul>
			</div>
			<div class="lump">
				<h3 class="lump_title">{$yesex[1]['ex_name']} <!-- <a class="" href="">更多</a> --></h3>
				<ul class="goods_list clearfix">
					<volist name="yesgoods_two" id="two">
				
					<li class="w200 bor_1ddd mgt20  fl" style="width:200px;height:250px;">
						<a href="{:U('Cg/cg_goods',array('sku_id'=>$two['sku_id']))}">
						<img class="btn-200x200" src="__UPLOADS__/{$two.goods_thumb}" alt="">
						<!-- <img class="btn-200x200" src="__HOME_PUBLIC__/cg/images/zn (1).jpg" alt=""> -->
						<div class="text pd10">
							<h5 class="col-666 fw600">{$two.goods_name}</h5>
							<p class="mgt10">{$two.rec_remark}</p>
							<h6 class="mgt10 fw600">￥{$two.goods_price}</h6>
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
<script type="text/javascript" src="__HOME_PUBLIC__/cg/js/jquery.min.js"></script>
<script type="text/javascript" src="__HOME_PUBLIC__/cg/js/swiper.min.js"></script>
<script type="text/javascript" src="__HOME_PUBLIC__/cg/js/js.js"></script>
<script>
    var swiper = new Swiper('.swiper-container', {
        pagination: '.swiper-pagination',
        slidesPerView: 3,
        slidesPerColumn: 1,
        paginationClickable: true,
        spaceBetween: 30,
        autoplay:3000
    });

    $('.fname').bind('click',function(){
        var fid=$(this).attr('fid');
        var pid=$(this).attr('pid');
        location.href="{:U('Cg/admit',array('pid'=>pid,'fid'=>fid))}";
    })

    $("#in").bind('click',function(){
        $("#out").toggle();
    })
</script>
</html>