<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link rel="stylesheet" href="__SUP_PUBLIC__/css/style.css">
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
    <div class="cont_lump cont_lump_sell cont_lump_shangpin">
      <div class="nav">
          <ul class="clearfix">
            <li class="clearfix shop q_zxk">
              <img src="__UPLOADS__/supplier/headimg/{$name.headimg}" class="fl" alt="">
              <span>{$name.real_name}</span>
            </li>
            <li class="shop">
              <p class='jibie'>{$name.jibie}</p>
              <h6>当前等级</h6>
            </li>
            <li class="shop">
              <p>{$er|default="0"}</p>
              <h6>下级业务员员人数</h6>
            </li>
            <li class="shop">
              <p>{$san|default="0"}</p>
              <h6>二级业务员人数</h6>
              <input type="hidden" id="uid" value="{$uid}">
            </li>
          </ul>
      </div>
      <div class="cont_title clearfix">
        <span>商品定价</span> 
        <div class="fication fr">
            <select id="province" datatype="*" > 
                        <option>-请选择分类-</option>
                        <option selected = "selected">一级分类1</option>
                        <option>一级分类2</option>
                        <option>一级分类3</option>
            </select>
            <input type="text" class="sou">
            <button class="sou"><i> </i>搜索<button>
        </div>
      </div>
      <div class="con">
        <div class="kuangzi">
            <div class="doods_nav_head">
                <span style="width:112px;"></span>
                <span style="width: 15%;text-align: left;min-width: 34px;min-width: 50px;margin-left: 15px;">商品<i></i></span>
                <span style="width: 10%;text-align: left;margin-left: 10.5%;">价格</span>
                <span style="width: 7.5%;margin-left: 3.1%;">库存<i></i></span>
                <span style="width: 7%;margin-left: 5.3%;">销量<i></i></span>
                <span style="width: 9%;margin-left: 8%;">操作</span>
            </div>
            <div class="goodsShow">
                <ul>
                  <volist id="data" name="data">
                  <li class="goods_item">
                        <div class="goods_item_mian clearfix">
                            <div class="num">{$xh++}</div>
                            <div class="print fl">
                                <img src="{$data.goods_thumb}" alt="">
                            </div>
                            <div class="zxw">
                                <p class="col-lan mgt5">{$data.goods_name}</p>
                                <p class="col-hui mgt5">
                                  <span><?php $i = explode(",",$data['goods_attribute']); echo $i[0]; ?></span>
                                  <span><?php $i = explode(",",$data['goods_attribute']); echo $i[1]; ?></span>
                                </p>
                            </div>
                            <div class="jiage">
                              <p class="shanchu">￥ {$data.goods_price}</p>
                              <p class="col-red mgt5">￥<span >
                               <?php $d = M('sal_price')
                               ->where("fix_id=%d and uid=%d and goods_id=%d",session('sup_uid'),$uid,$data['goods_id'])->find();
                               $g = M('goods')->field('goods_price')->where('goods_id='.$data['goods_id'])->find();
                               if($d){ echo $d['price']; }else{ echo $g['goods_price'];}
                               
                                ?>
                             </span>
                                <i  class="qianBi btn_show"></i>
                              </p>
                              <div class="dj_box">
                                  <input type="text" >
                                  <input type="hidden" class="gid" value="{$data.goods_id}">
                                  <button class="blan">确定</button>
                                  <button class="lhui" onclick="dj_hide()">取消</button>
                              </div>
                            </div>
                            <div class="sales">{$data.goods_num}</div>
                            <div class="stock">{$data.goods_sale_num}</div>
                            <div class="btn">
                                <span class="btn_show">定价</span>
                            </div>
                        </div>
                    </li>
                    </volist>
                </ul>
            </div>
            <div class="goodDown clearfix">
              {$page}
            </div>
        </div>
      </div>
    </div>
    <!-- 底部 == 版权 -->
    <div class="cont_lump con-foot">版权所有：900库 [京ICP备1000000001号-1</div>
  </div>

</body>
<script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/1.8.3/jquery.min.js"></script>
<script>
  $(".btn_show").click(function () {
    $(this).parents('.goods_item_mian').find(".dj_box").show(1);
  });
  function dj_hide() {$(".dj_box").hide(1);};
  $(".dj_box .blan").click(function () {
    var keyVal = $(this).parent().parent().find(".dj_box input").val();
    var gid = $(this).parent().parent().find('.gid').val();
    var jibie = $('.jibie').text();
    var uid = $('#uid').val();
    if(keyVal.length==0){
      alert("请输入价格！")
    }else {
      $(this).parent().parent().parent().find(".jiage p span").text(keyVal);
      // alert(uid);
      $.ajax({
        dataType : 'json',
        type : 'post',
        url : "{:U('Channel/jiage')}",
        data : {'goods_id':gid,'level':jibie,'price':keyVal,'uid':uid},
      });
      $(".dj_box").hide(1);
    }
  });

</script>
</html>