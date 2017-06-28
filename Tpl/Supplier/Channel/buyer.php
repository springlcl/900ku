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
  <div class="clearfix container" id="app-container">

 <div class="cont_lump cont_lump_sell cont_lump_shangpin cont_lump_kfPurchaser">
      
      <div class="cont_title clearfix">
        <span>采购商列表</span> 
        <div class="q_batch fr">
            <button class="piliang">批量导出</button>
            <select id="province" datatype="*" > 
                        <option>-请选择分类-</option>
                        <option selected = "selected">一级分类1</option>
                        <option>一级分类2</option>
                        <option>一级分类3</option>
            </select>
            <input type="text" class="sou">
            <button class="sou"><i> </i>搜索<button>
        </div>
      </div>
      <div class="con">
        <div class="kuangzi">
            <div class="doods_nav_head">
                <span style="margin-left:101px;"></span>
                <span style="    width: 10%;text-align: left">采购商名称</span>
                <span style="    width: 9%;text-align: left;margin-left: 3.1%;">联系人</span>
                <span style="    width: 9%;margin-left: 0;">准入商品数</span>
                <span style="width: 8%;margin-left: 3.4%;">来源</span>
                <span style="width: 8%;margin-left: 5%;min-width: 96px;">加入时间<i></i></span>
                <span style="width: 4%;margin-left: 2.3%;;">备注</span>
                <span style=" width: 11%;margin-left: 2.3%;">操作</span>
            </div>
            <div class="goodsShow">
                <ul>
                <volist id="data" name="data">
                  <li class="goods_item">
                        <div class="goods_item_mian clearfix">
                            <div class="num">{$xuhao++}</div>
                            <div class="print fl">
                                <img src="__UPLOADS__/supplier/headimg/{$data.headimg}" alt="">
                            </div>
                            <div class="zxw">
                                <p class="col-lan mgt5">{$data.pro_name}</p>
                                <if condition="$data.status eq 1">
                                <p class="col-hui mgt5"><i><img src="__SUP_PUBLIC__/images/dianpuhuang.png" alt=""></i><span>已认证</span></p>
                                <else/>
                                <p class="col-hui mgt5"><i><img src="__SUP_PUBLIC__/images/dianpuhui.png" alt=""></i><span>未认证</span></p>
                                </if>
                            </div>
                            <div class="shoujihao">
                              <p class="shanchu">{$data.username}</p>
                              
                              
                            </div>
                            <div class="sales">{$data.quantity}</div>
                            <if condition="$data.channel eq 1">
                            <div class="stock">900库平台</div>
                            <else/>
                            <div class="stock">扫码添加</div>
                            </if>
                            
                            <div class="date">{$data.add_time|date="Y-m-d",###}</div>
                            <div class="yewu">
                                <if condition="$data.remarks ">{$data.remarks}<else /> --</if>
                            </div>
                            <div class="zhunru">
                               <a href="__URL__/admit/pid/{$data.pid}">
                                <button class="btn-y">准入管理（{$data.gaijia}）</button></a>
                            </div>
                        </div>
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
    <div class="cont_lump con-foot">版权所有：900库 [京ICP备1000000001号-1</di>
  </div>
</body>
<script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/1.8.3/jquery.min.js"></script>

</html>