<?php 
include_once $_SERVER['DOCUMENT_ROOT']."/lib/dbconn.php";
include_once($_SERVER['DOCUMENT_ROOT'].'/_head.php');

$cur_page = (int)$_GET['cur_page'];
if($cur_page=="") $cur_page = 1; //페이지 번호가 없으면 1번 페이지

//개수
$count = "SELECT COUNT(sbn_idx) as cnt FROM sb_notice";
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

$query = "SELECT * FROM sb_notice ORDER BY sbn_rdate DESC LIMIT $limit_num OFFSET $show_offset_num";
$result = $conn->query($query);
?>
<div class="wrap_style1">
	<div class="heading_s1">
		<h2 class="tit"><img src="/img/common/scenter_title2.png" alt="공지사항" /></h2>
		<!-- <p class="desc">스시노벡쉐프의 소식입니다.</p> -->
	</div>
	<div class="con_wrapStyle1">
		<?php
		if($_SESSION['sba_id'])
		{
		?>
		<div class="admin_bt">
			<a href="s6swrite.php?mode=w" class="w_edit">글쓰기</a>
		</div>
		<?php
		}
		?>
		<table class="board_style2">
			<caption>공지사항 영역</caption>
			<colgroup>
				<col width="106px" />
				<col width="874px" />
				<col width="160px" />
				<col width="140px" />
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
				<?php 
				$i = 0;
				while($row = $result->fetch_assoc())
				{
				?>
				<tr>
					<td><?php echo $board_no;?></td>
					<td class="left"><a href="s6sview.php?idx=<?php echo $row['sbn_idx'];?>"><?php echo $row['sbn_title'];?></a></td>
					<td><?php echo substr($row['sbn_rdate'],0,10);?></td>
					<td><?php echo number_format($row['sbn_count']);?></td>
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
					<td class="txt_c" colspan="4">등록된 글이 없습니다.</td>
				</tr>
				<?php 
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
	
	<!--<div class="center_wrap">
		<fieldset class="e_sh">
			<legend>이벤트 검색 영역</legend>
			<select name="" id="" title="" style="width:120px">
				<option value="제목" selected>제목</option>
				<option value="기간">기간</option>
			</select>
			<input type="text" class="" value="" name="" placeholder="검색어 입력" style="width:400px" title="검색어 입력" />
			<button type="button" class="bt_srh">검색</button>
		</fieldset>
	</div>-->
</div>

<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/_tail.php');
?>