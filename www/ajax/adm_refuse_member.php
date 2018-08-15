<?php
/*
Ryan skymanla
후기 승인 거절하기
 */
header("Content-Type:application/json");
include_once $_SERVER['DOCUMENT_ROOT']."/lib/dbconn.php";

$getIdx = $conn->real_escape_string($_REQUEST['getIdx']);
$refuse_arr = $_REQUEST['refuse_member'];

/*$result = array("getIdx"=>$getIdx, "refuse_arr"=>$refuse_arr);
$result = (object) $result;
echo json_encode($result);*/
$refuse_query = "";
for($i=0;$i<count($refuse_arr);$i++){
	if($i == count($refuse_arr)-1){
		$refuse_query .= " sbabm_idx='".$refuse_arr[$i]."' ";
	}else{
		$refuse_query .= " sbabm_idx='".$refuse_arr[$i]."' or ";
	}
}

$sql = "update sb_application_member set sbabm_option3='N', sbabm_option6='".$getIdx."', sbabm_admin_accept_time=now() where ".$refuse_query;
if($conn->query($sql)){
	//거절 문자 발송 API 넣기
	$r = array("msg"=>"선택하신 회원의 거절이 완료되었습니다.");
	$r = (object) $r;
	echo json_encode($r);
	exit;
}
exit;
?>