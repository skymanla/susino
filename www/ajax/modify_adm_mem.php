<?
/*
WindDesign Ryan skymanla
관리자에서 회원 정보 수정
 */
session_start();
include_once $_SERVER['DOCUMENT_ROOT']."/lib/dbconn.php";

//header("Content-Type:application/json");

$tt_array = array();
$cnt = count($_REQUEST['ajax_data']);
for($i=0;$i<$cnt;$i++){
	$sb_mb_level = $conn->real_escape_string($_REQUEST['ajax_data'][$i]['sb_lvl_cata']);
	$sb_idx = $conn->real_escape_string($_REQUEST['ajax_data'][$i]['sb_idx']);
	$sql = "update sb_member set sb_mem_level='".$sb_mb_level."' where sb_idx='".$sb_idx."'";
	$conn->query($sql);
}

return true;
//print_r($cnt);
?>