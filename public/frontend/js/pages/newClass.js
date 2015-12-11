if (typeof crazyify == 'undefined')
	var crazyify = {};

crazyify.newClass = {
	init: function () 
	{
		var thisObj = crazyify.newClass;
		thisObj.events();
	},
	events: function () {
		var thisObj = crazyify.newClass;
		$(document).on("change", "select#status" ,function(){
			var status = $(this).val();
			searchNewClassAjax(status);
		})
	},
	searchNewClassAjax:function (status) {
		
	}
};

$(function () {
	crazyify.newClass.init();
});