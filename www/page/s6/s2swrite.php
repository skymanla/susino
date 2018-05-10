<?php 
include_once $_SERVER['DOCUMENT_ROOT']."/lib/dbconn.php";
include_once($_SERVER['DOCUMENT_ROOT']."/lib/Session.php");
include_once($_SERVER['DOCUMENT_ROOT'].'/_head.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/js/datepicker.php');

if($_GET['mode'] == 'u')
{
	$mode = 'u';
	$query = "SELECT * FROM sb_event where sbe_idx = '".$_GET['idx']."'";
	$result = $conn->query($query);
	$row = $result->fetch_assoc();
}
else
{
	$mode = 'w';
}
?>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.8.18/themes/base/jquery-ui.css" type="text/css" />  
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>  
<script src="http://code.jquery.com/ui/1.8.18/jquery-ui.min.js"></script> 
<script>
// submit 최종 폼체크
function write_ok()
{
	var f = document.forms.myform1;

	if(f.title.value == '') 
	{
		alert('제목을 입력하세요.');
		f.title.focus();
		return false;
	}

	if(f.sdate.value == '') 
	{
		alert('이벤트 시작일을 입력하세요.');
		f.sdate.focus();
		return false;
	}

	if(f.edate.value == '') 
	{
		alert('이벤트 종료일을 입력하세요.');
		f.sdate.focus();
		return false;
	}

	oEditors.getById["inp_3"].exec("UPDATE_CONTENTS_FIELD", []);	// 에디터의 내용이 textarea에 적용됩니다. 
	// 에디터의 내용에 대한 값 검증은 이곳에서 document.getElementById("ir1").value를 이용해서 처리하면 됩니다.

	try {
		f.action = '../../lib/write_ok.php';
		f.submit();
	} catch(e) {}
}
$(function() {
    $('#sdate, #edate, #idate').datepicker({
		dateFormat: 'yy-mm-dd'
	});
});
</script>
<div class="wrap_style1">
	<div class="heading_s1">
		<h2 class="tit"><img src="/img/common/s6_title2.png" alt="이달의 이벤트" /></h2>
		<!-- <p class="desc">스시노백쉐프와 어울리는 FUN FUN한 이벤트!<br />
		매달 진행되는 다양한 이벤트에 참여해보세요!</p> -->
	</div>
	<div class="con_wrapStyle1 w1">
		<div class="cst_con">
			<form id="myform1" name="myform1" method="post" enctype="multipart/form-data">
			<input type="hidden" name="flag" value="event">
			<input type="hidden" name="mode" value="<?php echo $mode?>">
			<?php
			if($_GET['idx'])
			{
			?>
			<input type="hidden" name="idx" value="<?php echo $_GET['idx']?>">
			<input type="hidden" name="file2" value="<?php echo $row['sbe_file']?>">
			<?php
			}
			?>
			<table class="board_style1">
				<caption>이벤트 정보입력란</caption>
				<colgroup>
					<col width="120px" />
					<col width="" />
				</colgroup>
				<tbody>
					<tr>
						<th scope="row">
							<label for="inp_1">제목</label>
						</th>
						<td>
							<input type="text" name="title" id="inp_1" value="<?php echo stripslashes($row['sbe_title'])?>" />
						</td>
					</tr>
					<tr>
						<th scope="row">
							<label for="">이벤트 진행일</label>
						</th>
						<td>
							<input type="text" id="sdate" name="sdate" value="<?php echo $row['sbe_sdate']?>" style="width:48%" placeholder="시작일" /><!-- 
							 --><span class="at" style="width:4%">~</span><!-- 
							 --><input type="text" id="edate" name="edate" value="<?php echo $row['sbe_edate']?>" style="width:48%" placeholder="종료일" />
						</td>
					</tr>
					<tr>
						<th scope="row">
							<label for="inp_2">작성일</label>
						</th>
						<td>
							<input type="text" id="idate" name="idate" id="inp_2" value="<?php echo $row['sbe_idate']?>" maxlength="6" />
						</td>
					</tr>
					<tr>
						<th scope="row">
							<label for="inp_2">내용</label>
						</th>
						<td>
							<textarea name="content" id="inp_3" cols="30" rows="10"><?php echo stripslashes($row['sbe_contents'])?></textarea>
						</td>
					</tr>
					<tr>
						<th scope="row">파일첨부</th>
						<td>
							<!-- [Modify] -->
							<div class="adFile_wrap">
								<input type="text" name="file1" id="file_up1_text" />
								<input type="file" name="file1" id="file_up1_data" />
								<button type="button" id="file_up1" class="bt_fileUp">파일 첨부하기</button>
							</div>
							<p class="text1" style="padding-top:5px;">* 리스트에서 보일 이미지입니다. 이미지 사이즈는 500 x 150으로 등록해주십시오.</p>
						</td>
					</tr>
				</tbody>
			</table>
			</form>
		</div>
		<div class="cst_rWrap">
			<button type="button" class="bt_s1_gray" onclick="location.href='/page/s6/s2.php'">취소</button>
			<button type="submit" class="bt_s1_red"onclick="write_ok();">등록</button>
		</div>
	</div>
</div>

<script type="text/javascript">
var oEditors = [];
nhn.husky.EZCreator.createInIFrame({
	oAppRef: oEditors,
	elPlaceHolder: "inp_3",
	sSkinURI: "../../editor/SmartEditor2Skin.html",
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
include_once($_SERVER['DOCUMENT_ROOT'].'/_tail.php');
?>