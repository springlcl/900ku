<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="__SUP_PUBLIC__/css/style.css">
    <link rel="stylesheet" href="__PUBLIC__/plugins/chosen/chosen.css">
    <link rel="stylesheet" href="__PUBLIC__/plugins/manifest/css/styles.css">
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
    <div class="cont_lump cont_lump_Release">
        <div class="cont_title">
            <span>发布商品</span>
        </div>
        <form action="{:U('edit')}" enctype="multipart/form-data" method="post" id="data">
            <table>
                <tr class="basic">
                    <td>基本信息</td>
                    <td>
                        <div class="clearfix">
                            <p><label>*</label>商品类名：</p>
                            <for start="0" end="2" comparison="elt" name="j">
                                <select name="cate" class="cate" level="{$j+1}" disabled>
                                <volist name="cates[$j]" id="v">
                                    <option value="{$v.gcid}" >{$v.gc_name}</option>
                                </volist>
                                </select>
                            </for>
                            <input type="hidden" name="goods_type" value="{$goods.goods_type}"/>
                        </div>
                        <input type="hidden" name="gid" value="{$Think.get.gid}">
                        <div class="clearfix" style="margin-top:12px;" >
                            <p><label>*</label>展厅内分组：</p>
                            <select name="excid" id="">
                                <volist name="exc" id="item">
                                    <option value="{$item.excid}">{$item.excname}</option>
                                </volist>
                            </select>
                            <a href="{:U('Goods/group')}"><span class="fenzu">建立分组</span></a>
                        </div>
                    </td>
                </tr>
                <tr class="basic">
                    <td >点击选择</br>筛选的属性</td>
                    <td class="attribute">
                        <volist name="attr" id="list" key="a">
                            <div class="clearfix">
                                <p>{$key}：</p>
                                <ul pro="{$key}">
                                    <input name="group[]" type="hidden" value="<if condition="strpos($attrs[$a-1],$key) heq 0">{$attrs[$a-1]}</if>" />
                                    <for start="0" end="count($list)" name="l">
                                        <li <foreach name="basic" item="it"><eq name="list[$l]['aval']" value="$it"> class="active" </eq></foreach> attr="{$list[$l]['aid']}" group="{$list[$l]['nid']}">{$list[$l]['aval']}</li>
                                    </for>
                                </ul>
                            </div>
                        </volist>
                    </td>
                </tr>
                <tr class="Stock">
                    <td >库存/规格</td>
                    <td>
                        <div class="clearfix l_shangpinshuxing pro1" level="1">
                            <p class="shangpinshuxing">商品属性：</p>
                            <select name="property1" id="property1" data-placeholder="选择一个属性" class="bubian pdl10">
                                <option value=""></option>
                                <volist name="property" id="vo">
                                    <option value="{$vo.pro_name}" <eq name="vo['pro_name']" value="$pro[0]">selected</eq>>{$vo.pro_name}</option>
                                </volist>
                            </select>
                            <input type="text" name="value1" value="" class="pdl10" id="value1" placeholder="用英文半角,及;分隔属性值">
                            <button class="confirm_b" type="button">确定</button>
                            <p class="tianjia">+添加</p>
                        </div>
                        <volist name="pro" id="per" offset="1" key="p">
                            <div class="clearfix l_shangpinshuxing pro{$p+1}" level="{$p+1}">
                                <p class="kong">&nbsp;</p>
                                <select name="property{$p+1}"  data-placeholder="选择一个属性" class="bubian pdl10" id="property{$p+1}">
                                    <option value="0"></option>
                                    <volist name="property" id="vo">
                                        <option value="{$vo.pro_name}" <eq name="per" value="$vo.pro_name">selected</eq>>{$vo.pro_name}</option>
                                    </volist>
                                </select>
                                <input type="text" placeholder="用英文半角,及;分隔属性值" id="value{$p+1}" name="value{$p+1}" class="pdl10" />
                                <button class="confirm_b" type="button">确定</button>
                                <button class="cancel_b" type="button">取消</button>
                                <p class="tianjia" >+添加</p>
                            </div>
                        </volist>
                        <!--sku列表开始-->
                        <div class="h_size clearfix">
                            <p class="kong">&nbsp;</p>
                            <if condition="!empty($_GET['gid'])">
                                <table class="h_Ruler" data='{$data}'>
                                </table>
                            </if>
                        </div>
                        <!--sku列表结束-->
                        <div class="clearfix">
                            <p class="kong"><label>*</label>总库存：</p>
                            <input type="text" name="stockTotal" class="bubian" <notempty name="Think.get.gid">value="{$goods.goods_num}"</notempty> />
                            <input type="checkbox" name="showStock" class="fx" value="0" <notempty name="Think.get.gid"><eq name="goods['goods_num']" value="1">checked="checked"</eq></notempty> />
                            页面不显示商品库存
                        </div>
                        <div class="clearfix">
                            <p class="kong">&nbsp;</p>
                            <input type="checkbox" name="allowBook" class="fx" value="1" <notempty name="Think.get.gid"><eq name="goods['is_creat_ord']" value="1">checked="checked"</eq></notempty> />
                            库存为0时允许下单
                        </div>
                        <div class="clearfix">
                            <p class="kong">商品编号：</p>
                            <input type="text" class="bubian" name="goodsCode" <notempty name="Think.get.gid">value="{$goods.goods_sn}"</notempty> />
                        </div>
                    </td>
                </tr>
                <tr class="logistics">
                    <td>商品信息</td>
                    <td>
                        <div class="clearfix">
                            <p><label>*</label>商品名称：</p>
                            <input type="text" name="goodsName" <notempty name="Think.get.gid">value="{$goods.goods_name}"</notempty> />
                        </div>
                        <div class="clearfix">
                            <p class="mgt10"><label>*</label>价格：</p>
                            <button style="font-size: 14px">￥</button><input type="text" name="goodsPrice" class="jiage" placeholder="0.00" <notempty name="Think.get.gid">value="{$goods.goods_price}"</notempty> />
                        </div>
                        <div class="clearfix fbsp_add_img goods">
                            <p style="margin-top: 20px;"><label>*</label>商品图：</p>
                            <ul class="clearfix">
                                <notempty name="Think.get.gid">
                                    <volist name="pics" id="pic">
                                        <li class="upload_li fl" >
                                            <div class="minus">-</div>
                                            <div class="upload_sm" style="background: url(__UPLOADS__/{$pic}) no-repeat;">
                                                <input type="hidden" name="pic[]" class="upload_1"; datatype="*" nullmsg="" value="{$pic}">
                                            </div>

                                        </li>
                                    </volist>
                                </notempty>
                                <li class="upload_li fl" >
                                    <div class="minus">-</div>
                                    <div class="upload_sm" >

                                        <input type="file" name="pic[]" class="upload_1"; datatype="*" nullmsg="">
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <h6>
                            建议尺寸：640&times;640像素，最多可上传8张图片,第一张图片将作为展示图片
                        </h6>
                        <!--                    <div class="clearfix rel">-->
                        <!--                        <p class="mgt20">-->
                        <!--                            关联商品：-->
                        <!--                        </p>-->
                        <!--                        <ul class="clearfix  fbsp_add_img">-->
                        <!--                            <li class="fl"><img src="./images/tianjia.png" alt=""></li>-->
                        <!--                            <li class="upload_li fl">-->
                        <!--                                <div class="upload_sm">-->
                        <!--                                    <input type="file" name="rel[]" class="upload_1"; datatype="*" nullmsg="">-->
                        <!--                                </div>-->
                        <!--                            </li>-->
                        <!--                        </ul>-->
                        <!--                    </div>-->
                        <!--                    <h6>-->
                        <!--                        友情提示，最多关联8个商品-->
                        <!--                    </h6>-->
                    </td>
                </tr>
                <tr class="logistics">
                    <td>物流/其他</td>
                    <td class="clearfix">
                        <div class="clearfix">
                            <p class="fl mgt10">
                                运费设置：
                            </p>
                            <div style="margin-top: 20px;" class="fl">
                                <input type="radio" <notempty name="Think.get.gid"><gt name="goods['goods_postage']" value="0">checked="checked"</gt></notempty> name="isFix" value="1" />统一邮费
                            </div>
                            <div class="fl mgl10">
                                <button style="font-size: 14px " type="button">￥</button><input name="postage" type="text" class="jiage" placeholder="0.00" <notempty name="Think.get.gid">value="{$goods.goods_postage}"</notempty> />
                            </div>
                        </div>
                        <div class="xiala"><p>&nbsp;</p><input type="radio"  name="isFix" value="0" class="mgt10" />运费模板
                            <select name="freight">
                                <volist name="postage" id="tem">
                                <option value="{$tem.lid}">{$tem.tem_name}</option>
                                </volist>
                            </select>
                            <a href="{:U('Setting/log_add')}"><span>+新建</span></a>
                        </div>
                        <div class="zhongliang clearfix">
                            <p>
                                重量：
                            </p>
                            <input type="text" name="kg" <notempty name="Think.get.gid">value="{$goods.goods_weight}"</notempty> />
                            <span>单位：千克</span>
                        </div>
                        <div class="zhongliang clearfix">
                            <p>
                                伪造销量：
                            </p>
                            <input type="text" value="0" name="fake">
                            <span>0代表显示真实销量</span>
                        </div>
                        <div class="liuyan">
                            <p class="mgt10">要求留言：</p>
                            <span>
                            +添加字段
                        </span>
                        </div>
                        <div class="bitian clearfix">
                            <p>&nbsp;</p>
                            <input type="text">
                            <select class="city fl">
                                <option>二级分类1</option>
                                <option>二级分类1</option>
                                <option>二级分类1</option>
                                <option>二级分类1</option>
                                <option>二级分类1</option>
                            </select>

                            <p style="width:55px"class="fl mgt5"><input type="checkbox" name="vehicle" value="Bike" class="mgt5 mgl10 mgr5" /> 多行</p>
                            <p style="width:50px;" class="fl mgt5"><input type="checkbox" name="vehicle" value="Car" checked="checked" class="mgt5 mgl10" /> 必填</p>
                            <p class="mgt5"style="width:30px;color:blue">删除</p>

                        </div>
                        <div class="clearfix mgt10">
                            <p class="tuijian">推荐：</p>
                            <p style="width:100px;" class="fl mgt15 yu"><input type="checkbox" name="is_rec" value="1"  class="mgt10 mgl10;" /> 参加推荐商品</p>
                            <button type="button" class="Recommended">推荐语</button>
                            <input name="rec" type="text" placeholder="最多15个字" class="pdl10 mgt10" style="width: 306px;height: 34px;" value="{$goods.rec_remark}">
                        </div>
                        <button type="submit" class="step" >下一步</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <!-- 底部 == 版权 -->
    <div class="cont_lump con-foot">版权所有：900库 [京ICP备1000000001号-1</di>

    </div>
</body>
<script type="text/javascript" src="__PUBLIC__/js/jquery-3.2.1.min.js"></script>
<script src="__PUBLIC__/plugins/chosen/chosen.jquery.js"></script>
<!--<script src="__PUBLIC__/plugins/manifest/js/jquery.min.js"></script>-->
<script src="__PUBLIC__/plugins/manifest/js/jquery.ui.widget.min.js"></script>
<script src="__PUBLIC__/plugins/manifest/js/jquery.marcopolo.min.js"></script>
<script src="__PUBLIC__/plugins/manifest/js/jquery.manifest.js"></script>
<script type="text/javascript" src="__SUP_PUBLIC__/js/edit.js"></script>
<script type="text/javascript">
    <?php $k = 1;foreach($pro as $key => $value){ ?>
    $('#property<?php echo ($k)?>').chosen({
        disable_search_threshold: 10,
        no_results_text: '未找到关键词:',
        allow_single_deselect: true,
        placeholder_text_single: '选择一个属性',
    });
    $("#value<?php echo ($k)?>").manifest({
        separator:[';',',']
//        ,values: ['xiaoa','afds','enna','oh,yeah!']
        ,values: ['<?php echo implode('\',\'',$val[$key])?>']
    });
    <?php $k++;} ?>
</script>
</html>