<?
include_once $_SERVER['DOCUMENT_ROOT']."/lib/dbconn.php";

$chk_id = $conn->real_escape_string($_REQUEST['chk_id']);

$sql = "select count(*) as cnt from sb_member where sb_id='".$chk_id."'";
$q = $conn->query($sql);
$v = $q->fetch_assoc();
if($v['cnt']=='0'){
	echo 1;
}else{
	echo 99;
}
?>