  <div id="app-second-sidebar">
    <div class="zg_scroll"></div>
    <div >
      <nav>
      <dl>
        <dt class="second-sidebar-title">展厅概况</dt>
        <a href="{:U("Store/mess_services")}"><if condition="'__ACTION__' eq '__CONTROLLER__'.'/mess_services'"><dd class="active"><else /><dd></if>业务概况</dd></a>
        <a href="{:U("Store/serMess")}"><if condition="'__ACTION__' eq '__CONTROLLER__'.'/serMess'"><dd class="active"><else /><dd></if>浏览概况</dd></a>
        <dt class="second-sidebar-title">展厅装修</dt>
        <a href="{:U("Store/choose_model")}"><if condition="'__ACTION__' eq '__CONTROLLER__'.'/choose_model'"><dd class="active"><else /><dd></if>选择模版</dd></a>
        <a href="{:U("Store/tempwap")}"><if condition="'__ACTION__' eq '__CONTROLLER__'.'/tempwap'"><dd class="active"><else /><dd></if>高级定制</dd></a>
        <dt class="second-sidebar-title">展厅广告设置</dt>
        <a href="{:U("Store/ad_list")}"><if condition="'__ACTION__' eq '__CONTROLLER__'.'/ad_list'"><dd class="active"><else /><dd></if>广告设置</dd></a>
        <dt class="second-sidebar-title">展厅服务</dt>
        <a href="{:U("Store/my_docum")}"><if condition="'__ACTION__' eq '__CONTROLLER__'.'/my_docum'"><dd class="active"><else /><dd></if>我的文件</dd></a>
        <a href="{:U("Store/customer_list")}"><if condition="'__ACTION__' eq '__CONTROLLER__'.'/customer_list'"><dd class="active"><else /><dd></if>客服列表</dd></a>
        <a href="{:U("Store/supplier_cf")}"><if condition="'__ACTION__' eq '__CONTROLLER__'.'/supplier_cf'"><dd class="active"><else /><dd></if>供应商认证</dd></a>

      </dl>
      </nav>
    </div>
  </div>