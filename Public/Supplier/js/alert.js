/**
 * Created by wwkil on 2017/5/17.
 */
var url = $('#app-container').attr('target');
var exid = $('input:hidden[name="exid"]').val();
$(function(){
    console.log(exid);
    var pages = $('#pagination').attr('rows');
    var cond = {exid:exid};
    showpage(pages,cond);
});
// 点击仓库报警设置
$('.alert2').click(function () {
    $('.protection').show();
    $('.protection .tanchu_box').show();
});
// 点击仓库报警设置确定
$('.protection .tanchu_box .btn button:first').click(function(){
    var num = $(this).parent().prev().children('input').val();
    if(!isNaN(num)){
        $.ajax({
            url: url+'/alterWarn.html'
            ,async: true
            ,type: 'POST'
            ,dataType: 'JSON'
            ,cache: false
            ,data: {num:num,exid:exid}
            ,success: function(result){
                if(result.status){
                    updateGoods();
                    $('.protection').hide();
                    $('.protection .tanchu_box').hide();
                    $(this).parent().prev().children('input').val(num);
                }
                layui.use(['layer'],function(){
                    layui.layer.msg(result.message);
                })
            }
        })
    }
});

// 取消更改报警
$('.close_btn').click(function () {
    $('.protection').hide();
    $('.protection .tanchu_box').hide();
});
// 搜索框改变
$('input.sou').click(function () {
    $('.kucun_Sou').submit(function(){
        return false;
    });
    updateGoods();
});

// 点击搜索框
$('button.sou').click(function(){
    $('.kucun_Sou').submit(function(){
        return false;
    });
    updateGoods();
});

function updateGoods(){
    var cond = {};
    cond.key = $('input.sou').val();
    cond.exid = exid;
    $.ajax({
        url: url+'/getAlertGoods.html'
        ,async: true
        ,type: 'POST'
        ,dataType: 'JSON'
        ,cache: false
        ,data: cond
        ,success: function(result){
            showpage(result.count,cond);
            createGoods(result.result);
        }
    })
}
function showpage(count,data){
    var page = Math.ceil(count/15);
    var cond = data;
    layui.use(['laypage','layer'],function(){
        laypage = layui.laypage;
        layer = layui.layer;
        laypage({
            cont: 'pagination'
            ,pages: page
            ,skip: true
            ,skin: '#5FB878'
            ,jump: function(obj,first){
                if(!first){
                    // console.log(data);
                    cond.page = obj.curr;
                    $.ajax({
                        url: url+'/getAlertGoods.html'
                        ,async: true
                        ,type: 'POST'
                        ,dataType: 'JSON'
                        ,cache: false
                        ,data: data
                        ,success: function(result){
                            createGoods(result.result);
                        }
                    });
                }
            }
        });
    });
}

// 创建商品表格
function createGoods(obj){
    $('div.goodsShow ul').children().remove();
    $.each(obj, function (index,value) {
        var num = index < 9 ? '0'+(index*1+1) : (index*1+1);
        $('div.goodsShow ul').append('<li class="goods_item"> <div class="goods_item_mian clearfix"> <input type="checkbox" name="goodsSel" value="'+value.sid+'" class="fl kucun_cb"> <div class="num">'+num+'</div> <div class="print fl"> <img src="/Uploads/'+value.gthumb+'" alt=""> </div> <div class="txt"> <p class="col-lan mgt5">'+value.gname+'</p> <p class="col-red mgt5">￥ '+value.gprice+'</p> <p class="mgt5">['+value.attrs+']</p> </div> <div class="page_view">PV:'+value.pv+'</div> <div class="stock">'+value.stock+'</div> <div class="sales">'+value.sales+'</div> <div class="date">'+value.crea+'</div> <div class="btn"> <p> <span>修改库存</span> </p> <div class="q_tanchun sanjiao_right_lan"> <input type="text"> <button class="qued">确定</button> <button class="qux">取消</button> </div> </div> </div> </li>');
    });
}

// 点击修改库存
$(document).on('click','.btn p span',function(){
    var num = $(this).parent().parent().siblings('.stock').html();
    $(this).parent().next().children('input').val(num);
    $(this).parent().next().toggle();
});

// 点击确定按钮将库存数量修改
$(document).on('click','.q_tanchun .qued',function(){
    var num = $(this).prev().val();
    var id = $(this).parent().parent().siblings('input[name=goodsSel]').val();
    $.ajax({
        url: url+'/alterSKU.html'
        ,async: true
        ,type: 'POST'
        ,dataType: 'JSON'
        ,cache: false
        ,data: {sku:id,num:num}
        ,success: function(result) {
            layui.use(['laypage', 'layer'], function () {
                layui.layer.msg(result.message);
            });
        }
    });

});

// 取消编辑库存
$(document).on('click','.container .cont_lump_qpolice .goodsShow .goods_item .goods_item_mian .btn .q_tanchun .qux',function(){
    $(this).parent("div").hide(0);
});

// 多选删除
$('#delete').click(function(){
    var target = $('.goodsShow ul li.goods_item div.goods_item_main input[name="goodsSel"]:checked');
    var ids = [];
    $.each(target,function (index,value) {
        ids[index] = value.defaultValue;
    });
    var len = ids.length;
    layui.use(['layer'],function(){
        layui.layer.confirm('确定删除这'+len+'种规格的商品?',{icon:3, title: '删除后无法恢复!'},function(index){
            $.ajax({
                url: url+'/delSKU.html'
                ,async: true
                ,type: 'POST'
                ,dataType: 'JSON'
                ,cache: false
                ,data: {sku:ids}
                ,success: function(result){
                    layui.layer.msg(result.message);
                }
            });
        });
    });

});