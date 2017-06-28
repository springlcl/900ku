<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8"><meta http-equiv="keywords" content="keyword1,keyword2,keyword3">
      <meta http-equiv="description" content="this is my page">
	<title>Document</title>
	<link rel="stylesheet" href="__SUB_PUBLIC__/css/style.css">
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries--><!--[if lt IE 9]><script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script><script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  <style>
  </style>
</head>
<body>
<!-- 左导一 -->
  <include file='Public/firstSidebar' />
<!-- 左导二 -->
  <include file="left" />
<!-- 右侧 内容-->
  <div class="clearfix container" id="app-container">
    <div class="cont_lump cont_lump_sell l_business clearfix">
      <div class="cont_title">
        <span>收入金额</span> 
      </div>
      <ul class="incomeamount clearfix"> 
          <li class="fl">
            <p class="zhanghao mgt45 font-size14 col-999">账号余额</p> 
            <p class="jiage col-ju font-size30 mgt20">
               {$udb['account']}
            </p>
            <p class="jiaoyi mgt30 col-hui font-size14"><span>交易中：{$udb['transaction']} </span> <span  class="mgl20"> 待供应商支付：{$udb['waitsup']}</span></p>
          </li>
          <li class="fl">
           <p class="mgt45 font-size14 col-999">
             可提现
           </p>
           <p class="jiage col-ju font-size30 mgt20">
               {$udb['surplus']}
            </p>
            <button class="tixiananniu">提现</button>
          </li>
          <li class="fl">
              <p class="mgt50 font-size14 col-999">
                  已提现
              </p>
              <p class="jiage col-ju font-size30 mgt20 txje">
                 {$udb['complete']}
              </p>
          </li>
      </ul>
       <div class="cont_title">
          <span>收入金额</span>
          <span class="wule mgl20 col-hui">收支明细</span> 
      </div>
      <div class="clearfix">
         <div class="incomeamount-time fr">
            <form action="{:U('myincome/income_at')}" method="post" class="fl">
                <select name="paid_way" class="fl">
                  <option value="">付款方式</option>
                  <option value="0">线上转账</option>
                  <option value="1">银行转账</option>
                </select>
                <div class="fr mgt20 mgl10">
                    <span>筛选日期:</span>
                   <input class="laydate-icon" id="start" name="time_start" placeholder="开始日期" >
                      <span>至</span>
                   <input class="laydate-icon" id="end" name="time_end" placeholder="结束日期" >
                   <button class="btn">查询</button>
                </div>
            </form>
            <a href="{:U('myincome/limitday/day/1')}"><button class="wukuang mgt30">最近7天</button></a>
            <a href="{:U('myincome/limitday/day/2')}"><button class="wukuang">最近30天</button></a>
        </div>
      </div>
      <table class="aoye">
        <tr>
            <th>
                  订单编号
            </th>
            <th>
              收入（元）
            </th>
            <th>
              付款方式
            </th>
            <th>
              时间          
            </th>
        </tr>
        <if condition="$datalist">
            <volist name="datalist" id="vo">
            <tr>
                <td>{$vo.order_num}</td>
                <td>{$vo.$ticheng}</td>
                <td><?= ($vo['paid_way']==0)?'线上转账': '银行转账';?></td>
                <td>{$vo.paid_time|date="Y-m-d H:i:s",###}</td>
            </tr>
            </volist>
        </if>
      </table> 
       <ul class="pagination">
          {$page}
       </ul>

    </div>
    <!-- 底部 == 版权 -->
    <div class="cont_lump con-foot">版权所有：900库 [京ICP备1000000001号-1</div>
  </div>
</body>
<script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="__SUP_PUBLIC__/laydate/laydate.js"></script>
<script type="text/javascript" src="__SUP_PUBLIC__/js/ind.js"></script>
<script type="text/javascript" src="__SUB_PUBLIC__/layer/layer.js"></script>
<script>
    var start = {
      elem: '#start',
      format: 'YYYY-MM-DD',
      max:"2099-06-16 23:59:59",
      istime: true,
      istoday: false,
      choose:function(datas){end.min=datas;end.start=datas}
    };
    var end = {
      elem: '#end',
      format: 'YYYY-MM-DD',
      max:"2099-06-16 23:59:59",
      istime: true,
      istoday: false,
      choose:function(datas){start.max=datas}
    };
    laydate(start);
    laydate(end);

$(document).ready(function() {
  $(".tixiananniu").click(function() {
 	layer.open({
	  type: 1,
	  title:'提现',
	  skin: 'layui-layer-rim', //加上边框
	  area: ['800px', '480px'], //宽高
	  shadeClose: true, //开启遮罩关闭
	  content: '<div class="protection protections" style="display:block;"><div class="tanchu_box tanchu_box400 "><h3 class="cashwithdrawalamount"><i></i>提现金额</h3><div class="minshengyinghang"><div class="left fl"><img src="__SUB_PUBLIC__/images/qt2.png" alt=""></div><div class="zhongjian fl"><p class="font-size14 font-weight600">中国民生银行</p><p>尾号5552储蓄卡</p></div><div class="right fr">&gt;</div></div><div class="fuwufei"><p>提现金额(收取0.1%服务费)</p><p><input type="text" placeholder="{$mr}" value="" class="shuru" style="background:url(__SUB_PUBLIC__/images/qt3.png) no-repeat;height:25px;border:none;padding:4px 0 10px 40px;font-size:18px;margin-top:30px; ></p><div class="yuebao clearfix"><p class="col-lan2 fr" style="margin-top:-30px;cursor:pointer;" onclick="tx()">全部提现</p></div><div class="btn1"><button class="btn-lan-80 mgw15">提现</button><button class="btn-lan-80 mgw15 close_btn" onclick="qx()">取消</button></div></div></div></div>',
  });
  });
});
function tx(){
  var je = $('.txje').text();
  $('.shuru').attr('value',je);
}
function qx(){$('#layui-layer1').hide(1);$('#layui-layer-shade1').hide(1);location.reload();}

</script>
<style>
.btn {
  background: blue none repeat scroll 0 0;
  color: #fff;
  height: 26px;
  width: 46px;
  border-radius: 5px;
}
.kaozuo {
  margin-top:-50px;
}
.laydate-icon {
  cursor : pointer;
}
</style>
</html>