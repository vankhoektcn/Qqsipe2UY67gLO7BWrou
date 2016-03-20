if (typeof crazyify == 'undefined')
	var crazyify = {};
if (typeof crazyify.product_search == 'undefined')
	crazyify.product_search = {};

crazyify.product_search = {
	init: function () 
	{
		var thisObj = crazyify.product_search;
		thisObj.pageLoad();
		thisObj.events();
	},
	events: function () {
		_root = crazyify.common;
		$(document).on('click', 'input#btn-products-search', function(e){
			e.preventDefault();
			_form = $(this).parents('form');
			var link = crazyify.common._productPrefix;
			if( !$.isEmptyObject(_root._ward.selectedKey()) )
			{
				link += '/'+_root._product_type.selectedKey()+'/'+_root._province.selectedKey()+'/'+_root._district.selectedKey()+'/'+_root._ward.selectedKey()+'.html';
			}
			else if( !$.isEmptyObject(_root._district.selectedKey()) )
			{
				link += '/'+_root._product_type.selectedKey()+'/'+_root._province.selectedKey()+'/'+_root._district.selectedKey()+'.html';
			}
			else if( !$.isEmptyObject(_root._province.selectedKey()) )
			{
				link += '/'+_root._product_type.selectedKey()+'/'+_root._province.selectedKey()+'.html';
			}
			else
				link += '.html';
			var query = crazyify.common.getSearchString(_form);
			location.href = link + '?' + query; 
		});
	},
	pageLoad: function(){
		$('#products-search').addClass('in active');
	}
};

$(function () {
	crazyify.product_search.init();
});