/**
 * Created by wwkil on 2017/6/8.
 */
/**准入及非准入订单页面使用的JS文件*/
var url = $('div.right_content').attr('url');


/*筛选状态改变触发的事件*/
$('select[name="sup"],select[name="project"],select[name="paid"],select[name="ord"],#wrong_start,#wrong_end').change(function () {
    updateOrder();
});

/*搜索框*/
$('.search').click(function () {
    updateOrder();
});

function updateOrder(){
    var kw = $('input.sou_inp').val(),
        sup = $('select[name="sup"]').val(),
        pro = $('select[name="project"]').val(),
        paid = $('select[name="paid"]').val(),
        ord = $('select[name="ord"]').val(),
        start = $('#wrong_start').val(),
        end = $('#wrong_end').val(),
        cond = {kw: kw,sup: sup,pro: pro,paid: paid,ord: ord,start: start,end: end};
    $.ajax({
        url : url+'/getOrder.html'
        ,type: 'POST'
        ,dataType: 'JSON'
        ,cache: false
        ,async: true
        ,data: cond
        ,success: function(result){
            createNode(result.data);
            showpage(result.count,cond);
        }
    });
}

/*页面载入完成遍历页码*/
$(function () {
    var cond = {};
    var count = $('#pagination').val();
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
                        url: url+'/getOrders.html'
                        ,type: 'POST'
                        ,dataType: 'JSON'
                        ,async: true
                        ,cache: false
                        ,data: data
                        ,success: function(result){
                            createNode(result.dataList);
                        }
                    });
                }
            }
        });
    });
}

function createNode(dataList){
    var len = dataList.length;
    var box = $('ul.wr_list');
    box.children().remove();
    if(len == 0){
        box.append('<li class="wr_list"><div style="font-size: 18px;magin:0 auto;text-align: center;">暂无采购订单</div></li>');
    }else{
        $.each(dataList,function(index,value){
            var goods = '',
                logistics = '',
                top     = '',
                pre     = value.sum*value.prepercent/100,
                rat     = value.sum*value.ratpercent/100,
                insp    = value.sum*value.insppercent/100,
                warr    = value.sum*value.warrpercent/100,
                table   = '',
                button  = '';
            for(var $i = 0; $i <= 4; $i++){
                table += '<tr>';
                switch($i){
                    case 0:
                        table += '<td><i></i>预付款</td><td class="">￥'+pre+'</td>';
                        if(value.ps == 0) {
                            table += '<td class=""><button class="fs-14 col-fff bg-slv btn-60x30 bor-r5 pay_button" type="button">付款</button></td><td></td>';
                        }else if(value.ps > 0){
                            if(value.pre != 0) var _time = value.pre;
                            table += '<td class="">已付款</td><td>'+_time+'</td>';
                        }
                        break;
                    case 1:
                        table += '<td><i></i>发货款</td><td class="">￥'+rat+'</td>';
                        if(value.ps == 1) {
                            table += '<td class=""><button class="fs-14 col-fff bg-slv btn-60x30 bor-r5 pay_button" type="button">付款</button></td><td></td>';
                        }else if(value.ps > 1){
                            if(value.sent != 0) var _time = value.sent;
                            table += '<td class="">已付款</td><td>'+_time+'</td>';
                        }
                        break;
                    case 2:
                        table += '<td><i></i>验收款</td><td class="">￥'+insp+'</td>';
                        if(value.ps == 2) {
                            table += '<td class=""><button class="fs-14 col-fff bg-slv btn-60x30 bor-r5 pay_button" type="button">付款</button></td><td></td>';
                        }else if(value.ps > 2){
                            if(value.inspection != 0) var _time = value.inspection;
                            table += '<td class="">已付款</td><td>'+_time+'</td>';
                        }
                        break;
                    case 3:
                        table += '<td><i></i>质保金</td><td class="">￥'+warr+'</td>';
                        if(value.ps == 3) {
                            table += '<td class=""><button class="fs-14 col-fff bg-slv btn-60x30 bor-r5 pay_button" type="button">付款</button></td><td></td>';
                        }else if(value.ps > 3){
                            if(value.end != 0) var _time = value.end;
                            table += '<td class="">已付款</td><td>'+_time+'</td>';
                        }
                        break;
                }
                table += '</tr>';
            }
            $.each(value.goods,function(ind,val){
                goods += '<div class="xq_lump_li clearfix"> <li class="wr_img"><img src="/Uploads/'+val.goods_thumb+'" alt=""></li><li class="wr_info"><p>'+val.goods_name+'</p><p class="mgt10">'+val.goods_code+'</p><p class="col-999 mgt10">';
                $.each(val.standard,function(i,v){
                    goods += '<span>'+v+'</span>&nbsp;';
                });
                goods += '</p></li><li class="wr_price"><p class="text-del col-999">￥'+val.goods_preprice+'</p><p class=" mgt10">￥'+val.goods_price+'</p></li><li class="wr_num">'+val.goods_count+'</li></div>';
            });
            if(value.status > 4){
                logistics += '<span class="cur-p chakan_wlxq mgb20">查看物流</span> <div class="commodity_information wuliuxqtankuang sanjiao_right_lan"><ul><li><div class="lo_tit clearfix"><span class="col-666 fs-16">物流</span></div><ul class="logistics_list"><li class="active"><i></i><span class="date">2017-03-20 12：23：34</span>已签收 感谢您对900库的支持</li><li><i></i><span class="date">2017-03-20 12：23：34</span>北京转运中心】派件人: 肖敏 派件中 派件员电话13082581920</li><li><i></i><span class="date">2017-03-20 12：23：34</span>北京转运中心】 已收入</li><li><i></i><span class="date">2017-03-20 12：23：34</span>河北省廊坊市公司】 已发出 下一站 【北京转运中心】</li><li><i></i><span class="date">2017-03-20 12：23：34</span>河北省廊坊市公司】 已打包</li><li><i></i><span class="date">2017-03-20 12：23：34</span>河北省廊坊市市区四部公司】 已收件</li><li><i></i><span class="date">2017-03-20 12：23：34</span>河北省廊坊市市区四部公司】 取件人: 霍清 已收件</li></ul></li></ul></div>';
                top = 'top_-127';
            }
            $.each(value.button,function (ind,val) {
                if(val.url.length > 0) var url = val.url;
                button += '<p><'+val[1]+' class="'+val[0]+'" url="'+url+'">'+val[2]+'</'+val[1]+'></p>';
            });
            box.append('<li class="wr_lump"><div class="wr_tit clearfix bg-f5 pd10"><div class="fl"> <span class="font-weight600 mgl10">'+value.created+'</span><span class="font-weight400 mgl20 mgr35">订单号:'+value.order_code+'</span> <span class="mgl35 pdl35 col-clv">供应商:'+value.ex_name+'</span> </div> <div class="fr"> <span class="fw600 mgl10 col-red">总额:￥'+value.total+'</span> <span class="fw600 mgl10 col-red">已付:￥'+value.paid_amount+'</span></div></div><ul class="wr_con clearfix"><div class="xq_lump_list fl">'+goods+'</div><li class="wr_pay">'+value.paid_stat+'</li><li class="wr_this"><p>'+value.ord_stat+'</p><div class=" mgt20 por">'+logistics+'<span class="col-lan cur-p chakan_fkxq">订单详情</span><div class="dingdantankuang sanjiao_right_lan '+top+'"><div class="clearfix dingdanjine"><p class="fl">订单金额：<span class="col-red">￥'+value.total+'</span></p><p class="fl mgl35">已付金额：￥'+value.paid_amount+'</p></div><table><tr><th>付款阶段</th><th>付款金额</th><th>付款状态</th><th>付款时间</th></tr>'+table+'</table></div></div></li><li class="wr_deal"><p class="fw600 col-juse fs-18">'+value.pay+'元</p><p class="col-999 mgt20">'+value.explain+'</p></li><li class="wr_operation">'+button+'</li></ul><div class="foot clearfix"><ul class="flow flow_jiaxing fl"><li>商品下单</li><li>支付预付款</li><li>待发货</li><li>支付发货款</li><li>等待收货</li><li>验收付款</li><li>付质保金</li><li>订单完成</li></ul></div></li>');
        });
    }
}