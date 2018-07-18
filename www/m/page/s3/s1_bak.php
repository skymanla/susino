<?php include_once "../../_head.php";?>

<div class="wrap_conts">
	<div class="hd_s_img">
		<h2><img src="/m/img/s3/s3s1_tit.png" alt=""></h2>
	</div>
	<div class="map_search_wrap">
		<div class="data_form">
			<ul class="radio_box jquery_checked">
				<li><input type="radio" class="" value="" name="s_info_type" id="s_info_type_check1" checked /><label for="s_info_type_check1">전체매장</label></li>
				<li><input type="radio" class="" value="1" name="s_info_type" id="s_info_type_check2" /><label for="s_info_type_check2">다이닝</label></li>
				<li><input type="radio" class="" value="2" name="s_info_type" id="s_info_type_check3" /><label for="s_info_type_check3">컴팩트</label></li>
				<li><input type="radio" class="" value="3" name="s_info_type" id="s_info_type_check4" /><label for="s_info_type_check4">유니크</label></li>
			</ul>
			<div class="select_box">
				<div>
					<select id="s_sido">
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
				</div>
				<div>
					<select id="s_gugun">
						<option value="" selected="selected">시/군/구 선택</option>
					</select>
				</div>
			</div>
			<div class="s_info_name_box">
				<div>
					<input type="text" id="s_info_name" value="" name="" placeholder="" />
				</div>
				<div>
					<button type="button" class="submit">검색</button>
				</div>
			</div>
		</div>
		<div id="dmap"></div>
		<!-- 다이닝 매장일때(D) <div class="info_type bg1"></div> -->
		<!-- 컴팩트 매장일때(C) <div class="info_type bg2"></div> -->
		<!-- 유니크 매장일때(U) <div class="info_type bg3"></div> -->
		<div class="list_wrap">
			
			<div class="list_box">
				<?php for($i=0;$i<3;$i++){?>
				<div>
					<div class="info_name">강남역본점</div>
					<div class="paddress1">서울 강남구 강남대로 100길 (역삼동)</div>
					<div class="info_type bg1"></div>
					<section>
						<div class="map_pin_info">
							<ul>
								<li>
									<div>주소</div>
									<div>전북 전주시 완산구 홍산 3길 15(효자동3가)</div>
								</li>
								<li>
									<div>전화번호</div>
									<div>063-229-0802</div>
								</li>
								<li>
									<div>서비스</div>
									<div class="info_icon">
										<div class="q"><i>배달</i></div>
										<div class="p"><i>주차</i></div>
										<div class="r"><i>room</i></div>
										<div class="c"><i>예약</i></div>
										<div class="k"><i>전자상품권</i></div>
									</div>
								</li>
								<li>
									<div>주차정보</div>
									<div>매장 앞 4대 주차가능</div>
								</li>
							</ul>
						</div>
					</section>
				</div>
				<?php }?>
			</div>
			
		</div>
	</div>
	<div class="paging">
		<!--버튼 비활성시  버튼 내부 a태그에 class="bt_off" 추가 -->
		<!-- ex) <a href="javascript:void(0);" class="bt_prev bt_off">이전목록</a> -->
		<a href="javascript:void(0);" class="bt_prev bt_off">이전목록</a>
		<span>1-10 / 102</span>
		<a href="javascript:void(0);" class="bt_next">다음목록</a>
	</div>
	<div class="new_map_info">
		<h2><img src="/m/img/s3/new_info_title.png" alt="스시노백쉐프 신규매장안내"></h2>
		<div class="info_slide">
			<ul class="roll">
				<?php for($i=0;$i<3;$i++){?>
				<li>
					<div class="info_name">서울창동</div>
					<div class="paddress1">서울 도봉구 도봉로114길 22-7 (창동)</div>
					<div class="info_call" onclick="location.href='tel:02-000-0000'">전화걸기</div>

					<!-- STR 매장 아이콘 icon -->
					<!-- 다이닝 매장일때(D) <div class="info_type bg1"></div> -->
					<!-- 컴팩트 매장일때(C) <div class="info_type bg2"></div> -->
					<!-- 유니크 매장일때(U) <div class="info_type bg3"></div> -->
					<div class="info_type bg1"></div>
					<!-- END 매장 아이콘 icon -->

					<button type="button" class="go_map">지도보기</button>
				</li>
				<?php }?>
			</ul>
		</div>
	</div>
</div>









<?php include_once "../../_tail.php";?>