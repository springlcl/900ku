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
<!-- 顶部 -->
	<div class="x_header mgb30">
		<div class="box-1">
			<a href="index.htnl"><div class="logo">
				<img src="__SUP_PUBLIC__/images/logo.png" alt="">
			</div></a>
			<span class="tit">创建展厅</span>
		</div>
	</div>
<!-- 注册 -->
	<div class="box-3 x_reg">
		<div class="x_reg_title clearfix">
			<img  src="__UPLOADS__/supplier/headimg/{$Think.session.sup_headimg}" width="70" height="70" style="border-radius: 50%;">
			<span class="">{$Think.session.sup_username}</span>
		</div>
		<form action="{:U('Store/Reg_add')}" method="post" enctype="multipart/form-data" class="reg_form registerform">
            <ul class="lis_ul">
            	<li class="tit">
                    <label class="text" >展厅基本信息:</label>
                </li>
                <li >
                    <label class="text" ><i>*</i>展厅名称:</label>
                    <input  type="text" name="ex_name" datatype="*" >
                </li>
                <li class="citys">
                    <label class="text" ><i>*</i>主营类目:</label>
                    <select name='mcid'  datatype="*">
                    <volist name='cate' id='c'> 
                        <option value='{$c.mcid}'>{$c.mc_name}</option>
                    </volist>
                    </select> 
                </li>
                <li class="citys">
                    <label class="text" ><i>*</i>经营模式:</label>
                    <select name='mid'  datatype="*"> 
                    <volist name='model' id='m'>
                        <option value='{$m.mid}'>{$m.model_name}</option>
                    </volist>
                    </select> 
                </li>
                <li class="tit">
                    <label class="text" >公司基本信息:</label>
                </li>
                <li >
                    <label class="text" ><i>*</i>公司名称:</label>
                    <input  type="text" name="company" datatype="*">
                </li>
                <li id="demo1" class="citys" >
                    <label class="text" ><i>*</i>公司地址:</label>
                    <select name="province"></select>
                    <select class="mgl10 mgr10" name="city"></select>
                    <select name="area"></select>
                </li>
                <li>
                    <label class="text" ><i>*</i>详细地址:</label>
                    <input  type="text" name="street" datatype="*">
                    
                </li>
                <li >
                    <label class="text" ><i>*</i>法人姓名:</label>
                    <input  type="text" name="username" datatype="*2-4">
                </li>
                <li >
                    <label class="text" ><i>*</i>公司电话:</label>
                    <input  type="text" name="tel" datatype="m" nullmsg="请输入手机号" errormsg="请输入正确的手机号">
                </li>
                <li class="upload_li">
                    <label class="text" ><i>*</i>营业执照:</label>
                    <div class="upload_sm" id="pic">
                        <input type="file" name='thumb' id='file' datatype="*" nullmsg="请上传营业执照">
                    </div>
                   <!--  upload_1 -->
                    <div class="tet">
                        <p>①请上传营业执照</p>
                        <p>②图片需清晰且年检章齐全（复印件需加盖红章）</p>
                        <p>③支持最大10MB的jpg/gif/png格式图片</p>
                    </div>
                </li>
            </ul>
            <div class="loginbtn mgt20">
                <div class="logcheckbox">
                        <input name="checkbox" type="checkbox" checked="true" id="tongyi" datatype="*" ><label for="tongyi">我已阅读同意</label><a href="##"><span class="col-lan   ">《900库服务和结算协议》</span></a>
                </div>
                <div class="mgt10 tishi"><span id="msgdemo2" style="margin-left:60px;"></span></div>
                <div class="loginsubmit">
                    <input type="submit" value=立即认证 />
                </div>
            </div>
            <div class="shuoming ">
                <h5 class="col-red">说明：提交的企业资料需要等待平台审核，才可进行业务交易。再此之前您可以进行展厅装修，商品上架等操作。</h5>
                <h6>1.一个账户可创建多个展厅，在创建多个展厅时公司基本信息默认继承，可修改。</h6>
                <h6>2.展厅创建后选择展厅模板，等待平台审核。审核通过之前可做除交易外所有操作。</h6>
                <h6>3.选择模板后跳到商品管理模块</h6>
            </div>
        </form> 
	</div>
</body>
<script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="http://validform.rjboy.cn/Validform/v5.3.2/Validform_v5.3.2_min.js"></script>
<script  src="__SUP_PUBLIC__/js/jquery.city.js"></script>
<script type="text/javascript"> 
    // 图片显示
    $('#file').bind('change',function(){
    var url=window.URL.createObjectURL(this.files[0]);
    //alert(url);
    $('#pic').attr('style','background:url('+url+')');
    });


    $(document).ready(function(){ 
        // 二级联动
        $("#province").change(function(){ 
            $("#province option").each(function(i,o){ 
                if($(this).attr("selected")){ 
                    $(".city").hide(); 
                    if ($(".city").eq(i).find("option").length>0) {
                        $(".city").eq(i).show(); 
                    }
                } 
            }); 
        }); 
        $("#province").change(); 
    // 城市选择
        $('.citys').citys({code:110000});

    // 点击上传图片
        function upload(name) {
            $(name).change(function() {
                var $file = $(this);
                var fileObj = $file[0];
                var windowURL = window.URL || window.webkitURL;
                var dataURL;
                var $img = $(this).parent();
                 
                if(fileObj && fileObj.files && fileObj.files[0]){
                    dataURL = windowURL.createObjectURL(fileObj.files[0]);
                    $img.css("background","url("+dataURL+")").html("");
                }else{
                    dataURL = $file.val();
                    var imgObj = document.getElementById("preview");
                    imgObj.style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale)";
                    imgObj.filters.item("DXImageTransform.Microsoft.AlphaImageLoader").attr("background","url("+dataURL+")"); 
                }
            });
        };
        upload(".upload_1");
    // 验证
        $(".registerform").Validform({
            tiptype:function(msg,o,cssctl){
                var objtip=$("#msgdemo2");
                cssctl(objtip,o.type);
                objtip.text(msg);
            }
        });

    }); 
</script> 
</html>