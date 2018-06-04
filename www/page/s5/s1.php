<?php include_once "../../_head.php";?>

<div class="s5s1_wrap">
	<div class="box1"></div>
	<div class="w_code">
		<img src="/img/s5/s5s1_tit1.png" alt="받은 쿠폰의 코드 등록 후 전물 받을 주소 체크" />
		<fieldset class="w_info">
			<legend>코드입력 란</legend>
			<ul>
				<li>
					<label for="inplbl_01"><img src="/img/s5/s5s1_txt1.png" alt="나의주소" /></label>
					<div>
						<input type="text" id="inplbl_01" value="서울시 강남구 신사동 201-12" name="" placeholder="로그인이 필요합니다." readonly />
					</div>
				</li>
				<li>
					<label for="inplbl_02"><img src="/img/s5/s5s1_txt2.png" alt="코드입력" /></label>
					<div>
						<input type="text" id="inplbl_02" value="" name="" placeholder="코드-자리를 입력해주세요" />
					</div>
					<div>
						<a href="javascript:void(0);" class="bt_code1">코드인증하기</a>
					</div>
				</li>
			</ul>
		</fieldset>
		<div class="w_btn">
			<div>
				<a href="javascript:void(0);" class="bt_code2">회원정보변경</a>
				<a href="javascript:void(0);" class="bt_code3">로그인하기</a>
			</div>
		</div>
	</div>
	<div class="box2"></div>
</div>


<?php include_once "../../_tail.php";?>