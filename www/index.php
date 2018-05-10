<?php 
include_once $_SERVER['DOCUMENT_ROOT']."/lib/dbconn.php";
session_start();
include_once "inc/page.php";

$query = "SELECT * FROM sb_notice ORDER BY sbn_rdate DESC limit 3";
$result = $conn->query($query);
?>
<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=1500, user-scalable=yes">
	<title>수제초밥이 신선하고 맛있는 집, 스시노백쉐프</title>
	<link rel="shortcut icon" type="image/x-icon" href="/img/favicon/favicon1.ico" />
	<link rel="stylesheet" type="text/css" href="css/reset.css" />
	<link rel="stylesheet" type="text/css" href="css/layout.css" />
	<link rel="stylesheet" type="text/css" href="css/main.css" />
	<script type="text/javascript" src="js/jquery-1.12.4.min.js"></script>
	<!--[if lt IE 9]>
	<script src="/js/html5.js"></script>
	<![endif]-->
</head>
<body>
<div id="wrap">
	<?php include_once "inc/header.php";?>
	<div id="visual">
		<div class="copy_pop1">
			<img src="/img/visual/visual_copy1.png" alt="" />
		</div>
		<ul class="roll">
			<li style="background-image:url('/img/visual/visual1.jpg');"><a href="javascript:void(0);"></a></li>
			<li style="background-image:url('/img/visual/visual2.jpg');"><a href="javascript:void(0);"></a></li>
			<li style="background-image:url('/img/visual/visual3.jpg');"><a href="javascript:void(0);"></a></li>
		</ul>
	</div>
	<div id="contents">
		<div class="not_event">
			<div>
				<div class="notice">
					<h2><img src="/img/main/notice_title.png" alt="스시노백쉐프 소식" /></h2>
					<div>
						<ul class="roll">
							<?php 
							while($row = $result->fetch_assoc())
							{
							?>
							<li><a href="/page/scenter/s2sview.php?idx=<?php echo $row['sbn_idx'];?>"><?php echo $row['sbn_title'];?></a></li>
							<?php
							}
							?>
						</ul>
					</div>
				</div>
				<div class="event">
					<div><a href="/page/s6/s1.php"><img src="/img/main/notice_event1.png" alt="" /></a></div>
					<div><a href="/page/s6/s2sview.php?idx=8"><img src="/img/main/notice_event4.png" alt="" /></a></div>
					<div><a href="/page/s6/s3.php"><img src="/img/main/notice_event2.png" alt="" /></a></div>
				</div>
			</div>
		</div>
		<div class="banner1">
			<a href="/page/s5/s1.php"><i>우리동네 맛평가단</i></a>
		</div>
		<div class="banner2 scroll_ani">
			<a href="/page/s1/s3s3.php"><i>볼빨간 연어 그라브락스</i></a>
		</div>
		<div class="s2_wrap box_active">
			<h2><img src="/img/main/s2_box_title.gif" alt="모두에게 어울리는 초밥" /></h2>
			<div class="box1">
				<div style="background-image:url('/img/main/s2_box1.jpg');" onclick="location.href='/page/s2/s1.php'">
					<i></i>
					<p class="title"><img src="/img/main/s2_box_s_title1.png" alt="다함께 세트" /></p>
					<p class="copy"><img src="/img/main/s2_box_s_copy1.png" alt="다함께 세트" /></p>
					<a href="/page/s2/s1.php">자세히 보기</a>
				</div>
			</div>
			<div class="box2" style="background-image:url('/img/main/s2_box_bg1.jpg');">
				<div class="box2_1" style="background-image:url('/img/main/s2_box2.jpg');" onclick="location.href='/page/s2/s6.php'">
					<i></i>
					<p class="title"><img src="/img/main/s2_box_s_title2.png" alt="사시미 탕" /></p>
					<p class="copy"><img src="/img/main/s2_box_s_copy2.png" alt="사시미 탕" /></p>
					<a href="/page/s2/s6.php">자세히 보기</a>
				</div>
				<div class="box2_2" style="background-image:url('/img/main/s2_box3.jpg');" onclick="location.href='/page/s2/s5.php'">
					<i></i>
					<p class="title"><img src="/img/main/s2_box_s_title3.png" alt="곁들임" /></p>
					<p class="copy"><img src="/img/main/s2_box_s_copy3.png" alt="곁들임" /></p>
					<a href="/page/s2/s5.php">자세히 보기</a>
				</div>
			</div>
			<div class="box3">
				<div style="background-image:url('/img/main/s2_box4.jpg');" onclick="location.href='/page/s2/s4.php'">
					<i></i>
					<p class="title"><img src="/img/main/s2_box_s_title4.png" alt="오직 컴팩트" /></p>
					<p class="copy"><img src="/img/main/s2_box_s_copy4.png" alt="오직 컴팩트" /></p>
					<a href="/page/s2/s4.php">자세히 보기</a>
				</div>
			</div>
			<div class="box4">
				<div style="background-image:url('/img/main/s2_box5.jpg');" onclick="location.href='/page/s2/s2.php'">
					<i></i>
					<p class="title"><img src="/img/main/s2_box_s_title5.png" alt="혼자서 싱글" /></p>
					<p class="copy"><img src="/img/main/s2_box_s_copy5.png" alt="혼자서 싱글" /></p>
					<a href="/page/s2/s2.php">자세히 보기</a>
				</div>
			</div>
			<div class="box5">
				<div style="background-image:url('/img/main/s2_box6.jpg');" onclick="location.href='/page/s2/s3.php'">
					<i></i>
					<p class="title"><img src="/img/main/s2_box_s_title6.png" alt="점심엔 런치" /></p>
					<p class="copy"><img src="/img/main/s2_box_s_copy6.png" alt="점심엔 런치" /></p>
					<a href="/page/s2/s3.php">자세히 보기</a>
				</div>
			</div>
		</div>
		<div class="banner3 scroll_ani">
			<a href="/page/s3/s4.php"><i>유니크 매장 강남스타</i></a>
		</div>
		<div class="s3_wrap box_active">
			<h2><img src="/img/main/s3_box_title.gif" alt="모두에게 어울리는 초밥집" /></h2>
			<div class="box1">
				<div style="background-image:url('/img/main/s3_box1.jpg');" onclick="location.href='/page/s3/s1.php'">
					<i></i>
					<p class="title"><img src="/img/main/s3_box_s_title1.png" alt="백쉐프의 초밥집 찾기" /></p>
					<p class="copy"><img src="/img/main/s3_box_s_copy1.png" alt="백쉐프의 초밥집 찾기" /></p>
					<a href="/page/s3/s1.php">자세히 보기</a>
				</div>
			</div>
			<div class="box2" style="background-image:url('/img/main/s3_box_bg1.jpg');">
				<div style="background-image:url('/img/main/s3_box2.jpg');" onclick="location.href='/page/s3/s2.php'">
					<i></i>
					<p class="title"><img src="/img/main/s3_box_s_title2.png" alt="다이닝 매장" /></p>
					<p class="copy"><img src="/img/main/s3_box_s_copy2.png" alt="다이닝 매장" /></p>
					<a href="/page/s3/s2.php">자세히 보기</a>
				</div>
			</div>
			<div class="box3">
				<div style="background-image:url('/img/main/s3_box3.jpg');" onclick="location.href='/page/s3/s4.php'">
					<i></i>
					<p class="title"><img src="/img/main/s3_box_s_title3.png" alt="유니크 매장" /></p>
					<p class="copy"><img src="/img/main/s3_box_s_copy3.png" alt="유니크 매장" /></p>
					<a href="/page/s3/s4.php">자세히 보기</a>
				</div>
			</div>
			<div class="box4">
				<div style="background-image:url('/img/main/s3_box4.jpg');" onclick="location.href='/page/s3/s3.php'">
					<i></i>
					<p class="title"><img src="/img/main/s3_box_s_title4.png" alt="컴팩트 매장" /></p>
					<p class="copy"><img src="/img/main/s3_box_s_copy4.png" alt="컴팩트 매장" /></p>
					<a href="/page/s3/s3.php">자세히 보기</a>
				</div>
			</div>
		</div>
	<!-- 	<div class="sns_wrap">
			<h2>대한민국 최대 일식 전문가 그룹 우리나라에서 가장 많은, 가장 멋진 일식 전문가들이 함께하는 곳, 바로 스시노백쉐프입니다.</h2>
			<div id="social-stream"></div>
			<a href="/page/s1/s5.php" class="more"><img src="/img/main/sns_f_bt.png" alt="쉐프들은 지금, + 더보기 쉐프들의 일상을 담은 인스타그램을 구경해보죠." /></a>
		</div> -->
	</div>
	<?php include_once "inc/footer.php";?>
</div>

<script type="text/javascript" src="js/common.js"></script>
<script type="text/javascript" src="js/jquery.bxslider.js"></script>
<script type="text/javascript" src="js/jquery.social.stream.wall.1.6.js"></script>
<script type="text/javascript" src="js/jquery.social.stream.1.5.17.js"></script>
<script type="text/javascript" src="js/main.js"></script>
</body>
</html>