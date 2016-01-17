/**
CControl.js

Required:
bootstrap-fileinput
summernote
jstree

var datas = [
	{
		'label': '',
		'id': '',
		'name': '',
		'type': 'text', // text, password, datetime, datetime-local, date, month, time, week, number, email, url, search, tel, color, select, textarea, static, checkboxlist, radiolist, inputfile, inputimages, editor, inputtag, calendar, divider, treecheckbox
		'required': false,
		'placeholder': '',
		'cssclass': '',
		'value': '',
		'disabled': false,
		'readonly': false,
		'datas': [],    // {'value': '', 'text': '', 'id': '', selected: false}, data for select, checkboxlist, radio
		'url': '',	// url get data
		'help_block': '',
		'input_icon': '',
		'dbfieldname': '',
		'selected': true,	// checked for checkbox
		'multiple': true,	// multiple check for treecheckbox
		'joinfield': ''	// dung cho staticjoinstring
	}
];
**/

var CControl = function () {

	// private functions & variables

	var _dom;

	var _getHTMLText = function (options) {
		options.input_icon = $.trim(options.input_icon) == '' ? 'fa fa-angle-right' : options.input_icon; 
		var template = '<div class="form-group">\
							<label class="col-md-3 control-label" for="{0}">{1}</label>\
							<div class="col-md-9">\
								<div class="input-icon">\
									<i class="{2}"></i>\
									<input type="{3}" id="{0}" name="{4}" placeholder="{5}" class="form-control {6}" value="{7}" {8} {9} {10} data-languagecontrol="{11}" data-dbfieldname="{12}">\
								</div>\
								<span id="help-block-{0}" class="help-block">{13}</span>\
							</div>\
						</div>';
		var resutlHtml = $.format(template, options.id, options.label, options.input_icon, options.type, options.name, options.placeholder, options.cssclass, options.value, options.disabled ? 'disabled' : '', options.readonly ? 'readonly' : '', options.required ? 'required' : '', options.languagecontrol, options.dbfieldname, options.help_block);
		return resutlHtml;
	};

	var _getHTMLSelect = function (options) {
		var template = '<div class="form-group">\
							<label class="col-md-3 control-label">{0}</label>\
							<div class="col-md-9">\
								<select class="form-control" id="{1}" name="{2}" {3} {4} {5} data-languagecontrol="{6}" data-dbfieldname="{7}" {10}>{8}</select>\
								<span id="help-block-{1}" class="help-block">{9}</span>\
							</div>\
						</div>';
		var subTemplate = '<option id="{0}" value="{1}" {2}>{3}</option>';
		var subResultHtml = '';
		$.each(options.datas, function(index, item){
			var selected = item.selected || options.value == item.value  ? 'selected' : '';
			subResultHtml += $.format(subTemplate, item.id, item.value, selected, item.text);
		});
		subResultHtml = '<option value="">Chọn giá trị ...</option>' + subResultHtml;
		var resutlHtml = $.format(template, options.label, options.id, options.name, options.disabled ? 'disabled' : '', options.readonly ? 'readonly' : '', options.required ? 'required' : '', options.languagecontrol, options.dbfieldname, subResultHtml, options.help_block, options.required ? 'required' : '');
		return resutlHtml;
	};

	var _getHTMLTextarea = function (options) {
		options.input_icon = $.trim(options.input_icon) == '' ? 'fa fa-angle-right' : options.input_icon; 
		var template = '<div class="form-group">\
							<label class="col-md-3 control-label" for="{2}">{0}</label>\
							<div class="col-md-9">\
								<div class="input-icon">\
									<i class="{1}"></i>\
									<textarea rows="3" id="{2}" name="{3}" placeholder="{4}" class="form-control {5}" {6} {7} {8} data-languagecontrol="{9}" data-dbfieldname="{10}">{11}</textarea>\
								</div>\
								<span id="help-block-{2}" class="help-block">{12}</span>\
							</div>\
						</div>';
		var resutlHtml = $.format(template, options.label, options.input_icon, options.id, options.name, options.placeholder, options.cssclass, options.disabled ? 'disabled' : '', options.readonly ? 'readonly' : '', options.required ? 'required' : '', options.languagecontrol, options.dbfieldname, options.value, options.help_block);
		return resutlHtml;
	};

	var _getHTMLStatic = function (options) {
		var template = '<div class="form-group">\
							<label class="col-md-3 control-label">{0}</label>\
							<div class="col-md-9">\
								<p class="form-control-static" data-languagecontrol="{1}" data-dbfieldname="{2}">{3}</p>\
							</div>\
						</div>';
		var resutlHtml = $.format(template, options.label, options.languagecontrol, options.dbfieldname, options.value);
		return resutlHtml;
	};
	var _getHTMLStaticJoinString = function (options) {
		console.log(options);
		var template = '<div class="form-group">\
							<label class="col-md-3 control-label">{0}</label>\
							<div class="col-md-9">\
								<p class="form-control-static join-string" data-languagecontrol="{1}" data-dbfieldname="{2}" >{3}</p>\
							</div>\
						</div>';
		var resutlHtml = $.format(template, options.label, options.languagecontrol, options.dbfieldname, options.value);
		return resutlHtml;
	};

	var _getHTMLCheckbox = function (options) {
		var template = '<div class="form-group">\
							<label class="col-md-3 control-label">{0}</label>\
							<div class="col-md-9">\
								<div class="checkbox-list">\
									<label class="{1}"><input type="checkbox" id="{2}" name="{3}" value="{4}" {5} {6} {7} data-languagecontrol="{8}" data-dbfieldname="{9}"> {10} </label>\
								</div>\
								<span id="help-block-{2}" class="help-block">{11}</span>\
							</div>\
						</div>';
		var resutlHtml = $.format(template, options.label, options.cssclass, options.id, options.name, options.value, options.selected ? 'checked' : '', options.disabled ? 'disabled' : '', options.readonly ? 'readonly' : '', options.languagecontrol, options.dbfieldname, options.label, options.help_block);
		return resutlHtml;
	};

	var _getHTMLCheckboxList = function (options) {
		var template = '<div class="form-group">\
							<label class="col-md-3 control-label">{0}</label>\
							<div class="col-md-9">\
								<div class="checkbox-list">{1}</div>\
								<span id="help-block-{2}" class="help-block">{3}</span>\
							</div>\
						</div>';
		var subTemplate = '<label class="{0}"><input type="checkbox" id="{1}" name="{2}" value="{3}" {4} {5} {6} data-languagecontrol="{7}" data-dbfieldname="{8}"> {9} </label>';
		var subResultHtml = '';
		$.each(options.datas, function(index, item){
			subResultHtml += $.format(subTemplate, options.cssclass, item.id, options.name, item.value, item.selected ? 'checked' : '', options.disabled ? 'disabled' : '', options.readonly ? 'readonly' : '', options.languagecontrol, options.dbfieldname, item.text);
		});
		var resutlHtml = $.format(template, options.label, subResultHtml, options.id, options.help_block);
		return resutlHtml;
	};

	var _getHTMLTreeCheckbox = function (options) {
		var template = '<div class="form-group">\
							<label class="col-md-3 control-label">{0}</label>\
							<div class="col-md-9">\
								<div id="{1}-jstree" class="jstree-control {2}" data-url="{3}" data-multiple="{4}" data-initselected="{5}"></div>\
								<input id="{1}" name="{6}" type="hidden" data-languagecontrol="{7}" data-dbfieldname="{8}">\
								<span id="help-block-{1}" class="help-block">{9}</span>\
							</div>\
						</div>';
		var resutlHtml = $.format(template, options.label, options.id, options.cssclass, options.url, options.multiple, options.value, options.name, options.languagecontrol, options.dbfieldname, options.help_block);
		return resutlHtml;
	};

	var _getHTMLRadioList = function (options) {
		var template = '<div class="form-group">\
							<label class="col-md-3 control-label">{0}</label>\
							<div class="col-md-9">\
								<div class="radio-list">{1}</div>\
								<span id="help-block-{2}" class="help-block">{3}</span>\
							</div>\
						</div>';
		var subTemplate = '<label class="{0}"><input type="radio" id="{1}" name="{2}" value="{3}" {4} {5} {6} {7} data-languagecontrol="{8}" data-dbfieldname="{9}"> {10} </label>';
		var subResultHtml = '';
		$.each(options.datas, function(index, item){
			subResultHtml += $.format(subTemplate, options.cssclass, item.id, options.name, item.value, item.selected ? 'checked' : '', options.disabled ? 'disabled' : '', options.readonly ? 'readonly' : '', options.required ? 'required' : '', options.languagecontrol, options.dbfieldname, item.text);
		});
		var resutlHtml = $.format(template, options.label, subResultHtml, options.id, options.help_block);
		return resutlHtml;
	};

	var _getHTMLInputFile = function (options) {
		var template = '<div class="form-group">\
							<label class="control-label col-md-3">{0}</label>\
							<div class="col-md-9">\
								<input id="{1}-upload" name="{2}-upload" type="file" multiple class="file-loading input-images {3}" data-languagecontrol="{4}" data-dbfieldname="{5}">\
								<input id="{1}" name="{6}" type="hidden" data-languagecontrol="{4}" data-dbfieldname="{5}" data-listafter="{8}" data-lisaftertemplate="{9}">\
								<span id="help-block-{1}" class="help-block">{7}</span>\
							</div>\
						</div>';
		var nameUpload = options.name.replace('[', '').replace(']', '').toLowerCase();
		var resutlHtml = $.format(template, options.label, options.id, nameUpload, options.cssclass, options.languagecontrol, options.dbfieldname, options.name, options.help_block, options.show_list_after_upload ? 1:0, options.listTemplate);
		return resutlHtml;
	}

	var _getHTMLInputImages = function(options){
		var template = '<div class="form-group ">\
							<label class="control-label col-md-3">{0}</label>\
							<div class="col-md-9 div-parent-list-template">\
								<input id="{1}-upload" name="{2}-upload" type="file" multiple class="file-loading input-images {3}" data-languagecontrol="{4}" data-dbfieldname="{5}" data-initpreview="{6}" data-isnotrelationship="{11}" data-listtemplateexists="{12}">\
								<input id="{1}" name="{7}" type="hidden" data-languagecontrol="{4}" data-dbfieldname="{5}" value="{6}" data-listafter="{9}" data-lisaftertemplate="{10}">\
								<span id="help-block-{1}" class="help-block">{8}</span>\
							</div>\
						</div>';
		var nameUpload = options.name.replace('[', '').replace(']', '').toLowerCase();
		var resutlHtml = $.format(template, options.label, options.id, nameUpload, options.cssclass, options.languagecontrol, options.dbfieldname, options.value, options.name, options.help_block, options.show_list_after_upload ? 1:0, options.show_list_after_upload ? options.listTemplate: '', options.isNotRelationship ? 1:0, !$.isEmptyObject(options.list_template_exists) ? options.list_template_exists: '');
		return resutlHtml;
	};

	var _getHTMLEditor = function(options){
		var template = '<div class="form-group">\
							<label class="control-label col-md-3">{0}</label>\
							<div class="col-md-9">\
								<textarea id="{1}" name="{2}" class="summernote {3}" data-languagecontrol="{4}" data-dbfieldname="{5}">{6}</textarea>\
								<span id="help-block-{1}" class="help-block">{7}</span>\
							</div>\
						</div>';
		var resutlHtml = $.format(template, options.label, options.id, options.name, options.cssclass, options.languagecontrol, options.dbfieldname, options.value, options.help_block);
		return resutlHtml;
	};

	var _getHTMLInputTag = function(options){

	};

	var _getHTMLInputCalendar = function(){

	};

	var _sendFileEditor = function (file, editor, welEditable) {
            data = new FormData();
            data.append('name', 'editorfile');//You can append as many data as you want. Check mozilla docs for this
            data.append('editorfile', file);
            $.crazyifyAjax({
            	url: '/admin/uploads',
                type: "POST",
                data: data,
                contentType: false,
                processData: false,
                success: function(url) {
                    editor.insertImage(welEditable, url);
                }
            });
        }

	var _afterInit = function(){

		$(_dom).find("input.input-images").each(function (index, item) {
			var ctrlid = $(item).attr('id');
			var ctrlname = $(item).attr('name');
			var initpreview = $(item).data('initpreview');
			var isNotRelationship = $(item).data('isnotrelationship');
			initpreview = !$.isEmptyObject(initpreview) ? initpreview.toString().split(',') : [];
			var initPreviewData = [];
			var initPreviewConfig = [];
			$.each(initpreview, function (_index, _item) {
				if (_item != '') {
					var dbid = isNotRelationship == 1 ? 0 :  _item.split('|')[0];
					var path = isNotRelationship == 1 ? _item :  _item.split('|')[1];
					//path = path.replace('.', '-image(160x80-crop).');
					initPreviewData.push($.format('<img src="{0}" class="file-preview-image">', path));
					initPreviewConfig.push({
						caption: '&nbsp;',
						key: dbid,
						url: '/admin/uploads/destroy',
						extra: {data: _item, id: ctrlid, path: path}
					});
				};
			});

			//append list_template_exists
			var listTemplateExists = $(item).data('listtemplateexists');
			if(!$.isEmptyObject(listTemplateExists))
			{
				$(item).parents('.div-parent-list-template').append(listTemplateExists);
			}

			$(item).fileinput({
				uploadUrl: '/admin/uploads',
				uploadExtraData: {name: ctrlname, id: ctrlid},
				uploadAsync: true,
				minFileCount: 1,
				maxFileCount: 10,
				allowedFileExtensions: ['jpg', 'jpeg', "gif", "png"],
				maxFileSize: 5120,	// 5MB
				initialPreview: initPreviewData,
				initialPreviewConfig: initPreviewConfig,
				previewSettings: {image: {width: "160px", height: "auto"}},
				overwriteInitial: false				
			});
		});

		$(_dom).find("input.input-images").on('fileuploaded', function(event, data, previewId, index) {
			var ctrlid = data.extra.id.substr(0, data.extra.id.lastIndexOf('-upload'));
			var $control =  $('#' + ctrlid);
			var currentValue = $control.val();
			var newValue = data.response.initialPreview[0];
			newValue = newValue.match(/src=[\"'](.+?)[\"']/g).toString();
			newValue = newValue.replace('src=', '').replace(/"/g, '');
			var newOne = newValue;
			if (typeof currentValue != 'undefined' && currentValue != 'undefined' && currentValue != '') {
				newValue = $.format('{0},{1}', currentValue, newValue);
			};
			$control.val(newValue);
			//alert("dã load");
			var lisaftertemplate= $control.data('lisaftertemplate'); 
			if($control.data('listafter') == '1' && !$.isEmptyObject(lisaftertemplate))
			{
				var temp_i = $.format(lisaftertemplate,newOne, '');
				$control.parent().append(temp_i);				
			}
		});

		$(_dom).find("input.input-images").on('filedeleted', function(event, key, jqXHR, data) {
		    var ctrlid = data.id.substr(0, data.id.lastIndexOf('-upload'));
			var $control =  $('#' + ctrlid);
			var currentValue = $control.val();
		    var delStr = currentValue.indexOf(data.data) > 0 ? (','+ data.data) : data.data;
		    var newValue = currentValue.replace(delStr,'');
			$control.val(newValue);
		});
		
		$(_dom).find('.jstree-control').each(function (index, item) {
			$.crazyifyAjax({
				url: $(item).data('url'),
				type: 'GET',
				success: function (data, textStatus, jqXHR) {
					var initselected = $(item).data('initselected');
					initselected = initselected.toString().split(',');
					$.each(data, function (_index, _item) {
						if (_item.parent_id == 0) { _item.parent_id = '#' };
						_item.parent = _item.parent_id;
						_item.text = _item.name;

						if($.inArray(_item.id.toString(), initselected) != -1){
							_item.state = { selected: true }
						}
					});

					var ctrlid = $(item).attr('id').substr(0, $(item).attr('id').lastIndexOf('-jstree'));

					$(item).jstree({ 
						plugins: $(item).data('multiple') ? ['wholerow', 'checkbox', 'types'] : ['wholerow', 'types'],
						core : {
							multiple: $(item).data('multiple'),
							data : data
						}
					});
					$(item).on('changed.jstree', function (e, data) {
						$('#' + ctrlid).val(data.selected);
					});
				}
			});
		});

		$(_dom).find('textarea.summernote').summernote({
			height: 300,
			onImageUpload: function(files, editor, welEditable) {
                _sendFileEditor(files[0], editor, welEditable);
            }
		});
		if (typeof LayoutInit == 'function') {
			LayoutInit(true);
		};

	};

	// public functions
	return {

		//main function
		init: function (options) {

			var opts = {
				dom: null,
				commonControls: [],
				languageControls: [],
				commonData: {},
				languageDatas: []
			}

			$.extend(true, opts, options)
			_dom = opts.dom;

			// apply data for commonControls
			if (opts.commonControls.length && !$.isEmptyObject(opts.commonData)) {
				$.each(opts.commonControls, function (index, item) {
					if (item.dbfieldname == 'created_by') {
						opts.commonData.created_by = $.format('{0} - {1}', opts.commonData.created_by, opts.commonData.created_at);
					};
					if (item.dbfieldname == 'updated_by') {
						opts.commonData.updated_by = $.format('{0} - {1}', opts.commonData.updated_by, opts.commonData.updated_at);
					};
					if (item.dbfieldname == 'deleted_by') {
						opts.commonData.deleted_by = $.format('{0} - {1}', opts.commonData.deleted_by, opts.commonData.deleted_at);
					};

					if (item.type == 'checkbox'){
						item.selected = opts.commonData[item.dbfieldname] == '1' ? true : false;
					}
					else if (item.type == 'inputimages') {
						if(item.isNotRelationship == true )
						{
							item.value = !$.isEmptyObject(opts.commonData[item.dbfieldname]) ? opts.commonData[item.dbfieldname] : '';
						}	
						else
						{
							item.value = '';
							$.each(opts.commonData[item.dbfieldname], function (_index, _item) {
								item.value += $.format('{0}|{1},', _item.id, _item.path);
							});
							if (item.value.lastIndexOf(',') == (item.value.length - 1)) {
								item.value = item.value.substr(0, item.value.length - 1);
							};
						}
						// set lis_template_exists, chi khi option show = true && co template
						if(item.show_list_after_upload == true && !$.isEmptyObject(item.template_exists) )
						{
							var template_exists= item.template_exists; 
							var list_template_exists = '';
							$.each(opts.commonData[item.dbfieldname], function (_index, _item) {
								var template_exists_i = $.format(template_exists, _item.path, _item.id);
								// set value template dinamic by object
								for (x in _item) {
								    template_exists_i = template_exists_i.replace('[/'+x+']', _item[x]);
								}
								list_template_exists += template_exists_i;
							});
							item.list_template_exists = list_template_exists;				
						}
					}
					else if(item.type == 'treecheckbox'){
						if ($.isArray(opts.commonData[item.dbfieldname])) {
							item.value = $.map(opts.commonData[item.dbfieldname], function(n) {
								return n.id;
							});
						}
						else{
							item.value = opts.commonData[item.dbfieldname];	
						}
					}
					else if(item.type == 'staticjoinstring'){
						if ($.isArray(opts.commonData[item.dbfieldname])) {
							item.value = $.map(opts.commonData[item.dbfieldname], function(n) {
								return n[item.joinfield];
							});
						}
						else{
							item.value = opts.commonData[item.dbfieldname];	
						}
					}
					else{
						item.value = opts.commonData[item.dbfieldname];
					}
				});
			};

			$.getLanguages(function (data) {
				$.each(data, function (index, item) {
					if (opts.languageControls.length) {
						opts.commonControls.push(
							{
								'label': item.name,
								'type': 'divider'
							}
						);
					};
					$.each(opts.languageControls, function (_index, _item) {
						var languageControl = $.extend(true, {}, _item);
						languageControl.id = $.format('{0}_{1}', languageControl.id, item.code);
						languageControl.name = languageControl.name.replace('[locale]', $.format('[{0}]', item.code));
						languageControl.languagecontrol = item.code;
						opts.commonControls.push(languageControl);
					});
				});
			});

			// apply data for languageControls
			if (opts.commonControls.length && opts.languageDatas.length) {
				$.each(opts.commonControls, function (index, item) {
					if (typeof item.languagecontrol != 'undefined' || item.languagecontrol != 'undefined') {
						$.each(opts.languageDatas, function (_index, _item) {
							if (_item.locale == item.languagecontrol) {
								item.value = _item[item.dbfieldname];
								return false;
							};
						});
					};
				});
			};

			var resutlHtml = '';
			$.each(opts.commonControls, function(index, item){
				switch(item.type){
					case 'divider':
						resutlHtml += $.format('<h3 class="form-section">{0}</h3>', item.label);
						break;
					case 'text':
					case 'password':
					case 'datetime':
					case 'datetime-local':
					case 'date':
					case 'month':
					case 'time':
					case 'week':
					case 'number':
					case 'email':
					case 'url':
					case 'search':
					case 'tel':
					case 'color':
						resutlHtml += _getHTMLText(item);
						break;
					case 'select':
						resutlHtml += _getHTMLSelect(item);
						break;
					case 'textarea':
						resutlHtml += _getHTMLTextarea(item);
						break;
					case 'static':
						resutlHtml += _getHTMLStatic(item);
						break;
					case 'staticjoinstring':
						resutlHtml += _getHTMLStaticJoinString(item);
						break;
					case 'checkbox':
						resutlHtml += _getHTMLCheckbox(item);
						break;
					case 'checkboxlist':
						resutlHtml += _getHTMLCheckboxList(item);
					case 'treecheckbox':
						resutlHtml += _getHTMLTreeCheckbox(item);
						break;
					case 'radiolist':
						resutlHtml += _getHTMLRadioList(item);
						break;
					case 'inputfile':
					case 'file':
						resutlHtml += _getHTMLInputFile(item);
						break;
					case 'inputimages':
						resutlHtml += _getHTMLInputImages(item);
						break;
					case 'editor':
						resutlHtml += _getHTMLEditor(item);
						break;
					case 'inputtag':
						// chưa làm
						resutlHtml += _getHTMLInputTag(item);
						break;
					case 'calendar':
						// chưa làm
						resutlHtml += _getHTMLInputCalendar(item);
						break;
				};
			});
			$(_dom).append(resutlHtml);
			_afterInit();
		},
		getHTMLText: function (options) {
			return _getHTMLText(options);
		},
		getHTMLEmail: function (options) {
			return _getHTMLEmail(options);
		},
		getHTMLPassword: function (options) {
			return _getHTMLPassword(options);
		},
		getHTMLSelect: function (options) {
			return _getHTMLSelect(options);
		},
		getHTMLTextarea: function (options) {
			return _getHTMLTextarea(options);
		},
		getHTMLStatic: function (options) {
			return _getHTMLStatic(options);
		},
		getHTMLCheckboxList: function (options) {
			return _getHTMLCheckboxList(options);
		},
		getHTMLRadio: function (options) {
			return _getHTMLRadio(options);
		},
		getHTMLInputFile: function (options) {
			return _getHTMLInputFile(options);
		}
	};

}();

/***
Usage
***/
//CControl.init();
//CControl.doSomeStuff();