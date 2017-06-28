<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="wap-font-scale" content="no">
	<title>准入订单</title>
    <link rel="stylesheet" href="__HOME_PUBLIC__/cg_admit_order/css/exhibition_hall_style.css">
	<link rel="stylesheet" href="__HOME_PUBLIC__/cg_admit_order/css/swiper.min.css">
	<link rel="stylesheet" href="__HOME_PUBLIC__/cg_admit_order/css/icons.css">
	<link rel="stylesheet" href="__HOME_PUBLIC__/cg_admit_order/css/reset.css">
	<link rel="stylesheet" href="__HOME_PUBLIC__/cg_admit_order/css/style.css">
</head>
<body>
 <include file="Public/Cgheader" />
<!-- ++++++++++++++++++++++++++++++++++++++ -->
    <div class="t_f_management_con order_payment_enquiry_con">
        <div class="order_payment_enquiry_right">
          <div class="zhunruAndFeizhunru">
          	<a href="{:U('Cg/cg_admit_order')}"><span class="active">准入订单</span></a>
          	<a href="{:U('Cg/cg_no_admit_order')}"><span>非准入订单</span></a>
          </div>
          <div class="order_myself_center bor_1ddd  pdb20">
            <form action="{:U('Cg/cg_admit_order')}" method="post">
            <ul class="order_myself_center_1">
                <li class="btn"><div><button>订单搜索</button></div></li>
                <li><input type="search" name="user_search" placeholder="&nbsp;输入订单号进行搜索" /></li>
            </ul>
          </form>
            <br>
           
            <ul class="order_myself_center_2">
              <form action="{:U('Cg/cg_admit_order')}" method="post">
                <li>
                    <div class="wh50 text-right">供应商</div>
                </li>
                 
                <li>
                    <select name="ex" id="">
                        <option value="0">全部</option>
                        <volist name="odata" id="od">
                        <option <?php if($exid && $exid==$od['exid']){echo "selected='selected'";}?> value="{$od.exid}">{$od.ex_name}</option>
                        
                      </volist>
                    </select>
                </li>
                <li>
                    <div class="wh50 text-right">成交时间</div>
                </li>
                <li>
                    <input <?php if($st){ echo "value=".$st;} ?> type="search" name="start" class="order_time" placeholder="&nbsp;请选择时间范围起始" id="wrong_start">
                    <input <?php if($e){ echo "value=".$e;} ?> type="search" name="end" class="order_time" placeholder="&nbsp;请选择时间范围结束" id="wrong_end">
                </li>
            </ul>
           
            <ul class="order_myself_center_3">
                <li>
                    <div class="wh50 text-right">付款状态</div>
                </li>
                <li>
                    <select name="pay_status" id="">
                        <option value="all">全部</option>
                        <option <?php if($ps==0 ){ echo "selected='selected'";} ?>  value="0">待付预付款</option>
                        <option <?php if($ps && $ps==1){ echo "selected='selected'";} ?>   value="1">预付款已付</option>
                        <option <?php if($ps && $ps==2){ echo "selected='selected'";} ?>    value="2">发货款已付</option>
                        <option <?php if($ps && $ps==3){ echo "selected='selected'";} ?>    value="3">验收款已付</option>
                        <option <?php if($ps && $ps==4){ echo "selected='selected'";} ?>    value="4">质保金已付</option>
                        
                    </select>
                </li>
                <li>
                    <div class="wh50 text-right">交易状态</div>
                </li>
                <li>
                    <select name="buy_status" id="">
                        <option value="all">全部</option>
                       <!--  <option value="">{$bs}</option> -->
                        <option <?php if(!$bs ){ echo "selected='selected'";} ?> value="0">商品下单</o4tion>
                        <option <?php if($bs && $bs==1){ echo "selected='selected'";} ?>  value="1">支付预付款</option>
                        <option <?php if($bs && $bs==2){ echo "selected='selected'";} ?>  value="2">确认出库</option>
                        <option <?php if($bs && $bs==3){ echo "selected='selected'";} ?>  value="3">付发货款</option>
                        <option <?php if($bs && $bs==4){ echo "selected='selected'";} ?>  value="4">确认发货</option>
                        <option <?php if($bs && $bs==5){ echo "selected='selected'";} ?>  value="5">付验收款</option>
                        <option <?php if($bs && $bs==6){ echo "selected='selected'";} ?>  value="6">确认收到验收款</option>
                        <option <?php if($bs && $bs==7){ echo "selected='selected'";} ?>  value="7">付质保金</option>
                        <option <?php if($bs && $bs==8){ echo "selected='selected'";} ?>   value="8">确认收到质保金（订单完成）</option>
                        <option <?php if($bs && $bs==9){ echo "selected='selected'";} ?>   value="9">申请退款中</option>
                        <option <?php if($bs && $bs==10){ echo "selected='selected'";} ?>   value="10">确认申请并退款中</option>
                        <option <?php if($bs && $bs==11){ echo "selected='selected'";} ?>   value="11">收到退款并退款成功交易关闭</option>
                    </select>
                </li>
               <li class="btn"><div><button>订单筛选</button></div></li>
                 </form>
              </ul>
          
           </div>
           <ul class="order_payment_enquiry_ul bg-fb">
               <li></li>
               <li>商品</li>
               <li>单价</li>
               <li>数量</li>
               <li>付款状态</li>
               <li>交易状态</li>
               <li>本次需支付</li>
               <li>交易操作</li>
           </ul>
<volist name="oid" id="o">
           <ol class="order_payment_enquiry_ol">
               <div>
                   <span><input type="checkbox"><a><?=date('Y-m-d',$o['created']);?></a></span>
                   <span>订单号：<a>{$o.order_code}</a></span>
                   <span>供应商：<a>{$o.ex_name}</a></span>
                   <span>总额：<a>{$o.total}元</a></span>
                   <span>已付：<a>{$o.paid_amount}元</a></span>
               </div>
               <li>
                <volist name="o['goods']" id="og">
                  <volist name="og" id="g">
                   <div>
                       <img src="__UPLOADS__/{$g.goods_thumb}" alt="">
                       <div>
                           <span>{$g.goods_name}</span>
                            <a><?php $res=M('goods_sku')->field('attributes')->where('sku_id='.$g['sku_id'])->find(); echo $res['attributes'];?></a>
                       </div>
                       <div>
                           <span>￥{$g.goods_preprice}</span>
                           <a>￥{$g.goods_price}</a>
                       </div>
                       <div>
                           {$g.goods_count}
                       </div>
                       
                   </div>
                 </volist>
                 </volist>
        <!--            <div>
                       <img src="__HOME_PUBLIC__/cg_admit_order/images/5.jpg" alt="">
                       <div>
                           <span>【天天特价】秋装男士长袖衬衫男大码韩版修身纯棉衬衣拼接衬衫潮（交易快照）</span>
                            <a>颜色：<b>889蓝色</b>尺码：<b>3XL</b></a>
                       </div>
                       <div>
                           <span>￥160.00</span>
                           <a>￥88.00</a>
                       </div>
                       <div>
                           1
                       </div>
                       
                   </div> -->
                   <!-- {$o.status} -->
                   <ul <if condition="$o['status'] eq 0">
                    style="background: url(__HOME_PUBLIC__/finance/images/order-status1.png)30px 9px no-repeat;background-size: 85% 60px;"
                    <elseif condition="$o['status'] eq 1"/>
                     style="background: url(__HOME_PUBLIC__/finance/images/order-status2.png)30px 9px no-repeat;background-size: 85% 60px;"
                      <elseif condition="$o['status'] eq 2"/>
                     style="background: url(__HOME_PUBLIC__/finance/images/order-status3.png)30px 9px no-repeat;background-size: 85% 60px;"
                      <elseif condition="$o['status'] eq 3"/>
                     style="background: url(__HOME_PUBLIC__/finance/images/order-status4.png)30px 9px no-repeat;background-size: 85% 60px;"
                      <elseif condition="$o['status'] eq 4"/>
                      style="background: url(__HOME_PUBLIC__/finance/images/order-status5.png)30px 9px no-repeat;background-size: 85% 60px;"
                      <elseif condition="$o['status'] eq 5"/>
                     style="background: url(__HOME_PUBLIC__/finance/images/order-status6.png)30px 9px no-repeat;background-size: 85% 60px;"
                      <elseif condition="$o['status'] eq 6"/>
                     style="background: url(__HOME_PUBLIC__/finance/images/order-status7.png)30px 9px no-repeat;background-size: 85% 60px;"
                      <elseif condition="$o['status'] eq 7"/>
                     style="background: url(__HOME_PUBLIC__/finance/images/order-status8.png)30px 9px no-repeat;background-size: 85% 60px;"
                     
                    </if>>
                  
                   
                   <!--     <li>商品下单</li>
                       <li>支付预付款</li>
                       <li>商品出库</li>
                       <li>支付发货款</li>
                       <li>供应商发货</li>
                       <li>验收付款</li>
                       <li>付质保金</li>
                       <li>订单完成</li> -->
                   </ul>
               </li>
               <li>
                  <span>
                  <if condition="$o['pay_stat'] eq 0">
                    待付预付款
                    <elseif condition="$o['pay_stat'] eq 1" />
                      预付款已付
                    <elseif condition="$o['pay_stat'] eq 2" />
                      发货款款已付
                    <elseif condition="$o['pay_stat'] eq 3" />
                      验收款已付
                    <elseif condition="$o['pay_stat'] eq 4" />
                      质保金已付
                      </if>
                 </span>
               </li>
               <li>
                   <span>
                 <if condition="$o['deal_stat'] eq 0">
                  商品下单
                  <elseif condition="$o['deal_stat'] eq 1" />
                  支付预付款
                  <elseif condition="$o['deal_stat'] eq 2" />
                  确认出库
                  <elseif condition="$o['deal_stat'] eq 3" />
                  付发货款
                  <elseif condition="$o['deal_stat'] eq 4" />
                  确认发货
                  <elseif condition="$o['deal_stat'] eq 5" />
                  付验收款
                  <elseif condition="$o['deal_stat'] eq 6" />
                  确认收到验收款
                  <elseif condition="$o['deal_stat'] eq 7" />
                  付质保金
                  <elseif condition="$o['deal_stat'] eq 8" />
                  订单完成
                  <elseif condition="$o['deal_stat'] eq 9" />
                  申请退款中
                  <elseif condition="$o['deal_stat'] eq 10" />
                  确认申请并退货中
                  <elseif condition="$o['deal_stat'] eq 11" />
                 <!--  收到退货并退款成功 -->
                  交易关闭
          </if>
                  </span>
                   <a href="{:U('Cg/order_details',array('oid'=>$o['oid']))}">
                      订单详情
                      
                   </a>
               </li>
               <li>
                   <a>{$o.pay}元</a>
                  <!--  <span>(预付款<b>25%</b>)</span> -->
               </li>
               <li class="center">
                   <a href="{:U('Cg/pay',array('oid'=>$o['oid']))}">立即付款</a>
                   <span oid="{$o.oid}" class="del_bnt cur-p">
                        取消订单
                   </span>
               </li>
           </ol>
           </volist>
        </div>

    </div>
    <div style="position:relative; left:-600px;">
                      <ul class="pagination pages">
                        {$page}  
                      </ul>
                     </div>
<!-- ++++++++++++++++++++++++++++++++++++++ -->



<include file="Public/Foot" />

      <!-- 删除弹框 -->
  <div class="protection">
    <div class="tanchu_box delTanBox">
      <span id="x" class="gb close_btn"><i></i></span>
      <h3 class="tit"><i></i>您确定要删除吗？</h3>
      <div class="btn">
        <button id="sure" oids="" class="btn-lan-80 mgw15">确定</button>
        <button id="close" oidc="" class="btn-lan-80 mgw15 close_btn">取消</button>
      </div>
      <div class="prompt">温馨提示：删除后不能恢复！</div>
    </div>
  </div>
</body>
</body>
<script type="text/javascript" src="__HOME_PUBLIC__/cg_admit_order/js/jquery.min.js"></script>
<script type="text/javascript" src="__HOME_PUBLIC__/cg_admit_order/laydate/laydate.js"></script>
<script type="text/javascript" src="__HOME_PUBLIC__/cg_admit_order/js/js.js"></script>
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

//订单取消setAttribute
  $(".cur-p").bind('click',function(){
      var oid=$(this).attr('oid');
      $("#sure").attr('oids',oid);
      $("#close").attr('oidc',oid);
      // alert(oid);
    });

    $("#sure").bind('click',function(){
      var oid=$(this).attr('oids');
      $.ajax({
                  type: 'post',
                  url: "{:U('Cg/order_del')}",
                  data: {'oid':oid},
                  dataType: 'json',
                  async: false,
                  success: function(data)
                  {
                    if(data)
                    {
                    location.reload(); 
                     }else{
                      // location.reload(); 
                     }
                   }
      });
    });
    $("#close").bind('click',function(){
      // var oid=$(this).attr('oids');
      // location.reload() ; 
      $(".protection").hide(0);
      $(".protection .delTanBox").hide(0);                                 
    });

        $("#x").bind('click',function(){
      // var oid=$(this).attr('oids');
      // location.reload() ; 
      $(".protection").hide(0);
      $(".protection .delTanBox").hide(0);                                 
    });
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