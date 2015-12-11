if (typeof crazyify == 'undefined')
	var crazyify = {};
if (typeof crazyify.configs == 'undefined')
	crazyify.configs = {};

crazyify.configs.index = {
	init: function () {
		var thisObj = crazyify.configs.index;
		thisObj.initTable();
	},
	initTable: function () {
		$('#tblConfigs').dataTable({
			pageLength: 25,
			language: {
                url: "/admin/assets/global/plugins/datatables/plugins/i18n/Vietnamese.json"
            }
		});
	}
};

$(function () {
	crazyify.configs.index.init();
});