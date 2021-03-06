if (typeof crazyify == 'undefined')
	var crazyify = {};
if (typeof crazyify.projects == 'undefined')
	crazyify.projects = {};

crazyify.projects.index = {
	init: function () {
		var thisObj = crazyify.projects.index;
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
		var thisObj = crazyify.projects.index;
		// delete articleCategory
		$('a.action-delete').click(function () {
			var id = $(this).data('id');
			bootbox.confirm("Bạn thật sự muốn xóa dự án này?", function(result) {
				if (result) {
					thisObj.delete(id);
				};
			});
		});
	},
	delete: function (id) {
		$.crazyifyAjax({
			url: '/admin/projects/' + id,
			type: 'DELETE',
			success: function (data, textStatus, jqXHR) {
				toastr['success']("Xóa dự án thành công.", "Xóa dự án");
				setTimeout(function () {
					location.reload();
				}, 5000);
			},
			error: function (argument) {
				toastr['error']("Xóa dự án không thành công.", "Xóa dự án");
			}
		});
	}
};

$(function () {
	crazyify.projects.index.init();
});