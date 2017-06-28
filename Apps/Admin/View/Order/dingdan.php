<!DOCTYPE html>
<html>
<!-- Mirrored from www.zi-han.net/theme/hplus/graph_echarts.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:18:59 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>订单统计 - 900ku后台</title>
    <link href="__ADMIN_PUBLIC__/css/bootstrap.min14ed.css?v=3.3.6" rel="stylesheet">
    <link href="__ADMIN_PUBLIC__/css/font-awesome.min93e3.css?v=4.4.0" rel="stylesheet">
    <link href="__ADMIN_PUBLIC__/css/plugins/bootstrap-table/bootstrap-table.min.css" rel="stylesheet">
    <link href="__ADMIN_PUBLIC__/css/animate.min.css" rel="stylesheet">
    <link href="__ADMIN_PUBLIC__/css/style.min862f.css?v=4.1.0" rel="stylesheet">
    <link href="/900ku/Public/Admin/plugins/sweetalert/sweetalert.css" rel="stylesheet">

</head>

<body class="gray-bg">
<div class="wrapper wrapper-content animated fadeInRight">

    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>订单统计</h5>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-sm-1" style="width: 80px;">
                            <div class="input-group">
                                <a href="{:U('order:order')}"><button type="button" class="btn btn-sm btn-default"> 分类统计</button> </a>
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <div class="input-group">
                                <a href="{:U('order:top')}"><button type="button" class="btn btn-sm btn-primary"> Top统计</button> </a>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <form action="{:U('order/dingdan')}" method="post" role="form" class="form-inline">
                                <div class="form-group">
                                    <label class="sr-only"></label>
                                    <select class="input-sm form-control input-s-sm inline" name="exid">
                                        <option value="0">供应商</option>
                                        <foreach name="exh_list" item="vo" key="k" >
                                            <option value="{$vo['exid']}">{$vo['ex_name']}</option>
                                        </foreach>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="sr-only"></label>
                                    <select class="input-sm form-control input-s-sm inline" name="pid">
                                        <option value="0">采购商</option>
                                        <foreach name="project_list" item="vo" key="k" >
                                            <option value="{$vo['pid']}">{$vo['pro_name']}</option>
                                        </foreach>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="sr-only"></label>
                                    <select class="input-sm form-control input-s-sm inline" name="kehu">
                                        <option value="0">客户经理</option>
                                        <foreach name="ke_list" item="vo" key="k" >
                                            <option value="{$vo['aid']}">{$vo['username']}</option>
                                        </foreach>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="sr-only"></label>
                                    <select class="input-sm form-control input-s-sm inline" name="quyu">
                                        <option value="0">区域管理员</option>
                                        <foreach name="qu_list" item="vo" key="k" >
                                            <option value="{$vo['code']}">{$vo['username']}</option>
                                        </foreach>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-white" type="submit" style="height: 30px;margin-top:5px;margin-left: 10px;">查询</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="ibox-content m-b-sm ">
                        <h3>客户总数：145  　订单数：4451　 订单金额：￥4585</h3>
                    </div>
                    <div class="echarts" style="height:300px" id="echarts-line-chart"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>序号</th>
                            <th>订单号</th>
                            <th>商品</th>
                            <th>订单状态</th>
                            <th>采购商</th>
                            <th>业务员</th>
                            <th>订单金额</th>
                            <th>预付款</th>
                            <th>尾款</th>
                            <th>质保金</th>
                            <th>业务员收入</th>
                            <th>平台服务费</th>
                            <th>支付金额</th>
                        </tr>
                        </thead>
                        <tbody>
                        <if condition="$order_list">
                            <foreach name="order_list" item="vo" key="k" >
                                <tr>
                                    <td>{$vo['oid']}</td>
                                    <td>{$vo['order_code']}</td>
                                    <td>{$vo['goods_name']}</td>
                                    <td>
                                        <if condition="$vo['status'] eq 1">
                                            支付预付款
                                            <elseif condition="$vo['status'] eq 2"/>
                                            商品出库
                                            <elseif condition="$vo['status'] eq 3"/>
                                            支付发货款
                                            <elseif condition="$vo['status'] eq 4"/>
                                            供应商发货
                                            <elseif condition="$vo['status'] eq 5"/>
                                            付验收款
                                            <elseif condition="$vo['status'] eq 6"/>
                                            付质保金
                                            <elseif condition="$vo['status'] eq 2"/>
                                            订单完成
                                            <else/>
                                            商品下单
                                        </if>
                                    </td>
                                    <td>{$vo['project_name']}</td>
                                    <td>业务员A</td>
                                    <td>{$vo['total']}</td>
                                    <td>{$vo['yufu']}</td>
                                    <td>{$vo['fahuo']}</td>
                                    <td>{$vo['zhibaojin']}</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>{$vo['paid_amount']}</td>
                                </tr>
                            </foreach>
                            <else />
                            <tr><td colspan="5">暂无数据</td></tr>
                        </if>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="__ADMIN_PUBLIC__/js/jquery.min.js?v=2.1.4"></script>
<script src="__ADMIN_PUBLIC__/js/bootstrap.min.js?v=3.3.6"></script>
<script src="__ADMIN_PUBLIC__/plugins/sweetalert/sweetalert.min.js"></script>
<script src="__ADMIN_PUBLIC__/js/plugins/echarts/echarts-all.js"></script>
<!--<script src="js/demo/echarts-demo-order.min.js"></script>-->

</body>

<script>
    $(function() {
        var e = echarts.init(document.getElementById("echarts-line-chart")),
            a = {
                /*title: {
                 text: "未来一周气温变化"
                 },*/
                tooltip: {
                    trigger: "axis"
                },
                /*legend: {
                 data: ["最高气温", "最低气温"]
                 },*/
                grid: {
                    x: 40,
                    x2: 40,
                    y2: 24
                },
                calculable: !0,
                xAxis: [{
                    type: "category",
                    boundaryGap: !1,
                    data: [ {$tian} ]
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
                        data: [{$data}],

                    }]
            };
        e.setOption(a),
            $(window).resize(e.resize);
    });

</script>




<!-- Mirrored from www.zi-han.net/theme/hplus/graph_echarts.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:18:59 GMT -->
</html>
