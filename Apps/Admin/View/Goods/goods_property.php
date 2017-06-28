 <!DOCTYPE html>
<html>


<!-- Mirrored from www.zi-han.net/theme/hplus/table_basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:20:01 GMT -->
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品属性列表 - 900ku后台</title>
    <link href="__ADMIN_PUBLIC__/css/bootstrap.min14ed.css?v=3.3.6" rel="stylesheet">
    <link href="__ADMIN_PUBLIC__/css/font-awesome.min93e3.css?v=4.4.0" rel="stylesheet">
    <link href="__ADMIN_PUBLIC__/css/plugins/bootstrap-table/bootstrap-table.min.css" rel="stylesheet">
    <link href="__ADMIN_PUBLIC__/plugins/sweetalert/sweetalert.css" rel="stylesheet">
    <link href="__ADMIN_PUBLIC__/css/animate.min.css" rel="stylesheet">
    <link href="__ADMIN_PUBLIC__/css/style.min862f.css?v=4.1.0" rel="stylesheet">

</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">

        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>商品属性列表</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="input-group">
                                    <a href="javascript:;"><button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#myModal"> 添加商品属性</button> </span></a>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>编号</th>
                                        <th>属性名称</th>
                                        <th>状态</th>
                                        <th style="text-align: center; ">操作</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <if condition="$datalist">
                                    <volist name="datalist" id="vo">
                                    <tr>
                                        <td>{$vo.pro_id}</td>
                                        <td>{$vo.pro_name}</td>
                                        <td>
                                            <if condition="$vo.status eq 0">
                                                启用
                                                <else/>
                                                禁用
                                            </if>
                                        </td>
                                        <td style="text-align: center; ">
                                           <!-- <a href="ads_list.html" class="btn btn-info btn-xs"><i class="fa fa-search" aria-hidden="true"></i> 查看</a>-->
                                            <a href="{:U('goods/property_edit/pid/'.$vo['pro_id'])}" class="btn btn-primary btn-xs"><i class="fa fa-edit" aria-hidden="true"></i> 编辑</a>
                                            <a href="javascript:void(0);" class="btn btn-danger btn-xs catedel" cid="{$vo['pro_id']}" ><i class="glyphicon glyphicon-trash" aria-hidden="true"></i> 删除</a>
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
                    <h4 class="modal-title" id="myModalLabel">添加商品属性</h4>
                </div>
                <form class="form-horizontal" role="form" action="{:U('goods/property')}" method="post" enctype="multipart/form-data">
                    <div id="myTabContent" class="tab-content">
                        <div class="modal-body tab-pane fade active in" role="tabpanel" id="tabs1" aria-labelledby="1tab">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">属性名称</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="pro_name" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">状态：</label>
                                <div class="col-sm-10">
                                    <label class="checkbox-inline">
                                        <input type="radio" name="status" value="0" checked>启用</label>
                                    <label class="checkbox-inline">
                                        <input type="radio" name="status" value="1">禁用</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- 结束 -->
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
    <script src="__ADMIN_PUBLIC__/plugins/sweetalert/sweetalert.min.js"></script>
    <script>
        $(document).ready(function(){
            $(".catedel").click(function(){
                var cid = $(this).attr('cid');
                swal({
                    title:"您确定要删除吗?",
                    text:"删除后将无法恢复，请谨慎操作！",
                    type:"warning",
                    showCancelButton:true,
                    confirmButtonColor:"#DD6B55",confirmButtonText:"是的，我要删除！",cancelButtonText:"让我再考虑一下…",closeOnConfirm:false,closeOnCancel:true
                },function(isConfirm){
                    if(isConfirm)
                    {
                        $.ajax({
                            type: 'post',
                            url: "{:U('goods/property_del')}",
                            data: {'cid':cid},
                            dataType: 'json',
                            async: false,
                            success: function(data)
                            {
                                if(data)
                                {
                                    swal("删除成功！","您已经永久删除了这条信息。","success");
                                    location.reload();
                                }else{
                                    swal("删除失败！","您不能删除这条信息。","error")
                                }
                            }
                        });
                    }else{
                        swal("已取消","您取消了删除操作！","error")
                    }
                })
            })
        });
    </script>
</body>


<!-- Mirrored from www.zi-han.net/theme/hplus/table_basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:20:01 GMT -->
</html>
