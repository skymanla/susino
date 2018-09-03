<?
/*
WindDesign Ryan
Exp : 중복된 회원 찾기. 탈퇴회원도 중복으로 처리
 */
include_once $_SERVER['DOCUMENT_ROOT']."/lib/dbconn.php";

$chk_id = $conn->real_escape_string($_REQUEST['chk_id']);

if($chk_id=='admin' || $chk_id=='super' || $chk_id=='sys' || $chk_id=='sysadmin'){
	echo 99;
	exit;
}else{
	//pass
}

$sql = "select count(*) as cnt from sb_member where sb_id='".$chk_id."'";
$q = $conn->query($sql);
$v = $q->fetch_assoc();
if($v['cnt']=='0'){
	echo 1;
}else{
	echo 99;
}

exit;
?>