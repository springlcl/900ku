<!DOCTYPE html>
<html>


<!-- Mirrored from www.zi-han.net/theme/hplus/table_basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:20:01 GMT -->
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>采购商认证列表 - 900ku后台</title>
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
                    <h5>采购商待认证列表</h5><!--<a href="goods_art_type.html"><h5 class="pull-right">返回商品栏目属性类别</h5></a>-->
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <!-- <div class="col-sm-1 m-b-xs">
                             <div class="input-group">
                                 <select class="input-sm form-control input-s-sm inline">
                                     <option value="0">所属分组</option>
                                     <option value="1">展厅名称</option>
                                     <option value="1">商品编号</option>
                                 </select>
                             </div>
                         </div>-->
                        <form action="" method="post">
                        <div class="col-sm-2 m-b-xs">
                            <div class="input-group">
                                <input type="text" class="input-sm form-control input-s-sm inline" placeholder="采购商" name="real_name">
                                <span class="input-group-btn">
                                        <button type="submit" class="btn btn-sm btn-primary"> 搜索</button> </span>
                            </div>
                        </div>
                        </form>

                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>采购商名称</th>
                                <th>微信昵称</th>
                                <th>手机号</th>
                                <th>地址</th>
                                <th>注册时间</th>
                                <th>最后登录时间</th>
                                <th>最后登录IP</th>
                                <th>认证状态</th>
                                <th>状态</th>
                                <th style="text-align: center; ">操作</th>
                            </tr>
                            </thead>
                            <tbody>

                            <tr>
                                <if condition="$list['datalist']">
                                    <foreach name="list['datalist']" item="vo" key="k" >
                                <td>{$vo['id']}</td>
                                <td>{$vo['real_name']}</td>
                                <td>{$vo['username']}</td>
                                <td>{$vo['mobile']}</td>
                                <td>{$vo['province']}{$vo['city']}{$vo['area']}{$vo['street']}</td>
                                <td>{$vo.add_time|date='Y-m-d H:i',###}</td>
                                <td>{$vo.last_time|date='Y-m-d H:i',###}</td>
                                <td>{$vo['status']}</td>
                                <td>待认证</td>
                                        <td><if condition="$vo['status'] eq 1">启用<else />禁用</if></td>
                                <td style="text-align: center; ">
                                    <!--<a href="" class="btn btn-info btn-xs"><i class="fa fa-search" aria-hidden="true"></i> 查看</a>
                                    <a href="gongyingshang_edit.html" class="btn btn-primary btn-xs"><i class="fa fa-edit" aria-hidden="true"></i> 备注</a>-->
                                    <a href="{:U('user/user_info',array('uid'=>$vo['uid'],'type' => 1))}" class="btn btn-primary btn-xs"><i class="fa fa-edit" aria-hidden="true"></i> 认证审核</a>
                                    <!--<a href="" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash" aria-hidden="true"></i> 删除</a>-->
                                </td>
                            </tr>
                            </foreach>
                            <else />
                            <tr><td colspan="11">暂无数据</td></tr>
                            </if>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>

<script src="__ADMIN_PUBLIC__/js/jquery.min.js?v=2.1.4"></script>
<script src="__ADMIN_PUBLIC__/js/bootstrap.min.js?v=3.3.6"></script>
<script>
    /*$(document).ready(function(){$(".i-checks").iCheck({checkboxClass:"icheckbox_square-green",radioClass:"iradio_square-green",})});*/
</script>
</body>


<!-- Mirrored from www.zi-han.net/theme/hplus/table_basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:20:01 GMT -->
</html>
