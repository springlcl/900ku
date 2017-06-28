<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>银行卡 - 900Ku后台</title>
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
                        <h5>银行卡 <!--<small class="m-l-sm">这是一个自定义面板</small>--></h5>
                    </div>
                    <div class="ibox-content">
                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal m-t">
                        <div class="tabs-container">

                            <div class="tab-content">
                                <div class="alert alert-warning">
                                    请保证姓名、证件持有人、银行卡开户人为同一人。
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">真实姓名：</label>
                                    <div class="col-sm-4">
                                        <input name="realname" class="form-control" type="text" value="{$admin['realname']}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">证件类型：</label>
                                    <div class="col-sm-4">
                                        <select name='certificates' name="certificates" class='form-control'>
                                            <option value='1' selected>身份证</option>
                                            <option value="2" >军官证</option>
                                            <option value="3" >驾驶证</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">证件号码：</label>
                                    <div class="col-sm-4">
                                        <input name="certificates_num" class="form-control" type="text" value="{$admin['certificates_num']}" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">开户银行：</label>
                                    <div class="col-sm-4">
                                        <select name='bank_id' class='form-control'>
                                            <foreach name="bank" item="vo" key="k" >
                                                <option value='{$k}'>{$vo['name']}</option>
                                            </foreach>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">银行卡号：</label>
                                    <div class="col-sm-4">
                                        <input name="bank_num" class="form-control" type="text" value="{$admin['bank_num']}" placeholder="">
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
                                    <input class="btn btn-primary" name="submit2" type="submit" value="　绑定银行卡　">
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
