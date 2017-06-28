/**
 * Created by wwkil on 2017/5/9.
 */
var gettype = Object.prototype.toString;
var url = $('#app-container').attr('target');
// 点击分类触发的ajax事件
$(document).on("change",".cate",function(){
    var cate = $(this).val();
    var _this = $(this);
    var level = _this.attr("level");
    var exid = $('input[name="exid"]').val();
    if(!isNaN(cate)){
        $.ajax({
            url: url+'/catesGetGoods.html',
            async: true,
            data: {cate: cate,level: level,exid:exid},
            type: 'POST',
            success:function(res){
                _this.nextAll().remove();
                $.each(res.cate , function(ind,val){
                    if(gettype.call(val) != '[object Null]'){
                        _this.parent().append("<select name='cate' class='cate' level='"+(ind*1+1)+"'></select>");
                        $.each(val, function(index,value){
                            _this.parent().children().last().append("<option value='"+value.cid+"'>"+value.cname+"</option>");
                        });
                    }
                });
                $('ul.goods_list div').html('');
                showGoods(res);
                var count = res.data.count;
                if(count > 0) showPage(count,cate,exid);
            },
            error:function(){

            }
        });
    }

});

// 商品分类查询输入框改变时触发动作
$('input[name="cateWords"]').change(function(){
    var cate = $(this).val();
    var exid = $('input[name="exid"]').val();
    var _this = $(this);
    $.ajax({
        url: url+'/catesGetGoods.html',
        async: true,
        type: 'POST',
        data: {cate : cate,exid : exid},
        success: function (result) {
            $('ul.goods_list div').html('');
            showGoods(result);
            var count = result.data.count;
            if(count > 0) showPage(count,cate,exid);

        }
    });
});

// 显示新追加的商品
function showGoods(obj){
    var goods_box = $('ul.goods_list');
    goods_box.children('li').remove();
    $.each(obj.data.goods,function(index,value){
        var num = index*1+1;
        goods_box.children('#page').before('<li> <div class="se_che"><input type="checkbox" name="goodsCheck[]" value="'+value.gid+'"></div> <div class="se_xuhao">0'+num+'</div> <div class="se_img"><img src="/Uploads/'+value.gthumb+'" alt=""></div> <div class="se_name">'+value.gname+'</div> <div class="se_caozuo"><span>选择</span></div> </li>')
    });
}
function showPage(num,cate,exid){
    count = Math.ceil(num/8);
    $("#page").paginate({
        count: count,
        start: 1,
        display: 8,
        border: true,
        border_color: '#fff',
        text_color: '#fff',
        background_color: 'black',
        border_hover_color: '#ccc',
        text_hover_color: '#000',
        background_hover_color: '#fff',
        images: false,
        mouse: 'press',
        onChange: function(page){
            var p = page;
            $.ajax({
                url: url+'/catesGetGoods.html',
                async: true,
                data: {cate: cate,exid:exid,page:p},
                type: 'POST',
                success: function (result) {
                    showGoods(result);
                },
            });
        }
    });
}

// 将文本域替换为CKeditor
$(function (){
    CKEDITOR.replace('introEdit',{ width : 590,height:200,language: 'zh-cn' });
});

// 添加商品选择单个商品
$(document).on('click','.se_caozuo span',function(){
    var _this = $(this);
    var stat = _this.html();
    if(stat == '选择'){
        _this.parent().parent().find('.se_che input').prop({checked:true});
        _this.html('取消');
    }else{
        _this.parent().parent().find('.se_che input').prop({checked:false});
        _this.html('选择');
    }
});

// 点击添加商品提交按钮
$('.foot button').click(function(){
    var check = $(this).parent().siblings('.goods_list').find('.se_che input[name="goodsCheck[]"]:checked');
    var length = check.length;
    if(length > 5){
        alert('商品数量太多,最多选择5件推荐商品');
        return ;
    }
    $.each(check,function(index,value){
        var ind = $('.goods_list li .se_che input').index($('.se_che input[name="goodsCheck[]"]:checked:eq('+index+')'));
        $('.custo_list .row_add .right_con:eq('+index+')').children().remove();
        var goodsName = $('.goods_list li:eq('+ind+') .se_name').html();
        var goodsThumb = $('.goods_list li:eq('+ind+') .se_img img').attr('src');
        var goodsID = value.defaultValue;
        $('.custo_list .row_add .right_con:eq('+index+')').append('<div class="se_img"><img src="'+goodsThumb+'" alt="'+goodsName+'"></div><input name="rel[]" value="'+goodsID+'" type="hidden">')
    });

});
