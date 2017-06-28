/**
 * Created by wwkil on 2017/5/10.
 */
var url = $('#app-container').attr('target');
var exid = $('input[name="exid"]').val();

// 点击商品导出的动作
$('button.dao').click(function(){
    var wide = $('select[name="export"]').val();
    // console.log(wide);
    var order = getOrder();
    var cate = $('select[name="category"]').val();
    var search = $('input[name="search"]').val();
    var inp = {wide: wide,exid: exid,cate: cate,search: search,order: order};
    $.ajax({
        url: url+'/exportTab.html',
        type: 'POST',
        dataType: 'JSON',
        async: true,
        data: {wide: wide,exid:exid,cate:cate,search:search,order:order},
        success: function(data){
            var decide = window.confirm('要下载'+data.count+'条商品的数据?');
            if(decide){
                downLoad(url+'/exportTab.html',inp);
            }
        }
    });
});

// 点击搜索按钮的动作
$('button.sou').click(function(){
    updateGoods();
});

// 更改展厅内分组时触发
$('select[name=category]').change(function(){
    updateGoods();
});

// 搜索输入框触发页面更新
$('input[name="search"]').change(function(){
    updateGoods();
    $('form.kucun_Sou').submit(function(){
        return false;
    });
});

// 布置商品列表
function createGoods(items,site){
    var goodsBox = $('div.goodsShow ul');
    goodsBox.children().remove();
    $.each(items,function(i,v){
        var serial = i < 9 ? '0'+(i*1+1) : i*1+1;
        switch (site){
            case 'onsell':
                goodsBox.append('<li class="goods_item"> <div class="goods_item_mian clearfix"> <input type="checkbox" name="goodsSel" value="'+v.gid+'" class="fl kucun_cb"> <div class="num">'+serial+'</div> <div class="print fl"> <img src="/Uploads/'+v.gthumb+'" alt=""> </div> <div class="txt"> <p class="col-lan mgt5">'+v.gname+'</p> <p class="col-red mgt5">￥ '+v.price+'</p> </div> <div class="page_view">PV:'+v.pv+'</div> <div class="stock">'+v.stock+'</div> <div class="sales">'+v.sold+'</div> <div class="date">'+v.crea+'</div> <div class="order">'+v.sort+'</div> <div class="btn"> <p> <a href="publish.php"><span>编辑</span></a> <span class="del_bnt">删除 </span> </p> <p> <span class="tuiguang">推广商品</span> <span class="guige">规格库存</span> </p> <div class="tuiguang_box sanjiao_right_lan border-r5"> <div class="clearfix list list_lj"> <span class="fl">商品链接</span> <input class="fl link" type="text" value="http://d.pigcms.com/upload/images/000/14/338/201703/58c6535f50f37.jpg"> <button type="button" class="fl copy">复制</button> </div> <div class="clearfix list list_ewm"> <span class="fl">商品二维码</span> <div class="img fl"><img src="images/index_end_tbc.png" alt=""></div> <button class="fl acquire">下载</button> </div> </div> </div> </div> </li>');
                break;
            case 'soldOut':
                goodsBox.append('<li class="goods_item"> <div class="goods_item_mian clearfix"> <input type="checkbox" name="goodsSel" value="'+v.gid+'" class="fl kucun_cb"> <div class="num">'+serial+'</div> <div class="print fl"> <img src="/Uploads/'+v.gthumb+'" alt=""> </div> <div class="txt"> <p class="col-lan mgt5">'+v.gname+'</p> <p class="col-red mgt5">￥ '+v.price+'</p> </div> <div class="page_view">PV:'+v.pv+'</div> <div class="stock">'+v.stock+'</div> <div class="sales">'+v.sold+'</div> <div class="date">'+v.crea+'</div> <div class="order">'+v.sort+'</div> <div class="btn"> <p> <a href="publish.php"><span>编辑</span></a> <span class="del_bnt">删除 </span> </p> </div> </div> </li>');
                break;
            case 'stock':
                goodsBox.append('<li class="goods_item"> <div class="goods_item_mian clearfix"> <input type="checkbox" name="goodsSel" value="'+v.gid+'" class="fl kucun_cb"> <div class="num">'+serial+'</div> <div class="print fl"> <img src="/Uploads/'+v.gthumb+'" alt=""> </div> <div class="txt"> <p class="col-lan mgt5">'+v.gname+'</p> <p class="col-red mgt5">￥ '+v.price+'</p> </div> <div class="page_view">PV:'+v.pv+'</div> <div class="stock">'+v.stock+'</div> <div class="sales">'+v.sold+'</div> <div class="date">'+v.crea+'</div> <div class="order">'+v.sort+'</div> <div class="btn"> <p> <a href="publish.php"><span>编辑</span></a> <span class="del_bnt">删除 </span> </p> <span class="added" status="1">上架</span> </div> </div> </li>');
                break;
        }

    });
}
// 点击商品图片将该商品勾选/反选
$('.print img').click(function(){
    var checkbox = $(this).parent().siblings('input[name=goodsSel]');
    var stat = checkbox.prop("checked");
    stat ? checkbox.prop({checked:false}) : checkbox.prop({checked:true});
});

// 点击排序字段span标签更新商品
$('.kuangzi .doods_nav_head span').click(function(){
    var ord = $(this).children('i');
    if(ord.length == 1){
        var sort = ord.hasClass('asc');
        $('.kuangzi .doods_nav_head span i').removeClass('asc').removeClass('desc');
        if(sort){
            ord.removeClass('asc').addClass('desc');
        }else{
            ord.removeClass('desc').addClass('asc');
        }
        updateGoods();
    }
});

// 获取排序方法
function getOrder(){
    var column =  $('.asc,.desc').attr('column');
    var sor = $('i[column="'+column+'"]').attr('class');
    var cond = {};
    cond[column] = sor;
    return cond;
}

// 获取分页商品数据
function updateGoods(){
    var condition = getOrder();
    var excate = $('select[name="category"]').val();
    var goodsname = $('input[name="search"]').val();
    var con = {};
    con = {exid:exid,cate:excate,search:goodsname,order:condition};
    $.ajax({
        url: url+'/getGoods.html',
        type: 'POST',
        async: true,
        dataType: 'JSON',
        cache: false,
        data: con,
        success: function(data){
            createGoods(data.result,data.action);
            showpage(data.count,con);
            $('.page_total b').html(data.count);
        },
    });
}

function downLoad(address,data){
    var form=$("<form>");//定义一个form表单
    form.attr("style","display:none");
    form.attr("target","");
    form.attr("method","post");
    form.attr("action",address);
    $("body").append(form);//将表单放置在web中
    var i = 0;
    $.each(data,function(ind,val){
        if(ind=='order'){
            $.each(val,function(j,q){
                eval('var input'+i+'= $("<input>");');
                eval('input'+i+'.attr("type","hidden");');
                eval('input'+i+'.attr("name","'+ind+'['+j+']");');
                eval('input'+i+'.attr("value","'+q+'");');
                eval('form.append(input'+i+');');
                i++;
            });
        }else{
            eval('var input'+i+'= $("<input>");');
            eval('input'+i+'.attr("type","hidden");');
            eval('input'+i+'.attr("name","'+ind+'");');
            eval('input'+i+'.attr("value","'+val+'");');
            eval('form.append(input'+i+');');
            i++;
        }
    });
    form.submit();//表单提交
}

//分页处理
function showpage(count,data){
    var pages = Math.ceil(count/15);
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
                        url: url+'/getGoods.html'
                        ,type: 'POST'
                        ,dataType: 'JSON'
                        ,async: true
                        ,cache: false
                        ,data: data
                        ,success: function(result){
                            createGoods(result.result,result.action);
                        }
                    });
                }
            }
        });
    });
}

// 页面载入完毕后初始化分页插件
$(function(){
    var num = $('#pagination').attr('rows');
    var base = {};
    base.order = getOrder();
    base.exid = exid;
    showpage(num,base);
});

//出售中的商品  中的全选
$(".kuangzi .kucun_caozuo input").click(function(){
    if($(this).is(':checked')){
        $('.kuangzi .goods_item input').prop("checked",true);
    }else{
        $('.kuangzi .goods_item input').prop("checked",false);
    }
});

// 点击推广时将商品链接等弹出
$(document).on('click',".btn p span.tuiguang",function () {
    $(".tuiguang_box").hide(0);
    $(".btn .guige_box").hide(0);
    $(this).parents('.btn').find(".tuiguang_box").toggle();
});

// 点击复制按钮复制输入框的地址
$(document).on('click','.copy',function(){
    var e = $(this).siblings('.link');
    e.select();
    document.execCommand("Copy");
    $(this).parents('.btn').find(".tuiguang_box").hide(0);
});

// 点击下载按钮下载商品宣传二维码
$(document).on('click','.acquire',function () {
    var path = $(this).prev('.img').children('img').attr('src');
    var form=$("<form>");//定义一个form表单
    form.attr("style","display:none");
    form.attr("target","");
    form.attr("method","post");
    form.attr("action",url+'/downloadQRcode.html');
    $("body").append(form);//将表单放置在web中
    var input = $("<input>");
    input.attr("type","hidden");
    input.attr("name","path");
    input.attr("value",path);
    form.append(input);
    form.submit();//表单提交

});

// 单个商品删除时的弹框
$(document).on('click','.btn p span.del_bnt',function(){
    var btn = $(this).parent().parent();
    var goods_name = btn.siblings('.txt').find('p:first').html();
    var id = btn.siblings('input[name="goodsSel"]').val();
    var _this = $(this);
    layui.use(['layer'], function () {
        var layer = layui.layer;
        layer.open({
            type: 1
            ,title: ['您确定要删除'+goods_name+'吗？','font-size:18px;text-align:center']
            ,content: '<div style="text-align:center;margin:100px auto;color:#dd1144;font-size: 20px">温馨提示：删除后不能恢复！</div>'
            ,skin: 'layui-layer-lan'
            ,area: ['500px','400px']
            ,btn: ['确认','取消']
            ,shade: 0.7
            ,shadeClose: true
            ,anim: 'up'
            ,yes:function(index,layero){
                $.ajax({
                    url: url+'/delGoods.html'
                    ,type: 'POST'
                    ,dataType: 'JSON'
                    ,async: true
                    ,data: {exid: exid,gid:id}
                    ,success: function (result) {
                        _this.parent().parent().parent().parent().remove();
                        layer.msg(result.message);
                        updateGoods();
                    }
                });
                layer.close(index);
            }
            ,btn2:function(index,layero){
                layer.close(index);
            }
        });
    });

});



// 点击规格库存弹出遮罩以及规格清单
$(document).on('click','.btn p span.guige',function () {
    var btn = $(this).parent().parent();
    var goods_name = btn.siblings('.txt').find('p:first').html();
    var id = btn.siblings('input[name="goodsSel"]').val();
    var height = document.documentElement.clientHeight;
    $.ajax({
        url: url+'/getStock.html'
        ,type: 'POST'
        ,dataType: 'JSON'
        ,cache: false
        ,async: true
        ,data: {gid:id}
        ,success: function (result) {
            layui.use(['layer'], function () {
                var layer = layui.layer;
                layer.open({
                    type: 1
                    ,title: [goods_name+'的规格库存','font-size:18px;text-align:center']
                    ,content: result.data
                    ,skin: 'layui-layer-lan'
                    ,area: ['1000px',height+'px']
                    ,offset: 't'
                    ,btnAlign: 'c'
                    ,btn: ['关闭']
                    ,shade: 0.7
                    ,shadeClose: true
                    ,anim: 1
                    ,yes:function(index,layero){
                        layer.close(index);
                    }
                });
            });
        }
    });
});


// 更改分组
$('#alterGroup').click(function(){
    $(this).siblings('#dropDown').toggle();
});
// select更改事件
$('select[name="changeGroup"]').change(function () {
    var targets = $('.goodsShow ul li.goods_item input:checked');
    var ids = [];
    var group = $(this).val();
    $.each(targets,function(index,value){
        ids[index] = value.defaultValue;
    });
    $.ajax({
        url: url+'/changeGroup.html',
        type: 'POST',
        dataType: 'JSON',
        data: {ids:ids,group:group},
        success: function (result) {
            layui.use(['layer'], function () {
                var layer = layui.layer;
                layer.msg(result.message);
            });
            $('#dropDown').hide();
        }
    });
});

$('#delete').click(function () {
    var targets = $('.goodsShow ul li.goods_item input:checked');
    var ids = [];
    $.each(targets,function(index,value){
        ids[index] = value.defaultValue;
    });
    var len = ids.length;
    layui.use(['layer'], function () {
        var layer = layui.layer;
        layer.confirm('确定要删除这'+len+'件商品?', {icon: 3, title:'确定'}, function(index){
            $.ajax({
                url: url+'/delGoods.html'
                ,async:true
                ,type: 'POST'
                ,dataType: 'JSON'
                ,data: {gid:ids}
                ,success: function(result){
                    targets.parent().parent().remove();
                    layer.msg(result.message);
                    layer.close(index);
                    updateGoods();
                }
            });

        });
    });
});

// 上/下架商品
$(document).on('click','.added,#sold',function () {
    var _this = $(this);
    var status = _this.attr('status');
    var targets = $('.goodsShow ul li.goods_item input:checked');
    var ids = [];
    $.each(targets,function(index,value){
        ids[index] = value.defaultValue;
    });
    var len = ids.length;
    var id = _this.parent().siblings('input[name="goodsSel"]').val();
    var changed = status == 1 ? id : ids;
    var message = status == 1 ? '确定要上架这件商品?' : '确定要下架这'+len+'件商品?'
    layui.use(['layer'], function () {
        var layer = layui.layer;
        layer.confirm(message, {icon: 3, title:'确定'}, function(index){
            $.ajax({
                url: url+'/soldOutGoods.html'
                ,async: true
                ,type: 'POST'
                ,dataType: 'JSON'
                ,data: {gid:changed,status:status}
                ,success: function(result){
                    targets.parent().parent().remove();
                    layer.msg(result.message);
                    layer.close(index);
                    updateGoods();
                }
            });
        });
    });
});
