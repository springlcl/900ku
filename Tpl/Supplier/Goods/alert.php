<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="__SUP_PUBLIC__/css/style.css">
    <link href="__PUBLIC__/plugins/layui/css/layui.css" rel="stylesheet" type="text/css">

    <style>
	</style>
</head>
<body>
<!-- 左导一 -->
<include file="Public/firstSidebar" />
<!-- 左导二 -->
<include file="Goods/secoundBar" />
<!-- 右侧 内容-->
<div class="clearfix container" id="app-container" target="{$url}">
    <div class="cont_lump cont_lump_sell cont_lump_qpolice">
      <div class="cont_title">
          <span><a href="">仓库报警列表</a></span>
          <input type="hidden" name="exid" value="{$Think.get.exid}" />
      </div>
      <div class="con">
        <div class="clearfix pdh10">
          <button class="button q_gr fl open_btn alert2" style="width: 120px;">仓库报警设置</button>
          <form action="" class="kucun_Sou fr mgr10">
              
              <input type="text" class="sou" >
              <button class="sou"><i> </i>搜索</button>
          </form>
        </div>
        <div class="kuangzi">
            <div class="doods_nav_head">
                <span style="width: 125px"></span>
                <span style="width: 10%;text-align: left">商品/价格<i></i></span>
                <span style="width: 10%;margin-left: 3.2%;">访问量</span>
                <span style="width: 8%;margin-left: 3.5%;">库存<i></i></span>
                <span style="width: 6%;margin-left: 3%;">总销量<i></i></span>
                <span style="width: 8%;margin-left: 5%;">创建时间<i></i></span>
                <span style="margin-left: 3.5%;width: 126px;">操作</span>
            </div>
            <div class="goodsShow">
                <ul>
                    <volist name="goods" id="vo">
                    <li class="goods_item">
                        <div class="goods_item_mian clearfix">
                            <input type="checkbox" name="goodsSel" value="{$vo.sku_id}" class="fl kucun_cb">
                            <div class="num"><if condition="$i lt 10">0{$i}<else />{$i}</if></div>
                            <div class="print fl">
                                <img src="__UPLOADS__/{$vo.goods_thumb}" alt="">
                            </div>
                            <div class="txt">
                                <p class="col-lan mgt5">{$vo.goods_name}</p>
                                <p class="col-red mgt5">￥ {$vo.goods_price}</p>
                                <p class="mgt5">[{$vo.attributes}]</p>
                            </div>
                            <div class="page_view">PV:{$vo.goods_pv}</div>
                            <div class="stock">{$vo.goods_num}</div>
                            <div class="sales">{$vo.goods_sale_num}</div>
                            <div class="date">{$vo.add_time|date='Y-m-d',###}</div>
                            <div class="btn">
                              <p>
                                <span>修改库存</span>
                              </p>
                              <div class="q_tanchun sanjiao_right_lan">
                                <input type="text">
                                <button class="qued">确定</button>
                                <button class="qux">取消</button>
                              </div>
                            </div>
                           
                        </div>
                    </li>
                    </volist>
                </ul>
            </div>
            <div class="goodDown clearfix">
              <div class="kucun_caozuo fl">
                  <input type="checkbox" name="1" value="1" class="fl">
                  <span class="cu-p" id="delete">删除</span>
              </div>
                <ul class="pagination" id="pagination" rows="{$warning}">
                </ul>
                <div class="page_total">
                    共有<b style="color:#c6ffc6">{$warning}</b>件商品
                </div>
            </div>
        </div>
      </div>
    </div>
    <!-- 底部 == 版权 -->
    <div class="cont_lump con-foot">版权所有：900库 [京ICP备1000000001号-1</div>
  </div>
  <div class="protection">
    <div class="tanchu_box">
      <span class="gb close_btn"><i></i></span>
      <h3 class="tit"><i class="lv"></i>库存报警设置（供应商）</h3>
      <div class="text"><span class="mgr10">库存报警下限：</span><input type="text" name="floor" value="{$num}"></div>
      <div class="btn">
        <button class="btn-lan-80 mgw15">确定</button>
        <button class="btn-lan-80 mgw15 close_btn">取消</button>
      </div>
      <div class="prompt">温馨提示：库存报警下限，设为0则不报警！</div>
    </div>
  </div>
</body>
<script type="text/javascript" src="__PUBLIC__/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/plugins/layui/layui.js"></script>
<script type="text/javascript" src="__SUP_PUBLIC__/js/alert.js"></script>
<script type="text/javascript" src="js/ind.js"></script>
<script>
          //出售中的商品  中的全选
        $(".kuangzi .kucun_caozuo input").click(function(){
            if($(this).is(':checked')){
                $('.kuangzi .goods_item input').prop("checked",true);
            }else{
                $('.kuangzi .goods_item input').prop("checked",false);
            }
        });
//      $(".container .cont_lump_qpolice .goodsShow .goods_item .goods_item_mian .btn p span").click(function(){
//          $(this).parents('.btn').find("div").show(0);
//      });

        
</script>
</html>