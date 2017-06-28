/**
 * Created by wwkil on 2017/6/1.
 */
var box = $('div .right_content'),
    url = box.attr('url'),
    action = box.attr('action');
$(function () {
    /*添加员工页面使用validform插件*/
    if(action == 'addDetail' || action == 'edit'){
        $("#addForm").Validform({
            tiptype:function(msg,o,cssctl){
                //msg：提示信息;
                //o:{obj:*,type:*,curform:*}, obj指向的是当前验证的表单元素（或表单对象），type指示提示的状态，值为1、2、3、4， 1：正在检测/提交数据，2：通过验证，3：验证失败，4：提示ignore状态, curform为当前form对象;
                //cssctl:内置的提示信息样式控制函数，该函数需传入两个参数：显示提示信息的对象 和 当前提示的状态（既形参o中的type）;
                if(!o.obj.is("form")){//验证表单元素时o.obj为该表单元素，全部验证通过提交表单时o.obj为该表单对象;
                    var objtip=o.obj.siblings(".Validform_checktip");
                    cssctl(objtip,o.type);
                    objtip.text(msg);
                }else{
                    var objtip=o.obj.find(".Validform_checktip");
                    cssctl(objtip,o.type);
                    objtip.text(msg);
                }
            },
            datatype: {"zh2-4" : /^[\u4E00-\u9FA5\uf900-\ufa2d]{2,4}$/}
        });
    }
});

/*添加员工时更改权限时查找该权限下的权限明细*/
$('ul.lump li.role div.li_right_box div input[name="role"]').change(function () {
    var _this = $(this),
        id = _this.val(),
        box = $('ul.lump li.detail div.li_right_box');
    // console.log(id),;
    $.ajax({
        url : url+'/roleAuth.html'
        ,type: 'POST'
        ,dataType: 'JSON'
        ,cache: false
        ,async: true
        ,data: {rid:id}
        ,success: function (result) {
            if(result.errorcode == 300){
                var arr = Object.keys(result.data),
                    len = arr.length;
                console.log(arr);
                box.children().remove();
                for (var i = 0; i < len; i++) {
                    box.append('<div class=" fl container_d clearfix"><div class="fl">'+result.data[arr[i]].name+'</div><dl class="fl"></dl></div>');
                    $.each(result.data[arr[i]].son,function (ind,val) {
                        box.find('div.container_d:eq('+i+') dl').append('<dd>'+val.name+'</dd>');
                    });
                }
            }
        }
    });
});
//