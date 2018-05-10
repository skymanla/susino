<?php 
include_once($_SERVER['DOCUMENT_ROOT'].'/adm/_head.php');

$cur_page = (int)$_GET['cur_page'];
if($cur_page=="") $cur_page = 1; //페이지 번호가 없으면 1번 페이지

//개수
$count = "SELECT COUNT(sbc_idx) as cnt FROM sb_customer";
$count_result = $conn->query($count);
while($row = $count_result->fetch_assoc())
{
	$cnt = $row['cnt'];
}

$limit_num = 20; //몇개씩 리스트에 보여줄 것인지
$offset_num = 10; //몇번 부터 시작할지
$show_offset_num = ($cur_page - 1) * $offset_num; //페이지마다 보여주는 리스트가 40개씩 갱신.

$board_no = $cnt - $show_offset_num;

$total_page = floor ( $cnt / $limit_num ) + 1;

$query = "SELECT * FROM sb_customer ORDER BY sbc_rdate DESC LIMIT $limit_num OFFSET $show_offset_num";
$result = $conn->query($query);
?>
<section class="section1">
	<h3>고객의 소리</h3>
	<div class="table_wrap1">
		<table>
			<caption>게시글 목록</caption>
			<colgroup>
				<col width="50">
				<col width="100">
				<col width="">
				<col width="">
				<col width="">
				<col width="">
				<col width="">
			</colgroup>
			<thead>
				<tr>
					<th><input type="checkbox" class="" value="" name="" /></th>
					<th>글번호</th>
					<th>제목</th>
					<th>이름</th>
					<th>전화번호</th>
					<th>작성일</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$i = 0;
				while($row = $result->fetch_assoc())
				{
				?>
				<tr>
					<td class="txt_c"><input type="checkbox" class="" value="" name="" /></td>
					<td class="txt_c"><?php echo $board_no;?></td>
					<td><a href="s1sview.php?idx=<?php echo $row['sbc_idx'];?>"><?php echo $row['sbc_title'];?></a></td>
					<td class="txt_c"><?php echo $row['sbc_name'];?></td>
					<td class="txt_c"><?php echo $row['sbc_hp'];?></td>
					<td class="txt_c"><?php echo substr($row['sbc_rdate'],0,10);?></td>
				</tr>
				<?php
					$i++;
					$board_no--;
				}
				?>
				<?php 
				if($i==0)
				{
				?>
				<tr>
					<td class="txt_c" colspan="5">등록된 글이 없습니다.</td>
				</tr>
				<?php 
				}
				?>
			</tbody>
		</table>
	</div>

	<div class="bt_wrap1">
		<div class="left_box">
			<button type="button" class="bt_1">전체선택</button>
			<button type="button" class="bt_1">선택해제</button>
			<button type="button" class="bt_1">선택삭제</button>
		</div>
	</div>

	<nav class="paging_type1">
	<?php 
	$first_page_num = (floor ( ($cur_page - 1) / 10 )) * 10 + 1; // 1,11,21,31...
	$last_page_num = $first_page_num + 9; // 10,20,30...last
	$next_page_num = $last_page_num + 1;
	$prev_page_num = $first_page_num - 10;

	if ($first_page_num != 1) { // It's not first page
		echo "<a href='?cur_page=$prev_page_num' class='arr prev'><i>이전</i></a>\n";
	}

	for($i = $first_page_num; $i <= $total_page && $i <= $last_page_num; $i ++) {
		if ($cur_page == $i) {
			echo "<a href='?cur_page=$i' class='active'>$i</a>\n"; // Current page
		} else {
			echo "<a href='?cur_page=$i'>$i</a>\n";
		}
		if ($i % 10 == 0 && $last_page_num != $total_page) {
			echo "<a href='?cur_page=$next_page_num' class='arr next'><i>다음</i></a>";
		}
	}
	?>
	</nav>
</section>
<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/adm/_tail.php');
?>