 <!DOCTYPE html>
<html>


<!-- Mirrored from www.zi-han.net/theme/hplus/table_basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:20:01 GMT -->
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>区域管理员列表 - 900ku后台</title>
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
                        <h5>区域管理员列表</h5><!--<a href="goods_art_type.html"><h5 class="pull-right">返回商品栏目属性类别</h5></a>-->
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-sm-2 m-b-xs">
                                <form action="{:U('manager/admin_region_list')}" method="post">
                                    <div class="input-group">
                                        <input type="text" name="search" class="input-sm form-control input-s-sm inline" placeholder="昵称">
                                        <span class="input-group-btn">
                                        <button type="submit" class="btn btn-sm btn-primary"> 搜索</button> </span>
                                    </div>
                                </form>
                            </div>
                        </div>
						<div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>头像</th>
                                        <th>昵称</th>
                                        <th>所属分组</th>
                                        <th>所属省份</th>
                                        <th>所属城市</th>
                                        <th>所属区县</th>
                                        <th>最后登录时间</th>
                                        <th>最后登录IP</th>
                                        <th>登录次数</th>
                                        <th>推广奖励</th>
                                        <th>展厅数量</th>
                                        <th>状态</th>
                                        <th style="text-align: center; ">操作</th>
                                    </tr>
                                </thead>
                                <tbody>
									<if condition="$datalist">
										<volist name="datalist" id="vo">
											<tr>
												<td>{$vo.aid}</td>
												<td><img src="__PUBLIC__/admin/images/{$vo.head_img}" width="50" height="50" /></td>
												<td>{$vo.username}</td>
												<td>区域管理员</td>
												<td>{$vo.province_jy}</td>
												<td>{$vo.city_jy}</td>
												<td>{$vo.area_jy}</td>
												<td>{$vo.last_time|date="Y-m-d H:i:s",###}</td>
												<td>{$vo.last_ip}</td>
												<td>{$vo.login_num}</td>
												<td>{$vo.reward}</td>
												<td>{$vo.zhanting_num}</td>
												<if condition="$v.status eq 0 "><td>启用</td><else /><td>禁用</td></if>
												<td style="text-align: center; ">
													<a href="{:U('manager/admin_region_list_edit/aid/'.$vo['aid'])}" class="btn btn-primary btn-xs"><i class="fa fa-edit" aria-hidden="true"></i> 编辑</a>
													<a href="{:U('manager/admin_region_list_del/aid/'.$vo['aid'])}" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash" aria-hidden="true"></i> 删除</a>
												</td>
											</tr>
										</volist>
									</if>
                                </tbody>
                            </table>
                            <div class="col-sm-12 text-center"><div class="dataTables_paginate paging_simple_numbers"><ul class="pagination">{$page}</ul></div></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script src="__ADMIN_PUBLIC__/js/jquery.min.js?v=2.1.4"></script>
    <script src="__ADMIN_PUBLIC__/js/bootstrap.min.js?v=3.3.6"></script>
</body>
</html>
