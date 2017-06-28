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
  <include file="left" />
<!-- 右侧 内容-->
  <div class="clearfix container" id="app-container">
    <div class="cont_lump cont_lump_sell cont_lump_Customer1 cont_lump_shangpin cont_lump_Customer2">
      <div class="nav">
          <ul class="clearfix">
            <li class="clearfix shop q_zxk">
              <img src="{$data.headimg}" class="fl" alt="">
              <span>{$data.real_name}</span>
            </li>
            <li class="shop">
              <p>{$dj}</p>
              <h6>当前等级</h6>
            </li>
            <li class="shop">
              <p>{$ch | default="0"}</p>
              <h6>下级业务员员人数</h6>
            </li>
            <li class="shop">
              <p>{$ge | default="0"}</p>
              <h6>二级业务员人数</h6>
            </li>
          </ul>
      </div>
      <div class="con">
        <div class="clearfix pdt10 salesman_level">
          <!-- <span class="fl active">上一级</span> -->
          <span class="fl active">下一级</span>
          <span class="fl">下两级</span>
        </div>
        <div class="kuangzi">
            <div class="doods_nav_head" style="padding: 10px 20px;">
                <span style="width: 14px;"></span>
                <span style="margin-left: 5%;width: 74px;">头像</span>
                <span style="width: 10%;margin-left: 6.5%;">昵称</span>
                <span style="width: 10%;margin-left: 3%;">业务员电话</span>
                <span style="margin-left: 9%;width: 8%;">状态</span>
            </div>
            <div class="salesman_lsit">
              <div class="goodsShow">
                  <ul>
                    <volist id='yi' name='yi'>
                      <li class="goods_item">
                          <div class="goods_item_mian clearfix">
                              <div class="xuhao">02</div>
                              <div class="headImg"><img src="{$yi.headimg}" alt=""></div>
                              <div class="name">{$yi.username}</div>
                              <div class="phone">{$yi.mobile}</div>
                              <div class="btn">
                              <if condition="$yi[status] eq 1" >
                                <span class="col-lv">正常</span>
                              <else/>
                                <span class="col-lv">禁用</span>
                              </if>
                              </div>
                          </div>
                      </li>
                    </volist>
                  </ul>
              </div>
              <div class="goodsShow">
                  <ul>
                    <volist id='str' name='str'>
                      <li class="goods_item">
                          <div class="goods_item_mian clearfix">
                              <div class="xuhao">03</div>
                              <div class="headImg"><img src="{$str.headimg}" alt=""></div>
                              <div class="name">{$str.username}</div>
                              <div class="phone">{$str.mobile}</div>
                              <div class="btn">
                                <if condition="$str[status] eq 1" >
                                <span class="col-lv">正常</span>
                              <else/>
                                <span class="col-lv">禁用</span>
                              </if>
                              </div>
                          </div>
                      </li>
                    </volist>
                      
                  </ul>
              </div>
            </div>
            <!-- <div class="goodDown clearfix">
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
            </div> -->
        </div>
      </div>
    </div>
    <!-- 底部 == 版权 -->
    <div class="cont_lump con-foot">版权所有：900库 [京ICP备1000000001号-1</di>
  </div>

</body>
<script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="__SUP_PUBLIC__/js/ind.js"></script>
<script>
  $(function () {

  })
</script>
</html>