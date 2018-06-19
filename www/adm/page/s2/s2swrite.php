<?php 
include_once($_SERVER['DOCUMENT_ROOT'].'/adm/_head.php');
include_once $_SERVER['DOCUMENT_ROOT']."/lib/dbconn.php";
//lvl cate
$sql = "select * from sb_member_level where sb_idx <> '' order by sb_level_cate asc";
$lvl_result = $conn->query($sql);
?>
<script type = "text/javascript">
$(function(){
	loadJSON();
})
function setPhoneNumber(val){
	var numList = val.split("-");
	document.mailFrm.sphone1.value=numList[0];
	document.mailFrm.sphone2.value=numList[1];
	if(numList[2] != undefined){
		document.mailFrm.sphone3.value=numList[2];
	}
}
function loadJSON(){
	var data_file = "/lib/calljson.php";
	var http_request = new XMLHttpRequest();
	try{
		// Opera 8.0+, Firefox, Chrome, Safari
		http_request = new XMLHttpRequest();
	}catch (e){
		// Internet Explorer Browsers
		try{
			http_request = new ActiveXObject("Msxml2.XMLHTTP");
		}catch (e) {
			try{
				http_request = new ActiveXObject("Microsoft.XMLHTTP");
			}catch (e){
				// Eror
				alert("지원하지 않는브라우저!");
				return false;
			}

		}
	}
                
	http_request.onreadystatechange = function(){
		if (http_request.readyState == 4  ){
			// Javascript function JSON.parse to parse JSON data
			var jsonObj = JSON.parse(http_request.responseText);
			if(jsonObj['result'] == "Success"){
				var aList = jsonObj['list'];
				var selectHtml = "<select name=\"sendPhone\" onchange=\"setPhoneNumber(this.value)\">";
				selectHtml += "<option value='' selected>발신번호를 선택해주세요</option>";
				for(var i=0; i < aList.length; i++){
					selectHtml += "<option value=\"" + aList[i] + "\">";
					selectHtml += aList[i];
					selectHtml += "</option>";
				}
				selectHtml += "</select>";
				document.getElementById("sendPhoneList").innerHTML = selectHtml;
			}
		}
	}

	http_request.open("GET", data_file, true);
	http_request.send();
}
</script>
<section class="section1">
	<h3>회원 SMS 관리</h3>
	<form name="mailFrm" id="mailFrm" enctype="multipart/form-data" onsubmit="return mail_submit(mailFrm);">
	<input type="hidden" name="returnurl" id="returnurl" value="" />
	<input type="hidden" name="sphone1" id="sphone1" value="" />
	<input type="hidden" name="sphone2" id="sphone2" value="" />
	<input type="hidden" name="sphone3" id="sphone3" value="" />
	<input type="hidden" name="smsType" id="smsType" value="S" />
	<div class="table_wrap1">
		<table>
			<caption>SMS 작성</caption>
			<colgroup>
				<col width="150">
				<col width="">
			</colgroup>
			<thead>
				<tr>
					<th colspan="4" class="txt_l">SMS 작성</th>
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
					<td><input type="text" class="w_input1" value="" id="sb_sms_title" name="sb_sms_title" style="width:100%" /></td>
				</tr>
				<tr>
					<th>내용</th>
					<td>
						<textarea class="w_input1" id="sb_sms_content" name="sb_sms_content" style="height:200px;"></textarea>
					</td>
				</tr>
				<tr>
					<th>보내는 번호</th>
					<td>
						<span id="sendPhoneList"></span>
						<em>발신번호는 꼭 선택해 주세요. 발신번호는 cafe24에서 <span style="color:red">나의 서비스 관리 -> 발신번호 관리</span>에서 등록이 가능합니다.</em>
					</td>
				</tr>
			</tbody>
		</table>
	</div>

	<div class="bt_wrap2">
		<a href="s2.php" class="bt_2">취소</a>
		<a href="javascript:mail_submit(mailFrm);" class="bt_1" >SMS 발송</a>
	</div>

	<h3>회원목록</h3>
	<div id="mem_list">

	</div>
</section>

<script type="text/javascript">
var chk_sms_length = false;
var chk_sms_length_submit = true;
//<![CDATA[

$(function (){
	marTarAc1(); //받는이 설정
	mem_list(1, "", "");//ajax
	$('#sb_sms_content').on("blur", function(){
		var str = $(this).val();
		var pattern = /[\u0000-\u007f]|([\u0080-\u07ff]|(.))/g;//unicode
		console.log(str.replace(pattern, "$&$1$2").length);
		if(str.replace(pattern, "$&$1$2").length > 90){
			$('input[name=smsType]').val('L');
			chk_sms_length = true;
			chk_sms_length_submit = true;
			if(chk_sms_length == false){
				//alert("90byte가 넘어가서 LMS로 변환됩니다.\nLMS는 2,000byte까지 전송가능하며, 1회당 3건이 차감됩니다.");
			}
		}else{
			$('input[name=smsType]').val('S');
			chk_sms_length == false;
			chk_sms_length_submit = true;
			//alert("90byte 이하여서 SMS로 변환됩니다.\nSMS는 90byte까지 전송가능하며, 1회당 1건이 차감됩니다.");
		}

		if(str.replace(pattern, "$&$1$2").length > 2000){
			alert("2,000byte까지만 가능합니다.\n내용을 줄여주시기 바랍니다.");
			chk_sms_length_submit = false;
		}
	});
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

	if( $.trim($('#sb_sms_title').val()) == "" ){
		alert("제목을 입력하세요.");
		return false;
	}
	
	form.sb_sms_content.value = document.getElementById("sb_sms_content").value;
	if(!form.sb_sms_content.value || form.sb_sms_content.value=='<p>&nbsp;</p>'){
		alert('내용을 입력하세요!');
		form.sb_sms_content.focus();
		return;
	}
	// /<embed src="http://winddesign32.cafe24.com/data/editor/editor_1529381880">
	//console.log($('.se2_inputarea').find('img').val());
	//return false;
	/*if(form.sb_sms_content.value.indexOf('embed') > -1 || form.sb_sms_content.value.indexOf('img') > -1){
		$('input[name=smsType]').val('M');
	}else{
		$('input[name=smsType]').val('S');
	}*/
	
	if(form.sendPhone.value == ""){
		alert("발신번호를 선택해 주세요.");
		return false;
	}

	if(chk_sms_length_submit == false){
		alert("2,000byte까지만 가능합니다.\n내용을 줄여주시기 바랍니다.");
		return false;
	}
	if(confirm("해당 내용으로 문자를 전송하시겠습니까?")){
		form.method="post";
		form.action="/ajax/adm_sendsms.php";
		form.submit();
	}
}
// ENd 받는이 설정

//]]>
</script>

<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/adm/_tail.php');
?>