<?php 
include_once($_SERVER['DOCUMENT_ROOT'].'/adm/_head.php');
?>

<section class="section1">
	<h3>함께갈레요 신청자</h3>
	<ul class="tab_type1">
		<li><a href="s7.php">신청자 목록</a></li>
		<li><a href="s7slist2.php">당첨자</a></li>
		<li class="active"><a href="s7slist3.php">당첨자 확율관리</a></li>
	</ul>

	<div class="table_wrap1">
		<table>
			<caption>미스테리 쇼퍼 작성</caption>
			<colgroup>
				<col width="150">
				<col width="">
			</colgroup>
			<thead>
				<tr>
					<th colspan="4" class="txt_l">당첨자 확율관리</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th>당첨자 확율</th>
					<td>
						<input type="text" class="w_input1" value="" name="" style="text-align:right;"/> / <input type="text" class="w_input1" value="" name=""/>
						<p style="padding-top:10px;">ex ) 1/100 , 100분에 1 확율로 당첨확율이 지정된다.</p>
					</td>
				</tr>
				<tr>
					<th>1등</th>
					<td><input type="text" class="w_input1" value="3" name="" style="width:70px;text-align:right;"/> 명</td>
				</tr>
				<tr>
					<th>2등</th>
					<td><input type="text" class="w_input1" value="10" name="" style="width:70px;text-align:right;"/> 명</td>
				</tr>
				<tr>
					<th>3등</th>
					<td><input type="text" class="w_input1" value="20" name="" style="width:70px;text-align:right;"/> 명</td>
				</tr>
				<tr>
					<th>4등</th>
					<td><input type="text" class="w_input1" value="30" name="" style="width:70px;text-align:right;"/> 명</td>
				</tr>
				<tr>
					<th>5등</th>
					<td><input type="text" class="w_input1" value="100" name="" style="width:70px;text-align:right;"/> 명</td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="bt_wrap2">
		<a href="javascript:void(0);" class="bt_1">저장</a>
	</div>

</section>

<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/adm/_tail.php');
?>