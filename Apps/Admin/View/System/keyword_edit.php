<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>友情链接 - 900Ku后台</title>
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
                        <h5>编辑热门搜索词 </h5><a href="{:U('system/keyword')}"><h5 class="pull-right">返回热门搜索词</h5></a>

                    </div>
                    <div class="ibox-content">
                        <form action="{:U('system/keyword_edit')}" method="post" enctype="multipart/form-data" class="form-horizontal m-t">
                            <input name="sid" type="hidden" value="{$arr['sid']}">
                            <input name="add_time" type="hidden" value="{$arr['add_time']}">
                        <div class="tabs-container">
                            <ul class="nav nav-tabs">
                            </ul>
                            <div class="tab-content">
                                <div id="tab-1" class="tab-pane active">
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">名称：</label>
                                            <div class="col-sm-4">
                                                <input name="name" class="form-control" type="text" value="{$arr['name']}" placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">链接地址：</label>
                                            <div class="col-sm-4">
                                                <input name="url" class="form-control" type="text" value="{$arr['url']}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">排序：</label>
                                            <div class="col-sm-4">
                                                <input name="sort_order" class="form-control" type="text" value="{$arr['sort_order']}" placeholder="">
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
    <script src="js/jquery.min.js?v=2.1.4"></script>
    <script src="js/bootstrap.min.js?v=3.3.6"></script>
    <script src="js/content.min.js?v=1.0.0"></script>
</body>
</html>
