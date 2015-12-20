if (typeof crazyify == 'undefined')
	var crazyify = {};
if (typeof crazyify.articles == 'undefined')
	crazyify.articles = {};

crazyify.articles.index = {
	init: function () {
		var thisObj = crazyify.articles.index;
		thisObj.initTable();
		thisObj.events();
	},
	initTable: function () {
		$('#tblArticles').dataTable({
			pageLength: 25,
			language: {
				url: "/admin/assets/global/plugins/datatables/plugins/i18n/Vietnamese.json"
			}
		});
	},
	events: function () {
		var thisObj = crazyify.articles.index;
		// delete articleCategory
		$('a.action-delete').click(function () {
			var id = $(this).data('id');
			bootbox.confirm("Bạn thật sự muốn xóa bài viết này?", function(result) {
				if (result) {
					thisObj.delete(id);
				};
			});
		});
	},
	delete: function (id) {
		$.crazyifyAjax({
			url: '/admin/articles/' + id,
			type: 'DELETE',
			success: function (data, textStatus, jqXHR) {
				toastr['success']("Xóa bài viết thành công.", "Xóa bài viết");
				setTimeout(function () {
					location.reload();
				}, 5000);
			},
			error: function (argument) {
				toastr['error']("Xóa bài viết không thành công.", "Xóa bài viết");
			}
		});
	}
};

$(function () {
	crazyify.articles.index.init();
});