if (typeof crazyify == 'undefined')
	var crazyify = {};
if (typeof crazyify.contacts == 'undefined')
	crazyify.contacts = {};

crazyify.contacts.entry = {
	commonControls: [
		{
			'label': 'Thông tin chung',
			'type': 'divider'
		},
		{
			'label': 'Họ tên',
			'id': 'full_name',
			'name': 'Contact[full_name]',
			'type': 'static',
			'placeholder': '',
			'cssclass': '',
			'value': '',
			'disabled': true,
			'readonly': true,
			'datas': [],
			'help_block': '',
			'input_icon': '',
			'dbfieldname': 'full_name'
		},
		{
			'label': 'Email',
			'id': 'email',
			'name': 'Contact[email]',
			'type': 'static',
			'placeholder': '',
			'cssclass': '',
			'value': '',
			'disabled': true,
			'readonly': true,
			'datas': [],
			'help_block': '',
			'input_icon': '',
			'dbfieldname': 'email'
		},
		{
			'label': 'Số điện thoại',
			'id': 'phone',
			'name': 'Contact[phone]',
			'type': 'static',
			'placeholder': '',
			'cssclass': '',
			'value': '',
			'disabled': true,
			'readonly': true,
			'datas': [],
			'help_block': '',
			'input_icon': '',
			'dbfieldname': 'phone'
		},
		{
			'label': 'Chủ đề',
			'id': 'subject',
			'name': 'Contact[subject]',
			'type': 'static',
			'placeholder': '',
			'cssclass': '',
			'value': '',
			'disabled': true,
			'readonly': true,
			'datas': [],
			'help_block': '',
			'input_icon': '',
			'dbfieldname': 'subject'
		},
		{
			'label': 'Nội dung',
			'id': 'content',
			'name': 'Contact[content]',
			'type': 'static',
			'placeholder': '',
			'cssclass': '',
			'value': '',
			'disabled': true,
			'readonly': true,
			'datas': [],
			'help_block': '',
			'input_icon': '',
			'dbfieldname': 'content'
		},
		{
			'label': 'Ngày liên hệ',
			'id': 'created_at',
			'name': 'Contact[created_at]',
			'type': 'static',
			'placeholder': '',
			'cssclass': '',
			'value': '',
			'disabled': true,
			'readonly': true,
			'datas': [],
			'help_block': '',
			'input_icon': '',
			'dbfieldname': 'created_at'
		}
	],
	languageControls: [],
	init: function () {
		var thisObj = crazyify.contacts.entry;
		if ($('#contact-form input[name="_method"]').length && $('#contact-form input[name="_method"]').val() != 'POST') {
			$.crazyifyAjax({
				url: $('#contact-form').attr('action'),
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
	crazyify.contacts.entry.init();
});