<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>高级定制</title>
	<link rel="stylesheet" href="__SUP_PUBLIC__/css/style.css">
  <link rel="stylesheet" href="__SUP_PUBLIC__/js/dist/switch.css">
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
        <div class="cont_lump cont_lump_Customer  cont_lump_yidongguanggao bor_bm1">
          <div class="cont_title">
            <span>广告设置</span> 
          </div>
          <div class="span_nav clearfix"> 
              <span class="fl cur-p">广告设置</span> 
              <span class="fl cur-p active">手机端欢迎页设置</span>
              
          </div>
          <div class="advert_form">
            <form method="post" action="">
              <ul class="lump pc_form">
                  <li class="">
                      <span class="text fl">排序：</span>
                      <div class="fl">
                        <input type="text" value="{$data.sort_order}">
                        <input name="media_type" type="hidden" value="0">
                        <input name="ad_id" type="hidden" value="{$data.ad_id}">
                      </div>
                  </li>
                  <li class="">
                      <span class="text fl">广告标题：</span>
                      <div class="fl">
                        <input type="text" name="title" value="{$data.title}">
                      </div>
                  </li>
                  <li class="">
                      <span class="text fl">广告图片：</span>
                      <div class="fl">
                        <input name="thumb" type="text" value="{$data.thumb}">
                        <input type="file" class="choice btn-fff-80">选择图片
                        <div class="SampleImg">
                          <img src="__SUP_PUBLIC__/images/guanggao.png" alt="">
                        </div>
                        <p class="col-999">建议尺寸：640*350，请将所有广告尺寸保持一致。</p>
                      </div>
                  </li>
                  <li class="">
                      <span class="text fl">广告标题：</span>
                      <div class="fl">
                        <input type="text"><button class="choice btn-fff-80">选择链接</button>
                      </div>
                  </li>
                  <li class="radio">
                      <span class="text fl">状态：</span>
                      <div class="fl">
                        <if condition="$data[is_show] eq 1" >
                          <input name="is_show" value="1" type="radio" id="zt_show" checked="checked">
                          <label for="zt_show">显示</label>
                          <input name="is_show" value="0" type="radio" id="zt_hide">
                          <label for="zt_hide">隐藏</label>
                          <else/>
                          <input name="is_show" value="1" type="radio" id="zt_show">
                          <label for="zt_show">显示</label>
                          <input name="is_show" value="0" type="radio" id="zt_hide" checked="checked">
                          <label for="zt_hide">隐藏</label>
                        </if>
                      </div>
                  </li>
                  <li class="">
                      <span class="text fl"></span>
                      <div class="fl">
                        <button class="btn-lan-160">提交</button>
                        <a href="__URL__/ad_list"><button class="btn-fff-160 mgl20">返回列表</button></a>
                      </div>
                  </li>
              </ul>
            </form>
              <ul class="lump wap_form">
                  <li class="">
                      <span class="text fl">手机端欢迎界面:</span>
                      <div class="fl">
                        <input type="text"><button class="choice btn-fff-80">选择图片</button>
                        <div class="SampleImg">
                          <img src="__SUP_PUBLIC__/images/guanggao.png" alt="">
                        </div>
                        <p class="col-999">建议尺寸：750*1334，请将所有广告尺寸保持一致。</p>
                      </div>
                  </li>
                  <li class="">
                      <span class="text fl">手机端欢迎界面链接:</span>
                      <div class="fl">
                        <input type="text"><button class="choice btn-fff-80">选择链接</button>
                      </div>
                  </li>
                  <li class="radio">
                      <span class="text fl">状态：</span>
                      <div class="fl">
                        <input name="gg_wap_zt" type="radio" id="zt_show"><label for="zt_show">显示</label>
                        <input name="gg_wap_zt" type="radio" id="zt_hide" checked="checked"><label for="zt_hide">隐藏</label>
                      </div>
                  </li>
                  <li class="">
                      <span class="text fl"></span>
                      <div class="fl">
                        <button class="btn-lan-160">提交</button>
                        <a href="0401-客户管理首页01.html"><button class="btn-fff-160 mgl20">返回列表</button></a>
                      </div>
                  </li>
              </ul>
          </div>
        </div>
        <!-- 底部 == 版权 -->
        <div class="cont_lump con-foot">版权所有：900库 [京ICP备1000000001号-1</di>
    </div>

</body>
<script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="__SUP_PUBLIC__/js/ind.js"></script>
<script>
  $(".cont_lump_yidongguanggao .span_nav span").click(function(){
      $(this).addClass("active").siblings().removeClass('active'); 
      $(".cont_lump_yidongguanggao .advert_form .lump").hide(0);
      $(".cont_lump_yidongguanggao .advert_form .lump").eq($(".cont_lump_yidongguanggao .span_nav span").index(this)).show(0);
    });
</script>
</html>