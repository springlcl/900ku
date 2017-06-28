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
        <div class="cont_lump cont_lump_Customer staffSetup bor_bm1">
          <div class="cont_title">
            <span>员工账号设置</span> 
          </div>
          <form method="post" action="" id="iform" enctype="multipart/form-data">
          <ul class="lump">
            <li>         
                <label class="text" ><i>*</i>账户昵称：</label>
                  <input type="text" name="username" value="{$data.username}">
            </li>
            <li>         
                <label class="text" ><i>*</i>联系人：</label>
                  <input type="text" name="real_name" value="{$data.real_name}">
            </li>
            <li>         
                <label class="text" ><i>*</i>手机号：</label>
                  <input type="text" name="mobile" value="{$data.mobile}">
            </li>
<!--             <li>         
                <label class="text" ><i>*</i>绑定微信：</label>
                <div class="wx_img ">
                  <img src="__SUP_PUBLIC__/images/index_end_tbc.png" alt="">
                </div>
            </li> -->
            <input type="hidden" name="uid" value="{$data.uid}">
             <!-- <li class="upload_li">         
                <label class="text" ><i>*</i>绑定微信:</label>
                  <div class="upload_sm">
                    <input type="file" name="file" id="file" class="upload_1">
                  </div>
            </li> -->
            <li>         
                <label class="text" >邮箱：</label>
                  <input type="text" name="email" value="{$data.email}">
            </li>
            <li>         
                <label class="text" ><i>*</i>员工编号：</label>
                  <input type="text" name="user_num" value="{$data.user_num}">
            </li>
          </ul>
          <div class="cont_title">
            <span>权限设置设置</span> 
          </div>
          <ul class="lump">
            <li>         
                <label class="text" ><i>*</i>角色权限：</label>
                <div class="fl li_right_box">
                  <div>
                    <input type="checkbox"><label for="">业务员</label>
                    <input type="checkbox"><label for="">仓库管理员</label>
                    <input type="checkbox"><label for="">财库管理员</label>
                    <input type="checkbox"><label for="">订单管理员</label>
                    <input type="checkbox"><label for="">系统管理员</label>
                  </div>
                  <p class="mgt10 col-999">注意请勾选此帐号属于的【角色权限】，对应的【权限明显】即可选中；</p>
                  <p class="mgt10 col-999">如果您还未设置过【角色权限】，请先设置角色，比如仓库管理员、财务管理员、业务管理员</p>
                </div>
            </li>
            <li class="detail">         
                <label class="text" ><i>*</i>极限明细：</label>
                <div class="fl li_right_box">
                  <div class="fl">订单</div>
                  <dl class="fl">
                    <dd>查看订单列表</dd>
                    <dd>撤销订单审核通过</dd>
                    <dd>查看出库/发货单</dd>
                    <dd>查看订单付款</dd>
                    <dd>查看退货单</dd>
                    <dd>退货单收货与退款</dd>
                    <dd>退货商品明细</dd>
                  </dl>
                  <dl class="fl">
                    <dd>代客户下单</dd>
                    <dd>修改订单</dd>
                    <dd>确认审核出库/发货</dd>
                    <dd>确认付款到账</dd>
                    <dd>代客户下退货单</dd>
                    <dd>订单产品明细</dd>
                  </dl>
                  <dl class="fl">
                    <dd>审核订单</dd>
                    <dd>订单核准（发货后仍可修改）</dd>
                    <dd>确认审核收货</dd>
                    <dd>添加收款记录</dd>
                    <dd>审核退货单</dd>
                    <dd>出库商品明细</dd>
                  </dl>
                </div>
            </li>
            <li class="btn">         
                <label class="text" >&nbsp;</label>
                  <button class="btn-lan-160">保存</button>
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
<script src="__SUP_PUBLIC__/js/ind.js"></script>
</html>
<style>

</style>