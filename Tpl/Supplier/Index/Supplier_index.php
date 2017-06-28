<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="__SUP_PUBLIC__/css/style.css">
	<style>
	</style>
</head>
<body>
<!-- 顶部 -->
	<div class="x_header mgb30">
		<div class="box-1">
			<div class="logo">
				<a href="http://www.900ku.com/" target="_blank"><img src="__SUP_PUBLIC__/images/logo.png" alt=""></a>
			</div>
			<span class="tit">选择公司/展厅</span>
		</div>
	</div>
<!-- 中间 -->
    <div class="box-2 clearfix"> 
        <div class="xuanze">
            <div class="left">
                <img  src="__UPLOADS__/supplier/headimg/{$Think.session.sup_headimg}" width="70" height="70">
            </div>
            <div class="right">
                <h4>{$com.company}</h4>
                <p>微信昵称：{$Think.session.sup_username}</p>
            </div>
        </div>
        <div class="choice_list">
            <ul>
<volist name='exs' id='e'>
              <a href="{:U('Store/mess_services',array('exid'=>$e['exid']))}" class="fl">
                <li>
                  <div class="q_mx">
                      <h5 class="left">
                          {$e.ex_name}
                      </h5> 
                      <div class="right">
                        <a href="{:U('Index/edit_show',array('exid'=>$e['exid']))}"><span>修改</span></a>
                          
                          <span class="shanchu del_bnt" exid="{$e['exid']}">删除</span>
                       </div>
                       <input type='hidden' id='hid' name='exid' value="{$e['exid']}">
                  </div>
                    <a href="{:U('Index/admin',array('exid'=>$e['exid']))}">
                      <div class="content">
                         <span class="shuzi"><b>{$e.qudao}</b></span> 
                         <span class="wenzi ">渠道管理</span>
                      </div>
                    </a>
                    <a href="{:U('Index/order',array('exid'=>$e['exid']))}">
                      <div class="content">
                         <span class="shuzi"><b>{$e.order}</b></span> 
                         <span class="wenzi">订单管理</span>
                      </div>
                    </a>
                    <a href="{:U('Index/money',array('exid'=>$e['exid']))}">
                      <div class="content">
                         <span class="shuzi"><b>{$e.confirm}</b></span> 
                         <span class="wenzi">待确认收款</span>
                      </div>
                    </a>
                    <a href="{:U('Index/admoney',array('exid'=>$e['exid']))}">
                      <div class="content">
                         <span class="shuzi"><b>{$e.paid_record}</b></span> 
                         <span class="wenzi">业务员结算</span>
                      </div>
                    </a>  
                </li>
              </a>



            </volist>
            <if condition="$Think.session.belong">
                <a href="{:U('Store/index')}">
                  <li class="add cur-p"><img src="__SUP_PUBLIC__/images/04.png" alt=""></li>
                </a>
            </if>
            </ul>
        </div>
        <div class="pagination">
　
</div>
        <ul class="pagination pages">
          　{$page}
          <!-- <li class="bor-0">
              <span class="pg_pre">共{$count}个，每页6个</span>
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
          </li> -->
	    </ul>
           
    </div>  
<!-- 底部 ===========-->
    <div class="index_end">
        <div class="hr"></div>
        <ul>
            <li>
                <span>购物指南</span>
                <a href="">购物流程</a>
                <a href="">会员介绍</a>
                <a href="">生活旅行</a>
                <a href="">常见问题</a>
                <a href="">大家电</a>
                <a href="">联系客服</a>
            </li>
            <li>
                <span>配送方式</span>
                <a href="">上门自提</a>
                <a href="">211限时达</a>
                <a href="">配送服务查询</a>
                <a href="">配送费收取标准</a>
                <a href="">海外配送</a>
            </li>
            <li>
                <span>支付方式</span>
                <a href="">货到付款</a>
                <a href="">在线支付</a>
                <a href="">分期付款</a>
                <a href="">邮局汇款</a>
                <a href="">公司转账</a>
            </li>
            <li>
                <span>售后服务</span>
                <a href="">售后政策</a>
                <a href="">价格保护</a>
                <a href="">退款说明</a>
                <a href="">返修/退换货</a>
                <a href="">取消订单</a>
            </li>
            <li>
                <span>手机APP下载</span>
                <img src="__SUP_PUBLIC__/images/index_end_tbc.png" alt="">
            </li>
        </ul>
    </div>
    <footer>
        <div>
            <span>
                <a href="">关于900库</a>
                <a href="">帮助中心</a>
                <a href="">开放平台</a>
                <a href="">诚招英才</a>
                <a href="">联系我们</a>
                <a href="">网站合作</a>
                <a href="">法律声明</a>
            </span>
        </div>
    </footer>
    <div class="literary">
        <span>
                © 2003-2016 9co.COM 版权所有
        </span>
    </div>

  <div class="protection">
    <div class="tanchu_box delTanBox">
      <span class="gb close_btn"><i></i></span>
      <h3 class="tit"><i></i>您确定要删除此展厅吗？</h3>
      <div class="btn">
        <button  class="btn-lan-80 mgw15 sure_button" ex=''>确定</button>
        <button class="btn-lan-80 mgw15 close_btn">取消</button>
      </div>
      <div class="prompt">温馨提示：采购商一旦准入则不能删除此商品！</div>
    </div>
  </div>
</body>
<script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="__SUP_PUBLIC__/js/ind.js"></script>
</html>
<script>
$(".del_bnt").click(function (){
  var exid=$(this).attr('exid');
    // alert(exid);
    // exit;
          $(".protection").show(0);
          $(".protection .delTanBox").show(0);
          $('.sure_button').attr('ex',exid)

      });

  $('.close_btn').click(function(){
    location.reload();
  });

  $('.sure_button').click(function(){
    var exid=$(this).attr('ex');
    // alert(exid);
    // exit;
                  $.ajax({
                  type: 'post',
                  url: "{:U('Index/del')}",
                  data: {'exid':exid},
                  dataType: 'json',
                  async: false,
                  success: function(data)
                  {
                    if(data)
                    {
                      location.reload();
                    }else{
                     
                    }
                  }
                });
                }
  );
</script>
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