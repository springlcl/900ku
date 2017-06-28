<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="wap-font-scale" content="no">
	<title>求购中心</title>
    <link rel="stylesheet" href="__WAP_PUBLIC__/css/exhibition_hall_style.css">
	<link rel="stylesheet" href="__WAP_PUBLIC__/css/swiper.min.css">
	<link rel="stylesheet" href="__WAP_PUBLIC__/css/icons.css">
	<link rel="stylesheet" href="__WAP_PUBLIC__/css/reset.css">
	<link rel="stylesheet" href="__WAP_PUBLIC__/css/style.css">
</head>
<body>
<include file="Public/Header" />

        <div class="buy_center0">
            <div class="buy_center">
                <div class="buy_center1">
                    <ul>
                        <li>
                            <div class="my_fl">所在地区</div>
                            <div class="vip_power_left-triangle-right1 my_ml10 my_fl"></div>
                        </li>
                        <li>
                            <div class="my_fl">发布时间</div>
                            <div class="vip_power_left-triangle-right2 my_ml10 my_fl"></div>
                        </li>
<!--                         <li>
                            <div class="my_fl">截止时间</div>
                            <div class="vip_power_left-triangle-right3 my_ml10 my_fl"></div>
                        </li> -->
                        <li>
                            <div class="my_fl">分类</div>
                            <div class="vip_power_left-triangle-right4 my_ml10 my_fl"></div>
                        </li>
                        
                    </ul>
                </div>
                <div class="buy_center2">
                <!-- 第一个开始 -->
                <volist name="alldata" id="d">
                    <div class="buy_center2_1">
                        <div class="buy_center2_1_1">
                            <div class="buy_center_title">
                                {$d.cg_name}
                            </div>
                        </div>
                        <div class="buy_center2_1_2">
                            <div class="buy_center2_1_2_1">
                                <ul>
                                    <li>采购数量：<a class="my_buy_display">{$d.cg_num}</a></li>
                                    <li>发布时间：<a class="my_buy_display"><?=date('Y-m-d',$d['cg_add_time'])?></a></li>
                                    <li>联系电话：<a class="my_buy_display">{$d.cg_phone}</a></li>
                                   <!--  <li>剩余时间：<a class="my_buy_display">0</a>天</li> -->
                                    <li>公司名称：<a class="my_buy_display">{$d.cg_company}</a></li>
                                </ul>
                            </div>
                            <div class="buy_center2_1_2_2">
                                <a href="price.html">立即报价</a>
                            </div>
                        </div>
                    </div>
                </volist>
                <!-- 第一个结束 -->

                </div>
            </div>            
        </div>
               <div style="position:relative; left:-700px;">
                <ul class="pagination pages">
                  {$page}  
                </ul>
               </div>
<!-- <div class="con_bottom12">
                   <span>上一页</span>
                   <span>1</span>
                   <span>2</span>
                   <span>3</span>
                   <span>4</span>
                   <span>下一页</span>
               </div> -->


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