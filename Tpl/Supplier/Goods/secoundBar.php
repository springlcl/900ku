<div id="app-second-sidebar">
	<div class="zg_scroll"></div>
	<div >
		<nav>
			<dl>
				<dt class="second-sidebar-title">商品管理</dt>
				<a href="{:u('publish')}"><if condition="'__ACTION__' eq '__CONTROLLER__'.'/publish'"><dd class="active"><else /><dd></if>发布商品</dd></a>
				<a href="{:u('onsell')}"><if condition="'__ACTION__' eq '__CONTROLLER__'.'/onsell'"><dd class="active"><else /><dd></if>出售中的商品</dd></a>
				<a href="{:u('soldOut')}"><if condition="'__ACTION__' eq '__CONTROLLER__'.'/soldOut'"><dd class="active"><else /><dd></if>已售馨的商品</dd></a>
				<a href="{:u('stock')}"><if condition="'__ACTION__' eq '__CONTROLLER__'.'/stock'"><dd class="active"><else /><dd></if>仓库中的商品</dd></a>
				<a href="{:u('group')}"><if condition="'__ACTION__' eq '__CONTROLLER__'.'/group'"><dd class="active"><else /><dd></if>商品分组</dd></a>
				<a href="{:u('alert')}"><if condition="'__ACTION__' eq '__CONTROLLER__'.'/alert'"><dd class="active"><else /><dd></if>库存报警<gt name="warning" value="0"><span style="border: 3px solid #ff1b00;border-radius: 10px;width:20px;height: 20px;background-color: #ff1b00;color: #ffffff;margin-left:10px; ">{$warning}</span></gt></dd></a>
				<a href="{:u('evaluate')}"><if condition="'__ACTION__' eq '__CONTROLLER__'.'/evaluate'"><dd class="active"><else /><dd></if>商品评价</dd></a>
			</dl>
		</nav>
	</div>
</div>