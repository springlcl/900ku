 <div id="app-second-sidebar">
    <div class="zg_scroll"></div>
    <div>
      <nav>
      <dl>
        <dt class="second-sidebar-title">业务员管理</dt>
        <!-- <a href="__URL__/selasman"><dd class="active">业务员列表</dd></a> -->
        <a href="{:U("Channel/selasman",array('exid'=>$_GET['exid']))}"><if condition="'__ACTION__' eq '__CONTROLLER__'.'/selasman'"><dd class="active"><else /><dd></if>业务员列表</dd></a>
        <dt class="second-sidebar-title">采购商管理</dt>
        <!-- <a href="__URL__/buyer"><dd>采购商列表</dd></a> -->
        <a href="{:U("Channel/buyer",array('exid'=>$_GET['exid']))}"><if condition="'__ACTION__' eq '__CONTROLLER__'.'/buyer'"><dd class="active"><else /><dd></if>采购商列表</dd></a>
        <dt class="second-sidebar-title">用户管理</dt>
        <!-- <a href="__URL__/user_profile"><dd>用户概况</dd></a> -->
        <a href="{:U("Channel/user_profile",array('exid'=>$_GET['exid']))}"><if condition="'__ACTION__' eq '__CONTROLLER__'.'/user_profile'"><dd class="active"><else /><dd></if>用户概况</dd></a>
        <!-- <a href="__URL__/user_list"><dd>用户列表</dd></a> -->
        <a href="{:U("Channel/user_list",array('exid'=>$_GET['exid']))}"><if condition="'__ACTION__' eq '__CONTROLLER__'.'/user_list'"><dd class="active"><else /><dd></if>用户列表</dd></a>
      </dl>
      </nav>
    </div>
  </div>