<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>编辑供应商信息 - 900Ku后台</title>
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
                        <h5>编辑供应商信息 </h5><a href="{:U('supplier/user')}"><h5 class="pull-right">返回供应商列表</h5></a>
                    </div>
                    <div class="ibox-content">
                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal m-t">
                            <input type="hidden" value="{$list['uid']}" name="uid" />
                        <div class="tabs-container">
                            <ul class="nav nav-tabs">
                            </ul>
                            <div class="tab-content">
                                <div id="tab-1" class="tab-pane active">
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">昵称：</label>
                                            <div class="col-sm-4">
                                                <input name="username" class="form-control" type="text" value="{$list['username']}" placeholder="" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">电话：</label>
                                            <div class="col-sm-4">
                                                <input name="mobile" class="form-control" type="text" value="{$list['mobile']}" placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">个性签名：</label>
                                            <div class="col-sm-4">
                                                <input name="sign" class="form-control" type="text" value="{$list['sign']}"  placeholder="">
                                            </div>
                                        </div>
                                        <!--<div class="form-group">
                                            <label class="col-sm-2 control-label">是否认证：</label>

                                            <div class="col-sm-10">
                                                <label class="checkbox-inline">
                                                    <input type="radio" name="option1" checked>认证</label>
                                                <label class="checkbox-inline">
                                                    <input type="radio" name="option1">未认证</label>
                                            </div>
                                        </div>-->
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">状态：</label>

                                            <div class="col-sm-10">
                                                <label class="checkbox-inline">
                                                    <input type="radio" name="status" <if condition="$list['status'] eq 1">checked</if> value=1    >正常</label>
                                                <label class="checkbox-inline">
                                                    <input type="radio" name="status" <if condition="$list['status'] eq 0">checked</if> value=0>禁用</label>
                                            </div>
                                        </div>
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
                                    <input class="btn btn-primary" name="submit2" type="submit" value="　提 　交　">
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
