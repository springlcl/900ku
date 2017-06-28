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
                    <h5>编辑快递公司 </h5><a href="{:U('system/kuaidi')}"><h5 class="pull-right">返回快递公司</h5></a>
                </div>
                <div class="ibox-content">
                    <form class="form-horizontal" role="form" action="{:U('system/kuaidi_edit')}" method="post" enctype="multipart/form-data">
                        <div id="myTabContent" class="tab-content">
                            <div class="modal-body tab-pane fade active in" role="tabpanel" id="tabs1" aria-labelledby="1tab">
                                <input type="hidden" class="form-control" name="eid" placeholder="" value="{$arr['eid']}">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">公司名称</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="ex_name" placeholder="" value="{$arr['ex_name']}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">公司代号</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="ex_code" placeholder="" value="{$arr['ex_code']}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">公司网址</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="ex_url" placeholder="" value="{$arr['ex_url']}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">状态</label>
                                    <div class="col-sm-8">
                                        <select name="status" id="" class="form-control">
                                            <option value="0" {$arr['status']==0?'selected':''}>启用</option>
                                            <option value="1" {$arr['status']==1?'selected':''}>禁用</option>
                                        </select>
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
