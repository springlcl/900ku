/**
 * Created by wwkil on 2017/5/31.
 */
var url = $('body div.wh1200auto').attr('url');

/*点击新增角色按钮跳转至角色详情页*/
$('button.button').click(function(){
    location.href = url+'/addRole.html';
});

/*搜索角色名称时输入回车触发的事件*/
$('.sou').bind('keypress',function(event){
    if(event.keyCode == "13") {
        updateRole();
        $('form').submit(function(){
            return false;
        })
    }
});

/*点击搜索按钮触发更新操作*/
$('button.sous').click(function(){
    updateRole();
});

/*搜索框改变*/
$('input.sou').change(function(){
    updateRole();
});

/*更新角色列表*/
function updateRole(){
    var keywords = $('input.sou').val();
    $.ajax({
        url : url+'/getRole.html'
        ,type: 'POST'
        ,dataType: 'JSON'
        ,cache: false
        ,async: true
        ,data: {word:keywords}
        ,success: function(result){
            if(result.errorcode == 300){
                $('table.shezhi tbody').children().remove();
                $.each(result.data,function (index,value) {
                    $('table.shezhi tbody').append('<tr rid="'+value.id+'"><td class="clearfix"><p class="col-lan">'+value.name+'</p></td> <td>'+value.d+'</td> <td><span action="edit">修改</span><span class="kong" action="delete">删除</span></td> </tr>');
                });

            }

        }
    });
}

/*点击修改删除按钮触发动作*/
$(document).on('click','.right_content .shezhi tr td span',function () {
    var act = $(this).attr('action'),
        id = $(this).parent().parent().attr('rid'),
        name = $(this).parent().siblings(':first').find('p.col-lan').html(),
        _this = $(this);
    switch (act){
        case 'edit':
            location.href = url+'/editRole/rid/'+id;
            break;
        case 'delete':
            layui.use(['layer'],function () {
                layui.layer.confirm('确定后将删除"'+name+'"',function(index){
                        $.ajax({
                            url : url+'/delRole.html'
                            ,type: 'POST'
                            ,dataType: 'JSON'
                            ,cache: false
                            ,async: true
                            ,data: {rid:id}
                            ,success: function (result) {
                                layui.layer.msg(result.message);
                                if(result.errorcode == 300){
                                    _this.parent().parent().remove();
                                }
                                layui.layer.close(index);
                            }
                        })
                    });
            });
    }
});

/*添加角色、编辑角色的全选全不选功能*/
$('ul.lump1 li div.check_all input:checkbox').change(function () {
    var status = $(this).prop('checked');
    var checks = $(this).parent().prev('dl.checks_box');
    if(status){
        checks.find('input:checkbox').prop('checked',true);
    }else{
        checks.find('input:checkbox').prop('checked',false);
    }
    checkPer(checks);
});

/*单选权限时触发添加移除父级权限*/
$('ul.lump1 li dl.checks_box dd input:checkbox').change(function () {
    checkPer($(this).parent().parent());
});

/*每次载入完成时触发添加父级权限*/
$(function () {
    var len = $('ul.lump1 li dl').length;
    for (var i = 0; i < len; i++){
        var dl = $('ul.lump1 li dl:eq('+i+')');
        checkPer(dl);
    }
});

/*检测子权限被选中与否，用以判断是否添加父权限*/
function checkPer(obj){
    var checked =  obj.find(':checked');
    var hide = obj.find('input:hidden');
    var id = obj.attr('parent');
    if (checked.length == 0) {
        hide.remove();
    }
    if(hide.length == 0 && checked.length > 0){
        obj.prepend('<input name="per[]" value="'+id+'" type="hidden"/>');
    }
}

/**/















