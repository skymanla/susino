<?
include_once($_SERVER['DOCUMENT_ROOT']."/lib/dbconn.php");
include_once($_SERVER['DOCUMENT_ROOT']."/lib/function.php");
//print_r($_POST);
session_start();

//save cookie
if($_POST['save_id'] == "Y"){
	setcookie('save_id', $_POST['save_id'], time()+(86400*30), "/");
	setcookie('sb_id', $_POST['sb_id'], time()+(86400*30), "/");
}else{
	setcookie('save_id', $_POST['save_id'], time()-3600, "/");
	setcookie('sb_id', $_POST['sb_id'], time()-3600, "/");
}

$sb_mem_tbl = "sb_member";

$sb_id = $conn->real_escape_string($_POST['sb_id']);
$sb_ori_pw = $conn->real_escape_string($_POST['sb_pwd']);

$sql = "select count(*) as cnt from $sb_mem_tbl where sb_id='".$sb_id."' and sb_delete_flag is null ";

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
		$_SESSION['login_chk'] = '99';
		if(!empty($_POST['qtr'])){
			echoMovePage($_POST['qtr']);
		}else{
			echoMovePage("/page/s5/s2.php");
		}
	}else{
		session_destroy ();
		go_href("패스워드를 확인해주시기 바랍니다.", "./login.php", "go");	
	}
	
}

exit;
?>