<?php 
include_once($_SERVER['DOCUMENT_ROOT'].'/adm/_head.php');
include_once($_SERVER['DOCUMENT_ROOT']."/lib/function.php");

$mode = $_GET['mode'];
$flag_depth = "App_notice";
$tbl_info = "sb_application_notice_board";

$sql = "select * from $tbl_info where sbab_idx='".$_GET['idx']."' ";
$q = $conn->query($sql);
$r = $q->fetch_assoc();
if(empty($r)){
	$url = "/adm/page/s3/s6.php";
	echoAlert("잘못된 접근입니다.");
	echoMovePage($url);	
}
?>

<section class="section1">
	<h3>우리동네 공지사항</h3>

	<div class="table_wrap1">
		<table>
			<caption>우리동네 공지사항 상세페이지</caption>
			<colgroup>
				<col width="150">
				<col width="">
			</colgroup>
			<thead>
				<tr>
					<th colspan="4" class="txt_l">우리동네 공지사항 상세페이지</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th>작성일</th>
					<td><?=date('Y-m-d', strtotime($r['sbab_rdate']))?></td>
				</tr>
				<tr>
					<th>우리동네</th>
					<td><?=$r['sbab_area']=='A' ? '전체 지역' : $r['sbab_area'] ?></td>
				</tr>
				<tr>
					<th>제목</th>
					<td><?=stripslashes($r['sbab_title'])?></td>
				</tr>
				<tr>
					<th>내용</th>
					<td>
						<?=stripslashes($r['sbab_content'])?>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="bt_wrap2">
		<a href="s6.php" class="bt_2">삭제</a>
		<a href="s6swrite.php?idx=<?=$_GET[idx]?>&mode=u" class="bt_2">수정</a>
		<a href="s6.php" class="bt_1">목록</a>
	</div>
</section>

<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/adm/_tail.php');
?>