<?
/*
WindDesign Ryan
Exp : find id
json
 */
include_once $_SERVER['DOCUMENT_ROOT']."/lib/dbconn.php";

header("Content-Type:application/json");


//var_dump($_REQUEST);
$sb_name = $conn->real_escape_string($_REQUEST['sb_name']);
$sb_email = $conn->real_escape_string($_REQUEST['sb_email']);
$sql = "select count(*) as cnt from sb_member where sb_name='".$sb_name."' and sb_email='".$sb_email."' and sb_delete_flag is null";//삭제 및 탈퇴한 회원은 안뜨게

$q = $conn->query($sql);
$cnt = $q->fetch_assoc();

if(!$cnt['cnt']=='0'){
	$sql = "select sb_id from sb_member where sb_name='".$sb_name."' and sb_email='".$sb_email."'";
	$q = $conn->query($sql);
	$find_value = $q->fetch_assoc();
	$sb_id_len = strlen($find_value['sb_id']);
	$sb_id_cut = mb_substr($find_value['sb_id'],'0',-3)."***";

	$result = array(
				"postnumber"=>"90",
				"postId"=>$sb_id_cut);
}else{
	$result = array(
				"postnumber"=>"99",
				"postId"=>"no value!");
}

$finish = (object) $result;
//var_dump(json_encode($finish));
echo json_encode($finish);
?>