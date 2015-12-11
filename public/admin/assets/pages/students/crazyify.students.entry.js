if (typeof crazyify == 'undefined')
	var crazyify = {};
if (typeof crazyify.students == 'undefined')
	crazyify.students = {};

crazyify.students.entry = {
	commonControls: [
		{
			'label': 'Thông tin học viên đăng ký',
			'type': 'divider'
		},
		{
			'label': 'Họ tên',
			'id': 'name',
			'name': 'student[name]',
			'type': 'static',
			'placeholder': '',
			'cssclass': '',
			'value': '',
			'disabled': true,
			'readonly': true,
			'datas': [],
			'help_block': '',
			'input_icon': '',
			'dbfieldname': 'name'
		},
		{
			'label': 'Email',
			'id': 'email',
			'name': 'student[email]',
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
			'id': 'mobile',
			'name': 'student[mobile]',
			'type': 'static',
			'placeholder': '',
			'cssclass': '',
			'value': '',
			'disabled': true,
			'readonly': true,
			'datas': [],
			'help_block': '',
			'input_icon': '',
			'dbfieldname': 'mobile'
		},
		{
			'label': 'Địa chỉ',
			'id': 'address',
			'name': 'tutor[address]',
			'type': 'static',
			'placeholder': '',
			'cssclass': '',
			'value': '',
			'disabled': true,
			'readonly': true,
			'datas': [],
			'help_block': '',
			'input_icon': '',
			'dbfieldname': 'address'
		},
		{
			'label': 'Môn học',
			'id': 'subjects',
			'name': 'tutor[subjects]',
			'type': 'staticjoinstring',
			'placeholder': '',
			'cssclass': '',
			'value': '',
			'disabled': true,
			'readonly': true,
			'datas': [],
			'help_block': '',
			'input_icon': '',
			'dbfieldname': 'subjects',
			'joinfield': 'name'
		},
		{
			'label': 'Thời gian học',
			'id': 'teachTimes',
			'name': 'tutor[teachTimes]',
			'type': 'staticjoinstring',
			'placeholder': '',
			'cssclass': '',
			'value': '',
			'disabled': true,
			'readonly': true,
			'datas': [],
			'help_block': '',
			'input_icon': '',
			'dbfieldname': 'teach_times',
			'joinfield': 'key'
		},
		{
			'label': 'Học phí/buổi',
			'id': 'cost',
			'name': 'student[cost]',
			'type': 'static',
			'placeholder': '',
			'cssclass': '',
			'value': '',
			'disabled': true,
			'readonly': true,
			'datas': [],
			'help_block': '',
			'input_icon': '',
			'dbfieldname': 'cost'
		},
		{
			'label': 'Yêu cầu khác',
			'id': 'other_require',
			'name': 'student[other_require]',
			'type': 'static',
			'placeholder': '',
			'cssclass': '',
			'value': '',
			'disabled': true,
			'readonly': true,
			'datas': [],
			'help_block': '',
			'input_icon': '',
			'dbfieldname': 'other_require'
		},
		{
			'label': 'Ngày đăng ký',
			'id': 'created_at',
			'name': 'student[created_at]',
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
		var thisObj = crazyify.students.entry;
		if ($('#student-form input[name="_method"]').length && $('#student-form input[name="_method"]').val() != 'POST') {
			$.crazyifyAjax({
				url: $('#student-form').attr('action'),
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
	crazyify.students.entry.init();
});