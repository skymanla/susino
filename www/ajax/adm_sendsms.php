<?
/*
WindDesign Ryan
Exp : send SMS
 */
include_once $_SERVER['DOCUMENT_ROOT']."/lib/dbconn.php";
include_once($_SERVER['DOCUMENT_ROOT']."/lib/function.php");

$tbl_mail_list = "sb_sms_list";
$tbl_mail_send_list = "sb_sms_send_list";//사용안함
$tbl_mail_log = "sb_sms_log";//사용안함

$mail_target = $conn->real_escape_string($_POST['mail_target']);
$sb_sms_title = $conn->real_escape_string($_POST['sb_sms_title']);
$sb_sms_title = addslashes(str_replace("\\","\\\\",$sb_sms_title));

$sb_sms_content = $conn->real_escape_string($_POST['sb_sms_content']);
$sb_sms_content_v1 = stripslashes($sb_sms_content);//발송용
$sb_sms_content = addslashes($sb_sms_content);//저장용

//idx
$sql = "select sb_idx from ".$tbl_mail_list." where 1 order by sb_idx desc limit 0, 1";
$query = $conn->query($sql);
$v_idx = $query->fetch_assoc();
if($v_idx['sb_idx']){
	$sb_idx = ++$v_idx['sb_idx'];
}else{
	$sb_idx = 1;
}

$returnurl = "http://".$_SERVER['HTTP_HOST']."/adm/page/s2/s2sview.php?idx=".$sb_idx;
//받는이 전화번호
$rphone = '';
switch($mail_target){
	case "manual"://직접발송
		$sb_sms_send_lvl = $_POST['sb_sender_email'];
		$sb_sender = explode(",", $sb_sms_send_lvl);
		$sb_sender = array_values(array_filter(array_map('trim',$sb_sender)));
		$sb_sender = array_unique($sb_sender);
		$sb_sms_send_lvl = implode($sb_sender, ",");
		$sb_sms_send_mb = "직접입력";

		//폰 번호 가져오기
		for($i=0;$i<count($sb_sender);$i++){
			$sql = "select sb_phone from sb_member where sb_id='".trim($sb_sender[$i])."'";
			$q = $conn->query($sql);
			$vA = $q->fetch_assoc();
			$rphone .= $vA['sb_phone'].",";
		}
		$rphone = substr($rphone, 0, -1);//마지막 , 제거
		include_once($_SERVER['DOCUMENT_ROOT']."/lib/smsLib.php");
		if($nointeractive!="1"){
			$sql = "insert into ".$tbl_mail_list."
					(sb_idx, sbe_idx, sb_sms_title, sb_sms_content, sb_sms_send_lvl, sb_sms_send_mb, sb_sms_w_date, sb_sms_send_date)
					values
					('$sb_idx', '$sb_idx', '$sb_sms_title', '$sb_sms_content', '$sb_sms_send_lvl', '$sb_sms_send_mb', now(), now())
					";
			if($conn->query($sql)){

			}else{
				die($sql);		
			}
		}
		
		break;
	case "lvl_setting"://레벨설정
		$sb_sms_send_lvl = $conn->real_escape_string($_POST['sb_mb_lvl']);
		$sb_sms_send_mb = "레벨설정";
		//폰 번호 가져오기
		$sql = "select sb_phone from sb_member where sb_mem_level='".$sb_sms_send_lvl."'";
		$query = $conn->query($sql);
		foreach($query as $key => $sb_sender){
			$rphone .= $sb_sender['sb_phone'].",";
		}
		$rphone = substr($rphone, 0, -1);//마지막 , 제거
		include_once($_SERVER['DOCUMENT_ROOT']."/lib/smsLib.php");
		if($nointeractive!="1"){
			$sql = "insert into ".$tbl_mail_list."
					(sb_idx, sbe_idx, sb_sms_title, sb_sms_content, sb_sms_send_lvl, sb_sms_send_mb, sb_sms_w_date, sb_sms_send_date)
					values
					('$sb_idx', '$sb_idx', '$sb_sms_title', '$sb_sms_content', '$sb_sms_send_lvl', '$sb_sms_send_mb', now(), now())";
			if($conn->query($sql)){

			}else{
				die($sql);		
			}
		}
		break;
	case "dong_setting"://우리동네
		//우리동네
		$sb_sido = $conn->real_escape_string($_POST[s_sido]);
		$sb_addr_sec = $conn->real_escape_string($_POST[addr_sec]);
		include_once('./register_our_area.php');
		$sb_sms_send_mb = "우리동네";

		$sql = "select sb_phone from sb_member where sb_dongnae='".$sb_our_area."'";
		$query = $conn->query($sql);
		foreach($query as $key => $sb_sender){
			$rphone .= $sb_sender['sb_phone'].",";
		}
		$rphone = substr($rphone, 0, -1);
		include_once($_SERVER['DOCUMENT_ROOT']."/lib/smsLib.php");
		if($nointeractive!="1"){
			$sql = "insert into ".$tbl_mail_list."
					(sb_idx, sbe_idx, sb_sms_title, sb_sms_content, sb_sms_send_lvl, sb_sms_send_mb, sb_sms_w_date, sb_sms_send_date)
					values
					('$sb_idx', '$sb_idx', '$sb_sms_title', '$sb_sms_content', '$sb_our_area', '$sb_sms_send_mb', now(), now())
					";
			if($conn->query($sql)){

			}else{
				die($sql);		
			}
		}
		break;
	default:
		break;
}

$url = "/adm/page/s2/s2sview.php?idx=".$sb_idx;
echoMovePage($url);
?>