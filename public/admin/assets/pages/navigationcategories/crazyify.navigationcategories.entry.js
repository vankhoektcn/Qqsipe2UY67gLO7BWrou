if (typeof crazyify == 'undefined')
	var crazyify = {};
if (typeof crazyify.navigationcategories == 'undefined')
	crazyify.navigationcategories = {};

crazyify.navigationcategories.entry = {
	commonControls: [
		{
			'label': 'Thông tin chung',
			'type': 'divider'
		},
		{
			'label': 'Key',
			'id': 'key',
			'name': 'NavigationCategory[key]',
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
			'label': 'Danh mục cha',
			'id': 'parent_id',
			'name': 'NavigationCategory[parent_id]',
			'type': 'treecheckbox',
			'required': false,
			'placeholder': '',
			'cssclass': '',
			'value': '',
			'disabled': false,
			'readonly': false,
			'datas': [],
			'help_block': '',
			'input_icon': '',
			'dbfieldname': 'parent_id',
			'url': '/admin/navigationcategories',
			'multiple': false
		},
		{
			'label': 'Thứ tự ưu tiên',
			'id': 'priority',
			'name': 'NavigationCategory[priority]',
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
			'name': 'NavigationCategory[is_publish]',
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
			'name': 'Article[created_by]',
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
			'name': 'Article[updated_by]',
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
			'label': 'Tên danh mục',
			'id': 'name',
			'name': 'NavigationCategoryTranslation[locale][name]',
			'type': 'text',
			'required': true,
			'placeholder': 'Tên danh mục',
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
			'label': 'Mô tả danh mục',
			'id': 'summary',
			'name': 'NavigationCategoryTranslation[locale][summary]',
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
			'dbfieldname': 'summary'
		}
	],
	init: function () {
		var thisObj = crazyify.navigationcategories.entry;
		if ($('#navigation-category-form input[name="_method"]').length && $('#navigation-category-form input[name="_method"]').val() != 'POST') {
			$.crazyifyAjax({
				url: $('#navigation-category-form').attr('action'),
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
	crazyify.navigationcategories.entry.init();
});