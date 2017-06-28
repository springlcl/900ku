  <div id="app-second-sidebar">
    <div class="zg_scroll"></div>
    <div>
      <nav>
      <dl>
        <dt class="second-sidebar-title">收入概况</dt>
        <!-- <a href="0101-业务员收入.html"><dd class="active">收入金额</dd></a> -->
        <a href="{:U("Myincome/income_at",array('exid'=>$_GET['exid']))}"><if condition="'__ACTION__' eq '__CONTROLLER__'.'/income_at'"><dd class="active"><else /><dd></if>收入金额</dd></a>
        <dt class="second-sidebar-title">银行卡设置</dt>
        <!-- <a href="0101-业务员收入03.html"><dd>银行卡</dd></a> -->
        <a href="{:U("Myincome/bank_card",array('exid'=>$_GET['exid']))}"><if condition="'__ACTION__' eq '__CONTROLLER__'.'/bank_card'"><dd class="active"><else /><dd></if>银行卡</dd></a>
      </dl>
      </nav>
    </div>
  </div>