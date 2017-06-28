<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>添加主营类目 - 900Ku后台</title>
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
                        <h5>添加主营类目 </h5><a href="{:U('supplier/zhanting_zhuying')}"><h5 class="pull-right">返回主营类目</h5></a>
                    </div>
                    <div class="ibox-content">
                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal m-t">
                            <input type="hidden" value="<if condition='isset($once)'>{$once['mcid']}<else />0</if>" name="mc_id" />
                        <div class="tabs-container">
                            <ul class="nav nav-tabs">
                            </ul>
                            <div class="tab-content">
                                <div id="tab-1" class="tab-pane active">
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">名称：</label>
                                            <div class="col-sm-4">
                                                <input name="mc_name" class="form-control" type="text" value='<if condition="isset($once)">{$once['mc_name']}</if>' placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">排序：</label>
                                            <div class="col-sm-4">
                                                <input name="sort_order" class="form-control" type="text" value="<if condition="isset($once)">{$once['sort_order']}</if>" placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">状态：</label>

                                            <div class="col-sm-10">
                                                <label class="checkbox-inline">
                                                    <input type="radio" name="status" value="0" <if condition="(isset($once)) && ($once['status'] eq 0) ">checked<else />checked</if> >开启</label>
                                                <label class="checkbox-inline">
                                                    <input type="radio" name="status" value="1" <if condition="isset($once)  && ($once['status'] eq 1) ">checked</if>>关闭</label>
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
    <script src="js/jquery.min.js?v=2.1.4"></script>
    <script src="js/bootstrap.min.js?v=3.3.6"></script>
    <script src="js/content.min.js?v=1.0.0"></script>
</body>
</html>
