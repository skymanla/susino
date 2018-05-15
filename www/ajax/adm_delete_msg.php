<?
include_once $_SERVER['DOCUMENT_ROOT']."/lib/dbconn.php";
include_once($_SERVER['DOCUMENT_ROOT']."/lib/function.php");

print_r($_REQUEST);
$chk_data = $_REQUEST['chk_data'];
$chk_cnt = count($_REQUEST['chk_data']);
$sql = "";
for($i=0;$i<$chk_cnt;$i++){
	$sql = "update sb_email_list set sb_email_delete_flag='1' where sb_idx='".$chk_data[$i]."'";
	$conn->query($sql);
}

return true;
?>