<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="wap-font-scale" content="no">
	<title>企业展厅</title>
    <link rel="stylesheet" href="__WAP_PUBLIC__/css/exhibition_hall_style.css">
	<link rel="stylesheet" href="__WAP_PUBLIC__/css/swiper.min.css">
	<link rel="stylesheet" href="__WAP_PUBLIC__/css/icons.css">
	<link rel="stylesheet" href="__WAP_PUBLIC__/css/reset.css">
	<link rel="stylesheet" href="__WAP_PUBLIC__/css/style.css">
</head>
<body>
<include file="public/Header" />

    <div class="exhibition_list_con">
        <div class="home">
            <!-- <span>展厅首页</span>
            <span>展厅筛选共<a>3421</a>个</span> -->
        </div>
        <div class="con">
            <div class="home_list">
                <div>
                    <h2>店铺类目</h2>
                    <volist name="allcate" id="c">
                    <a href="{:U('Search/search_cate',array('mcid'=>$c['mcid']))}">{$c.mc_name}</a>

                    </volist>
                    <a href="">更多 ∨</a>

                </div>
               
                <div id="city" >
                    <h2>地区类别</h2>
                    <select  class="prov"> 
                    </select>
                    <select class="city" disabled="disabled">
                    </select>
                    <span>确定</span>
                </div>

                
            </div>
            <div class="exhibition_recommend">
                <h1>优质展厅</h1>
                <volist name="goodex" id="ge">
                <div class="recommend_store">
                    <div class="logo">
                        <img src="__WAP_PUBLIC__/images/{$ge.ex_logo}" alt="">
                    </div>
                    <div class="recommend_right">
                        <h4>{$ge.ex_name}</h4>
                        <span>电话：<a>{$ge.tel}</a></span>
                        <span>地址：<a>{$ge.province}{$ge.city}{$ge.area}</a></span>
                    </div>
                </div>
                </volist>
            </div>
            <div class="the_default">
               <div class="top">
                   <ul id="top_ul">
                       <a href="{:U('Search/index')}"><li id="start" class="color_style">默认</li></a>
                       <a href="{:U('Search/order_uv')}"><li id="uv">人气</li></a>
                   </ul>
                   <!-- <div class="top_right">
                       <span>1/16</span>
                       <a>＜</a>
                       <a>＞</a>
                   </div> -->
               </div>
               <div style="display:block" class="the_default_con the_default_con_mr">
                <volist name="exdata" id="ex">
                    <div class="default_con default_con1">
                       <div class="con_left">
                            <h2><a href="{:U('Shop/index',array('exid'=>$ex['exid']))}">{$ex.ex_name}</a></h2>
                            <p></p>
                            <span class="name">主营产品：</span><span class="name_con">{$ex.mc_name}</span>
                            <span class="name">创建时间：</span><span class="name_con">{$ex.add_time}</span>
                            <span class="name">经营模式：</span><span class="name_con">{$ex.model_name}</span>
                            <span class="name">所在地区：</span><span class="name_con">{$ex.province}{$ex.city}{$ex.area}</span>


<!-- 
                            <div class="qualification_hover">
                                <div class="hover_top">
                                    <span>工商注册信息</span>
                                    <img class="xxxxx" src="__WAP_PUBLIC__/images/xxxxx.png" alt="">
                                </div>
                                <div class="hover_con">
                                    <ul>
                                        <li><span>公司名称：<a>张家港市洛贝服饰有限公司</a></span><span>注册地址：<a>中国苏州张家港市凤凰</a></span></li>
                                        <li><span>公司名称：<a>张家港市洛贝服饰有限公司</a></span><span>注册地址：<a>中国苏州张家港市凤凰</a></span></li>
                                        <li><span>公司名称：<a>张家港市洛贝服饰有限公司</a></span><span>注册地址：<a>中国苏州张家港市凤凰</a></span></li>
                                        <li><span>公司名称：<a>张家港市洛贝服饰有限公司</a></span><span>注册地址：<a>中国苏州张家港市凤凰</a></span></li>
                                        <li><span>公司名称：<a>张家港市洛贝服饰有限公司</a></span><span>注册地址：<a>中国苏州张家港市凤凰</a></span></li>
                                    </ul>
                                </div>
                            </div> -->
                       </div>
                       <div class="con_right" id="e_l_carousel">
                            <ul class="d3">
                                <li><a href="0103-900库商品详情.html"><img src="__WAP_PUBLIC__/images/exhibition_list_default_img1.png" alt=""></a><img src="__WAP_PUBLIC__/images/exhibition_list_default_img2.png" alt=""><img src="__WAP_PUBLIC__/images/exhibition_list_default_img3.png" alt=""></li>
                                <li><img src="__WAP_PUBLIC__/images/exhibition_list_default_img2.png" alt=""><img src="__WAP_PUBLIC__/images/exhibition_list_default_img3.png" alt=""><img src="__WAP_PUBLIC__/images/exhibition_list_default_img1.png" alt=""></li>
                                <li><img src="__WAP_PUBLIC__/images/exhibition_list_default_img3.png" alt=""><img src="__WAP_PUBLIC__/images/exhibition_list_default_img1.png" alt=""><img src="__WAP_PUBLIC__/images/exhibition_list_default_img2.png" alt=""></li>
                                <li><img src="__WAP_PUBLIC__/images/exhibition_list_default_img1.png" alt=""><img src="__WAP_PUBLIC__/images/exhibition_list_default_img2.png" alt=""><img src="__WAP_PUBLIC__/images/exhibition_list_default_img3.png" alt=""></li>
                            </ul>
                        </div>
                        <div class="prev"></div>
                        <div class="next"></div>
                   </div>

                   </volist>

               </div>
                
               <div class="the_default_con the_default_con_rq">
                    <div class="default_con default_con_rq default_con_rq1">
                       <div class="con_left">
                            <h2><a href="exhibition_hall_details/exhibition_hall_details.html">张家港市洛贝服饰</a></h2>
                            <span class="name">主营产品：</span><span class="name_con">1</span>
                            <span class="name">经营模式：</span><span class="name_con">1</span>
                            <span class="name">所在地：</span><span class="name_con">1</span>
                            <span class="name">加工方式：</span><span class="name_con">1</span>
                       </div>
                       <div class="con_right" id="e_l_carousel">
                            <ul class="d3">
                                <li><img src="__WAP_PUBLIC__/images/exhibition_list_default_img1.png" alt=""><img src="__WAP_PUBLIC__/images/exhibition_list_default_img2.png" alt=""><img src="__WAP_PUBLIC__/images/exhibition_list_default_img3.png" alt=""></li>
                                <li><img src="__WAP_PUBLIC__/images/exhibition_list_default_img2.png" alt=""><img src="__WAP_PUBLIC__/images/exhibition_list_default_img3.png" alt=""><img src="__WAP_PUBLIC__/images/exhibition_list_default_img1.png" alt=""></li>
                                <li><img src="__WAP_PUBLIC__/images/exhibition_list_default_img3.png" alt=""><img src="__WAP_PUBLIC__/images/exhibition_list_default_img1.png" alt=""><img src="__WAP_PUBLIC__/images/exhibition_list_default_img2.png" alt=""></li>
                                <li><img src="__WAP_PUBLIC__/images/exhibition_list_default_img1.png" alt=""><img src="__WAP_PUBLIC__/images/exhibition_list_default_img2.png" alt=""><img src="__WAP_PUBLIC__/images/exhibition_list_default_img3.png" alt=""></li>
                                
                            </ul>
                        </div>
                        <div class="prev"></div>
                        <div class="next"></div>
                   </div>
                   <div class="default_con default_con_rq default_con_rq2">
                      <div class="con_left">
                            <h2><a href="exhibition_hall_details/exhibition_hall_details.html">张家港市洛贝服饰有限公司</a></h2>
                            <p></p>
                            <span class="name">主营产品：</span><span class="name_con">1</span>
                            <span class="name">经营模式：</span><span class="name_con">1</span>
                            <span class="name">所在地：</span><span class="name_con">1</span>
                            <span class="name">加工方式：</span><span class="name_con">1</span>



                            <div class="qualification_hover">
                                <div class="hover_top">
                                    <span>工商注册信息</span>
                                    <img class="xxxxx" src="__WAP_PUBLIC__/images/xxxxx.png" alt="">
                                </div>
                                <div class="hover_con">
                                    <ul>
                                        <li><span>公司名称：<a>张家港市洛贝服饰有限公司</a></span><span>注册地址：<a>中国苏州张家港市凤凰</a></span></li>
                                        <li><span>公司名称：<a>张家港市洛贝服饰有限公司</a></span><span>注册地址：<a>中国苏州张家港市凤凰</a></span></li>
                                        <li><span>公司名称：<a>张家港市洛贝服饰有限公司</a></span><span>注册地址：<a>中国苏州张家港市凤凰</a></span></li>
                                        <li><span>公司名称：<a>张家港市洛贝服饰有限公司</a></span><span>注册地址：<a>中国苏州张家港市凤凰</a></span></li>
                                        <li><span>公司名称：<a>张家港市洛贝服饰有限公司</a></span><span>注册地址：<a>中国苏州张家港市凤凰</a></span></li>
                                    </ul>
                                </div>
                            </div>
                       </div>
                        <div class="prev"></div>
                        <div class="next"></div>
                   </div>
                   <div class="default_con default_con_rq default_con_rq3">
                       <div class="con_left">
                            <h2><a href="exhibition_hall_details/exhibition_hall_details.html">张家港市洛贝服饰有限公司</a><span class="ck_qualification">查看资质</span></h2>
                            <p>洛贝服饰工厂<img src="__WAP_PUBLIC__/images/red_star.png" alt=""></p>
                            <span class="name">主营产品：</span><span class="name_con">1</span>
                            <span class="name">经营模式：</span><span class="name_con">1</span>
                            <span class="name">所在地：</span><span class="name_con">1</span>
                            <span class="name">加工方式：</span><span class="name_con">1</span>
                       </div>
                       <div class="con_right" id="e_l_carousel">
                            <ul class="d3">
                                <li><img src="__WAP_PUBLIC__/images/exhibition_list_default_img1.png" alt=""><img src="__WAP_PUBLIC__/images/exhibition_list_default_img2.png" alt=""><img src="__WAP_PUBLIC__/images/exhibition_list_default_img3.png" alt=""></li>
                                <li><img src="__WAP_PUBLIC__/images/exhibition_list_default_img2.png" alt=""><img src="__WAP_PUBLIC__/images/exhibition_list_default_img3.png" alt=""><img src="__WAP_PUBLIC__/images/exhibition_list_default_img1.png" alt=""></li>
                                <li><img src="__WAP_PUBLIC__/images/exhibition_list_default_img3.png" alt=""><img src="__WAP_PUBLIC__/images/exhibition_list_default_img1.png" alt=""><img src="__WAP_PUBLIC__/images/exhibition_list_default_img2.png" alt=""></li>
                                <li><img src="__WAP_PUBLIC__/images/exhibition_list_default_img1.png" alt=""><img src="__WAP_PUBLIC__/images/exhibition_list_default_img2.png" alt=""><img src="__WAP_PUBLIC__/images/exhibition_list_default_img3.png" alt=""></li>
                                
                            </ul>
                        </div>
                        <div class="prev"></div>
                        <div class="next"></div>
                   </div>
                   <div class="default_con default_con_rq default_con_rq2">
                      <div class="con_left">
                            <h2><a href="exhibition_hall_details/exhibition_hall_details.html">张家港市洛贝服饰有限公司</a></h2>
                            <p></p>
                            <span class="name">主营产品：</span><span class="name_con">1</span>
                            <span class="name">经营模式：</span><span class="name_con">1</span>
                            <span class="name">所在地：</span><span class="name_con">1</span>
                            <span class="name">加工方式：</span><span class="name_con">1</span>



                            <div class="qualification_hover">
                                <div class="hover_top">
                                    <span>工商注册信息</span>
                                    <img class="xxxxx" src="__WAP_PUBLIC__/images/xxxxx.png" alt="">
                                </div>
                                <div class="hover_con">
                                    <ul>
                                        <li><span>公司名称：<a>张家港市洛贝服饰有限公司</a></span><span>注册地址：<a>中国苏州张家港市凤凰</a></span></li>
                                        <li><span>公司名称：<a>张家港市洛贝服饰有限公司</a></span><span>注册地址：<a>中国苏州张家港市凤凰</a></span></li>
                                        <li><span>公司名称：<a>张家港市洛贝服饰有限公司</a></span><span>注册地址：<a>中国苏州张家港市凤凰</a></span></li>
                                        <li><span>公司名称：<a>张家港市洛贝服饰有限公司</a></span><span>注册地址：<a>中国苏州张家港市凤凰</a></span></li>
                                        <li><span>公司名称：<a>张家港市洛贝服饰有限公司</a></span><span>注册地址：<a>中国苏州张家港市凤凰</a></span></li>
                                    </ul>
                                </div>
                            </div>
                       </div>
                        <div class="prev"></div>
                        <div class="next"></div>
                   </div>
                   <div class="default_con default_con_rq default_con_rq5">
                       <div class="con_left">
                            <h2><a href="exhibition_hall_details/exhibition_hall_details.html">张家港市洛贝服饰有限公司</a><span class="ck_qualification">查看资质</span></h2>
                            <p>洛贝服饰工厂<img src="__WAP_PUBLIC__/images/red_star.png" alt=""></p>
                            <span class="name">主营产品：</span><span class="name_con">1</span>
                            <span class="name">经营模式：</span><span class="name_con">1</span>
                            <span class="name">所在地：</span><span class="name_con">1</span>
                            <span class="name">加工方式：</span><span class="name_con">1</span>
                       </div>
                       <div class="con_right" id="e_l_carousel">
                            <ul class="d3">
                                <li><img src="__WAP_PUBLIC__/images/exhibition_list_default_img1.png" alt=""><img src="__WAP_PUBLIC__/images/exhibition_list_default_img2.png" alt=""><img src="__WAP_PUBLIC__/images/exhibition_list_default_img3.png" alt=""></li>
                                <li><img src="__WAP_PUBLIC__/images/exhibition_list_default_img2.png" alt=""><img src="__WAP_PUBLIC__/images/exhibition_list_default_img3.png" alt=""><img src="__WAP_PUBLIC__/images/exhibition_list_default_img1.png" alt=""></li>
                                <li><img src="__WAP_PUBLIC__/images/exhibition_list_default_img3.png" alt=""><img src="__WAP_PUBLIC__/images/exhibition_list_default_img1.png" alt=""><img src="__WAP_PUBLIC__/images/exhibition_list_default_img2.png" alt=""></li>
                                <li><img src="__WAP_PUBLIC__/images/exhibition_list_default_img1.png" alt=""><img src="__WAP_PUBLIC__/images/exhibition_list_default_img2.png" alt=""><img src="__WAP_PUBLIC__/images/exhibition_list_default_img3.png" alt=""></li>
                                
                            </ul>
                        </div>
                        <div class="prev"></div>
                        <div class="next"></div>
                   </div>
                   
                   
               </div>
               <div style="position:relative; left:-450px;">
                <ul class="pagination pages">
                  {$page}  
                </ul>
               </div>
     
               <div class="con_bottom12">
  <!--                  <span>上一页</span>
                   <span>1</span>
                   <span>2</span>
                   <span>3</span>
                   <span>4</span>
                   <span>下一页</span> -->

               </div>

            </div>
            <div class="right_banner">
                
                <a href="">
                    <img src="__WAP_PUBLIC__/images/exhibition_list_right_banner2.png" alt="">
                </a>
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
<script type="text/javascript" src="__WAP_PUBLIC__/js/jquery.js"></script>
<script type="text/javascript" src="__WAP_PUBLIC__/js/jquery.cityselect.js"></script>


<script type="text/javascript">
$("#city").citySelect();

$("#city").citySelect({
    url:"__WAP_PUBLIC__/js/city.min.js",
    prov:"湖南",//省份?
    city:"长沙",//城市?
    dist:"岳麓区",//区县?
    nodata:"none"//当子集无数据时，隐藏select?
});

// $(function(){
//         $("#city").citySelect({
//             nodata:"none",
//             required:false
//         }); 
//     });

    // //点击人气按钮按人气排序
    // $("#uv").click(function(){
    //     $("#start").attr('class',"");
    //     $("#uv").attr('class','color_style');
        
    // });

    // //点击默认按钮按时间排序
    // $("#start").click(function(){
    //     $("#start").attr('class',"color_style");
    //     $("#uv").attr('class','');

    // });
</script>
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