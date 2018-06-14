<meta charset="UTF-8">
<?php
include_once $_SERVER['DOCUMENT_ROOT']."/lib/dbconn.php";
session_start();

$log_id = $_POST['id'];
$log_passwd = $_POST['pw'];

if(!$_POST['id'] || !$_POST['pw'])
{
	echo("<script>window.alert('잘못된 접근입니다.');</script>");
	echo "<meta http-equiv='Refresh' content='0; URL=/adm/login.php'>";
}
else
{
	$log_id = $conn->real_escape_string($log_id);
	$log_pw = $conn->real_escape_string($log_pw);

	$tablename = "sb_admin";
	$query = "select * from $tablename limit 1";
	$result = $conn->query($query);
	$row = $result->fetch_assoc();

	$hashed_pw = password_hash($log_passwd , PASSWORD_BCRYPT);

	if($log_id == $row['sba_id'] && password_verify($log_passwd, $row['sba_pw']))
	{
		$_SESSION['sba_id'] = $log_id;
		$_SESSION['sba_pw'] = $row['sba_pw'];
		$_SESSION['login_chk'] = '99';
		echo "<meta http-equiv='Refresh' content='0; URL=/adm/index.php'>";
	}
	else
	{
		echo("<script>window.alert('아이디 또는 비밀번호를 확인하세요.');</script>");
		echo "<meta http-equiv='Refresh' content='0; URL=/adm/login.php'>";
		session_destroy ();
	}
}
?>