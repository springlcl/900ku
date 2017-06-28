 <!DOCTYPE html>
<html>


<!-- Mirrored from www.zi-han.net/theme/hplus/table_basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:20:01 GMT -->
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>被准入商品列表 - 900ku后台</title>
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
                        <h5>被准入商品列表</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <form action="{:U('goods/zhunru')}" method="post">
                            <div class="col-sm-1 m-b-xs">
                                <div class="input-group">
                                    <select name="cid" class="input-sm form-control input-s-sm inline">
                                        <option value="0">商品名称</option>
                                        <option value="1">展厅名称</option>
                                        <option value="2">商品编号</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2 m-b-xs">
                                <div class="input-group">
                                    <input type="hidden" name="type" value="1">
                                    <input type="text" name="search" class="input-sm form-control input-s-sm inline">
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-sm btn-primary"> 搜索</button> </span>
                                </div>
                            </div>
                            </form>
                            <div class="col-sm-2 m-b-xs">
                                <form action="{:U('goods/zhunru')}" method="post">
                                <div class="input-group">
                                    <input type="hidden" name="type" value="2">
                                    <select name="cid" class="input-sm form-control input-s-sm inline">
                                        <option value="0">商品分类</option>
                                        <volist name="fenlei" id="vo">
                                            <option value="{$vo.gcid}">{$vo.gc_name}</option>
                                        </volist>
                                    </select>
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-sm btn-primary"> 查询</button> </span>
                                </div>
                                </form>
                            </div>
                            <div class="col-sm-2">
                                <div class="input-group">
                                    <a href="{:U('goods/zhunru_csv')}"><button type="button" class="btn btn-sm btn-primary"> 导出</button> </a>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>编号</th>
                                        <th>图片</th>
                                        <th>名称</th>
                                        <th>分类</th>
                                        <th>展厅</th>
                                        <th>价格</th>
                                        <th>数量</th>
                                        <th>销量</th>
                                        <th>添加时间</th>
                                        <th>状态</th>
                                        <th style="text-align: left; ">操作</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <if condition="$datalist">
                                        <volist name="datalist" id="vo">
                                    <tr>
                                        <td>{$vo.gid}</td>
                                        <td><img src="__UPLOADS__/image/{$vo.goods_thumb}" width="50" height="50" /></td>
                                        <td>{$vo.goods_name}</td>
                                        <td>{$vo.gc_name}</td>
                                        <td>{$vo.ex_name}</td>
                                        <td>{$vo.goods_price}</td>
                                        <td>{$vo.goods_num}</td>
                                        <td>{$vo.goods_sale_num}</td>
                                        <td>{$vo.add_time|date="Y-m-d H:i:s",###}</td>
                                        <td>
                                            <if condition="$vo.is_jinyong eq 0">
                                                正常
                                                <else/>
                                                禁用
                                            </if>
                                        </td>
                                        <td style="text-align: center; ">
                                            <if condition="$vo.is_jinyong eq 0">
                                                <a href="{:U('goods/goods_jinyong/gid/'.$vo['goods_id'])}" class="btn btn-danger btn-xs"> 禁用</a>
                                                <else/>
                                                <a href="{:U('goods/goods_jinyong/gid/'.$vo['goods_id'])}" class="btn btn-primary btn-xs"> 启用</a>
                                            </if>
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

    <!-- 添加栏目模态框（Modal） -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                    <h4 class="modal-title" id="myModalLabel">添加商品栏目属性分类</h4>
                </div>
                <form class="form-horizontal" role="form" action="" method="post" enctype="multipart/form-data">
                    <div id="myTabContent" class="tab-content">
                        <div class="modal-body tab-pane fade active in" role="tabpanel" id="tabs1" aria-labelledby="1tab">

                            <div class="form-group">
                                <label class="col-sm-2 control-label">分类名称</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">状态：</label>
                                <div class="col-sm-10">
                                    <label class="checkbox-inline">
                                        <input type="radio" name="option1" checked>启用</label>
                                    <label class="checkbox-inline">
                                        <input type="radio" name="option1">禁用</label>
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
</body>


<!-- Mirrored from www.zi-han.net/theme/hplus/table_basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:20:01 GMT -->
</html>
