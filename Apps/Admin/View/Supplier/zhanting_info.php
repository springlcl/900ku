 <!DOCTYPE html>
<html>
<!-- Mirrored from www.zi-han.net/theme/hplus/table_basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:20:01 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>展厅详情 - 900ku后台</title>
    <link href="__ADMIN_PUBLIC__/css/bootstrap.min14ed.css?v=3.3.6" rel="stylesheet">
    <link href="__ADMIN_PUBLIC__/css/font-awesome.min93e3.css?v=4.4.0" rel="stylesheet">
    <link href="__ADMIN_PUBLIC__/css/plugins/bootstrap-table/bootstrap-table.min.css" rel="stylesheet">
    <link href="__ADMIN_PUBLIC__/css/animate.min.css" rel="stylesheet">
    <link href="__ADMIN_PUBLIC__/css/style.min862f.css?v=4.1.0" rel="stylesheet">
    <style>
        .bg-hui{background-color: #F5F5F6;}
    </style>
</head>
<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>展厅详情</h5><a href="{:U('supplier/zhanting')}"><h5 class="pull-right">返回展厅列表</h5></a>
                    </div>
                    <div class="ibox-content">

                        <table class="table table-bordered">
                        <!--    <thead>
                                <tr>
                                    <th>#</th>
                                    <th>姓名</th>
                                    <th>姓名</th>
                                    <th>姓名</th>
                                    <th>姓名</th>
                                    <th>性别</th>
                                    <th>年龄</th>
                                    <th>年龄</th>
                                    <th>年龄</th>
                                    <th>年龄</th>
                                </tr>
                            </thead>-->
                            <tbody>
                                <tr>
                                    <td class="bg-hui">展厅Logo</td>
                                    <td colspan="4"><img src="__UPLOADS__/image/{$vo['ex_logo']}" width="60"></td>
                                    <td class="bg-hui">展厅名称</td>
                                    <td colspan="4">{$vo['ex_name']}</td>
                                </tr>
                                <tr>
                                    <td class="bg-hui">展厅ID</td>
                                    <td colspan="4">{$vo['exid']}</td>
                                    <td class="bg-hui">用户昵称</td>
                                    <td colspan="4">小猪猪</td>
                                </tr>
                                <tr>
                                    <td class="bg-hui">法人</td>
                                    <td colspan="4">{$vo['username']}</td>
                                    <td class="bg-hui">联系电话</td>
                                    <td colspan="4">{$vo['tel']}</td>
                                </tr>
                                <tr>
                                    <td class="bg-hui">主营类目</td>
                                    <td colspan="4">{$vo['mc_name']}</td>
                                    <td class="bg-hui">创建时间</td>
                                    <td colspan="4">{$vo['add_time']}</td>
                                </tr>
                                <!--<tr>
                                    <td class="bg-hui">展厅收入</td>
                                    <td colspan="4">手机数码</td>
                                    <td class="bg-hui">是否过期</td>
                                    <td colspan="3">否</td>
                                </tr>-->
                                <tr>
                                    <td class="bg-hui">展厅状态</td>
                                    <td colspan="4">
                                        <select class="input-sm input-s-sm inline" name="status">
                                            <option value="0" <if condition="$vo['status'] eq 0"> selected</if> >正常</option>
                                            <option value="1" <if condition="$vo['status'] eq 1"> selected</if> >禁用</option>
                                        </select>
                                    </td>
                                    <td class="bg-hui">认证状态</td>
                                    <td colspan="3"><select class="input-sm input-s-sm inline">
                                        <option value="1" <if condition="$vo['is_auth'] eq 1"> selected</if> >认证</option>
                                        <option value="0" <if condition="$vo['is_auth'] eq 0"> selected</if> >未认证</option>
                                    </select></td>
                                </tr>
                                <tr>
                                    <td class="bg-hui">公司名称</td>
                                    <td colspan="4">
                                        {$vo['company']}
                                    </td>
                                    <td class="bg-hui">公司地址</td>
                                    <td colspan="3">{$vo['province']}{$vo['city']}{$vo['area']}{$vo['street']}</td>
                                </tr>
                                <tr>
                                    <td class="bg-hui">经营模式</td>
                                    <td colspan="4">
                                        {$vo['model_name']}
                                    </td>
                                    <td class="bg-hui">营业执照</td>
                                    <td colspan="3"><a href="img/logo.png" target="_blank"><img src="img/logo.png" width="60"></a></td>
                                </tr>
                                <tr>
                                    <td class="bg-hui">展厅描述</td>
                                    <td colspan="9">{$vo['ex_intro']}</td>
                                </tr>
                                <tr>
                                    <td colspan="10" class="bg-hui text-center">提现帐号</td>
                                </tr>
                                <tr>
                                    <td class="bg-hui">提现方式</td>
                                    <td colspan="4">
                                        <select class="input-sm input-s-sm inline">
                                            <option value="0">对私银行账户</option>
                                            <option value="1">对公银行账户</option>
                                        </select>
                                    </td>
                                    <td class="bg-hui">开户银行</td>
                                    <td colspan="4">
                                        <select class="input-sm input-s-sm inline">
                                            <option value="0">中国建设银行</option>
                                            <option value="1">中国工商银行</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="bg-hui">银行卡号</td>
                                    <td colspan="4">
                                        <input type="text" >
                                    </td>
                                    <td class="bg-hui">开卡人姓名</td>
                                    <td colspan="4">
                                        <input type="text" >
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="10" class="bg-hui text-center">所属区域设置</td>
                                </tr>
                                <tr>
                                    <td class="bg-hui">用户当前</td>
                                    <td colspan="9">未设置</td>
                                </tr>
                                <tr>
                                    <td class="bg-hui">关联设置</td>
                                    <td colspan="9">
                                        <form role="form" class="form-inline">
                                            <div class="form-group">
                                                <label class="sr-only"></label>
                                                <select class="input-sm form-control input-s-sm inline">
                                                    <option value="0">选择省份</option>
                                                    <option value="1">北京</option>
                                                    <option value="1">天津</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="sr-only"></label>
                                                <select class="input-sm form-control input-s-sm inline">
                                                    <option value="0">选择城市</option>
                                                    <option value="1">北京</option>
                                                    <option value="1">天津</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="sr-only"></label>
                                                <select class="input-sm form-control input-s-sm inline">
                                                    <option value="0">选择地区</option>
                                                    <option value="1">北京</option>
                                                    <option value="1">天津</option>
                                                </select>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="bg-hui">区域经理</td>
                                    <td colspan="9">李肆</td>
                                </tr>
                                <tr>
                                    <td colspan="10" class="bg-hui text-center">客户经理设置</td>
                                </tr>
                                <tr>
                                    <td class="bg-hui">客户经理</td>
                                    <td colspan="9">
                                        <div class="form-group">
                                            <label class="sr-only"></label>
                                            <select class="input-sm input-s-sm inline">
                                                <option value="0">--请选择--</option>
                                                <option value="1">北京</option>
                                                <option value="1">天津</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="10" class="bg-hui text-center">合同管理</td>
                                </tr>
                                <tr>
                                    <td class="bg-hui">合同管理</td>
                                    <td colspan="9"><button class="btn btn-default btn-rounded" type="submit">上传合同</button></td>
                                </tr>
                                <tr>
                                    <td colspan="10" class="bg-hui text-center">
                                        <button class="btn btn-outline btn-default" type="submit">提交</button>&nbsp;&nbsp;&nbsp;&nbsp;
                                        <button class="btn btn-default btn-outline" type="submit">取消</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="__ADMIN_PUBLIC__/js/jquery.min.js?v=2.1.4"></script>
    <script src="__ADMIN_PUBLIC__/js/bootstrap.min.js?v=3.3.6"></script>
    <script src="__ADMIN_PUBLIC__/js/content.min.js?v=1.0.0"></script>
</body>


<!-- Mirrored from www.zi-han.net/theme/hplus/table_basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:20:01 GMT -->
</html>
