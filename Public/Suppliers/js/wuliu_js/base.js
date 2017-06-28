var widget_link_save_box = {};

function widget_link_yhq(dom,type,after_obj){
	//点击
	dom.click(function(){
		try{
			var customs     = customField.checkEvent();
			var items = [];
			var k = 0;
			$.each(customs,function(ii,vv){
				if(vv.type=='coupons'){
					$.each(vv.coupon_arr,function(iii,vvv){
						items[k] = vvv;
						k++;	
					});
				}
			});
		}catch(e) {
			
		}
		//移除
		$('.modal-backdrop,.modal').remove();

		//添加
		$('body').append('<div class="modal-backdrop fade in widget_link_back"></div>');

		//赋值
		var randNum = getRandNumber();
		var load_url = 'user.php?c=widget&a='+type+'&type=more&number='+randNum;
		
		if((type=='coupon')&&items!=undefined){		// 已选取的商品置灰
			var itemArr = [];
			$.each(items,function(i,v){
				if(v!=undefined){
					itemArr[i] = v.id;
				}
			});
			load_url += '&selecteditems='+itemArr;
		}
		widget_link_save_box[randNum] = after_obj;


		//添加
		modalDom = $('<div class="modal fade hide js-modal in widget_link_box" aria-hidden="false" style="margin-top:0px;display:block;"><iframe src="'+load_url+'" style="width:100%;height:200px;border:0;-webkit-border-radius:6px;-moz-border-radius:6px;border-radius:6px;"></iframe></div>');
		$('body').append(modalDom);
		
		//动画
		modalDom.animate({'margin-top': ($(window).scrollTop() + $(window).height() * 0.05) + 'px'}, "slow");

		//关闭
		$('.modal-backdrop').click(function(){
			login_box_close();
		});
	});
};