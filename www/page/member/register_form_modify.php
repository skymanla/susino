<?php 
include_once($_SERVER['DOCUMENT_ROOT'].'/_head.php');
include_once $_SERVER['DOCUMENT_ROOT']."/lib/dbconn.php";
include_once($_SERVER['DOCUMENT_ROOT']."/lib/function.php");

session_start();
$sb_id = $_SESSION['sb_id'];
$sb_password = $_SESSION['sb_password'];

$sql = "select * from sb_member where sb_id='".$sb_id."' and sb_password='".$sb_password."' and sb_delete_flag is null";
$q = $conn->query($sql);
$r = $q->fetch_assoc();
if(empty($r)){
	$url = "/";
	echoAlert("잘못된 접근입니다.");
	echoMovePage($url);	
}
//휴대폰 번호
$sb_phone = explode("-",$r['sb_phone']);
//email
$sb_email = explode("@",$r['sb_email']);
//gender
if($r['sb_sex'] == "male"){
	$male = "checked";
}else{
	$female = "checked";
}
$sb_dong_arr = explode(" ", $r[sb_dongnae]);

?>
<div class="wrap_style1">
	<div class="heading_s1">
		<h2 class="tit"><img src="/img/common/smem_title3_1.png" alt="정보변경" /></h2>
	</div>
	<div class="register_form">
		<form method="post" id="signinFrm" name="signinFrm" action="./register_form_modify_update.php" onsubmit="return chkFrm();">
			<input type="hidden" id="mem_ip" name="mem_ip" value="<?=$_SERVER['REMOTE_ADDR']?>" />
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
									<?=$r['sb_id']?>
								</td>
							</tr>
							<tr>
								<th>비밀번호</th>
								<td><input type="password" class="" value="" name="sb_pw" id="sb_pw" placeholder="" style="width:250px" required /></td>
							</tr>
							<tr>
								<th>이름</th>
								<td><input type="text" class="" value="<?=$r['sb_name']?>" name="sb_name" id="sb_name" placeholder="" style="width:250px" required /></td>
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
									<input type="text" class="" value="<?=$sb_phone[1]?>" name="sb_tel2" id="sb_tel2" placeholder="" maxlength="4" style="width:160px" required /> -
									<input type="text" class="" value="<?=$sb_phone[2]?>" name="sb_tel3" id="sb_tel3" placeholder="" maxlength="4" style="width:160px" required />
								</td>
							</tr>
							<tr>
								<th>이메일</th>
								<td>
									<input type="text" class="" value="<?=$sb_email[0]?>" name="sb_email1" id="sb_email1" style="width:135px" required /> @ 
									<input type="text" class="" value="<?=$sb_email[1]?>" name="sb_email2" id="sb_email2" style="width:160px" required />
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
											<input type="radio" name="xy" class="" id="radio_1" value="male" <?=$male?> />
											<label for="radio_1">남성</label>
										</div>
										<div class="radio_box">
											<input type="radio" name="xy" class="" id="radio_2" value="female" <?=$female?> />
											<label for="radio_2">여성</label>
										</div>
									</div>
								</td>
							</tr>
							<tr>
								<th>우리동네 설정</th>
								<td>
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
									<div id="s_gugun"><div class="radio_box_wrap"></div></div>
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
							<tr>
								<th class="text_t">주소</th>
								<td>
									<div class="addr_search">
										<input type="text" class="" value="<?=$r[sb_zipcode]?>" name="sb_zipcode" id="sb_zipcode" placeholder="" readonly style="width:280px;" onclick="javascript:daum_find_addr()" />
										<button type="button" class="" onclick="javascript:daum_find_addr()">우편번호 찾기</button>
									</div>
									<div class="addr_box"><input type="text" class="" value="<?=$r[sb_addr1]?>" name="sb_addr1" id="sb_addr1" placeholder="" style="width:400px"/></div>
									<div class="addr_box"><input type="text" class="" value="<?=$r[sb_addr2]?>" name="sb_addr2" id="sb_addr2" placeholder="" style="width:400px"/></div>
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
								<th>블로그 주소</th>
								<td><input type="text" class="" value="<?=$r[sb_blog_url]?>" name="sb_blog" placeholder="" style="width:100%" /></td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="submit_bt"><button type="button" class="go_submit" onclick="javascript:chkFrm();">수정하기</button></div>
			</section>
		</form>
	</div>
</div>

<script>
var memfg = false;

$(function(){
	myInfoAc1(); // 우리동네 설정
});

function chkEmail(){
	var se_email = document.getElementById("sb_email2_select");
	var se_text = se_email.options[se_email.selectedIndex].text;
	if(se_text == "직접입력"){
		document.getElementById("sb_email2").value='';
	}else{
		document.getElementById("sb_email2").value=se_text;
	}
	
}

function chkFrm(){
	var chkFrm = document.signinFrm;
	
	/*if($.trim($("#sb_pw").val()) == ""){
		alert("패스워드를 입력해주세요.");
		document.getElementById("sb_pw").focus();
		return false;
	}*/

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

	if(chkFrm.s_sido.value==''){
		alert("우리동네 설정을 해주세요");
		return false;
	}else{
		if(!$('input:radio[name=addr_sec]').is(':checked')){
			alert("우리동네 설정을 해주세요");
			return false;
		}
	}

	/*if(!$.isNumeric($("#sb_birth1").val()) || !$.isNumeric($("#sb_birth2 option:selected").val()) || !$.isNumeric($("#sb_birth3 option:selected").val())){
		alert("월일을 선택해 주세요.");
		document.getElementById("sb_birth1").focus();
		return false;
	}*/

	if(confirm("입력하신 정보로 회원가입을 하시겠습니까?")){
		chkFrm.submit();
	}else{
		return false;
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
				$('#s_gugun .radio_box_wrap').html('');
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
			for (var j in results) {
				if(j=='<?php echo $sb_dong_arr[1]?>'){
					addrChecked = 'checked';
					addrActive = 'active';
				} else {
					addrChecked = '';
					addrActive = '';
				}

				addrSecHtml += '<div class="radio_box"><input type="radio" value="' + j + '" name="addr_sec" id="addr_sec'+addrSecNum+'" '+addrChecked+'/><label for="addr_sec'+addrSecNum+'" class="'+addrActive+'">' + j + ' (<b>'+results[j]+'</b>)</label></div>';
				addrSecNum++;
			}
			if(t!='세종특별자치시'){
				$('#s_gugun .radio_box_wrap').html(addrSecHtml);
			} else {
				$('#s_gugun .radio_box_wrap').html('');
			}


		}).fail(function(){
			//alert('error');
		})
	}
	// END 지점 정보
}
// END 우리동네 설정
</script>
<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/_tail.php');
?>