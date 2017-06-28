<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="wap-font-scale" content="no">
	<title>求购中心</title>
    <link rel="stylesheet" href="__HOME_PUBLIC__/css/exhibition_hall_style.css">
	<link rel="stylesheet" href="__HOME_PUBLIC__/css/swiper.min.css">
	<link rel="stylesheet" href="__HOME_PUBLIC__/css/icons.css">
	<link rel="stylesheet" href="__HOME_PUBLIC__/css/reset.css">
	<link rel="stylesheet" href="__HOME_PUBLIC__/css/style.css">
</head>
<body>
<include file="Public/Header" />

        <div class="buy_center0">
            <div class="buy_center">
              <form action="" method="post">
                <div class="buy_center1">
                    <ul>
                <!-- <li>
                    所在地区：
                <select>
                <option>所有分类</option>
                <option>北京</option>
                <option>天津</option>
                <option>山西</option>
                </select>
                  
                </li>  -->
                  <li>
                    发布时间：<input name="time" <?php if($time){echo "value='$time'";}?> style="height:20px;"   type="search"  class="order_time" placeholder="&nbsp;请选择发布时间" id="wrong_start">
                </li> 
                <li>
                  截止时间：<input <?php if($e){ echo "value=".$e;} ?> style="height:20px;"  type="search" name="end" class="order_time" placeholder="&nbsp;请选择时间范围结束" id="wrong_end">
                </li>
                  <li>
                    分类：
                <select name="cate">
                  
                <option value="0">所有分类</option>
                <volist name="type" id="t">
                <option <?php if($cate && $cate==$t['type_id']){echo "selected='selected'";}?> value="{$t.type_id}">{$t.type_name}</option>
                  </volist>
                </select>
                </li>
                <li>

                </li>

                <li>
                  <!-- <input type="submit" style=" font-size:15px;color:#00A199;" value="开始筛选" /> -->
                  <button style=" font-size:15px;color:#00A199;">开始筛选</button>

                </li>

                    </ul>
                </div>
              </form>
                <div class="buy_center2">
                <!-- 第一个开始 -->
                <volist name="alldata" id="d">
                    <div class="buy_center2_1">
                        <div class="buy_center2_1_1">
                            <div class="buy_center_title">
                                {$d.cg_name}
                            </div>
                        </div>
                        <div class="buy_center2_1_2">
                            <div class="buy_center2_1_2_1">
                                <ul>
                                    <li>采购数量：<a class="my_buy_display">{$d.cg_num}</a></li>
                                    <li>发布时间：<a class="my_buy_display"><?=date('Y-m-d',$d['cg_add_time'])?></a></li>
                                    <li>联系电话：<a class="my_buy_display">{$d.cg_phone}</a></li>
                                   <!--  <li>剩余时间：<a class="my_buy_display">0</a>天</li> -->
                                    <li>公司名称：<a class="my_buy_display">{$d.cg_company}</a></li>
                                </ul>
                            </div>
                            <div class="buy_center2_1_2_2">
                                <a href="">立即报价</a>
                            </div>
                        </div>
                    </div>
                </volist>
                <!-- 第一个结束 -->

                </div>
            </div>            
        </div>
               <div style="position:relative; left:-700px;">
                <ul class="pagination pages">
                  {$page}  
                </ul>
               </div>
<!-- <div class="con_bottom12">
                   <span>上一页</span>
                   <span>1</span>
                   <span>2</span>
                   <span>3</span>
                   <span>4</span>
                   <span>下一页</span>
               </div> -->


    <include file="Public/Foot" />
</body>
<script type="text/javascript" src="__HOME_PUBLIC__/js/jquery.min.js"></script>
<script type="text/javascript" src="__HOME_PUBLIC__/js/swiper.min.js"></script>
<script type="text/javascript" src="__HOME_PUBLIC__/js/js.js"></script>
<script type="text/javascript" src="__HOME_PUBLIC__/cg_admit_order/laydate/laydate.js"></script>
</html>
<script>
    var start = {
      elem: '#wrong_start',
      format: 'YYYY/MM/DD',
      min: '1900-01-01', //最小日期
      max: laydate.now(), //最大日期
      istime: false,
      istoday: false,

    };
    var end = {
      elem: '#wrong_end',
      format: 'YYYY/MM/DD',
      min: '1900-01-01', //最小日期
      max: laydate.now(),
      istime: false,
      istoday: false,
      choose: function(datas){
        start.max = datas; //结束日选好后，重置开始日的最大日期
      }
    };
    laydate(start);
    laydate(end);
</script>
 <style> 
  .pages {
    float:right;
  } 
  .pages a,  
  .pages span {  
      display: inline-block;  
      padding: 2px 5px;  
      margin: 0 1px;  
      border: 1px solid #f0f0f0;  
      -webkit-border-radius: 3px;  
      -moz-border-radius: 3px;  
      border-radius: 3px;  
  }  
    
  .pages a,  
  .pages li {  
      display: inline-block;  
      list-style: none;  
      text-decoration: none;  
      color: #58A0D3;  
  }  
    
  .pages a.first,  
  .pages a.prev,  
  .pages a.next,  
  .pages a.end {  
      margin: 0;  
  }  
    
  .pages a:hover {  
      border-color: #50A8E6;  
  }  
    
  .pages span.current {  
      background: #50A8E6;  
      color: #FFF;  
      font-weight: 700;  
      border-color: #50A8E6;  
  }  
  .pages {
    font-size:18px;
  }
</style> 