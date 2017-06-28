<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="wap-font-scale" content="no">
	<title>付款记录</title>
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
        <div class="right_con_down query_0502 record_0504 bg-fff">
          <div class="title_ty">
            <span class="tit_name">付款记录</span>
          </div>
          <form action="{:U('Cg/pay_record')}" method="post">
          <div class="title_ty_smart clearfix condition">
            <div class="fl tianshu_xuanze">
              <span class="mgw20">付款记录</span>
              <button name="one" value="1" class="btn-80x30 bor_1ddd mgr20 <?php if($one){ echo "active";}?> ">7日数据</button>
              <button name="two" value="2" class="btn-80x30 bor_1ddd mgr20 <?php if($two){ echo "active";}?>">30日数据</button>
            </div>
            <div class="fr">
             <!--  <span class="btn-80x30 col-qlv bor_1qlv mgr10">下载表单</span> -->
            </div>
          </div>
          <div class="title_ty_smart clearfix condition">
            <div class="fl">
              <span class="mgw10">付款金额: <i class="col-red fs-20 fw600 porb3">￥{$yfks}</i></span>
              <input <?php if($order_code){echo "value='$order_code'";}?> name="order_code" type="text" class="btn-120x30 pdl10 mgl20" placeholder="订单号">
              <select class="btn-120x30" name="exid" id="">
                <option value="0">全部供应商</option>
                <volist name="allex" id="e">
                <option <?php if($exid && $exid==$e['exid']){ echo "selected='selected'";}?> value="{$e.exid}">{$e.ex_name}</option>
              </volist>
              </select>
              <select class="btn-120x30" name="status" id="">
                <option value="0">全部付款状态</option>
                <option <?php if($status && $status==1){ echo "selected='selected'";}?> value="1">预付款</option>
                <option <?php if($status && $status==2){ echo "selected='selected'";}?>  value="2">发货款</option>
                <option <?php if($status && $status==3){ echo "selected='selected'";}?>  value="3">验收款</option>
                <option <?php if($status && $status==4){ echo "selected='selected'";}?>  value="4">质保金</option>
              </select>
              <span class="mgw10">起止时间</span>
              <input  <?php if($start){echo "value='$start'";}?> name="start" class="btn-80x30 pdl10 laydate-icon" type="text" id="wrong_start" >
              <span class="mgw10">-</span>
              <input  <?php if($end){echo "value='$end'";}?>  name="end" class="btn-80x30 pdl10 laydate-icon" type="text" id="wrong_end" >
              <button class="btn-60x30 bg-slv col-fff fs-14 mgl10 ">搜索</button>
            </div>

            <div class="fr">
              
            </div>
          </div>
        </form>
          <div class="con">
              <ul class="wr_nav bg-fb clearfix">
                  <li class="wr_img">&nbsp;</li>
                  <li class="wr_info">商品信息</li>
                  <li class="wr_price">单价</li>
                  <li class="wr_num">数量</li>
                  <li class="wr_pay">付款状态</li>
                  <li class="wr_this">订单金额</li>
                  <li class="wr_deal">本次需支付</li>
                  <li class="wr_operation">订单状态</li>
                  <li class="wr_ply_time">付款时间</li>
              </ul>
              <ul class="wr_list">
                <volist name="pr" id="p">
                  <li class="wr_lump">
                      <div class="wr_tit clearfix bg-f5 pd10">
                          <div class="fl">
                              <span class="font-weight600 mgl10"><?=date('Y-m-d',$p['created']);?></span>
                              <span class="font-weight400 mgl20 mgr35">订单号:{$p.order_code}</span>
                              <span class="mgl35 pdl35 col-clv">供应商:{$p.ex_name}</span>
                          </div>
                      </div>
                      <ul class="wr_con clearfix">
                          <div class="xq_lump_list fl">
           <!--                  <div class="xq_lump_li clearfix">
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
                    <volist name="p['goods']" id="og">
                        <volist name="og" id="g">
                            <div class="xq_lump_li clearfix">
                              <li class="wr_img"><img src="__UPLOADS__/{$g.goods_thumb}" alt=""></li>
                              <li class="wr_info">
                                  <p>{$g.goods_name}</p>
                                  <p class="mgt10">{$g.goods_code}</p>
                                  <!-- <p class="col-999 mgt10"><span>颜色:蓝色</span><span>尺码 XXL</span></p> -->
                              </li>
                              <li class="wr_price">
                                  <p class="text-del col-999">￥{$g.goods_preprice}</p>
                                  <p class="col-red mgt10">￥{$g.goods_price}</p>
                              </li>
                              <li class="wr_num"> {$g.goods_count}</li>
                            </div>
                    </volist>
                      </volist>
                          </div>
                          <li class="wr_pay">
                            <!-- <p>88</p> -->
                              <p class=" mgt20">
                                <if condition="$p['service_type'] eq 1">
                                  预付款
                                  <elseif condition="$p['service_type'] eq 2" />
                                  发货款
                                   <elseif condition="$p['service_type'] eq 3" />
                                  验收款
                                   <elseif condition="$p['service_type'] eq 4" />
                                  质保金
                                   <elseif condition="$p['service_type'] eq 5" />
                                  退款
                                   <elseif condition="$p['service_type'] eq 0" />
                                   待付预付款
                                </if>
                              </p>
                          </li>
                          <li class="wr_this">
                              <p class="col-juse fw600 fs-16">{$p.total}元</p>
                              <p class="col-999 mgt15">
                                <if condition="$p['service_type'] eq 1" >
                                (预付款{$p.prepayment}%)
                                <elseif condition="$p['service_type'] eq 2" />
                                (发货款{$p.payment_ratio}%)
                                <elseif condition="$p['service_type'] eq 3" />
                                (验收款{$p.inspection}%)
                                <elseif condition="$p['service_type'] eq 4" />
                                (质保金{$p.warranty}%)
                                <elseif condition="$p['service_type'] eq 5" />
                                (退款)
                              </if>

                              </p>
                          </li>
                          <li class="wr_deal">
                              <p class="">{$p.amount}元</p>
                          </li>
                          <li class="wr_operation">
                            <if condition="$p['status'] eq 0">
                              商品下单
                              <elseif  condition="$p['status'] eq 1" />
                              支付预付款
                              <elseif  condition="$p['status'] eq 2" />
                              商品出库
                              <elseif  condition="$p['status'] eq 3" />
                              支付发货款
                              <elseif  condition="$p['status'] eq 4" />
                              供应商发货
                              <elseif  condition="$p['status'] eq 5" />
                              付验收款
                              <elseif  condition="$p['status'] eq 6" />
                              付质保金
                              <elseif  condition="$p['status'] eq 7" />
                              订单完成
                            </if>
                          </li>
                          <li class="wr_ply_time">
                            <a href="{:U('Cg/order_details',array('oid'=>$p['oid']))}"><p class="col-lan">付款详情</p></a>
                            <p class="mgt10"><?=date('Y-m-d',$p['paid_time'])?></p>
                            <p class="mgt10"><?=date('H:i',$p['paid_time'])?></p>
                          </li>
                      </ul>
                      <div class="foot clearfix">
                      <if condition="$p['status'] eq 0">
                     <img style="width:800px;height:80px;" src="__HOME_PUBLIC__/finance/images/order-status1.png" />
                    <elseif condition="$p['status'] eq 1"/>
                     <img style="width:800px;height:80px;" src="__HOME_PUBLIC__/finance/images/order-status2.png" />
                      <elseif condition="$p['status'] eq 2"/>
                     <img style="width:800px;height:80px;" src="__HOME_PUBLIC__/finance/images/order-status3.png" />
                      <elseif condition="$p['status'] eq 3"/>
                  <img style="width:800px;height:80px;" src="__HOME_PUBLIC__/finance/images/order-status4.png" />
                      <elseif condition="$p['status'] eq 4"/>
                     <img style="width:800px;height:80px;" src="__HOME_PUBLIC__/finance/images/order-status5.png" /> 
                      <elseif condition="$p['status'] eq 5"/>
                    <img style="width:800px;height:80px;" src="__HOME_PUBLIC__/finance/images/order-status6.png" />
                      <elseif condition="$p['status'] eq 6"/>
                      <img style="width:800px;height:80px;" src="__HOME_PUBLIC__/finance/images/order-status7.png" />
                      <elseif condition="$p['status'] eq 7"/>
                      <img style="width:800px;height:80px;" src="__HOME_PUBLIC__/finance/images/order-status8.png" />
                    
                     
                    </if>
                          <!-- <ul class="flow flow_jiaxing fl">
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