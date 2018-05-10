$(function(){
	scrollAc1();
	checkedAc1();
});
function gnbAC(s){
	var $gnbTarPar = $('.gnb');
	var $gnbTar = $('.gnb > li');
	$gnbTar.on('mouseenter focusin',function(){
		$gnbTar.removeClass('active');
		$(this).addClass('active');
		if(s){
			$('.cs_nav').removeClass('active');
		}
	}).on('mouseleave focusout',function(){
		$(this).removeClass('active');
		if(s){
			if(a_num != ''){
				$gnbTar.eq(a_num).addClass('active');
			}
			$('.cs_nav').addClass('active');
		}
	});
}

function scrollAc1(){
	var wH = $(window).height();
	$(window).resize(function (){
		wH = $(window).height();
	});
	$(window).scroll(function (){
		var wTop = $(this).scrollTop();
		$('.scroll_ani').each(function (){
			if($(this).offset().top < wTop+wH-200){
				$(this).addClass('scroll_show');
			}
		});
	}).scroll();
}


function checkedAc1(){
	$('[type="radio"]').each(function (){
		if($(this).prop('checked')){
			$(this).parents('.jquery_checked').find('label').removeClass('active');
			$(this).parents('.radio_box_wrap').find('label').removeClass('active');
			$(this).next('label').addClass('active');
		}
		$(this).on('click',function(){
			$(this).parents('.jquery_checked').find('label').removeClass('active');
			$(this).parents('.radio_box_wrap').find('label').removeClass('active');
			if($(this).prop('checked')){
				$(this).next('label').addClass('active');
			} else {
				$(this).next('label').removeClass('active');
			}
		});
	});

	
	$('[type="checkbox"]').each(function (){
		if($(this).prop('checked')){
			$(this).next('label').addClass('active');
		}
		$(this).on('click',function(){
			if($(this).prop('checked')){
				$(this).next('label').addClass('active');
			} else {
				$(this).next('label').removeClass('active');
			}
		});
	});
}