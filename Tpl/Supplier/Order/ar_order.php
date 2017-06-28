<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8"><meta http-equiv="keywords" content="keyword1,keyword2,keyword3">
      <meta http-equiv="description" content="this is my page">
	<title>加星订单</title>
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
    <div class="cont_lump  cont_lump_sell_wrongOrder">
        <div class="cont_title">
            <span>订单应收款</span> 
        </div>
        <form action="">
            <ul class="wrong_order_form clearfix">
                <div class="clearfix">
                    <li>
                        <div class="font-size14 mgr35">应收金额: <span class="font-size16 col-red3 font-weight600">￥5000.00</span></div>
                    </li>
                    <li>
                        <div class="font-size14 mgr35">已收金额: <span class="font-size16 col-red3 font-weight600">￥4000.00</span></div>
                    </li>
                    <li>
                        <div class="font-size14">待收金额: <span class="font-size16 col-red3 font-weight600">￥1000.00</span></div>
                    </li>
                </div>
                <li class="sou">
                    <input type="text" placeholder="订单号/商品名称/商品编号">
                    <button><i class="ico_all">&nbsp;</i></button>
                </li>
                <li>
                    <label class="text" >业务员:</label>
                    <select name="" id="">
                        <option value="">业务员1</option>
                        <option value="">业务员2</option>
                    </select>
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
                    <label class="text" >下单时间:</label>
                    <input class="laydate-icon" id="wrong_start" >
                    <span>至</span>
                    <input class="laydate-icon" id="wrong_end" >
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
                            <p class="col-lan">已下单</p>
                        </li>
                        <li class="wr_operation">
                            <button class="btn-lan-80 dis_inb">催款</button>
                            <p class=" mgt20 cur-p ckxq">订单详情</p>
                            <div class="dingdantankuang sanjiao_right_lan">
                                <div class="clearfix dingdanjine">
                                  <p class="fl">订单金额：<span class="col-red">￥1000.00</span></p>
                                  <p class="fl mgl35">已付金额：￥400.00</p>
                                </div>
                                <table>
                                  <tr>
                                    <th>付款阶段</th>
                                    <th>付款金额</th>
                                    <th>付款状态</th>
                                    <th>付款时间</th>
                                  </tr>
                                  <tr>
                                    <td><i></i>预付款</td>
                                    <td class="col-lv">￥8000.00</td>
                                    <td class="col-lv">已付款</td>
                                    <td>2016-03-23</td>
                                  </tr>
                                  <tr>
                                    <td><i></i>发货前</td>
                                    <td class="col-red">￥6000.00</td>
                                    <td class="col-lan">催付</td>
                                    <td>6天23小时21分</td>
                                  </tr>
                                  <tr>
                                    <td><i></i>验收合格</td>
                                    <td class="col-red">￥1000.00</td>
                                    <td></td>
                                    <td></td>
                                  </tr>
                                  <tr>
                                    <td><i></i>质保</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                  </tr>
                                </table>
                            </div>
                        </li>
                    </ul>
                    <div class="foot clearfix">
                        <ul class="flow flow_jiaxing fl">
                            <li>商品下单</li>
                            <li>支付预付款</li>
                            <li>商品出库</li>
                            <li>支付发货款</li>
                            <li>供应商发货</li>
                            <li>验收付款</li>
                            <li>付质保金</li>
                            <li>订单完成</li>
                        </ul>

                    </div>
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
                            <p class="col-lan">已下单</p>
                        </li>
                        <li class="wr_operation">
                            <button class="btn-lan-80 dis_inb">催款</button>
                            <p class=" mgt20 cur-p ckxq">订单详情</p>
                            <div class="dingdantankuang sanjiao_right_lan">
                                <div class="clearfix dingdanjine">
                                  <p class="fl">订单金额：<span class="col-red">￥1000.00</span></p>
                                  <p class="fl mgl35">已付金额：￥400.00</p>
                                </div>
                                <table>
                                  <tr>
                                    <th>付款阶段</th>
                                    <th>付款金额</th>
                                    <th>付款状态</th>
                                    <th>付款时间</th>
                                  </tr>
                                  <tr>
                                    <td><i></i>预付款</td>
                                    <td class="col-lv">￥8000.00</td>
                                    <td class="col-lv">已付款</td>
                                    <td>2016-03-23</td>
                                  </tr>
                                  <tr>
                                    <td><i></i>发货前</td>
                                    <td class="col-red">￥6000.00</td>
                                    <td class="col-lan">催付</td>
                                    <td>6天23小时21分</td>
                                  </tr>
                                  <tr>
                                    <td><i></i>验收合格</td>
                                    <td class="col-red">￥1000.00</td>
                                    <td></td>
                                    <td></td>
                                  </tr>
                                  <tr>
                                    <td><i></i>质保</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                  </tr>
                                </table>
                            </div>
                        </li>
                    </ul>
                    <div class="foot clearfix">
                        <ul class="flow flow_jiaxing fl">
                            <li>商品下单</li>
                            <li>支付预付款</li>
                            <li>商品出库</li>
                            <li>支付发货款</li>
                            <li>供应商发货</li>
                            <li>验收付款</li>
                            <li>付质保金</li>
                            <li>订单完成</li>
                        </ul>

                    </div>
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
<script>
    $(".cont_lump_sell_wrongOrder .con .wr_con .wr_operation .ckxq").click(function () {
        $(".dingdantankuang").hide(0);
        $(this).parent().find(".dingdantankuang").show(0).click(function () {
            $(this).hide(0);
        })
    });
</script>
</html>