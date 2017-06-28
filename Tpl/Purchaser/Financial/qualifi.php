<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>发票信息</title>
	<link rel="stylesheet" href="__PUR_PUBLIC__/css/reset.css">
	<link rel="stylesheet" href="__PUR_PUBLIC__/css/icons.css">
	<link rel="stylesheet" href="__PUR_PUBLIC__/css/style.css">
</head>
<body>
	<div class="wh1200auto clearfix">
		<!-- 左边导航 -->
		<include file='Public/leftBar' />
		<!-- 右边内容 -->
		<div class="right_content fl">
			<div class="right_con_down bg-fff invoice_0506">
				<div class="title_ty">
					<span class="tit_name">发票信息</span>
				</div>
				<form action="{:U('financial/qualifi')}" method="post" class="yanzhengform">
					<ul class="w630 mgauto mgt30 invoice_aptitude">
						<h3 class="fs-24 center pdh35">发票信息</h3>
						<!-- <input type="hidden" value='{$is_item}' name="pid"> -->
						<li>
							<span class="tips">单位名称:</span>
							<input type="text" name="company" class="btn-380x30 pdl10" placeholder="必填" datatype="*" nullmsg="请输入单位名称" value="{$invoice['company']}">
						</li>
						<li>
							<span class="tips">纳税人识别号:</span>
							<input type="text" name="taxpayer_num" class="btn-380x30 pdl10" placeholder="必填" datatype="*" nullmsg="请输入纳税人识别号" value="{$invoice['taxpayer_num']}">
						</li>
						<li>
							<span class="tips">开户银行:</span>
							<input type="text" name="bank_name" class="btn-380x30 pdl10" placeholder="必填" datatype="*" nullmsg="请输入开户银行" value="{$invoice['bank_name']}">
						</li>
						<li>
							<span class="tips">银行账号:</span>
							<input type="text" name="bank_account" class="btn-380x30 pdl10" placeholder="必填" datatype="*" nullmsg="请输入银行账号" value="{$invoice['bank_account']}">
						</li>
						<li>
							<span class="tips">注册地址:</span>
							<input type="text" name="com_address" class="btn-380x30 pdl10" placeholder="必填" datatype="*" nullmsg="请输入注册地址" value="{$invoice['com_address']}">
						</li>
						<li>
							<span class="tips">注册电话:</span>
							<input type="text" name="com_tel" class="btn-380x30 pdl10" placeholder="必填" datatype="*" nullmsg="请输入注册电话" value="{$invoice['com_tel']}">
						</li>
						<li>
							<span class="tips">备注:</span>
							<textarea class="pd10" name="remark">{$invoice['remark']}</textarea>
						</li>
						<li><span class="tips"></span><span id="msgdemo2"></span></li>
						<li class="center pdb35">
							<!-- <button class='bg-slv btn-120x30 col-fff bor-r5'>确定</button> -->
							<?= (!$is_item==0)?"<button class='bg-slv btn-120x30 col-fff bor-r5'>确定</button>":'暂无数据';?>
							<!-- <button class="bg-f5 btn-120x30 bor-r5 mgl20">取消</button> -->
						</li>
					</ul>
				</form>
				<div class="record_info">版权所有:900库 [京ICP备1000000001号-1]</div>
			</div>
		</div>
	</div>
</body>
<script type="text/javascript" src="__PUR_PUBLIC__/js/jquery.min.js"></script>
<script type="text/javascript" src="__PUR_PUBLIC__/js/js.js"></script>
<script type="text/javascript" src="http://validform.rjboy.cn/Validform/v5.3.2/Validform_v5.3.2_min.js"></script>
<script>
        $(".yanzhengform").Validform({
            tiptype:function(msg,o,cssctl){
                var objtip=$("#msgdemo2");
                cssctl(objtip,o.type);
                objtip.text(msg);
            }
        });
</script>
</html>