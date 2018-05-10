<?
include_once($_SERVER['DOCUMENT_ROOT']."/lib/dbconn.php");
include_once($_SERVER['DOCUMENT_ROOT']."/lib/function.php");
session_start();


//justice
$sb_id = $_POST['sb_id'];
$sb_pw = password_hash($_POST['sb_pw'], PASSWORD_BCRYPT);
$sb_name = $_POST['sb_name'];
$sb_phone = $_POST['sb_tel1']."-".$_POST['sb_tel2']."-".$_POST['sb_tel3'];
$sb_email = $_POST['sb_email1']."@".$_POST['sb_email2'];
$sb_sex = $_POST['xy'];
$sb_birth = $_POST['sb_birth1']."-".$_POST['sb_birth2']."-".$_POST['sb_birth3'];
$sb_zipcode = $_POST['sb_zipcode'];
$sb_addr1 = $_POST['sb_addr1'];
$sb_addr2 = $_POST['sb_addr2'];
$sb_signin_ip = $_POST['mem_ip'];

$sql = "select * from sb_member where 1 order by sb_idx desc limit 0, 1";
$q = $conn->query($sql);
$v = $q->fetch_assoc();

if(!$v['sb_idx']){
	$sb_idx = 1;
}else{
	$sb_idx = $v['sb_idx']+1;
}


$sql = "insert into
		sb_member
		(sb_idx, sb_id, sb_password, sb_name, sb_phone, sb_email, sb_sex, sb_birth, sb_zipcode, sb_addr1, sb_addr2, sb_dongnae, sb_blog_url, sb_signin_ip, sb_regdate)
		values
		('$sb_idx', '$sb_id', '$sb_pw', '$sb_name', '$sb_phone', '$sb_email', '$sb_sex', '$sb_birth', '$sb_zipcode', '$sb_addr1', '$sb_addr2', '$sb_dongnae', '$sb_blog_url', '$sb_signin_ip', now())
		";

if($conn->query($sql)){
	$_SESSION['sb_name'] = $sb_name;
	$url = "./register_result.php";
	echoMovePage($url);
}
exit;
?>