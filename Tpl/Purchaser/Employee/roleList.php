<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>角色列表</title>
	<link rel="stylesheet" href="__PUR_PUBLIC__/css/reset.css">
	<link rel="stylesheet" href="__PUR_PUBLIC__/css/icons.css">
	<link rel="stylesheet" href="__PUR_PUBLIC__/css/style.css">
	<link rel="stylesheet" href="__PUBLIC__/plugins/layui/css/layui.css">
</head>
<body>
	<div class="wh1200auto clearfix" url="{$url}">
        <!-- 左边导航 -->
        <include file="Public/leftBar" />
		<!-- 右边内容 -->
		<div class="right_content fl">
			<div class="right_con_down bg-fff invoice_0505">
				<div class="cont_lump cont_lump_Customer staffSetup bor_bm1">
					<div class="title_ty">
						<span class="tit_name">权限管理</span>
					</div>
					<div class="con">
						<div class="clearfix pdh10 lbj">
							<form action="{:U('authManage1')}" method="post" class="kucun_Sou fl mgr10">
								<input name="keywords" type="text" class="sou" placeholder="角色名称">
								<button type="button" class="sous"><i></i></button>
							</form>
							<button id="newRole" type="button" class="button q_gr mgr20 fr" style="width: 120px;">新增角色</button>
						</div>
						<table class="shezhi">
                            <thead>
						        <tr class="font-weight600">
							        <th><p>角色</p></th>
							        <th>描述</th>
							        <th>操作</th>
						        </tr>
                            </thead>
                            <tbody>
                                <volist name="role" id="r">
						        <tr rid="{$r.role_id}">
							        <td class="clearfix"><p class="col-lan">{$r.role_name}</p></td>
							        <td>{$r.description}</td>
							        <td><span action="edit">修改</span><span class="kong" action="delete">删除</span></td>
						        </tr>
                                </volist>
                            </tbody>
						</table>
					</div>
				</div>
				<div class="record_info">版权所有:900库 [京ICP备1000000001号-1]</div>
			</div>
		</div>
	</div>
</body>
<script type="text/javascript" src="__PUBLIC__/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/plugins/layui/layui.js"></script>
<script type="text/javascript" src="__PUR_PUBLIC__/js/js.js"></script>
<script type="text/javascript" src="__PUR_PUBLIC__/js/auth.js"></script>
<script type="text/javascript">
    $('#newRole').click(function () {
        location.href='{:U('addRole')}';
    })
</script>
</html>