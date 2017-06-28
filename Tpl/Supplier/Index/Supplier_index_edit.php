<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>展厅修改-900库</title>
	<link rel="stylesheet" href="__SUP_PUBLIC__/css/style.css">
	<style>
	</style>
</head>
<body>
<!-- 顶部 -->
	<div class="x_header mgb30">
		<div class="box-1">
			<a href="{:U('Store/zhuye')}"><div class="logo">
				<img src="__SUP_PUBLIC__/images/logo.png" alt="">
			</div></a>
			<span class="tit">展厅修改</span>
		</div>
	</div>
<!-- 修改 -->
	<div class="box-3 x_reg">
		<div class="x_reg_title clearfix">
			<img  src="__UPLOADS__/supplier/headimg/{$Think.session.sup_headimg}" width="70" height="70" style="border-radius: 50%;">
            <span class="">{$Think.session.sup_username}</span>
		</div>
		<form action="{:U('Index/edit')}" method="post" enctype="multipart/form-data" class="reg_form registerform">
            <ul class="lis_ul">
            	<li class="tit">
                    <label class="text" >展厅基本信息:</label>
                </li>
                <li >
                    <label class="text" ><i>*</i>展厅名称:</label>
                    <input  type="text" disabled="disabled" value='{$ex.ex_name}' name="ex_name"  >
                </li>
                <li class="citys">
                    <label class="text" ><i>*</i>主营类目:</label>
                    <select name='mcid'  >
                    <volist name='cate' id='c'> 
                        <option value='{$c.mcid}' <?php if($ex['mc_name']==$c['mc_name']){
                            echo "selected='selected'";
                        }?>  >{$c.mc_name}</option>
                    </volist>
                    </select> 
                </li>
                <li class="citys">
                    <label class="text" ><i>*</i>经营模式:</label>
                    <select name='mid'  >
                    <volist name='model' id='m'>
                        <option value='{$m.mid}' <?php if($ex['model_name']==$m['model_name']){
                            echo "selected='selected'";
                        }?> >{$m.model_name}</option>
                    </volist>
                    </select> 
                </li>
                <li class="tit">
                    <label class="text" >公司基本信息:</label>
                </li>
                <li >
                    <label class="text" ><i>*</i>公司名称:</label>
                    <input  type="text" disabled="disabled" value='{$ex.company}'  name="company" datatype="*">
                    <input type='hidden' name='exid' value='{$ex.exid}' />
                </li>
                <li id="demo1" class="citys" >
                    <label class="text" ><i>*</i>公司地址:</label>
                    <select name="province"></select>
                    <input type='hidden'  class='pcode' name='p' pcode="{$p}" ccode="{$cc}" acode="{$a}">
                   
                    <select class="mgl10 mgr10" name="city"></select>
                    <!-- <input type='hidden' class='ccode' name='c' value="{$c}"> -->
                   <!--  <option>{$ex.city}</option> -->
                    <select name="area"></select>
                 <!--    <input type='hidden' class='acode' name='a' value="{$a}"> -->
                  <!--   <option>{$ex.area}</option> -->
                    <br><input class="mgt20" value='{$ex.street}' type="text" name="street" datatype="*">
                </li>
                <li >
                    <label class="text" ><i>*</i>法人姓名:</label>
                    <input  type="text" disabled="disabled" name="username" value='{$ex.username}'  datatype="*2-4">
                </li>
                <li >
                    <label class="text" ><i>*</i>公司电话:</label>
                    <input  type="text" value='{$ex.tel}'  name="tel" datatype="m" nullmsg="请输入手机号" errormsg="请输入正确的手机号">
                </li>
                <li class="upload_li">
                    <label class="text" ><i>*</i>营业执照:</label>
                    <div class="upload_sm">
                        <!-- <input disabled="disabled" type="file" src="__UPLOADS__/image{$ex.license}" name='thumb' class="upload_1"> -->
                        <img src="__UPLOADS__/supplier/zhizhao/{$ex.license}" style="width:120px;height:120px;" >
                    </div>
                    
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
                    <input type="submit" value=立即修改认证 />
                </div>
            </div>
            <div class="shuoming ">
                <h5 class="col-red">说明：提交的企业资料需要等待平台审核，才可进行业务交易。再此之前您可以进行展厅装修，商品上架等操作。</h5>
               
            </div>
        </form> 
	</div>
</body>
<script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="http://validform.rjboy.cn/Validform/v5.3.2/Validform_v5.3.2_min.js"></script>
<script  src="__SUP_PUBLIC__/js/jquery.city.js"></script>
<script type="text/javascript"> 
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
        var p=$(".pcode").attr('pcode'); 
        var c=$(".pcode").attr('ccode'); 
        var a=$(".pcode").attr('acode'); 
      
        if(a){
            $('.citys').citys({code:a});
        }else{
            $('.citys').citys({code:c});
        }
        



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