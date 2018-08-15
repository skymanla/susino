<?php 
include_once $_SERVER['DOCUMENT_ROOT']."/lib/dbconn.php";
include_once($_SERVER['DOCUMENT_ROOT']."/lib/function.php");
include_once($_SERVER['DOCUMENT_ROOT']."/ajax/register_our_area.php");
session_start();
//member value
$mb_idx = $_SESSION['sb_idx'];
$mb_id = $_SESSION['sb_id'];
//idx value
$getIdx = $_POST['getIdx'];
$aType = $_POST['aType'];

//당점 확인 여부
$sql = "select count(*) as cnt from sb_application_member where sbabm_fidx='".$getIdx."' and sbabm_mb_id='".$mb_id."' and sbabm_cate='".$aType."'";
$query = $conn->query($sql);
$app_val = $query->fetch_assoc();
if($app_val['cnt'] == 0){
	header("HTTP/1.0 404 Not Found");
	die("잘못된 접근입니다.");
}
//후기 작성 여부
$sql = "select count(*) as cnt from sb_review_board where sbr_widx='".$mb_idx."' and sbr_wid='".$mb_id."' and sbr_aidx='".$getIdx."' and sbr_atype='".$aType."'";
$query = $conn->query($sql);
$review_cnt = $query->fetch_assoc();
if($review_cnt['cnt'] > 0){
	//go_href("이미 후기를 등록했습니다.", "", "back");
}
$sbr_s_sido = our_area($_POST['s_sido']);
//insert value
$insert_common = "sbr_widx='".$mb_idx."',
				sbr_wid='".$mb_id."',
				sbr_aidx='".$getIdx."',
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
				sbr_to_clean_dress='".$_POST['to_clean_dress']."',
				sbr_to_clean_score='".$_POST['to_clean_score']."',
				sbr_to_all_score='".$_POST['to_all_score']."',
				sbr_rdate=now(),
				sbr_ip='".$_SERVER['REMOTE_ADDR']."'
				";
$sql = "insert into sb_review_board set ".$insert_common;

if($conn->query($sql)){
	$sbr_idx = mysqli_insert_id($conn);
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
			continue;
		}
	}
	$update_common = $update_common1.", ".$update_common2;
	$sql = "update sb_review_board set ".$update_common." where sbr_idx='".$sbr_idx."'";
	if($conn->query($sql)){
		//mailling
		$mailTo = "skymanla@winddesign.co.kr";
		$title = "테스트 메일 발송";
		$content = "ㅈ다ㅓㅣ룾대ㅓ룾디루재댜룾데루제룾데룾ㄷ리ㅜㅈ디룾ㄷ렂맂두리저둘지ㅓㄷ루지더루지더루저디루지더ㅜㄹㅈ디루저ㅣ루짇룾더ㅣ루";
		$boundary = "*****".uniqid("part");
		
		$header = "Return-Path: skymanla@winddesign.co.kr\r\n";
		$header .= "from : skymanla@winddesign.co.kr <skymanla@winddesign.co.kr>\r\n";
		
		$filename1 = basename($new_filename1);
		$fp1 = fopen($dir_path_member."/".$filename1, "r");
		$file1 = fread($fp1, $file_size1);		
		fclose($fp1);
		
		$filename2 = basename($new_filename2);
		$fp2 = fopen($dir_path_member."/".$filename2, "r");
		$file2 = fread($fp2, $file_size2);		
		fclose($fp2);

		$upfile_type = "application/octet-stream";

		$header .= "MIME-Version: 1.0\r\n";
		$header .= "Content-Type: Multipart/mixed; boundary=\"$boundary\"";

		$mailbody = "Mulit-part Mailing";
		$mailbody .= "--$boundary\r\n";
		$mailbody .= "Content-Type: text/html; charset=utf-8;\r\n";
 		//$mailbody .= "Content-Type: text/html; charset=euc-kr\r\n";
 		//$mailbody .= "Content-Transfer-Encoding: 8bit\r\n\r\n";
 		$mailbody .= "Content-Transfer-Encoding: base64\r\n\r\n";
 		//$mailbody .= nl2br(addslashes($content)) . "\r\n";
 		$mailbody .= chunk_split(base64_encode($content)) . "\r\n";

 		$mailbody .= "--$boundary\r\n";
		$mailbody .= "Content-Type: ".$upfile_type."; name=\"".$filename1."\"\r\n";   // 내용
		$mailbody .= "Content-Transfer-Encoding: base64\r\n"; // 암호화 방식  
		$mailbody .= "Content-Disposition: attachment; filename=\"".$filename1."\"\r\n\r\n"; // 첨부파일인 것을 알림
		$mailbody .= chunk_split(base64_encode($file1))."\r\n\r\n";
		//$mailbody .= chunk_split(base64_encode($file1), 76, "\r\n");  
		

		$mailbody .= "--$boundary\r\n";
		$mailbody .= "Content-Type: ".$upfile_type."; name=\"".$filename2."\"\r\n";   // 내용
		$mailbody .= "Content-Transfer-Encoding: base64\r\n"; // 암호화 방식  
		$mailbody .= "Content-Disposition: attachment; filename=\"".$filename2."\"\r\n\r\n"; // 첨부파일인 것을 알림
		//$mailbody .= chunk_split(base64_encode($file2), 76, "\r\n");  
		$mailbody .= chunk_split(base64_encode($file2))."\r\n\r\n";
		

		$mailbody .= "--$boundary--";  //내용 구분자 마침
		//echo $mailbody;exit;
		$result = mail($mailTo,$title,$mailbody,$header);
		if($result){
			echo "success";
			//메일 발송 후 본인 내역에 update
			exit;
			$sql = "update sb_application_member set sbabm_option2='Y', sbabm_review_date=now()
					where sbabm_fidx='".$getIdx."' and sbabm_mb_id='".$mb_id."' and sbabm_cate='".$aType."'";
			$conn->query($sql);
			//메일 발송 후 회원 정보에 update
			$sql = "update sb_member set sb_review_cnt=IF(sb_review_cnt=5, 1, sb_review_cnt+1), sb_review_tocnt=sb_review_tocnt+1
					where sb_id='".$mb_id."'";
			echo $sql;
			$conn->query($sql);
		}else{
			echo "fail....";
		}
	}
}
?>