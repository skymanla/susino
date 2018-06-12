<?
session_start();
include_once $_SERVER['DOCUMENT_ROOT']."/lib/dbconn.php";
//header("Content-Type:application/json");

$pageinfo = $_REQUEST['pageinfo'];//페이지 정보
$mode = $_REQUEST['mode'];//모드
$chk_idx_arr = $_REQUEST['chk_idx'];//id

if($pageinfo == "s1_s1"){
	$tbl_info = "sb_customer";
	$file_locate = "/data/customer";
	if($mode == "D"){
		for($i=0;$i<count($chk_idx_arr);$i++){
			//파일정보
			$sql = "select sbc_file from ".$tbl_info." where sbc_idx='".$chk_idx_arr[$i]."'";
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();

			$sql = "delete from ".$tbl_info." where sbc_idx='".$chk_idx_arr[$i]."'";
			$conn->query($sql);
			if(!empty($row['sbc_file'])){
				@unlink($file_locate."/".$row['sbc_file']);
			}
		}
	}
}else if($pageinfo == "s1_s2"){
	$tbl_info = "sb_business";
	if($mode == "D"){
		for($i=0;$i<count($chk_idx_arr);$i++){
			$sql = "delete from ".$tbl_info." where sbb_idx='".$chk_idx_arr[$i]."'";
			$conn->query($sql);
		}
	}
}else if($pageinfo == "s3_s5"){
	$tbl_info = "sb_event";
	if($mode == "D"){
		for($i=0;$i<count($chk_idx_arr);$i++){
			$sql = "delete from ".$tbl_info." where sbe_idx='".$chk_idx_arr[$i]."'";
			$conn->query($sql);
		}
	}
}
exit;
?>