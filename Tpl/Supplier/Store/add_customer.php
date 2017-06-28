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
          <form id="iform" method="post" action="" enctype="multipart/form-data">
          <ul class="lump">
            <li class="upload_li">         
                <label class="text" ><i>*</i>用户二维码:</label>
                  <div class="upload_sm">
                    <input type="file" name="file" id="file" class="upload_1">
                  </div>
            </li>
            <li>         
                <label class="text" ><i>*</i>用户昵称：</label>
                  <input name="nick_name" type="text">
            </li>
            <li>         
                <label class="text" ><i>*</i>联系方式：</label>
                  <input name="tel" type="text">
            </li>
            <li>         
                <label class="text" ><i>*</i>真实姓名：</label>
                  <input name="real_name" type="text">
            </li>
            <li>         
                <label class="text" >邮箱：</label>
                  <input name="email" type="text">
            </li>
            <li>         
                <label class="text" >客服简介：</label>
                <textarea name="profile">
                </textarea>
            </li>
            <li class="btn">         
                <label class="text" >&nbsp;</label>
                  <button class="btn-lan-160">确认添加</button>
            </li>
          </ul>
        </form>
        </div>
        <!-- 底部 == 版权 -->
        <div class="cont_lump con-foot">版权所有：900库 [京ICP备1000000001号-1</di>
    </div>

</body>
<script type="text/javascript" src="__SUP_PUBLIC__/js/jquery2.1.4.min.js"></script>
<script type="text/javascript" src="__SUP_PUBLIC__/js/jquery.validate.method.js"></script>
<script type="text/javascript" src="__SUP_PUBLIC__/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="__SUP_PUBLIC__/js/profile.js"></script>
<script>
  $(function () {
      $(".container .cont_lump_choice dl dd").click(function () {
          $(this).addClass("active").siblings().removeClass('active');
      });
  })
</script>
</html>