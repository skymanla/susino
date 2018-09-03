<?php
include_once "../../_head.php";
$aType = $_GET['aType'];
$getIdx = $_GET['getIdx'];
?>
<link type="text/css" href="/css/jquery-ui.min.css" rel="stylesheet">
<form name="reviewForm" id="reviewForm" method="post" enctype="multipart/form-data">
	<input type="hidden" name="getIdx" value="<?=$_GET['getIdx']?>" />
	<input type="hidden" name="aType" value="<?=$_GET['aType']?>" />
	<input type="hidden" name="device" value="mobile" />

	<div class="wrap_conts wid_full step1">
		<div class="hd_s_img">
			<h2><img src="/m/img/s5/s5s2_tit_dainty.png" alt=""></h2>
			<div class="hd_step st1">스텝 1단계 기본</div>
		</div>
		<div class="wrap_caution">
			<h3>후기 전송 시 알아두세요</h3>
			<ul>
				<li>아래 평가사항에 대해 꼼꼼하게 답변 부탁드리며, 하단의 첨부파일에는 주문하셨던 메뉴 사진과 영수증 사진을 꼭! 함께 첨부해주시기 바랍니다. 
				(방문 여부에 대한 사실관계 확인을 위한 용도이며 사실 확인 후 삭제됩니다. 걱정마세요.) </li>
				<li>평가사항은 더 좋은 초밥을 만들기 위해 운영되는 정책으로 보다 나은 서비스와 맛을 위해 아낌없는 충언과 의견을 기다리고 있습니다. 감사합니다.</li>
			</ul>
		</div>
		<div class="wrap_register_form">
			<!-- STR <form method="" action=""> -->
			<div class="bg_box">
				<div class="in_form">
					<h5><label for="form_lbl_10">방문날짜</label></h5>
					<input type="text" id="form_lbl_10" value="" name="visit_date" class="setdate" readonly />
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
							<select name="addr_sec" id="s_gugun" title="시/군/구 선택">
								<option value="">시/군/구 선택</option>
							</select>
						</li>
					</ul>
					<h5>방문인원</h5>
					<ul class="f_table">
						<li>
							<select name="to_person" id="">
								<option value="1" selected>1인</option>
								<option value="2">2인</option>
								<option value="3">3인</option>
								<option value="4">4인</option>
								<option value="5">5인</option>
								<option value="6">6인</option>
								<option value="7">7인 이상</option>
							</select>
						</li>
					</ul>
					<h5>누구와 함께 가셨나요?</h5>
					<ul class="radio_type w4">
						<li>
							<input type="radio" id="form_rad_10" value="family" name="to_gether" checked />
							<label for="form_rad_10">가족</label>
						</li>
						<li>
							<input type="radio" id="form_rad_11" value="friend" name="to_gether" />
							<label for="form_rad_11">친구</label>
						</li>
						<li>
							<input type="radio" id="form_rad_12" value="partner" name="to_gether" />
							<label for="form_rad_12">동료</label>
						</li>
						<li>
							<input type="radio" id="form_rad_13" value="fellow" name="to_gether" />
							<label for="form_rad_13">연인</label>
						</li>
					</ul>
					<h5><label for="form_lbl_13">어떤 메뉴를 주문하셨나요?</label></h5>
					<input type="text" id="form_lbl_13" value="" name="to_menu" />
				</div>
			</div>		
			<div class="bt_wrap_center pd_lr">
				<a href="javascript:move_step_css('step2');" class="bt_2s_c_more">다음단계로<i class="arr2"></i></a>
			</div>
			<!-- END <form method="" action=""> -->		
		</div>
	</div>

	<div class="wrap_conts wid_full step2" style="display:none">
		<div class="hd_s_img">
			<h2><img src="/m/img/s5/s5s2_tit_dainty.png" alt=""></h2>
			<div class="hd_step st2">스텝 2단계 맛</div>
		</div>
		<div class="wrap_register_form">
			<!-- STR <form method="" action=""> -->
			<div class="bg_box">
				<div class="in_form">
					<h5>메뉴의 전체적인 모양과 색, 비주얼은 어땠나요?</h5>
					<ul class="radio_type w2">
						<li>
							<input type="radio" id="form_rad_20" value="1" name="to_menu_depth" checked />
							<label for="form_rad_20">너무 좋아요</label>
						</li>
						<li>
							<input type="radio" id="form_rad_21" value="2" name="to_menu_depth" />
							<label for="form_rad_21">만족해요</label>
						</li>
						<li>
							<input type="radio" id="form_rad_22" value="3" name="to_menu_depth" />
							<label for="form_rad_22">괜찮아요</label>
						</li>
						<li>
							<input type="radio" id="form_rad_23" value="4" name="to_menu_depth" />
							<label for="form_rad_23">부족해요</label>
						</li>
						<li>
							<input type="radio" id="form_rad_24" value="5" name="to_menu_depth" />
							<label for="form_rad_24">불만있어요</label>
						</li>
					</ul>
					<h5>주문 후 메뉴가 나오는 시간이 얼마나 걸렸나요?</h5>
					<ul class="radio_type w2">
						<li>
							<input type="radio" id="form_rad_30" value="1" name="to_menu_time" checked />
							<label for="form_rad_30">10분 이내</label>
						</li>
						<li>
							<input type="radio" id="form_rad_31" value="2" name="to_menu_time" />
							<label for="form_rad_31">약 10~20분</label>
						</li>
						<li>
							<input type="radio" id="form_rad_32" value="3" name="to_menu_time" />
							<label for="form_rad_32">약 20~30분</label>
						</li>
						<li>
							<input type="radio" id="form_rad_33" value="4" name="to_menu_time" />
							<label for="form_rad_33">약 30~40분</label>
						</li>
						<li>
							<input type="radio" id="form_rad_34" value="5" name="to_menu_time" />
							<label for="form_rad_34">약 40분 이상</label>
						</li>
					</ul>
					<h5>초밥의 밥(샤리)은 어땠나요?</h5>
					<ul class="radio_type w2">
						<li>
							<input type="radio" id="form_rad_40" value="1" name="to_menu_rice" checked />
							<label for="form_rad_40">너무 좋아요.</label>
						</li>
						<li>
							<input type="radio" id="form_rad_41" value="2" name="to_menu_rice" />
							<label for="form_rad_41">만족해요.</label>
						</li>
						<li>
							<input type="radio" id="form_rad_42" value="3" name="to_menu_rice" />
							<label for="form_rad_42">괜찮아요.</label>
						</li>
						<li>
							<input type="radio" id="form_rad_43" value="4" name="to_menu_rice" />
							<label for="form_rad_43">부족해요.</label>
						</li>
						<li>
							<input type="radio" id="form_rad_44" value="5" name="to_menu_rice" />
							<label for="form_rad_44">불만 있어요.</label>
						</li>
					</ul>
					<h5>초밥의 생선(네타)은 어땠나요?</h5>
					<ul class="radio_type w2">
						<li>
							<input type="radio" id="form_rad_50" value="1" name="to_menu_fish" checked />
							<label for="form_rad_50">너무 좋아요.</label>
						</li>
						<li>
							<input type="radio" id="form_rad_51" value="2" name="to_menu_fish" />
							<label for="form_rad_51">만족해요.</label>
						</li>
						<li>
							<input type="radio" id="form_rad_52" value="3" name="to_menu_fish" />
							<label for="form_rad_52">괜찮아요.</label>
						</li>
						<li>
							<input type="radio" id="form_rad_53" value="4" name="to_menu_fish" />
							<label for="form_rad_53">부족해요.</label>
						</li>
						<li>
							<input type="radio" id="form_rad_54" value="5" name="to_menu_fish" />
							<label for="form_rad_54">불만 있어요.</label>
						</li>
					</ul>
					<h5>초밥 맛의 만족도를 평가하신다면? (5점 만점)</h5>
					<ul class="radio_type w5">
						<li>
							<input type="radio" id="form_rad_60" value="1" name="to_menu_score" checked />
							<label for="form_rad_60">1점</label>
						</li>
						<li>
							<input type="radio" id="form_rad_61" value="2" name="to_menu_score" />
							<label for="form_rad_61">2점</label>
						</li>
						<li>
							<input type="radio" id="form_rad_62" value="3" name="to_menu_score" />
							<label for="form_rad_62">3점</label>
						</li>
						<li>
							<input type="radio" id="form_rad_63" value="4" name="to_menu_score" />
							<label for="form_rad_63">4점</label>
						</li>
						<li>
							<input type="radio" id="form_rad_64" value="5" name="to_menu_score" />
							<label for="form_rad_64">5점</label>
						</li>
					</ul>
					<h5><label for="form_lbl_21">전반적인 매장의 초밥 미식평을 작성해주세요.<br />(솔직하게 말씀해주시는 것이 저희에겐 더 좋답니다~)</label></h5>
					<textarea name="to_ftalk" id="form_lbl_21" cols="30" rows="10" style="height:100px"></textarea>
				</div>
			</div>
			<div class="paging type2">
				<!--버튼 비활성시  버튼 내부 a태그에 class="bt_off" 추가 -->
				<a href="javascript:move_step_css('step1');" class="bt_prev">이전단계로</a>
				<a href="javascript:move_step_css('step3');" class="bt_next">다음단계로</a>
			</div>
			<!-- END <form method="" action=""> -->
		</div>

	</div>

	<div class="wrap_conts wid_full step3" style="display:none">
		<div class="hd_s_img">
			<h2><img src="/m/img/s5/s5s2_tit_dainty.png" alt=""></h2>
			<div class="hd_step st3">스텝 3단계 서비스</div>
		</div>
		<div class="wrap_register_form">
			<!-- STR <form method="" action=""> -->
			<div class="bg_box">
				<div class="in_form">
					<h5>방문 시 직원분들의 인사를 해주셨나요?</h5>
					<ul class="radio_type w1">
						<li>
							<input type="radio" id="form_rad_70" value="1" name="to_station_hello" checked />
							<label for="form_rad_70">네, 모두 인사를 해주셨습니다.</label>
						</li>
						<li>
							<input type="radio" id="form_rad_71" value="2" name="to_station_hello" />
							<label for="form_rad_71">아니오, 인사가 없었습니다.</label>
						</li>
						<li>
							<input type="radio" id="form_rad_72" value="3" name="to_station_hello" />
							<label for="form_rad_72">잘 모르겠습니다.</label>
						</li>
					</ul>
					<h5>자리 안내 시 친절하게 응대했나요? 혹은 에스코트는 없었나요?</h5>
					<ul class="radio_type w1">
						<li>
							<input type="radio" id="form_rad_80" value="1" name="to_station_help" checked />
							<label for="form_rad_80">에스코트 받으며 친절하게 안내해주셨습니다.</label>
						</li>
						<li>
							<input type="radio" id="form_rad_81" value="2" name="to_station_help" />
							<label for="form_rad_81">에스코트는 없었지만 친절하게 안내해주셨습니다.</label>
						</li>
						<li>
							<input type="radio" id="form_rad_82" value="3" name="to_station_help" />
							<label for="form_rad_82">에스코트 없이 알아서 자리를 찾았습니다.</label>
						</li>
					</ul>
					<h5>주문 시 추천 메뉴나 이벤트에 대한 안내가 충분했나요?</h5>
					<ul class="radio_type w1">
						<li>
							<input type="radio" id="form_rad_90" value="1" name="to_station_menu" checked />
							<label for="form_rad_90">네, 메뉴 추천과 이벤트 안내를 받았습니다.</label>
						</li>
						<li>
							<input type="radio" id="form_rad_91" value="2" name="to_station_menu" />
							<label for="form_rad_91">메뉴 추천을 받았지만 이벤트 안내는 받지 못했습니다.</label>
						</li>
						<li>
							<input type="radio" id="form_rad_92" value="3" name="to_station_menu" />
							<label for="form_rad_92">이벤트 안내는 받았지만 메뉴 추천은 받지 못했습니다.</label>
						</li>
						<li>
							<input type="radio" id="form_rad_93" value="4" name="to_station_menu" />
							<label for="form_rad_93">아니오, 메뉴 추천과 이벤트 안내 모두 받지 못했습니다.</label>
						</li>
					</ul>
					<h5>메뉴가 테이블에 나왔을 때 메뉴에 대한 설명을 해주셨나요?</h5>
					<ul class="radio_type w1">
						<li>
							<input type="radio" id="form_rad_100" value="1" name="to_station_exp" checked />
							<label for="form_rad_100">네, 먹는 순서와 소스에 대한 설명을 받았습니다.</label>
						</li>
						<li>
							<input type="radio" id="form_rad_101" value="2" name="to_station_exp" />
							<label for="form_rad_101">아니오, 설명이 없었습니다.</label>
						</li>
						<li>
							<input type="radio" id="form_rad_102" value="3" name="to_station_exp" />
							<label for="form_rad_102">잘 모르겠습니다.</label>
						</li>
					</ul>
					<h5>전체적으로 서비스를 평가하신다면? (5점 만점)</h5>
					<ul class="radio_type w5">
						<li>
							<input type="radio" id="form_rad_110" value="1" name="to_station_score" checked />
							<label for="form_rad_110">1점</label>
						</li>
						<li>
							<input type="radio" id="form_rad_111" value="2" name="to_station_score" />
							<label for="form_rad_111">2점</label>
						</li>
						<li>
							<input type="radio" id="form_rad_112" value="3" name="to_station_score" />
							<label for="form_rad_112">3점</label>
						</li>
						<li>
							<input type="radio" id="form_rad_113" value="4" name="to_station_score" />
							<label for="form_rad_113">4점</label>
						</li>
						<li>
							<input type="radio" id="form_rad_114" value="5" name="to_station_score" />
							<label for="form_rad_114">5점</label>
						</li>
					</ul>
				</div>
			</div>
			<div class="paging type2">
				<!--버튼 비활성시  버튼 내부 a태그에 class="bt_off" 추가 -->
				<a href="javascript:move_step_css('step2');" class="bt_prev">이전단계로</a>
				<a href="javascript:move_step_css('step4');" class="bt_next">다음단계로</a>
			</div>
			<!-- END <form method="" action=""> -->
		</div>

	</div>

	<div class="wrap_conts wid_full step4" style="display:none">
		<div class="hd_s_img">
			<h2><img src="/m/img/s5/s5s2_tit_dainty.png" alt=""></h2>
			<div class="hd_step st4">스텝 4단계 클린</div>
		</div>
		<div class="wrap_register_form">
			<!-- STR <form method="" action=""> -->
			<div class="bg_box">
				<div class="in_form">
					<h5>매장 외부가 전반적으로 잘 정돈되어 있었나요?</h5>
					<ul class="radio_type w1">
						<li>
							<input type="radio" id="form_rad_120" value="1" name="to_clean_out" checked />
							<label for="form_rad_120">네.</label>
						</li>
						<li>
							<input type="radio" id="form_rad_121" value="2" name="to_clean_out" />
							<label for="form_rad_121">아니오.</label>
						</li>
						<li>
							<input type="radio" id="form_rad_122" value="3" name="to_clean_out" />
							<label for="form_rad_122">특별한 기억이 없습니다.</label>
						</li>
					</ul>
					<h5>매장 내부가 전반적으로 잘 정리되어 있었나요?</h5>
					<ul class="radio_type w1">
						<li>
							<input type="radio" id="form_rad_130" value="1" name="to_clean_in" checked />
							<label for="form_rad_130">네.</label>
						</li>
						<li>
							<input type="radio" id="form_rad_131" value="2" name="to_clean_in" />
							<label for="form_rad_131">아니오.</label>
						</li>
						<li>
							<input type="radio" id="form_rad_132" value="3" name="to_clean_in" />
							<label for="form_rad_132">특별한 기억이 없습니다.</label>
						</li>
					</ul>
					<h5>매장내 음악 소리는 적절했나요?</h5>
					<ul class="radio_type w1">
						<li>
							<input type="radio" id="form_rad_140" value="1" name="to_clean_sound" checked />
							<label for="form_rad_140">네.</label>
						</li>
						<li>
							<input type="radio" id="form_rad_141" value="2" name="to_clean_sound" />
							<label for="form_rad_141">아니오.</label>
						</li>
					</ul>
					<h5>매장의 온도는 적절했나요?</h5>
					<ul class="radio_type w1">
						<li>
							<input type="radio" id="form_rad_150" value="1" name="to_clean_temper" checked />
							<label for="form_rad_150">네.</label>
						</li>
						<li>
							<input type="radio" id="form_rad_151" value="2" name="to_clean_temper" />
							<label for="form_rad_151">아니오.</label>
						</li>
					</ul>
					<h5>테이블이 깨끗하게 잘 정돈되어 있었나요?</h5>
					<ul class="radio_type w1">
						<li>
							<input type="radio" id="form_rad_160" value="1" name="to_clean_table" checked />
							<label for="form_rad_160">네.</label>
						</li>
						<li>
							<input type="radio" id="form_rad_161" value="2" name="to_clean_table" />
							<label for="form_rad_161">아니오.</label>
						</li>
					</ul>
					<h5>메뉴판이나 홍보물 등이 깨끗하게 되어 있나요?</h5>
					<ul class="radio_type w1">
						<li>
							<input type="radio" id="form_rad_170" value="1" name="to_clean_menu" checked />
							<label for="form_rad_170">네.</label>
						</li>
						<li>
							<input type="radio" id="form_rad_171" value="2" name="to_clean_menu" />
							<label for="form_rad_171">아니오.</label>
						</li>
					</ul>
					<h5>직원분들의 복장이 깨끗했나요?</h5>
					<ul class="radio_type w1">
						<li>
							<input type="radio" id="form_rad_180" value="1" name="to_clean_dress" checked />
							<label for="form_rad_180">네.</label>
						</li>
						<li>
							<input type="radio" id="form_rad_181" value="2" name="to_clean_dress" />
							<label for="form_rad_181">아니오.</label>
						</li>
					</ul>
					<h5>전체적으로 환경/청결도를 평가하신다면? (5점 만점)</h5>
					<ul class="radio_type w5">
						<li>
							<input type="radio" id="form_rad_190" value="1" name="to_clean_score" checked />
							<label for="form_rad_190">1점</label>
						</li>
						<li>
							<input type="radio" id="form_rad_191" value="2" name="to_clean_score" />
							<label for="form_rad_191">2점</label>
						</li>
						<li>
							<input type="radio" id="form_rad_192" value="3" name="to_clean_score" />
							<label for="form_rad_192">3점</label>
						</li>
						<li>
							<input type="radio" id="form_rad_193" value="4" name="to_clean_score" />
							<label for="form_rad_193">4점</label>
						</li>
						<li>
							<input type="radio" id="form_rad_194" value="5" name="to_clean_score" />
							<label for="form_rad_194">5점</label>
						</li>
					</ul>
					<!--<h5>메뉴사진</h5>
					<ul class="f_table">
						<li><input type="file" id="form_lbl_20" value="" name=""></li>
						<li><button type="button" class="bt_2s_c_gray"><label for="form_lbl_20">파일첨부</label></button></li>
					</ul>
					<h5>영수증 첨부</h5>
					<ul class="f_table">
						<li><input type="file" id="form_lbl_14" value="" name=""></li>
						<li><button type="button" class="bt_2s_c_gray"><label for="form_lbl_14">파일첨부</label></button></li>
					</ul>-->
					<h5><label for="form_lbl_41">마지막으로 맛/서비스/클린에 대한 총평을 적어주세요. <br />(50자 이상 부탁드려요~)</label></h5>
					<textarea name="to_all_score" id="form_lbl_41" cols="30" rows="10" style="height:100px"></textarea>
					<a href="javascript:reviewFrm(document.reviewForm);" class="bt_2s_c_red">전송하기</a>
				</div>
			</div>
			<div class="bt_wrap_center pd_lr">
				<a href="javascript:move_step_css('step3');" class="bt_2s_c_more"><i class="arr3"></i>이전단계로</a>
			</div>
			<!-- END <form method="" action=""> -->
		</div>

	</div>
</form>
<!-- /m/page/s5/s2sreview_ftalk_2.php -->
<script src="/js/jquery-ui.min.js"></script>
<script>
$(function(){
	$('.setdate').datepicker({
		dateFormat: 'yy-mm-dd',
		maxDate : 0
	});
	myInfoAc1(); // 우리동네 설정
});
// STR 우리동네 설정
function myInfoAc1(){
	// STR 셀렉박스 체인지
	$('#s_sido').on('change',function (){
		addInfo1($(this).find('option:selected').attr('data-real-addr'));
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
				$('#s_gugun').html('');
				return false;
			}

			$.each(addArry1,function (i){
				if(addArry1[i].addr.split(' ')[0].indexOf(t) != -1){
					addrSec.push(addArry1[i].addr.split(' ')[1]);
				}
			});

			if(addrSec.length==0){
				alert('해당 지역에는 매장이 없습니다.\n다른 지역을 검색해주세요.');
				$('#s_sido option:eq(0)').attr('selected', 'selected');
				$('#s_gugun').html('');
				return false;
			}

			var results = new Array();
			for (var i=0; i<addrSec.length; i++) {
				var key = addrSec[i].toString();
				if (!results[key]){
					results[key] = 1
				} else {
					results[key] = results[key] + 1;
				}
			}
			addrSecHtml += '<select class="radio_box" name="addr_sec">';
			for (var j in results) {
				
				addrSecHtml += '<option value="'+j+'">'+j+'('+results[j]+')</option>';
				//<input type="radio" value="' + j + '" name="addr_sec" id="addr_sec'+addrSecNum+'"/><label for="addr_sec'+addrSecNum+'">' + j + ' (<b>'+results[j]+'</b>)</label></div>';
				addrSecNum++;
			}
			addrSecHtml += '</select>';
			if(t!='세종특별자치시'){
				$('#s_gugun').html(addrSecHtml);
			} else {
				$('#s_gugun').html('');
			}


		}).fail(function(){
			//alert('error');
		})
	}
	// END 지점 정보
}
// END 우리동네 설정

function move_step_css(step){
	if(step == "step1"){
		$('.step1').show();
		$('.step2').hide();
		$('.step3').hide();
		$('.step4').hide();
	}else if(step == "step2"){
		$('.step1').hide();
		$('.step2').show();
		$('.step3').hide();
		$('.step4').hide();
	}else if(step == "step3"){
		$('.step1').hide();
		$('.step2').hide();
		$('.step3').show();
		$('.step4').hide();
	}else if(step == "step4"){
		$('.step1').hide();
		$('.step2').hide();
		$('.step3').hide();
		$('.step4').show();
	}
	var offset = $("#reviewForm").offset();
	$('html, body').animate({scrollTop : offset.top}, 400);
}

function reviewFrm(Frm){
	if( $.trim($("input[name=visit_date]").val()) == ''){
		alert("방문날짜를 입력해주세요.");
		$('.step1').show();
		$('.step2').hide();
		$('.step3').hide();
		$('.step4').hide();
		$("input[name=visit_date]").focus();
		return false;
	}else{
		var date_value = $("input[name=visit_date]").val();
		var date_split = date_value.split("-");
		if(date_split.length < 3){
			alert("방문날짜는 2018-06-30 형식으로 넣어주세요.");
			$('.step1').show();
			$('.step2').hide();
			$('.step3').hide();
			$('.step4').hide();
			$("input[name=visit_date]").focus();
			return false;
		}
	}

	if(!$("#s_sido").val()){
		$('.step1').show();
		$('.step2').hide();
		$('.step3').hide();
		$('.step4').hide();
		alert("방문매장을 선택해주세요.");
		$("#s_sido").focus();
		return false;
	}else{

	}

	if( $.trim($("input[name=to_menu]").val()) == '' ){
		alert("주문 메뉴를 적어주세요.");
		$('.step1').show();
		$('.step2').hide();
		$('.step3').hide();
		$('.step4').hide();
		$("input[name=to_menu]").focus();
		return false;
	}

	if( $.trim($("textarea[name=to_ftalk]").val()) == ''){
		alert("초밥 미식평을 작성해 주세요.");
		$('.step1').hide();
		$('.step2').show();
		$('.step3').hide();
		$('.step4').hide();
		$("textarea[name=to_ftalk]").focus();
		return false;
	}

	if( $.trim($("textarea[name=to_all_score]").val()) == ''){
		alert("총평을 작성해 주세요.");
		$('.step1').hide();
		$('.step2').hide();
		$('.step3').hide();
		$('.step4').show();
		$("textarea[name=to_all_score]").focus();
		return false;
	}

	Frm.action = "/lib/write_review.php";
	if(confirm("내용은 다 입력하셨나요?\n작성한 후기를 전송하시겠습니까?")){
		Frm.submit();
	}else{
		return false;
	}
}
</script>
<?php include_once "../../_tail.php";?>