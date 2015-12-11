if (typeof crazyify == 'undefined')
	var crazyify = {};
if (typeof crazyify.tutors == 'undefined')
	crazyify.tutors = {};

crazyify.tutors.entry = {
	commonControls: [
		{
			'label': 'Thông tin gia sư đăng ký',
			'type': 'divider'
		},
		{
			'label': 'Họ tên',
			'id': 'name',
			'name': 'tutor[name]',
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
			'name': 'tutor[email]',
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
			'name': 'tutor[mobile]',
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
			'label': 'Môn có thể dạy',
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
			'label': 'Khu vực',
			'id': 'districts',
			'name': 'tutor[districts]',
			'type': 'staticjoinstring',
			'placeholder': '',
			'cssclass': '',
			'value': '',
			'disabled': true,
			'readonly': true,
			'datas': [],
			'help_block': '',
			'input_icon': '',
			'dbfieldname': 'districts',
			'joinfield': 'name'
		},
		{
			'label': 'Thời gian dạy',
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
			'label': 'Lương mong muốn',
			'id': 'salary',
			'name': 'student[salary]',
			'type': 'static',
			'placeholder': '',
			'cssclass': '',
			'value': '',
			'disabled': true,
			'readonly': true,
			'datas': [],
			'help_block': '',
			'input_icon': '',
			'dbfieldname': 'salary'
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
			'name': 'tutor[created_at]',
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
		var thisObj = crazyify.tutors.entry;
		if ($('#tutor-form input[name="_method"]').length && $('#tutor-form input[name="_method"]').val() != 'POST') {
			$.crazyifyAjax({
				url: $('#tutor-form').attr('action'),
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
	crazyify.tutors.entry.init();
});