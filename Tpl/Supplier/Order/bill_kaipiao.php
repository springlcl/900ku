<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8"><meta http-equiv="keywords" content="keyword1,keyword2,keyword3">
      <meta http-equiv="description" content="this is my page">
	<title>开票</title>
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
        <span>开发票</span> 
      </div>
      <div class="con">
          <div class="l_nav">
            <span class="img"></span>
            <span class="kaipiao">开票条目</span>
            <span class="danjia">单价</span>
            <span class="shuliang">数量</span>
            <span class="moneys">金额</span>
            <span class="caozuo">操作</span>
          </div>
      <volist name="order" id="o">
          <div class="caigouming">
             <span class="caigoushang">采购商：{$o.pro_name}</span>
             <span class="dingdanbianhao">订单编号：{$o.order_num}</span>
             <span class="time">下单时间：<?=date('Y-m-d H:i:s',$o['created']);?></span>
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
               </div>
               <div class="clearfix">
                 <div class="tupian fl"><img src="./images/tianjia.png" alt=""></div>
                 <div class="chihuo fl mgl10">小坚果核桃</div>
                 <div class="jinbi fl">￥230.00</div>
                 <div class="shuliang fl">2</div>
               </div> -->
             </div>
             <div class="clearfix" style="position: absolute;top: 0;right: 0;width: 100%;height: 100%;overflow: hidden;">
               <div class="fr" style="margin-right: 5.4%;height: 100%;"><input type="checkbox" style="margin:20px 30px;"></div>
               <div class="jinen fr" style="height: 100%;border:1px solid #ddd;border-top: 0;border-bottom: 0;">
                 <p>实付金额：￥{$o.pay}</p>
                 <p>已开金额：￥{$o.paid_amount}</p>
                 <p>待开金额：￥<?= $o['total']-$o['paid_amount'];?></p>
               </div>
               <div class=""><input type="checkbox" name="rpid[]" value="{$o.rpid}" style="margin:20px 30px;"></div>
             </div>
          </div>
</volist>
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
             <div class=""><input type="checkbox" style="margin:20px 30px;"></div>
          </div> -->
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
             <div class=""><input type="checkbox" style="margin:20px 30px;"></div> -->
          </div>
          <div class="benxikaipiaojinenn clearfix">
            <span class="sibaier fr">￥{$money}</span>
            <span class="bencikaipiao fr">本次开票金额：合计</span>
          </div>
          <form action="{:U('Order/open')}" method="post">
          <div class="diyibu">
              <span class="col-lan pdl25">第一步 </span>
              <span>请输入发票信息：</span>
          </div>
          <table id="table" class="houtianjia">
            <tr class="font-weight600">
              <th class="sawan">序号</th>
              
              <th class="danzhnag">发票金额</th>
              <th class="shurushuihao">税号</th>
              <th class="shurubianhao">发票编号</th>
            </tr>
            <tr>
              <td class="sawan">1</td>
              <td class="danzhnag"><input name="je[]" type="text" placeholder="请输入单张发票金额"></td>
              <td class="shurushuihao"><input name="sh[]" type="text" placeholder="请输入税号"></td>
              <td class="shurubianhao"><input name="id[]" type="text" placeholder="请输入对应张发票编号"></td>
            </tr> 
            <!-- <tr>
              <td class="sawan">1</td>
              <td class="danzhnag"><input type="text" placeholder="请输入单张发票金额"></td>
              <td class="shurushuihao"><input type="text" placeholder="请输入税号"></td>
              <td class="shurubianhao"><input type="text" placeholder="请输入对应张发票编号"></td>
            </tr> 
            <tr>
              <td class="sawan">1</td>
              <td class="danzhnag"><input type="text" placeholder="请输入单张发票金额"></td>
              <td class="shurushuihao"><input type="text" placeholder="请输入税号"></td>
              <td class="shurubianhao"><input type="text" placeholder="请输入对应张发票编号"></td>
            </tr> -->
          </table>
          <div class="lanjiahao">
              <span id="add">+</span>
          </div>
          <div class="zongji">
            <span class="xxh">总计</span>
            <span class="kong">￥{$money}</span>
            <span class="shuihao">开票日期</span>
            <span class="bianhao"><input type="search" name="time" class="order_time" placeholder="&nbsp;请选择时间开票日期" id="wrong_start"></span>
          </div>
          <div class="dierbu clearfix">
            <span class="col-lan fl mgl20s">第二步</span><span class="fl">是否选择快递邮寄发票：</span>
             <f class="fl">
                <input type="radio" checked="checked" name="Sex" value="yes" />
                是：
                <input type="radio" name="Sex" value="no" />
                否：
             </f>
          </div>
          <div class="express">
              <div class="clearfix"><p class="kauidigongsi fl">快递公司：</p>
                <select name="kdcid" style="width:100px;height:32px;">
                  <volist name="kd" id="k">
                  <option value="{$k.eid}">{$k.ex_name}</option>
                </volist>
                </select>
              </div>
              <div class="clearfix mgt20"><p class="kuaidigongsi fl">快递单号：</p><input name="kdoid" type="text"></div>
          </div>
          <div class="buton"><button>确认开票</button></div>
        </form>
      </div>
    </div>
    <!-- 底部 == 版权 -->
    <div class="cont_lump con-foot">版权所有：900库 [京ICP备1000000001号-1</di>
  </div>
</body>
<script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="__SUP_PUBLIC__/js/ind.js"></script>
<script type="text/javascript" src="__HOME_PUBLIC__/cg_admit_order/laydate/laydate.js"></script>
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
<script>


    var i=1;
  $("#add").bind('click',function(){
    i++;
    $("#table").append("<tr><td class='sawan'>"+i+"</td><td class='danzhnag'><input name='je[]' type='text' placeholder='请输入单张发票金额'></td><td class='shurushuihao'><input name='sh[]' type='text' placeholder='请输入税号'></td><td class='shurubianhao'><input name='id[]' type='text' placeholder='请输入对应张发票编号'></td></tr> ")
  })



</script>
</html>