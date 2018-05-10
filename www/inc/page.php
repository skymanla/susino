<?
$w_http_host = $_SERVER['HTTP_HOST'];
$w_request_uri = $_SERVER['REQUEST_URI'];
$w_file_name = basename($_SERVER['PHP_SELF']);
$w_sub_name = explode('/',$w_request_uri);
$w_index = true;


if(isset($w_sub_name[2])){
	$w_index = false;
	$w_b_num = explode('.',$w_file_name);
	$w_b_num = explode('s',$w_b_num[0]);
	$w_c_num = $w_b_num[2];
	$w_b_num = $w_b_num[1];

	switch($w_sub_name[2]){
		case "s1" : 
			$w_a_num = 1; 
			$w_s_title_1="어울림 스시노백쉐프";
			switch($w_b_num){
				case "1" : $w_s_title_2="우리와 어울리는 초밥집"; break;
				case "2" : $w_s_title_2="우리가 걸어온 길"; break;
				case "3" : $w_s_title_2="남다른 생각"; break;
				case "4" : $w_s_title_2="대한민국 최대 일식 전문가 그룹"; break;
				case "5" : $w_s_title_2="쉐프들은 지금"; break;
			}
		break;
		case "s2" : 
			$w_a_num = 2; 
			$w_s_title_1="초밥";
			switch($w_b_num){
				case "1" : $w_s_title_2="다함께,셋트 초밥"; break;
				case "2" : $w_s_title_2="혼자서,단품 초밥"; break;
				case "3" : $w_s_title_2="점심엔,런치 초밥"; break;
				case "4" : $w_s_title_2="컴팩트,전용 초밥"; break;
				case "5" : $w_s_title_2="곁들임 메뉴"; break;
				case "6" : $w_s_title_2="사시미/탕"; break;
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
				case "1" : $w_s_title_2="준비중"; break;
			}
		break;
		case "s5" : 
			$w_a_num = 5; 
			$w_s_title_1="단골고객/우동맛";
			switch($w_b_num){
				case "1" : $w_s_title_2="우리 동네 맛평가단 안내"; break;
			}
		break;
		case "s6" : 
			$w_a_num = 6; 
			$w_s_title_1="이벤트";
			switch($w_b_num){
				case "1" : $w_s_title_2="쇼미더 스백"; break;
				case "2" : $w_s_title_2="이달의 이벤트"; break;
				case "3" : $w_s_title_2="제휴,상품권"; break;
				case "4" : $w_s_title_2="스백 컨테스트"; break;
			}
		break;
		case "scenter" : 
			$w_a_num = ""; 
			$w_s_title_1="고객센터";
			switch($w_b_num){
				case "1" : $w_s_title_2="공지사항"; break;
				case "2" : $w_s_title_2="고객의소리"; break;
			}
		break;
		case "srule" : 
			$w_a_num = ""; 
			$w_s_title_1="rule";
			switch($w_b_num){
				case "1" : $w_s_title_2="개인정보취급방침"; break;
				case "2" : $w_s_title_2="이메일무단수집거부"; break;
			}
		break;
		case "member" : 
			$w_a_num = ""; 
			$w_s_title_1="Members";
			switch($w_file_name){
				case "login.php" : $w_s_title_2="로그인"; break;
				case "lost_id.php" : $w_s_title_2="아이디 찾기"; break;
				case "lost_password.php" : $w_s_title_2="패스워드 찾기"; break;
				case "register_form.php" : $w_s_title_2="회원가입"; break;
				case "register_result.php" : $w_s_title_2="가입완료"; break;
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