<?php include_once "../../_head.php";?>

<div class="wrap_show_ssi tab1">
	<div class="tab_wrap">
		<a href="/m/page/s6/s1.php" class="bt1 active">랍스타그램</a>
		<a href="/m/page/s6/s1_tab2.php" class="bt2">핑스타그램</a>
	</div>
	<div class="box_wrap">
		<div class="social_stream_wrap">
			<div class="headgroup">
				<h2>#명란랍스터초밥</h2>
				<p class="copy1">2018 스시노백쉐프의 신메뉴 #명란랍스터 초밥</p>
			</div>
			<div id="social-stream1" class="social_stream"></div>
		</div>
	</div>
	<div class="c_copy1">
		<b>고객분들이 직접 올려주신 인스타그램 게시물 중에서<br />매달 선정하는 해시태그를 올려주시는 분들 중 5분을 뽑아 3만원 상품권을 드립니다.</b>
		(당첨은 공식 인스타계정에서 매달 말일날에 공지되며, 당첨되신 분들께 별도로 메시지를 보내드립니다.)
	</div>
</div>

<script type="text/javascript" src="/js/wind.instarSns.v.1.0.0.js"></script>

<script type="text/javascript">
//<![CDATA[
$(document).ready(function(){
	$('#social-stream1').wInstarSns({
		w_imgSize : '1', // 0~4 이미지 퀄리티
		w_grid : '5', // 몇열로 나눌것인가
		w_count : '30', // 토탈 리스팅 갯수 max 50
		w_tag : ['봄엔스시'], // 타겟 태그
		noShortcode : ['BhEIIC3lrya','BhD94OXh2uF'], // 리젝시킬 숏코드
	});
});
//]]>
</script>

<?php include_once "../../_tail.php";?>