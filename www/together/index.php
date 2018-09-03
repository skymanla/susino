<?php
$mobileKeyWords = array ('iPhone', 'iPod', 'BlackBerry', 'Android', 'Windows CE', 'Windows CE;', 'LG', 'MOT', 'SAMSUNG', 'SonyEricsson', 'Mobile', 'Symbian', 'Opera Mobi', 'Opera Mini', 'IEmobile');

for($i = 0 ; $i < count($mobileKeyWords) ; $i++) {
	if(strpos($_SERVER['HTTP_USER_AGENT'],$mobileKeyWords[$i]) == true){
		$is_mobile = true;
		//header("Location: /together/m_index.php");
	}
}
?>
<!DOCTYPE html >
<html lang="ko">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=2.0,user-scalable=yes" />
	<title>스시노백쉐프 창업상담</title>
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/layout.css" />
	 <!--[if lt IE 9]>
		<script type="text/javascript" src="js/html5shiv.min.js"></script>
		<script type="text/javascript" src="js/respond.min.js"></script>
	<![endif]-->
	<script type="text/javascript" src="js/jquery-1.12.4.min.js"></script>
</head>
<body>
	<div id="wrap">
		<ul class="top_tab">
			<li class="active fr"><a href="/together">스시노백쉐프 <b>창업상담</b></a></li>
			<li class="sec"><a href="/ownerchef">스시노백쉐프 <b>오너쉐프제도</b></a></li>
		</ul>

		<div id="quick" class="active">
			<div class="resize_bt_wrap">
				<button type="button" class="open_bt"><i>퀵메뉴 열기</i></button>
				<button type="button" class="go_bot"><i>창업상담 온라인문의 하단으로 이동</i></button>
			</div>
			<img src="img/main/quick_000.png" alt="">
			<button type="button" class="bt_gobtm">창업상담 온라인문의 하단으로 이동</button>
			<ul>
				<li class="active"><a href="#box1">No.1 스시노백쉐프는<br />깐깐합니다</a></li>
				<li><a href="#box2">초밥 프랜차이즈 그룹<br />No.1이 되기까지</a></li>
				<li><a href="#box3">No.1 스시노백쉐프는<br />다릅니다</a></li>
				<li><a href="#box4">No.1 스시노백쉐프는<br />다양합니다_Compact</a></li>
				<li><a href="#box5">No.1 스시노백쉐프는<br />다양합니다_Dinning</a></li>
				<li><a href="#box6">No.1 스시노백쉐프는<br />어울려 성장합니다</a></li>
				<li><a href="#box7">SNS 스토리</a></li>
				<li><a href="#box8">스시노백쉐프<br />어울림 백서</a></li>
				<li><a href="#box9">창업상담</a></li>
			</ul>
		</div>

		<div id="contents">
			<div id="box1">
				<img src="img/main/box_10.jpg" alt="" />
				<div class="in_box">
					<img src="img/main/box_11.png" alt="" />
				</div>
			</div>
			<div id="box2">
				<div class="img_wrap">
					<img src="img/main/box_20.png" alt="" />
				</div>
			</div>
			<div id="box3">
				<div class="con_wrap">
					<div class="in_tit"><img src="img/main/box_30.png" alt=""></div>
					<div class="con_box">
						<ul class="list_tab">
							<li class="active"><button type="button"><span class="num">1</span>[1위]  업계 1위 수제초밥 전문점</button></li>
							<li><button type="button"><span class="num">2</span>[최다]  전국 최다 일식인 쉐프 보유</button></li>
							<li><button type="button"><span class="num">3</span>[공정]  주방 총 책임자 본사 책임지원</button></li>
							<li><button type="button"><span class="num">4</span>[상생]  광고선전비 본사 100% 지원</button></li>
							<li><button type="button"><span class="num">5</span>[경쟁]  초밥이 블루오션인 이유</button></li>
						</ul>
						<ul class="con_tab">
							<li class="active"><img src="img/main/box_31.png" alt=""></li>
							<li><img src="img/main/box_32.png" alt=""></li>
							<li><img src="img/main/box_33.png" alt=""></li>
							<li><img src="img/main/box_34.png" alt=""></li>
							<li><img src="img/main/box_35.png" alt=""></li>
						</ul>
					</div>
				</div>
			</div>
			<div id="box4">
				<div class="con_wrap">
					<div class="in_tit"><img src="img/main/box_40.png" alt=""></div>
					<img src="img/main/box_41.jpg" alt="">
				</div>
			</div>
			<div id="box5">
				<div class="con_wrap">
					<div class="in_tit"><img src="img/main/box_50.png" alt=""></div>
					<img src="img/main/box_51.jpg" alt="">
				</div>
			</div>
			<div id="box6">
				<div class="con_wrap">
					<div class="in_tit3"><img src="img/main/box_60.png" alt=""></div>
					<ul class="img_list">
						<li><img src="img/main/box_61.jpg" alt=""></li>
						<li><img src="img/main/box_62.jpg" alt=""></li>
						<li><img src="img/main/box_63.jpg" alt=""></li>
					</ul>
				</div>
			</div>
			<div id="box7">
				<div class="img_wrap">
					<img src="img/main/box_70.jpg" alt="" />
				</div>
			</div>
			<div id="box8">
				<div class="con_wrap">
					<div class="in_tit2"><img src="img/main/box_80.png" alt=""></div>
					<img src="img/main/box_81.png" alt="">
				</div>
			</div>
			<div id="box9">
				<div class="ban_wrap">
					<img src="img/main/box_90.jpg" alt="">
				</div>
				<div class="advice_box">
					<div class="inner">
						<h2 class="tit"><img src="img/main/box_93.png" alt="창업상담"></h3>
						<form id="myform" name="myform" method="post">
						<input type="hidden" name="flag" value="business">
						<table class="board_advice">
							<caption>상담 내용 입력 란</caption>
							<colgroup>
								<col width="82px" />
								<col width="273px" />
								<col width="113px" />
								<col width="510px" />
								<col width="64px" />
								<col width="" />
							</colgroup>
							<tbody>
								<tr>
									<th>이름</th>
									<td>
										<input type="text" name="name" style="width:220px;" />
									</td>
									<th>창업희망지역</th>
									<td>
										<select name="aria" title="" style="width:230px;" id="s_sido">
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
										<select name="aria2" title="" style="width:230px;"  id="s_gugun">
											<option value="시/군/구 선택" selected="selected">시/군/구 선택</option>
											<option value=""></option>
										</select>
									</td>
									<th>연락처</th>
									<td>
										<input type="text" name="hp" maxlength="13" />
									</td>
								</tr>
								<tr>
									<th>이메일</th>
									<td colspan="5">
										<input type="text" name="email" style="width:393px;" />
										<strong class="s_tit">매장 방문 경험</strong>
										<span class="jquery_checked"><input type="radio" name="store" id="rad_1" value="1" checked/>
											<label for="rad_1"><i></i>있다</label>
											<input type="radio" name="store" id="rad_2" value="2"  />
											<label for="rad_2"><i></i>없다</label>
										</span>
										<strong class="s_tit">일식 종사 경험</strong>
										<span class="jquery_checked"><input type="radio" name="use" id="rad_3" value="1" checked />
											<label for="rad_3"><i></i>있다</label>
											<input type="radio" name="use" id="rad_4" value="2"  />
											<label for="rad_4"><i></i>없다</label>
										</span>
									</td>
								</tr>
								<tr>
									<th>문의사항</th>
									<td colspan="5">
										<textarea name="content" cols="30" rows="10" ></textarea>
									</td>
								</tr>
							</tbody>
						</table>
						<div class="info_agree_wrap">
							<h3 class="info_tit">개인정보 수집약관 동의</h3>
							<ul class="info_desc">
								<li>- 개인정보 수집 및 이용에 관한 사항(필수) 회사는 고객서비스 제공을 위해 귀하의 개인정보를 아래와 같이 수집하고자 합니다.</li>
								<li>- 수집하는 개인정보의 항목<br />
									 &nbsp;&nbsp;(가) 이름, 연락처, 창업희망지역<br />
									&nbsp;&nbsp;(나) 서비스 이용과정이나 처리과정간 아래 정보들이 생성되어 수집될 수 있습니다.</li>
								<li>- 귀하는 개인정보 수집, 이용에 동의하지 않을 권리가 있으며, 동의 거부시 해당 서비스를 이용하실 수 없습니다.</li>
							</ul>
							<div class="in_agree jquery_checked">
								<input type="checkbox" class="chk_1" id="chk_1" value="" />
								<label for="chk_1"><i></i>개인정보 활용 동의</label>
								<img src="img/main/box_91.png" alt="">
							</div>
						</div>
						</form>
						<button type="button" class="bt_app" onclick="write_ok();">상담신청</button>
					</div>
				</div>
			</div>
		</div>
	</div>

<script type="text/javascript">
$(function(){
	scroll();//스크롤
	active();//엑티브 메뉴
	goBottom();//quick 하단으로 이동 btn
	checkedAc1();//radio,checkbox ie8동작
	resizeAc1(); // 퀵메뉴 온오프
});

function checkedAc1(){
	$('[type="radio"]').each(function (){
		if($(this).prop('checked')){
			$(this).parents('.jquery_checked').find('label').removeClass('active');
			$(this).next('label').addClass('active');
		}
		$(this).on('click',function(){
			$(this).parents('.jquery_checked').find('label').removeClass('active');
			if($(this).prop('checked')){
				$(this).next('label').addClass('active');
			} else {
				$(this).next('label').removeClass('active');
			}
		});
	});

	
	$('[type="checkbox"]').each(function (){
		if($(this).prop('checked')){
			$(this).parents('.jquery_checked').find('label').removeClass('active');
			$(this).next('label').addClass('active');
		}
		$(this).on('click',function(){
			$(this).parents('.jquery_checked').find('label').removeClass('active');
			if($(this).prop('checked')){
				$(this).next('label').addClass('active');
			} else {
				$(this).next('label').removeClass('active');
			}
		});
	});
}

function resizeAc1(){
	$('.open_bt').on('click',function (){
		$('#quick').toggleClass('active');
	});

	$(window).on('resize',function (){
		var reW1 = $(this).width();
		if(reW1>1800){
			$('#quick').addClass('active');
		} else {
			$('#quick').removeClass('active');
		}
	}).resize();
}

var p_cnt01 = 1;
function scroll(){
	$(window).on('hashchange load', function(event) {
		var w_hash = window.location.hash.split('')[1];
		if(w_hash){
			p_cnt01 = w_hash;
		}
	});

	$('#quick ul li a').each(function(){
		var _liThis = $(this),
		divId = _liThis.attr('href'),
		targetHash = divId.split('box')[1],
		divIdtop = $(divId).offset().top;

		_liThis.on('click', function(e){

			e.preventDefault();
			location.href = '#'+targetHash;
			$('body,html').animate({scrollTop: divIdtop},300);

			//if(targetHash<10){
				//if(targetHash==1){
					//$('#quick ul li a').removeClass('on');
				//} else {
					//$('#quick ul li a').addClass('on');
				//}
			//} else {
				//$('#quick ul li a').removeClass('on');
			//}

		});
		$(window).scroll(function(){
			if ($(this).scrollTop() > divIdtop-1 ) {
				_liThis.parent().addClass('active').siblings().removeClass('active');
			}

			if($(this).scrollTop() > 930){
				$('#quick ul li a').addClass('on');
			}
			if($(this).scrollTop() < 930){
				$('#quick ul li a').removeClass('on');
			}

			if($(this).scrollTop() > 7535){
				$('#quick ul li a').removeClass('on');
			}

			console.log($(this).scrollTop());
		}).scroll();
	});

	var p_cnt01_max = $('#contents > div').length;
	var mousewheelevt = (/Firefox/i.test(navigator.userAgent))? 'DOMMouseScroll' : 'mousewheel';
	$('html').on(mousewheelevt, function (event) {
		var p_wheel01 = false;
		if (/Firefox/i.test(navigator.userAgent)){if (event.originalEvent.detail < 0) {p_wheel01 = true;}}else{if (event.originalEvent.wheelDelta >= 0) {p_wheel01 = true;}}
		var pn = $(':animated').length;
		if (pn == 0) {
			if (p_wheel01) {
				if(p_cnt01 > 1){
					p_cnt01--;
				}
			} else {
				if(p_cnt01 <= p_cnt01_max){
					p_cnt01++;
				}
			}
		}
	});
}

function active(){
	var $listTab = $('.list_tab > li');
	$listTab.find('button').on('click',function(){
		var idx = $(this).parent('li').index();
		$(this).parent().addClass('active').siblings().removeClass('active');
		$(this).closest('.con_box').find('.con_tab > li').eq(idx).addClass('active').siblings().removeClass('active')
	})
}

function goBottom(){
	$('.bt_gobtm, .go_bot').on('click',function(){
		var lastPos = $('#box9').offset().top;
		$('body, html').stop().animate({scrollTop:lastPos},400);
	});
}



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
		url: 'js/p_map.json',
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
		alert('error');
	}).always(function() {
		//alert('어쩌라구');
	});
}
// END 셀렉박스 체크




// submit 최종 폼체크
function write_ok()
{
	var f = document.forms.myform;

	if(f.name.value == "") 
	{
		alert('이름을 입력하세요.');
		f.name.focus();
		return false;
	}

	if(f.hp.value == '') 
	{
		alert('연락처를 입력하세요.');
		f.hp.focus();
		return false;
	}

	var regExp = /^01([0|1|6|7|8|9]?)-?([0-9]{3,4})-?([0-9]{4})$/;
	if( !f.hp.value )
	{ 
	   alert("연락처를 입력해주세요"); 
	   f.hp.focus(); 
	   return false; 
	} 
	else 
	{ 
		if(!regExp.test(f.hp.value))
		{ 
			alert("잘못된 휴대폰 번호입니다. 숫자, - 를 포함한 숫자만 입력하세요"); 
			f.hp.focus(); 
			return false; 
	   } 
	} 

	var regExp2 = /^[0-9a-zA-Z]([-_\.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-_\.]?[0-9a-zA-Z])*\.[a-zA-Z]{2,3}$/i; 
	if( !f.email.value )
	{ 
	   alert("이메일주소를 입력해주세요"); 
	   f.email.focus(); 
	   return false; 
	} 
	else 
	{ 
		if(!regExp2.test(f.email.value))
		{ 
			alert("이메일 주소가 유효하지 않습니다"); 
			f.email.focus(); 
			return false; 
	   } 
	} 

	if(f.content.value == '') 
	{
		alert('문의내용을 입력하세요.');
		f.content.focus();
		return false;
	}

	var w_rull_check = $('#chk_1').prop('checked');

	if(!w_rull_check) 
	{
		alert('개인정보 활용동의에 체크해주세요.');
		$('.chk_1').focus();
		return false;
	}

	f.action = '../../lib/write_ok.php';
	f.submit();
}



</script>
</body>
</html>