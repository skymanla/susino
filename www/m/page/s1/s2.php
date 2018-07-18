<?php include_once "../../_head.php";?>

<div class="wrap_ssi_different">
	<div class="s_intro">
		<h3>이렇게 다릅니다.</h3>
		<p>누구나 쉽게, 누구나 함께 어울릴 수 있는 초밥집,
		스시노백쉐프는 날 것을 싫어하는 고객도, 초밥을 좋아하는 매니아도 모두가 어울릴 수 있도록 초밥을 빗습니다.
		스시노백쉐프, 저희는 이렇게 다릅니다.</p>
		<button type="button" class="bt_btm">아래로 가기</button>
	</div>
	<div class="diffrent_sec">
		<ul class="s_tab">
			<li class="s_tab1 active"><button type="button">아까스(적초)란</button></li>
			<li class="s_tab2 pdt"><button type="button">이케지메란</button></li>
			<li class="s_tab3"><button type="button">일본 수산물 잘가요</button></li>
		</ul>
		<div class="swiper-container-tab slide-wrap s_con">
			<ul class="swiper-wrapper slide">
				<li class="swiper-slide">
					<div class="roll_img">
						<img src="/m/img/s1/02_01_rolling.jpg" alt="" />
					</div>
				</li>
				<li class="swiper-slide">
					<div class="roll_img">
						<img src="/m/img/s1/02_02_rolling.jpg" alt="" />
					</div>
				</li>
				<li class="swiper-slide">
					<div class="roll_img">
						<img src="/m/img/s1/02_03_rolling.jpg" alt="" />
					</div>
				</li>
			</ul>
			<button type="button" class="swiper-button-prev btn-prev">왼쪽 버튼</button>
			<button type="button" class="swiper-button-next btn-next">오른쪽 버튼</button>
		</div>
	</div>
	<img src="/m/img/s1/02_02.jpg" alt="" />
</div>

<script type="text/javascript">
//<![CDATA[
	$(document).ready(function(){
		$('.bt_btm').on('click',function(){
			var secConHei = $('.diffrent_sec').offset().top + (-40);
			$('html, body').stop().animate({scrollTop:secConHei});
		});
	})
//]]>
</script>

<?php include_once "../../_tail.php";?>