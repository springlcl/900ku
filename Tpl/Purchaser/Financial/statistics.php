<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>财务-统计</title>
	<link rel="stylesheet" href="__PUR_PUBLIC__/css/reset.css">
	<link rel="stylesheet" href="__PUR_PUBLIC__/css/icons.css">
	<link rel="stylesheet" href="__PUR_PUBLIC__/css/style.css">
</head>
<body>
	<div class="wh1200auto clearfix">
		<!-- 左边导航 -->
		<include file='Public/leftBar' />
		<!-- 右边内容 -->
		<div class="right_content fl">
			<div class="right_con_down finance_0501 bg-fff">
				<div class="title_ty">
					<span class="tit_name">统计</span>
				</div>
				<form action="{:U('Financial/statistics')}" method="post">
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
							<input class="btn-80x30 pdl10 laydate-icon" name="time_start" id="start" value="<?= date('Y-m-d',time());?>" placeholder="开始日期"/>
							<span class="mgw10">至</span>
							<input class="btn-80x30 pdl10 laydate-icon" name="time_end" id="end" value="<?= date('Y-m-d',time());?>" placeholder="结束日期"/>
							<button class="btn-60x30 bg-slv col-fff fs-14 mgl10 ">搜索</button>
						</div>
						<div class="fr tianshu_xuanze">
							<button name="but_one"  value="1" class="btn-80x30 bor_1ddd mgr20  <?php if($one){echo "active";}?>">7日数据</button>
							<button name="but_two"  value="2" class="btn-80x30 bor_1ddd mgr20  <?php if($two){echo "active";}?>">30日数据</button>
						</div>
					</div>
	      		</form>
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
								<h5>待收货</h5>
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
						<div class="echarts" id="echarts-line-chart" style="width: 324px;height: 288px;"></div>
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
							<h5>预期付款次数</h5>
							<h6>{$yqcs}</h6>
						</li>
						<li>
							<h5>付款及时率</h5>
							<h6>{$fkjsl}</h6>
						</li>
						<li>
							<h5>及时率排行</h5>
							<h6>待定</h6>
						</li>
					</ul>
				</div>
				<div class="record_info">版权所有:900库 [京ICP备1000000001号-1]</div>
			</div>
		</div>
	</div>
</body>
<script type="text/javascript" src="__PUR_PUBLIC__/js/jquery.min.js"></script>
<script type="text/javascript" src="__PUR_PUBLIC__/layer/layer.js"></script>
<script type="text/javascript" src="__PUR_PUBLIC__/laydate/laydate.js"></script>
<script type="text/javascript" src="__PUR_PUBLIC__/js/echarts.min.js"></script>
<script type="text/javascript" src="__PUR_PUBLIC__/js/js.js"></script>
<script>
        $(document).ready(function(){
            var start={elem:"#start",format:"YYYY-MM-DD",max:"2099-06-16 23:59:59",istime:false,istoday:false,choose:function(datas){end.min=datas;end.start=datas}};
            var end={elem:"#end",format:"YYYY-MM-DD",max:"2099-06-16 23:59:59",istime:false,istoday:false,choose:function(datas){start.max=datas}};
            laydate(start);laydate(end);
        });
</script>
    <script type="text/javascript">
    $(function () {
    	var e = echarts.init(document.getElementById("echarts-line-chart")),
        a = {
            title : {
                text: '商品交易概括',
                subtext: '一周内',
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
                    name: '访问来源',
                    type: 'pie',
                    selectedMode: 'single',
                    radius : '40%',
                    center: ['50%', '60%'],
                    data:[
                        {value:{$yfk}, name:'已支付'},
                        {value:{$wfk}, name:'未支付'}
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
        e.setOption(a),
            $(window).resize(e.resize);
    });
    </script>

</html>