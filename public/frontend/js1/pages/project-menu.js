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
		$(document).on('click', 'a.close-auto-menu', function () {
			if (!$(this).hasClass("close-auto-menu-out")) {
				$(this).addClass('isClick');
				crazyify.project.showLinkActiveRightMenu(false);
			}
			else
			{
				$(this).removeClass('isClick');
				crazyify.project.showLinkActiveRightMenu(true);			
			}
		});
	},
	showLinkActiveRightMenu: function(isShow){
		var _aCloseMenu = $('a.close-auto-menu');
		if(isShow)
		{
			$(_aCloseMenu).removeClass('close-auto-menu-out');
			$('i',$(_aCloseMenu)).addClass('fa-angle-double-left');
			$('i',$(_aCloseMenu)).removeClass('fa-angle-double-right');
			$('i',$(_aCloseMenu)).attr('title','Ẩn menu');
			$('nav#rightMenuScrollspy').addClass('in');
		}
		else
		{
			$(_aCloseMenu).addClass('close-auto-menu-out');
			$('i',$(_aCloseMenu)).removeClass('fa-angle-double-left');
			$('i',$(_aCloseMenu)).addClass('fa-angle-double-right');
			$('i',$(_aCloseMenu)).attr('title','Hiện menu');
			$('nav#rightMenuScrollspy').removeClass('in');
		}
	},
	CheckShowRightMenu: function () {
		if (!$('a.close-auto-menu').hasClass("isClick")) {//.hasClass("close-auto-menu-out")) {
			if (!$('div#main-menu').is(":inView") ) {// && !$('a.close-auto-menu').hasClass("close-auto-menu-out")) {
				var page_content_width = $("#project-container").width();
				if(window.innerWidth >= 1350)//if(window.innerWidth > ( page_content_width + 240))
				{
					crazyify.project.showLinkActiveRightMenu(true);
				}
				else{
					crazyify.project.showLinkActiveRightMenu(false);
				}
			}
			else{
				crazyify.project.showLinkActiveRightMenu(false);
			}
		}
	},
};

$(function () {
	crazyify.project.init();
});