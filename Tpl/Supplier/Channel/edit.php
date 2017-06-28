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
 <include file='left' />
<!-- 右侧 内容-->
    <div class="clearfix container" id="app-container">
        <div class="cont_lump cont_lump_Customer bor_bm1">
          <div class="cont_title">
            <span>修改业务员信息</span> 
          </div>
          <form method='post' id='iform' action='' enctype='multipart/form-data'>
          <ul>
            <li>         
                <label class="text" ><i>*</i>业务员名称：</label>
                  <input type="text" name="real_name" value="{$data.real_name}">
            </li>
            <!-- <li class="upload_li">         
                <label class="text" ><i>*</i>微信信息:</label>
                  <div class="upload_sm">
                    <input type="file" name="file" id="file" class="upload_1">微信头像
                  </div>
            </li> -->
             <li>         
                <label class="text" ><i>*</i>微信名称：</label>
                  <input type="text" name="username" value="{$data.username}">
            </li>
            <li>         
                <label class="text" ><i>*</i>业务员编码：</label>
                <input type="text" name="user_num" value="{$data.user_num}">
                <!-- <input type="hidden" name="qcode" value="{$data.qcode}"> -->
                <input type="hidden" name="uid" value="{$data.uid}">
            </li>
            <li>         
                <label class="text" ><i>*</i>手机号码：</label>
                  <input type="text" name="mobile" value="{$data.mobile}">
            </li>
            <li>         
                <label class="text" >帐号状态：</label>
                  <!-- <input type="text"> -->
                  <if condition="$data[status] eq 1" >
                    <input name="status" value="1" type="radio" id="zt_show" checked="checked">
                    <label for="zt_show">正常</label>
                    <input name="status" value="0" type="radio" id="zt_hide">
                    <label for="zt_hide">禁用</label>
                    <else/>
                    <input name="status" value="1" type="radio" id="zt_show">
                    <label for="zt_show">正常</label>
                    <input name="status" value="0" type="radio" id="zt_hide" checked="checked">
                    <label for="zt_hide">禁用</label>
                  </if>
            </li>
            <li>         
                <label class="text" >备注：</label>
                <textarea name="remarks">
                  {$data.remarks}
                </textarea>
            </li>
            <li>         
                <label class="text" >&nbsp;</label>
                  <button>保存</button>
                  <button class="mgl30">替换业务员</button>
                  <span class="col-333 mgl30 cur-p del_ywy open_bnt" uid="{$data.uid}">删除此业务员</span>
            </li>
          </ul>
          </form>
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
        <button class="btn-lan-80 mgw15 sure_button" ex='' >确定</button>
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
       //单个要删除的ID复制到确定按钮
  $(".open_bnt").click(function () {
  var uid=$(this).attr('uid');
    // alert(yid);
    // exit;
          $(".protection").show(0);
          $(".protection .tanchu_box").show(0);
          $('.sure_button').attr('ex',uid)

      });
  //执行AJAX删除操作
  $('.sure_button').click(function(){
    var uid=$(this).attr('ex');
    // alert(yid);
    // exit;
                  $.ajax({
                  type: 'post',
                  url: "{:U('del')}",
                  data: {'uid':uid},
                  dataType: 'json',
                  async: false,
                  success: function(data)
                  {
                    if(data)
                    {
                      window.location.href = "{:U('selasman')}";
                    }else{
                     
                    }
                  }
                });
            });
  });
</script>
</html>
<style>
  #zt_show  {
    width:15px;
  }
  #zt_hide {
    width:15px;
  }
</style>