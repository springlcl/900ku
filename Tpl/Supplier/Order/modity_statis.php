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
            <a href="{:U('order/modity_statis')}"><span>商品统计</span></a>
            <ul class="dis_inb date_choice ">
                <a href="{:U('order/limitday/day/1')}"><li class="<?= ($get==1)?'active': '';?>">本周</li></a>
                <a href="{:U('order/limitday/day/2')}"><li class="<?= ($get==2)?'active': '';?>">本月</li></a>
                <a href="{:U('order/limitday/day/3')}"><li class="<?= ($get==3)?'active': '';?>">3个月</li></a>
                <a href="{:U('order/limitday/day/4')}"><li class="<?= ($get==4)?'active': '';?>">6个月</li></a>
                <a href="{:U('order/limitday/day/5')}"><li class="<?= ($get==5)?'active': '';?>">1年</li></a>
                <a href="{:U('order/limitday/day/6')}"><li class="<?= ($get==6)?'active': '';?>">2年</li></a>
            </ul>
        </div>
        <div class="cartogram">
            <ul class="show_num clearfix pd20 font-weight600 col-666 font-size14">
                <li class="fl mgr35">商品总数: <span>{$goods_count}</span></li>
                <li class="fl">商品销售金额: <span> ￥{$goods_sum}</span></li>
            </ul>
            <div class="echarts" style="height:300px" id="echarts-pie-chart"></div>
        </div>
        <div class="con">
            <table class="oxford">
                <tr class="tact">
                    <th class="kong">&nbsp;</th>
                    <th class="name"><span>商品名称</span></th>
                    <th class="pens"><span>订货笔数</span></th>
                    <th class="number"><span>订货数量</span></th>
                    <th class="amount"><span>订货金额(</span>商品原价)</th>
                </tr>
                <if condition="$list['datalist']">
                    <foreach name="list['datalist']" item="vo" key="k" >
                        <tr class="tact">
                            <td class="kong">{$vo['goods_id']}</td>
                            <td class="name">{$vo['goods_name']}</td>
                            <td class="pens">{$vo['goods_count']}</td>
                            <td class="number">{$vo['goods_sale_num']}</td>
                            <td class="amount">￥{$vo['total']}</td>
                        </tr>
                    </foreach>
                    <else />
                    <tr><td colspan="5" class="center pdt30">暂无数据</td></tr>
                </if>
            </table>
        </div>
        <div class="clearfix">
            <ul class="pagination">{$list['page']}</ul>
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
    $(function() {
        var l = echarts.init(document.getElementById("echarts-pie-chart")),
            u = {
                title: {
                    text: "商品统计",
                    subtext: "",
                    x: "center"
                },
                tooltip: {
                    trigger: "item",
                    formatter: "{a} <br/>{b} : {c} ({d}%)"
                },
                legend: {
                    orient: "vertical",
                    x: "left",
                    data: [{$cate}]
                },
                calculable: !0,
                series: [{
                    name: "销售量",
                    type: "pie",
                    radius: "55%",
                    center: ["50%", "60%"],
                    data: [
                        {$list_count}
                        ]
                }]
            };
        l.setOption(u),
            $(window).resize(l.resize);
    });
</script>
</html>