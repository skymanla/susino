<?php include_once "../../_head.php";?>
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
				<input type="text" id="form_lbl_10" value="홍길동" name="" disabled />
				<h5><label for="form_lbl_11">비밀번호</label></h5>
				<input type="password" id="form_lbl_11" value="" name="" placeholder="영문, 숫자 혼합하여 8자 이상" />
				<h5><label for="form_lbl_12">이름</label></h5>
				<input type="text" id="form_lbl_12" value="" name="" />
				<h5><label for="form_lbl_13">연락처</label></h5>
				<ul class="f_table">
					<li>
						<select name="" id="form_lbl_13">
							<option value="010" selected="selected">010</option>
							<option value="011">011</option>
							<option value="016">016</option>
							<option value="017">017</option>
							<option value="019">019</option>
						</select>
					</li>
					<li>
						<input type="num" value="" name="" title="두번째 입력번호" />
					</li>
					<li>
						<input type="num" value="" name="" title="세번째 입력번호" />
					</li>
				</ul>
				<h5><label for="form_lbl_14">이메일</label></h5>
				<ul class="f_table">
					<li><input type="text" id="form_lbl_14" value="" name="" /></li>
					<li class="m_at"><span>@</span></li>
					<li><input type="text" value="" name="" title="도메인 주소" /></li>
					<li>
						<select name="" id="" style="min-width:100px;">
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
						<input type="radio" id="radMan" name="zender" checked />
						<label for="radMan">남성</label>
					</div>
					<div class="r_tab2">
						<input type="radio" id="radWomen" name="zender" />
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
						<select name="" title="시/군/구 선택">
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
						<input type="text" id="form_lbl_16" value="" name="" />
					</li>
					<li>
						<select name="" id="" title="월 입력">
							<option value="">월</option>
						</select>
					</li>
					<li>
						<select name="" id="" title="일 입력">
							<option value="">일</option>
						</select>
					</li>
				</ul>
				<h5><label for="form_lbl_17">주소</label></h5>
				<div class="alot_of_input">
					<ul class="f_table">
						<li><input type="text" id="form_lbl_17" value="" name="" /></li>
						<li><button type="button" class="bt_2s_c_gray">우편번호</button></li>
					</ul>
					<input type="text" value="" name="" title="첫번째 상세입력주소" />
					<input type="text" value="" name="" title="두번째 상세입력주소"/>
				</div>
				<h5><label for="form_lbl_18">블로그 주소</label></h5>
				<input type="text" id="form_lbl_18" value="" name="" placeholder="블로그 URL입력" />
				<a href="/m/page/member/register_form_complete.php" class="bt_2s_c_red">수정하기</a>
			</div>
			<!-- END </form> -->
		</div>
	</div>
</div>
<?php include_once "../../_tail.php";?>