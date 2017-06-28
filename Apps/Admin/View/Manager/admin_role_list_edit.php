<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>编辑管理员 - 900Ku后台</title>
    <link href="__ADMIN_PUBLIC__/css/bootstrap.min14ed.css?v=3.3.6" rel="stylesheet">
    <link href="__ADMIN_PUBLIC__/css/font-awesome.min93e3.css?v=4.4.0" rel="stylesheet">
    <link href="__ADMIN_PUBLIC__/css/plugins/bootstrap-table/bootstrap-table.min.css" rel="stylesheet">
    <link href="__ADMIN_PUBLIC__/css/animate.min.css" rel="stylesheet">
    <link href="__ADMIN_PUBLIC__/css/style.min862f.css?v=4.1.0" rel="stylesheet">
</head>
<body class="gray-bg">
<div class="wrapper wrapper-content animated fadeIn">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>编辑管理员分组 </h5><a href="{:U('manager/role_list')}"><h5 class="pull-right">返回管理员分组</h5></a>
                </div>
                <div class="ibox-content">
                    <form action="" method="post" enctype="multipart/form-data" class="form-horizontal m-t">
                        <input type="hidden" name="rid" value="{$data['rid']}">
                        <div class="tabs-container">
                            <ul class="nav nav-tabs">
                            </ul>
                            <div class="tab-content">
                                <div id="tab-1" class="tab-pane active">
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">组名：</label>
                                            <div class="col-sm-4">
                                                <input name="role_name" class="form-control" type="text" value="{$data['role_name']}" placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">备注：</label>
                                            <div class="col-sm-4">
                                                <input name="remarks" class="form-control" type="text" value="{$data['remarks']}" placeholder="">
                                            </div>
                                        </div>
                                        <if condition="$vo.aid gt 3">
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">状态：</label>
                                            <div class="col-sm-4">
                                                <select name="status" id="" class="form-control">
                                                    <option value="0" {$arr['status']==0?'selected':''}>启用</option>
                                                    <option value="1" {$arr['status']==1?'selected':''}>禁用</option>
                                                </select>
                                            </div>
                                        </div>
                                        </if>
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
                                    <input class="btn btn-primary" type="submit" value="　提 　交　">
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
</body>
</html>
