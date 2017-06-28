<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8"><meta http-equiv="keywords" content="keyword1,keyword2,keyword3">
      <meta http-equiv="description" content="this is my page">
	<title>准入订单</title>
    <link rel="stylesheet" href="__SUP_PUBLIC__/css/style.css">
    <link rel="stylesheet" href="__PUBLIC__/plugins/layui/css/layui.css">
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries--><!--[if lt IE 9]><script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script><script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
    <style>

    </style>
</head>
<body>
<!-- 左导一 -->
  <include file='Public/firstSidebar' />
<!-- 左导二 -->
  <include file='left' />
<!-- 右侧 内容-->
<div class="clearfix container min-w" id="app-container" url="{$url}">
    <div class="cont_lump  cont_lump_sell_wrongOrder">
        <div class="cont_title">
            <span>准入订单</span>
        </div>
        <form action="">
            <ul class="wrong_order_form clearfix">
                <li class="sou">
                    <input type="text" name="search" placeholder="订单号/商品名称">
                    <button type="button"><i class="ico_all">&nbsp;</i></button>
                </li>
                <li>
                    <label class="text" >业务员:</label>
                    <select name="clerk" id="">
                        <volist name="clerk" id="c">
                        <option value="{$c.uid}">{$c.username}</option>
                        </volist>
                    </select>
                </li>
                <li>
                    <label class="text" >生成时间:</label>
                    <input class="laydate-icon" id="wrong_start" placeholder="请选择时间范围起始">
                    <span>至</span>
                    <input class="laydate-icon" id="wrong_end" placeholder="请选择时间范围结束">
                </li>
                <li>
                    <label class="text" >商品:</label>
                    <select name="goods" id="">
                        <volist name="goods" id="g">
                        <option value="{$g.goods_id}">{$g.goods_name}</option>
                        </volist>
                    </select>
                </li>
                <li>
                    <label class="text" >付款状态:</label>
                    <select name="paid" id="">
                        <option value="0,1,2,3,4" selected="selected">全部状态</option>
                        <option value="0">待付预付款</option>
                        <option value="1">预付款已付</option>
                        <option value="2">发货款已付</option>
                        <option value="3">验收款已付</option>
                        <option value="4">质保金已付</option>
                    </select>
                </li>
                <li>
                    <label class="text" >交易状态:</label>
                    <select name="deal" id="">
                        <option value="0,1,2,3,4,5,6,7" selected="selected">全部状态</option>
                        <option value="0">已下单</option>
                        <option value="1">支付预付款</option>
                        <option value="2">商品出库</option>
                        <option value="3">支付发货款</option>
                        <option value="4">供应商发货</option>
                        <option value="5">支付验收款</option>
                        <option value="6">支付质保金</option>
                        <option value="7">订单完成</option>
                    </select>
                </li>
                <li>
                    <label class="text" >采购商:</label>
                    <select name="pur" id="">
                        <volist name="pur" id="p">
                        <option value="{$p.uid}">{$p.username}</option>
                        </volist>
                    </select>
                </li>
                <li>
                    <span class="date-quick-pick active">最近<span>7</span>天</span>
                    <span class="date-quick-pick">最近<span>30</span>天</span>
                </li>
                <li>
                    <a><span class="screen ui-btn bg-lan col-fff mgl15">筛选</span></a>
                </li>
            </ul>
        </form>
        <div class="order_print clearfix">
            <ul class="fl">
                <!-- <li><input class="print_all" type="checkbox"></li>
                <li class="pri_1"><i class="ico_all "></i>订单打印</li>
                <li class="pri_2"><i class="ico_all "></i>订单打印样式</li> -->
            </ul>
            <ul class="fr">
<!--                 <li>
                    <select name="" id="">
                        <option value="1">导出全部订单</option>
                        <option value="1">导出当前已勾选出的订单</option>
                        <option value="1">导出全部订单</option>
                        <option value="1">导出全部待付款订单</option>
                        <option value="1">导出全部待发货订单</option>
                        <option value="1">导出全部已完成订单</option>
                        <option value="1">导出全部已发货订单</option>
                        <option value="1">导出全部已关闭订单</option>
                        <option value="1">导出全部退款中订单</option>
                    </select>
                </li>
                <li><button class="btn-lan-w70 bg-lan">导出订单</button></li>
 -->            </ul>
        </div>
        <div class="con">
            <ul class="wr_nav bg-fb clearfix">
                <li class="wr_img">&nbsp;</li>
                <li class="wr_info">商品信息</li>
                <li class="wr_price">价格</li>
                <li class="wr_num">数量</li>
                <li class="wr_pay">付款状态</li>
                <li class="wr_this">本次需支付</li>
                <li class="wr_deal">交易状态</li>
                <li class="wr_operation">交易操作</li>
            </ul>
            <ul class="wr_list">
            <volist name="orders" id="ords">
                <li class="wr_lump" order="{$ords.id}">
                    <div class="wr_tit clearfix bg-f5 pd10">
                        <div class="fl">
                            <input type="checkbox">
                            <span class="font-weight600 mgl10">{$ords.start}</span>
                            <span class="font-weight400 mgl20">订单号:{$ords.code}</span>
                            <span class="mgl20">{$ords.exhibition}</span>
                        </div>
                        <div class="fr mgr10">
                            <div class="remarks dis_inb"><span class="col-lan">备注</span><span>-</span></div>
                            <div class="xingx dis_inb col-f60"><i></i>x<span>5</span></div>
                        </div>
                    </div>
                    <ul class="wr_con clearfix" style="position: relative;">
                        <div class="xz_goods" style="width: 51%;">
                            <volist name="ords.goods" id="g">
                            <div class="xz_goods_li clearfix">
                                <li class="wr_img"><img src="__UPLOADS__/{$g.gthumb}" alt=""></li>
                                <li class="wr_info" style="width: 38%;margin-left: 2%;">
                                    <p>{$g.gname}</p>
                                    <p class="mgt10">{$g.gcode}</p>
                                    <p class="col-999 mgt10"><volist name="g.standards" id="s"><span>{$s}</span></volist></p>
                                </li>
                                <li class="wr_price" style="width: 22%;">
                                    <p class="text-del col-999">￥{$g.gpreprice}</p>
                                    <p class="col-red mgt10">￥{$g.price}</p>
                                </li>
                                <li class="wr_num" style="width: 20%;">{$g.gcount}</li>
                            </div>
                            </volist>
                        </div>
                        <div style="position: absolute;width: 49%;right: 0;top: 20px;">
                            <li class="wr_operation" style="float: right;margin-right: 8%;width: 23%;">
                                <volist name="ords.button" id="b">
                                <{$b.1} class="{$b.0}">{$b.2}</{b.1}>
                                </volist>
                            </li>
                            <li class="wr_deal" style="float: right;width: 23%;">
                                <p>{$ords.dss}</p>
                                <a href="{:U('order_details',array('oid',$ords['id']))}"><p class=" mgt20">订单详情</p></a>
                            </li>
                            <li class="wr_this" style="float: right;width: 23%;">
                                <p>￥{$ords.should}</p>
                                <p class="col-999 mgt20">{$ords.explain}</p>
                            </li>
                            <li class="wr_pay col-lan" style="float: right;width: 23%;">{$ords.pss}</li>
                        </div>
                    </ul>
                    <div class="foot clearfix">
                        <ul class="flow flow_jiaxing fl status{$ords.state}">
                            <li>商品下单</li>
                            <li>支付预付款</li>
                            <li>商品出库</li>
                            <li>支付发货款</li>
                            <li>供应商发货</li>
                            <li>验收付款</li>
                            <li>付质保金</li>
                            <li>订单完成</li>
                        </ul>
                        <div class="zongjia fr font-size16 col-red3 font-weight600">
                            <div class="fl">总额: <span>￥{$ords.sum}</span></div>
                            <div class="fl mgl20">已付: <span>￥{$ords.paid}</span></div>
                        </div>
                    </div>
                </li>
                </volist>
            </ul>
        </div>
    </div>
    <div class="clearfix">
        <ul class="pagination" id="pagination" count="{$count}" cond='{$cond}'></ul>
        <div class="page_total fr" style="padding:33px 10px;">
            共有<b style="color:#c6ffc6">{$count}</b>张订单
        </div>
    </div>
    <!-- 底部 == 版权 -->
    <div class="cont_lump con-foot">版权所有：900库 [京ICP备1000000001号-1</div>
</div>

  <div class="protection">
    <div class="tanchu_box tanchu_box200 print_tab_box">
      <span class="gb close_btn"><i></i></span>
      <h3 class="tit">选择打印订单类型</h3>
      <div class="mgt20">
          <label for="gwqd" class="mgr35 pdl30"><input type="radio" checked="checked"  name="qingdan" id="gwqd" >购物清单</label>
          <label for="phd" class="mgl20"><input type="radio" name="qingdan" id="phd">配货单</label>
      </div>
      <div class="btn">
        <button class="btn-lan-80 mgw15">确定</button>
        <button class="btn-lan-80 mgw15 close_btn">取消</button>
      </div>
      <!-- <div class="prompt">温馨提示：采购商一旦准入则不能删除此商品！</div> -->
    </div>
  </div>
</body>
<script type="text/javascript" src="__PUBLIC__/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="__SUP_PUBLIC__/laydate/laydate.js"></script>
<script type="text/javascript" src="__PUBLIC__/plugins/layui/layui.js"></script>
<script type="text/javascript" src="__SUP_PUBLIC__/js/ind.js"></script>
<script type="text/javascript" src="__SUP_PUBLIC__/js/order.js"></script>
<script>
    var start = {
      elem: '#wrong_start',
      format: 'YYYY/MM/DD hh:mm:ss',
      min: '1900-01-01 00:00:00', //最小日期
      max: laydate.now(), //最大日期
      istime: true,
      istoday: false,
      choose: function(datas){
         end.min = datas; //开始日选好后，重置结束日的最小日期
         end.start = datas //将结束日的初始值设定为开始日
      }
    };
    var end = {
      elem: '#wrong_end',
      format: 'YYYY/MM/DD hh:mm:ss',
      min: '1900-01-01 00:00:00', //最小日期
      max: laydate.now(),
      istime: true,
      istoday: false,
      choose: function(datas){
        start.max = datas; //结束日选好后，重置开始日的最大日期
      }
    };
    laydate(start);
    laydate(end);



    var url = $('#app-container').attr('url');


    $(document).on('click','.cancel_order_btn',function () {
        var id = $(this).parents('li.wr_lump').attr('order');
        layui.use(['laypage', 'layer'], function(){
            var laypage = layui.laypage
                ,layer = layui.layer;
            layer.confirm('确定取消该订单', {icon: 3, title:'请确认'}, function(index){
                $.ajax({
                    url: url+'/cancelOrder.html',
                    type: 'POST',
                    dataType: 'JSON',
                    data: {id: id},
                    success: function(result){
                        layer.msg(result.msg);
                        if(result.stat){
                            updateOrder();
                        }
                    }
                });
                layer.close(index);
            });
        });
    });

    $(document).on('click','.datil_button',function () {
        var id = $(this).parents('li.wr_lump').attr('order');
        location.href = url+'.order_details/oid/'+id+'.html';
    });


    $(document).on('click','.do_btn',function () {
        var id = $(this).parents('li.wr_lump').attr('order');
        var con = $(this).html();
        layui.use(['laypage', 'layer'], function(){
            var laypage = layui.laypage
                ,layer = layui.layer;
            layer.confirm(con, {icon: 3, title:'请确认'}, function(index){
                $.ajax({
                    url: url+'/supDo.html',
                    type: 'POST',
                    dataType: 'JSON',
                    data: {id: id},
                    success: function(result){
                        layer.msg(result.msg);
                        if(result.stat){
                            updateOrder();
                        }
                    }
                });
                layer.close(index);
            });
        });
    });


    /*筛选状态改变触发事件*/
    $('input[name="search"],select[name="clerk"],#wrong_start,#wrong_end,select[name="goods"],select[name="paid"],select[name="pur"]').change(function () {
        updateOrder();
    });
    /*快捷选取按钮点击*/
    $('.date-quick-pick').click(function () {
        $('.date-quick-pick').removeClass('active');
        $(this).addClass('active');
        updateOrder();
    });

    /*筛选按钮*/
    $('span.screen').click(function () {
        updateOrder();
    });


    /*更新订单*/
    function updateOrder(){
        var kw = $('input[name="search"]').val(),
            clerk = $('select[name="clerk"]').val(),
            start = $('#wrong_start').val(),
            end = $('#wrong_end').val(),
            goods = $('select[name="goods"]').val(),
            paid = $('select[name="paid"]').val(),
            ord = $('select[name="deal"]').val(),
            pur = $('select[name="pur"]').val(),
            before = $('.date-quick-pick.active span').html();
        cond = {kw: kw,clerk: clerk,start: start,end: end,goods: goods,paid: paid,ord: ord,pur: pur,before: before};
        $.ajax({
            url : url+'/getOrder.html'
            ,type: 'POST'
            ,dataType: 'JSON'
            ,cache: false
            ,async: true
            ,data: cond
            ,success: function(result){
                $('.page_total b').html(result.count);
                createNode(result.data);
                showpage(result.count,cond);
            }
        });
    }

    /*页面载入完成遍历页码*/
    $(function () {
        var cond = $('#pagination').attr('cond');
        var obj = JSON.parse(cond);
        var count = $('#pagination').attr('count');
        showpage(count,obj);
    });

    /*分页*/
    function showpage(pages,data){
        var page = Math.ceil(pages/1);
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
                            url: url+'/getOrder.html'
                            ,type: 'POST'
                            ,dataType: 'JSON'
                            ,async: true
                            ,cache: false
                            ,data: data
                            ,success: function(result){
                                createNode(result.data);
                            }
                        });
                    }
                }
            });
        });
    }

    /*构建订单节点*/
    function createNode(dataList) {
        var len = dataList.length;
        var box = $('ul.wr_list');
            box.children().remove();
        if(len == 0){
            box.append('<li class="wr_list"><div style="font-size: 18px;magin:0 auto;text-align: center;">暂无采购订单</div></li>');
        }else {
            $.each(dataList,function(index,value){
//                var goods = '',
//                    logistics = '',
//                    top     = '',
//                    pre     = value.sum*value.prepercent/100,
//                    rat     = value.sum*value.ratpercent/100,
//                    insp    = value.sum*value.insppercent/100,
//                    warr    = value.sum*value.warrpercent/100,
//                    table   = '',
//                    button  = '';

                var order = '<li class="wr_lump" order="'+value.id+'"><div class="wr_tit clearfix bg-f5 pd10"><div class="fl"><input type="checkbox"><span class="font-weight600 mgl10">{$ords.start}</span><span class="font-weight400 mgl20">订单号:'+value.code+'</span><span class="mgl20">'+value.exhibition+'</span></div><div class="fr mgr10"><div class="remarks dis_inb"><span class="col-lan">备注</span><span>-</span></div><div class="xingx dis_inb col-f60"><i></i>x<span>5</span></div></div></div><ul class="wr_con clearfix" style="position: relative;"><div class="xz_goods" style="width: 51%;">';
                $.each(value.goods,function(ind,val){
                    order += '<div class="xz_goods_li clearfix"><li class="wr_img"><img src="/Uploads/'+val.gthumb+'" alt=""></li><li class="wr_info" style="width: 38%;margin-left: 2%;"><p>'+val.gname+'</p><p class="mgt10">'+val.gcode+'</p><p class="col-999 mgt10">';
                    $.each(val.standards,function(i,v){
                        order += '<span>'+v+'</span>';
                    });
                    order +='</p></li><li class="wr_price" style="width: 22%;"><p class="text-del col-999">￥'+val.gpreprice+'</p><p class="col-red mgt10">￥'+val.price+'</p></li><li class="wr_num" style="width: 20%;">'+val.gcount+'</li></div>';
                });
                order += '</div><div style="position: absolute;width: 49%;right: 0;top: 20px;"><li class="wr_operation" style="float: right;margin-right: 8%;width: 23%;">';
                $.each(value.button, function(i,v){
                    order += '<'+v[1]+' class="'+v[0]+'">'+v[2]+'</'+v[1]+'>';
                });
                    order += '</li><li class="wr_deal" style="float: right;width: 23%;"><p>'+value.dss+'</p><a href="'+url+'/order_details/oid/'+value.id+'"><p class=" mgt20">订单详情</p></a></li><li class="wr_this" style="float: right;width: 23%;"><p>￥'+value.should+'</p><p class="col-999 mgt20">'+value.explain+'</p></li><li class="wr_pay col-lan" style="float: right;width: 23%;">'+value.pss+'</li></div></ul><div class="foot clearfix"><ul class="flow flow_jiaxing fl status'+value.state+'"><li>商品下单</li><li>支付预付款</li><li>商品出库</li><li>支付发货款</li><li>供应商发货</li><li>验收付款</li><li>付质保金</li><li>订单完成</li></ul><div class="zongjia fr font-size16 col-red3 font-weight600"><div class="fl">总额: <span>￥'+value.sum+'</span></div><div class="fl mgl20">已付: <span>￥'+value.paid+'</span></div></div></div></li>';
                box.append(order);
            });
        }
    }

</script>
</html>