<?php include_once "../../_head.php";?>

<div class="wrap_conts wid_full">
	<div class="hd_s_img">
		<h2><img src="/m/img/scenter/scenter_title1.png" alt=""></h2>
	</div>
	<div class="wrap_register_form">
		<div class="bg_box">
			<h4>개인정보 수집 동의</h4>
			<!-- STR <form method="" action=""> -->
			<div class="in_form">
				<button type="button" class="bt_2s_c_border pops_btn">개인정보 수집목적 전문 보기<span>(필수)</span></button>
				<div class="in_pops pops_open">
					<h4>개인정보 수집목적</h4>
					<p>
						- 개인정보 수집·이용 목적 : 회원 가입의사 확인, 회원제 서비스 제공에 따른 본인 식별·인증, 회원 자격유지·관리, 만14세 미만 아동 개인정보 수집 시 법정대리인 동의 여부 확인, 각종 고지·통지, 고충 처리 등을 목적으로 개인정보를 처리합니다. <br />
						<br />
						- 개인정보 항목 : 성명, 연락처, 주소, 이메일, 서비스 이용 기록, 접속 로그, 쿠키, 접속 IP 정보 - 보유기간 : 회원 탈퇴 시 까지 보유
					</p>
					<button type="button" class="bt_pop_close">팝업 닫기</button>
				</div>
			
				<div class="chk_field txt_right">
					<div>
						<input type="checkbox" id="chkb_10" value="" name="chk_1" class="chk_1" />
						<label for="chkb_10">동의합니다</label>
					</div>
				</div>
			</div>
			<!-- END </form> -->
		</div>
		<div class="bg_box">
			<h4>필수 입력사항</h4>
			<!-- STR <form method="" action=""> -->
			<form id="myform" name="myform" method="post" enctype="multipart/form-data">
				<input type="hidden" name="flag" value="customer">
				<input type="hidden" name="device" value="mobile">
				<div class="in_form">
					<h5><label for="form_lbl_20">이름</label></h5>
					<input type="text" id="form_lbl_20" value="" name="name" />

					<h5><label for="form_lbl_21">연락처</label></h5>
					<ul class="f_table">
						<li>
							<select name="hp1" id="form_lbl_21">
								<option value="010" selected="selected">010</option>
								<option value="011">011</option>
								<option value="016">016</option>
								<option value="017">017</option>
								<option value="019">019</option>
							</select>
						</li>
						<li>
							<input type="num" value="" name="hp2" title="두번째 입력번호" />
						</li>
						<li>
							<input type="num" value="" name="hp3" title="세번째 입력번호" />
						</li>
					</ul>
					<h5><label for="form_lbl_22">이메일</label></h5>
					<ul class="f_table">
						<li><input type="text" id="form_lbl_22" value="" name="email1" /></li>
						<li class="m_at"><span>@</span></li>
						<li><input type="text" value="" name="email2" title="도메인 주소" /></li>
						<li>
							<select name="email3" id="" style="min-width:100px;">
								<option value="" selected="selected">직접입력</option>
								<option value="">naver.com</option>
								<option value="">daum.net</option>
								<option value="">hanmail.net</option>
								<option value="">nate.com</option>
								<option value="">hotmail.com</option>
								<option value="">lycos.co.kr</option>
								<option value="">cyworld.com</option>
								<option value="">dreamwiz.com</option>
								<option value="">empal.com</option>
								<option value="">unitel.co.kr</option>
								<option value="">gmail.com</option>
								<option value="">korea.com</option>
								<option value="">choi.com</option>
								<option value="">freechal.com</option>
							</select>
						</li>
					</ul>
					<h5><label for="form_lbl_23">제목</label></h5>
					<input type="text" id="form_lbl_23" value="" name="title" />

					<h5><label for="form_lbl_24">문의내용</label></h5>
					<textarea name="content" id="form_lbl_24" cols="30" rows="10"></textarea>

					<h5><label for="form_lbl_25">파일첨부</label></h5>
					<input type="file" id="form_lbl_25" value="" name="file1">
					<ul class="f_table" style="margin-top:20px;">
						<li><a href="/" class="bt_2s_c_gray">취소</a></li>
						<li><a href="javascript:write_ok();" class="bt_2s_c_red">등록</a></li>
					</ul>
				</div>
			</form>
			<!-- END </form> -->
		</div>
	</div>
</div>

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

	var w_rull_check = $('#chkb_10').prop('checked');

	if(!w_rull_check) 
	{
		alert('개인정보 수집동의에 체크해주세요.');
		$('#chkb_10').focus();
		return false;
	}

	f.action = '/lib/write_ok.php';
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
<?php include_once "../../_tail.php";?>