 <!DOCTYPE html>
<html>


<!-- Mirrored from www.zi-han.net/theme/hplus/table_basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:20:01 GMT -->
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>用户列表 - 900ku后台</title>
    <link href="__ADMIN_PUBLIC__/css/bootstrap.min14ed.css?v=3.3.6" rel="stylesheet">
    <link href="__ADMIN_PUBLIC__/css/font-awesome.min93e3.css?v=4.4.0" rel="stylesheet">
    <link href="__ADMIN_PUBLIC__/css/plugins/bootstrap-table/bootstrap-table.min.css" rel="stylesheet">
    <link href="__ADMIN_PUBLIC__/css/animate.min.css" rel="stylesheet">
    <link href="__ADMIN_PUBLIC__/css/style.min862f.css?v=4.1.0" rel="stylesheet">
    <style>
        .onoffswitch-checkbox:checked+.onoffswitch-label .onoffswitch-inner {
            margin-left: 0px;
        }
    </style>
</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">

        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>用户列表</h5><!--<a href="goods_art_type.html"><h5 class="pull-right">返回商品栏目属性类别</h5></a>-->
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-sm-2 m-b-xs">
                                <form role="form" action="{:U('user/index')}" method="post" enctype="multipart/form-data">
                                <div class="input-group">
                                        <input type="text" name="query" class="input-sm form-control input-s-sm inline" placeholder="昵称/备注">
                                        <span class="input-group-btn"><button class="btn btn-sm btn-primary"> 搜索</button> </span>
                                </div></form>
                            </div>
                           <div class="col-sm-2">
                                <div class="input-group">
                                    <a href="{:U('user/user_csv')}"><button type="button" class="btn btn-sm btn-primary"> 导出</button></a>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>序号</th>
                                        <th>头像</th>
                                        <th>昵称</th>
                                        <th>注册时间</th>
                                        <th>最后登录时间</th>
                                        <th>收货地址</th>
                                        <th>手机号</th>
                                        <th>最后登录IP</th>
                                        <th>操作</th>
                                    </tr>
                                </thead>
                                <tbody>
									<foreach name="data" item="v">
										<tr>
											<td>{$v.uid}</td>
											<td><img src="__PUBLIC__/admin/images/{$v.headimg}" width="50" height="50" /></td>
											<td>{$v.username}</td>
											<td>{$v.add_time|date="Y-m-d H:i:s",###}</td>
											<td>{$v.last_time|date="Y-m-d H:i:s",###}</td>
											<td></td>
											<td>{$v.mobile}</td>
											<td>{$v.last_ip}</td>
											<td><a href="javascript:;" class="btn btn-primary btn-xs remarks" data-toggle="modal" data-target="#myModal" bz='{$v.remarks}' uid='{$v.uid}'><i class="fa fa-edit" aria-hidden="true"></i> 备注</a>
											</td>
										</tr>
									</foreach>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- 添加栏目模态框（Modal） -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                    <h4 class="modal-title" id="myModalLabel">备注</h4>
                </div>
                <form class="form-horizontal" role="form" action="{:U('user/index_deit_remarks')}" method="post" enctype="multipart/form-data">
                    <div id="myTabContent" class="tab-content">
                        <div class="modal-body tab-pane fade active in" role="tabpanel" id="tabs1" aria-labelledby="1tab">

                            <div class="form-group">
                                <label class="col-sm-2 control-label">备注内容</label>
                                <div class="col-sm-9">
									<input type='hidden' class='uid' name='uid'>
                                    <input type="text" class="form-control xg_remarks" name="remarks" placeholder="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- 结束            -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default"
                                data-dismiss="modal">关闭
                        </button>
                        <button type="submit" class="btn btn-primary">保存</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal -->
    </div>
    <script src="__ADMIN_PUBLIC__/js/jquery.min.js?v=2.1.4"></script>
    <script src="__ADMIN_PUBLIC__/js/bootstrap.min.js?v=3.3.6"></script>
    <script src="__ADMIN_PUBLIC__/js/plugins/peity/jquery.peity.min.js"></script>
    <script src="__ADMIN_PUBLIC__/js/content.min.js?v=1.0.0"></script>
    <script src="__ADMIN_PUBLIC__/js/demo/peity-demo.min.js"></script>
    <script>
        $(document).ready(function(){$(".i-checks").iCheck({checkboxClass:"icheckbox_square-green",radioClass:"iradio_square-green",})});
		
		$(".remarks").click(function(){
			$('.xg_remarks').val($(this).attr('bz'));
			$('.uid').val($(this).attr('uid'));
		});
    </script>
</body>
</html>
