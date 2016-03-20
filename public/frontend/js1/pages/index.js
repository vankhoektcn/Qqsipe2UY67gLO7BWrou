if (typeof crazyify == 'undefined')
	var crazyify = {};
if (typeof crazyify.index == 'undefined')
	crazyify.index = {};

crazyify.index = {
	init: function () 
	{
		var thisObj = crazyify.index;
		thisObj.pageLoad();
		thisObj.events();
	},
	events: function () {

	},
	pageLoad: function(){
		$('#products-search').removeClass('active');
	}

};

$(function () {
	crazyify.index.init();
});
