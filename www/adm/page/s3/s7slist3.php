<?php 
include_once($_SERVER['DOCUMENT_ROOT'].'/adm/_head.php');

$tbl_info = "sb_invite_admin";
//저장값 불러오기
$sql = "select * from $tbl_info where 1=1 order by sbia_idx desc limit 1";
$q = $conn->query($sql);
$invite_length = mysqli_num_rows($q);

if($invite_length < 1 ){
	$row = "";
}else{
	$row = $q->fetch_assoc();
	
	$sdate = date('Y-m-d', strtotime($row['sbia_sdate']));
	$edate = date('Y-m-d', strtotime($row['sbia_edate']));

	$sbia_prize_option = "sbia_prize_option";
	for($i=1;$i<5;$i++){
		${$sbia_prize_option.$i} = explode("||", $row["sbia_prize_option{$i}"]);
	}
}
?>

<section class="section1">
	<h3>함께갈래요 신청자</h3>
	<ul class="tab_type1">
		<li><a href="s7.php">신청자 목록</a></li>
		<li><a href="s7slist2.php">당첨자</a></li>
		<li class="active"><a href="s7slist3.php">당첨자 확률관리</a></li>
	</ul>

	<form name="inviteForm" name="inviteForm" method="post" onsubmit="inviteRate(this)">
		<input type="hidden" name="flag" id="flag" value="invite" />
		<input type="hidden" name="mode" id="mode" value="u" />
		<input type="hidden" name="getNo"  value="<?=$row[sbia_idx]?>" />
		<div class="table_wrap1">
			<table>
				<caption>미스테리 쇼퍼 작성</caption>
				<colgroup>
					<col width="150">
					<col width="">
				</colgroup>
				<thead>
					<tr>
						<th colspan="4" class="txt_l">당첨자 확률관리</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<th>이벤트 기간</th>
						<td>
							<input type="text" class="w_input1 datepicker1" value="<?=$sdate?>" name="sdate" id="date1_start" placeholder="시작일" /> - 
							<input type="text" class="w_input1 datepicker1" value="<?=$edate?>" name="edate" id="date1_end" placeholder="종료일" />
						</td>
					</tr>
					<tr>
						<th>당첨자 확률</th>
						<td>
							<input type="text" class="w_input1" value="<?=$row[sbia_prize_rate1]?>" name="invite_rate1" id="invite_rate1" style="text-align:right;"/> / 
							<input type="text" class="w_input1" value="<?=$row[sbia_prize_rate2]?>" name="invite_rate2" id="invite_rate2" />
							<p style="padding-top:10px;">ex ) 1/100 , 100분에 1 확률로 당첨확률이 지정된다.</p>
						</td>
					</tr>
					<tr>
						<th>1등</th>
						<td>
							<input type="text" class="w_input1" value="<?=$sbia_prize_option1[0]?>" name="invite_prize_1" id="invite_prize_1" placeholder="1등 당첨자 수" style="width:112px;text-align:right;"/> 명&nbsp;&nbsp;&nbsp;
							<input type="text" class="w_input1" value="<?=$sbia_prize_option1[1]?>" name="invite_prize_1_product" id="invite_prize_1_product" placeholder="1등상품 명" />
						</td>
					</tr>
					<tr>
						<th>2등</th>
						<td>
							<input type="text" class="w_input1" value="<?=$sbia_prize_option2[0]?>" name="invite_prize_2" id="invite_prize_2" placeholder="2등 당첨자 수" style="width:112px;text-align:right;"/> 명&nbsp;&nbsp;&nbsp;
							<input type="text" class="w_input1" value="<?=$sbia_prize_option2[1]?>" name="invite_prize_2_product" id="invite_prize_2_product" placeholder="2등상품 명" />
						</td>
					</tr>
					<tr>
						<th>3등</th>
						<td>
							<input type="text" class="w_input1" value="<?=$sbia_prize_option3[0]?>" name="invite_prize_3" id="invite_prize_3" placeholder="3등 당첨자 수" style="width:112px;text-align:right;"/> 명&nbsp;&nbsp;&nbsp;
							<input type="text" class="w_input1" value="<?=$sbia_prize_option3[1]?>" name="invite_prize_3_product" id="invite_prize_3_product" placeholder="3등상품 명" />
						</td>
					</tr>
					<tr>
						<th>4등</th>
						<td>
							<input type="text" class="w_input1" value="<?=$sbia_prize_option4[0]?>" name="invite_prize_4" id="invite_prize_4" placeholder="4등 당첨자 수" style="width:112px;text-align:right;"/> 명&nbsp;&nbsp;&nbsp;
							<input type="text" class="w_input1" value="<?=$sbia_prize_option4[1]?>" name="invite_prize_4_product" id="invite_prize_4_product" placeholder="4등상품 명" />
						</td>
					</tr>
					
				</tbody>
			</table>
		</div>
		<div class="bt_wrap2">
			<a href="javascript:inviteRate(this.inviteForm);" class="bt_1">저장</a>
		</div>
	</form>

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
function inviteRate(Frm){
	if(Frm.sdate.value == ''){
		alert('이벤트 시작일을 입력하세요.');
		Frm.sdate.focus();
		return false;
	}

	if(Frm.edate.value == ''){
		alert('이벤트 종료일을 입력하세요.');
		Frm.edate.focus();
		return false;
	}

	if(Frm.invite_rate1.value.trim() == "" ){
		alert('당첨자 확률을 입력하세요.');
		Frm.invite_rate1.focus();
		return false;
	}

	if(Frm.invite_rate2.value.trim() == "" ){
		alert('당첨자 확률을 입력하세요.');
		Frm.invite_rate2.focus();
		return false;
	}

	if(Frm.invite_rate1.value > Frm.invite_rate2.value){
		alert('분자가 분모보다 큽니다.');
		Frm.invite_rate1.focus();
		return false;	
	}

	//명수 및 상품명 일괄 확인
	for(var i=1;i<=4;i++){
		//당첨자 수
		if( $.trim($('#invite_prize_'+i).val()) == "" ){
			alert( i+'등 명수를 입력하세요.');
			$('#invite_prize_'+i).focus();
			return false;		
		}
		//상품 명
		if( $.trim($('#invite_prize_'+i+'_product').val()) == "" ){
			alert(i+'등 상품을 입력하세요.');
			$('#invite_prize_'+i+'_product').focus();
			return false;		
		}
	}

	if(confirm("당첨자 확률을 등록하시겠습니까?\n수정한 내용으로 저장이 됩니다.")){
		try {
			Frm.action = '/lib/write_ok.php';
			Frm.submit();
		} catch(e) {}	
	}else{
		return false;
	}
	
}
</script>

<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/adm/_tail.php');
?>