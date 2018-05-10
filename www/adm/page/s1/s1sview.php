<?php 
include_once($_SERVER['DOCUMENT_ROOT'].'/adm/_head.php');

$query = "SELECT * FROM sb_customer where sbc_idx = '".$_GET['idx']."'";
$result = $conn->query($query);
$row = $result->fetch_assoc();

$fileurl = "/data/customer";
?>

<section class="section1">
	<h3>고객의 소리</h3>
	<div class="table_wrap1">
		<table>
			<caption>게시글 상세보기</caption>
			<colgroup>
				<col width="100">
				<col width="">
			</colgroup>
			<thead>
				<tr>
					<th colspan="2" class="txt_l">
						<p><?php echo $row['sbc_title'];?></p>
						<span>작성일 : <?php echo substr($row['sbc_rdate'],0,10);?></span>
					</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>이름</td>
					<td><?php echo $row['sbc_name'];?></td>
				</tr>
				<tr>
					<td>연락처</td>
					<td><?php echo $row['sbc_hp'];?></td>
				</tr>
				<tr>
					<td>이메일</td>
					<td><?php echo $row['sbc_email'];?></td>
				</tr>
				<tr>
					<td class="txt_t">문의내용</td>
					<td>
						<?php echo nl2br($row['sbc_contents']);?>
					</td>
				</tr>
				<tr>
					<td>첨부파일</td>
					<td><a href="<?php echo $fileurl."/".$row['sbc_file']?>" target="_blank"><?php echo $row['sbc_file'];?></a></td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="bt_wrap2">
		<a href="s1.php" class="bt_2">목록으로</a>
	</div>
</section>
<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/adm/_tail.php');
?>