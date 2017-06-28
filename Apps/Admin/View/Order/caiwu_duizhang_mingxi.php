 <!DOCTYPE html>
<html>


<!-- Mirrored from www.zi-han.net/theme/hplus/table_basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:20:01 GMT -->
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>交易明细 - 900ku后台</title>
    <link href="__ADMIN_PUBLIC__/css/bootstrap.min14ed.css?v=3.3.6" rel="stylesheet">
    <link href="__ADMIN_PUBLIC__/css/font-awesome.min93e3.css?v=4.4.0" rel="stylesheet">
    <link href="__ADMIN_PUBLIC__/css/plugins/bootstrap-table/bootstrap-table.min.css" rel="stylesheet">
    <link href="__ADMIN_PUBLIC__/css/animate.min.css" rel="stylesheet">
    <link href="__ADMIN_PUBLIC__/css/style.min862f.css?v=4.1.0" rel="stylesheet">
    <style>
        .onoffswitch-checkbox:checked+.onoffswitch-label .onoffswitch-inner {
            margin-left: 0px;
        }
    </style>
</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">

        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>交易明细</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div role="form" class="form-inline">
                                <div class="col-sm-2 m-b-xs">
                                    <form action="{:U('order/duizhang_mingxi')}" method="post">
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
                                        <a href="{:U('order/limitday_tongji_mingxi/day/1')}">最近7天</a>
                                        <a href="{:U('order/limitday_tongji_mingxi/day/2')}">最近30天</a>
                                    </div>
                                    <div class="input-group">
                                        <a href="{:U('order/duizhang_mingxi_csv')}"><button type="button" class="btn btn-sm btn-primary"> 导出</button></a>
                                    </div>
                                </form>

                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>序号</th>
                                        <th>采购商</th>
                                        <th>订单号</th>
                                        <th>付款金额</th>
                                        <th>款项</th>
                                        <th>供应商</th>
                                        <th>一级业务员提成</th>
                                        <th>二级业务员提成</th>
                                        <th>三级业务员提成</th>
                                        <th>平台服务费</th>
                                        <th>区域经理提成</th>
                                        <th>客户经理提成</th>
                                        <th>供应商收款</th>
                                        <th>结算时间</th>
                                        <th>结算单号</th>
                                        <th>状态</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <if condition="$data">
                                        <volist name="data" id="vo">
                                            <tr>
                                                <td>{$vo.pid}</td>
                                                <td>{$vo.pur_name}</td>
                                                <td>{$vo.order_code}</td>
                                                <td>{$vo.total}</td>
                                                <td>
                                                    <if condition="$vo.pay_stat eq 1">预付款
                                                        <elseif condition="$name eq 2"/>发货款
                                                        <elseif condition="$name eq 3"/>验收款
                                                        <elseif condition="$name eq 4"/>质保金
                                                        <else/>待付预
                                                    </if>
                                                </td>
                                                <td>{$vo.sup_name}</td>
                                                <td>{$vo.ticheng_one}</td>
                                                <td>{$vo.ticheng_two}</td>
                                                <td>{$vo.ticheng_three}</td>
                                                <td>{$vo.pingtai}</td>
                                                <td>{$vo.quyu_pay}</td>
                                                <td>{$vo.kehu_pay}</td>
                                                <td>{$vo.gys_pay}</td>
                                                <td>{$vo.paid_time|date="Y-m-d H:i:s",###}</td>
                                                <td>{$vo.bank_code}</td>
                                                <td>
                                                    <if condition="$vo.is_confirm eq 0">处理中
                                                        <elseif condition="$vo.is_confirm eq 1"/>已到账
                                                    </if>
                                                </td>
                                            </tr>
                                        </volist>
                                    </if>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="__ADMIN_PUBLIC__/js/jquery.min.js?v=2.1.4"></script>
    <script src="__ADMIN_PUBLIC__/js/bootstrap.min.js?v=3.3.6"></script>
    <script src="__ADMIN_PUBLIC__/js/content.min.js?v=1.0.0"></script>
    <script src="__ADMIN_PUBLIC__/js/plugins/layer/laydate/laydate.js"></script>
    <script>
        $(document).ready(function(){
            var start={elem:"#start",format:"YYYY/MM/DD",min:laydate.now(),max:"2099-06-16 23:59:59",istime:false,istoday:false,choose:function(datas){end.min=datas;end.start=datas}};
            var end={elem:"#end",format:"YYYY/MM/DD",min:laydate.now(),max:"2099-06-16 23:59:59",istime:false,istoday:false,choose:function(datas){start.max=datas}};
            laydate(start);laydate(end);
        });
    </script>
</body>


<!-- Mirrored from www.zi-han.net/theme/hplus/table_basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:20:01 GMT -->
</html>
