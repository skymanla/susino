<?php 
include_once($_SERVER['DOCUMENT_ROOT'].'/adm/_head.php');
?>

<section class="section1">
	<h3>이벤트 등록</h3>

	<div class="table_wrap1">
		<table>
			<caption>이벤트 작성</caption>
			<colgroup>
				<col width="150">
				<col width="">
			</colgroup>
			<thead>
				<tr>
					<th colspan="4" class="txt_l">이벤트 작성</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th>기간</th>
					<td>
						<input type="text" class="w_input1 datepicker1" value="" name="" id="date1_start" placeholder="시작일" /> - 
						<input type="text" class="w_input1 datepicker1" value="" name="" id="date1_end" placeholder="종료일" />
					</td>
				</tr>
				<tr>
					<th>작성일</th>
					<td><input type="text" class="w_input1" value="" name="" style="width:100%" /></td>
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
		<a href="s5.php" class="bt_2">취소</a>
		<a href="s5sview.php" class="bt_1">등록</a>
	</div>
</section>


<script type="text/javascript" src="/adm/js/jquery-ui.min.js"></script>
<script type="text/javascript">
//<![CDATA[
$(function() {
	var dateFormat = 'yy-mm-dd';
	var from = $('#date1_start').datepicker({
		dateFormat: dateFormat,
		defaultDate: '+1w',
		changeMonth: true,
		numberOfMonths: 1
	}).on( 'change', function() {
		to.datepicker( 'option', 'minDate', getDate( this ) );
	});
	var to = $('#date1_end').datepicker({
		dateFormat: dateFormat,
		defaultDate: '+1w',
		changeMonth: true,
		numberOfMonths: 1
	}).on( 'change', function() {
		from.datepicker( 'option', 'maxDate', getDate( this ) );
	});

	function getDate( element ) {
		var date;
		try {
			date = $.datepicker.parseDate( dateFormat, element.value );
		} catch( error ) {
			date = null;
		}
		return date;
	}
});
//]]>
</script>

<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/adm/_tail.php');
?>