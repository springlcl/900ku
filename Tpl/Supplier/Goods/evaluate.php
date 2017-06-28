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
    <div class="cont_lump cont_lump_sell cont_lump_pinlun">
      <div class="cont_title">
        <span>评价管理列表</span>
          <input type="hidden" name="exid" value="{$Think.get.exid}" />
      </div>
      <div class="con">
<!--         <div class="clearfix pdh10">
          <button class="button q_gr fl" style="width: 120px;">新建商品分组</button>
          <form action="" class="kucun_Sou fr mgr10">
              <input type="text" class="sou">
              <button class="sou"><i> </i>搜索</button>
          </form>
        </div> -->
        <div class="kuangzi">
            <div class="doods_nav_head">
                <span style="margin-left: 50px;    margin-right: 2%;">商品信息</span>
                <span style="width: 18%;min-width: 130px;">客户信息<i></i></span>
                <span style="width: 12%;">评论标签</span>
                <span style=" max-width: 290px;margin-left: 9%;width: 30%;">评论内容<i></i></span>
                <span style="margin-left: 6.5%;width: 7%">评论时间<i></i></span>
            </div>
            <div class="goodsShow">
                <ul>
                    <volist name="evaluate" id="vo" empty="$empty">
                    <li class="goods_item">
                        <div class="goods_item_mian clearfix pl_title">
                            <div class="product_id">产品id：{$vo.goods_sn}</div>
                            <div class="goodBan">好评：<ul class="xingxing"><for start="0" end="5" step="0.5" comparison="lt"><eq name="vo['score']" value="$i"><li class="active"></li><else /><li></li></eq></for></ul>
                            </div>
                            <div class="product_name">产品名称：{$vo.goods_name} </div>
                        </div>
                        <div class="goods_item_mian clearfix">
                            <div class="img"><img src="__UPLOADS__/{$vo.goods_thumb}" alt=""></div>
                            <div class="info"><img src="__UPLOADS__/{$vo.headimg}" alt=""><h3>{$vo.username}</h3></div>
                            <div class="bianqian">
                              <p>{$vo.tag}</p>
                            </div>
                            <div class="con">{$vo.content}</div>
                            <div class="date">{$vo.add_time|date='Y-m-d',###}</div>
                        </div>
                    </li>
                    </volist>
                </ul>
            </div>
            <div class="goodDown clearfix">
                <ul class="pagination" id="pagination" rows="{$count}">
                </ul>
                <div class="page_total">
                    共有<b style="color:#c6ffc6">{$count}</b>条评论
                </div>
            </div>
        </div>
      </div>
    </div>
    <!-- 底部 == 版权 -->
    <div class="cont_lump con-foot">版权所有：900库 [京ICP备1000000001号-1</di>
  </div>

</body>
<script type="text/javascript" src="__PUBLIC__/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/plugins/layui/layui.js"></script>
<script>
    var exid = $('input[name="exid"]').val;
    $(function(){
        var count = $('#pagination').attr('rows');
        var pages = Math.ceil(count/15);
        layui.use(['layer','laypage'],function(){
            var layer = layui.layer
                ,laypage = layui.laypage;
            laypage({
                cont: 'pagination'
                ,pages: pages
                ,curr: 1
                ,skin: '#5FB878'
                ,skip: true
                ,jump: function(obj,first){
                    if(!first){
                        var page = obj.curr;
                        $.ajax({
                            url: '{:U('evaluate')}'
                            ,async: true
                            ,type: 'POST'
                            ,dataType: 'JSON'
                            ,cache: false
                            ,data: {exid:exid,page:page}
                            ,success: function(result){
                                var box = $('div.goodsShow ul');
                                $.each(result,function(index,value){
                                    var str = '';
                                    for(var i = 0;i < 5;i++){
                                        if(value.score = i){
                                            str += '<li class="active"></li>';
                                        }else{
                                            str += '<li></li>';
                                        }
                                    }
                                    box.append('<li class="goods_item"> <div class="goods_item_mian clearfix pl_title"> <div class="product_id">产品id：'+value.goods_sn+'</div> <div class="goodBan">好评：<ul class="xingxing">'+str+'</ul> </div> <div class="product_name">产品名称：'+value.goods_name+' </div> </div> <div class="goods_item_mian clearfix"> <div class="img"><img src="/uploads/'+value.goods_thumb+'" alt=""></div> <div class="info"><img src="/uploads/'+value.headimg+'" alt=""><h3>'+value.username+'</h3></div> <div class="bianqian"> <p>'+value.tag+'</p> </div> <div class="con">'+value.content+'</div> <div class="date">'+value.add_time+'</div> </div> </li>');
                                })
                            }
                        });
                    }
                }

            });
        });
    });
</script>
</html>