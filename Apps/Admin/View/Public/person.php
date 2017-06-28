<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>个人资料 - 900Ku后台</title>
    <link href="__ADMIN_PUBLIC__/css/bootstrap.min14ed.css?v=3.3.6" rel="stylesheet">
    <link href="__ADMIN_PUBLIC__/css/font-awesome.min93e3.css?v=4.4.0" rel="stylesheet">
    <link href="__ADMIN_PUBLIC__/css/animate.min.css" rel="stylesheet">
    <link href="__ADMIN_PUBLIC__/css/style.min862f.css?v=4.1.0" rel="stylesheet">

</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeIn">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>个人资料 <!--<small class="m-l-sm">这是一个自定义面板</small>--></h5>
                    </div>
                    <div class="ibox-content">
                        <form action="{:U('index/person')}" method="post" enctype="multipart/form-data" class="form-horizontal m-t">
                            <input type="hidden" name="aid" value="{$data['aid']}">
                        <div class="tabs-container">
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#tab-1" aria-expanded="true"> 个人信息</a>
                                </li>
                               <!-- <li class=""><a data-toggle="tab" href="#tab-2" aria-expanded="false">修改密码</a>
                                </li>-->
                            </ul>
                            <div class="tab-content">
                                <div id="tab-1" class="tab-pane active">
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">昵称：</label>
                                            <div class="col-sm-4">
                                                <input name="username" class="form-control" type="text" value="{$data['username']}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">真实姓名：</label>
                                            <div class="col-sm-4">
                                                <input name="realname" class="form-control" type="text" value="{$data['realname']}" placeholder="请填写真实姓名">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">邮箱：</label>
                                            <div class="col-sm-4">
                                                <input name="email" class="form-control" type="text" value="{$data['email']}" placeholder="请输入邮箱">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">手机号码：</label>
                                            <div class="col-sm-4">
                                                <input name="mobile" class="form-control" type="text" value="{$data['mobile']}" placeholder="请填写手机号码">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                           <!--     <div id="tab-2" class="tab-pane">
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">旧密码：</label>
                                            <div class="col-sm-4">
                                                <input name="publisher" class="form-control" type="text" placeholder="请填写旧密码">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">新密码：</label>
                                            <div class="col-sm-4">
                                                <input name="publisher" class="form-control" type="text" placeholder="请输入新密码">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">确认密码：</label>
                                            <div class="col-sm-4">
                                                <input name="publisher" class="form-control" type="text" placeholder="请输入确认密码">
                                            </div>
                                        </div>
                                    </div>
                                </div>-->
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
    <script src="__ADMIN_PUBLIC__/js/content.min.js?v=1.0.0"></script>
</body>
</html>
