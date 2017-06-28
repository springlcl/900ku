<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>0607</title>
	<link rel="stylesheet" href="__PUR_PUBLIC__/css/reset.css">
	<link rel="stylesheet" href="__PUR_PUBLIC__/css/icons.css">
	<link rel="stylesheet" href="__PUR_PUBLIC__/css/style.css">
</head>
<body>
	<div class="wh1200auto clearfix">
        <!-- 左边导航 -->
        <include file="Public/leftBar" />
		<!-- 右边内容 -->
		<div class="right_content fl" url="{$url}" action="add">
			<div class="right_con_down bg-fff invoice_0505">
				<div class="cont_lump cont_lump_Customer staffSetup">
					<div class="title_ty">
						<span class="tit_name active">新增员工</span>
					</div>
                    <form action="{:U('add')}" method="post" >
					<ul class="lump">
						<li>
						<label class="text"><i>*</i>员工选择：</label>
						<select name="user" class="l_xinzengxiala">
                            <option value="" selected="selected" disabled="disabled">请选择一名员工</option>
                            <volist name="users" id="u">
							<option value="{$u.uid}">{$u.real_name}</option>
                            </volist>
						</select>
						<button type="button" class="xinzengyuangong">新建员工</button>
						</li>
					</ul>
					<div class="title_ty">
						<span class="tit_name">权限设置设置</span>
					</div>
					<ul class="lump">
						<li class="role">
						<label class="text"><i>*</i>角色权限：</label>
						<div class="fl li_right_box">
							<div>
                                <volist name="role" id="r">
								<input id="role{$r.role_id}" type="radio" name="role" value="{$r.role_id}"><label for="role{$r.role_id}">{$r.role_name}</label>
                                </volist>
							</div>
							<p class="mgt10 col-999">
								注意请勾选此帐号属于的【角色权限】，对应的【权限明细】即可选中；
							</p>
							<p class="mgt10 col-999">
								如果您还未设置过【角色权限】，请先设置角色，比如仓库管理员、财务管理员、业务管理员
							</p>
						</div>
						</li>
						<li class="detail">
						<label class="text"><i>*</i>权限明细：</label>
						<div class="fl li_right_box">
						</div>
						</li>
						<li class="btn">
						    <label class="text">&nbsp;</label>
						    <button type="submit" class="btn-lan-160 bg-slv">保存</button>
						</li>
					</ul>
                    </form>
				</div>
				<div class="record_info">
					版权所有:900库 [京ICP备1000000001号-1]
				</div>
			</div>
		</div>
	</div>
</body>
<script type="text/javascript" src="__PUBLIC__/js/jquery-3.2.1.min.js"></script>
<!--<script type="text/javascript" src="layer/layer.js"></script>-->
<!--<script type="text/javascript" src="laydate/laydate.js"></script>-->
<script type="text/javascript" src="__PUR_PUBLIC__/js/js.js"></script>
<script type="text/javascript" src="__PUR_PUBLIC__/js/add.js"></script>

<script type="text/javascript">
    $('.xinzengyuangong').click(function () {
        location.href = '{:U('addDetail')}';
    })
</script>
</html>