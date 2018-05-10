<?php 
include_once($_SERVER['DOCUMENT_ROOT'].'/_head.php');
$sb_name = $_SESSION['sb_name'];
session_destroy();
?>
<div class="wrap_style1">
	<div class="heading_s1">
		<h2 class="tit"><img src="/img/common/smem_title4.png" alt="가입완료" /></h2>
	</div>
	<div class="register_result">
		<div class="copy_box">
			<div>
				<b><?=$sb_name?></b> 님의 스시노백쉐프 회원가입이 완료되었습니다. <br />
				우리동네를 설정하고 더 많은 이벤트에 참여해보세요!
			</div>
		</div>
		<div class="bt_box"><a href="/">메인으로 바로가기</a></div>
	</div>
</div>

<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/_tail.php');
?>