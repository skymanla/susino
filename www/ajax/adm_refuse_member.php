<?php
/*
Ryan skymanla
후기 승인 거절하기
 */
header("Content-Type:application/json");
include_once $_SERVER['DOCUMENT_ROOT']."/lib/dbconn.php";
include_once $_SERVER['DOCUMENT_ROOT']."/lib/function.php";

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


/*if($_SERVER['REMOTE_ADDR']=='14.32.121.97'){
	$sql = "select sbabm_idx, sbabm_fidx, sbabm_mb_id, sbabm_cate from sb_application_member where ".$refuse_query;
	$query = $conn->query($sql);
	foreach($query as $key => $refuse){
		$idx = $refuse['sbabm_idx'];
		$fidx = $refuse['sbabm_fidx'];
		$mb_id = $refuse['sbabm_mb_id'];
		$cate = $refuse['sbabm_cate'];

		$sql = "select sb_phone from sb_member where sb_id='".$mb_id."'";
		$query = $conn->query($sql);
		$phone = $query->fetch_assoc();
		$phone = $phone['sb_phone'];

		$sql = "select st_content from sb_sms_template where st_idx='".$getIdx."'";
		$query = $conn->query($sql);
		$sms_content = $query->fetch_assoc();
		$sms_content = $sms_content['st_content'];

		$sql = "insert into sb_refuse_sms (sb_idx2, sb_fidx, sb_refuse_type, sb_sms_content, sb_sms_send_mb, sb_sms_send_phone, sb_sms_w_date) values 
				('".$idx."', '".$fidx."', '".$getIdx."', '".$sms_content."', '".$mb_id."', '".$phone."', now())";
		$ret[] = $sql;
		$arr_phone[] = $phone;
	}
	$smsSender = getSmsSender();
	$smsSender = explode("-", $smsSender);
	
	$sphone1 = $smsSender[0];
	$sphone2 = $smsSender[1];
	$sphone3 = $smsSender[2];
	$smsType = "L";
	$sms_title = "test message";
	$rphone = implode($arr_phone, ",");
	include($_SERVER['DOCUMENT_ROOT']."/lib/smsLib2.php");
	$r = array("msg"=>$rphone);
	$r = (object) $r;
	echo json_encode($r);
	exit;
}*/


$sql = "update sb_application_member set sbabm_option3='N', sbabm_option6='".$getIdx."', sbabm_admin_accept_time=now() where ".$refuse_query;
if($conn->query($sql)){
	//거절 문자 발송 API 넣기
	//문자 발송 내역
	$sql = "select sbabm_idx, sbabm_fidx, sbabm_mb_id, sbabm_cate from sb_application_member where ".$refuse_query;
	$query = $conn->query($sql);
	foreach($query as $key => $refuse){
		$idx = $refuse['sbabm_idx'];
		$fidx = $refuse['sbabm_fidx'];
		$mb_id = $refuse['sbabm_mb_id'];
		$cate = $refuse['sbabm_cate'];

		$sql = "select sb_phone from sb_member where sb_id='".$mb_id."'";
		$query = $conn->query($sql);
		$phone = $query->fetch_assoc();
		$phone = $phone['sb_phone'];

		$sql = "select st_content from sb_sms_template where st_idx='".$getIdx."'";
		$query = $conn->query($sql);
		$sms_content = $query->fetch_assoc();
		$sms_content = $sms_content['st_content'];

		$smsSender = getSmsSender();
		$smsSender = explode("-", $smsSender);
		
		$sphone1 = $smsSender[0];
		$sphone2 = $smsSender[1];
		$sphone3 = $smsSender[2];
		$smsType = "L";
		switch($cate){
			case "shopper":
				$cate_title = "미스테리쇼퍼";
				break;
			case "pick":
				$cate_title = "체험단";
				break;
			case "ftalk":
				$cate_title = "스시노미식회";
				break;
			default:
				$cate_title = "자발적 후기";
				break;
		}
		$sms_title = "[스시노백쉐프]신청하신 ".$cate_title."의 작성후기가 거절되었습니다.";
		$rphone = $phone;
		include($_SERVER['DOCUMENT_ROOT']."/lib/smsLib2.php");
	//문자 발송 끝
	//
		$sql = "insert into sb_refuse_sms (sb_idx2, sb_fidx, sb_refuse_type, sb_sms_content, sb_sms_send_mb, sb_sms_send_phone, sb_sms_w_date, sb_sms_result) values 
				('".$idx."', '".$fidx."', '".$getIdx."', '".$sms_content."', '".$mb_id."', '".$phone."', now(), '".$Result."')";
		$conn->query($sql);

		//$arr_phone[] = $phone;
	}
	
	$r = array("msg"=>"선택하신 회원의 거절이 완료되었습니다.");
	$r = (object) $r;
	echo json_encode($r);
	exit;
}
exit;
?>