<?php 
include_once($_SERVER['DOCUMENT_ROOT'].'/adm/_head.php');
$tbl_info = "sb_ownerchef";
$query = "SELECT * FROM $tbl_info where sbb_idx = '".$_GET['idx']."'";
$result = $conn->query($query);
$row = $result->fetch_assoc();

switch($row['sbb_aria']){
	case "0":
		$sbb_aria = "서울특별시 ".$row['sbb_aria2'];
		break;
	case "1":
		$sbb_aria = "부산광역시 ".$row['sbb_aria2'];
		break;
	case "2":
		$sbb_aria = "대구광역시 ".$row['sbb_aria2'];
		break;
	case "3":
		$sbb_aria = "인천광역시 ".$row['sbb_aria2'];
		break;
	case "4":
		$sbb_aria = "광주광역시 ".$row['sbb_aria2'];
		break;
	case "5":
		$sbb_aria = "대전광역시 ".$row['sbb_aria2'];
		break;
	case "6":
		$sbb_aria = "울산광역시 ".$row['sbb_aria2'];
		break;
	case "7":
		$sbb_aria = "세종특별자치시 ".$row['sbb_aria2'];
		break;
	case "8":
		$sbb_aria = "경기도 ".$row['sbb_aria2'];
		break;
	case "9":
		$sbb_aria = "강원도 ".$row['sbb_aria2'];
		break;
	case "10":
		$sbb_aria = "충청북도 ".$row['sbb_aria2'];
		break;
	case "11":
		$sbb_aria = "충청남도 ".$row['sbb_aria2'];
		break;
	case "12":
		$sbb_aria = "전라북도 ".$row['sbb_aria2'];
		break;
	case "13":
		$sbb_aria = "전라남도 ".$row['sbb_aria2'];
		break;
	case "14":
		$sbb_aria = "경상북도 ".$row['sbb_aria2'];
		break;
	case "15":
		$sbb_aria = "경상남도 ".$row['sbb_aria2'];
		break;
	case "16":
		$sbb_aria = "제주특별자치도 ".$row['sbb_aria2'];
		break;
	default:
		$sbb_aria = "시/도 ".$row['sbb_aria2'];
	break;
}
$rdate = date('Y-m-d', strtotime($row['sbb_rdate']));
?>
<section class="section1">
	<h3>일성 오너쉐프제도</h3>
	<div class="table_wrap1">
		<table>
			<caption>게시글 상세보기</caption>
			<colgroup>
				<col width="150">
				<col width="">
			</colgroup>
			<thead>
				<tr>
					<th colspan="2" class="txt_l">
						<span>작성일 : <?=$rdate?></span>
					</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>현재거주지역</td>
					<td><?=$sbb_aria?></td>
				</tr>
				<tr>
					<td>이름</td>
					<td><?=$row[sbb_name]?></td>
				</tr>
				<tr>
					<td>매장 방문 경험</td>
					<td><?=$row[sbb_store]==1 ? "있다" : "없다"?></td>
				</tr>
				<tr>
					<td>일식종사년수</td>
					<td><?=$row[sbb_use]=='99' ? "10년 이상" : $row[sbb_use]."년"?></td>
				</tr>
				<tr>
					<td>연락처</td>
					<td><?php echo $row['sbb_hp'];?></td>
				</tr>
				<tr>
					<td class="txt_t">문의내용</td>
					<td><?php echo nl2br($row['sbb_contents']);?></td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="bt_wrap2">
		<a href="./s3.php" class="bt_2">목록으로</a>
	</div>
</section>
<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/adm/_tail.php');
?>