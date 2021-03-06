if (typeof crazyify == 'undefined')
	var crazyify = {};
if (typeof crazyify.projectcategories == 'undefined')
	crazyify.projectcategories = {};

crazyify.projectcategories.index = {
	init: function () {
		var thisObj = crazyify.projectcategories.index;
		thisObj.initTable();
		thisObj.events();
	},
	initTable: function () {
		$('#tblProjectCategories').dataTable({
			pageLength: 25,
			language: {
				url: "/admin/assets/global/plugins/datatables/plugins/i18n/Vietnamese.json"
			}
		});
	},
	events: function () {
		var thisObj = crazyify.projectcategories.index;
		// delete projectCategory
		$('a.action-delete').click(function () {
			var id = $(this).data('id');
			bootbox.confirm("Bạn thật sự muốn xóa danh mục dự án này?", function(result) {
				if (result) {
					thisObj.delete(id);
				};
			});
		});
	},
	delete: function (id) {
		$.crazyifyAjax({
			url: '/admin/projectcategories/' + id,
			type: 'DELETE',
			success: function (data, textStatus, jqXHR) {
				toastr['success']("Xóa danh mục dự án thành công.", "Xóa danh mục dự án");
				setTimeout(function () {
					location.reload();
				}, 5000);
			},
			error: function (argument) {
				toastr['error']("Xóa danh mục dự án không thành công.", "Xóa danh mục dự án");
			}
		});
	}
};

$(function () {
	crazyify.projectcategories.index.init();
});