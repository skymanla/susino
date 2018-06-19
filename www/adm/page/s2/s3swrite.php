<?php 
include_once($_SERVER['DOCUMENT_ROOT'].'/adm/_head.php');
include_once $_SERVER['DOCUMENT_ROOT']."/lib/dbconn.php";
//lvl cate
$sql = "select * from sb_member_level where sb_idx <> '' order by sb_level_cate asc";
$lvl_result = $conn->query($sql);
?>
<script type="text/javascript" src="/editor/js/HuskyEZCreator.js" charset="utf-8"></script>
<section class="section1">
	<h3>회원 E-mail 관리</h3>
	<form name="mailFrm" id="mailFrm" enctype="multipart/form-data" onsubmit="return mail_submit(mailFrm);">
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
				<tr>
					<th>받는이 설정</th>
					<td>
						<div class="label_box1_wrap" id="mail_target_tab">
							<div class="label_box1"><input type="radio" name="mail_target" id="check_1" value="manual" checked=""><label for="check_1">직접입력</label></div>
							<div class="label_box1"><input type="radio" name="mail_target" id="check_2" value="lvl_setting"><label for="check_2">레벨설정</label></div>
							<div class="label_box1"><input type="radio" name="mail_target" id="check_3" value="dong_setting"><label for="check_3">우리동네</label></div>
						</div>
					</td>
				</tr>
				<tr class="mail_target_tr tr1">
					<th>받는이 ID</th>
					<td><input type="text" class="w_input1" value="" name="sb_sender_email" id="sb_sender_email" placeholder="" style="width:300px" /> <span class="copy1">다중으로 보낼시  , 로 구분하세요 (예:   crashoxsusu, wind, gaga )</span></td>
				</tr>
				<tr class="mail_target_tr tr2" style="display:none">
					<th>받는이 레벨</th>
					<td>
						<select name="sb_mb_lvl" id="sb_mb_lvl" title="" class="w_input1">
							<?
								foreach($lvl_result as $key => $lvl){
							?>
							<option value="<?=$lvl['sb_level_cate']?>" <? if($lvl['sb_level_cate']==1){ echo 'selected="selected"' ;} ?> ><?=$lvl['sb_level_title']?></option>
							<? } ?>
						</select>
					</td>
				</tr>
				<tr class="mail_target_tr tr3" style="display:none">
					<th>받는이 우리동네</th>
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
						<div class="radio_box_wrap" id="area_depth">
						</div>
					</td>
				</tr>
				<tr>
					<th>제목</th>
					<td><input type="text" class="w_input1" value="" id="sb_email_title" name="sb_email_title" style="width:100%" /></td>
				</tr>
				<tr>
					<th>내용</th>
					<td>
						<textarea class="w_input1" id="sb_email_content" name="sb_email_content" style="height:200px;display:none"></textarea>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
	</form>
	<div class="bt_wrap2">
		<a href="s3.php" class="bt_2">취소</a>
		<a href="javascript:mail_submit(mailFrm);" class="bt_1" >E-mail 발송</a>
	</div>

	<h3>회원목록</h3>
	<div id="mem_list">

	</div>
	
</section>

<script type="text/javascript">
//<![CDATA[

var oEditors = [];
nhn.husky.EZCreator.createInIFrame({
	oAppRef: oEditors,
	elPlaceHolder: "sb_email_content",
	sSkinURI: "/editor/SmartEditor2Skin.html",
	fCreator: "createSEditor2"
});
function submitContents(elClickedObj){
	oEditors.getById["sb_email_content"].exec("UPDATE_CONTENTS_FIELD", []);	// 에디터의 내용이 textarea에 적용됩니다. 
	// 에디터의 내용에 대한 값 검증은 이곳에서 document.getElementById("ir1").value를 이용해서 처리하면 됩니다.

	try {
		elClickedObj.form.submit();
	} catch(e) {}
}

$(function (){
	marTarAc1(); //받는이 설정
	mem_list(1, "", "");//ajax 
});

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
			}
		})
	}
}
//mem_list
function mem_list(pageNo, stx="", searchword=""){
	var keyword = document.getElementById("stx");
	var sword = document.getElementById("search_word");
	if(keyword != null){
		stx = keyword.options[keyword.selectedIndex].value;
	}
	if(sword != null){
		searchword = sword.value.trim();
	}
	if(searchword == ""){
		stx = "";
		searchword = "";
	}
	$.ajax({
		type : 'POST',
		url : '/ajax/adm_member_list.php',
		data : {'cur_page' : pageNo, 'stx' : stx, 'search_word' : searchword},
		//dataType: 'html',
		success : function(data){
			$("#mem_list").html(data);
		}
	})
}
//회원 클릭시 아이디 입력
function mem_click_ev(memid){
	if($('#check_1').prop("checked") == true){//설정값이 맞을 경우에만 작동
		$('#sb_sender_email').val($('#sb_sender_email').val()+memid+',');
	}
}

function openMember(idx){
	window.open("./member/popMember.php?idx="+idx, "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=100,left=500,width=830,height=600");
}
// STR 받는이 설정
function marTarAc1(){
	$('#mail_target_tab input').on('click',function(){
		var $_This = $(this);
		var w_ch_num = $_This.attr('id').split('_')[1];
		//$('.mail_target_tr').find('input, select').val('');
		$('.mail_target_tr').css({'display':'none'});
		$('.tr'+w_ch_num+'').css({'display':'table-row'});
	});

	$('#mail_target_tab input').each(function (){
		var $_This = $(this);
		var w_check = $_This.prop('checked');
		var w_ch_num = $_This.attr('id').split('_')[1];
		if(w_check){
			$('.mail_target_tr').css({'display':'none'});
			$('.tr'+w_ch_num+'').css({'display':'table-row'});
		}
	});
}
// ENd 받는이 설정

function mail_submit(form){
	//var Frm = document.getElementById('mailFrm');
	if($('#check_1').prop("checked") == true){
		if( $.trim($('#sb_sender_email').val()) == "" ){
			alert("회원 아이디을 입력해 주세요.");
			return false;
		}
	}

	if( $.trim($('#sb_email_title').val()) == "" ){
		alert("제목을 입력하세요.");
		$('#sb_email_title').focus();
		return false;
	}
	oEditors.getById["sb_email_content"].exec("UPDATE_CONTENTS_FIELD", []);
	form.sb_email_content.value = document.getElementById("sb_email_content").value;
	if(!form.sb_email_content.value || form.sb_email_content.value=='<p>&nbsp;</p>'){
		alert('내용을 입력하세요!');
		form.sb_email_content.focus();
		return;
	}
	
	if(confirm("해당 내용으로 메일을 전송하시겠습니까?")){
		form.method="post";
		form.action="/ajax/adm_sendmailer.php";
		form.submit();
	}
}
//]]>
</script>

<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/adm/_tail.php');
?>