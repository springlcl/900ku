<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"><meta http-equiv="keywords" content="keyword1,keyword2,keyword3">
  <meta http-equiv="description" content="this is my page">
  <title>物流工具</title>
  <link rel="stylesheet" href="__SUP_PUBLIC__/css/style.css">
  <link href="__SUP_PUBLIC__/css/freight.css" type="text/css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries--><!--[if lt IE 9]><script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script><script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<body>
<!-- 左导一 -->
  <include file='Public/firstSidebar' />
<!-- 左导二 -->
  <include file='Set_left' />
<!-- 右边 -->
  <div class="clearfix container" id="app-container">
   <div class="cont_lump cont_lump_sell logisticstools">
      <div class="cont_title">
        <span>物流工具</span> 
      </div>
      <div class="con">
        <div class="clearfix pdh10">
         <a href="{:U('Setting/log_add')}"> <button class="button q_gr mgr20 fl" style="width: 120px;">新建运费模块</button> </a>
        </div>
      <ul class="wuliugongju">
        <li class="font-weight600 youbingjing">
          <span class="moban">模板名称</span>
          <span class="bianji">最后编辑时间</span>
          <span class="">操作</span>
        </li>
        <volist name="tems" id="tem">
        <li class="wubingjing clearfix">
          <span class="mingcheng col-lan font-weight600">{$tem.tem_name}</span>
          <span class="bianji"><?= date('Y-m-d',$tem['last_time'])?> &nbsp;&nbsp;<?= date('H:i:s',$tem['last_time'])?></span>
          <ul>
            <li  lid="{$tem.lid}"  class="fuzzhi col-lan fl copy">复制模板</li>
            <li  lid="{$tem.lid}"  class="xiugai col-lan fl edit"><a href="{:U('Setting/log_edit',array('lid'=>$tem['lid']))}"><font color="blue">修改</font></a></li>
            <li  lid="{$tem.lid}" class="shanchu col-lan fl del" >删除</li>
            <li  lid="{$tem.lid}"  class="chakan col-lan fl look"><a href="{:U('Setting/log_look',array('lid'=>$tem['lid']))}"><font color="blue">查看</font></a><i></i></li>
          </ul>
          </li>
        </volist>

      </ul>
        
      </div>
    </div>
    <!-- 底部 == 版权 -->
    <div class="cont_lump con-foot">版权所有：900库 [京ICP备1000000001号-1</div>
  </div>


  <div class="protection">
    <div class="tanchu_box delTanBox">
      <span class="gb close_btn"><i></i></span>
      <h3 class="tit"><i></i>您确定要删除此商品吗？</h3>
      <div class="btn">
        <button class="btn-lan-80 mgw15 ">确定</button>
        <button class="btn-lan-80 mgw15 close_btn">取消</button>
      </div>
      <div class="prompt">温馨提示：采购商一旦准入则不能删除此商品！</div>
    </div>
  </div>
</body>
<script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="__SUP_PUBLIC__/js//wuliu_js/area.min.js"></script>
<script type="text/javascript" src="__SUP_PUBLIC__/js//wuliu_js/base.js"></script>
<script type="text/javascript" src="__SUP_PUBLIC__/js//wuliu_js/delivery.js"></script>
<script type="text/javascript" src="__SUP_PUBLIC__/js//ind.js"></script>
<script>
    //模板删除
    $(".del").click(function(){
      var lid=$(this).attr('lid');
      $.ajax({
                  type: 'post',
                  url: "{:U('Setting/log_del')}",
                  data: {'lid':lid},
                  dataType: 'json',
                  async: false,
                  success: function(data)
                  {
                    if(data){
                      location.reload();
                    }
                  }
                  });
    })

    //模板复制
    $(".copy").click(function(){
      var lid=$(this).attr('lid');
      $.ajax({
                  type: 'post',
                  url: "{:U('Setting/log_copy')}",
                  data: {'lid':lid},
                  dataType: 'json',
                  async: false,
                  success: function(data)
                  {
                    if(data){
                      location.reload();
                    }
                  }
                  });
    })   
</script>
</html>