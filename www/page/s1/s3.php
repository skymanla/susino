<?php include_once "../../_head.php";?>

<style type="text/css">
<!--
*{padding:0;margin:0;}
html{overflow-y:hidden;}
html, body,#wrap, #contents, #contents.w1{height:100%;padding:0;}
footer{z-index:5;position:relative;}
#con_slide_wrap1{overflow:hidden;width:100%;height:100%;padding-top:150px;}
#con_slide_wrap1.active{overflow:hidden;width:100%;height:100%;padding-top:50px;}
#con_slide_wrap1 > div{position:relative;height:100%;overflow:hidden;}
#con_slide_wrap1 .bt_wrap{
	z-index:3;position:absolute;top:50%;left:20px;width:50px;padding-top:10px;height:auto;text-align:center;
	background:rgba(0, 0, 0, 0.5);
	-moz-border-radius:30px;
	-webkit-border-radius:30px;
	border-radius:30px;
}
#con_slide_wrap1 .bt_wrap button{
	display:block;width:22px;height:22px;border:3px solid #000;margin:0 auto 10px;background-color:#000;text-align:center;color:#000;font-size:12px;font-weight:bold;outline:0;
	-moz-border-radius:16px;
	-webkit-border-radius:16px;
	border-radius:16px;
	-o-transition:all 0.2s ease-in-out;
	-moz-transition:all 0.2s ease-in-out;
	-webkit-transition:all 0.2s ease-in-out;
	transition:all 0.2s ease-in-out;
}
#con_slide_wrap1 .bt_wrap button.active{background-color:#bb1a29;color:#bb1a29;}
#con_box1{background:url('/img/s1/s3slide/img1_2.jpg') no-repeat center top;}
#con_box1 button{position:absolute;top:590px;left:50%;width:100px;height:160px;margin-left:-60px;border:0 none;background-color:transparent;outline:0;}
#con_box1 button i{position:absolute;top:-2000px;left:-2000px;font-size:1px;text-indent:-2000px;}
#con_box2{}
#con_box2 > div{position:relative;width:300%;height:100%;overflow:hidden;}
#con_box2 > div > div{float:left;width:33.33%;height:100%;}
#con_box2 > div > div.box2_1{background:url('/img/s1/s3slide/img2.jpg') no-repeat center top;}
#con_box2 > div > div.box2_2{background:url('/img/s1/s3slide/img3.jpg') no-repeat center top;}
#con_box2 > div > div.box2_3{background:url('/img/s1/s3slide/img4.jpg') no-repeat center top;}
#con_box2 .box2_bt_wrap{
	z-index:3;position:absolute;bottom:50px;left:50%;width:auto;height:auto;margin-left:-180px;padding:5px 35px 5px 50px;font-size:0;
	background:rgba(0, 0, 0, 0.5);
	background:transparent\9;
	/* IE 5.5 - 7 */
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#7f000000, endColorstr=#7f000000);
	/* IE 8 */
	-ms-filter:"progid:DXImageTransform.Microsoft.gradient(startColorstr=#7f000000, endColorstr=#7f000000)";
	-moz-border-radius:55px;
	-webkit-border-radius:55px;
	border-radius:55px;
}
#con_box2 .box2_bt_wrap button{width:100px;height:100px;margin:0 auto;border:0 none;background-position:center top;background-repeat:no-repeat;background-color:transparent;font-size:0;outline:0;}
#con_box2 .box2_bt_wrap button.bt1{margin-right:20px;background-image:url('/img/s1/s3slide/box2_bt1.png');}
#con_box2 .box2_bt_wrap button.bt2{background-image:url('/img/s1/s3slide/box2_bt2.png');}
#con_box2 .box2_bt_wrap button.bt3{background-image:url('/img/s1/s3slide/box2_bt3.png');}
#con_box2 .box2_bt_wrap button.active{background-position:center -100px;}
#con_box3{background:url('/img/s1/s3slide/img5.jpg') no-repeat center top;}
#con_box3 button{position:absolute;top:770px;left:50%;width:135px;height:133px;margin-left:-37px;;border:0 none;background:url('/img/s1/s3slide/img5_bt.jpg') no-repeat center top;font-size:0;outline:0;}
//-->
</style>

<script type="text/javascript">
//<![CDATA[

$(function () {
	conSlideAc1();
});

function conSlideAc1(){
	var p_cnt01 = 1;
	var p_total01 = 6;
	var p_stEn = 'p_stEn';
	var tarTop;

	function conAc1(wA) {
		if(wA=='plus'){
			p_cnt01++;
		} else if(wA=='minus'){
			p_cnt01--;
		}

		if ( p_cnt01 < 1 ){
			p_cnt01 = 1; p_stEn = '';
		} else if ( p_cnt01 > p_total01 ){
			p_cnt01 = p_total01; p_stEn = '';
		} else {
			p_stEn = 'p_stEn';
		}
		tarTop = $(window).height();

		if(p_stEn=='p_stEn'){
			if (p_cnt01==1){
				aniArAc1(0);
				totalBtAC1(0);
			} else if (p_cnt01==2){
				aniArAc1(1);
				aniArAc2(0);
				totalBtAC1(1);
				box2BtAC1(0);
			} else if (p_cnt01==3){
				aniArAc1(1);
				aniArAc2(100);
				box2BtAC1(1);
			} else if (p_cnt01==4){
				aniArAc1(1);
				aniArAc2(200);
				totalBtAC1(1);
				box2BtAC1(2);
			} else if (p_cnt01==5){
				totalBtAC1(2);
				aniArAc1(2);
			} else if (p_cnt01==6){
				aniArAc1(3);
			}
		}
	}

	function aniArAc1(n){
		if(n==0){
			setTimeout(function(){$('header, #con_slide_wrap1').removeClass('active');}, 1300);
		} else {
			$('header, #con_slide_wrap1').addClass('active');
		}
		if(n==3){
			$('footer').stop().animate({'margin-top':'-187px'}, 300);
		} else {
			$('footer').stop().animate({'margin-top':'0'}, 300);
		}
		$('#con_slide_wrap1').stop().animate({scrollTop:(tarTop*n)-50}, 1300);
	}
	function aniArAc2(n){
		$('#con_box2 .roll').stop().animate({'left':'-'+n+'%'}, 1300);
	}
	
	function totalBtAC1(n){
		$('.bt_wrap button').eq(n).addClass('active').siblings().removeClass('active');
	}
	function box2BtAC1(n){
		$('#con_box2 button').eq(n).addClass('active').siblings().removeClass('active');
	}

	$(document).keyup(function (event) {
		var pn = $(':animated').length;
		if (pn == 0) {
			switch (event.keyCode) {
				case 38:
					conAc1('minus');
				break;
				case 40:
					conAc1('plus');
				break;
			}
		}
	});
	var mousewheelevt = (/Firefox/i.test(navigator.userAgent))? 'DOMMouseScroll' : 'mousewheel';
	$('html').on(mousewheelevt, function (event) {
		var pn = $(':animated').length;
		if (pn == 0) {
			var p_wheel01 = false;
			if (/Firefox/i.test(navigator.userAgent)){if (event.originalEvent.detail < 0) {p_wheel01 = true;}}else{if (event.originalEvent.wheelDelta >= 0) {p_wheel01 = true;}}
			if (p_wheel01) {
				conAc1('minus');
			} else {
				conAc1('plus');
			}
		}
	});

	var startTouchX = null; 
	var startTouchY = null; 
	var moveTouchX = null; 
	var moveTouchY = null; 

	$('html').on('touchstart', function(e) {
		var event = e.originalEvent;
		startTouchX = event.targetTouches[0].pageX;
		startTouchY = event.targetTouches[0].pageY;
		event.preventDefault();
	});

	$('html').on('touchmove', function(e) {
		var event = e.originalEvent;
		moveTouchX = event.targetTouches[0].pageX;
		moveTouchY = event.targetTouches[0].pageY;
		event.preventDefault();
	});

	$('html').on('touchend', function(e) {
		var pn = $(':animated').length;
		if (pn == 0) {
			if (startTouchY < moveTouchY ){
				conAc1('minus');
			}else{
				conAc1('plus');
			}
		}
	});


	$('.bt_wrap button').click(function(){
		var tabNum = $(this).index();
		if(tabNum==0){
			p_cnt01=1;
		} else if(tabNum==1){
			p_cnt01=2;
		} else if(tabNum==2){
			p_cnt01=5;
		}
		conAc1();
	});

	$('#con_box1 button').click(function(){
		var tabNum = $(this).index();
		p_cnt01 = tabNum+2;
		conAc1();
	});

	$('#con_box2 button').click(function(){
		var tabNum = $(this).index();
		p_cnt01 = tabNum+2;
		conAc1();
	});
	$('#con_box3 button').click(function(){
		p_cnt01 = 1;
		conAc1();
	});

	$(window).on('resize',function (){
		p_cnt01 = 1;
		totalBtAC1(0);
		$('#con_slide_wrap1').stop().animate({scrollTop:0}, 0);
	}).resize();
}
//]]>
</script>





<div id="con_slide_wrap1">

	<div class="bt_wrap">
		<button type="button" class="active">1</button>
		<button type="button" class="">2</button>
		<button type="button" class="">3</button>
	</div>

	<div id="con_box1">
		<button type="button" class="bt1"><i>자세히 보기</i></button>
	</div>
	<div id="con_box2">
		<div class="box2_bt_wrap">
			<button type="button" class="bt1 active">1</button>
			<button type="button" class="bt2 ">2</button>
			<button type="button" class="bt3 ">3</button>
		</div>
		<div class="roll">
			<div class="box2_1"></div>
			<div class="box2_2"></div>
			<div class="box2_3"></div>
		</div>
	</div>
	<div id="con_box3"><button type="button" class=""><i>맨위로</i></button></div>
</div>

<?php include_once "../../_tail.php";?>