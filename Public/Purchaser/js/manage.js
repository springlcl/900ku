/**
 * Created by wwkil on 2017/5/19.
 */
var gettype = Object.prototype.toString;
var url = $('.right_content').attr('url');
/* 筛选按钮改变时触发更新人员筛选 */
$('input[name="account"],select[name="project"],select[name="role"],select[name="status"]').change(function () {
    updateUser();
});
/* 点击搜索/筛选按钮触发更新人员筛选 */
$('div.title_ty_smart button.sou_btn,div.title_ty_smart button.btn-60x30').click(function () {
    updateUser();
});

/*
    updateAccount()方法获取页面数据并发送ajax请求获取人员数据
 */
function updateUser(){
    var account = $('input[name="account"]').val()
        ,project = $('select[name="project"]').val()
        ,role = $('select[name="role"]').val()
        ,status = $('select[name="status"]').val();
    var cond = {key: account,project: project,role: role,status: status};
    $.ajax({
        url: url+'/getUsers.html'
        ,type: 'POST'
        ,dataType: 'JSON'
        ,async: true
        ,cache: false
        ,data: cond
        ,success: function(result){
            var count = result.count;
            var data = result.dataList;
            showpage(count,cond);
            createUsers(data);
        }
    });

}
function getParam(){
    var project = $('#project').val();
    var role = $('#role').val();
    var status = $('#status').val();
    var key = $('input[name="account"]').val();
    var data = {key: key,project: project,role: role,status: status};
    return data;
}
/*
    页面载入完成时装配页码
 */
$(function(){
    var count = $('pagination').attr('rows');
    var cond = {};
    showpage(count,cond);
});

/*显示页码*/
function showpage(pages,data){
    var page = Math.ceil(pages/15);
    layui.use(['layer','laypage'],function(){
        var laypage = layui.laypage;
        laypage({
            cont: 'pagination' //分页容器的id
            ,pages: page     //总页数
            ,skin: '#5FB878' //自定义选中色值
            ,group: 5
            ,skip: true //开启跳页
            ,first: '首页'
            ,last: '尾页'
            ,jump: function(obj, first){
                if(!first){
                    data.page = obj.curr;
                    $.ajax({
                        url: url+'/getUsers.html'
                        ,type: 'POST'
                        ,dataType: 'JSON'
                        ,async: true
                        ,cache: false
                        ,data: data
                        ,success: function(result){
                            createUsers(result.dataList);
                        }
                    });
                }
            }
        });
    });
}

/*遍历节点输出用户信息*/
function createUsers(data){
    $('.right_content .shezhi tbody').children().remove();
    var length = data.length;
    if(length > 0){
        $.each(data,function(index,value){
            var name = gettype.call(value.real) == '[object Null]' ? '未填写真实姓名' : value.real,
                code = gettype.call(value.code) == '[object Null]' ? '未分配员工编号' : value.code,
                phone = gettype.call(value.phone_num) == '[object Null]' ? '未填写手机号码' : value.phone_num,
                mail = gettype.call(value.em_address) == '[object Null]' ? '未填写邮箱地址' : value.em_address,
                pro = gettype.call(value.project) == '[object Null]' ? '未被分配项目' : value.project,
                role = gettype.call(value.role) == '[object Null]' ? '未被分配角色' : value.role,
                stat = value.stat == 1 ? '<span class="kong function" status="0">禁用</span>' : '<span class="kong function" status="1">启用</span>';
            $('.right_content .shezhi tbody').append('<tr><td style="width: 70px;"><input type="checkbox" name="userSel" value="'+value.id+'" class="fl kucun_cb"/></td><td class="clearfix line-h35"><div class="tupian fl"><img src="__UPLOADS__/'+value.avatar+'" alt=""></div><p class="col-lan flp mgl10">'+value.name+'</p></td><td>'+name+'</td><td>'+code+'</td><td>'+phone+'</td><td>'+mail+'</td><td>'+pro+'</td><td>'+role+'</td><td><a href="'+url+'/edit/uid/'+value.id+'.html'+'"><span>编辑</span></a>'+stat+'</td></tr>');
        });
    }else{
        $('.right_content .shezhi tbody').append('<tr><td class="col-lan2" colspan="9" style="font-size: 20px;">暂无员工</td></tr>');
    }
}

/*点击每个员工的禁用按钮*/
$(document).on('click','.right_content .shezhi tr td span.function',function () {
    var stat = $(this).attr('status');
    var id = $(this).parent().parent().find('input[name="userSel"]').val();
    var request = {stat:stat,ids:[id]};
    ignore(request);
});

/*全选/全不选功能*/
$('.l_end input.kucun_cb').click(function () {
    var c = $(this).prop('checked');
    var i = $('table.shezhi input[name="userSel"]');
    c ? i.prop('checked',true) : i.prop('checked',false);
});

/*批量禁用员工*/
$(document).on('click', 'div.l_end button.jinyong', function () {
    var checked = $('table.shezhi').find('input[name="userSel"]');
    var ids = [];
    $.each(checked, function (i,v) {
        ids[i] = v.defaultValue;
    });
    var stat = 0;
    var request = {stat:stat,ids:ids};
    ignore(request);

});



/*禁用员工发送ajax的方法*/
function ignore (data) {
    $.ajax({
        url: url+'/ignoreUser.html'
        ,type: 'POST'
        ,dataType: 'JSON'
        ,async: true
        ,cache: false
        ,data: data
        ,success: function (result) {
            if(result.status == 'success'){
                $.each(result.ids,function(index,value){
                    var i = $('input[name="userSel"][value="'+value+'"]');
                    var span = i.parent().siblings(':last').children('span');
                    var status = span.attr('status');
                    status == 1 ? span.attr('status',0).html('禁用') : span.attr('status',1).html('启用');

                });
            }
        },
    })
}

