<?php include_once "../../_head.php";?>

<div class="wrap_style1">
	<div class="heading_s1">
		<h2 class="tit"><img src="/img/common/review_title_shopper.png" alt="미스테리쇼퍼 후기작성"></h2>
	</div>
	<div class="review_form">
		<div class="review_section fr">
			<div class="info_wrap2">
				미스테리 쇼퍼에 등록하신 내용은 내부 매장 평가용도로만 사용되며, 그 어떤 개인 정보도 유출되거나 공개되지 않으니 안심하세요. <br />
				<br />
				아래 평가사항에 대해 꼼꼼하게 답변 부탁드리며, 하단의 첨부파일에는 주문하셨던 메뉴 사진과 영수증 사진을 꼭! 함께 첨부해주시기 바랍니다. <br />
				(방문 여부에 대한 사실관계 확인을 위한 용도이며 사실 확인 후 삭제됩니다. 걱정마세요.)<br />
				<br />
				미스테리 쇼퍼는 더 좋은 초밥을 만들기 위해 운영되는 정책으로 보다 나은 서비스와 맛을 위해 아낌없는 충언과 의견을 기다리고 있습니다. 감사합니다.
			</div>
		</div>

		<div class="tab_type1 type1" id="review_section_tab_ac1">
			<a href="javascript:void(0);" class="bt active">기본 입력사항</a>
			<a href="javascript:void(0);" class="bt">맛 평가 (Quality)</a>
			<a href="javascript:void(0);" class="bt">서비스 평가 (Service)</a>
			<a href="javascript:void(0);" class="bt">클린 평가 (Clean)</a>
		</div>

		<form name="reviewForm" method="post" enctype="multipart/form-data" onsubmit="return reviewFunc(this);">
		<input type="hidden" name="getIdx" value="<?=$_GET['getIdx']?>" />
		<input type="hidden" name="aType" value="<?=$_GET['aType']?>" />
		<div class="review_section" id="review_section_ac1">
			<div class="active">
				<h3>기본 입력사항</h3>
				<div class="w_table1_wrap">
					<table>
						<tbody>
							<tr>
								<td>
									<div class="title1">방문하신 날짜를 알려주세요.</div>
									<input type="text" class="setdate" value="" name="visit_date" placeholder="" style="width:40%;"  readonly/>
								</td>
							</tr>
							<tr>
								<td>
									<div class="title1">방문하신 매장을 알려주세요.</div>
									<select id="s_sido" name="s_sido" style="width:40%;" >
										<option value="" data-real-addr="all">시/도</option>
										<option value="0" data-real-addr="서울" value="0">서울특별시</option>
										<option value="1" data-real-addr="부산" value="1">부산광역시</option>
										<option value="2" data-real-addr="대구" value="2">대구광역시</option>
										<option value="3" data-real-addr="인천" value="3">인천광역시</option>
										<option value="4" data-real-addr="광주" value="4">광주광역시</option>
										<option value="5" data-real-addr="대전" value="5">대전광역시</option>
										<option value="6" data-real-addr="울산" value="6">울산광역시</option>
										<option value="7" data-real-addr="세종특별자치시" value="7">세종특별자치시</option>
										<option value="8" data-real-addr="경기" value="8">경기도</option>
										<option value="9" data-real-addr="강원" value="9">강원도</option>
										<option value="10" data-real-addr="충북" value="10">충청북도</option>
										<option value="11" data-real-addr="충남" value="11">충청남도</option>
										<option value="12" data-real-addr="전북" value="12">전라북도</option>
										<option value="13" data-real-addr="전남" value="13">전라남도</option>
										<option value="14" data-real-addr="경북" value="14">경상북도</option>
										<option value="15" data-real-addr="경남" value="15">경상남도</option>
										<option value="16" data-real-addr="제주특별자치도" value="16">제주특별자치도</option>
									</select>
									<!-- <input type="text" class="m_s_info" value="" name="" placeholder="직접입력" style="width:40%;" /> -->
									<div id="s_gugun" style="margin-top:10px;"><div class="radio_wrap jquery_checked"></div></div>
								</td>
							</tr>
							<tr>
								<td>
									<div class="title1">몇분이 가셧나요?</div>
									<div class="radio_wrap jquery_checked">
										<div>
											<input type="radio" name="to_person" value="1" id="info_type11" checked />
											<label for="info_type11" class="active"><i></i>1인</label>
										</div>
										<div>
											<input type="radio" name="to_person" value="2" id="info_type12"  />
											<label for="info_type12"><i></i>2인</label>
										</div>
										<div>
											<input type="radio" name="to_person" value="3" id="info_type13"  />
											<label for="info_type13"><i></i>3인</label>
										</div>
										<div>
											<input type="radio" name="to_person" value="4" id="info_type14"  />
											<label for="info_type14"><i></i>4인</label>
										</div>
										<div>
											<input type="radio" name="to_person" value="5" id="info_type15"  />
											<label for="info_type15"><i></i>5인</label>
										</div>
										<div>
											<input type="radio" name="to_person" value="6" id="info_type16"  />
											<label for="info_type16"><i></i>6인</label>
										</div>
										<div>
											<input type="radio" name="to_person" value="7" id="info_type17"  />
											<label for="info_type17"><i></i>7인 이상</label>
										</div>
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<div class="title1">누구와 함께 가셨나요?</div>
									<div class="radio_wrap jquery_checked">
										<div>
											<input type="radio" name="to_gether" value="family" id="info_type21" checked />
											<label for="info_type21" class="active"><i></i>가족</label>
										</div>
										<div>
											<input type="radio" name="to_gether" value="friend" id="info_type22"  />
											<label for="info_type22"><i></i>친구</label>
										</div>
										<div>
											<input type="radio" name="to_gether" value="partner" id="info_type23"  />
											<label for="info_type23"><i></i>연인</label>
										</div>
										<div>
											<input type="radio" name="to_gether" value="fellow" id="info_type24"  />
											<label for="info_type24"><i></i>동료</label>
										</div>
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<div class="title1">어떤 메뉴를 주문하셨나요? </div>
									<input type="text" class="" value="" name="to_menu" placeholder="" style="width:100%;" />
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>


			<div>
				<h3>맛 평가 (Quality)</h3>
				<div class="w_table1_wrap">
					<table>
						<tbody>
							<tr>
								<td>
									<div class="title1">메뉴의 전체적인 모양과 색, 비주얼은 어땠나요? </div>
									(* 메뉴 사진은 영수증과 함께 핸드폰 촬영 후 하단의 첨부파일로 함께 보내주세요)
									<div class="radio_wrap jquery_checked" style="margin-top:10px">
										<div>
											<input type="radio" name="to_menu_depth" value="1" id="info_type31" checked />
											<label for="info_type31"><i></i>너무 좋아요.</label>
										</div>
										<div>
											<input type="radio" name="to_menu_depth" value="2" id="info_type32" />
											<label for="info_type32"><i></i>만족해요.</label>
										</div>
										<div>
											<input type="radio" name="to_menu_depth" value="3" id="info_type33" />
											<label for="info_type33"><i></i>괜찮아요.</label>
										</div>
										<div>
											<input type="radio" name="to_menu_depth" value="4" id="info_type34" />
											<label for="info_type34"><i></i>부족해요.</label>
										</div>
										<div>
											<input type="radio" name="to_menu_depth" value="5" id="info_type35" />
											<label for="info_type35"><i></i>불만 있어요.</label>
										</div>
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<div class="title1">주문 후 메뉴가 나오는 시간이 얼마나 걸렸나요?</div>
									<div class="radio_wrap jquery_checked">
										<div>
											<input type="radio" name="to_menu_time" value="1" id="info_type41" checked />
											<label for="info_type41"><i></i>10분 이내</label>
										</div>
										<div>
											<input type="radio" name="to_menu_time" value="2" id="info_type42" />
											<label for="info_type42"><i></i>약 10~20분</label>
										</div>
										<div>
											<input type="radio" name="to_menu_time" value="3" id="info_type43" />
											<label for="info_type43"><i></i>약 20~30분</label>
										</div>
										<div>
											<input type="radio" name="to_menu_time" value="4" id="info_type44" />
											<label for="info_type44"><i></i>약 30~40분</label>
										</div>
										<div>
											<input type="radio" name="to_menu_time" value="5" id="info_type45" />
											<label for="info_type45"><i></i>약 40분 이상</label>
										</div>
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<div class="title1">초밥의 밥(샤리)은 어땠나요?</div>
									<div class="radio_wrap jquery_checked">
										<div>
											<input type="radio" name="to_menu_rice" value="1" id="info_type51" checked />
											<label for="info_type51"><i></i>너무 좋아요.</label>
										</div>
										<div>
											<input type="radio" name="to_menu_rice" value="2" id="info_type52" />
											<label for="info_type52"><i></i>만족해요.</label>
										</div>
										<div>
											<input type="radio" name="to_menu_rice" value="3" id="info_type53" />
											<label for="info_type53"><i></i>괜찮아요.</label>
										</div>
										<div>
											<input type="radio" name="to_menu_rice" value="4" id="info_type54" />
											<label for="info_type54"><i></i>부족해요.</label>
										</div>
										<div>
											<input type="radio" name="to_menu_rice" value="5" id="info_type55" />
											<label for="info_type55"><i></i>불만 있어요.</label>
										</div>
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<div class="title1">초밥의 생선(네타)은 어땠나요?</div>
									<div class="radio_wrap jquery_checked">
										<div>
											<input type="radio" name="to_menu_fish" value="1" id="info_type61" checked />
											<label for="info_type61"><i></i>너무 좋아요.</label>
										</div>
										<div>
											<input type="radio" name="to_menu_fish" value="2" id="info_type62" />
											<label for="info_type62"><i></i>만족해요.</label>
										</div>
										<div>
											<input type="radio" name="to_menu_fish" value="3" id="info_type63" />
											<label for="info_type63"><i></i>괜찮아요.</label>
										</div>
										<div>
											<input type="radio" name="to_menu_fish" value="4" id="info_type64" />
											<label for="info_type64"><i></i>부족해요.</label>
										</div>
										<div>
											<input type="radio" name="to_menu_fish" value="5" id="info_type65" />
											<label for="info_type65"><i></i>불만 있어요.</label>
										</div>
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<div class="title1">초밥 맛의 만족도를 평가하신다면? (5점 만점)</div>
									<div class="radio_wrap jquery_checked">
										<div>
											<input type="radio" name="to_menu_score" value="1" id="info_type71" checked />
											<label for="info_type71"><i></i>1점</label>
										</div>
										<div>
											<input type="radio" name="to_menu_score" value="2" id="info_type72" />
											<label for="info_type72"><i></i>2점</label>
										</div>
										<div>
											<input type="radio" name="to_menu_score" value="3" id="info_type73" />
											<label for="info_type73"><i></i>3점</label>
										</div>
										<div>
											<input type="radio" name="to_menu_score" value="4" id="info_type74" />
											<label for="info_type74"><i></i>4점</label>
										</div>
										<div>
											<input type="radio" name="to_menu_score" value="5" id="info_type75" />
											<label for="info_type75"><i></i>5점</label>
										</div>
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<div class="title1">전반적인 매장의 초밥 미식평을 작성해주세요. (솔직하게 말씀해주시는 것이 저희에겐 더 좋답니다~)</div>
									<input type="text" class="" value="" name="to_ftalk" placeholder="" style="width:100%;" />
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>


			<div>
				<h3>서비스 평가 (Service)</h3>
				<div class="w_table1_wrap">
					<table>
						<tbody>
							<tr>
								<td>
									<div class="title1">방문 시 직원분들의 인사를 해주셨나요?</div>
									<div class="radio_wrap jquery_checked w1">
										<div>
											<input type="radio" name="to_station_hello" value="1" id="info_type81" checked />
											<label for="info_type81"><i></i>네, 모두 인사를 해주셨습니다.</label>
										</div>
										<div>
											<input type="radio" name="to_station_hello" value="2" id="info_type82" />
											<label for="info_type82"><i></i>아니오, 인사가 없었습니다.</label>
										</div>
										<div>
											<input type="radio" name="to_station_hello" value="3" id="info_type83" />
											<label for="info_type83"><i></i>잘 모르겠습니다.</label>
										</div>
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<div class="title1">자리 안내 시 친절하게 응대했나요? 혹은 에스코트는 없었나요?</div>
									<div class="radio_wrap jquery_checked w1">
										<div>
											<input type="radio" name="to_station_help" value="1" id="info_type91" checked />
											<label for="info_type91"><i></i>에스코트 받으며 친절하게 안내해주셨습니다.</label>
										</div>
										<div>
											<input type="radio" name="to_station_help" value="2" id="info_type92" />
											<label for="info_type92"><i></i>에스코트는 없었지만 친절하게 안내해주셨습니다.</label>
										</div>
										<div>
											<input type="radio" name="to_station_help" value="3" id="info_type93" />
											<label for="info_type93"><i></i>에스코트 없이 알아서 자리를 찾았습니다.</label>
										</div>
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<div class="title1">주문 시 추천 메뉴나 이벤트에 대한 안내가 충분했나요?</div>
									<div class="radio_wrap jquery_checked w1">
										<div>
											<input type="radio" name="to_station_menu" value="1" id="info_type101" checked />
											<label for="info_type101"><i></i>네, 메뉴 추천과 이벤트 안내를 받았습니다.</label>
										</div>
										<div>
											<input type="radio" name="to_station_menu" value="2" id="info_type102" />
											<label for="info_type102"><i></i>메뉴 추천을 받았지만 이벤트 안내는 받지 못했습니다.</label>
										</div>
										<div>
											<input type="radio" name="to_station_menu" value="3" id="info_type103" />
											<label for="info_type103"><i></i>이벤트 안내는 받았지만 메뉴 추천은 받지 못했습니다.</label>
										</div>
										<div>
											<input type="radio" name="to_station_menu" value="4" id="info_type103" />
											<label for="info_type103"><i></i>아니오, 메뉴 추천과 이벤트 안내 모두 받지 못했습니다.</label>
										</div>
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<div class="title1">메뉴가 테이블에 나왔을 때 메뉴에 대한 설명을 해주셨나요?</div>
									<div class="radio_wrap jquery_checked w1">
										<div>
											<input type="radio" name="to_station_exp" value="1" id="info_type111" checked />
											<label for="info_type111"><i></i>네, 먹는 순서와 소스에 대한 설명을 받았습니다.</label>
										</div>
										<div>
											<input type="radio" name="to_station_exp" value="2" id="info_type112" />
											<label for="info_type112"><i></i>아니오, 설명이 없었습니다.</label>
										</div>
										<div>
											<input type="radio" name="to_station_exp" value="3" id="info_type113" />
											<label for="info_type113"><i></i>잘 모르겠습니다.</label>
										</div>
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<div class="title1">전체적으로 서비스를 평가하신다면?  (5점 만점)</div>
									<div class="radio_wrap jquery_checked">
										<div>
											<input type="radio" name="to_station_score" value="1" id="info_type121" checked />
											<label for="info_type121"><i></i>1점</label>
										</div>
										<div>
											<input type="radio" name="to_station_score" value="2" id="info_type122" />
											<label for="info_type122"><i></i>2점</label>
										</div>
										<div>
											<input type="radio" name="to_station_score" value="3" id="info_type123" />
											<label for="info_type123"><i></i>3점</label>
										</div>
										<div>
											<input type="radio" name="to_station_score" value="4" id="info_type124" />
											<label for="info_type124"><i></i>4점</label>
										</div>
										<div>
											<input type="radio" name="to_station_score" value="5" id="info_type125" />
											<label for="info_type125"><i></i>5점</label>
										</div>
									</div>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>

			<div>
				<h3>클린 평가 (Clean)</h3>
				<div class="w_table1_wrap">
					<table>
						<tbody>
							<tr>
								<td>
									<div class="title1">매장 외부가 전반적으로 잘 정돈되어 있었나요?</div>
									<div class="radio_wrap jquery_checked w1">
										<div>
											<input type="radio" name="to_clean_out" value="1" id="info_type131" checked />
											<label for="info_type131"><i></i>네, 잘 정돈 되었습니다.</label>
										</div>
										<div>
											<input type="radio" name="to_clean_out" value="2" id="info_type132" />
											<label for="info_type132"><i></i>아니오, 정돈되지 않아 있었습니다.</label>
										</div>
										<div>
											<input type="radio" name="to_clean_out" value="3" id="info_type133" />
											<label for="info_type133"><i></i>특별한 기억이 없습니다.</label>
										</div>
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<div class="title1">매장 내부가 전반적으로 잘 정리되어 있었나요?</div>
									<div class="radio_wrap jquery_checked w1">
										<div>
											<input type="radio" name="to_clean_in" value="1" id="info_type141" checked />
											<label for="info_type141"><i></i>네, 잘 정돈 되었습니다.</label>
										</div>
										<div>
											<input type="radio" name="to_clean_in" value="2" id="info_type142" />
											<label for="info_type142"><i></i>아니오, 정돈되지 않아 있었습니다.</label>
										</div>
										<div>
											<input type="radio" name="to_clean_in" value="3" id="info_type143" />
											<label for="info_type143"><i></i>특별한 기억이 없습니다.</label>
										</div>
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<div class="title1">매장내 음악 소리는 적절했나요?</div>
									<div class="radio_wrap jquery_checked w1">
										<div>
											<input type="radio" name="to_clean_sound" value="1" id="info_type151" checked />
											<label for="info_type151"><i></i>네, 좋았습니다.</label>
										</div>
										<div>
											<input type="radio" name="to_clean_sound" value="2" id="info_type152" />
											<label for="info_type152"><i></i>아니오, 불편했습니다.</label>
										</div>
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<div class="title1">매장의 온도는 적절했나요?</div>
									<div class="radio_wrap jquery_checked w1">
										<div>
											<input type="radio" name="to_clean_temper" value="1" id="info_type161" checked />
											<label for="info_type161"><i></i>네, 좋았습니다.</label>
										</div>
										<div>
											<input type="radio" name="to_clean_temper" value="2" id="info_type162" />
											<label for="info_type162"><i></i>아니오, 불편했습니다.</label>
										</div>
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<div class="title1">테이블이 깨끗하게 잘 정돈되어 있었나요?</div>
									<div class="radio_wrap jquery_checked w1">
										<div>
											<input type="radio" name="to_clean_table" value="1" id="info_type171" checked />
											<label for="info_type171"><i></i>네, 잘 정리되어 있었습니다.</label>
										</div>
										<div>
											<input type="radio" name="to_clean_table" value="2" id="info_type172" />
											<label for="info_type172"><i></i>아니오, 정돈되어 있지 않았습니다.</label>
										</div>
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<div class="title1">메뉴판이나 홍보물 등이 깨끗하게 되어 있나요?</div>
									<div class="radio_wrap jquery_checked w1">
										<div>
											<input type="radio" name="to_clean_menu" value="1" id="info_type181" checked />
											<label for="info_type181"><i></i>네, 깨끗했습니다.</label>
										</div>
										<div>
											<input type="radio" name="to_clean_menu" value="2" id="info_type182" />
											<label for="info_type182"><i></i>아니오, 지저분했습니다.</label>
										</div>
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<div class="title1">직원분들의 복장이 깨끗했나요?</div>
									<div class="radio_wrap jquery_checked w1">
										<div>
											<input type="radio" name="to_clean_dress" value="1" id="info_type191" checked />
											<label for="info_type191"><i></i>네, 깨끗했습니다.</label>
										</div>
										<div>
											<input type="radio" name="to_clean_dress" value="2" id="info_type192" />
											<label for="info_type192"><i></i>아니오, 지저분했습니다.</label>
										</div>
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<div class="title1">전체적으로 환경/청결도를 평가하신다면?  (5점 만점)</div>
									<div class="radio_wrap jquery_checked">
										<div>
											<input type="radio" name="to_clean_score" value="1" id="info_type201" checked />
											<label for="info_type201"><i></i>1점</label>
										</div>
										<div>
											<input type="radio" name="to_clean_score" value="2" id="info_type202" />
											<label for="info_type202"><i></i>2점</label>
										</div>
										<div>
											<input type="radio" name="to_clean_score" value="3" id="info_type203" />
											<label for="info_type203"><i></i>3점</label>
										</div>
										<div>
											<input type="radio" name="to_clean_score" value="4" id="info_type204" />
											<label for="info_type204"><i></i>4점</label>
										</div>
										<div>
											<input type="radio" name="to_clean_score" value="5" id="info_type205" />
											<label for="info_type205"><i></i>5점</label>
										</div>
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<div class="title1">마지막으로 맛/서비스/클린에 대한 총평을 적어주세요. (50자 이상 부탁드려요~)</div>
									<input type="text" class="" value="" name="to_all_score" placeholder="" style="width:100%;" />
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>


		</div>
		<div class="review_section">
			<h3>첨부파일</h3>
			<div class="w_table1_wrap">
				<table>
					<tbody>
						<tr>
							<th>메뉴사진</th>
							<td>
								<input type="file" class="" value="" name="file1" placeholder="" accept="image/*" style="width:50%;" />
								<p style="padding-top:5px">메뉴 사진을 촬영해 보내주세요.</p>
							</td>
						</tr>
						<tr>
							<th>영수증</th>
							<td>
								<input type="file" class="" value="" name="file2" placeholder="" accept="image/*" style="width:50%;" />
								<p style="padding-top:5px">결제하신 영수증을 우측 예시 파일에 맞춰 보내주세요. </p>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div> 

		<div class="bt_wrap_c">
			<a href="javascript:history.go(-1);" class="bt_s1_gray">취소</a>
			<a href="javascript:void(0);" class="bt_s1_red">전송하기</a>
		</div>
		</form>
	</div>
</div>
<script src="/js/jquery-ui.min.js"></script> 
<script type="text/javascript">
//<![CDATA[
$(function(){
	$('.setdate').datepicker({
		dateFormat: 'yy-mm-dd',
		maxDate : 0
	});

	reviewTabAC1(); //텝액션
	myInfoAc1(); //우리동네 설정

	w_submitAc1(); // 전송하기
});


// STR 전송하기
function w_submitAc1(){
	$('.bt_s1_red').on('click',function(){

		var w_submit = true;

		if(!$('#s_sido').val()){
			alert('방문하신 매장을 알려주세요.');
			$('#review_section_tab_ac1 a').eq(0).addClass('active').siblings().removeClass('active');
			$('#review_section_ac1 > div').eq(0).addClass('active').siblings().removeClass('active');
			$('#s_sido').focus();
			w_submit = false;
			return false;
		}

		$('[type="text"]').each(function (){//input text check val
			if(!$(this).val()){
				var _Tindex = $(this).parents('.w_table1_wrap').parent().index()
				$('#review_section_tab_ac1 a').eq(_Tindex).addClass('active').siblings().removeClass('active');
				$('#review_section_ac1 > div').eq(_Tindex).addClass('active').siblings().removeClass('active');
				alert($(this).siblings('.title1').text());
				$(this).focus();
				w_submit = false;
				return false;
			}
		});

		if(!w_submit){
			return false;
		}

		$('[type="file"]').each(function (){//input text check val
			if(!$(this).val()){
				alert($(this).parents('tr').find('th').text()+' 첨부해주세요');
				$(this).focus();
				w_submit = false;
				return false;
			}
		});
		
		if(w_submit == false){
			return false;
		}else{
			var Frm = document.reviewForm;
			Frm.action = "/lib/write_review.php";
			Frm.submit();
		}
	});
}
// END 전송하기

// STR 텝액션
function reviewTabAC1(){
	$('#review_section_tab_ac1 a').on('click',function (){
		var _This = $(this);
		var n = _This.index();
		$(this).addClass('active').siblings().removeClass('active');
		$('#review_section_ac1 > div').eq(n).addClass('active').siblings().removeClass('active');
	});
}
// END 텝액션

// STR 우리동네 설정
function myInfoAc1(){

	$('.m_s_info').on('keyup',function (){
		$('#s_sido').val('');
		$('#s_gugun .radio_wrap').html('');
	});

	// STR 셀렉박스 체인지
	$('#s_sido').on('change',function (){
		addInfo1($(this).find('option:selected').attr('data-real-addr'));
		$('.m_s_info').val('');
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

			if(t=='all'){
				$('#s_gugun .radio_wrap').html('');
				return false;
			}

			$.each(addArry1,function (i){
				if(addArry1[i].addr.split(' ')[0].indexOf(t) != -1){
					addrSec.push(addArry1[i].info);
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
				var w_checked = '';
				var w_active = '';
				if(addrSecNum==0){
					var w_checked = 'checked';
					var w_active = 'class="active"';
				}
				addrSecHtml += '<div><input type="radio" value="' + j + '" name="addr_sec" id="addr_sec'+addrSecNum+'" '+w_checked+'/><label for="addr_sec'+addrSecNum+'" '+w_active+'><i></i>'+j+'</label></div>';
				addrSecNum++;
			}
			$('#s_gugun .radio_wrap').html(addrSecHtml);


		}).fail(function(){
			//alert('error');
		})
	}
	// END 지점 정보
}
// END 우리동네 설정
//]]>
</script>

<?php include_once "../../_tail.php";?>