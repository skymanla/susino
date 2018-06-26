<header id="header">
	<div class="head_top">
		<h1><a href="/"><img src="/img/common/logo.png" alt="스시노백쉐프" /></a></h1>
		<div class="top_sns">
			<a href="https://www.instagram.com/sb.chef" class="instar" target="_blank" title="새창으로 열립니다."><i>인스타그램</i></a>
			<a href="https://www.facebook.com/sbchef2014" class="facebook" target="_blank" title="새창으로 열립니다."><i>페이스북</i></a>
		</div>
		<div class="blank_wrap">
			<a href="javascript:void(0);" target="_blank" title="새창으로 열립니다."><img src="/img/nav/t_nav2_1.gif" alt="일성코퍼레이션" /></a>
			<a href="/together" target="_blank" title="새창으로 열립니다."><img src="/img/nav/t_nav2_2.gif" alt="공정 창업" /></a>
		</div>
		<div class="g_nav">
			<!-- STR 로그인 전 -->
			<? if( ($_SESSION['sba_id'] && $_SESSION['sba_pw']) || ($_SESSION['sb_id'] && $_SESSION['sb_password']) ) { ?>
			<a href="/lib/log_out.php"><img src="/img/nav/t_nav1_1_logout.gif" alt="우동맛 로그아웃" /></a>
			<? }else{ ?>
			<a href="/page/member/login.php"><img src="/img/nav/t_nav1_1_login.gif" alt="우동맛 접속" /></a>
			<? } ?>
			<!-- END 로그인 전 -->
			<!-- STR 로그인 후 -->
			<!-- <a href="javascript:void(0);"><img src="/img/nav/t_nav1_1_logout.gif" alt="우동맛 로그아웃" /></a> -->
			<!-- END 로그인 후 -->
			<a href="/page/scenter/s1.php"><img src="/img/nav/t_nav1_2.gif" alt="의견 있어요" /></a>
			<a href="javascript:void(0);"><img src="/img/nav/t_nav1_3.gif" alt="멋진 쉐프 상시모집" /></a>
		</div>
		<?php if(!$w_index) {?>
			<div class="scroll_head">
				<a href="/" class="logo"><img src="/img/common/logo_fish.png" alt="스시노백쉐프" /></a>
				<div class="title">
					<?php if($w_a_num || $w_a_num===0){?>
					<img src="/img/common/logo_gnb_<?php echo $w_a_num+1;?>.png" alt="<?php echo $w_s_title_1;?>" />
					<?php } else {?>
						<?php if($w_sub_name[2] == 'scenter'){?>
						<img src="/img/common/logo_gnb_sc.png" alt="고객센터" />
						<?php } else if($w_sub_name[2] == 'srule'){?>
						<img src="/img/common/logo_gnb_sr<?php echo $w_b_num+1;?>.png" alt="<?php echo $w_s_title_2;?>" />
						<?php } else if($w_sub_name[2] == 'member'){?>
						<img src="/img/common/logo_gnb_member.png" alt="Members" />
						<?php }?>

						<?php if($w_s_title_1 == 'invite'){?>
						<img src="/img/common/logo_gnb_invite.png" alt="우리함께갈래요?" />
						<?php }?>
					<?php }?>
					<div class="sns_bt">
						<a href="https://www.instagram.com/sb.chef" class="instar" target="_blank" title="새창으로 열립니다."><i>인스타그램</i></a>
						<a href="https://www.facebook.com/sbchef2014" class="facebook" target="_blank" title="새창으로 열립니다."><i>페이스북</i></a>
					</div>
				</div>
			</div>
			<button type="button" class="gnb_bt_all"><i></i><i></i><i></i><span>전체메뉴</span></button>
		<?php } ?>
	</div>
	<ul class="gnb">
		<li <?php if($w_a_num===0){?>class="active"<?php }?>>
			<a href="/page/s1/s1.php"><i></i><img src="/img/common/gnb1.png" alt="어울림 스시노백쉐프" /></a>
			<ul>
				<li <?php if($w_a_num===0 && $w_b_num===0){?>class="active"<?php }?>><a href="/page/s1/s1.php"><img src="/img/nav/gnb_s1_01.png" alt="누구나 쉽게, 누구나 함께" /></a></li>
				<li <?php if($w_a_num===0 && $w_b_num===2){?>class="active"<?php }?>><a href="/page/s1/s3.php"><img src="/img/nav/gnb_s1_02.png" alt="이렇게 다릅니다." /></a></li>
				<li <?php if($w_a_num===0 && $w_b_num===1){?>class="active"<?php }?>><a href="/page/s1/s2.php"><img src="/img/nav/gnb_s1_03.png" alt="우리가 걸어온 길" /></a></li>
				<li <?php if($w_a_num===0 && $w_b_num===3){?>class="active"<?php }?>><a href="/page/s1/s4.php"><img src="/img/nav/gnb_s1_04.png" alt="대한민국 최대 일식 전문가 그룹" /></a></li>
				<li <?php if($w_a_num===0 && $w_b_num===5){?>class="active"<?php }?>><a href="/page/s1/s6.php"><img src="/img/nav/gnb_s1_05.png" alt="스시노 NEWS" /></a></li>
			</ul>
		</li>
		<li <?php if($w_a_num===1){?>class="active"<?php }?>>
			<a href="/page/s2/s7.php"><i></i><img src="/img/common/gnb2.png" alt="초밥" /></a>
			<ul>
				<li <?php if($w_a_num===1 && $w_b_num===6){?>class="active"<?php }?>><a href="/page/s2/s7.php"><img src="/img/nav/gnb_s2_01.png" alt="2018 신메뉴" /></a></li>
				<li <?php if($w_a_num===1 && $w_b_num===0){?>class="active"<?php }?>><a href="/page/s2/s1.php"><img src="/img/nav/gnb_s2_02.png" alt="다함께,셋트 초밥" /></a></li>
				<li <?php if($w_a_num===1 && $w_b_num===7){?>class="active"<?php }?>><a href="/page/s2/s8.php"><img src="/img/nav/gnb_s2_03.png" alt="든든한, 한상차림" /></a></li>
				<li <?php if($w_a_num===1 && $w_b_num===1){?>class="active"<?php }?>><a href="/page/s2/s2.php"><img src="/img/nav/gnb_s2_04.png" alt="혼자서,싱글 초밥" /></a></li>
				<li <?php if($w_a_num===1 && $w_b_num===2){?>class="active"<?php }?>><a href="/page/s2/s3.php"><img src="/img/nav/gnb_s2_05.png" alt="점심엔,런치 초밥" /></a></li>
				<li <?php if($w_a_num===1 && $w_b_num===3){?>class="active"<?php }?>><a href="/page/s2/s4.php"><img src="/img/nav/gnb_s2_06.png" alt="컴팩트,전용 초밥" /></a></li>
				<li <?php if($w_a_num===1 && $w_b_num===5){?>class="active"<?php }?>><a href="/page/s2/s6.php"><img src="/img/nav/gnb_s2_07.png" alt="사시미/탕" /></a></li>
			</ul>
		</li>
		<li <?php if($w_a_num===2){?>class="active"<?php }?>>
			<a href="/page/s3/s1.php"><i></i><img src="/img/common/gnb3.png" alt="초밥집" /></a>
			<ul>
				<li <?php if($w_a_num===2 && $w_b_num===0){?>class="active"<?php }?>><a href="/page/s3/s1.php"><img src="/img/nav/gnb_s3_01.png" alt="백쉐프 초밥집 찾기" /></a></li>
				<li <?php if($w_a_num===2 && $w_b_num===1){?>class="active"<?php }?>><a href="/page/s3/s2.php"><img src="/img/nav/gnb_s3_02.png" alt="다이닝(Dining) 매장" /></a></li>
				<li <?php if($w_a_num===2 && $w_b_num===2){?>class="active"<?php }?>><a href="/page/s3/s3.php"><img src="/img/nav/gnb_s3_03.png" alt="컴팩트(Compact) 매장" /></a></li>
				<li <?php if($w_a_num===2 && $w_b_num===3){?>class="active"<?php }?>><a href="/page/s3/s4.php"><img src="/img/nav/gnb_s3_04.png" alt="강남★스타 (UNIQ TM)" /></a></li>
			</ul>
		</li>
		<li <?php if($w_a_num===3){?>class="active"<?php }?>>
			<a href="/page/s4/s1.php"><i></i><img src="/img/common/gnb4.png" alt="배달 초밥" /></a>
			<ul>
				<li <?php if($w_a_num===3 && $w_b_num===0){?>class="active"<?php }?>><a href="/page/s4/s1.php"><img src="/img/nav/gnb_s4_01.png" alt="편의점엔 없는 초밥 도시락" /></a></li>
				<li <?php if($w_a_num===3 && $w_b_num===1){?>class="active"<?php }?>><a href="/page/s4/s2.php"><img src="/img/nav/gnb_s4_02.png" alt="배달 초밥 한눈에 보기" /></a></li>
				<li <?php if($w_a_num===3 && $w_b_num===2){?>class="active"<?php }?>><a href="/page/s4/s3.php"><img src="/img/nav/gnb_s4_03.png" alt="라이브 픽업" /></a></li>
				<li <?php if($w_a_num===3 && $w_b_num===3){?>class="active"<?php }?>><a href="/page/s4/s4.php"><img src="/img/nav/gnb_s4_04.png" alt="배달 초밥집 찾기" /></a></li>
			</ul>
		</li>
		<li <?php if($w_a_num===4){?>class="active"<?php }?>>
			<a href="/page/s5/s1.php"><i></i><img src="/img/common/gnb5.png" alt="단골고객/우동맛" /></a>
			<ul>
				<li <?php if($w_a_num===4 && $w_b_num===0){?>class="active"<?php }?>><a href="/page/s5/s1.php"><img src="/img/nav/gnb_s5_01.png" alt="단골 고객" /></a></li>
				<li <?php if($w_a_num===4 && $w_b_num===2){?>class="active"<?php }?>><a href="/page/s5/s3.php"><img src="/img/nav/gnb_s5_02.png" alt="우리 동네 맛평가단 이란" /></a></li>
				<li <?php if($w_a_num===4 && $w_b_num===1){?>class="active"<?php }?>><a href="/page/s5/s2.php"><img src="/img/nav/gnb_s5_03.png" alt="우동맛 접속" /></a></li>
			</ul>
		</li>
		<li <?php if($w_a_num===5){?>class="active"<?php }?>>
			<a href="/page/s6/s2.php"><i></i><img src="/img/common/gnb6.png" alt="이벤트" /></a>
			<ul>
				<li <?php if($w_a_num===5 && $w_b_num===1){?>class="active"<?php }?>><a href="/page/s6/s2.php"><img src="/img/nav/gnb_s6_01.png" alt="이달의 이벤트" /></a></li>
				<li <?php if($w_a_num===5 && $w_b_num===3){?>class="active"<?php }?>><a href="/page/s6/s4.php"><img src="/img/nav/gnb_s6_02.png" alt="함께 갈래요?" /></a></li>
				<li <?php if($w_a_num===5 && $w_b_num===0){?>class="active"<?php }?>><a href="/page/s6/s1.php"><img src="/img/nav/gnb_s6_03.png" alt="쇼미더 스시노" /></a></li>
				<li <?php if($w_a_num===5 && $w_b_num===2){?>class="active"<?php }?>><a href="/page/s6/s3.php"><img src="/img/nav/gnb_s6_04.png" alt="카톡 선물하기" /></a></li>
				<li <?php if($w_a_num===5 && $w_b_num===4){?>class="active"<?php }?>><a href="/page/s6/s5.php"><img src="/img/nav/gnb_s6_05.png" alt="어울림 이야기" /></a></li>
			</ul>
		</li>
	</ul>
	<?php if($w_sub_name[2]==='scenter'){?>
	<div class="cs_nav active">
		<a href="/page/scenter/s1.php" <?php if($w_b_num===0){?>class="active"<?php }?>><img src="/img/nav/gnb_sc_01.png" alt="고객의 소리" /></a>
	</div>
	<?php }?>
</header>