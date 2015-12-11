if (typeof crazyify == 'undefined')
	var crazyify = {};
if (typeof crazyify.newclass == 'undefined')
	crazyify.newclass = {};

crazyify.newclass.entry = {
	commonControls: [
		{
			'label': 'Thông tin lớp học',
			'type': 'divider'
		},
		{
			'label': 'Mã lớp',
			'id': 'code',
			'name': 'NewClass[code]',
			'type': 'text',
			'required': true,
			'placeholder': 'Mã lớp',
			'cssclass': '',
			'value': '',
			'disabled': false,
			'readonly': false,
			'datas': [],
			'help_block': '',
			'input_icon': '',
			'dbfieldname': 'code'
		},
		{
			'label': 'Tên lớp',
			'id': 'name',
			'name': 'NewClass[name]',
			'type': 'text',
			'required': true,
			'placeholder': 'Tên lớp',
			'cssclass': '',
			'value': '',
			'disabled': false,
			'readonly': false,
			'datas': [],
			'help_block': '',
			'input_icon': '',
			'dbfieldname': 'name'
		},
		{
			'label': 'Lớp dạy',
			'id': 'for_class',
			'name': 'NewClass[for_class]',
			'type': 'text',
			'required': true,
			'placeholder': 'Lớp dạy',
			'cssclass': '',
			'value': '',
			'disabled': false,
			'readonly': false,
			'datas': [],
			'help_block': '',
			'input_icon': '',
			'dbfieldname': 'for_class'
		},
		{
			'label': 'Môn học',
			'id': 'subject_id',
			'name': 'NewClass[subject_id]',
			'type': 'select',
			'required': true,
			'placeholder': '',
			'cssclass': '',
			'value': '',
			'disabled': false,
			'readonly': false,
			'datas': [],
			'help_block': '',
			'input_icon': '',
			'dbfieldname': 'subject_id'
		},
		{
			'label': 'Địa chỉ',
			'id': 'address',
			'name': 'NewClass[address]',
			'type': 'text',
			'required': true,
			'placeholder': 'Địa chỉ',
			'cssclass': '',
			'value': '',
			'disabled': false,
			'readonly': false,
			'datas': [],
			'help_block': '',
			'input_icon': '',
			'dbfieldname': 'address'
		},
		{
			'label': 'Lương',
			'id': 'salary',
			'name': 'NewClass[salary]',
			'type': 'number',
			'required': true,
			'placeholder': 'Lương',
			'cssclass': '',
			'value': '',
			'disabled': false,
			'readonly': false,
			'datas': [],
			'help_block': '',
			'input_icon': '',
			'dbfieldname': 'salary'
		},
		{
			'label': 'Thời gian',
			'id': 'time',
			'name': 'NewClass[time]',
			'type': 'text',
			'required': true,
			'placeholder': 'Thời gian',
			'cssclass': '',
			'value': '',
			'disabled': false,
			'readonly': false,
			'datas': [],
			'help_block': '',
			'input_icon': '',
			'dbfieldname': 'time'
		},
		{
			'label': 'Số buổi',
			'id': 'day_number',
			'name': 'NewClass[day_number]',
			'type': 'number',
			'required': false,
			'placeholder': 'Số buổi',
			'cssclass': '',
			'value': '',
			'disabled': false,
			'readonly': false,
			'datas': [],
			'help_block': '',
			'input_icon': '',
			'dbfieldname': 'day_number'
		},
		{
			'label': 'Yêu cầu',
			'id': 'required',
			'name': 'NewClass[required]',
			'type': 'text',
			'required': true,
			'placeholder': 'Yêu cầu',
			'cssclass': '',
			'value': '',
			'disabled': false,
			'readonly': false,
			'datas': [],
			'help_block': '',
			'input_icon': '',
			'dbfieldname': 'required'
		},
		{
			'label': 'Liên hệ',
			'id': 'contactinfo',
			'name': 'NewClass[contactinfo]',
			'type': 'text',
			'required': true,
			'placeholder': 'Yêu cầu',
			'cssclass': '',
			'value': '',
			'disabled': false,
			'readonly': false,
			'datas': [],
			'help_block': '',
			'input_icon': '',
			'dbfieldname': 'contactinfo'
		},
		{
			'label': 'Tình trạng',
			'id': 'status',
			'name': 'NewClass[status]',
			'type': 'select',
			'required': true,
			'placeholder': 'Tình trạng',
			'cssclass': '',
			'value': '',
			'disabled': false,
			'readonly': false,
			'datas': [
				{ id:'C',value:'0',text:'Chưa giao'},
				{ id:'D',value:'1',text:'Đã giao'}
			],
			'help_block': '',
			'input_icon': '',
			'dbfieldname': 'status'
		},


		{
			'label': 'Thứ tự ưu tiên',
			'id': 'priority',
			'name': 'NewClass[priority]',
			'type': 'number',
			'required': false,
			'placeholder': '',
			'cssclass': '',
			'value': '0',
			'disabled': false,
			'readonly': false,
			'datas': [],
			'help_block': '',
			'input_icon': '',
			'dbfieldname': 'priority'
		},
		{
			'label': 'Xuất bản',
			'id': 'is_publish',
			'name': 'NewClass[is_publish]',
			'type': 'checkbox',
			'required': false,
			'placeholder': '',
			'cssclass': 'checkbox-inline',
			'value': '1',
			'disabled': false,
			'readonly': false,
			'datas': [],
			'help_block': '',
			'input_icon': '',
			'dbfieldname': 'is_publish',
			'selected': true
		},
		{
			'label': 'Tạo bởi',
			'id': 'created_by',
			'name': 'NewClass[created_by]',
			'type': 'static',
			'placeholder': 'Tạo bởi',
			'cssclass': '',
			'value': '',
			'disabled': true,
			'readonly': true,
			'datas': [],
			'help_block': '',
			'input_icon': '',
			'dbfieldname': 'created_by'
		},
		{
			'label': 'Cập nhật bởi',
			'id': 'updated_by',
			'name': 'NewClass[updated_by]',
			'type': 'static',
			'placeholder': 'Cập nhật bởi',
			'cssclass': '',
			'value': '',
			'disabled': true,
			'readonly': true,
			'datas': [],
			'help_block': '',
			'input_icon': '',
			'dbfieldname': 'updated_by'
		}
	],
	init: function () {
		var thisObj = crazyify.newclass.entry;
		if ($('#newclass-form input[name="_method"]').length && $('#newclass-form input[name="_method"]').val() != 'POST') {
			$.crazyifyAjax({
				url: $('#newclass-form').attr('action'),
				type: 'GET',
				success: function (data, textStatus, jqXHR) {
					$.each(thisObj.commonControls, function(index, item){
						if(item.id =='subject_id')
						{
							$.each(data.subjects, function(indexSub, itemSub){
								item.datas.push({id:itemSub.key,value:itemSub.id,text:itemSub.name});
							});
							return false;
						}
					});
					CControl.init({
						dom:$('.form-body'), 
						commonControls: thisObj.commonControls,
						commonData: data.newclass
					});
				}
			});
		}
		else{
			$.crazyifyAjax({
				url: '/admin/subjects',
				type: 'GET',
				success: function (data, textStatus, jqXHR) {
					$.each(thisObj.commonControls, function(index, item){
						if(item.id =='subject_id')
						{
							$.each(data, function(indexPro, itemPro){
								item.datas.push({id:itemPro.key,value:itemPro.id,text:itemPro.name});
							});
							return false;
						}
					});
					CControl.init({
						dom:$('.form-body'), 
						commonControls: thisObj.commonControls
					});
				}
			});
		}
	}
};

$(function () {
	crazyify.newclass.entry.init();
});