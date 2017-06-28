<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="wap-font-scale" content="no">
	<title>财务统计</title>
    <link rel="stylesheet" href="__HOME_PUBLIC__/finance/css/exhibition_hall_style.css">
	<link rel="stylesheet" href="__HOME_PUBLIC__/finance/css/swiper.min.css">
	<link rel="stylesheet" href="__HOME_PUBLIC__/finance/css/icons.css">
	<link rel="stylesheet" href="__HOME_PUBLIC__/finance/css/reset.css">
	<link rel="stylesheet" href="__HOME_PUBLIC__/finance/css/style.css">
</head>
<body>
<include file="Public/Cgheader" />
<!-- ++++++++++++++++++++++++++++++++++++++ -->
<div class="wh1200auto clearfix">
<include file="Public/Finance" />
      <div class="caiwu_right fl">
        <div class="right_con_down finance_0501 bg-fff">
        <div class="title_ty mgb10">
          <span class="tit_name fs-20">统计</span>
        </div>
        <form action="{:U('Cg/finance')}" method="post">
        <div class="title_ty_smart clearfix condition">
          <div class="fl">
            <span class="mgw10">数据统计</span>
            <select class="btn-80x30" name="item" id="">
             
              <option value="">全部项目</option>
               <volist name="item" id="i">
              <option <?php if($i['pid']==$postpid){ echo "selected='selected'";} ?> value="{$i.pid}">{$i.pro_name}</option>
            </volist>
            </select>
            <span class="mgw10">时间</span>
            <input name="start" style="width:150px;" <?php if($start){ echo "value='$start'";}?> class="btn-80x30 pdl10 laydate-icon" type="text" id="wrong_start" >
            <span class="mgw10">至</span>
            <input name="end" style="width:150px;" <?php if($end){ echo "value='$end'";}?> class="btn-80x30 pdl10 laydate-icon" type="text" id="wrong_end" >
            <button class="btn-60x30 bg-slv col-fff fs-14 mgl10 ">搜索</button>
          </div>
          <div class="fr tianshu_xuanze">
            <button name="but_one" value="1" class="btn-80x30 bor_1ddd mgr20 <?php if($one){echo "active";}?>">7日数据</button>
            <button name="but_two" value="2" class="btn-80x30 bor_1ddd mgr20 <?php if($two){echo "active";}?>">30日数据</button>
          </div>
        </div>
      </form>
      <input id="yzf" type="hidden" name="" value="{$yfk}">
      <input id="wzf" type="hidden" name="" value="{$wfk}">
        <div class="finance_box1 clearfix mgt20">
          <div class="fl center box_left">
            <ul class="fl">
              <li>
                <h5>总金额</h5>
                <h6>￥{$zje}</h6>
              </li>
              <li>
                <h5>已付款</h5>
                <h6>￥{$yfk}</h6>
              </li>
              <li>
                <h5>未付款</h5>
                <h6>￥{$wfk}</h6>
              </li>
            </ul>
            <ul class="fl">
              <h5>总订单</h5>
              <h6>{$zdd}</h6>
            </ul>
            <ul class="fl">
              <li>
                <h5>已下单</h5>
                <h6>{$yxd}</h6>
              </li>
              <li>
                <h5>待出库</h5>
                <h6>{$dck}</h6>
              </li>
              <li>
                <h5>待发货</h5>
                <h6>{$dfh}</h6>
              </li>
            </ul>
            <ul class="fl">
              <li>
                <h5>已发货</h5>
                <h6>{$yfh}</h6>
              </li>
              <li>
                <h5>质保期</h5>
                <h6>{$zbq}</h6>
              </li>
              <li>
                <h5>已完成</h5>
                <h6>{$ywc}</h6>
              </li>
            </ul>
          </div>
          <div class="fl box_right">
            <div id="pie_tu1" style="width: 324px;height: 288px;"></div>
          </div>
        </div>
        <div class="title_ty_smart mgt20">
          <span class="mgw10">付款及时率</span>
        </div>
        <div class="finance_box2">
          <ul class="clearfix pdh30">
            <li>
              <h5>付款次数</h5>
              <h6>{$fkcs}</h6>
            </li>
            <li>
              <h5>付款金额</h5>
              <h6>￥{$yfk}</h6>
            </li>
            <li>
              <h5>逾期付款次数</h5>
              <h6>{$yqcs}</h6>
            </li>
            <li>
              <h5>付款及时率</h5>
              <h6>{$fkjsl}</h6>
            </li>
            <li>
              <h5>及时率排行</h5>
              <h6>100</h6>
            </li>
          </ul>
        </div>
      </div>
      </div>
</div>
<!-- ++++++++++++++++++++++++++++++++++++++ -->




<include file="Public/Foot" />
</body>
</body>
<script type="text/javascript" src="__HOME_PUBLIC__/finance/js/jquery.min.js"></script>
<script type="text/javascript" src="__HOME_PUBLIC__/finance/laydate/laydate.js"></script>
<script type="text/javascript" src="__HOME_PUBLIC__/finance/js/echarts.min.js"></script>
<script type="text/javascript" src="__HOME_PUBLIC__/finance/js/js.js"></script>
<script>
    var start = {
      elem: '#wrong_start',
      format: 'YYYY/MM/DD',
      min: '1900-01-01', //最小日期
      max: laydate.now(), //最大日期
      istime: false,
      istoday: false,

    };
    var end = {
      elem: '#wrong_end',
      format: 'YYYY/MM/DD',
      min: '1900-01-01', //最小日期
      max: laydate.now(),
      istime: false,
      istoday: false,
      choose: function(datas){
        start.max = datas; //结束日选好后，重置开始日的最大日期
      }
    };
    laydate(start);
    laydate(end);
</script>
</script>
    <script type="text/javascript">

    var yzf=$("#yzf").val();
    var wzf=$("#wzf").val();
        // 基于准备好的dom，初始化echarts实例
        var myChart = echarts.init(document.getElementById('pie_tu1'));

        // 指定图表的配置项和数据
        option = {
            title : {
                text: '商品交易概括',
                subtext: '',
                x:'center'
            },
            tooltip : {
                trigger: 'item',
                formatter: "{a} <br/>{b} : {c}￥ ({d}%)"
            },
            legend: {
                orient: 'vertical',
                left: 'left',
                data: ['已支付','未支付']
            },
            series : [
                {
                    name: '支付完成情况',
                    type: 'pie',
                    selectedMode: 'single',
                    radius : '55%',
                    center: ['50%', '60%'],
                    data:[
                        {value:yzf, name:'已支付'},
                        {value:wzf, name:'未支付'}
                    ],
                    label: {
                        normal: {
                            show: true,
                            formatter: '{b} : {c}￥'
                        }
                    },
                    itemStyle: {
                        emphasis: {
                            shadowBlur: 10,
                            shadowOffsetX: 0,
                            shadowColor: 'rgba(0, 0, 0, 0.5)'
                        }
                    }
                }
            ]
        };


        // 使用刚指定的配置项和数据显示图表。
        myChart.setOption(option);
    </script>

</html>