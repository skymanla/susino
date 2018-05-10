<?php include_once "../../_head.php";?>

<div class="s6s1_wrap">
	<div>
		<div class="headgroup">
			<h2>#봄엔스시</h2>
			<p class="copy1">2018, 4월의 인스타 #해시태그</p>
		</div>
		<div class="social_stream_wrap">
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