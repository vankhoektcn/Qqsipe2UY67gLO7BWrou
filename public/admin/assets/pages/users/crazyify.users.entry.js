if (typeof crazyify == 'undefined')
	var crazyify = {};
if (typeof crazyify.users == 'undefined')
	crazyify.users = {};

crazyify.users.entry = {
	commonControls: [
		{
			'label': 'Thông tin chung',
			'type': 'divider'
		},
		{
			'label': 'Họ tên',
			'id': 'name',
			'name': 'User[name]',
			'type': 'text',
			'required': true,
			'placeholder': 'Họ tên',
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
			'label': 'Email',
			'id': 'email',
			'name': 'User[email]',
			'type': 'email',
			'required': true,
			'placeholder': 'Email',
			'cssclass': '',
			'value': '',
			'disabled': false,
			'readonly': false,
			'datas': [],
			'help_block': '',
			'input_icon': '',
			'dbfieldname': 'email'
		}
	],
	languageControls: [],
	init: function () {
		var thisObj = crazyify.users.entry;
		if ($('#user-form input[name="_method"]').length && $('#user-form input[name="_method"]').val() != 'POST') {
			$.crazyifyAjax({
				url: $('#user-form').attr('action'),
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
	crazyify.users.entry.init();
});