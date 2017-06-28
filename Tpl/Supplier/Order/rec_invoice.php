<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"><meta http-equiv="keywords" content="keyword1,keyword2,keyword3">
      <meta http-equiv="description" content="this is my page">
  <title>订单记录</title>
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
    <div class="cont_lump  cont_lump_sell_wrongOrder cont_lump_stayOrderRecord">
        <div class="cont_title">
            <span>订单发票记录</span> 
        </div>
        <form action="" method="post">
            <ul class="wrong_order_form clearfix">
                <li class="sou">
                    <input type="text" placeholder="订单号/商品名称/商品编号">
                    <button><i class="ico_all">&nbsp;</i></button>
                </li>
                <li>
                    <label class="text" >采购商:</label>
                    <select name="" id="">
                        <option value="0">全部采购商</option>
                       <!--  <option value="">采购商2</option>
                        <option value="">采购商3</option> -->
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
                <li class="wr_price">单价</li>
                <li class="wr_num">数量</li>
                <li class="wr_deal">小计(元)</li>
                <li class="wr_this">发票状态</li>
                <li class="wr_operation">操作</li>
            </ul>
            <ul class="wr_list">
<!--                 <li class="wr_lump">
                    <div class="wr_tit clearfix bg-f5 pd10">
                        <div class="fl">
                            <span class="font-weight600 mgr30">采购商：肇庆新奥燃气有限公司</span>
                            <span class="font-weight400 mgr30">订单号:2398338393953423</span>
                            <span class=" ">下单时间：2017-03-23 12:23:23</span>
                        </div>
                        
                    </div>
                    <ul class="wr_con clearfix">
                        <li class="wr_img"><img src="__SUP_PUBLIC__/images/tianjia.png" alt=""></li>
                        <li class="wr_info">
                            <p>Bershka 女士 修身牛仔裤 </p>
                            <p class="mgt10">05003534480</p>
                            <p class="col-999 mgt10"><span>颜色:蓝色</span><span>尺码 XXL</span></p>
                        </li>
                        <li class="wr_price">
                            <p class="col-red mgt10 font-weight600">￥169.00</p>
                        </li>
                        <li class="wr_num">2</li>
                        <li class="wr_deal">
                            <p>1000.00</p>
                        </li>
                        <li class="wr_this">
                            <p>部分已开</p>
                        </li>
                        <li class="wr_operation">
                            <button class="mgt30 col-lan">开票历史</button>
                        </li>
                    </ul>
                    <div class="foot clearfix pd10 bg-f5">
                        <ul class="fl">
                          <li class="fl mgr30">订单运费合计:￥10.00</li>
                          <li class="fl">订剩余运费:￥0.00</li>
                        </ul>
                        <div class="fr">
                            <div class="fl mgr20">已开票数：1</div>
                            <div class="fl mgr20">已开发票合计：￥240.00</div>
                            <div class="fl">实收款：￥240.00</div>
                        </div>
                    </div>
                </li>


                <li class="wr_lump">
                    <div class="wr_tit clearfix bg-f5 pd10">
                        <div class="fl">
                            <span class="font-weight600 mgr30">采购商：肇庆新奥燃气有限公司</span>
                            <span class="font-weight400 mgr30">订单号:2398338393953423</span>
                            <span class=" ">下单时间：2017-03-23 12:23:23</span>
                        </div>
                        
                    </div>
                    <ul class="wr_con clearfix">
                        <li class="wr_img"><img src="__SUP_PUBLIC__/images/tianjia.png" alt=""></li>
                        <li class="wr_info">
                            <p>Bershka 女士 修身牛仔裤 </p>
                            <p class="mgt10">05003534480</p>
                            <p class="col-999 mgt10"><span>颜色:蓝色</span><span>尺码 XXL</span></p>
                        </li>
                        <li class="wr_price">
                            <p class="col-red mgt10 font-weight600">￥169.00</p>
                        </li>
                        <li class="wr_num">2</li>
                        <li class="wr_deal">
                            <p>1000.00</p>
                        </li>
                        <li class="wr_this">
                            <p>部分已开</p>
                        </li>
                        <li class="wr_operation">
                            <button class="mgt30 col-lan">开票历史</button>
                        </li>
                    </ul>
                    <div class="foot clearfix pd10 bg-f5">
                        <ul class="fl">
                          <li class="fl mgr30">订单运费合计:￥10.00</li>
                          <li class="fl">订剩余运费:￥0.00</li>
                        </ul>
                        <div class="fr">
                            <div class="fl mgr20">已开票数：1</div>
                            <div class="fl mgr20">已开发票合计：￥240.00</div>
                            <div class="fl">实收款：￥240.00</div>
                        </div>
                    </div>
                </li> -->
            </ul>
        </div>
    </div>
    <!-- 底部 == 版权 -->
    <div class="cont_lump con-foot">版权所有：900库 [京ICP备1000000001号-1</div>
</div>

<!-- 弹框 -->
  <div class="protection">
    <div class="tanchu_box tanchu_box1100 stayOrderRecord_tab_box">
      <span class="gb close_btn"><i></i></span>
      <table class="historyRecord">
        <tr>
          <th>序号</th>
          <th>开票日期</th>
          <th>发票编号（同批次发票）</th>
          <th>开票金额</th>
          <th>发票状态</th>
          <th>快递公司</th>
          <th>快递单号</th>
        </tr>
        <tr>
          <td>01</td>
          <td>2017-03-13</td>
          <td>13455467755677745</td>
          <td>￥360.00</td>
          <td>已确认</td>
          <td>圆通快递</td>
          <td>784744748585</td>
        </tr>
      </table>
      <div class="zongde bg-f5 center">已开总额：￥340.00</div>
    </div>
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