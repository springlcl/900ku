<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="wap-font-scale" content="no">
    <title>登录页面</title>
    <link rel="stylesheet" href="__SUP_PUBLIC__/css/login.css">
    <script src="__SUP_PUBLIC__/js/jquery2.1.4.min.js"></script>
    <script src="http://res.wx.qq.com/connect/zh_CN/htmledition/js/wxLogin.js"></script>
</head>
<body>
    <div class="login_logo">
        <a href="http://www.900ku.com/index.php">
            <img src="__SUP_PUBLIC__/images/logo.png">
        </a>
    </div>
    <div class="login_con">
        <div class="con">
            <div class="login_border login_border1">
                <img src="__SUP_PUBLIC__/images/login_cg.png" alt="">
            </div>
            <div class="login_border login_border2">
                <img src="__SUP_PUBLIC__/images/login_xp.png" alt="">
            </div>

            <div style="background:#fff;" class="login_right">
                <div class="top">
                    <span style="background:url('__SUP_PUBLIC__/images/login_dl_bj.jpg') no-repeat;" class="top_text_ts top_text_gy"></span>
                    <span style="background:url('__SUP_PUBLIC__/images/login_dl_bj1.png') no-repeat;" class="top_text_ts top_text_cg"></span>
                    <div class="tbc"></div>
                    <span class="login_wx_dl login_wx_cg">采购商</span>
                    <span class="login_wx_dl login_wx_gy">供应商</span>
                </div>
                <a style="display:none" class="dl_tbc" id="gy_container">
                    <img class="tbc_img_cg" src="__SUP_PUBLIC__/images/login_tbc_gy.png" alt="">
                    <img class="tbc_img_gy" src="__SUP_PUBLIC__/images/login_tbc_cg.png" alt="">
                </a>
                <a style="display:block" class="dl_tbc" id="cg_container">
                    <img class="tbc_img_cg" src="__SUP_PUBLIC__/images/login_tbc_gy.png" alt="">
                    <img class="tbc_img_gy" src="__SUP_PUBLIC__/images/login_tbc_cg.png" alt="">
                </a>
                <!-- <div class="sys">
                    <span>打开手机微信，扫描二维码</span>
                    <span>扫一扫登录</span>
                </div> -->
            </div>
        </div>
    </div>
    <div class="login_work_flow login_work_flow1">
        <span class="work_flow">
            网站流程
        </span>
        <img src="__SUP_PUBLIC__/images/login_work_flow.png" alt="">
        <div class="work_flow_tbc">
            <div>
                <img src="__SUP_PUBLIC__/images/work_flow_tbc_app.png" alt="">
                <span>APP采购商版</span>
            </div>
            <div>
                <img src="__SUP_PUBLIC__/images/work_flow_tbc_app.png" alt="">
                <span>采购商公众号</span>
            </div>
        </div>
    </div>
    <div class="login_work_flow login_work_flow2">
        <span class="work_flow">
            网站流程
        </span>
        <img src="__SUP_PUBLIC__/images/login_work_flow1.png" alt="">
        <div class="work_flow_tbc">
            <div>
                <img src="__SUP_PUBLIC__/images/work_flow_tbc_app.png" alt="">
                <span>APP供应商版</span>
            </div>
            <div>
                <img src="__SUP_PUBLIC__/images/work_flow_tbc_app.png" alt="">
                <span>供应商公众号</span>
            </div>
        </div>
    </div>
    <div class="literary">
        <span>
            © 2003-2016 9co.COM 版权所有
        </span>
    </div>
  <script src="__SUP_PUBLIC__/js/login.js"></script>
<script>
var obj = new WxLogin({
      id:"gy_container", 
      appid: "wx1eef79d75139a9b0", 
      scope: "snsapi_login", 
      redirect_uri: "http://www.900ku.com/supplier.php/login/code/user_type/1",
      state: "",
      style: "",
      href: ""
    });  
var objs = new WxLogin({
      id:"cg_container", 
      appid: "wx1eef79d75139a9b0", 
      scope: "snsapi_login", 
      redirect_uri: "http://www.900ku.com/purchaser.php/login/code/user_type/2",
      state: "",
      style: "",
      href: ""
    }); 
</script>



</body>

</html>