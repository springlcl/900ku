<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="__SUP_PUBLIC__/css/style.css">
	<style>
	</style>
</head>
<body>
<!-- 顶部 -->
    <div class="x_header mgb30">
        <div class="box-1">
            <a href="index.htnl"><div class="logo">
                <img src="__SUP_PUBLIC__/images/logo.png" alt="">
            </div></a>
			<span class="tit">展厅装修</span>
            <input id='exid' type='hidden' name='exid' value='{$exid}'>
		</div>
	</div>
	<h5 class="title1">请选择推荐模板</h5>
	<div class=" box-2 zhankai">
		<p class="q_duan">已为您准备了 多种行业模板，请根据实际情况任选一种：</p>
		<p class="q_zhang">每个行业模板 ，都已经默认设置和启用了合适的功能，便于您能快速的开店；当然，您也可以根据自身情况，重新进行自定义设置的操作，满足你的日程经营。
		</p>
		<ul>
			<li class="li active" mol='1'>
				<img src="__SUP_PUBLIC__/images/mb1.png" alt="" >
				<h4>经典模板</h4>
				<p>关于模版的简单介绍，关于模版的简单介绍</p>
			</li>
			<li class="li-01 li" mol='2'>
				<img src="__SUP_PUBLIC__/images/mb2.png" alt="" >
				<h4>人气模板</h4>
				<p>关于模版的简单介绍，关于模版的简单介绍</p>
			</li>
			<li class='li ' mol='3'>
				<img src="__SUP_PUBLIC__/images/mb3.png" alt="" >
				<h4>普通模板</h4>
				<p>关于模版的简单介绍，关于模版的简单介绍</p>
			</li>
		</ul>
        <button id='but' class="btn-lan-160 mgauto mgb35" style="display: block;">确认</button>
	</div>

<!-- 底部 ===========-->
    <div class="index_end">
        <div class="hr"></div>
        <ul>
            <li>
                <span>购物指南</span>
                <a href="">购物流程</a>
                <a href="">会员介绍</a>
                <a href="">生活旅行</a>
                <a href="">常见问题</a>
                <a href="">大家电</a>
                <a href="">联系客服</a>
            </li>
            <li>
                <span>配送方式</span>
                <a href="">上门自提</a>
                <a href="">211限时达</a>
                <a href="">配送服务查询</a>
                <a href="">配送费收取标准</a>
                <a href="">海外配送</a>
            </li>
            <li>
                <span>支付方式</span>
                <a href="">货到付款</a>
                <a href="">在线支付</a>
                <a href="">分期付款</a>
                <a href="">邮局汇款</a>
                <a href="">公司转账</a>
            </li>
            <li>
                <span>售后服务</span>
                <a href="">售后政策</a>
                <a href="">价格保护</a>
                <a href="">退款说明</a>
                <a href="">返修/退换货</a>
                <a href="">取消订单</a>
            </li>
            <li>
                <span>手机APP下载</span>
                <img src="__SUP_PUBLIC__/images/index_end_tbc.png" alt="">
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
    </footer>
    <div class="literary">
        <span>
                © 2003-2016 9co.COM 版权所有
        </span>
    </div>
</body>
</html>
<script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/1.8.3/jquery.min.js"></script>
<script>
  $(function () {
      $(".zhankai ul li.li").click(function () {
          $(this).addClass("active").siblings().removeClass('active');
      });
  })

  $("#but").bind('click',function(){

$(function () {
      $(".zhankai ul li.li").click(function () {
          $(this).addClass("active").siblings().removeClass('active');
      });
  })
    var mol=$('.active').attr('mol');
    var exid=$("#exid").val();
   

                $.ajax({
                  type: 'post',
                  url: "{:U('Store/sure_model')}",
                  data: {'exid':exid,'mol':mol},
                  dataType: 'json',
                  async: false,
                  success: function(data)
                  {
                    if(data)
                    {
                      location.href="{:U('Index/index')}";
                    }else{
                     
                    }
                  }
                });


  })
</script>