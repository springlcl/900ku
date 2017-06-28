<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8"><meta http-equiv="keywords" content="keyword1,keyword2,keyword3">
      <meta http-equiv="description" content="this is my page">
	<title>发票导出</title>
    <link rel="stylesheet" href="__SUP_PUBLIC__/css/style.css">
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries--><!--[if lt IE 9]><script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script><script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<body>
<!-- 左导一 -->
  <include file='Public/firstSidebar' />
<!-- 左导二 -->
  <include file='left' />
 <!-- 右侧 内容-->
 <div class="clearfix container" id="app-container">
    <div class="cont_lump cont_lump_sell cont_lump_qpolice l_fapiap">
      <div class="cont_title">
        <span>发票导出</span> 
      </div>
      <div class="con bor_bm1">
          <div class="l_nav">
            <span class="img"></span>
            <span class="kaipiao">开票条目</span>
            <span class="danjia">单价</span>
            <span class="shuliang">数量</span>
            <span class="moneys">金额</span>
            <span class="caozuo">操作</span>
          </div>
<!--           <div class="caigouming">
             <span class="caigoushang">采购商：肇庆新奥燃气有限公司</span>
             <span class="dingdanbianhao">订单编号：2747485958575955</span>
             <span class="time">下单时间：2017-03-23&nbsp; &nbsp;&nbsp;12：23：23</span>
          </div> 
          <div class="xiaojianguo clearfix">
             <div class="tupian fl"><img src="__SUP_PUBLIC__/images/tianjia.png" alt=""></div>
             <div class="chihuo fl mgl10">小坚果核桃</div>
             <div class="jinbi fl">￥230.00</div>
             <div class="shuliang fl">2</div>
             <div class="jinen fl">
                 <p>实付金额：￥210.00</p>
                 <p>已开金额：￥210.00</p>
                 <p>待开金额：￥210.00</p>
             </div>
             <div class=""></div>
          </div> -->
          <volist name="order" id="o">
           <div class="caigouming">
             <span class="caigoushang">采购商：{$mess.pro_name}</span>
             <span class="dingdanbianhao">订单编号：{$o['order_code']}</span>
             <span class="time">下单时间：<?=date('Y-m-d',$o['created']);?>&nbsp; &nbsp;&nbsp;<?=date('H:i:s',$o['order']['created']);?></span>
          </div> 
          <div class="xiaojianguo clearfix" style="height: auto;position: relative;">
             <div>
              <volist name="o['goods']" id="g">
               <div class="clearfix">
                 <div class="tupian fl"><img src="__UPLOADS__/{$g.thumb}" alt=""></div>
                 <div class="chihuo fl mgl10">{$g.goods_name}</div>
                 <div class="jinbi fl">￥{$g.goods_price}</div>
                 <div class="shuliang fl">{$g.goods_count}</div>
               </div>
             </volist>
               <!-- <div class="clearfix">
                 <div class="tupian fl"><img src="./images/tianjia.png" alt=""></div>
                 <div class="chihuo fl mgl10">小坚果核桃</div>
                 <div class="jinbi fl">￥230.00</div>
                 <div class="shuliang fl">2</div>
               </div> -->
             </div>
             <div class="clearfix" style="position: absolute;top: 0;right: 0;width: 100%;height: 100%;overflow: hidden;">
               <div class="fr" style="margin-right: 5.4%;height: 100%;"><input type="checkbox" style="margin:20px 30px;"></div>
               <div class="jinen fr" style="height: 100%;border:1px solid #ddd;border-top: 0;border-bottom: 0;">
                 <p>实付金额：￥{$o['pay']}</p>
                 <p>已开金额：￥{$o['paid_amount']}</p>
                 <p>待开金额：￥<?php echo $o['total']-$o['paid_amount'];?></p>
               </div>
             </div>
          </div>
        </volist>

          <div class="benxikaipiaojinenn clearfix">
            <span class="sibaier fr">￥{$money}</span>
            <span class="bencikaipiao fr">本次开票金额：合计</span>
          </div>
          <table class="l_Detailed">
            <tr>
              <th>开票明细</th>
              <th></th>
            </tr>
            <tr>
              <td>发票金额：￥{$money}</td>
              <td>发票抬头：{$mess.company}</td>
            </tr>
            <tr>
              <td>纳税人识别号：{$mess.taxpayer_num}</td>
              <td>联系电话：{$mess.com_tel}</td>
            </tr>
            <tr>
              <td>发票类型：普通发票</td>
              <td>申请时间：<?=date('Y-m-d H:i:s',time());?></td>
            </tr>
            <tr>
              <td>收件人：{$mess.real_name}</td>
              <td>收取地址：{$mess.province}{$mess.city}{$mess.area}{$mess.street}</td>
            </tr>
            <!-- <tr>
              <td>邮编：765770</td>
              <td></td>
            </tr> -->
          </table>
          <div class="buton"><button>导出</button></div>
      </div>
    </div>
    <!-- 底部 == 版权 -->
    <div class="cont_lump con-foot">版权所有：900库 [京ICP备1000000001号-1</di>
    </div>

</body>
<script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="__SUP_PUBLIC__/js/ind.js"></script>

</html>