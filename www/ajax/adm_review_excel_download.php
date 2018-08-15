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

$where = " 1 and sbr_atype='".$aType."' and sbabm_option5='Y' and sbabm_option2='Y' ";

switch($aType){
	case "shopper":
		$excel_cate = "미스테리_쇼퍼";
		break;
	case "ftalk":
		$excel_cate = "스시노_미식회";
		break;
	case "pick":
		$excel_cate = "체험단";
		break;
	case "selfer":
		$excel_cate = "자발적_참여";
		break;
}

switch($bType){
	case "accept":
		$where .= " and sbabm_option3='Y' ";
		$excel_cate .= "_승인목록";
		break;
	case "refuse":
		$where .= " and sbabm_option3='N' ";
		$excel_cate .= "_거절목록";
		break;
	case "waiting":
		$where .= " and sbabm_option3='' ";
		$excel_cate .= "_대기목록";
		break;
	default:
		$where .= '';
		$excel_cate .= "_전체목록";
		break;

}

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

$sql = "select * , (select sb_level_title from sb_member_level where sb_level_cate=c.sb_mem_level) as mb_level
		from sb_review_board a join sb_application_member b on a.sbr_aidx2=b.sbabm_idx join sb_member c on b.sbabm_mb_id=c.sb_id
		where ".$where." 
		order by sbr_idx desc";

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
			<th scope="col" style="border:1px solid #ddd;" width="70">상태</th>
			<th scope="col" style="border:1px solid #ddd;" width="100">발송일</th>
			<th scope="col" style="border:1px solid #ddd;" width="150">제목</th>
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
			switch($row['sbabm_option3']){
				case "Y":
					$event_stat = "승인";
					break;
				case "N":
					$event_stat = "거절";
					break;
				default:
					$event_stat = "대기";
					break;
			}
			//글 제목
			$sql = "select * from sb_application_board where sbab_idx='".$row['sbabm_fidx']."'";
			$q = $conn->query($sql);
			$title = $q->fetch_assoc();				
		?>
		<tr>
			<td style="border:1px solid #ddd;text-align:center;"><?=$board_no?></td>
			<td style="border:1px solid #ddd;text-align:center;"><?=$event_stat?></td>
			<td style="border:1px solid #ddd;text-align:center;"><?=date('Y-m-d', strtotime($row['sbr_rdate']))?></td>
			<td style="border:1px solid #ddd;text-align:center;"><?=$title['sbab_title']?></td>
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