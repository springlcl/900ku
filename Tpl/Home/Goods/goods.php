<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="wap-font-scale" content="no">
	<title>前台首页</title>
    <link rel="stylesheet" href="__HOME_PUBLIC__/css/exhibition_hall_style.css">
	<link rel="stylesheet" href="__HOME_PUBLIC__/css/swiper.min.css">
	<link rel="stylesheet" href="__HOME_PUBLIC__/css/icons.css">
	<link rel="stylesheet" href="__HOME_PUBLIC__/css/reset.css">
	<link rel="stylesheet" href="__HOME_PUBLIC__/css/style.css">
</head>
<body>
<include file="Public/Header" />
	<div class="l_quanbu">
			<button>全部商品</button>
			<span class="fs-18">&gt;</span>

			<select onchange="window.location.href=this.value">
 				 <option value ="{:U('Goods/goods',array('cid'=>0))}">全部</option>
 				 <volist name="lastc" id="l">
 				 <option  value ="{:U('Goods/goods',array('cid'=>$l['gcid']))}" <?php if($l['gc_name']==$cname['gc_name']){ echo "selected='selected'";} ?>>{$l.gc_name}</option>
 				</volist>
			</select>
		
	</div>
<!-- 	<div class="l_dingguode">
		<input type="checkbox" name="checkbox1" value="checkbox"> 常购清单
		<input type="checkbox" name="checkbox1" value="checkbox" class="mgl20"> 订过的
		<select>
  				<option value ="volvo">供应商</option>
  				<option value ="saab">张三</option>
		</select>
	</div> -->
        <!-- <div class="shopping_banner">
            <a href="">
                <img src="__HOME_PUBLIC__/images/shopping_banner.png" alt="">
            </a>
        </div> -->
        <div class="shopping_one_new wh1200auto">

			<div class="lump">
				<h3 class="lump_title"><if condition="$cname['gcid'] eq 0">全部商品</if> {$cname.gc_name} <!-- <a class="" href="">更多</a> --></h3>
				<ul class="goods_list clearfix">
					<volist name="goods" id="g">
				
					<li class="w200 bor_1ddd mgt20  fl"  style="width:200px;height:250px;">
						<a href="{:U('Goods/index',array('id'=>$g['goods_id']))}">
			<!-- 			<img class="btn-200x200" src="__HOME_PUBLIC__/images{$g.goods_img}" alt=""> -->
						<img class="btn-200x200" src="__UPLOADS__/{$g.goods_thumb}" alt="">
						<div class="text pd10">
							<h5 class="col-666 fw600">{$g.goods_name}</h5>
							<p class="mgt10">{$g.rec_remark}</p>
							<h6 class="mgt10 fw600">￥{$g.goods_price}</h6>
						</div>
							</a>
					</li>
			
					</volist>
				</ul>
			</div>
			</div>
				<div style="position:relative; left:-700px;">
			                <ul class="pagination pages">
			                  {$page}  
			                </ul>
			               </div>
		<!-- 		<div class="con_bottom12">
                   <span>上一页</span>
                   <span>1</span>
                   <span>2</span>
                   <span>3</span>
                   <span>4</span>
                   <span>下一页</span>
               </div> -->
        </div>

        
    </div>
    
<include file="Public/Foot" />
</body>
<script type="text/javascript" src="__HOME_PUBLIC__/js/jquery.min.js"></script>
<script type="text/javascript" src="__HOME_PUBLIC__/js/swiper.min.js"></script>
<script type="text/javascript" src="__HOME_PUBLIC__/js/js.js"></script>
<script>
    var swiper = new Swiper('.swiper-container', {
        pagination: '.swiper-pagination',
        slidesPerView: 3,
        slidesPerColumn: 1,
        paginationClickable: true,
        spaceBetween: 30,
        autoplay:3000
    });

    //select切换

</script>

</html>
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