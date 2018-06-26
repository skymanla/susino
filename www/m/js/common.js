$(function(){
	

	gnbOpen()//open


	//slideSwiper();//slide
});


function slideSwiper(){
	var swiper = new Swiper('.swiper-container', {
		slidesPerView: 1,
		//사이여백
		//spaceBetween: 30,
		loop: true,
		autoplay: {
			delay: 2000,
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
			delay: 800,
		},
		speed:400,
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




function gnbOpen(){
	var $header = $('#header');
	var $gnb = $('#gnb');

	$header.find('.bt_menu').on('click',function(){
		$gnb.addClass('active');
		$('html').addClass('scroll_no');
	});
	$gnb.find('.bt_close').on('click',function(){
		$gnb.removeClass('active');
		$('html').removeClass('scroll_no');
	});
	$gnb.find('> ul > li > button').on('click',function(e){
		e.preventDefault();
		$(this).next().stop().slideToggle();
		$(this).closest('li').siblings().find('div').stop().slideUp();
	})
}