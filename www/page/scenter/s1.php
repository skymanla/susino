<?php 
include_once($_SERVER['DOCUMENT_ROOT'].'/_head.php');
?>
<script>
// submit 최종 폼체크
function write_ok()
{
	var f = document.forms.myform;

	if(f.name.value == "") 
	{
		alert('이름을 입력하세요.');
		f.name.focus();
		return false;
	}

	if(f.email1.value == '') 
	{
		alert('이메일을 입력하세요.');
		f.email1.focus();
		return false;
	}

	if(f.email2.value == '') 
	{
		alert('이메일주소를 입력하세요.');
		f.email2.focus();
		return false;
	}

	if(f.title.value == '') 
	{
		alert('제목을 입력하세요.');
		f.title.focus();
		return false;
	}

	if(f.content.value == '') 
	{
		alert('문의내용을 입력하세요.');
		f.content.focus();
		return false;
	}

	var w_rull_check = $('#chk_1').prop('checked');

	if(!w_rull_check) 
	{
		alert('개인정보 수집동의에 체크해주세요.');
		$('.chk_1').focus();
		return false;
	}

	f.action = '../../lib/write_ok.php';
	f.submit();
}

$(function(){
	$("#email3").on("click", function() {
		$("#email2").val($("#email3").val());
	});
});

function cancel(t){
	$(t).find('input').val('');
	$(t).find('textarea').val('');
	$(t).find('select').val('');
}
</script>
<div class="wrap_style1">
	<div class="heading_s1">
		<h2 class="tit"><img src="/img/common/scenter_title1.png" alt="고객의 소리" /></h2>
		<!-- <p class="desc">스시노백쉐프에게 궁금한 사항이나 불편했던 사항을 해결하고,<br /> -->
		<!-- 고객님들의 좋았던 의견을 적극적으로 반영하고자 합니다.</p> -->
	</div>
	<div class="con_wrapStyle1 w1">
		<div class="cst_con">
			<div class="inner1">
				<form id="myform" name="myform" method="post" enctype="multipart/form-data">
				<input type="hidden" name="flag" value="customer">
				<table class="board_style1">
					<caption>고객의 소리 개인정보 입력란</caption>
					<colgroup>
						<col width="120px" />
						<col width="" />
					</colgroup>
					<tbody>
						<tr>
							<th scope="row">
								<label for="inp_1">이름</label>
							</th>
							<td>
								<input type="text" name="name" id="inp_1" />
							</td>
						</tr>
						<tr>
							<th scope="row">
								<label for="inp_2">연락처</label>
							</th>
							<td>
								<input type="text" name="hp1" id="inp_2" style="width:32%" maxlength="3" /><!-- 
								 --><input type="text" name="hp2" title="두번째 번호란 입력" style="width:32%" maxlength="4" /><!-- 
								 --><input type="text" name="hp3" title="세번째 번호란 입력" style="width:32%" maxlength="4" />
							</td>
						</tr>
						<tr>
							<th scope="row">
								<label for="inp_3">이메일</label>
							</th>
							<td>
								<input type="text" name="email1" id="inp_3" style="width:28%" /><!-- 
								--><span class="at" style="width:6%">@</span><!-- 
								--><input type="text" name="email2" id="email2" title="도메인 입력 란" style="width:32%" /><!-- 
								--><select name="email3" id="email3" title="도메인 선택" style="width:32%" >
									<option value="" selected>직접입력</option>
									<option value="naver.com">naver.com</option>
									<option value="daum.net">daum.net</option>
									<option value="hanmail.net">hanmail.net</option>
									<option value="nate.com">nate.com</option>
									<option value="hotmail.com">hotmail.com</option>
									<option value="lycos.co.kr">lycos.co.kr</option>
									<option value="cyworld.com">cyworld.com</option>
									<option value="dreamwiz.com">dreamwiz.com</option>
									<option value="empal.com">empal.com</option>
									<option value="unitel.co.kr">unitel.co.kr</option>
									<option value="gmail.com">gmail.com</option>
									<option value="korea.com">korea.com</option>
									<option value="choi.com">choi.com</option>
									<option value="freechal.com">freechal.com</option>
								</select>
							</td>
						</tr>
						<!-- <tr> -->
							<!-- <th scope="row">문의유형</th> -->
							<!-- <td> -->
								<!-- <select name="" style="width:100%"> -->
									<!-- <option value="문의유형을 선택해 주세요" selected>문의유형을 선택해 주세요</option> -->
									<!-- <option value=""></option> -->
								<!-- </select> -->
							<!-- </td> -->
						<!-- </tr> -->
						<!-- <tr> -->
							<!-- <th>매장명</th> -->
							<!-- <td> -->
								<!-- <select name="" style="width:49%"> -->
									<!-- <option value="시/도 선택" selected>시/도 선택</option> -->
									<!-- <option value=""></option> -->
								<!-- </select> -->
								<!-- <select name="" style="width:49%"> -->
									<!-- <option value="시/도 선택" selected>매장명 선택</option> -->
									<!-- <option value=""></option> -->
								<!-- </select> -->
							<!-- </td> -->
						<!-- </tr> -->
						<tr>
							<th scope="row">
								<label for="inp_4">제목</label>
							</th>
							<td>
								<input type="text" name="title" id="inp_4" />
							</td>
						</tr>
						<tr>
							<th scope="row">
								<label for="inp_5">문의내용</label>
							</th>
							<td>
								<textarea name="content" id="inp_5" cols="30" rows="10"></textarea> 
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
							</td>
						</tr>
					</tbody>
				</table>
				</form>
			</div>
		</div>
		<div class="cst_con">
			<div class="inner1">
				<fieldset class="agree_wrap">
					<legend>개인정보 수집 확인</legend>
					<h3 class="tit">개인정보 수집동의</h3>
					<div class="info_wrap">
						<p class="desc">- 개인정보 수집·이용 목적 : 회원 가입의사 확인, 회원제 서비스 제공에 따른 본인 식별·인증, 회원
						자격유지·관리, 만14세 미만 아동 개인정보 수집 시 법정대리인 동의 여부 확인, 각종 고지·통지, 고충
						처리 등을 목적으로 개인정보를 처리합니다.
						- 개인정보 항목 : 성명, 연락처, 주소, 이메일, 서비스 이용 기록, 접속 로그, 쿠키, 접속 IP 정보
						- 보유기간 : 회원 탈퇴 시 까지 보유</p>
					</div>
					<!-- [Modify] -->
					<div class="in_agree jquery_checked">
						<input type="checkbox" class="chk_1" id="chk_1" value="" />
						<label for="chk_1"><i></i>동의합니다</label>
					</div>
				</fieldset>
			</div>
		</div>
		<div class="cst_rWrap inner1">
			<button type="button" class="bt_s1_gray" onclick="location.href='/page/scenter/s1.php'">취소</button>
			<button type="submit" class="bt_s1_red" onclick="write_ok();">등록</button>
		</div>
	</div>
</div>
<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/_tail.php');
?>