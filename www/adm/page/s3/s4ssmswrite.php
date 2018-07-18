<?php 
include_once($_SERVER['DOCUMENT_ROOT'].'/adm/_head.php');
?>
<section class="section1">
	<h3>체험단 당첨자 SMS</h3>

	<div class="table_wrap1">
		<table>
			<caption>SMS 작성</caption>
			<colgroup>
				<col width="150">
				<col width="">
			</colgroup>
			<thead>
				<tr>
					<th colspan="4" class="txt_l">SMS 작성</th>
				</tr>
			</thead>
			<tbody>
				<tr class="mail_target_tr tr1">
					<th>받는이 ID</th>
					<td>crashoxsusu, wind, gaga</td>
				</tr>
				<tr>
					<th>제목</th>
					<td><input type="text" class="w_input1" value="" name="" style="width:100%" /></td>
				</tr>
				<tr>
					<th>내용</th>
					<td class="con_editor1">
						<textarea name="" id="" class="w_input1" style="height:200px"></textarea>
					</td>
				</tr>
			</tbody>
		</table>
	</div>

	<div class="bt_wrap2">
		<a href="s4sview_list1.php" class="bt_2">취소</a>
		<a href="s4sview_list1.php" class="bt_1">SMS 발송</a>
	</div>

	<div class="table_wrap1">
		<table>
			<caption>체험단 내용</caption>
			<colgroup>
				<col width="100">
				<col width="">
			</colgroup>
			<thead>
				<tr>
					<th colspan="4" class="txt_l">체험단 내용</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th>상태</th>
					<td>진행중</td>
				</tr>
				<tr>
					<th>우리동네</th>
					<td>서울시 강남구</td>
				</tr>
				<tr>
					<th>기간</th>
					<td>2018-07-01 ~ 2018-08-30</td>
				</tr>
				<tr>
					<th>작성일</th>
					<td>2018-07-01</td>
				</tr>
				<tr>
					<th>제목</th>
					<td>유니크매장 체험단를 모집합니다!</td>
				</tr>
				<tr>
					<th>내용</th>
					<td>
						유니크매장 체험단를 모집합니다! <br />
						유니크매장 체험단를 모집합니다! <br />
						유니크매장 체험단를 모집합니다! <br />
						유니크매장 체험단를 모집합니다! <br />
						유니크매장 체험단를 모집합니다! <br />
						유니크매장 체험단를 모집합니다! <br />
						유니크매장 체험단를 모집합니다! <br />
						유니크매장 체험단를 모집합니다!
					</td>
				</tr>
			</tbody>
		</table>
	</div>

</section>


<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/adm/_tail.php');
?>