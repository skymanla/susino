<?
/******************** 인증정보 ********************/
//$sms_url = "https://sslsms.cafe24.com/sms_sender.php"; // 전송요청 URL(callback)
$sms_url = "https://sslsms.cafe24.com/sms_sender.php"; // HTTPS 전송요청 URL
$sms['user_id'] = base64_encode("winddesign32sms"); //SMS 아이디.
$sms['secure'] = base64_encode("075cb0de4986c1a0664f1e4ecfe56bc2") ;//인증키
$sms['msg'] = base64_encode($sms_content);
if( $smsType == "L"){
	$sms['subject'] =  base64_encode($sms_title);
}
$sms['rphone'] = base64_encode($rphone);//받는이 전화번호
//$sms['rphone'] = base64_encode($_POST['rphone']);//받는이 전화번호
$sms['sphone1'] = base64_encode($sphone1);//보내는 사람 전화번호 
$sms['sphone2'] = base64_encode($sphone2);//보내는 사람 전화번호
$sms['sphone3'] = base64_encode($sphone3);//보내는 사람 전화번호
$sms['rdate'] = base64_encode($_POST['rdate']);//예약날짜
$sms['rtime'] = base64_encode($_POST['rtime']);//예약시간
$sms['mode'] = base64_encode("1"); // base64 사용시 반드시 모드값을 1로 주셔야 합니다.
//$sms['returnurl'] = base64_encode($_POST['returnurl']);//$returnurl
$sms['returnurl'] = base64_encode($returnurl);//$returnurl
//$sms['testflag'] = base64_encode('Y');//test mode
$sms['testflag'] = base64_encode($_POST['testflag']);
$sms['destination'] = strtr(base64_encode($_POST['destination']), '+/=', '-,');
//$returnurl = $_POST['returnurl'];
$sms['repeatFlag'] = base64_encode($_POST['repeatFlag']);//반복설정
$sms['repeatNum'] = base64_encode($_POST['repeatNum']);//반복회수
$sms['repeatTime'] = base64_encode($_POST['repeatTime']);//반복 시간
$sms['smsType'] = base64_encode($smsType); // LMS일경우 L
//$nointeractive = $_POST['nointeractive']; //사용할 경우 : 1, 성공시 대화상자(alert)를 생략
$nointeractive = "1"; //사용할 경우 : 1, 성공시 대화상자(alert)를 생략

$host_info = explode("/", $sms_url);
$host = $host_info[2];
$path = $host_info[3]."/".$host_info[4];

srand((double)microtime()*1000000);
$boundary = "---------------------".substr(md5(rand(0,32000)),0,10);
//print_r($sms);

// 헤더 생성
$header = "POST /".$path ." HTTP/1.0\r\n";
$header .= "Host: ".$host."\r\n";
$header .= "Content-type: multipart/form-data, boundary=".$boundary."\r\n";

// 본문 생성
foreach($sms AS $index => $value){
	$data .="--$boundary\r\n";
    $data .= "Content-Disposition: form-data; name=\"".$index."\"\r\n";
    $data .= "\r\n".$value."\r\n";
    $data .="--$boundary\r\n";
}
$header .= "Content-length: " . strlen($data) . "\r\n\r\n";

$fp = fsockopen($host, 80);

if ($fp) {
	fputs($fp, $header.$data);
	$rsp = '';
	while(!feof($fp)) {
		$rsp .= fgets($fp,8192);
	}
	fclose($fp);
	$msg = explode("\r\n\r\n",trim($rsp));
	$rMsg = explode(",", $msg[1]);
	$Result= $rMsg[0]; //발송결과
	$Count= $rMsg[1]; //잔여건수

	//발송결과 알림
	if($Result=="success") {
		$alert = "성공";
		$alert .= " 잔여건수는 ".$Count."건 입니다.";
	}
	else if($Result=="reserved") {
		$alert = "성공적으로 예약되었습니다.";
		$alert .= " 잔여건수는 ".$Count."건 입니다.";
	}
	else if($Result=="3205") {
		$alert = "잘못된 번호형식입니다.";
	}

	else if($Result=="0044") {
		$alert = "스팸문자는발송되지 않습니다.";
	}

	else {
		$alert = "[Error]".$Result;
	}
}else {
	$alert = "Connection Failed";
}

if($_SERVER['REMOTE_ADDR']=='14.32.121.97'){
	if($nointeractive=="1" && ($Result!="success" && $Result!="Test Success!" && $Result!="reserved") ) {
		echo "<script>alert('".$alert ."')</script>";
	}else if($nointeractive!="1") {
		echo "<script>alert('".$alert ."')</script>";
	}
}

//echo "<script>location.href='".$returnurl."';</script>";
?>