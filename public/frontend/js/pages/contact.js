$(function(){
		$(document).on('click','.btnSendContact', function(){
			removeError();
			return ValidationContact();
		});
		function ValidationContact()
		{
			var value = true;
			$(".form_details input:not([type=submit]), .content").each(function(){
				value = isValidControl($(this),"null");
				if(!value)
				{
					return;
				}
			});
			return value;
		}
	});