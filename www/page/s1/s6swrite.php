<?php 
include_once $_SERVER['DOCUMENT_ROOT']."/lib/dbconn.php";
include_once($_SERVER['DOCUMENT_ROOT']."/lib/Session.php");
include_once($_SERVER['DOCUMENT_ROOT'].'/_head.php');

if($_GET['mode'] == 'u')
{
	$mode = 'u';
	$query = "SELECT * FROM sb_notice where sbn_idx = '".$_GET['idx']."'";
	$result = $conn->query($query);
	$row = $result->fetch_assoc();
}
else
{
	$mode = 'w';
}
?>
<script>
// submit 최종 폼체크
function write_ok()
{
	var f = document.forms.myform2;

	if(f.title.value == '') 
	{
		alert('제목을 입력하세요.');
		f.title.focus();
		return false;
	}

	oEditors.getById["inp_2"].exec("UPDATE_CONTENTS_FIELD", []);	// 에디터의 내용이 textarea에 적용됩니다. 
	// 에디터의 내용에 대한 값 검증은 이곳에서 document.getElementById("ir1").value를 이용해서 처리하면 됩니다.

	try {
		f.action = '../../lib/write_ok.php';
		f.submit();
	} catch(e) {}
}
</script>
<div class="wrap_style1">
	<div class="heading_s1">
		<h2 class="tit"><img src="/img/common/scenter_title2.png" alt="공지사항" /></h2>
		<!-- <p class="desc">스시노벡쉐프의 소식입니다.</p> -->
	</div>
	<div class="con_wrapStyle1">
		<div class="cst_con">
			<form id="myform2" name="myform2" method="post" enctype="multipart/form-data">
			<input type="hidden" name="flag" value="notice">
			<input type="hidden" name="mode" value="<?php echo $mode?>">
			<?php
			if($_GET['idx'])
			{
			?>
			<input type="hidden" name="idx" value="<?php echo $_GET['idx']?>">
			<input type="hidden" name="file2" value="<?php echo $row['sbn_file']?>">
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
							<input type="text" name="title" id="inp_1" value="<?php echo stripslashes($row['sbn_title'])?>" />
						</td>
					</tr>
					<tr>
						<th scope="row">
							<label for="inp_2">내용</label>
						</th>
						<td>
							<textarea name="content" id="inp_2" cols="30" rows="10"><?php echo stripslashes($row['sbn_contents'])?></textarea>
						</td>
					</tr>
				<!-- 	<tr>
						<th scope="row">파일첨부</th>
						<td>
							[Modify]
							<div class="adFile_wrap">
								<input type="text" name="file1" id="file_up1_text" />
								<input type="file" name="file1" id="file_up1_data" />
								<button type="button" id="file_up1" class="bt_fileUp">파일 첨부하기</button>
							</div>
						</td>
					</tr> -->
				</tbody>
			</table>
			</form>
		</div>
		<div class="cst_rWrap">
			<button type="button" class="bt_s1_gray" onclick="location.href='s6.php'">취소</button>
			<button type="submit" class="bt_s1_red" onclick="write_ok();">등록</button>
		</div>
	</div>
</div>

<script type="text/javascript">
var oEditors = [];
nhn.husky.EZCreator.createInIFrame({
	oAppRef: oEditors,
	elPlaceHolder: "inp_2",
	sSkinURI: "../../editor/SmartEditor2Skin.html",
	fCreator: "createSEditor2"
});
function submitContents(elClickedObj)
{
	oEditors.getById["inp_2"].exec("UPDATE_CONTENTS_FIELD", []);	// 에디터의 내용이 textarea에 적용됩니다. 
	// 에디터의 내용에 대한 값 검증은 이곳에서 document.getElementById("ir1").value를 이용해서 처리하면 됩니다.

	try {
		elClickedObj.form.submit();
	} catch(e) {}
}
</script>

<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/_tail.php');
?>