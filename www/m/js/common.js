$(function(){
	gnbOpen()//open
	commonBtnTab('tab_field');//form 내 tab기능
	commonBtnTab('mypage_type1');//우동맛 내 텝기능 전체, 미스티레쇼퍼, 스시노미식회, 체험단
	commonBtnTab('tab_type1');//우동맛 내 텝기능, 전체,모집중,마감
	popOpenClose();//팝업,open,close;
});

function gnbOpen(){
	var $header = $('#header');
	var $gnb = $('#gnb .gnb_wrap');
	var $gnbDim = $('#gnb .dim');

	$header.find('.bt_menu').on('click',function(){
		$gnb.add($gnbDim).addClass('active');
		$('html').addClass('scroll_no');
	});
	$gnb.find('.bt_close').on('click',function(){
		$gnb.add($gnbDim).removeClass('active');
		$('html').removeClass('scroll_no');
	});
	$gnbDim.on('click',function(){
		$gnb.add($gnbDim).removeClass('active');
		$('html').removeClass('scroll_no');
	})
	$gnb.find('> ul > li > button').on('click',function(e){
		e.preventDefault();
		$(this).closest('li').toggleClass('active').siblings().removeClass('active');
		$(this).next().stop().slideToggle();
		$(this).closest('li').siblings().find('ul').stop().slideUp();
	});
}

function commonBtnTab(t){
	var $targetWrap = $('.'+t);
	$('.'+t).find('button, a').on('click',function(){
		$(this).addClass('active').siblings().removeClass('active');
	})
}

function popOpenClose(){
	var $btnPopOpen = $('.pops_btn');
	var $btnPopClose = $('.bt_pop_close');

	$btnPopOpen.on('click',function(){
		$('html').addClass('scroll_no');
		$(this).next().addClass('active');
	});

	$btnPopClose.on('click',function(){
		$('html').removeClass('scroll_no');
		$(this).closest('.pops_open').removeClass('active');
	});
}