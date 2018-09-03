<?
include_once($_SERVER['DOCUMENT_ROOT']."/lib/dbconn.php");
include_once($_SERVER['DOCUMENT_ROOT']."/lib/function.php");
session_start();

//justice
$sb_id = (!empty($_POST['sb_id']) ? $_POST['sb_id'] : '');
$sb_pw = (!empty($_POST['sb_pw']) ? password_hash($_POST['sb_pw'], PASSWORD_BCRYPT) : '');
$sb_name = (!empty($_POST['sb_name']) ? $_POST['sb_name'] : '');
$sb_phone = $_POST['sb_tel1']."-".$_POST['sb_tel2']."-".$_POST['sb_tel3'];
$sb_email = $_POST['sb_email1']."@".$_POST['sb_email2'];
$sb_sex = $_POST['xy'];
$sb_birth = $_POST['sb_birth1']."-".$_POST['sb_birth2']."-".$_POST['sb_birth3'];
$sb_zipcode = $_POST['sb_zipcode'];
$sb_addr1 = $_POST['sb_addr1'];
$sb_addr2 = $_POST['sb_addr2'];
$sb_signin_ip = $_POST['mem_ip'];
$sb_blog_url = $conn->real_escape_string($_POST['sb_blog_url']);

//우리동네
$sb_sido = $_POST['s_sido'];
$sb_addr_sec = $_POST['addr_sec'];
include_once($_SERVER['DOCUMENT_ROOT']."/ajax/register_our_area.php");

if($_POST['register_mod'] == "m"){
	//sb_idx value check
	$sql = "select count(*) as cnt from sb_member where sb_idx='".$_POST['sb_idx']."'";
	$q = $conn->query($sql);
	$r = $q->fetch_assoc();
	if($r['cnt'] == '0'){
		go_href("아이디를 확인해주시기 바랍니다.", "./login.php", "go");
		exit;
	}
	if(!empty($sb_pw)){
		$sb_pwd_query = ", sb_password='".$sb_pw."'";
	}else{
		$sb_pwd_query = "";
	}
	$sql = "update sb_member set 
			sb_name='".$sb_name."',
			sb_phone='".$sb_phone."',
			sb_email='".$sb_email."',
			sb_sex='".$sb_sex."',
			sb_birth='".$sb_birth."',
			sb_zipcode='".$sb_zipcode."',
			sb_addr1='".$sb_addr1."',
			sb_addr2='".$sb_addr2."',
			sb_dongnae='".$sb_our_area."',
			sb_blog_url='".$sb_blog_url."',
			sb_modify_date=now()
			$sb_pwd_query
			where sb_idx='".$_POST['sb_idx']."' and sb_id='".$sb_id."'";
	if($conn->query($sql)){
		go_href("정보가 변경되었습니다.로그아웃합니다.", "/lib/log_out.php", "go");
		exit;
	}else{
		echo $sql;
		exit;
	}
	exit;
}else{
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
			('$sb_idx', '$sb_id', '$sb_pw', '$sb_name', '$sb_phone', '$sb_email', '$sb_sex', '$sb_birth', '$sb_zipcode', '$sb_addr1', '$sb_addr2', '$sb_our_area', '$sb_blog_url', '$sb_signin_ip', now())
			";

	if($conn->query($sql)){
		$_SESSION['sb_name'] = $sb_name;
		$url = "./register_form_complete.php";
		echoMovePage($url);
	}	
}

exit;
?>