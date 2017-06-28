<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>管理员奖金配置 - 900Ku后台</title>
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
                    <h5>管理员奖金配置 <!--<small class="m-l-sm">这是一个自定义面板</small>--></h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="tabs_panels.html#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="tabs_panels.html#">选项1</a>
                            </li>
                            <li><a href="tabs_panels.html#">选项2</a>
                            </li>
                        </ul>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <form action="{:U('manager/admin_reward_set')}" method="post" enctype="multipart/form-data"
                          class="form-horizontal m-t">
                        <div class="tabs-container">
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#tab-1" aria-expanded="true"> 区域管理员</a>
                                </li>
                                <li class=""><a data-toggle="tab" href="#tab-2" aria-expanded="false">客户经理</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div id="tab-1" class="tab-pane active">
                                    <div class="panel-body">

                                        <div class="row">
                                            <div class="col-sm-2 m-b-xs" style="width: 250px;">
                                                <div class="input-group">
                                                    推广奖励：
                                                    <label class="input-sm inline">
                                                        <input type="radio"
                                                               name="quyu_status" <?= ($data['quyu_status'] == 1) ? 'checked' : ''; ?> value="2">开启</label>
                                                    <label class="input-sm inline">
                                                        <input type="radio"
                                                               name="quyu_status" <?= ($data['quyu_status'] == 0) ? 'checked' : ''; ?> value="1">关闭</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-2 m-b-xs" style="width: 260px;">
                                                <div class="input-group">默认奖励：
                                                    <input type="text" class="input-sm input-s-sm inline"
                                                           value="{$data['quyu_default']}" name="quyu_default">
                                                    <span class="input-group-btn"><button type=""
                                                                                          class="btn btn-sm btn-default"> %</button> </span>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 m-b-xs">
                                                <div class="input-group">
                                                    平台服务费：2.00%
                                                    注意：这里用来分配的金额为平台收益，如不设置则推广奖励为默认奖励，为保证平台利益，平台奖励不要超出平台服务费比率。
                                                </div>
                                            </div>

                                        </div>


                                        <div class="tabs-container">
                                            <ul class="nav nav-tabs">
                                                <li class="active"><a data-toggle="tab" href="#tabs-1"
                                                                      aria-expanded="true"> 省级</a>
                                                </li>
                                                <li class=""><a data-toggle="tab" href="#tabs-2" aria-expanded="false">市级</a>
                                                </li>
                                                <li class=""><a data-toggle="tab" href="#tabs-3" aria-expanded="false">区县级</a>
                                                </li>
                                            </ul>
                                            <div class="tab-content">
                                                <div id="tabs-1" class="tab-pane active">
                                                    <div class="panel-body">
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">展厅线上(%)：</label>
                                                            <div class="col-sm-4">
                                                                <input name="province_xs" class="form-control"
                                                                       type="text" value="{$data['province_xs']}"
                                                                       placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">展厅线下(%)：</label>
                                                            <div class="col-sm-4">
                                                                <input name="province_xx" class="form-control"
                                                                       type="text" value="{$data['province_xx']}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="tabs-2" class="tab-pane">
                                                    <div class="panel-body">
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">展厅线上(%)：</label>
                                                            <div class="col-sm-4">
                                                                <input name="city_xs" class="form-control" type="text"
                                                                       value="{$data['city_xs']}" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">展厅线下(%)：</label>
                                                            <div class="col-sm-4">
                                                                <input name="city_xx" class="form-control" type="text"
                                                                       value="{$data['city_xx']}">
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div id="tabs-3" class="tab-pane">
                                                    <div class="panel-body">

                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">展厅线上(%)：</label>
                                                            <div class="col-sm-4">
                                                                <input name="area_xs" class="form-control" type="text"
                                                                       value="{$data['area_xs']}" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">展厅线下(%)：</label>
                                                            <div class="col-sm-4">
                                                                <input name="area_xx" class="form-control" type="text"
                                                                       value="{$data['area_xx']}">
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div id="tab-2" class="tab-pane">
                                    <div class="panel-body">

                                        <div class="row">
                                            <div class="col-sm-2 m-b-xs" style="width: 250px;">
                                                <div class="input-group">
                                                    推广奖励：
                                                    <label class="input-sm inline">
                                                        <input type="radio"
                                                               name="kehu_status" <?= ($data['kehu_status'] == 1) ? 'checked' : ''; ?> value="2">开启</label>
                                                    <label class="input-sm inline">
                                                        <input type="radio"
                                                               name="kehu_status" <?= ($data['kehu_status'] == 0) ? 'checked' : ''; ?> value="1">关闭</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-2 m-b-xs" style="width: 260px;">
                                                <div class="input-group">默认奖励：
                                                    <!--<input type="text" class="input-sm input-s-sm inline" value="2"><span class="input-group-addon">.00</span>
--><input type="text" class="input-sm input-s-sm inline" value="{$data['kehu_default']}" name="kehu_default">
                                                    <span class="input-group-btn"><button type="{$data['kehu_default']}"
                                                                                          class="btn btn-sm btn-default"> %</button> </span>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 m-b-xs">
                                                <div class="input-group">
                                                    平台服务费：2.00%
                                                    注意：这里用来分配的金额为平台收益，如不设置则推广奖励为默认奖励，为保证平台利益，平台奖励不要超出平台服务费比率。
                                                </div>
                                            </div>

                                        </div>
                                        <!--<div class="tabs-container">
                                            <ul class="nav nav-tabs">
                                                <li class="active"><a data-toggle="tab" href="#tabss-1" aria-expanded="true"> 省级</a>
                                                </li>
                                                <li class=""><a data-toggle="tab" href="#tabss-2" aria-expanded="false">市级</a></li>
                                                <li class=""><a data-toggle="tab" href="#tabss-3" aria-expanded="false">区县级</a></li>
                                            </ul>
                                            <div class="tab-content">
                                                <div id="tabss-1" class="tab-pane active">
                                                    <div class="panel-body">
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">展厅线上(%)：</label>
                                                            <div class="col-sm-4">
                                                                <input name="publisher" class="form-control" type="text" value="0" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">展厅线下(%)：</label>
                                                            <div class="col-sm-4">
                                                                <input name="publisher" class="form-control" type="text" value="0">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="tabss-2" class="tab-pane">
                                                    <div class="panel-body">
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">展厅线上(%)：</label>
                                                            <div class="col-sm-4">
                                                                <input name="publisher" class="form-control" type="text" value="0" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">展厅线下(%)：</label>
                                                            <div class="col-sm-4">
                                                                <input name="publisher" class="form-control" type="text" value="0">
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div id="tabss-3" class="tab-pane">
                                                    <div class="panel-body">

                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">展厅线上(%)：</label>
                                                            <div class="col-sm-4">
                                                                <input name="publisher" class="form-control" type="text" value="0" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">展厅线下(%)：</label>
                                                            <div class="col-sm-4">
                                                                <input name="publisher" class="form-control" type="text" value="0">
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>-->


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
<script src="__ADMIN_PUBLIC__/js/content.min.js?v=1.0.0"></script>
</body>
</html>
