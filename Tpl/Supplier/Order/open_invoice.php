<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8"><meta http-equiv="keywords" content="keyword1,keyword2,keyword3">
      <meta http-equiv="description" content="this is my page">
	<title>待开发票</title>
    <link rel="stylesheet" href="__SUP_PUBLIC__/css/style.css">
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries--><!--[if lt IE 9]><script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script><script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<body>
<!-- 左导一 -->
  <include file='Public/firstSidebar' />
<!-- 左导二 -->
  <include file='left' />
 <!-- 右侧 内容-->
  <div class="clearfix container min-w1100" id="app-container">

      <div class="cont_lump cont_lump_sell  development">
          <div class="cont_title clearfix">
            <span>待开发票</span>
          </div>
          <form action="" method="post">
          <div class="daikaifa">
            <input <?php if($order_code){echo "value='$order_code'";}?> name="order_code" type="text" placeholder="订单号">
           <!--  <input  name="pid" type="text" placeholder="采购商"> -->
      
                    <label class="text" >采购商:</label>
                    <select style="width:130px;height:38px;" name="pid" id="">
                        <option value="0">全部采购商</option>
                        <volist name="pur" id="p">
                        <option <?php if($pid && $pid==$p['pro_id']){echo "selected='selected'";}?> value="{$p.pro_id}">{$p.pro_name}</option>
                       </volist>
                    </select>
           
            <span>下单时间：</span>
            <input <?php if($start){echo "value='$start'";}?> name="start" class="laydate-icon" id="wrong_start" >
            <span>至</span>
            <input  <?php if($end){echo "value='$end'";}?> name="end" class="laydate-icon" id="wrong_end" >
            <button>筛选</button>
          </div>
        </form>
          <div class="jinqi"><h5 class="font-weight600">近期未开票记录</h5></div>
     <volist name="bill" id="b">
          <div class="dingdangbianhao">
            <ul>
              <li>
                  <h5 class="font-weight600 fl">采购商：{$b[0]['pro_name']}<i class="ico_all"></i></h5>
                  <a href="{:U('Order/bill_daochu',array('order_num'=>$b[0]['order_num']))}"><button class="fr">导出</button></a>
                  <a href="{:U('Order/bill_kaipiao',array('order_num'=>$b[0]['order_num']))}"><button class="fr">开票</button> </a> 
              </li>
              <volist name="b" id="m">
              <li class="clearfix">
                <div class="fl yiyang"><span>订单编号：{$m.order_num}</span></div>
                <div class="fl yiyang"><span>企业内部订单编号：未同步</span></div>
                <div class="fl yiyang"><span>下单时间：<?=date('Y-m-d',$m['created']);?></span><span class="mgl10">14:12:34</span></div>
                <div class="fl yiyang"><span>已开款</span><span class="col-red mgl5">{$m.paid_amount}</span></div>
                <div class="fl yiyang"><span>实付款</span><span class="col-red mgl5">{$m.pay}</span></div>
              </li>
            </volist>
              <!-- li class="clearfix">
                <div class="fl yiyang"><span>订单编号：12331212312312222</span></div>
                <div class="fl yiyang"><span>企业内部订单编号：未同步</span></div>
                <div class="fl yiyang"><span>下单时间：2016-10-25</span><span class="mgl10">14:12:34</span></div>
                <div class="fl yiyang"><span>已开</span><span class="col-red mgl5">0.00</span></div>
                <div class="fl yiyang"><span>实付款</span><span class="col-red mgl5">1000.00</span></div>
              </li> -->

            </ul>
          </div>
        </volist>
<!--测试数据开始 -->
          <!-- <div class="dingdangbianhao">
            <ul>
              <li>
                  <h5 class="font-weight600 fl">采购商：{$b[0]['pro_name']}<i class="ico_all"></i></h5>
                  <a href="{:U('Order/bill_daochu',array('order_num'=>1))}"><button class="fr">导出</button></a>
                  <a href="{:U('Order/bill_kaipiao',array('order_num'=>1))}"><button class="fr">开票</button> </a> 
              </li>
              
              <li class="clearfix">
                <div class="fl yiyang"><span>订单编号：{$m.order_num}</span></div>
                <div class="fl yiyang"><span>企业内部订单编号：未同步</span></div>
                <div class="fl yiyang"><span>下单时间：<?=date('Y-m-d',$m['created']);?></span><span class="mgl10">14:12:34</span></div>
                <div class="fl yiyang"><span>已开款</span><span class="col-red mgl5">{$m.paid_amount}</span></div>
                <div class="fl yiyang"><span>实付款</span><span class="col-red mgl5">{$m.pay}</span></div>
              </li> -->
 <!--测试数据结束-->     
      



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