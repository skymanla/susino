<?php include_once "../../_head.php";?>

<div class="wrap_conts wid_full">
	<div class="hd_s_img">
		<h2><img src="/m/img/s5/s5s2_tit_showper.png" alt=""></h2>
		<div class="hd_step st1">스텝 1단계 기본</div>
	</div>
	<div class="wrap_caution">
		<h3>후기 전송 시 알아두세요</h3>
		<ul>
			<li>미스테리 쇼퍼에 등록하신 내용은 내부 매장 평가용도로만 사용되며, 그 어떤 개인 정보도 유출되거나 공개되지 않으니 안심하세요.</li>
			<li>아래 평가사항에 대해 꼼꼼하게 답변 부탁드리며, 하단의 첨부파일에는 주문하셨던 메뉴 사진과 영수증 사진을 꼭! 함께 첨부해주시기 바랍니다. 
			(방문 여부에 대한 사실관계 확인을 위한 용도이며 사실 확인 후 삭제됩니다. 걱정마세요.)</li>
			<li>미스테리 쇼퍼는 더 좋은 초밥을 만들기 위해 운영되는 정책으로 보다 나은 서비스와 맛을 위해 아낌없는 충언과 의견을 기다리고 있습니다. 감사합니다.</li>
		</ul>
	</div>
	<div class="wrap_register_form">
		<!-- STR <form method="" action=""> -->
		<div class="bg_box">
			<div class="in_form">
				<h5><label for="form_lbl_10">방문날짜</label></h5>
				<input type="text" id="form_lbl_10" value="" name="" placeholder="ex) 2018-06-30" />
				<h5>방문매장</h5>
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
				<h5>방문인원</h5>
				<ul class="f_table">
					<li>
						<select name="" id="">
							<option value="">1인</option>
							<option value="">2인</option>
							<option value="">3인</option>
							<option value="">4인</option>
							<option value="">5인</option>
							<option value="">6인</option>
							<option value="">7인 이상</option>
						</select>
					</li>
				</ul>
				<h5>누구와 함께 가셨나요?</h5>
				<ul class="radio_type w4">
					<li>
						<input type="radio" id="form_rad_10" value="" name="type2" checked />
						<label for="form_rad_10">가족</label>
					</li>
					<li>
						<input type="radio" id="form_rad_11" value="" name="type2" />
						<label for="form_rad_11">친구</label>
					</li>
					<li>
						<input type="radio" id="form_rad_12" value="" name="type2" />
						<label for="form_rad_12">동료</label>
					</li>
					<li>
						<input type="radio" id="form_rad_13" value="" name="type2" />
						<label for="form_rad_13">연인</label>
					</li>
				</ul>
				<h5><label for="form_lbl_13">어떤 메뉴를 준비하셨나요?</label></h5>
				<input type="text" id="form_lbl_13" value="" name="" />
				<h5>영수증 첨부</h5>
				<ul class="f_table">
					<li><input type="file" id="form_lbl_14" value="" name=""></li>
					<li><button type="button" class="bt_2s_c_gray"><label for="form_lbl_14">파일첨부</label></button></li>
				</ul>
			</div>
		</div>
		<div class="bt_wrap_center pd_lr">
			<a href="/m/page/s5/s2sreview_self_2.php" class="bt_2s_c_more">다음단계로<i class="arr2"></i></a>
		</div>
		<!-- END <form method="" action=""> -->
	</div>

</div>

<?php include_once "../../_tail.php";?>