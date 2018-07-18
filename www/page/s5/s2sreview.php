<?php include_once "../../_head.php";?>

<div class="wrap_style1">
	<div class="heading_s1">
		<h2 class="tit"><img src="/img/common/review_title1.png" alt="후기 전송하기"></h2>
	</div>
	<div class="review_form">
		<div class="review_section fr">
			<div class="info_wrap2">
				미스테리 쇼퍼에 등록하신 내용은 내부 매장 평가용도로만 사용되며, 그 어떤 개인 정보도 유출되거나 공개되지 않으니 안심하세요.
				<br /><br />
				아래 평가사항에 대해 꼼꼼하게 답변 부탁드리며, 하단의 첨부파일에는 주문하셨던 메뉴 사진과 영수증 사진을 꼭! 함께 첨부해주시기 바랍니다. <br />
				(방문 여부에 대한 사실관계 확인을 위한 용도이며 사실 확인 후 삭제됩니다. 걱정마세요.)
				<br /><br />
				미스테리 쇼퍼는 더 좋은 초밥을 만들기 위해 운영되는 정책으로 보다 나은 서비스와 맛을 위해 아낌없는 충언과 의견을 기다리고 있습니다. 감사합니다.
			</div>
		</div>

		<div class="tab_type1 type1" id="review_section_tab_ac1">
			<a href="javascript:void(0);" class="bt active">기본 입력사항</a>
			<a href="javascript:void(0);" class="bt">맛 평가 (Quality)</a>
			<a href="javascript:void(0);" class="bt">서비스 평가 (Service)</a>
			<a href="javascript:void(0);" class="bt">환경 평가 (Clean)</a>
		</div>


		<div class="review_section" id="review_section_ac1">

			<div class="active">
				<h3>기본 입력사항</h3>
				<div class="w_table1_wrap">
					<table>
						<tbody>
							<tr>
								<td>
									<div class="title1">방문하신 날짜를 알려주세요.</div>
									<input type="text" class="setdate" value="" name="" placeholder="" style="width:40%;" />
								</td>
							</tr>
							<tr>
								<td>
									<div class="title1">방문하신 매장을 알려주세요.</div>
									<select id="s_sido" name="s_sido" style="width:40%;" >
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
									<input type="text" class="m_s_info" value="" name="" placeholder="직접입력" style="width:40%;" />
									<div id="s_gugun" style="margin-top:10px;"><div class="radio_wrap"></div></div>
								</td>
							</tr>
							<tr>
								<td>
									<div class="title1">몇분이 가셧나요?</div>
									<input type="text" class="" value="" name="" placeholder="" style="width:100px;" /> 명
								</td>
							</tr>
							<tr>
								<td>
									<div class="title1">어떤 메뉴를 주문하셨나요?</div>
									<input type="text" class="" value="" name="" placeholder="" style="width:100%;" />
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
									<div class="title1">메뉴가 나왔을 때 비주얼은 어땠나요? 메뉴판 사진과 동일했나요?</div>
									<input type="text" class="" value="" name="" placeholder="" style="width:100%;" />
									(* 메뉴 사진은 하단의 첨부파일로 함께 보내주세요)
								</td>
							</tr>
							<tr>
								<td>
									<div class="title1">주문 후 메뉴가 나오는 시간이 얼마나 걸렸나요?</div>
									<div class="radio_wrap jquery_checked">
										<div>
											<input type="radio" name="type1" value="" id="info_type11" />
											<label for="info_type11"><i></i>10분 이내</label>
										</div>
										<div>
											<input type="radio" name="type1" value="" id="info_type12" />
											<label for="info_type12"><i></i>약 10~20분</label>
										</div>
										<div>
											<input type="radio" name="type1" value="" id="info_type13" />
											<label for="info_type13"><i></i>약 30~40분</label>
										</div>
										<div>
											<input type="radio" name="type1" value="" id="info_type14" />
											<label for="info_type14"><i></i>약 40분 이상</label>
										</div>
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<div class="title1">주문하신 메뉴에서 빠뜨리거나 모자라는 부분이 있었나요?</div>
									<input type="text" class="" value="" name="" placeholder="" style="width:100%;" />
								</td>
							</tr>
							<tr>
								<td>
									<div class="title1">초밥의 밥은 어땠나요?</div>
									<input type="text" class="" value="" name="" placeholder="" style="width:100%;" />
								</td>
							</tr>
							<tr>
								<td>
									<div class="title1">초밥의 네타(생선)는 잘 숙성이 되어 맛이 있었나요?</div>
									<input type="text" class="" value="" name="" placeholder="" style="width:100%;" />
								</td>
							</tr>
							<tr>
								<td>
									<div class="title1">초밥 맛의 만족도를 평가하신다면? (5점 만점)</div>
									<div class="radio_wrap jquery_checked">
										<div>
											<input type="radio" name="type2" value="" id="info_type21" />
											<label for="info_type21"><i></i>1점</label>
										</div>
										<div>
											<input type="radio" name="type2" value="" id="info_type22" />
											<label for="info_type22"><i></i>2점</label>
										</div>
										<div>
											<input type="radio" name="type2" value="" id="info_type23" />
											<label for="info_type23"><i></i>3점</label>
										</div>
										<div>
											<input type="radio" name="type2" value="" id="info_type24" />
											<label for="info_type24"><i></i>4점</label>
										</div>
										<div>
											<input type="radio" name="type2" value="" id="info_type25" />
											<label for="info_type25"><i></i>5점</label>
										</div>
									</div>
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
											<input type="radio" name="type3" value="" id="info_type31" />
											<label for="info_type31"><i></i>네, 모두 인사를 해주셨습니다.</label>
										</div>
										<div>
											<input type="radio" name="type3" value="" id="info_type32" />
											<label for="info_type32"><i></i>아니오, 인사가 없었습니다.</label>
										</div>
										<div>
											<input type="radio" name="type3" value="" id="info_type33" />
											<label for="info_type33"><i></i>잘 모르겠습니다.</label>
										</div>
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<div class="title1">홀 직원 외 다찌의 쉐프 직원분들도 함께 인사를 해주셨나요?</div>
									<div class="radio_wrap jquery_checked w1">
										<div>
											<input type="radio" name="type4" value="" id="info_type41" />
											<label for="info_type41"><i></i>네, 모두 인사를 해주셨습니다.</label>
										</div>
										<div>
											<input type="radio" name="type4" value="" id="info_type42" />
											<label for="info_type42"><i></i>아니오, 인사가 없었습니다.</label>
										</div>
										<div>
											<input type="radio" name="type4" value="" id="info_type43" />
											<label for="info_type43"><i></i>잘 모르겠습니다.</label>
										</div>
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<div class="title1">자리 안내 시 친절하게 응대했나요? 혹은 에스코트는 없었나요?</div>
									<div class="radio_wrap jquery_checked w1">
										<div>
											<input type="radio" name="type5" value="" id="info_type51" />
											<label for="info_type51"><i></i>에스코트 받으며 친절하게 안내해주셨습니다.</label>
										</div>
										<div>
											<input type="radio" name="type5" value="" id="info_type52" />
											<label for="info_type52"><i></i>에스코트는 없었지만 친절하게 안내해주셨습니다.</label>
										</div>
										<div>
											<input type="radio" name="type5" value="" id="info_type53" />
											<label for="info_type53"><i></i>에스코트 없이 알아서 자리를 찾았습니다.</label>
										</div>
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<div class="title1">직원분들이 미소를 지으며 친철하게 안내해주셨나요?</div>
									<input type="text" class="" value="" name="" placeholder="" style="width:100%;" />
								</td>
							</tr>
							<tr>
								<td>
									<div class="title1">주문 시 추천 메뉴나 이벤트에 대한 안내가 충분했나요?</div>
									<input type="text" class="" value="" name="" placeholder="" style="width:100%;" />
								</td>
							</tr>
							<tr>
								<td>
									<div class="title1">메뉴가 테이블에 나왔을 때 메뉴에 대한 설명을 해주셨나요?</div>
									<input type="text" class="" value="" name="" placeholder="" style="width:100%;" />
								</td>
							</tr>
							<tr>
								<td>
									<div class="title1">혹시 요청하신 사항(ex:앞접시를 주세요, 젓가락 바꿔주세요 등)이 있으셨다면 바로 응대했나요? </div>
									<input type="text" class="" value="" name="" placeholder="" style="width:100%;" />
								</td>
							</tr>
							<tr>
								<td>
									<div class="title1">결제 시 여러 프로모션에 대해 안내를 받으셨나요? </div>
									<input type="text" class="" value="" name="c8c8" placeholder="" style="width:100%;" />
								</td>
							</tr>
							<tr>
								<td>
									<div class="title1">전체적으로 서비스를 평가하신다면? (5점 만점)</div>
									<div class="radio_wrap jquery_checked">
										<div>
											<input type="radio" name="type6" value="" id="info_type61" />
											<label for="info_type61"><i></i>1점</label>
										</div>
										<div>
											<input type="radio" name="type6" value="" id="info_type62" />
											<label for="info_type62"><i></i>2점</label>
										</div>
										<div>
											<input type="radio" name="type6" value="" id="info_type63" />
											<label for="info_type63"><i></i>3점</label>
										</div>
										<div>
											<input type="radio" name="type6" value="" id="info_type64" />
											<label for="info_type64"><i></i>4점</label>
										</div>
										<div>
											<input type="radio" name="type6" value="" id="info_type65" />
											<label for="info_type65"><i></i>5점</label>
										</div>
									</div>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>

			<div>
				<h3>환경 평가 (Clean)</h3>
				<div class="w_table1_wrap">
					<table>
						<tbody>
							<tr>
								<td>
									<div class="title1">매장 외부가 지저분하거나 잘 정돈되지 않은 점이 있었나요?</div>
									<input type="text" class="" value="" name="" placeholder="" style="width:100%;" />
								</td>
							</tr>
							<tr>
								<td>
									<div class="title1">매장 내부가 전반적으로 잘 정리되어 있었나요?</div>
									<input type="text" class="" value="" name="" placeholder="" style="width:100%;" />
								</td>
							</tr>
							<tr>
								<td>
									<div class="title1">음악 소리, 매장의 온도는 적절했나요?</div>
									<input type="text" class="" value="" name="" placeholder="" style="width:100%;" />
								</td>
							</tr>
							<tr>
								<td>
									<div class="title1">테이블이 깨끗하게 잘 정돈되어 있었나요?</div>
									<input type="text" class="" value="" name="" placeholder="" style="width:100%;" />
								</td>
							</tr>
							<tr>
								<td>
									<div class="title1">메뉴판이나 홍보물 등이 깨끗하게 되어 있나요? </div>
									<input type="text" class="" value="" name="" placeholder="" style="width:100%;" />
								</td>
							</tr>
							<tr>
								<td>
									<div class="title1">직원분들의 복장이 깨끗했나요?</div>
									<input type="text" class="" value="" name="" placeholder="" style="width:100%;" />
								</td>
							</tr>
							<tr>
								<td>
									<div class="title1">전체적으로 환경/청결도를 평가하신다면? (5점 만점)</div>
									<div class="radio_wrap jquery_checked">
										<div>
											<input type="radio" name="type7" value="" id="info_type71" />
											<label for="info_type71"><i></i>1점</label>
										</div>
										<div>
											<input type="radio" name="type7" value="" id="info_type72" />
											<label for="info_type72"><i></i>2점</label>
										</div>
										<div>
											<input type="radio" name="type7" value="" id="info_type73" />
											<label for="info_type73"><i></i>3점</label>
										</div>
										<div>
											<input type="radio" name="type7" value="" id="info_type74" />
											<label for="info_type74"><i></i>4점</label>
										</div>
										<div>
											<input type="radio" name="type7" value="" id="info_type75" />
											<label for="info_type75"><i></i>5점</label>
										</div>
									</div>
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
							<td><input type="file" class="" value="" name="" placeholder="" style="width:50%;" /></td>
						</tr>
						<tr>
							<th>영수증</th>
							<td><input type="file" class="" value="" name="" placeholder="" style="width:50%;" /></td>
						</tr>
						<!-- <tr>
							<td class="td_op">
								<div class="checkbox_wrap">
									<div>
										<input type="checkbox" name="type130" value="" id="info_type131"/>
										<label for="info_type131"><i></i>옵션1</label>
									</div>
									<div>
										<input type="checkbox" name="type130" value="" id="info_type132"/>
										<label for="info_type132"><i></i>옵션2</label>
									</div>
									<div>
										<input type="checkbox" name="type130" value="" id="info_type133"/>
										<label for="info_type133"><i></i>옵션3</label>
									</div>
									<div>
										<input type="checkbox" name="type130" value="" id="info_type134"/>
										<label for="info_type134"><i></i>옵션4</label>
									</div>
									<div>
										<input type="checkbox" name="type130" value="" id="info_type135"/>
										<label for="info_type135"><i></i>옵션5</label>
									</div>
								</div>
							</td>
						</tr>-->
					</tbody>
				</table>
			</div>
		</div> 

		<div class="bt_wrap_c">
			<a href="javascript:history.go(-1);" class="bt_s1_gray">취소</a>
			<a href="javascript:void(0);" class="bt_s1_red">전송하기</a>
		</div>
	</div>
</div>
<script src="/js/jquery-ui.min.js"></script> 
<script type="text/javascript">
//<![CDATA[
$(function(){

	$('.bt_s1_red').on('click',function(){
		$('[type="text"]').each(function (){//input text check val
			if(!$(this).val()){
				var _Tindex = $(this).parents('.w_table1_wrap').parent().index()
				$('#review_section_tab_ac1 a').eq(_Tindex).addClass('active').siblings().removeClass('active');
				$('#review_section_ac1 > div').eq(_Tindex).addClass('active').siblings().removeClass('active');
				alert($(this).siblings('.title1').text());
				$(this).focus();
				return false;
			}
		});
	});


	$('.setdate').datepicker({
		dateFormat: 'yy-mm-dd'
	});

	reviewTabAC1(); //텝액션
	myInfoAc1(); //우리동네 설정
});


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
				addrSecHtml += '<div><input type="radio" value="' + j + '" name="addr_sec" id="addr_sec'+addrSecNum+'"/><label for="addr_sec'+addrSecNum+'"><i></i>'+j+'</label></div>';
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