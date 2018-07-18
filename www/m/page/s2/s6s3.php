<?php include_once "../../_head.php";?>

<div class="wrap_conts wid_full">
	<div class="hd_s_img">
		<h2><img src="/m/img/s2/s2s6s1_tit.png" alt="" /></h2>
	</div>
	<div class="wrap_in_ssi">
		<div class="img_select">
			<div>오늘의 초밥(런치)</div>
			<select id="ssi_select_list" name="" title="" onchange="location = this.value;">
				<option value="/m/page/s2/s6s1.php">백쉐프 초밥</option>
				<option value="/m/page/s2/s6s2.php">모듬 초밥</option>
				<option value="/m/page/s2/s6s3.php" selected="selected">오늘의 초밥(런치)</option>
				<option value="/m/page/s2/s6s4.php">테마키스시</option>
				<option value="/m/page/s2/s6s5.php">간편 스시</option>
				<option value="/m/page/s2/s6s6.php">컴팩트 사시미</option>
			</select>
		</div>
		<div class="img_change">
			<img src="/m/img/s2/05_03_01.jpg" alt="" />
			<div class="ssi_guide">
				<p>점심시간에 만나보실 수 있는 컴팩트 매장 전용 런치 초밥 메뉴입니다. </p>
				<div>구성 : 신선 샐러드 + 신선 초밥 (계절생선(활어), 아까미, 초새우, 청미새, 연어, 메카대절, 장어½, 장새우, 가이바시) + 나가사끼 생우동 or 냉모밀 (5~9월) + 디저트
				</div>
				<span>1인 <strong>10,900원</strong></span>
			</div>
		</div>
		<!-- <div class="ssi_guide_sec">
			<img src="/m/img/s2/04_03_02.jpg" alt="" />
			<p>
			</p>
		</div>
		<div class="ssi_menu_guide">
			<img src="/m/img/s2/04_01_03.jpg" alt="" />
		</div> -->
		<div class="ssi_inmenu_guide re_img">
			<?php include_once "menu_guide1.php";?>
		</div>
		<div class="ssi_inmenu_guide re_img">
			<?php include_once "menu_guide2.php";?>
		</div>
	</div>
</div>


<?php include_once "../../_tail.php";?>