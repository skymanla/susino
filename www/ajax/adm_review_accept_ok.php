<?php
include_once $_SERVER['DOCUMENT_ROOT']."/lib/dbconn.php";
header("Content-Type:application/json");

/*$result = (object) $_REQUEST;
echo json_encode($result);
exit;*/
$getfIdx = $_REQUEST['getfIdx'];
$getIdx = $_REQUEST['getIdx'];
$getVal = $_REQUEST['getVal'];
//get member id
$sql = "select sbabm_mb_id as id from sb_application_member where sbabm_idx='".$getIdx."'";
$q = $conn->query($sql);
$sb_id = $q->fetch_assoc();
//승인번호 중복 확인
$sql = "select count(*) as cnt from sb_application_member where sbabm_fidx='".$getfIdx."' and sbabm_option3='Y' and sbabm_option4='".$getVal."'";
$q = $conn->query($sql);
$fIdx = $q->fetch_assoc();
if($fIdx['cnt'] > '0'){
	$result = array("msg"=>"중복된 승인 번호입니다.\n승인번호를 확인해 주세요.", "codeNum" => "99");
	$result = (object) $result;
	echo json_encode($result);
	exit;
}
//5회 이상인데 승인이 들어갈 경우는 어떠카지????
//일단 5회된 회원의 경우 승인 불가처리로 만들쟈
//만약 쿠폰을 관리자에서 자동 발급을 해준다면 여기 부분을 수정
/*$sql = "select sb_review_cnt as cnt from sb_member where sb_id='".$sb_id['id']."'";
$q = $conn->query($sql);
$chk_count = $q->fetch_assoc();
if($chk_count['cnt'] == '5'){
	$result = array("msg"=>"승인이 5회 된 회원입니다.\n회원이 쿠폰을 발급받은 후 승인이 가능합니다.", "codeNum" => "99");
	$result = (object) $result;
	echo json_encode($result);
	exit;
}*/
/* 사용자가 상품권받기 했을 때 -5 씩 하는걸로*/

//승인번호 update
$sql_common = " sbabm_option3='Y', sbabm_option4='".$getVal."', sbabm_admin_accept_time=now()";
$sql = "update sb_application_member set ".$sql_common." where sbabm_idx='".$getIdx."' and sbabm_fidx='".$getfIdx."'";
if($conn->query($sql)){
	//후기 승인 메세지 보내기 start
	$sql = "select * from sb_application_board where sbab_idx='".$getfIdx."'";
	$q = $conn->query($sql);
	$t_valaue = $q->fetch_assoc();
	switch($t_value['sbab_cate']){
		case "shopper":
			$t_cate = "미스테리쇼퍼";
			break;
		case "ftalk":
			$t_cate = "스시노미식회";
			break;
		case "pick":
			$t_cate = "체험단";
			break;
		case "selfer":
			$t_cate = "자발적 후기";
			break;
	}
	$t_tit = $t_value['sbab_title'];
	$title = "[스시노백쉐프] -".$t_cate."- ".$t_tit." 후기 등록 완료안내";
	$content = "우리동네 맛 평가단 등록이 완료 되었습니다! 꼼꼼한 답변으로 채워진 소중한 후기 감사 드립니다. 후기 등록이 완료되면 우동맛 스티커가 증정됩니다. 총 우동 다섯그릇이 모이면 스시노백쉐프 기프티카드 3만원권을 드리오니, 앞으로도 스시노백쉐프의 우동맛 적극적인 참여 부탁드립니다.";
	//후기 승인 메세지 보내기 end
	//member table update
	$sql = "update sb_member set sb_review_cnt=sb_review_cnt+1, sb_admin_review_cnt=sb_admin_review_cnt+1 where sb_id='".$sb_id['id']."'";
	$conn->query($sql);
	$result = array("msg"=>"승인신청이 완료되었습니다.", "codeNum"=>"19");
	$result = (object) $result;
	echo json_encode($result);
	exit;
}else{
	$result = array("msg"=>"문제가 생겨 승인신청이 되지 않았습니다.\n유지보수 업체에 문의주시기 바랍니다.", "codeNum"=>"99");
	$result = (object) $result;
	echo json_encode($result);
	exit;
}
?>