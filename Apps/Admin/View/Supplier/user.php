 <!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>供应商列表 - 900ku后台</title>
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
                        <h5>供应商列表</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-sm-2 m-b-xs">
                                <form action="" method="post">
                                <div class="input-group">
                                    <input type="text" class="input-sm form-control input-s-sm inline" placeholder="供应商名称" name="username">
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
                                        <th>序号</th>
                                        <th>供应商</th>
                                        <th>头像</th>
                                        <th>昵称</th>
                                        <th>手机号</th>
                                        <th>展厅数量</th>
                                        <th>最后登录时间</th>
                                        <th>最后登录IP</th>
                                        <th>状态</th>
                                        <th style="text-align: center; ">操作</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <if condition="$list['datalist']">
                                <foreach name="list['datalist']" item="vo" key="k" >
                                    <tr>
                                        <td>{$vo['uid']}</td>
                                        <td>{$vo['real_name']}</td>
                                        <td><img src="__UPLOADS__/image/{$vo['headimg']}" width="50" height="50" /></td>
                                        <td>{$vo['username']}</td>
                                        <td>{$vo['mobile']}</td>
                                        <td>{$vo['count']}</td>
                                        <td>{$vo['last_time']|date='Y-m-d H:i',###}</td>
                                        <td>{$vo['last_ip']}</td>
                                        <td><if condition="$vo['status'] eq 1">启用<else />禁用</if></td>
                                        <td style="text-align: center; ">
                                            <a href="{:U('user/user_info',array('uid'=>$vo['uid']))}" class="btn btn-primary btn-xs"><i class="fa fa-edit" aria-hidden="true"></i> 编辑</a>
                                            <a href="" class="btn btn-primary btn-xs"><i class="fa fa-edit" aria-hidden="true"></i> 绑定客户经理</a>
                                            <!--<a href="" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash" aria-hidden="true"></i> 删除</a>-->
                                        </td>
                                    </tr>
                                </foreach>
                                <else />
                                <tr><td colspan="10">暂无数据</td></tr>
                                </if>
                                </tbody>
                            </table>
                            <div class="col-sm-12 text-center">
                                <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                                    <ul class="pagination">{$list['page']}</ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>


    <script src="__ADMIN_PUBLIC__/js/jquery.min.js?v=2.1.4"></script>
    <script src="__ADMIN_PUBLIC__/js/bootstrap.min.js?v=3.3.6"></script>

</body>


<!-- Mirrored from www.zi-han.net/theme/hplus/table_basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:20:01 GMT -->
</html>
