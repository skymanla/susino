<?php
	$dir_path = $_SERVER['DOCUMENT_ROOT']."/data/review";
	$dir_path_cate = $dir_path."/".$aType;
	$dir_path_member = $dir_path_cate."/".$mb_idx;
	//make folder
	if(is_dir($dir_path) == false) mkdir($dir_path, 0777);
	if(is_dir($dir_path_cate) == false) mkdir($dir_path_cate, 0777);
	if(is_dir($dir_path_member) == false) mkdir($dir_path_member, 0777);
	//file chkeck
	$specialList = array("!","@","#","$","%","^","&","*","+","-","|","`","~",":",";","'","/"," ","?",">","<","=");
	$update_common = '';
	for($i=1;$i<=2;$i++){
		if(is_uploaded_file($_FILES["file{$i}"]['tmp_name'])){
			$mime_type = mime_content_type($_FILES["file{$i}"]['tmp_name']);
			if($mime_type != "image/png"){
				$sql = "delete from sb_review_board where sbr_idx=".$sbr_idx;
				$conn->query($sql);
				echoAlert("이미지 파일이 아닙니다.다시 작성해 주시기 바랍니다.");
				echoMovePage($url);
				exit;
			}
			$tmp_name = $_FILES["file{$i}"]['tmp_name'];
			$name = $_FILES["file{$i}"]['name'];
			$file_size = $_FILES["file{$i}"]['size'];
			${"file_size$i"} = $file_size;
			$new_filename = str_replace($specialList, "", $name);
			${"new_filename$i"} = $new_filename;
			$ext = substr(strrchr($new_filename,"."),1);
			$ext = strtolower($ext);
			if(move_uploaded_file($tmp_name, $dir_path_member."/".$name)){
				${"update_common".$i} = "sbr_file{$i}='".$name."', sbr_file{$i}_size='".$file_size."'";
			}
		}else{
			$sql = "delete from sb_review_board where sbr_idx=".$sbr_idx;
			$conn->query($sql);
			echoAlert("첨부파일 등록에 문제가 생겼습니다. 확인해주시기 바랍니다.");
			echoMovePage($url);
			exit;
		}
	}
	$update_common = $update_common1.", ".$update_common2;
	$sql = "update sb_review_board set ".$update_common." where sbr_idx='".$sbr_idx."'";
	if($conn->query($sql)){
		//mailling
		$sql = "select sb_name, sb_email from sb_member where sb_id='".$mb_id."'";
		$q = $conn->query($sql);
		$mail = $q->fetch_assoc();
		$mailTo = "skymanla@winddesign.co.kr";
		$title = $mb_id."님께서 보내신 [".$event_cate."]".$event_title."의 후기입니다.";
		$boundary = "--".uniqid("part");
		
		$header = "Return-Path: ".$mail['sb_email']."\r\n";
		$header .= "from : ".$mail['sb_name']." <".$mail['sb_email'].">\r\n";
		
		$filename1 = basename($new_filename1);
		$fp1 = fopen($dir_path_member."/".$filename1, "r");
		$file1 = fread($fp1, $file_size1);		
		fclose($fp1);
		
		$filename2 = basename($new_filename2);
		$fp2 = fopen($dir_path_member."/".$filename2, "r");
		$file2 = fread($fp2, $file_size2);		
		fclose($fp2);

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

 		$mailbody .= "--$boundary\r\n";
		$mailbody .= "Content-Type: ".$upfile_type."; name=\"".$filename1."\"\r\n";   // 내용
		$mailbody .= "Content-Transfer-Encoding: base64\r\n"; // 암호화 방식  
		$mailbody .= "Content-Disposition: attachment; filename=\"".$filename1."\"\r\n\r\n"; // 첨부파일인 것을 알림
		$mailbody .= chunk_split(base64_encode($file1))."\r\n\r\n";
		

		$mailbody .= "--$boundary\r\n";
		$mailbody .= "Content-Type: ".$upfile_type."; name=\"".$filename2."\"\r\n";   // 내용
		$mailbody .= "Content-Transfer-Encoding: base64\r\n"; // 암호화 방식  
		$mailbody .= "Content-Disposition: attachment; filename=\"".$filename2."\"\r\n\r\n"; // 첨부파일인 것을 알림
		$mailbody .= chunk_split(base64_encode($file2))."\r\n\r\n";
		

		$mailbody .= "--$boundary--\r\n";  //내용 구분자 마침
		$result = mail($mailTo,$title,$mailbody,$header);
		if($result){
			//selfer insert sb_application_member
			if($aType == "selfer"){
				$sql_index = "select sbabm_idx from sb_application_member where 1 order by sbabm_idx desc limit 1";
				$query = $conn->query($sql_index);
				if($query->num_rows > '0'){
					$inp_idx = $query->fetch_assoc();
					$inp_index = $inp_idx['sbabm_idx']+1;
				}else{
					$inp_index = "1";
				}
				$inp_common = " sbabm_idx='".$inp_index."', sbabm_fidx='0', sbabm_mb_id='".$mb_id."', sbabm_cate='".$aType."', sbabm_option2='Y', sbabm_option5='Y',
								sbabm_rdate=now(), sbabm_adate=now(), sbabm_review_date=now() ";
				$inp_query = "insert into sb_application_member set ".$inp_common;
				$conn->query($inp_query);

				$up_common = "update sb_review_board set sbr_aidx2='".$inp_index."' where sbr_idx='".$sbr_idx."'";
				$conn->query($up_common);
			}else{
				$sql = "update sb_application_member set sbabm_option2='Y', sbabm_review_date=now()
					where sbabm_fidx='".$getIdx."' and sbabm_mb_id='".$mb_id."' and sbabm_cate='".$aType."'";
				$conn->query($sql);
			}			
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
	}
?>