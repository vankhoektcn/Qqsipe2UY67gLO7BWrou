if (typeof crazyify == 'undefined')
	var crazyify = {};
if (typeof crazyify.users == 'undefined')
	crazyify.users = {};

crazyify.users.changepassword = {
	commonControls: [
		{
			'label': 'Thông tin chung',
			'type': 'divider'
		},
		{
			'label': 'Mật mã mới',
			'id': 'password',
			'name': 'User[password]',
			'type': 'password',
			'required': true,
			'placeholder': 'Mật mã mới',
			'cssclass': '',
			'value': '',
			'disabled': false,
			'readonly': false,
			'datas': [],
			'help_block': '',
			'input_icon': '',
			'dbfieldname': 'password'
		},
		{
			'label': 'Nhắc lại mật mã mới',
			'id': 'password_confirmation',
			'name': 'User[password_confirmation]',
			'type': 'password',
			'required': true,
			'placeholder': 'Nhắc lại mật mã mới',
			'cssclass': '',
			'value': '',
			'disabled': false,
			'readonly': false,
			'datas': [],
			'help_block': '',
			'input_icon': '',
			'dbfieldname': 'password_confirmation'
		}
	],
	languageControls: [],
	init: function () {
		var thisObj = crazyify.users.changepassword;
		CControl.init({
			dom:$('.form-body'), 
			commonControls: thisObj.commonControls, 
			languageControls: thisObj.languageControls
		});
	}
};

$(function () {
	crazyify.users.changepassword.init();
});