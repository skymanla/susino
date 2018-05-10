$(function (){
	gnbAC();
	visualAc();
	//noticeRoll();
	boxHoverAC1();
	//snsAc1();
});

function visualAc(){
	var $bxTar = $('#visual');
	var visualSlide = $bxTar.find('.roll').bxSlider({
		mode:'horizontal',
		auto:true,
		pause:5500,
		speed:600,
		autoDelay:0,
		maxSlides:1,
		moveSlides:1,
		//startSlide:0,
		controls:false,
		//pager:false,
		useCSS: false
	});
	$(window).on('resize', function() {
		visualSlide.stop().reloadSlider();
	});


	$bxTar.on('mouseenter focusin', function() {
		visualSlide.stopAuto();
	});

	$bxTar.on('mouseleave focusout', function() {
		visualSlide.startAuto();
	});
}

function noticeRoll(){
	var $bxTar = $('.not_event .notice');
	var visualSlide = $bxTar.find('.roll').bxSlider({
		mode:'vertical',
		auto:true,
		pause:2500,
		speed:600,
		autoDelay:0,
		minSlides: 3,
		maxSlides:3,
		moveSlides:1,
		//startSlide:0,
		controls:false,
		pager:false,
		useCSS: false
	});
	$(window).on('resize', function() {
		visualSlide.stop().reloadSlider();
	});

	$bxTar.on('click touchend', function() {
		visualSlide.stopAuto();
		visualSlide.startAuto();
	});
}

function boxHoverAC1(){
	$('.box_active > div > div').on('mouseenter focusin',function(){
		$(this).addClass('active');
	}).on('mouseleave focusout',function(){
		$(this).removeClass('active');
	});
}

function snsAc1(){
	var wH = $(window).height();
	$(window).resize(function (){
		wH = $(window).height();
	});
	$(window).scroll(function (){
		var wTop = $(this).scrollTop();
		if($('#social-stream').offset().top < wTop+wH-200){
			$('#social-stream').dcSocialStream({
				feeds: {
					instagram: {
						id: '#스시노백쉐프',
						intro: 'Posted',
						search: 'Search',
						out: 'intro,thumb,text,user,meta',
						text: 'contentSnippet',
						accessToken: '186786085.3a81a9f.a0716c493a5042fb8122151735e898e4',
						clientId: '91dbf99a184e43dca3cc115500a5ba58',
						thumb: 'low_resolution',
						comments: 0,
						likes: 0,
						icon: ''
					}
				},
				rotate: {
					delay: 0
				},		
				limit:6,
				control: false,
				filter: false,
				wall: true,
				order: 'random',
				max: 'limit',
				iconPath: '',
				imagePath: ''
			});
		}
	}).scroll();
}