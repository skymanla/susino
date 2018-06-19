<?
/*
WindDesign Ryan
Exp : 미스테리쇼퍼, 미식회, 체험단 신청 공통 ajax 페이지
json
 */
header("Content-Type:application/json");
session_start();
include_once $_SERVER['DOCUMENT_ROOT']."/lib/dbconn.php";

$sb_id = $conn->escape_string($_REQUEST['mb_id']);
$idx = $conn->escape_string($_REQUEST['idx']);
$sbab_cate = $conn->escape_string($_REQUEST['aType']);

$tbl_info = "sb_application_board";
$tbl_info_member = "sb_application_member";
//실제 회원 체크
$sql = "select count(*) as cnt from sb_member where sb_id='".$sb_id."' and sb_delete_flag is null";
$q = $conn->query($sql);
$v = $q->fetch_assoc();

if($v['cnt']==0){
	$r = array("msg" => "잘못된 회원 정보입니다.");
}else{
	//기존 신청 여부 확인
	$sql = "select count(*) as cnt from $tbl_info_member where sbabm_mb_id='".$sb_id."' and sbabm_fidx='".$idx."' and sbabm_cate='".$sbab_cate."'";
	$q = $conn->query($sql);
	$vC = $q->fetch_assoc();
	if($vC['cnt'] > 0){
		$r = array("msg" => "이미 신청하였습니다.", "codeNum" => "99");
		$r = (object) $r;
		echo json_encode($r);
		exit;
	}

	//limit check
	$sql = "select count(*) as cnt from $tbl_info_member where sbabm_fidx='".$idx."'";
	$q = $conn->query($sql);
	$vD = $q->fetch_assoc();

	$sql = "select sbab_limit from $tbl_info where sbab_idx='".$idx."'";
	$q = $conn->query($sql);
	$vE = $q->fetch_assoc();

	if($vD['cnt'] == $vE['sbab_limit']){//관리자 지정 리밋이랑 현재 신청한 회원 총합이 같아면 종료
		$r = array("msg" => "해당 이벤트의 모집은 마감되었습니다.", "codeNum" => "99");
		$r = (object) $r;
		echo json_encode($r);
		exit;	
	}

	//check idx
	$sql = "select sbabm_idx from $tbl_info_member where 1 order by sbabm_idx desc limit 1";
	$q = $conn->query($sql);
	$vI = $q->fetch_assoc();
	if(!empty($vI['sbabm_idx'])){
		$sbabm_idx = $vI['sbabm_idx'];
		$sbabm_idx++;
	}else{
		$sbabm_idx = 1;
	}
	$sql = "insert into $tbl_info_member
			(sbabm_idx, sbabm_fidx, sbabm_mb_id, sbabm_cate, sbabm_option2, sbabm_option3, sbabm_option4, sbabm_option5, sbabm_rdate)
			values
			('$sbabm_idx', '$idx', '$sb_id', '$sbab_cate', '', '', '', '', now())";
	$conn->query($sql);
	$r = array("msg" => "신청완료되었습니다.\n결과를 기다려주세요.", "codeNum" => "19");
	$r = (object) $r;
	echo json_encode($r);
	exit;
}
?>