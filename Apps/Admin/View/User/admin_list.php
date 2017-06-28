 <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>管理员列表 - 900ku后台</title>
    <link href="__ADMIN_PUBLIC__/css/bootstrap.min14ed.css?v=3.3.6" rel="stylesheet">
    <link href="__ADMIN_PUBLIC__/css/font-awesome.min93e3.css?v=4.4.0" rel="stylesheet">
    <link href="__ADMIN_PUBLIC__/css/animate.min.css" rel="stylesheet">
    <link href="__ADMIN_PUBLIC__/css/style.min862f.css?v=4.1.0" rel="stylesheet">
</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">

        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>管理员列表</h5><!--<a href="goods_art_type.html"><h5 class="pull-right">返回商品栏目属性类别</h5></a>-->
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-sm-2 m-b-xs">
                                <div class="input-group">
                                    <input type="text" class="input-sm form-control input-s-sm inline" placeholder="ID">
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-sm btn-primary"> 搜索</button> </span>
                                </div>
                            </div>
                            <div class="col-sm-2 m-b-xs">
                                <div class="input-group">
                                    <select class="input-sm form-control input-s-sm inline">
                                        <option value="0">所属分组</option>
                                        <option value="1">系统管理员</option>
                                        <option value="2">频道管理员</option>
                                    </select>
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-sm btn-primary"> 查询</button> </span>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>头像</th>
                                        <th>昵称</th>
                                        <th>手机号</th>
                                        <th>分组</th>
                                        <th>最后登录时间</th>
                                        <th>最后登录IP</th>
                                        <th>登录次数</th>
                                        <th>状态</th>
                                        <th style="text-align: center;">操作</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <if condition="$datalist">
                                    <volist name="datalist" id="vo">
                                    <tr>
                                        <td>{$vo.aid}</td>
                                        <td><img src="__PUBLIC__/image/admin/{$vo.head_img}" width="50" height="50" /></td>
                                        <td>{$vo.username}</td>
                                        <td>{$vo.mobile}</td>
                                        <td>{$vo.role_name}</td>
                                        <td>{$vo.last_time|date="Y-m-d H:i:s",###}</td>
                                        <td>{$vo.last_ip}</td>
                                        <td>{$vo.login_num}</td>
                                        <td>
                                            <if condition="$vo.status eq 0">
                                                正常
                                                <else/>
                                                禁用
                                            </if>
                                        </td>
                                        <td style="text-align: center; ">
                                            <a href="admin_list_edit.html" class="btn btn-primary btn-xs"><i class="fa fa-edit" aria-hidden="true"></i> 编辑</a>
                                            <a href="" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash" aria-hidden="true"></i> 删除</a>
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
