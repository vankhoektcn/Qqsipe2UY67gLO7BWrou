if (typeof crazyify == 'undefined')
	var crazyify = {};
if (typeof crazyify.districts == 'undefined')
	crazyify.districts = {};

crazyify.districts.entry = {
	commonControls: [
		{
			'label': 'Thông tin quận/huyện',
			'type': 'divider'
		},
		{
			'label': 'Key',
			'id': 'key',
			'name': 'District[key]',
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
			'label': 'Tỉnh/thành phố',
			'id': 'province_id',
			'name': 'District[province_id]',
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
			'label': 'Thứ tự ưu tiên',
			'id': 'priority',
			'name': 'District[priority]',
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
			'name': 'District[is_publish]',
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
			'name': 'District[created_by]',
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
			'name': 'District[updated_by]',
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
			'label': 'Tên quận/huyện',
			'id': 'name',
			'name': 'DistrictTranslation[locale][name]',
			'type': 'text',
			'required': true,
			'placeholder': 'Tên quận/huyện',
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
		var thisObj = crazyify.districts.entry;
		if ($('#district-form input[name="_method"]').length && $('#district-form input[name="_method"]').val() != 'POST') {
			$.crazyifyAjax({
				url: $('#district-form').attr('action'),
				type: 'GET',
				success: function (data, textStatus, jqXHR) {
					$.each(thisObj.commonControls, function(index, item){
						if(item.id =='province_id')
						{
							$.each(data.provinces, function(indexPro, itemPro){
								item.datas.push({id:itemPro.key,value:itemPro.id,text:itemPro.name});
							});
							return false;
						}
					});
					CControl.init({
						dom:$('.form-body'), 
						commonControls: thisObj.commonControls,
						languageControls: thisObj.languageControls,
						commonData: data.district,
						languageDatas: data.district.translations
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
					});
				}
			});
			// CControl.init({
			// 	dom:$('.form-body'), 
			// 	commonControls: thisObj.commonControls, 
			// 	languageControls: thisObj.languageControls
			// });
		}
	}
};

$(function () {
	crazyify.districts.entry.init();
});