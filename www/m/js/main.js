$(function (){
	gnbScroll()//gnb scroll
	slideSwiper();//slide
});

function gnbScroll(){
	$(window).on('scroll',function(){
		var scrollTop = $(window).scrollTop();
		if (scrollTop > 90) $('#header').addClass('scroll');
		else $('#header').removeClass('scroll');
	});
}

function slideSwiper(){
	var swiper = new Swiper('.swiper-container', {
		slidesPerView: 1,
		//사이여백
		//spaceBetween: 30,
		loop: true,
		autoplay: {
			delay: 3000,
		},
		speed:1000,
		pagination: {
			el: '.swiper-pagination',
			clickable: true,
		},
	});

	var swiper2 = new Swiper('.swiper-container-type', {
		slidesPerView: 1,
		loop: true,
		spaceBetween: 30,
		autoplay: {
			delay: 2000,
		},
		speed:1000,
		pagination: {
			el: '.swiper-pagination-sec',
			clickable: true,
		},
		navigation: {
			nextEl: '.next_bt',
			prevEl: '.prev_bt',
		},
	});
}
