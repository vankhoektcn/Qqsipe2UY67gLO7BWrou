if (typeof crazyify == 'undefined')
	var crazyify = {};
if (typeof crazyify.products == 'undefined')
	crazyify.products = {};

crazyify.products.entry = {
	commonControls: [
		{
			'label': 'Thông tin chung',
			'type': 'divider'
		},
		{
			'label': 'Key',
			'id': 'key',
			'name': 'Product[key]',
			'type': 'text',//'static',
			'placeholder': '',
			'cssclass': '',
			'value': '',
			'disabled': false,
			'readonly': false,
			'datas': [],
			'help_block': '',
			'input_icon': '',
			'dbfieldname': 'key'
		},{
			'label': 'Tên bài viết',
			'id': 'title',
			'name': 'Product[title]',
			'type': 'text',
			'required': true,
			'placeholder': 'Tên bài viết',
			'cssclass': '',
			'value': '',
			'disabled': false,
			'readonly': false,
			'datas': [],
			'help_block': '',
			'input_icon': '',
			'dbfieldname': 'title'
		},
		{
			'label': 'Loại',
			'id': 'product_type_id',
			'name': 'Product[product_type_id]',
			'type': 'select',
			'required': true,
			'placeholder': '',
			'cssclass': '',
			'value': '',
			'disabled': false,
			'readonly': false,
			'datas': [],
			'help_block': '',
			'input_icon': '',
			'dbfieldname': 'product_type_id'
		},
		{
			'label': 'Tỉnh/thành phố',
			'id': 'province_id',
			'name': 'Product[province_id]',
			'type': 'select',
			'required': true,
			'placeholder': '',
			'cssclass': '',
			'value': '',
			'disabled': false,
			'readonly': false,
			'datas': [],
			'help_block': '',
			'input_icon': '',
			'dbfieldname': 'province_id'
		},
		{
			'label': 'Quận/huyện',
			'id': 'district_id',
			'name': 'Product[district_id]',
			'type': 'select',
			'required': true,
			'placeholder': '',
			'cssclass': '',
			'value': '',
			'disabled': false,
			'readonly': false,
			'datas': [],
			'help_block': '',
			'input_icon': '',
			'dbfieldname': 'district_id'
		},
		{
			'label': 'Phường/Xã',
			'id': 'ward_id',
			'name': 'Product[ward_id]',
			'type': 'select',
			'required': false,
			'placeholder': '',
			'cssclass': '',
			'value': '',
			'disabled': false,
			'readonly': false,
			'datas': [],
			'help_block': '',
			'input_icon': '',
			'dbfieldname': 'ward_id'
		},
		{
			'label': 'Đường/Phố',
			'id': 'street_id',
			'name': 'Product[street_id]',
			'type': 'select',
			'required': false,
			'placeholder': '',
			'cssclass': '',
			'value': '',
			'disabled': false,
			'readonly': false,
			'datas': [],
			'help_block': '',
			'input_icon': '',
			'dbfieldname': 'street_id'
		},
		{
			'label': 'Dự án',
			'id': 'project_id',
			'name': 'Product[project_id]',
			'type': 'select',
			'required': false,
			'placeholder': '',
			'cssclass': '',
			'value': '',
			'disabled': false,
			'readonly': false,
			'datas': [],
			'help_block': '',
			'input_icon': '',
			'dbfieldname': 'project_id'
		},
		{
			'label': 'Địa chỉ',
			'id': 'address',
			'name': 'Product[address]',
			'type': 'textarea',
			'required': false,
			'placeholder': '',
			'cssclass': '',
			'value': '',
			'disabled': false,
			'readonly': false,
			'datas': [],
			'help_block': '',
			'input_icon': '',
			'dbfieldname': 'address'
		},
		{
			'label': 'Diện tích (m²)',
			'id': 'area',
			'name': 'Product[area]',
			'type': 'text',
			'required': false,
			'placeholder': '',
			'cssclass': '',
			'value': '0',
			'disabled': false,
			'readonly': false,
			'datas': [],
			'help_block': '',
			'input_icon': '',
			'dbfieldname': 'area'
		},
		{
			'label': 'Loại diện tích',
			'id': 'area_range_id',
			'name': 'Product[area_range_id]',
			'type': 'select',
			'required': false,
			'placeholder': '',
			'cssclass': '',
			'value': '',
			'disabled': false,
			'readonly': false,
			'datas': [],
			'help_block': '',
			'input_icon': '',
			'dbfieldname': 'area_range_id'
		},
		{
			'label': 'Giá',
			'id': 'price',
			'name': 'Product[price]',
			'type': 'text',
			'required': false,
			'placeholder': '',
			'cssclass': '',
			'value': '0',
			'disabled': false,
			'readonly': false,
			'datas': [],
			'help_block': '',
			'input_icon': '',
			'dbfieldname': 'price'
		},
		{
			'label': 'Đơn vị giá',
			'id': 'price_type_id',
			'name': 'Product[price_type_id]',
			'type': 'select',
			'required': false,
			'placeholder': '',
			'cssclass': '',
			'value': '',
			'disabled': false,
			'readonly': false,
			'datas': [],
			'help_block': '',
			'input_icon': '',
			'dbfieldname': 'price_type_id'
		},
		{
			'label': 'Loại mức giá',
			'id': 'price_range_id',
			'name': 'Product[price_range_id]',
			'type': 'select',
			'required': false,
			'placeholder': '',
			'cssclass': '',
			'value': '',
			'disabled': false,
			'readonly': false,
			'datas': [],
			'help_block': '',
			'input_icon': '',
			'dbfieldname': 'price_range_id'
		},
		{
			'label': 'Hướng căn hộ',
			'id': 'incense_type_id',
			'name': 'Product[incense_type_id]',
			'type': 'select',
			'required': false,
			'placeholder': '',
			'cssclass': '',
			'value': '',
			'disabled': false,
			'readonly': false,
			'datas': [],
			'help_block': '',
			'input_icon': '',
			'dbfieldname': 'incense_type_id'
		},
		{
			'label': 'Số phòng ngủ',
			'id': 'rooms',
			'name': 'Product[rooms]',
			'type': 'number',
			'required': false,
			'placeholder': '',
			'cssclass': '',
			'value': '0',
			'disabled': false,
			'readonly': false,
			'datas': [],
			'help_block': '',
			'input_icon': '',
			'dbfieldname': 'rooms'
		},
		{
			'label': 'Số toilet',
			'id': 'toilets',
			'name': 'Product[toilets]',
			'type': 'number',
			'required': false,
			'placeholder': '',
			'cssclass': '',
			'value': '0',
			'disabled': false,
			'readonly': false,
			'datas': [],
			'help_block': '',
			'input_icon': '',
			'dbfieldname': 'toilets'
		},
		{
			'label': 'Ngày hết hạn',
			'id': 'expire_at',
			'name': 'Product[expire_at]',
			'type': 'text',
			'required': false,
			'placeholder': '',
			'cssclass': 'datepicker',
			'value': '31/12/2020',
			'disabled': false,
			'readonly': false,
			'datas': [],
			'help_block': '',
			'input_icon': '',
			'dbfieldname': 'expire_at'
		},
		{
			'label': 'Tóm tắt',
			'id': 'summary',
			'name': 'Product[summary]',
			'type': 'textarea',
			'required': false,
			'placeholder': '',
			'cssclass': '',
			'value': '',
			'disabled': false,
			'readonly': false,
			'datas': [],
			'help_block': '',
			'input_icon': '',
			'dbfieldname': 'summary'
		},
		{
			'label': 'Nội dung',
			'id': 'description',
			'name': 'Product[description]',
			'type': 'editor',
			'required': false,
			'placeholder': '',
			'cssclass': '',
			'value': '',
			'disabled': false,
			'readonly': false,
			'datas': [],
			'help_block': '',
			'input_icon': '',
			'dbfieldname': 'description'
		},
		{
			'label': 'Hình ảnh',
			'id': 'attachments',
			'name': 'Product[attachments]',
			'type': 'inputimages',
			'required': false,
			'placeholder': '',
			'cssclass': '',
			'value': '',
			'disabled': false,
			'readonly': false,
			'datas': [],
			'help_block': '',
			'input_icon': '',
			'dbfieldname': 'attachments',
			'selected': true
		},
		{
			'label': 'Tên liên hệ',
			'id': 'br_name',
			'name': 'Product[br_name]',
			'type': 'text',
			'required': true,
			'placeholder': '',
			'cssclass': '',
			'value': 'Bùi Thị Vân',
			'disabled': false,
			'readonly': false,
			'datas': [],
			'help_block': '',
			'input_icon': '',
			'dbfieldname': 'br_name'
		},
		{
			'label': 'Địa chỉ',
			'id': 'br_address',
			'name': 'Product[br_address]',
			'type': 'text',
			'required': false,
			'placeholder': '',
			'cssclass': '',
			'value': 'Quận 2',
			'disabled': false,
			'readonly': false,
			'datas': [],
			'help_block': '',
			'input_icon': '',
			'dbfieldname': 'br_address'
		},
		{
			'label': 'Di động',
			'id': 'br_phone',
			'name': 'Product[br_phone]',
			'type': 'text',
			'required': true,
			'placeholder': '',
			'cssclass': '',
			'value': '0932093221',
			'disabled': false,
			'readonly': false,
			'datas': [],
			'help_block': '',
			'input_icon': '',
			'dbfieldname': 'br_phone'
		},
		{
			'label': 'Email',
			'id': 'br_email',
			'name': 'Product[br_email]',
			'type': 'email',
			'required': true,
			'placeholder': '',
			'cssclass': '',
			'value': 'vanland09a@gmail.common',
			'disabled': false,
			'readonly': false,
			'datas': [],
			'help_block': '',
			'input_icon': '',
			'dbfieldname': 'br_email'
		},
		{
			'label': 'Thứ tự ưu tiên',
			'id': 'priority',
			'name': 'Product[priority]',
			'type': 'number',
			'required': false,
			'placeholder': '',
			'cssclass': '',
			'value': '0',
			'disabled': false,
			'readonly': false,
			'datas': [],
			'help_block': '',
			'input_icon': '',
			'dbfieldname': 'priority'
		},
		{
			'label': 'Xuất bản',
			'id': 'active',
			'name': 'Product[active]',
			'type': 'checkbox',
			'required': false,
			'placeholder': '',
			'cssclass': 'checkbox-inline',
			'value': '1',
			'disabled': false,
			'readonly': false,
			'datas': [],
			'help_block': '',
			'input_icon': '',
			'dbfieldname': 'active',
			'selected': true
		},
		{
			'label': 'Meta Description',
			'id': 'meta_description',
			'name': 'Product[meta_description]',
			'type': 'textarea',
			'required': false,
			'placeholder': '',
			'cssclass': '',
			'value': '',
			'disabled': false,
			'readonly': false,
			'datas': [],
			'help_block': '',
			'input_icon': '',
			'dbfieldname': 'meta_description'
		},
		{
			'label': 'Meta Keywords',
			'id': 'meta_keywords',
			'name': 'Product[meta_keywords]',
			'type': 'textarea',
			'required': false,
			'placeholder': '',
			'cssclass': '',
			'value': '',
			'disabled': false,
			'readonly': false,
			'datas': [],
			'help_block': '',
			'input_icon': '',
			'dbfieldname': 'meta_keywords'
		},
		{
			'label': 'Tạo bởi',
			'id': 'created_by',
			'name': 'Product[created_by]',
			'type': 'static',
			'placeholder': 'Tạo bởi',
			'cssclass': '',
			'value': '',
			'disabled': true,
			'readonly': true,
			'datas': [],
			'help_block': '',
			'input_icon': '',
			'dbfieldname': 'created_by'
		},
		{
			'label': 'Cập nhật bởi',
			'id': 'updated_by',
			'name': 'Product[updated_by]',
			'type': 'static',
			'placeholder': 'Cập nhật bởi',
			'cssclass': '',
			'value': '',
			'disabled': true,
			'readonly': true,
			'datas': [],
			'help_block': '',
			'input_icon': '',
			'dbfieldname': 'updated_by'
		}
	],
	languageControls: [
		
	],
	mainData: {},
	init: function () {
		var thisObj = crazyify.products.entry;
		if ($('#product-form input[name="_method"]').length && $('#product-form input[name="_method"]').val() != 'POST') {
						
					$.crazyifyAjax({
						url: $('#product-form').attr('action'),
						type: 'GET',
						success: function (data, textStatus, jqXHR) {
							crazyify.products.entry.mainData = data;
							CControl.init({
								dom:$('.form-body'), 
								commonControls: thisObj.commonControls, 
								languageControls: thisObj.languageControls,
								commonData: data,
								languageDatas: data.translations
							}, crazyify.products.entry.pageLoad);
						}
					});

		}
		else{
			CControl.init({
				dom:$('.form-body'), 
				commonControls: thisObj.commonControls,
				languageControls: thisObj.languageControls
			}, crazyify.products.entry.pageLoad);

		}

	},
	pageLoad: function(){
		$("input.datepicker").datepicker({
			dateFormat: "dd/mm/yy"
		});
		$this = crazyify.products.entry;
		mainData = $this.mainData;
		//crazyify.products.entry.loadProduct_type();
		crazyify.common.loadDropdow($('select#product_type_id:not(.no-ajax)'), '/extra/product_types', 'GET', '--Chọn loại tin đăng--', 'id', 'name',
				function(data){
					if(mainData.product_type_id) $('select#product_type_id').val(mainData.product_type_id);
				}
			);
		crazyify.common.loadDropdow($('select#province_id:not(.no-ajax)'), '/extra/provinces', 'GET', '--Chọn thành phố--', 'id', 'name',
			function(data){
				if(mainData.province_id) 
				{
					$('select#province_id').val(mainData.province_id);
					crazyify.common.loadDropdow($('select#district_id:not(.no-ajax)'), '/extra/districts-by-province/'+mainData.province_id, 'GET', '--Chọn Quận/Huyện--', 'id', 'name',
						function(data){
							if(mainData.district_id) 
							{
								$('select#district_id').val(mainData.district_id);
								crazyify.common.loadDropdow($('select#ward_id:not(.no-ajax)'), '/extra/ward-by-district/'+mainData.district_id, 'GET', '--Chọn Phường/Xã--', 'id', 'name',
									function(data){
										if(mainData.ward_id) $('select#ward_id').val(mainData.ward_id);
									}
								);
								crazyify.common.loadDropdow($('select#street_id:not(.no-ajax)'), '/extra/street-by-district/'+mainData.district_id, 'GET', '--Chọn Đường/Phố--', 'id', 'name',
									function(data){
										if(mainData.street_id) $('select#street_id').val(mainData.street_id);
									}
								);
								crazyify.common.filterProject(null, function(){
									if(mainData.project_id) 
										$('select#project_id').val(mainData.project_id);
								});
							}		
						}
					);
				}
			}
		);
		
		crazyify.common.loadDropdow($('select#area_range_id:not(.no-ajax)'), '/extra/area_ranges', 'GET', '--Chọn mức diện tích--', 'id', 'name',
				function(data){
					if(mainData.area_range_id) $('select#area_range_id').val(mainData.area_range_id);
				}
			);
		crazyify.common.loadDropdow($('select#price_range_id:not(.no-ajax)'), '/extra/price_ranges', 'GET', '--Chọn mức giá--', 'id', 'name',
				function(data){
					if(mainData.price_range_id) $('select#price_range_id').val(mainData.price_range_id);
				}
			);
		crazyify.common.loadDropdow($('select#price_type_id:not(.no-ajax)'), '/extra/price_types', 'GET', '--Chọn loại giá--', 'id', 'name',
				function(data){
					if(mainData.price_type_id) $('select#price_type_id').val(mainData.price_type_id);
				}
			);
		crazyify.common.loadDropdow($('select#incense_type_id:not(.no-ajax)'), '/extra/incense_types', 'GET', '--Chọn hướng--', 'id', 'name',
				function(data){
					if(mainData.incense_type_id) $('select#incense_type_id').val(mainData.incense_type_id);
				}
			);
	},
	loadProduct_type: function()
	{
		$.crazyifyAjax({
					url: '/admin/product_types',
					type: 'GET',
					success: function (data, textStatus, jqXHR) {
						$('#product_type_id').html('');
						$('#product_type_id').append('<option value="0">Chọn loại tin</option>');
						$.each(data, function(index, item)
						{
							$('#product_type_id').append('<option value="'+ item.id +'">'+ item.name +'</option>');
						});
					}
				});
	}
};

$(function () {
	crazyify.products.entry.init();
});