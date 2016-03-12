if (typeof crazyify == 'undefined')
	var crazyify = {};
if (typeof crazyify.common == 'undefined')
	crazyify.common = {};

crazyify.common = {
	init: function () 
	{
		var thisObj = crazyify.common;
		thisObj.pageLoad();
		thisObj.events();
	},
	events: function () {

		// Event
		$(document).on('change', 'select[name="province"]', function(){
			if(this.value && !$.isEmptyObject(this.value))
			{
				crazyify.common.loadDropdow($('select[name="district"]:not(.no-ajax)'), '/extra/districts-by-province/'+this.value, 'GET', '--Chọn Quận/Huyện--', 'id', 'name');
			}
		});		
		$(document).on('change', 'select#province_id', function(){
			if(this.value && !$.isEmptyObject(this.value))
			{
				crazyify.common.loadDropdow($('select#district_id:not(.no-ajax)'), '/extra/districts-by-province/'+this.value, 'GET', '--Chọn Quận/Huyện--', 'id', 'name');
			}
		});
		$(document).on('change', 'select[name="district"]', function(){
			if(this.value && !$.isEmptyObject(this.value))
			{
				crazyify.common.loadDropdow($('select[name="ward"]:not(.no-ajax)'), '/extra/ward-by-district/'+this.value, 'GET', '--Chọn Phường/Xã--', 'id', 'name');
				crazyify.common.loadDropdow($('select[name="street"]:not(.no-ajax)'), '/extra/street-by-district/'+this.value, 'GET', '--Chọn Đường/Phố--', 'id', 'name');
			}
		});

		$(document).on('change', 'select#district_id', function(){
			if(this.value && !$.isEmptyObject(this.value))
			{
				crazyify.common.loadDropdow($('select#ward_id:not(.no-ajax)'), '/extra/ward-by-district/'+this.value, 'GET', '--Chọn Phường/Xã--', 'id', 'name');
				crazyify.common.loadDropdow($('select#street_id:not(.no-ajax)'), '/extra/street-by-district/'+this.value, 'GET', '--Chọn Đường/Phố--', 'id', 'name');
			}
		});

	},
	pageLoad: function(){

		crazyify.common.loadDropdow($('select[name="project_type"]:not(.no-ajax)'), '/extra/project_types', 'GET', '--Chọn loại dự án--', 'id', 'name');
		crazyify.common.loadDropdow($('select[name="province"]:not(.no-ajax)'), '/extra/provinces', 'GET', '--Chọn thành phố--', 'id', 'name');

		/*crazyify.common.loadDropdow($('select#project_type_id:not(.no-ajax)'), '/extra/project_types', 'GET', '--Chọn loại dự án--', 'id', 'name');
		crazyify.common.loadDropdow($('select#province_id:not(.no-ajax)'), '/extra/provinces', 'GET', '--Chọn thành phố--', 'id', 'name');
		*/
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
					$obj.append('<option value="">'+emptyItemName+'</option>');
					$.each(data, function(index, item)
					{
						$obj.append('<option value="'+ item[idKey] +'">'+ item[nameKey] +'</option>');
					});
					if(data != null && data.length >0 && callback != null && typeof callback == 'function')
						callback(data);
				}
			});
		}
	}
};

$(function () {
	crazyify.common.init();
});