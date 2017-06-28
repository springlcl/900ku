<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>员工管理</title>
	<link rel="stylesheet" href="__PUR_PUBLIC__/css/reset.css">
	<link rel="stylesheet" href="__PUR_PUBLIC__/css/icons.css">
	<link rel="stylesheet" href="__PUR_PUBLIC__/css/style.css">
    <link href="__PUBLIC__/plugins/layui/css/layui.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div class="wh1200auto clearfix">
		<!-- 左边导航 -->
        <include file="Public/leftBar" />
		<!-- 右边内容 -->
        <div class="right_content fl" url="{$url}">
            <div class="right_con_down bg-fff staff_0607">
                <div class="cont_lump cont_lump_Customer staffSetup ">
                    <div class="title_ty"><span class="tit_name">员工设置</span></div>
                    <div class="title_ty_smart clearfix condition">

                        <input name="account" type="text" class="btn-120x30 pdl10 mgl20 sou_inp" placeholder="姓名/帐号"><button class="sou_btn"><i class="ico_all I_fangdajing"></i></button>
                        <select class="btn-120x30 mgl20" name="project" id="project">
                            <eq name="user['item']" value="0"><option value="0">集团管理</option></eq>
                            <volist name="pro"  id="p">
                                <option value="{$p.pid}">{$p.pro_name}</option>
                            </volist>
                        </select>
                        <select class="btn-120x30 mgl20" name="role" id="role">
                            <volist name="role" id="r" empty="$e">
                                <option value="{$r.role_id}">{$r.role_name}</option>
                            </volist>
                        </select>
                        <select class="btn-120x30 mgl20" name="status" id="status">
                            <option value="0,1" selected="selected">全部状态</option>
                            <option value="1">启用</option>
                            <option value="0">禁用</option>
                        </select>
                        <button class="btn-60x30 bg-slv col-fff fs-14 mgl10">筛选</button>
                        <a href="{:U('add')}" ><button class="btn-120x30 bg-slv col-fff fs-14 mgl10 ">新增员工</button></a>
                    </div>
                </div>
                <div class="con">
                    <table class="shezhi">
                        <thead>
                        <tr class="font-weight600">
                            <th style="width: 70px;"> <!--<input type="checkbox" name="1" value="1" class="fl kucun_cb">--></th>
                            <th>微信信息</th>
                            <th>姓名</th>
                            <th>员工编码</th>
                            <th>手机</th>
                            <th>邮箱</th>
                            <th>所属项目</th>
                            <th>角色</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <volist name="users" id="u" empty="$empty">
                        <tr>
                            <td style="width: 70px;">
                                <input type="checkbox" name="userSel" value="{$u.uid}" class="fl kucun_cb">
                            </td>
                            <td class="clearfix line-h35">
                                <div class="tupian fl">
                                    <img src="__UPLOADS__/purchaser/headimg/{$u.headimg}" alt="">
                                </div>
                                <p class="col-lan fl mgl10">
                                    {$u.username}
                                </p>
                            </td>
                            <td>
                                {$u.real_name|default='未填写真实姓名'}
                            </td>
                            <td>
                                {$u.user_num|default='未分配员工编号'}
                            </td>
                            <td>
                                {$u.mobile|default='未填写手机号码'}
                            </td>
                            <td>
                                {$u.email|default='未填写邮箱地址'}
                            </td>
                            <td>
                                {$u.pro_name|default='未被分配项目'}
                            </td>
                            <td>
                                {$u.role_name|default='未被分配角色'}
                            </td>
                            <td>
<!--                                    <span class="delete">删除</span>-->
                                <a href="{:U('edit',array('uid'=>$u['uid']))}"><span>编辑</span></a>
                                <eq name="u['status']" value="1"><span class="kong function" status="0">启用</span><else/><span class="kong function" status="1">禁用</span></eq>
                            </td>
                        </tr>
                        </volist>
                        </tbody>
                    </table>
                    <div class="l_end fl">
                        <input type="checkbox" name="1" value="1" class="fl kucun_cb">
                        <button class="jinyong" status="1">禁用</button>
<!--                            <button class="shanchu">删除</button>-->
                    </div>
                    <ul class="pagination" id="pagination" rows="{$count}" cond=""></ul>
                    <div class="page_total fr" style="padding:33px 10px;">
                        共有<b style="color:#c6ffc6">{$count}</b>名员工
                    </div>
                    </div>
                </div>
                <div class="record_info">版权所有:900库 [京ICP备1000000001号-1]</div>
        	</div>
        </div>
    </div>
</body>
<script type="text/javascript" src="__PUBLIC__/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/plugins/layui/layui.js"></script>
<script type="text/javascript" src="__PUR_PUBLIC__/js/manage.js"></script>
<script type="text/javascript" src="__PUR_PUBLIC__/js/js.js"></script>
</html>