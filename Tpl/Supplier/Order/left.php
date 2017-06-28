<div id="app-second-sidebar">
    <div class="zg_scroll"></div>
    <div >
      <nav>
      <dl>
        <dt class="second-sidebar-title">订单管理</dt>
        <!-- <a href="0501-准入订单.html"><dd class="active">准入订单</dd></a> -->
        <a href="{:U("Order/access_order",array('exid'=>$_GET['exid']))}"><if condition="'__ACTION__' eq '__CONTROLLER__'.'/access_order'"><dd class="active"><else /><dd></if>准入订单</dd></a>
        <!-- <a href="0501-准入订单-非准入.html"><dd>非准入订单</dd></a> -->
        <a href="{:U("Order/not_order",array('exid'=>$_GET['exid']))}"><if condition="'__ACTION__' eq '__CONTROLLER__'.'/not_order'"><dd class="active"><else /><dd></if>非准入订单</dd></a>
        <!-- <a href="0502-退货列表01.html"><dd>退货列表</dd></a> -->
        <a href="{:U("Order/return_list",array('exid'=>$_GET['exid']))}"><if condition="'__ACTION__' eq '__CONTROLLER__'.'/return_list'"><dd class="active"><else /><dd></if>退货列表</dd></a>        
        <!-- <a href="0504-加星订单.html"><dd>加星订单</dd></a> -->
        <a href="{:U("Order/add_order",array('exid'=>$_GET['exid']))}"><if condition="'__ACTION__' eq '__CONTROLLER__'.'/add_order'"><dd class="active"><else /><dd></if>加星订单</dd></a>                
        <dt class="second-sidebar-title">统计</dt>
        <!-- <a href="0505-商品统计.html"><dd>商品统计</dd></a> -->
        <a href="{:U("Order/modity_statis",array('exid'=>$_GET['exid']))}"><if condition="'__ACTION__' eq '__CONTROLLER__'.'/modity_statis'"><dd class="active"><else /><dd></if>商品统计</dd></a>                
        <!-- <a href="0506-订单统计.html"><dd>订单统计</dd></a> -->
        <a href="{:U("Order/order_statis",array('exid'=>$_GET['exid']))}"><if condition="'__ACTION__' eq '__CONTROLLER__'.'/order_statis'"><dd class="active"><else /><dd></if>订单统计</dd></a>                
        <dt class="second-sidebar-title">财务管理</dt>
        <!-- <a href="0507-订单应收款.html"><dd>订单应收款</dd></a> -->
        <a href="{:U("Order/ar_order",array('exid'=>$_GET['exid']))}"><if condition="'__ACTION__' eq '__CONTROLLER__'.'/ar_order'"><dd class="active"><else /><dd></if>订单应收款</dd></a>  
        <a href="{:U("Order/salesman",array('exid'=>$_GET['exid']))}"><if condition="'__ACTION__' eq '__CONTROLLER__'.'/salesman'"><dd class="active"><else /><dd></if>业务员所得</dd></a>                      
        <!-- <a href="0508-收款记录.html"><dd>收款记录</dd></a> -->
        <a href="{:U("Order/ct_recorde",array('exid'=>$_GET['exid']))}"><if condition="'__ACTION__' eq '__CONTROLLER__'.'/ct_recorde'"><dd class="active"><else /><dd></if>收款记录</dd></a>                       
        <!-- <a href="0509-收支明细.html"><dd>收支明细</dd></a> -->
        <a href="{:U("Order/detail",array('exid'=>$_GET['exid']))}"><if condition="'__ACTION__' eq '__CONTROLLER__'.'/detail'"><dd class="active"><else /><dd></if>收支明细</dd></a>                               
        <dt class="second-sidebar-title">发票</dt>
       <!--   <a href="{:U("Order/rec_invoice",array('exid'=>$_GET['exid']))}"><if condition="'__ACTION__' eq '__CONTROLLER__'.'/rec_invoice'"><dd class="active"><else /><dd></if>订单发票记录</dd></a> -->
        <!-- <a href="0510-待开发票-02.html"><dd>待开发票</dd></a> -->
        <a href="{:U("Order/open_invoice",array('exid'=>$_GET['exid']))}"><if condition="'__ACTION__' eq '__CONTROLLER__'.'/open_invoice'"><dd class="active"><else /><dd></if>待开发票</dd></a>                               
        <!-- <a href="0511-待确认发票03.html"><dd>待确认发票</dd></a> -->
        <a href="{:U("Order/cf_invoice",array('exid'=>$_GET['exid']))}"><if condition="'__ACTION__' eq '__CONTROLLER__'.'/cf_invoice'"><dd class="active"><else /><dd></if>待确认发票</dd></a>                               
        <!-- <a href="0512-已确认发票04.html"><dd>已确认发票</dd></a> -->
        <a href="{:U("Order/confirm_invoice",array('exid'=>$_GET['exid']))}"><if condition="'__ACTION__' eq '__CONTROLLER__'.'/confirm_invoice'"><dd class="active"><else /><dd></if>已确认发票</dd></a>                               
       <!--  <a href="0513-已拒绝发票05.html"><dd>已拒绝发票</dd></a> -->
        <a href="{:U("Order/refuse_invoice",array('exid'=>$_GET['exid']))}"><if condition="'__ACTION__' eq '__CONTROLLER__'.'/refuse_invoice'"><dd class="active"><else /><dd></if>已拒绝发票</dd></a>                               
      </dl>
      </nav>
    </div>
  </div>