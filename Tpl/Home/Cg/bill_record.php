<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="wap-font-scale" content="no">
	<title>开票记录</title>
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
        <div class="right_con_down bg-fff invoice_0505">
          <div class="title_ty">
            <span class="tit_name">开票记录</span>
          </div>
          <include file="Public/Bill" />
          <form action="{:U('Cg/bill_record')}" method="post">
          <div class="title_ty_smart clearfix">
            <span class="mgl15 mgr5">项目名称</span>
            <select name="pid" id=""  class="btn-120x30">
              <option value="0">全部项目</option>
              <volist name="allitem" id="i">
              <option <?php if($pid && $pid==$i['pid']){echo "selected='selected'";}?> value="{$i.pid}">{$i.pro_name}</option>
           </volist>
            </select>
            <span class="mgl15 mgr5">供应商</span>
            <select name="exid" id=""  class="btn-120x30">
              <option value="0">全部供应商</option>
              <volist name="allex" id="ex">
              <option <?php if($exid && $exid==$ex['exid']){echo "selected='selected'";}?>  value="{$ex.exid}">{$ex.ex_name}</option>
          </volist>
            </select>

            <span class="mgl15 mgr5">订单号</span>
            <input <?php if($order_code){ echo "value='$order_code'";}?>  name="order_code" type="text"  class="btn-120x30">
            <span class="mgw10">起止时间</span>
            <input <?php if($start){echo "value='$start'";}?>  name="start" class="btn-80x30 pdl10 laydate-icon" type="text" id="wrong_start" >
            <span class="mgw10">-</span>
            <input  <?php if($end){echo "value='$end'";}?> name="end" class="btn-80x30 pdl10 laydate-icon" type="text" id="wrong_end" >
            <button class="btn-60x30 bg-slv col-fff fs-14 mgl10 ">搜索</button>
          </div>
        </form>
          <div class="o_invoice_record_right">
             
              <ul>
                 <li>商品信息</li>
                 <li>单价（元）</li>
                 <li>实付单价（元）</li>
                 <li>数量</li>
                 <li>小计（元）</li>
                 <li>发票信息</li>
                 <li>操作</li>
             </ul>
             <volist name="record" id="r">
              <div class="list">
                 <div>
                      <div class="mgr30">
                          <span>订单号：<a class="color_red">{$r.order_code}</a></span>
                      </div>
                      <div class="mgr30">
                          企业内部订单标号：<div>未同步</div>
                      </div>
                      <div class="mgr30">
                        <span>下单时间：</span>
                        <a><?=date('Y-m-d',$r['created']);?></a>
                      </div>
                      <div class="mgr30">
                       <span>供应商：</span>
                       <a class="style">{$r.exname}</a>
                     </div>
                 </div>
                 <div>
                    <span class="mgl10">订单状态：<a>交易中</a></span>
                 </div>
                 
                 <ol class="clearfix" style="height: auto;position: relative;">
                      <div style="">
                        <volist name="r['goods']" id="g">
                        <div class="clearfix">
                          <li>
                              <img src="__UPLOADS__/image/{$g.goods_thumb}" alt="">
                              <span>{$g.goods_name}</span>
                          </li>
                          <li>
                              <span>{$g.goods_preprice}</span>
                          </li>
                          <li>
                              <span>{$g.goods_price}</span>
                          </li>
                          <li>
                              <span>下单量：<a>{$g.goods_count}</a></span>
                             <!--  <span>已开票：<a>0</a></span> -->
                          </li>
                          <li>
                              <span><?=($g['goods_price']*$g.['goods_count'])?></span>
                          </li>
                        </div>
                      </volist>
                      <!--   <div class="clearfix">
                          <li>
                              <img src="images/goods_1.png" alt="">
                              <span>AS超声波流量计</span>
                          </li>
                          <li>
                              <span>100000.00</span>
                          </li>
                          <li>
                              <span>100000.00</span>
                          </li>
                          <li>
                              <span>下单量：<a>1</a></span>
                              <span>已开票：<a>0</a></span>
                          </li>
                          <li>
                              <span>10000.00</span>
                          </li>
                        </div> -->
                      </div>
                      <div class="clearfix" style="position: absolute;top:0;right: 0;width: 968px;">
                        <li class="kaipiao_li">
                            <a class="history_invoice">开票历史</a>
                            <div class="o_invoice_record_hover">
                                <table border="0" cellpadding="0" cellspacing="0">
                                    <tbody><tr>
                                        <td>开票历史如下</td>
                                        <td colspan="6"><img class="o_invoice_record_hoverxxx" src="__HOME_PUBLIC__/finance/images/hbo_invoice_hove_xxx.png" alt=""></td>
                                    </tr>
                                    <tr>
                                        <td>序号</td>
                                        <td>开票日期</td>
                                        <td>发票编号（同批次发票）</td>
                                        <td>开票金额</td>
                                        <td>发票状态</td>
                                        <td>快递公司</td>
                                        <td>快递单号</td>
                                    </tr>
                                    <tr>
                                        <td>{$r.rid}</td>
                                        <td><?=date('Y-m-d',$r['add_time']);?></td>
                                        <td>{$r.invoice_num}</td>
                                        <td>￥{$r.money}</td>
                                        <td><?php if($r['invoice_status']==2){ echo "已确认";}elseif($r['invoice_status']==3){ echo "已拒绝";}else{ echo "待确认";} ?></td>
                                        <td>{$r.pname}</td>
                                        <td>{$r.kuaidi_num}</td>
                                    </tr>
                                    <tr>
                                        <td>已开票总金额</td>
                                        <td colspan="6" class="color_red">￥{$r.money}</td>
                                    </tr>
                                </tbody></table>
                            </div>
                        </li>
                        <li style="width: 120px;float: right;">
                            <span><?php if($r['invoice_status']==2){ echo "已确认";}elseif($r['invoice_status']==3){ echo "已拒绝";}else{ echo "待确认";} ?></span>
                        </li>
                      </div>
                 </ol>
            
                 <div class="list_bottom1">
                     <div class="fl">
                        <span>最新开票时间</span><span><?=date('Y-m-d H:i:s',$r['add_time']);?></span>
                     </div>
                     <div class="fr">
                        <!-- <span>待开票合计:</span><span>￥</span> -->
                        <span>已开票合计:</span><span class="col-red">￥{$r.money}</span>
                     </div>
                 </div>
             </div>
   </volist>
     <div style="position:relative; left:0px;">
                      <ul class="pagination pages">
                        {$page}  
                      </ul>
                     </div>
<!--               <div class="list">
                 <div>
                      <div class="mgr30">
                          <span>订单号：<a class="color_red">80000000000141601</a></span>
                      </div>
                      <div class="mgr30">
                          企业内部订单标号：<div>未同步</div>
                      </div>
                      <div class="mgr30">
                        <span>下单时间：</span>
                        <a>2016-10-01 15:48:16</a>
                      </div>
                      <div class="mgr30">
                       <span>供应商：</span>
                       <a class="style">永一集团阀门有限公司</a>
                     </div>
                 </div>
                 <div>
                    <span class="mgl10">订单状态：<a>交易中</a></span>
                 </div>
                 <ol>
                      <li>
                          <img src="__HOME_PUBLIC__/finance/images/goods_1.png" alt="">
                          <span>AS超声波流量计</span>
                      </li>
                      <li>
                          <span>100000.00</span>
                      </li>
                      <li>
                          <span>100000.00</span>
                      </li>
                      <li>
                          <span>下单量：<a>1</a></span>
                          <span>已开票：<a>0</a></span>
                      </li>
                      <li>
                          <span>10000.00</span>
                      </li>
                      <li>
                          <span>待开</span>
                      </li>
                      <li>
                          <a class="history_invoice">开票历史</a>
                          <div class="o_invoice_record_hover">
                              <table border="0" cellpadding="0" cellspacing="0">
                                  <tbody><tr>
                                      <td>该商品的开票历史如下</td>
                                      <td colspan="6"><img class="o_invoice_record_hoverxxx" src="__HOME_PUBLIC__/finance/images/hbo_invoice_hove_xxx.png" alt=""></td>
                                  </tr>
                                  <tr>
                                      <td>序号</td>
                                      <td>开票日期</td>
                                      <td>发票编号（同批次发票）</td>
                                      <td>开票金额</td>
                                      <td>发票状态</td>
                                      <td>快递公司</td>
                                      <td>快递单号</td>
                                  </tr>
                                  <tr>
                                      <td>1</td>
                                      <td>1016-10-19</td>
                                      <td>1234556</td>
                                      <td>￥10000.00</td>
                                      <td>已确认</td>
                                      <td>圆通快递</td>
                                      <td>123456</td>
                                  </tr>
                                  <tr>
                                      <td>已开票总金额</td>
                                      <td colspan="6" class="color_red">￥10000.00</td>
                                  </tr>
                              </tbody></table>
                          </div>
                      </li>
                 </ol>
                 <div class="list_bottom1">
                     <div class="fl">
                        <span>最新开票时间</span><span>2011-01-01 12:01:01</span>
                     </div>
                     <div class="fr">
                        <span>待开票合计:</span><span>￥140.00</span>
                        <span>已开票合计:</span><span class="col-red">￥140.00</span>
                     </div>
                 </div>
             </div> -->
<!--               <div class="list">
                 <div>
                      <div class="mgr30">
                          <span>订单号：<a class="color_red">80000000000141601</a></span>
                      </div>
                      <div class="mgr30">
                          企业内部订单标号：<div>未同步</div>
                      </div>
                      <div class="mgr30">
                        <span>下单时间：</span>
                        <a>2016-10-01 15:48:16</a>
                      </div>
                      <div class="mgr30">
                       <span>供应商：</span>
                       <a class="style">永一集团阀门有限公司</a>
                     </div>
                 </div>
                 <div>
                    <span class="mgl10">订单状态：<a>交易中</a></span>
                 </div>
                 <ol>
                      <li>
                          <img src="__HOME_PUBLIC__/finance/images/goods_1.png" alt="">
                          <span>AS超声波流量计</span>
                      </li>
                      <li>
                          <span>100000.00</span>
                      </li>
                      <li>
                          <span>100000.00</span>
                      </li>
                      <li>
                          <span>下单量：<a>1</a></span>
                          <span>已开票：<a>0</a></span>
                      </li>
                      <li>
                          <span>10000.00</span>
                      </li>
                      <li>
                          <span>待开</span>
                      </li>
                      <li>
                          <a class="history_invoice">开票历史</a>
                          <div class="o_invoice_record_hover">
                              <table border="0" cellpadding="0" cellspacing="0">
                                  <tbody><tr>
                                      <td>该商品的开票历史如下</td>
                                      <td colspan="6"><img class="o_invoice_record_hoverxxx" src="__HOME_PUBLIC__/finance/images/hbo_invoice_hove_xxx.png" alt=""></td>
                                  </tr>
                                  <tr>
                                      <td>序号</td>
                                      <td>开票日期</td>
                                      <td>发票编号（同批次发票）</td>
                                      <td>开票金额</td>
                                      <td>发票状态</td>
                                      <td>快递公司</td>
                                      <td>快递单号</td>
                                  </tr>
                                  <tr>
                                      <td>1</td>
                                      <td>1016-10-19</td>
                                      <td>1234556</td>
                                      <td>￥10000.00</td>
                                      <td>已确认</td>
                                      <td>圆通快递</td>
                                      <td>123456</td>
                                  </tr>
                                  <tr>
                                      <td>已开票总金额</td>
                                      <td colspan="6" class="color_red">￥10000.00</td>
                                  </tr>
                              </tbody></table>
                          </div>
                      </li>
                 </ol>
                 <div class="list_bottom1">
                     <div class="fl">
                        <span>最新开票时间</span><span>2011-01-01 12:01:01</span>
                     </div>
                     <div class="fr">
                        <span>待开票合计:</span><span>￥140.00</span>
                        <span>已开票合计:</span><span class="col-red">￥140.00</span>
                     </div>
                 </div>
             </div> -->
          </div>
          <div class="clearfix">
            <!-- <ul class="pagination clearfix" id="aa" >
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
            </ul> -->
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