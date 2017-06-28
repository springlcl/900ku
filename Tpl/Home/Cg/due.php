<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="wap-font-scale" content="no">
	<title>应付款查询</title>
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
        <div class="right_con_down query_0502 bg-fff">
          <div class="title_ty">
            <span class="tit_name">应付款查询</span>
          </div>
          <div class="title_ty_smart clearfix condition">
            <form action="{:U('Cg/due')}" method="post">
            <div class="fl">
              <span class="mgw10">付款金额: <i class="col-red fs-20 fw600 porb3">￥{$yfks}</i></span>
              <input <?php if($oc){ echo "value='$oc'"; }?> name="order_code" type="text" class="btn-120x30 pdl10 mgl20" placeholder="订单号">
              <select class="btn-120x30" name="sup" id="">
                <option value="0">全部供应商</option>
                <volist name="odata" id="od">
                <option <?php if($sup && $sup==$od['exid']){echo "selected='selected'"; }?> value="{$od.exid}">{$od.ex_name}</option>
              </volist>
              </select>
              <select class="btn-120x30" name="pur" id="">
                <option value="0">全部项目</option>
                <volist name="allitem" id="i">
                <option <?php if($pur && $pur==$i['pid']){echo "selected='selected'"; }?>  value="{$i.pid}">{$i.pro_name}</option>
              </volist>
              </select>
              <span class="mgw10">起止时间</span>
              <input style="width:80px;" <?php if($start){echo "value='$start'";}?> name="start" class="btn-80x30 pdl10 laydate-icon" type="text" id="wrong_start" >
              <span class="mgw10">-</span>
              <input style="width:80px;" <?php if($end){echo "value='$end'";}?> name="end" class="btn-80x30 pdl10 laydate-icon" type="text" id="wrong_end" >
              <button class="btn-60x30 bg-slv col-fff fs-14 mgl10 ">搜索</button>
            </div>
          </form>
            <div class="fr">
              
            </div>
          </div>
          <div class="con">
              <ul class="wr_nav bg-fb clearfix">
                  <li class="wr_img">&nbsp;</li>
                  <li class="wr_info">商品信息</li>
                  <li class="wr_price">单价</li>
                  <li class="wr_num">数量</li>
                  <li class="wr_pay">付款状态</li>
                  <li class="wr_this">金额</li>
                  <li class="wr_deal">本次需支付</li>
                  <li class="wr_operation">交易操作</li>
              </ul>
           
              <ul class="wr_list">
          <volist name="oid" id="o">
                  <li class="wr_lump">
                      <div class="wr_tit clearfix bg-f5 pd10">
                          <div class="fl">
                              <span class="font-weight600 mgl10"><?=date('Y-m-d',$o['created']);?></span>
                              <span class="font-weight400 mgl20 mgr35">订单号:{$o.order_code}</span>
                              <span class="mgl35 pdl35 col-clv">供应商:{$o.ex_name}</span>
                          </div>
                      </div>
                      <ul class="wr_con clearfix">
                          <div class="xq_lump_list fl">
<!--                             <div class="xq_lump_li clearfix">
                              <li class="wr_img"><img src="__HOME_PUBLIC__/finance/images/tianjia.png" alt=""></li>
                              <li class="wr_info">
                                  <p>Bershka 女士 修身牛仔裤 </p>
                                  <p class="mgt10">05003534480</p>
                                  <p class="col-999 mgt10"><span>颜色:蓝色</span><span>尺码 XXL</span></p>
                              </li>
                              <li class="wr_price">
                                  <p class="text-del col-999">￥189.00</p>
                                  <p class="col-red mgt10">￥169.00</p>
                              </li>
                              <li class="wr_num">2</li>
                            </div> -->
                           <volist name="o['goods']" id="og">
                              <volist name="og" id="g">
                            <div class="xq_lump_li clearfix">
                              <li class="wr_img"><img src="__UPLOADS__/{$g.goods_thumb}" alt=""></li>
                              <li class="wr_info">
                                  <p>{$g.goods_name} </p>
                                  <p class="mgt10">{$g.goods_code}</p>
                                 <!--  <p class="col-999 mgt10"><span>颜色:蓝色</span><span>尺码 XXL</span></p> -->
                              </li>
                              <li class="wr_price">
                                  <p class="text-del col-999">￥{$g.goods_preprice}</p>
                                  <p class="col-red mgt10">￥{$g.goods_price}</p>
                              </li>
                              <li class="wr_num">{$g.goods_count}</li>
                            </div>
                                 </volist>
                 </volist>
                          </div>
                          <li class="wr_pay">
                            <if condition="$o['pay_stat'] eq 0">
                              待付预付款
                              <elseif condition="$o['pay_stat'] eq 1"/>
                              待付发货款
                              <elseif condition="$o['pay_stat'] eq 2"/>
                              待付验收款
                              <elseif condition="$o['pay_stat'] eq 3"/>
                              待付质保金
                            </if>
                          </li>
                          <li class="wr_this">
                              <p>{$o.total}</p>
                              <p class=" mgt20">已付 {$o.paid_amount}元</p>
                          </li>
                          <li class="wr_deal">
                              <p class="fw600 col-red fs-16">{$o.pay}元</p>
                          </li>
                          <li class="wr_operation">
                            <p><span class="mgb10"><?php 
                            $time=time();
                            $date=floor(($o['paid_deadline']-$time)/86400); 
                            $hour=floor(($o['paid_deadline']-$time)%86400/3600);
                            $minute=floor(($o['paid_deadline']-$time)%86400/60);
                            echo $date."天";
                            echo $hour."小时";
                            echo $minute."分钟";
                            ?></span></p>
                            <p><button class="bg-clv btn-70x25 col-fff bor-r5 mgb10"> <a href="{:U('Cg/pay',array('oid'=>$o['oid']))}">立即付款</a></button></p>
                          </li>
                      </ul>
                      <div class="foot clearfix">
                        <if condition="$o['status'] eq 0">
                     <img style="width:800px;height:80px;" src="__HOME_PUBLIC__/finance/images/order-status1.png" />
                    <elseif condition="$o['status'] eq 1"/>
                     <img style="width:800px;height:80px;" src="__HOME_PUBLIC__/finance/images/order-status2.png" />
                      <elseif condition="$o['status'] eq 2"/>
                     <img style="width:800px;height:80px;" src="__HOME_PUBLIC__/finance/images/order-status3.png" />
                      <elseif condition="$o['status'] eq 3"/>
                  <img style="width:800px;height:80px;" src="__HOME_PUBLIC__/finance/images/order-status4.png" />
                      <elseif condition="$o['status'] eq 4"/>
                     <img style="width:800px;height:80px;" src="__HOME_PUBLIC__/finance/images/order-status5.png" /> 
                      <elseif condition="$o['status'] eq 5"/>
                    <img style="width:800px;height:80px;" src="__HOME_PUBLIC__/finance/images/order-status6.png" />
                      <elseif condition="$o['status'] eq 6"/>
                      <img style="width:800px;height:80px;" src="__HOME_PUBLIC__/finance/images/order-status7.png" />
                      <elseif condition="$o['status'] eq 7"/>
                      <img style="width:800px;height:80px;" src="__HOME_PUBLIC__/finance/images/order-status8.png" />
                    
                     
                    </if>
                      
                         <!--  <ul class="flow flow_jiaxing fl">
                              <li>商品下单</li>
                              <li>支付预付款</li>
                              <li>商品出库</li>
                              <li>支付发货款</li>
                              <li>供应商发货</li>
                              <li>验收付款</li>
                              <li>付质保金</li>
                              <li>订单完成</li>
                          </ul> -->
                      </div>
                  </li>
                </volist>
              </ul>
          </div>

          <div style="position:relative; left:-400px;">
                      <ul class="pagination pages">
                        {$page}  
                      </ul>
                     </div>
<!--           <div class="clearfix">
            <ul class="pagination clearfix" id="aa" >
              <li class="bor-0">
                  <span class="pg_pre">共4页</span>
              </li>
              <li>
                  <span class="pg_pre">上一页</span>
              </li>
              <li>
                  <span class="pg_curr">1</span>
              </li>
              <li>
                  <a class="pg_link" href="">2</a>
              </li>
              <li>
                  <a class="pg_link" href="">3</a>
              </li>
              <li>
                  <a class="pg_link" href="">4</a>
              </li>
              <li>
                  <a class="pg_next" href="">下一页</a>
              </li>
            </ul>
          </div> -->
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
</html>
 <style> 
  .pages {
    float:right;
  } 
  .pages a,  
  .pages span {  
      display: inline-block;  
      padding: 2px 5px;  
      margin: 0 1px;  
      border: 1px solid #f0f0f0;  
      -webkit-border-radius: 3px;  
      -moz-border-radius: 3px;  
      border-radius: 3px;  
  }  
    
  .pages a,  
  .pages li {  
      display: inline-block;  
      list-style: none;  
      text-decoration: none;  
      color: #58A0D3;  
  }  
    
  .pages a.first,  
  .pages a.prev,  
  .pages a.next,  
  .pages a.end {  
      margin: 0;  
  }  
    
  .pages a:hover {  
      border-color: #50A8E6;  
  }  
    
  .pages span.current {  
      background: #50A8E6;  
      color: #FFF;  
      font-weight: 700;  
      border-color: #50A8E6;  
  }  
  .pages {
    font-size:18px;
  }
</style>