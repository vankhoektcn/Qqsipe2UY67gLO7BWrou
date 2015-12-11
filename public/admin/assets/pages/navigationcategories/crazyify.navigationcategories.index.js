if (typeof crazyify == 'undefined')
	var crazyify = {};
if (typeof crazyify.navigationcategories == 'undefined')
	crazyify.navigationcategories = {};

crazyify.navigationcategories.index = {
	init: function () {
		var thisObj = crazyify.navigationcategories.index;
		thisObj.initTable();
		thisObj.events();
	},
	initTable: function () {
		$('#tblNavigationCategories').dataTable({
			pageLength: 25,
			language: {
				url: "/admin/assets/global/plugins/datatables/plugins/i18n/Vietnamese.json"
			}
		});
	},
	events: function () {
		var thisObj = crazyify.navigationcategories.index;
		// delete articleCategory
		$('a.action-delete').click(function () {
			var id = $(this).data('id');
			bootbox.confirm("Bạn thật sự muốn xóa danh mục liên kết này?", function(result) {
				if (result) {
					thisObj.delete(id);
				};
			});
		});
	},
	delete: function (id) {
		$.crazyifyAjax({
			url: '/admin/navigationcategories/' + id,
			type: 'DELETE',
			success: function (data, textStatus, jqXHR) {
				toastr['success']("Xóa danh mục liên kết thành công.", "Xóa danh mục liên kết");
				setTimeout(function () {
					location.reload();
				}, 5000);
			},
			error: function (argument) {
				toastr['error']("Xóa danh mục liên kết không thành công.", "Xóa danh mục liên kết");
			}
		});
	}
};

$(function () {
	crazyify.navigationcategories.index.init();
});