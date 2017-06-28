<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8"><meta http-equiv="keywords" content="keyword1,keyword2,keyword3">
      <meta http-equiv="description" content="this is my page">
	<title>Document</title>
	<link rel="stylesheet" href="__SUP_PUBLIC__/css/style.css">
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries--><!--[if lt IE 9]><script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script><script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
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
    <div class="cont_lump cont_lump_sell l_business">
      <div class="cont_title">
        <span>业务员管理</span> 
      </div>
      <div class="con">
        <div class="clearfix pdh10">
          <a href="__URL__/add_sa"><button class="button q_gr fl" style="width: 120px;">新增业务员</button></a>
          <form method="post" action="sela" class="kucun_Sou fr mgr10">
           <a href="" class="dao" >批量导出</a>
           <select id="fenlei" class="fenlei"  onchange="window.location.href=this.value">
                <if condition="$xs eq 2">
                  <option value="__URL__/state/zt/0,1" selected="selected" >全部</option>
                <else/>
                  <option value="__URL__/state/zt/0,1" >全部</option>
                </if>
                <if condition="$xs eq 1">
                  <option value="__URL__/state/zt/1" selected="selected">正常</option>
                <else/>
                  <option value="__URL__/state/zt/1">正常</option>
                </if>
                <if condition="$xs eq 0">
                  <option value="__URL__/state/zt/0" selected="selected">禁用</option>
                <else/>
                  <option value="__URL__/state/zt/0">禁用</option>
                </if>
              </select>
              <inpuct type="hidden" name="uid" value="">
              <input name="tj" type="text" class="sou" placeholder="业务员/手机号/编号">
              <button class="sous"><i> </i></button>
          </form>
        </div>
        <div class="kuangzi">
            <div class="doods_nav_head">
                <span style="width:33px;"></span>
                <span style="width: 9%;min-width: 69px;">业务员名称<i></i></span>
                <span style="width: 14%;margin-left: 1.5%;">微信信息</span>
                <span style="width: 8%;margin-left: 3.2%;">业务员编码</span>
                <span style="width: 10%;margin-left: 1.5%;">手机号</span>
                <span style="width: 8%;margin-left: 4%;">账号状态</span>
                <span style="width: 8%;margin-left: 3.2%;">备注</span>
                <span style="width: 18%;margin-left: 3%;">操作</span>
            </div>
            <div class="goodsShow">
                <ul>
                    <volist id='data' name='data'>
                    <li class="goods_item">
                        <div class="goods_item_mian clearfix">
                            <input type="checkbox" name="message" value="{$data.uid}" class="fl kucun_cb">
                            <div class="num">{$xh++}</div>
                            <div class="jiage nicheng"> 
                              <span > {$data.real_name}</span>
                              <img src="__SUP_PUBLIC__/images/qianbi.png" alt="" class="qianBi btn_show">
                              <div class="dj_box">
                                  <input type="text" >
                                  <button class="blan">确定</button>
                                  <button class="lhui" onclick="dj_hide()">取消</button>
                              </div>
                            </div>
                            <div class="page_view"><img src="__UPLOADS__/supplier/headimg/{$data.headimg}" alt="">{$data.username}</div>
                            <div class="sales">{$data.user_num}</div>
                            <div class="jiage stock"> 
                              <span > {$data.mobile}</span>
                              <img src="__SUP_PUBLIC__/images/qianbi.png" class="shouji">
                              <div class="dj_boxs">
                                  <input type="text" >
                                  <button class="blans">确定</button>
                                  <button class="lhui" onclick="dj_hides()">取消</button>
                              </div>
                            </div>
                            <div class="jiage date">
                              <if condition="$data[status] eq 1" >
                              <span>正常</span>
                              <else/>
                              <span>禁用</span>
                              </if>
                              <img src="__SUP_PUBLIC__/images/qianbi.png" class="zhuangtai">
                              <div class="dj_boxx">
                                  <select name="zt">
                                    <option value="1">正常
                                    <option value="2">禁用
                                  </select>
                                  <button class="blanx">确定</button>
                                  <button class="lhui" onclick="dj_hidex()">取消</button>
                              </div>
                            </div>
                            <div class="order">{$data.remarks}</div>
                            <div class="btn">
                                <a href="__URL__/price/uid/{$data.uid}"><span>商品定价</span></a>
                                <a href="__URL__/edit/uid/{$data.uid}"><span>编辑 </span></a>
                                <a href="__URL__/see/uid/{$data.uid}"><span class="tuiguang">查看</span></a>
                            </div>
                        </div>
                    </li>
                  </volist>
                    
                </ul>
            </div>
            <div class="goodDown clearfix">
              <ul class="pagination">
              {$page}
              
            </ul>
            </div>
        </div>
      </div>
    </div>
    <!-- 底部 == 版权 -->
    <div class="cont_lump con-foot">版权所有：900库 [京ICP备1000000001号-1</di>
  </div>
</body>
<script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/1.8.3/jquery.min.js"></script>
<script>
//批量导出
$('.dao').click(function(){
  //获取所选择的选项
  text = $("input:checkbox[name='message']:checked").map(function(index,elem) {
            return $(elem).val();
        }).get().join(',');
  //把所选择的值通过url传到方法中
  $('.dao').attr('href','__URL__/csvs/uid/'+text);
});
  //点击铅笔的图标弹出输入框
  $(".btn_show").click(function () {
    $(this).parents('.goods_item_mian').find(".dj_box").show(1);
  });
  //点击输入框上的取消时隐藏
  function dj_hide() {$(".dj_box").hide(1);};
  //点击输入框上的确定是获取用户输入内容
  $(".dj_box .blan").click(function () {
    //获取输入内容
    var keyVal = $(this).parent().find('input').val();
    // 设置正则验证方式
    var reg = /^[\u4E00-\u9FA5]{2,4}$/;
    //验证输入内容
    if(!reg.test(keyVal)){
      alert('请输入正确的姓名');return;
    }
      //获取需要修改用户信息的id
      var uid = $(this).parent().parent().parent().find('.kucun_cb').val();
      //获取修改内容
      var nr = $(this).parent().find('input').val();
      //隐藏输入框
      $(".dj_box").hide(1);
      //修改业务员名称
      $.ajax({
        type : 'post',
        dataType : 'json',
        url : "{:U('Channel/set_name')}",
        data : {'uid':uid,'real_name':nr},
        success:function(data){
          if(data){
           location.reload();
          }
        }
      })
  });

  //通过点击手机号后面的铅笔显示输入框
  $(".shouji").click(function () {
    $(this).parents('.goods_item_mian').find(".dj_boxs").show(1);
  });
  function dj_hides() {$(".dj_boxs").hide(1);};
  $(".dj_boxs .blans").click(function () {
    var keyVals = $(this).parent().find('input').val();
    var regs = /^1[34578]\d{9}$/;
    if(!regs.test(keyVals)){
      alert('请输入正确的手机号');return;
    }
    if(keyVals.length==0){
      alert("请输入手机号！")
    }else {
      var uid = $(this).parent().parent().parent().find('.kucun_cb').val();
      var nr = $(this).parent().find('input').val();
      $(".dj_boxs").hide(1);
      $.ajax({
        type : 'post',
        dataType : 'json',
        url : "{:U('Channel/set_name')}",
        data : {'uid':uid,'mobile':nr},
        success:function(data){
          if(data){
           location.reload();
          }
        }
      })
    }
  });



  $(".zhuangtai").click(function () {
    $(this).parents('.goods_item_mian').find(".dj_boxx").show(1);
  });
  function dj_hidex() {$(".dj_boxx").hide(1);};
  $(".dj_boxx .blanx").click(function () {

    var keys = $(this).parent().find('select').val();
    var uid = $(this).parent().parent().parent().find('.kucun_cb').val();
      $(".dj_boxx").hide(1);
      $.ajax({
        type : 'post',
        dataType : 'json',
        url : "{:U('Channel/set_name')}",
        data : {'uid':uid,'status':keys},
        success:function(data){
          if(data){
           location.reload();
          }
        }
      })
  });

</script>
</html>
<style>
/*设置批量导出按钮样式*/
.dao {
    background: blue none repeat scroll 0 0;
    border-radius: 3px;
    color: #fff;
    height: 33px;
    margin-right: 15px;
    margin-top :20px;
    width: 66px;
    padding:8px 8px;
    border:solid;
}
/*设置铅笔弹出的输入框默认不显示*/
.dj_box,.dj_boxx,.dj_boxs {
  display:none;
}
/*设置输入框中的input样式*/
.dj_box input,.dj_boxs input {
  float:left;
  line-height:19px;
  height: 28px;
  padding: 0 10px;
  width: 100px;
}
/*设置输入框div的样式*/
.jiage div.dj_box,.jiage div.dj_boxs,.jiage div.dj_boxx {
    background: #fff none repeat scroll 0 0;
    border: 1px solid #0575e1;
    border-radius: 5px;
    padding: 10px 15px;
    position: absolute;
}
/*设置输入框上的确定按钮样式*/
.jiage .blan,.jiage .blans,.jiage .blanx {
    background: #0077dd none repeat scroll 0 0;
    border-radius: 1px;
    color: #fff;
    height: 28px;
    margin: 0 5px;
    width: 46px;
}
/*设置输入框上取消按钮样式*/
.jiage .lhui {
    background: #79b6ec none repeat scroll 0 0;
    border-radius: 1px;
    color: #fff;
    height: 28px;
    width: 46px;
}
/*给铅笔增加小手样式*/
.btn_show,.shouji,.zhuangtai{
  cursor:pointer;
}
/*手机号的输入框向左移动*/
.jiage div.dj_boxs {
  margin-left: -60px;
}

</style>