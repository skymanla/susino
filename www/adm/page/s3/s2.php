<?php 
include_once($_SERVER['DOCUMENT_ROOT'].'/adm/_head.php');

$cur_page = (int)$_GET['cur_page'];
if($cur_page=="") $cur_page = 1; //페이지 번호가 없으면 1번 페이지

//개수
$count = "SELECT COUNT(sbsp_idx) as cnt FROM sb_shopper_board";
$count_result = $conn->query($count);
$row = $count_result->fetch_assoc();
$cnt = $row['cnt'];

$limit_num = 10; //몇개씩 리스트에 보여줄 것인지
$offset_num = 10; //몇번 부터 시작할지
$show_offset_num = ($cur_page - 1) * $offset_num; //페이지마다 보여주는 리스트가 40개씩 갱신.

$board_no = $cnt - $show_offset_num;

$total_page = floor ( $cnt / $limit_num ) + 1;


$sql = "select * from sb_shopper_board where 1 order by sbsp_idx desc";
$q = $conn->query($sql);
?>

<section class="section1">
	<h3>미스테리 쇼퍼</h3>

	<ul class="tab_type1">
		<li class="active"><a href="javascript:void(0);">전체목록</a></li>
		<li><a href="javascript:void(0);">모집중</a></li>
		<li><a href="javascript:void(0);">마감</a></li>
	</ul>

	<div class="table_wrap1 no_line">
		<table>
			<caption>검색필터</caption>
			<colgroup>
				<col width="100">
				<col width="">
			</colgroup>
			<tbody>
				<tr>
					<th>검색필터</th>
					<td>
						<select name="" title="" class="w_input1">
							<option value="">우리동네</option>
							<option value="">제목</option>
							<option value="">기간</option>
							<option value="">작성일</option>
						</select>
						<input type="text" class="w_input1" value="" name="" style="width:180px">
						<button type="button" class="bt_s1 input_sel">검색</button>
					</td>
				</tr>
			</tbody>
		</table>
	</div>

	<div class="table_wrap1">
		<table>
			<caption>회원 목록</caption>
			<colgroup>
				<col width="50">
				<col width="80">
				<col width="">
				<col width="">
				<col width="">
				<col width="">
				<col width="">
				<col width="140">
			</colgroup>
			<thead>
				<tr>
					<th><input type="checkbox" class="" value="" name="" id="all_check" onclick="javascript:all_check();" placeholder="" /></th>
					<th>글번호</th>
					<th>우리동네</th>
					<th>제목</th>
					<th>기간</th>
					<th>작성일</th>
					<th>상태</th>
					<th>정보</th>
				</tr>
			</thead>
			<tbody>
				<? 
					foreach($q as $key => $r){ 
						$sdate = date('Y-m-d', strtotime($r['sbsp_sdate']));
						$edate = date('Y-m-d', strtotime($r['sbsp_edate']));
				?>
				<tr>
					<td class="txt_c"><input type="checkbox" class="" value="<?=$r['sbsp_idx']?>" name="rp_check_class" placeholder="" /></td>
					<td class="txt_c"><?=$board_no?></td>
					<td class="txt_c"><?=$r['sbsp_area']=="A" ? '전체' : $r['sbsp_area'] ?></td>
					<td class="txt_c"><?=$r['sbsp_title']?></td>
					<td class="txt_c"><?=$sdate?> ~ <?=$edate?></td>
					<td class="txt_c"><?=date('Y-m-d', strtotime($r['sbsp_rdate']))?></td>
					<td class="txt_c">
						<?
							$now_date = date('Y-m-d');
							if($now_date > $edate){
								echo '<span class="txt_col1">마감</span>';
							}else if( ($now_date >= $sdate) && ($now_date <= $edate) ){
								echo "모집중";
							}
						?>
					</td>
					<td class="txt_c"><a href="s2sview.php?idx=<?=$r[sbsp_idx]?>" class="bt_s1">자세히보기</a></td>
				</tr>
				<? 
					$board_no--;
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
		<div class="right_box">
			<a href="s2swrite.php" class="bt_1">미스테리 쇼퍼 등록</a>
		</div>
	</div>

	<nav class="paging_type1">
		<a href="javascript:void(0);" class="arr all_prev"><i>처음</i></a>
		<a href="javascript:void(0);" class="arr prev"><i>이전</i></a>
		<a href="?cur_page=1" class="active">1</a>
		<a href="?cur_page=2">2</a>		
		<a href="?cur_page=2" class="arr next"><i>다음</i></a>
		<a href="javascript:void(0);" class="arr all_next"><i>마지막</i></a>
	</nav>

</section>

<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/adm/_tail.php');
?>