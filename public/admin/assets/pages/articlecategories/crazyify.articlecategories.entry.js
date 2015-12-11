if (typeof crazyify == 'undefined')
	var crazyify = {};
if (typeof crazyify.articlecategories == 'undefined')
	crazyify.articlecategories = {};

crazyify.articlecategories.entry = {
	commonControls: [
		{
			'label': 'Thông tin chung',
			'type': 'divider'
		},
		{
			'label': 'Key',
			'id': 'key',
			'name': 'ArticleCategory[key]',
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
			'name': 'ArticleCategory[parent_id]',
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
			'url': '/admin/articlecategories',
			'multiple': false
		},
		{
			'label': 'Thứ tự ưu tiên',
			'id': 'priority',
			'name': 'ArticleCategory[priority]',
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
			'name': 'ArticleCategory[is_publish]',
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
			'label': 'Hình ảnh',
			'id': 'attachments',
			'name': 'ArticleCategory[attachments]',
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
			'name': 'ArticleCategoryTranslation[locale][name]',
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
			'name': 'ArticleCategoryTranslation[locale][summary]',
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
		},
		{
			'label': 'Meta Description',
			'id': 'meta_description',
			'name': 'ArticleCategoryTranslation[locale][meta_description]',
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
			'name': 'ArticleCategoryTranslation[locale][meta_keywords]',
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
		}
	],
	init: function () {
		var thisObj = crazyify.articlecategories.entry;
		if ($('#article-category-form input[name="_method"]').length && $('#article-category-form input[name="_method"]').val() != 'POST') {
			$.crazyifyAjax({
				url: $('#article-category-form').attr('action'),
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
	crazyify.articlecategories.entry.init();
});