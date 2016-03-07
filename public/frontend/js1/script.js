/*!
 * Helping Hands v.1.0.0
 * Copyright 2014 Artex Solutions.
 * 
 */


jQuery(document).ready(function($){

	"use strict";

	/**** Create Fixed on page scroll ***/
	function scrolledHeader(){

		var tp = $('.tp-bar').height();
		
		if ( $(document).scrollTop() > tp){
			$('.logo-bar').addClass('sticky-bar');
		}
		else {
			$('.logo-bar').removeClass('sticky-bar');
		}
	}
	scrolledHeader();


	if( $('.count-down').length) {
		//counter
		$('.count-down').dsCountDown({
			endDate: new Date("December 24, 2014 23:59:00")
		});
	}

	if($("a[data-rel^='prettyPhoto']").length){
		$("a[data-rel^='prettyPhoto']").prettyPhoto({
			animation_speed:'normal',
			slideshow:3000,
			autoplay_slideshow: false,
			social_tools: false
		});
	}

	function caroSlider1(){
		if ($('.caro-1-col .caro-slider-ul').length) {
					
			$('.caro-1-col .caro-slider-ul').each(function() {
						var thisparent = $(this).parent();
						$(this).carouFredSel({
								auto: false,
								responsive: true,
								width: '100%',
								scroll: 1,
								items: {
									width: 370,
									visible: {
										min: 1,
										max: 1
									}},
								mousewheel: false,
								swipe: {
									onMouse: true,
									onTouch: true
								},
								prev: $('.caro-prev', thisparent),
								next: $('.caro-next', thisparent),
								pagination: $('.caro-pagination', thisparent)
								});
					});
			
			}
	}

	function caroSlider2(){
		if ($('.caro-fade .caro-slider-ul').length) {
					
			$('.caro-fade .caro-slider-ul').each(function() {
						var thisparent = $(this).parent();
						$(this).carouFredSel({

								auto: false,
								responsive: true,
								width: '100%',
								scroll: {
									items: 1,
									fx : "fade",
									easing : "linear",
									duration : 800,
									timeoutDuration : 2000
								},
								items: {
									width: 370,
									visible: {
										min: 1,
										max: 1
									}},
								mousewheel: false,
								swipe: {
									onMouse: true,
									onTouch: true
								},
								prev: $('.caro-prev', thisparent),
								next: $('.caro-next', thisparent),
								pagination: $('.caro-pagination', thisparent)
								});
					});
			
			}
	}

	caroSlider1();
	caroSlider2();

	$("[data-toggle=tooltip]").tooltip();

	$('.accordion').collapse();

	$('.panel-collapse').on('show.bs.collapse',function(){
		$(this).prev('.panel-heading').find('.panel-title').addClass("active-heading");
	});
	
	$('.panel-collapse').on('hide.bs.collapse',function(){
		$(this).prev('.panel-heading').find('.panel-title').removeClass("active-heading");
	});
	

	/*** Elements Animation ***/
	$('.animated').appear(function(){
		var el = $(this);
		var anim = el.data('animation');
		var animDelay = el.data('delay');
		if (animDelay) {

			setTimeout(function(){
				el.addClass( anim + " in" );
				el.removeClass('out');
			}, animDelay);

		}

		else {
			el.addClass( anim + " in" );
			el.removeClass('out');
		}    
		},{accY: -150});

	/*** Animate Progess bar ***/
	$('.progress').each(function () {

		var progress = $(this);

		progress.appear(function () {

			var progressBar = $(this),

			percent = progressBar.find('.progress-bar').attr('aria-valuenow'),
			centVal = percent + '%';
			progressBar.find('span.current-val').text(centVal);
			
			progressBar.find('.progress-bar').animate({
				width: percent + '%'
			}, 800);

		});
	});


	/*** Animate Sketched Progress ***/
	$('.sketched-progress').appear(function () {

			var progressBar = $(this),

			percent = progressBar.find('span.current-val').data('current-val');
			
			progressBar.find('.progress-fill').animate({
				height: percent + '%'
			}, 800);

	});


	/*** Navigation in responsive layouts 
	--------------------------------------------------- ****/
	$('.navbar .navbar-nav').clone(true).appendTo('body').removeClass('navbar-nav nav').addClass('tablet-main-nav').wrap('<nav class="nav-tablet"></nav>');
	$('.nav-tablet').append('<span class="nav-button"></span>');
	if ( $('.site-header-2').length) {
		$('.tp-bar .container').append('<span class="nav-button"></span>');
	}
	
	
	$('.nav-tablet').find('li.active').removeClass('active');
	$('.nav-tablet').find('.caret').remove();

	$('.tablet-main-nav li').has('ul').addClass('has-ul');
	$('.tablet-main-nav li.has-ul > a').on('click', this, function(e){
		$(this).next('ul').toggle();
		$(this).toggleClass('open');
		e.preventDefault();
	});

	$('.navbar .nav-button, .tp-bar .container .nav-button').on('click', this, function(){
		
		$('.nav-tablet').addClass('open');

	});

	$('.nav-tablet .nav-button').on('click', this, function(){
		
		$('.nav-tablet').removeClass('open');

	});


	/**** Scroll to top button ***/
	var offset = 200;
	var duration = 600;
	$(window).scroll(function() {
		if ( $(this).scrollTop() > offset) {
		$('a.scroll-up').fadeIn(duration);
		} else {
			$('a.scroll-up').fadeOut(duration);
		}
	
	scrolledHeader();
	
	});
	
	$('a.scroll-up').click(function(e) {
		e.preventDefault();
		$('html, body').animate({scrollTop: 0}, duration);
		return false;
	});

	$('.search-btn').on('click', this, function(){
		$(this).toggleClass('open');
		$('.search-contain').toggleClass('open');
	});

	$('.nav-button-desk').on('click', this, function(){
		$('.site-header-2 .navbar-default').toggleClass('open');
	});



});


jQuery(document).ready(function($){

	$('#contactform_form').submit(function(){

		var action = $(this).attr('action');

		$("#message").slideUp(750,function() {
		$('#message').hide();

 		$('#submit_btn')
			.after('<img src="images/AjaxLoader.gif" class="loader" />')
			.attr('disabled','disabled');
		
		$.ajax({
			url: 'contact.php',
			type: 'POST',
			data: {
					contact_name: $('#contact_name').val(),
					contact_email: $('#contact_email').val(),
					//contact_website: $('#contact_website').val(),
					contact_subject: $('#contact_subject').val(),
					contact_message: $('#contact_message').val(),
				},
			success: function(data){
				document.getElementById('message').innerHTML = data;
				$('#message').slideDown('slow');
				$('#contactform_form img.loader').fadeOut('slow',function(){$(this).remove()});
				$('#submit_btn').removeAttr('disabled');
				if(data.match('success') != null) $('#contactform_form').slideUp('slow');
			}
		});
		/*$.post(action, {
			contact_name: $('#contact_name').val(),
			contact_email: $('#contact_email').val(),
			//contact_website: $('#contact_website').val(),
			contact_subject: $('#contact_subject').val(),
			contact_message: $('#contact_message').val(),

		},
			function(data){
				document.getElementById('message').innerHTML = data;
				$('#message').slideDown('slow');
				$('#contactform_form img.loader').fadeOut('slow',function(){$(this).remove()});
				$('#submit_btn').removeAttr('disabled');
				if(data.match('success') != null) $('#contactform_form').slideUp('slow');

			}
		);*/

		});

		return false;

		return false;
	});

});

