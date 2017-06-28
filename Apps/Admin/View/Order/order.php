<!DOCTYPE html>
<html>
<!-- Mirrored from www.zi-han.net/theme/hplus/graph_echarts.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:18:59 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品统计 - 900ku后台</title>
    <link href="__ADMIN_PUBLIC__/css/bootstrap.min14ed.css?v=3.3.6" rel="stylesheet">
    <link href="__ADMIN_PUBLIC__/css/font-awesome.min93e3.css?v=4.4.0" rel="stylesheet">
    <link href="__ADMIN_PUBLIC__/css/plugins/bootstrap-table/bootstrap-table.min.css" rel="stylesheet">
    <link href="__ADMIN_PUBLIC__/css/animate.min.css" rel="stylesheet">
    <link href="__ADMIN_PUBLIC__/css/style.min862f.css?v=4.1.0" rel="stylesheet">
    <link href="__ADMIN_PUBLIC__/plugins/sweetalert/sweetalert.css" rel="stylesheet">

</head>

<body class="gray-bg">
<div class="wrapper wrapper-content animated fadeInRight">

    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>商品统计</h5>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-sm-1" style="width: 80px;">
                            <div class="input-group">
                                <a href="{:U('order:order')}"><button type="button" class="btn btn-sm btn-primary"> 分类统计</button> </a>
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <div class="input-group">
                                <a href="{:U('order:top')}"><button type="button" class="btn btn-sm btn-default"> Top统计</button> </a>
                            </div>
                        </div>
                        <!--<div class="col-sm-1 m-b-xs">
                            <div class="input-group">
                                <select class="input-sm form-control input-s-sm inline">
                                    <option value="0">商品名称</option>
                                    <option value="1">展厅名称</option>
                                    <option value="1">商品编号</option>
                                </select>
                            </div>
                        </div>-->
                        <div class="col-sm-2 m-b-xs">
                            <form action="{:U('order/order')}" method="get">
                            <div class="input-group">

                                <select class="input-sm form-control input-s-sm inline" name="ex_goods_cid">
                                        <option value="0">请选择</option>
                                    <foreach name="exh_list" item="vo" key="k" >
                                        <option value="{$vo['exid']}">{$vo['ex_name']}</option>
                                    </foreach>
                                </select>
                                <span class="input-group-btn">
                                        <button type="submit" class="btn btn-sm btn-primary"> 查询</button> </span>

                            </div>
                            </form>
                        </div>
                    </div>
                    <div class="ibox-content m-b-sm ">
                        <h3>商品总数：{$goods_count}  　商品销售总额：￥{$goods_sum}</h3>
                    </div>
                    <div class="echarts" style="height:300px" id="echarts-pie-chart"></div>
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
                            <th></th>
                            <th>商品名称</th>
                            <th>订货笔数</th>
                            <th>订货数量</th>
                            <th>订货金额(商品原价)</th>
                        </tr>
                        </thead>
                        <tbody>
                        <if condition="$list['datalist']">
                            <foreach name="list['datalist']" item="vo" key="k" >
                                <tr>
                                    <td>{$vo['goods_id']}</td>
                                    <td>{$vo['goods_name']}</td>
                                    <td>{$vo['goods_count']}</td>
                                    <td>{$vo['goods_sale_num']}</td>
                                    <td>{$vo['total']}</td>
                                </tr>
                            </foreach>
                            <else />
                            <tr><td colspan="5">暂无数据</td></tr>
                        </if>
                        </tbody>

                    </table>
                    <div class="col-sm-12 text-center">
                        <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                            <ul class="pagination">{$list['page']}</ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="__ADMIN_PUBLIC__/js/jquery.min.js?v=2.1.4"></script>
<script src="__ADMIN_PUBLIC__/js/bootstrap.min.js?v=3.3.6"></script>
<script src="__ADMIN_PUBLIC__/plugins/sweetalert/sweetalert.min.js"></script>
<script src="__ADMIN_PUBLIC__/js/plugins/echarts/echarts-all.js"></script>
<!--<script src="__ADMIN_PUBLIC__/js/demo/echarts-demo.min.js"></script>-->

</body>

<script>
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


<!-- Mirrored from www.zi-han.net/theme/hplus/graph_echarts.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:18:59 GMT -->
</html>
