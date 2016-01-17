if (typeof crazyify == 'undefined')
	var crazyify = {};
if (typeof crazyify.project_parts == 'undefined')
	crazyify.project_parts = {};

crazyify.project_parts.index = {
	init: function () {
		var thisObj = crazyify.project_parts.index;
		thisObj.initTable();
		thisObj.events();
	},
	initTable: function () {
		$('#tblProject_parts').dataTable({
			pageLength: 25,
			language: {
				url: "/admin/assets/global/plugins/datatables/plugins/i18n/Vietnamese.json"
			}
		});
	},
	events: function () {
		var thisObj = crazyify.project_parts.index;
		
		$('a.action-delete').click(function () {
			var id = $(this).data('id');
			bootbox.confirm("Bạn thật sự muốn xóa bài viết dự án này?", function(result) {
				if (result) {
					thisObj.delete(id);
				};
			});
		});
	},
	delete: function (id) {
		$.crazyifyAjax({
			url: '/admin/project_parts/' + id,
			type: 'DELETE',
			success: function (data, textStatus, jqXHR) {
				toastr['success']("Xóa bài viết dự án thành công.", "Xóa bài viết dự án");
				setTimeout(function () {
					location.reload();
				}, 5000);
			},
			error: function (argument) {
				toastr['error']("Xóa bài viết dự án không thành công.", "Xóa bài viết dự án");
			}
		});
	}
};

$(function () {
	crazyify.project_parts.index.init();
});