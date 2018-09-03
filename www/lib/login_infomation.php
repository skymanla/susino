<?php
/*
Ryan skymanla
회원정보 가공
 */
session_start();
include_once($_SERVER['DOCUMENT_ROOT']."/lib/dbconn.php");
$dash_row = '';
if($_SESSION['sba_id'] == "admin"){
	$_SESSION['is_member'] = "admin";
	//최고관리자는 그냥 슈벌....불러올게 없어
}else if(isset($_SESSION['sb_idx'])){
	if(!isset($_SESSION['is_member'])) $_SESSION['is_member'] = "member";
	$sb_idx = $conn->real_escape_string($_SESSION['sb_idx']);
	$sb_id = $conn->real_escape_string($_SESSION['sb_id']);
	$sb_pwd = $conn->real_escape_string($_SESSION['sb_password']);
	$sb_level = $conn->real_escape_string($_SESSION['sb_mem_level']);

	$dongnae = $_SESSION['sb_dongnae'];
	//DashBoard sql
	$sql_dash = "select *, sb_dongnae as dongnae,
				(select count(sb_dongnae) as cnt from sb_member where sb_dongnae=dongnae) as ourdongnae,
				(select count(sbabm_mb_id) as cnt from sb_application_member where sbabm_mb_id='".$sb_id."' and (sbabm_option2='Y' and sbabm_option5='Y')) as accept_review,
				(select count(sbabm_mb_id) as cnt from sb_application_member where sbabm_mb_id='".$sb_id."' and (sbabm_option2 != 'Y' and sbabm_option5='Y')) as post_review,
				(select sb_level_title from sb_member_level where sb_level_cate=sb_mem_level) as level_title
				from sb_member where sb_id='".$sb_id."'";
	$query = $conn->query($sql_dash);
	$dash_row = $query->fetch_assoc();
	//휴대폰번호 배열처리
	$member_phone = explode("-", $dash_row['sb_phone']);
	//이메일 배열처리
	$member_email = explode("@", $dash_row['sb_email']);
	//우리동네 배열처리
	$sb_dong_arr = explode(" ", $dash_row['dongnae']);
	//생년월일 배열처리
	$member_birth = explode("-", $dash_row['sb_birth']);
}else{
	//pass
}
?>