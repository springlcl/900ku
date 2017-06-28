<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8"><meta http-equiv="keywords" content="keyword1,keyword2,keyword3">
      <meta http-equiv="description" content="this is my page">
	<title>Document</title>
	<link rel="stylesheet" href="__SUP_PUBLIC__/css/style.css">
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries--><!--[if lt IE 9]><script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script><script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  <style>
  </style>
</head>
<body>
<!-- 左导一 -->
 <include file='Public/firstSidebar' />
<!-- 左导二 -->
  <include file='left' />
<!-- 右侧 内容-->
  <div class="clearfix container" id="app-container">

 <div class="cont_lump cont_lump_sell cont_lump_shangpin cont_lump_kfqzhunru">
       <div class="cont_title clearfix">
        <span>采购商准入</span>
       </div>
       <div class="xiaotiejiang clearfix">
           <div class="tupian fl">  <img src="__UPLOADS__/supplier/headimg/{$data.headimg}" alt=""></div>
           <div class="q_lianxiren fl">
             <p>采购商：{$data.pro_name}</p>
             <p>联系人：{$data.real_name}</p>
             <p >联系电话：{$data.mobile}</p>
           </div>
           <input type="hidden" id="id" value="{$str.exid}" class="adid">
           <div class="q_ruzhu fl">
              <p>入驻时间：{$data.time|date="Y-m-d",###}</p>
              <p><span>审核状态：</span> <span>
                <if condition="$data.renzheng eq 1">
                <img src="__SUP_PUBLIC__/images/dianpuhuang.png" alt="" class="img">已认证
                <else/>
                <img src="__SUP_PUBLIC__/images/dianpuhui.png" alt="" class="img">未认证
                </if>
              </span>
            </p>
           </div>
           <div class="q_zhunru fl">
              <p>已准入商品：{$zhunru}</p>
              <p>待准入商品：{$dai}</p>
           </div>
       </div>
       <div class="cont_title clearfix">
        <span>协议付款比例</span>
       </div>
       <div class="q_fukuang">
         <table>
          <tr>
            <th>
                付款阶段
            </th>
            <th>
              付款比例
            </th>
            
          </tr>
          <tr>
            <td>
              <i class="duihao"></i>预付款
            </td>
            <td>{$str.prepayment}<span>%</span></td>
          </tr>
          <tr>
            <td><i class="duihao"></i>发货款</td>
            <td>{$str.payment_ratio}<span>%</span></td>
          </tr>
          <tr>
            <td><i class="duihao"></i>验货款</td>
            <td>{$str.inspection}<span>%</span></td>
          </tr>
          <tr>
            <td><i class="cuohao"></i>质保金</td>
            <td>{$str.warranty}<span>%</span><span style="display: inline-block;margin-left: 20px;">质保期：{$str.warranty_pt}个月</span></td>
          </tr>
         </table>
         <if condition="$str.status eq 0">
          <div class="fukuangann"><span>
            <button class="tongyi">同意</button></span> 
            <span><button class="jujue">拒绝</button></span>
            <div class="q_wenxinti sanjiao_right_juse_sm">温馨提示：请确认协议付款比例！</div>
          </div> 
        </if>
        <if condition="$str.status eq 2">
          <div class="fukuangann">
            <span><button>已拒绝</button></span> 
          </div>
        </if>
        <if condition="$str.status eq 1">
          <div class="fukuangann">
            <span><button>已同意</button></span> 
          </div>
        </if>
       </div>
      <div class="cont_title clearfix">
        <span>采购商列表</span> 
      </div>
      <div class="con">
         <div class="clearfix pdh10">
         
          <form action="" method="post" class="kucun_Sou fl mgr10">
              类目：<select name="fen" class="fenlei">
                <option value="">请选择</option>
                <volist id="fenlei" name="fenlei">
                <option value="{$fenlei.gcid}">{$fenlei.gc_name}</option>
                </volist>
              </select>
              商品名称：<input type="text" class="sou" name="sou">
              <!-- <button class="sou"><i> </i>搜索</button> -->
              <button class="dao">筛选</button>
          </form>
        </div>
        <div class="kuangzi">
            <div class="doods_nav_head" style="padding: 10px 20px;">
                <span style="width:113px;"></span>
                <span style="text-align: left;width: 20%;margin-left: 15px;min-width: 160px;">商品信息</span>
                <span style="width: 7%;margin-left: 2%;min-width: 60px;text-align: left;">协议价格<i></i></span>
                <span style="width: 6%;margin-left: 4.5%;min-width: 40px;">库存<i></i></span>
                <span style="width: 9.5%;margin-left: 0;min-width: 40px;">销量<i></i></span>
                <span style="width: 7.5%;margin-left: 0.8%;min-width: 40px;">状态</span>
                <span style="width: 15%;margin-left: 4%;min-width: 130px;">操作</span>
            </div>
            <div class="goodsShow">
                <ul>
                  <volist id='arr' name='arr'>
                    <li class="goods_item">
                        <input type="checkbox" name='message' value="{$arr.aid}" class="fl kucun_cb">
                        <div class="goods_item_mian clearfix">
                            <div class="num">{$xuhao++}</div>
                            <div class="print fl">
                                <img src="{$arr.goods_thumb}" alt="">
                                <if condition="$arr.status eq 5">
                               <span class="bg-red-tm pd2 poa col-fff" style="top: 0">价格变更中</span>
                                </if>
                            </div>

                            <div class="zxw">
                                <p class="col-lan mgt5">{$arr.goods_name}</p>
                                <p class="col-hui mgt5"><span>尺寸：M</span><span>颜色：天蓝色</span></p>
                            </div>
                            <div class="jiage">
                              <if condition="($arr.status eq 3) OR ($arr.status eq 5)">
                                 <p class="shanchu">￥ {$arr.goods_price}</p>
                                <span class="shanchu zuo">￥ {$arr.price}</span>
                                <span class="fw600 col-red fs-16">➡</span>
                                <span class="col-red mgt5 ">￥<span class="xg"> {$arr.xiugai}</span>
                                  <!-- <i  class="qianBi btn_show"></i> -->
                                </span>
                                <else/>
                                   <p class="shanchu">￥ {$arr.goods_price}</p>
                                  <span class="col-red mgt5 ">￥<span > {$arr.price}</span>
                                    <i  class="qianBi btn_show"></i>
                                  </span>
                                </if>

                              <div class="dj_box">
                                  <input type="text" class="jine">
                                  <button class="blan">确定</button>
                                  <button class="lhui" onclick="dj_hide()">取消</button>
                              </div>
                            </div>
                            <input type="hidden" class="aid" value="{$arr.aid}">
                            <div class="sales">{$arr.goods_num}</div>
                            <div class="stock">{$arr.goods_sale_num}</div>
                            <if condition="$arr.status eq 2">
                            <div class="zhuangt">准入中</div>
                            <div class="btn">
                                <button class="huangzin col-huang bg-lan tong" >同意</button>
                                <button class="baizi bg-lan jue">拒绝</button>
                            </div>
                            </if>
                            <if condition="$arr.status eq 1">
                            <div class="zhuangt">已准入</div>
                            <div class="btn">
                                <button class="change_price col-huang bg-lan btn_show">更改协议价格</button>
                            </div>
                            </if>
                            <if condition="$arr.status eq 3">
                            <div class="zhuangt">调价中</div>
                            <div class="btn">
                                <button class="change_price baizi bg-lan qx">取消调价</button>
                            </div>
                            </if>
                            <if condition="$arr.status eq 5">
                            <div class="zhuangt">调价中</div>
                            <div class="btn">
                                <button class="change_price baizi bg-lan qxtj">确认调价</button>
                            </div>
                            </if>
                        </div>
                    </li>
                  </volist>
                </ul>
            </div>
            <div class="goodDown clearfix">
              <div class="pi">
              <input type="checkbox" class="checkAll">
              <button class="plty">批量同意</button>
              <button class="pljj">批量拒绝</button>
              </div>
              {$page}
            </div>
        </div>
      </div>
    </div>

    <!-- 底部 == 版权 -->
    <div class="cont_lump con-foot">版权所有：900库 [京ICP备1000000001号-1</di>
  </div>
</body>
<script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/1.8.3/jquery.min.js"></script>
<script>
    

  $(".checkAll").click(function(){
    $('.kucun_cb').attr("checked",this.checked);
  });

  //批量同意准入
  $('.plty').click(function(){
    text = $("input:checkbox[name='message']:checked").map(function(index,elem) {
            return $(elem).val();
        }).get().join(',');
    var adid = $(this).parents().find('.adid').val();
        $.ajax({
            type : 'post',
            dataType : 'json',
            data : {'aid':text,'adid':adid},
            url : "{:U('Channel/set_status')}",
            success:function(data){
              location.reload();
            }
    });
  });

  //批量拒绝准入
  $('.pljj').click(function(){
    text = $("input:checkbox[name='message']:checked").map(function(index,elem) {
            return $(elem).val();
        }).get().join(',');
    var adid = $(this).parents().find('.adid').val();
        $.ajax({
            type : 'post',
            dataType : 'json',
            data : {'aid':text,'adid':adid},
            url : "{:U('Channel/set_refuse')}",
            success:function(data){
              location.reload();
            }
    });
  });

  //点击铅笔或修改协议价格弹出输入框
  $(".btn_show").click(function () {
    $(this).parents('.goods_item_mian').find(".dj_box").show(1);
    
  });
  function dj_hide() {$(".dj_box").hide(1);};
  //修改价格
  $(".dj_box .blan").click(function () {
    var keyVal = $(this).parent().find(".jine").val();
    var aid = $(this).parents().find('.aid').val();
    var adid = $(this).parents().find('.adid').val();
    if(keyVal.length==0){
      alert("请输入价格！")
    }else {
      $(".cont_lump_shangpin .con .kuangzi .goodsShow .goods_item .goods_item_mian .jiage p span").text($(".dj_box input").val());
      $(".dj_box").hide(1);
      $.ajax({
        type : 'post',
        dataType : 'json',
        data : {'aid':aid,'status':'3','xiugai':keyVal,'adid':adid},
        url : "{:U('Channel/set_prices')}",
        success:function(data){
          location.reload();
        }
      })
    }
  });
  $('.tongyi').click(function(){
    var id = $('#id').val();
      $.ajax({
        type : 'post',
        dataType : 'json',
        url : "{:U('Channel/edits')}",
        data : {'id':id,'status':'1'},
        success:function(data){
          if(data){
           location.reload();
          }
        }
      });
  });


  //确认采购商修改的价格
  $('.qxtj').click(function(){
    var id = $(this).parents().find('.aid').val();
    var jg = $(this).parent().parent().parent().find('.xg').text();
    $.ajax({
      type : 'post',
      dataType : 'json',
      url : "{:U('Channel/set_zt')}",
      data : {'price':jg,'aid':id,'status':1},
      success:function(data){
        location.reload();
      }
    })
  })

    //取消修改价格
    $('.qx').click(function(){
    var id = $(this).parents().find('.aid').val();
    var adid = $(this).parents().find('.adid').val();
    $.ajax({
      type : 'post',
      dataType : 'json',
      url : "{:U('Channel/set_zt')}",
      data : {'aid':id,'status':1,'adid':adid},
      success:function(data){
        location.reload();
      }
    })
  })


  //拒绝采购商付款比例
  $('.jujue').click(function(){
    var id = $('#id').val();
      $.ajax({
        type : 'post',
        dataType : 'json',
        url : "{:U('Channel/edits')}",
        data : {'id':id,'status':'2'},
        success:function(data){
          if(data){
           location.reload();
          }
        }
      })
  });

  //同意准入商品
  $('.tong').click(function(){
    var aid = $(this).parent().parent().find('.aid').val();
    var adid = $(this).parents().find('.adid').val();
    $.ajax({
      type : 'post',
      dataType : 'json',
      data : {'aid':aid,'status':'1','adid':adid},
      url : "{:U('Channel/set_price')}",
      success:function(data){
        location.reload();
      }
    })
  });

  //拒绝采购商准入
  $('.jue').click(function(){
    var aid = $(this).parent().parent().find('.aid').val();
    var adid = $(this).parents().find('.adid').val();
    $.ajax({
      type : 'post',
      dataType : 'json',
      data : {'aid':aid,'status':0,'adid':adid},
      url : "{:U('Channel/set_price')}",
      success:function(data){
        location.reload();
      }
    })
  });



</script>
</html>
<style>
  .img {
    margin-top:7px;
  }

  .pi {
    margin : 19px 13px;
  }
  .plty {
    margin:0 16px;
  }
  .zuo {
    margin-left:-25px;
  }
  .col-fff {
    background-color: rgba(255, 0, 0, 0.7);
    color: #fff;
    padding: 2px;
    position: absolute;
    display: inline-block;
    text-align: left;
    height:75px;
    font-size: 12px;
}
  }
</style>