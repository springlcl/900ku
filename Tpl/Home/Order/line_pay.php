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
    <div class="mask"></div>
	<header class="shopping_index_head">
        <div class="shopping_head_top">
            <div class="shopping_nav">
                <div class="shopping_left">
                    <a href="{:U('Home/index')}"><span>Hi，欢迎来900库</span></a>
          <!--           <a href="">请登录</a> -->
                </div>
                <div class="shopping_right">
                    <a href="{:U('Order/purchase_list')}"><span >采购清单<a>{$num|default="0"}</a>件</span></a>
                    <span>
                       我的账户
                       <a href="{:U('Login/quit')}"><span id="out" style="display:none">退出登录</span></a>
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
             <div class="store_head_con wh1200auto pdb20">
            <div class="store_logo">
                <div><img style="width:60px;height:60px;" src="__UPLOADS__/purchaser/headimg/<?=session('cg_headimg');?>" alt=""></div>
                <div class="store_title"><a href="{:U('Cg/index',array('itemid'=>$itname['pid']))}">{$itname.pro_name}</a></div>
            </div>
            <a href="{:U('Home/index')}"><img class="store_logo_left" src="__HOME_PUBLIC__/images/logo.png" alt=""></a>
        </div>
            <div class="shopping_search">
                <div class="shopping_ss">
                    <input type="search" name="user_search" placeholder="商品名称/编号">
                    <div class="shopping_but onselectstart" onselectstart="return false;">
                        搜索
                    </div>
                </div>
            </div>
            <a href="cart.html">
                <div class="shopping_add_shopping_cart"></div>
                <div class="shopping_add_shopping_car">采购清单</div>    
            </a>
        </div>
    </header>

    <!-- +++++++++++++++++++++++++++++++++++++从这里开始+++++++++++++++++++++++++++++++++++++ -->
    <div class="wh1200auto">
      <div class="right_con_down bg-fff  bor_1ddd">
        <div class="clearfix container min-w" id="app-container">
          <div class="cont_lump cont_lump_sell cont_lump_order1">
            <div class="title_ty ">
              <span class="tit_name">订单详情</span>
            </div>
        <form action="{:U('Order/pay_end')}" method="post" enctype="multipart/form-data">
      <!--   <form method="post" action="index"> -->
				<ul  style="width: 600px;margin: 0 auto;">
					<li class="pdl35 pdt20">
            <span class="wh80">客户名称：</span>
            <input type="text" name="kname" class="btn-380x30 mgl10 pdl10" placeholder="请输入客户名称">
          </li>
          <li class="pdl35 pdt20">
            <span class="wh80">单号：</span>
            <input type="text" name="order_num" class="btn-380x30 mgl10 pdl10" placeholder="请输入订单编号">
          </li>
          <li class="pdl35 pdt20">
            <span class="wh80">金额：</span>
            <input type="text" name="total" class="btn-380x30 mgl10 pdl10" placeholder="付款金额">
          </li>
          <li class="pdl35 pdt20">
            <span class="wh80">收支类型：</span>
            <span class="btn-380x30 mgl10 pdl10">银行转账</span>
          </li>
          <li class="pdl35 pdt20">
            <span class="wh80">开户银行：</span>
            <input type="text" name="bank" class="btn-380x30 mgl10 pdl10" placeholder="开户银行">
          </li>
          <li class="pdl35 pdt20">
            <span class="wh80">银行卡号：</span>
            <input type="text" name="bank_code" class="btn-380x30 mgl10 pdl10" placeholder="银行卡号">
          </li>
          <li class="pdl35 pdt20">
            <span class="wh80">收款账号：</span>
            <input type="text" name="peyee" class="btn-380x30 mgl10 pdl10" placeholder="收款账号">
          </li>
          <li class="pdl35 pdt20">
            <span class="wh80">银行流水：</span>
            <input type="text" name="bank_flow" class="btn-380x30 mgl10 pdl10" placeholder="收款账号">
          </li>
          <li class="pdl35 pdt20">
            <span class="wh80">支付证明：</span>
            <input type="file" id="fileToUpload" onchange="upperCase()" name="thumb" class="btn-220x30 mgl10 pdl10">
          </li>
          <li class="pdl35 pdt20">
            <span class="wh80">备注：</span>
            <textarea name="text_con" class="pdl10 mgl10 btn-380x80" cols="60" rows="3"></textarea>
          </li>
          <input type="hidden" name="oid" value="{$itname.oid}" >
          <li class="pdl35 pdt20 mgl70">
            <button class="mg30 btn-90x35 bg-slv col-fff bor-r5">提交</button>
          </li>
				</ul>
			</form>
 
           
          </div>
          <!-- 底部 == 版权 -->
        </div>
        <div class="protection">
          <div class="tanchu_box tanchu_box700 order_501">
            <h3 class="q_details">付款记录详情</h3>
            <ul class="kehuxinxibiao">
              <li><span>客户名称：</span>张晓</li>
              <li><span>&nbsp;</span></li>
              <li><span>单号：</span>-EP.648494985794</li>
              <li><span>金额：</span>-10000.00</li>
              <li><span>收支类型：</span>订单付款</li>
              <li><span>状态：</span>待确认</li>
              <li><span>关联单号：</span>DH.8908749</li>
              <li><span>&nbsp;</span></li>
              <li><span>支付方式：</span>线下转账</li>
              <li><span>付款日期：</span>2017-03-23</li>
              <li><span>收款账号：</span>开户银行-</li>
              <li><span>&nbsp;</span>开户名称-默认帐号</li>
              <li><span>&nbsp;</span>银行帐号</li>
              <li class="mgt25 clearfix"><span class="mgt10">支付证明：</span>
              <div class="fr" style="margin-right: 89px;">
                <img class="" src="__HOME_CG_PUBLIC__/images/pingzheng.png" alt="">
              </div>
              </li>
              <li class="mgt25 "><span>提交时间：</span>2017-03-24</li>
              <li><span>备注：</span>无</li>
              <li style="text-align:center;"><button style="width:45px;height:30px;border:1px soild #eee;background-color:#eee;">确定</button></li>
            </ul>
          </div>
        </div>
      </div>  
    </div>
<!-- ++++++++++++++++++++++++++++++++++++++ -->




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
                <img src="__HOME_CG_PUBLIC__/images/index_end_tbc.png" alt="">
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
</body>
<script type="text/javascript" src="__HOME_CG_PUBLIC__/js/jquery.min.js"></script>
<script type="text/javascript" src="__HOME_CG_PUBLIC__/js/js.js"></script>

</html>