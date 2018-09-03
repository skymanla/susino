<?php include_once "../../_head.php";?>

<div class="wrap_conts wid_full">
	<div class="hd_s_img">
		<h2><img src="/m/img/s2/s2s6s1_tit.png" alt="" /></h2>
	</div>
	<div class="wrap_in_ssi">
		<div class="img_select">
			<div>간편 스시</div>
			<select id="ssi_select_list" name="" title="" onchange="location = this.value;">
				<option value="/m/page/s2/s4s1.php">백쉐프 초밥</option>
				<option value="/m/page/s2/s4s2.php">모듬 초밥</option>
				<option value="/m/page/s2/s4s3.php">오늘의 초밥(런치)</option>
				<option value="/m/page/s2/s4s4.php">테마키스시</option>
				<option value="/m/page/s2/s4s5.php" selected="selected">간편 스시</option>
				<option value="/m/page/s2/s4s6.php">컴팩트 사시미</option>
			</select>
		</div>
		<div class="img_change">
			<img src="/m/img/s2/05_05_01.jpg" alt="" />
			<div class="ssi_guide">
				<p>활어부터 새우, 와규불초밥까지 원하는대로 골라 먹을 수 있는 컴팩트 매장 전용 5pcs 초밥 메뉴 입니다. </p>
				<div>구성 : 활어류 5pcs / 연어류 5pcs / 참치류(아까미 2pcs, 메카대절 3pcs) / 새우류(아마애비, 초새우 2pcs, 생새우, 장새우) / 모듬셋트1(활어, 연어, 아까미, 장새우, 와규불초밥) / 모듬셋트2(아마애비, 다마고, 타코와사비, 가이바시, 장어½)
				</div>
				<span>5pcs <strong>7,000원 ~ 8,000원</strong></span>
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