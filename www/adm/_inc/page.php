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
	$w_b_num = $w_b_num[1];

	switch($w_sub_name[3]){
		case "s1" : 
			$w_a_num = 1; 
			$w_s_title_1="고객센터 관리";
			switch($w_b_num){
				case "1" : $w_s_title_2="고객의 소리"; break;
				case "2" : $w_s_title_2="일성 창업상담"; break;
				case "3" : $w_s_title_2="일성 오너쉐프제도"; break;
			}
		break;
		case "s2" : 
			$w_a_num = 2; 
			$w_s_title_1="회원 관리";
			switch($w_b_num){
				case "1" : $w_s_title_2="회원 목록"; break;
				case "2" : $w_s_title_2="회원 SMS 관리"; break;
				case "3" : $w_s_title_2="회원 E-mail 관리"; break;
			}
		break;
		case "s3" : 
			$w_a_num = 3; 
			$w_s_title_1="단골고객/우동맛 관리";
			switch($w_b_num){
				case "1" : $w_s_title_2="단골고객"; break;
				case "2" : $w_s_title_2="미스터리 쇼퍼"; break;
				case "3" : $w_s_title_2="스시노 미식회"; break;
				case "4" : $w_s_title_2="체험단"; break;
				case "5" : $w_s_title_2="이벤트"; break;
				case "6" : $w_s_title_2="우리동네 공지사항"; break;
				case "7" : $w_s_title_2="함께갈레요 관리"; break;
				case "8" : $w_s_title_2="후가작성 관리"; break;
			}
		break;
	}
	if($w_a_num){
		$w_a_num = $w_a_num-1;
	}
	$w_b_num = $w_b_num-1;
}
?>