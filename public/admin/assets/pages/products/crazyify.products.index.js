if (typeof crazyify == 'undefined')
	var crazyify = {};
if (typeof crazyify.products == 'undefined')
	crazyify.products = {};

crazyify.products.index = {
	init: function () {
		var thisObj = crazyify.products.index;
		thisObj.initTable();
		thisObj.events();
	},
	initTable: function () {
		$('#tblProducts').dataTable({
			pageLength: 25,
			language: {
				url: "/admin/assets/global/plugins/datatables/plugins/i18n/Vietnamese.json"
			}
		});
	},
	events: function () {
		var thisObj = crazyify.products.index;
		// delete productCategory
		$('a.action-delete').click(function () {
			var id = $(this).data('id');
			bootbox.confirm("Bạn thật sự muốn xóa tin đăng này?", function(result) {
				if (result) {
					thisObj.delete(id);
				};
			});
		});
	},
	delete: function (id) {
		$.crazyifyAjax({
			url: '/admin/products/' + id,
			type: 'DELETE',
			success: function (data, textStatus, jqXHR) {
				toastr['success']("Xóa tin đăng thành công.", "Xóa tin đăng");
				setTimeout(function () {
					location.reload();
				}, 5000);
			},
			error: function (argument) {
				toastr['error']("Xóa tin đăng không thành công.", "Xóa tin đăng");
			}
		});
	}
};

$(function () {
	crazyify.products.index.init();
});