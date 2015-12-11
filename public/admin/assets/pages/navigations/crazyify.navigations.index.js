if (typeof crazyify == 'undefined')
	var crazyify = {};
if (typeof crazyify.navigations == 'undefined')
	crazyify.navigations = {};

crazyify.navigations.index = {
	init: function () {
		var thisObj = crazyify.navigations.index;
		thisObj.initTable();
		thisObj.events();
	},
	initTable: function () {
		$('#tblNavigations').dataTable({
			pageLength: 25,
			language: {
				url: "/admin/assets/global/plugins/datatables/plugins/i18n/Vietnamese.json"
			}
		});
	},
	events: function () {
		var thisObj = crazyify.navigations.index;
		// delete articleCategory
		$('a.action-delete').click(function () {
			var id = $(this).data('id');
			bootbox.confirm("Bạn thật sự muốn xóa liên kết này?", function(result) {
				if (result) {
					thisObj.delete(id);
				};
			});
		});
	},
	delete: function (id) {
		$.crazyifyAjax({
			url: '/admin/navigations/' + id,
			type: 'DELETE',
			success: function (data, textStatus, jqXHR) {
				toastr['success']("Xóa liên kết thành công.", "Xóa liên kết");
				setTimeout(function () {
					location.reload();
				}, 5000);
			},
			error: function (argument) {
				toastr['error']("Xóa liên kết không thành công.", "Xóa liên kết");
			}
		});
	}
};

$(function () {
	crazyify.navigations.index.init();
});