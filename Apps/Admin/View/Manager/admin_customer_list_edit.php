<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>编辑管理员 - 900Ku后台</title>
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
                        <h5>编辑管理员 </h5><a href="{:U('manager/admin_customer_list')}"><h5 class="pull-right">返回管理员列表</h5></a>
                    </div>
                    <div class="ibox-content">
                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal m-t">
                            <input type="hidden" name="aid" value="{$data['aid']}">
                        <div class="tabs-container">
                            <ul class="nav nav-tabs">
                            </ul>
                            <div class="tab-content">
                                <div id="tab-1" class="tab-pane active">
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">昵称：</label>
                                            <div class="col-sm-4">
                                                <input name="publisher" class="form-control" type="text" value="{$data['username']}" placeholder="111">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">所属分组：</label>
                                            <div class="col-sm-4">
                                                <select name='rid' class='form-control'>
                                                    <option value='0'>选择所属分组</option>
                                                    <volist name="role" id="vo">
                                                        <option value="{$vo.rid}" <?= ($vo['rid']==$data['rid'])?'selected':'';?>>{$vo.role_name}</option>
                                                    </volist>
                                                </select>
                                            </div>
                                        </div>
                                        <div id="demo1" class="citys">
											<div class="form-group">
												<label class="col-sm-2 control-label">选择区域：</label>
												<div class="col-sm-4">
													<select name='province' class='form-control'>
														
													</select>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-2 control-label"></label>
												<div class="col-sm-4">
													<select name='city' class='form-control'>
														
													</select>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-2 control-label"></label>
												<div class="col-sm-4">
													<select name='area' class='form-control'>
														
													</select>
												</div>
											</div>
											<input name='province_jy' type='hidden' value='北京市' class='dizhi1'>
											<input name='city_jy' type='hidden' value='东成区' class='dizhi2'>
											<input name='area_jy' type='hidden' value="{$data['area_jy']}" class='dizhi3'>
											<input name='code' type='hidden' value="{$data['code']}" id='add_code'>
										</div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">真实姓名：</label>
                                            <div class="col-sm-4">
                                                <input name="realname" class="form-control" type="text" value="{$data['realname']}" placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">邮箱：</label>
                                            <div class="col-sm-4">
                                                <input name="email" class="form-control" type="text" value="{$data['email']}" placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">电话：</label>
                                            <div class="col-sm-4">
                                                <input name="mobile" class="form-control" type="text" value="{$data['mobile']}" placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">状态：</label>

                                            <div class="col-sm-10">
                                                <label class="checkbox-inline">
                                                    <input type="radio" name="status" <?= ($data['status']==0)?'checked':'';?> value="0">正常</label>
                                                <label class="checkbox-inline">
                                                    <input type="radio" name="status" <?= ($data['status']==1)?'checked':'';?> value="1">禁用</label>
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
    <script src="__ADMIN_PUBLIC__/js/jquery.citys.js"></script>
	<script>
		// 地点选择 默认选项
     $('.citys').citys({code:410102});
     $('#demo1').citys({
        // required:false,
        nodata:'disabled',
        onChange:function(data){
			var text = data['direct']?'(直辖市)':'';
			$('#place').text('当前选中地区：'+data['province']+text+' '+data['city']+' '+data['area']);
			$('.dizhi1').val(data['province']);
			$('.dizhi2').val(data['city']);
			$('.dizhi3').val(data['area']);
		}
	});
	</script>
</body>
</html>
