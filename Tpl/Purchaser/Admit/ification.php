<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>0407-添加商品分类</title>
	<link rel="stylesheet" href="__PUR_PUBLIC__/css/reset.css">
	<link rel="stylesheet" href="__PUR_PUBLIC__/css/icons.css">
	<link rel="stylesheet" href="__PUR_PUBLIC__/css/style.css">
</head>
<body>
	<div class="wh1200auto clearfix">
		<!-- 左边导航 -->
	<include file="Public/leftBar" />
		<!-- 右边内容 -->
		<div class="right_content fl">
			<div class="right_con_down shop_0407">
				
				<div class="title_ty">
					<span class="tit_name">商品列表</span>
					<button class="btn-100x30 bg-slv col-fff bor-r5 mgl25 new_goods_groups">新建商品分组</button>
				</div>
				<div class="">
					<table>
						<tr>
							<th class="wh50"><input type="checkbox"></th>
							<th class="w700 text-left">分组名称</th>
							<th>操作</th>
						</tr>
						<volist id='str' name='str'>
						<tr>
							<td><input type="checkbox" name="message" value="{$str.fid}"></td>
							<td class="text-left col-lan fname">{$str.fname}</td>
							<input type="hidden" class="id" value="{$str.fid}">
							<td class="col-lan">
								<span class="mgw5 cur-p bianji">编辑</span>
								<span class="mgw5 cur-p shanchus">删除</span>
								<span class="mgw5 cur-p">链接</span>
							</td>
						</tr>
						</volist>
						
					</table>
					<div class=" mgt20 mgl20">
						<input type="checkbox" id="CheckAll">
						<button class="btn-80x30 mgl10 bg-slv bor-r5 col-fff del_querens">删除</button>
					</div>
				</div>
				<div class="clearfix pages">
					{$page}
				</div>
				<div class="record_info">版权所有:900库 [京ICP备1000000001号-1]</div>
			</div>
		</div>
	</div>
</body>
<script type="text/javascript" src="__PUR_PUBLIC__/js/jquery.min.js"></script>
<script type="text/javascript" src="__PUR_PUBLIC__/layer/layer.js"></script>
<script type="text/javascript" src="__PUR_PUBLIC__/js/js.js"></script>
<script>
  $(".new_goods_groups").on("click",function () {
    layer.prompt({title: ['新建商品分组', 'font-size:18px;font-weight:600;'], formType: 0}, function(text, index){
      layer.close(index);
        $.ajax({
          type : 'post',
          dataType : 'json',
          url : "{:U('Admit/ification')}",
          data : {'fname':text},
          success:function(data){
            if(data){
              location.reload();
              // layer.msg('新建分组名称为'+ text);
    
            }
          }
        });
       
    });
  });


  $(".shanchus").on("click",function () {
  	var id = $(this).parent().parent().find('.id').val();
    layer.confirm('确定要删除', {
      btn: ['确定','取消'] //按钮
    }, function(){
  		$.ajax({
	  		type : 'post',
	  		dataType : 'json',
	  		url : "{:U('Admit/del_name')}",
	  		data : {'fid':id},
	  		success:function(data){
	  			if(data){
	  				location.reload();
	  			}
	  		}
  	});
    }, function(){
      layer.msg('已取消');
    });
  }); 


  $('.bianji').click(function(){
  	var id = $(this).parent().parent().find('.id').val();
  	layer.prompt({title: ['修改商品分组名称', 'font-size:18px;font-weight:600;'], formType: 0}, function(text, index){
    layer.close(index);
        $.ajax({
          type : 'post',
          dataType : 'json',
          url : 'edit_name',
          data : {'fid':id,'fname':text},
          success:function(data){
            if(data){
              location.reload();
            }
          }
        });
    });
  })


    //批量删除全选按钮
  $('#CheckAll').click(function(){
    $('input[name="message"]').attr("checked",this.checked);
  });

    $(".del_querens").on("click",function () {
    layer.confirm('确定要删除', {
      btn: ['确定','取消'] //按钮
    }, function(){
    	text = $("input:checkbox[name='message']:checked").map(function(index,elem) {
		return $(elem).val();
	    }).get().join(',');
	    // alert(text);
	   	$.ajax({
	  		type : 'post',
	  		dataType : 'json',
	  		url : "{:U('Admit/del_name')}",
	  		data : {'fid':text},
	  		success:function(data){
	  			if(data){
	  				location.reload();
	  			}
  			}
  	});
    }, function(){
      layer.msg('已取消');
    });
  }); 



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