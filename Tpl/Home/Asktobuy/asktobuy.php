<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="wap-font-scale" content="no">
    <title>900库发布求购页</title>
    <link rel="stylesheet" href="__HOME_PUBLIC__/css/style.css">
    <link rel="shortcut icon" href="__HOME_PUBLIC__/images//.ico" type="image/x-icon">
    <script src="__HOME_PUBLIC__/js/jquery-1.8.3.min.js"></script>
    <style>
    .publish_buy_head .head_top .nav{overflow: hidden;}
    .publish_buy_head .head_top .nav .left {width: 720px;height: 30px;float: left;}
    .publish_buy_head .head_top .nav .shopping_right{width: 480px;height: 30px;float: left;line-height: 30px;}
    </style>
</head>
<body>
    <div class="publish_buy_head">
    <!-- <img src="__HOME_PUBLIC__/images//publish_buy.jpg" alt=""> -->
        <div class="publish_buy">
            <div class="head_top">
                <div class="nav">
                    <div class="left">
                        <span>Hi，欢迎来900库</span>
                        <a href="http://www.900ku.com/supplier.php/login/index.html">请登录</a>
                        <!-- <a href="">免费注册</a> -->
                    </div>
                   <div class="shopping_right">
                    <span>
                       常购清单  
                    </span>
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
                   <!--  <span><a style="color:#A998BA" href="../backstage_page/admit_management.html">卖家中心</a>
                       
                    </span> -->
                </div>
                </div>
            </div>
        </div>
    </div>
    <form action="{:U('Asktobuy/inputdata')}" method="post" enctype="multipart/form-data">
    <div class="publish_buy_float">
        <div style="float:left;" class="publish_buy_float_left">
            <ul>
                <li>
                    <div style="color:#3FA49E;float:left;line-height:30px;">*</div><div style="float:left;width:60px;height:30px;line-height:30px;">采购产品</div><div style="width:300px;height:30px;border:2px solid #C8C5C3;float:left;"><input style="border:none;height:30px;width:220px;float:left;-webkit-appearance:none;" type="search" name="cg_name" placeholder="" />
                        <div id="publish_buy_float_btn">
                            <select style="float:left;height:30px;width:80px;line-height:30px;font-size:16px;background:#C5C6C5;text-align:center;color:#000;position:relative;border:none;" class="publish_buy_float_feilei" onselectstart="return false;" name="cg_cate" id="">
                                
                                <volist name="type" id="t">
                                <option value="{$t.type_id}">{$t.type_name}</option>
                                </volist>
                            </select>
                        </div>
                    </div>
                </li>
                <li>
                    <div style="color:#3FA49E;float:left;line-height:30px;">*</div><div style="float:left;width:60px;height:30px;line-height:30px;">采购数量</div><input style="width:300px;height:30px;border:2px solid #C8C5C3;float:left;" name="cg_num">
                </li>
                <li>
                    <div style="color:#3FA49E;float:left;line-height:30px;">*</div><div style="float:left;width:60px;height:30px;line-height:30px;">联系人</div><input style="width:300px;height:30px;border:2px solid #C8C5C3;float:left;" name="cg_username">
                </li>
                <li>
                    <div style="color:#3FA49E;float:left;line-height:30px;">*</div><div style="float:left;width:60px;height:30px;line-height:30px;">手机号</div><input style="width:300px;height:30px;border:2px solid #C8C5C3;float:left;" name="cg_phone">
                </li>
                <li>
                    <div style="float:left;width:60px;height:30px;line-height:30px;">公司名称</div><input style="width:300px;height:30px;border:2px solid #C8C5C3;float:left;margin-left:4px;" name="cg_company">
                </li>
                <li>
                    <div style="float:left;width:60px;height:30px;line-height:30px;">详细说明</div>
                    <textarea name="cg_detail" id="" onkeyup="countChars1();"  onfocus="if(value=='请输入详细说明...'){value=''}"
                     onblur="if (value ==''){value='请输入详细说明...'}" style="width:300px;height:60px;border:2px solid #C8C5C3;float:left;margin-left:4px;">请输入详细说明...</textarea>
                </li>
            </ul>
        </div>
        <div class="publish_buy_float_right">
            <ul>
                <li style="margin-top:20px;margin-left:100px;float:left;">
                    <div style="float:left;">
                        <a href=""><img style="display:inline-block;" src="__HOME_PUBLIC__/images//publish_buy_1.jpg" alt=""></a>
                    </div>
                    <div style="float:left;margin-left:30px;line-height:30px;font-size:16px;">
                        <div style="display:inline-block;"><a href="">1小时快速反应</a></div>
                    </div>
                </li>
                <li style="margin-top:40px;margin-left:100px;float:left;">
                    <div style="float:left;">
                        <a href=""><img style="display:inline-block;" src="__HOME_PUBLIC__/images//publish_buy_2.jpg" alt=""></a>
                    </div>
                    <div style="float:left;margin-left:30px;line-height:30px;font-size:16px;">
                        <div style="display:inline-block;"><a href="">享受免费找货</a></div>
                    </div>
                </li>
                <li style="margin-top:40px;margin-left:100px;float:left;">
                    <div style="float:left;">
                        <a href=""><img style="display:inline-block;" src="__HOME_PUBLIC__/images//publish_buy_3.jpg" alt=""></a>
                    </div>
                    <div style="float:left;margin-left:30px;line-height:30px;font-size:16px;">
                        <div style="display:inline-block;"><a href="">获得优质商品</a></div>
                    </div>
                </li>
                <li style="margin-top:40px;margin-left:100px;float:left;">
                    <div style="float:left;">
                        <a href=""><img style="display:inline-block;" src="__HOME_PUBLIC__/images//publish_buy_4.jpg" alt=""></a>
                    </div>
                    <div style="float:left;margin-left:30px;line-height:30px;font-size:16px;">
                        <div style="display:inline-block;"><a href="">收货满意采购</a></div>
                    </div>
                </li>
            </ul>
        </div>
    </div>


    <div class="publish_buy_btn0"><a style="color:#fff";>
        <div class="publish_buy_btn">
            <button  style="font-size:20px;color:white;">立即帮我找货</button>
        </div></a>
    </div>
</form>

   <include file="Public/Foot" />
</body>
  <script>

    $('#publish_buy_float_btn').click(function(){
        $('.publish_buy_float_xiala').css('display';'block');
    })
        

  </script>
</html>