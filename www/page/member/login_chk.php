<?
include_once($_SERVER['DOCUMENT_ROOT']."/lib/dbconn.php");
include_once($_SERVER['DOCUMENT_ROOT']."/lib/function.php");
session_start();

$sb_mem_tbl = "sb_member";

$sb_id = $conn->real_escape_string($_POST['sb_id']);
$sb_ori_pw = $conn->real_escape_string($_POST['sb_pwd']);

$sql = "select count(*) as cnt from $sb_mem_tbl where sb_id='".$sb_id."'";
$q = $conn->query($sql);
$v = $q->fetch_assoc();

if($v['cnt'] == "0"){
	session_destroy ();
	go_href("아이디를 확인해주시기 바랍니다.", "./login.php", "go");
}else{

	$sql = "select * from $sb_mem_tbl where sb_id='".$sb_id."'";
	$q = $conn->query($sql);
	$v = $q->fetch_assoc();
	if(password_verify($sb_ori_pw, $v['sb_password'])){
		$_SESSION = $v;
		echoMovePage("/");
	}else{
		session_destroy ();
		go_href("패스워드를 확인해주시기 바랍니다.", "./login.php", "go");	
	}
	
}

exit;
?>