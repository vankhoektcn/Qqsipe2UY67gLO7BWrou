if (typeof crazyify == 'undefined')
	var crazyify = {};
if (typeof crazyify.provinces == 'undefined')
	crazyify.provinces = {};

crazyify.provinces.entry = {
	commonControls: [
		{
			'label': 'Thông tin tỉnh/thành phố',
			'type': 'divider'
		},
		{
			'label': 'Key',
			'id': 'key',
			'name': 'Province[key]',
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
		},
		{
			'label': 'Thứ tự ưu tiên',
			'id': 'priority',
			'name': 'Province[priority]',
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
			'id': 'is_publish',
			'name': 'Province[is_publish]',
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
			'dbfieldname': 'is_publish',
			'selected': true
		},
		{
			'label': 'Tạo bởi',
			'id': 'created_by',
			'name': 'Province[created_by]',
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
			'name': 'Province[updated_by]',
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
		{
			'label': 'Tên tỉnh/thành phố',
			'id': 'name',
			'name': 'ProvinceTranslation[locale][name]',
			'type': 'text',
			'required': true,
			'placeholder': 'Tên tỉnh/thành phố',
			'cssclass': '',
			'value': '',
			'disabled': false,
			'readonly': false,
			'datas': [],
			'help_block': '',
			'input_icon': '',
			'dbfieldname': 'name'
		}
	],
	init: function () {
		var thisObj = crazyify.provinces.entry;
		if ($('#province-form input[name="_method"]').length && $('#province-form input[name="_method"]').val() != 'POST') {
			$.crazyifyAjax({
				url: $('#province-form').attr('action'),
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
			CControl.init({
				dom:$('.form-body'), 
				commonControls: thisObj.commonControls, 
				languageControls: thisObj.languageControls
			});
		}
	}
};

$(function () {
	crazyify.provinces.entry.init();
});