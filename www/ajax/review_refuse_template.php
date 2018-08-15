<?php
/*
Ryan skymanla
거절 문자 내용 저장
문자열 길이도 여기서 계산한다
mb_strwidth
 */
header("Content-Type:application/json");
include_once $_SERVER['DOCUMENT_ROOT']."/lib/dbconn.php";

$getIdx = $conn->real_escape_string($_REQUEST['getIdx']);
$getVal = $conn->real_escape_string($_REQUEST['getVal']);

$st_length = mb_strwidth($getVal);
if($str_length > 45){
	$st_type = "lms";
}else{
	$st_type = "sms";
}
//htmlspecialchars(addslashes($getVal))
$sql_comment = " st_type='".$st_type."', st_content='".htmlspecialchars(addslashes($getVal))."', st_content_length='".$st_length."', st_rdate=now(), st_wip='".$_SERVER['REMOTE_ADDR']."' ";
$sql = "update sb_sms_template set ".$sql_comment." where st_idx='".$getIdx."'";
/*$result = array("query"=>$sql);
$result = (object) $result;
echo json_encode($result);
exit;*/
if($conn->query($sql)){
	$result = array("msg"=>"성공적으로 템플릿이 저장되었습니다.");
	$result = (object) $result;
	echo json_encode($result);	
	exit;
}
?>