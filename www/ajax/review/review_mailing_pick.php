<?php
include_once($_SERVER['DOCUMENT_ROOT']."/ajax/review/score_function.php");

$content = "
			<div style='position:relative;padding:5%'>
				<p style='color:red'>기본 입력 사항</p>
				<ul>
					<li>방문 날짜 : ".$_POST['visit_date']."</li>
					<li>방문 매장 : ".$sbr_s_sido." ".$_POST['addr_sec']."</li>
					<li>방문 인원 : ".to_member($_POST['to_person'])."</li>
					<li>모임 종류 : ".to_gether($_POST['to_gether'])."</li>
					<li>블로그 URL : <a href='".$_POST['to_menu']."' target='_blank'>".$_POST['to_menu']."</a></li>
				</ul>
				<p style=\"color:red\">맛 평가(Quality)</p>
				<ul>
					<li>메뉴의 전체적인 모양과 색, 비주얼 평가 : ".to_get_like($_POST['to_menu_depth'])."</li>
					<li>주문 후 메뉴가 나온 시간 : ".to_get_time($_POST['to_menu_time'])."</li>
					<li>초밥의 밥(샤리) 평가 : ".to_get_like($_POST['to_menu_rice'])."</li>
					<li>초밥의 생선(네타) 평가 : ".to_get_like($_POST['to_menu_fish'])."</li>
					<li>초밥 맛의 만족도 평가(5점 만점) : ".to_get_score($_POST['to_menu_score'])."</li>
					<li>전반적인 매장의 초밥 미식평 : ".$_POST['to_ftalk']."</li>
				</ul>
				<p style=\"color:red\">서비스 평가(Service)<p>
				<ul>
					<li>방문 시 직원 인사 평가 : ".to_get_hello($_POST['to_station_hello'])."</li>
					<li>자리 안내 시 응대 평가 : ".to_get_ascote($_POST['to_station_help'])."</li>
					<li>주문 시 추천 메뉴 및 이벤트 안내 평가 : ".to_get_menu($_POST['to_station_menu'])."</li>
					<li>메뉴가 테이블에 나왔을 때 설명 평가 : ".to_get_table($_POST['to_station_exp'])."</li>
					<li>전체적인 서비스 평가 : ".to_get_score($_POST['to_station_score'])."</li>
				</ul>
				<p style=\"color:red\">클린 평가(Clean)</p>
				<ul>
					<li>매장 외부 정돈 평가 : ".to_get_clean_store($_POST['to_clean_out'])."</li>
					<li>매장 내부 정돈 평가 : ".to_get_clean_store($_POST['to_clean_in'])."</li>
					<li>매장 내 음악 소리 평가 : ".to_get_like_yn($_POST['to_clean_sound'])."</li>
					<li>매장의 온도 평가 : ".to_get_like_yn($_POST['to_clean_temper'])."</li>
					<li>테이블 정돈 평가 : ".to_get_arrangement($_POST['to_clean_table'])."</li>
					<li>메뉴판 및 홍보물 정돈 평가 : ".to_get_clean_yn($_POST['to_clean_menu'])."</li>
					<li>직원 복장 평가 : ".to_get_clean_yn($_POST['to_clean_dress'])."</li>
					<li>전체적 환경/청결도 평가 : ".to_get_score($_POST['to_clean_score'])."</li>
					<li>맛/서비스/클린에 대한 총평 : ".$_POST['to_all_score']."</li>
				</ul>
			</div>";
?>