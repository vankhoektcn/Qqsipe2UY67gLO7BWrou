if (typeof crazyify == 'undefined')
	var crazyify = {};
if (typeof crazyify.students == 'undefined')
	crazyify.students = {};

crazyify.students.index = {
	init: function () {
		var thisObj = crazyify.students.index;
		thisObj.initTable();
	},
	initTable: function () {
		$('#tblstudents').dataTable({
			pageLength: 25,
			language: {
                url: "/admin/assets/global/plugins/datatables/plugins/i18n/Vietnamese.json"
            }
		});
	}
};

$(function () {
	crazyify.students.index.init();
});