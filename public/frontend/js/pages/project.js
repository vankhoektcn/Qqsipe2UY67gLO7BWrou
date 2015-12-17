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
        jQuery('#rightMenuScrollspy a:not(.dropdown-toggle), #home a').bind('click', function(event) {
			var $anchor = $(this);
			jQuery('html, body').stop().animate({
				scrollTop: $($anchor.attr('href')).offset().top
			}, 1500, 'easeInOutExpo');
			event.preventDefault();
		});
		$(window).scroll(function () {
			crazyify.project.CheckShowRightMenu();
		})
	},
	CheckShowRightMenu: function () {
		if ($('ul.cl-effect-1').is(":inView")) {
			$('nav#rightMenuScrollspy').removeClass('in');
		}
		else{
			$('nav#rightMenuScrollspy').addClass('in');
		}
	},
};

$(function () {
	crazyify.project.init();
});