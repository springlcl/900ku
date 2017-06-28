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
                    <span id="in">
                       我的账户

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
        <div class="store_head_con wh1200auto pdb20">
            <div class="store_logo">
              <div><img style="width:60px;height:60px;" src="__UPLOADS__/purchaser/headimg/<?=session('cg_headimg');?>" alt=""></div>
                <div class="store_title"><a href="{:U('Cg/index',array('itemid'=>$itname['pid']))}">{$itname.pro_name}</a></div>
            </div>
            <a href="{:U('Home/index')}"><img class="store_logo_left" src="__HOME_PUBLIC__/images/logo.png" alt=""></a>
        </div>
    </header>
    <div class="shopping_list_nav">
        <div class="shopping_nav">
            <span href="" class="shopping_nav_quan">平台商品分类
                 <div class="shopping_fenlei yes_sel">
                    <ul style="position:relative">
                        <li style="height:20px;line-height:20px;color:#00A199;font-size: 16px;">准入商品分类
                        </li>
                        <volist name="group" id="g">
                        <li class="fname" fid="{$g.fid}" pid="{$g.pid}"><a href="{:U('Cg/admit',array('fid'=>$g['fid']))}">{$g.fname}</a></li>
                        </volist>
                 <!--        <li>其它分类
                            <div>站位2</div>
                        </li>
                        <li>其它分类
                            <div>站位3</div>
                        </li>
                        <li>其它分类
                            <div>站位4</div>
                        </li>
                        <li>其它分类
                            <div>站位5</div>
                        </li>
                        <li>其它分类
                            <div>站位6</div>
                        </li>
                        <li>其它分类
                            <div>站位7</div>
                        </li>
                        <li>本项目商品
                            <div>站位8</div>
                        </li> -->
                        <li class="go_index">
                            <a href="{:U('Home/index')}">去900库首页</a>
                        </li>
                    </ul>
                  </div>
            </span>
            <a class="<if condition="'__CONTROLLER__' eq '__MODULE__'.'/index'">style</if>" href="{:U('Cg/index')}">首页</a>
            <a class="<if condition="'__CONTROLLER__' eq '__MODULE__'.'/admit'">style</if>" href="{:U('Cg/admit')}">供应商列表</a>
            <a class="<if condition="'__CONTROLLER__' eq '__MODULE__'.'/cg_admit_order'">style</if>"  href="{:U('Cg/cg_admit_order')}">订单</a>
            <a class="<if condition="'__CONTROLLER__' eq '__MODULE__'.'/index'">style</if>"  href="{:U('Cg/finance')}">财务统计</a>
            <a class="<if condition="'__CONTROLLER__' eq '__MODULE__'.'/index'">style</if>"  href="{:U('Cg/news')}">消息</a>
            <!-- <div class="shopping_list_nav_right">
                <div><img src="__HOME_PUBLIC__/images/shopping_self.jpg" alt=""></div>
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



<div class="payment_main0">
        <div class="payment_main">
            <img class="payment_main_logo" src="{$arr.thumb}" alt="">
            <ul>
                <li>
                    <div>商品名称：</div>
                    <div>{$arr.goods_name}</div>
                    <br>
                </li>
                <li>
                    <div>卖家昵称：</div>
                    <div>{$arr.ex_name}</div>
                    <br>
                </li>
                <li>
                    <div>交易金额：</div>
                    <div>{$arr.total}元</div>
                    <br>
                </li>
                <li>
                    <div>购买时间：</div>
                    <div>{$arr.created|date="Y-m-d H:i:s",###}</div>
                    <br>
                </li>
                <li>
                    <div>付款方式：</div>
                    <div>分期支付</div>
                    <br>
                </li>
                <li>
                    <div>交易号：</div>
                    <div>{$arr.order_code}</div>
                    <br>
                </li>
            </ul>
            <div class="payment_yu">
                <if condition="$arr.is_access eq 1">
                <div>预付款：{$arr.yufu}</div>
                <else/>
                <div>应付款：{$arr.total}</div>
                </if>
                <div style="color:#000;font-size:12px;margin-top: 6px;">元</div>
                <div class="payment_change"></div>
                <br>
                
            </div>
            
        </div>
        <!-- <input type="hidden" class="url" value="{$url}" /> -->
        <if condition="$arr.is_access eq 1">
        <div class="payment_liucheng">
            <img src="__HOME_CG_PUBLIC__/images/payment_liucheng.png" alt="">
            <div class="bfb">{$data.prepayment}%</div>
            <div class="bfb1">{$data.payment_ratio}%</div>
            <div class="bfb2">{$data.inspection}%</div>
            <div class="bfb3">{$data.warranty}%</div>
            <div class="payment_price1">{$arr.yufu}元</div>
            <div class="payment_price2">{$arr.fahuo}元</div>
            <div class="payment_price3">{$arr.yanhuo}元</div>
            <div class="payment_price4">{$arr.zhibaojin}元</div>
        </div>
        </if>
       <div class="bt">{$url}</div>
        <div class="xianxia">
            <a href="{:U('Order/line_pay',array('oid'=>$arr['oid']))}">线下支付</a>
        </div>
    </div>

    <include file="Public/Foot" />
</body>
<script type="text/javascript" src="__HOME_CG_PUBLIC__/js/jquery.min.js"></script>
<script type="text/javascript" src="__HOME_CG_PUBLIC__/js/swiper.min.js"></script>
<script type="text/javascript" src="__HOME_CG_PUBLIC__/js/js.js"></script>
<script>
    $('.bt a').text("确认支付");
</script>
</html>
<style>
    .payment_main_logo {
        height:75px;
        width:80px;
    }
    .bfb {
        color: #000000;
        margin-left: 377px;
        margin-top:-90px;
        float:left;
        position: absolute;
    }
    .bfb1 {
        color: #000000;
        margin-left: 510px;
        margin-top:-90px;
        float:left;
        position: absolute;
    }
    .bfb2 {
        color: #000000;
        margin-left: 641px;
        margin-top:-90px;
        float:left;
        position: absolute;
    }
    .bfb3 {
        color: #000000;
        margin-left: 775px;
        margin-top:-90px;
        float:left;
        position: absolute;
    }
    .bt {
        color:#ededed;
        float:right;
        padding-top:10px;
        margin-right: 99px;
    }
/*    .bt a {
        color:red;
        font-size: 19px;
    }*/
    .xianxia {
        float:right;
        margin-right:-60px;
        padding-top:10px;
    }
 /*   .xianxia a {
        color:red;
        font-size: 19px;
    }*/
    .xianxia a{
    background: blue none repeat scroll 0 0;
    border-radius: 3px;
    color: #fff;
    height: 33px;
    margin-top :20px;
    width: 66px;
    padding:8px 8px;
    margin-right:0px;
}
    .bt a{
    background: red none repeat scroll 0 0;
    border-radius: 3px;
    color: #fff;
    height: 33px;
    margin-right: 15px;
    margin-top :20px;
    width: 66px;
    padding:8px 8px;
}

</style>