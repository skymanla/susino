<?php 
include_once($_SERVER['DOCUMENT_ROOT'].'/_head.php');
?>
<div class="wrap_style1">
	<div class="heading_s1">
		<h2 class="tit"><img src="/img/common/smem_title1.png" alt="로그인" /></h2>
	</div>
	<div class="login_box">
		<form method="post" action="./login_chk.php">
			<input type="hidden" name="qtr" id="qtr" value="<?=$_SESSION[re_uri]?>" />
			<fieldset>
				<legend>로그인</legend>
				<input type="text" class="" value="" name="sb_id" placeholder="아이디" />
				<input type="password" class="" value="" name="sb_pwd" placeholder="비밀번호" />
				<div class="checkbox_box">
					<input type="checkbox" class="chk_1" id="chk_1" name="save_id" value="Y">
					<label for="chk_1">아이디저장</label>
				</div>
				<button type="submit" class="">로그인</button>
			</fieldset>
		</form>
	</div>
	<div class="login_bt_box">
		<a href="register_form.php">회원가입</a>
		<a href="lost_id.php">아이디 찾기</a>
		<a href="lost_password.php">비밀번호 찾기</a>
	</div>
</div>


<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/_tail.php');
?>