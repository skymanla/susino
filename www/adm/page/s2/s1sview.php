<?php 
include_once($_SERVER['DOCUMENT_ROOT'].'/adm/_head.php');
?>
<section class="section1">
	<h3>회원정보수정</h3>

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
					<td>탈퇴회원</td>
				</tr>
				<tr>
					<th>레벨</th>
					<td>
						<select name="" title="" class="w_input1">
							<option value="" selected="selected">일반회원</option>
							<option value="">VIP</option>
							<option value="">점주</option>
						</select>
					</td>
				</tr>
				<tr>
					<th>이름</th>
					<td>홍길동</td>
				</tr>
				<tr>
					<th>아이디</th>
					<td>admin</td>
				</tr>
				<tr>
					<th>비밀번호</th>
					<td><input type="password" class="w_input1" value="1234" name="" placeholder="" /></td>
				</tr>
				<tr>
					<th>핸드폰</th>
					<td><input type="text" class="w_input1" value="010-0000-0000" name="" placeholder="" /></td>
				</tr>
				<tr>
					<th>성별</th>
					<td>
						<div class="label_box1_wrap">
							<div class="label_box1"><input type="radio" name="xy" id="w_x" checked=""><label for="w_x">남자</label></div>
							<div class="label_box1"><input type="radio" name="xy" id="w_y"><label for="w_y">여자</label></div>
						</div>
					</td>
				</tr>
				<tr>
					<th>생년월일</th>
					<td>
						<input type="text" class="w_input1" value="1984" name="" style="width:130px">
						<input type="text" class="w_input1" value="07" name="" style="width:80px">
						<input type="text" class="w_input1" value="08" name="" style="width:80px">
					</td>
				</tr>
				<tr>
					<th>이메일</th>
					<td>
						<input type="text" class="w_input1" value="wind" name="" style="width:150px"> @ 
						<input type="text" class="w_input1" value="winddesign.co.kr" name="" style="width:150px">
						<select name="" class="w_input1">
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
							<div class="w_input1_box1"><input type="text" class="w_input1" value="06252" name="" style="width:130px"> <button type="button" class="bt_s2 input_sel">우편번호</button></div>
							<div class="w_input1_box1"><input type="text" class="w_input1" value="서울 강남구 강남대로 328 (역삼동, 강남역 쉐르빌)" name="" style="width:550px"></div>
							<div class="w_input1_box1"><input type="text" class="w_input1" value="기타" name="" style="width:550px"></div>
						</div>
					</td>
				</tr>
				<tr>
					<th>우리동네</th>
					<td>
						<select name="" title="" class="w_input1">
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
					<td><input type="text" class="w_input1" value="https://blog.naver.com/web_sh" name="" style="width:330px"></td>
				</tr>
			</tbody>
		</table>
	</div>

	<div class="bt_wrap2">
		<button type="button" class="bt_1">수정</button>
		<a href="s1.php" class="bt_2">목록으로</a>
	</div>

</section>
<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/adm/_tail.php');
?>