/**
 * Created by wwkil on 2017/4/21.
 */
var gettype = Object.prototype.toString;
// var hall = $("input[name='hall']").val();
var url = $('#app-container').attr('target');
// 选择分类出发的ajax事件
    $(document).on("change",".cate",function(){
        var cate = $(this).val();
        var _this = $(this);
        var level = _this.attr("level");
        if(!isNaN(cate)){
            $.ajax({
                url: url+'/getCate.html',
                async: true,
                data: {cate: cate,level: level},
                type: 'POST',
                success:function(res){
                    if(res.error == 100){
                        _this.nextAll().remove();
                        $.each(res.cate , function(ind,val){
                            if(gettype.call(val) != '[object Null]'){
                                _this.parent().append("<select name='cate' class='cate' level='"+(ind*1+1)+"'></select>");
                                $.each(val, function(index,value){
                                    _this.parent().children().last().append("<option value='"+value.cid+"'>"+value.cname+"</option>");
                                });
                            }
                        });
                        _this.parent().find('input:hidden').val(res.type);
                        var attrBox = $(".attribute");
                        attrBox.children().remove();
                        $.each(res.attr, function(name,val){
                            attrBox.append("<div class='clearfix'><p>"+name+"：</p><ul></ul></div>");
                            $.each(val,function(i,v){
                                attrBox.find(".clearfix ul").last().append("<li attr='"+v.aid+"'>"+v.aval+"</li>")
                            });
                        });
                    }else{
//                        layer.open({})
                    }
                },
                error:function(){

                }
            });
        }

    });


$(function(){
    var i = $('.l_shangpinshuxing').length;
    $('#property'+i).chosen({
        disable_search_threshold: 10,
        no_results_text: '未找到关键词:',
        allow_single_deselect: true,
        placeholder_text_single: '选择一个属性',
    });
    $("#value"+i).manifest({
        separator:[';',',']
    });
    // 添加按钮
    $(document).on("click",".tianjia",function(){
        i++;
        var options = $("#property1").html();
        if(i<=3){
            var clone = '<div class="clearfix l_shangpinshuxing pro'+i+'" level="'+i+'"><p class="kong">&nbsp;</p><select name="property'+i+'"  data-placeholder="添加规格项目" class="bubian pdl10" id="property'+i+'"><option value="0"> </option>'+options+'<option value="0"> </option></select> <input type="text" placeholder="用英文半角,及;分隔属性值" id="value'+i+'" name="value'+i+'" class="pdl10" /> <button class="confirm_b" type="button">确定</button> <button class="cancel_b" type="button">取消</button> <p class="tianjia" >+添加</p></div>';
            if($(this).parents().siblings('.l_shangpinshuxing.pro'+(i-1)).length == 0){
                $(this).parent().after(clone);
            }else{
                $(this).parents().siblings('.l_shangpinshuxing.pro'+(i-1)).after(clone);
            }
            $('#property'+i).chosen({
                disable_search_threshold: 10,
                no_results_text: '未找到关键词:',
                allow_single_deselect: true
            });
            $("#value"+i).manifest({separator:[';',',']});
        }
        return false;
    });
    changeTable();
    // 点击取消
    $(document).on('click','.cancel_b',function(){
        $(this).parent().remove();
        i--;
        changeTable();
    });

});


    //点击确认按钮时的动作
    $(document).on('click','.confirm_b',function(){
        changeTable();
    });
    // 点击确认结束



    //改变表格
    function changeTable(){
        var property = $('.confirm_b').parent().parent().find('.chosen-container a.chosen-single span');
        var arr = new Array();
        var pro = new Array();
        $.each(property,function(index,value){
            var level = index*1+1;
            var brr = new Array();
            var vals = $("#mf_value"+level+'_list .mf_item');
            $.each(vals,function(i,v){
                brr[i] = v.firstChild.nodeValue;
            });
            arr[index] = brr;
            pro[index] = value.innerHTML;
        });
        var t = arr.length-1;
        var result = getTable(arr,t);
        var cache = $('table.h_Ruler').attr('data');
        eval('var data = '+cache);
        $('table.h_Ruler').remove();
        if(pro != '选择一个属性' && result.length > 0) {
            $('div.h_size').append('<table class="h_Ruler"> <tr class="jiage"><td class="li-02">净重</td> <td class="li-02">价格</td> <td class="li-02">库存</td> <td class="li-02">商品编码</td> <td class="li-02">销量</td> </tr> </table>');
            $.each(pro, function (index, value) {
                var last = $('table.h_Ruler tr.jiage:first td.li-01:last');
                if (last.attr('level') == index) {
                    last.after('<td class="li-01 pro' + (index * 1 + 1) + '" level="' + (index * 1 + 1) + '">' + value + '</td>');
                } else if (index == 0) {
                    $('table.h_Ruler tr.jiage:first').prepend('<td class="li-01 pro' + (index * 1 + 1) + '" level="' + (index * 1 + 1) + '">' + value + '</td>')
                }

            });
            $('table.h_Ruler tbody tr.jiage:first').nextAll().remove();


            $.each(result, function (index, value) {
                $('table.h_Ruler tbody').append('<tr class="jiage detail"></tr>');
                $.each(value, function (ind, val) {
                    $.each(val, function (i, v) {
                        if (!isNaN(i)) {
                            $('table.h_Ruler tbody tr.jiage:last').append('<td class="li-01" level="1" rowspan="' + i + '">' + v + '</td>');
                        }
                    });
                });
                var level = index * 1 + 1;
                if(typeof(data) == 'undefined') {
                    $('table.h_Ruler tbody tr.jiage:last').append(' <td class="li-02"><input type="text" name="weight[]" /></td> <td class="li-02"><input type="text" name="price[]"/></td> <td class="li-02"><input type="text" name="stock[]"/></td> <td class="li-02"><input type="text" name="code[]"/></td> <td class="li-02"><input type="text" name="count[]"/></td>');
                }else{
                    $('table.h_Ruler tbody tr.jiage:last').append(' <td class="li-02"><input type="text" name="weight[]" value="'+data[index].weight+'" /></td> <td class="li-02"><input type="text" name="price[]" value="'+data[index].price+'" /></td> <td class="li-02"><input type="text" name="stock[]"  value="'+data[index].stock+'" /></td> <td class="li-02"><input type="text" name="code[]" value="'+data[index].code+'" /></td> <td class="li-02"><input type="text" name="count[]"  value="'+data[index].sold+'" /></td><input type="hidden" name="skuid[]" value="'+data[index].skuid+'"');
                }



            });

        }
    }

    // 获得表格数组
    function getTable(arr,time){
        var array = new Array();
        var length = 1;
        $.each(arr,function(index,value){
            length *= value.length;
        });
        var i = 0;
        var len = arr[0].length;
        var row = length/len;
        var t = time;
        switch (t){
            case 0:
                for(var j = 0 ; j < length ; j++){
                    var temp=[];
                    eval('temp[0] = {1:arr[0][j]}');
                    array[j] = temp;
                }
                break;
            case 1:
                var i = 0;
                var h = 0;
                for(var j = 0 ; j < length ; j++){
                    var temp=[];
                    if(j%row == 0 || isNaN(j%row)){
                        eval('temp[0] = {'+row+':arr[0][i]}');
                        i++;
                    }else{
                        eval('temp[0] = {j:0}');
                    }
                    h = j%row == 0 ? 0 : h;
                    eval('temp[1] = {'+1+':arr[1][h]}');
                    h++
                    array[j] = temp;
                }
                break;
            case 2:
                var i = 0;
                var h = 0;
                for(var j = 0 ; j < length ; j++){
                    var temp=[];
                    if(j%row == 0 || isNaN(j%row)){
                        eval('temp[0] = {'+row+':arr[0][i]}');
                        i++;
                    }else{
                        eval('temp[0] = {j:0}');
                    }
                    var sub_len = arr[1].length;
                    var sub_row = row/sub_len;
                    h = j%row == 0 ? 0 : h;
                    if(j%sub_row == 0 || isNaN(j%sub_row)){
                        eval('temp[1] = {'+sub_row+':arr[1][h]}');
                        h++;
                    }else{
                        eval('temp[1] = {j:0}');
                    }
                    k = j%sub_row == 0 ? 0 : k;
                    eval('temp[2] = {'+1+':arr[2][k]}');
                    k++;
                    array[j] = temp;
                }
                break;
        }
        return array;
    }

    // 图片展示
    $(document).on('change','div.goods ul li div.upload_sm input',function(){
        var inps = $(this).parent().parent().parent().find('input');
        var count = inps.length;
        var changed = 0;
        var url=window.URL.createObjectURL(this.files[0]);
        $(this).parent().attr('style','background: url('+url+') no-repeat');
        $.each(inps,function(index,value){
            var div = $(this).parent().parent().parent().find('.upload_sm:eq("'+index+'")');
            var para = div.attr('style');
            if(typeof para != 'undefined'){
                changed++;
            }
        });
        if(count <= 7 && changed == count){
            $(this).parent().parent().parent().append('<li class="upload_li fl"><div class="minus">-</div> <div class="upload_sm" ><input type="file" name="pic[]" class="upload_1"; datatype="*" nullmsg=""></div></li>');
        }else{
            return false;
        }
    });

    // 商品关联图上传
    $(document).on('change','div.rel ul li div.upload_sm input',function(){
        var inps = $(this).parent().parent().parent().find('input');
        var count = inps.length;
        var changed = 0;
        var url=window.URL.createObjectURL(this.files[0]);
        $(this).parent().attr('style','background: url('+url+') no-repeat');
        $.each(inps,function(index,value){
            var div = $(this).parent().parent().parent().find('.upload_sm:eq("'+index+'")');
            var para = div.attr('style');
            if(typeof para != 'undefined'){
                changed++;
            }
        });
        if(count <= 7 && changed == count){
            $(this).parent().parent().parent().append('<li class="upload_li fl"><div class="minus">-</div> <div class="upload_sm" ><input type="file" name="rel[]" class="upload_1"; datatype="*" nullmsg=""></div></li>');
        }else{
            return false;
        }
    });

    // 点击图片上方的减号去除该单元
    $(document).on('click','.minus',function(){
        var inps = $(this).parent().parent().parent().find('input');
        var count = inps.length;
        var sibling = $(this).parent().parent().find('li.upload_li');
        var index = sibling.index($(this).parent());
        var url = $(this).next().attr('style');
        var prev = $(this).parent().prev();
        var changed = 0;
        $.each(inps,function(index,value){
            var div = $(this).parent().parent().parent().find('.upload_sm:eq("'+index+'")');
            var para = div.attr('style');
            if(typeof para != 'undefined'){
                changed++;
            }
        });
        if(index != (count-1) || typeof url != 'undefined'){
            $(this).parent().remove();
            count--;
        }
        if(changed == 8 && count == 7){
            prev.parent().append('<li class="upload_li fl"><div class="minus">-</div> <div class="upload_sm" ><input type="file" name="pic[]" class="upload_1"; datatype="*" nullmsg=""></div></li>');
        }
    });

    // 点击筛选属性
    $(document).on('click','.attribute div ul li',function(){
        $(this).siblings('.active').removeClass('active');
        var group = $(this).attr('group');
        var inp = $(this).parent().children('input[name="group[]"]');
        var pre = $(this).parent().prev().html();
        pre = pre.substr(0,(pre.length-1));
        var attr = $(this).html();
        if(inp.length == 1){
            inp.val(pre+':'+attr);
        }else{
            $(this).parent().append('<input name="group[]" type="hidden" value="'+pre+':'+attr+'" />');
        }
        $(this).addClass('active');
    });

    //点击下一步时进行提交页面数据
    $('.step').click(function(){
        $('form:first').submit();
    });
