<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"><meta http-equiv="keywords" content="keyword1,keyword2,keyword3">
      <meta http-equiv="description" content="this is my page">
  <title>待确认发票</title>
    <link rel="stylesheet" href="__SUP_PUBLIC__/css/style.css">
      <link rel="stylesheet" href="__HOME_PUBLIC__/finance/css/style.css">
    <link rel="stylesheet" href="__HOME_PUBLIC__/finance/css/layer.css">
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries--><!--[if lt IE 9]><script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script><script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<body>
<!-- 左导一 -->
  <include file='Public/firstSidebar' />
<!-- 左导二 -->
  <include file='left' />
<!-- 右侧 内容-->

<div class="clearfix container min-w" id="app-container">
    <div class="cont_lump cont_lump_sell cont_lump_sell_wrongOrder  h_daiquerenfapiao">
          <div class="cont_title clearfix">
            <span>待确认发票</span>
          </div>
        <form action="{:U('Order/cf_invoice')}" method="post">
            <ul class="wrong_order_form clearfix">
                <li class="sou">
                    <input <?php if($order_code){echo "value='$order_code'";}?> name="order_code" type="text" placeholder="订单号">
                    <button><i class="ico_all">&nbsp;</i></button>
                </li>
                <li>
                    <label class="text" >采购商:</label>
                    <select name="pid" id="">
                        <option value="0">全部采购商</option>
                        <volist name="pur" id="p">
                        <option <?php if($pid && $pid==$p['pro_id']){echo "selected='selected'";}?> value="{$p.pro_id}">{$p.pro_name}</option>
                       </volist>
                    </select>
                </li>
                <li>
                    <label class="text" >发票编号:</label>
                    <input <?php if($bill_code){echo "value='$bill_code'";}?> name="bill_code" type="text" style="width: 120px;">
                </li>
                <li>
                    <label class="text" >成交时间:</label>
                    <input <?php if($start){echo "value='$start'";}?> name="start" class="laydate-icon" id="wrong_start" >
                    <span>至</span>
                    <input <?php if($end){echo "value='$end'";}?>  name="end" class="laydate-icon" id="wrong_end" >
                </li>
                <li>
                    <button><a><span class="screen ui-btn bg-lan col-fff mgl15">筛选</span></a></button>
                </li>
            </ul>
        </form>
          <table>
                <tr>
                  <th>开票条目</th>
                  <th>发票编号</th>
                  <th>金额</th>
                  <th>发票状态</th>
                  <th>操作</th>
                </tr>
                <volist name="bill" id="b">
                <tr>
                  <td>开票日期：<?=date('Y-m-d',$b['add_time']);?></td>
                  <td>采购商：{$b.pro_name}</td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td>包含订单编号：</td>
                  <td>{$b.order_code}</td>
                  <td class="col-ju">{$b.money}</td>
                  <td>待确认</td>
                  <td onclick="opendiv({$b['rid']});"  class="col-lan cur-p">查看</td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
              </volist>
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
<script type="text/javascript" src="__SUP_PUBLIC__/laydate/laydate.js"></script>
<script type="text/javascript" src="__SUP_PUBLIC__/js/ind.js"></script>
<script type="text/javascript" src="__HOME_PUBLIC__/finance/js/layer/layer.js"></script>
<script>
    var start = {
      elem: '#wrong_start',
      format: 'YYYY/MM/DD hh:mm:ss',
      min: '1900-01-01 00:00:00', //最小日期
      max: laydate.now(), //最大日期
      istime: true,
      istoday: false,
      choose: function(datas){
         end.min = datas; //开始日选好后，重置结束日的最小日期
         end.start = datas //将结束日的初始值设定为开始日
      }
    };
    var end = {
      elem: '#wrong_end',
      format: 'YYYY/MM/DD hh:mm:ss',
      min: '1900-01-01 00:00:00', //最小日期
      max: laydate.now(),
      istime: true,
      istoday: false,
      choose: function(datas){
        start.max = datas; //结束日选好后，重置开始日的最大日期
      }
    };
    laydate(start);
    laydate(end);


    function opendiv(rid){
$.ajax({
                  type: 'post',
                  url: "{:U('bill_details')}",
                  data: {'rid':rid},
                  dataType: 'json',
                  async: false,
                  success: function(data)
                  {
                    if(data)
                    { 
                      // alert(1);
                      // console.log(data);
layer.open({
    area: ['950px', '450px'], //宽高
          title: [
            '信息详情',
            // 'background-color: green; color:#fff;'<div class='hbo_invoice_hover'></div><div class='top'>信息详情<img class='hbo_invoice_hoverxxx' src='__HOME_PUBLIC__/finance/images/hbo_invoice_hove_xxx.png' alt=''></div>
          ]
          ,content:
            data,
                 btn: ['查看完毕', '返回'],
                 yes: function(index){
                  location.reload();
    }
        });   
                           
                    }
                }
              });


}
</script>
</html>