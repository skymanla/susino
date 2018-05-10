<?php
header('Content-Type: application/json');
include_once $_SERVER['DOCUMENT_ROOT']."/lib/dbconn.php";

$query = "SELECT * FROM sb_store";
$result = $conn->query($query);
$total_rows = mysqli_num_rows($result);

$data = '';
$i = 0;
while($row = $result->fetch_assoc())
{
	$data .= '{
		"id" : "'.$row['sbs_idx'].'",
		"addr" : "'.$row['sbs_address'].'",
		"info" : "'.$row['sbs_name'].'",
		"call" : "'.$row['sbs_tel'].'",
		"type" : "'.$row['sbs_type'].'",
		"link" : "'.$row['sbs_link1'].'",
		"link2" : "'.$row['sbs_link2'].'"
	}';
	$i++;
	if($i < $total_rows) $data .= ',';
}

die('['.$data.']');

//"addr" : "'.$row['sbs_address'].'",
//die('[
	//{
		//"id" : "1",
		//"addr" : "서울 동대문구",
		//"info" : "동대문 지점",
		//"call" : "02-1234-1234",
		//"type" : "2",
		//"link" : "https://www.naver.com/",
		//"link2" : "/page/s3/s4.php"
	//},
	//{
		//"id" : "2",
		//"addr" : "서울 종로구 서린동",
		//"info" : "베스트 지점",
		//"call" : "02-1234-1234",
		//"type" : "3",
		//"link" : "https://www.naver.com/",
		//"link2" : ""
	//},
	//{
		//"id" : "3",
		//"addr" : "경기 남양주시",
		//"info" : "남양주 지점",
		//"call" : "02-1234-1234",
		//"type" : "2",
		//"link" : "https://www.naver.com/",
		//"link2" : ""
	//},
	//{
		//"id" : "4",
		//"addr" : "경기 남양주시 퇴계원",
		//"info" : "퇴계원 지점",
		//"call" : "02-1234-1234",
		//"type" : "2",
		//"link" : "https://www.naver.com/",
		//"link2" : ""
	//},
	//{
		//"id" : "5",
		//"addr" : "경기 남양주시 도농",
		//"info" : "베스트 지점",
		//"call" : "02-1234-1234",
		//"type" : "3",
		//"link" : "https://www.naver.com/",
		//"link2" : ""
	//},
	//{
		//"id" : "6",
		//"addr" : "경기 남양주시 진접",
		//"info" : "베스트 지점",
		//"call" : "02-1234-1234",
		//"type" : "1",
		//"link" : "https://www.naver.com/",
		//"link2" : ""
	//},
	//{
		//"id" : "7",
		//"addr" : "경기 구리시",
		//"info" : "베스트 지점",
		//"call" : "02-1234-1234",
		//"type" : "1",
		//"link" : "https://www.naver.com/",
		//"link2" : ""
	//},
	//{
		//"id" : "8",
		//"addr" : "경기 부천시",
		//"info" : "부천시 지점",
		//"call" : "02-1234-1234",
		//"type" : "1",
		//"link" : "https://www.naver.com/",
		//"link2" : ""
	//},
	//{
		//"id" : "9",
		//"addr" : "경기 동두천시",
		//"info" : "동두천시 지점",
		//"call" : "02-1234-1234",
		//"type" : "3",
		//"link" : "https://www.naver.com/",
		//"link2" : ""
	//},
	//{
		//"id" : "10",
		//"addr" : "부산",
		//"info" : "부산 지점",
		//"call" : "02-1234-1234",
		//"type" : "1",
		//"link" : "https://www.naver.com/",
		//"link2" : ""
	//},
	//{
		//"id" : "11",
		//"addr" : "부산 중구",
		//"info" : "중구 지점",
		//"call" : "02-1234-1234",
		//"type" : "2",
		//"link" : "https://www.naver.com/",
		//"link2" : ""
	//},
	//{
		//"id" : "12",
		//"addr" : "서울시 서초구",
		//"info" : "서초구청 110호점",
		//"call" : "02-1234-1234",
		//"type" : "1",
		//"link" : "https://www.naver.com/",
		//"link2" : ""
	//},
	//{
		//"id" : "13",
		//"addr" : "서울특별시 중구 소공로 70 (충무로 1가) 서울 중앙 우체국",
		//"info" : "신도림 디큐브시티 109호점",
		//"call" : "02-1234-1234",
		//"type" : "2",
		//"link" : "https://www.naver.com/",
		//"link2" : ""
	//},
	//{
		//"id" : "14",
		//"addr" : "서울시 서초구 양재동",
		//"info" : "건대스타시티몰 108호점",
		//"call" : "02-1234-1234",
		//"type" : "3",
		//"link" : "https://www.naver.com/",
		//"link2" : ""
	//}
//]');