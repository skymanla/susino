<?php
$sql = "select sb_email, sb_name from sb_member where sb_id='".$mb_id."'";
		$q = $conn->query($sql);
		$mail = $q->fetch_assoc();
		$mailTo = "skymanla@winddesign.co.kr";
		$fromMail = $mail['sb_email'];
		$title = $mb_id."님께서 보내신 [".$event_cate."] ".$event_title."의 후기입니다.";
		$boundary = "--".uniqid("part");
		
		$header = "Return-Path: ".$fromMail."\r\n";
		$header .= "from : ".$mail['sb_name']." <".$fromMail.">\r\n";

		$upfile_type = "application/octet-stream";

		if($_POST['aType']=="shopper" || $_POST['aType']=="selfer" || $_POST['aType'] == "ftalk"){
			include_once($_SERVER['DOCUMENT_ROOT']."/ajax/review/review_mailing_shopper.php");
		}else if($_POST['aType']=="pick"){
			include_once($_SERVER['DOCUMENT_ROOT']."/ajax/review/review_mailing_pick.php");
		}
		
		$header .= "MIME-Version: 1.0\r\n";
		$header .= "Content-Type: Multipart/mixed; boundary=\"$boundary\"";		

		$mailbody = "--$boundary\r\n";
		$mailbody .= "Content-Type: text/html; charset=utf-8;format=flowed\r\n\r\n";
 		$mailbody .= $content."\r\n\r\n";

		$mailbody .= "--$boundary--\r\n";  //내용 구분자 마침
		$result = mail($mailTo,$title,$mailbody,$header);
		if($result){
			$sql = "update sb_application_member set sbabm_option2='Y', sbabm_review_date=now()
					where sbabm_fidx='".$getIdx."' and sbabm_mb_id='".$mb_id."' and sbabm_cate='".$aType."'";
			$conn->query($sql);
			//메일 발송 후 회원 정보에 update
			$sql = "update sb_member set sb_review_tocnt=sb_review_tocnt+1
					where sb_id='".$mb_id."'";
			$conn->query($sql);

			echoAlert("후기가 전송되었습니다.참여해 주셔서 감사합니다.");
			echoMovePage($url);
		}else{
			echo "fail....";
			exit;
		}
?>