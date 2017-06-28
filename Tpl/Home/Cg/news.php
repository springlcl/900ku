<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="wap-font-scale" content="no">
	<title>消息</title>
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
      <div class="caiwu_left fl pdt20">
          <ul>
            <!-- <a href="0701-消息.html"><li class="active">系统公告</li></a> -->
            <a href="{:U('Cg/news')}"><li>系统消息</li></a>
          </ul>
      </div>
      <div class="caiwu_right fl">
        <div class="right_con_down info_0701 bg-fff">
          <div class="title_ty">
            <span class="tit_name">系统消息</span>
          </div>
          <div class="con">
              <ul class="info_0701_list">
                <volist name="me" id="m">
                  <li class="list_li">
                    <h3 class="fw600 fs-18 col-000 mgb15">{$m.title}</h3>
                    <div class="clearfix">
                      <!-- <div class="fl">
                        <img class="btn-80x80" src="__HOME_PUBLIC__/finance/images/tianjia.png" alt="">
                      </div> -->
                      <div class="text fl mgl20">
                        <p class="mgt15">{$m.content}</p>
                        <h6 class="mgt15">时间：<?= date('Y-m-d H:i:s',$m['add_time']);?></h6>
                      </div>
                    </div>
                  </li>
                </volist>
<!--                   <li class="list_li">
                    <h3 class="fw600 fs-18 col-000 mgb15">你购买的商品有新的动态</h3>
                    <div class="clearfix">
                      <div class="fl">
                        <img class="btn-80x80" src="__HOME_PUBLIC__/finance/images/tianjia.png" alt="">
                      </div>
                      <div class="text fl mgl20">
                        <p class="mgt15">快递已签收</p>
                        <h6 class="mgt15">时间：2017-04-23 14-12-34</h6>
                      </div>
                    </div>
                  </li>
                  <li class="list_li">
                    <h3 class="fw600 fs-18 col-000 mgb15">你购买的商品有新的动态</h3>
                    <div class="clearfix">
                      <div class="fl">
                        <img class="btn-80x80" src="__HOME_PUBLIC__/finance/images/tianjia.png" alt="">
                      </div>
                      <div class="text fl mgl20">
                        <p class="mgt15">快递已签收</p>
                        <h6 class="mgt15">时间：2017-04-23 14-12-34</h6>
                      </div>
                    </div>
                  </li>
                  <li class="list_li">
                    <h3 class="fw600 fs-18 col-000 mgb15">你购买的商品有新的动态</h3>
                    <div class="clearfix">
                      <div class="fl">
                        <img class="btn-80x80" src="__HOME_PUBLIC__/finance/images/tianjia.png" alt="">
                      </div>
                      <div class="text fl mgl20">
                        <p class="mgt15">快递已签收</p>
                        <h6 class="mgt15">时间：2017-04-23 14-12-34</h6>
                      </div>
                    </div>
                  </li>
                  <li class="list_li">
                    <h3 class="fw600 fs-18 col-000 mgb15">你购买的商品有新的动态</h3>
                    <div class="clearfix">
                      <div class="fl">
                        <img class="btn-80x80" src="__HOME_PUBLIC__/finance/images/tianjia.png" alt="">
                      </div>
                      <div class="text fl mgl20">
                        <p class="mgt15">快递已签收</p>
                        <h6 class="mgt15">时间：2017-04-23 14-12-34</h6>
                      </div>
                    </div>
                  </li>
                  <li class="list_li">
                    <h3 class="fw600 fs-18 col-000 mgb15">你购买的商品有新的动态</h3>
                    <div class="clearfix">
                      <div class="fl">
                        <img class="btn-80x80" src="__HOME_PUBLIC__/finance/images/tianjia.png" alt="">
                      </div>
                      <div class="text fl mgl20">
                        <p class="mgt15">快递已签收</p>
                        <h6 class="mgt15">时间：2017-04-23 14-12-34</h6>
                      </div>
                    </div>
                  </li>
                  <li class="list_li">
                    <h3 class="fw600 fs-18 col-000 mgb15">你购买的商品有新的动态</h3>
                    <div class="clearfix">
                      <div class="fl">
                        <img class="btn-80x80" src="__HOME_PUBLIC__/finance/images/tianjia.png" alt="">
                      </div>
                      <div class="text fl mgl20">
                        <p class="mgt15">快递已签收</p>
                        <h6 class="mgt15">时间：2017-04-23 14-12-34</h6>
                      </div>
                    </div>
                  </li> -->
              </ul>
          </div>
              <div style="position:relative; left:-600px;">
                      <ul class="pagination pages">
                        {$page}  
                      </ul>
                     </div>
          <!-- <div class="clearfix">
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