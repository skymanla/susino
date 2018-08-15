<?php
/*
Ryan skymanla
review excel download
auth admin
 */
session_start();
include_once $_SERVER['DOCUMENT_ROOT']."/lib/dbconn.php";

if($_SESSION['sba_id'] != "admin" && $_SESSION['login_chk'] != "99"){
	header("HTTP/1.0 404 Not Found");
	exit;
}

$aType = ($_GET['aType'] == "" ? "selfer" : $_GET['aType']);
$bType = $_GET['bType'];
$cType = $_GET['cType'];
$chk_data = $_GET['chk_data'];

if(trim($chk_data) == ''){
	header("HTTP/1.0 404 Not Found");
	exit;
}

$where = " 1 ";

$excel_cate = "5회 신청자";

switch($cType){
	case "a":
		$where .= " and ( ";
		$data_arr = explode(",", $chk_data);
		for($i=0;$i<count($data_arr);$i++){
			if($i == count($data_arr)-1){
				$where .= " sbr_aidx2='".$data_arr[$i]."'";
			}else{
				$where .= " sbr_aidx2='".$data_arr[$i]."' or ";
			}
		}
		$where .= " ) ";
		break;
	case "b":
		$where .= "";
		break;
}

$sql = "select *, (select sb_level_title from sb_member_level where sb_level_cate=b.sb_mem_level) as mb_level from sb_coupon_member a join sb_member b on a.sbc_id=b.sb_id where ".$where." order by sbc_idx desc";
$query = $conn->query($sql);
if($query->num_rows == '0'){
	header("HTTP/1.0 500 Interval Server Error");
	exit;
}
$board_no = "1";
print("<meta http-equiv=\"Content-Type\" content=\"application/vnd.ms-excel; charset=utf-8\">");
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=".$excel_cate.".xls");
header("Content-Type: content=text/html; charset=euc-kr");
?>
<table cellspacing="0" summary="List" style="border:1px solid #ddd; text-align:center;">
	<thead>
		<tr>
			<th scope="col" style="border:1px solid #ddd;" width="50">번호</th>
			<th scope="col" style="border:1px solid #ddd;" width="100">발송일</th>
			<th scope="col" style="border:1px solid #ddd;" width="100">아이디</th>
			<th scope="col" style="border:1px solid #ddd;" width="100">이름</th>
			<th scope="col" style="border:1px solid #ddd;" width="150">핸드폰</th>
			<th scope="col" style="border:1px solid #ddd;" width="150">이메일</th>
			<th scope="col" style="border:1px solid #ddd;" width="80">레벨</th>
		</tr>
	</thead>
	<tbody>
		<?
		foreach($query as $key => $row){
		?>
		<tr>
			<td style="border:1px solid #ddd;text-align:center;"><?=$board_no?></td>
			<td style="border:1px solid #ddd;text-align:center;"><?=date('Y-m-d', strtotime($row['sbc_rdate']))?></td>
			<td style="border:1px solid #ddd;text-align:center;"><?=$row['sb_id']?></td>
			<td style="border:1px solid #ddd;text-align:center;"><?=$row['sb_name']?></td>
			<td style="border:1px solid #ddd;text-align:center;"><?=$row['sb_phone']?></td>
			<td style="border:1px solid #ddd;text-align:center;"><?=$row['sb_email']?></td>
			<td style="border:1px solid #ddd;text-align:center;"><?=$row['mb_level']?></td>
		</tr>
		<?
			$board_no++;
		}
		?>
	</tbody>
</table>
<?php
exit;
?>