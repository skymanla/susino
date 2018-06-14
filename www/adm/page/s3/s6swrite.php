<?php 
include_once($_SERVER['DOCUMENT_ROOT'].'/adm/_head.php');
include_once($_SERVER['DOCUMENT_ROOT']."/lib/function.php");

$mode = $_GET['mode'];
$flag_depth = "App_notice";
$tbl_info = "sb_application_notice_board";
if($mode == "w"){
	//pass
}else if($mode == "u"){
	$sql = "select * from $tbl_info where sbab_idx='".$_GET['idx']."' and sbab_cate='$flag_depth' ";
	$q = $conn->query($sql);
	$row = $q->fetch_assoc();
	if(empty($row)){
		$url = "/adm/page/s3/s6.php";
		echoAlert("잘못된 접근입니다.");
		echoMovePage($url);	
	}
}else{
	$mode = "w";
}
?>
<script type="text/javascript" src="/editor/js/HuskyEZCreator.js" charset="utf-8"></script>
<section class="section1">
	<h3>우리동네 공지사항 등록</h3>
	<form name="myform1" id="myform1" method="post" enctype="multipart/form-data" onsubmit="write_ok(this);">
		<input type="hidden" name="flag" id="flag" value="App_notice" />
		<input type="hidden" name="mode" id="mode" value="<?=$mode?>" />
		<input type="hidden" name="idx" id="idx" value="<?=$_GET['idx']?>" />
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
							<select name="s_sido" id="s_sido" title="" class="w_input1" onchange="findArea(this)">
								<option value="A" data-real-addr="all">전체</option>
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
							<div class="radio_box_wrap" id="area_depth"></div>
						</td>
					</tr>
					<tr>
						<th>제목</th>
						<td><input type="text" class="w_input1" value="<?=stripslashes($row[sbab_title])?>" name="title" id="inp_2" style="width:100%" /></td>
					</tr>
					<tr>
						<th>내용</th>
						<td>
							<textarea name="content" class="w_input1" id="inp_3" cols="30" rows="10" style="height:200px"><?=stripslashes($row[sbab_content])?></textarea>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="bt_wrap2">
			<a href="s6.php" class="bt_2">취소</a>
			<a href="javascript:write_ok();" class="bt_1">등록</a>
		</div>
	</form>
</section>
<script type="text/javascript">
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

function findArea(Aval){
	if(Aval.value == "A"){
		$('#area_depth').empty();
	}else{
		$.ajax({
			type : 'POST',
			data : {'sb_sido' : Aval.value},
			url : '/ajax/adm_ourArea.php',
			dataType : 'json',
			success : function(result){
				console.log(result);
				var i = 0;
				var data = "";
				for(key in result){
					if(i==0){
						var chkVal = "checked";
					}else{
						var chkVal = "";
					}
					data += '<div class="radio_box"><input type="radio" value="'+key+'" '+chkVal+' name="addr_sec" id="addr_sec'+i+'"><label for="addr_sec'+i+'">'+key+' (<b>'+result[key]+'</b>)</label></div>';
					i++;
				}
				$('#area_depth').html(data);
			}, error : function(){
				console.log('1234');
			}
		})
	}
}

function write_ok(){
	var f = document.forms.myform1;

	if(f.title.value == '') 	{
		alert('제목을 입력하세요.');
		f.title.focus();
		return false;
	}

	oEditors.getById["inp_3"].exec("UPDATE_CONTENTS_FIELD", []);	// 에디터의 내용이 textarea에 적용됩니다. 
	// 에디터의 내용에 대한 값 검증은 이곳에서 document.getElementById("ir1").value를 이용해서 처리하면 됩니다.
	if(document.getElementById("inp_3").value == ''){
		alert('내용을 입력하세요');
		return false;
	}
	try {
		f.action = '/lib/write_ok.php';
		f.submit();
	} catch(e) {}
}
</script>

<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/adm/_tail.php');
?>