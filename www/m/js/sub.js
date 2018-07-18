$(function (){
	//imgHeading()//Ÿ��Ʋ �̹��� ��Ÿ��
	listBtnToggle('list_s1 > li > button'); //���� list
	//imgChangTab();//�ʹ� �󼼸޴� txt.img ü���� tab
	mapInfoToggle();//�� ���� ���ڵ�� �޴�
	mapOpen();//���̴�, ����Ʈ, ����ũ �� ����
	swiperSwipeStyle();//�������� ������

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



function imgChangTab() {
	var $btnImgSlect = $('#ssi_select_list');
	$btnImgSlect.on('change',function(){
		var selectTxt = $(this).find('option:selected').text();
		var selectIdx = $(this).find('option:selected').index();
		$(this).prev().text(selectTxt);
		$(this).closest('.img_select').next().find(' > li').eq(selectIdx).addClass('on').siblings().removeClass('on');
	});
}

function mapInfoToggle(){
	var $toggleBtn = $('.map_search_wrap .list_wrap .list_box > div');
	$(document).on('click','.map_search_wrap .list_wrap .list_box > div',function(){
		$(this).siblings().find('section').stop().slideUp();
		$(this).find('section').stop().slideToggle();
		
		
	})
}

function mapOpen(){
	var $btMapOpen = $('.bt_map_open');
	var $mapsWrap = $('.map_open');
	$btMapOpen.on('click',function(){
		$mapsWrap.addClass('active');
	});
}

function swiperSwipeStyle(){
  var swiper = new Swiper('.swiper-container', {
      slidesPerView: 1,
	  //���̿���
      //spaceBetween: 30,
      loop: true,
	  autoplay: {
		delay: 5000,
	  },
	  speed:1000,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      //navigation: {
        //nextEl: '.swiper-button-next',
        //prevEl: '.swiper-button-prev',
      //},
    });
	var $tarTab = $('.s_tab li');
	var swiper = new Swiper('.swiper-container-tab', {
		slidesPerView: 1,
		loop: true,
		autoplay: {
			delay: 6000,
		},
		speed:1000,
		pagination: {
			el: '.swiper-pagination',
			clickable: true,
		},
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},
		on: {
				slideChange: function(){
					var n = this.realIndex;
					$tarTab.eq(n).addClass('active').siblings().removeClass('active');
				}
			}
	});
	$tarTab.find('button').on('click',function(){
			swiper.autoplay.stop();
			var tabIdx = $(this).parent().index();
			$(this).closest('li').addClass('active').siblings().removeClass('active');
			swiper.slideTo(tabIdx + 1);
		});
	

}