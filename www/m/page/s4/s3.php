<?php include_once "../../_head.php";?>

<div class="wrap_conts">
	<div class="hd_s_img">
		<h2><img src="/m/img/s4/s4s4_tit.png" alt=""></h2>
	</div>
	<div class="map_search_wrap">
		<div class="data_form">
			<ul class="radio_box jquery_checked" style="display:none;">
				<li><input type="radio" class="" value="" name="s_info_type" id="s_info_type_check1" checked /><label for="s_info_type_check1">전체매장</label></li>
				<li><input type="radio" class="" value="1" name="s_info_type" id="s_info_type_check2"/><label for="s_info_type_check2">다이닝</label></li>
				<li><input type="radio" class="" value="2" name="s_info_type" id="s_info_type_check3"/><label for="s_info_type_check3">컴팩트</label></li>
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
		<div class="wrap_dmap">
			<div id="dmap"></div>
			<button type="button" class="bt_my_location">내위치 찾기</button>
		</div>
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
	<!-- <div class="paging"> -->
		<!-- <a href="javascript:void(0);" class="bt_prev bt_off">이전목록</a> -->
		<!-- <span>1-10 / 102</span> -->
		<!-- <a href="javascript:void(0);" class="bt_next">다음목록</a> -->
	<!-- </div> -->
	<div class="new_map_info">
		<h2><img src="/m/img/s3/new_info_title.png" alt="스시노백쉐프 신규매장안내"></h2>
		<div class="info_slide">
			<ul class="roll">
				<?php
					include_once $_SERVER['DOCUMENT_ROOT']."/lib/dbconn.php";
					$query = "SELECT * FROM sb_store where sbs_new = 2 order by sbs_no desc";
					$result = $conn->query($query);
					$total_rows = mysqli_num_rows($result);
					while($row = $result->fetch_assoc()){
				?>
				<li>
					<div>
						<div class="info_name"><?php echo $row['sbs_name'];?></div>
						<div class="paddress1"><?php echo $row['sbs_address'];?></div>
						<div class="info_call"><a href="tel:<?php echo $row['sbs_tel'];?>"><?php echo $row['sbs_tel'];?></a></div>
						<div class="info_type bg<?php echo $row['sbs_type'];?>"></div>
						<button type="button" class="go_map">지도보기</button>
					</div>
				</li>
				<?php }?>
			</ul>
		</div>
	</div>
</div>



<script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=26ac7c74ffac25e41666b23f861bc240&libraries=services"></script>
<script type="text/javascript">
//<![CDATA[
dmapAc1();
function dmapAc1(){

	var mapContainer = document.getElementById('dmap'), // 지도를 표시할 div 
	mapOption = {
		center: new daum.maps.LatLng(37.566826005485716, 126.9786567859313), // 지도의 중심좌표
		level: 8 // 지도의 확대 레벨
	};

	// 일반 지도와 스카이뷰로 지도 타입을 전환할 수 있는 지도타입 컨트롤을 생성합니다
	var mapTypeControl = new daum.maps.MapTypeControl();

	// 지도 확대 축소를 제어할 수 있는  줌 컨트롤을 생성합니다
	var zoomControl = new daum.maps.ZoomControl();


	// 주소-좌표 변환 객체를 생성합니다
	var geocoder = new daum.maps.services.Geocoder();
	var geocoder2 = new daum.maps.services.Geocoder();

	// STR 검색버튼
	$('.submit').on('click',function(){
		var s_sido = $('#s_sido option:selected').attr('data-real-addr');
		var s_gugun = $('#s_gugun').val();
		var s_addr = s_sido+' '+s_gugun;
		var s_info_name = $('#s_info_name').val();
		//var s_info_type = $('#s_info_type').val();
		var s_info_type = $('[name="s_info_type"]:checked').val();

		$.ajax({
			type: 'GET',
			url: '/inc/p_map_data.php',
			dataType: 'json',
			data: ''
		}).done(function(addArry1) {
			var addPinCheck1 = false;
			var addPinCheck2 = false;
			var addPinCheck3 = false;

			if(s_addr == 'all ' && !s_info_type && !s_info_name){addPinCheck1 = true;}
			//if(!s_info_type){addPinCheck2 = true;}
			//if(!s_info_name){addPinCheck3 = true;}
			
			$.each(addArry1,function (i){
				if(s_addr != 'all '){
					if(s_info_type){
						if(s_info_name){
							if(addArry1[i].addr.indexOf(s_addr) != -1 && s_info_type == addArry1[i].type && addArry1[i].info.indexOf(s_info_name) != -1){
								addPinCheck1 = true;
							}
						} else {
							if(addArry1[i].addr.indexOf(s_addr) != -1 && s_info_type == addArry1[i].type){
								addPinCheck1 = true;
							}
						}
					} else {
						if(s_info_name){
							if(addArry1[i].addr.indexOf(s_addr) != -1 && addArry1[i].info.indexOf(s_info_name) != -1){
								addPinCheck1 = true;
							}
						} else {
							if(addArry1[i].addr.indexOf(s_addr) != -1){
								addPinCheck1 = true;
							}
						}
					}
				} else {
					if(s_info_type){
						if(s_info_name){
							if(s_info_type == addArry1[i].type && addArry1[i].info.indexOf(s_info_name) != -1){
								addPinCheck1 = true;
							}
						} else {
							if(s_info_type == addArry1[i].type){
								addPinCheck1 = true;
							}
						}
					} else {
						if(s_info_name){
							if(addArry1[i].info.indexOf(s_info_name) != -1){
								addPinCheck1 = true;
							}
						}
					}
				}
			});


			if(!addPinCheck1){
				alert('해당 매장정보를 찾을 수 없습니다.\n다른 지역, 매장종류, 매장명을 검색해주세요.');
				return false;
			}
			
			addPin();

		}).fail(function(){
			//alert('error');
		})
	});
	// END 검색버튼

	// STR 신규매장 클릭
	$('.new_map_info .go_map').on('click',function(){
		var $This = $(this);
		var $ThisPar = $This.parent();
		var n_info_name = $ThisPar.find('.info_name').text();
		var n_info_type = $ThisPar.find('.info_type').text();
		var n_addr = $ThisPar.find('.paddress1').text();
		addPin(n_info_name,n_info_type,n_addr);
		
		var tTop = $('#dmap').offset().top;
		$('html, body').animate( { scrollTop : tTop-50 }, 400);
		$('#s_info_type_check1').prop('checked', true);
		$('#s_sido').val('');
		selectBoxApp1('');
	});
	// END 신규매장 클릭

	addPin();
	// STR 좌표 및 리스트 출력
	function addPin(sin,sit,sa){
		//var s_sido_val = $('#s_sido option:selected').val();
		var s_sido = $('#s_sido option:selected').attr('data-real-addr');
		var s_gugun = $('#s_gugun').val();
		var s_info_name = $('#s_info_name').val();
		//var s_info_type = $('#s_info_type').val();
		var s_info_type = $('[name="s_info_type"]:checked').val();
		var s_addr = s_sido+' '+s_gugun;
		if(sin){
			s_info_name = sin;
			s_info_type = sit;
			s_addr = sa;
		}

		$('#dmap').html('');
		$('.list_box').html('');
		var map = new daum.maps.Map(mapContainer, mapOption);
		map.addControl(mapTypeControl, daum.maps.ControlPosition.TOPRIGHT);
		map.addControl(zoomControl, daum.maps.ControlPosition.RIGHT);

		var infowindowdNum = new Array();
		var infowindow = new Array();
		var listMapClickNum = new Array();
		// 마커를 표시할 위치와 title 객체 배열입니다

		$.ajax({
			type: 'GET',
			url: '/inc/p_map_data.php?type=delivery',
			dataType: 'json',
			data: ''
		}).done(function(addArry1) {

			$.each(addArry1,function (i){
				if(s_info_type){
					if(s_info_type == addArry1[i].type){
						inFotype();
					}
				} else {
					inFotype();
				}

				function inFotype(){
					if(!s_info_name){
						if(s_sido == 'all'){
							addMapPin();
						} else {
							if(addArry1[i].addr.indexOf(s_addr) != -1){
								addMapPin();
							}
						}
					} else {
						if(s_sido == 'all'){
							if(addArry1[i].info.indexOf(s_info_name) != -1){
								addMapPin();
							}
						} else {
							if(addArry1[i].info.indexOf(s_info_name) != -1 && addArry1[i].addr.indexOf(s_addr) != -1){
								addMapPin();
							}
						}
					}
				}
				function addMapPin(){

					var modify_bt = '';
					<?php if($_SESSION['sba_id']){?>
					modify_bt = '<a href="s1swrite.php?mode=u&idx='+addArry1[i].id+'" class="pin_modify">수정하기</a>';
					<?php }?>

					

					var wOpp = '';
					if(addArry1[i].op_p!=''){
						wOpp = '<li>' +
							'<div>주차정보</div>' +
							'<div>' + addArry1[i].op_p + '</div>' +
						'</li>';
					}
					var wOpq1 = '';
					if(addArry1[i].op_q1!=''){
						wOpq1 = '<li>' +
							'<div>배달지역</div>' +
							'<div>' + addArry1[i].op_q1 + '</div>' +
						'</li>';
					}
					var wOpq2 = '';
					if(addArry1[i].op_q2!=''){
						wOpq2 = '<li>' +
							'<div>배달조건</div>' +
							'<div>' + addArry1[i].op_q2 + '</div>' +
						'</li>';
					}


					var wOption = '';
					if(addArry1[i].option!=''){
						var wOptionTotal = addArry1[i].option.split('||');
							wOption = '<li>';
								wOption += '<div>서비스</div>';
								wOption += '<div class="info_icon">';

								if($.inArray('q', wOptionTotal) != -1){
									wOption += '<div class="q"><i>배달</i></div>'
								}  if($.inArray('p', wOptionTotal) != -1){
									wOption += '<div class="p"><i>주차</i></div>'
								}  if($.inArray('r', wOptionTotal) != -1){
									wOption += '<div class="r"><i>room</i></div>'
								}  if($.inArray('gc', wOptionTotal) != -1){
									wOption += '<div class="gc"><i>전자상품권</i></div>'
								}  if($.inArray('c', wOptionTotal) != -1){
									wOption += '<div class="c"><i>예약</i></div>'
								}  if($.inArray('k', wOptionTotal) != -1){
									wOption += '<div class="k"><i>카카오톡</i></div>'
								}

								wOption += '</div>';
							wOption += '</li>';
					}

					var list_html = '<div>'+
											'<div class="info_name">'+addArry1[i].info+'</div>'+
											'<div class="paddress1">'+addArry1[i].addr+'</div>'+
											'<div class="info_type bg'+addArry1[i].type+'"><i>'+addArry1[i].type+'</i></div>'+
											'<section>'+
											'<div class="map_pin_info">'+
												'<ul>'+
													'<li>'+
														'<div>주소</div>'+
														'<div>' + addArry1[i].addr + '</div>'+
													'</li>'+
													'<li>'+
														'<div>전화번호</div>'+
														'<div>' + addArry1[i].call + '</div>'+
													'</li>'+
													wOption +
													wOpq1 +
													wOpq2 +
													wOpp +
												'</ul>'+
											'</div>'+
										'</section>'+
											modify_bt +
										'</div>';
					$('.list_box').append(list_html);
					
					// 주소로 좌표를 검색합니다
					geocoder.addressSearch(addArry1[i].addr, function(result, status) {
						if(addArry1[i].addr == '서울 성동구 왕십리로 410 (하왕십리동, 센트라스)'){
							result[0].y = 37.5648307;
							result[0].x = 127.0296323;
						}
						// 마커 이미지의 이미지 주소입니다
						var imageSrc = '/img/map/mappin'+addArry1[i].type+'.png';
						var imageSize = new daum.maps.Size(29, 45);
						var markerImage = new daum.maps.MarkerImage(imageSrc, imageSize);
						
						// 정상적으로 검색이 완료됐으면 
						if (status === daum.maps.services.Status.OK) {
							var coords = new daum.maps.LatLng(result[0].y, result[0].x);
							var marker = new daum.maps.Marker({
								map: map, // 마커를 표시할 지도
								position: coords, // 마커를 표시할 위치
								image : markerImage // 마커 이미지
							});

							var uniq_more = '';
							if(addArry1[i].type==3){
								//uniq_more = '<a href="' + addArry1[i].link + '" target="_blank" title="새창으로 열립니다." class="pin_link2">네이버플레이스</a>' +
													//'<a href="' + addArry1[i].link2 + '" class="pin_link1">자세히보기</a>';
								uniq_more = '<a href="' + addArry1[i].link + '" target="_blank" title="새창으로 열립니다." class="go_naver">네이버플레이스</a>' +
														'<a href="' + addArry1[i].link2 + '" class="go_more">자세히보기</a>';
							} else {
								//uniq_more = '<a href="' + addArry1[i].link + '" target="_blank" title="새창으로 열립니다." class="pin_link2">네이버플레이스</a>';
								uniq_more = '<a href="' + addArry1[i].link + '" target="_blank" title="새창으로 열립니다." class="go_naver">네이버플레이스</a>';
							}

							//infowindow[i] = new daum.maps.CustomOverlay({
								//position: coords,
								//xAnchor: 1,
								//yAnchor: 1,
								//content: '<div class="map_pin_info">' +
												//'<div class="pin_info">' + addArry1[i].info + '</div>' +
												//'<div class="pin_addr">' + addArry1[i].addr + '</div>' +
												//'<div class="pin_call">' + addArry1[i].call + '</div>' +
												//uniq_more +
											//'</div>'
							//});
							

							/* STR 주소창 띄우기 */
								infowindow[i] = new daum.maps.CustomOverlay({
									position: coords,
									xAnchor: 1,
									yAnchor: 1,
									content: '<div class="map_pin_info">' +
													'<div class="title">' +
														'<h2>'+addArry1[i].info+'</h2>' +
														'<div class="bt_wrap">' + uniq_more +'</div>' +
													'</div>' +
													'<ul>' +
														'<li>' +
															'<div>주소</div>' +
															'<div>' + addArry1[i].addr + '</div>' +
														'</li>' +
														'<li>' +
															'<div>전화번호</div>' +
															'<div>' + addArry1[i].call + '</div>' +
														'</li>' +
														wOption +
														wOpp +
													'</ul>' +
												'</div>'
								});
							/* STR 주소창 내리기 */

							$.each($('.list_box > div'),function (){
								if($(this).find('.paddress1').text() == addArry1[i].addr){
									$(this).attr('data-pin-index',i);
								}
							});
							$('.map_search_wrap > .left_box .title span').html($('.list_box > div').length);

							infowindowdNum[i] = 0;
							listMapClickNum[i] = marker;
							(function(marker, infowindow) {
								daum.maps.event.addListener(marker,'click', function() {
									infowindowdNum[i]++;
									if(infowindowdNum[i] > 2){
										infowindowdNum[i] = 1;
									}
									if(infowindowdNum[i] == 2){
										infowindow[i].setMap(null);
									} else {

										$.each(infowindow,function (i,d){
											if(d !== undefined) {
												infowindow[i].setMap(null);
												infowindowdNum[i] = 2;
											}
										});

										infowindowdNum[i] = 1;
										infowindow[i].setMap(map);
										mapSenter(addArry1[i].addr);
									}
								});

								if(sin){infowindow[i].setMap(map);}

							})(marker, infowindow);
						}
					});
				}
			});

			$('.list_box > div').on('click',function (){
				var $This = $(this);
				var tPin = $This.attr('data-pin-index');
				var tAddr = $This.find('.paddress1').text();

				$This.addClass('active').siblings().removeClass('active');

				$.each(infowindow,function (i,d){
					if(d !== undefined) {
						infowindow[i].setMap(null);
						infowindowdNum[i] = 2;
					}
				});

				infowindowdNum[tPin] = 1;
				mapSenter(tAddr);
				infowindow[tPin].setMap(map);
			});


			var tarPoint = $('.list_box > div').eq(0).find('.paddress1').text();
			if(!tarPoint){
				tarPoint = s_addr;
			}
			mapSenter(tarPoint,8);
			function mapSenter(mAdd1, mZoom1){
				geocoder2.addressSearch(mAdd1, function(w_result, w_status) {
					if(mAdd1 == '서울 성동구 왕십리로 410 (하왕십리동, 센트라스)'){
						w_result[0].y = 37.5648307;
						w_result[0].x = 127.0296323;
					}
					// 정상적으로 검색이 완료됐으면 
					if (w_status === daum.maps.services.Status.OK) {
						var coords = new daum.maps.LatLng(w_result[0].y, w_result[0].x);
						// 지도의 중심을 결과값으로 받은 위치로 이동시킵니다
						map.setCenter(coords);
						if(mZoom1){
							map.setLevel(mZoom1);
						}
					} else {
						map.setCenter(coords);
					}
				});
			}
		}).fail(function(){
			//alert('error');
		})
	}
	// END 좌표 및 리스트 출력

	// STR 셀렉박스 체인지
	$('#s_sido').on('change',function (){
		selectBoxApp1($(this).val());
	});
	// END 셀렉박스 체인지

	// STR 셀렉박스 체크
	function selectBoxApp1(add1, add2){
		var tVal = add1;
		$.ajax({
			type: 'GET',
			url: '/js/p_map.json',
			dataType: 'json',
			data: ''
		}).done(function(data) {
			var opHtml = '<option value="">시/군/구 선택</option>';
			if(tVal != '7' && tVal != ''){
				$.each(data[tVal].gugun,function(i,k){
					opHtml += '<option value="'+k+'">'+k+'</option>';
				});
			}
			$('#s_gugun').html(opHtml);
		}).fail(function(){
			//alert('error');
		}).always(function() {
			//alert('어쩌라구');
		});
	}
	// END 셀렉박스 체크
}
//]]>
</script>


<?php include_once "../../_tail.php";?>





<?php include_once "../../_tail.php";?>