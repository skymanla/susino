<?php 
include_once($_SERVER['DOCUMENT_ROOT'].'/adm/_head.php');
?>
<section class="section1">
	<h3>일성 오너쉐프제도</h3>
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
					<th><input type="checkbox" class="" value="" name="" id="all_check" onclick="javascript:all_check();"></th>
					<th>글번호</th>
					<th>현재거주지역</th>
					<th>일식종사년수</th>
					<th>이름</th>
					<th>전화번호</th>
					<th>작성일</th>
				</tr>
			</thead>
			<tbody>
				<?php for($i=0;$i<10;$i++){?>
				<tr>
					<td class="txt_c"><input type="checkbox" class="" name="" value=""></td>
					<td class="txt_c">20</td>
					<td class="txt_c"><a href="s3sview.php">인천광역시 계양구</a></td>
					<td class="txt_c">10년</td>
					<td class="txt_c">강호동</td>
					<td class="txt_c">01045457894</td>
					<td class="txt_c">2018-03-09</td>
				</tr>
				<?php }?>
			</tbody>
		</table>
	</div>

	<div class="bt_wrap1">
		<div class="left_box">
			<button type="button" class="bt_1" onclick="javascript:all_check_t()">전체선택</button>
			<button type="button" class="bt_1" onclick="javascript:all_check_f()">선택해제</button>
			<button type="button" class="bt_1" onclick="javascript:modiy_stat('D')">선택삭제</button>
		</div>
	</div>

	<nav class="paging_type1">
		<a href="?cur_page=1" class="active">1</a>
		<a href="?cur_page=2">2</a>
	</nav>
</section>
<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/adm/_tail.php');
?>