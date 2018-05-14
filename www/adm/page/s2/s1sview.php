<?php 
include_once($_SERVER['DOCUMENT_ROOT'].'/adm/_head.php');
$sb_idx = $conn->real_escape_string($_GET['idx']);
$sb_id = $conn->real_escape_string($_GET['id']);

$sql = "select * from sb_member where sb_idx='".$sb_idx."' and sb_id='".$sb_id."'";
$q = $conn->query($sql);
$v = $q->fetch_assoc();

if($v['sb_sex']=="male"){
	$malechk = "checked";
}else if($v['sb_sex']=="female"){
	$femalechk = "checked";
}

$sb_birth = explode("-", $v['sb_birth']);
$sb_email = explode("@", $v['sb_email']);

$sql = "select * from sb_member_level where 1 order by sb_level_cate asc";
$level_query = $conn->query($sql);
?>
<script>
$(function(){

});
</script>
<section class="section1">
	<h3>회원정보수정</h3>
	<form method="post" action="./member/member_update.php" name="memberForm" id="memberForm" onsubmit="return updateForm();">
		<input type="hidden" name="sb_idx" id="sb_idx" value="<?=$sb_idx?>" />
		<input type="hidden" name="sb_id" id="sb_id" value="<?=$sb_id?>" />
		<input type="hidden" name="mtype" id="mtype" value="U" />
		<input type="hidden" name="ori_email" id="ori_email" value="<?=$sb_email['1']?>" />
		<div class="table_wrap1">
			<table>
				<caption>회원정보</caption>
				<colgroup>
					<col width="100">
					<col width="">
				</colgroup>
				<thead>
					<tr>
						<th colspan="4" class="txt_l">회원정보</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<th>상태</th>
						<td><?=$v['sb_delete_flag']=='1' ? '탈퇴회원' : '스시노백 회원' ?></td>
					</tr>
					<tr>
						<th>레벨</th>
						<td>
							<select name="sb_mem_level" id="sb_mem_level" title="" class="w_input1">
								<?
									$i=1;
									foreach($level_query as $key=>$row){
								?>
								<option value="<?=$row['sb_level_cate']?>" <?=$row['sb_level_cate']==$v['sb_mem_level'] ? 'selected="selected"' : '' ?>><?=$row['sb_level_title']?></option>
								<?
								$i++;
									}
								?>
							</select>
						</td>
					</tr>
					<tr>
						<th>이름</th>
						<td><?=$v['sb_name']?></td>
					</tr>
					<tr>
						<th>아이디</th>
						<td><?=$v['sb_id']?></td>
					</tr>
					<tr>
						<th>비밀번호</th>
						<td><input type="password" class="w_input1" value="" name="sb_password" id="sb_password" placeholder="" /></td>
					</tr>
					<tr>
						<th>핸드폰</th>
						<td><input type="text" class="w_input1" value="<?=$v['sb_phone']?>" name="sb_phone" id="sb_phone" placeholder="" /></td>
					</tr>
					<tr>
						<th>성별</th>
						<td>
							<div class="label_box1_wrap">
								<div class="label_box1"><input type="radio" name="xy" id="w_x" value="male" <?=$malechk?> ><label for="w_x">남자</label></div>
								<div class="label_box1"><input type="radio" name="xy" id="w_y" value="female" <?=$femalechk?> ><label for="w_y">여자</label></div>
							</div>
						</td>
					</tr>
					<tr>
						<th>생년월일</th>
						<td>
							<input type="text" class="w_input1" value="<?=$sb_birth['0']?>" name="sb_birth1" id="sb_birth1" style="width:130px">
							<input type="text" class="w_input1" value="<?=$sb_birth['1']?>" name="sb_birth2" id="sb_birth2" style="width:80px">
							<input type="text" class="w_input1" value="<?=$sb_birth['2']?>" name="sb_birth3" id="sb_birth3" style="width:80px">
						</td>
					</tr>
					<tr>
						<th>이메일</th>
						<td>
							<input type="text" class="w_input1" value="<?=$sb_email['0']?>" name="sb_email1" id="sb_email1" style="width:150px"> @ 
							<input type="text" class="w_input1" value="<?=$sb_email['1']?>" name="sb_email2" id="sb_email2" style="width:150px">
							<select name="sb_email2_select" id="sb_email2_select" class="w_input1" onchange="javascript:chkEmail()">
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
						<th>주소</th>
						<td>
							<div class="w_input1_box1_wrap">
								<div class="w_input1_box1"><input type="text" class="w_input1" value="<?=$v['sb_zipcode']?>" name="sb_zipcode" id="sb_zipcode" style="width:130px"> 
									<button type="button" class="bt_s2 input_sel" onclick="javacript:daum_find_addr();">우편번호</button>
								</div>
								<div class="w_input1_box1"><input type="text" class="w_input1" value="<?=$v['sb_addr1']?>" name="sb_addr1" id="sb_addr1" style="width:550px"></div>
								<div class="w_input1_box1"><input type="text" class="w_input1" value="<?=$v['sb_addr2']?>" name="sb_addr2" id="sb_addr2" style="width:550px"></div>
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
							</div>
						</td>
					</tr>
					<tr>
						<th>우리동네</th>
						<td>
							<select name="sb_dongnae" id="sb_dongnae" title="" class="w_input1">
								<option value="" selected="selected">지역1</option>
								<option value="">지역2</option>
								<option value="">지역3</option>
								<option value="">지역4</option>
								<option value="">지역5</option>
							</select>
						</td>
					</tr>
					<tr>
						<th>블로그</th>
						<td><input type="text" class="w_input1" value="<?=$v['sb_blog_url']?>" name="sb_blog_url" id="sb_blog_url" style="width:330px"></td>
					</tr>
				</tbody>
			</table>
		</div>

		<div class="bt_wrap2">
			<button type="button" class="bt_1" onclick="javascript:updateForm();">수정</button>
			<a href="s1.php" class="bt_2">목록으로</a>
		</div>
	</form>

<script>
function chkEmail(){
	var se_email = document.getElementById("sb_email2_select");
	var se_text = se_email.options[se_email.selectedIndex].text;
	if(se_text == "직접입력"){
		document.getElementById("sb_email2").value=document.getElementById("ori_email").value;
	}else{
		document.getElementById("sb_email2").value=se_text;
	}
	
}
function updateForm(){//validate check
	var frm = document.memberForm;
	frm.method="post";
	if(confirm("입력하신 정보로 수정하시겠습니까?")){
		frm.submit();
	}else{
		return false;
	}
	//frm.action="./member/member_update.php";
}
</script>

</section>
<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/adm/_tail.php');
?>