<?php include_once "../../_head.php";?>

<div class="s6s1_wrap type1">
	<div class="tab_wrap">
		<a href="s1.php" class="bt1 active">랍스타그램</a>
		<a href="s1_tab2.php" class="bt2">핑스타그램</a>
	</div>
	<div class="box_wrap">
		<div class="social_stream_wrap">
			<div class="headgroup">
				<h2>#랍스타그램</h2>
				<p class="copy1">2018 스시노백쉐프의 신메뉴 #랍스타그램</p>
			</div>
			<div id="social-stream1" class="social_stream"></div>
		</div>
	</div>
</div>


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