if (typeof crazyify == 'undefined')
	var crazyify = {};
if (typeof crazyify.contacts == 'undefined')
	crazyify.contacts = {};

crazyify.contacts.index = {
	init: function () {
		var thisObj = crazyify.contacts.index;
		thisObj.initTable();
	},
	initTable: function () {
		$('#tblContacts').dataTable({
			pageLength: 25,
			language: {
                url: "/admin/assets/global/plugins/datatables/plugins/i18n/Vietnamese.json"
            }
		});
	}
};

$(function () {
	crazyify.contacts.index.init();
});