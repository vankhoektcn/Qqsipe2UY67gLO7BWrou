if (typeof crazyify == 'undefined')
	var crazyify = {};
if (typeof crazyify.tutors == 'undefined')
	crazyify.tutors = {};

crazyify.tutors.index = {
	init: function () {
		var thisObj = crazyify.tutors.index;
		thisObj.initTable();
	},
	initTable: function () {
		$('#tbltutors').dataTable({
			pageLength: 25,
			language: {
                url: "/admin/assets/global/plugins/datatables/plugins/i18n/Vietnamese.json"
            }
		});
	}
};

$(function () {
	crazyify.tutors.index.init();
});