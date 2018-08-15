<?
$w_http_host = $_SERVER['HTTP_HOST'];
$w_request_uri = $_SERVER['REQUEST_URI'];
$w_file_name = basename($_SERVER['PHP_SELF']);
$w_sub_name = explode('/',$w_request_uri);
$w_index = true;


if(isset($w_sub_name[3])){
	$w_index = false;
	$w_b_num = explode('.',$w_file_name);
	$w_b_num = explode('s',$w_b_num[0]);
	$w_c_num = $w_b_num[2];
	$w_b_num = $w_b_num[1];

	switch($w_sub_name[3]){
		case "s1" : 
			$w_a_num = 1; 
			$w_s_title_1="어울림 스시노백쉐프";
			switch($w_b_num){
				case "1" : $w_s_title_2="우리와 어울리는 초밥집"; break;
				case "2" : $w_s_title_2="이렇게 다릅니다"; break;
				case "3" : $w_s_title_2="걸어온 길"; break;
				case "4" : $w_s_title_2="브랜드를 말합니다"; break;
				case "5" : $w_s_title_2="대한민국 최대 일식 전문가 그룹"; break;
				case "6" : $w_s_title_2="스시노 NEWS"; break;
			}
		break;
		case "s2" : 
			$w_a_num = 2; 
			$w_s_title_1="초밥";
			switch($w_b_num){
				case "1" : $w_s_title_2="2018 신메뉴"; break;
				case "2" : $w_s_title_2="다함께, 셋트 초밥"; break;
				case "3" : $w_s_title_2="든든한, 한상 차림"; break;
				case "4" : $w_s_title_2="혼자서, 싱글 초밥"; break;
				case "5" : $w_s_title_2="점심엔, 런치 초밥"; break;
				case "6" : $w_s_title_2="컴팩트, 전용 초밥"; break;
				case "7" : $w_s_title_2="사케엔, 사시미/탕"; break;
				case "8" : $w_s_title_2="조금 더, 곁들임"; break;
			}
		break;
		case "s3" : 
			$w_a_num = 3; 
			$w_s_title_1="초밥집";
			switch($w_b_num){
				case "1" : $w_s_title_2="백쉐프 초밥집 찾기"; break;
				case "2" : $w_s_title_2="다이닝(Dining) 매장"; break;
				case "3" : $w_s_title_2="컴팩트(Compact) 매장"; break;
				case "4" : $w_s_title_2="강남★스타 (UNIQ TM)"; break;
			}
		break;
		case "s4" : 
			$w_a_num = 4; 
			$w_s_title_1="배달 초밥";
			switch($w_b_num){
				case "1" : $w_s_title_2="편의점엔 없는 초밥 도시락"; break;
				case "2" : $w_s_title_2="NEW 한상 라인"; break;
				case "3" : $w_s_title_2="하프라인"; break;
				case "4" : $w_s_title_2="혼밥라인"; break;
				case "5" : $w_s_title_2="홈파티라인"; break;
				case "6" : $w_s_title_2="돈가츠/롤"; break;
				case "7" : $w_s_title_2="라이브 픽업"; break;
				case "8" : $w_s_title_2="배달 초밥집 찾기"; break;
			}
		break;
		case "s5" : 
			$w_a_num = 5; 
			$w_s_title_1="단골고객/우동맛";
			switch($w_b_num){
				case "1" : $w_s_title_2="단골 고객 혜택"; break;
				case "2" : $w_s_title_2="우리 동네 맛평가단"; break;
			}
		break;
		case "s6" : 
			$w_a_num = 6; 
			$w_s_title_1="이벤트";
			switch($w_b_num){
				case "1" : $w_s_title_2="함께 갈래요?"; break;
				case "2" : $w_s_title_2="쇼미더 스시노"; break;
				case "3" : $w_s_title_2="이달의 이벤트"; break;
				case "4" : $w_s_title_2="카톡 선물하기"; break;
			}
		break;
		case "member" : 
			$w_a_num = 4; 
			$w_s_title_1=1;
			switch($w_b_num){
				case "1" : $w_s_title_2="공지사항"; break;
				case "2" : $w_s_title_2="고객의소리"; break;
			}
		break;
		case "scenter" : 
			$w_a_num = 4; 
			$w_s_title_1="고객의소리";
			switch($w_b_num){
				case "1" : $w_s_title_2="고객의소리"; break;
			}
		break;
		case "srule" : 
			$w_a_num = ''; 
			$w_s_title_1="룰";
			switch($w_b_num){
				case "1" : $w_s_title_2="개인정보취급방침"; break;
				case "2" : $w_s_title_2="이메일무단수집거부"; break;
			}
		break;
	}
	if($w_a_num){
		$w_a_num = $w_a_num-1;
	}
	$w_b_num = $w_b_num-1;
	if($w_c_num){
		$w_c_num = $w_c_num-1;
	}
}
?>