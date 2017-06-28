<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>0301-采购商认证</title>
	<link rel="stylesheet" href="__PUR_PUBLIC__/css/reset.css">
	<link rel="stylesheet" href="__PUR_PUBLIC__/css/icons.css">
	<link rel="stylesheet" href="__PUR_PUBLIC__/css/style.css">
	<style type="text/css">
		
	</style>
</head>
<body>
	<div class="renzhen_0301">
		<div class="renzhen_form bg-fff">
			<div class="top bg-f5">
				<img src="__UPLOADS__/purchaser/headimg/{$Think.session.pur_headimg}" alt="">
				<span class="fs-14">{$Think.session.pur_username}</span>
			</div>
			<h3 class="pdh30 fs-24 fw600 center bor_bm1">采购商认证</h3>
			<form action="{:U('Login/reg')}" method="post" enctype="multipart/form-data" class="yanzhengform">
				<ul>
					<li>
						<span class="tips"><i>*</i>公司名称:</span>
						<input type="text" class="btn-380x30" name="company"  datatype="*" nullmsg="请输入公司名称">
					</li>
					<li class="citys">
						<span class="tips"><i>*</i>项目联系地址:</span>
						<select name="province" id="" class="btn-120x30 mgr10">
							<option value="1">选择省</option>
						</select><select name="city" id="" class="btn-120x30 mgr10">
							<option value="1">选择市</option>
						</select><select name="area" id="" class="btn-120x30 mgr10">
							<option value="1">选择区</option>
						</select>
					</li>
					<li>
						<span class="tips">&nbsp;</span>
						<input type="text" name="street" class="btn-380x30" placeholder="请填写具体地址"  datatype="*" nullmsg="请输入详细地址">
					</li>
					<li class="upload_li">
	                    <span class="tips"><i>*</i>营业执照:</span>
	                    <div class="upload_sm" id="pic">
	                        <input type="file" name="thumb" id="file" class="upload_1" datatype="*" nullmsg="请上传营业执照">
	                    </div>
					</li>
					<li>
						<span class="tips"><i>*</i>经营人姓名:</span>
						<input type="text" name="legal_person" class="btn-380x30" placeholder="请填写真实姓名"  datatype="*" nullmsg="请输入真实姓名">
					</li>
					<li class="fsyzm">
						<span class="tips"><i>*</i>手机号码:</span>
						<input type="text" id="mobile" name="tel" class="btn-300x30" placeholder="请输入手机号码"  datatype="m" nullmsg="请输入手机号码">
						<input class="btn-80x30 bor_1ddd bg-ccc sendsms" type="button" style="cursor:pointer;" value="发送验证码">
					</li>
					<li>
						<span class="tips"><i>*</i>输入验证码:</span>
						<input type="text" class="btn-380x30" name="smscode" placeholder="请输入验证码"  datatype="s4-6" nullmsg="请输入验证码">
					</li>
					<li>
						<span class="tips">&nbsp;</span>
						<input type="checkbox" name="checkbox" checked="true" id="tongyi"  datatype="*" nullmsg="同意协议才能继续"><label class="mgl10" for="tongyi">我已阅读幷同意<span class="col-slv">《900库采购商使用协议》</span></label>
					</li>
					<li class="yzdc">
						<span class="tips">&nbsp;</span>
						<span id="msgdemo2"></span>
					</li>
					<li class="center">
						<button class="fs-14 col-fff btn-150x40 bg-slv">立即注册认证</button><!-- <a href="0201-采购商首页-01.html"> 跳 转 </a> -->
					</li>
				</ul>
			</form>
		</div>
	</div>
</body>

<script type="text/javascript" src="__PUR_PUBLIC__/js/jquery.min.js"></script>
<script type="text/javascript" src="http://validform.rjboy.cn/Validform/v5.3.2/Validform_v5.3.2_min.js"></script>
<script  src="__PUR_PUBLIC__/js/jquery.city.js"></script>
<script>
    // 图片显示
    $('#file').bind('change',function(){
    var url=window.URL.createObjectURL(this.files[0]);
    //alert(url);
    $('#pic').attr('style','background:url('+url+')');
    });
	    // 城市选择
        $('.citys').citys({code:110000});
           // 验证
        $(".yanzhengform").Validform({
            tiptype:function(msg,o,cssctl){
                var objtip=$("#msgdemo2");
                cssctl(objtip,o.type);
                objtip.text(msg);
            }
        });

$(document).ready(function(){
    $(".sendsms").click(function(){
    	var mobile = $('#mobile').val();
    	if(!mobile)
    	{
    		alert('手机号不能为空！');
    		return false;
    	}
        $.ajax({
          type: 'post',
          url: "{:U('login/sendsms')}",
          data: {'mobile':mobile},
          dataType: 'json',
          async: false,
          success: function(data)
          {
            if(data == 1)
            {
              alert('发送成功！');
            }else{
              alert('发送失败！');
            }
          }
        });
   })
});



</script>
</html>