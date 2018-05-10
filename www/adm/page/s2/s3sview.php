<?php 
include_once($_SERVER['DOCUMENT_ROOT'].'/adm/_head.php');
?>
<section class="section1">
	<h3>회원 E-mail 관리</h3>

	<div class="table_wrap1">
		<table>
			<caption>보낸 E-mail</caption>
			<colgroup>
				<col width="100">
				<col width="">
			</colgroup>
			<thead>
				<tr>
					<th colspan="4" class="txt_l">보낸 E-mail</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th>받는이 ID</th>
					<td>admin, admin2, admin3</td>
				</tr>
				<tr>
					<th>제목</th>
					<td>테스트 테스트 테스트</td>
				</tr>
				<tr>
					<th>내용</th>
					<td><textarea name="" id="" class="w_input1" style="height:200px"></textarea></td>
				</tr>
			</tbody>
		</table>
	</div>

	<div class="bt_wrap2">
		<a href="s3.php" class="bt_2">목록으로</a>
	</div>

</section>

<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/adm/_tail.php');
?>