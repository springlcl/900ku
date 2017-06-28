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
<!-- 左导一 -->
  <include file='Public/firstSidebar' />
<!-- 左导二 -->
   <include file='exLeft' />
<!-- 右侧 内容-->
    <div class="clearfix container" id="app-container">
        <div class="cont_lump cont_lump_Customer bor_bm1">
          <div class="cont_title">
            <span>添加客服列表</span> 
          </div>
          <form method="post" action="" enctype="multipart/form-data">
          <ul class="lump">
            <!-- <li class="upload_li">         
                <label class="text" ><i>*</i>用户二维码:</label>
                  <div class="upload_sm">
                    <input type="file" name="file" id="file" class="upload_1">
                  </div>
            </li> -->
            <li>         
                <label class="text" ><i>*</i>用户昵称：</label>
                  <input name="nick_name" type="text" value="{$kefu.nick_name}">
            </li>
            <li>         
                <label class="text" ><i>*</i>联系方式：</label>
                  <input name="tel" type="text" value="{$kefu.tel}">
            </li>
            <li>         
                <label class="text" ><i>*</i>真实姓名：</label>
                  <input name="real_name" type="text" value="{$kefu.real_name}">
            </li>
            <li>         
                <label class="text" >邮箱：</label>
                  <input name="email" type="text" value="{$kefu.email}">
            </li>
            <li>         
                <label class="text" >客服简介：</label>
                <textarea name="profile">
                  {$kefu.profile}
                </textarea>
            </li>
            <li class="btn">         
                <label class="text" >&nbsp;</label>
                  <button class="btn-lan-160">确认修改</button>
            </li>
          </ul>
          <input type="hidden" value="{$kefu.uid}" name="uid">
          <input type="hidden" value="{$kefu.kid}" name="kid">
          <input type="hidden" value="{$kefu.exid}" name="exid">
        </form>
        </div>
        <!-- 底部 == 版权 -->
        <div class="cont_lump con-foot">版权所有：900库 [京ICP备1000000001号-1</di>
    </div>

</body>
<script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/1.8.3/jquery.min.js"></script>
<script>
  $(function () {
      $(".container .cont_lump_choice dl dd").click(function () {
          $(this).addClass("active").siblings().removeClass('active');
      });
  })
</script>
</html>