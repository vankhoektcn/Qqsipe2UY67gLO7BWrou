if (typeof crazyify == 'undefined')
	var crazyify = {};
if (typeof crazyify.articles == 'undefined')
	crazyify.articles = {};

crazyify.articles.entry = {
	commonControls: [
		{
			'label': 'Thông tin dự án',
			'type': 'divider'
		},
		{
			'label': 'Tên dự án',
			'id': 'name',
			'name': 'Project[name]',
			'type': 'text',
			'required': true,
			'placeholder': 'Tên dự án',
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
			'label': 'Key',
			'id': 'key',
			'name': 'Project[key]',
			'type': 'static',
			'placeholder': '',
			'cssclass': '',
			'value': '',
			'disabled': true,
			'readonly': true,
			'datas': [],
			'help_block': '',
			'input_icon': '',
			'dbfieldname': 'key'
		},
		{
			'label': 'Tỉnh/thành phố',
			'id': 'province_id',
			'name': 'Project[province_id]',
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
			'dbfieldname': 'province_id'
		},
		{
			'label': 'Quận/huyện',
			'id': 'district_id',
			'name': 'Project[district_id]',
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
			'dbfieldname': 'district_id'
		},
		{
			'label': 'Địa chỉ',
			'id': 'address',
			'name': 'Project[address]',
			'type': 'text',
			'required': true,
			'placeholder': 'địa chỉ dự án',
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
			'label': 'Hotlime',
			'id': 'hotline',
			'name': 'Project[hotline]',
			'type': 'text',
			'required': true,
			'placeholder': 'đường dây nóng',
			'cssclass': '',
			'value': '',
			'disabled': false,
			'readonly': false,
			'datas': [],
			'help_block': '',
			'input_icon': '',
			'dbfieldname': 'hotline'
		},
		{
			'label': 'Biểu tượng hotline',
			'id': 'hotline_fa_icon',
			'name': 'Project[hotline_fa_icon]',
			'type': 'text',
			'required': true,
			'placeholder': 'hotline icon',
			'cssclass': '',
			'value': 'fa fa-phone',
			'disabled': false,
			'readonly': false,
			'datas': [],
			'help_block': '',
			'input_icon': '',
			'dbfieldname': 'hotline_fa_icon'
		},
		{
			'label': 'Email',
			'id': 'email',
			'name': 'Project[email]',
			'type': 'text',
			'required': true,
			'placeholder': 'email liên hệ',
			'cssclass': '',
			'value': '',
			'disabled': false,
			'readonly': false,
			'datas': [],
			'help_block': '',
			'input_icon': '',
			'dbfieldname': 'email'
		},
		{
			'label': 'Hình ảnh',
			'id': 'project_images',
			'name': 'Project[project_images]',
			'type': 'inputimages',
			'required': false,
			'placeholder': '',
			'cssclass': '',
			'value': '',
			'disabled': false,
			'readonly': false,
			'datas': [],
			'help_block': '',
			'input_icon': '',
			'dbfieldname': 'project_images',
			'selected': true,
			'show_list_after_upload': true,
			'listTemplate':"<div class='form-inline' role='form'>\
    <div class='form-group no-margin'>\
      <label>image path:</label>\
      <input type='text' class='form-control'  value='{0}' name='project_image[link][]' readonly='true'>\
      <input type='hidden' value='{1}'  name='project_image[id][]'/>\
    </div>\
    <div class='form-group no-margin'>\
      <label>Tên ảnh:</label>\
      <input type='text' class='form-control'  name='project_image[title][]' placeholder='Tên ảnh'>\
    </div>\
    <div class='form-group no-margin'>\
      <label>Mô tả:</label>\
      <input type='text' class='form-control'  name='project_image[caption][]' placeholder='Mô tả ảnh'>\
    </div>\
    <div class='checkbox'>\
      <label><input type='checkbox' name='project_image[active][]'> xuất bản?</label>\
    </div>\
    <input type='button' class='btn btn-default' value='Xóa'/>\
  </div>"
		},
		{
			'label': 'Logo dự án',
			'id': 'logo',
			'name': 'Project[logo]',
			'type': 'text',
			'required': true,
			'placeholder': 'hình logo dự án',
			'cssclass': '',
			'value': '',
			'disabled': false,
			'readonly': true,
			'datas': [],
			'help_block': '',
			'input_icon': '',
			'dbfieldname': 'logo'
		},
		{
			'label': 'Hiển thị slide show ?',
			'id': 'show_slide',
			'name': 'Project[show_slide]',
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
			'dbfieldname': 'show_slide',
			'selected': true
		},
		{
			'label': 'Mô tả dự án',
			'id': 'content',
			'name': 'Project[content]',
			'type': 'editor',
			'required': false,
			'placeholder': '',
			'cssclass': '',
			'value': '',
			'disabled': false,
			'readonly': false,
			'datas': [],
			'help_block': '',
			'input_icon': '',
			'dbfieldname': 'content'
		},
		{
			'label': 'Bản đồ - latitude',
			'id': 'map_latitude',
			'name': 'Project[map_latitude]',
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
			'dbfieldname': 'map_latitude'
		},
		{
			'label': 'Bản đồ - longitude',
			'id': 'map_longitude',
			'name': 'Project[map_longitude]',
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
			'dbfieldname': 'map_longitude'
		},
		{
			'label': 'Nhân viên môi giới',
			'id': 'agents',
			'name': 'Article[agents]',
			'type': 'treecheckbox',
			'required': false,
			'placeholder': '',
			'cssclass': '',
			'value': '',
			'disabled': false,
			'readonly': false,
			'datas': [],
			'url': '/admin/agents',
			'help_block': '',
			'input_icon': '',
			'dbfieldname': 'agents'
		},
		{
			'label': 'Meta Description',
			'id': 'meta_description',
			'name': 'Project[meta_description]',
			'type': 'textarea',
			'required': false,
			'placeholder': '',
			'cssclass': '',
			'value': '',
			'disabled': false,
			'readonly': false,
			'datas': [],
			'help_block': '',
			'input_icon': '',
			'dbfieldname': 'meta_description'
		},
		{
			'label': 'Meta Keywords',
			'id': 'meta_keywords',
			'name': 'Project[meta_keywords]',
			'type': 'textarea',
			'required': false,
			'placeholder': '',
			'cssclass': '',
			'value': '',
			'disabled': false,
			'readonly': false,
			'datas': [],
			'help_block': '',
			'input_icon': '',
			'dbfieldname': 'meta_keywords'
		},
		{
			'label': 'Thứ tự ưu tiên',
			'id': 'priority',
			'name': 'Project[priority]',
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
			'id': 'active',
			'name': 'Project[active]',
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
			'dbfieldname': 'active',
			'selected': true
		},
		{
			'label': 'Tạo bởi',
			'id': 'created_by',
			'name': 'Project[created_by]',
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
			'name': 'Project[updated_by]',
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
	languageControls: [
		
	],
	init: function () {
		var thisObj = crazyify.articles.entry;
		if ($('#project-form input[name="_method"]').length && $('#project-form input[name="_method"]').val() != 'POST') {
			$.crazyifyAjax({
				url: $('#project-form').attr('action'),
				type: 'GET',
				success: function (data, textStatus, jqXHR) {
					$.each(thisObj.commonControls, function(index, item){
						if(item.id =='province_id')
						{
							$.each(data.provinces, function(indexPro, itemPro){
								item.datas.push({id:itemPro.key,value:itemPro.id,text:itemPro.name});
							});
							return false;
						}
					});
					CControl.init({
						dom:$('.form-body'), 
						commonControls: thisObj.commonControls, 
						languageControls: thisObj.languageControls,
						commonData: data,
						languageDatas: data.translations
					});
				}
			});
		}
		else{
			$.crazyifyAjax({
				url: '/admin/provinces',
				type: 'GET',
				success: function (data, textStatus, jqXHR) {
					$.each(thisObj.commonControls, function(index, item){
						if(item.id =='province_id')
						{
							$.each(data, function(indexPro, itemPro){
								item.datas.push({id:itemPro.key,value:itemPro.id,text:itemPro.name});
							});
							return false;
						}
					});
					CControl.init({
						dom:$('.form-body'), 
						commonControls: thisObj.commonControls,
						languageControls: thisObj.languageControls
					});
				}
			});
		}

		// Event
		$(document).on('change', '#province_id', function(){
			if(this.value && !$.isEmptyObject(this.value))
			{
				$.crazyifyAjax({
					url: '/admin/districts-by-province/'+this.value,
					type: 'GET',
					success: function (data, textStatus, jqXHR) {
						var output = [];
						output.push('<option value="0">Chọn quận/huyện</option>');
						$.each(data, function(indexPro, itemPro)
						{
						  output.push('<option value="'+ itemPro.id +'">'+ itemPro.name +'</option>');
						});
						$('#district_id').html(output.join(''));
					}
				});
			}
		});
	}
};

$(function () {
	crazyify.articles.entry.init();
});