<?php include_once "../../_head.php";?>

<!-- STR <form method="" action=""> -->
<fieldset class="wrap_field_login">
	<legend>아이디 입력 창</legend>
		<h3>아이디 &middot; 비밀번호 찾기</h3>
		<div>
			<div class="tab_field">
				<a href="/m/page/member/lost_id.php" class="bt_tab1">아이디 찾기</a>
				<a href="javascript:void(0);" class="bt_tab2 active">비밀번호 찾기</a>
			</div>
			<!-- STR 아이디 찾기 입력 -->
			<div class="txt_field">
				<input type="text" value="" name="" placeholder="아이디" />
				<input type="text" value="" name="" placeholder="이메일 주소" />
			</div>
			<!-- END 아이디 찾기 입력 -->

			<!-- STR 아이디 찾기 입력 완료 -->
			<!--
			<p class="complete_field">
				입력하신 계정의 메일로 <strong>비밀번호</strong>를<br /> 발송하였습니다.
				<br />	<br />
				로그인하신 후 <strong>정보 변경에서 비밀번호를</strong><br /> 변경해 주시길 바랍니다.
			</p>
			-->
			<!-- END 아이디 찾기 입력 완료 -->

			<a href="javascript:void(0);" class="bt_2s_c_red">비밀번호 찾기</a>
		</div>
</fieldset>
<!-- END </form> -->

<?php include_once "../../_tail.php";?>