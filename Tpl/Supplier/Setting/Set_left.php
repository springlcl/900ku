  <div id="app-second-sidebar">
    <div class="zg_scroll"></div>
    <div >
      <nav>
      <dl>
        <dt class="second-sidebar-title">展厅设置</dt>
        <a href="{:U('Setting/Ex_mess',array('exid'=>$_GET['exid']))}"><if condition="'__ACTION__' eq '__CONTROLLER__'.'/Ex_mess'"><dd class="active"><else /><dd></if>企业黄页</dd></a>
        <a href="{:U('Setting/Ex_note',array('exid'=>$_GET['exid']))}"><if condition="'__ACTION__' eq '__CONTROLLER__'.'/Ex_note'"><dd class="active"><else /><dd></if>消息通知管理</dd></a>
        <a href="{:U('Setting/Ex_id',array('exid'=>$_GET['exid']))}"><if condition="'__ACTION__' eq '__CONTROLLER__'.'/Ex_id'"><dd class="active"><else /><dd></if>账号设置</dd></a>
        <dt class="second-sidebar-title">员工设置</dt>
        <!-- <a href="0607-员工账号设置02.html"><dd>员工账号设置</dd></a> -->
        <a href="{:U('Setting/staff',array('exid'=>$_GET['exid']))}"><if condition="'__ACTION__' eq '__CONTROLLER__'.'/staff'"><dd class="active"><else /><dd></if>员工账号设置</dd></a>
        <!-- <a href="0609-角色权限设置02.html"><dd>角色权限设置</dd></a> -->
        <a href="{:U('Setting/role',array('exid'=>$_GET['exid']))}"><if condition="'__ACTION__' eq '__CONTROLLER__'.'/role'"><dd class="active"><else /><dd></if>角色权限设置</dd></a>
<!--         <dt class="second-sidebar-title">打印机</dt>
        <a href="0610-订单打印01.html"><dd>订单打印机</dd></a> -->
        <dt class="second-sidebar-title">物流设置</dt>
        <a href="{:U('Setting/log_show')}"><dd>物流工具</dd></a>
      </dl>
      </nav>
    </div>
  </div>