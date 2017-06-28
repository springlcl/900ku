<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>高级定制</title>
	<link rel="stylesheet" href="__SUP_PUBLIC__/css/style.css">
  <link rel="stylesheet" href="__SUP_PUBLIC__/js/dist/switch.css">
	<style>
    .senior_dingzhi .con{width: 1000px;margin: 0 auto;background: #eee;}
	</style>
</head>
<body>
<!-- 左导一 -->
  <include file='Public/firstSidebar' />
<!-- 左导二 -->
  <include file='exLeft' />
<!-- 右侧 内容-->
<div class="clearfix container" id="app-container">
        <div class="cont_lump cont_lump_Customer cont_lump_yidongguanggao">
          <div class="cont_title">
            <span>广告设置</span> 
          </div>
          <table class="l-nav">
            <tr>
             <th class="shunxun">顺序</th>
             <th class="biaoti">标题</th>
             <th class="lianjie">链接</th>
             <th class="xianshi">显示</th>
             <th class="caozuo"><a href="{:U('store/add_pc')}">操作</a></th>
            </tr>
            <volist name="str" id="str">
              <tr>
                <td class="shunxun">{$xu++}</td>
                <td class="biaoti">{$str.title}</td>
                <td class="lianjie">{$str.link}</td>
                <td class="xianshi" value="{$str.is_show}">
                  <if condition="$str.is_show eq 1" >
                  <button class='btn'>显示</button>
                  <else/>
                  <button class='btn'>隐藏</button>
                  </if>
                </td>
                <input type="hidden" class="name" value="{$str.ad_id}">
                <td class="caozuo col-lan">
                  <a href="__URL__/add_ad/id/{$str.ad_id}"><span class="youkuang col-lan">修改</span></a>
                  <span class="wukuang del_bnt" kid="{$str.ad_id}">删除</span>
                </td>
              </tr>
            </volist>
          </table>
          <div class="cont_title">
            <span>手机端欢迎广告设置</span> 
          </div>
          <table class="l-nav">
            <tr>
             <th class="shunxun">顺序</th>
             <th class="biaoti">标题</th>
             <th class="lianjie">链接</th>
             <th class="xianshi">显示</th>
             <th class="caozuo">操作</th>
            </tr>
            <volist name='data' id='data'>
              <tr>
                <td class="shunxun">{$hao++}</td>
                <td class="biaoti">{$data.title}</td>
                <td class="lianjie">{$data.link}</td>
                <input type="hidden" class="names" value="{$data.ad_id}">
                <td class="xianshi show">
                  <if condition="$data.is_show eq 1" >
                  <button class='btns'>显示</button>
                  <else/>
                  <button class='btns'>隐藏</button>
                  </if>
                </td>
                <td class="caozuo col-lan">
                    <a href="__URL__/add_ad/id/{$data.ad_id}"><span class="youkuang col-lan">修改</span></a>
                  <span class="wukuang del_bnt" kid="{$data.ad_id}">删除</span>
                </td>
              </tr>
            </volist>
          </table>          
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
<script src="__SUP_PUBLIC__/js/ind.js"></script>
<script>

//当点击删除按钮的时候将当前按钮的ID赋值到提示框确定按钮上
$(".del_bnt").click(function () {
  var kid=$(this).attr('kid');
    $(".protection").show(0);
    $(".protection .delTanBox").show(0);
    $('.sure_button').attr('ex',kid);
});
//点击确定删除后执行ajax执行删除
$('.sure_button').click(function(){
    var kid=$(this).attr('ex');
    $.ajax({
    type: 'post',
    url: "{:U('Store/del')}",
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

//PC端设置显示隐藏图片操作
$('.btn').click(function(){
  if ($(this).text() =="显示") {
          var is_show = 0;
        } else {
          var is_show = 1;
        }
  var ad_id = $(this).parent().parent().find('.name').val();
  $.ajax({
    type: 'post',
    url: "{:U('Store/state')}",
    data: {'is_show':is_show,'ad_id':ad_id},
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
//手机端设置显示隐藏图片操作
$('.btns').click(function(){
  if ($(this).text() =="显示") {
          var is_show = 0;
        } else {
          var is_show = 1;
        }

        // alert(is_show);
    var ad_id = $(this).parent().parent().find('.names').val();
  $.ajax({
    type: 'post',
    url: "{:U('Store/state')}",
    data: {'is_show':is_show,'ad_id':ad_id},
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
  //显示隐藏按钮切换JS
  $(".cont_lump_yidongguanggao .l-nav tr .xianshi button").click(function () {
      if ($(this).text() =="显示") {
        $(this).text("隐藏");
      } else {
        $(this).text("显示");
      }
    });
  
</script>
</html>