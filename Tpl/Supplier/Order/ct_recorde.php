<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8"><meta http-equiv="keywords" content="keyword1,keyword2,keyword3">
      <meta http-equiv="description" content="this is my page">
	<title>收款记录</title>
    <link rel="stylesheet" href="__SUP_PUBLIC__/css/style.css">
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries--><!--[if lt IE 9]><script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script><script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<body>
<!-- 左导一 -->
  <include file='Public/firstSidebar' />
<!-- 左导二 -->
  <include file='left' />
<!-- 右侧 内容-->
<div class="clearfix container min-w" id="app-container">
    <div class="cont_lump  cont_lump_sell_wrongOrder cont_lump_gathering">
        <div class="cont_title">
            <span>收款记录</span> 
        </div>
        <form action="">
            <ul class="wrong_order_form clearfix">
                <div class="clearfix">
                    <li>
                        <div class="font-size14 mgr35">已收金额: <span class="font-size16 col-red3 font-weight600">￥4000.00</span></div>
                    </li>
                </div>
                <li class="sou">
                    <input type="text" placeholder="订单号/商品名称/商品编号">
                    <button><i class="ico_all">&nbsp;</i></button>
                </li>
                <li>
                    <label class="text" >付款状态:</label>
                    <select name="" id="">
                        <option value="">已付款</option>
                        <option value="">未付款</option>
                    </select>
                </li>
                <li>
                    <label class="text" >下单时间:</label>
                    <input class="laydate-icon" id="wrong_start" >
                    <span>至</span>
                    <input class="laydate-icon" id="wrong_end" >
                </li>
                <li>
                    <label class="text" >采购商:</label>
                    <select name="" id="">
                        <option value="">采购商1</option>
                        <option value="">采购商2</option>
                        <option value="">采购商3</option>
                    </select>
                </li>
                <li>
                    <a><span class="screen ui-btn bg-lan col-fff mgl15">筛选</span></a>
                </li>
            </ul>
        </form>
        <div class="con">
            <ul class="wr_nav bg-fb clearfix">
                <li class="wr_img">&nbsp;</li>
                <li class="wr_info">商品信息</li>
                <li class="wr_num">数量</li>
                <li class="wr_price">单价</li>
                <li class="wr_deal">订单金额</li>
                <li class="wr_this">本次应收</li>
                <li class="wr_pay">付款状态</li>
                <li class="wr_pay_mode">付款方式</li>
                <li class="wr_operation">交易操作</li>
            </ul>
            <ul class="wr_list">
                <li class="wr_lump">
                    <div class="wr_tit clearfix bg-f5 pd10">
                        <div class="fl">
                            <input type="checkbox">
                            <span class="font-weight600 mgl10">2017-01-01</span>
                            <span class="font-weight400 mgl20">订单号:2398338393953423</span>
                            <span class="mgl20">A采购商</span>
                        </div>
                        
                    </div>
                    <ul class="wr_con clearfix">
                        <li class="wr_img"><img src="__SUP_PUBLIC__/images/tianjia.png" alt=""></li>
                        <li class="wr_info">
                            <p>Bershka 女士 修身牛仔裤 </p>
                            <p class="mgt10">05003534480</p>
                            <p class="col-999 mgt10"><span>颜色:蓝色</span><span>尺码 XXL</span></p>
                        </li>
                        <li class="wr_num">2</li>
                        <li class="wr_price">
                            <p class="text-del col-999">￥189.00</p>
                            <p class="col-red mgt10">￥169.00</p>
                        </li>
                        <li class="wr_deal">
                            <p>￥22.00</p>
                            <p class="mgt20">已付款25元</p>
                        </li>
                        <li class="wr_this">
                            <p>￥22.00</p>
                            <p class="col-999 mgt20">(预付款25%)</p>
                        </li>
                        <li class="wr_pay ">
                            <p class="col-lan">待付款</p>
                            <p class=" mgt20 cur-p">订单详情</p>
                        </li>
                        <li class="wr_pay_mode ">
                            <p class=>银行转账</p>
                        </li>
                        <li class="wr_operation">
                            <button class="btn-hui-80 dis_inb">查看详情</button>
                        </li>
                    </ul>
                    <div class="foot clearfix">
                        <ul class="flow flow_jiaxing fl">
                            <li><span>付款成功</span><p class="mgt30"> 2017-03-24 12：34：13</p></li>
                            <li><span>银行处理中</span><p class="mgt30"> 2017-03-24 12：34：13</p></li>
                            <li><span>到账成功</span><p class="mgt30"> 2017-03-24 12：34：13</p></li>
                        </ul>
                    </div>
                    <ul class="details_list bg-fb">
                        <li><span>本次应收订单金额:</span><span>￥88.00</span></li>
                        <li><span>实收订单金额:</span><span>￥70.00</span></li>
                        <li><span>业务员收入:</span><span>￥4.00</span></li>
                        <li><span>平台服务费:</span><span>￥4.00</span></li>
                    </ul>
                </li>
                <li class="wr_lump">
                    <div class="wr_tit clearfix bg-f5 pd10">
                        <div class="fl">
                            <input type="checkbox">
                            <span class="font-weight600 mgl10">2017-01-01</span>
                            <span class="font-weight400 mgl20">订单号:2398338393953423</span>
                            <span class="mgl20">A采购商</span>
                        </div>
                        
                    </div>
                    <ul class="wr_con clearfix">
                        <li class="wr_img"><img src="__SUP_PUBLIC__/images/tianjia.png" alt=""></li>
                        <li class="wr_info">
                            <p>Bershka 女士 修身牛仔裤 </p>
                            <p class="mgt10">05003534480</p>
                            <p class="col-999 mgt10"><span>颜色:蓝色</span><span>尺码 XXL</span></p>
                        </li>
                        <li class="wr_num">2</li>
                        <li class="wr_price">
                            <p class="text-del col-999">￥189.00</p>
                            <p class="col-red mgt10">￥169.00</p>
                        </li>
                        <li class="wr_deal">
                            <p>￥22.00</p>
                            <p class="mgt20">已付款25元</p>
                        </li>
                        <li class="wr_this">
                            <p>￥22.00</p>
                            <p class="col-999 mgt20">(预付款25%)</p>
                        </li>
                        <li class="wr_pay ">
                            <p class="col-lan">待付款</p>
                            <p class=" mgt20 cur-p">订单详情</p>
                        </li>
                        <li class="wr_pay_mode ">
                            <p class=>银行转账</p>
                        </li>
                        <li class="wr_operation">
                            <button class="btn-hui-80 dis_inb">查看详情</button>
                        </li>
                    </ul>
                    <div class="foot clearfix">
                        <ul class="flow flow_jiaxing fl">
                            <li><span>付款成功</span><p class="mgt30"> 2017-03-24 12：34：13</p></li>
                            <li><span>银行处理中</span><p class="mgt30"> 2017-03-24 12：34：13</p></li>
                            <li><span>到账成功</span><p class="mgt30"> 2017-03-24 12：34：13</p></li>
                        </ul>
                    </div>
                    <ul class="details_list bg-fb">
                        <li><span>本次应收订单金额:</span><span>￥88.00</span></li>
                        <li><span>实收订单金额:</span><span>￥70.00</span></li>
                        <li><span>业务员收入:</span><span>￥4.00</span></li>
                        <li><span>平台服务费:</span><span>￥4.00</span></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <!-- 底部 == 版权 -->
    <div class="cont_lump con-foot">版权所有：900库 [京ICP备1000000001号-1</div>
</div>
</body>
<script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="__SUP_PUBLIC__/laydate/laydate.js"></script>
<script type="text/javascript" src="__SUP_PUBLIC__/js/ind.js"></script>
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
</script>
</html>