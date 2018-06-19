if (typeof crazyify == 'undefined')
	var crazyify = {};
if (typeof crazyify.projects == 'undefined')
	crazyify.projects = {};

crazyify.projects.entry = {
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
			'type': 'text',//'static',
			'placeholder': '',
			'cssclass': '',
			'value': '',
			'disabled': false,
			'readonly': false,
			'datas': [],
			'help_block': '',
			'input_icon': '',
			'dbfieldname': 'key'
		},
		{
			'label': 'Loại dự án',
			'id': 'project_type_id',
			'name': 'Project[project_type_id]',
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
			'dbfieldname': 'project_type_id'
		},
		{
			'label': 'Danh mục',
			'id': 'categories',
			'name': 'Project[categories]',
			'type': 'treecheckbox',
			'required': false,
			'placeholder': '',
			'cssclass': '',
			'value': '',
			'disabled': false,
			'readonly': false,
			'datas': [],
			'url': '/admin/projectcategories',
			'help_block': '',
			'input_icon': '',
			'dbfieldname': 'categories'
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
			'label': 'Phường/Xã',
			'id': 'ward_id',
			'name': 'Project[ward_id]',
			'type': 'select',
			'required': false,
			'placeholder': '',
			'cssclass': '',
			'value': '',
			'disabled': false,
			'readonly': false,
			'datas': [],
			'help_block': '',
			'input_icon': '',
			'dbfieldname': 'ward_id'
		},
		{
			'label': 'Đường/Phố',
			'id': 'street_id',
			'name': 'Project[street_id]',
			'type': 'select',
			'required': false,
			'placeholder': '',
			'cssclass': '',
			'value': '',
			'disabled': false,
			'readonly': false,
			'datas': [],
			'help_block': '',
			'input_icon': '',
			'dbfieldname': 'street_id'
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
			'label': 'Hotline',
			'id': 'hotline',
			'name': 'Project[hotline]',
			'type': 'text',
			'required': true,
			'placeholder': 'đường dây nóng',
			'cssclass': '',
			'value': '0932093221',
			'disabled': false,
			'readonly': false,
			'datas': [],
			'help_block': '',
			'input_icon': '',
			'dbfieldname': 'hotline'
		},
		/*{
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
		},*/
		{
			'label': 'Email',
			'id': 'email',
			'name': 'Project[email]',
			'type': 'text',
			'required': true,
			'placeholder': 'email liên hệ',
			'cssclass': '',
			'value': 'vanland09a@gmail.common',
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
			'listTemplate':"<div class='form-inline image-row' role='form' style='margin-left: -300px;'>\
    <div class='form-group no-margin'>\
      <label>Ảnh:</label>\
      <img src='{0}' class='file-preview-image'>\
      <input type='text' class='form-control project-image-link hide'  value='{0}' name='project_image[path][]' readonly='true'>\
      <input type='hidden' value='{1}' class='project_image_id'  name='project_image[id][]'/>\
    </div>\
    <div class='form-group no-margin'>\
      <label>Tên ảnh:</label>\
      <input type='text' class='form-control'  name='project_image[title][]' placeholder='Tên ảnh'>\
    </div>\
    <div class='form-group no-margin'>\
      <label>Mô tả:</label>\
      <input type='text' class='form-control'  name='project_image[caption][]' placeholder='Mô tả ảnh' style='width: 400px;'>\
    </div>\
    <div class='checkbox'>\
      <label><input type='checkbox' name='project_image[active][]' checked value='1'> xuất bản?</label>\
    </div>\
    <div class='checkbox'>\
      <label><input type='radio' name='radio_logo'> Làm logo</label>\
    </div>\
    <input type='button' class='btn btn-default btndel-project-image' value='Xóa'/>\
  </div>",
			'list_template_exists': '',
			'template_exists':"<div class='form-inline image-row' role='form' style='margin-left: -300px;'>\
    <div class='form-group no-margin'>\
      <label>Ảnh:</label>\
      <img src='{0}' class='file-preview-image'>\
      <input type='text' class='form-control project-image-link hide'  value='{0}' name='project_image[path][]' readonly='true'>\
      <input type='hidden' value='{1}' class='project_image_id'  name='project_image[id][]'/>\
    </div>\
    <div class='form-group no-margin'>\
      <label>Tên ảnh:</label>\
      <input type='text' class='form-control' value='[/title]'  name='project_image[title][]' placeholder='Tên ảnh'>\
    </div>\
    <div class='form-group no-margin'>\
      <label>Mô tả:</label>\
      <input type='text' class='form-control' value='[/caption]'  name='project_image[caption][]' placeholder='Mô tả ảnh' style='width: 400px;'>\
    </div>\
    <div class='checkbox'>\
      <label><input type='checkbox' name='project_image[active][]' checked  value='[/active]'> xuất bản?</label>\
    </div>\
    <div class='checkbox'>\
      <label><input type='radio' name='radio_logo'> Làm logo</label>\
    </div>\
    <input type='button' class='btn btn-default btndel-project-image' value='Xóa'/>\
  </div>",
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
			'label': 'Điểm nổi bật dự án',
			'id': 'summary',
			'name': 'Project[summary]',
			'type': 'textarea',
			'required': false,
			'placeholder': 'Mô tả những điểm nổi bật nhất của dự án, tối đá 500 ký tự.',
			'cssclass': '',
			'value': '',
			'disabled': false,
			'readonly': false,
			'datas': [],
			'help_block': '',
			'input_icon': '',
			'dbfieldname': 'summary'
		},
		{
			'label': 'Tổng quan dự án',
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
		/*{
			'label': 'Nhân viên môi giới',
			'id': 'agents',
			'name': 'Project[agents]',
			'type': 'treecheckbox',
			'required': true,
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
		},*/
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
	mainData: {},
	init: function () {
		var thisObj = crazyify.projects.entry;
		if ($('#project-form input[name="_method"]').length && $('#project-form input[name="_method"]').val() != 'POST') {
			$.crazyifyAjax({
				url: $('#project-form').attr('action'),
				type: 'GET',
				success: function (data, textStatus, jqXHR) {					
					crazyify.projects.entry.mainData = data;
					CControl.init({
						dom:$('.form-body'), 
						commonControls: thisObj.commonControls, 
						languageControls: thisObj.languageControls,
						commonData: data,
						languageDatas: data.translations
					}, crazyify.projects.entry.pageLoad);
				}
			});
		}
		else{			
			CControl.init({
				dom:$('.form-body'), 
				commonControls: thisObj.commonControls,
				languageControls: thisObj.languageControls
			}, crazyify.projects.entry.pageLoad);
		}

		/*// Event
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
		});*/

		$(document).on('click', 'input[name="radio_logo"]', function() {
			var $image_row = $(this).parents('div.image-row');
			$('input[name="Project[logo]"]').val($('input.project-image-link',$image_row).val());
		});
		$(document).on('click', 'input[name="project_image[active][]"]', function() {
			if($(this).is(':checked'))
				$(this).val(1);
			else
				$(this).val(0);
		});
		$(document).on('click', 'input.btndel-project-image', function() {
			$form_inline = $(this).parents('.image-row');
			$project_image_id = $('input[type="hidden"].project_image_id',$form_inline).val();
			if(!$.isEmptyObject($project_image_id))
			{
				crazyify.projects.entry.delete_project_image($project_image_id, $form_inline);
			}
			else
			{
				crazyify.projects.entry.remove_project_image($form_inline);
			}
		});

	},
	remove_project_image: function($projects_image_form)
	{
		$projects_image_form.remove();	
	},
	delete_project_image: function (id, $projects_image_form) {
		$.crazyifyAjax({
			url: '/admin/project_images/' + id,
			type: 'DELETE',
			success: function (data, textStatus, jqXHR) {
				toastr['success']("Xóa thành công.", "Xóa hình ảnh");
				setTimeout(function () {
					location.reload();
				}, 5000);
				if($projects_image_form)
					crazyify.projects.entry.remove_project_image($form_inline);
			},
			error: function (argument) {
				toastr['error']("Xóa không thành công.", "Xóa hình ảnh");
			}
		});
	}
	,
	pageLoad: function(){
		//crazyify.projects.entry.loadProject_type();
		$this = crazyify.projects.entry;
		mainData = $this.mainData;
		crazyify.common.loadDropdow($('select#project_type_id:not(.no-ajax)'), '/extra/project_types', 'GET', '--Chọn loại dự án--', 'id', 'name',
				function(data){
					if(mainData.project_type_id) $('select#project_type_id').val(mainData.project_type_id);
				}
			);
		crazyify.common.loadDropdow($('select#province_id:not(.no-ajax)'), '/extra/provinces', 'GET', '--Chọn thành phố--', 'id', 'name',
			function(data){
				if(mainData.province_id) 
				{
					$('select#province_id').val(mainData.province_id);
					crazyify.common.loadDropdow($('select#district_id:not(.no-ajax)'), '/extra/districts-by-province/'+mainData.province_id, 'GET', '--Chọn Quận/Huyện--', 'id', 'name',
						function(data){
							if(mainData.district_id) 
							{
								$('select#district_id').val(mainData.district_id);
								crazyify.common.loadDropdow($('select#ward_id:not(.no-ajax)'), '/extra/ward-by-district/'+mainData.district_id, 'GET', '--Chọn Phường/Xã--', 'id', 'name',
									function(data){
										if(mainData.ward_id) $('select#ward_id').val(mainData.ward_id);
									}
								);
								crazyify.common.loadDropdow($('select#street_id:not(.no-ajax)'), '/extra/street-by-district/'+mainData.district_id, 'GET', '--Chọn Đường/Phố--', 'id', 'name',
									function(data){
										if(mainData.street_id) $('select#street_id').val(mainData.street_id);
									}
								);
							}		
						}
					);
				}
			}
		);
		
	},
	loadProject_type: function()
	{
		$.crazyifyAjax({
					url: '/admin/project_types',
					type: 'GET',
					success: function (data, textStatus, jqXHR) {
						$('#project_type_id').html('');
						$('#project_type_id').append('<option value="0">Chọn loại dự án</option>');
						$.each(data, function(index, item)
						{
							$('#project_type_id').append('<option value="'+ item.id +'">'+ item.name +'</option>');
						});
					}
				});
	}
};

$(function () {
	crazyify.projects.entry.init();
});