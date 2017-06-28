<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="__SUP_PUBLIC__/css/style.css">
	<style>
	</style>
</head>
<body>
<!-- 左导一 -->
 <include file="Public/firstSidebar" /> 
<!-- 左导二 -->
 <include file="Exhibition/exLeft" />
<!-- 右侧 内容-->
  <div class="clearfix container" id="app-container">
    <div class="cont_lump cont_lump_todo bor_bm1">
      <div class="cont_title">
        <span>待办事项</span>
      </div>
      <ul class="con clearfix">
        <li>
          <div><a href="0403-采购商管理01.html"><h6 class="col-ju">23</h6><span>渠道管理</span></a></div>
        </li>
        <li>
          <div><a href="0501-准入订单.html"><h6 class="col-ju">23</h6><span>订单管理</span></a></div>
        </li>
        <li>
          <div><a href="0507-订单应收款.html"><h6 class="col-ju">23</h6><span>待确认收款</span></a></div>
        </li>
        <li>
          <div><a href=""><h6 class="col-ju">23</h6><span>业务员结算</span></a></div>
        </li>
      </ul>
      <div class="cont_lump cont_lump_briefing">
        <div class="cont_title">
          <span>今日简报</span>
        </div>
        <ul class="con clearfix">
          <li><div><h6>￥4.750.00</h6><span>订货金额</span></div></li>
          <li><div><h6>￥0.00</h6><span>退货金额</span></div></li>
          <li><div><h6>10</h6><span>订货单</span></div></li>
          <li><div><h6>0</h6><span>退货单</span></div></li>
          <li><div><h6>￥4.750.00</h6><span>金额合计</span></div></li>
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
              var myChart =  echarts.init(document.getElementById('ec_main1'));
              option = {
                 // title: {
                 //     text: "对数轴示例",
                 //     x: "center"
                 // },
                 tooltip: {
                     trigger: "item",
                     formatter: "{a} <br/>{b} : {c}"
                 },
                 // legend: {
                 //     x: 'left',
                 //     data: ["2的指数", "3的指数"]
                 // },
                 xAxis: [
                     {
                         type: "category",
                         // name: "x",
                         axisLabel: {
                              show: true,
                              textStyle: {
                                  color: '#333'
                              }
                         },
                         splitLine: {show: false},
                         data : ["09-01","09-02","09-03","09-04","09-05","09-06","09-07","09-08","09-09"],
                     }
                 ],
                 yAxis: [
                     {
                         // type: "log",
                         // name: "y",
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
                            "name":"销量",
                            "type":"line",
                            "data":["140","0","0","0","88","0","10","40","45"]

                     },
                 ]
              };
              myChart.setOption(option);
</script>
</html>