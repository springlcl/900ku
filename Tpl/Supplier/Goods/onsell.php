<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>出售中的商品</title>
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
        <div class="cont_lump cont_lump_sell">
            <div class="cont_title">
                <span>出售中的商品</span>
                <input type="hidden" name="exid" value="{$Think.get.exid}" />
            </div>
            <div class="con">
                <div class="clearfix pdh10">
                    <a href="{:U('publish',array('exid'=>$_GET['exid']))}"><button class="button q_gr fl" style="width: 120px;"><i>+</i>发布商品</button></a>
                    <form action="" class="kucun_Sou fr mgr10">
                        <select class="fenlei" name="export">
                            <option value="0" selected="selected">导出当前筛选的商品</option>
                            <option value="1">导出本店所有商品</option>
                        </select>
                        <button type="button" class="dao">商品导出</button>
                        <select class="fenlei" name="category">
                            <volist name="exCate" id="vo">
                                <option value="{$vo.excid}">{$vo.excname}</option>
                            </volist>
                            <option value="0" selected="selected">所有分组</option>
                        </select>
                        <input type="text" name="search" class="sou">
                        <button type="button" class="sou"><i> </i>搜索</button>
                    </form>
                </div>
                <div class="kuangzi">
                    <div class="doods_nav_head" style="padding: 10px 20px;">
                        <span style="width:91px;background: red;display: inline-block;height: ;"></span>
                        <span style="width: 12%;min-width: 60px;margin-left: 15px;text-align: left;">商品/价格<i  column="price"></i></span>
                        <span style="    width: 10%;margin-left: 2.1%;">访问量</span>
                        <span style="width: 6%;margin-left: 3.5%;">库存<i  column="stock"></i></span>
                        <span style="width: 8%;margin-left: 3%;">总销量<i  column="sale"></i></span>
                        <span style="width: 8%;margin-left: 5.6%;">创建时间<i class="desc" column="create"></i></span>
                        <span style="width: 4%;margin-left: 5.8%;">序号<i  column="sort"></i></span>
                        <span style="width: 126px;margin-left: 3.5%;">操作</span>
                    </div>
                    <div class="goodsShow">
                        <ul>
                            <volist name="goods" id="vo">
                            <li class="goods_item">
                                <div class="goods_item_mian clearfix">
                                    <input type="checkbox" name="goodsSel" value="{$vo.goods_id}" class="fl kucun_cb">
                                    <div class="num"><if condition="$i lt 10">0{$i}<else />{$i}</if></div>
                                    <div class="print fl">
                                        <img src="__UPLOADS__/{$vo.goods_thumb}" alt="">
                                    </div>
                                    <div class="txt">
                                        <a href="{:U('edit',array('gid'=>$vo['goods_id']))}"><p class="col-lan mgt5">{$vo.goods_name}</p></a>
                                        <p class="col-red mgt5">￥ {$vo.goods_price}</p>
                                    </div>
                                    <div class="page_view">PV:{$vo.goods_pv}</div>
                                    <div class="stock">{$vo.goods_num}</div>
                                    <div class="sales">{$vo.goods_sale_num}</div>
                                    <div class="date">{$vo.add_time|date='Y-m-d',###}</div>
                                    <div class="order">{$vo.sort}</div>
                                    <div class="btn">
                                        <p>
                                            <a href="{:U('edit',array('gid'=>$vo['goods_id']))}"> <span>编辑</span></a>
                                            <span class="del_bnt">删除 </span>
                                        </p>
                                        <p>
                                            <span class="tuiguang">推广商品</span>
                                            <span class="guige">规格库存</span>
                                        </p>
                                        <div class="tuiguang_box sanjiao_right_lan border-r5">
                                            <div class="clearfix list list_lj">
                                                <span class="fl">商品链接</span>
                                                <input class="fl link" type="text" value="http://d.pigcms.com/upload/images/000/14/338/201703/58c6535f50f37.jpg">
                                                <button type="button" class="fl copy">复制</button>
                                            </div>
                                            <div class="clearfix list list_ewm">
                                                <span class="fl">商品二维码</span>
                                                <div class="img fl"><img src="__SUP_PUBLIC__/images/index_end_tbc.png" alt=""></div>
                                                <button class="fl acquire">下载</button>
                                            </div>
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
                            <span id="alterGroup">改分组</span>
                            <div class="triangle_border_up" id="dropDown" style="display: none;">
                                <select name="changeGroup" size="5">
                                    <volist name="exCate" id="vo">
                                        <option value="{$vo.excid}">{$vo.excname}</option>
                                    </volist>
                                </select>
                            </div>
                            <span id="delete">删除</span>
                            <span id="sold" status="0">下架</span>
                        </div>
                        <ul class="pagination" id="pagination" rows="{$count}">
                        </ul>
                        <div class="page_total">
                            共有<b style="color:#c6ffc6">{$count}</b>件商品
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- 底部 == 版权 -->
        <div class="cont_lump con-foot">版权所有：900库 [京ICP备1000000001号-1</div>
    </div>
</body>
<script type="text/javascript" src="__PUBLIC__/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/plugins/layui/layui.js"></script>
<script type="text/javascript" src="__SUP_PUBLIC__/js/onsell.js"></script>
<script src="js/ind.js"></script>
<script>





</script>
</html>