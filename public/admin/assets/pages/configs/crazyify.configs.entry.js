if (typeof crazyify == 'undefined')
	var crazyify = {};
if (typeof crazyify.configs == 'undefined')
	crazyify.configs = {};

crazyify.configs.entry = {
	commonControls: [
		{
			'label': $('.page-title small').text(),
			'id': 'value',
			'name': 'Config[value]',
			'type': 'text',
			'placeholder': '',
			'cssclass': '',
			'value': '',
			'disabled': false,
			'readonly': false,
			'datas': [],
			'help_block': '',
			'input_icon': '',
			'dbfieldname': 'value'
		}
	],
	languageControls: [],
	init: function () {
		var thisObj = crazyify.configs.entry;
		if ($('#config-form input[name="_method"]').length && $('#config-form input[name="_method"]').val() != 'POST') {
			$.crazyifyAjax({
				url: $('#config-form').attr('action'),
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
	crazyify.configs.entry.init();
});