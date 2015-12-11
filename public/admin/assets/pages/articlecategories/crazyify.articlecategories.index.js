if (typeof crazyify == 'undefined')
	var crazyify = {};
if (typeof crazyify.articlecategories == 'undefined')
	crazyify.articlecategories = {};

crazyify.articlecategories.index = {
	init: function () {
		var thisObj = crazyify.articlecategories.index;
		thisObj.initTable();
		thisObj.events();
	},
	initTable: function () {
		$('#tblArticleCategories').dataTable({
			pageLength: 25,
			language: {
				url: "/admin/assets/global/plugins/datatables/plugins/i18n/Vietnamese.json"
			}
		});
	},
	events: function () {
		var thisObj = crazyify.articlecategories.index;
		// delete articleCategory
		$('a.action-delete').click(function () {
			var id = $(this).data('id');
			bootbox.confirm("Bạn thật sự muốn xóa danh mục bài viết này?", function(result) {
				if (result) {
					thisObj.delete(id);
				};
			});
		});
	},
	delete: function (id) {
		$.crazyifyAjax({
			url: '/admin/articlecategories/' + id,
			type: 'DELETE',
			success: function (data, textStatus, jqXHR) {
				toastr['success']("Xóa danh mục bài viết thành công.", "Xóa danh mục bài viết");
				setTimeout(function () {
					location.reload();
				}, 5000);
			},
			error: function (argument) {
				toastr['error']("Xóa danh mục bài viết không thành công.", "Xóa danh mục bài viết");
			}
		});
	}
};

$(function () {
	crazyify.articlecategories.index.init();
});