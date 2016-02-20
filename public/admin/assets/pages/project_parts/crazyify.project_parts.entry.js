if (typeof crazyify == 'undefined')
	var crazyify = {};
if (typeof crazyify.project_parts == 'undefined')
	crazyify.project_parts = {};

crazyify.project_parts.entry = {
	commonControls: [
		{
			'label': 'Bài viết dự án',
			'type': 'divider'
		},
		{
			'label': 'Loại',
			'id': 'type',
			'name': 'Project_part[type]',
			'type': 'select',
			'required': true,
			'placeholder': '',
			'cssclass': '',
			'value': '',
			'disabled': false,
			'readonly': false,
			'datas': [
				{id: 'E', value: 'E', text: 'Thành phần'},
				{id: 'A', value: 'A', text: 'Bài viết'}
			],
			'help_block': '',
			'input_icon': '',
			'dbfieldname': 'type'
		},
		{
			'label': 'Tên bài viết',
			'id': 'name',
			'name': 'Project_part[name]',
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
			'dbfieldname': 'name'
		},
		{
			'label': 'Key',
			'id': 'key',
			'name': 'Project_part[key]',
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
			'label': 'Hình đại diện',
			'id': 'thumnail',
			'name': 'Project_part[thumnail]',
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
			'dbfieldname': 'thumnail',
			'selected': true,
			'isNotRelationship': true
		},
		{
			'label': 'Liên kết',
			'id': 'link',
			'name': 'Project_part[link]',
			'type': 'text',
			'required': false,
			'placeholder': 'liên kết',
			'cssclass': '',
			'value': '',
			'disabled': false,
			'readonly': false,
			'datas': [],
			'help_block': '',
			'input_icon': '',
			'dbfieldname': 'link'
		},
		{
			'label': 'Fa icon',
			'id': 'fa_icon',
			'name': 'Project_part[fa_icon]',
			'type': 'text',
			'required': false,
			'placeholder': 'fa icon',
			'cssclass': '',
			'value': '',
			'disabled': false,
			'readonly': false,
			'datas': [],
			'help_block': '',
			'input_icon': '',
			'dbfieldname': 'fa_icon'
		},
		{
			'label': 'Tóm tắt',
			'id': 'summary',
			'name': 'Project_part[summary]',
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
			'id': 'content',
			'name': 'Project_part[content]',
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
			'dbfieldname': 'content'
		},
		{
			'label': 'Thứ tự ưu tiên',
			'id': 'priority',
			'name': 'Project_part[priority]',
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
			'name': 'Project_part[active]',
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
			'name': 'Project_part[meta_description]',
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
			'name': 'Project_part[meta_keywords]',
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
			'name': 'Project_part[created_by]',
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
			'name': 'Project_part[updated_by]',
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
		var thisObj = crazyify.project_parts.entry;
		if ($('#project_part-form input[name="_method"]').length && $('#project_part-form input[name="_method"]').val() != 'POST') {
			$.crazyifyAjax({
				url: $('#project_part-form').attr('action'),
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
	crazyify.project_parts.entry.init();
});