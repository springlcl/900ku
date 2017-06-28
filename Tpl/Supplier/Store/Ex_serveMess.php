<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>浏览概况</title>
	<link rel="stylesheet" href="__SUP_PUBLIC__/css/style.css">
	<style>
	</style>
</head>
<body>
<!-- 左导一 -->
 <include file="Public/firstSidebar" /> 
<!-- 左导二 -->
 <include file="Store/exLeft" />
<!-- 右侧 内容-->
  <div class="clearfix container" id="app-container">
     <div class="cont_lump cont_lump_room-top">
      <div class="con clearfix">
          <div class="img fl"><img src="__SUP_PUBLIC__/images/head-img2.png" alt=""></div>
          <div class="text fl">
          	 <h3>{$ex.ex_name}</h3>
             <if condition="$ex['is_auth'] eq 1">
             <span><i><img src="__SUP_PUBLIC__/images/dianpuhuang.png" alt=""></i>展厅认证</span>
              <else />
             <span class="hui"><i><img src="__SUP_PUBLIC__/images/dianpuhui.png" alt=""></i>展厅未认证</span>
              </if>
            <div class="900ku">
               <a href="{:U('Goods/publish')}"><button class="button q_gr"><i>+</i>发布商品</button></a>
               <a href="{:U('Store/tempwap')}"><button class="q_gr">定制高级</button></a>
               <a href="http://www.900ku.com/index.php/Shop/index/exid/{$ex['exid']}.html" target="_blank"><button class="q_bl">访问展厅</button></a>
               <button id="gz" class="q_bl">关注平台</button>
              
                <img id="ewm" style="display:none;" src="__SUP_PUBLIC__/images/index_end_tbc.png">
              

<!--                 <div class="tuiguang_box sanjiao_right_lan border-r5">
                    <div class="clearfix list list_lj">
                        <span class="fl">商品链接</span>
                        <input class="fl link" type="text" value="http://d.pigcms.com/upload/images/000/14/338/201703/58c6535f50f37.jpg">
                        <button type="button" class="fl copy">复制</button>
                    </div>
                    <div class="clearfix list list_ewm">
                        <span class="fl">商品二维码</span>
                        <div class="img fl"><img src="__SUP_PUBLIC__/images/index_end_tbc.png" alt=""></div>
                        <button class="fl acquire">下载</button>
                    </div>
                </div> -->

             </div>
          </div>
      </div>
      <div class="cont_lump cont_lump_room-data">
        <ul class="con clearfix">
          <li><div><h6 class="font-weight600 font-size24 col-red">0</h6><span class="col-666 font-size14">昨日店铺浏览次数</span></div></li>
          <li><div><h6 class="font-weight600 font-size24 col-red">0</h6><span class="col-666 font-size14">昨日店铺浏览人数</span></div></li>
          <li><div><h6 class="font-weight600 font-size24 col-red">0</h6><span class="col-666 font-size14">昨日商品浏览次数</span></div></li>
          <li><div><h6 class="font-weight600 font-size24 col-red">0</h6><span class="col-666 font-size14">昨日商品浏览人数</span></div></li>
          <li><div><h6 class="font-weight600 font-size24 col-red">{$count}</h6><span class="col-666 font-size14">商品</span></div></li>
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
        <!-- 七天日期隐藏域 -->
    <volist name="week" id="w">
      <input type="hidden" id="week" value="{$w}" />
    </volist>
        <!-- 七天浏览信息隐藏域 -->
        <volist name="all" id="a">
      <input type="hidden" id="ex_see" value="{$a[ex_see]}" />
      <input type="hidden" id="ex_user" value="{$a[ex_user]}" />
      <input type="hidden" id="goods_see" value="{$a[goods_see]}" />
      <input type="hidden" id="goods_user" value="{$a[goods_user]}" />
      <input type="hidden" id="goods_usernum" value="{$a[goods_usernum]}" />
    </volist>

      </div>
      <div class="cont_lump cont_lump_ranking">
        <!-- <div class="cont_title">
          <span>流量排行</span>
          <div class="prompt">
            <i></i>
            <p>浏览次数/人数：页面被访问的用户数和浏览次数；</p>
          </div>
        </div> -->
          <table>
<!--               <tr>
                  <th>页面名称</th>
                  <th>人数/次数</th>
              </tr>
              <tr>
                <td>展厅中心</td>
                <td>0/0</td>
              </tr>
              <tr>
                <td>微页面-食品电商模块</td>
                <td>0/0</td>
              </tr>
              <tr>
                <td>订单支付页面</td>
                <td>0/0</td>
              </tr>
              <tr>
                <td>商品搜索</td>
                <td>0/0</td>
              </tr>
              <tr>
                <td>个人设置页面</td>
                <td>0/0</td>
              </tr>
              <tr>
                <td>供应商认证页面</td>
                <td>0/0</td>
              </tr>
              <tr>
                <td>商品搜索</td>
                <td>0/0</td>
              </tr> -->


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
          <!-- <tr>
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
          </tr> -->
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
    //弹出关注900ku平台二维码
    $("#gz").click(function(){
      $("#ewm").toggle();
    })
    //获取前七天的日期
              var week=[];
              var i=0;
              $("input[id='week']").each(function(){
                  i++;
                  week[i] = $(this).val();
              });
    //获取前七天浏览信息
      //展厅浏览次数
              var exsee=[];
              var h=0;
              $("input[id='ex_see']").each(function(){
                  h++;
                  exsee[h] = $(this).val();
              });
      //展厅浏览人数
               var exuser=[];
              var j=0;
              $("input[id='ex_user']").each(function(){
                  j++;
                  exuser[j] = $(this).val();
              });     
      //商品浏览次数
              var goodssee=[];
              var k=0;
              $("input[id='goods_see']").each(function(){
                  k++;
                  goodssee[k] = $(this).val();
              });
      //商品浏览人数
              var goodsuser=[];
              var l=0;
              $("input[id='goods_user']").each(function(){
                  l++;
                  goodsuser[l] = $(this).val();
              });
      //商品用户次数
              var goodsusernum=[];
              var p=0;
              $("input[id='goods_usernum']").each(function(){
                  p++;
                  goodsusernum[p] = $(this).val();
              });
              

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
					data : [week[1],week[2],week[3],week[4],week[5],week[6],week[7]]
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
					data:[exsee[1],exsee[2],exsee[3],exsee[4],exsee[5],exsee[6],exsee[7],]
				},
				{
					name:'展厅浏览人数',
					type:'line',
					// stack: '总量',
					data:[exuser[1],exuser[2],exuser[3],exuser[4],exuser[5],exuser[6],exuser[7],]
				},
				{
					name:'商品浏览次数',
					type:'line',
					// stack: '总量',
					data:[goodssee[1],goodssee[2],goodssee[3],goodssee[4],goodssee[5],goodssee[6],goodssee[7],]
				},
				{
					name:'商品浏览人数',
					type:'line',
					// stack: '总量',
					data:[goodsuser[1],goodsuser[2],goodsuser[3],goodsuser[4],goodsuser[5],goodsuser[6],goodsuser[7],]
				},
				{
					name:'商品用户次数',
					type:'line',
					// stack: '总量',
					data:[goodsusernum[1],goodsusernum[2],goodsusernum[3],goodsusernum[4],goodsusernum[5],goodsusernum[6],goodsusernum[7],]
				}
			]
		};
        myChart.setOption(option);
        
            window.onresize = myChart.resize;


    </script>
</html>