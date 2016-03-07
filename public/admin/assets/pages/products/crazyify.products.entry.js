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
			'type': 'static',
			'placeholder': '',
			'cssclass': '',
			'value': '',
			'disabled': true,
			'readonly': true,
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
			'label': 'Diện tích',
			'id': 'area',
			'name': 'Product[area]',
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
			'dbfieldname': 'area'
		},
		{
			'label': 'Giá',
			'id': 'price',
			'name': 'Product[price]',
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
			'dbfieldname': 'price'
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
	init: function () {
		var thisObj = crazyify.products.entry;
		if ($('#product-form input[name="_method"]').length && $('#product-form input[name="_method"]').val() != 'POST') {
			$.crazyifyAjax({
				url: $('#product-form').attr('action'),
				type: 'GET',
				success: function (data, textStatus, jqXHR) {
					CControl.init({
						dom:$('.form-body'), 
						commonControls: thisObj.commonControls, 
						languageControls: thisObj.languageControls,
						commonData: data,
						languageDatas: data.translations
					});
				}
			});
		}
		else{
			$.crazyifyAjax({
				url: '/admin/provinces',
				type: 'GET',
				success: function (data, textStatus, jqXHR) {
					$.each(thisObj.commonControls, function(index, item){
						if(item.id =='province_id')
						{
							$.each(data, function(indexPro, itemPro){
								item.datas.push({id:itemPro.key,value:itemPro.id,text:itemPro.name});
							});
							return false;
						}
					});
					CControl.init({
						dom:$('.form-body'), 
						commonControls: thisObj.commonControls,
						languageControls: thisObj.languageControls
					}, crazyify.products.entry.pageLoad);
				}
			});
		}

		// Event
		$(document).on('change', '#province_id', function(){
			if(this.value && !$.isEmptyObject(this.value))
			{
				$.crazyifyAjax({
					url: '/admin/districts-by-province/'+this.value,
					type: 'GET',
					success: function (data, textStatus, jqXHR) {
						$('#district_id').html('');
						$('#district_id').append('<option value="0">Chọn quận/huyện</option>');
						$.each(data, function(indexPro, itemPro)
						{
							$('#district_id').append('<option value="'+ itemPro.id +'">'+ itemPro.name +'</option>');
						});
					}
				});
			}
		});
	},
	pageLoad: function(){
		crazyify.products.entry.loadProduct_type();
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