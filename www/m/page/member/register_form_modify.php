<?php include_once "../../_head.php";?>
<form name="modify_member" method="post" action="./register_form_update.php" onsubmit="modify_Frm(this);return false;">
<input type="hidden" name="sb_id" value="<?=$dash_row['sb_id']?>" />
<input type="hidden" name="sb_idx" value="<?=$dash_row['sb_idx']?>" />
<input type="hidden" name="register_mod" value="m" />
<div class="wrap_conts_style2">
	<div class="hd_s_txt">
		<h2>정보변경</h2>
	</div>
	<div class="wrap_register_form">
		<div class="bg_box">
			<h4>필수 입력사항</h4>
			<!-- STR <form method="" action=""> -->
			<div class="in_form">
				<h5><label for="form_lbl_10">아이디</label></h5>
				<input type="text" id="form_lbl_10" value="<?=$dash_row['sb_id']?>" name="" disabled />
				<h5><label for="form_lbl_11">비밀번호</label></h5>
				<input type="password" id="form_lbl_11" value="" name="sb_pw" placeholder="영문, 숫자 혼합하여 8자 이상" />
				<h5><label for="form_lbl_12">이름</label></h5>
				<input type="text" id="form_lbl_12" value="<?=$dash_row['sb_name']?>" name="sb_name" />
				<h5><label for="form_lbl_13">연락처</label></h5>
				<ul class="f_table">
					<li>
						<select name="sb_tel1" id="form_lbl_13">
							<option value="010" <?=$member_phone['0']=="010" ? 'selected="selected"' : '' ?>>010</option>
							<option value="011" <?=$member_phone['0']=="011" ? 'selected="selected"' : '' ?>>011</option>
							<option value="016" <?=$member_phone['0']=="016" ? 'selected="selected"' : '' ?>>016</option>
							<option value="017" <?=$member_phone['0']=="017" ? 'selected="selected"' : '' ?>>017</option>
							<option value="019" <?=$member_phone['0']=="019" ? 'selected="selected"' : '' ?>>019</option>
						</select>
					</li>
					<li>
						<input type="num" value="<?=$member_phone['1']?>" name="sb_tel2" id="sb_tel2" title="두번째 입력번호" />
					</li>
					<li>
						<input type="num" value="<?=$member_phone['2']?>" name="sb_tel3" id="sb_tel3" title="세번째 입력번호" />
					</li>
				</ul>
				<h5><label for="form_lbl_14">이메일</label></h5>
				<ul class="f_table">
					<li><input type="text" id="form_lbl_14" value="<?=$member_email['0']?>" name="sb_email1" id="sb_email1" /></li>
					<li class="m_at"><span>@</span></li>
					<li><input type="text" value="<?=$member_email['1']?>" name="sb_email2" id="sb_email2" title="도메인 주소" /></li>
					<li>
						<select name="sb_email2_select" id="sb_email2_select"  style="min-width:100px;" onchange="javascript:chkEmail()">
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
				<h5>성별</h5>
				<div class="radio_tab_field">
					<div class="r_tab1">
						<input type="radio" id="radMan" name="xy" value="male" <?=$dash_row['sb_sex']=="male" ? 'checked' : '' ?> />
						<label for="radMan">남성</label>
					</div>
					<div class="r_tab2">
						<input type="radio" id="radWomen" name="xy" value="female" <?=$dash_row['sb_sex']=="female" ? 'checked' : '' ?> />
						<label for="radWomen">여성</label>
					</div>
				</div>
				<h5><label for="form_lbl_15">우리동네 설정</label></h5>
				<ul class="f_table">
					<li>
						<select id="s_sido" name="s_sido">
							<option value="" data-real-addr="all">시/도</option>
							<option value="0" data-real-addr="서울">서울특별시</option>
							<option value="1" data-real-addr="부산">부산광역시</option>
							<option value="2" data-real-addr="대구">대구광역시</option>
							<option value="3" data-real-addr="인천">인천광역시</option>
							<option value="4" data-real-addr="광주">광주광역시</option>
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
					</li>
					<li>
						<select name="addr_sec" id="s_gugun" title="시/군/구 선택">
							<option value="">시/군/구 선택</option>
						</select>
					</li>
				</ul>

			</div>
			<!-- END </form> -->
		</div>
		<div class="bg_box">
			<h4>선택 입력사항</h4>
			<!-- STR <form method="" action=""> -->
			<div class="in_form">
				<h5><label for="form_lbl_16">생년월일</label></h5>
				<ul class="f_table">
					<li>
						<input type="text" id="form_lbl_16" value="<?=$member_birth['0']?>" name="sb_birth1" />
					</li>
					<li>
						<select name="sb_birth2"  title="월 입력">
							<option value="" selected="selected" disabled>월</option>
							<?php for($i=1;$i<=12;$i++){?>
							<option value="<?=$i?>" <?=$member_birth['1']==$i ? "selected" : ""?>><?php echo $i;?></option>
							<?php }?>
						</select>
					</li>
					<li>
						<select name="sb_birth3"  title="일 입력">
							<option value="" selected="selected" disabled>일</option>
							<?php for($i=1;$i<=31;$i++){?>
							<option value="<?=$i?>" <?=$member_birth['2']==$i ? "selected" : ""?>><?php echo $i;?></option>
							<?php }?>
						</select>
					</li>
				</ul>
				<h5><label for="form_lbl_17">주소</label></h5>
				<div class="alot_of_input">
					<ul class="f_table">
						<li><input type="text" id="form_lbl_17" value="<?=$dash_row['sb_zipcode']?>" name="sb_zipcode" id="sb_zipcode" readonly onclick="javascript:sample3_execDaumPostcode()" /></li>
						<li><button type="button" class="bt_2s_c_gray" onclick="javascript:sample3_execDaumPostcode()">우편번호</button></li>
					</ul>
					<div id="zip_wrap" style="display:none;border:1px solid;width:100%;height:300px;margin:5px 0;position:relative">
					<img src="//t1.daumcdn.net/localimg/localimages/07/postcode/320/close.png" id="btnFoldWrap" style="cursor:pointer;position:absolute;right:0px;top:-1px;z-index:1" onclick="foldDaumPostcode()" alt="접기 버튼">
					</div>
					<input type="text" value="<?=$dash_row['sb_addr1']?>" name="sb_addr1" id="sb_addr1" title="첫번째 상세입력주소" />
					<script src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script>
					<script>
					    // 우편번호 찾기 찾기 화면을 넣을 element
					    var element_wrap = document.getElementById('zip_wrap');

					    function foldDaumPostcode() {
					        // iframe을 넣은 element를 안보이게 한다.
					        element_wrap.style.display = 'none';
					    }

					    function sample3_execDaumPostcode() {
					        // 현재 scroll 위치를 저장해놓는다.
					        var currentScroll = Math.max(document.body.scrollTop, document.documentElement.scrollTop);
					        new daum.Postcode({
					            oncomplete: function(data) {
					                // 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분.

					                // 각 주소의 노출 규칙에 따라 주소를 조합한다.
					                // 내려오는 변수가 값이 없는 경우엔 공백('')값을 가지므로, 이를 참고하여 분기 한다.
					                var fullAddr = data.address; // 최종 주소 변수
					                var extraAddr = ''; // 조합형 주소 변수

					                // 기본 주소가 도로명 타입일때 조합한다.
					                if(data.addressType === 'R'){
					                    //법정동명이 있을 경우 추가한다.
					                    if(data.bname !== ''){
					                        extraAddr += data.bname;
					                    }
					                    // 건물명이 있을 경우 추가한다.
					                    if(data.buildingName !== ''){
					                        extraAddr += (extraAddr !== '' ? ', ' + data.buildingName : data.buildingName);
										}
										// 조합형주소의 유무에 따라 양쪽에 괄호를 추가하여 최종 주소를 만든다.
										fullAddr += (extraAddr !== '' ? ' ('+ extraAddr +')' : '');
									}
					                // 우편번호와 주소 정보를 해당 필드에 넣는다.
					                $("input[name=sb_zipcode]").val(data.zonecode);
					                $("input[name=sb_addr1]").val(fullAddr);
					                // iframe을 넣은 element를 안보이게 한다.
					                // (autoClose:false 기능을 이용한다면, 아래 코드를 제거해야 화면에서 사라지지 않는다.)
					                element_wrap.style.display = 'none';
					                // 우편번호 찾기 화면이 보이기 이전으로 scroll 위치를 되돌린다.
					                document.body.scrollTop = currentScroll;
					            },
					            // 우편번호 찾기 화면 크기가 조정되었을때 실행할 코드를 작성하는 부분. iframe을 넣은 element의 높이값을 조정한다.
					            onresize : function(size) {
					                element_wrap.style.height = size.height+'px';
					            },
					            width : '100%',
					            height : '100%'
					        }).embed(element_wrap);

					        // iframe을 넣은 element를 보이게 한다.
					        element_wrap.style.display = 'block';
					    }
					</script>
					<input type="text" value="<?=$dash_row['sb_addr2']?>" name="sb_addr2" title="두번째 상세입력주소"/>
				</div>
				<h5><label for="form_lbl_18">블로그 주소</label></h5>
				<input type="text" id="form_lbl_18" value="<?=$dash_row['sb_blog_url']?>" name="sb_blog_url" placeholder="블로그 URL입력" />
				<a href="javascript:modify_Frm(document.modify_member);" class="bt_2s_c_red">수정하기</a>
			</div>
			<!-- END </form> -->
		</div>
	</div>
</div>
</form>
<script>
$(function(){
	myInfoAc1(); // 우리동네 설정
});

function chkEmail(){
	var se_email = document.getElementById("sb_email2_select");
	var se_text = se_email.options[se_email.selectedIndex].text;
	if(se_text == "직접입력"){
		document.getElementById("sb_email2").value="<?=$member_email['1']?>";
	}else{
		document.getElementById("sb_email2").value=se_text;
	}
	
}
// STR 우리동네 설정
function myInfoAc1(){
	// STR 셀렉박스 체인지

	$('#s_sido option[data-real-addr="<?php echo $sb_dong_arr[0]?>"]').attr('selected', 'selected');
	addInfo1('<?php echo $sb_dong_arr[0]?>');

	$('#s_sido').on('change',function (){
		addInfo1($(this).find('option:selected').attr('data-real-addr'));
	});
	// END 셀렉박스 체인지

	// STR 지점 정보
	function addInfo1(t){
		$.ajax({
			type: 'GET',
			url: '/inc/p_map_data.php',
			dataType: 'json',
			data: ''
		}).done(function(addArry1) {
			var addrSec = [];
			var addrSecHtml = '';
			var addrSecNum =0;
			var addrChecked = '';
			var addrActive = '';


			$.each(addArry1,function (i){
				if(addArry1[i].addr.split(' ')[0].indexOf(t) != -1){
					addrSec.push(addArry1[i].addr.split(' ')[1]);
				}
			});

			if(addrSec.length==0){
				alert('해당 지역에는 매장이 없습니다.\n다른 지역을 검색해주세요.');
				$('#s_sido option:eq(0)').attr('selected', 'selected');
				$('#s_gugun').html('');
				return false;
			}

			var results = new Array();
			for (var i=0; i<addrSec.length; i++) {
				var key = addrSec[i].toString();
				if (!results[key]) {
					results[key] = 1
				} else {
					results[key] = results[key] + 1;
				}
			}
			addrSecHtml += '<select class="radio_box" name="addr_sec">';
			for (var j in results) {
				if(j=='<?php echo $sb_dong_arr[1]?>'){
					addrChecked = 'selected';
				} else {
					addrChecked = '';
				}
				addrSecHtml += '<option value="'+j+'"'+addrChecked+'>'+j+'('+results[j]+')</option>';
				addrSecNum++;
			}
			addrSecHtml += '</select>';
			if(t!='세종특별자치시'){
				$('#s_gugun').html(addrSecHtml);
			} else {
				$('#s_gugun').html('');
			}


		}).fail(function(){
			//alert('error');
		})
	}
	// END 지점 정보
}
// END 우리동네 설정
// 
function modify_Frm(Frm){
	if($.trim($("input[name=sb_name]").val()) == ""){
		alert("이름을 입력해주세요.");
		$("input[name=sb_name]").focus();
		return false;	
	}

	if(!$.isNumeric($("#sb_tel2").val()) || !$.isNumeric($("#sb_tel3").val())){
		alert("핸드폰 번호는 번호만 입력 가능합니다.");
		document.getElementById("sb_tel2").focus();
		return false;	
	}

	if(Frm.s_sido.value==''){
		alert("우리동네 설정을 해주세요");
		return false;
	}else{
		
	}

	/*if(!$.isNumeric($("#sb_birth1").val()) || !$.isNumeric($("#sb_birth2 option:selected").val()) || !$.isNumeric($("#sb_birth3 option:selected").val())){
		alert("월일을 선택해 주세요.");
		document.getElementById("sb_birth1").focus();
		return false;
	}*/

	if(confirm("입력하신 정보로 회원정보를 변경하시겠습니까?")){
		Frm.submit();
	}else{
		return false;
	}
}
</script>
<?php include_once "../../_tail.php";?>