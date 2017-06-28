<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="__SUP_PUBLIC__/css/style.css">
	<style>
	</style>
</head>
<body>
<!-- 左导一 -->
 <include file="Public/firstSidebar" /> 
<!-- 左导二 -->
 <include file="Exhibition/exLeft" />
<!-- 右侧 内容-->
  <div class="clearfix container" id="app-container">
     <div class="cont_lump cont_lump_room-top">
      <div class="con clearfix">
          <div class="img fl"><img src="__SUP_PUBLIC__/images/head-img2.png" alt=""></div>
          <div class="text fl">
          	 <h3>展厅名称</h3>
             <span><i><img src="__SUP_PUBLIC__/images/dianpuhuang.png" alt=""></i>展厅认证</span>
             <span class="hui"><i><img src="__SUP_PUBLIC__/images/dianpuhui.png" alt=""></i>展厅未收款</span>
            <div>
               <a href="0301-发布商品.html"><button class="button q_gr"><i>+</i>发布商品</button></a>
               <a href="0203-展厅-高级定制.html"><button class="q_gr">定制高级</button></a>
               <button class="q_bl">访问展厅</button>
               <button class="q_bl">关注平台</button>
             </div>
          </div>
      </div>
      <div class="cont_lump cont_lump_room-data">
        <ul class="con clearfix">
          <li><div><h6 class="font-weight600 font-size24 col-red">329</h6><span class="col-666 font-size14">昨日店铺浏览次数</span></div></li>
          <li><div><h6 class="font-weight600 font-size24 col-red">329</h6><span class="col-666 font-size14">昨日店铺浏览人数</span></div></li>
          <li><div><h6 class="font-weight600 font-size24 col-red">329</h6><span class="col-666 font-size14">昨日商品浏览次数</span></div></li>
          <li><div><h6 class="font-weight600 font-size24 col-red">329</h6><span class="col-666 font-size14">昨日商品浏览人数</span></div></li>
          <li><div><h6 class="font-weight600 font-size24 col-red">329</h6><span class="col-666 font-size14">商品</span></div></li>
        </ul>
      </div>
      <div class="cont_lump cont_lump_flow">
        <div class="cont_title">
          <span>流量趋势</span>
        </div>
        <!-- 为ECharts准备一个具备大小（宽高）的Dom -->
        <div class="con">
  	      <div id="ec_main2" style="height:400px;width: 100%;margin-top: 20px;"></div>
        </div>
      </div>
      <div class="cont_lump cont_lump_ranking">
        <div class="cont_title">
          <span>流量排行</span>
          <div class="prompt">
            <i></i>
            <p>浏览次数/人数：页面被访问的用户数和浏览次数；</p>
          </div>
        </div>
          <table>
              <tr>
                  <th>页面名称</th>
                  <th>人数/次数</th>
              </tr>
              <tr>
                <td>展厅中心</td>
                <td>758/710</td>
              </tr>
              <tr>
                <td>微页面-食品电商模块</td>
                <td>639/527</td>
              </tr>
              <tr>
                <td>订单支付页面</td>
                <td>520/423</td>
              </tr>
              <tr>
                <td>商品搜索</td>
                <td>201/201</td>
              </tr>
              <tr>
                <td>个人设置页面</td>
                <td>108/98</td>
              </tr>
              <tr>
                <td>供应商认证页面</td>
                <td>67/3</td>
              </tr>
              <tr>
                <td>商品搜索</td>
                <td>201/201</td>
              </tr>


          </table>
      </div>
      <div class="cont_lump cont_lump_fans">
        <div class="cont_title">
          <span>七天用户列表</span>
          <div class="prompt">
            <i></i>
            <p>用户列表：展厅用户人数；</p>
          </div>
        </div>
        <table>
          <tr>
            <th class="nicheng">昵称</th>
            <th class="time">时间</th>
            <th class="xiaofei">消费金额</th>
          </tr>
          <tr>
            <td class="nicheng">小猴子</td>
            <td class="time">2017-03-12 12：23:14</td>
            <td class="xiaofei">0.00</td>
          </tr>
          <tr>
            <td class="nicheng">元芳</td>
            <td class="time">2017-03-12 12：23:14</td>
            <td class="xiaofei">0.00</td>
          </tr>
          <tr>
            <td class="nicheng">章三胖</td>
            <td class="time">2017-03-12 12：23:14</td>
            <td class="xiaofei">0.00</td>
          </tr>
          <tr>
            <td class="nicheng">张显的</td>
            <td class="time">2017-03-12 12：23:14</td>
            <td class="xiaofei">0.00</td>
          </tr>
          <tr>
            <td class="nicheng">美誉的心</td>
            <td class="time">2017-03-12 12：23:14</td>
            <td class="xiaofei">0.00</td>
          </tr>
          <tr>
            <td class="nicheng">甜甜的幸福</td>
            <td class="time">2017-03-12 12：23:14</td>
            <td class="xiaofei">0.00</td>
          </tr>
          <tr>
            <td class="nicheng">张强</td>
            <td class="time">2017-03-12 12：23:14</td>
            <td class="xiaofei">0.00</td>
          </tr>
        </table>
      </div>
    </div>
    <!-- 底部 == 版权 -->
    <div class="cont_lump con-foot">版权所有：900库 [京ICP备1000000001号-1</di>
  </div>

</body>
<script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/1.8.3/jquery.min.js"></script>
<!-- ECharts单文件引入 -->
 <script src="__SUP_PUBLIC__/js/echarts-all.js"></script>
    <script type="text/javascript">
        var myChart = echarts.init(document.getElementById('ec_main2'));
		var option = {
			tooltip : {
				trigger: 'axis'
			},
			legend: {
				data:['展厅浏览次数','展厅浏览人数','商品浏览次数','商品浏览人数','商品用户次数'],
				right:50,
			},
			toolbox: {
				show : false,
				feature : {
					mark : {show: true},
					dataView : {show: true, readOnly: false},
					magicType : {show: true, type: ['line', 'bar', 'stack', 'tiled']},
					restore : {show: true},
					saveAsImage : {show: true}
				}
			},
			calculable : true,
			xAxis : [
				{
					type : 'category',
					boundaryGap : false,
					data : ['2017-03-11','2017-03-12','2017-03-13','2017-03-14','2017-03-15','2017-03-16','2017-03-17']
				}
			],
			yAxis : [
				{
					type : 'value'
				}
			],
			series : [
				{
					name:'展厅浏览次数',
					type:'line',
					// stack: '总量',
					data:[10, 10, 10, 10, 10, 10, 10]
				},
				{
					name:'展厅浏览人数',
					type:'line',
					// stack: '总量',
					data:[20, 20, 20, 20, 20, 20, 20]
				},
				{
					name:'商品浏览次数',
					type:'line',
					// stack: '总量',
					data:[30, 30, 30, 30, 30, 30, 30]
				},
				{
					name:'商品浏览人数',
					type:'line',
					// stack: '总量',
					data:[40, 40, 40, 40, 40, 40, 40]
				},
				{
					name:'商品用户次数',
					type:'line',
					// stack: '总量',
					data:[50, 50, 50, 50, 50, 50, 50]
				}
			]
		};
        myChart.setOption(option);
        
            window.onresize = myChart.resize;


    </script>
</html>