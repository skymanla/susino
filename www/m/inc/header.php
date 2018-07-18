<header id="header"<?php if($w_a_num===0 || $w_a_num===1 || $w_a_num===2 || $w_a_num===3 || $w_a_num===4 || $w_a_num===5){ echo 'class="scroll"'; } ?>>
	<h1><a href="/m"><img src="/m/img/common/logo.png" alt="로고" /></a></h1>
	<button type="button" class="bt_menu">메뉴 버튼</button>
	<nav id="gnb">
		<div class="gnb_wrap">
			<button type="button" class="bt_close txt_ir">닫기</button>
			<div class="wrap_login">
				<div class="l_off">
					<p>우동맛 평가단 신청하고,<br />특별한 혜택을 받아보세요</p>
					<a href="/m/page/member/login.php" class="bt_1s bt_c_red">로그인 하기</a>
				</div>
				<!-- STR 로그인 되었을때 -->
				<!--  
				<div class="l_on">
					<h3><a href="javascript:void(0);" class="ssi_name">이해리님</a><span>VIP 단골고객</span></h3>
					<ul>
						<li>
							<a href="javascript:void(0);">
								<strong>나의소식</strong>
								<span class="c_num">3</span>
							</a>
						</li>
						<li>
							<a href="javascript:void(0);">
								<strong>우리동네</strong>
								<span>강남구</span>
							</a>
						</li>
					</ul>
				</div>
				-->
				<!-- END 로그인 되었을때 -->
			</div>
			<ul>
				<li <?php if($w_a_num===0){ echo 'class="active"';}?>>
					<button type="button">어울림 스시노백쉐프<span>BRAND</span></button>
					<ul <?php if($w_a_num===0){ echo 'style="display:block"';}?>>
						<li><a href="/m/page/s1/s1.php">누구나쉽게, 누구나함께</a></li>
						<li><a href="/m/page/s1/s2.php">이렇게 다릅니다</a></li>
						<li><a href="/m/page/s1/s3.php">우리가 걸어온길</a></li>
						<li><a href="/m/page/s1/s4.php">대한민국 최대 일식 전문가 그룹</a></li>
						<li><a href="/m/page/s1/s5.php">스시노 뉴스</a></li>
					</ul>
				</li>
				<li <?php if($w_a_num===1){ echo 'class="active"';}?>>
					<button type="button">초밥<span>MENU</span></button>
					<ul <?php if($w_a_num===1){ echo 'style="display:block"';}?>>
						<li><a href="/m/page/s2/s1.php">새로운 초밥</a></li>
						<li><a href="/m/page/s2/s2.php">다함께, 셋트초밥</a></li>
						<li><a href="/m/page/s2/s3s1.php">든든히, 한상차림</a></li>
						<li><a href="/m/page/s2/s4.php">혼자서, 싱글초밥</a></li>
						<li><a href="/m/page/s2/s5.php">점심엔, 런치초밥</a></li>
						<li><a href="/m/page/s2/s6.php">컴팩트, 전용초밥</a></li>
						<li><a href="/m/page/s2/s7.php">사시미/탕</a></li>
					</ul>
				</li>
				<li <?php if($w_a_num===2){ echo 'class="active"';}?>>
					<button type="button">초밥집<span>STORE</span></button>
					<ul <?php if($w_a_num===2){ echo 'style="display:block"';}?>>
						<li><a href="/m/page/s3/s1.php">백쉐프 초밥집 찾기</a></li>
						<li><a href="/m/page/s3/s2.php">다이닝(Dining) 매장</a></li>
						<li><a href="/m/page/s3/s3.php">컴팩트(Compact) 매장</a></li>
						<li><a href="/m/page/s3/s4.php">강남★스타(UNIQ™)</a></li>
					</ul>
				</li>
				<li <?php if($w_a_num===3){ echo 'class="active"';}?>>
					<button type="button">배달 초밥<span>DELIVERY</span></button>
					<ul <?php if($w_a_num===3){ echo 'style="display:block"';}?>>
						<li><a href="/m/page/s4/s1.php">배달 초밥 한눈에 보기</a></li>
						<li><a href="/m/page/s4/s2.php">라이브 픽업</a></li>
						<li><a href="/m/page/s4/s3.php">배달 초밥집 찾기</a></li>
					</ul>
				</li>
				<li <?php if($w_a_num===4){ echo 'class="active"';}?>>
					<button type="button">단골고객/우동맛<span>MEMBERSHIP</span></button>
					<ul <?php if($w_a_num===4){ echo 'style="display:block"';}?>>
						<li><a href="/m/page/s5/s1.php">우리동네 맛 평가단이란</a></li>
						<li><a href="/m/page/s5/s2.php">우동맛 접속</a></li>
					</ul>
				</li>
				<li <?php if($w_a_num===5){ echo 'class="active"';}?>>
					<button type="button">이벤트<span>EVENT</span></button>
					<ul <?php if($w_a_num===5){ echo 'style="display:block"';}?>>
						<li><a href="/m/page/s6/s1.php">이달의 이벤트</a></li>
						<li><a href="/m/page/s6/s2.php">우리,함께갈래요?</a></li>
						<li><a href="/m/page/s6/s3.php">#쇼미더스시노</a></li>
						<li><a href="/m/page/s6/s4.php">카톡선물하기</a></li>
						<li><a href="/m/page/s6/s5.php">어울림 이야기</a></li>
					</ul>
				</li>
			</ul>
			<div class="wrap_evnt">
				<a href="/m/page/s1/s5.php">공지사항</a>
				<a href="/m/page/scenter/s2.php">고객의소리</a>
				<a href="/together/" class="ico_blank">공정창업<i class="txt_ir">새창열기</i></a>
				<a href="https://winddesign33.cafe24.com/" class="ico_blank">일성코퍼레이션<i class="txt_ir">새창열기</i></a>
			</div>
			<a href="javascript:void(0);" class="bt_logout">로그아웃<i class="txt_ir"></i></a>
			<!-- STR 로그인 되었을떄 -->
			<!-- <a href="javascript:void(0);" class="bt_login">로그인<i class="txt_ir"></i></a> -->
			<!-- END 로그인 되었을떄 -->
		</div>
		<div class="dim"></div>
	</nav>
</header>