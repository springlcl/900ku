<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"><meta http-equiv="keywords" content="keyword1,keyword2,keyword3">
  <meta http-equiv="description" content="this is my page">
  <title>短信通知</title>
  <link rel="stylesheet" href="__SUP_PUBLIC__/css/style.css">
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries--><!--[if lt IE 9]><script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script><script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<body>
<!-- 左导一 -->
  <include file='Public/firstSidebar' />
<!-- 左导二 -->
  <include file='Set_left' />
<!-- 右侧 内容-->
<div class="clearfix container min-w1100" id="app-container">
      <div class="cont_lump cont_lump_sell notification">
          <div class="cont_title clearfix">
            <span>短信通知</span><a href="{:U('Setting/Ex_wechat',array('exid'=>$_GET['exid']))}"><span class="mgr10 mgl10 col-999" style="border-left:2px solid #999999 ;">微信通知</span></a>
          </div> 
          <div class="wenxin">
                 <p class="mgl20">温馨提示：以下规则选择保存后，将只用于本店铺及其名下分销展厅，如果您还有其他展厅，前前往并对应操作！</p>
          </div> 
          <table class="">
            <tr>
              <th><input type="checkbox" name="1" value="1" class="fl kucun_cb"> <span class="mgl15">全选</span></th>
              <th class="mgl5">功能开关</th>
            </tr>
            <tr>
              <td>
                <input type="checkbox" name="1" value="1" class="fl kucun_cb"> <span class="mgl15"> 订单支付成功通知</span>
              </td>
              <td>
                <input type="checkbox" name="1" value="1" class="fl kucun_cb"> <span class="mgl15"> 短信通知</span> 
              </td>
            </tr>
            <tr>
              <td>
                <input type="checkbox" name="1" value="1" class="fl kucun_cb"> <span class="mgl15"> 订单支付成功通知</span>
              </td>
              <td>
                <input type="checkbox" name="1" value="1" class="fl kucun_cb"> <span class="mgl15"> 短信通知</span>  
              </td>
            </tr>
            <tr>
              <td>
                <input type="checkbox" name="1" value="1" class="fl kucun_cb"> <span class="mgl15"> 订单支付成功通知</span>
              </td>
              <td>
                <input type="checkbox" name="1" value="1" class="fl kucun_cb"> <span class="mgl15"> 短信通知</span>  
              </td>
            </tr>
            <tr>
              <td>
                <input type="checkbox" name="1" value="1" class="fl kucun_cb"> <span class="mgl15"> 订单支付成功通知</span>
              </td>
              <td>
                <input type="checkbox" name="1" value="1" class="fl kucun_cb"> <span class="mgl15"> 短信通知</span> 
              </td>
            </tr>
            <tr>
              <td>
                <input type="checkbox" name="1" value="1" class="fl kucun_cb"> <span class="mgl15"> 订单支付成功通知</span>
              </td>
              <td>
               <input type="checkbox" name="1" value="1" class="fl kucun_cb"> <span class="mgl15"> 短信通知</span> 
              </td>
            </tr>
            <tr>
              <td>
                <input type="checkbox" name="1" value="1" class="fl kucun_cb"> <span class="mgl15"> 订单支付成功通知</span>
              </td>
              <td>
                <input type="checkbox" name="1" value="1" class="fl kucun_cb"> <span class="mgl15"> 短信通知</span> 
              </td>
            </tr>
            <tr>
              <td>
                <input type="checkbox" name="1" value="1" class="fl kucun_cb"> <span class="mgl15"> 订单支付成功通知</span>
              </td>
              <td>
                <input type="checkbox" name="1" value="1" class="fl kucun_cb"> <span class="mgl15"> 短信通知</span> 
              </td>
            </tr>
            <tr>
              <td>
                <input type="checkbox" name="1" value="1" class="fl kucun_cb"> <span class="mgl15"> 订单支付成功通知</span>
              </td>
              <td>
                <input type="checkbox" name="1" value="1" class="fl kucun_cb"> <span class="mgl15"> 短信通知</span> 
              </td>
            </tr>
            <tr>
              <td>
                <input type="checkbox" name="1" value="1" class="fl kucun_cb"> <span class="mgl15"> 订单支付成功通知</span>
              </td>
              <td>
               <input type="checkbox" name="1" value="1" class="fl kucun_cb"> <span class="mgl15"> 短信通知</span> 
              </td>
            </tr>
            <tr>
              <td>
                <input type="checkbox" name="1" value="1" class="fl kucun_cb"> <span class="mgl15"> 订单支付成功通知</span>
              </td>
              <td>
                <input type="checkbox" name="1" value="1" class="fl kucun_cb"> <span class="mgl15"> 短信通知</span> 
              </td>
            </tr>

          </table>  

      </div>
       <!-- 底部 == 版权 -->
    <div class="cont_lump con-foot">版权所有：900库 [京ICP备1000000001号-1</div>
</div>
<!-- 弹框 -->
  <div class="protection">
    <div class="tanchu_box tanchu_box1100 stayOrderRecord_tab_box">
      <span class="gb close_btn"><i></i></span>
      <table class="historyRecord">
        <tr>
          <th>序号</th>
          <th>开票日期</th>
          <th>发票编号（同批次发票）</th>
          <th>开票金额</th>
          <th>发票状态</th>
          <th>快递公司</th>
          <th>快递单号</th>
        </tr>
        <tr>
          <td>01</td>
          <td>2017-03-13</td>
          <td>13455467755677745</td>
          <td>￥360.00</td>
          <td>已确认</td>
          <td>圆通快递</td>
          <td>784744748585</td>
        </tr>
      </table>
      <div class="zongde bg-f5 center">已开总额：￥340.00</div>
    </div>
  </div>
</body>
<script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="__SUP_PUBLIC__/js/ind.js"></script>
<script>
      // 0603 全选
      $(".notification table th input").click(function(){
          if($(this).is(':checked')){
              $('.notification table tr td input').prop("checked",true);
          }else{
              $('.notification table tr td input').prop("checked",false);
          }
      });
</script>
</html>