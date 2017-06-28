<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8"><meta http-equiv="keywords" content="keyword1,keyword2,keyword3">
      <meta http-equiv="description" content="this is my page">
	<title>Document</title>
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
<div class="clearfix container min-w1070" id="app-container">
    <div class="cont_lump cont_lump_sell cont_lump_quser">
      <div class="cont_title">
        <span>用户列表</span> 
      </div>
      <div class="con">
       <form method="post" action="screen">
        <div class="kuangzi">
            <div class="doods_nav_head cont_qtitle">
                用户ID：
                <select id="province" datatype="*" name="fs" > 
                        <option  value="uid">用户ID</option>
                        <option  value="username">用户昵称</option>
                        <option  value="mobile">用户手机号</option>
                        <!-- <option>一级分类3</option> -->
                </select>
                <input type="text" name="tj">
                注册时间：
              <!--   <select id="province" datatype="*" > 
                        <option>-请选择分类-</option>
                        <option selected = "selected">一级分类1</option>
                        <option>一级分类2</option>
                        <option>一级分类3</option>
                </select> -->
                <input class="laydate-icon" id="wrong_start" name="start" placeholder="开始日期" >
                    至
                <input class="laydate-icon" id="wrong_end" name="end" placeholder="结束日期" >
                <span class="youkuang"><a href="__URL__/screen?sj=7">最近7天</a></span>
                <span class="wukuang"><a href="__URL__/screen?sj=30">最近30天</a></span>
                <button>筛选</button>
            </div>
        </form>
            <div class="doods_nav_head" style="border-top: 1px solid #E8E3E3;">
                <span style="width: 20px;margin-left: -15px;"><input type="checkbox" name="1" value="1"></span>
                <span style="width: 48px;margin-left: 24px;">用户头像</span>
                <span style="width: 13%; margin-left: 10%;">用户昵称</span>
                <span style="width: 20%;margin-left: 6%;">最后登录</span>
                <span style="width: 10%;margin-left: 8%;">操作</span>
            </div>
            <div class="goodsShow">
                <ul>
                    <volist id='data' name='data'>
                    <li class="goods_item">
                        <div class="goods_item_mian clearfix">
                            <input type="checkbox" name="1" value="1" class="fl kucun_cb">
                            <div class="num">{$xuhao++}</div>
                            <div class="print fl">
                                <img src="{$data.headimg}" alt="">
                            </div>
                            
                            <div class="nicheng">{$data.username}</div>
                            <div class="sales"><span>2017-03-21</span><span>21:12:03</span></div>
                            <div class="stock"><span>查看</span><i></i></div>
                            
                        </div>
                        <ul class="xiangqing">
                            <li class="shixian">
                                <div class="fl">
                                    <span>
                                       昵称：
                                    </span>
                                    <span>
                                       {$data.username} 
                                    </span>
                                </div>
                                <div class="fl">
                                    <span>联系方式：</span>
                                    <span>{$data.mobile}</span>
                                </div>
                            </li>
                            <li class="xunxian">
                                <div class="fl">
                                    <span>
                                       用户id：
                                    </span>
                                    <span>
                                       {$data.uid} 
                                    </span>
                                </div>
                                <div class="fl">
                                    <span>成为会员时间：</span>
                                    <span>{$data.add_time|date='Y-m-d H:i:s',###}</span>
                                </div>
                            </li>
                            <li class="xunxian">
                                <div class="fl">
                                    <span>
                                       本店累计消费金额：
                                    </span>
                                    <span>
                                       ￥1243.00 
                                    </span>
                                </div>
                                <div class="fl">
                                    <span>本店完成订单数：</span>
                                    <span>4笔</span>
                                </div>
                            </li>
                            <li class="xunxian">
                                <div class="fl">
                                    <span>
                                       未发货订单数：
                                    </span>
                                    <span>
                                       2笔 
                                    </span>
                                </div>
                                <div class="fl">
                                    <span>已发货订单数：</span>
                                    <span>0笔</span>
                                </div>
                            </li>
                        </ul>
                    </li>
                </volist>
                </ul>
            </div>
            <div class="goodDown clearfix">
              {$page}
            </div>
        </div>
      </div>
    </div>
    <!-- 底部 == 版权 -->
    <div class="cont_lump con-foot">版权所有：900库 [京ICP备1000000001号-1</div>
  </div>
</body>
<script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="__SUP_PUBLIC__/laydate/laydate.js"></script>
<script type="text/javascript" src="__SUP_PUBLIC__/js/ind.js"></script>
<script>
    var start = {
      elem: '#wrong_start',
      format: 'YYYY-MM-DD',
      min: '1900-01-01', //最小日期
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
      format: 'YYYY-MM-DD',
      min: '1900-01-01', //最小日期
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
<style>
  .laydate-icon {
    cursor:pointer;
  }
</style>

</html>