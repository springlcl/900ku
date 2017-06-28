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
              <span class="fl cur-p active">广告设置</span>
              <span class="fl cur-p">手机端欢迎页设置</span>
          </div>
          <div class="advert_form">
              <form method="post" action="" enctype="multipart/form-data">
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
                        <input name="thumb" id="thumb" type="text" value="{$data.thumb}">
                        <div id='d'>
                        <label id='lab'>选择图片</label>
                        <input type="file" id="fileToUpload" onchange="upperCase()" name="file" class="form-control">
                        </div>
                        <div class="SampleImg">
                          <img id="pic" src="{$data.thumb}" alt="">
                        </div>
                        <p class="col-999">建议尺寸：640*350，请将所有广告尺寸保持一致。</p>
                      </div>
                  </li>
                  <li class="">
                      <span class="text fl">广告连接：</span>
                      <div class="fl">
                        <input type="text" id="contents" value="__URL__/add_ad?id={$data.ad_id}" name="link">
                        <input id='xuan' type="button" onClick="jsCopy();" value="选择链接" />
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
                        <a href="__URL__/ad_list"><input type='button' value='返回列表' id='fan'></a>
                      </div>
                  </li>
              </ul>
            </form>
            
              <ul class="lump wap_form">
                <form method="post" action="" enctype="multipart/form-data" >
                  <li class="">
                      <span class="text fl">手机端欢迎界面:</span>
                      <div class="fl">
                        <input name="thumb" id='thumbs' type="text" value="{$data.thumb}">
                        <div id='d'>
                        <label id='lab'>选择图片</label>
                        <input type="file" id="fileToUploads" onchange="upperCases()" name="file" class="form-control">
                        </div>
                        <div class="SampleImg">
                          <img id='pics' src="{$data.thumb}" alt="">
                        </div>
                        <p class="col-999">建议尺寸：750*1334，请将所有广告尺寸保持一致。</p>
                      </div>
                  </li>
                  <li class="">
                      <span class="text fl">手机端欢迎界面链接:</span>
                      <div class="fl">
                        <input type="text" id="content" value="__URL__/add_ad?id={$data.ad_id}" name="link">
                        <input id='xuan' type="button" onClick="jsCopys();" value="选择链接" />
                      </div>
                  </li>
                  <input name="media_type" type="hidden" value="1">
                  <input name="ad_id" type="hidden" value="{$data.ad_id}">
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
                        <button class="btn-lan-160" type="submit">提交</button>
                        <a href="__URL__/ad_list"><input type='button' id='fan' value='返回列表'></a>
                      </div>
                  </li>
                </form>
              </ul>
          </div>
        </div>
        <!-- 底部 == 版权 -->
        <div class="cont_lump con-foot">版权所有：900库 [京ICP备1000000001号-1</div>
    </div>


<script src="__SUP_PUBLIC__/js/jquery2.1.4.min.js"></script>
<script src="__ADMIN_PUBLIC__/js/ajaxfileupload.js"></script>
<script src="__ADMIN_PUBLIC__/js/layer/layer.js"></script>
<script src="__SUP_PUBLIC__/js/ind.js"></script>
<script type="text/javascript">
  $(".cont_lump_yidongguanggao .span_nav span").click(function(){
      $(this).addClass("active").siblings().removeClass('active'); 
      $(".cont_lump_yidongguanggao .advert_form .lump").hide(0);
      $(".cont_lump_yidongguanggao .advert_form .lump").eq($(".cont_lump_yidongguanggao .span_nav span").index(this)).show(0);
    });

  //复制按钮操作
  function jsCopy(){ 

        var e=document.getElementById("contents");//对象是contents

        e.select(); //选择对象

        document.execCommand("Copy"); //执行浏览器复制命令
 
    } 
  //复制按钮操作
  function jsCopys(){ 

        var e=document.getElementById("content");//对象是contents

        e.select(); //选择对象
          
        document.execCommand("Copy"); //执行浏览器复制命令
        
    } 


 function upperCase(){
            $("#loading").ajaxStart(function(){
                // $(this).show();
                layer.open({
                    type: 2
                    ,shadeClose: false
                    ,content: '上传中...'
                });
            }).ajaxComplete(function(){
                layer.closeAll();
            });
            //上传文件
            $.ajaxFileUpload({
                url:'{:U('Store/upload')}',//处理图片脚本
                secureuri :false,
                fileElementId :'fileToUpload',//file控件id
                dataType : 'json',
                async :false,
                success : function (data){
                    if(typeof(data.error) != 'undefined'){
                        if(data.error != ''){
                            alert(data.error);
                        }else{
                            //alert(data.msg);
                            console.log('成功');
                            // alert(data);
                            $('#pic').attr('src',data.src);
                            $('#thumb').val(data.src);
                        }
                    }
                },
                error: function(data, e){
                    alert(e);
                }
            });
            return false;
        };



         function upperCases(){
            $("#loading").ajaxStart(function(){
                // $(this).show();
                layer.open({
                    type: 2
                    ,shadeClose: false
                    ,content: '上传中...'
                });
            }).ajaxComplete(function(){
                layer.closeAll();
            });
            //上传文件
            $.ajaxFileUpload({
                url:'{:U('Store/upload')}',//处理图片脚本
                secureuri :false,
                fileElementId :'fileToUploads',//file控件id
                dataType : 'json',
                async :false,
                success : function (data){
                    if(typeof(data.error) != 'undefined'){
                        if(data.error != ''){
                            alert(data.error);
                        }else{
                            //alert(data.msg);
                            console.log('成功');
                            // alert(data);
                            $('#pics').attr('src',data.src);
                            $('#thumbs').val(data.src);
                        }
                    }
                },
                error: function(data, e){
                    alert(e);
                }
            });
            return false;
        };
</script>
</body>
</html>
<style>

#d {
      position: relative;
      float:right;

  }
  #d input {
      width: 100px;
      height: 25px;
      position: relative;
      z-index: 9;
      opacity: 0;
  }
  #d label {
      position: absolute;
      background: #0077dd none repeat scroll 0 0;
      display: inline-block;
      color: #fff;
      width: 165px;
      height: 40px;
      line-height: 40px;
      text-align: center;
      top: 0px;
      left: 0px;
      font-size: 15px;
  }
  #xuan {
      float:right;
      border-left: 0 none;
      border-radius: 0;
      background: #0077dd none repeat scroll 0 0;
      border: 0 none;
      color: #fff;
      font-size: 15px;
      height: 40px;
      width: 165px;
  }
  #fan {
    background: #0077dd none repeat scroll 0 0;
    border: 0 none;
    color: #fff;
    font-size: 15px;
    height: 40px;
    width: 165px;
    border-radius: 5px;
  }
</style>