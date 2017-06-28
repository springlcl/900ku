<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8"><meta http-equiv="keywords" content="keyword1,keyword2,keyword3">
      <meta http-equiv="description" content="this is my page">
	<title>准入订单</title>
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
<div class="clearfix container" id="app-container">
    <div class="cont_lump cont_lump_sell cont_lump_quser cont_lump_Balance">
      <div class="cont_title">
        <span>收支明细</span> 
      </div>
      <div class="con">
       
        <div class="kuangzi">
            <div class="doods_nav_head cont_qtitle">
                <input type="text" placeholder="订单号">
                <select id="province" datatype="*" > 
                        <option>-请选择分类-</option>
                        <option selected = "selected">一级分类1</option>
                        <option>一级分类2</option>
                        <option>一级分类3</option>
                </select>
                下单时间：
                <input type="text" id="wrong_start">至
                <input type="text" id="wrong_end">
                <select id="province" datatype="*" > 
                        <option>-请选择分类-</option>
                        <option selected = "selected">一级分类1</option>
                        <option>一级分类2</option>
                        <option>一级分类3</option>
                </select>
                <span class="youkuang">最近7天</span>
                <span class="wukuang">最近30天</span>
                <button>筛选</button>
                <button>导出</button>
            </div>
            <div class="doods_nav_head clearfix" style="border-top: 1px solid #E8E3E3;">
                
                <span class="fl time">时间</span>
                <span class="fl liushuixian">类型/收支流水号</span>
                <span class="fl dingdanshouru">订单收入（元）</span>
                <span class="fl yewuyuanshouru">业务员收入（元）</span>
                <span class="fl pingtaifuwu">平台服务费（元）</span>
                <span class="fl qudao">支付渠道/单号</span>
                <span class="fl caozuo ">操作</span>
            </div>
            <div class="goodsShow">
                <ul>
                    <li class="goods_item">
                        <div class="goods_item_mian clearfix">
                            <div class="time fl"><span class="mgr5">2017-04-06</span><span>10:03:03</span></div>
                            <div class="liushuixian fl">
                                <p>退款</p>
                                <p>263812368173817</p>
                            </div>
                            <div class="dingdanshouru col-ju fl">
                              -100
                            </div>
                            <div class="yewuyuanshouru fl">----</div>
                            <div class="pingtaifuwu fl">----</div>
                            <div class="qudao fl">
                              <p>在线转账</p>
                             <p>78575956456578065</p>
                            </div>
                            <div class="caozuo col-lan cur-p">查看详情</div>                           
                        </div>
                       
                    </li>  
                </ul>
            </div>
            <div class="goodsShow">
                <ul>
                    <li class="goods_item">
                        <div class="goods_item_mian clearfix">
                            <div class="time fl"><span class="mgr5">2017-04-06</span><span>10:03:03</span></div>
                            <div class="liushuixian fl">
                                <p>入账详情</p>
                                <p>263812368173817</p>
                            </div>
                            <div class="dingdanshouru col-lv fl">
                              +100
                            </div>
                            <div class="yewuyuanshouru col-ju fl">-5.00</div>
                            <div class="pingtaifuwu col-ju fl">-4.00</div>
                            <div class="qudao fl">
                              <p>在线转账</p>
                             <p>78575956456578065</p>
                            </div>
                            <a href="0501-准入订单-订单详情01.html"><div class="caozuo col-lan cur-p">查看详情</div></a>                       
                        </div>
                       
                    </li>  
                </ul>
            </div>
            <div class="goodDown clearfix">
              
              <ul class="pagination">
                <li class="bor-0">
                    <span class="pg_pre">共10页，每页15条</span>
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
                <li>
                    <input type="text">
                </li>
                <li class="bor-0">
                    <a class="pg_tz" href="">跳转</a>
                </li>
            </ul>
            </div>
        </div>
      </div>
    </div>
    <!-- 底部 == 版权 -->
    <div class="cont_lump con-foot">版权所有：900库 [京ICP备1000000001号-1</div>
</div>

  <div class="protection">
    <div class="tanchu_box tanchu_box200 print_tab_box">
      <span class="gb close_btn"><i></i></span>
      <h3 class="tit">选择打印订单类型</h3>
      <div class="mgt20">
          <label for="gwqd" class="mgr35 pdl30"><input type="radio" checked="checked"  name="qingdan" id="gwqd" >购物清单</label>
          <label for="phd" class="mgl20"><input type="radio" name="qingdan" id="phd">配货单</label>
      </div>
      <div class="btn">
        <button class="btn-lan-80 mgw15">确定</button>
        <button class="btn-lan-80 mgw15 close_btn">取消</button>
      </div>
      <!-- <div class="prompt">温馨提示：采购商一旦准入则不能删除此商品！</div> -->
    </div>
  </div>
</body>
<script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="__SUP_PUBLIC__/laydate/laydate.js"></script>
<script type="text/javascript" src="__SUP_PUBLIC__/js/ind.js"></script>
<script>
    var start = {
      elem: '#wrong_start',
      format: 'YYYY/MM/DD hh:mm:ss',
      min: '1900-01-01 00:00:00', //最小日期
      max: laydate.now(), //最大日期
      istime: true,
      istoday: false,
      choose: function(datas){
         end.min = datas; //开始日选好后，重置结束日的最小日期
         end.start = datas //将结束日的初始值设定为开始日
      }
    };
    var end = {
      elem: '#wrong_end',
      format: 'YYYY/MM/DD hh:mm:ss',
      min: '1900-01-01 00:00:00', //最小日期
      max: laydate.now(),
      istime: true,
      istoday: false,
      choose: function(datas){
        start.max = datas; //结束日选好后，重置开始日的最大日期
      }
    };
    laydate(start);
    laydate(end);
</script>
</html>