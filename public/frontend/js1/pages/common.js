if (typeof crazyify == 'undefined')
	var crazyify = {};
if (typeof crazyify.common == 'undefined')
	crazyify.common = {};

crazyify.common = {
	_parentForm : null,
	_productPrefix : '/can-ho',
	_projectPrefix : '/du-an',

	init: function () 
	{
		var thisObj = crazyify.common;
		thisObj.pageLoad();
		thisObj.events();
	},
	events: function () {

		// Event
		$(document).on('change', 'select#project_type_id, select[name="project_type_id"]', function(){
			crazyify.common.filterProject('PROJECT');
		});	
		
		$(document).on('change', 'select#province_id', function(){
			$districtObj = $('select#district_id');
			if(this.value && !$.isEmptyObject(this.value))
			{
				crazyify.common.loadDropdow($districtObj, '/extra/districts-by-province/'+this.value, 'GET', '--Chọn Quận/Huyện--', 'id', 'name',
					function(data){
						$('select#ward_id').html('<option value="">--Chọn Phường/Xã--</option>');
						$('select#street_id').html('<option value="">--Chọn Đường/Phố--</option>');
					}
				);
			}
			else{
				$districtObj.html('<option value="">--Chọn Quận/Huyện--</option>');
				$('select#ward_id').html('<option value="">--Chọn Phường/Xã--</option>');
				$('select#street_id').html('<option value="">--Chọn Đường/Phố--</option>');
			}
			crazyify.common.filterProject($(this).attr('type'));
		});	
		$(document).on('change', 'select#district_id', function(){
			if(this.value && !$.isEmptyObject(this.value))
			{
				crazyify.common.loadDropdow($('select#ward_id'), '/extra/ward-by-district/'+this.value, 'GET', '--Chọn Phường/Xã--', 'id', 'name');
				crazyify.common.loadDropdow($('select#street_id'), '/extra/street-by-district/'+this.value, 'GET', '--Chọn Đường/Phố--', 'id', 'name');
			}
			crazyify.common.filterProject($(this).attr('type'));
		});

		$('.number').keyup(function(e){
			if(/\D/g.test(this.value)) {this.value=this.value.replace(/\D/g,'');}
		});
	},
	pageLoad: function(){
		$('img.lazy').lazy();
		
		var thisObj=crazyify.common;
		thisObj.setSelectCookie('pdt', $('select[name="product_type"]'));
		thisObj.setSelectCookie('pjt', $('select[name="project_type"]'));
		thisObj.setSelectCookie('pro', $('select[name="province"]'));

		crazyify.common.loadDropdow($('select#product_type_id:not(.no-ajax)'), '/extra/product_types', 'GET', null, 'id', 'name');
		crazyify.common.loadDropdow($('select#project_type_id:not(.no-ajax)'), '/extra/project_types', 'GET', null, 'id', 'name');
		crazyify.common.loadDropdow($('select#province_id:not(.no-ajax)'), '/extra/provinces', 'GET', '--Chọn thành phố--', 'id', 'name');

		crazyify.common.loadDropdow($('select#price_type_id:not(.no-ajax)'), '/extra/price_types', 'GET', '--Chọn đơn vị giá--', 'id', 'name');
		crazyify.common.loadDropdow($('select#utility_id:not(.no-ajax)'), '/extra/utilities', 'GET', '--Chọn tiện ích--', 'id', 'name');
		crazyify.common.loadDropdow($('select#price_range_id:not(.no-ajax)'), '/extra/price_ranges', 'GET', '--Chọn mức giá--', 'id', 'name');
		crazyify.common.loadDropdow($('select#incense_type_id:not(.no-ajax)'), '/extra/incense_types', 'GET', '--Chọn hướng--', 'id', 'name');
		crazyify.common.loadDropdow($('select#area_range_id:not(.no-ajax)'), '/extra/area_ranges', 'GET', '--Chọn diện tích--', 'id', 'name');

		$('select[multiple="multiple"].no-ajax').multiselect();
	},
	setSelectCookie:function(cookieName, objSelect){
		var objCookie = $.GetCookie(cookieName);
		if(!$.isEmptyObject(objCookie))
		{
			objCookie = JSON.parse(objCookie);
			$(objSelect).val(objCookie.id);
			$(objSelect).trigger('change');
		}
	},

	loadDropdow: function(obj, url, method, emptyItemName, idKey, nameKey, callback){
		var $obj = $(obj)
		if($obj != null && $obj.length >0)
		{
			$.crazyifyAjax({
				url: url,
				type: method,
				success: function (data, textStatus, jqXHR) {
					$obj.html('');
					if(emptyItemName != null && $obj.attr('multiple') == null)
						$obj.append('<option value="">'+emptyItemName+'</option>');
					$.each(data, function(index, item)
					{
						var keyAttr = item.key != null ? ' key="'+item.key+'"' : '';
						$obj.append('<option value="'+ item[idKey] +'" '+ keyAttr+'>'+ item[nameKey] +'</option>');
					});
					if($obj.attr('multiple') == 'multiple')
						$obj.multiselect();
					if(callback != null && typeof callback == 'function')
						callback(data);
				}
			});
		}
	},

	filterProject: function(type, callback){
		$obj = $('select#project_id');
		if($obj != null && $obj.length > 0)
		{
			var filterData = {};
			if(type == 'PROJECT')
			{
				if($('select#project_type_id').length >0 && $('select#project_type_id').val() != '')
					filterData.project_type_id = $('select#project_type_id').val();	
			}
			if(type != null)
			{				
				if($('select#province_id[type="'+type+'"]').length >0 && $('select#province_id[type="'+type+'"]').val() != '')
					filterData.province_id = $('select#province_id[type="'+type+'"]').val();		
				if($('select#district_id[type="'+type+'"]').length >0 && $('select#district_id[type="'+type+'"]').val() != '')
					filterData.district_id = $('select#district_id[type="'+type+'"]').val();		
				if($('select#ward_id[type="'+type+'"]').length >0 && $('select#ward_id[type="'+type+'"]').val() != '')
					filterData.ward_id = $('select#ward_id[type="'+type+'"]').val();		
				if($('select#street_id[type="'+type+'"]').length >0 && $('select#street_id[type="'+type+'"]').val() != '')
					filterData.street_id = $('select#street_id[type="'+type+'"]').val();
			}
			else{
				if($('select#province_id').length >0 && $('select#province_id').val() != '')
					filterData.province_id = $('select#province_id').val();		
				if($('select#district_id').length >0 && $('select#district_id').val() != '')
					filterData.district_id = $('select#district_id').val();		
				if($('select#ward_id').length >0 && $('select#ward_id').val() != '')
					filterData.ward_id = $('select#ward_id').val();		
				if($('select#street_id').length >0 && $('select#street_id').val() != '')
					filterData.street_id = $('select#street_id').val();
			}

			$.crazyifyAjax({
				url: '/extra/filter-project',
				data: filterData,
				type: 'GET',
				success: function (data, textStatus, jqXHR) {
					$obj.html('');
					$obj.append('<option value="">--Chọn dự án--</option>');
					$.each(data, function(index, item)
					{
						$obj.append('<option value="'+ item.id +'" key="'+item.key+'" >'+ item.name +'</option>');
					});
					if(data != null && data.length >0 && callback != null && typeof callback == 'function')
						callback(data);
				}
			});
		}
	},

	getSearchString:function($formParent){
		var query="";
		var thisObj=crazyify.common;
		var _parent=$formParent;
		$('input[type="text"]:not(.no-request, .date-input), input[type="hidden"]',_parent).each(function(item,index) {
			if(!$.isEmptyObject($(this).val())) {
				var value=$(this).val();
				var name=$(this).attr("name");
				query+="&"+$(this).attr("name")+":"+$.trim(value)
			}
		});
		$('select[multiple="multiple"]:not(.no-request)',_parent).each(function(item,index) {
			if(!$.isEmptyObject($(this).val()) && $(this).attr("name") != null) {
				query+="&"+$(this).attr("name")+"="+$(this).val().join(",")
			}
		});
		$('select:not([multiple="multiple"],.no-request)',_parent).each(function(item,index){			
			if(!$.isEmptyObject($(this).val()) && $(this).attr("name") != null) {
				var value = $('option:selected',$(this)).attr('key') != null ? $('option:selected',$(this)).attr('key') : $(this).val();
				query+="&"+$(this).attr("name")+"="+$(this).val()
			}
		});

		$('input.date-input[type="text"]:not(.no-request)',_parent).each(function(item,index) {
			if(!$.isEmptyObject($(this).val())) {
				var arr=$.trim($(this).val()).split("/");
				if(arr.length==3) {
					var value=arr[2]+"/"+arr[1]+"/"+arr[0];query+="&"+$(this).attr("name")+"="+value}
			}
		});
		$('input[type="checkbox"]:not(.no-request)',_parent).each(function(item,index) {
			if($(this).attr("name") != null && $(this).is(":checked")) {
				query+="&"+$(this).attr("name")+"=1"
			}
		});
		console.log(query);
		if(query && query.length>0)
			query=query.substring(1);//escape(query.substring(1));
		//console.log(query);
		return query
	}

};

$(function () {
	crazyify.common.init();
});

jQuery.fn.extend({
    selectedKey: function() {
        return $('option:selected',$(this)).attr('key');
    }, // put comma here if you want to add more functions

    selectedText: function() {
        return $('option:selected',$(this)).text();
    } // put comma here if you want to add more functions
});

var isValidControl=function($obj,type){
	var value=true;
	switch(type){
		case"null":
		if($obj&&(!$obj.val()||$obj.val().trim()==''))
			{value=false;}
		break;
	}
	var $group=$obj.parents(".form-group");
	if(!value)
		{
			$group.addClass("has-error");
			$('.error-label',$group).slideDown();
		}
	else{
		$group.removeClass("has-error");$('.error-label',$group).slideUp();
	}
	return value;
};
var removeError=function($parent){
	if($parent){
		$(".has-error",$parent).each(function(){
			$(this).removeClass("has-error")
			;$('.error-label',$(this)).slideUp();});
	}
	else{
		$(".has-error").each(function(){
			$(this).removeClass("has-error");
			$('.error-label',$(this)).slideUp();
		});
	}
};
