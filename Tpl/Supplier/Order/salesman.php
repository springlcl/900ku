<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8"><meta http-equiv="keywords" content="keyword1,keyword2,keyword3">
      <meta http-equiv="description" content="this is my page">
	<title>业务员所得</title>
    <link rel="stylesheet" href="__SUP_PUBLIC__/css/styles.css">
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries--><!--[if lt IE 9]><script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script><script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<body>
<!-- 左导一 -->
  <include file='Public/firstSidebar' />
<!-- 左导二 -->
  <include file='left' />
<!-- 右侧 内容-->
<div class="clearfix container min-w" id="app-container">
    <div class="cont_lump  cont_lump_sell_wrongOrder h_salesmanincome">
        <div class="cont_title">
            <span>业务员所得</span> 
        </div>
        <form action="">
            <ul class="wrong_order_form clearfix">
                <div class="clearfix">
                    <li>
                        <div class="font-size14 mgr35">业务员所得: <span class="font-size16 col-red3 font-weight600">￥{$suo}</span></div>
                    </li>
                    <li>
                        <div class="font-size14 mgr35 mgl30">待支付业务员所得：: <span class="font-size16 col-red3 font-weight600">￥{$dai}</span></div>
                    </li>
                    <li>
                        <button class="zhifuanniu">支付</button>
                    </li>
                </div>
                <li class="sou">
                    <input type="text" placeholder="订单号">
                    <button><i class="ico_all">&nbsp;</i></button>
                </li>
                <li>
                    <select name="" id="" class="mgl10">
                        <option value="">业务员</option>
                        <option value="">业务员2</option>
                    </select>
                </li>
                <li>
                    <label class="text" >成交时间:</label>
                    <input class="laydate-icon" id="wrong_start" >
                    <span>至</span>
                    <input class="laydate-icon" id="wrong_end" >
                </li>
                <li>
                    <a><span class="screen ui-btn bg-lan col-fff mgl15">筛选</span></a>
                </li>
            </ul>
        </form>
        <volist name="str" id="vo">
        <table>
          <tr>
            <td rowspan="4">
              <!-- <input type="checkbox" name="1" value="1" class="fl kucun_cb " style="margin-left:30%;"> -->
              <div class="num" style="margin-left:50%;text-align: left;">01</div>
            </td>
            <td rowspan="4">{$vo.order_num}</td>
            <td rowspan="4"><p class="mgb20">2017-04-10</p><p>12:23:46</p></td>
            <td rowspan="4">{$vo.total}</td>
            <td rowspan="4">{$vo.pro_name}</td>
            <td>预付款</td>
            <td>银行转账</td>
            <td> <span>{$vo.amount}</span> <span class="mgl10">待支付</span></td>
            <td rowspan="4"><button class="zhifuanniu">支付</button></td>
          </tr>
        </table>
        <div class="h60 clearfix">
            
              <!-- <p class="fr font-size14 ">业务员所得: <span class="font-size16 col-red font-weight600">￥2400.00</span></p>
              <p class="fr font-size14 ">待支付业务员所得：: <span class="font-size16 col-red font-weight600">￥4000.00</span></p>  -->
        </div>
        </volist>
        <table>
          <tr>
            <td rowspan="4">
              <!-- <input type="checkbox" name="1" value="1" class="fl kucun_cb " style="margin-left:30%;"> -->
              <div class="num" style="margin-left:50%;text-align: left;">01</div>
            </td>
            <td rowspan="4">456789065456789087</td>
            <td rowspan="4"><p class="mgb20">2017-04-10</p><p>12:23:46</p></td>
            <td rowspan="4">1990.00</td>
            <td rowspan="4">蔡英文</td>
            <td>预付款 1234.00</td>
            <td>银行转账</td>
            <td> <span>3000.00</span> <span class="mgl10">待支付</span></td>
            <td rowspan="4"></td>
          </tr>
        </table>
        <div class="h60 clearfix">
            
             <!--  <p class="fr font-size14 ">业务员所得: <span class="font-size16 col-red font-weight600">￥0.00</span></p>
              <p class="fr font-size14 ">待支付业务员所得：: <span class="font-size16 col-red font-weight600">￥4000.00</span></p>  -->
         </div>     
    <!-- 底部 == 版权 -->
    <div class="cont_lump con-foot">版权所有：900库 [京ICP备1000000001号-1</div>

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