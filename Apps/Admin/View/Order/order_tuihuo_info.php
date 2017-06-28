<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>订单详情 - 900Ku后台</title>
    <link href="__ADMIN_PUBLIC__/css/bootstrap.min14ed.css?v=3.3.6" rel="stylesheet">
    <link href="__ADMIN_PUBLIC__/css/font-awesome.min93e3.css?v=4.4.0" rel="stylesheet">
    <link href="__ADMIN_PUBLIC__/css/plugins/bootstrap-table/bootstrap-table.min.css" rel="stylesheet">
    <link href="__ADMIN_PUBLIC__/css/animate.min.css" rel="stylesheet">
    <link href="__ADMIN_PUBLIC__/css/style.min862f.css?v=4.1.0" rel="stylesheet">
    <style>
        .bg-hui{background-color: #F5F5F6;}
    </style>
</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeIn">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>订单详情</h5><a href="{:U('order/return_goods')}"><h5 class="pull-right">返回订单列表</h5></a>
                    </div>
                    <div class="ibox-content">
                        <div class="row  border-bottom white-bg dashboard-header">
                            <div class="col-sm-12 text-center">
                               <img src="__ADMIN_PUBLIC__/images/order-return{$info['status']}.png" height="100">
                            </div>

                        </div>
                        <form action="http://wx.weisoul.org/admin.php/article/addnew" method="post" enctype="multipart/form-data" class="form-horizontal m-t">
                        <div class="tabs-container">
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#tab-1" aria-expanded="true"> 订单详情</a></li>
                                <li class=""><a data-toggle="tab" href="#tab-2" aria-expanded="false">付款记录</a></li>
                                <li class=""><a data-toggle="tab" href="#tab-3" aria-expanded="false">出库/物流</a></li>
                            </ul>
                            <div class="tab-content">
                                <div id="tab-1" class="tab-pane active">
                                    <div class="panel-body">

                                        <table class="table table-bordered">
                                            <tbody>
                                            <tr>
                                                <td class="bg-hui">供应商</td>
                                                <td>{$info['ex_name']}</td>
                                                <td class="bg-hui">订单号</td>
                                                <td>{$info['order_code']}</td>
                                                <td class="bg-hui">结算方式</td>
                                                <td>现付</td>
                                            </tr>
                                            <tr>
                                                <td class="bg-hui">地区</td>
                                                <td>{$info['province']}{$info['city']}</td>
                                                <td class="bg-hui">采购商</td>
                                                <td>{$info['pro_name']}</td>
                                                <td class="bg-hui">退款状态</td>
                                                <td>
                                                    <if condition="$info['pay_stat'] eq 1">已退
                                                        <else />退款中
                                                    </if>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="bg-hui">联系人</td>
                                                <td>{$info['receive_name']}-{$info['receive_call']}</td>
                                                <td class="bg-hui">收货地址</td>
                                                <td>河北省廊坊市广阳区万达广场</td>
                                                <td class="bg-hui">订单状态</td>
                                                <td>
                                                    <if condition="$info['status'] eq 7">退货申请中
                                                        <elseif condition="$info['status'] eq 8"/>退货中
                                                        <elseif condition="$info['status'] eq 9"/>退货完成
                                                    </if>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th>编号</th>
                                                <th>商品图</th>
                                                <th>商品名</th>
                                                <th>数量</th>
                                                <th>单价</th>
                                                <th>小计</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <if condition="$goods">
                                                <volist name="goods" id="vo">
                                            <tr>
                                                <td>{$vo.order_code}</td>
                                                <td><img src="__PUBLIC__/image/{$vo.goods_thumb}" width="60"></td>
                                                <td>{$vo.goods_name}</td>
                                                <td>{$vo.goods_count}</td>
                                                <td>￥{$vo.goods_price}</td>
                                                <td>{$vo.goods_total}</td>
                                            </tr>
                                                </volist>
                                            </if>
                                            </tbody>
                                        </table>

                                        <div class="feed-activity-list">

                                            <div class="feed-element">
                                                <div class="media-body ">

                                                    <p><h3>快递：</h3> 配送方式：{$info['kuaidi_name']}　　快递单号：{$info['express_code']}</p><br/><h3>订单操作记录：</h3>
                                                </div>
                                                <table class="table table-bordered">
                                                    <thead>
                                                    <tr>
                                                        <th>操作时间</th>
                                                        <th>操作人员</th>
                                                        <th>操作类型</th>
                                                        <th>操作日志</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>2017-05-08 15:24:45</td>
                                                        <td>小刘</td>
                                                        <td>删除订单</td>
                                                        <td>---</td>
                                                    </tr>
                                                    <tr>
                                                        <td>2017-05-12 11:24:45</td>
                                                        <td>小张</td>
                                                        <td>创建订单</td>
                                                        <td>--</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div id="tab-2" class="tab-pane">
                                    <div class="panel-body">

                                        <div>应付金额：￥4500 　已付金额：￥500 　</div><br/>

                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th>订单号</th>
                                                <th>时间</th>
                                                <th>付款金额</th>
                                                <th>支付方式</th>
                                                <th>收款账号</th>
                                                <th>付款状态</th>
                                                <th>备注</th>
                                                <th>查看</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>WD14555</td>
                                                <td>2017-05-08 15:24:45</td>
                                                <td>￥125</td>
                                                <td>线上支付</td>
                                                <td>默认账号</td>
                                                <td>确认</td>
                                                <td>--</td>
                                                <td>查看详情</td>
                                            </tr>
                                            <tr>
                                                <td>WD2466852</td>
                                                <td>2017-05-12 11:24:45</td>
                                                <td>￥125</td>
                                                <td>线下转账</td>
                                                <td>默认账号</td>
                                                <td>待确认</td>
                                                <td>--</td>
                                                <td>查看详情</td>
                                            </tr>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                                <div id="tab-3" class="tab-pane">
                                    <div class="panel-body">

                                        <h3>待出库清单</h3>

                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th>订单号</th>
                                                <th>商品</th>
                                                <th>商品规格</th>
                                                <th>订购数</th>
                                                <th>实际库存</th>
                                                <th>备注</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <if condition="$goods">
                                                <volist name="goods" id="vo">
                                            <tr>
                                                <td>{$vo.order_code}</td>
                                                <td><img src="__PUBLIC__/image/{$vo.goods_thumb}" width="50">{$vo.goods_name}</td>
                                                <td>{$vo.standards}</td>
                                                <td>{$vo.goods_count}</td>
                                                <td>{$vo.goods_num}</td>
                                                <td>--</td>
                                            </tr>
                                                </volist>
                                            </if>
                                            </tbody>
                                        </table>
                                        <h3>物流</h3>
                                        <ul class="logistics_list">
                                            <if condition="$expInfo_data">
                                                <volist name="expInfo_data" id="vo">
                                            <li><i></i><span class="date">{$vo.time}</span>{$vo.context}</li>
                                                </volist>
                                                <else/>暂无物流信息
                                            </if>
                                        </ul>
                                    </div>
                                </div>


                            </div>
                            <div class="form-group">
                                <div class="col-sm-8 col-sm-offset-3">
                                    <div class="checkbox">
                                        <label>
                                            <!-- <input type="checkbox" class="checkbox" id="agree" name="agree"> 我已经认真阅读并同意《商品发布协议》 -->
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12 text-center">
                                    <!--<input class="btn btn-primary" name="submit2" type="submit" value="　提 　交　">-->
                                </div>
                            </div>
                        </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="__ADMIN_PUBLIC__/js/jquery.min.js?v=2.1.4"></script>
    <script src="__ADMIN_PUBLIC__/js/bootstrap.min.js?v=3.3.6"></script>
    <script src="__ADMIN_PUBLIC__/js/plugins/layer/laydate/laydate.js"></script>
</body>
</html>
