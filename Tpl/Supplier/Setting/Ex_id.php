<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"><meta http-equiv="keywords" content="keyword1,keyword2,keyword3">
  <meta http-equiv="description" content="this is my page">
  <title>账号设置</title>
  <link rel="stylesheet" href="__SUP_PUBLIC__/css/style.css">
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries--><!--[if lt IE 9]><script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script><script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<body>
<!-- 左导一 -->
  <include file='Public/firstSidebar' />
<!-- 左导二 -->
  <include file='Set_left' />
<!-- 右侧 内容-->
<div class="clearfix container min-w1100" id="app-container">
      <div class="cont_lump cont_lump_sell l_Account bor_bm1">
        <form action="{:U('Setting/id_edit')} " method="post" enctype="multipart/form-data">
          <div class="cont_title clearfix">
            <span>账号设置</span>
          </div> 
          <div class="l_zhanghao">
             <span class="zh">账号：</span><span>{$id.real_name}<!-- </span><span class="col-lan mgl10">修改密码</span> -->
          </div class="nicheng">
          <div class="l_nicheng">
              <span class="nice">昵称：</span><span class="xixia"><input name="username" value="{$id.username}" type="text" placeholder="西夏的餐厅" ></span>
          </div>
          <div class="portrait clearfix">
              <p class="touxiang fl">头像：</p><div class="zhaopian fl"><img id="pic" src="__UPLOADS__/image/{$id.headimg}" alt=""></div>
<input type="file" name="thumb" id="file" />
              <!--  <p class="col-lan xiuga fl"> 修改</p> -->
          </div>
          <div class="personal">
              <span class="geren">个人签名：</span>
              <span>
                <textarea name="sign" rows="10" cols="50"  class="pd10">{$id.sign}
                </textarea>
              </span>
          </div>
          <input type="hidden" name="exid" value="<?= $_GET['exid']?>">
          <div class="anniu">
            <button class="bj">保存</button>
           <!--  <button class="wbj">取消</button> -->
          </div>
        </form>
      </div>
       <!-- 底部 == 版权 -->
    <div class="cont_lump con-foot">版权所有：900库 [京ICP备1000000001号-1</div>
</div>
</body>
<script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="__SUP_PUBLIC__/js/ind.js"></script>
<script>
    // 图片显示
    $('#file').bind('change',function(){
    var url=window.URL.createObjectURL(this.files[0]);
    //alert(url);
    $('#pic').attr('src',url);
    });
</script>
</html>