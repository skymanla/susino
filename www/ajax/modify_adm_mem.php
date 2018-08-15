<?
/*
WindDesign Ryan skymanla
관리자에서 회원 정보 수정
 */
session_start();
include_once $_SERVER['DOCUMENT_ROOT']."/lib/dbconn.php";
header("Content-Type:application/json");

$mode_arr = array("u", "d");

if(!in_array($_REQUEST['mode'], $mode_arr)){
	$r = array("msg" => "잘못된 인자값입니다.");
	$r = (object) $r;
	header("HTTP/1.0 400 Bad Request");
	echo json_encode($r);
	exit;
}
$tt_array = array();
$cnt = count($_REQUEST['ajax_data']);
for($i=0;$i<$cnt;$i++){
	$sb_mb_level = $conn->real_escape_string($_REQUEST['ajax_data'][$i]['sb_lvl_cata']);
	$sb_idx = $conn->real_escape_string($_REQUEST['ajax_data'][$i]['sb_idx']);
	if($_REQUEST['mode'] == 'u'){
		$sql = "update sb_member set sb_mem_level='".$sb_mb_level."' where sb_idx='".$sb_idx."'";
	}else if($_REQUEST['mode'] == 'd'){
		$sql = "update sb_member set sb_delete_flag='1', sb_delete_time=now() where sb_idx='".$sb_idx."'";
	}
	
	if($conn->query($sql)){
		$r = array("msg"=>"선택한 회원의 정보가 변경되었습니다.");
		$r = (object) $r;
		echo json_encode($r);
		exit;
	}else{
		$r = array("msg"=>"문제가 발생했습니다.");
		$r = (object) $r;
		echo json_encode($r);
		exit;
	}
}
//print_r($cnt);
?>