<?php
/*
Ryan skymanla
리뷰 write page
 */
include_once $_SERVER['DOCUMENT_ROOT']."/lib/dbconn.php";
include_once($_SERVER['DOCUMENT_ROOT']."/lib/function.php");
include_once($_SERVER['DOCUMENT_ROOT']."/ajax/register_our_area.php");
session_start();
//member value
$mb_idx = trim($_SESSION['sb_idx']);
$mb_id = trim($_SESSION['sb_id']);

//관리자 및 비회원은 접근 못하게 막는다
if(empty($mb_idx) || empty($mb_id)){
	header("HTTP/1.0 404 Not Found");
	die("<h3>1. 잘못된 접근입니다.</h3>");
}
//idx value
$getIdx = trim($_POST['getIdx']);
$aType = trim($_POST['aType']);

//필수 조건값 없으면 막는다.
$aType_arr = array("shopper", "ftalk", "pick", "selfer");
if(!in_array($aType, $aType_arr)){
	header("HTTP/1.0 404 Not Found");
	die("<h3>2. 잘못된 접근입니다.</h3>");	
}

if($aType == "ftalk"){
	$file_submit = false;
}else{
	$file_submit = true;
}

if($aType == "selfer"){
	$url = "/page/s5/s2.php";
}else{
	$url = "/page/s5/s2sview.php?idx=".$getIdx."&aType=".$aType;
}

switch($aType){
	case "shopper":
		$event_cate = "미스테리쇼퍼";
		break;
	case "ftalk":
		$event_cate = "스시노미식회";
		break;
	case "pick":
		$event_cate = "체험단";
		break;
	case "selfer":
		$event_cate = "";//$event_title로 대체
		break;
}

//당점 확인 여부
if($aType!="selfer"){//자발적 후기는 당첨 여부가 필요없다.
	//post 값에 대한 DB에서 유효성 검사
	$sql = "select * from sb_application_member where sbabm_fidx='".$getIdx."' and sbabm_mb_id='".$mb_id."' and sbabm_cate='".$aType."' and sbabm_option5='Y'";
	$query = $conn->query($sql);
	if($query->num_rows == '0'){
		header("HTTP/1.0 404 Not Found");
		die("<h3>3. 잘못된 접근입니다.</h3>");
	}else{
		$app_val = $query->fetch_assoc();
	}
	//후기 작성 여부
	$sql = "select count(*) as cnt from sb_review_board where sbr_widx='".$mb_idx."' and sbr_wid='".$mb_id."' and sbr_aidx='".$getIdx."' and sbr_atype='".$aType."'";
	$query = $conn->query($sql);
	$review_cnt = $query->fetch_assoc();
	if($review_cnt['cnt'] > 0){
		echoAlert("이미 후기를 작성했습니다.");
		echoMovePage($url);
	}
	//후기 원본 이벤트 제목 가져오기
	$sql = "select sbab_title from sb_application_board where sbab_idx='".$getIdx."'";
	$query = $conn->query($sql);
	$title = $query->fetch_assoc();
	$event_title = $title['sbab_title'];
}else{
	$event_title = "자발적 후기";
}

$sbr_s_sido = our_area($_POST['s_sido']);
//insert value
$insert_common = "sbr_widx='".$mb_idx."',
				sbr_wid='".$mb_id."',
				sbr_aidx='".$getIdx."',
				sbr_aidx2='".$app_val['sbabm_idx']."',
				sbr_atype='".$aType."',
				sbr_visit_date='".$_POST['visit_date']."',
				sbr_s_sido='".$sbr_s_sido."',
				sbr_addr_sec='".$_POST['addr_sec']."',
				sbr_to_person='".$_POST['to_person']."',
				sbr_to_gether='".$_POST['to_gether']."',
				sbr_to_menu='".$_POST['to_menu']."',
				sbr_to_menu_depth='".$_POST['to_menu_depth']."',
				sbr_to_menu_time='".$_POST['to_menu_time']."',
				sbr_to_menu_rice='".$_POST['to_menu_rice']."',
				sbr_to_menu_fish='".$_POST['to_menu_fish']."',
				sbr_to_menu_score='".$_POST['to_menu_score']."',
				sbr_to_menu_ftalk='".$_POST['to_ftalk']."',
				sbr_to_station_hello='".$_POST['to_station_hello']."',
				sbr_to_station_help='".$_POST['to_station_help']."',
				sbr_to_station_menu='".$_POST['to_station_menu']."',
				sbr_to_station_exp='".$_POST['to_station_exp']."',
				sbr_to_station_score='".$_POST['to_station_score']."',
				sbr_to_clean_out='".$_POST['to_clean_out']."',
				sbr_to_clean_in='".$_POST['to_clean_in']."',
				sbr_to_clean_sound='".$_POST['to_clean_sound']."',
				sbr_to_clean_temper='".$_POST['to_clean_temper']."',
				sbr_to_clean_table='".$_POST['to_clean_table']."',
				sbr_to_clean_menu='".$_POST['to_clean_menu']."',
				sbr_to_clean_dress='".$_POST['to_clean_dress']."',
				sbr_to_clean_score='".$_POST['to_clean_score']."',
				sbr_to_all_score='".$_POST['to_all_score']."',
				sbr_rdate=now(),
				sbr_ip='".$_SERVER['REMOTE_ADDR']."'
				";
$sql = "insert into sb_review_board set ".$insert_common;

if($conn->query($sql)){
	$sbr_idx = mysqli_insert_id($conn);
	if($file_submit == true){
		include_once($_SERVER['DOCUMENT_ROOT']."/lib/write_review_infile.php");
	}else{
		include_once($_SERVER['DOCUMENT_ROOT']."/lib/write_review_nofile.php");
	}
}
?>