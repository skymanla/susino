<?php 
include_once($_SERVER['DOCUMENT_ROOT'].'/adm/_head.php');

$query = "SELECT * FROM sb_business where sbb_idx = '".$_GET['idx']."'";
$result = $conn->query($query);
$row = $result->fetch_assoc();

if($$row['sbb_aria'] == 0)
{
	$sbb_aria = "서울특별시 ".$row['sbb_aria2'];
}
if($row['sbb_aria'] == 1)
{
	$sbb_aria = "부산광역시 ".$row['sbb_aria2'];
}
if($row['sbb_aria'] == 2)
{
	$sbb_aria = "대구광역시 ".$row['sbb_aria2'];
}
if($row['sbb_aria'] == 3)
{
	$sbb_aria = "인천광역시 ".$row['sbb_aria2'];
}
if($row['sbb_aria'] == 4)
{
	$sbb_aria = "광주광역시 ".$row['sbb_aria2'];
}
if($row['sbb_aria'] == 5)
{
	$sbb_aria = "대전광역시 ".$row['sbb_aria2'];
}
if($row['sbb_aria'] == 6)
{
	$sbb_aria = "울산광역시 ".$row['sbb_aria2'];
}
if($row['sbb_aria'] == 7)
{
	$sbb_aria = "세종특별자치시 ".$row['sbb_aria2'];
}
if($row['sbb_aria'] == 8)
{
	$sbb_aria = "경기도 ".$row['sbb_aria2'];
}
if($row['sbb_aria'] == 9)
{
	$sbb_aria = "강원도 ".$row['sbb_aria2'];
}
if($row['sbb_aria'] == 10)
{
	$sbb_aria = "충청북도 ".$row['sbb_aria2'];
}
if($row['sbb_aria'] == 11)
{
	$sbb_aria = "충청남도 ".$row['sbb_aria2'];
}
if($row['sbb_aria'] == 12)
{
	$sbb_aria = "전라북도 ".$row['sbb_aria2'];
}
if($row['sbb_aria'] == 13)
{
	$sbb_aria = "전라남도 ".$row['sbb_aria2'];
}
if($row['sbb_aria'] == 14)
{
	$sbb_aria = "경상북도 ".$row['sbb_aria2'];
}
if($row['sbb_aria'] == 15)
{
	$sbb_aria = "경상남도 ".$row['sbb_aria2'];
}
if($row['sbb_aria'] == 16)
{
	$sbb_aria = "제주특별자치도 ".$row['sbb_aria2'];
}
if($row['sbb_aria'] == '')
{
	$sbb_aria = "시/도 ".$row['sbb_aria2'];
}

if($row['sbb_store'] == 1)
{
	$sbb_store = "있다";
}
else
{
	$sbb_store = "없다";
}

if($row['sbb_use'] == 1)
{
	$sbb_use = "있다";
}
else
{
	$sbb_use = "없다";
}
$fileurl = "/data/customer";
?>

<section class="section1">
	<h3>일성 창업상담</h3>
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
						<span>작성일 : <?php echo substr($row['sbb_rdate'],0,10);?></span>
					</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>창업희망지역</td>
					<td><?php echo $sbb_aria;?></td>
				</tr>
				<tr>
					<td>이름</td>
					<td><?php echo $row['sbb_name'];?></td>
				</tr>
				<tr>
					<td>매장 방문 경험</td>
					<td><?php echo $sbb_store;?></td>
				</tr>
				<tr>
					<td>일식 종사 경험</td>
					<td><?php echo $sbb_use;?></td>
				</tr>
				<tr>
					<td>연락처</td>
					<td><?php echo $row['sbb_hp'];?></td>
				</tr>
				<tr>
					<td>이메일</td>
					<td><?php echo $row['sbb_email'];?></td>
				</tr>
				<tr>
					<td class="txt_t">문의내용</td>
					<td>
						<?php echo nl2br($row['sbb_contents']);?>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="bt_wrap2">
		<a href="s2.php" class="bt_2">목록으로</a>
	</div>
</section>
<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/adm/_tail.php');
?>