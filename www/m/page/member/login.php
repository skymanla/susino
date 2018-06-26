<?php include_once "../../_head.php";?>

<fieldset class="in_login">
	<legend>로그인 입력 창</legend>
		<h3>로그인</h3>
		<div>
			<input type="text" value="" name="" placeholder="아이디" />
			<input type="password" value="" name="" placeholder="비밀번호" />
			<div class="chk_field">
				<input type="checkbox" id="chkb_10" value="" name="" />
				<label for="chkb_10">아이디 저장</label>
			</div>
			<a href="javascript:void(0);">로그인</a>
			<div class="find_field">
				<a href="javascript:void(0);" class="bt_sign">회원가입</a>
				<a href="javascript:void(0);" class="bt_find">아이디 &middot; 비밀번호 찾기</a>
			</div>
		</div>
</fieldset>


<?php include_once "../../_tail.php";?>