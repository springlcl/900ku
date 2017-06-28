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
    <div class="confirm_receipt_mask" ></div>
    <header class="shopping_index_head">
        <div class="shopping_head_top">
            <div class="shopping_nav">
                <div class="shopping_left">
                    <a href="{:U('Home/index')}"><span>Hi，欢迎来900库</span></a>
          <!--           <a href="">请登录</a> -->
                </div>
                <div class="shopping_right">
                    <a href="{:U('Order/purchase_list')}"><span >采购清单<a>{$num|default="0"}</a>件</span></a>
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
                    <!-- <span><a style="color:#A998BA" href="../backstage_page/admit_management.html">管理后台</a> -->
                       
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

    <div class="confirm_receipt_content0">
        <div class="confirm_receipt_content">
            <img src="__HOME_CG_PUBLIC__/images/liucheng-2.png" alt="">
            <div class="confirm_receipt_all">
                <div>快递派送</div>
            </div>
            <div class="confirm_receipt_goods">
                <ul>
                    <li>
                        选择收货地址
                    </li>
                </ul>
            </div>
           <form method="post" action="index">
            <volist id='arr' name='arr'>
            <div class="confirm_receipt_goods_a1">
                <ul class="shou">
                    <li>
                        <input type="radio" class="dan" name="danxuan" value="{$arr.rec_id}">
                    </li>
                    <li class="dizhi">{$arr.region}{$arr.receive_addr}</li>
                    <li class="xingming">{$arr.receive_name}</li>
                    <li class="shouji">{$arr.receive_call}</li>
                    <li class="confirm_hidden_block xiugai" rcid="{$arr.rec_id}">修改</li>
                    <li class="shanchu">删除</li>
                </ul>
            </div>
            </volist>

             <div class="confirm_receipt_goods_a">
                <ul>
                    <li>
                        <div class="confirm_receipt_goods_quan2">
                            <div class="confirm_receipt_goods_xin2"></div>
                        </div>
                    </li>
                    <li class="confirm_hidden_block xinzeng">使用新地址</li>
                </ul>
            </div>

            <div class="confirm_receipt_goods_b">
                <ul>
                    <li>
                        确认商品信息
                    </li>
                </ul>
            </div>
            
            <div class="cart_goods">
                <ul>
                    <li>
                        <div>商品信息</div>
                    </li>
                    
                    <li>型号</li>
                    <li>单价</li>
                    <li>数量</li>
                    <li>小计</li>
                </ul>
            </div>
            <volist id="data" name="data">
            <div class="cart_goods_a">
                <ul>
                    <li>
                       
                        <div class="zhanting">供应商名称：{$data.ex_name}</div>
                    </li>
                    <li>
                        <div class="xiangmu">{$data.pro_name}</div>
                    </li>
                </ul>
            </div>
            <volist name="data['shangpin']" id="str">
            <div class="cart_goods_a1">
               <ul >
                    <li>
                        
                        <img src="{$str.thumb}" alt="" class="mgl10">
                        <div class="mgt20">{$str.goods_name}</div>
                    </li>
                    <li class="guige">
                        <p class="mgt20"><?php $i = explode(",",$str['sku']); echo $i[0] ?></p>
                        <p><?php $i = explode(",",$str['sku']); echo $i[1] ?></p>
                    </li>
                    <li class="danjia">￥<span>{$str.goods_price}</span></li>
                    <li>    
                        <div id="cart_num1"><span>{$str.goods_num}</span></div>
                        
                    </li>
                    <li>￥<span>{$str.subtotal}</span></li>
                </ul>
            </div>
            </volist>
            </volist>
            <textarea name="remark" class="bor_1ddd bg-fff pd10" style="width: 98%" onfocus="if(value=='备注...'){value=''}" onblur="if (value ==''){value='备注...'}">备注...</textarea>
            <input type="hidden" name="add" value="{$a}">
            <div class="confirm_receipt_goods_b1_qx">
                <ul>
                    <li>实付款：</li>
                    <li>￥{$strs}</li>
                    <li>本次需付￥{$strs}</li>
                    <li class="queren"><button>确认收货信息</button></li>
                </ul>
            </div>
        </form>
            <div class="confirm_receipt_hidden">
                <div class="confirm_receipt_hidden_left">
                    <ul>
                        <li>
                            <div>*</div>
                            <div>所在地：</div>
                            <br>
                        </li>
                        <li>
                            <div>*</div>
                            <div>所在街道：</div>
                            <br>
                        </li>
                        <li>
                            <div>*</div>
                            <div>收件人：</div>
                            <br>
                        </li>
                        <li>
                            <div>*</div>
                            <div>联系电话：</div>
                            <br>
                        </li>
                    </ul>
                </div>
                <div class="confirm_receipt_hidden_right">
                    <ul>
                        <li>
                            <div data-toggle="distpicker" id="city">
                                <select class="prov" name="province"> 
                                <select>
                                <select class="city" name="city" disabled="disabled">
                                <select>
                                <select class="dist" name="area" disabled="disabled">
                                <select>
                            </div>
                        </li>
                        
                        <li><input type="text" class="addr"></li>
                        <li><input type="text" class="name"></li>
                        <li><input type="text" class="call"></li>
                        <li>
                            <div class="confirm_receipt_none1 tijiao">确认提交</div>
                            <div class="confirm_receipt_none1">取消</div>
                        </li>
                        <input type="hidden" id="code"  />
                    </ul>
                </div>

            </div>
        </div>
    </div>

<!-- 底部=================================== -->
    <include file="Public/Foot" />
</body>
<script type="text/javascript" src="__HOME_CG_PUBLIC__/js/jquery.min.js"></script>
<script type="text/javascript" src="__HOME_CG_PUBLIC__/js/js.js"></script>
<script type="text/javascript" src="__HOME_CG_PUBLIC__/js/jquery.cityselect.js"></script>
<script type="text/javascript" src="__HOME_CG_PUBLIC__/js/city.min.js"></script>
<script type="text/javascript" src="__HOME_CG_PUBLIC__/js/jquery.citys.js"></script>
<script>
//新增地址
// $('#tijiao').click(function(){
//     var p = $('.prov').val();
//     var c = $('.city').val();
//     var d = $('.dist').val();
//     var n = $('.name').val();
//     var t = $('.call').val();
//     var a = $('.addr').val();
//     $.ajax({
//         type : 'post',
//         dataType : 'json',
//         data : {'province':p,'city':c,'area':d,'receive_name':n,'receive_call':t,'receive_addr':a},
//         url : "{:U('Order/set_address')}",
//         success:function(data){
//             location.reload();
//         }
//     });
// });


//修改收货地址写入数据库
$('.tijiao').click(function(){
    var p = $('.prov').val();
    var c = $('.city').val();
    var d = $('.dist').val();
    var n = $('.name').val();
    var t = $('.call').val();
    var a = $('.addr').val();
    var id = $('#code').val();
    $.ajax({
        type : 'post',
        dataType : 'json',
        data : {'province':p,'city':c,'area':d,'receive_name':n,'receive_call':t,'receive_addr':a,'rec_id':id},
        url : "{:U('Order/set_address')}",
        success:function(data){
            location.reload();
        }
    });
});

//删除地址
$('.shanchu').click(function(){
    var rid = $(this).parent().find('.dan').val();
    $.ajax({
        type : 'post',
        dataType : 'json',
        data : {'rec_id':rid},
        url : "{:U('Order/del_address')}",
        success:function(data){
            location.reload();
        }
    })

});

$('.xinzeng').click(function(){
    $('.confirm_receipt_hidden_right ul li input').val("");
    // $('.confirm_receipt_hidden_right ul li div select .province').val("");
    // $('.prov').val("");
});

// $('button').click(function(){
//     var cid = $('input[name="danxuan"]:checked ').val();
//     if(cid == ""){
//         alert("请选择收货地址");
//     }
// });



//修改收货地址
$('.xiugai').click(function(){
    var id = $(this).attr('rcid');
    $.ajax({
        type : 'post',
        dataType : 'json',
        data : {'rec_id':id},
        url : "{:U('Order/edit')}",
        success:function(data){
            $('.addr').val(data.receive_addr);
            $('.name').val(data.receive_name);
            $('.call').val(data.receive_call);
            $('#city').citys({code:data.receive_area});
            $('#code').val(data.rec_id);   
        }
    })
})

    
$('.confirm_hidden_block').click(function(){
    $('.confirm_receipt_hidden').css('display','block');
    $('.confirm_receipt_mask').css('display','block');
})

$('.confirm_receipt_none1').click(function(){
    $('.confirm_receipt_hidden').css('display','none');
    $('.confirm_receipt_mask').css('display','none');
})

$('.confirm_receipt_none2').click(function(){
    $('.confirm_receipt_hidden').css('display','none');
    $('.confirm_receipt_mask').css('display','none');
})


$("#city").citySelect();

$("#city").citySelect({
    url:"__HOME_CG_PUBLIC__/js/city.min.js",
    prov:"北京",//省份?
    city:"",//城市?
    dist:"东城区",//区县?
    nodata:"none"//当子集无数据时，隐藏select?
});

</script>
</html>
<style>
    #cart_num1 span {
        margin-left:8px;
        margin-top:10px;
    }
    .dan {
        margin-top:-85px;
    }
    .shou {
        margin-left:30px;
    }
    .dizhi {
        width:200px;
    }
    .xingming {
        width:50px;
    }
    .shouji {
        width:15px;
    }
    .xiangmu {
        width:100px;
    }
    .zhanting {
        width:300px;
    }
    .danjia {
        width:55px;
    }
    .guige {
        width:70px;
    }
    .queren {
        width:200px;
        text-align: center;
        background: #00a199 none repeat scroll 0 0;
        margin-left:131px;
    }
    button {
        font-size: 16px;
        color: #fff;

    }
 
</style>