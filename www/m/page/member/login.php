<?php include_once "../../_head.php";?>
<!-- STR <form method="" action=""> -->
<fieldset class="wrap_field_login">
	<legend>로그인 입력 창</legend>
		<h3>로그인</h3>
		<div>
			<div class="txt_field">
				<input type="text" value="" name="" placeholder="아이디" />
				<input type="password" value="" name="" placeholder="비밀번호" />
			</div>
			<div class="chk_field">
				<input type="checkbox" id="chkb_10" value="" name="" />
				<label for="chkb_10">아이디 저장</label>
			</div>
			<a href="javascript:void(0);" class="bt_2s_c_red">로그인</a>
			<div class="find_field">
				<a href="/m/page/member/register_form.php" class="bt_sign">회원가입</a>
				<a href="/m/page/member/lost_id.php" class="bt_find">아이디 &middot; 비밀번호 찾기</a>
			</div>
		</div>
</fieldset>
<!-- END </form> -->
<?php include_once "../../_tail.php";?>