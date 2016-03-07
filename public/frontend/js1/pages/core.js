// config cookie
$.cookie.raw = true;
$.cookie.json = true;
// config bootbox
/*bootbox.addLocale('vi', {OK : 'Đồng ý', CANCEL : 'Thoát', CONFIRM : 'Xác nhận'});
bootbox.setLocale('vi');*/


$.format = function jQuery_dotnet_string_format(text) {
	//check if there are two arguments in the arguments list
	if (arguments.length <= 1) {
		//if there are not 2 or more arguments there's nothing to replace
		//just return the text
		return text;
	}
	//decrement to move to the second argument in the array
	var tokenCount = arguments.length - 2;
	for (var token = 0; token <= tokenCount; ++token) {
		//iterate through the tokens and replace their placeholders from the text in order
		text = text.replace(new RegExp("\\{" + token + "\\}", "gi"), arguments[token + 1]);
	}
	return text;
};

$.crazyifyAjax = function (options) {
	return $.ajax(options);
};

$.getLanguages = function (callback) {
	var cookieName = 'crazyify.admin.languages';
	if ($.cookie(cookieName) != undefined && $.cookie(cookieName) != null && $.cookie(cookieName) != '') {
		if (typeof callback == 'function') {
			callback($.cookie(cookieName));
		};
	}
	else{
		$.crazyifyAjax({
			url: '/admin/languages',
			type: 'GET',
			success: function (data, textStatus, jqXHR) {
				// save cookie
				$.cookie(cookieName, data, { path: '/' });

				if (typeof callback == 'function') {
					callback(data);
				};
			}
		});
	}
};