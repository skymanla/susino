<?
include_once($_SERVER['DOCUMENT_ROOT']."/lib/dbconn.php");
include_once($_SERVER['DOCUMENT_ROOT']."/lib/function.php");
session_start();
if(empty($_SESSION['sb_id'])) die('404 NOT FOUND');
//justice
if(empty($_POST['sb_pw'])){
	//pass
}else{
	$sb_pw = password_hash($_POST['sb_pw'], PASSWORD_BCRYPT);
}

$sb_name = $_POST['sb_name'];
$sb_phone = $_POST['sb_tel1']."-".$_POST['sb_tel2']."-".$_POST['sb_tel3'];
$sb_email = $_POST['sb_email1']."@".$_POST['sb_email2'];
$sb_sex = $_POST['xy'];
$sb_birth = $_POST['sb_birth1']."-".$_POST['sb_birth2']."-".$_POST['sb_birth3'];
$sb_zipcode = $_POST['sb_zipcode'];
$sb_addr1 = $_POST['sb_addr1'];
$sb_addr2 = $_POST['sb_addr2'];
$sb_signin_ip = $_POST['mem_ip'];

//우리동네
$sb_sido = $_POST['s_sido'];
$sb_addr_sec = $_POST['addr_sec'];
include_once($_SERVER['DOCUMENT_ROOT']."/ajax/register_our_area.php");

$sql = "update sb_member set ";
if(empty($sb_pw)){
	//pass
}else{
	$sql .= ' sb_password="'.$sb_pw.'", ';
}
$sql .= ' sb_name="'.$sb_name.'", sb_phone="'.$sb_phone.'", sb_email="'.$sb_email.'", sb_sex="'.$sb_sex.'", sb_birth="'.$sb_birth.'", sb_zipcode="'.$sb_zipcode.'", sb_addr1="'.$sb_addr1.'", ';
$sql .= ' sb_addr2="'.$sb_addr2.'", sb_dongnae="'.$sb_our_area.'", sb_blog_url="'.$sb_blog_url.'", sb_signin_ip="'.$sb_signin_ip.'"';
$sql .= ' where sb_id="'.$_SESSION['sb_id'].'" and sb_delete_flag is null ';
$conn->query($sql);
//세션 다시 담기
$sql = "select * from sb_member where sb_id='".$_SESSION['sb_id']."' and sb_delete_flag is null" ;
$q = $conn->query($sql);
$v = $q->fetch_assoc();
$_SESSION = $v;
$_SESSION['login_chk'] = '99';

$url = "/";
echoAlert("회원정보를 수정하였습니다.");
echoMovePage($url);

exit;
?>