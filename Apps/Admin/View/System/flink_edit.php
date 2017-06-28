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
                        <h5>编辑友情链接 </h5><a href="{:U('system/flink')}"><h5 class="pull-right">返回友情链接</h5></a>

                    </div>
                    <div class="ibox-content">
                        <form action="{:U('system/flink_edit')}" method="post" enctype="multipart/form-data" class="form-horizontal m-t">
                            <input name="flink_id" type="hidden" value="{$data['flink_id']}">
                        <div class="tabs-container">
                            <ul class="nav nav-tabs">
                            </ul>
                            <div class="tab-content">
                                <div id="tab-1" class="tab-pane active">
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">所属分类：</label>
                                            <div class="col-sm-4">
                                                <select name='type_id' class='form-control'>
                                                    <option value='0' selected>选择分类</option>
                                                    <volist name="fenlei" id="vo">
                                                        <option value="{$vo.type_id}" <?= ($vo['type_id']==$data['type_id'])?'selected':'';?>>{$vo.type_name}</option>
                                                    </volist>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">链接名称：</label>
                                            <div class="col-sm-4">
                                                <input name="webname" class="form-control" type="text" value="{$data['webname']}" placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">链接描述：</label>
                                            <div class="col-sm-4">
                                                <input name="remark" class="form-control" type="text" value="{$data['remark']}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">链接网址：</label>
                                            <div class="col-sm-4">
                                                <input name="url" class="form-control" type="text" value="{$data['url']}" placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">链接排序：</label>
                                            <div class="col-sm-4">
                                                <input name="sort_order" class="form-control" type="text" value="{$data['sort_order']}" placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">链接状态：</label>

                                            <div class="col-sm-10">
                                                <label class="checkbox-inline">
                                                    <input type="radio" name="is_show" value="0" <?= ($data['is_show']==0)?'checked':'';?>>开启</label>
                                                <label class="checkbox-inline">
                                                    <input type="radio" name="is_show" value="1" <?= ($data['is_show']==1)?'checked':'';?>>关闭</label>
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
