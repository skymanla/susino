<?php 
include_once($_SERVER['DOCUMENT_ROOT'].'/_head.php');
?>
<div class="wrap_style1">
	<div class="heading_s1">
		<h2 class="tit"><img src="/img/common/smem_title3.png" alt="회원가입" /></h2>
	</div>
	<div class="register_form">
		<form method="post" id="signinFrm" name="signinFrm" action="./register_form_update.php" onsubmit="return chkFrm();">
			<input type="hidden" id="mem_ip" name="mem_ip" value="<?=$_SERVER['REMOTE_ADDR']?>" />
			<section class="register_section fr">
				<h3>개인정보처리방침</h3>
				<div class="info_wrap">
					<p class="desc">- 개인정보 수집·이용 목적 : 회원 가입의사 확인, 회원제 서비스 제공에 따른 본인 식별·인증, 회원
					자격유지·관리, 만14세 미만 아동 개인정보 수집 시 법정대리인 동의 여부 확인, 각종 고지·통지, 고충
					처리 등을 목적으로 개인정보를 처리합니다.
					- 개인정보 항목 : 성명, 연락처, 주소, 이메일, 서비스 이용 기록, 접속 로그, 쿠키, 접속 IP 정보
					- 보유기간 : 회원 탈퇴 시 까지 보유</p>
				</div>
				<div class="checkbox_box_wrap">
					<div class="checkbox_box">
						<input type="checkbox" class="chk_1" id="chk_1" />
						<label for="chk_1">동의합니다(필수)</label>
					</div>
				</div>
			</section>

			<section class="register_section">
				<h3>필수 입력사항</h3>
				<div class="w_table1_wrap">
					<table>
						<caption>필수 입력사항</caption>
						<colgroup>
							<col width="200px" />
							<col width="" />
						</colgroup>
						<tbody>
							<tr>
								<th>아이디</th>
								<td>
									<input type="text" class="" value="" name="sb_id" id="sb_id" placeholder="" style="width:250px" required />
									<button type="button" class="bt_01" onclick="javascript:chkId()">중복확인</button>
									<!--<span class="copy01">사용할 수 있는 아이디입니다.</span>-->
									<span class="copy01"></span>
								</td>
							</tr>
							<tr>
								<th>비밀번호</th>
								<td><input type="password" class="" value="" name="sb_pw" id="sb_pw" placeholder="" style="width:250px" required /></td>
							</tr>
							<tr>
								<th>이름</th>
								<td><input type="text" class="" value="" name="sb_name" id="sb_name" placeholder="" style="width:250px" required /></td>
							</tr>
							<tr>
								<th>핸드폰</th>
								<td>
									<select name="sb_tel1" id="sb_tel1" title="" style="width:135px" >
										<option value="010" selected="selected">010</option>
										<option value="011">011</option>
										<option value="016">016</option>
										<option value="017">017</option>
										<option value="019">019</option>
									</select> -
									<input type="text" class="" value="" name="sb_tel2" id="sb_tel2" placeholder="" maxlength="4" style="width:160px" required /> -
									<input type="text" class="" value="" name="sb_tel3" id="sb_tel3" placeholder="" maxlength="4" style="width:160px" required />
								</td>
							</tr>
							<tr>
								<th>이메일</th>
								<td>
									<input type="text" class="" value="" name="sb_email1" id="sb_email1" style="width:135px" required /> @ 
									<input type="text" class="" value="" name="sb_email2" id="sb_email2" style="width:160px" required />
									<select name="sb_email2_select" id="sb_email2_select" class="" onchange="javascript:chkEmail()">
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
								</td>
							</tr>
							<tr>
								<th>성별</th>
								<td>
									<div class="radio_box_wrap">
										<div class="radio_box">
											<input type="radio" name="xy" class="" id="radio_1" value="male" checked />
											<label for="radio_1">남성</label>
										</div>
										<div class="radio_box">
											<input type="radio" name="xy" class="" id="radio_2" value="female" />
											<label for="radio_2">여성</label>
										</div>
									</div>
								</td>
							</tr>
							<tr>
								<th>생년월일</th>
								<td>
									<input type="text" class="" value="" name="sb_birth1" id="sb_birth1" placeholder="" style="width:135px" required />
									<select name="sb_birth2" id="sb_birth2" class="" style="width:150px" >
										<option value="" selected="selected" disabled>월</option>
										<?php for($i=1;$i<=12;$i++){?>
										<option value="<?=$i?>"><?php echo $i;?></option>
										<?php }?>
									</select>
									<select name="sb_birth3" id="sb_birth3" class="" style="width:150px" >
										<option value="" selected="selected" disabled>일</option>
										<?php for($i=1;$i<=31;$i++){?>
										<option value="<?=$i?>"><?php echo $i;?></option>
										<?php }?>
									</select>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</section>

			<section class="register_section mt1">
				<h3>선택 입력사항</h3>
				<div class="w_table1_wrap">
					<table>
						<caption>선택 입력사항</caption>
						<colgroup>
							<col width="200px" />
							<col width="" />
						</colgroup>
						<tbody>
							<tr>
								<th class="text_t">주소</th>
								<td>
									<div class="addr_search">
										<input type="text" class="" value="" name="sb_zipcode" id="sb_zipcode" placeholder="" readonly style="width:280px;" onclick="javascript:daum_find_addr()" />
										<button type="button" class="" onclick="javascript:daum_find_addr()">우편번호 찾기</button>
									</div>
									<div class="addr_box"><input type="text" class="" value="" name="sb_addr1" id="sb_addr1" placeholder="" style="width:400px"/></div>
									<div class="addr_box"><input type="text" class="" value="" name="sb_addr2" id="sb_addr2" placeholder="" style="width:400px"/></div>
									<script src="http://dmaps.daum.net/map_js_init/postcode.v2.js?autoload=false"></script>
									<script>
									    //load함수를 이용하여 core스크립트의 로딩이 완료된 후, 우편번호 서비스를 실행합니다.
									    function daum_find_addr(){
									    	daum.postcode.load(function(){
										        new daum.Postcode({
										            oncomplete: function(data) {
										            	console.log(data);
										                // 팝업에서 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분입니다.
										                // 예제를 참고하여 다양한 활용법을 확인해 보세요.
										                if(data.buildingName){
										                	var fullAddr = data.address+" ("+data.buildingName+")";
										                }else{
										                	var fullAddr = data.address;
										                }
										                document.getElementById("sb_zipcode").value = data.zonecode;
										               	document.getElementById("sb_addr1").value = fullAddr;
										            }
										        }).open();
										    });
									    }
									</script>
								</td>
							</tr>
							<tr>
								<th>우리동네 설정</th>
								<td>
									<select name="sb_dongnae" title="" style="width:150px" >
										<option value="" selected="selected" disabled>지역선택</option>
										<option value="">지역1</option>
										<option value="">지역2</option>
										<option value="">지역3</option>
									</select>
								</td>
							</tr>
							<tr>
								<th>블로그 주소</th>
								<td><input type="text" class="" value="" name="sb_blog" placeholder="" style="width:100%" /></td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="submit_bt"><button type="button" class="go_submit" onclick="javascript:chkFrm();">가입하기</button></div>
			</section>
		</form>
	</div>
</div>

<script>
var memfg = false;

function chkEmail(){
	var se_email = document.getElementById("sb_email2_select");
	var se_text = se_email.options[se_email.selectedIndex].text;
	if(se_text == "직접입력"){
		document.getElementById("sb_email2").value='';
	}else{
		document.getElementById("sb_email2").value=se_text;
	}
	
}
function chkId(){
	var getid = $.trim($("input[id=sb_id]").val());
	var regid = /^[A-Za-z0-9]/g;
	if(!regid.test(getid)){
		alert("아이디는 영어 및 숫자만 가능합니다.");
		return false;
	}
	if(!getid){
		$(".copy01").html("아이디를 입력해주세요.");
		return false;
	}
	console.log(getid);
	$.ajax({
		type : "POST",
		url	: "/ajax/memid_chk_ajax.php",
		data : {"chk_id" : getid},
		success : function(result){
			if(result == 1){
				$(".copy01").html("사용할 수 있는 아이디입니다.");
				memfg = true;

			}else if(result == 99){
				$(".copy01").html("중복된 아이디입니다.");
			}
			
		}, error : function(jqXHR, textStatus, errorThrown){
			console.log("error!\n"+textStatus+" : "+errorThrown);
		}
	})
}
function chkFrm(){
	var chkFrm = document.signinFrm;
	if(!$("input[id=chk_1]").is(":checked")){
		alert("개인정보처리방침에 동의해주시기 바랍니다.");
		var offset = $(".heading_s1").offset();
		$('html, body').animate({scrollTop : offset.top}, 400);
		return false;
	}

	if($.trim($("#sb_id").val()) == ""){
		alert("아이디를 입력해주세요");
		document.getElementById("sb_id").focus();
		return false;
	}

	if(memfg == false){
		alert("아이디 중복확인을 해주세요");
		document.getElementById("sb_id").focus();
		return false;
	}

	if($.trim($("#sb_pw").val()) == ""){
		alert("패스워드를 입력해주세요.");
		document.getElementById("sb_pw").focus();
		return false;
	}

	if($.trim($("#sb_name").val()) == ""){
		alert("이름을 입력해주세요.");
		document.getElementById("sb_name").focus();
		return false;	
	}

	if(!$.isNumeric($("#sb_tel2").val()) || !$.isNumeric($("#sb_tel3").val())){
		alert("핸드폰 번호는 번호만 입력 가능합니다.");
		document.getElementById("sb_tel2").focus();
		return false;	
	}

	if(!$.isNumeric($("#sb_birth1").val()) || !$.isNumeric($("#sb_birth2 option:selected").val()) || !$.isNumeric($("#sb_birth3 option:selected").val())){
		alert("월일을 선택해 주세요.");
		document.getElementById("sb_birth1").focus();
		return false;
	}

	if(confirm("입력하신 정보로 회원가입을 하시겠습니까?")){
		chkFrm.submit();
	}else{
		return false;
	}
}
</script>
<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/_tail.php');
?>