<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8"><meta http-equiv="keywords" content="keyword1,keyword2,keyword3">
      <meta http-equiv="description" content="this is my page">
	<title>退货列表</title>
    <link rel="stylesheet" href="__SUP_PUBLIC__/css/style.css">
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries--><!--[if lt IE 9]><script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script><script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
    <style>

    </style>
</head>
<body>
<!-- 左导一 -->
  <include file='Public/firstSidebar' />
<!-- 左导二 -->
 <include file='left' />
<!-- 右侧 内容-->
 <div class="clearfix container min-w" id="app-container">
    <div class="cont_lump cont_lump_sell cont_lump_qpolice cont_lump_Return_goods">
      <div class="cont_title">
        <span>退货申请列表</span>
        <form action="" class="kucun_Sou fr mgr10">

              <input type="text" class="sou" name="return">
              <button class="sou"><i> </i>搜索</button>
          </form>
      </div>
      <div class="con">

        <div class="kuangzi">
            <div class="doods_nav_head font-weight600" style="padding:10px 20px;">

                <span style="width: 60px;margin-right: 8px;">产品信息</span>
                <span style="width: 20%;margin-left: 1.5%;text-align: left;">&nbsp;</span>
                <span style="width: 8%;margin-left: 2.8%;">退货类型</span>
                <span style="width: 7%;margin-left: 2.8%;">退货状态</span>
                <span style="width: 7%;margin-left: 2.3%;">退货数量</span>
                <span style="width: 8.1%;margin-left: 2.5%;">退货时间</span>
                <span style="margin-left: 2.5%;width:6%;">买家</span>
                <span style="margin-left: 2%;width: 7%;">交易操作</span>
            </div>
            <div class="goodsShow">
                <ul>
                    <volist name="return" id="r">
                    <li class="goods_item">
                        <div class="goods_item_mian clearfix">

                            <div class="print fl">
                                <img src="__UPLOADS__/{images/print1.png}" alt="">
                            </div>
                            <div class="txt">
                                <p class="bh">{$r.goods_name}</p>
                                <p class=" mgt5">净重：{$r.goods_weight}</p>
                            </div>
                            <div class="page_view">{$r.return_type}</div>
                            <div class="sales"><p>{$r.state}</p><p class="col-lan">订单详情</p></div>
                            <div class="stock">{$r.goods_count}</div>
                            <div class="date"><p>{$r.return_time|date='Y-m-d',###} </p><p>{$r.return_time|date='H:i:s',###}</p></div>
                            <div class="buyers">张小凡</div>
                           <a href="{:U('returnView',array('oid'=>$r['rid']))}"><div class="operation col-lan"> 查看退货</div></a>
                        </div>
                    </li>
                    </volist>

                </ul>
            </div>
            <div class="goodDown clearfix">
              <ul class="pagination" id="pagination" count="{$count}">
              </ul>
            </div>
        </div>
      </div>
    </div>
    <!-- 底部 == 版权 -->
    <div class="cont_lump con-foot">版权所有：900库 [京ICP备1000000001号-1</di>
  </div>
</body>
<script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="__SUP_PUBLIC__/js/ind.js"></script>
</html>