<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>发布商品</title>
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
<include file="Goods/secoundBar" />
<!-- 右侧 内容-->
<div class="clearfix container" id="app-container" target="{$url}">
        <div class="cont_lump senior_dingzhi goods_describe">
        <form action="{:U('publish2')}" method="post">
        <input type="hidden" name="gid" value="{$Think.get.gid}"/>
            <div class="cont_title">
              <span>商品详情</span>
            </div>
            <div class="con clearfix">
                <div class="des_tit fl">
                    商品描述
                </div>
                <ul class="custo_list fl">
                    <li class="row clearfix row_search">
                        <div class="right_con fl">
                            <div class="sanjiao_left_ddd">
                                <h5>注意：搜索的商品是根据商品标题匹配的。</h5>
                            </div>
                        </div>
                    </li>
                    <li class="row clearfix row_notice">
                        <div class="right_con fl">
                            <div class="sanjiao_left_ddd">
                                <h5>公告：<input name="gnotice" class="w220" type="text" placeholder="请填写内容,如果过长,将会在手机上滚动显示"></h5>
                            </div>
                        </div>
                    </li>
                    <li class="row clearfix row_cube">
                        <div class="right_con fl">
                            <div class="sanjiao_left_ddd">
                                <h5 class="clearfix">商品介绍：<span class="fr cur-p col-lan more">更多</span></h5>
                                <h5><input class="w220" name="intro" type="text" placeholder="" ></h5>
                            </div>
                            <div class="imgs clearfix">
                               <!--  <volist name="small" id="v">
                                <div class="img"><img src="__UPLOADS__/{$v}" alt=""><span class="jian">-</span></div>
                                    <input name="gimg" type="hidden" value="{$v}" />
                                </volist>
                                <div class="add cur-p"></div> -->
                            </div>
                        </div>
                    </li>
                    <li class="row clearfix row_commod">
                        <div class="right_con fl">
                            <div class="sanjiao_left_ddd">
                                <h5>商品推荐：<input class="w220"  type="text" placeholder="批量选择商品" disabled="disabled" /><button type="button">选择商品</button></h5>
                            </div>

                        </div>
                    </li>
                    <li class="row clearfix row_add">
                        <div class="right_con fl">

                        </div>
                    </li>

                    <li class="row clearfix row_add">
                        <div class="right_con fl">

                        </div>
                    </li>

                    <li class="row clearfix row_add">
                        <div class="right_con fl">

                        </div>
                    </li>

                    <li class="row clearfix row_add">
                        <div class="right_con fl">

                        </div>
                    </li>
                    <li class="row clearfix row_add">
                        <div class="right_con fl">

                        </div>
                    </li>
                </ul>
                <div class="clearfix"></div>
                <div class="confirm_rel">
                    <button type="submit" class="btn-lan-160 " style="z-index: 999">确认发布</button>
                </div>
            </div>
        </div>

        <!-- 底部 == 版权 -->
        <div class="cont_lump con-foot">版权所有：900库 [京ICP备1000000001号-1</di>
    </div>
<!-- 弹框 -->
<div class="protection" >
    <div class="tanchu_box  select_goods_box">
        <span class="gb close_btn"><i></i></span>
        <h3 class="font-size24 font-weight600 col-333 pdh20 center">添加商品</h3>
        <input type="hidden" name="exid" value="{$Think.get.exid}" />
        <ul class="chax_form">
            <li>
                <span class="text">商品分类：</span>
                <for start="0" end="2" comparison="elt" name="j">
                    <select name="cate" class="cate" level="{$j+1}">
                        <volist name="cates[$j]" id="v">
                            <option value="{$v.gcid}">{$v.gc_name}</option>
                        </volist>
                    </select>
                </for>
            </li>
            <li>
                <span class="text">商品分类：</span>
                <input type="text" name="cateWords" />
                <button type="button"><i class="ico_all"></i></button>
            </li>
        </ul>
        <ul class="sele_nav clearfix bg-f5">
            <li class="se_che">&nbsp;</li>
            <li class="se_xuhao">&nbsp;</li>
            <li class="se_img">&nbsp;</li>
            <li class="se_name">商品名称</li>
            <li class="se_caozuo">操作</li>
        </ul>
        <ul class="goods_list ">

            <div id="page" class='jPaginate'></div>
        </ul>
        <div class="foot">
            <input type="checkbox">
            <span>排量选择</span>
            <button type="button" class="btn-lan-160">提交</button>
        </div>
    </div>
    <div class="tanchu_box  add_imgs">
        <span class="gb close_btn"><i></i></span>
        <h3 class="font-size24 font-weight600 col-333 pdh20 center">添加图片</h3>
        <div class="mian">
            <!-- <button class="btn-lan-160 btn-sele">点击选择图片</button> -->
            <div class="btn-sele btn-lan-160">
              <input name class="btn-lan-160"  type="file" value="" multiple="multiple">
              点击选择图片
            </div>
            <p class="col-999 mgt30">，单次最多可选20张</p>
        </div>
        <div class="foot clearfix">
          <p class="fl">共0张(0kb),已经上传0张</p>
          <div class="fr mgt30">
            <button type="button" class="btn-lan-80">确定</button>
            <button type="button" class="btn-fff-80 close_btn">取消</button>
          </div>
        </div>
    </div>
    <div class="tanchu_box  moreEdit" >
        <span class="gb close_btn"><i></i></span>
        <h3 class="font-size24 font-weight600 col-333 pdh20 center">商品介绍编辑</h3>
        <div class="mian">
            <textarea  name="introEdit" id="introEdit" rows="8" cols="10"></textarea>
        </div>
        <div class="mgt30">
            <button type="button" class="btn-lan-80 mk_sure">确定</button>
            <button type="button" class="btn-fff-80 close_btn">取消</button>
        </div>
    </div>
    </form>
</div>
</body>
<script type="text/javascript" src="__PUBLIC__/js/jquery-3.2.1.min.js"></script>
<script src="__SUP_PUBLIC__/js/ind.js"></script>
<script src="__SUP_PUBLIC__/js/publish2.js"></script>
<script src="__SUP_PUBLIC__/js/paginate.js"></script>
<script src="__PUBLIC__/plugins/ckeditor/ckeditor.js"></script>
</html>