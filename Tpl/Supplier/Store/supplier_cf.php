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
    <div class="cont_lump cont_lump_Authentication">
      <div class="cont_title">
        <!-- <span>供应商认证--<i>（认证中）</i></span> --> 
        <if condition="$data.is_auth eq 1" >
        <span>供应商认证--<i>（已认证）</i></span>
        <else/>
        <span>供应商认证--<i>（认证中）</i></span>
        </if>
      </div>
      <table>
        <tr>
          <th>昵称</th>
          <th>{$str.username}</th>
        </tr>
         <tr>
          <td>展厅</td>
          <td>{$data.ex_name}</td>
        </tr>
         <tr>
          <td>主营类目</td>
          <td>{$category.mc_name}</td>
        </tr>
         <tr>
          <td>经营模式</td>
          <td>{$pattern.model_name}</td>
        </tr>
         <tr>
          <td>公司名称</td>
          <td>{$data.company}</td>
        </tr>
         <tr>
          <td>公司地址</td>
          <td>{$data.province}{$data.city}{$data.area}{$data.street}</td>
        </tr>
         <tr>
          <td>法人姓名</td>
          <td>{$data.username}</td>
        </tr>
         <tr>
          <td>公司电话</td>
          <td>{$data.tel}</td>
        </tr>
         <tr>
          <td rowspan="3">营业执照</td>
          <td class="img" rowspan="3"><img class="yes-click" src="__UPLOADS__/supplier/zhizhao/{$data.license}" alt="营业执照" title="点击查看大图"></td>
        </tr>
         <tr>
          
        </tr>
        <tr>
          
        </tr>
         <tr>
          
        </tr>
      </table>
    </div>
    <!-- 底部 == 版权 -->
    <div class="cont_lump con-foot">版权所有：900库 [京ICP备1000000001号-1</di>
  </div>
<div class="protection"><img class="rz" src="__SUP_PUBLIC__/images/renzheng.png" alt=""></div>
</body>
<script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/1.8.3/jquery.min.js"></script>
<script>
  $(function () {
    $(".yes-click").click(function () {
      var dateUrl = $(this)[0].src; 
      console.log(dateUrl);
      $(".protection").show(1);
      $(".protection img").attr('src',""+dateUrl+""); 
      $('.protection').click(function(){
        $(this).hide();
      })
    });
  })
</script>
</html>