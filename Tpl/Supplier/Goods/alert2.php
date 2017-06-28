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
<include file="Public/firstSidebar" />
<!-- 左导二 -->
<include file="Goods/secoundBar" />
<!-- 右侧 内容-->
  <div class="clearfix container" id="app-container">
    <div class="cont_lump cont_lump_sell cont_lump_goodsGrouping">
      <div class="cont_title">
        <span>商品分组</span> 
      </div>
      <div class="con">
        <div class="clearfix pdh10">
          <button class="button q_gr fl new_classify open_btn" style="width: 120px;">库存报警设置</button>
          <form action="" class="kucun_Sou fr mgr10">
              <input type="text" class="sou">
              <button class="sou"><i> </i>搜索</button>
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
                    <li class="goods_item">
                        <div class="goods_item_mian clearfix">
                            <input type="checkbox" name="1" value="1" class="fl checkbox_mgl">
                            <div class="">01</div>
                            <div class="name">凉席</div>
                            <div class="on_sale">123</div>
                            <div class="sales">762</div>
                            <div class="date">2017-06-12</div>
                            <div class="btn">
                              <p>
                                <span>编辑</span>
                                <span class="del_bnt">删除 </span>
                                <span>链接 </span>
                              </p>  
                            </div>
                        </div>
                    </li>
                    <li class="goods_item">
                        <div class="goods_item_mian clearfix">
                            <input type="checkbox" name="1" value="1" class="fl checkbox_mgl">
                            <div class="">02</div>
                            <div class="name">凉席</div>
                            <div class="on_sale">123</div>
                            <div class="sales">762</div>
                            <div class="date">2017-06-12</div>
                            <div class="btn">
                              <p>
                                <span>编辑</span>
                                <span class="del_bnt">删除 </span>
                                <span>链接 </span>
                              </p>  
                            </div>
                        </div>
                    </li>
                    <li class="goods_item">
                        <div class="goods_item_mian clearfix">
                            <input type="checkbox" name="1" value="1" class="fl checkbox_mgl">
                            <div class="">03</div>
                            <div class="name">凉席</div>
                            <div class="on_sale">123</div>
                            <div class="sales">762</div>
                            <div class="date">2017-06-12</div>
                            <div class="btn">
                              <p>
                                <span>编辑</span>
                                <span class="del_bnt">删除 </span>
                                <span>链接 </span>
                              </p>  
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="goodDown clearfix">
              <div class="kucun_caozuo fl">
                  <input type="checkbox" name="1" value="1" class="fl">
                  <span class="cu-p">删除</span>
              </div>
              <ul class="pagination">
                <li class="bor-0">
                    <span class="pg_pre">共10页，每页15条</span>
                </li>
                <li>
                    <span class="pg_pre">上一页</span>
                </li>
                <li>
                    <span class="pg_curr">1</span>
                </li>
                <li>
                    <a class="pg_link" href="">2</a>
                </li>
                <li>
                    <a class="pg_link" href="">3</a>
                </li>
                <li>
                    <a class="pg_link" href="">4</a>
                </li>
                <li>
                    <a class="pg_next" href="">下一页</a>
                </li>
                <li>
                    <input type="text">
                </li>
                <li class="bor-0">
                    <a class="pg_tz" href="">跳转</a>
                </li>
            </ul>
            </div>
        </div>
      </div>
    </div>
    <!-- 底部 == 版权 -->
    <div class="cont_lump con-foot">版权所有：900库 [京ICP备1000000001号-1</di>
  </div>
  <div class="protection">
    <div class="tanchu_box">
      <span class="gb close_btn"><i></i></span>
      <h3 class="tit"><i class="lv"></i>库存报警设置（供应商）</h3>
      <div class="text"><span class="mgr10">库存报警下限：</span><input type="text"></div>
      <div class="btn">
        <button class="btn-lan-80 mgw15">确定</button>
        <button class="btn-lan-80 mgw15 close_btn">取消</button>
      </div>
      <div class="prompt">温馨提示：库存报警下限，设为0则不报警！</div>
    </div>

    <div class="tanchu_box delTanBox">
      <span class="gb close_btn"><i></i></span>
      <h3 class="tit"><i></i>您确定要删除此商品吗？</h3>
      <div class="btn">
        <button class="btn-lan-80 mgw15">确定</button>
        <button class="btn-lan-80 mgw15 close_btn">取消</button>
      </div>
      <div class="prompt">温馨提示：采购商一旦准入则不能删除此商品！</div>
    </div>
    
  </div>
</body>
<script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/1.8.3/jquery.min.js"></script>
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