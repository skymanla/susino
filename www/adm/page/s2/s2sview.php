<?php 
include_once($_SERVER['DOCUMENT_ROOT'].'/adm/_head.php');
include_once $_SERVER['DOCUMENT_ROOT']."/lib/dbconn.php";
include_once($_SERVER['DOCUMENT_ROOT']."/lib/function.php");

if(empty($_GET['idx'])){
	$msg = "값이 존재하지 않습니다.";
	$url = "/adm/page/s2/s3.php";
	go_href($msg, $url, "go");
}
$sql = "select * from sb_sms_list where sb_idx='".$_GET['idx']."'";
$query = $conn->query($sql);
$row = $query->fetch_assoc();

$sql = "select * from sb_member_level where sb_level_cate='".$row['sb_sms_send_lvl']."'";
$query = $conn->query($sql);
$lvl_cate = $query->fetch_assoc();
?>
<section class="section1">
	<h3>회원 SMS 관리</h3>

	<div class="table_wrap1">
		<table>
			<caption>보낸 SMS</caption>
			<colgroup>
				<col width="100">
				<col width="">
			</colgroup>
			<thead>
				<tr>
					<th colspan="4" class="txt_l">보낸 SMS</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th>구분</th>
					<td><?=$row['sb_sms_send_mb']?></td>
				</tr>
				<tr>
					<th>받는이 ID</th>
					<td>
						<?
							switch($row['sb_sms_send_mb']){
								case "직접입력":
									echo $row['sb_sms_send_lvl'];
									break;
								case "레벨설정":
									echo $row['sb_sms_send_mb']." : ".$lvl_cate['sb_level_title'];
									break;
								case "우리동네":
									echo $row['sb_sms_send_mb']." : ".$row['sb_sms_send_lvl'];
									break;
							}
						?>
					</td>
				</tr>
				<tr>
					<th>제목</th>
					<td><?=$row['sb_sms_title']?></td>
				</tr>
				<tr>
					<th>내용</th>
					<td>
						<?=stripslashes($row['sb_sms_content'])?>
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