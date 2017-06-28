 <!DOCTYPE html>
<html>


<!-- Mirrored from www.zi-han.net/theme/hplus/table_basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:20:01 GMT -->
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>展厅列表 - 900ku后台</title>
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
                        <h5>展厅列表</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <form role="form" class="form-inline" action="" method="post">
                                <div class="col-sm-2 m-b-xs">

                                    <div class="input-group">
                                        <input type="text" class="input-sm form-control input-s-sm inline" placeholder="展厅名称" name="ex_name">
                                        <span class="input-group-btn">
                                        <button type="submit" class="btn btn-sm btn-primary"> 搜索</button> </span>
                                    </div>

                                </div>


                                <div class="form-group">
                                    <label class="sr-only"></label>
                                    <select class="input-sm form-control input-s-sm inline" name="mcid">
                                        <option value="0">主营类目</option>
                                        <foreach name="catelist" item="vo" key="k" >
                                        <option value="{$vo['mcid']}">{$vo['mc_name']}</option>
                                        </foreach>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="sr-only"></label>
                                    <select class="input-sm form-control input-s-sm inline">
                                        <option value="0">区域管理员</option>
                                        <option value="1">认证</option>
                                        <option value="1">未认证</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="sr-only"></label>
                                    <select class="input-sm form-control input-s-sm inline">
                                        <option value="0">客户经理</option>
                                        <option value="1">认证</option>
                                        <option value="1">未认证</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="sr-only"></label>
                                    <select class="input-sm form-control input-s-sm inline" name="is_auth">
                                        <option value="0">认证状态</option>
                                        <option value="2">认证</option>
                                        <option value="1">未认证</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="sr-only"></label>
                                    <select class="input-sm form-control input-s-sm inline" name="status">
                                        <option value="0">展厅状态</option>
                                        <option value="1">正常</option>
                                        <option value="2">禁用</option>
                                    </select>
                                </div>
                                <div class="form-group" id="demo">
                                    <label class="sr-only"></label>
                                    <!--<select class="input-sm form-control input-s-sm inline">
                                        <option value="0">展厅状态</option>
                                        <option value="1">正常</option>
                                        <option value="1">禁用</option>
                                    </select>-->
                                    <select name="province" class="mgl5"></select>
                                    <select name="city"></select>
                                    <select name="area"></select>
                                    <input  type="hidden" id="place" name="addres">

                                </div>
                                <div class="checkbox m-l m-r-xs">
                                    <!--<label class="i-checks">
                                        <input type="checkbox"><i></i> 自动登录</label>-->
                                </div>
                                <button class="btn btn-white" type="submit">查询</button>
                            </form>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>编号</th>
                                        <th>展厅名称</th>
                                        <th>商户</th>
                                        <th>电话</th>
                                        <th>主营类目</th>
                                        <th>认证</th>
                                        <th>状态</th>
                                        <th>创建时间</th>
                                        <th style="text-align: center; ">操作</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <foreach name="list['datalist']" item="vo" key="k" >
                                    <tr>
                                        <td>{$vo['exid']}</td>
                                        <td>{$vo['ex_name']}</td>
                                        <td>{$vo['username']}</td>
                                        <td>{$vo['tel']}</td>
                                        <td>{$vo['mc_name']}</td>
                                        <td><if condition="$vo['is_auth'] eq 1">认证<else />未认证</if></td>
                                        <td><if condition="$vo['statis'] eq 1">禁用<else />启用</if></td>
                                        <td>{$vo.add_time}</td>
                                        <td style="text-align: center; ">
                                            <a href="{:U('supplier/zt_info',array('exid' => $vo['exid']))}">查看详细</a>

                                        </td>
                                    </tr>
                                </foreach>
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
    <script src="__ADMIN_PUBLIC__/js/jquery.citys.js"></script>
    <script>
        $('#demo').citys({
            //code:110101,
            required:false,
            nodata:'disabled',
            onChange:function(data){
                //var text = data['direct']?'(直辖市)':'';
                //$('#place').val(data['province']+text+data['city']+data['area']);
                $('#place').val(data['province']+data['city']+data['area']);
            }
        });
    </script>
</body>


<!-- Mirrored from www.zi-han.net/theme/hplus/table_basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:20:01 GMT -->
</html>
