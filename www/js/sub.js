$(function (){
	gnbAC('sub');
	headerAC1();
	fileUpAc1('file_up1');

	sliderSubAc1('.new_map_info .info_slide');

	subTabSlide1();
	sliderSubAc2('.s3_wrap1 .section1 .slider_wrap .series1');
	sliderSubAc2('.s3_wrap1 .section1 .slider_wrap .series2');
	sliderSubAc2('.s3_wrap1 .section1 .slider_wrap .series3');
	sliderSubAc2('.s3_wrap1 .section1 .slider_wrap .series4');
	subTabScroll1('.s3_wrap1 .section_top .bt_wrap > div a');

	boxHoverAC1('.s3_wrap1 .section2 .bt_wrap > div > div');
	boxHoverAC1('.wrap_bigban > li');
	boxHoverAC1('.ban_style_s2 .in_style');
	boxHoverAC1('.ban_style_s2 .hover_view');

	myNoticeRoll();
});

function headerAC1(){
	var $target = $('#header');
	$(window).scroll(function (){
		$(this).scrollTop() > 100 ? $target.addClass('active') : $target.removeClass('active');
	}).scroll();

	$('.gnb_bt_all').on('click',function(){
		$target.removeClass('active');
	});
}

function fileUpAc1(dataname){
	var _DataInput = '#'+dataname+'_data',
		_TextInput = '#'+dataname+'_text';
	$(document).on('click','#'+dataname,function(){
		$(_DataInput).trigger('click')
	});

	$(_DataInput).on('change',function (){
		var fileValue = this.value.split('\\'),
			fileName = fileValue[fileValue.length-1];
			$(_TextInput).val(fileName);
	});
}

function snsAc1(n,t,h,nh,nu,nurl){
	$(t).dcSocialStream({
		feeds: {
			instagram: {
				id: h,
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
		limit:n,
		noHash : nh,
		noUser : nu,
		remove : nurl,
		control: false,
		filter: false,
		wall: true,
		order: 'date',
		max: 'limit',
		iconPath: '',
		imagePath: ''
	});
}

function sliderSubAc1(t){
	var $bxTar = $(t);
	var maxNum = $bxTar.find('.roll li').length;
	var visualSlide = $bxTar.find('.roll').bxSlider({
		mode:'horizontal',
		auto:false,
		infiniteLoop: false,
		slideWidth: 320, // 이미지 하나당 최대넓이
		slideMargin: 20, //마진값
		pause:2500,
		speed:500,
		autoDelay:0,
		minSlides: 3,
		maxSlides:3,
		moveSlides:1,
		//startSlide:0,
		controls:true,
		pager:false,
		useCSS: false,
		onSlideBefore:function(a,b,c){
			console.log(maxNum+' / '+c);
			if(c==0){
				$bxTar.find('.bx-prev').addClass('active');
			} else if(c==(maxNum-3)){
				$bxTar.find('.bx-next').addClass('active');
			} else {
				$bxTar.find('.bx-prev').add('.bx-next').removeClass('active');
			}
		},
	});
	$(window).on('resize', function() {
		visualSlide.stop().reloadSlider();
	});
}

function subTabSlide1(){
	$('.s3_wrap1 .section1 .bt_wrap > div').on('click',function(){
		var tN = $(this).index();
		$(this).addClass('active').siblings().removeClass('active');
		$('.s3_wrap1 .section1 .slider_wrap > div').eq(tN).addClass('active').siblings().removeClass('active');
	});
}

function subTabScroll1(t){
	$(t).on('click',function(e){
		e.preventDefault();
		var taget = $(this).attr('href');
		var tTop = $(taget).offset().top;
		$('html, body').animate( { scrollTop : tTop-50 }, 400);
	});
}

function sliderSubAc2(t){
	var $bxTar = $(t);
	var maxNum = $bxTar.find('.roll li').length;
	var visualSlide = $bxTar.find('.roll').bxSlider({
		mode:'horizontal',
		auto:false,
		infiniteLoop: false,
		pause:2500,
		speed:500,
		autoDelay:0,
		minSlides: 1,
		maxSlides:1,
		moveSlides:1,
		//startSlide:0,
		controls:true,
		pager:false,
		useCSS: false,
		onSlideBefore:function(a,b,c){
			console.log(maxNum+' / '+c);
			if(c==0){
				$bxTar.find('.bx-prev').addClass('active');
				$bxTar.find('.bx-next').removeClass('active');
			} else if(c==(maxNum-1)){
				$bxTar.find('.bx-prev').removeClass('active');
				$bxTar.find('.bx-next').addClass('active');
			} else {
				$bxTar.find('.bx-prev').add('.bx-next').removeClass('active');
			}
		},
	});
	$(window).on('resize', function() {
		visualSlide.stop().reloadSlider();
	});
}

function boxHoverAC1(t){
	$(t).on('mouseenter focusin',function(){
		$(this).addClass('active');
	}).on('mouseleave focusout',function(){
		$(this).removeClass('active');
	});
}

function popOpenAc1(t,i,m){
	$(t).find('img').attr('src',i);
	$(t).fadeIn().css('margin-top',m);

}

function popCloseAc1(t){
	$(t).fadeOut(300);
	setTimeout(function(){$(t).css('margin-top','')}, 300);

}

function myNoticeRoll(){
	var $bxTar = $('.my_notice_roll_wrap .roll_wrap');
	var visualSlide = $bxTar.find('.roll').bxSlider({
		mode:'vertical',
		auto:true,
		pause:2500,
		speed:600,
		autoDelay:0,
		minSlides: 1,
		maxSlides:1,
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

	$('.my_notice_roll_wrap .bt_wrap button').on('click',function (){
		var arroTxt = $(this).attr('class');
		visualSlide.stopAuto();
		if(arroTxt=='prev'){
			visualSlide.goToPrevSlide();
		} else {
			visualSlide.goToNextSlide();
		}
		visualSlide.startAuto();
	});
}