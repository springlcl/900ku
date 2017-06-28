<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8"><meta http-equiv="keywords" content="keyword1,keyword2,keyword3">
      <meta http-equiv="description" content="this is my page">
	<title>Document</title>
	<link rel="stylesheet" href="__SUP_PUBLIC__/css/style.css">
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
  <div class="clearfix container" id="app-container">
    <div class="cont_lump cont_lump_sell cont_lump_userProfile bor_bm1">

      <div class="cont_title">
        <span class="active">基本概况</span> 
        <span class="mgl5 pdl10">用户减增</span> 
      </div>
      <ul class="userDateList clearfix">
        <li><h4>{$data.zs}</h4><span>用户总数</span></li>
        <li><h4>0</h4><span>已关注本店</span></li>
        <li><h4>{$data.yh}</h4><span>昨日新增用户</span></li>
        <li><h4>{$data.cai}</h4><span>昨日新增采购商</span></li>
      </ul>
      <!-- 用户属性 -->
      <div class="cont_lump cont_lump_briefing">
        <div class="cont_title">
          <span>用户属性</span>
        </div>
        <!-- 为ECharts准备一个具备大小（宽高）的Dom -->
        <div id="ec_main3" style="width: 100%;height: 400px;" >
          <input type="hidden" class="cai" value="{$data.cgszs}">
          <input type="hidden" class="gong" value="{$data.yhzs}">
        </div>
      </div>
      <!-- 用户分布 -->
      <div class="cont_lump cont_lump_userAttribute">
      
        
      <!-- 采购商分布 -->
      <div class="cont_lump cont_lump_userAttribute">
        <div class="cont_title">
          <span>采购商分布</span>
        </div>
        <div class="con clearfix">
            <!-- 为ECharts准备一个具备大小（宽高）的Dom -->
            <div class=" fl" id="map2" style="width: 60%;height: 500px;"></div>
            <!-- 表格 -->
            <table>
                <tr>
                  <th>排名地区</th>
                  <th>采购商数</th>
                </tr>
                <volist name="sheng" id='vo'>
                <tr>
                  <td>{$vo.province}</td>
                  <td>{$vo.count}</td>
                </tr>
                </volist>
              
            </table>
        </div>
      </div>
    </div>
    <!-- 底部 == 版权 -->
    <div class="cont_lump con-foot">版权所有：900库 [京ICP备1000000001号-1</di>
  </div>
    
      

</body>
<script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/1.8.3/jquery.min.js"></script>
<!-- <script type="text/javascript" src="http://echarts.baidu.com/gallery/vendors/echarts/echarts-all-3.js"></script> -->
<script src="__SUP_PUBLIC__/js/echarts-all.js"></script>
      <script type="text/javascript">
              var cai = $('.cai').val();
              var fen = $('.gong').val();
              var c = '采购商-'+cai;
              var f = '用户-'+fen;
              var myChart =  echarts.init(document.getElementById('ec_main3'));
                option = {
                    tooltip: {
                        trigger: 'item',
                        formatter: "{a} <br/>{b}: {c} ({d}%)"
                    },
                    legend: {
                        orient: 'vertical',
                        x: '20',
                        y: '20',
                        data:[c,f],
                    },
                    color:['#FF7F51', '#87CEFA','yellow','blueviolet'],
                    series: [
                        {
                            name:'数量',
                            type:'pie',
                            radius: ['50%', '70%'],
                            avoidLabelOverlap: false,
                            label: {
                                normal: {
                                    show: false,
                                    position: 'center'
                                },
                                emphasis: {
                                    show: true,
                                    textStyle: {
                                        fontSize: '30',
                                        fontWeight: 'bold'
                                    }
                                }
                            },
                            labelLine: {
                                normal: {
                                    show: false
                                }
                            },
                            data:[
                                {value:cai, name:c},
                                {value:fen, name:f}
                            ]
                        }
                    ]
                };
              myChart.setOption(option);
      </script>
<script type="text/javascript">
    var myChart =  echarts.init(document.getElementById('map2'));
    var option = {
        // title : {
        //     text: 'iphone销量',
        //     subtext: '纯属虚构',
        //     x:'center'
        // },
        tooltip : {
            trigger: 'item'
        },
        // legend: {
        //     orient: 'vertical',
        //     x:'left',
        //     data:['iphone5']
        // },
        dataRange: {
            min: 0,
            max: 2500,
            x: 'left',
            y: 'bottom',
            text:['高','低'],
            calculable : true
        },
        // toolbox: {
        //     show: true,
        //     orient : 'vertical',
        //     x: 'right',
        //     y: 'center',
        //     feature : {
        //         mark : {show: true},
        //         dataView : {show: true, readOnly: false},
        //         restore : {show: true},
        //         saveAsImage : {show: true}
        //     }
        // },
        // roamController: {
        //     show: true,
        //     x: 'right',
        //     mapTypeControl: {
        //         'china': true
        //     }
        // },
        series : [
            {
                name: '采购商数',
                type: 'map',
                mapType: 'china',
                itemStyle:{
                    normal:{label:{show:true}},
                    emphasis:{label:{show:true}}
                },
                data:[{$html}]
            }
        ]
    };
    myChart.setOption(option);
    window.onresize = myChart.resize;
</script>
</html>