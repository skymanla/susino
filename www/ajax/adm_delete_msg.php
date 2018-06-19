<?
/*
WindDesign Ryan
Exp : sms, email 삭제

 */
include_once $_SERVER['DOCUMENT_ROOT']."/lib/dbconn.php";
include_once($_SERVER['DOCUMENT_ROOT']."/lib/function.php");


$chk_data = $_REQUEST['chk_data'];
$chk_cnt = count($_REQUEST['chk_data']);
$chk_flag = $_REQUEST['chk_flag'];
$sql = "";

$chk_val = false;
if($chk_flag == "email"){
	for($i=0;$i<$chk_cnt;$i++){
		$sql = "update sb_email_list set sb_email_delete_flag='1' where sb_idx='".$chk_data[$i]."'";
		$conn->query($sql);
	}
	$chk_val = true;
}else if($chk_flag == "sms"){
	for($i=0;$i<$chk_cnt;$i++){
		$sql = "update sb_sms_list set sb_sms_delete_flag='1' where sb_idx='".$chk_data[$i]."'";
		$conn->query($sql);
	}
	$chk_val = true;
}else{
	//false
}


return $chk_val;
?>