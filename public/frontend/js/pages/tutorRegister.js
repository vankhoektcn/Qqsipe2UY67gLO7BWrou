if (typeof crazyify == 'undefined')
	var crazyify = {};

crazyify.tutorRegister = {
	init: function () 
	{
		var thisObj = crazyify.tutorRegister;
		thisObj.events();
	},
	events: function () {
		var thisObj = crazyify.tutorRegister;
		$(document).on("change", "input.subjects" ,function(){
			// var multipleValues = $( "input[name='subjects']:checked" ).val() || [];
			var multipleValues = $('input.subjects:checked').map(function () { 
				return $(this).val(); 
			}).get().join(',');
			$("#arrSubjects").val(multipleValues);
		})

		$(document).on("change", "input.teachTime" ,function(){
			var multipleValues = $('input.teachTime:checked').map(function () { 
				return $(this).val(); 
			}).get().join(',');
			$("#arrTeachTime").val(multipleValues);
		})

		$(document).on("change", "input.districtTeach" ,function(){
			var multipleValues = $('input.districtTeach:checked').map(function () { 
				return $(this).val(); 
			}).get().join(',');
			$("#arrDistrict").val(multipleValues);
		})

		$(document).on('click','#btnRegister', function(){
			removeError();
			return crazyify.tutorRegister.validationRegister();
		});
	},
	validationRegister:function () {
		var value = true;
		$(".tutorRegisterForm input:not([type=submit]):not([class$=novalid])").each(function(){
			value = isValidControl($(this),"null");
			if(!value)
			{
				return;
			}
		});
		return value;
	}
};

$(function () {
	crazyify.tutorRegister.init();
});