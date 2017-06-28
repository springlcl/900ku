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
<!-- 左导一 -->
  <include file='Public/firstSidebar' />
<!-- 左导二 -->
   <include file='exLeft' />
<!-- 右侧 内容-->
  <div class="clearfix container" id="app-container">
    <div class="cont_lump cont_lump_sell cont_lump_Customer1">
      <div class="cont_title">
        <span>客服列表</span> 
      </div>
      <div class="con">
        <div class="clearfix pdh10">
          <a href="__URL__/add_customer"><button class="button q_gr fl" style="width: 120px;">添加客服列表</button></a>
        </div>
        <div class="kuangzi">
            <div class="doods_nav_head" style="padding: 10px 20px;">
                <span style="width: 14px;"></span>
                <span style="width: 10%;">添加时间</span>
                <span style="margin-left: 5%;width: 74px;">用户二维码</span>
                <span style="width: 10%;margin-left: 6%;">用户昵称</span>
                <span style="width: 10%;margin-left: 2.8%;">联系电话</span>
                <span style="margin-left: 5.5%;width: 9%;">真实名称</span>
                <span style="margin-left: 9%;width: 13%;">操作</span>
            </div>
            <div class="goodsShow">

                <ul>
                  <volist id='data' name='data'>
                    <li class="goods_item">
                        <div class="goods_item_mian clearfix">
                            <div class="xuhao">{$xuhao++}</div>
                            <div class="date">{$data.add_time|date="Y-m-d H:i:s",###}</div>
                            <div class="img"><img src="{$data.qcode}" alt=""></div>
                            <div class="name">{$data.nick_name}</div>
                            <div class="phone">{$data.tel}</div>
                            <div class="realname">{$data.real_name}</div>
                            <div class="btn">
                              <p>
                                <a href="__URL__/modify/id/{$data.kid}"><span>编辑</span></a>
                                <span class="del_bnt" kid="{$data.kid}">删除 </span>
                               <!--  <span>链接 </span> -->
                              </p>  
                            </div>
                        </div>
                    </li>
                  </volist>
                </ul>
            </div>
            <div class="goodDown clearfix pages">
              {$page}
              <!-- <ul class="pagination"> -->
   <!--              <li class="bor-0">
                    <span class="pg_pre">共10页，每页15条</span>
                </li>
                <li>
                    <span class="pg_pre">上一页</span>
                </li>
                <li>
                    <span class="pg_curr">1</span>
                </li>
                <li>
                    <a class="pg_link" href="__URL__/customer_list?page=2">2</a>
                </li>
                <li>
                    <a class="pg_link" href="">3</a>
                </li>
                <li>
                    <a class="pg_link" href="">4</a>
                </li>
                <li>
                    <a class="pg_next" href="">下一页</a>
                </li> -->
             <!--    <li>
                    <input type="text">
                </li>
                <li class="bor-0">
                    <a class="pg_tz" href="">跳转</a>
                </li>
            </ul>
 -->            </div>
        </div>
      </div>
    </div>
    <!-- 底部 == 版权 -->
    <div class="cont_lump con-foot">版权所有：900库 [京ICP备1000000001号-1</di>
  </div>

  <div class="protection">
    <div class="tanchu_box delTanBox">
      <span class="gb close_btn"><i></i></span>
      <h3 class="tit"><i></i>您确定要删除此商品吗？</h3>
      <div class="btn">
        <button class="btn-lan-80 mgw15 sure_button" ex=''>确定</button>
        <button class="btn-lan-80 mgw15 close_btn">取消</button>
      </div>
      <div class="prompt">温馨提示：采购商一旦准入则不能删除此商品！</div>
    </div>
  </div>
</body>
<script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="__SUP_PUBLIC__/js/ind.js"></script>
</html>
<script>
//删除操作
$(".del_bnt").click(function () {
  var kid=$(this).attr('kid');
    // alert(exid);
    // exit;
          $(".protection").show(0);
          $(".protection .delTanBox").show(0);
          $('.sure_button').attr('ex',kid)

      });
//删除确定操作
  $('.sure_button').click(function(){
    var kid=$(this).attr('ex');
    // alert(kid);
    // exit;
                  $.ajax({
                  type: 'post',
                  url: "{:U('Store/cus_del')}",
                  data: {'kid':kid},
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
              });
  
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