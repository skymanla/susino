<?php
/*
Ryan skymanla
5회 관리자 승인될 시 쿠폰 발송 이벤트
 */
include_once $_SERVER['DOCUMENT_ROOT']."/lib/dbconn.php";
header("Content-Type:application/json");

session_start();

$getId = $conn->real_escape_string($_REQUEST['getId']);
if($getId != $_SESSION['sb_id']){
	$result = array("msg"=>"사용자 ID가 다릅니다.", "codeNum"=>"99");		
	$result = (object) $result;
	echo json_encode($result);
	exit;
}

$sql = "select * from sb_member where sb_id='".$getId."' and sb_delete_flag is null";
$q = $conn->query($sql);
$member = $q->fetch_assoc();

if($member['sb_review_cnt'] < 5){
	$result = array("msg"=>"스티커가 5개 모이지 않았습니다.", "codeNum"=>"99");		
	$result = (object) $result;
	echo json_encode($result);
	exit;	
}

$sql = "insert into sb_coupon_member set 
		sbc_id='".$member['sb_id']."',
		sbc_sidx='".$member['sb_idx']."',
		sbc_rdate=now()";
if($conn->query($sql)){
	$sbc_idx = mysqli_insert_id($conn);
	//member table update
	$sql = "update sb_member set sb_review_cnt=sb_review_cnt-5, sb_review_get_coupon=sb_review_get_coupon+1
			where sb_id='".$member['sb_id']."'";
	if($conn->query($sql)){
		//문자 발송 API
		$smsType = "L";
		$sms_title = "[스시노백쉐프] 우리동네맛평가단 다섯그릇 완성!";
		$sms_content = $member['sb_id']."님! 우리동네 맛평가단 후기 5번 등록이 완료되었습니다. 소중한 후기 등록에 감사한 마음을 담아
					다음 날 스시노백쉐프 기프티카드 3만원권을 발송해드립니다. 고객님의 의견에 귀기울여 보다 나은 서비스와 맛을 제공하는 스시노백쉐프가 되도록 노력하겠습니다.
					기프티카드의 유효기간과, 사용가능 매장 확인 후 방문 부탁드립니다!";
		$smsSender = getSmsSender();
		$smsSender = explode("-", $smsSender);
					
		$sphone1 = $smsSender[0];
		$sphone2 = $smsSender[1];
		$sphone3 = $smsSender[2];

		$rphone = $member['sb_phone'];
		include($_SERVER['DOCUMENT_ROOT']."/lib/smsLib2.php");
		
		$sql = "insert into sb_refuse_sms (sb_idx2, sb_fidx, sb_refuse_type, sb_sms_content, sb_sms_send_mb, sb_sms_send_phone, sb_sms_w_date, sb_sms_result) values 
						('".$sbc_idx."', '0', 'getCoupon', '".$sms_content."', '".$member['sb_id']."', '".$member['sb_phone']."', now(), '".$Result."')";		
		$conn->query($sql);
		//문자 발송 END
		$result = array("msg"=>"상품권 신청이 완료되었습니다.", "codeNum"=>"19");		
		$result = (object) $result;
		echo json_encode($result);
		exit;	
	}
}
?>