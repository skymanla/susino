<?php
/*
Ryan skymanla
review function
 */
function to_member($getVal){
	switch($getVal){
		case "1":
			$result = "1인";
			break;
		case "2":
			$result = "2인";
			break;
		case "3":
			$result = "3인";
			break;
		case "4":
			$result = "4인";
			break;
		case "5":
			$result = "5인";
			break;
		case "6":
			$result = "6인";
			break;
		case "7":
			$result = "7인 이상";
			break;
	}
	return $result;
}

function to_gether($getVal){
	switch($getVal){
		case "family":
			$to_gether = "가족";
			break;
		case "friend":
			$to_gether = "친구";
			break;
		case "partner":
			$to_gether = "연인";
			break;
		case "fellow":
			$to_gether = "동료";
			break;
		default :
			$to_gether = "입력 오류";
			break;
	}
	return $to_gether;
}

function to_get_time($getVal){
	switch($getVal){
		case "1":
			$to_menu_time = "10분 이내";
			break;
		case "2":
			$to_menu_time = "약 10~20분";
			break;
		case "3":
			$to_menu_time = "약 20~30분";
			break;
		case "4":
			$to_menu_time = "약 30~40분";
			break;
		case "5":
			$to_menu_time = "약 40분 이상";
			break;
	}
	return $to_menu_time;
}
function to_get_like($getVal){
	switch($getVal){
		case "1":
			$to_menu_depth = "너무 좋아요.";
			break;
		case "2":
			$to_menu_depth = "만족해요.";
			break;
		case "3":
			$to_menu_depth = "괜찮아요.";
			break;
		case "4":
			$to_menu_depth = "부족해요.";
			break;
		case "5":
			$to_menu_depth = "불만 있어요.";
			break;
	}
	return $to_menu_depth;
}

function to_get_score($getVal){
	switch($getVal){
		case "1":
			$to_get_score = "1점";
			break;
		case "2":
			$to_get_score = "2점";
			break;
		case "3":
			$to_get_score = "3점";
			break;
		case "4":
			$to_get_score = "4점";
			break;
		case "5":
			$to_get_score = "5점";
			break;
	}
	return $to_get_score;
}

function to_get_hello($getVal){
	switch($getVal){
		case "1":
			$to_get_hello = "네, 모두 인사를 해주셨습니다.";
			break;
		case "2":
			$to_get_hello = "아니오, 인사가 없었습니다.";
			break;
		case "3":
			$to_get_hello = "잘 모르겠습니다.";
			break;
	}
	return $to_get_hello;
}

function to_get_ascote($getVal){
	switch($getVal){
		case "1":
			$to_get_ascote = "에스코트 받으며 친절하게 안내해주셨습니다.";
			break;
		case "2":
			$to_get_ascote = "에스코트는 없었지만 친절하게 안내해주셨습니다.";
			break;
		case "3":
			$to_get_ascote = "에스코트없이 알아서 자리를 찾았습니다.";
			break;
	}
	return $to_get_ascote;
}

function to_get_menu($getVal){
	switch($getVal){
		case "1":
			$to_get_menu = "네, 메뉴 추천과 이벤트 안내를 받았습니다.";
			break;
		case "2":
			$to_get_menu = "메뉴 추천을 받았지만 이벤트 안내는 받지 못했습니다.";
			break;
		case "3":
			$to_get_menu = "이벤트 안내는 받았지만 메뉴 추천은 받지 못했습니다.";
			break;
		case "4":
			$to_get_menu = "아니오, 메뉴 추천과 이벤트 안내 모두 받지 못했습니다.";
			break;
	}
	return $to_get_menu;
}

function to_get_table($getVal){
	switch($getVal){
		case "1":
			$to_get_table = "네, 먹는 순서와 소스에 대한 설명을 받았습니다.";
			break;
		case "2":
			$to_get_table = "아니오, 설명이 없었습니다.";
			break;
		case "3":
			$to_get_table = "잘 모르겠습니다.";
			break;
	}
	return $to_get_table;
}

function to_get_clean_store($getVal){
	switch($getVal){
		case "1":
			$to_get_clean_store = "네, 잘 정돈되었습니다.";
			break;
		case "2":
			$to_get_clean_store = "아니오, 정돈되지 않았습니다.";
			break;
		case "3":
			$to_get_clean_store = "특별한 기억이 없습니다.";
			break;
	}
	return $to_get_clean_store;
}

function to_get_like_yn($getVal){
	switch($getVal){
		case "1":
			$to_get_like_yn = "네, 좋았습니다.";
			break;
		case "2":
			$to_get_like_yn = "아니오, 불편했습니다.";
			break;
	}
	return $to_get_like_yn;
}

function to_get_arrangement($getVal){
	switch($getVal){
		case "1":
			$result = "네, 잘 정리되어 있었습니다.";	
			break;
		case "2":
			$result = "아니오, 정돈되어 있지 않았습니다.";
			break;
	}
	return $result;
}

function to_get_clean_yn($getVal){
	switch($getVal){
		case "1":
			$result = "네, 깨끗했습니다.";
			break;
		case "2":
			$result = "아니오, 지저분했습니다.";
			break;	
	}
	return $result;
}
?>