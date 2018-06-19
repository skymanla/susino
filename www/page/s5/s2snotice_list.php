<?php
include_once "../../_head.php";
include_once $_SERVER['DOCUMENT_ROOT']."/lib/dbconn.php";

$dongnae = $_SESSION['sb_dongnae'];
if($_SESSION['sba_id'] == "admin"){
	$dongnae_where = "";
}else{
	$dongnae_where = " and ( sbab_area='".$dongnae."' or sbab_area='A' )";
}
$tbl_info = "sb_application_notice_board";

$cur_page = (int)$_GET['cur_page'];
if($cur_page=="") $cur_page = 1; //페이지 번호가 없으면 1번 페이지


$count = "SELECT COUNT(sbab_idx) as cnt FROM $tbl_info";
$count_result = $conn->query($count);
while($row = $count_result->fetch_assoc())
{
	$cnt = $row['cnt'];
}

$limit_num = 10; //몇개씩 리스트에 보여줄 것인지
$offset_num = 10; //몇번 부터 시작할지
$show_offset_num = ($cur_page - 1) * $offset_num; //페이지마다 보여주는 리스트가 40개씩 갱신.

$board_no = $cnt - $show_offset_num;

$total_page = floor ( $cnt / $limit_num ) + 1;

$sql = "select * from $tbl_info where 1".$dongnae_where." order by sbab_idx desc";
$q = $conn->query($sql);
?>

<div class="wrap_style1">
	<div class="heading_s1">
		<h2 class="tit"><img src="/img/common/s5s2_notice_title1.png" alt="우리동네 알림"></h2>
	</div>

	<div class="con_wrapStyle1">
		<table class="board_style2">
			<caption>공지사항 영역</caption>
			<colgroup>
				<col width="106px">
				<col width="874px">
				<col width="160px">
				<col width="140px">
			</colgroup>
			<thead>
				<tr>
					<th scope="col">NO</th>
					<th scope="col">제목</th>
					<th scope="col">날짜</th>
					<th scope="col">조회수</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($q as $key => $r){?>
				<tr>
					<td><?=$board_no?></td>
					<td class="left"><a href="s2snotice_view.php?idx=<?=$r[sbab_idx]?>"><?=$r[sbab_title]?></a></td>
					<td><?=date('Y-m-d', strtotime($r[sbab_rdate]))?></td>
					<td><?=$r[sbab_hit]=='' ? 0 : $r[sbab_hit]?></td>
				</tr>
				<?php 
					$board_no--;
				}
				?>
			</tbody>
		</table>
	</div>
	<div class="paging">
		<?php 
			$first_page_num = (floor ( ($cur_page - 1) / 10 )) * 10 + 1; // 1,11,21,31...
			$last_page_num = $first_page_num + 9; // 10,20,30...last
			$next_page_num = $last_page_num + 1;
			$prev_page_num = $first_page_num - 10;

			if ($first_page_num != 1) { // It's not first page
				echo "<a href='?cur_page=$prev_page_num' class='arr prev'><button type='button' class='bt_prev'>전페이지 버튼</button></a>";
			}

			echo "<ul class='paing'>";

			for($i = $first_page_num; $i <= $total_page && $i <= $last_page_num; $i ++) {
				if ($cur_page == $i) {
					echo "<li class='active'><a href='?cur_page=$i'><strong>$i</strong></a></li>"; // Current page
				} else {
					echo "<li><a href='?cur_page=$i'>$i</a></li>";
				}
				if ($i % 10 == 0 && $last_page_num != $total_page) {
					echo "</ul>";
					echo "<a href='?cur_page=$next_page_num' class='arr next'><button type='button' class='bt_next'>다음 페이지 버튼</button></a>";
				}
			}
			?>
	</div>
	<div class="bt_wrap_c">
		<a href="s2.php" class="bt_s2_gray">우동맛 돌아가기</a>
	</div>
</div>

<?php include_once "../../_tail.php";?>