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
  <div class="clearfix container" id="app-container">
    <div class="cont_lump cont_lump_sell l_business  AccountSettings  bor_bm1">
      <div class="cont_title">
        <span>业务员管理</span> 
      </div>
      <div class="con">
        <div class="clearfix pdh10 lbj">
          
          <form action="" class="kucun_Sou fl mgr10">
           <input type="text" class="sou" placeholder="账号/姓名">
           <button class="sous"><i> </i></button>
              
              
              <button class="x_shanxuan">筛选</button>
              
          </form>
          <a href="__URL__/add_role"><button class="button q_gr mgr20 fr" style="width: 120px;">新增角色</button></a>
        </div>
        <table class="shezhi">
          <tr class="font-weight600">
            <th style="width: 70px;">
              <input type="checkbox" name="1" value="1" class="fl kucun_cb">
            </th>
            <th><p>角色</p>
                
            </th>
            <th>描述</th>
           
            
            <th>操作</th>
          </tr>
          <tr>
            <td style="width: 70px;">
              <input type="checkbox" name="1" value="1" class="fl kucun_cb">
              <div class="num fl mgr10 mgl10">01</div>
            </td>
            <td class="clearfix">
              <p class="col-lan">沧海桑田</p>
            </td>
            
            <td>暂无法描述</td>
            <td><span>修改</span><span class="kong">删除</span></td>
          </tr>
           <tr>
            <td style="width: 70px;">
              <input type="checkbox" name="1" value="1" class="fl kucun_cb">
              <div class="num fl mgr10 mgl10">01</div>
            </td>
            <td class="clearfix">
              <p class="col-lan">沧海桑田</p>
            </td>
            
            <td>暂无法描述</td>
            <td><span>修改</span><span class="kong">删除</span></td>
          </tr>
          <tr>
            <td style="width: 70px;">
              <input type="checkbox" name="1" value="1" class="fl kucun_cb">
              <div class="num fl mgr10 mgl10">01</div>
            </td>
            <td class="clearfix">
              <p class="col-lan">沧海桑田</p>
            </td>
            
            <td>暂无法描述</td>
            <td><span>修改</span><span class="kong">删除</span></td>
          </tr>
           <tr>
            <td style="width: 70px;">
              <input type="checkbox" name="1" value="1" class="fl kucun_cb">
              <div class="num fl mgr10 mgl10">01</div>
            </td>
            <td class="clearfix">
              <p class="col-lan">沧海桑田</p>
            </td>
            
            <td>暂无法描述</td>
            <td><span>修改</span><span class="kong">删除</span></td>
          </tr>
        </table>
        <div class="l_end">
          <input type="checkbox" name="1" value="1" class="fl kucun_cb">
          <button class="jinyong">禁用</button>
          <button class="shanchu">删除</button>
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
      $(".AccountSettings table.shezhi th input").click(function(){
          if($(this).is(':checked')){
              $('.AccountSettings table.shezhi tr td input').prop("checked",true);
          }else{
              $('.AccountSettings table.shezhi tr td input').prop("checked",false);
          }
      });
</script>
</html>