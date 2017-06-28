 <!DOCTYPE html>
<html>


<!-- Mirrored from www.zi-han.net/theme/hplus/table_basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:20:01 GMT -->
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>友情链接 - 900ku后台</title>
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
                        <h5>友情链接</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-sm-2 m-b-xs">
                                <form action="{:U('system/flink')}" method="post">
                                <div class="input-group">
                                <select class="input-sm form-control input-s-sm inline" name="cid">
                                    <option value="0">请选择分类</option>
                                    <volist name="fenlei" id="vo">
                                    <option value="{$vo.type_id}">{$vo.type_name}</option>
                                    </volist>
                                </select>
                                <span class="input-group-btn">
                                        <button type="submit" class="btn btn-sm btn-primary"> 查询</button> </span>
                                </div>
                                </form>
                            </div>
                            <div class="col-sm-3">
                                <div class="input-group">
                                    <a href="{:U('system/flink_add')}"><button type="button" class="btn btn-sm btn-primary"> 添加友情链接</button> </span></a>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>排序</th>
                                        <th>编号</th>
                                        <th>名称</th>
                                        <th>描述</th>
                                        <th>链接地址</th>
                                        <th>编辑时间</th>
                                        <th>状态</th>
                                        <th style="text-align: center; ">操作</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <if condition="$datalist">
                                <volist name="datalist" id="vo">
                                    <tr>
                                        <td>{$vo.sort_order}</td>
                                        <td>{$vo.flink_id}</td>
                                        <td>{$vo.webname}</td>
                                        <td>{$vo.remark}</td>
                                        <td>{$vo.url}</td>
                                        <td>{$vo.add_time|date="Y-m-d H:i:s",###}</td>
                                        <td>
                                            <if condition="$vo.is_show eq 0">
                                                启用
                                                <else/>
                                                禁用
                                            </if>
                                        </td>
                                        <td style="text-align: center; ">
                                            <a href="{:U('system/flink_edit/fid/'.$vo['flink_id'])}" class="btn btn-primary btn-xs"><i class="fa fa-edit" aria-hidden="true"></i> 编辑</a>
                                            <a href="{:U('system/flink_del/fid/'.$vo['flink_id'])}" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash" aria-hidden="true"></i> 删除</a>
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
</body>
</html>
