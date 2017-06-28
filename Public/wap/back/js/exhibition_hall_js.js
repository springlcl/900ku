// 展厅公司详情页
// 头部点击下拉详情
$('.exhibition_hall_details_con_top').click(function(){
    $('.exhibition_hall_details_click').slideDown(400)
    $('.exhibition_hall_details_con_top').slideUp(400)
})
$('.exhibition_hall_details_con_but').click(function(){
    $('.exhibition_hall_details_con_top').slideDown(400);
    $('.exhibition_hall_details_click').slideUp(400)
})

// 轮播图结束
// 向上滚动公告开始
function autoScroll(obj){  
   $(obj).find(".list").animate({  
       marginTop : "-40px"  
   },500,function(){  
       $(this).css({marginTop : "0px"}).find("li:first").appendTo(this);  
   })  
}  
$(function(){  
   setInterval('autoScroll(".exhibition_hall_details_notice_scroll")',4000)  
})  
// 向上滚动公告结束

// 商品中心选项卡
$('.priduct_list_top_ol li').click(function(){
    
    $('.priduct_list_top_ol li').css({color:'#666','borderBottom':'none'})
    $(this).css({color:'#00A199','borderBottom':'3px solid #00A199'})
})