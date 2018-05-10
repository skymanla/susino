<?
/*
password 찾기
made by skymanla(Ryan)
 */
include_once $_SERVER['DOCUMENT_ROOT']."/lib/dbconn.php";

header("Content-Type:application/json");


$sb_find_id = $conn->real_escape_string($_REQUEST['sb_id']);
$sb_email = $conn->real_escape_string($_REQUEST['sb_email']);
$sql = "select count(*) as cnt from sb_member where sb_id='".$sb_find_id."' and sb_email='".$sb_email."'";
$q = $conn->query($sql);
$cnt = $q->fetch_assoc();

if(!$cnt['cnt']=='0'){//입력값이 존재하면
	$hash_key = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";//암호화키
	$charactersLength = strlen($hash_key);
	$randomString = "";
	for($i=0;$i<10;$i++){
		$randomString .= $hash_key[rand(0, $charactersLength-1)];//랜덤 문자 생성
	}
	$chg_tmp_pwd = password_hash($randomString, PASSWORD_BCRYPT);//랜덤문자 암호화
	$sql = "update sb_member set sb_password='".$chg_tmp_pwd."' where sb_id='".$sb_find_id."'";//업뎃하고
	if($conn->query($sql)){//쿼리 들어가면 메일 발송

		$header = "MIME-Version: 1.0\r\n";
		//$header.= "Content-Type: multipart/mixed; charset=utf-8;format=flowed\r\n";
		$header.= "Content-Type: text/html; charset=utf-8;format=flowed\r\n";
		$header.= "From: sbchef <sbchef@naver.com> \r\n";
		$header.="Content-Transfer-Encoding: 8bit\n"; // 헤더 설정

		$title = "[스시노백]임시 패스워드 발송하였습니다.";
		$content = "임시 패스워드는 <br> {$randomString} <br> 입니다.<br>로그인 후 패스워드를 꼭 변경하시기 바랍니다.";

		mail($_REQUEST['sb_email'], $title, $content, $header);

		$result = array(
				"postnumber"=>"90",
				"postId"=>"send mail");
	}
}else{
	$result = array(
				"postnumber"=>"99",
				"postId"=>"no value!");
}

$finish = (object) $result;
//var_dump(json_encode($finish));
echo json_encode($finish);
?>