<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>选择模板</title>
	<link rel="stylesheet" href="__SUP_PUBLIC__/css/style.css">
	<style>
	</style>
</head>
<body>
<!-- 左导一 -->
<include file="Public/firstSidebar" /> 
<!-- 左导二 -->
 <include file="Store/exLeft" />
<!-- 右侧 内容-->
    <div class="clearfix container" id="app-container">
        <div class="cont_lump cont_lump_choice bor_bm1">
            <div class="cont_title">
            <span>请选择推荐模板</span>
            </div>
            <input id='exid' type='hidden' name='exid' value="<?=session('exid')?>">
            <div class="con">
              <dl class="clearfix">
                  <dt><b>所有模板</b>：
                    <if condition="$mol['template'] eq 1">
                  <dd class="dd active" mol='1'>
                    <else />
                  <dd class="dd" mol='1'>
                  </if>
                      <div class="img"><img src="__SUP_PUBLIC__/images/mb1.png" alt=""></div>
                      <div class="tet">
                          <h6 class="center font-size18">经典模板</h6>
                          <p class="font-size12 col-999">关于模版的简单介绍，关于模版的简单介绍</p>
                      </div>
                  </dd>
                    <if condition="$mol['template'] eq 2">
                  <dd class="dd active" mol='2'>
                    <else />
                  <dd class="dd" mol='2'>
                  </if>
                      <div class="img"><img src="__SUP_PUBLIC__/images/mb2.png" alt=""></div>
                      <div class="tet">
                          <h6 class="center font-size18">人气模板</h6>
                          <p class="font-size12 col-999">关于模版的简单介绍，关于模版的简单介绍</p>
                      </div>
                  </dd>
                    <if condition="$mol['template'] eq 3">
                  <dd class="dd active" mol='3'>
                    <else />
                  <dd class="dd" mol='3'>
                  </if>
                      <div class="img"><img src="__SUP_PUBLIC__/images/mb3.png" alt=""></div>
                      <div class="tet">
                          <h6 class="center font-size18">普通模板</h6>
                          <p class="font-size12 col-999">关于模版的简单介绍，关于模版的简单介绍</p>
                      </div>
                  </dd>
                  
              </dl>
              <button id='but' class="btn-lan-160 mgauto mgt20 mgb20 dis_blo">确认</button>
            </div>
        </div>
        <!-- 底部 == 版权 -->
        <div class="cont_lump con-foot">版权所有：900库 [京ICP备1000000001号-1</di>
    </div>

</body>
<script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/1.8.3/jquery.min.js"></script>
<script>
  $(function () {
      $(".container .cont_lump_choice dl dd.dd").click(function () {
          $(this).addClass("active").siblings().removeClass('active');
      });
  })



    $("#but").bind('click',function(){
  // $(function () {
  //     $(".container .cont_lump_choice dl dd.dd").click(function () {
  //         $(this).addClass("active").siblings().removeClass('active');
  //     });
  // })
    var mol=$('.dd.active').attr('mol');
    //console.log(mol);
    var exid=$("#exid").val();
    //alert(mol);
   
   

                $.ajax({
                  type: 'post',
                  url: "{:U('Store/sure_model')}",
                  data: {'exid':exid,'mol':mol},
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


  })
</script>
</html>