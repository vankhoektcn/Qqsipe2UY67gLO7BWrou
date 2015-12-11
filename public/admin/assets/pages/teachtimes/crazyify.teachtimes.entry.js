if (typeof crazyify == 'undefined')
	var crazyify = {};
if (typeof crazyify.teachtimes == 'undefined')
	crazyify.teachtimes = {};

crazyify.teachtimes.entry = {
	commonControls: [
		{
			'label': 'Thông tin lịch học',
			'type': 'divider'
		},
		{
			'label': 'Thời gian',
			'id': 'key',
			'name': 'TeachTime[key]',
			'type': 'text',
			'placeholder': '',
			'cssclass': '',
			'value': '',
			'disabled': false,
			'readonly': false,
			'datas': [],
			'help_block': '',
			'input_icon': '',
			'dbfieldname': 'key'
		},
		{
			'label': 'Buổi',
			'id': 'type',
			'name': 'TeachTime[type]',
			'type': 'select',
			'required': true,
			'placeholder': '',
			'cssclass': '',
			'value': '',
			'disabled': false,
			'readonly': false,
			'datas': [
				{ id:'S',value:'S',text:'Sáng'},
				{ id:'C',value:'C',text:'Chiều'},
				{ id:'T',value:'T',text:'Tối'},
			],
			'help_block': '',
			'input_icon': '',
			'dbfieldname': 'type'
		},
		{
			'label': 'Thứ tự ưu tiên',
			'id': 'priority',
			'name': 'TeachTime[priority]',
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
			'name': 'TeachTime[is_publish]',
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
			'name': 'TeachTime[created_by]',
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
			'name': 'TeachTime[updated_by]',
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
	init: function () {
		var thisObj = crazyify.teachtimes.entry;
		if ($('#teachtime-form input[name="_method"]').length && $('#teachtime-form input[name="_method"]').val() != 'POST') {
			$.crazyifyAjax({
				url: $('#teachtime-form').attr('action'),
				type: 'GET',
				success: function (data, textStatus, jqXHR) {
					CControl.init({
						dom:$('.form-body'), 
						commonControls: thisObj.commonControls,
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
	crazyify.teachtimes.entry.init();
});