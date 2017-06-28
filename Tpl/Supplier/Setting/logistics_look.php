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
<!-- 右侧 内容-->
  <div class="clearfix container" id="app-container">
   <!--  <form action="{:U('Setting/log_toedit')}" method="post" enctype="multipart/form-data" > -->
    <div class="cont_lump cont_lump_sell Logisticsfreightmodule ">
      <div class="cont_title">
        <span>查看物流运费模版</span> 
      </div>
      <div class="mobanmingcheng clearfix">
          <p class="fl">模板名称：</p>
          <input style="border:none;" type="text" disabled="disabled" name="tem_name" value="{$name.tem_name}">
      </div>
      <div class="peisong clearfix">
        <p class="fl">配送区域：</p>
        <table class="fl">
          <tr class="clearfix">

            <td><span class="fl mgl15">可配送区域</span></td>
         <!--    <td style="width:60px;"></td> -->
             <td><span class="fr">首重（克）</span></td>
              <td><span class="fr">运费（元）</span></td>
              <td><span class="fr">续重（克）</span></td>
            <td><span class="fr mgr10">续费（元）</span></td>
             
           
            
          </tr>
<!--           <tr>
            <td ><span class="col-lan mgl20 magt10 zhiding js-assign-cost cur-p">
            +指定可配送区域和运费</span></td>
          </tr> -->
<input type="hidden" name="lid" value="{$name.lid}">
<volist name="log" id="l">
         <tr class="clearfix">
             <td><span class="fl mgl15" style="width:120px;">
              
              <!-- <textarea   disabled="disabled"   cols="20" rows="1"> -->
                {$l.area}
             <!--  </textarea > -->
              <input type="hidden" name="area[]" value="{$l.area}" />
              <input type="hidden" name="tid[]" value="{$l.tid}">
            </span>
<!-- <td style="width:20px;"><a href=""><font color="blue"  tid="{$l.tid}" class="tidedit">修改</font></a>&nbsp;
  <a href=""><font color="blue" tid="{$l.tid}" class="tiddel">删除</font></a></td> -->
          </td>
            <td><input  disabled="disabled"   value="{$l.first_weight}" name="first_weight[]" type="text" style="width:45px;border:none;" class="fr mgr10"></td>
             <td><input  disabled="disabled"  value="{$l.first_fee}"  name="first_fee[]" type="text" style="width:45px;border:none;" class="fr"></td>
            <td><input  disabled="disabled"  value="{$l.next_weight}"  name="next_weight[]" type="text" style="width:45px;border:none;"  class="fr"></td>
            <td> <input  disabled="disabled"  value="{$l.next_fee}"  name="next_fee[]" type="text" style="width:45px;border:none;"  class="fr"></td>
         </tr>

</volist>
         

        </table>
      </div>

      <div class="clearfix anniu">
        <p class="fl">&nbsp;</p>
       <!--  <button class="mgl20 baocun">保存</button> -->
        <a href="{:U('Setting/log_show')}"><button class="mgl20 baocun">返回</button></a>
      </div>
    </div>
<!--   </form> -->
    <!-- 底部 == 版权 -->
    <div class="cont_lump con-foot">版权所有：900库 [京ICP备1000000001号-1</div>
  </div>

    <div class="area-modal-wrap">
      <div class="modal-mask">
        <div class="area-modal">
          <div class="area-modal-head  font-weight600">选择可配送区域</div>
          <div class="area-modal-content">
            <div class="area-editor-wrap clearfix">
              <div class="area-editor-column js-area-editor-notused">
                <div class="area-editor">
                  <h4 class="area-editor-head  font-weight600">可选省、市</h4>
                  <ul class="area-editor-list">
                    <li>
      <ul class="area-editor-list area-editor-depth">
        <li area-id="110000">
            <div class="area-editor-list-title">
              <div class="area-editor-list-title-content">
                  <div class="js-ladder-toggle area-editor-ladder-toggle extend">+</div>
                      <span>北京市</span>
              </div>
            </div>
      </li>
      <li area-id="120000">
        <div class="area-editor-list-title">
          <div class="area-editor-list-title-content">
            <div class="js-ladder-toggle area-editor-ladder-toggle extend">+</div>
            <span>天津市</span></div></div></li><li area-id="130000">
            <div class="area-editor-list-title"><div class="area-editor-list-title-content">
              <div class="js-ladder-toggle area-editor-ladder-toggle extend">-</div>
              <span>河北省</span>
            </div></div><div class="city"><ul><li provence-id="130000" area-id="130100">石家庄市</li><li provence-id="130000" area-id="130200">唐山市</li><li provence-id="130000" area-id="130300">秦皇岛市</li><li provence-id="130000" area-id="130400">邯郸市</li><li provence-id="130000" area-id="130500">邢台市</li><li provence-id="130000" area-id="130600">保定市</li><li provence-id="130000" area-id="130700">张家口市</li><li provence-id="130000" area-id="130800">承德市</li><li provence-id="130000" area-id="130900">沧州市</li><li provence-id="130000" area-id="131000">廊坊市</li><li provence-id="130000" area-id="131100">衡水市</li></ul></div></li><li area-id="140000"><div class="area-editor-list-title"><div class="area-editor-list-title-content"><div class="js-ladder-toggle area-editor-ladder-toggle extend">+</div><span>山西省</span></div></div></li><li area-id="150000"><div class="area-editor-list-title"><div class="area-editor-list-title-content"><div class="js-ladder-toggle area-editor-ladder-toggle extend">+</div><span>内蒙古自治区</span></div></div></li><li area-id="210000"><div class="area-editor-list-title"><div class="area-editor-list-title-content"><div class="js-ladder-toggle area-editor-ladder-toggle extend">+</div><span>辽宁省</span></div></div></li><li area-id="220000"><div class="area-editor-list-title"><div class="area-editor-list-title-content"><div class="js-ladder-toggle area-editor-ladder-toggle extend">+</div><span>吉林省</span></div></div></li><li area-id="230000"><div class="area-editor-list-title"><div class="area-editor-list-title-content"><div class="js-ladder-toggle area-editor-ladder-toggle extend">+</div><span>黑龙江省</span></div></div></li><li area-id="310000"><div class="area-editor-list-title"><div class="area-editor-list-title-content"><div class="js-ladder-toggle area-editor-ladder-toggle extend">+</div><span>上海市</span></div></div></li><li area-id="320000"><div class="area-editor-list-title"><div class="area-editor-list-title-content"><div class="js-ladder-toggle area-editor-ladder-toggle extend">+</div><span>江苏省</span></div></div></li><li area-id="330000"><div class="area-editor-list-title"><div class="area-editor-list-title-content"><div class="js-ladder-toggle area-editor-ladder-toggle extend">+</div><span>浙江省</span></div></div></li><li area-id="340000"><div class="area-editor-list-title"><div class="area-editor-list-title-content"><div class="js-ladder-toggle area-editor-ladder-toggle extend">+</div><span>安徽省</span></div></div></li><li area-id="350000"><div class="area-editor-list-title"><div class="area-editor-list-title-content"><div class="js-ladder-toggle area-editor-ladder-toggle extend">+</div><span>福建省</span></div></div></li><li area-id="360000"><div class="area-editor-list-title"><div class="area-editor-list-title-content"><div class="js-ladder-toggle area-editor-ladder-toggle extend">+</div><span>江西省</span></div></div></li><li area-id="370000"><div class="area-editor-list-title"><div class="area-editor-list-title-content"><div class="js-ladder-toggle area-editor-ladder-toggle extend">+</div><span>山东省</span></div></div></li><li area-id="410000"><div class="area-editor-list-title"><div class="area-editor-list-title-content"><div class="js-ladder-toggle area-editor-ladder-toggle extend">+</div><span>河南省</span></div></div></li><li area-id="420000"><div class="area-editor-list-title"><div class="area-editor-list-title-content"><div class="js-ladder-toggle area-editor-ladder-toggle extend">+</div><span>湖北省</span></div></div></li><li area-id="430000"><div class="area-editor-list-title"><div class="area-editor-list-title-content"><div class="js-ladder-toggle area-editor-ladder-toggle extend">+</div><span>湖南省</span></div></div></li><li area-id="440000"><div class="area-editor-list-title"><div class="area-editor-list-title-content"><div class="js-ladder-toggle area-editor-ladder-toggle extend">+</div><span>广东省</span></div></div></li><li area-id="450000"><div class="area-editor-list-title"><div class="area-editor-list-title-content"><div class="js-ladder-toggle area-editor-ladder-toggle extend">+</div><span>广西壮族自治区</span></div></div></li><li area-id="460000"><div class="area-editor-list-title"><div class="area-editor-list-title-content"><div class="js-ladder-toggle area-editor-ladder-toggle extend">+</div><span>海南省</span></div></div></li><li area-id="500000"><div class="area-editor-list-title"><div class="area-editor-list-title-content"><div class="js-ladder-toggle area-editor-ladder-toggle extend">+</div><span>重庆市</span></div></div></li><li area-id="510000"><div class="area-editor-list-title"><div class="area-editor-list-title-content"><div class="js-ladder-toggle area-editor-ladder-toggle extend">+</div><span>四川省</span></div></div></li><li area-id="520000"><div class="area-editor-list-title"><div class="area-editor-list-title-content"><div class="js-ladder-toggle area-editor-ladder-toggle extend">+</div><span>贵州省</span></div></div></li><li area-id="530000"><div class="area-editor-list-title"><div class="area-editor-list-title-content"><div class="js-ladder-toggle area-editor-ladder-toggle extend">+</div><span>云南省</span></div></div></li><li area-id="540000"><div class="area-editor-list-title"><div class="area-editor-list-title-content"><div class="js-ladder-toggle area-editor-ladder-toggle extend">+</div><span>西藏自治区</span></div></div></li><li area-id="610000"><div class="area-editor-list-title"><div class="area-editor-list-title-content"><div class="js-ladder-toggle area-editor-ladder-toggle extend">+</div><span>陕西省</span></div></div></li><li area-id="620000"><div class="area-editor-list-title"><div class="area-editor-list-title-content"><div class="js-ladder-toggle area-editor-ladder-toggle extend">+</div><span>甘肃省</span></div></div></li><li area-id="630000"><div class="area-editor-list-title"><div class="area-editor-list-title-content"><div class="js-ladder-toggle area-editor-ladder-toggle extend">+</div><span>青海省</span></div></div></li><li area-id="640000"><div class="area-editor-list-title"><div class="area-editor-list-title-content"><div class="js-ladder-toggle area-editor-ladder-toggle extend">+</div><span>宁夏回族自治区</span></div></div></li><li area-id="650000"><div class="area-editor-list-title"><div class="area-editor-list-title-content"><div class="js-ladder-toggle area-editor-ladder-toggle extend">+</div><span>新疆维吾尔自治区</span></div></div></li><li area-id="710000"><div class="area-editor-list-title"><div class="area-editor-list-title-content"><div class="js-ladder-toggle area-editor-ladder-toggle extend">+</div><span>台湾省</span></div></div></li><li area-id="810000"><div class="area-editor-list-title"><div class="area-editor-list-title-content"><div class="js-ladder-toggle area-editor-ladder-toggle extend">+</div><span>香港特别行政区</span></div></div></li><li area-id="820000"><div class="area-editor-list-title"><div class="area-editor-list-title-content"><div class="js-ladder-toggle area-editor-ladder-toggle extend">+</div><span>澳门特别行政区</span></div></div></li></ul></li></ul></div></div>
            <button class="btn btn-default btn-wide area-editor-add-btn js-area-editor-translate" style="">
              添加
            </button>
            <div class="area-editor-column area-editor-column-used js-area-editor-used">
              <div class="area-editor"><h4 class="area-editor-head font-weight600">已选省、市
              </h4>
              <ul class="area-editor-list">
                  <li>
                    <ul class="area-editor-list area-editor-depth">
                    </ul>
                  </li>
              </ul>
        </div></div>
      </div></div>
      <div class="area-modal-foot">
        <button id="areabu" class="btn btn-primary btn-wide js-modal" style="color: #fff;">
          确定
        </button>&nbsp;&nbsp;
        <button class="btn btn-default btn-wide js-modal ">
          取消
        </button></div></div></div></div>

</body>
<script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="__SUP_PUBLIC__/js//wuliu_js/area.min.js"></script>
<script type="text/javascript" src="__SUP_PUBLIC__/js//wuliu_js/base.js"></script>
<script type="text/javascript" src="__SUP_PUBLIC__/js//wuliu_js/delivery.js"></script>
<script type="text/javascript" src="__SUP_PUBLIC__/js//ind.js"></script>
<script>
$("#areabu").click(function(){
  // var id=$(".area-editor area-editor-list ul li").attr('area-id');
    // var id=$(".area-modal-wrap ul.area-editor-list li div.js-ladder-select");
    var id=$("ul.area-editor-list.area-editor-depth li div.js-ladder-select");
    var len = (id.length)/2;
    for (var i = 0; i < len; i++) {
      var area = id[i].innerText;
      var length = area.length;
      var result = area.substr(0,length-1);
      console.log(result);
    };
    // area-editor-depth
    //area-editor-depth li ul class="area-editor-list 
  // alert(id);
  // console.log(id);
})


    //物流模板区域删除
    $(".tiddel").click(function(){
      var tid=$(this).attr('tid');
        $.ajax({
                  type: 'post',
                  url: "{:U('Setting/area_del')}",
                  data: {'tid':tid},
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