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
                    <span>Hi，欢迎来900库</span>
          <!--           <a href="">请登录</a> -->
                </div>
                <div class="shopping_right">
                    <span>
                        采购清单<a>0</a>件
                    </span>
                    <span>
                       我的账户 ∨
                    </span>
                    <span>
                       微信版 ∨
                    </span>
                    <span>
                       900库APP ∨
                    </span>
                    <span><a style="color:#A998BA" href="../backstage_page/admit_management.html">管理后台</a>
                       
                    </span>
                </div>
            </div>
        </div>
        <a id="db"></a>
        <div class="store_head_con wh1200auto pdb20">
            <div class="store_logo">
                <div><img src="__HOME_CG_PUBLIC__/images/shopping_logo.png" alt=""></div>
                <div class="store_title"><a href="0101-采购商前台页面.html">贵瑾珠宝采购平台</a></div>
            </div>
            <a href="../900Ku前台首页PC端/0101-900库首页.html"><img class="store_logo_left" src="images/logo.png" alt=""></a>
        </div>
    </header>

<div class="cart_content0">
        <div class="cart_content">
            <img src="__HOME_CG_PUBLIC__/images/liucheng-3.png" alt="" class="mgt20 mgb30">
            <div class="payment_success">
                <div class="clearfix">
                    <div class="img fl mgr30"><img class="btn-80x80" src="{$data.goods_thumb}" alt=""></div>
                    <ul class="fl">
                        <li>商品名称：{$data.goods_name}</li>
                        <li>
                            <span class="mgr20"><?php $i = explode(",",$data['standerds']);echo $i[0]; ?></span>
                            <span><?php $i = explode(",",$data['standerds']);echo $i[1]; ?></span>
                        </li>
                        <li>编号：{$data.goods_code}</li>
                    </ul>
                    <ul class="fl">
                        <li><span class="mgr10">订单号:</span>{$data.order_code}</li>
                        <li><span class="mgr10">购买时间:</span>{$data.created|date='Y-m-d H:i:s',###}</li>
                        <li><span class="mgr10">付款方式：</span>线上付款</li>
                    </ul>
                </div>
                <div class="xq_info">
                    本次支付: <span class="col-red fw600">￥{$data.paid_amount}</span>
                </div>
            </div>
        </div>
    </div>

<!-- 底部=================================== -->
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
                <img src="images/index_end_tbc.png" alt="">
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
<script type="text/javascript" src="__HOME_CG_PUBLIC__/js/jquery.min.js"></script>
<script type="text/javascript" src="__HOME_CG_PUBLIC__/js/swiper.min.js"></script>
<script type="text/javascript" src="__HOME_CG_PUBLIC__/js/js.js"></script>
</html>