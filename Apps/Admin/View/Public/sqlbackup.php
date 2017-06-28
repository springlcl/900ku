 <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>数据库备份 - 900ku后台</title>
    <link href="__ADMIN_PUBLIC__/css/bootstrap.min14ed.css?v=3.3.6" rel="stylesheet">
    <link href="__ADMIN_PUBLIC__/css/font-awesome.min93e3.css?v=4.4.0" rel="stylesheet">
    <link href="__ADMIN_PUBLIC__/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="__ADMIN_PUBLIC__/css/animate.min.css" rel="stylesheet">
    <link href="__ADMIN_PUBLIC__/css/style.min862f.css?v=4.1.0" rel="stylesheet">
</head>
<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">

        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>数据库备份</h5>
                    </div>
                    <div class="ibox-content">
                        <form id="export-form" method="" action="">
                        <div class="row row-lg">
                            <div class="col-sm-12">
                                <div class="example-wrap">
                                    <div class="example">
                                        <div class="btn-group hidden-xs" id="exampleToolbar" role="group">
                                            <a href="{:U('index/export')}" class="btn btn-primary "><i class="glyphicon glyphicon-plus" aria-hidden="true"></i> 备份全部数据</a>
                                        </div>
                                        <table id="exampleTableToolbar" data-click-to-select="true" data-mobile-responsive="true" data-search="true" class="table table-bordered table-advance table-hover">
                                            <thead>
                                            <tr>
                                                <th data-field="name" data-formatter="nameFormatter">编号</th>
                                                <th data-field="name" data-formatter="nameFormatter" style="width:60%">数据表名称</th>
                                                <th data-field="name" data-formatter="nameFormatter">数据量</th>
                                                <th data-field="name" data-formatter="nameFormatter">创建时间</th>
                                                <th data-field="url">操作</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <volist name="list" id="table">
                                                <tr>
                                                    <td class="num">
                                                        {$table.bianhao}
                                                        <!--<input class="ids" checked="chedked" type="checkbox" name="tables[]" value="{$table.name}">-->
                                                    </td>
                                                    <td>{$table.name}</td>
                                                    <td>{$table.rows}</td>
                                                    <td>{$table.create_time}</td>
                                                    <td class="action">
                                                        <a href="{:U('index/export_once/table/'.$table['name'])}" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-plus" aria-hidden="true"></i> 备份</a>
                                                    </td>
                                                </tr>
                                            </volist>
                                            </tbody>
                                        </table>
                                        </div>

                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="fixed-table-pagination" style="display: block;">
                                        <div class="pull-left pagination-detail">
                                            <!--<button id="selectall" type="button" class="btn btn-info btn-sm">全选</button>
                                            <button id="deselectall" type="button" class="btn btn-info btn-sm">取消</button>
                                            <button id="fanselectall" type="button" class="btn btn-info btn-sm">反选</button>-->
                                        </div>
                                        <!--  <div class="pull-left pagination-detail"><span class="pagination-info">Showing 1 to 10 of 800 rows</span><span class="page-list"><span class="btn-group dropup"><button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><span class="page-size">10</span> <span class="caret"></span></button><ul class="dropdown-menu" role="menu"><li class="active"><a href="javascript:void(0)">10</a></li><li><a href="javascript:void(0)">25</a></li><li><a href="javascript:void(0)">50</a></li><li><a href="javascript:void(0)">100</a></li><li><a href="javascript:void(0)">All</a></li></ul></span> records per page</span></div> -->

                                        <div class="pull-right pagination"><ul class="pagination">
                                        </ul></div></div>
                                </div>
                            </div>
                        </form>


                    </div>
                </div>
            </div>

        </div>
    </div>
    <script src="__ADMIN_PUBLIC__/js/jquery.min.js?v=2.1.4"></script>
    <script src="__ADMIN_PUBLIC__/js/bootstrap.min.js?v=3.3.6"></script>
    <script src="__ADMIN_PUBLIC__/js/content.min.js?v=1.0.0"></script>
    <block name="script">
        <script type="text/javascript">
            $(document).ready(function(){

                $("#selectall").click(function() {
                    $(":checkbox").prop("checked",true);
                });

                $("#deselectall").click(function() {
                    $(":checkbox").prop("checked",false);
                });
                $("#fanselectall").click(function() {
                    $(":checkbox").each(function(){
                        if($(this).prop("checked")){
                            $(this).prop("checked",false);
                        }else{
                            $(this).prop("checked",true);
                        }
                    });
                });
            });

            (function($){
                var $form = $("#export-form"), $export = $("#export"), tables
                $optimize = $("#optimize"), $repair = $("#repair");


                $export.click(function(){
                    $export.parent().children().addClass("disabled");
                    $export.html("正在发送备份请求...");
                    $.post(
                        $form.attr("action"),
                        $form.serialize(),
                        function(data){
                            if(data.status){
                                tables = data.tables;
                                $export.html(data.info + "开始备份，请不要关闭本页面！");
                                backup(data.tab);
                                window.onbeforeunload = function(){ return "正在备份数据库，请不要关闭！" }
                            } else {
                                updateAlert(data.info,'alert-error');
                                $export.parent().children().removeClass("disabled");
                                $export.html("立即备份");
                                setTimeout(function(){
                                    $('#top-alert').find('button').click();
                                    $(that).removeClass('disabled').prop('disabled',false);
                                },1500);
                            }
                        },
                        "json"
                    );
                    return false;
                });

                function backup(tab, status){
                    status && showmsg(tab.id, "开始备份...(0%)");
                    $.get($form.attr("action"), tab, function(data){
                        if(data.status){
                            showmsg(tab.id, data.info);

                            if(!$.isPlainObject(data.tab)){
                                $export.parent().children().removeClass("disabled");
                                $export.html("备份完成，点击重新备份");
                                window.onbeforeunload = function(){ return null }
                                return;
                            }
                            backup(data.tab, tab.id != data.tab.id);
                        } else {
                            updateAlert(data.info,'alert-error');
                            $export.parent().children().removeClass("disabled");
                            $export.html("立即备份");
                            setTimeout(function(){
                                $('#top-alert').find('button').click();
                                $(that).removeClass('disabled').prop('disabled',false);
                            },1500);
                        }
                    }, "json");

                }

                function showmsg(id, msg){
                    $form.find("input[value=" + tables[id] + "]").closest("tr").find(".info").html(msg);
                }
            })(jQuery);
        </script>
    </block>
</body>


<!-- Mirrored from www.zi-han.net/theme/hplus/table_basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:20:01 GMT -->
</html>
