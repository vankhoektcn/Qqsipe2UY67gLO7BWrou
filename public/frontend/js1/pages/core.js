// config cookie
/*$.cookie.raw = true;
$.cookie.json = true;*/
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
	var commonOption = {
		headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
	};
	$.extend(true, commonOption, options);
	return $.ajax(commonOption);
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


/**
 * Set Cookie
 */
$.SetCookie = function (c_name, value, exdays) {
	exdays = exdays || 7;
	var exdate = new Date();
	exdate.setDate(exdate.getDate() + exdays);
	var c_value = escape(value) + ((exdays == null) ? "" : "; expires=" + exdate.toUTCString());
	document.cookie = c_name + "=" + c_value + '; path=/';
};

/**
 * Get Cookie Value
 */
$.GetCookie = function (c_name) {
	var i, x, y, ARRcookies = document.cookie.split(";");
	for (i = 0; i < ARRcookies.length; i++) {
		x = ARRcookies[i].substr(0, ARRcookies[i].indexOf("="));
		y = ARRcookies[i].substr(ARRcookies[i].indexOf("=") + 1);
		x = x.replace(/^\s+|\s+$/g, "");
		if (x == c_name) {
			return unescape(y);
		}
	}
};
