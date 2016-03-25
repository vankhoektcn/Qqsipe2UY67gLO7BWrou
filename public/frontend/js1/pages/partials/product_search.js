if (typeof crazyify == 'undefined')
	var crazyify = {};
if (typeof crazyify.product_search == 'undefined')
	crazyify.product_search = {};

crazyify.product_search = {	

	_project_type : $('select[name="project_type"]',$('#products-search')),
	_product_type : $('select[name="product_type"]',$('#products-search')),

	_province : $('select[name="province"]',$('#products-search')),
	_district : $('select[name="district"]',$('#products-search')),
	_ward : $('select[name="ward"]',$('#products-search')),
	_street : $('select[name="street"]',$('#products-search')),
	_project : $('select[name="project"]',$('#products-search')),
	_utility : $('select[name="utility"]',$('#products-search')),
	_price : $('select[name="price"]',$('#products-search')),
	_area : $('select[name="area"]',$('#products-search')),
	_incense : $('select[name="incense"]',$('#products-search')),
	init: function () 
	{
		var thisObj = crazyify.product_search;
		thisObj.pageLoad();
		thisObj.events();
	},
	events: function () {
		$(document).on('click', 'input#btn-products-search', function(e){
			e.preventDefault();
			_root = crazyify.product_search;
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
			else if( !$.isEmptyObject(_root._product_type.selectedKey()) )
			{
				link += '/'+_root._product_type.selectedKey()+'.html';
			}
			else
				link += '.html';
			var query = crazyify.common.getSearchString(_form);
			if(query != null && query.length >0)
				link = link + '?' + query; 
			location.href = link;
		});
	},
	pageLoad: function(){
		$('#products-search').addClass('in active');
	}
};

$(function () {
	crazyify.product_search.init();
});