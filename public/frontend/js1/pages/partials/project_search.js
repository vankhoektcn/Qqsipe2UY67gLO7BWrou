if (typeof crazyify == 'undefined')
	var crazyify = {};
if (typeof crazyify.project_search == 'undefined')
	crazyify.project_search = {};

crazyify.project_search = {	

	_project_type : $('select[name="project_type"]',$('#projects-search')),
	_project_type : $('select[name="project_type"]',$('#projects-search')),

	_province : $('select[name="province"]',$('#projects-search')),
	_district : $('select[name="district"]',$('#projects-search')),
	_ward : $('select[name="ward"]',$('#projects-search')),
	_street : $('select[name="street"]',$('#projects-search')),
	_project : $('select[name="project"]',$('#projects-search')),
	_utility : $('select[name="utility"]',$('#projects-search')),
	_price : $('select[name="price"]',$('#projects-search')),
	_area : $('select[name="area"]',$('#projects-search')),
	_incense : $('select[name="incense"]',$('#projects-search')),
	init: function () 
	{
		var thisObj = crazyify.project_search;
		thisObj.pageLoad();
		thisObj.events();
	},
	events: function () {
		$(document).on('click', 'input#btn-projects-search', function(e){
			e.preventDefault();
			_root = crazyify.project_search;
			_form = $(this).parents('form');
			var link = crazyify.common._projectPrefix;
			if( !$.isEmptyObject(_root._project.selectedKey()) )
			{
				link = '/thong-tin-du-an/'+_root._project.val()+'/'+_root._project.selectedKey()+'.html';
				window.open(link, 'blank');
			}
			else {
				if( !$.isEmptyObject(_root._ward.selectedKey()) )
				{
					link += '/'+_root._project_type.selectedKey()+'/'+_root._province.selectedKey()+'/'+_root._district.selectedKey()+'/'+_root._ward.selectedKey()+'.html';
				}
				else if( !$.isEmptyObject(_root._district.selectedKey()) )
				{
					link += '/'+_root._project_type.selectedKey()+'/'+_root._province.selectedKey()+'/'+_root._district.selectedKey()+'.html';
				}
				else if( !$.isEmptyObject(_root._province.selectedKey()) )
				{
					link += '/'+_root._project_type.selectedKey()+'/'+_root._province.selectedKey()+'.html';
					var pjt = {id: _root._project_type.val(), key: _root._project_type.selectedKey(), name:_root._project_type.selectedText()};
					$.SetCookie('pjt',JSON.stringify(pjt), 1);
					var pro = {id: _root._province.val(), key: _root._province.selectedKey(), name:_root._province.selectedText()};
					$.SetCookie('pro',JSON.stringify(pro), 1);				
				}
				else if( !$.isEmptyObject(_root._project_type.selectedKey()) )
				{
					link += '/'+_root._project_type.selectedKey()+'.html';
					var pjt = {id: _root._project_type.val(), key: _root._project_type.selectedKey(), name:_root._project_type.selectedText()};
					$.SetCookie('pjt',JSON.stringify(pjt), 1);
				}
				else
					link += '.html';
				var query = crazyify.common.getSearchString(_form);
				if(query != null && query.length >0)
					link = link + '?' + query; 
				location.href = link;
			}
		});
	},
	pageLoad: function(){
		$('#projects-search').addClass('in active');
	}
};

$(function () {
	crazyify.project_search.init();
});