var area_used_id=[],area_selected_id=[],tmp_area_selected_id=[],now_edit_area = null;
$(function(){
	// load_page('.freight-wrap',load_url,{page:'delivery_list'},'',analysis_area);
	// $('a').live('click',function(){
	// 	switch($(this).attr('href')){
	// 		case '#':
	// 		case '#list':
	// 			load_page('.freight-wrap',load_url,{page:'delivery_list'},'',analysis_area);
	// 			break;
	// 		case '#add':
	// 			area_used_id=[];
	// 			area_selected_id=[];
	// 			tmp_area_selected_id=[];
	// 			now_edit_area = null;
	// 			load_page('.freight-wrap',load_url,{page:'delivery_add'},'delivery_add', function() {
	// 				$('#nprogress').html('');
	// 			});
	// 			break;
	// 	}
	// });
	
	$('.js-assign-cost').live('click',function(){
		now_edit_area = null;
		show_area_layer();
	});
	$('.freight-add-form .js-save-btn').live('click',function(){
		var save_btn = $(this);
		var name_dom = $('.freight-add-form input[name="name"]');
		name_dom.val($.trim(name_dom.val()));
		if(name_dom.val().length == 0){
			layer_tips(1,'模板名称不能为空');
		}else if($('.freight-template-table tbody tr').length == 0){
			layer_tips(1,'至少要有一个配送区域');
		}else{
			var post_txt = '';
			$.each($('.freight-template-table tbody tr'),function(i,item){
				$.each($(item).find('.text-depth'),function(j,jtem){
					post_txt += $(jtem).attr('area-id')+'&';
				});
				post_txt += ',';
				post_txt += $(item).find('.cost-input[name="first_amount"]').val()+',';
				post_txt += $(item).find('.cost-input[name="first_fee"]').val()+',';
				post_txt += $(item).find('.cost-input[name="additional_amount"]').val()+',';
				post_txt += $(item).find('.cost-input[name="additional_fee"]').val()+';';
			});
			save_btn.html('提交中...').prop('disabled',true);
			var edit_tip_id = $('.freight-add-form').attr('tpl-id');
			if(edit_tip_id){
				$.post(edit_url,{name:name_dom.val(),area:post_txt,tpl_id:edit_tip_id},function(result){
					if(result.err_code==0){
						layer_tips(0,result.err_msg);
						load_page('.freight-wrap',load_url,{page:'delivery_list'},'',analysis_area);
					}else{
						layer.alert(result.err_msg,0);
					}
					save_btn.html('保存').prop('disabled',false);
				});
			}else{
				$.post(add_url,{name:name_dom.val(),area:post_txt},function(result){
					if(result.err_code==0){
						load_page('.freight-wrap',load_url,{page:'delivery_list'},'',analysis_area);
					}else{
						layer.alert(result.err_msg,0);
					}
				});
			}
		}
	});
					
	$('.freight-template-list-wrap .freight-template-title').live('click',function(){
		var siblings_table = $(this).siblings('table');
		if(siblings_table.hasClass('hide')){
			$(this).find('.js-freight-extend-toggle').removeClass('freight-extend-toggle-extend');
			siblings_table.removeClass('hide');
		}else{
			$(this).find('.js-freight-extend-toggle').addClass('freight-extend-toggle-extend');
			siblings_table.addClass('hide');
		}
	});
	
	/*$('.js-area-editor-notused .area-editor-list-title').live('click',function(){
		if($(this).hasClass('area-editor-list-select')){
			$(this).removeClass('area-editor-list-select');
		}else{
			$(this).addClass('area-editor-list-select');
		}
	});*/

	// 显示省下面的市/区
	$('.js-ladder-toggle').live('click',function(){
		var city_html = '<div class="city" style="display:none;"><ul>';
		var provence_dom = $(this).parent('div').parent('div').parent('li');
		// 添加过 删除
		var city_div = $(provence_dom).children('div[class="city"]');
		if(city_div.length>0){
			$(this).text('+');
			$(city_div).hide(200);
			setTimeout(function(){$(city_div).remove();},200);
			return;
		}
		$(this).text('-');
		var provence_id = $(provence_dom).attr('area-id');
		// 单独处理四个直辖市
		if(provence_id==110000||provence_id==120000||provence_id==310000||provence_id==500000){
			provence_id = parseInt(provence_id) + 100;
		}
		var used_li = $('.js-area-editor-used .area-editor-depth li');
		var used_city = [];
		var t=0;
		$.each(used_li,function(aa,bb){
			used_city[t] = $(bb).attr('area-id');
			t++;
		});
		
		$.each(__alldiv,function(i,v){
			if(v[1]==provence_id && $.inArray(i,used_city)<=0){
				city_html += ('<li provence-id='+provence_id+' area-id='+i+'>'+v[0]+'</li>');
			}
		});
		city_html += '</ul></div>';
		$(provence_dom).append(city_html);
		city_div = $(provence_dom).children('div[class="city"]');
		$(city_div).show(500);
	});

	$('.area-editor-list-title-content span').live('click',function(){
		if($(this).parent('div').parent('div').hasClass('area-editor-list-select')){
			$(this).parent('div').parent('div').removeClass('area-editor-list-select');
		}else{
			$(this).parent('div').parent('div').addClass('area-editor-list-select');
			// 移除该省下面选中的市
			$(this).parent('div').parent('div').siblings('div[class="city"]').children('ul').children('li').removeClass('select_city');
		}
	});

	$('.city ul li').live('click',function(){
		if($(this).hasClass('select_city')){
			$(this).removeClass('select_city');
		}else{
			$(this).addClass('select_city');
			// 移除该市所在的省
			$(this).parent('ul').parent('div').siblings('div[class*="area-editor-list-select"]').removeClass('area-editor-list-select');
		}
	});
	
	/*$('.js-area-editor-translate').live('click',function(){
		var selected_num = 0;
		$.each($('.area-editor-list-select').closest('li'),function(i,item){
			$(item).remove();
			var area_id = $(item).attr('area-id');
			area_used_id[area_id] = 1;
			selected_num++;
		});
		if(selected_num > 0){
			var area_used_html = '';
			for (var key in __alldiv){
				if((key.indexOf('0000') == 2 || key == 500000) && area_used_id[key] == 1){
					area_used_html += '<li area-id="'+key+'"><div class="area-editor-list-title"><div class="area-editor-list-title-content js-ladder-select"><div class="js-ladder-toggle area-editor-ladder-toggle extend">+</div>'+__alldiv[key][0]+'<div class="area-editor-remove-btn js-ladder-remove">×</div></div></div></li>';
				}
			}
			$('.js-area-editor-used .area-editor-depth').html(area_used_html);
			
		}
	});*/

	$('.js-area-editor-translate').live('click',function(){
		var areas = $('.area-editor-list .area-editor-depth').children('li');
		var selected_num = 0;
		$.each(areas,function(i,v){
			var selected_provence_li = $(v).children('div').hasClass('area-editor-list-select');
			if(selected_provence_li){
				var area_id = $(v).attr('area-id');
				// 检查该省下面的市有没有添加过，如果有，则删除该省下已添加过的市
				var used_li = $('.js-area-editor-used .area-editor-depth li');
				$.each(used_li,function(aa,bb){
					if(parseInt(area_id/10000)==parseInt($(bb).attr('area-id')/10000)){
						area_used_id[$(bb).attr('area-id')] = 0;
					}
				});

				if(area_id==110000||area_id==120000||area_id==310000||area_id==500000){
					area_id = parseInt(area_id)+100;
				}
				
				area_used_id[area_id] = 1;
				selected_num++;
				$(v).remove();
				return true;	// 等同于php中的continue
			}

			var city_lis = $(v).children('div[class="city"]').children('ul').children('li');
			if(city_lis!=undefined){
				$.each(city_lis,function(ii,vv){
					var selected_city_li = $(vv).hasClass('select_city');
					if(selected_city_li){
						var area_id_city = $(vv).attr('area-id');
						area_used_id[area_id_city] = 1;
						selected_num++;
						$(vv).remove();
					}
				});
			}
		});
		
		if(selected_num > 0){
			var area_used_html = '';
			for (var key in __alldiv){
				if(area_used_id[key] == 1){
					area_used_html += '<li area-id="'+key+'"><div class="area-editor-list-title"><div class="area-editor-list-title-content js-ladder-select"><div class="area-editor-ladder-toggle extend">&nbsp;</div>'+__alldiv[key][0]+'<div class="area-editor-remove-btn js-ladder-remove">×</div></div></div></li>';
				}
			}
			$('.js-area-editor-used .area-editor-depth').html(area_used_html);
			
		}
	});


	$('.js-ladder-remove').live('click',function(){
		var tmp_li = $(this).closest('li');
		var area_id = tmp_li.attr('area-id');
		area_used_id[area_id] = 0;
		tmp_area_selected_id[area_id] = 0;
		var area_notused_html = '';
		for (var key in __alldiv){
			if((key.indexOf('0000') == 2 || key == 500000) && area_used_id[key] != 1){
				area_notused_html += '<li area-id="'+key+'"><div class="area-editor-list-title"><div class="area-editor-list-title-content js-ladder-select"><div class="js-ladder-toggle area-editor-ladder-toggle extend">+</div><span>'+__alldiv[key][0]+'</span></div></div></li>';
			}
		}
		$('.js-area-editor-notused .area-editor-depth').html(area_notused_html);
		tmp_li.remove();
	});
	$('.js-modal-close').live('click',function(){
		$('.area-modal-wrap').remove();
		area_used_id = [];
	});
	$('.js-modal-save').live('click',function(){
		var used_li = $('.js-area-editor-used .area-editor-depth li');
		if(used_li.length == 0){
			alert('请先选择省份！');
			return;
		}
		var used_area = [];
		$.each(used_li,function(i,item){
			used_area[i] = $(item).attr('area-id');
		});
		// 判断是否有已添加过的城市
		/*$.each(used_li,function(aa,bb){
			if(parseInt(area_id/10000)==parseInt($(bb).attr('area-id')/10000)){
				area_used_id[$(bb).attr('area-id')] = 0;
			}
		});*/

		var just_selectes = [];
		$.each($('.freight-template-table tbody tr'),function(ji,item){
			$.each($(item).find('.text-depth'),function(j,jtem){
				var area_id = $(jtem).attr('area-id');
				if(area_id.indexOf('0000') == 2){
					just_selectes[j] = parseInt(area_id/10000);
				}else{
					just_selectes[j] = area_id;
				}
			});
		});



		var selected_area = [];
		selected_area = selected_area.concat(just_selectes);
		var is_exits = false;
		/*$.each(used_area,function(ii,vv){
			var test = vv;
			if($.inArray(test,selected_area)!=-1){
				is_exits = true;
				return false;
			}
			test = parseInt(vv/10000);
			if($.inArray(test,selected_area)!=-1){
				is_exits = true;
				return false;
			}
			
		});*/
		if(is_exits){
	        layer_tips(1,'区域重复选择！');
		}else{
			var html = '<tr><td>';
			var area_html = '';
			$.each(used_area,function(i,item){
				area_html += '、<span area-id="'+item+'" class="text-depth">'+__alldiv[item][0]+'</span>';
			});
			html += area_html.substr(1);
			var first_amount = 0;
			var first_fee = 0.00;
			var additional_amount = 0;
			var additional_fee = 0.00;
			if(now_edit_area){
				first_amount = now_edit_area.find("input[name='first_amount']").val();
				first_fee = now_edit_area.find("input[name='first_fee']").val();
				additional_amount = now_edit_area.find("input[name='additional_amount']").val();
				additional_fee = now_edit_area.find("input[name='additional_fee']").val();
			}
			
			html += '<div class="right"><a href="javascript:;" class="js-edit-cost-item">编辑</a> <a href="javascript:;" class="js-delete-cost-item">删除</a></div></td><td><input type="text" value="' + first_amount + '" class="cost-input js-input-number" name="first_amount" data-default="0" maxlength="5"></td><td><input type="text" value="' + first_fee + '" class="cost-input js-input-currency" name="first_fee" maxlength="8"></td><td><input type="text" value="' + additional_amount + '" class="cost-input js-input-number" name="additional_amount" data-default="0" maxlength="5"></td><td><input type="text" value="' + additional_fee + '" class="cost-input js-input-currency" name="additional_fee" maxlength="7"></td></tr>';
			if(now_edit_area){
				now_edit_area.replaceWith(html);
			}else{
				$('.freight-template-table tbody').append(html);
			}
			$.each($('.freight-template-table .text-depth'),function(i,item){
				var area_id = $(item).attr('area-id');
				area_selected_id[area_id] = 1;
			});
			$('.area-modal-wrap').remove();
			area_used_id = [];
		}
		/*
		$.post('/user.php?c=trade&a=delivery_load',{'page':'get_my_template_area'},function(response){
			if(response.err_code==0){

			}
		},'json');*/


		
	});
	
	$('.js-edit-cost-item').live('click',function(){
		now_edit_area = $(this).closest('tr');
		var area_span = $(this).closest('td').find('span');
		$.each(area_span,function(i,item){
			var area_id = $(item).attr('area-id');
			area_used_id[area_id] = 1;
		});
		show_edit_area_layer();
	});
	var cost_item_obj = null;
	$('.js-delete-cost-item').live('click',function(){
		cost_item_obj = $(this).closest('tr');
		layer.tips('<div class="form-inline" style="padding:10px;"><span class="help-inline item-delete" style="display:inline-block;padding-right:20px;font-size:14px;letter-spacing:1px;">确定删除?</span><button type="button" class="btn btn-primary js-btn-confirm" id="js-btn-confirm"  style="margin-right:5px;">确定</button><button type="reset" class="btn js-btn-cancel">取消</button></div>',$(this),{
			guide: 2,
			style: ['background-color:black; color:#fff', 'black']
		});
		$('body').bind('click',function(e){
			e=e||window.event;
			var src=e.target||e.srcElement;
			if(src.id == 'js-btn-confirm'){
				var area_span = cost_item_obj.find('span');
				$.each(area_span,function(i,item){
					var area_id = $(item).attr('area-id');
					area_selected_id[area_id] = 0;
				});
				cost_item_obj.remove();
			}
			layer.closeTips();
			$('body').unbind('click');
		});
	});
	$('.js-btn-cancel').live('click',function(){
		layer.closeTips();
	});
	
	$('.freight-template-table tbody .js-input-number').live('blur',function(){
		$(this).val($.trim($(this).val()));
		if(!/^\d+$/.test($(this).val())){
			$(this).val('0');
		}
	});
	$('.freight-template-table tbody .js-input-currency').live('blur',function(){
		$(this).val($.trim($(this).val()));
		var float_val = parseFloat($(this).val());
		if(float_val > 9999.99){
			$(this).val('9999.00');
		}else if(!/^\d+(\.\d+)?$/.test($(this).val())){
			$(this).val('0.00');
		}else{
			$(this).val(float_val.toFixed(2));
		}
	});
	
	var delete_dom = null;
	$('.freight-template-list-wrap .js-freight-delete').live('click',function(e){
		delete_dom = $(this);
		layer.tips('<div class="form-inline" style="padding:10px;"><span class="help-inline item-delete" style="display:inline-block;padding-right:20px;font-size:14px;letter-spacing:1px;">确定删除?</span><button type="button" class="btn btn-primary js-btn-delete" id="js-btn-confirm"  style="margin-right:5px;">确定</button><button type="reset" class="btn js-btn-cancel">取消</button></div>',$(this),{
			guide: 3,
			style: ['background-color:black; color:#fff', 'black']
		});
		e.stopPropagation();
		$('body').bind('click',function(e){
			e=e||window.event;
			var src=e.target||e.srcElement;
			if(src.id == 'js-btn-confirm'){
				$.post(delete_url,{tpl_id:delete_dom.attr('tpl-id')},function(result){
					if(result.err_code == 0){
						layer_tips(0,result.err_msg);
						delete_dom.closest('li').remove();
					}else{
						layer.alert(result.err_msg,0);
					}
				});
			}
			layer.closeTips();
			$('body').unbind('click');
		});
	});
	$('.freight-template-list-wrap .js-freight-copy').live('click',function(e){
		e.stopPropagation();
		$.post(copy_url,{tpl_id:$(this).attr('tpl-id')},function(result){
			if(result.err_code == 0){
				layer_tips(0,result.err_msg);
				load_page('.freight-wrap',load_url,{page:'delivery_list',p:$('.js-page-list .active').attr('data-page-num')},'',analysis_area);
			}else{
				layer.alert(result.err_msg,0);
			}
		});
	});
	$('.freight-template-list-wrap .js-freight-edit').live('click',function(e){
		e.stopPropagation();
		load_page('.freight-wrap',load_url,{page:'delivery_edit',tpl_id:$(this).attr('tpl-id')},'',function(){
			area_selected_id = [];
			$.each($('td.text-depth-td'),function(i,item){
				var area_arr = $(item).attr('area-ids').split('&');
				var text_depth = '';
				for(var i in area_arr){
					area_selected_id[area_arr[i]] = 1;
					text_depth += '、<span class="text-depth" area-id="'+area_arr[i]+'">'+__alldiv[area_arr[i]][0]+'</span>';
				}
				$(item).removeAttr('area-ids').removeClass('text-depth-td').prepend(text_depth.substr(1));
			});
		});
	});
	
	$('.js-page-list a').live('click',function(e){
		if(!$(this).hasClass('active')){
			load_page('.freight-wrap',load_url,{page:'delivery_list',p:$(this).attr('data-page-num')},'',analysis_area);
		}
	});
});

function analysis_area(){
	$('#nprogress').html('');
	$.each($('td.text-depth-td'),function(i,item){
		var area_arr = $(item).attr('area-ids').split('&');
		var text_depth = '';
		for(var i in area_arr){
			text_depth += '、<span class="text-depth">'+__alldiv[area_arr[i]][0]+'</span>';
		}
		$(item).removeAttr('area-ids').removeClass('text-depth-td').html(text_depth.substr(1));
	});
	if($('.freight-template-list-wrap li').size() == 1){
		$('.freight-template-list-wrap li h4').click();
	}	
}
function show_edit_area_layer(){
	tmp_area_selected_id = area_selected_id;
	var html = '<div class="area-modal-wrap"><div class="modal-mask"><div class="area-modal"><div class="area-modal-head">选择可配送区域</div><div class="area-modal-content"><div class="area-editor-wrap clearfix"><div class="area-editor-column js-area-editor-notused"><div class="area-editor"><h4 class="area-editor-head">可选省、市</h4><ul class="area-editor-list"><li><ul class="area-editor-list area-editor-depth">';
	for (var key in __alldiv){
		// 单独处理四个直辖市
		if(key==110000||key==120000||key==130000||key==500000){
			if (area_used_id[parseInt(key)+100] == 1) {
				continue;
			}
		}
		if (area_used_id[key] == 1) {
			continue;
		}
		if ((key.indexOf('0000') == 2 || key == 500000)){
			html += '<li area-id="'+key+'"><div class="area-editor-list-title"><div class="area-editor-list-title-content js-ladder-select"><div class="js-ladder-toggle area-editor-ladder-toggle extend">+</div><span>'+__alldiv[key][0]+'</span></div></div></li>';
		}
	}
	html += '</ul></li></ul></div></div><button class="btn btn-default btn-wide area-editor-add-btn js-area-editor-translate">添加</button><div class="area-editor-column area-editor-column-used js-area-editor-used"><div class="area-editor"><h4 class="area-editor-head">已选省、市</h4><ul class="area-editor-list"><li><ul class="area-editor-list area-editor-depth">';
	for (var key in __alldiv){
		if(area_used_id[key] == 1){
			html += '<li area-id="'+key+'"><div class="area-editor-list-title"><div class="area-editor-list-title-content js-ladder-select"><div class="js-ladder-toggle area-editor-ladder-toggle extend">+</div>'+__alldiv[key][0]+'<div class="area-editor-remove-btn js-ladder-remove">×</div></div></div></li>';
		}
	}
	html += '</ul></li></ul></div></div></div></div><div class="area-modal-foot"><button class="btn btn-primary btn-wide js-modal-save">确定</button>&nbsp;&nbsp;<button class="btn btn-default btn-wide js-modal-close">取消</button></div></div></div></div>';
	$('body').append(html);
}
function show_area_layer(){
	var html = '<div class="area-modal-wrap"><div class="modal-mask"><div class="area-modal"><div class="area-modal-head">选择可配送区域</div><div class="area-modal-content"><div class="area-editor-wrap clearfix"><div class="area-editor-column js-area-editor-notused"><div class="area-editor"><h4 class="area-editor-head">可选省、市</h4><ul class="area-editor-list"><li><ul class="area-editor-list area-editor-depth">';
	for (var key in __alldiv){
		if ((key.indexOf('0000') == 2 || key == 500000)){
			html += '<li area-id="'+key+'"><div class="area-editor-list-title"><div class="area-editor-list-title-content"><div class="js-ladder-toggle area-editor-ladder-toggle extend">+</div><span>'+__alldiv[key][0]+'</span></div></div></li>';
		}
	}
	html += '</ul></li></ul></div></div><button class="btn btn-default btn-wide area-editor-add-btn js-area-editor-translate">添加</button><div class="area-editor-column area-editor-column-used js-area-editor-used"><div class="area-editor"><h4 class="area-editor-head">已选省、市</h4><ul class="area-editor-list"><li><ul class="area-editor-list area-editor-depth"></ul></li></ul></div></div></div></div><div class="area-modal-foot"><button class="btn btn-primary btn-wide js-modal-save">确定</button>&nbsp;&nbsp;<button class="btn btn-default btn-wide js-modal-close">取消</button></div></div></div></div>';
	$('body').append(html);
}