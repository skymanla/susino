<?php
include_once "../../_head.php";
include_once($_SERVER['DOCUMENT_ROOT']."/lib/function.php");
$save_id = (!isset($_COOKIE['save_id']) ? "" : "checked");
$save_id_val = (!isset($_COOKIE['sb_id']) ? "" : $_COOKIE['sb_id']);

if(!empty($_SESSION['sb_idx'])){
	//login check
	go_href("로그인을 이미 하셨습니다.", "/", "go");
	exit;
}
?>
<!-- STR <form method="" action=""> -->
<form method="post" name="login_form" action="/lib/login_chk.php" onsubmit="loginFrm(this);return false;">
<fieldset class="wrap_field_login">
	<legend>로그인 입력 창</legend>
		<h3>로그인</h3>
		<div>
			<div class="txt_field">
				<input type="text" value="<?=$save_id_val?>" name="sb_id" placeholder="아이디" />
				<input type="password" value="" name="sb_pwd" placeholder="비밀번호" />
			</div>
			<div class="chk_field">
				<input type="checkbox" id="chkb_10" value="Y" name="save_id" <?=$save_id?> />
				<label for="chkb_10">아이디 저장</label>
			</div>
			<a href="javascript:loginFrm(document.login_form);" class="bt_2s_c_red">로그인</a>
			<div class="find_field">
				<a href="/m/page/member/register_form.php" class="bt_sign">회원가입</a>
				<a href="/m/page/member/lost_id.php" class="bt_find">아이디 &middot; 비밀번호 찾기</a>
			</div>
		</div>
</fieldset>
</form>
<script>
function loginFrm(Frm){
	if(Frm.sb_id.value.trim() == ''){
		alert("아이디를 입력해 주세요.");
		Frm.sb_id.focus();
		return false;
	}
	if(Frm.sb_pwd.value.trim() == ''){
		alert("패스워드를 입력해 주세요.");
		Frm.sb_pwd.focus();
		return false;
	}

	Frm.submit();
}
</script>
<!-- END </form> -->
<?php include_once "../../_tail.php";?>