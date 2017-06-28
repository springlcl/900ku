<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>高级定制</title>
    <link rel="stylesheet" href="__SUP_PUBLIC__/css/style.css">
	<link rel="stylesheet" href="__SUP_PUBLIC__/js/dist/switch.css">
    <link rel="stylesheet" href="__SUP_PUBLIC__/css/pageStyle.css">
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
        <div class="cont_lump senior_dingzhi">
            <div class="cont_title">
              <span>高级定制</span>
            </div>
            <input type='hidden' class="name" name='exid' value="<?=session('exid')?>">
            <div class="con">
                <ul class="custo_list">
                    <li class="row clearfix row_advert">
                        <div class="fl left_tit">广告栏</div>
                        <div class="fl right_switch">
                            <span>是否显示</span>
                             <input type="checkbox" class="demo-text-1"  />
                             <input type="hidden" class='c1' name='c1' value='{$t['lb_show']}'>
                        </div>
                        <div class="right_con fl">
                            <div class="sanjiao_left_ddd">
                                <h5>注意：此模块不可编辑</h5>
                            </div>
                        </div>
                    </li>
                    <li class="row clearfix row_search">
                        <div class="fl left_tit">搜索栏</div>
                        <div class="fl right_switch">
                            <span>是否显示</span>
                             <input type="checkbox" class="demo-text-2" />
                             <input type="hidden" class='c2' name='c2' value='{$t['seach_show']}'>
                        </div>
                        <div class="right_con fl">
                            <div class="sanjiao_left_ddd">
                                <h5>注意：搜索的商品是根据商品标题匹配的。</h5>
                            </div>
                        </div>
                    </li>
                    <li class="row clearfix row_notice">
                        <div class="fl left_tit">公告栏</div>
                        <div class="fl right_switch">
                            <span>是否显示</span>
                             <input type="checkbox" class="demo-text-3" />
                             <input type="hidden" class='c3' name='c3' value='{$t['notice_show']}'>
                        </div>
                        <div class="right_con fl">
                            <div class="sanjiao_left_ddd">
                                <h5>公告：<input class="w220 gg" type="text" value="{$t['notice_content']}" placeholder="请填写内容,如果过长,将会在手机上滚动显示"></h5>
                            </div>
                        </div>
                    </li>
                    <li class="row clearfix row_cube">
                        <div class="fl left_tit">魔方推荐</div>
                        <div class="fl right_switch">
                            <span>是否显示</span>
                             <input type="checkbox" class="demo-text-4" />
                             <input type="hidden" class='c4' name='c4' value='{$t['mofang_show']}'>
                        </div>
                        <div class="right_con fl">
                            <div class="sanjiao_left_ddd">
                                <h5>商品魔方：<input class="w220"  type="text" placeholder="更换商品请先取消原有商品，最多4个" disabled="disabled"><button id="firstbutton" >选择商品</button></h5>
                            </div>
                            <div id="img1" class="imgs clearfix">
                                <if condition="$mfgoods">
                                    <volist name='mfgoods' id="mf">
                                        <div class="img" id="" gid="{$mf['goods_id']}"><img src="__UPLOADS__/{$mf['goods_thumb']}" alt=""><span class="jian">-</span></div>
                                    </volist >
                                <else />

                                </if>
                                <!-- <div class="img"><img src="__SUP_PUBLIC__/images/tianjia.png" alt=""><span class="jian">-</span></div>
                                <div class="img"><img src="__SUP_PUBLIC__/images/tianjia.png" alt=""><span class="jian">-</span></div> -->

                            </div>
                        </div>
                    </li>

                    <li class="row clearfix row_commod">
                        <div class="fl left_tit">商品栏</div>
                        <div class="fl right_switch">
                            <span>是否显示</span>
                             <input type="checkbox" class="demo-text-5" />
                             <input type="hidden" class='c5' name='c5' value='{$t['goods_show_1']}'>
                        </div>
                        <div id="g1" class="right_con fl" >
                          <if condition="$fg[0]">
                        <div class="img" id="" gid="{$fg[0]['goods_id']}"><img style="width:110px;height:110px;position:absolute; z-index:2" src="__UPLOADS__/{$fg[0]['goods_thumb']}" alt=""><span class="jian">x</span></div> 
                        <else />
                        </if>
                        </div>
                        <div class="right_con fl " style="position:absolute; z-index:1">
                            <div class="sanjiao_left_ddd">
                                <h5>商品推荐：<input class="w220"  type="text" placeholder="单次选择商品，每次选择一个" disabled="disabled"><button id="sbutton" >选择商品</button></h5>
                            </div>
                         
                        </div>
                    </li>
                    <li class="row clearfix row_add">
                        <div class="fl left_tit"></div>
                        <div class="fl right_switch">
                            <span>是否显示</span>
                             <input type="checkbox" class="demo-text-6" />
                             <input type="hidden" class='c6' name='c6' value='{$t['goods_show_2']}'>
                        </div>
                        <div id="g2"  class="right_con fl">
                        <if condition="$fg[1]">
                        <div class="img" id="" gid="{$fg[1]['goods_id']}"><img style="width:110px;height:110px;position:absolute; z-index:2" src="__UPLOADS__/{$fg[1]['goods_thumb']}" alt=""><span class="jian">x</span> </div>
                        <else />
                        </if>
                        </div>
                    </li>

                    <li class="row clearfix row_add">
                        <div class="fl left_tit"></div>
                        <div class="fl right_switch">
                            <span>是否显示</span>
                            <input type="checkbox" class="demo-text-7" />
                            <input type="hidden" class='c7' name='c7' value='{$t['goods_show_3']}'>
                        </div>
                        <div id="g3"  class="right_con fl">
                          <if condition="$fg[2]">
                        <div class="img" id="" gid="{$fg[2]['goods_id']}"><img style="width:110px;height:110px;position:absolute; z-index:2" src="__UPLOADS__/{$fg[2]['goods_thumb']}" alt=""><span class="jian">x</span></div> 
                        <else />
                        </if>
                        </div>
                    </li>

                    <li class="row clearfix row_add">
                        <div class="fl left_tit"></div>
                        <div class="fl right_switch">
                            <span>是否显示</span>
                            <input type="checkbox" class="demo-text-8" />
                            <input type="hidden" class='c8' name='c8' value='{$t['goods_show_4']}'>
                        </div>
                        
                        <div  id="g4"  class="right_con fl">
                          <if condition="$fg[3]">
                        <div class="img" id="" gid="{$fg[3]['goods_id']}"><img style="width:110px;height:110px;position:absolute; z-index:2" src="__UPLOADS__/{$fg[3]['goods_thumb']}" alt=""><span class="jian">x</span></div> 
                        <else />
                        </if>
                        </div>
                       
                    </li>

                    <li class="row clearfix row_add">
                        <div class="fl left_tit"></div>
                        <div class="fl right_switch">
                            <span>是否显示</span>
                             <input type="checkbox" class="demo-text-9" />
                             <input type="hidden" class='c9' name='c9' value='{$t['goods_show_5']}'>
                        </div>
                        <div id="g5"  class="right_con fl">
                        <if condition="$fg[4]">
                        <div class="img" id="" gid="{$fg[4]['goods_id']}"><img style="width:110px;height:110px;position:absolute; z-index:2" src="__UPLOADS__/{$fg[4]['goods_thumb']}" alt=""><span class="jian">x</span></div> 
                        <else />
                        </if>
                        </div>
                    </li>
                </ul>
                <div class="confirm_rel">
                    <button class="btn-lan-160 del_bnt">确认发布</button>
                </div>
            </div>
        </div>
        <!-- 底部 == 版权 -->
        <div class="cont_lump con-foot">版权所有：900库 [京ICP备1000000001号-1</di>
    </div>
<style>

</style>
<!-- 弹框 -->
<div class="protection"  >
    <div class="tanchu_box  select_goods_box">
        <span class="gb close_btn"><i></i></span>
        <h3 class="font-size24 font-weight600 col-333 pdh20 center">添加商品</h3>
        <ul class="chax_form">
            <form action="">
                <li>
                    <span class="text">商品分类：</span>
                    <select  name="" id="c_1">
                        <option selected='selected' value="">-请选择-</option>
                        <volist name='onec' id='one'>
                        <option   value="{$one.gcid}">{$one.gc_name}</option>
                        </volist>
                    </select>
                    <select  name="" id="c_2">
                        <!-- <option value="">-请选择-</option> -->
                        
                        
                    </select>
                    <select   name="" id="c_3">
                       <!--  <option value="">-请选择-</option> -->
                        
                       
                    </select>
                </li>
                <li>
                    <span class="text">商品分类：</span>
                    <input type="text" id="search_text" >
                    <!-- <button><i class="ico_all"></i></button> -->
                </li>
            </form>
        </ul>
        <ul class="sele_nav clearfix bg-f5">
            <li class="se_che">&nbsp;</li>
            <li class="se_xuhao">&nbsp;</li>
            <li class="se_img">&nbsp;</li>
            <li class="se_name">商品名称</li>
            <li class="se_caozuo">操作</li>
        </ul>

        <input type="hidden" name="shownum" value='' id='show'>
        <input type="hidden" name="where_button" value="" id="where">
        <ul id="select_goods" class="goods_list ">
            <!-- <li>
                <div class="se_che"><input  type="radio" name="test"  value='1'></div>
                <div class="se_xuhao">01</div>
                <div class="se_img"><img src="__SUP_PUBLIC__/images/print1.png" alt=""></div>
                <div class="se_name">周杰伦-2017时间巡回演唱会cd</div>
                <div class="se_caozuo"><span>选择</span></div>
            </li> -->

        </ul>
        <div id="demo1" class='jPaginate'></div>
        <div class="foot">
            <input type="checkbox">
            <span>选择</span>
            <button id="sub2" class="btn-lan-160">提交</button>
        </div>
    </div>

        <!-- 确认发布 -->
    <div class="tanchu_box delTanBox">
      <span class="gb close_btn"><i></i></span>
      <h3 class="tit">确定发布?</h3>
      <div class="btn">
        <button id="sub" class="btn-lan-80 mgw15">确定</button>
        <button class="btn-lan-80 mgw15 close_btn">取消</button>
      </div>
      <div class="prompt">温馨提示：请谨慎选择！</div>
    </div>
  </div>
</body>
<script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="__SUP_PUBLIC__/js/dist/switch.js"></script>
<script src="__SUP_PUBLIC__/js/ind.js"></script>
<script src="__SUP_PUBLIC__/js/paginate.js"></script>
<!-- <script type="text/javascript" src="__SUP_PUBLIC__/js/threeji.js"></script>
<script type="text/javascript" src="__SUP_PUBLIC__/js/GetProductCategorys.js"></script> -->
<script>

//点击选择商品按钮，在弹窗隐藏域中存储点击来源
    $("#firstbutton").bind('click',function(){
        $("#where").val(1);
    })
    $("#sbutton").bind('click',function(){
        $("#where").val(2);
    })

        //页面显示状态按钮

    for (var i = 1; i <= 9; i++) {
        var ci = 'c'+i;
        var di='data' + i;
        var cc=$("."+ci).val();
        //alert(di);
        if(cc==0){
            eval('var '+di+"=false");
        }else{
            eval('var '+di+"=true");
        }
    };
        var switches = {};
        var switchConfig = {
            'demo-text-1' :{size: 'small',showText: true,onText: 'O',offText: 'X',checked: data1},
            'demo-text-2' :{size: 'small',showText: true,onText: 'O',offText: 'X',checked: data2},
            'demo-text-3' :{size: 'small',showText: true,onText: 'O',offText: 'X',checked: data3},
            'demo-text-4' :{size: 'small',showText: true,onText: 'O',offText: 'X',checked: data4},
            'demo-text-5' :{size: 'small',showText: true,onText: 'O',offText: 'X',checked: data5},
            'demo-text-6' :{size: 'small',showText: true,onText: 'O',offText: 'X',checked: data6},
            'demo-text-7' :{size: 'small',showText: true,onText: 'O',offText: 'X',checked: data7},
            'demo-text-8' :{size: 'small',showText: true,onText: 'O',offText: 'X',checked: data8},
            'demo-text-9' :{size: 'small',showText: true,onText: 'O',offText: 'X',checked: data9}
        };

        Object.keys(switchConfig).forEach(function (key) {
            switches[key] = new Switch(document.querySelector('.' + key),switchConfig[key]);
        });

        function switchHandle(key, event) {
            switches[key][event]();
        }
        // hljs.initHighlightingOnLoad();

        // $("#n1").bind("click",function(){
        //      $('.protection').show();
        // });

        // $(".demo-text-1").bind("click",function(){
        //     alert(111);
        // });
        //修改高级定制配置
        $("#sub").bind("click",function(){
            var exid=$('.name').val();                  //展厅
            var gg=$('.gg').val();                      //广告
            var c1=$('.demo-text-1').attr("checked");
            var c2=$('.demo-text-2').attr("checked");
            var c3=$('.demo-text-3').attr("checked");
            var c4=$('.demo-text-4').attr("checked");
            var c5=$('.demo-text-5').attr("checked");
            var c6=$('.demo-text-6').attr("checked");
            var c7=$('.demo-text-7').attr("checked");
            var c8=$('.demo-text-8').attr("checked");
            var c9=$('.demo-text-9').attr("checked");
            var g1=$('#g1 div').attr('gid');
            var g2=$('#g2 div').attr('gid');
            var g3=$('#g3 div').attr('gid');
            var g4=$('#g4 div').attr('gid');
            var g5=$('#g5 div').attr('gid');

            var mfgids=[];
            var i=0;
              $("#img1 div[class='img']").each(function(){
                    i++;
                    mfgids[i]=$(this).attr('gid');
                });
            
            if(c1){
                c1="1";
            }else{
                c1="0";
            }
            if(c2){
                c2="1";
            }else{
                c2="0";
            }
            if(c3){
                c3="1";
            }else{
                c3="0";
            }
            if(c4){
                c4="1";
            }else{
                c4="0";
            }
            if(c5){
                c5="1";
            }else{
                c5="0";
            }
            if(c6){
                c6="1";
            }else{
                c6="0";
            }
            if(c7){
                c7="1";
            }else{
                c7="0";
            }
            if(c8){
                c8="1";
            }else{
                c8="0";
            }
            if(c9){
                c9="1";
            }else{
                c9="0";
            }

                $.ajax({
                  type: 'post',
                  url: "{:U('Store/sure_temp')}",
                  data: {'g1':g1,'g2':g2,'g3':g3,'g4':g4,'g5':g5,'mfgids':mfgids,'exid':exid,'gg':gg,'c1':c1,'c2':c2,'c3':c3,'c4':c4,'c5':c5,'c6':c6,'c7':c7,'c8':c8,'c9':c9},
                  dataType: 'json',
                  async: false,
                  success: function(data)
                  {
                    if(data)
                    {
                      location.reload();
                    }else{
                        location.reload();
                    }
                  }
                });
        });


        //添加商品弹窗获取选中商品信息
 
        $("#sub2").bind("click",function(){

            obj = document.getElementsByName("test");
            check_val = [];
            for(k in obj){
                if(obj[k].checked)
                    check_val.push(obj[k].value);
            }

                $.ajax({
                  type: 'post',
                  url: "{:U('Store/goods_img')}",
                  data: {'gids':check_val},
                  dataType: 'json',
                  async: false,
                  success: function(data)
                  {
                    if(data)
                    {
                    //获取弹窗按钮来源
                    var where=$("#where").val();
                    //判断弹窗是魔方推荐
                    if(where==1){
                    //
                    for(var j = 0,len=data.length; j < len; j++) {
                       $("#img1").append('<div class="img" gid="'+data[j]['goods_id']+'"><img src="__UPLOADS__/'+data[j]['goods_thumb']+'" alt=""><span class="jian">-</span></div>');
                       $("span.jian").click(function(){
                              $(this).parent().remove();
                            });
                       } 
                    //判断弹窗为商品推荐
                    }else{
                        //alert($("#g3 div").length);
                       
                        if($("#g1 div").length==0){
                            
                            $("#g1").append('<div class="img" gid="'+data[0]['goods_id']+'"><img  style="width:110px;height:110px;position:absolute; z-index:2;" src="__UPLOADS__/'+data[0]['goods_thumb']+'" alt=""><span class="jian">x</span></div>');
                            $("span.jian").click(function(){
                              $(this).parent().remove();
                            });
                            
                        }else if($("#g2 div").length==0){
                           
                            $("#g2").append('<div class="img" gid="'+data[0]['goods_id']+'"><img style="width:110px;height:110px;" src="__UPLOADS__/'+data[0]['goods_thumb']+'" alt=""><span class="jian">x</span></div>');
                            $("span.jian").click(function(){
                              $(this).parent().remove();
                            });
                          
                        }else if($("#g3 div").length==0){
                            //alert(1);
                            $("#g3").append('<div class="img" gid="'+data[0]['goods_id']+'"><img style="width:110px;height:110px;" src="__UPLOADS__/'+data[0]['goods_thumb']+'" alt=""><span class="jian">x</span></div>');
                            $("span.jian").click(function(){
                              $(this).parent().remove();
                            });
                          
                        }else if($("#g4 div").length==0){
                         
                            $("#g4").append('<div class="img" gid="'+data[0]['goods_id']+'"><img style="width:110px;height:110px;" src="__UPLOADS__/'+data[0]['goods_thumb']+'" alt=""><span class="jian">x</span></div>');
                            $("span.jian").click(function(){
                              $(this).parent().remove();
                            });
                          
                        }else if($("#g5 div").length==0){
                           
                            $("#g5").append('<div class="img" gid="'+data[0]['goods_id']+'"><img style="width:110px;height:110px;" src="__UPLOADS__/'+data[0]['goods_thumb']+'" alt=""><span class="jian">x</span></div>');
                            $("span.jian").click(function(){
                              $(this).parent().remove();
                            });
                         
                        }else{

                        }

                    }  
                    //ajax数据返回失败
                    }else{
                        location.reload();
                    }
                    //限制主页面魔方推荐只能显示4个
                    var div = document.querySelector("#img1");
                    var divs = div.querySelectorAll("div");
                    if(divs.length > 4) {
                        for (var i = 4; i <= divs.length; i++) {
                            if(divs[i]){
                            divs[i].remove();
                            }
                        };
                            
                    }
                    //关闭窗口
                    $("#c_1").find("option[value='']").attr("selected",true);
                    $("#c_2 option").remove();
                    $("#c_3 option").remove();
                    $("#select_goods li").remove();
                    $("#demo1").html("");
                    $("#search_text").val("");
                    $('.protection').hide(0);
                    $(".tanchu_box").hide(0);
                  }
                });
        })

        //图片减号点击删除
        $("span.jian").click(function(){
            //$(this).parent().hide(0);
            $(this).parent().remove();
        });

        
        //搜索分类
        $("#search_text").blur(function(){
            //清空3级分类
            $("#c_1").find("option[value='']").attr("selected",true);
            $("#c_2 option").remove();
            $("#c_3 option").remove();
            //每次重新搜索清空li
            $("#select_goods li").remove();
            //清除分页
            $("#demo1").html("");
            var text=$("#search_text").val();
            //获取弹窗按钮来源
            var where=$("#where").val();
            //获取展厅id
              var exid=$('.name').val();
              //alert(exid);          
            
                $.ajax({
                  type: 'post',
                  url: "{:U('Store/search_goods')}",
                  data: {'text':text,'exid':exid},
                  dataType: 'json',
                  async: false,
                  success: function(data)
                  {
                    if(data)
                    {
                //ajax分页div      
                     $("#demo1").paginate({
                count       : data.page,
                start       : 1,
                display     : 8,
                border                  : true,
                border_color            : '#fff',
                text_color              : '#fff',
                background_color        : 'black',  
                border_hover_color      : '#ccc',
                text_hover_color        : '#000',
                background_hover_color  : '#fff', 
                images                  : false,
                mouse                   : 'press',
                onChange                : function(page){
                    var page = page;
                    //alert(page);
            $.ajax({
                  type: 'post',
                  url: "{:U('Store/search_goods')}",
                  data: {'text':text,'page':page,'exid':exid},
                  dataType: 'json',
                  async: false,
                  success: function(data)
                  {
                    if(data)
                    {

                        data=data.goods;
                        //console.log(data);
                    //每次重新搜索清空li
                    $("#select_goods li").remove();
                    //显示搜索商品
                    //判断为魔方推荐弹窗，显示复选框
                    if(where==1){
                    for(var j = 0,len=data.length; j < len; j++) {
                       $(".goods_list").append('<li><div class="se_che"><input type="checkbox" name="test" value="'+data[j]['goods_id']+'" /></div><div class="se_xuhao">'+data[j]['goods_id']+'</div><div class="se_img"><img src="__UPLOADS__/'+data[j]['goods_thumb']+'" alt=""></div><div class="se_name">'+data[j]['goods_name']+'</div><div class="se_caozuo"><span>选择</span></div></li>');
                    //选择按钮触发checkbox选中
                    $(".se_caozuo span").toggle( 
                      function () { 
                          $(this).parent().parent().find("input").prop("checked",true);
                      }, 
                      function () { 
                          $(this).parent().parent().find("input").prop("checked",false);
                      } );

                       }
                    //限制最多选中x个（根据页面展示数据得到最大选中数）
                    // $('input[type=checkbox]').click(function() {
                    //     //alert($("input[type=checkbox]:checked").length);
                    //    $("input[type=checkbox]").attr('disabled', true);
                    //    if ($("input[type=checkbox]:checked").length >=13) {
                    //     $("input[type=checkbox]:checked").attr('disabled', false);
                    //    } else {
                    //     $("input[type=checkbox]").attr('disabled', false);
                    //    }
                    //   });

                    //判断商品推荐弹窗，显示单选框                        
                   }else{
                    for(var j = 0,len=data.length; j < len; j++) {
                       $(".goods_list").append('<li><div class="se_che"><input type="radio" name="test" value="'+data[j]['goods_id']+'" /></div><div class="se_xuhao">'+data[j]['goods_id']+'</div><div class="se_img"><img src="__UPLOADS__/'+data[j]['goods_thumb']+'" alt=""></div><div class="se_name">'+data[j]['goods_name']+'</div><div class="se_caozuo"><span>选择</span></div></li>');
                    //选择按钮触发checkbox选中
                    $(".se_caozuo span").toggle( 
                      function () { 
                          $(this).parent().parent().find("input").prop("checked",true);
                      }, 
                      function () { 
                          $(this).parent().parent().find("input").prop("checked",false);
                      } 
                    );
                       }

                   }
                    }else{
                        // location.reload();
                    }
                  }
                });

                }
            });
                //
                // $(document).on('click','ul.jPag-pages li',function(){
                //     console.log($(this).html());
                // })
                    //每次重新搜索清空li
                    $("#select_goods li").remove();
                    //数据   
                    data=data.goods;
                    //获取魔方剩余显示图片个数
                    var pic1=4-$("#img1  img").length;
                    //每次重新搜索清空li
                    $("#select_goods li").remove();
                    //显示搜索商品
                    //判断为魔方推荐弹窗，显示复选框
                    if(where==1){
                    for(var j = 0,len=data.length; j < len; j++) {
                       $(".goods_list").append('<li><div class="se_che"><input type="checkbox" name="test" value="'+data[j]['goods_id']+'" /></div><div class="se_xuhao">'+data[j]['goods_id']+'</div><div class="se_img"><img src="__UPLOADS__/'+data[j]['goods_thumb']+'" alt=""></div><div class="se_name">'+data[j]['goods_name']+'</div><div class="se_caozuo"><span>选择</span></div></li>');
                    //选择按钮触发checkbox选中
                    $(".se_caozuo span").toggle( 
                      function () { 
                          $(this).parent().parent().find("input").prop("checked",true);
                      }, 
                      function () { 
                          $(this).parent().parent().find("input").prop("checked",false);
                      } );

                       }
                    //判断商品推荐弹窗，显示单选框                        
                   }else{
                    for(var j = 0,len=data.length; j < len; j++) {
                       $(".goods_list").append('<li><div class="se_che"><input type="radio" name="test" value="'+data[j]['goods_id']+'" /></div><div class="se_xuhao">'+data[j]['goods_id']+'</div><div class="se_img"><img src="__UPLOADS__/'+data[j]['goods_thumb']+'" alt=""></div><div class="se_name">'+data[j]['goods_name']+'</div><div class="se_caozuo"><span>选择</span></div></li>');
                    //选择按钮触发checkbox选中
                    $(".se_caozuo span").toggle( 
                      function () { 
                          $(this).parent().parent().find("input").prop("checked",true);
                      }, 
                      function () { 
                          $(this).parent().parent().find("input").prop("checked",false);
                      } 
                    );
                       }

                   }
                   //ajax数据接受失败返回
                    }else{
                        location.reload();
                    }
                  }
                });

        })

 
//添加商品分类三级联动-一级显示2级
        $("#c_1").change(function(){
            $("#c_2 option").remove();
            $("#c_3 option").remove();
            var cid1=$('#c_1').val();
            //获取弹窗按钮来源
            var where=$("#where").val();
            //每次重新搜索清空li
            $("#select_goods li").remove();
            //清除分页
            $("#demo1").html("");
            //获取展厅id
              var exid=$('.name').val();
            //alert(cid1);
            $("#c_2 option[onclick]").remove();
            $("#c_3 option[onclick]").remove();
            $.ajax({
                  type: 'post',
                  url: "{:U('Store/select_cate')}",
                  data: {'cid':cid1},
                  dataType: 'json',
                  async: false,
                  success: function(data)
                  {
                    if(data)
                    {
            //获取展厅id
              var exid=$('.name').val();
            //判断一级分类下若无下级分类，则显示该分类商品
                        if(data.length==0){
            //判断没有2级分类则1级显示商品
            $.ajax({
                  type: 'post',
                  url: "{:U('Store/select_good')}",
                  data: {'cid':cid1,'exid':exid},
                  dataType: 'json',
                  async: false,
                  success: function(data)
                  {
                    if(data)
                    {
            //获取展厅id
              var exid=$('.name').val();
                //ajax分页div      
                     $("#demo1").paginate({
                count       : data.page,
                start       : 1,
                display     : 8,
                border                  : true,
                border_color            : '#fff',
                text_color              : '#fff',
                background_color        : 'black',  
                border_hover_color      : '#ccc',
                text_hover_color        : '#000',
                background_hover_color  : '#fff', 
                images                  : false,
                mouse                   : 'press',
                onChange                : function(page){
                    var page = page;
                    //alert(page);
            $.ajax({
                  type: 'post',
                  url: "{:U('Store/select_good')}",
                  data: {'cid':cid1,'page':page,'exid':exid},
                  dataType: 'json',
                  async: false,
                  success: function(data)
                  {
                    if(data)
                    {

                    data=data.goods;
                    //每次重新搜索清空li
                    $("#select_goods li").remove();
                    //显示搜索商品
                    //判断为魔方推荐弹窗，显示复选框
                    if(where==1){
                    for(var j = 0,len=data.length; j < len; j++) {
                       $(".goods_list").append('<li><div class="se_che"><input type="checkbox" name="test" value="'+data[j]['goods_id']+'" /></div><div class="se_xuhao">'+data[j]['goods_id']+'</div><div class="se_img"><img src="__UPLOADS__/'+data[j]['goods_thumb']+'" alt=""></div><div class="se_name">'+data[j]['goods_name']+'</div><div class="se_caozuo"><span>选择</span></div></li>');
                    //选择按钮触发checkbox选中
                    $(".se_caozuo span").toggle( 
                      function () { 
                          $(this).parent().parent().find("input").prop("checked",true);
                      }, 
                      function () { 
                          $(this).parent().parent().find("input").prop("checked",false);
                      } );

                       }
                    //判断商品推荐弹窗，显示单选框                        
                   }else{
                    for(var j = 0,len=data.length; j < len; j++) {
                       $(".goods_list").append('<li><div class="se_che"><input type="radio" name="test" value="'+data[j]['goods_id']+'" /></div><div class="se_xuhao">'+data[j]['goods_id']+'</div><div class="se_img"><img src="__UPLOADS__/'+data[j]['goods_thumb']+'" alt=""></div><div class="se_name">'+data[j]['goods_name']+'</div><div class="se_caozuo"><span>选择</span></div></li>');
                    //选择按钮触发checkbox选中
                    $(".se_caozuo span").toggle( 
                      function () { 
                          $(this).parent().parent().find("input").prop("checked",true);
                      }, 
                      function () { 
                          $(this).parent().parent().find("input").prop("checked",false);
                      } 
                    );
                       }

                   }
                    }else{
                        location.reload();
                    }
                  }
                });

                }
            });
                    data=data.goods;
                    //获取弹窗按钮来源
                    var where=$("#where").val();
                    //获取魔方剩余显示图片个数
                    var pic1=4-$("#img1  img").length;
                    //每次重新搜索清空li
                    $("#select_goods li").remove();
                    //显示搜索商品
                    //判断为魔方推荐弹窗，显示复选框
                    if(where==1){
                    for(var j = 0,len=data.length; j < len; j++) {
                       $(".goods_list").append('<li><div class="se_che"><input type="checkbox" name="test" value="'+data[j]['goods_id']+'" /></div><div class="se_xuhao">'+data[j]['goods_id']+'</div><div class="se_img"><img src="__UPLOADS__/'+data[j]['goods_thumb']+'" alt=""></div><div class="se_name">'+data[j]['goods_name']+'</div><div class="se_caozuo"><span>选择</span></div></li>');
                    //选择按钮触发checkbox选中
                    $(".se_caozuo span").toggle( 
                      function () { 
                          $(this).parent().parent().find("input").prop("checked",true);
                      }, 
                      function () { 
                          $(this).parent().parent().find("input").prop("checked",false);
                      } 
                    );
                       }
                    //判断商品推荐弹窗，显示单选框                        
                   }else{
                    for(var j = 0,len=data.length; j < len; j++) {
                       $(".goods_list").append('<li><div class="se_che"><input type="radio" name="test" value="'+data[j]['goods_id']+'" /></div><div class="se_xuhao">'+data[j]['goods_id']+'</div><div class="se_img"><img src="__UPLOADS__/'+data[j]['goods_thumb']+'" alt=""></div><div class="se_name">'+data[j]['goods_name']+'</div><div class="se_caozuo"><span>选择</span></div></li>');
                    //选择按钮触发checkbox选中
                    $(".se_caozuo span").toggle( 
                      function () { 
                          $(this).parent().parent().find("input").prop("checked",true);
                      }, 
                      function () { 
                          $(this).parent().parent().find("input").prop("checked",false);
                      } 
                    );
                       }

                   }

                   //ajax数据接受失败返回
                    }else{

                    }
                  }
                });
                        }else{
//有分类，追加2级分类
                    for(var j = 0,len=data.length; j < len; j++) {
                    $("#c_2").append('<option value="'+data[j]['gcid']+'">'+data[j]['gc_name']+'</option>');
                    }
            //判断2级分类
            var cid2=$('#c_2').val();
            //获取弹窗按钮来源
            var where=$("#where").val();
            //每次重新搜索清空li
            $("#select_goods li").remove();
            //清除分页
            $("#demo1").html("");
            //获取展厅id
              var exid=$('.name').val();
            $("#c_3 option[onclick]").remove();
            $.ajax({
                  type: 'post',
                  url: "{:U('Store/select_cate')}",
                  data: {'cid':cid2},
                  dataType: 'json',
                  async: false,
                  success: function(data)
                  {
                    if(data)
                    {
                        if(data.length==0){
                var exid=$('.name').val();
            //判断没有3级分类则2级显示商品
            $.ajax({
                  type: 'post',
                  url: "{:U('Store/select_good')}",
                  data: {'cid':cid2,'exid':exid},
                  dataType: 'json',
                  async: false,
                  success: function(data)
                  {
                    if(data)
                    {
                //ajax分页div      
                     $("#demo1").paginate({
                count       : data.page,
                start       : 1,
                display     : 8,
                border                  : true,
                border_color            : '#fff',
                text_color              : '#fff',
                background_color        : 'black',  
                border_hover_color      : '#ccc',
                text_hover_color        : '#000',
                background_hover_color  : '#fff', 
                images                  : false,
                mouse                   : 'press',
                onChange                : function(page){
                    var page = page;
                    //alert(page);
            $.ajax({
                  type: 'post',
                  url: "{:U('Store/select_good')}",
                  data: {'cid':cid2,'page':page,'exid':exid},
                  dataType: 'json',
                  async: false,
                  success: function(data)
                  {
                    if(data)
                    {

                    data=data.goods;
                    //每次重新搜索清空li
                    $("#select_goods li").remove();
                    //显示搜索商品
                    //判断为魔方推荐弹窗，显示复选框
                    if(where==1){
                    for(var j = 0,len=data.length; j < len; j++) {
                       $(".goods_list").append('<li><div class="se_che"><input type="checkbox" name="test" value="'+data[j]['goods_id']+'" /></div><div class="se_xuhao">'+data[j]['goods_id']+'</div><div class="se_img"><img src="__UPLOADS__/'+data[j]['goods_thumb']+'" alt=""></div><div class="se_name">'+data[j]['goods_name']+'</div><div class="se_caozuo"><span>选择</span></div></li>');
                    //选择按钮触发checkbox选中
                    $(".se_caozuo span").toggle( 
                      function () { 
                          $(this).parent().parent().find("input").prop("checked",true);
                      }, 
                      function () { 
                          $(this).parent().parent().find("input").prop("checked",false);
                      } );

                       }
                    //判断商品推荐弹窗，显示单选框                        
                   }else{
                    for(var j = 0,len=data.length; j < len; j++) {
                       $(".goods_list").append('<li><div class="se_che"><input type="radio" name="test" value="'+data[j]['goods_id']+'" /></div><div class="se_xuhao">'+data[j]['goods_id']+'</div><div class="se_img"><img src="__UPLOADS__/'+data[j]['goods_thumb']+'" alt=""></div><div class="se_name">'+data[j]['goods_name']+'</div><div class="se_caozuo"><span>选择</span></div></li>');
                    //选择按钮触发checkbox选中
                    $(".se_caozuo span").toggle( 
                      function () { 
                          $(this).parent().parent().find("input").prop("checked",true);
                      }, 
                      function () { 
                          $(this).parent().parent().find("input").prop("checked",false);
                      } 
                    );
                       }

                   }
                    }else{
                        location.reload();
                    }
                  }
                });

                }
            });
                    data=data.goods;
                    //获取弹窗按钮来源
                    var where=$("#where").val();
                    //获取魔方剩余显示图片个数
                    var pic1=4-$("#img1  img").length;
                    //每次重新搜索清空li
                    $("#select_goods li").remove();
                    //显示搜索商品
                    //判断为魔方推荐弹窗，显示复选框
                    if(where==1){
                    for(var j = 0,len=data.length; j < len; j++) {
                       $(".goods_list").append('<li><div class="se_che"><input type="checkbox" name="test" value="'+data[j]['goods_id']+'" /></div><div class="se_xuhao">'+data[j]['goods_id']+'</div><div class="se_img"><img src="__UPLOADS__/'+data[j]['goods_thumb']+'" alt=""></div><div class="se_name">'+data[j]['goods_name']+'</div><div class="se_caozuo"><span>选择</span></div></li>');
                    //选择按钮触发checkbox选中
                    $(".se_caozuo span").toggle( 
                      function () { 
                          $(this).parent().parent().find("input").prop("checked",true);
                      }, 
                      function () { 
                          $(this).parent().parent().find("input").prop("checked",false);
                      } 
                    );
                       }
                    //判断商品推荐弹窗，显示单选框                        
                   }else{
                    for(var j = 0,len=data.length; j < len; j++) {
                       $(".goods_list").append('<li><div class="se_che"><input type="radio" name="test" value="'+data[j]['goods_id']+'" /></div><div class="se_xuhao">'+data[j]['goods_id']+'</div><div class="se_img"><img src="__UPLOADS__/'+data[j]['goods_thumb']+'" alt=""></div><div class="se_name">'+data[j]['goods_name']+'</div><div class="se_caozuo"><span>选择</span></div></li>');
                    //选择按钮触发checkbox选中
                    $(".se_caozuo span").toggle( 
                      function () { 
                          $(this).parent().parent().find("input").prop("checked",true);
                      }, 
                      function () { 
                          $(this).parent().parent().find("input").prop("checked",false);
                      } 
                    );
                       }

                   }

                   //ajax数据接受失败返回
                    }else{

                    }
                  }
                });
            //有三级分类追加分类信息
                        }else{
            for(var j = 0,len=data.length; j < len; j++) {
                $("#c_3").append('<option  value="'+data[j]['gcid']+'">'+data[j]['gc_name']+'</option>');
            }
            //显示3级分类信息
            var cid3=$("#c_3").val();
            //获取弹窗按钮来源
            var where=$("#where").val();
            //每次重新搜索清空li
            $("#select_goods li").remove();
            //清除分页
            $("#demo1").html("");
            //获取展厅id
              var exid=$('.name').val();
            $.ajax({
                  type: 'post',
                  url: "{:U('Store/select_good')}",
                  data: {'cid':cid3,'exid':exid},
                  dataType: 'json',
                  async: false,
                  success: function(data)
                  {
                    if(data)
                    {
                //ajax分页div      
                     $("#demo1").paginate({
                count       : data.page,
                start       : 1,
                display     : 8,
                border                  : true,
                border_color            : '#fff',
                text_color              : '#fff',
                background_color        : 'black',  
                border_hover_color      : '#ccc',
                text_hover_color        : '#000',
                background_hover_color  : '#fff', 
                images                  : false,
                mouse                   : 'press',
                onChange                : function(page){
                    var page = page;
                    //alert(page);
            $.ajax({
                  type: 'post',
                  url: "{:U('Store/select_good')}",
                  data: {'cid':cid3,'page':page,'exid':exid},
                  dataType: 'json',
                  async: false,
                  success: function(data)
                  {
                    if(data)
                    {

                    data=data.goods;
                    //每次重新搜索清空li
                    $("#select_goods li").remove();
                    //显示搜索商品
                    //判断为魔方推荐弹窗，显示复选框
                    if(where==1){
                    for(var j = 0,len=data.length; j < len; j++) {
                       $(".goods_list").append('<li><div class="se_che"><input type="checkbox" name="test" value="'+data[j]['goods_id']+'" /></div><div class="se_xuhao">'+data[j]['goods_id']+'</div><div class="se_img"><img src="__UPLOADS__/'+data[j]['goods_thumb']+'" alt=""></div><div class="se_name">'+data[j]['goods_name']+'</div><div class="se_caozuo"><span>选择</span></div></li>');
                    //选择按钮触发checkbox选中
                    $(".se_caozuo span").toggle( 
                      function () { 
                          $(this).parent().parent().find("input").prop("checked",true);
                      }, 
                      function () { 
                          $(this).parent().parent().find("input").prop("checked",false);
                      } );

                       }
                    //判断商品推荐弹窗，显示单选框                        
                   }else{
                    for(var j = 0,len=data.length; j < len; j++) {
                       $(".goods_list").append('<li><div class="se_che"><input type="radio" name="test" value="'+data[j]['goods_id']+'" /></div><div class="se_xuhao">'+data[j]['goods_id']+'</div><div class="se_img"><img src="__UPLOADS__/'+data[j]['goods_thumb']+'" alt=""></div><div class="se_name">'+data[j]['goods_name']+'</div><div class="se_caozuo"><span>选择</span></div></li>');
                    //选择按钮触发checkbox选中
                    $(".se_caozuo span").toggle( 
                      function () { 
                          $(this).parent().parent().find("input").prop("checked",true);
                      }, 
                      function () { 
                          $(this).parent().parent().find("input").prop("checked",false);
                      } 
                    );
                       }

                   }



                    }else{
                        location.reload();
                    }
                  }
                });

                }
            });
                    data=data.goods;
                    //获取弹窗按钮来源
                    var where=$("#where").val();
                    //获取魔方剩余显示图片个数
                    var pic1=4-$("#img1  img").length;
                    //每次重新搜索清空li
                    $("#select_goods li").remove();
                    //显示搜索商品
                    //判断为魔方推荐弹窗，显示复选框
                    if(where==1){
                    for(var j = 0,len=data.length; j < len; j++) {
                       $(".goods_list").append('<li><div class="se_che"><input type="checkbox" name="test" value="'+data[j]['goods_id']+'" /></div><div class="se_xuhao">'+data[j]['goods_id']+'</div><div class="se_img"><img src="__UPLOADS__/'+data[j]['goods_thumb']+'" alt=""></div><div class="se_name">'+data[j]['goods_name']+'</div><div class="se_caozuo"><span>选择</span></div></li>');
                    //选择按钮触发checkbox选中
                    $(".se_caozuo span").toggle( 
                      function () { 
                          $(this).parent().parent().find("input").prop("checked",true);
                      }, 
                      function () { 
                          $(this).parent().parent().find("input").prop("checked",false);
                      } 
                    );
                       }
                    //判断商品推荐弹窗，显示单选框                        
                   }else{
                    for(var j = 0,len=data.length; j < len; j++) {
                       $(".goods_list").append('<li><div class="se_che"><input type="radio" name="test" value="'+data[j]['goods_id']+'" /></div><div class="se_xuhao">'+data[j]['goods_id']+'</div><div class="se_img"><img src="__UPLOADS__/'+data[j]['goods_thumb']+'" alt=""></div><div class="se_name">'+data[j]['goods_name']+'</div><div class="se_caozuo"><span>选择</span></div></li>');
                    //选择按钮触发checkbox选中
                    $(".se_caozuo span").toggle( 
                      function () { 
                          $(this).parent().parent().find("input").prop("checked",true);
                      }, 
                      function () { 
                          $(this).parent().parent().find("input").prop("checked",false);
                      } 
                    );
                       }

                   }

                   //ajax数据接受失败返回
                    }else{

                    }
                  }
                });


                        }
                      //location.reload();
                    }else{
                        
                    }
                  }
                });
                        }
                      //location.reload();
                    }else{

                    }
                  }
                });
        })





//商品2级显示3级
        $("#c_2").change(function(){
            var cid2=$('#c_2').val();
            //获取弹窗按钮来源
            var where=$("#where").val();
            //每次重新搜索清空li
            $("#select_goods li").remove();
            //清除分页
            $("#demo1").html("");
            //获取展厅id
              var exid=$('.name').val();
            $("#c_3 option").remove();
            $.ajax({
                  type: 'post',
                  url: "{:U('Store/select_cate')}",
                  data: {'cid':cid2},
                  dataType: 'json',
                  async: false,
                  success: function(data)
                  {
                    if(data)
                    {
            //获取展厅id
              var exid=$('.name').val();
                        if(data.length==0){
            //判断没有3级分类则2级显示商品
            $.ajax({
                  type: 'post',
                  url: "{:U('Store/select_good')}",
                  data: {'cid':cid2,'exid':exid},
                  dataType: 'json',
                  async: false,
                  success: function(data)
                  {
                    if(data)
                    {
                //ajax分页div      
                     $("#demo1").paginate({
                count       : data.page,
                start       : 1,
                display     : 8,
                border                  : true,
                border_color            : '#fff',
                text_color              : '#fff',
                background_color        : 'black',  
                border_hover_color      : '#ccc',
                text_hover_color        : '#000',
                background_hover_color  : '#fff', 
                images                  : false,
                mouse                   : 'press',
                onChange                : function(page){
                    var page = page;
                    //alert(page);
            $.ajax({
                  type: 'post',
                  url: "{:U('Store/select_good')}",
                  data: {'cid':cid2,'page':page,'exid':exid},
                  dataType: 'json',
                  async: false,
                  success: function(data)
                  {
                    if(data)
                    {

                    data=data.goods;
                    //每次重新搜索清空li
                    $("#select_goods li").remove();
                    //显示搜索商品
                    //判断为魔方推荐弹窗，显示复选框
                    if(where==1){
                    for(var j = 0,len=data.length; j < len; j++) {
                       $(".goods_list").append('<li><div class="se_che"><input type="checkbox" name="test" value="'+data[j]['goods_id']+'" /></div><div class="se_xuhao">'+data[j]['goods_id']+'</div><div class="se_img"><img src="__UPLOADS__/'+data[j]['goods_thumb']+'" alt=""></div><div class="se_name">'+data[j]['goods_name']+'</div><div class="se_caozuo"><span>选择</span></div></li>');
                    //选择按钮触发checkbox选中
                    $(".se_caozuo span").toggle( 
                      function () { 
                          $(this).parent().parent().find("input").prop("checked",true);
                      }, 
                      function () { 
                          $(this).parent().parent().find("input").prop("checked",false);
                      } );

                       }
                    //判断商品推荐弹窗，显示单选框                        
                   }else{
                    for(var j = 0,len=data.length; j < len; j++) {
                       $(".goods_list").append('<li><div class="se_che"><input type="radio" name="test" value="'+data[j]['goods_id']+'" /></div><div class="se_xuhao">'+data[j]['goods_id']+'</div><div class="se_img"><img src="__UPLOADS__/'+data[j]['goods_thumb']+'" alt=""></div><div class="se_name">'+data[j]['goods_name']+'</div><div class="se_caozuo"><span>选择</span></div></li>');
                    //选择按钮触发checkbox选中
                    $(".se_caozuo span").toggle( 
                      function () { 
                          $(this).parent().parent().find("input").prop("checked",true);
                      }, 
                      function () { 
                          $(this).parent().parent().find("input").prop("checked",false);
                      } 
                    );
                       }

                   }
                    }else{
                        location.reload();
                    }
                  }
                });

                }
            });
                    data=data.goods;
                    //获取弹窗按钮来源
                    var where=$("#where").val();
                    //获取魔方剩余显示图片个数
                    var pic1=4-$("#img1  img").length;
                    //每次重新搜索清空li
                    $("#select_goods li").remove();
                    //显示搜索商品
                    //判断为魔方推荐弹窗，显示复选框
                    if(where==1){
                    for(var j = 0,len=data.length; j < len; j++) {
                       $(".goods_list").append('<li><div class="se_che"><input type="checkbox" name="test" value="'+data[j]['goods_id']+'" /></div><div class="se_xuhao">'+data[j]['goods_id']+'</div><div class="se_img"><img src="__UPLOADS__/'+data[j]['goods_thumb']+'" alt=""></div><div class="se_name">'+data[j]['goods_name']+'</div><div class="se_caozuo"><span>选择</span></div></li>');
                    //选择按钮触发checkbox选中
                    $(".se_caozuo span").toggle( 
                      function () { 
                          $(this).parent().parent().find("input").prop("checked",true);
                      }, 
                      function () { 
                          $(this).parent().parent().find("input").prop("checked",false);
                      } 
                    );
                       }
                    //判断商品推荐弹窗，显示单选框                        
                   }else{
                    for(var j = 0,len=data.length; j < len; j++) {
                       $(".goods_list").append('<li><div class="se_che"><input type="radio" name="test" value="'+data[j]['goods_id']+'" /></div><div class="se_xuhao">'+data[j]['goods_id']+'</div><div class="se_img"><img src="__UPLOADS__/'+data[j]['goods_thumb']+'" alt=""></div><div class="se_name">'+data[j]['goods_name']+'</div><div class="se_caozuo"><span>选择</span></div></li>');
                    //选择按钮触发checkbox选中
                    $(".se_caozuo span").toggle( 
                      function () { 
                          $(this).parent().parent().find("input").prop("checked",true);
                      }, 
                      function () { 
                          $(this).parent().parent().find("input").prop("checked",false);
                      } 
                    );
                       }

                   }

                   //ajax数据接受失败返回
                    }else{

                    }
                  }
                });
            //有三级分类追加分类信息
                        }else{
            for(var j = 0,len=data.length; j < len; j++) {
                $("#c_3").append('<option value="'+data[j]['gcid']+'">'+data[j]['gc_name']+'</option>');
            }
            //显示三级分类商品
            var cid3=$("#c_3").val();
            //获取弹窗按钮来源
            var where=$("#where").val();
            //每次重新搜索清空li
            $("#select_goods li").remove();
            //清除分页
            $("#demo1").html("");
            //获取展厅id
              var exid=$('.name').val();
            $.ajax({
                  type: 'post',
                  url: "{:U('Store/select_good')}",
                  data: {'cid':cid3,'exid':exid},
                  dataType: 'json',
                  async: false,
                  success: function(data)
                  {
                    if(data)
                    {
            //获取展厅id
              var exid=$('.name').val();
                //ajax分页div      
                     $("#demo1").paginate({
                count       : data.page,
                start       : 1,
                display     : 8,
                border                  : true,
                border_color            : '#fff',
                text_color              : '#fff',
                background_color        : 'black',  
                border_hover_color      : '#ccc',
                text_hover_color        : '#000',
                background_hover_color  : '#fff', 
                images                  : false,
                mouse                   : 'press',
                onChange                : function(page){
                    var page = page;
                    //alert(page);
            $.ajax({
                  type: 'post',
                  url: "{:U('Store/select_good')}",
                  data: {'cid':cid3,'page':page,'exid':exid},
                  dataType: 'json',
                  async: false,
                  success: function(data)
                  {
                    if(data)
                    {

                    data=data.goods;
                    //每次重新搜索清空li
                    $("#select_goods li").remove();
                    //显示搜索商品
                    //判断为魔方推荐弹窗，显示复选框
                    if(where==1){
                    for(var j = 0,len=data.length; j < len; j++) {
                       $(".goods_list").append('<li><div class="se_che"><input type="checkbox" name="test" value="'+data[j]['goods_id']+'" /></div><div class="se_xuhao">'+data[j]['goods_id']+'</div><div class="se_img"><img src="__UPLOADS__/'+data[j]['goods_thumb']+'" alt=""></div><div class="se_name">'+data[j]['goods_name']+'</div><div class="se_caozuo"><span>选择</span></div></li>');
                    //选择按钮触发checkbox选中
                    $(".se_caozuo span").toggle( 
                      function () { 
                          $(this).parent().parent().find("input").prop("checked",true);
                      }, 
                      function () { 
                          $(this).parent().parent().find("input").prop("checked",false);
                      } );

                       }
                    //判断商品推荐弹窗，显示单选框                        
                   }else{
                    for(var j = 0,len=data.length; j < len; j++) {
                       $(".goods_list").append('<li><div class="se_che"><input type="radio" name="test" value="'+data[j]['goods_id']+'" /></div><div class="se_xuhao">'+data[j]['goods_id']+'</div><div class="se_img"><img src="__UPLOADS__/'+data[j]['goods_thumb']+'" alt=""></div><div class="se_name">'+data[j]['goods_name']+'</div><div class="se_caozuo"><span>选择</span></div></li>');
                    //选择按钮触发checkbox选中
                    $(".se_caozuo span").toggle( 
                      function () { 
                          $(this).parent().parent().find("input").prop("checked",true);
                      }, 
                      function () { 
                          $(this).parent().parent().find("input").prop("checked",false);
                      } 
                    );
                       }

                   }



                    }else{
                        location.reload();
                    }
                  }
                });

                }
            });
                    data=data.goods;
                    //获取弹窗按钮来源
                    var where=$("#where").val();
                    //获取魔方剩余显示图片个数
                    var pic1=4-$("#img1  img").length;
                    //每次重新搜索清空li
                    $("#select_goods li").remove();
                    //显示搜索商品
                    //判断为魔方推荐弹窗，显示复选框
                    if(where==1){
                    for(var j = 0,len=data.length; j < len; j++) {
                       $(".goods_list").append('<li><div class="se_che"><input type="checkbox" name="test" value="'+data[j]['goods_id']+'" /></div><div class="se_xuhao">'+data[j]['goods_id']+'</div><div class="se_img"><img src="__UPLOADS__/'+data[j]['goods_thumb']+'" alt=""></div><div class="se_name">'+data[j]['goods_name']+'</div><div class="se_caozuo"><span>选择</span></div></li>');
                    //选择按钮触发checkbox选中
                    $(".se_caozuo span").toggle( 
                      function () { 
                          $(this).parent().parent().find("input").prop("checked",true);
                      }, 
                      function () { 
                          $(this).parent().parent().find("input").prop("checked",false);
                      } 
                    );
                       }
                    //判断商品推荐弹窗，显示单选框                        
                   }else{
                    for(var j = 0,len=data.length; j < len; j++) {
                       $(".goods_list").append('<li><div class="se_che"><input type="radio" name="test" value="'+data[j]['goods_id']+'" /></div><div class="se_xuhao">'+data[j]['goods_id']+'</div><div class="se_img"><img src="__UPLOADS__/'+data[j]['goods_thumb']+'" alt=""></div><div class="se_name">'+data[j]['goods_name']+'</div><div class="se_caozuo"><span>选择</span></div></li>');
                    //选择按钮触发checkbox选中
                    $(".se_caozuo span").toggle( 
                      function () { 
                          $(this).parent().parent().find("input").prop("checked",true);
                      }, 
                      function () { 
                          $(this).parent().parent().find("input").prop("checked",false);
                      } 
                    );
                       }

                   }

                   //ajax数据接受失败返回
                    }else{

                    }
                  }
                });



                        }
                      //location.reload();
                    }else{
                        
                    }
                  }
                });
       })



//显示3级分类搜索商品

            $("#c_3").change(function(){
            var cid3=$("#c_3").val();
            //获取弹窗按钮来源
            var where=$("#where").val();
            //每次重新搜索清空li
            $("#select_goods li").remove();
            //清除分页
            $("#demo1").html("");
            //获取展厅id
              var exid=$('.name').val();
            $.ajax({
                  type: 'post',
                  url: "{:U('Store/select_good')}",
                  data: {'cid':cid3,'exid':exid},
                  dataType: 'json',
                  async: false,
                  success: function(data)
                  {
                    if(data)
                    {
            //获取展厅id
              var exid=$('.name').val();
                //ajax分页div      
                     $("#demo1").paginate({
                count       : data.page,
                start       : 1,
                display     : 8,
                border                  : true,
                border_color            : '#fff',
                text_color              : '#fff',
                background_color        : 'black',  
                border_hover_color      : '#ccc',
                text_hover_color        : '#000',
                background_hover_color  : '#fff', 
                images                  : false,
                mouse                   : 'press',
                onChange                : function(page){
                    var page = page;
                    //alert(page);
            $.ajax({
                  type: 'post',
                  url: "{:U('Store/select_good')}",
                  data: {'cid':cid3,'page':page,'exid':exid},
                  dataType: 'json',
                  async: false,
                  success: function(data)
                  {
                    if(data)
                    {

                    data=data.goods;
                    //每次重新搜索清空li
                    $("#select_goods li").remove();
                    //显示搜索商品
                    //判断为魔方推荐弹窗，显示复选框
                    if(where==1){
                    for(var j = 0,len=data.length; j < len; j++) {
                       $(".goods_list").append('<li><div class="se_che"><input type="checkbox" name="test" value="'+data[j]['goods_id']+'" /></div><div class="se_xuhao">'+data[j]['goods_id']+'</div><div class="se_img"><img src="__UPLOADS__/'+data[j]['goods_thumb']+'" alt=""></div><div class="se_name">'+data[j]['goods_name']+'</div><div class="se_caozuo"><span>选择</span></div></li>');
                    //选择按钮触发checkbox选中
                    $(".se_caozuo span").toggle( 
                      function () { 
                          $(this).parent().parent().find("input").prop("checked",true);
                      }, 
                      function () { 
                          $(this).parent().parent().find("input").prop("checked",false);
                      } );

                       }
                    //判断商品推荐弹窗，显示单选框                        
                   }else{
                    for(var j = 0,len=data.length; j < len; j++) {
                       $(".goods_list").append('<li><div class="se_che"><input type="radio" name="test" value="'+data[j]['goods_id']+'" /></div><div class="se_xuhao">'+data[j]['goods_id']+'</div><div class="se_img"><img src="__UPLOADS__/'+data[j]['goods_thumb']+'" alt=""></div><div class="se_name">'+data[j]['goods_name']+'</div><div class="se_caozuo"><span>选择</span></div></li>');
                    //选择按钮触发checkbox选中
                    $(".se_caozuo span").toggle( 
                      function () { 
                          $(this).parent().parent().find("input").prop("checked",true);
                      }, 
                      function () { 
                          $(this).parent().parent().find("input").prop("checked",false);
                      } 
                    );
                       }

                   }



                    }else{
                        location.reload();
                    }
                  }
                });

                }
            });
                    data=data.goods;
                    //获取弹窗按钮来源
                    var where=$("#where").val();
                    //获取魔方剩余显示图片个数
                    var pic1=4-$("#img1  img").length;
                    //每次重新搜索清空li
                    $("#select_goods li").remove();
                    //显示搜索商品
                    //判断为魔方推荐弹窗，显示复选框
                    if(where==1){
                    for(var j = 0,len=data.length; j < len; j++) {
                       $(".goods_list").append('<li><div class="se_che"><input type="checkbox" name="test" value="'+data[j]['goods_id']+'" /></div><div class="se_xuhao">'+data[j]['goods_id']+'</div><div class="se_img"><img src="__UPLOADS__/'+data[j]['goods_thumb']+'" alt=""></div><div class="se_name">'+data[j]['goods_name']+'</div><div class="se_caozuo"><span>选择</span></div></li>');
                    //选择按钮触发checkbox选中
                    $(".se_caozuo span").toggle( 
                      function () { 
                          $(this).parent().parent().find("input").prop("checked",true);
                      }, 
                      function () { 
                          $(this).parent().parent().find("input").prop("checked",false);
                      } 
                    );
                       }
                    //判断商品推荐弹窗，显示单选框                        
                   }else{
                    for(var j = 0,len=data.length; j < len; j++) {
                       $(".goods_list").append('<li><div class="se_che"><input type="radio" name="test" value="'+data[j]['goods_id']+'" /></div><div class="se_xuhao">'+data[j]['goods_id']+'</div><div class="se_img"><img src="__UPLOADS__/'+data[j]['goods_thumb']+'" alt=""></div><div class="se_name">'+data[j]['goods_name']+'</div><div class="se_caozuo"><span>选择</span></div></li>');
                    //选择按钮触发checkbox选中
                    $(".se_caozuo span").toggle( 
                      function () { 
                          $(this).parent().parent().find("input").prop("checked",true);
                      }, 
                      function () { 
                          $(this).parent().parent().find("input").prop("checked",false);
                      } 
                    );
                       }

                   }

                   //ajax数据接受失败返回
                    }else{

                    }
                  }
                });
        })

</script>
</html>