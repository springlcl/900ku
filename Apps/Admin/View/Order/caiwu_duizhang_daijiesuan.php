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
                    <h5>平台对账</h5>
                </div>
                <div class="ibox-content">
                    <div class="row" style="border-bottom:1px solid #eee;margin-bottom: 20px;">
                        <a href="{:U('order/duizhang_daijiesuan')}" class="btn btn-primary"> 待结算</a>
                        <a href="{:U('order/duizhang_jiesuan')}" class="btn btn-default"> 已结算</a>
                    </div>
                    <div class="row">
                        <div role="form" class="form-inline">
                            <div class="col-sm-2 m-b-xs">
                                <form action="{:U('order/duizhang_daijiesuan')}" method="post">
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
                                    <a href="{:U('order/limitday_tongji_daijiesuan/day/1')}">最近7天</a>
                                    <a href="{:U('order/limitday_tongji_daijiesuan/day/2')}">最近30天</a>
                                </div>
                                <div class="input-group">
                                    <a href="{:U('order/duizhang_daijiesuan_csv')}"><button type="button" class="btn btn-sm btn-primary"> 导出</button></a>
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
                                <th>付款时间</th>
                                <th>支付单号</th>
                                <th>支付渠道</th>
                                <th>供应商/展厅</th>
                                <th>状态</th>
                                <th style="text-align: center; ">操作</th>
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
                                        <td>{$vo.paid_time|date="Y-m-d H:i:s",###}</td>
                                        <td>{$vo.bank_code}</td>
                                        <td>
                                            <if condition="$vo.paid_way eq 0">线上转账
                                                <elseif condition="$vo.paid_way eq 1"/>线下银行
                                            </if>
                                        </td>
                                        <td>{$vo.sup_name}</td>
                                        <td>
                                            <if condition="$vo.is_confirm eq 0">未审核
                                                <elseif condition="$vo.is_confirm eq 1"/>已审核
                                            </if>
                                        </td>
                                        <td style="text-align: center; ">
                                            <a href="javascript:;" class="btn btn-primary btn-xs shenhe" data-toggle="modal" data-target="#myModal" bz='{$v.remarks}' pid='{$vo.pid}'><i class="fa fa-edit" aria-hidden="true"></i> 审核</a>
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
<!-- 添加栏目模态框（Modal） -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title" id="myModalLabel">备注</h4>
            </div>
            <form class="form-horizontal" role="form" action="{:U('order/shenhe')}" method="post" enctype="multipart/form-data">
                <div id="myTabContent" class="tab-content">
                    <div class="modal-body tab-pane fade active in" role="tabpanel" id="tabs1" aria-labelledby="1tab">

                        <div class="form-group">
                            <label class="col-sm-2 control-label">备注内容</label>
                            <div class="col-sm-9">
                                <input type='hidden' class='pid' name='pid'>
                                <input type="text" class="form-control xg_remarks" name="remarks" placeholder="">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- 结束            -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default"
                            data-dismiss="modal">关闭
                    </button>
                    <button type="submit" class="btn btn-primary">保存</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
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

        $(".shenhe").click(function(){
            $('.xg_remarks').val($(this).attr('pid'));
            $('.pid').val($(this).attr('pid'));
        });
    });
</script>
</body>


<!-- Mirrored from www.zi-han.net/theme/hplus/table_basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:20:01 GMT -->
</html>
