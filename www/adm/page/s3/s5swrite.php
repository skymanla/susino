<?php 
include_once($_SERVER['DOCUMENT_ROOT'].'/adm/_head.php');

if($_GET['mode'] == 'u'){//수정
	$mode = 'u';
	$query = "SELECT * FROM sb_event where sbe_idx = '".$_GET['idx']."'";
	$result = $conn->query($query);
	$row = $result->fetch_assoc();
	if(empty($row)){
		$url = "/adm/page/s3/s5.php";
		echoAlert("잘못된 접근입니다.");
		echoMovePage($url);	
	}
}else{//쓰기
	$mode = 'w';
}
?>
<script type="text/javascript" src="/editor/js/HuskyEZCreator.js" charset="utf-8"></script>
<script>
$(function(){
	fileUpAc1('file_up1');
});

function fileUpAc1(dataname){
	var _DataInput = '#'+dataname+'_data',
		_TextInput = '#'+dataname+'_text';
	$(document).on('click','#'+dataname,function(){
		$(_DataInput).trigger('click')
	});

	$(_DataInput).on('change',function (){
		var fileValue = this.value.split('\\'),
			fileName = fileValue[fileValue.length-1];
			$(_TextInput).val(fileName);
	});
}
// submit 최종 폼체크
function write_ok(){
	var f = document.forms.myform1;

	if(f.title.value == '') 	{
		alert('제목을 입력하세요.');
		f.title.focus();
		return false;
	}

	if(f.sdate.value == ''){
		alert('이벤트 시작일을 입력하세요.');
		f.sdate.focus();
		return false;
	}

	if(f.edate.value == ''){
		alert('이벤트 종료일을 입력하세요.');
		f.edate.focus();
		return false;
	}

	oEditors.getById["inp_3"].exec("UPDATE_CONTENTS_FIELD", []);	// 에디터의 내용이 textarea에 적용됩니다. 
	// 에디터의 내용에 대한 값 검증은 이곳에서 document.getElementById("ir1").value를 이용해서 처리하면 됩니다.

	try {
		f.action = '/lib/write_ok.php';
		f.submit();
	} catch(e) {}
}
$(function() {
    $('#idate').datepicker({
		dateFormat: 'yy-mm-dd'
	});
});
</script>
<section class="section1">
	<h3>이벤트 등록</h3>

	<form id="myform1" name="myform1" method="post" enctype="multipart/form-data">
		<input type="hidden" name="flag" value="event">
		<input type="hidden" name="mode" value="<?php echo $mode?>">
		<? if($_GET['idx']){ ?>
		<input type="hidden" name="idx" value="<?php echo $_GET['idx']?>">
		<input type="hidden" name="file2" value="<?php echo $row['sbe_file']?>">
		<? } ?>
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
							<input type="text" class="w_input1 datepicker1" value="<?php echo $row['sbe_sdate']?>" name="sdate" id="sdate" placeholder="시작일" /> - 
							<input type="text" class="w_input1 datepicker1" value="<?php echo $row['sbe_edate']?>" name="edate" id="edate" placeholder="종료일" />
						</td>
					</tr>
					<tr>
						<th>작성일</th>
						<td><input type="text" class="w_input1" value="<?=$row['sbe_idate']?>" id="idate" name="idate" style="width:100%" /></td>
					</tr>
					<tr>
						<th>제목</th>
						<td><input type="text" class="w_input1" name="title" id="inp_1" value="<?php echo stripslashes($row['sbe_title'])?>" style="width:100%" /></td>
					</tr>
					<tr>
						<th>내용</th>
						<td class="con_editor1">
							<textarea name="content" class="w_input1" id="inp_3" cols="30" rows="10"><?php echo stripslashes($row['sbe_contents'])?></textarea>
							<!--<textarea name="" id=""  style="height:200px">에디터삽입</textarea>-->
						</td>
					</tr>
					<tr>
						<th scope="row">파일첨부</th>
						<td>
							<!-- [Modify] -->
							<div class="adFile_wrap">
								<input type="hidden" name="file1" id="file_up1_text" />
								<input type="file" name="file1" id="file_up1_data" accept="image/*" />
								<button type="button" id="file_up1" class="bt_fileUp" style="display:none">파일 첨부하기</button>
							</div>
							<p class="text1" style="padding-top:5px;">* 리스트에서 보일 이미지입니다. 이미지 사이즈는 500 x 150으로 등록해주십시오.</p>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="bt_wrap2">
			<a href="s5.php" class="bt_2">취소</a>
			<a href="javascript:write_ok();" class="bt_1">등록</a>
		</div>
	</form>
</section>


<script type="text/javascript" src="/adm/js/jquery-ui.min.js"></script>
<script type="text/javascript">
//<![CDATA[
$(function() {
	var dateFormat = 'yy-mm-dd';
	var from = $('#sdate').datepicker({
		dateFormat: dateFormat,
		defaultDate: '+1w',
		changeMonth: true,
		numberOfMonths: 1
	}).on( 'change', function() {
		to.datepicker( 'option', 'minDate', getDate( this ) );
	});
	var to = $('#edate').datepicker({
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
//
var oEditors = [];
nhn.husky.EZCreator.createInIFrame({
	oAppRef: oEditors,
	elPlaceHolder: "inp_3",
	sSkinURI: "/editor/SmartEditor2Skin.html",
	fCreator: "createSEditor2"
});
function submitContents(elClickedObj)
{
	oEditors.getById["inp_3"].exec("UPDATE_CONTENTS_FIELD", []);	// 에디터의 내용이 textarea에 적용됩니다. 
	// 에디터의 내용에 대한 값 검증은 이곳에서 document.getElementById("ir1").value를 이용해서 처리하면 됩니다.

	try {
		elClickedObj.form.submit();
	} catch(e) {}
}
</script>

<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/adm/_tail.php');
?>