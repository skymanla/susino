<?php 
include_once($_SERVER['DOCUMENT_ROOT'].'/adm/_head.php');
?>
<section class="section1">
	<h3>단골회원 E-mail</h3>

	<div class="table_wrap1">
		<table>
			<caption>E-mail 작성</caption>
			<colgroup>
				<col width="150">
				<col width="">
			</colgroup>
			<thead>
				<tr>
					<th colspan="4" class="txt_l">E-mail 작성</th>
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
						<textarea name="" id="" class="w_input1" style="height:200px">에디터삽입</textarea>
					</td>
				</tr>
			</tbody>
		</table>
	</div>

	<div class="bt_wrap2">
		<a href="s1.php" class="bt_2">취소</a>
		<a href="s1.php" class="bt_1">E-mail 발송</a>
	</div>

</section>


<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/adm/_tail.php');
?>