<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>0608</title>
	<link rel="stylesheet" href="__PUR_PUBLIC__/css/reset.css">
	<link rel="stylesheet" href="__PUR_PUBLIC__/css/icons.css">
	<link rel="stylesheet" href="__PUR_PUBLIC__/css/style.css">
</head>
<body>
	<div class="wh1200auto clearfix">
        <!-- 左边导航 -->
        <include file="Public/leftBar" />
		<!-- 右边内容 -->
		<div class="right_content fl">
			<div class="right_con_down bg-fff invoice_0505">
				<div class="cont_lump cont_lump_Customer staffSetup">
                    <div class="title_ty">
                        <span class="tit_name">添加角色</span>
                    </div>
                    <form action="{:U('addRole')}" method="post" >
                    <ul class="lump1">
                        <li class="">         
                            <label class="text" ><i>*</i>角色名称:</label>
                            <input name="name" type="text " class="input">
                        </li>
                        <li>         
                            <label class="text" ><i>*</i>角色描述:</label>
                            <input name="desc" type="text">
                        </li>
                        <volist name="permission" id="per">
                        <li>         
                            <label class="text" ><i>*</i>{$per.per_name}:</label>
                            <dl class="checks_box" parent="{$per.per_id}">
                                <volist name="per['son']" id="p">
                                    <dd><input name="per[]" type="checkbox" value="{$p.per_id}" id="per{$p.per_id}"/><label <eq name="p['per_show']" value="1">class="col-lan"</eq> for="per{$p.per_id}">{$p.per_name}</label></dd>
                                </volist>
                            </dl>
                            <div class="check_all"><input type="checkbox" id="checks_all{$per.per_id}"><label for="checks_all{$per.per_id}">全选</label></div>
                        </li>
                        </volist>
                        <li class="btn">         
                            <label class="text" >&nbsp;</label>
                            <button type="submit" class="btn-lan-160 bg-slv">保存</button>
                            <button type="button" class="btn-lan-160 mgl20 checksReset bg-slv">重置</button>
                        </li>
                    </ul>
                    </form>
                </div>
				<div class="record_info">版权所有:900库 [京ICP备1000000001号-1]</div>
			</div>
		</div>
	</div>
</body>
<script type="text/javascript" src="__PUBLIC__/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="layer/layer.js"></script>
<script type="text/javascript" src="laydate/laydate.js"></script>
<script type="text/javascript" src="__PUR_PUBLIC__/js/js.js"></script>
<script type="text/javascript" src="__PUR_PUBLIC__/js/auth.js"></script>
</html>