if (typeof crazyify == 'undefined')
	var crazyify = {};
if (typeof crazyify.agents == 'undefined')
	crazyify.agents = {};

crazyify.agents.entry = {
	commonControls: [
		{
			'label': 'Thông tin môi giới',
			'type': 'divider'
		},
		{
			'label': 'Tên môi giới',
			'id': 'name',
			'name': 'Agent[name]',
			'type': 'text',
			'required': true,
			'placeholder': 'Tên môi giới',
			'cssclass': '',
			'value': '',
			'disabled': false,
			'readonly': false,
			'datas': [],
			'help_block': '',
			'input_icon': '',
			'dbfieldname': 'name'
		},
		{
			'label': 'Số điện thoại',
			'id': 'mobile',
			'name': 'Agent[mobile]',
			'type': 'text',
			'required': true,
			'placeholder': 'Số điện thoại',
			'cssclass': '',
			'value': '',
			'disabled': false,
			'readonly': false,
			'datas': [],
			'help_block': '',
			'input_icon': '',
			'dbfieldname': 'mobile'
		},
		{
			'label': 'Email',
			'id': 'email',
			'name': 'Agent[email]',
			'type': 'email',
			'required': true,
			'placeholder': 'email',
			'cssclass': '',
			'value': '',
			'disabled': false,
			'readonly': false,
			'datas': [],
			'help_block': '',
			'input_icon': '',
			'dbfieldname': 'email'
		},
		{
			'label': 'Hình ảnh',
			'id': 'attachments',
			'name': 'Agent[attachments]',
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
			'name': 'Agent[priority]',
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
			'name': 'Agent[active]',
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
			'label': 'Tạo bởi',
			'id': 'created_by',
			'name': 'Agent[created_by]',
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
			'name': 'Agent[updated_by]',
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
	languageControls: [],
	init: function () {
		var thisObj = crazyify.agents.entry;
		if ($('#agent-form input[name="_method"]').length && $('#agent-form input[name="_method"]').val() != 'POST') {
			$.crazyifyAjax({
				url: $('#agent-form').attr('action'),
				type: 'GET',
				success: function (data, textStatus, jqXHR) {
					console.log(data);
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
	crazyify.agents.entry.init();
});