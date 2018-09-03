<?php
include_once "../../_head.php";
session_start();
?>


<div class="wrap_conts">
	<div class="hd_s_img">
		<h2><img src="/m/img/common/mem_complete_tit.png" alt="" /></h2>
	</div>
	<div class="complete_guide_field">
		<h3><span><?=$_SESSION['sb_name']?>님</span>의 회원가입이 완료되었습니다.</h3>
		<p>스시노백쉐프 방문 후 최초 후기 작성 시<br />
		스시노백쉐프 1만원권을 선물로 드립니다!</p>
	</div>
	<a href="/m/page/member/login.php" class="bt_2s_c_red">로그인 하기</a>

</div>

<?php include_once "../../_tail.php";?>