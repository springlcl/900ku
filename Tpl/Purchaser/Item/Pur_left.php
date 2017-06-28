		<div class="left_con fl">
			<div class="head_info clearfix mgt10">
				<div class="head_img bor-r50 mgl15 fl">
					<img src="__UPLOADS__/purchaser/headimg/{$Think.session.pur_headimg}" alt="">
				</div>
				<div class="text fl mgt15 fs-14 mgl10">
					<h3 class="mgb10">{$Think.session.pur_username}</h3>
					<a href="{:U('login/quit')}"><span class="col-slv">退出</span></a>
				</div>
			</div>
			<ul class="nav">
				<li <if condition="'__CONTROLLER__' eq '__MODULE__'.'/Admit'">class="active"</if>>
		            <div class="one-level pdw20 clearfix">
		                <i class="ico_all I_zhunru"></i>
		                准入管理
		                <span class="ico_all I_jiantou_botton fr"></span>
		            </div>
		            <dl class="two-level">
		                <a href="{:U('admit/ac_provider')}">
		                <if condition="'__ACTION__' eq '__CONTROLLER__'.'/ac_provider'"><dd class="active"><else /><dd></if>
		                    <i class="mgr5">•</i>准入供应商</dd></a>
		                <a href="{:U('admit/ac_commodity')}">
		                <if condition="'__ACTION__' eq '__CONTROLLER__'.'/ac_commodity'"><dd class="active"><else /><dd></if>
		                    <i class="mgr5">•</i>准入商品</dd></a>
		                <a href="{:U('admit/ification')}">
		                <if condition="'__ACTION__' eq '__CONTROLLER__'.'/ification'"><dd class="active"><else /><dd></if>
		                    <i class="mgr5">•</i>商品分类</dd></a>
		            </dl>
		        </li>
				<li class="active">
					<div class="one-level pdw20 clearfix">
						<i class="ico_all I_xiangmu"></i>
						公司项目
						<span class="ico_all I_jiantou_top fr"></span>
					</div>
					<dl class="two-level">
						<a href="{:U('Index/Pur_iteming')}"><if condition="'__ACTION__' eq '__CONTROLLER__'.'/Pur_iteming'"><dd class="active"><else /><dd></if><i class="mgr5">•</i>进行中项目</dd></a>
						<a href="{:U('Index/Pur_olditem')}"><if condition="'__ACTION__' eq '__CONTROLLER__'.'/Pur_olditem'"><dd class="active"><else /><dd></if><i class="mgr5">•</i>历史项目</dd></a>
					</dl>
				</li>
				<li>
					<div class="one-level pdw20 clearfix">
						<i class="ico_all I_caiwu"></i>
						财务管理
						<span class="ico_all I_jiantou_botton fr"></span>
					</div>
					<dl class="two-level">
		                <!-- <a href="0501-财务-统计.html"><dd><i class="mgr5">•</i>统计</dd></a> -->
		                <a href="{:U('Financial/statistics')}">
		                <if condition="'__ACTION__' eq '__CONTROLLER__'.'/statistics'"><dd class="active"><else /><dd></if>
		                    <i class="mgr5">•</i>统计</dd></a>
		                <!-- <a href="0502-财务-订单应付款查询.html"><dd><i class="mgr5">•</i>应付款查询</dd></a> -->
		                <a href="{:U('Financial/paid')}">
		                <if condition="'__ACTION__' eq '__CONTROLLER__'.'/paid'"><dd class="active"><else /><dd></if>
		                    <i class="mgr5">•</i>已付款查询</dd></a>
		                <!-- <a href="0504-财务-付款记录.html"><dd><i class="mgr5">•</i>付款记录</dd></a> -->
		                <a href="{:U('Financial/record')}">
		                <if condition="'__ACTION__' eq '__CONTROLLER__'.'/record'"><dd class="active"><else /><dd></if>
		                    <i class="mgr5">•</i>付款记录</dd></a>
		                <!-- <a href="0505-财务-发票待确认03.html"><dd><i class="mgr5">•</i>发票管理</dd></a> -->
		                <a href="{:U('Financial/admi')}">
		                <if condition="'__ACTION__' eq '__CONTROLLER__'.'/admi'"><dd class="active"><else /><dd></if>
		                    <i class="mgr5">•</i>发票管理</dd></a>
		                <!-- <a href="0506-发票资质.html"><dd><i class="mgr5">•</i>发票资质</dd></a> -->
		                <a href="{:U('Financial/qualifi')}">
		                <if condition="'__ACTION__' eq '__CONTROLLER__'.'/qualifi'"><dd class="active"><else /><dd></if>
		                    <i class="mgr5">•</i>发票信息</dd></a>
		            </dl>
				</li>
				<li>
					<div class="one-level pdw20 clearfix">
						<i class="ico_all I_dingdan"></i>
						订单管理
						<span class="ico_all I_jiantou_botton fr"></span>
					</div>
					<dl class="two-level">
						<a href="0601订单管理-准入.html"><dd class=""><i class="mgr5">•</i>准入订单</dd></a>
						<a href="0601-订单管理-非准入01.html"><dd><i class="mgr5">•</i>非准入订单</dd></a>
						<a href="0604-退货列表-01.html"><dd><i class="mgr5">•</i>退货列表</dd></a>
					</dl>
				</li>
				<li>
					<div class="one-level pdw20 clearfix">
						<i class="ico_all I_yuangong"></i>
						员工管理
						<span class="ico_all I_jiantou_botton fr"></span>
					</div>
					<dl class="two-level">
		                <a href="{:U('Employee/stuffManage')}"><dd class="<if condition="'__ACTION__' eq '__CONTROLLER__'.'/stuffManage'">active</if>"><i class="mgr5">•</i>员工管理</dd></a>
		                <a href="{:U('Employee/roleList')}"><dd  class="<if condition="'__ACTION__' eq '__CONTROLLER__'.'/roleList'">active</if>"><i class="mgr5">•</i>权限设置</dd></a>
		            </dl>
				</li>
			</ul>
		</div>