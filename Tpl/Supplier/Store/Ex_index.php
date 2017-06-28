<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>业务概况</title>
	<link rel="stylesheet" href="__SUP_PUBLIC__/css/style.css">
	<style>
	</style>
</head>
<body>
<!-- 左导一 -->
 <include file="Public/firstSidebar" /> 
<!-- 左导二 -->
  <include file="Store/exLeft" />
<!-- 右侧 内容-->
  <div class="clearfix container" id="app-container">
    <div class="cont_lump cont_lump_todo bor_bm1">
      <div class="cont_title">
        <span>待办事项</span>
      </div>
      <ul class="con clearfix">
        <li>
          <div><a href="{:U('Channel/selasman')}"><h6 class="col-ju">{$data['qudao']}</h6><span>渠道管理</span></a></div>
        </li>
        <li>
          <div><a href="{:U('Order/access_order')}"><h6 class="col-ju">{$data['order']}</h6><span>订单管理</span></a></div>
        </li>
        <li>
          <div><a href="{:U('Order/ar_order')}"><h6 class="col-ju">{$data['confirm']}</h6><span>待确认收款</span></a></div>
        </li>
        <li>
          <div><a href="{:U('Myincome/income_at')}"><h6 class="col-ju">{$data['salemann']}</h6><span>业务员结算</span></a></div>
        </li>
      </ul>
      <volist name="week" id="w">
      <input type="hidden" id="week" value="{$w}" />
    </volist>
      <div class="cont_lump cont_lump_briefing">
        <div class="cont_title">
          <span>今日简报</span>
        </div>
        <ul class="con clearfix">
          <li><div><h6>￥{$data['total']}</h6><span>订货金额</span></div></li>
          <li><div><h6>￥{$data['paid_amount']}</h6><span>退货金额</span></div></li>
          <li><div><h6>{$data['order']}</h6><span>订货单</span></div></li>
          <li><div><h6>{$data['order_return']}</h6><span>退货单</span></div></li>
          <li><div><h6>￥{$data['heji']}</h6><span>金额合计</span></div></li>
        </ul>
      </div>
      <div class="cont_lump cont_lump_briefing">
        <div class="cont_title">
          <span>业务简报</span>
        </div>
        <!-- 为ECharts准备一个具备大小（宽高）的Dom -->
        <div id="ec_main1" style="height:400px;width: 100%;"></div>
      </div>
    </div>
    <div class="con-foot">版权所有：900库 [京ICP备1000000001号-1</di`>
  </div>
</body>
<script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/1.8.3/jquery.min.js"></script>
<!-- ECharts单文件引入 -->
<!-- <script src="http://echarts.baidu.com/build/dist/echarts.js"></script> -->
<script src="__SUP_PUBLIC__/js/echarts-all.js"></script>
<script type="text/javascript">
/*   $(function() {
        var e = echarts.init(document.getElementById("ec_main1")),
            a = {
                tooltip: {
                    trigger: "axis"
                },
                grid: {
                    x: 40,
                    x2: 40,
                    y2: 24
                },
                calculable: !0,
                xAxis: [{
                    type: "category",
                    boundaryGap: !1,
                    data: [{$day}]
                }],
                yAxis: [{
                    type: "value",
                    axisLabel: {
                        formatter: "{value}"
                    }
                }],
                series: [
                    {
                        name: "订单数",
                        type: "line",
                        data: [{$tongji}],

                    }]
            };
        e.setOption(a),
            $(window).resize(e.resize);
    });
*/


             var week=[];
              var i=0;
              $("input[id='week']").each(function(){
                  i++;
                  week[i] = $(this).val();
              });


              var myChart =  echarts.init(document.getElementById('ec_main1'));
              option = {
             
                 tooltip: {
                     trigger: "item",
                     formatter: "{a} <br/>{b} : {c}"
                 },
            
                 xAxis: [
                     {
                         type: "category",
            
                         axisLabel: {
                              show: true,
                              textStyle: {
                                  color: '#333'
                              }
                         },
                         splitLine: {show: false},
                         data : [{$day}],
                     }
                 ],
                 yAxis: [
                     {
                      
                         axisLabel: {
                              show: true,
                              formatter:'￥{value} k',
                              textStyle: {
                                  color: '#333'
                              }
                          }
                     }
                 ],
                 calculable: true,
                 series: [
                     {
                            "name":"订货金额",
                            "type":"line",
                            "data":[{$tongji}]

                     },
                 ]
              };
              myChart.setOption(option);
</script>
</html>