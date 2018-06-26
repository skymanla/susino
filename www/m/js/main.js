$(function (){
	gnbScroll()//gnb scroll
});

function gnbScroll(){
	$(window).on('scroll',function(){
		var scrollTop = $(window).scrollTop();
		if (scrollTop > 90) $('#header').addClass('scroll');
		else $('#header').removeClass('scroll');
	});
}