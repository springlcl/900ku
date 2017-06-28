 <!DOCTYPE html>
<html>


<!-- Mirrored from www.zi-han.net/theme/hplus/table_basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:20:01 GMT -->
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>展厅内分组 - 900ku后台</title>
    <link href="__ADMIN_PUBLIC__/css/bootstrap.min14ed.css?v=3.3.6" rel="stylesheet">
    <link href="__ADMIN_PUBLIC__/css/font-awesome.min93e3.css?v=4.4.0" rel="stylesheet">
    <link href="__ADMIN_PUBLIC__/css/plugins/bootstrap-table/bootstrap-table.min.css" rel="stylesheet">
    <link href="__ADMIN_PUBLIC__/css/animate.min.css" rel="stylesheet">
    <link href="__ADMIN_PUBLIC__/css/style.min862f.css?v=4.1.0" rel="stylesheet">
    <link href="/900ku/Public/Admin/plugins/sweetalert/sweetalert.css" rel="stylesheet">

</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">

        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>展厅内分组</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <form action="{:U('supplier/fenzu')}" method="post">
                            <div class="col-sm-2 m-b-xs">
                                <div class="input-group">
                                    <input type="text" class="input-sm form-control input-s-sm inline" placeholder="分组名称" name="excname">
                                <span class="input-group-btn">
                                        <button type="submit" class="btn btn-sm btn-primary"> 搜索</button> </span>
                                </div>
                            </div>
                            </form>
                            <div class="col-sm-2 m-b-xs">
                                <form action="{:U('supplier/fenzu')}" method="post">
                                <div class="input-group">
                                    <select class="input-sm form-control input-s-sm inline" name="exid">
                                        <option value="0">展厅名称</option>
                                        <foreach name="exh_list" item="vo" key="k" >
                                        <option value="{$vo['exid']}">{$vo['ex_name']}</option>
                                        </foreach>
                                    </select>
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-sm btn-primary"> 查询</button> </span>
                                </div>
                                </form>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>编号</th>
                                        <th>分组名称</th>
                                        <th>展厅名称</th>
                                        <th>添加时间</th>
                                        <th style="text-align: center; ">操作</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <if condition="$list['datalist']">
                                    <foreach name="list['datalist']" item="vo" key="k" >
                                    <tr>
                                        <td>{$vo['excid']}</td>
                                        <td>{$vo['excname']}</td>
                                        <td>{$vo['ex_name']}</td>
                                        <td>{$vo.add_time|date='Y-m-d H:i',###}</td>
                                        <td style="text-align: center; ">
                                            <a href="javascript:void(0);" class="btn btn-danger btn-xs catedel" mid="{$vo['excid']}><i class="glyphicon glyphicon-trash" aria-hidden="true"></i> 删除</a>
                                        </td>
                                    </tr>
                                    </foreach>
                                    <else />
                                    <tr><td colspan="5">暂无数据</td></tr>
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
    <script src="__ADMIN_PUBLIC__/plugins/sweetalert/sweetalert.min.js"></script>
    <script>
        $(document).ready(function(){
            $(".catedel").click(function(){
                mid = $(this).attr('mid');
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
                            url: "{:U('supplier/cateDel')}",
                            data: {'excid':mid},
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
            });
        });
    </script>
</body>


<!-- Mirrored from www.zi-han.net/theme/hplus/table_basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:20:01 GMT -->
</html>
