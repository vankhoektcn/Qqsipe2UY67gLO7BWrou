if (typeof crazyify == 'undefined')
	var crazyify = {};
if (typeof crazyify.project == 'undefined')
	crazyify.project = {};

crazyify.project = {
	init: function () 
	{
		var thisObj = crazyify.project;
		thisObj.events();
	},
	events: function () {
		var thisObj = crazyify.project;
		$('.flexslider').flexslider({
            animation: "slide"
        });
        jQuery('#rightMenuScrollspy a:not(.dropdown-toggle), ul#project-menu a.scroll, #home a').bind('click', function(event) {
			var $anchor = $(this);
			jQuery('html, body').stop().animate({
				scrollTop: $($anchor.attr('href')).offset().top
			}, 1500, 'easeInOutExpo');
			event.preventDefault();
		});
		$(window).scroll(function () {
			crazyify.project.CheckShowRightMenu();
		});
		$(document).on('click', 'a.btnCloseContactForm', function () {
			$('#subscribe-form').slideUp();
		});		
		$(document).on('click', '.btnSendContact', function () {
			if( $.isEmptyObject($("#subscribe-form input[name='full_name']").val()) 
				|| $.isEmptyObject($("#subscribe-form input[name='email']").val())
				|| $.isEmptyObject($("#subscribe-form input[name='phone']").val()))
			{
				toastr["error"]("Vui lòng điền đầy đủ Tên, Email và Điện thoại.");
				return;
			}
			var dataContact = {
				'Contact[full_name]': $("#subscribe-form input[name='full_name']").val(),
				'Contact[email]': $("#subscribe-form input[name='email']").val(),
				'Contact[phone]': $("#subscribe-form input[name='phone']").val(),
				'Contact[subject]': $("#subscribe-form input[name='subject']").val(),
				'Contact[content]': $("#subscribe-form input[name='content']").val(),
				'_token': $("#subscribe-form input[name='_token']").val(),
			};
			$.ajax({
				url: '/lien-he.html',
				type: 'POST',
				data: dataContact,
				success: function (data, textStatus, jqXHR) {
					if(data && data.success)
						toastr["success"]("Chúng tôi sẽ chủ động cập nhật thông tin mới nhất đến bạn.","Đăng ký thành công");
					else
						toastr["error"]("Vui lòng thử lại.");
				},
				error: function (xhr,status,error) {
					toastr["error"]("Vui lòng kiểm tra đường truyền và thử lại.");
				}
			});
		});
		$(document).on('click', 'a.close-auto-menu', function () {
			if (!$(this).hasClass("close-auto-menu-out")) {
				$(this).addClass('close-auto-menu-out');
				$('i',$(this)).removeClass('fa-angle-double-left');
				$('i',$(this)).addClass('fa-angle-double-right');
				$('i',$(this)).attr('title','Hiện menu');
				$('nav#rightMenuScrollspy').removeClass('in');
			}
			else
			{
				$(this).removeClass('close-auto-menu-out');
				$('i',$(this)).addClass('fa-angle-double-left');
				$('i',$(this)).removeClass('fa-angle-double-right');
				$('i',$(this)).attr('title','Ẩn menu');
				$('nav#rightMenuScrollspy').addClass('in');
			}
		});
	},
	CheckShowRightMenu: function () {
		if (!$('a.close-auto-menu').hasClass("close-auto-menu-out")) {
			if (!$('ul.cl-effect-1').is(":inView") && !$('a.close-auto-menu').hasClass("close-auto-menu-out")) {
				var page_content_width = $(".page-content").width();
				if(window.innerWidth > ( page_content_width + 240))
				{
					$('nav#rightMenuScrollspy').addClass('in');
				}
				else{
					$('nav#rightMenuScrollspy').removeClass('in');
				}
			}
			else{
				$('nav#rightMenuScrollspy').removeClass('in');
			}
		}
	},
};

$(function () {
	crazyify.project.init();
});