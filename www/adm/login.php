<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>스시노백쉐프 관리자</title>
	<link rel="stylesheet" type="text/css" href="/adm/css/reset.css" />
	<link rel="stylesheet" type="text/css" href="/adm/css/login.css" />
	<script type="text/javascript" src="/adm/js/common.js"></script>
	<script type="text/javascript" src="/adm/js/jquery-1.12.4.min.js"></script>
</head>
<body>
<!-- STR warp -->
<div id="wrap">
	<div id="login_wrap">
		<h1><img src="/adm/img/common/logo.png" alt="스시노백쉐프 관리자" /></h1>
		<form id="loginForm" name="loginForm" method="post">
			<fieldset>
				<legend>로그인</legend>
				<div class="input_box"><label for="">ID</label><input type="text" name="id" id="id" placeholder="아이디" /></div>
				<div class="input_box"><label for="">PW</label><input type="password" name="pw" id="pw" placeholder="패스워드" /></div>
				<button href="#" onclick="logincheck();" >LOGIN</button>
			</fieldset>
		</form>
	</div>
</div>
<!-- END warp -->
</body>
</html>