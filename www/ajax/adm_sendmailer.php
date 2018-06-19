<?
/*
WindDesign Ryan
Exp : send Email
 */
include_once $_SERVER['DOCUMENT_ROOT']."/lib/dbconn.php";
include_once($_SERVER['DOCUMENT_ROOT']."/lib/function.php");

$tbl_mail_list = "sb_email_list";
$tbl_mail_send_list = "sb_email_send_list";
$tbl_mail_log = "sb_email_log";

$mail_target = $conn->real_escape_string($_POST['mail_target']);
$sb_email_title = $conn->real_escape_string($_POST['sb_email_title']);
$sb_email_title = addslashes(str_replace("\\","\\\\",$sb_email_title));

$sb_email_content = $conn->real_escape_string($_POST['sb_email_content']);
$sb_email_content_v1 = stripslashes($sb_email_content);//발송용
$sb_email_content = addslashes($sb_email_content);//저장용

//idx
$sql = "select sb_idx from ".$tbl_mail_list." where 1 order by sb_idx desc limit 0, 1";
$query = $conn->query($sql);
$v_idx = $query->fetch_assoc();
if($v_idx['sb_idx']){
	$sb_idx = ++$v_idx['sb_idx'];
}else{
	$sb_idx = 1;
}

$header = "MIME-Version: 1.0\r\n";
//$header.= "Content-Type: multipart/mixed; charset=utf-8;format=flowed\r\n";
$header.= "Content-Type: text/html; charset=utf-8;format=flowed\r\n";
$header.= "From: sbchef <sbchef@naver.com> \r\n";
$header.="Content-Transfer-Encoding: 8bit\n"; // 헤더 설정

switch($mail_target){
	case "manual"://직접입력
		$sb_email_send_lvl = $_POST['sb_sender_email'];
		$sb_sender = explode(",", $sb_email_send_lvl);
		$sb_sender = array_values(array_filter(array_map('trim',$sb_sender)));
		$sb_email_send_lvl = implode($sb_sender, ",");
		$sb_email_send_mb = "직접입력";
		$sql = "insert into ".$tbl_mail_list."
		(sb_idx, sbe_idx, sb_email_title, sb_email_content, sb_email_send_lvl, sb_email_send_mb, sb_email_w_date)
		values
		('$sb_idx', '$sb_idx', '$sb_email_title', '$sb_email_content', '$sb_email_send_lvl', '$sb_email_send_mb', now())
		";
		if($conn->query($sql)){
			for($i=0;$i<count($sb_sender);$i++){
				$mem_sql = "select sb_email from sb_member where sb_id='".trim($sb_sender[$i])."'";
				$mem_query = $conn->query($mem_sql);
				$v_mem = $mem_query->fetch_assoc();
				mail($v_mem['sb_email'],$sb_email_title,$sb_email_content_v1,$header);
			}	
		}
		$up_sql = "update ".$tbl_mail_list." set sb_email_send_date=now() where sb_idx='".$sb_idx."'";
		$conn->query($up_sql);
		break;
	case "lvl_setting"://레벨설정
		$sb_email_send_lvl = $conn->real_escape_string($_POST['sb_mb_lvl']);
		$sb_email_send_mb = "레벨설정";
		$sql = "insert into ".$tbl_mail_list."
		(sb_idx, sbe_idx, sb_email_title, sb_email_content, sb_email_send_lvl, sb_email_send_mb, sb_email_w_date)
		values
		('$sb_idx', '$sb_idx', '$sb_email_title', '$sb_email_content', '$sb_email_send_lvl', '$sb_email_send_mb', now())
		";
		if($conn->query($sql)){
			$sql = "select sb_email from sb_member where sb_mem_level='".$sb_email_send_lvl."'";
			$query = $conn->query($sql);
			foreach($query as $key => $sb_sender){
				mail($sb_sender['sb_email'],$sb_email_title,$sb_email_content_v1,$header);
			}
		}
		$up_sql = "update ".$tbl_mail_list." set sb_email_send_date=now() where sb_idx='".$sb_idx."'";
		$conn->query($up_sql);
		break;
	case "dong_setting"://우리동네
		//우리동네
		$sb_sido = $conn->real_escape_string($_POST[s_sido]);
		$sb_addr_sec = $conn->real_escape_string($_POST[addr_sec]);
		include_once('./register_our_area.php');

		$sb_email_send_mb = "우리동네";
		$sql = "insert into ".$tbl_mail_list."
		(sb_idx, sbe_idx, sb_email_title, sb_email_content, sb_email_send_lvl, sb_email_send_mb, sb_email_w_date)
		values
		('$sb_idx', '$sb_idx', '$sb_email_title', '$sb_email_content', '$sb_our_area', '$sb_email_send_mb', now())
		";
		if($conn->query($sql)){
			$sql = "select sb_email from sb_member where sb_dongnae='".$sb_our_area."'";
			$query = $conn->query($sql);
			foreach($query as $key => $sb_sender){
				mail($sb_sender['sb_email'],$sb_email_title,$sb_email_content_v1,$header);
			}
		}
		$up_sql = "update ".$tbl_mail_list." set sb_email_send_date=now() where sb_idx='".$sb_idx."'";
		$conn->query($up_sql);
		break;
	default:
		break;
}

$url = "/adm/page/s2/s3.php";
echoMovePage($url);
?>