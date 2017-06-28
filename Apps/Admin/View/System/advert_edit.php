<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>编辑导航 - 900Ku后台</title>
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
                        <h5>编辑广告 </h5><a href="{:U('system/vert')}"><h5 class="pull-right">返回广告列表</h5></a>

                    </div>
                    <div class="ibox-content">
                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal m-t">
                            <input name="aid" type="hidden" value="{$data['aid']}">
                            <input name="tid" type="hidden" value="{$data['tid']}">
                        <div class="tabs-container">
                            <ul class="nav nav-tabs">
                            </ul>
                            <div class="tab-content">
                                <div id="tab-1" class="tab-pane active">
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">导航分类：</label>
                                            <div class="col-sm-4">
                                                <select class="input-sm form-control input-s-sm inline" name="nav_type_id">
                                                    <volist name="fenlei" id="vo">
                                                        <option value="{$vo.tid}" <?= ($vo['tid']==$data['tid'])?'selected':'';?>>{$vo.type_name}</option>
                                                    </volist>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">导航名称：</label>
                                            <div class="col-sm-4">
                                                <input name="name" class="form-control" type="text" value="{$data['name']}" placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">广告图片地址：</label>
                                            <div class="col-sm-4">
                                                <input name="thumb" class="form-control" type="text" value="{$data['thumb']}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">广告链接：</label>
                                            <div class="col-sm-4">
                                                <input name="link_url" class="form-control" type="text" value="{$data['link_url']}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">状态：</label>
                                            <div class="col-sm-4">
                                                <select name="status" id="" class="form-control">
                                                    <option value="0" {$data['status']==0?'selected':''}>启用</option>
                                                    <option value="1" {$data['status']==1?'selected':''}>禁用</option>
                                                </select>
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
