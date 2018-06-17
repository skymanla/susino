<?php 
include_once($_SERVER['DOCUMENT_ROOT'].'/adm/_head.php');

$tbl_info = " sb_invite_member a left join sb_member b on a.sbi_mb_id=b.sb_id ";

$cur_page = (int)$_GET['cur_page'];
if($cur_page=="") $cur_page = 1; //페이지 번호가 없으면 1번 페이지

//개수
$count = "SELECT COUNT(sbi_idx) as cnt FROM $tbl_info ".$whereis;
$count_result = $conn->query($count);
$row = $count_result->fetch_assoc();
$cnt = $row['cnt'];

$limit_num = 10; //몇개씩 리스트에 보여줄 것인지
$offset_num = 10; //몇번 부터 시작할지
$show_offset_num = ($cur_page - 1) * $offset_num; //페이지마다 보여주는 리스트가 40개씩 갱신.

$board_no = $cnt - $show_offset_num;

$total_page = floor ( $cnt / $limit_num ) + 1;


$sql = "select 
		a.sbi_idx, a.sbi_cate, a.sbi_option2, a.sbi_option3, a.sbi_option4, a.sbi_option5, date_format(a.sbi_rdate, '%Y-%m-%d') as sbi_rdate,
		b.sb_idx, b.sb_id, b.sb_name, (select sb_level_title from sb_member_level where  sb_level_cate=b.sb_mem_level) as sb_level_title, b.sb_phone, 
		b.sb_email
		from $tbl_info $whereis order by sbi_idx desc LIMIT $limit_num OFFSET $show_offset_num";
$q = $conn->query($sql);
?>

<section class="section1">
	<h3>함께갈레요 신청자</h3>
	<ul class="tab_type1">
		<li class="active"><a href="s7.php">신청자 목록</a></li>
		<li><a href="s7slist2.php">당첨자</a></li>
		<li><a href="s7slist3.php">당첨자 확율관리</a></li>
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
							<option value="">추천등록일</option>
							<option value="">아이디</option>
							<option value="">이름</option>
							<option value="">코드</option>
							<option value="">핸드폰</option>
							<option value="">이메일</option>
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
				<col width="80">
				<col width="">
				<col width="">
				<col width="">
				<col width="">
				<col width="">
				<col width="">
				<col width="">
				<col width="140">
			</colgroup>
			<thead>
				<tr>
					<th>글번호</th>
					<th>추천등록일</th>
					<th>추천인</th>
					<th>아이디</th>
					<th>이름</th>
					<th>핸드폰</th>
					<th>이메일</th>
					<th>레벨</th>
					<th>정보</th>
				</tr>
			</thead>
			<tbody>
				<? foreach($q as $key => $row){ ?>
				<tr>
					<td class="txt_c"><?=$board_no?></td>
					<td class="txt_c"><?=date('Y-m-d',strtotime($row['sbi_rdate']))?></td>
					<td class="txt_c"><?=$row['sbi_option2']=='' ? '미등록 고객' : $row['sbi_option2']?></td>
					<td class="txt_c"><?=$row['sb_id']?></td>
					<td class="txt_c"><?=$row['sb_name']?></td>
					<td class="txt_c"><?=$row['sb_phone']?></td>
					<td class="txt_c"><?=$row['sb_email']?></td>
					<td class="txt_c"><?=$row['sb_level_title']?></td>
					<td class="txt_c"><a href="/adm/page/s2/s1sview_no_modfy.php?idx=<?=$row[sb_idx]?>&id=<?=$row[sb_id]?>" class="bt_s1" target="_blank" title="새창으로 열립니다.">자세히보기</a></td>
				</tr>
				<? 
					$board_no--;
				} 
				?>
			</tbody>
		</table>
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