<?
switch($sb_sido){
	case '0':
		$sb_sido = "서울";
		break;
	case '1':
		$sb_sido = "부산";
		break;
	case '2':
		$sb_sido = "대구";
		break;
	case '3':
		$sb_sido = "인천";
		break;
	case '4':
		$sb_sido = "광주";
		break;
	case '5':
		$sb_sido = "대전";
		break;
	case '6':
		$sb_sido = "울산";
		break;
	case '7':
		$sb_sido = "세종특별자치시";
		break;
	case '8':
		$sb_sido = "경기";
		break;
	case '9':
		$sb_sido = "강원";
		break;
	case '10':
		$sb_sido = "충북";
		break;
	case '11':
		$sb_sido = "충남";
		break;
	case '12':
		$sb_sido = "전북";
		break;
	case '13':
		$sb_sido = "전남";
		break;
	case '14':
		$sb_sido = "경북";
		break;
	case '15':
		$sb_sido = "경남";
		break;
	case '16':
		$sb_sido = "제주특별자치도";
		break;
	case "A":
		$sb_sido = "A";//전체
		break;
	default :
		break;
}
if($sb_sido == "A"){
	$sb_our_area = $sb_sido;
}else{
	$sb_our_area = $sb_sido." ".$sb_addr_sec;
}

?>