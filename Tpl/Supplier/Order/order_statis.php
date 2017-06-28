<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8"><meta http-equiv="keywords" content="keyword1,keyword2,keyword3">
      <meta http-equiv="description" content="this is my page">
	<title>商品统计</title>
    <link rel="stylesheet" href="__SUP_PUBLIC__/css/style.css">
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries--><!--[if lt IE 9]><script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script><script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<body>
<!-- 左导一 -->
  <include file='Public/firstSidebar' />
<!-- 左导二 -->
  <include file='left' />
<!-- 右侧 内容-->
<div class="clearfix container min-w" id="app-container">
    <div class="cont_lump  cont_lump_statistics">
        <div class="cont_title clearfix">
            <span>订单统计</span> 
            <ul class="dis_inb date_choice ">
                <li class="active">本周</li>
                <li>本月</li>
                <li>3个月</li>
                <li>6个月</li>
                <li>1年</li>
                <li>2年</li>
            </ul>
            <select class="select-130 mgl15" name="" id="">
                <option value="">客户</option>
                <option value="">客户1</option>
                <option value="">客户2</option>
                <option value="">客户3</option>
            </select>
            <select class="select-130 mgl15" name="" id="">
                <option style="height: 40px;line-height: 40px;" value="">业务员</option>
                <option value="">业务员1</option>
                <option value="">业务员2</option>
                <option value="">业务员3</option>
            </select>
            <button class="ui-btn mgl10">查询</button>
        </div>
        <div class="cartogram">
            <ul class="show_num clearfix pd20 font-weight600 col-666 font-size14">
                <li class="fl mgr35">基本总数: <span>2938</span></li>
                <li class="fl mgr35">订单数: <span> 11</span></li>
                <li class="fl">订单金额: <span> ￥555.00</span></li>
            </ul>
            <div id="ec_orderTongji" style="height:400px;width: 100%;"></div>
        </div>
        <div class="con">
            <table class="oxford">
                <tr class="tact zhang">
                    <th class="xuhao">序号</th>
                    <th class="dingdanhao"><span>订单号</span></th>
                    <th class="shop"><span>商品</span></th>
                    <th class="dingdan"><span>订单状态</span></th>
                    <th class="kehu"><span>客户</span></th>
                    <th class="yuwuyuan"><span>业务员</span></th>
                    <th class="cur-p upDownToggle jine"><span>订单金额<i class="ico_all"></i></span></th>
                    <th class="cur-p upDownToggle yufuk"><span>预付款<i class="ico_all"></i></span></th>
                    <th class="cur-p upDownToggle weik"><span>尾款<i class="ico_all"></i></span></th>
                    <th class="cur-p upDownToggle zhibaojin"><span>质保金<i class="ico_all"></i></span></th>
                    <th class="cur-p upDownToggle yewuyuanshouru"><span>业务员收入<i class="ico_all"></i></span></th>
                    <th class="cur-p upDownToggle pingtai"><span>平台服务费<i class="ico_all"></i></span></th>
                    <th class="cur-p upDownToggle zhifujine"><span>支付金额<i class="ico_all"></i></span></th>
                </tr>
                <tr class="tact zhang">
                    <td class="xuhao">01</td>
                    <td class="dingdanhao"><span>123123124124</span></td>
                    <td class="shop"><span>手提牛津布圆筒保温轻巧方便</span></td>
                    <td class="dingdan"><span>已发货</span></td>
                    <td class="kehu"><span>张小凡</span></td>
                    <td class="yuwuyuan"><span>业务员A</span></td>
                    <td class="jine"><span>￥130.00</span></td>
                    <td class="yufuk"><span>￥130.00</span></td>
                    <td class="weik"><span>￥0.00</span></td>
                    <td class="zhibaojin"><span>￥0.00</span></td>
                    <td class="yewuyuanshouru"><span>￥0.00</span></td>
                    <td class="pingtai"><span>￥0.00</span></td>
                    <td class="zhifujine"><span>￥130.00</span></td>
                </tr>
                <tr class="tact zhang">
                    <td class="xuhao">02</td>
                    <td class="dingdanhao"><span>123123124124</span></td>
                    <td class="shop"><span>手提牛津布圆筒保温轻巧方便</span></td>
                    <td class="dingdan"><span>已发货</span></td>
                    <td class="kehu"><span>张小凡</span></td>
                    <td class="yuwuyuan"><span>业务员A</span></td>
                    <td class="jine"><span>￥130.00</span></td>
                    <td class="yufuk"><span>￥130.00</span></td>
                    <td class="weik"><span>￥0.00</span></td>
                    <td class="zhibaojin"><span>￥0.00</span></td>
                    <td class="yewuyuanshouru"><span>￥0.00</span></td>
                    <td class="pingtai"><span>￥0.00</span></td>
                    <td class="zhifujine"><span>￥130.00</span></td>
                </tr>
            </table>
        </div>
    </div>
    <!-- 底部 == 版权 -->
    <div class="cont_lump con-foot">版权所有：900库 [京ICP备1000000001号-1</div>
</div>
</body>
<script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="__SUP_PUBLIC__/js/ind.js"></script>
<script src="__SUP_PUBLIC__/js/echarts-all.js"></script>
<script type="text/javascript">
              var myChart =  echarts.init(document.getElementById('ec_orderTongji'));
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