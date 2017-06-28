<!DOCTYPE html>
<html>


<!-- Mirrored from www.zi-han.net/theme/hplus/table_basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:20:01 GMT -->
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>热门搜索词 - 900ku后台</title>
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
                    <h5>收款银行</h5>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="input-group">
                                <a href="javascript:;"><button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#myModal"> 添加收款银行</button> </span></a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>编号</th>
                                <th>银行名称</th>
                                <th>状态</th>
                                <th style="text-align: center; ">操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <foreach name="bank" item="v">
                                <tr>
                                    <td>{$v.bid}</td>
                                    <td>{$v.name}</td>
                                    <if condition="$v.status eq 0 "><td>启用</td><else /><td>禁用</td></if>
                                    <td style="text-align: center; ">
                                        <a href="{:U('system/bank_edit/',array('bid'=>$v['bid']))}" class="btn btn-primary btn-xs" ><i class="fa fa-edit" aria-hidden="true"></i> 编辑</a>
                                        <a href="{:U('system/bank_del/',array('bid'=>$v['bid']))}" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash" ></i> 删除</a>
                                    </td>
                                </tr>
                            </foreach>
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
                <h4 class="modal-title" id="myModalLabel">添加收款银行</h4>
            </div>
            <form class="form-horizontal" role="form" action="{:U('system/bank_add')}" method="post" enctype="multipart/form-data">
                <div id="myTabContent" class="tab-content">
                    <div class="modal-body tab-pane fade active in" role="tabpanel" id="tabs1" aria-labelledby="1tab">

                        <div class="form-group">
                            <label class="col-sm-2 control-label">银行名称</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="name" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">银行名称</label>
                            <div class="col-sm-8">
                                <select name="status" id="" class="form-control">
                                    <option value="0">启用</option>
                                    <option value="1">禁用</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- 结束            -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default"
                            data-dismiss="modal">关闭
                    </button>
                    <button type="submit" class="btn btn-primary" >保存</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>
<script src="__ADMIN_PUBLIC__/js/jquery.min.js?v=2.1.4"></script>
<script src="__ADMIN_PUBLIC__/js/bootstrap.min.js?v=3.3.6"></script>
<script src="__ADMIN_PUBLIC__/js/plugins/peity/jquery.peity.min.js"></script>
<script src="__ADMIN_PUBLIC__/js/content.min.js?v=1.0.0"></script>
<script src="__ADMIN_PUBLIC__/js/demo/peity-demo.min.js"></script>
</body>


<!-- Mirrored from www.zi-han.net/theme/hplus/table_basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:20:01 GMT -->
</html>
