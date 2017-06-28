 <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品分类 - 900ku后台</title>
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
                        <h5>商品分类</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <form action="{:U('goods/fenlei')}" method="post">
                            <div class="col-sm-2 m-b-xs">
                                <div class="input-group">
                                <select class="input-sm form-control input-s-sm inline" name="cid">
                                    <option value="0">商品类目</option>
                                    <option value="1">一级分类</option>
                                    <option value="2">二级分类</option>
                                </select>
                                <span class="input-group-btn">
                                        <button type="submit" class="btn btn-sm btn-primary"> 查询</button> </span>
                                </div>
                            </div>
                            </form>
                            <div class="col-sm-3">
                                <div class="input-group">
                                    <a href="{:U('goods/fenleiadd')}"><button type="button" class="btn btn-sm btn-primary"> 添加分类</button> </span></a>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>编号</th>
                                        <th>名称</th>
                                        <th>描述</th>
                                        <th>状态</th>
                                        <th>排序</th>
                                        <th style="text-align: center; ">操作</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <if condition="$datalist">
                                    <volist name="datalist" id="vo">
                                    <tr>
                                        <td>{$vo.gcid}</td>
                                        <td>{$vo.gc_name}</td>
                                        <td>{$vo.description}</td>
                                        <td>
                                            <if condition="$vo['status'] eq 0">
                                                启用
                                                <else/>
                                                禁用
                                            </if>
                                        </td>
                                        <td><input type="text" class="input-sm" onkeyup="this.value=this.value.replace(/[^\d]/g,'')" onpaste="this.value=this.value.replace(/[^\d]/g,'')" onchange="updateSort({$vo.gcid},this)" size="4" value="{$vo.sort_order}"></td>
                                        <td style="text-align: center; ">
                                            <a href="{:U('goods/fenlei_edit/fid/'.$vo['gcid'])}" class="btn btn-primary btn-xs"><i class="fa fa-edit" aria-hidden="true"></i> 编辑</a>
                                            <a href="javascript:void(0);" class="btn btn-danger btn-xs catedel" cid="{$vo['gcid']}"><i class="glyphicon glyphicon-trash" aria-hidden="true"></i> 删除</a>
                                        </td>
                                    </tr>
                                    </volist>
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
    <script src="__ADMIN_PUBLIC__/plugins/sweetalert/sweetalert.min.js"></script>
    <script>
        $(document).ready(function(){
            $(".catedel").click(function(){
                cid = $(this).attr('cid');
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
                            url: "{:U('goods/catedel')}",
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

        //更改排序
        function updateSort(cid,obj)
        {
            var value = $(obj).val();
            $.ajax({
                type: 'post',
                url: "{:U('goods/updatesort')}",
                data: {'cid':cid,'sort':value},
                dataType: 'json',
                async: false,
                success: function(data)
                {
                    if(data)
                    {
                        $(obj).val(value);
                        swal("修改成功！","您已经成功修改该栏目的排序。","success");
                        setTimeout(reload, 2000);
                    }else{
                        swal("修改失败！","您未能成功修改该栏目的排序。","error")
                    }
                }
            });
        }


        function reload()
        {
            location.reload();
        }
    </script>
</body>
</html>
