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
<include file="Public/firstSidebar" /> 
<!-- 左导二 -->
 <include file="Exhibition/exLeft" /> 
<!-- 右侧 内容-->
    <div class="clearfix container" id="app-container">
        <div class="cont_lump senior_dingzhi">
            <div class="cont_title">
              <span>高级定制</span>
            </div>
            <input type='hidden' class="name" name='exid' value="<?=$_GET['exid']?>">
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
                                <h5>商品魔方：<input class="w220"  type="text" placeholder="批量选择商品" disabled="disabled"><button >选择商品</button></h5>
                            </div>
                            <div class="imgs clearfix">
                                <div class="img"><img src="__SUP_PUBLIC__/images/tianjia.png" alt=""><span class="jian">-</span></div>
                                <div class="img"><img src="__SUP_PUBLIC__/images/tianjia.png" alt=""><span class="jian">-</span></div>
                                <div class="img"><img src="__SUP_PUBLIC__/images/tianjia.png" alt=""><span class="jian">-</span></div>
                                <div class="img"><img src="__SUP_PUBLIC__/images/tianjia.png" alt=""><span class="jian">-</span></div>
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
                        <div class="right_con fl">
                            <div class="sanjiao_left_ddd">
                                <h5>商品推荐：<input class="w220"  type="text" placeholder="批量选择商品" disabled="disabled"><button >选择商品</button></h5>
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
                        <div class="right_con fl">
                          <div class="img"><img src="__SUP_PUBLIC__/images/tianjia.png" alt=""><span class="jian">-</span></div>
                        </div>
                    </li>

                    <li class="row clearfix row_add">
                        <div class="fl left_tit"></div>
                        <div class="fl right_switch">
                            <span>是否显示</span>
                            <input type="checkbox" class="demo-text-7" />
                            <input type="hidden" class='c7' name='c7' value='{$t['goods_show_3']}'>
                        </div>
                        <div class="right_con fl">
                          <div class="img"><img src="__SUP_PUBLIC__/images/tianjia.png" alt=""><span class="jian">-</span></div>
                        </div>
                    </li>

                    <li class="row clearfix row_add">
                        <div class="fl left_tit"></div>
                        <div class="fl right_switch">
                            <span>是否显示</span>
                            <input type="checkbox" class="demo-text-8" />
                            <input type="hidden" class='c8' name='c8' value='{$t['goods_show_4']}'>
                        </div>
                        <div class="right_con fl">
                          <div class="img"><img src="__SUP_PUBLIC__/images/tianjia.png" alt=""><span class="jian">-</span></div>
                        </div>
                    </li>

                    <li class="row clearfix row_add">
                        <div class="fl left_tit"></div>
                        <div class="fl right_switch">
                            <span>是否显示</span>
                             <input type="checkbox" class="demo-text-9" />
                             <input type="hidden" class='c9' name='c9' value='{$t['goods_show_5']}'>
                        </div>
                        <div class="right_con fl">
                          <div class="img"><img src="__SUP_PUBLIC__/images/tianjia.png" alt=""><span class="jian">-</span></div>
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
                    <select  name="" id="sel1">
                        <!-- <option value="">-请选择-</option>
                        <volist name='onec' id='one'>
                        <option onclick="first()" id='one1' value="{$one.gcid}">{$one.gc_name}</option>
                        </volist> -->
                    </select>
                    <select  name="" id="sel2">
                       <!--  <option value="">-请选择-</option>
                        <option id='two' value="">坚果炒货</option> -->
                        
                    </select>
                    <select   name="" id="sel3">
                       <!--  <option value="">-请选择-</option>
                        <option id='three' value="">干货</option> -->
                       
                    </select>
                </li>
                <li>
                    <span class="text">商品分类：</span>
                    <input type="text">
                    <button><i class="ico_all"></i></button>
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

        <input type="hidden" name="gid" value='' id='hid_gid'>
        <ul class="goods_list ">
            <li>
                <div class="se_che"><input  type="radio" name="test"  value='1'></div>
                <div class="se_xuhao">01</div>
                <div class="se_img"><img src="__SUP_PUBLIC__/images/print1.png" alt=""></div>
                <div class="se_name">周杰伦-2017时间巡回演唱会cd</div>
                <div class="se_caozuo"><span>选择</span></div>
            </li>
            <li>
                <div class="se_che"><input   type="radio" name="test"  value='2'></div>
                <div class="se_xuhao">02</div>
                <div class="se_img"><img src="__SUP_PUBLIC__/images/print1.png" alt=""></div>
                <div class="se_name">周杰伦-2017时间巡回演唱会cd</div>
                <div class="se_caozuo"><span>选择</span></div>
            </li>
            <li>
                <div class="se_che"><input   type="radio" name="test"  value='3'></div>
                <div class="se_xuhao">03</div>
                <div class="se_img"><img src="__SUP_PUBLIC__/images/print1.png" alt=""></div>
                <div class="se_name">周杰伦-2017时间巡回演唱会cd</div>
                <div class="se_caozuo"><span>选择</span></div>
            </li>
            <li>
                <div class="se_che"><input   type="radio" name="test"  value='4'></div>
                <div class="se_xuhao">04</div>
                <div class="se_img"><img src="__SUP_PUBLIC__/images/print1.png" alt=""></div>
                <div class="se_name">周杰伦-2017时间巡回演唱会cd</div>
                <div class="se_caozuo"><span>选择</span></div>
            </li>
            <li>
                <div class="se_che"><input   type="radio" name="test"  value='5'></div>
                <div class="se_xuhao">05</div>
                <div class="se_img"><img src="__SUP_PUBLIC__/images/print1.png" alt=""></div>
                <div class="se_name">周杰伦-2017时间巡回演唱会cd</div>
                <div class="se_caozuo"><span>选择</span></div>
            </li>
        </ul>
        <div class="foot">
            <!-- <input type="checkbox">
            <span>排量选择</span> -->
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
<!-- <script type="text/javascript" src="__SUP_PUBLIC__/js/threeji.js"></script>
<script type="text/javascript" src="__SUP_PUBLIC__/js/GetProductCategorys.js"></script> -->
<script>
        var c1=$(".c1").val();
        if(c1==0){
            var data1=false;
        }else{
            var data1=true;
        }

        var c2=$(".c2").val();
        if(c2==0){
            var data2=false;
        }else{
            var data2=true;
        }

        var c3=$(".c3").val();
        if(c3==0){
            var data3=false;
        }else{
            var data3=true;
        }

        var c4=$(".c4").val();
        if(c4==0){
            var data4=false;
        }else{
            var data4=true;
        }

        var c5=$(".c5").val();
        if(c5==0){
            var data5=false;
        }else{
            var data5=true;
        }

        var c6=$(".c6").val();
        if(c6==0){
            var data6=false;
        }else{
            var data6=true;
        }

        var c7=$(".c7").val();
        if(c7==0){
            var data7=false;
        }else{
            var data7=true;
        }

        var c8=$(".c8").val();
        if(c8==0){
            var data8=false;
        }else{
            var data8=true;
        }

        var c9=$(".c9").val();
        if(c9==0){
            var data9=false;
        }else{
            var data9=true;
        }
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

        $("#n1").bind("click",function(){
             $('.protection').show();
        });

        // $(".demo-text-1").bind("click",function(){
        //     alert(111);
        // });

        $("#sub").bind("click",function(){
            var exid=$('.name').val();
            var gg=$('.gg').val();
            var c1=$('.demo-text-1').attr("checked");
            var c2=$('.demo-text-2').attr("checked");
            var c3=$('.demo-text-3').attr("checked");
            var c4=$('.demo-text-4').attr("checked");
            var c5=$('.demo-text-5').attr("checked");
            var c6=$('.demo-text-6').attr("checked");
            var c7=$('.demo-text-7').attr("checked");
            var c8=$('.demo-text-8').attr("checked");
            var c9=$('.demo-text-9').attr("checked");
            
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
            //alert(c1+c2+c3+c4+c5+c6+c7+c8+c9+exid);

        // var hgids=$("#hid_gid").val();
        // alert(hgids);
        // exit;
                $.ajax({
                  type: 'post',
                  url: "{:U('Store/sure_temp')}",
                  data: {'exid':exid,'gg':gg,'c1':c1,'c2':c2,'c3':c3,'c4':c4,'c5':c5,'c6':c6,'c7':c7,'c8':c8,'c9':c9},
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


        //添加商品弹窗获取商品id
 
        $("#sub2").bind("click",function(){
            // var id=$('.checked').val();
            // console.log($('input checkbox'));
            // alert(id);
            obj = document.getElementsByName("test");
            check_val = [];
            for(k in obj){
                if(obj[k].checked)
                    check_val.push(obj[k].value);
            }
            alert(check_val);
            $("#hid_gid").attr('value',check_val);
            location.reload();
        })


        //checkbox限制选择
        $("checkbox").click( function() {
        if ( $("checkbox:checked").length > 4 ) {
        $(this).attr("checked","");
        alert("最多只能选4个");
        }
        } );
 
        //添加商品分类三级联动
        // function first(){
        //    var cid1=$('#c_1').val();
        // }


       //  $(function(){
       //     //请求路径
       //     var url="{:U('store/three_cate')}";
       //     //option默认内容
       //     var option="<option value='0'>未选择</option>";
       //     //获取jq对象
       //     var $sel1=$("#sel1");
       //     var $sel2=$("#sel2");
       //     var $sel3=$("#sel3");
       //     //自动生成一个<option>元素
       //     function createOption(value,text){
       //         var $option=$("<option></option>");
       //         $option.attr("value",value);
       //         $option.text(text);
       //         return $option;
       //     }
       //     //加载数据
       //     function ajaxSelect($select,id){
       //         //get请求
       //         $.get(url,{"parent_id":id},function(data){
       //             $select.html(option);
       //             for(var k in data ){
       //                 $select.append(createOption(data[k].id,data[k].gc_name));
       //             }
       //         },"json");
       //     }

       //     //自动加载第一个下拉菜单
       //     ajaxSelect($sel1,"0");

       //     //选择第一个下拉菜单时加载第二个
       //      $sel1.change(function(){
       //          var id=$sel1.val();
       //          if(id=="0"){
       //              $sel2.html(option);
       //              $sel3.html(option);
       //          }else{
       //              ajaxSelect($sel2,id);
       //          }
       //      });

       //     //选择第二个下拉菜单时加载第三个
       //     $sel2.change(function(){
       //         var $id=$sel2.val();
       //         if($id=="0"){
       //             $sel3.html(option);
       //         }else{
       //             ajaxSelect($sel3,$id);
       //         }
       //     });
       // });
</script>
</html>