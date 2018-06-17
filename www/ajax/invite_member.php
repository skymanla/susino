<?
include_once $_SERVER['DOCUMENT_ROOT']."/lib/dbconn.php";
session_start();

$sb_idx = $conn->real_escape_string($_REQUEST[midx]);
$sb_id = $conn->real_escape_string($_REQUEST[mid]);
$sb_name = $conn->real_escape_string($_REQUEST[name]);
$sbi_option = $conn->real_escape_string($_SESSION['sb_id']);

$tbl_info = "sb_invite_member";
if($_SESSION['sba_id']) die('404 Not Found');
if($sb_id == $sbi_option){
	echo "99";//실패
	exit;
}else{
	//이미 등록 여부 확인
	$sql = "select count(*) as cnt from $tbl_info where sbi_mb_id='".$sb_id."'";
	$q = $conn->query($sql);
	$r = $q->fetch_assoc();
	if($r[cnt] > 0){
		echo "39";
		exit;
	}
	//존재 회원인지 확인
	$sql = "select count(*) as cnt from sb_member where sb_idx='".$sb_idx."' and sb_id='".$sb_id."' and sb_delete_flag is null";
	$q = $conn->query($sql);
	$r = $q->fetch_assoc();
	if($r['cnt'] == "1"){
		$sql = "select sbi_idx from $tbl_info where 1=1 order by sbi_idx desc limit 1";
		$q = $conn->query($sql);
		$r = $q->fetch_assoc();
		if(empty($r['sbi_idx'])){
			$sbi_idx = 1;
		}else{
			$sbi_idx = $r['sbi_idx'];
			$sbi_idx++;
		}
		$sql = "insert into $tbl_info
					(sbi_idx, sbi_fidx, sbi_mb_id, sbi_cate, sbi_option, sbi_rdate) values
					('$sbi_idx', '$sb_idx', '$sb_id', 'invite', '$sbi_option', now())";
		$conn->query($sql);
		echo "19";//성공
		exit;
	}else{
		echo "29";//탈퇴한 회원 혹은 없는 회원
		exit;
	}
}
exit;
?>