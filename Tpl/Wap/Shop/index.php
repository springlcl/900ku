<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="wap-font-scale" content="no">
	<title>展厅首页</title>
    <link rel="stylesheet" href="__WAP_PUBLIC__/2/css/exhibition_hall_style.css">
	<link rel="stylesheet" href="__WAP_PUBLIC__/2/css/icons.css">
	<link rel="stylesheet" href="__WAP_PUBLIC__/2/css/reset.css">
	<link rel="stylesheet" href="__WAP_PUBLIC__/2/css/style.css">
</head>
<body>
	<header class="exhibition_hall_details_head">
        <div class="head_top">
            <div class="nav">
                <div class="left">
                    <a href="../900Ku前台首页PC端/0101-900库首页.html"><i class="ico_all I_home mgr5"></i>900库首页</a>
                    <a href="#" id="dl" style="position:relative;z-index:8">请登录</a>
                </div>
                <div class="right">
                    <span>
                        购物车<a>0</a>件
                    </span>
                    <span>
                       我的账户 ∨
                       <ul>
                           <li><a href="">我的订单</a></li>
                           <li><a href="">个人设置</a></li>
                           <li><a href="">修改密码</a></li>
                       </ul>
                    </span>
                    <span>
                       微信版 ∨
                       <ul>
                           <img src="__WAP_PUBLIC__/2/images/index_end_tbc.png" alt="">
                       </ul>
                    </span>
                    <span>
                       900库APP ∨
                       <ul>
                           <img src="__WAP_PUBLIC__/2/images/index_end_tbc.png" alt="">
                       </ul>
                    </span>
                    <span>
                       卖家中心
                    </span>
                </div>
            </div>
        </div>
        <div class="head_con">
            <div class="con_left">
                <img src="__WAP_PUBLIC__/2/images/company_logo.png" alt="">
                <div class="list">
                    <h2 class="fw600">{$ex.ex_name}</h2>
                 	<h5 class="mgt10">三个月交易笔数：<b class="col-red">暂无数据</b>笔 <span class="mgl10">最近</span></h5>
                    <h5 class="mgt10">三个月成交额：<b class="col-red">暂无数据</b>元</h5>
                </div>
            </div>
            <div class="search">
                <div class="ss">
                    <input type="search" name="user_search" placeholder="  搜索关键词">
                    <div class="but onselectstart" onselectstart="return false;">
                        搜索
                    </div>
                </div>
            </div>
            <div class="scan fl">
            	<div class="img fl mgr10">
            		<img src="__WAP_PUBLIC__/2/images/index_end_tbc.png" alt="">
            	</div>
            	<div class="fl">
            		<h6 class="mgt10">打开微信扫一扫</h6>
            		<button class="btn-150x40 bg-slv bor-r5 fs-16 col-fff mgt10">准入管理商</button>
            	</div>
            </div>
        </div>
    </header>
	<div class="wh1200auto">
	    <div class="generalize clearfix">
	        <div class="fl info">
	        	<dl class="bor_1ddd pd15">
	        		<dd>主营项目：{$ex.mc_name}</dd>
	        		<dd>经营模式：{$ex.model_name}</dd>
	        		<dd>所在地区：{$ex.province}{$ex.city}{$ex.area}</dd>
	        		<dd>创建时间:  {$ex.add_time}</dd>
	        		<dd>累计销售：暂无数据</dd>
	        	</dl>
	        	<dl class="bor_1ddd pd15 mgt15">
	        		<dd>
	        			<span class="wh60">描述相符</span>
						<ul class="xingxing">
							<li></li>
							<li></li>
							<li></li>
							<li></li>
							<li></li>
							<li></li>
							<li></li>
							<li></li>
							<li class="active"></li>
							<li></li>
						</ul>
	        		</dd>
	        		<dd>
	        			<span class="wh60">满意度</span>
						<ul class="xingxing">
							<li></li>
							<li></li>
							<li></li>
							<li></li>
							<li></li>
							<li></li>
							<li></li>
							<li></li>
							<li class="active"></li>
							<li></li>
						</ul>
	        		</dd>
	        		<dd>
	        			<span class="wh60">发货及时</span>
						<ul class="xingxing">
							<li></li>
							<li></li>
							<li></li>
							<li></li>
							<li></li>
							<li></li>
							<li></li>
							<li></li>
							<li></li>
							<li class="active"></li>
						</ul>
	        		</dd>
	        	</dl>
	        	<dl class="bor_1ddd pd15 mgt15">
	        		<dd><span>商品数: <i class="col-red">90</i></span><span class="mgl20">浏览次数：<i class="col-red">49099</i></span></dd>
	        		<dd>已被23家采购商纳为合格供应商</dd>
	        		<dd>卖家已缴纳店铺保证金</dd>
	        	</dl>
	        </div>
			<!-- 轮播 -->
	        <div class="fl slides mgl30">
		        <div class="slideInner">
		            <a href="#" style="background: url(__WAP_PUBLIC__/2/images/slide1.png) no-repeat center top;width: 888px;"></a>
		            <a href="#" style="background: url(__WAP_PUBLIC__/2/images/slide2.png) no-repeat  center top"></a>
		            <a href="#" class="slide3" style="background: url(__WAP_PUBLIC__/2/images/slide3.png) no-repeat  center top;"></a>
		            <a href="#" class="slide3" style="background: url(__WAP_PUBLIC__/2/images/slide1.png) no-repeat  center top;"></a>
		        </div>
		        <div class="slides_click">
		            <a class="prev" href="javascript:;"></a>
		            <a class="next" href="javascript:;"></a>
		        </div>
	        </div>
			<!-- 轮播 end-->
	    </div>
	    <div class="class-and-syno pdh20">
	    	<span class="fs-16 fw600 col-lan">商品分类</span>
	    	<span class="mgl20 fs-16 fw600">公司简介</span>
	    </div>
	    <div class="con_box">
	    	<div class="lump class_box clearfix">
	    		<div class="left fl">
	    			<ul class="list">
	    				<volist name="cate" id="c">
	    				<!-- <li class="active">全部</li> -->
	    				<a href="{:U('Shop/search_cate',array('excid'=>$c['excid']))}"><li>{$c.excname}</li></a>
						</volist>
	    			</ul>
	    			<ul class="list mgt20 fs-16 pdb30">
	    				<li class="active">联系我们</li>
	    				<div class="center mgt20">
	    					<span class="ico_all I_lx_ld mgb15"></span>
	    					<h6>吴桂霞  总经理</h6>
	    				</div>
	    				<div class="center mgt20">
	    					<span class="ico_all I_lx_sj mgb15"></span>
	    					<h6>12345678901</h6>
	    				</div>
	    				<div class="center mgt20">
	    					<span class="ico_all I_lx_dz mgb15"></span>
	    					<h6>中国北京海淀区西四环</h6>
	    				</div>
	    			</ul>
	    		</div>
	    		<div class="right fl mgl30">
	    			<ul class="commodity_list clearfix">
	    				<volist name="data" id="d">
	    			<a href="{:U('Goods/index')}">
	    				<li>
	    					<!-- <img src="__WAP_PUBLIC__/2/images/{$d.goods_img}" alt=""> -->
	    					<img src="__WAP_PUBLIC__/2/images/tianjia.png" alt="">
	    					<div class="text pd15">
	    						<p>{$d.goods_name}</p>
	    						<span class="fw600 fs-14">￥{$d.goods_price}</span>
	    					</div>
	    				</li>
	    			</a>
	    				</volist>
	    			</ul>

<!-- 					<div class="clearfix">
						<ul class="pagination clearfix pages">
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
	    		</div>
				    		<div style="position:relative; left:0px;">
			                <ul class="pagination pages">
			                  {$page}  
			                </ul>
			               </div>
	    	</div>
	    	<div class="lump syno_box bor_1ddd pd30 bg-fb">
	    		<h3 class="fs-18 mgb35 pdb30">{$ex.company} </h3>
	    		<p class="text-indent">公司成立于1998年，注册资金100万，是广东中山一家专业从事玻璃制品设计加工的企业。产品设计理念源于意大利经典原创家居产品，自上个世纪90年代以来，产品收到世界各国的喜爱，如英国，西班牙，法国，德国，美国，迪拜和巴西，韩国等30多个国家和地区。经过我们不断改善的优良品质，优雅的风格和出色的搭配效果在海外获得了供不应求的大好市场，赢得了大批国外家居饰品进口商的青睐和首肯。  </p>
	    		<img src="__WAP_PUBLIC__/2/images/jianzhu.png" class="mgauto" alt="">
	    		<p>十多年的发展历程，公司始终坚持“创新，品质，服务，节约，敬业，感恩”12字理念。吸收新创意，严把质量关口，全方位的服务跟踪，坚持做出高品质产品。本着“追求、员工、技术、精神、利益”10字宗旨。现拥有一批精干的管理人员和一支高素质的专业技术队伍，舒适优雅的办公环境和拥有60多亩的全新现代化标准厂房。我们以质量为生命、时间为信誉、价格为竞争力的经营信念，立足于珠江三角洲。 </p>
	    	</div>
	    </div>
	</div>
	<div style="border-top: 2px solid #ddd;margin-top: 20px;">
	    <div class="index_end exhibition_list_end">
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
	                <img src="__WAP_PUBLIC__/2/images/index_end_tbc.png" alt="">
	            </li>
	        </ul>
	    </div>
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
<script type="text/javascript" src="__WAP_PUBLIC__/2/js/jquery.min.js"></script>
<script type="text/javascript" src="__WAP_PUBLIC__/2/js/js.js"></script>
</html>
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