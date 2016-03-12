if (typeof crazyify == 'undefined')
	var crazyify = {};
if (typeof crazyify.project_search == 'undefined')
	crazyify.project_search = {};

crazyify.project_search = {
	init: function () 
	{
		var thisObj = crazyify.project_search;
		thisObj.pageLoad();
		thisObj.events();
	},
	events: function () {


	},
	pageLoad: function(){
		//$('.title-breadcrumb').removeClass('hide');
		// crazyify.project_search.loadDropdow($('select[name="project_type"]:not(.no-ajax)'), '/extra/project_types', 'GET', '--Chọn loại dự án--', 'id', 'name');
		// crazyify.project_search.loadDropdow($('select[name="province"]:not(.no-ajax)'), '/extra/provinces', 'GET', '--Chọn thành phố--', 'id', 'name');
		
	}
};

$(function () {
	crazyify.project_search.init();
});