$(function (){
	//imgHeading()//Ÿ��Ʋ �̹��� ��Ÿ��
	listBtnToggle('list_s1 > li > a') //���� list
});

function imgHeading(){
	var $imgWrap = $('.hd_s1 h2'),
				$img = $imgWrap.find('img'),
				$imgHei = $imgWrap.find('img').outerHeight();
				var topPos = $img.outerHeight()/2;
				var leftPos = $img.outerWidth()/2;
				$img.css({width:leftPos,height:topPos});	
}

function listBtnToggle(t) {
	$('.'+t).on('click',function(){
		$('.'+t).next().stop().slideUp();
		$(this).next().stop().slideToggle();
	})
}