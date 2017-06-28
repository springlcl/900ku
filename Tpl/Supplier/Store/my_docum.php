<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="__SUP_PUBLIC__/css/style.css">
</head>
<body>
<!-- 左导一 -->
  <include file='Public/firstSidebar' />
<!-- 左导二 -->
   <include file='exLeft' />
<!-- 右侧 内容-->
  <div class="clearfix container" id="app-container">
    <div class="cont_lump cont_myFile">
      <div class="cont_title">
        <span>我的文件</span> 
      </div>
      <div class="con" >
        <div class="clearfix pdh10 type">
          <span class="font-size16 mgl30 cur-p active">所有图片</span>
          <span class="font-size16 mgl30 cur-p">
            <form id="upload" enctype="multipart/form-data">
              <input type="file" name='file' id='file'>
            </form>
          </span>
        </div>
        <div class="file_list">
          <table>
            <tr class="bg-f5">
              <th class="inp"><input type="checkbox" name='message'></th>
              <th class="img">预览图</th>
              <th class="name">文件名</th>
              <th class="date">创建时间</th>
              <th class="ope">操作</th>
            </tr>
            <volist id='data' name='data'>
              <tr>
                <td class="inp"><input type="checkbox" value="{$data.pic_id}" name='message'></td>
                <td class="img"><div id="img"><img src="{$data.thumb}" alt=""></div></td>
                <td class="name col-lan">
                  {$data.pic_name}
                  <img src="__SUP_PUBLIC__/images/qianbi.png" alt="" class="qianBi btn_show">
                  <div class="dj_box">
                      <input type="text" >
                      <button class="blan">确定</button>
                      <button class="lhui" onclick="dj_hide()">取消</button>
                  </div>
                </td>
                <input type="hidden" class="pic" value="{$data.pic_id}">
                <td class="date ">{$data.add_time|date="Y-m-d H:i:s",###}</td>
                <td class="ope show">
                  <span class="col-lan cur-p lj">链接</span>
                  <!-- <span class="col-lan cur-p gm">改名</span> -->
                  <span class="col-lan cur-p sc del_bnt" kid="{$data.pic_id}">删除</span>
                  <div class="tanchun lj_box sanjiao_right_lan">
                    <input type="text" class="content" value="__URL__/add_ad/id/{$data.pic_id}" name="link">
                    <button class='copy'>复制</button>
                  </div>
                  <!-- <div class="tanchun gm_box sanjiao_right_lan">
                    <input type="text">
                    <button class="">改名</button>
                  </div> -->
                </td>
              </tr>
          </volist>            
          </table>
          <div class="quanxuan pd15">
              <input type="checkbox" id="CheckAll">
              <span class="del_bnt dele">批量删除</span>
            </div>
        </div>
      </div>
    </div>
    <!-- 底部 == 版权 -->
    <div class="cont_lump con-foot">版权所有：900库 [京ICP备1000000001号-1</di>
  </div>
  <div class="protection">
    <div class="tanchu_box delTanBox">
      <span class="gb close_btn"><i></i></span>
      <h3 class="tit"><i></i>您确定要删除吗？</h3>
      <div class="btn">
        <button class="btn-lan-80 mgw15 sure_button" ex=''>确定</button>
        <button class="btn-lan-80 mgw15 close_btn">取消</button>
      </div>
      <div class="prompt">温馨提示：删除后不能恢复！</div>
    </div>
  </div>
</body>
<script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="__SUP_PUBLIC__/js/ind.js"></script>
<script>
  //复制链接操作
  $('.copy').click(function(){
    var e = $(this).parent().find('.content');
    e.select();
    document.execCommand("Copy");
    
  });
  //ajax上传图片
  $("#file").change(function(){
    var data = new FormData($("#upload")[0]);
    $.ajax({
      type:"POST",
      url:"my_docum",
      data: data,
      dataType:"json",
      processData: false,
      contentType: false,
      success:function(data){
        if (data) {
          location.reload();
        }else{
         
        }
      }
    });
  });
  //批量删除全选按钮
  $('#CheckAll').click(function(){
    $('input[name="message"]').attr("checked",this.checked);
  });
  //获取选择的要删除的数据ID值
  $(function(){ 
    $(".dele").click(function() {
        text = $("input:checkbox[name='message']:checked").map(function(index,elem) {
            return $(elem).val();
        }).get().join(',');
        $(".protection").show(0);
        $(".protection .delTanBox").show(0);
        $('.sure_button').attr('ex',text);
           $.ajax({
              type: 'post',
              url: "{:U('Store/pic_del')}",
              data: {'kid':kid},
              dataType: 'json',
              async: false,
              success: function(data)
              {
                if(data)
                {
                  location.reload();
                }
              }
            });
    });

});

  //单个要删除的ID复制到确定按钮
  $(".del_bnt").click(function () {
  var kid=$(this).attr('kid');
    // alert(kid);
    // exit;
          $(".protection").show(0);
          $(".protection .delTanBox").show(0);
          $('.sure_button').attr('ex',kid)

      });
  //执行AJAX删除操作
  $('.sure_button').click(function(){
    var kid=$(this).attr('ex');
    // alert(kid);
    // exit;
    $.ajax({
    type: 'post',
    url: "{:U('Store/pic_del')}",
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



$(".btn_show").click(function () {
    $(this).parent().find(".dj_box").show(1);
  });
  function dj_hide() {$(".dj_box").hide(1);};
  $(".dj_box .blan").click(function () {
    var keyVal = $(this).parent().parent().find('input').val();
    if(keyVal.length==0){
      alert('请输入图片名称');return;
    }
    
      var uid = $(this).parent().parent().parent().find('input').val();
      var nr = $(this).parent().find('input').val();
      // alert(nr);return;
      $(".dj_box").hide(1);
      $.ajax({
        type : 'post',
        dataType : 'json',
        url : 'set_name',
        data : {'pic_id':uid,'pic_name':nr},
        success:function(data){
          if(data){
           location.reload();
          }else{
            // alert('shibai');
          }
        }
      })
  });
</script>

</html>
<style>
#img img{
  border: 1px solid #ddd;
    height: 62px;
    margin-left: 5.4%;
    padding: 5px;
    width: 62px;
}
.cur-p {
  float:left;
}
.show {
    padding-left: 155px;
}

.dj_box {
  display:none;
}
div.dj_box {
    background: #fff none repeat scroll 0 0;
    border: 1px solid #0575e1;
    border-radius: 5px;
    padding: 10px 15px;
    position: absolute;
  }
.dj_box input {
  float:left;
  line-height:19px;
  height: 28px;
  padding: 0 10px;
  width: 100px;
}
.blan {
    background: #0077dd none repeat scroll 0 0;
    border-radius: 1px;
    color: #fff;
    height: 28px;
    margin: 0 5px;
    width: 46px;
}
.lhui {
    background: #79b6ec none repeat scroll 0 0;
    border-radius: 1px;
    color: #fff;
    height: 28px;
    width: 46px;
}
.btn_show {
  cursor:pointer;
}
</style>