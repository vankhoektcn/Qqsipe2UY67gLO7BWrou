if(typeof crazyify=='undefined')var crazyify={};
crazyify.masterpage={
	init:function(){
		var thisObj=crazyify.masterpage;thisObj.events();
		$('img.lazy').lazy();
	},
	events:function(){
		var thisObj=crazyify.masterpage;
		$("span.menu").click(function(){$(".head-nav ul").slideToggle(300,function(){});});
		$("#banner-slide").responsiveSlides();
		$("#slider").responsiveSlides({auto:true,nav:true,speed:500,namespace:"callbacks",pager:true,});
		$('.number').keyup(function(e){if(/\D/g.test(this.value)){this.value=this.value.replace(/\D/g,'');}});
	}
};var isValidControl=function($obj,type){var value=true;switch(type){case"null":if($obj&&(!$obj.val()||$obj.val().trim()=='')){value=false;}break;}var $group=$obj.parents(".form-group");if(!value){$group.addClass("has-error");$('.error-label',$group).slideDown();}else{$group.removeClass("has-error");$('.error-label',$group).slideUp();}return value;};var removeError=function($parent){if($parent){$(".has-error",$parent).each(function(){$(this).removeClass("has-error");$('.error-label',$(this)).slideUp();});}else{$(".has-error").each(function(){$(this).removeClass("has-error");$('.error-label',$(this)).slideUp();});}};
$(function(){crazyify.masterpage.init();});