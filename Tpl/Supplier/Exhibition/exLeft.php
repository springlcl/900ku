  <div id="app-second-sidebar">
    <div class="zg_scroll"></div>
    <div >
      <nav>
      <dl>
        <dt class="second-sidebar-title">展厅概况</dt>
        <a href="{:U("Store/mess_services",array('exid'=>$_GET['exid']))}"><if condition="'__ACTION__' eq '__CONTROLLER__'.'/mess_services'"><dd class="active"><else /><dd></if>业务概况</dd></a>
        <a href="{:U("Store/serMess",array('exid'=>$_GET['exid']))}"><if condition="'__ACTION__' eq '__CONTROLLER__'.'/serMess'"><dd class="active"><else /><dd></if>浏览概况</dd></a>
        <dt class="second-sidebar-title">展厅装修</dt>
        <a href="{:U("Store/choose_model",array('exid'=>$_GET['exid']))}"><if condition="'__ACTION__' eq '__CONTROLLER__'.'/choose_model'"><dd class="active"><else /><dd></if>选择模版</dd></a>
        <a href="{:U("Store/tempwap",array('exid'=>$_GET['exid']))}"><if condition="'__ACTION__' eq '__CONTROLLER__'.'/tempwap'"><dd class="active"><else /><dd></if>高级定制</dd></a>
        <dt class="second-sidebar-title">展厅广告设置</dt>
        <a href="0204-展厅-移动广告设置.html"><dd>广告设置</dd></a>
        <dt class="second-sidebar-title">展厅服务</dt>
        <a href="0207-展厅-我的文件01.html"><dd>我的文件</dd></a>
        <a href="0208-展厅-客服列表01.html"><dd>客服列表</dd></a>
        <a href="0209-展厅-供应商认证.html"><dd>供应商认证</dd></a>
      </dl>
      </nav>
    </div>
  </div>