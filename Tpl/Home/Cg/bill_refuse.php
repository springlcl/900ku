<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="wap-font-scale" content="no">
	<title>已拒绝发票</title>
  <link rel="stylesheet" href="__HOME_PUBLIC__/finance/css/exhibition_hall_style.css">
	<link rel="stylesheet" href="__HOME_PUBLIC__/finance/css/swiper.min.css">
	<link rel="stylesheet" href="__HOME_PUBLIC__/finance/css/icons.css">
	<link rel="stylesheet" href="__HOME_PUBLIC__/finance/css/reset.css">
	<link rel="stylesheet" href="__HOME_PUBLIC__/finance/css/style.css">
    <link rel="stylesheet" href="__HOME_PUBLIC__/finance/css/layer.css">
</head>
<body>
<include file="Public/Cgheader" />
<!-- ++++++++++++++++++++++++++++++++++++++ -->
<div class="wh1200auto clearfix">
<include file="Public/Finance" />
      <div class="caiwu_right fl">
        <div class="right_con_down bg-fff invoice_0505">
          <div class="title_ty">
            <span class="tit_name">已拒绝发票</span>
          </div>
<include file="Public/Bill" />
      <form action="{:U('Cg/bill_refuse')}" method="post">
          <div class="title_ty_smart clearfix">
            <span class="mgl15 mgr5">项目名称</span>
            <select name="item" id=""  class="btn-120x30">
              <option value="0">全部项目</option>
              <volist name="item" id="i">
              <option <?php if($pitem && $pitem==$i['pid']){ echo "selected='selected'";}?> value="{$i.pid}">{$i.pro_name}</option>
            </volist>
            </select>
            <span class="mgl15 mgr5">供应商</span>
            <select name="exid" id=""  class="btn-120x30">
              <option value="0">全部供应商</option>
              <volist name="res" id="r">
              <option <?php if($pexid && $pexid==$r['exid']){ echo "selected='selected'";}?>  value="{$r.exid}">{$r.ex_name}</option>
            </volist>
            </select>
            <span class="mgl15 mgr5">订单号</span>
            <input <?php if($porder_code){ echo "value='$porder_code'";}?> name="order_code" type="text"  class="btn-120x30">
            <span class="mgw10">起止时间</span>
            <input <?php if($pstart){ echo "value='$pstart'";}?>  name="start" class="btn-80x30 pdl10 laydate-icon" type="text" id="wrong_start" >
            <span class="mgw10">-</span>
            <input <?php if($pend){ echo "value='$pend'";}?>  name="end" class="btn-80x30 pdl10 laydate-icon" type="text" id="wrong_end" >
            <button class="btn-60x30 bg-slv col-fff fs-14 mgl10 ">搜索</button>
          </div>
        </form>
          <div class="con">
              <ul class="wr_nav bg-fb clearfix">
                   <li class="entry mgl35">发票条目</li>
                   <li class="number">发票编号</li>
                   <li class="money">金额</li>
                   <li class="state">发票状态</li>
                   <li class="operation">操作</li>
              </ul>
              <ul class="wr_list clearfix">
                <volist name="invone" id="v">
                <li class="wr_lump">
                      <div class="wr_tit clearfix bg-f5 pd10">
                          <div class="fl">
                              <span class="font-weight600 mgl10">开票日期：<?=date('Y-m-d',$v['add_time']);?></span>
                              <span class="mgl35 pdl35 col-clv">供应商:{$v.ex_name}</span>
                          </div>
                      </div>
                      <ul class="wr_con clearfix">
                          <li class="entry mgl35">
                            <p>包含订单编号：</p>
                              <p class=" mgt10">{$v.order_code}</p>
                          </li>
                          <li class="number">
                              <p class="">{$v.invoice_num}</p>
                          </li>
                          <li class="money">
                              <p class="col-red">{$v.money}</p>
                          </li>
                          <li class="state">
                            <if condition="$v['invoice_status'] eq 1">
                            待确认
                            <elseif  condition="$v['invoice_status'] eq 2" />
                              已确认
                               <elseif  condition="$v['invoice_status'] eq 3" />
                                已拒绝
                          </if>
                          </li>
                          <li class="operation">
                            <!-- <button>确认</button> -->
                            <i class="ico_all I_shuxian porb2"></i>
                            <button onclick="opendiv({$v['rid']});"  class="hbo_invoice_ck">查看</button>



                           <!--  <div class="hbo_invoice_hover" >
                                   <div class="top">
                                     信息详情
                                     <img class="hbo_invoice_hoverxxx" src="__HOME_PUBLIC__/finance/images/hbo_invoice_hove_xxx.png" alt="">
                                   </div>
                                   <table border="0" cellpadding="0" cellspacing="0">
                                      <tbody><tr>
                                        <td>序号</td>
                                        <td>发票金额</td>
                                        <td>发票种类</td>
                                        <td>发票编号</td>
                                        <td>发票状态</td>
                                      </tr>
                                      <tr>
                                        <td>1</td>
                                        <td style="color:#E40114">990.00</td>
                                        <td>17%进项税，中国</td>
                                        <td>9999</td>
                                        <td style="color:#11A89F" rowspan="2">待确认</td>
                                      </tr>
                                      <tr>
                                        <td colspan="4">
                                          发票合计：
                                          <span>990.00</span>
                                        </td>
                                        <td></td>
                                      </tr>
                                      <tr>
                                        <td colspan="5">
                                          <span>
                                            快递公司：
                                            <b>中通快递</b>
                                          </span>
                                          <span>
                                            快递单号：
                                            <b>99999999999999999</b>
                                          </span>
                                        </td>
                                      </tr>
                                   </tbody></table>
                                   <ul>
                                     <table>
                                       <tbody><tr>
                                         <td>开票条目</td>
                                         <td></td>
                                         
                                         <td></td>
                                         <td>金额</td>
                                       </tr>
                                       <tr>
                                         <td colspan="4">
                                           <span>开票编号：<b>49</b></span>
                                           <span>开票日期：<b>2016-10-21</b></span>
                                           <span>供应商：<b>永一阀门集团有限公司</b></span>
                                         </td>
                                        
                                       </tr>
                                       <tr>
                                         <td colspan="4">
                                           <span>订单编号：<b>800000000071001</b></span>
                                           <span>下单时间：<b>2016-10-21 15:05:11</b></span>
                                         </td>
                                       </tr>
                                       <tr>
                                         <td colspan="3">
                                           <img src="__HOME_PUBLIC__/finance/images/goods_1.png" alt="">
                                           <span>节流截止放空阀</span>
                                           <div>
                                             <span class="text-del">原单价：<b>999.00</b></span>
                                             <span class="col-red fw600">实付单价：￥999.00</span>
                                             <span>总件数：<b>999.00</b></span>
                                             <span>已开票：<b>1</b></span>
                                           </div>
                                           
                                         </td>
                                         <td>990.00</td>
                                       </tr>
                                       <tr>
                                         <td colspan="3">
                                            <span>运费：<b>0.00</b></span>
                                            <span>总费用：<b>0.00</b></span>
                                            <span>已开：<b>0.00</b></span>
                                          </td>
                                         <td>0.00</td>
                                       </tr>
                                       <tr>
                                         <td colspan="4">
                                           <span>合计：<b>990.00</b></span>
                                         </td>
                                       </tr>
                                       <tr>
                                         <td colspan="4">
                                           <button class="btn-60x30 bg-slv col-fff fs-14 mgl10 hbo_invoice_hoverxxx">确定</button>
                                           <button class="btn-60x30 bg-slv col-fff fs-14 mgl10 hbo_invoice_hoverxxx">取消</button>
                                         </td>
                                       </tr>
                                     </tbody></table>
                                   </ul>
                                </div> -->

                                
                          </li>
                      </ul>
                  </li>
                </volist>

              </ul>

          </div>

 <div style="position:relative; left:0px;">
                      <ul class="pagination pages">
                        {$page}  
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
<script type="text/javascript" src="__HOME_PUBLIC__/finance/js/layer/layer.js"></script>
<script>
function opendiv(rid){
$.ajax({
                  type: 'post',
                  url: "{:U('Cg/bill_details')}",
                  data: {'rid':rid},
                  dataType: 'json',
                  async: false,
                  success: function(data)
                  {
                    if(data)
                    { 
                      // alert(1);
                      // console.log(data);
layer.open({
    area: ['950px', '450px'], //宽高
          title: [
            '信息详情',
            // 'background-color: green; color:#fff;'<div class='hbo_invoice_hover'></div><div class='top'>信息详情<img class='hbo_invoice_hoverxxx' src='__HOME_PUBLIC__/finance/images/hbo_invoice_hove_xxx.png' alt=''></div>
          ]
          ,content:
            data,
                 btn: ['确认发票', '返回'],
                 yes: function(index){
                  // alert(rid);
                  $.ajax({
                  type: 'post',
                  url: "{:U('Cg/sure_bill')}",
                  data: {'rid':rid},
                  dataType: 'json',
                  async: false,
                  success: function(data)
                  {
                    if(data){
                      // alert(rid);
                     location.reload();
                    }else{

                    }
                  }
                });
                // layer.close(index);
              
    }
        });   
                           
                    }
                }
              });


}

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