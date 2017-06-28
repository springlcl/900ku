 <!DOCTYPE html>
<html>
 <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>银行汇款订单 - 900ku后台</title>
    <link href="__ADMIN_PUBLIC__/css/bootstrap.min14ed.css?v=3.3.6" rel="stylesheet">
    <link href="__ADMIN_PUBLIC__/css/font-awesome.min93e3.css?v=4.4.0" rel="stylesheet">
    <link href="__ADMIN_PUBLIC__/css/plugins/bootstrap-table/bootstrap-table.min.css" rel="stylesheet">
    <link href="__ADMIN_PUBLIC__/css/animate.min.css" rel="stylesheet">
    <link href="__ADMIN_PUBLIC__/css/style.min862f.css?v=4.1.0" rel="stylesheet">
</head>
<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">

        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>准入订单</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div role="form" class="form-inline">
                                <div class="col-sm-2 m-b-xs">
                                    <form action="{:U('order/order_bank')}" method="post">
                                    <div class="input-group">
                                        <input type="text" class="input-sm form-control input-s-sm inline" placeholder="订单号" name="search">
                                        <input type="hidden" name="type" value="1">
                                        <span class="input-group-btn">
                                        <button type="submit" class="btn btn-sm btn-primary"> 搜索</button> </span>
                                    </div>
                                    </form>
                                </div>
                                <form action="" method="post">
                                    <input type="hidden" name="type" value="2">
                                <div class="form-group">
                                    <label class="sr-only"></label>
                                    <select class="input-sm form-control input-s-sm inline" name="exid">
                                        <option value="0">供应商</option>
                                        <volist name="zhanting" id="vo">
                                            <option value="{$vo.exid}">{$vo.ex_name}</option>
                                        </volist>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="sr-only"></label>
                                    <select class="input-sm form-control input-s-sm inline" name="pid">
                                        <option value="0">采购商</option>
                                        <volist name="project" id="vo">
                                            <option value="{$vo.pid}">{$vo.pro_name}</option>
                                        </volist>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="sr-only"></label>
                                    <select class="input-sm form-control input-s-sm inline" name="order_status">
                                        <option value="0">订单状态</option>
                                        <option value="1">已下单</option>
                                        <option value="2">预付款已付</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="sr-only"></label>
                                    <select class="input-sm form-control input-s-sm inline" name="pay_status">
                                        <option value="0">付款状态</option>
                                        <option value="1">预付款已付</option>
                                        <option value="2">发货款已付</option>
                                        <option value="3">验收款已付</option>
                                        <option value="4">质保金已付</option>
                                    </select>
                                </div>

                                <div class="form-group" id="data_5">
                                    <label class="font-noraml">成交时间：</label>
                                    <div class="input-daterange input-group" id="datepicker">
                                        <input type="text" class="laydate-icon input-sm form-control layer-date" name="time_start" id="start" value="<?= date('Y-m-d',time());?>" placeholder="开始日期"/>
                                        <span class="input-group-addon">到</span>
                                        <input type="text" class="laydate-icon input-sm form-control layer-date" name="time_end" id="end" value="<?= date('Y-m-d',time());?>" placeholder="结束日期"/>
                                    </div>
                                </div>
                                <button class="btn btn-white" type="submit" style="height: 30px;margin-top:5px;">查询</button>

                                <div class="checkbox m-l m-r-xs">
                                    <a href="{:U('order/limitday_bank/day/1')}">最近7天</a>　<a href="{:U('order/limitday_bank/day/2')}">最近30天</a>
                                </div>
                                </form>

                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>订单号</th>
                                        <th>供应商</th>
                                        <th>采购商</th>
                                        <th>价格</th>
                                        <th>数量</th>
                                        <th>总额</th>
                                        <th>已付</th>
                                        <th>付款状态</th>
                                        <th>订单状态</th>
                                        <th>下单时间</th>
                                        <th style="text-align: center; ">操作</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <if condition="$data">
                                    <volist name="data" id="vo">
                                    <tr>
                                        <td>{$vo.order_code}</td>
                                        <td>{$vo.sup_name}</td>
                                        <td>{$vo.pur_name}</td>
                                        <td>￥{$vo.goods_price}</td>
                                        <td>{$vo.goods_count}</td>
                                        <td>{$vo.total}</td>
                                        <td>{$vo.paid_amount}</td>
                                        <td>
                                            <if condition="$vo.pay_stat eq 1">预付款已付
                                                <elseif condition="$name eq 2"/>发货款已付
                                                <elseif condition="$name eq 3"/>验收款已付
                                                <elseif condition="$name eq 4"/>质保金已付
                                                <else/>待付预付款
                                            </if>
                                        </td>
                                        <td>
                                            <if condition="$vo.status eq 0">商品下单
                                                <elseif condition="$vo.status eq 1"/>支付预付款
                                                <elseif condition="$vo.status eq 2"/>商品出库
                                                <elseif condition="$vo.status eq 3"/>支付发货款
                                                <elseif condition="$vo.status eq 4"/>供应商发货
                                                <elseif condition="$vo.status eq 5"/>付验收款
                                                <elseif condition="$vo.status eq 6"/>付质保金
                                                <elseif condition="$vo.status eq 7"/>订单完成
                                                <elseif condition="$vo.status eq 9"/>退货申请中
                                                <elseif condition="$vo.status eq 10"/>退货中
                                                <elseif condition="$vo.status eq 11"/>退货完成
                                                <else/>未查询到
                                            </if>
                                        </td>
                                        <td>{$vo.created|date="Y-m-d H:i:s",###}</td>
                                        <td style="text-align: center; ">
                                            <a href="{:U('order/return_bank_info/oid/'.$vo['oid'])}">查看详情</a>
                                        </td>
                                    </tr>
                                    </volist>
                                </if>
                                </tbody>
                            </table>
                            <div class="col-sm-12 text-center"><div class="dataTables_paginate paging_simple_numbers"><ul class="pagination">{$page}</ul></div></div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="__ADMIN_PUBLIC__/js/jquery.min.js?v=2.1.4"></script>
    <script src="__ADMIN_PUBLIC__/js/bootstrap.min.js?v=3.3.6"></script>
    <script src="__ADMIN_PUBLIC__/js/plugins/layer/laydate/laydate.js"></script>
    <script>
        $(document).ready(function(){
            var start={elem:"#start",format:"YYYY-MM-DD",max:"2099-06-16 23:59:59",istime:false,istoday:false,choose:function(datas){end.min=datas;end.start=datas}};
            var end={elem:"#end",format:"YYYY-MM-DD",max:"2099-06-16 23:59:59",istime:false,istoday:false,choose:function(datas){start.max=datas}};
            laydate(start);laydate(end);
        });
    </script>
</body>
</html>
