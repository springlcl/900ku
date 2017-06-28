<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>添加角色</title>
	<link rel="stylesheet" href="__SUP_PUBLIC__/css/style.css">
	<style>

	</style>
</head>
<body>
<!-- 左导一 -->
  <include file='Public/firstSidebar' />
<!-- 左导二 -->
 <include file='Set_left' />
<!-- 右侧 内容-->
    <div class="clearfix container" id="app-container">
        <div class="cont_lump cont_lump_Customer addRole bor_bm1">
          <div class="cont_title">
            <span>添加角色</span> 
          </div>
          <ul class="lump">
            <li class="">         
                <label class="text" ><i>*</i>角色名称:</label>
                <input type="text">
            </li>
            <li>         
                <label class="text" ><i>*</i>角色描述:</label>
                  <input type="text">
            </li>
            <li>         
                <label class="text" ><i>*</i>商品管理:</label>
                <dl class="checks_box">
                  <dd><input type="checkbox" id="box1_inp1"><label class="col-lan" for="box1_inp1">发布商品</label></dd>
                  <dd><input type="checkbox" id="box1_inp2"><label class="col-lan" for="box1_inp2">出售中的商品</label></dd>
                  <dd><input type="checkbox" id="box1_inp3"><label class="col-lan" for="box1_inp3">已售完商品</label></dd>
                  <dd><input type="checkbox" id="box1_inp4"><label class="col-lan" for="box1_inp4">仓库中的商品</label></dd>
                  <dd><input type="checkbox" id="box1_inp5"><label class="col-lan" for="box1_inp5">发布商品</label></dd>
                  <dd><input type="checkbox" id="box1_inp6"><label class="col-lan" for="box1_inp6">发布商品</label></dd>
                  <dd><input type="checkbox" id="box1_inp7"><label for="box1_inp7">发布商品</label></dd>
                  <dd><input type="checkbox" id="box1_inp8"><label for="box1_inp8">发布商品</label></dd>
                  <dd><input type="checkbox" id="box1_inp9"><label for="box1_inp9">发布商品</label></dd>
                  <dd><input type="checkbox" id="box1_inp10"><label for="box1_inp10">发布商品</label></dd>
                  <dd><input type="checkbox" id="box1_inp11"><label for="box1_inp11">发布商品</label></dd>
                </dl>
                <div class="check_all"><input type="checkbox" id="checks_all1"><label for="checks_all1">全选</label></div>
            </li>
            <li>         
                <label class="text" ><i>*</i>订单管理:</label>
                <dl class="checks_box">
                  <dd><input type="checkbox" id="box2_inp1"><label class="col-lan" for="box2_inp1">订单概括</label></dd>
                  <dd><input type="checkbox" id="box2_inp2"><label class="col-lan" for="box2_inp2">订单概括</label></dd>
                  <dd><input type="checkbox" id="box2_inp3"><label class="col-lan" for="box2_inp3">订单概括</label></dd>
                  <dd><input type="checkbox" id="box2_inp4"><label class="col-lan" for="box2_inp4">订单概括</label></dd>
                  <dd><input type="checkbox" id="box2_inp5"><label class="col-lan" for="box2_inp5">订单概括</label></dd>
                  <dd><input type="checkbox" id="box2_inp6"><label class="col-lan" for="box2_inp6">订单概括</label></dd>
                  <dd><input type="checkbox" id="box2_inp7"><label class="col-lan" for="box2_inp7">订单概括</label></dd>
                  <dd><input type="checkbox" id="box2_inp8"><label for="box2_inp8">订单概括</label></dd>
                  <dd><input type="checkbox" id="box2_inp9"><label for="box2_inp9">订单概括</label></dd>
                  <dd><input type="checkbox" id="box2_inp10"><label for="box2_inp10">订单概括</label></dd>
                  <dd><input type="checkbox" id="box2_inp11"><label for="box2_inp11">订单概括</label></dd>
                </dl>
                <div class="check_all"><input type="checkbox" id="checks_all2"><label for="checks_all2">全选</label></div>
            </li>
            <li>         
                <label class="text" >物流管理:</label>
                <dl class="checks_box">
                  <dd><input type="checkbox" id="box3_inp1"><label class="col-lan" for="box3_inp1">物流工具</label></dd>
                  <dd><input type="checkbox" id="box3_inp2"><label class="col-lan" for="box3_inp2">物流工具</label></dd>
                </dl>
                <div class="check_all"><input type="checkbox" id="checks_all3"><label for="checks_all3">全选</label></div>
            </li>
            <li>         
                <label class="text" >线下做单:</label>
                <dl class="checks_box">
                  <dd><input type="checkbox" id="box4_inp1"><label class="col-lan" for="box4_inp1">商家做单管理</label></dd>
                  <dd><input type="checkbox" id="box4_inp2"><label class="col-lan" for="box4_inp2">商家线下做事</label></dd>
                </dl>
                <div class="check_all"><input type="checkbox" id="checks_all4"><label for="checks_all4">全选</label></div>
            </li>
            <li>         
                <label class="text" >会员管理:</label>
                <dl class="checks_box">
                  <dd><input type="checkbox" id="box5_inp1"><label class="col-lan" for="box5_inp1">会员数据</label></dd>
                  <dd><input type="checkbox" id="box5_inp2"><label class="col-lan" for="box5_inp2">积分使用</label></dd>
                  <dd><input type="checkbox" id="box5_inp3"><label class="col-lan" for="box5_inp3">会员管理</label></dd>
                  <dd><input type="checkbox" id="box5_inp4"><label for="box5_inp4">修改店铺积分</label></dd>
                </dl>
                <div class="check_all"><input type="checkbox" id="checks_all5"><label for="checks_all5">全选</label></div>
            </li>
            <li class="btn">         
                <label class="text" >&nbsp;</label>
                  <button class="btn-lan-160">保存</button>
                  <button class="btn-lan-160 mgl20 checksReset">重置</button>
            </li>
          </ul>
          
        </div>
        <!-- 底部 == 版权 -->
        <div class="cont_lump con-foot">版权所有：900库 [京ICP备1000000001号-1</di>
    </div>

</body>
<script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="__SUP_PUBLIC__/js/ind.js"></script>
</html>