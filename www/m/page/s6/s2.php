<?php include_once "../../_head.php";?>


<div class="wrap_conts_img col_white">
	<img src="/m/img/s6/06_01.jpg" alt="" />


	<div class="wrap_width_go">
		<!--  STR 참여 -->
		<div class="fam_fri_send">
			<ul class="with_tab">
				<li class="active"><button type="button">부모님께</button></li>
				<li><button type="button" class="">애인에게</button></li>
				<li><button type="button" class="">친구에게</button></li>
				<li><button type="button" class="">동료에게</button></li>
			</ul>
			<ul class="with_con">
				<li class="active">
					<h3><img src="/m/img/s6/s6s2_tabcon_tit1.png" alt="초대장" /></h3>
					<fieldset class="win_box">
						<legend>초대장 URL</legend>
						<input type="text" class="" value="" name="" placeholder="로그인 후 참여 가능합니다." readonly />
					</fieldset>
				</li>
				<li>
					<h3><img src="/m/img/s6/s6s2_tabcon_tit1.png" alt="초대장" /></h3>
					<fieldset class="win_box">
						<legend>초대장 URL</legend>
						<input type="text" class="" value="" name="" placeholder="로그인 후 참여 가능합니다." />
					</fieldset>
				</li>
				<li>
					<h3><img src="/m/img/s6/s6s2_tabcon_tit1.png" alt="초대장" /></h3>
					<fieldset class="win_box">
						<legend>초대장 URL</legend>
						<input type="text" class="" value="" name="" placeholder="로그인 후 참여 가능합니다." />
					</fieldset>
				</li>
				<li>
					<h3><img src="/m/img/s6/s6s2_tabcon_tit1.png" alt="초대장" /></h3>
					<fieldset class="win_box">
						<legend>초대장 URL</legend>
						<input type="text" class="" value="" name="" placeholder="로그인 후 참여 가능합니다." />
					</fieldset>
				</li>
			</ul>
		</div>
		<!-- END 참여 -->

		<!-- STR 당첨 -->
		<!-- 
		<div class="wrap_celebration">
			<img src="/m/img/s6/06_03.jpg" alt="" />
			<div class="bt_wrap_center pd_lr">
				<a href="javascript:void(0);" class="bt_2s_c_border_black">회원정보 확인</a>
			</div>
		</div>
		 -->
		<!-- END 당첨 -->

		<!-- STR 미당첨 재도전 -->
		<!-- 
		<div class="info_not_win">
			<img src="/m/img/s6/06_04.jpg" alt="" />
			<div class="re_challenge">
				<p>
					재도전 가능한 날까지 일 남았어요!
					<span class="num1">1</span>
					<span class="num2">1</span>
				</p>
			</div>
			<img src="/m/img/s6/06_05.jpg" alt="" />
			<div class="bt_wrap_center pd_lr">
				<a href="javascript:void(0);" class="bt_2s_c_border_black">첫 후기 남기고 상품권 받기</a>
			</div>
		</div>
		 -->
		<!-- END 미당첨 재도전 -->
	</div>



	<img src="/m/img/s6/06_02.jpg" alt="" />
</div>

<script type="text/javascript">
//<![CDATA[
	$(document).ready(function(){
		$('.with_tab li button').on('click',function(){
			var idx = $(this).closest('li').index();
			$(this).closest('li').addClass('active').siblings().removeClass('active');
			$('.with_con li').eq(idx).addClass('active').siblings().removeClass('active');
		})
	})
//]]>
</script>
<?php include_once "../../_tail.php";?>

