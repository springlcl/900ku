<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="wap-font-scale" content="no">
    <title>前台首页</title>
    <link rel="stylesheet" href="__HOME_CG_PUBLIC__/css/exhibition_hall_style.css">
    <link rel="stylesheet" href="__HOME_CG_PUBLIC__/css/swiper.min.css">
    <link rel="stylesheet" href="__HOME_CG_PUBLIC__/css/icons.css">
    <link rel="stylesheet" href="__HOME_CG_PUBLIC__/css/reset.css">
    <link rel="stylesheet" href="__HOME_CG_PUBLIC__/css/style.css">
</head>
<body>
    <div class="mask"></div>
    <header class="shopping_index_head">
        <div class="shopping_head_top">
            <div class="shopping_nav">
                <div class="shopping_left">
                    <a href="{:U('Home/index')}"><span>Hi，欢迎来900库</span></a>
          <!--           <a href="">请登录</a> -->
                </div>
                <div class="shopping_right">
                    <span>
                        <a href="{:U('Order/purchase_list')}"><span >采购清单<a>{$num|default="0"}</a>件</span></a>
                    </span>
                    <span>
                       我的账户
                       <a href="{:U('Login/quit')}"><span id="out" style="display:none">退出登录</span></a>
                    </span>
                    <span>
                       微信版
                    </span>
                    <span>
                       900库APP
                    </span>
                    <span><!-- <a style="color:#A998BA" href=""></a> -->
                       
                    </span>
                </div>
            </div>
        </div>
        <a id="db"></a>
        <div class="store_head_con wh1200auto pdb20">
            <div class="store_logo">
                <div><img style="width:60px;height:60px;" src="__UPLOADS__/purchaser/headimg/<?=session('cg_headimg');?>" alt=""></div>
                <div class="store_title"><a href="{:U('Cg/index',array('itemid'=>$itname['pid']))}">{$itname.pro_name}</a></div>
            </div>
            <a href="{:U('Home/index')}"><img class="store_logo_left" src="__HOME_PUBLIC__/images/logo.png" alt=""></a>
        </div>
    </header>

<div class="cart_content0">
        <div class="cart_content">
            <img src="__HOME_CG_PUBLIC__/images/liucheng-1.png" alt="" class="mgt20 mgb30">
            
            <div class="cart_goods">
                <ul>
                    <li>
                        <div>商品信息</div>
                    </li>
                    
                    <li>型号</li>
                    <li>单价</li>
                    <li>数量</li>
                    <li>小计</li>
                    <li>操作</li>
                </ul>
            </div>
            <volist id="data" name="data">
            <div class="dingji">
            <div class="cart_goods_a">
                <ul>
                    <li>
                        <input type="checkbox">
                        <div class="zhanting">供应商名称：{$data.ex_name}</div>
                    </li>
                    <li>
                        <div>{$data.pro_name}</div>
                    </li>
                    <li>
                        <div><a href="">总金额：￥<span class="zongji">{$data.zongji}</span></a></div>
                    </li>
                </ul>
            </div>
             <volist name="data['shangpin']" id="str">
            <div class="cart_goods_a1">
               <ul class="one">
                    <li class="ls">
                        <input type="checkbox" name='message' class="cke" value="{$str.cart_id}">
                        <img src="{$str.thumb}" alt="" class="mgl10">
                       <!--  <if condition="$str.is_zhunru neq 0">
                            <div class="bfb">非准入商品</div>
                        </if> -->
                        <div class="mgt20">{$str.goods_name} </div>
                    </li>
                    <li>
                        <p class="mgt20"><?php $i = explode(",",$str['sku']); echo($i[0]); ?></p>
                        <p><?php $i = explode(",",$str['sku']);echo $i[1];?></p>
                    </li>
                    <li class="two">￥<span class="jiage">{$str.goods_price}</span></li>
                    <li >    
                        <div id="cart_num1" >
                            <input class="shuliang" type="text" value="{$str.goods_num}" readonly="readonly">
                        </div>
                        <div id="cart_num2">
                            <div id="cart_num2-1" class="jia" cid="{$str.cart_id}">+</div>
                            <div id="cart_num2-2" class="jian" cid="{$str.cart_id}">-</div>
                        </div>
                    </li>
                    <li>￥<span class="jieguo">{$str.subtotal}</span></li>
                    <li class="shanchu" cid="{$str.cart_id}">删除</li>
                </ul>
            </div>
            </volist>
            </div>
            </volist>
            <div class="cart_goods_a1_qx">
                <ul>
                    
                    <li>
                        <input type="checkbox" class="cheAll">
                        <div class="quan">删除选中的商品</div>
                    </li>
                    <li>
                        <input type="checkbox" class="cheAll">
                        <div class="quan">清除下柜商品</div>
                    </li>
                    <li>
                        <div>共计{$strs.num}件</div>
                    </li>
                    <li>
                        <div>合计（不含运费）：</div>
                    </li>
                    <li>
                        <!-- <div>￥<span id="zonghe">{$strs.zongji}</span></div> -->
                        <div>￥<span id="zonghe">0.00</span></div>
                    </li>
                    <li>
                        <div class="jiesuan">去结算</div>
                    </li>
                </ul>
            </div> 
        </form>
        </div>
    </div>

<!-- 底部=================================== -->
    <include file="Public/Foot" />
</body>
<script type="text/javascript" src="__HOME_CG_PUBLIC__/js/jquery.min.js"></script>
<script type="text/javascript" src="__HOME_CG_PUBLIC__/js/swiper.min.js"></script>
<script type="text/javascript" src="__HOME_CG_PUBLIC__/js/js.js"></script>
<script>



$(function () {
        循环求和
       function for_list_li(){
            var amount  = 0;
            var list=$('.cart_goods_a1 .one .two .jiage');

            for(var i=0;i<list.length;i++){
                if ($(list[i]).parents('.cart_goods_a1').find('.one').find('.ls').find('.cke').is(':checked')) {
                    amount+=Number($(list[i]).text())*Number($(list[i]).parents('.cart_goods_a1').find('.shuliang').val());
                }
                //alert(Number($(list[i]).text()))
                console.log(Number($(list[i]).parents('li').find('.zonghe span').text()))
                // alert(amount);
            }
                console.log('+1');
            // alert(amount);
            $('#zonghe').text(amount);
        }
        for_list_li();
       
        // 购物车全选
        $(".selectAll1").click(function(){
            if($(this).is(':checked')){
                $('.gwc_box .gwc_you .list li input').prop("checked",true);
                for_list_li();
            }else{
                $('.gwc_box .gwc_you .list li input').prop("checked",false);
                for_list_li();
            }
        });
        // 多选款点击   调用循环函数
        $('.gwc_box .gwc_you .list li input').click(function () {
            var amount  = 0;
            var list=$('.cart_goods_a1 .one .two .jiage');

            for(var i=0;i<list.length;i++){
                if ($(list[i]).parents('.cart_goods_a1').find('.one').find('.ls').find('.cke').is(':checked')) {
                    amount+=Number($(list[i]).text())*Number($(list[i]).parents('.cart_goods_a1').find('.shuliang').val());
                }
                //alert(Number($(list[i]).text()))
                console.log(Number($(list[i]).parents('li').find('.zonghe span').text()))
                // alert(amount);
            }
                console.log('+1');
            // alert(amount);
            $('#zonghe').text(amount);
        })

    });

    $('.cke').click(function(){
        var amount  = 0;
            var list=$('.cart_goods_a1 .one .two .jiage');

            for(var i=0;i<list.length;i++){
                if ($(list[i]).parents('.cart_goods_a1').find('.one').find('.ls').find('.cke').is(':checked')) {
                    amount+=Number($(list[i]).text())*Number($(list[i]).parents('.cart_goods_a1').find('.shuliang').val());
                }
                //alert(Number($(list[i]).text()))
                console.log(Number($(list[i]).parents('li').find('.zonghe span').text()))
                // alert(amount);
            }
                console.log('+1');
            // alert(amount);
            $('#zonghe').text(amount);
    });

    $('.shanchu').click(function(){
        var cid = $(this).attr('cid');
        $.ajax({
            type : 'post',
            dataType : 'json',
            data : {'cid':cid},
            url : "{:U('Order/del')}",
            success:function(data){
                location.reload();
            }
        })
    });


        $('.quan').click(function(){
            var ids = $("input:checkbox[name='message']:checked").map(function(index,elem) {
                return $(elem).val();
            }).get().join(','); 
            $.ajax({
                type : 'post',
                dataType : 'json',
                data : {'cid':ids},
                url : "{:U('Order/del')}",
                success:function(data){
                    location.reload();
            }
        });
    });

    $('.cheAll').click(function(){
        $('input[name="message"]').attr("checked",this.checked);
    })

    $('.jiesuan').click(function(){
        var ids = $("input:checkbox[name='message']:checked").map(function(index,elem) {
            return $(elem).val();
        }).get().join(','); 
        if(ids == ""){
            alert("请勾选需结算商品");
            return;
        }
        $.ajax({
            type : 'post',
            dataType : 'json',
            data : {'cid':ids},
            url : "{:U('Order/payment')}",
            success:function(data){
                if(data){
                    // alert(data);
                    window.location.href="address?id="+data;
                }else{
                    alert("请选择全部准入或非准入商品");
                }
            }
        })
    }); 
    

    $('.jia').click(function(){
        var shu = $(this).parents().find('.shuliang').val();
        var shu = (shu * 1 + 1);
        $(this).parent().parent().find('.shuliang').val(shu);
        var jiages = $(this).parent().parent().parent().find('.jiage').text();
        var jiage = (jiages*shu).toFixed(2);
        var zongji = $(this).parents('.dingji').find('.zongji').text();
        var zongji = ((jiages*1)+(zongji*1));
        var zonghe = $('#zonghe').text();
        var zonghes = ((jiages*1)+(zonghe*1));
        $(this).parents('.dingji').find('.zongji').text(zongji);
        $(this).parent().parent().parent().find('.jieguo').text(jiage);
        var cid = $(this).attr('cid');
        $.ajax({
            type : 'post',
            dataType : 'json',
            data : {'cart_id':cid,'subtotal':jiage,'goods_num':shu},
            url : "{:U('Order/set_price')}",
        }); 
        var amount  = 0;
            var list=$('.cart_goods_a1 .one .two .jiage');

            for(var i=0;i<list.length;i++){
                if ($(list[i]).parents('.cart_goods_a1').find('.one').find('.ls').find('.cke').is(':checked')) {
                    amount+=Number($(list[i]).text())*Number($(list[i]).parents('.cart_goods_a1').find('.shuliang').val());
                }
                //alert(Number($(list[i]).text()))
                console.log(Number($(list[i]).parents('li').find('.zonghe span').text()))
                // alert(amount);
            }
                console.log('+1');
            // alert(amount);
            $('#zonghe').text(amount);  

    });


    $('.jian').click(function(){
        var shu = $(this).parents().find('.shuliang').val();
        if(shu >1){
            var shu = (shu * 1 - 1);
            $(this).parent().parent().find('.shuliang').val(shu);
        }
        var jiages = $(this).parent().parent().parent().find('.jiage').text();
        var jiage = (jiages*shu).toFixed(2);
        var zongji = $(this).parents('.dingji').find('.zongji').text();
        var zongji = ((zongji*1)-(jiages*1));
        var zonghe = $('#zonghe').text();
        var zonghes = ((zonghe*1)-(jiages*1));
        $(this).parents('.dingji').find('.zongji').text(zongji);
        $(this).parent().parent().parent().find('.jieguo').text(jiage);
        var cid = $(this).attr('cid');
        $.ajax({
            type : 'post',
            dataType : 'json',
            data : {'cart_id':cid,'subtotal':jiage,'goods_num':shu},
            url : "{:U('Order/set_price')}",
        });
            var amount  = 0;
            var list=$('.cart_goods_a1 .one .two .jiage');

            for(var i=0;i<list.length;i++){
                if ($(list[i]).parents('.cart_goods_a1').find('.one').find('.ls').find('.cke').is(':checked')) {
                    amount+=Number($(list[i]).text())*Number($(list[i]).parents('.cart_goods_a1').find('.shuliang').val());
                }
                //alert(Number($(list[i]).text()))
                console.log(Number($(list[i]).parents('li').find('.zonghe span').text()))
                // alert(amount);
            }
                console.log('+1');
            // alert(amount);
            $('#zonghe').text(amount);
        
    });




</script>
</html>
<style>
    .zhanting {
        width:180px;
        padding-right:10px;
    }
    .bfb {
        color: red;
        margin-left: 36px;
        margin-top:-108px;
        float:left;
        position: absolute;
        font-size: 14px;
    }
</style>