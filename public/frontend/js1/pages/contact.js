if (typeof crazyify == 'undefined')
	var crazyify = {};
if (typeof crazyify.contact == 'undefined')
	crazyify.contact = {};

crazyify.contact = {

	init: function () 
	{
		var thisObj = crazyify.contact;
		thisObj.pageLoad();
		thisObj.events();
	},
	events: function () {		
		$(document).on('click','.btnSendContact', function(){
			removeError();
			return crazyify.contact.validationContact();
		});
	},
	pageLoad: function(){
	},
	validationContact: function()
	{
		var value = true;
		$("#contactform_form input.required, #contactform_form textarea.required").each(function(){
			value = isValidControl($(this),"null");
			if(!value)
			{
				return;
			}
		});
		return value;
	}
};

$(function(){
	crazyify.contact.init();
});