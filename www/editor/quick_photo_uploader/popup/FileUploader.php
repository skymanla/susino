<?php
//기본 리다이렉트
echo $_REQUEST["htImageInfo"];
$host = $_SERVER['HTTP_HOST'];
$url = $_REQUEST["callback"] .'?callback_func='. $_REQUEST["callback_func"];
$bSuccessUpload = is_uploaded_file($_FILES['Filedata']['tmp_name']);
if (bSuccessUpload) { //성공 시 파일 사이즈와 URL 전송
	
	$tmp_name = $_FILES['Filedata']['tmp_name'];
	$name = "editor_".time();
	$new_path = "/data/editor/".urlencode($name);
	@move_uploaded_file($tmp_name, $new_path);
	$url .= "&bNewLine=true";
	$url .= "&sFileName=".urlencode(urlencode($name));
	//$url .= "&size=". $_FILES['Filedata']['size'];
	//아래 URL을 변경하시면 됩니다.
	$url .= "&sFileURL=http://".$host."/data/editor/".urlencode(urlencode($name));
} else { //실패시 errstr=error 전송
	$url .= '&errstr=error';
}
header('Location: '. $url);
?>