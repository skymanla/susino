<?
$host = $_SERVER['HTTP_HOST'];
$oCurl = curl_init();
$url =  "http://".$host."/lib/calljson.php";

$aPostData['userId'] = "winddesign32sms"; // SMS 아이디
$aPostData['passwd'] = "075cb0de4986c1a0664f1e4ecfe56bc2"; // 인증키
curl_setopt($oCurl, CURLOPT_URL, $url);
curl_setopt($oCurl, CURLOPT_POST, 1);
curl_setopt($oCurl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($oCurl, CURLOPT_POSTFIELDS, $aPostData);
curl_setopt($oCurl, CURLOPT_SSL_VERIFYPEER, 0);
$ret = curl_exec($oCurl);
echo $ret;
curl_close($oCurl);
?>