 <!DOCTYPE html>
<html>
 <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品举报管理 - 900ku后台</title>
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
                        <h5>商品举报管理</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-sm-2 m-b-xs">
                                <form action="{:U('goods/jubao')}" method="post">
                                <div class="input-group">
                                    <input type="text" name="search" class="input-sm form-control input-s-sm inline" placeholder="展厅/商品/举报人">
                                <span class="input-group-btn">
                                        <button type="submit" class="btn btn-sm btn-primary"> 搜索</button> </span>
                                </div>
                                </form>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>编号</th>
                                        <th>所属展厅</th>
                                        <th>产品信息</th>
                                        <th>举报人信息</th>
                                        <th>举报类型</th>
                                        <th>举报时间</th>
                                        <th style="text-align: center; ">操作</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <if condition="$datalist">
                                    <volist name="datalist" id="vo">
                                    <tr>
                                        <td>{$vo.jid}</td>
                                        <td>{$vo.ex_name}</td>
                                        <td><a href="{$vo.gid}">{$vo.goods_name}</a></td>
                                        <td>{$vo.username}</td>
                                        <td>{$vo.type}</td>
                                        <td>{$vo.add_time|date="Y-m-d H:i:s",###}</td>
                                        <td style="text-align: center; ">

                                                <if condition="$vo.is_jinyong eq 1">
                                                    <a class="btn btn-info btn-xs">已禁用</a>
                                                    <else/>
                                                    <a href="{:U('goods/jinyong/gid/'.$vo['gid'])}" class="btn btn-info btn-xs">禁用</a>
                                                </if>

                                            <a href="{:U('goods/bohui/jid/'.$vo['jid'])}" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash" aria-hidden="true"></i> 驳回</a>
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
