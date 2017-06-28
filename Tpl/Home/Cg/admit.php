<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="wap-font-scale" content="no">
    <title>供应商列表</title>
    <link rel="stylesheet" href="__HOME_PUBLIC__/css/exhibition_hall_style.css">
    <link rel="stylesheet" href="__HOME_PUBLIC__/css/swiper.min.css">
    <link rel="stylesheet" href="__HOME_PUBLIC__/css/icons.css">
    <link rel="stylesheet" href="__HOME_PUBLIC__/css/reset.css">
    <link rel="stylesheet" href="__HOME_PUBLIC__/css/style.css">
</head>
<body>
   <include file="Public/Cgheader" />
<!-- 中间==================================开始 -->
    <div class="goods_list_0401 wh1200auto">
        <div class="condition clearfix">
            <div class="left_con fl">
                <div class="top">
                    <span class="btn-80x30 center bor_1ddd">全部商品</span>
                    <span class="mgw5">&gt;</span>
                    <div class="btn-80x30 center bor_1ddd cur-p dis_inb por quanbu">
                        <span class="all"><?php if($fid){
                         $f=M('cg_group')->field('fid,pid,fname')->where('fid='.$fid)->find();
                         echo $f['fname'];}else{
                            echo "全部分类";
                         }
                            ?></span> <i class="ico_all I_xiaojiantouxx mgl10"></i>
                        <div class="text-left bg-fff feilei_list">
                            <span>全部分类</span>
                            <volist name="cate" id="c">
                            <span class="fzname" fzid="{$c.fid}">{$c.fname}</span>
                           <!--  <input class="fzname" style="border:none" type="text" value="{$c.fname}" name="c"> -->
                            </volist>
                        </div>
                    </div>
                </div>
                <!-- <form action="{:U('Cg/ex_condition')}" method="post"> -->
                <form action="{:U('Cg/admit')}" method="post">
                    <input class="fid" type="hidden" name="fid" value="">
                <div class="down">
                    <input <?php if($ofen && $ofen=='on'){ echo "checked='checked'";}?> type="checkbox" name="often" id="cgqd_che">  <label class="mgr30" for="cgqd_che">常购清单</label>  
                    <input <?php if($is_buy && $is_buy=='on'){ echo "checked='checked'";}?> type="checkbox" name="is_buy" id="dgd_che">  <label class="mgr30" for="dgd_che">定过的</label>  
                    <select name="exid" id="" class="btn-120x30">
                        <option value="0">选择准入供应商</option>
                        <volist name="exs" id="e">
                        <option <?php if($exid && $exid==$e['exid']){ echo "selected='selected'"; }?> value="{$e.exid}">{$e.ex_name}</option>
                        </volist>
                    </select>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input style="width:60px;height:30px;" type="submit" value="查询" />   
                </div>
                </form>
            </div>
            <div class="right_con fr">
                <i class="ico_all I_qhkuai cur-p"></i>
                
            </div>
        </div>
        <div class="shopping_one_new wh1200auto">
            <div class="lump">
                <h3 class="lump_title">{$ex[0]['ex_name']} </h3>
                <ul class="goods_list clearfix ">
                    <volist name="one" id="o">
               <!-- style="width:200px;height:250px;" -->
                    <li class="w200 bor_1ddd mgt20  fl" >
                         <a href="{:U('Cg/cg_goods',array('sku_id'=>$o['sku_id']))}">
                        <img class="btn-200x200" src="__UPLOADS__/{$o.goods_thumb}" alt="">
                        <div class="text pd10">
                            <h5 class="col-666 fw600"><span class="biaoqian">{$o.rec_remark}</span>{$o.goods_name}</h5>
                            <p class="bianhao">编号：{$o.goods_sn} </p>
                            <p class="mgt10 miaoshu">{$o.rec_remark}</p>
                            <h6 class="mgt10 fw600"><span class="kuai col-999 mgr5">市场价:</span><span class="text-del kuai  col-999 mgr15">￥{$o.goods_price}</span><span class="kuai mgr5">协议价</span><span class="price">￥{$o.xiugai}</span></h6>
                        </div>
                        <button class="btn-120x30 choose_spec_btn choose_spec_btn"><i class="I_gwc ico_all mgr5"></i>加入采购清单</button>
                    </a>
                    </li>
                </volist>
                    
                </ul>
               <!--  <div class="ckgd bor_1ddd bg-fb center pdh15 col-999 mgt20 cur-p">查看更多商品</div> -->
            </div>
            <div class="lump">
                <h3 class="lump_title">{$ex[1]['ex_name']} </h3>
                <ul class="goods_list clearfix">
                    <volist name="two" id="t">
               <!-- style="width:200px;height:250px;" -->
                    <li class="w200 bor_1ddd mgt20  fl" >
                         <a href="{:U('Cg/cg_goods',array('sku_id'=>$t['sku_id']))}">
                        <img class="btn-200x200" src="__UPLOADS__/{$t.goods_thumb}" alt="">
                        <div class="text pd10">
                            <h5 class="col-666 fw600"><span class="biaoqian">{$t.rec_remark}</span>{$t.goods_name}</h5>
                            <p class="bianhao">编号：{$t.goods_sn} </p>
                            <p class="mgt10 miaoshu">{$t.rec_remark}</p>
                            <h6 class="mgt10 fw600"><span class="kuai col-999 mgr5">市场价:</span><span class="text-del kuai  col-999 mgr15">￥{$t.goods_price}</span><span class="kuai mgr5">协议价</span><span class="price">￥{$t.xiugai}</span></h6>
                        </div>
                        <button class="btn-120x30 choose_spec_btn choose_spec_btn"><i class="I_gwc ico_all mgr5"></i>加入采购清单</button>
                    </a>
                    </li>
                </volist>
                    
                </ul>
                <!-- <div class="ckgd bor_1ddd bg-fb center pdh15 col-999 mgt20 cur-p">查看更多商品</div> -->
            </div>
        </div>
    </div>
<!-- 中间==================================end -->
<!-- 底部===================================开始-->
 <include file="Public/Foot" />

<div class="protection" ></div>
</body>
<script type="text/javascript" src="__HOME_PUBLIC__/js/jquery.min.js"></script>
<script type="text/javascript" src="__HOME_PUBLIC__/js/js.js"></script>
<script>
    //自定义分组的选择
    $(".fzname").bind('click',function(){
        var fzid=$(this).attr('fzid');
        var fzname=$(this).html();
        var all=$(".all").html();
        var fid=$('.fid').val();
        $(".all").html(fzname);
        fid=$('.fid').val(fzid);
    })













$(function () {

    // 供应商列表 下面的 全部 点击 显示隐藏-分类
    $(".goods_list_0401 .condition .top .quanbu").toggle(
        function(){
            $(this).css({'border-color':'#00A199'}).find('i').removeClass("I_xiaojiantouxx").addClass("I_xiaojiantouxs");
            $(this).find("div").show(1);
        },
        function(){
            $(this).css({'border-color':'#ddd'}).find('i').removeClass("I_xiaojiantouxs").addClass("I_xiaojiantouxx");
            $(this).find("div").hide(1);
        }
    );

    //商品列表的 块状 和  行状的 切换
    $(".goods_list_0401 .condition .right_con i").toggle(
        function(){
            $(this).removeClass("I_qhkuai").addClass("I_qhheng");
            $(".goods_list_0401 .lump .goods_list").addClass("line");
        },
        function(){
            $(this).removeClass("I_qhheng").addClass("I_qhkuai");
            $(".goods_list_0401 .lump .goods_list").removeClass("line");
        }
    );
    $(".shopping_one_new .goods_list li button.choose_spec_btn").click(function () {
        $('.protection').show(0);
        $(this).parent().find(".tanchu_box").show(0);
    });

    $(".close_btn").click(function () {
        $('.protection').hide(0);
        $(this).parents(".tanchu_box").hide(0);
    });
});
</script>
</html>