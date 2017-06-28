<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>添加角色</title>
	<link rel="stylesheet" href="__SUP_PUBLIC__/css/style.css">
	<style>

	</style>
</head>
<body>
<!-- 左导一 -->
  <include file='Public/firstSidebar' />
<!-- 左导二 -->
  <include file='Set_left' />
<!-- 右侧 内容-->
<!-- 右侧 内容-->
  <div class="clearfix container" id="app-container">
    <div class="cont_lump cont_lump_sell l_business  AccountSettings bor_bm1">
      <div class="cont_title">
        <span>员工账号设置</span> 
      </div>
      <div class="con">
        <div class="clearfix pdh10 lbj">
          
          <form method="post" action="search" class="kucun_Sou fl mgr10">
           <input name="rname" type="text" class="sou" placeholder="姓名">
           <button class="sous"><i> </i></button>
         </form>
         <form action="" class="kucun_Sou fl mgr10">
              <select class="fenlei mgl10">
                <option value="0">身份</option>
                <option value="1">衣服</option>
                <option value="2">裤子</option>
                <option value="3">手机</option>
              </select>
              
              <select class="fenlei mgl10">
                <option value="" >状态</option>
                <option value="0">禁用</option>
                <option value="1">正常</option>
              </select>
              
              <button class="x_shanxuan">筛选</button>
              
          </form>
          <a href="__URL__/add_staff">
            <button class="button q_gr mgr20 fr" style="width: 120px;">新增员工</button>
          </a>
        </div>
        <table class="shezhi">
          <tr class="font-weight600">
            <th style="width: 70px;">
              <input type="checkbox" name="1" value="1" class="fl kucun_cb">
            </th>
            <th>
                微信昵称
            </th>
            <th>头像</th>
            <th>姓名</th>
            <th>员工编码</th>
            <th>手机</th>
            <th>邮箱</th>
            <th>角色</th>
            <th>操作</th>
          </tr>
          <volist id="data" name="data">
            <tr>
              <td style="width: 70px;">
                <input type="checkbox" name='message' value="{$data.uid}" class="fl kucun_cb">
                <div class="num fl mgr10 mgl10">{$xuhao++}</div>
              </td>
              <td class="clearfix">
                <p class="col-lan">{$data.username}</p>
              </td>
              <td><div class="tupian"><img src="{$data.headimg}" alt=""></div></td>
              <td>{$data.real_name}</td>
              <td>{$data.user_num}</td>
              <td>{$data.mobile}</td>
              <td>{$data.email}</td>
              <td>财务</td>
              <td>
                <a href="__URL__/del?uid={$data.uid}"><span>删除</span></a>
                <a href="__URL__/staff_md?uid={$data.uid}"><span>编辑</span></a>
                <if condition="$data.status eq 1">
                <a href="__URL__/modify?status=0&uid={$data.uid}"><span class="kong">正常</span></a>
                <else/>
                <a href="__URL__/modify?status=1&uid={$data.uid}"><span class="kong">禁用</span></a>
                </if>
              </td>
            </tr>
          </volist>
        </table>
        <div class="l_end">
          <input id="checkAll" type="checkbox" name="1" value="1" class="fl kucun_cb">
          <button class="jinyong">禁用</button>
          <button class="shanchu">删除</button>
        </div>
        
      </div>
    </div>
       <!-- 底部 == 版权 -->
    <div class="cont_lump con-foot">版权所有：900库 [京ICP备1000000001号-1</div>
</body>
<script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="__SUP_PUBLIC__/js/ind.js"></script>
<script>
//点击全选选中所有
$('#checkAll').click(function(){
  $('input[name="message"]').attr('checked',this.checked);
});
//批量删除
$(".shanchu").click(function() {
  //获取所选择的值
    text = $("input:checkbox[name='message']:checked").map(function(index,elem) {
        return $(elem).val();
    }).get().join(',');
// alert(text);
    $.ajax({
      type : 'post',
      url : 'del',
      dataType : 'json',
      data : {'uid':text},
      success:function(data){
        if(data){
          // 
          // alert(111);
        }else{
          window.location.href=window.location.href;
        }
      }
    })
});
//批量禁用
$(".jinyong").click(function() {
    //获取所选择的值  
    text = $("input:checkbox[name='message']:checked").map(function(index,elem) {
        return $(elem).val();
    }).get().join(',');
    // alert(text);
    $.ajax({
      type : 'post',
      url : 'modify',
      dataType : 'json',
      data : {'uid':text},
      success:function(data){
        if(data){
          window.location.href="__URL__/staff";
          // alert(111);
        }else{
          window.location.href=window.location.href;
        }
      }
    })
});


</script>
</html>
