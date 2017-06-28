/**
 * Created by wwkil on 2017/5/16.
 */
var url = $('#app-container').attr('target');
var exid = $('input:hidden[name="exid"]').val();
$('button.new_classify').click(function () {
    layui.use(['layer'], function () {
        var layer = layui.layer;
        layer.prompt({
            formType: 0,
            offset: ['200px','600px'],
            value: '',
            title: '新建分组',
            area: ['400px', '350px'] //自定义文本域宽高
        }, function(value, index, elem){
            var val = value;
            layer.close(index);
            $.ajax({
                url: url+'/newClassify.html'
                ,type: 'POST'
                ,dataType: 'JSON'
                ,data: {exid:exid,cate:val}
                ,success: function(result){
                    if(result.status){
                        updateClassify();
                    }
                    layer.msg(result.message);
                }
            });
        });
    });
});

// 布置页面分类数据
function createClassify(data){
    var box = $('.goodsShow ul');
    box.children().remove();
    $.each(data,function(index,value){
        var num = index < 9 ? '0'+(index*1+1) : index*1+1;
        box.append('<li class="goods_item"> <div class="goods_item_mian clearfix"> <input type="checkbox" name="cateSel" value="'+value.cid+'" class="fl checkbox_mgl"> <div class="">'+num+'</div> <div class="name">'+value.cname+'</div> <div class="on_sale">'+value.onsale+'</div> <div class="sales">'+value.stock+'</div> <div class="date">'+value.crea+'</div> <div class="btn"> <p> <span class="edit">编辑</span> <span class="del_bnt">删除 </span> <span>链接 </span> </p> <div class="link_d clearfix link_arrow"> <span class="fl">商品链接</span> <input class="fl link" type="text" value="http://d.pigcms.com/upload/images/000/14/338/201703/58c6535f50f37.jpg"> <button type="button" class="fl copy">复制</button> </div> </div> </div> </li>');
    });
}

// 载入完毕时载入页码
$(function(){
    var num = $('#pagination').attr('rows');
    var base = {};
    base.exid = exid;
    showpage(num,base);
    console.log(num);
});

function showpage(count,data){
    var pages = Math.ceil(count/10);
    //分页
    layui.use(['laypage','layer'], function(){
        var laypage = layui.laypage;
        //分页
        laypage({
            cont: 'pagination' //分页容器的id
            ,pages: pages //总页数
            ,skin: '#5FB878' //自定义选中色值
            ,skip: true //开启跳页
            ,first: '首页'
            ,last: '尾页'
            ,jump: function(obj, first){
                if(!first){
                    data.page = obj.curr;
                    $.ajax({
                        url: url+'/getClassify.html'
                        ,type: 'POST'
                        ,dataType: 'JSON'
                        ,async: true
                        ,cache: false
                        ,data: data
                        ,success: function(result){
                            createClassify(result.cate);
                        }
                    });
                }
            }
        });
    });
}


// 搜索框改变时触发动作
$('input[name="search"]').change(function () {
    updateClassify();
    $('form').submit(function () {
        return false;
    });
});

// 点击搜索按钮时触发
$('button.sou').click(function () {
    updateClassify();
});

// 更新页面数据方法
function updateClassify(){
    var key = $('input[name="search"]').val();
    var cond = {};
    cond = {exid:exid,cate:key};
    $.ajax({
        url: url + '/getClassify.html'
        , type: 'POST'
        , dataType: 'JSON'
        , cache: false
        , async: true
        , data: cond
        , success: function (result) {
            createClassify(result.cate);
            showpage(result.count, cond);
            $('.page_total b').html(result.count);
        }
    });
}

// 更新展厅内分组的名称
$(document).on('click','.edit',function () {
    var _this = $(this);
    var name = _this.parent().parent().siblings('.name').html();
    var id = _this.parent().parent().siblings('input[name="cateSel"]').val();
    layui.use(['layer'], function () {
        var layer = layui.layer;
        layer.prompt({
            formType: 0,
            offset: ['200px','600px'],
            value: name,
            title: '更改分组名称',
            area: ['400px', '350px'] //自定义文本域宽高
        }, function(value, index, elem){
            var val = value;
            layer.close(index);
            $.ajax({
                url: url+'/alterClassify.html'
                ,type: 'POST'
                ,dataType: 'JSON'
                ,data: {exid:exid,cate:val,cid:id}
                ,success: function(result){
                    if(result.status){
                        updateClassify();
                    }
                    layer.msg(result.message);
                }
            });
        });
    });
});

// 删除分类
$(document).on('click','.btn p .del_bnt',function () {
    var _this = $(this);
    var name = _this.parent().parent().siblings('.name').html();
    var id = _this.parent().parent().siblings('input[name="cateSel"]').val();
    layui.use(['layer'], function () {
        var layer = layui.layer;
        layer.confirm('确认删除'+name+'这个分类?',{icon: 3,title:'请确认!'},function(index) {
            $.ajax({
                url: url + '/delClassify.html'
                , type: 'POST'
                , dataType: 'JSON'
                , data: {exid: exid, cate: name, cid: id}
                , success: function (result) {
                    if (result.status) {
                        updateClassify();
                    }
                    layer.close(index)
                    layer.msg(result.message);
                }
            });

        });
    });
});

// 多选删除
$('#delete').click(function(){
    var target = $('.goods_item_mian input:checked');
    var ids = [];
    $.each(target,function (index,value) {
        ids[index] = value.defaultValue;
    });
    var len = ids.length;
    layui.use(['layer'], function () {
        var layer = layui.layer;
        layer.confirm('确认删除这'+len+'个分类?',{icon: 3,title:'请确认!'},function(index) {
            $.ajax({
                url: url + '/delClassify.html'
                , type: 'POST'
                , dataType: 'JSON'
                , data: {exid: exid, cid: ids}
                , success: function (result) {
                    if (result.status) {
                        updateClassify();
                    }
                    layer.close(index)
                    layer.msg(result.message);
                }
            });
        });
    });
});

// 点击链接按钮打开链接
$(document).on('click','.btn p .link',function () {
    $('.link_d').hide();
    $(this).parent().next().toggle();
});

// 点击复制复制链接到剪切板
$(document).on('click','button.copy',function () {
    var e = $(this).siblings('.link');
    e.select();
    document.execCommand("Copy");
    $('.link_d').hide();
});

// 点击打开按钮打开新链接到分类
$(document).on('click','button.open',function () {
    var addr = $(this).siblings('input.link').val();
    window.open(addr);
    $('.link_d').hide();

});

