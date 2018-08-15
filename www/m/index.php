<?php 
include_once "inc/page.php";
?>
<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=yes" />
	<title>수제초밥이 신선하고 맛있는 집, 스시노백쉐프</title>
	<link rel="shortcut icon" type="image/x-icon" href="/m/img/favicon/favicon1.ico" />
	<link rel="stylesheet" type="text/css" href="/m/css/reset.css" />
	<link rel="stylesheet" type="text/css" href="/m/css/layout.css" />
	<link rel="stylesheet" type="text/css" href="/m/css/main.css" />
	<script type="text/javascript" src="/m/js/jquery-1.12.4.min.js"></script>
</head>
<body>
<div id="wrap">
	<?php include_once "inc/header.php";?>
	<div id="visual">
		<div class="swiper-container slide-wrap">
			<ul class="swiper-wrapper slide">
				<li class="swiper-slide"><img src="/m/img/main/visual01.jpg" alt="반반라인, 장어와 와규스테이크를 반반으로" /></li>
				<li class="swiper-slide"><img src="/m/img/main/visual01.jpg" alt="반반라인, 장어와 와규스테이크를 반반으로" /></li>
				<li class="swiper-slide"><img src="/m/img/main/visual01.jpg" alt="반반라인, 장어와 와규스테이크를 반반으로" /></li>
			</ul>
			<div class="swiper-pagination paing"></div>
		</div>
	</div>
	<ul id="notice">
		<li><h3>NEWS</h3><a href="javascript:void(0);">IFS 프랜차이즈 창업 박람회 참가</a></li>
	</ul>
	<div id="contents">
		<div class="taste_group">
			<h3><img src="/m/img/main/main_title1.png" alt="우리동네 맛평가단 스시노백 쉐프" /></h3>
			<div>
				<h4>
					우리동네 초밥 미슐랭, <br />
					<strong>우.동.맛 평가단</strong>이 궁금하세요?
				</h4>
				<p>
					미스테리 쇼퍼/체험단/미식회를 참여하면서<br />
					백쉐프 초밥집의 맛을 평가할 수 있는<br />
					특별한 고객 참여 시스템입니다.
				</p>
				<div class="bt_wrap_center">
					<a href="/m/page/s5/s2.php" class="bt_1s bt_c_border">특별한 멤버쉽을 준비중입니다.</a>
				</div>
			</div>
		</div>
		<div class="slide_ban">
			<div class="swiper-container-type slide-wrap">
			 	<button type="button" class="arrow prev_bt">prev</button>
				<ul class="swiper-wrapper slide">
					<li class="swiper-slide"><img src="/m/img/main/banner01.png" alt="카톡 선물로 마음을 전하세요! 카카오톡 선물하기 안내" /></li>
					<li class="swiper-slide"><img src="/m/img/main/banner01.png" alt="카톡 선물로 마음을 전하세요! 카카오톡 선물하기 안내" /></li>
					<li class="swiper-slide"><img src="/m/img/main/banner01.png" alt="카톡 선물로 마음을 전하세요! 카카오톡 선물하기 안내" /></li>
				</ul>
				<button type="button" class="arrow next_bt">next</button>
				<div class="swiper-pagination-sec paing"></div>
			</div>
		</div>
		<div class="swipe_menu">
			<div>
				<h3><img src="/m/img/main/main_title2.png" alt="모두에게 어울리는 초밥" /></h3>
				<!-- <a href="javascript:void(0);">더보기</a> -->
			</div>
			<ul>
				<li><a href="/m/page/s2/s2.php"><img src="/m/img/main/img_set_menu1.jpg" alt="다함께, 셋트" /></a></li>
				<li><a href="/m/page/s2/s3s1.php"><img src="/m/img/main/img_set_menu2.jpg" alt="든든히, 한상차림" /></a></li>
				<li><a href="/m/page/s2/s4.php"><img src="/m/img/main/img_set_menu3.jpg" alt="혼자서, 싱글초밥" /></a></li>
				<li><a href="/m/page/s2/s5.php"><img src="/m/img/main/img_set_menu4.jpg" alt="점심엔, 런치초밥" /></a></li>
				<li><a href="/m/page/s2/s6.php"><img src="/m/img/main/img_set_menu5.jpg" alt="컴팩트, 전용초밥" /></a></li>
				<li><a href="/m/page/s2/s7.php"><img src="/m/img/main/img_set_menu6.jpg" alt="사시미/탕" /></a></li>
			</ul>
		</div>
		<div class="group_ban">
			<a href="/m/page/s2/s1s4.php"><img src="/m/img/main/img_ban_type1.png" alt="볼빨간 연어, 그라브락스" /></a>
			<a href="/m/page/s3/s4.php"><img src="/m/img/main/img_ban_type2.png" alt="유니크매장 강남스타" /></a>
			<a href="/m/page/s3/s1.php"><img src="/m/img/main/img_ban_type3.png" alt="백쉐프의 초밥집 찾기" /></a>
		</div>
	</div>
	<?php include_once "inc/footer.php";?>
</div>
<script type="text/javascript" src="/m/js/swiper.min.js"></script>
<script type="text/javascript" src="/m/js/common.js"></script>
<script type="text/javascript" src="/m/js/main.js"></script>


</body>
</html>