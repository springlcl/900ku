 <!DOCTYPE html>
<html>


<!-- Mirrored from www.zi-han.net/theme/hplus/table_basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:20:01 GMT -->
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>导航列表管理 - 900ku后台</title>
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
                        <h5>导航列表管理</h5><a href="{:U('system/nav')}"><h5 class="pull-right">返回导航列表</h5></a>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="input-group">
                                    <a href="javascript:;"><button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#myModal"> 添加导航</button> </span></a>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>排序</th>
                                        <th>编号</th>
                                        <th>导航名称</th>
                                        <th>链接地址</th>
                                        <th>编辑时间</th>
                                        <th style="text-align: center; ">操作</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <if condition="$datalist">
                                    <volist name="datalist" id="vo">
                                    <tr>
                                        <td>{$vo.sort_order}</td>
                                        <td>{$vo.nav_id}</td>
                                        <td>{$vo.nav_name}</td>
                                        <td>{$vo.url}</td>
                                        <td>{$vo.add_time|date="Y-m-d H:i:s",###}</td>
                                        <td style="text-align: center; ">
                                            <a href="{:U('system/nav_edit/nid/'.$vo['nav_id'])}" class="btn btn-primary btn-xs"><i class="fa fa-edit" aria-hidden="true"></i> 编辑</a>
                                            <a href="{:U('system/nav_del/nid/'.$vo['nav_id'])}" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash" aria-hidden="true"></i> 删除</a>
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


    <!-- 添加栏目模态框（Modal） -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                    <h4 class="modal-title" id="myModalLabel">添加导航</h4>
                </div>
                <form class="form-horizontal" role="form" action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="nav_type_id" value="{$_GET['fid']}">
                    <div id="myTabContent" class="tab-content">
                        <div class="modal-body tab-pane fade active in" role="tabpanel" id="tabs1" aria-labelledby="1tab">

                            <div class="form-group">
                                <label class="col-sm-2 control-label">导航名称</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="nav_name" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">链接地址</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="url" placeholder="123">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">排序</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="sort_order" placeholder="">
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
</body>


<!-- Mirrored from www.zi-han.net/theme/hplus/table_basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:20:01 GMT -->
</html>
