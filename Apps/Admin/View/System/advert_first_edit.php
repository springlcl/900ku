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
                        <h5>编辑广告分类 </h5><a href="{:U('system/vert')}"><h5 class="pull-right">返回广告分类</h5></a>
                    </div>
                    <div class="ibox-content">
                        <form class="form-horizontal" role="form" action="{:U('system/advert_first_edit')}" method="post" enctype="multipart/form-data">
                            <div id="myTabContent" class="tab-content">
                                <div class="modal-body tab-pane fade active in" role="tabpanel" id="tabs1" aria-labelledby="1tab">

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">分类名称</label>
                                        <div class="col-sm-8">
                                            <input type="hidden" name="tid" value="{$arr['tid']}">
                                            <input type="text" class="form-control" name="type_name" placeholder="" value="{$arr['type_name']}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">分类标识</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="biaoshi" placeholder="" value="{$arr['biaoshi']}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">导航列表</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="type" placeholder="" value="{$arr['type']}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- 结束            -->
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
