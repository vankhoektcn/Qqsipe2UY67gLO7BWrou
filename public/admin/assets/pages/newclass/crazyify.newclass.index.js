if (typeof crazyify == 'undefined')
	var crazyify = {};
if (typeof crazyify.newclass == 'undefined')
	crazyify.newclass = {};

crazyify.newclass.index = {
	init: function () {
		var thisObj = crazyify.newclass.index;
		thisObj.initTable();
		thisObj.events();
	},
	initTable: function () {
		$('#tblnewclass').dataTable({
			pageLength: 25,
			language: {
                url: "/admin/assets/global/plugins/datatables/plugins/i18n/Vietnamese.json"
            }
		});
	},
	events: function () {
		var thisObj = crazyify.newclass.index;
		// delete 
		$('a.action-delete').click(function () {
			var id = $(this).data('id');
			bootbox.confirm("Bạn thật sự muốn xóa ?", function(result) {
				if (result) {
					thisObj.delete(id);
				};
			});
		});
	},
	delete: function (id) {
		$.crazyifyAjax({
			url: '/admin/newclass/' + id,
			type: 'DELETE',
			success: function (data, textStatus, jqXHR) {
				toastr['success']("Xóa thành công.", "Xóa danh mục");
				setTimeout(function () {
					location.reload();
				}, 5000);
			},
			error: function (argument) {
				toastr['error']("Xóa không thành công.", "Xóa danh mục");
			}
		});
	}
};

$(function () {
	crazyify.newclass.index.init();
});