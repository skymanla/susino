<?php 
include_once($_SERVER['DOCUMENT_ROOT'].'/adm/_head.php');
?>

<section class="section1">
	<h3>우리동네 공지사항 등록</h3>

	<div class="table_wrap1">
		<table>
			<caption>우리동네 공지사항 작성</caption>
			<colgroup>
				<col width="150">
				<col width="">
			</colgroup>
			<thead>
				<tr>
					<th colspan="4" class="txt_l">우리동네 공지사항 작성</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th>우리동네</th>
					<td>
						<select name="" title="" class="w_input1">
							<option value="" selected="selected">우리동네 선택</option>
							<option value="">전지역</option>
							<option value="">지역1</option>
							<option value="">지역2</option>
							<option value="">지역3</option>
							<option value="">지역4</option>
							<option value="">지역5</option>
						</select>
					</td>
				</tr>
				<tr>
					<th>제목</th>
					<td><input type="text" class="w_input1" value="" name="" style="width:100%" /></td>
				</tr>
				<tr>
					<th>내용</th>
					<td>
						<textarea name="" id="" class="w_input1" style="height:200px">에디터삽입</textarea>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="bt_wrap2">
		<a href="s6.php" class="bt_2">취소</a>
		<a href="s6sview.php" class="bt_1">등록</a>
	</div>
</section>

<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/adm/_tail.php');
?>