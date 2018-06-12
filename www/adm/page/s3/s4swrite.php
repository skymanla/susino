<?php 
include_once($_SERVER['DOCUMENT_ROOT'].'/adm/_head.php');
?>

<section class="section1">
	<h3>체험단 등록</h3>

	<div class="table_wrap1">
		<table>
			<caption>체험단 작성</caption>
			<colgroup>
				<col width="150">
				<col width="">
			</colgroup>
			<thead>
				<tr>
					<th colspan="4" class="txt_l">체험단 작성</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th>우리동네</th>
					<td>
						<select name="" title="" class="w_input1">
							<option value="" data-real-addr="all">전체</option>
							<option value="0" data-real-addr="서울">서울특별시</option>
							<option value="1" data-real-addr="부산">부산광역시</option>
							<option value="2" data-real-addr="대구">대구광역시</option>
							<option value="3" data-real-addr="인천">인천광역시</option>
							<option value="4" data-real-addr="광주광역시">광주광역시</option>
							<option value="5" data-real-addr="대전">대전광역시</option>
							<option value="6" data-real-addr="울산">울산광역시</option>
							<option value="7" data-real-addr="세종특별자치시">세종특별자치시</option>
							<option value="8" data-real-addr="경기">경기도</option>
							<option value="9" data-real-addr="강원">강원도</option>
							<option value="10" data-real-addr="충북">충청북도</option>
							<option value="11" data-real-addr="충남">충청남도</option>
							<option value="12" data-real-addr="전북">전라북도</option>
							<option value="13" data-real-addr="전남">전라남도</option>
							<option value="14" data-real-addr="경북">경상북도</option>
							<option value="15" data-real-addr="경남">경상남도</option>
							<option value="16" data-real-addr="제주특별자치도">제주특별자치도</option>
						</select>
						<div class="radio_box_wrap">
							<div class="radio_box"><input type="radio" value="강서구" name="addr_sec" id="addr_sec0"><label for="addr_sec0">강서구 (<b>2</b>)</label></div>
							<div class="radio_box"><input type="radio" value="남구" name="addr_sec" id="addr_sec1"><label for="addr_sec1">남구 (<b>1</b>)</label></div>
							<div class="radio_box"><input type="radio" value="사하구" name="addr_sec" id="addr_sec2"><label for="addr_sec2">사하구 (<b>1</b>)</label></div>
						</div>
					</td>
				</tr>
				<tr>
					<th>기간</th>
					<td>
						<input type="text" class="w_input1 datepicker1" value="" name="" id="date1_start" placeholder="시작일" /> - 
						<input type="text" class="w_input1 datepicker1" value="" name="" id="date1_end" placeholder="종료일" />
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
		<a href="s4.php" class="bt_2">취소</a>
		<a href="s4sview.php" class="bt_1">등록</a>
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