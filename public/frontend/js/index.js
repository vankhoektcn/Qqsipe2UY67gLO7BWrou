if (typeof crazyify == 'undefined') var crazyify = {};
if (typeof crazyify.index == 'undefined') crazyify.index = {};
crazyify.index = {
    init: function () { var thisObj = crazyify.index; thisObj.events(); },
    events: function () {
        var thisObj = crazyify.index;
        $('.flexslider').flexslider({
            animation: "slide"
        });
        $("#flexiselDemo3").flexisel({
            visibleItems: 5, animationSpeed: 1000, autoPlay: true, autoPlaySpeed: 3000, pauseOnHover: true, enableResponsiveBreakpoints: true, responsiveBreakpoints: { portrait: { changePoint: 480, visibleItems: 2 }, landscape: { changePoint: 640, visibleItems: 3 }, tablet: { changePoint: 768, visibleItems: 3 } }
        });
    }
};
$(function () {
    crazyify.index.init();
});