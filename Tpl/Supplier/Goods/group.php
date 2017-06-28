<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>商品分组</title>
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
    <div class="cont_lump cont_lump_sell cont_lump_goodsGrouping">
      <div class="cont_title">
        <span>商品分组</span> 
      </div>
      <div class="con">
        <div class="clearfix pdh10">
          <button class="button q_gr fl new_classify open_btn" style="width: 120px;">新建商品分组</button>
          <form action="" class="kucun_Sou fr mgr10">
              <input type="text" class="sou" name="search">
              <button class="sou"><i> </i>搜索</button>
              <input type="hidden" name="exid" value="{$Think.get.exid}" />
          </form>
        </div>
        <div class="kuangzi">
            <div class="doods_nav_head">
                <span style="width: 35px;"></span>
                <span style="text-align: left;width: 10%;margin-left: 2%;">分组名称</span>
                <span style="width: 10%;margin-left: 9%;">出售中商品数</span>
                <span style="width: 10%;margin-left: 8%;">仓库中商品数</span>
                <span style="    width: 10%;margin-left:10%;">创建时间</span>
                <span style="margin-left: 11%;">操作</span>
            </div>
            <div class="goodsShow">
                <ul>
                    <volist name="cate" id="vo">
                    <li class="goods_item">
                        <div class="goods_item_mian clearfix">
                            <input type="checkbox" name="cateSel" value="{$vo.cid}" class="fl checkbox_mgl">
                            <div class=""><if condition="$i lt 10">0{$i}<else />{$i}</if></div>
                            <div class="name">{$vo.cname}</div>
                            <div class="on_sale">{$vo.onsale}</div>
                            <div class="sales">{$vo.stock}</div>
                            <div class="date">{$vo.crea}</div>
                            <div class="btn">
                                <p>
                                    <span class="edit">编辑</span>
                                    <span class="del_bnt">删除 </span>
                                    <span class="link">链接 </span>
                                </p>
                                <div class="link_d clearfix link_arrow">
                                    <span class="fl">商品链接</span>
                                    <input class="fl link" type="text" value="http://d.pigcms.com/upload/images/000/14/338/201703/58c6535f50f37.jpg">
                                    <button type="button" class="fl copy">复制</button>
                                    <button type="button" class="fl open">打开</button>
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
                <ul class="pagination" id="pagination" rows="{$count}">
                </ul>
                <div class="page_total">
                    共有<b style="color:#c6ffc6">{$count}</b>个分类
                </div>
            </div>
        </div>
      </div>
    </div>
    <!-- 底部 == 版权 -->
    <div class="cont_lump con-foot">版权所有：900库 [京ICP备1000000001号-1</di>
  </div>
  <div class="protection">
    <div class="tanchu_box xinjian_fenzu_box">
      <span class="gb close_btn"><i></i></span>
      <h3 class="tit"><i class="lv"></i>新建分组</h3>
      <div class="text"><span class="mgr10">填写分组名称</span><input type="text"></div>
      <div class="btn">
        <button class="btn-lan-80 mgw15">确定</button>
        <button class="btn-lan-80 mgw15 close_btn">取消</button>
      </div>
      <div class="prompt">温馨提示：采购商一旦准入则不能删除此商品！</div>
    </div>
    
      <!-- 删除弹框 -->
    <div class="tanchu_box delTanBox">
      <span class="gb close_btn"><i></i></span>
      <h3 class="tit"><i></i>您确定要删除吗？</h3>
      <div class="btn">
        <button class="btn-lan-80 mgw15">确定</button>
        <button class="btn-lan-80 mgw15 close_btn">取消</button>
      </div>
      <div class="prompt">温馨提示：删除后不能恢复！</div>
    </div>
  </div>
</body>
<script type="text/javascript" src="__PUBLIC__/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/plugins/layui/layui.js"></script>
<script type="text/javascript" src="__SUP_PUBLIC__/js/goods.js"></script>
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
        //打开新建分组盒子
        
</script>
</html>