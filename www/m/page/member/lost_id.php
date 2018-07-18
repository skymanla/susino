<?php include_once "../../_head.php";?>

<!-- STR <form method="" action=""> -->
<fieldset class="wrap_field_login">
	<legend>아이디 입력 창</legend>
		<h3>아이디 &middot; 비밀번호 찾기</h3>
		<div>
			<div class="tab_field">
				<a href="javascript:void(0);" class="bt_tab1 active">아이디 찾기</a>
				<a href="/m/page/member/lost_password.php" class="bt_tab2">비밀번호 찾기</a>
			</div>
			<!-- STR 아이디 찾기 입력 -->
			<div class="txt_field">
				<input type="text" value="" name="" placeholder="이름" />
				<input type="text" value="" name="" placeholder="이메일 주소" />
			</div>
			<!-- END 아이디 찾기 입력 -->

			<!-- STR 아이디 찾기 입력 완료 -->
			<!--  
			<p class="complete_field">
				입력하신 이메일로 등록 된 아이디는
				<br />
				<strong>wionddr***</strong>입니다.
			</p> 
			-->
			<!-- END 아이디 찾기 입력 완료 -->

			<a href="javascript:void(0);" class="bt_2s_c_red">아이디 찾기</a>
		</div>
</fieldset>
<!-- END </form> -->


<?php include_once "../../_tail.php";?>