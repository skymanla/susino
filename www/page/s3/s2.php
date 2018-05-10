<?php include_once "../../_head.php";?>

<div class="s3_wrap1 s3s2">
	<div class="section_top">
		<div class="bt_wrap">
			<div class="s1"><a href="#box1"><i>다이닝 시리즈</i></a></div>
			<div class="s2"><a href="#box2"><i>다이닝 메뉴</i></a></div>
			<div class="s3"><a href="#box3"><i>매장 찾기</i></a></div>
		</div>
	</div>
	<div class="section1" id="box1">
		<div class="bt_wrap">
			<div class="s1 active"><a href="javascript:void(0);"><i>다이닝시리즈1</i></a></div>
			<div class="s2"><a href="javascript:void(0);"><i>다이닝시리즈3</i></a></div>
			<div class="s3"><a href="javascript:void(0);"><i>다이닝시리즈5</i></a></div>
			<div class="s4"><a href="javascript:void(0);"><i>다이닝시리즈7</i></a></div>
		</div>
		<div class="slider_wrap">
			<div class="series1 active">
				<ul class="roll">
					<li><img src="/img/s3/s3s2_s_img11.jpg" alt="" /></li>
					<li><img src="/img/s3/s3s2_s_img12.jpg" alt="" /></li>
				</ul>
			</div>
			<div class="series2">
				<ul class="roll">
					<li><img src="/img/s3/s3s2_s_img21.jpg" alt="" /></li>
					<li><img src="/img/s3/s3s2_s_img22.jpg" alt="" /></li>
				</ul>
			</div>
			<div class="series3">
				<ul class="roll">
					<li><img src="/img/s3/s3s2_s_img31.jpg" alt="" /></li>
					<li><img src="/img/s3/s3s2_s_img32.jpg" alt="" /></li>
				</ul>
			</div>
			<div class="series4">
				<ul class="roll">
					<li><img src="/img/s3/s3s2_s_img41.jpg" alt="" /></li>
					<li><img src="/img/s3/s3s2_s_img42.jpg" alt="" /></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="section2" id="box2">
		<div class="bt_wrap">
			<div class="bt1">
				<div style="background-image:url('/img/s3/s3s2_image1.jpg');" onclick="location.href='/page/s2/s1.php'">
					<p class="title"><img src="/img/s3/s3s2_box_s_title1.png" alt="다함께 세트"></p>
					<p class="copy"><img src="/img/s3/s3s2_box_s_copy1.png" alt="다함께 세트"></p>
					<a href="/page/s2/s1.php">자세히 보기</a>
				</div>
			</div>
			<div class="bt2">
				<div style="background-image:url('/img/s3/s3s2_image2.jpg');" onclick="location.href='/page/s2/s3.php'">
					<p class="title"><img src="/img/s3/s3s2_box_s_title6.png" alt="점심엔 런치"></p>
					<p class="copy"><img src="/img/s3/s3s2_box_s_copy6.png" alt="점심엔 런치"></p>
					<a href="/page/s2/s3.php">자세히 보기</a>
				</div>
			</div>
			<div class="bt3">
				<div style="background-image:url('/img/s3/s3s2_image3.jpg');" onclick="location.href='/page/s2/s6.php'">
					<p class="title"><img src="/img/s3/s3s2_box_s_title2.png" alt="사시미 탕"></p>
					<p class="copy"><img src="/img/s3/s3s2_box_s_copy2.png" alt="사시미 탕"></p>
					<a href="/page/s2/s6.php">자세히 보기</a>
				</div>
			</div>
			<div class="bt4">
				<div style="background-image:url('/img/s3/s3s2_image4.jpg');" onclick="location.href='/page/s2/s5.php'">
					<p class="title"><img src="/img/s3/s3s2_box_s_title3.png" alt="곁들임"></p>
					<p class="copy"><img src="/img/s3/s3s2_box_s_copy3.png" alt="곁들임"></p>
					<a href="/page/s2/s5.php">자세히 보기</a>
				</div>
			</div>
			<div class="bt5">
				<div style="background-image:url('/img/s3/s3s2_image5.jpg');" onclick="location.href='/page/s2/s2.php'">
					<p class="title"><img src="/img/s3/s3s2_box_s_title5.png" alt="혼자서 싱글"></p>
					<p class="copy"><img src="/img/s3/s3s2_box_s_copy5.png" alt="혼자서 싱글"></p>
					<a href="/page/s2/s2.php">자세히 보기</a>
				</div>
			</div>
		</div>
	</div>
	<div class="section3" id="box3">
		<div class="map_search_wrap">
			<div class="left_box">
				<div class="title">매장검색(<span></span>)</div>
				<div class="data_form">
					<div class="radio_box" style="display:none">
						<div class="all"><input type="radio" class="" value="" name="s_info_type" id="s_info_type_check1"  /><label for="s_info_type_check1">전체매장</label></div>
						<div><input type="radio" class="" value="1" name="s_info_type" id="s_info_type_check2" checked /><label for="s_info_type_check2">다이닝</label></div>
						<div><input type="radio" class="" value="2" name="s_info_type" id="s_info_type_check3" /><label for="s_info_type_check3">컴팩트</label></div>
						<div><input type="radio" class="" value="3" name="s_info_type" id="s_info_type_check4" /><label for="s_info_type_check4">강남★스타</label></div>
					</div>
					<div class="select_box">
						<div>
							<select id="s_sido">
								<option value="" data-real-addr="all">시/도</option>
								<option value="0" data-real-addr="서울">서울특별시</option>
								<option value="1" data-real-addr="부산">부산광역시</option>
								<option value="2" data-real-addr="대구">대구광역시</option>
								<option value="3" data-real-addr="인천">인천광역시</option>
								<option value="4" data-real-addr="광주광역시">광주광역시</option>
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
								<option value="" selected="selected">시/군/구선택</option>
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
				<div class="list_wrap">
					<div class="list_box"></div>
				</div>
			</div>
			<div class="right_box">
				<div id="dmap"></div>
			</div>
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
			url: '/inc/p_map_data.php',
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

					var list_html = '<div>'+
											'<div class="info_name">'+addArry1[i].info+'</div>'+
											'<div class="paddress1">'+addArry1[i].addr+'</div>'+
											'<div class="info_call">'+addArry1[i].call+'</div>'+
											'<div class="info_type bg'+addArry1[i].type+'"><i>'+addArry1[i].type+'</i></div>'+
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
								uniq_more = '<a href="' + addArry1[i].link + '" target="_blank" title="새창으로 열립니다." class="pin_link2">네이버플레이스</a>' +
													'<a href="' + addArry1[i].link2 + '" class="pin_link1">자세히보기</a>';
							} else {
								uniq_more = '<a href="' + addArry1[i].link + '" target="_blank" title="새창으로 열립니다." class="pin_link2">네이버플레이스</a>';
							}

							infowindow[i] = new daum.maps.CustomOverlay({
								position: coords,
								xAnchor: 1,
								yAnchor: 1,
								content: '<div class="map_pin_info">' +
												'<div class="pin_info">' + addArry1[i].info + '</div>' +
												'<div class="pin_addr">' + addArry1[i].addr + '</div>' +
												'<div class="pin_call">' + addArry1[i].call + '</div>' +
												uniq_more +
											'</div>'
							});

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