<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"><meta http-equiv="keywords" content="keyword1,keyword2,keyword3">
  <meta http-equiv="description" content="this is my page">
  <title>企业黄页</title>
  <link rel="stylesheet" href="__SUP_PUBLIC__/css/style.css">
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries--><!--[if lt IE 9]><script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script><script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<body>
<!-- 左导一 -->
  <include file='Public/firstSidebar' />
<!-- 左导二 -->
  <include file='Set_left' />
<!-- 右侧 内容-->
<div class="clearfix container min-w1100" id="app-container">

      <div class="cont_lump cont_lump_sell YellowPage">
          <div class="cont_title clearfix">
            <span>企业黄页</span>
          </div> 
          <table class="l_YellowPage">
            <tr>
                <th>所属公司</th>
                <th>{$em.company}</th>
            </tr>
            <tr>
              <td>展厅名称</td>
              <td>{$em.ex_name}</td>
            </tr>
            <tr>
              <td>主要类目</td>
              <td>
                
                <select id="cate">
                 <!--  <option value="$em.mcid" selected = "selected">{$em.mc_name}</option> -->
                  <volist name="cate" id="c">
                  <option value="{$c.mcid}" 
                  <?php if($em['mc_name']==$c['mc_name']){
                    echo "selected = 'selected'";
                  } ?>>{$c.mc_name}</option>
                  </volist>
                </select>
<span id="cedit" class="col-lan mgl5  cur-p cate">修改</span>
               </td>
            </tr>
            <tr>
              <td>创建时间</td>
              <td><?=date('Y-m-d H:i:s',$em['add_time']);?></td>
            </tr>
            <form action="{:U('Setting/mess_edit')}" method="post" enctype="multipart/form-data">
            <tr class="h82">
              <td>展厅logo</td>
              <!--__SUP_PUBLIC__/images/index_end_tbc.png -->
              <td class="clearfix"><div class="fl tupian" ><img id='pic' src="__UPLOADS__/image/{$em.ex_logo}" alt=""></div> 
                <input type="file" value="修改" name="thumb" id="file" />
                <!-- <p class="col-lan fl xiugai cur-p logo">修改</p> --></td>
            </tr> 
            <tr class="h82">
              <td>展厅简介</td>
              <td><textarea style="width:500px;height:85px;" name="intro">{$em.ex_intro}</textarea>
                <!-- <p class="qwenzi">欢迎光临本店，本店新开张，诚信经营，只赚信誉不赚钱，,我店产品全部来自正规的渠道，以最直接有效的方式送达最终端消费者手里，避免了中间过多的流通环节。并且本店一直是以薄利多销为原则，在有合理利润的基础下将尽最大可能让利给大家，所以才会比专柜便宜许多!!</p> --></td>
            </tr>
            <input type="hidden" id="hexid" value="<?= $_GET['exid']?>" name="exid" />
<!--             <tr>
              <td>经营人姓名</td>
              <td>张小强</td>
            </tr>
            <tr> -->
              <td>法人姓名</td>
              <td>{$em.username}</td>
            </tr>
<!--             <tr>
              <td>经营人QQ</td>
              <td>1060984377</td>
            </tr> -->
            <tr>
                <td>联系地址</td>
                <td>{$em.province}{$em.city}{$em.area}{$em.street}</td>
            </tr>
<!--             <tr>
                <td>经营人手机/电话</td>
                <td><span class="mgr10">19310137594 </span><span class="mgr10"> 010-7227262734</span> <span class="col-ju">(正确的电话格式为：010-09090900)</span></td>
            </tr>
            <tr>
                <td>分销商联系方式</td>
                <td>
                  <select class="fenlei">
                    <option value="0">显示分销商自己</option>
                    <option value="1">衣服</option>
                    <option value="2">裤子</option>
                    <option value="3">手机</option>
                  </select>
                  <span class="mgl20 col-ju">(控制访问分销商商品详情页是否限制自己的联系方式)</span>
                </td>
            </tr> -->
          </table> 
          <button class="landim btn-lan-160">保存</button>
          </form>           
      </div>
       <!-- 底部 == 版权 -->
    <div class="cont_lump con-foot">版权所有：900库 [京ICP备1000000001号-1</div>
</div>
<!-- 弹框 -->
  <div class="protection">
    <div class="tanchu_box tanchu_box1100 stayOrderRecord_tab_box">
      <span class="gb close_btn"><i></i></span>
      <table class="historyRecord">
        <tr>
          <th>序号</th>
          <th>开票日期</th>
          <th>发票编号（同批次发票）</th>
          <th>开票金额</th>
          <th>发票状态</th>
          <th>快递公司</th>
          <th>快递单号</th>
        </tr>
        <tr>
          <td>01</td>
          <td>2017-03-13</td>
          <td>13455467755677745</td>
          <td>￥360.00</td>
          <td>已确认</td>
          <td>圆通快递</td>
          <td>784744748585</td>
        </tr>
      </table>
      <div class="zongde bg-f5 center">已开总额：￥340.00</div>
    </div>
  </div>
</body>
<script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="laydate/laydate.js"></script>
<script type="text/javascript" src="__SUP_PUBLIC__/js/ind.js"></script>
<script>
    // 图片显示
    $('#file').bind('change',function(){
    var url=window.URL.createObjectURL(this.files[0]);
    //alert(url);
    $('#pic').attr('src',url);
    });

    //修改经营类目
    $("#cedit").bind('click',function(){
      var mcid=$("#cate").val();
      var exid=$("#hexid").val();
                  $.ajax({
                  type: 'post',
                  url: "{:U('Setting/c_edit')}",
                  data: {'mcid':mcid,'exid':exid},
                  dataType: 'json',
                  async: false,
                  success: function(data)
                  {
                    if(data)
                    {
                     location.reload();
                    }else{
                      location.reload();
                    }
                  }
                });
    })


    var start = {
      elem: '#wrong_start',
      format: 'YYYY/MM/DD hh:mm:ss',
      min: '1900-01-01 00:00:00', //最小日期
      max: laydate.now(), //最大日期
      istime: true,
      istoday: false,
      choose: function(datas){
         end.min = datas; //开始日选好后，重置结束日的最小日期
         end.start = datas //将结束日的初始值设定为开始日
      }
    };
    var end = {
      elem: '#wrong_end',
      format: 'YYYY/MM/DD hh:mm:ss',
      min: '1900-01-01 00:00:00', //最小日期
      max: laydate.now(),
      istime: true,
      istoday: false,
      choose: function(datas){
        start.max = datas; //结束日选好后，重置开始日的最大日期
      }
    };
    laydate(start);
    laydate(end);
</script>
</html>