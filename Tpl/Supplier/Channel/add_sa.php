<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>添加业务员</title>
	<link rel="stylesheet" href="__SUP_PUBLIC__/css/style.css">
  <script src="http://res.wx.qq.com/connect/zh_CN/htmledition/js/wxLogin.js"></script>
  <style>
  #zt_show  {
    width:15px;
  }
  #zt_hide {
    width:15px;
  }
</style>
</head>
<body>
<!-- 左导一 -->
  <include file='Public/firstSidebar' />
<!-- 左导二 -->
 <include file='left' />
<!-- 右侧 内容-->
    <div class="clearfix container" id="app-container">
        <div class="cont_lump cont_lump_Customer bor_bm1">
          <div class="cont_title">
            <span>添加业务员</span> 
          </div>

<if condition="($userinfo)">
<form method='post' action="{:U('channel/add_saleman')}" enctype='multipart/form-data'>
          <input type="hidden" name="openid" value="{$userinfo['openid']}">
          <input type="hidden" name="unionid" value="{$userinfo['unionid']}">
          <input type="hidden" name="role" value="2">
          <input type="hidden" name="leader" value="{$Think.session.sup_uid}">
          <ul>
            <li>         
                <label class="text" ><i>*</i>业务员名称：</label>
                  <input type="text" name="real_name" value="">
            </li>
            <li class="upload_li">         
                <label class="text" ><i>*</i>微信信息:</label>
                  <div class="upload_sm">
                    <img src="__UPLOADS__/supplier/headimg/{$userinfo['headimgurl']}" width="120" height="120">
                    <input type="hidden" name="headimg" value="{$userinfo['headimgurl']}">
                  </div>
            </li>
            <li>         
                <label class="text" ><i>*</i>微信名称：</label>
                  <input type="text" name="username" value="{$userinfo['nickname']}">
            </li>
            <li>         
                <label class="text" ><i>*</i>业务员编码：</label>
                  <input type="text" name="user_num">
            </li>
            <li>
                <label class="text" ><i>*</i>手机号码：</label>
                  <input type="text" name="mobile">
            </li>
            <li>         
                <label class="text" >帐号状态：</label>
                    <input name="status" value="1" type="radio" id="zt_show" checked="checked">
                    <label for="zt_show">正常</label>
                    <input name="status" value="0" type="radio" id="zt_hide">
                    <label for="zt_hide">禁用</label>
            </li>
            <li>         
                <label class="text">备注：</label>
                <textarea name="remarks">
                </textarea>
            </li>
            <li>         
                <label class="text" >&nbsp;</label>
                  <input type="submit" value="保存">
            </li>
          </ul>
          </form>


<else /> 
          <ul>
            <li class="upload_li">         
                <label class="text" ><i>*</i>扫码注册:</label>
                  <div id="gy_container"></div>
            </li>
          </ul>
</if>
        </div>
        <!-- 底部 == 版权 -->
        <div class="cont_lump con-foot">版权所有：900库 [京ICP备1000000001号-1</di>
    </div>
    <!-- 弹框 -->
  <div class="protection">
    <div class="tanchu_box">
      <span class="gb close_btn"><i></i></span>
      <h3 class="tit"><i></i>您确定要删除此用户员吗？</h3>
      <div class="btn">
        <button class="btn-lan-80 mgw15">确定</button>
        <button class="btn-lan-80 mgw15 close_btn">取消</button>
      </div>
      <div class="prompt">温馨提示：用户员删除后不能恢复，请谨慎！</div>
    </div>
  </div>
</body>
<script type="text/javascript" src="__SUP_PUBLIC__/js/jquery2.1.4.min.js"></script>
<script type="text/javascript" src="__SUP_PUBLIC__/js/jquery.validate.method.js"></script>
<script type="text/javascript" src="__SUP_PUBLIC__/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="__SUP_PUBLIC__/js/profile.js"></script>
<script src="__SUP_PUBLIC__/js/ind.js"></script>
<script>
  $(function () {
      $(".container .cont_lump_choice dl dd").click(function () {
          $(this).addClass("active").siblings().removeClass('active');
      });
     /* document.onkeydown = function()
      {
       if(event.keyCode==116) {
       event.keyCode=0;
       event.returnValue = false;
       }
      }
      document.oncontextmenu = function() {event.returnValue = false;}*/
  })
  var obj = new WxLogin({
      id:"gy_container", 
      appid: "wx1eef79d75139a9b0", 
      scope: "snsapi_login", 
      redirect_uri: "http://www.900ku.com/supplier.php/channel/add_sa/user_type/3",
      state: "",
      style: "",
      href: ""
    });  
</script>
</html>