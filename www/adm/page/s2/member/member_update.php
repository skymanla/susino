<?
include_once($_SERVER['DOCUMENT_ROOT']."/lib/dbconn.php");
include_once($_SERVER['DOCUMENT_ROOT']."/lib/function.php");

extract($_POST);

if($sb_password){
	$sb_pw = password_hash($sb_password, PASSWORD_BCRYPT);
	$sb_pw_col = " , sb_password='$sb_pw'";
}else{
	$sb_pw_col = "";
}

$sb_email = $sb_email1."@".$sb_email2;
$sb_birth = $sb_birth1."-".$sb_birth2."-".$sb_birth3;

$sql = "update sb_member set
		sb_mem_level='$sb_mem_level', sb_phone='$sb_phone', sb_email='$sb_email', sb_birth='$sb_birth',
		sb_zipcode='$sb_zipcode', sb_addr1='$sb_addr1', sb_addr2='$sb_addr2',
		sb_dongnae='$sb_dongnae', sb_blog_url='$sb_blog_url', sb_sex='$xy'
		$sb_pw_col
		where sb_idx='$sb_idx' and sb_id='$sb_id'
		";

if($conn->query($sql)){
	$url = "../s1sview.php?idx={$sb_idx}&id={$sb_id}";
	echoMovePage($url);
}
exit;
?>