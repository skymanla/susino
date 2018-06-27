<?php 
include_once $_SERVER['DOCUMENT_ROOT']."/lib/dbconn.php";
$flag					= trim($_POST['flag']);//게시판 정보
if($flag == 'notice' || $flag == 'event' || $flag == "shopper" || $flag == "ftalk" || $flag == "pick" || $flag == "invite"){//관리자 세션 체크하는 듯?
	include_once($_SERVER['DOCUMENT_ROOT']."/lib/Session.php");
}

include_once($_SERVER['DOCUMENT_ROOT']."/lib/function.php");

if($flag != 'business'){
	if($flag != 'customer')	{
		if($_POST['file1'])	{
			include_once($_SERVER['DOCUMENT_ROOT']."/lib/file_upload.php"); // 파일 처리 함수
			$new_file1 = $new_file1;
		}else{
			$new_file1 = $_POST['file2'];
		}
	}else{
		include_once($_SERVER['DOCUMENT_ROOT']."/lib/file_upload.php"); // 파일 처리 함수
	}
}

$idx						= trim($_POST['idx']);
$mode				= trim($_POST['mode']);
$name				= trim($_POST['name']);
$hp						= trim($_POST['hp1']."-".$_POST['hp2']."-".$_POST['hp3']);
$hp2					= trim($_POST['hp']);
$email					= trim($_POST['email1']."@".$_POST['email2']);
$email2				= trim($_POST['email']);
$title					= trim($_POST['title']);
$content				= trim($_POST['content']);
$no						= trim($_POST['no']);
$type					= trim($_POST['type']);
$tel						= trim($_POST['tel']);
$link1					= trim($_POST['link1']);
$link2					= trim($_POST['link2']);
$zip						= trim($_POST['zip']);
$address			= trim($_POST['address']);
$address2			= trim($_POST['address2']);
$new					= trim($_POST['new']);
$series				= trim($_POST['series']);
$sdate				= trim($_POST['sdate']);
$edate				= trim($_POST['edate']);
$idate					= trim($_POST['idate']);
$aria					= trim($_POST['aria']);
$aria2					= trim($_POST['aria2']);
$store					= trim($_POST['store']);
$use					= trim($_POST['use']);
//add Ryan 180612
//작성자 확인용
$ip = $_SERVER['REMOTE_ADDR'];
$w_id = $_SESSION['sba_id'];

//상점 변수 추가
$sbs_option					= $_POST['sbs_option'];
$sbs_op_p					= $_POST['sbs_op_p'];
$sbs_op_q1					= $_POST['sbs_op_q1'];
$sbs_op_q2					= $_POST['sbs_op_q2'];

//미스테리쇼퍼, 체험단, 미식회 공통
$flag_depth1 = $conn->real_escape_string($_POST['flag_depth1']);
$shopper_lvl = $_POST['shopper_lvl'];
$sb_sido = $_POST['s_sido'];
$limit_num = $conn->real_escape_string($_POST['limit_num']);
$sb_addr_sec = $_POST['addr_sec'];
include_once($_SERVER['DOCUMENT_ROOT']."/ajax/register_our_area.php");
//end

if($flag == 'customer'){
	$board_name	= "sb_customer";

	$query = "INSERT INTO $board_name (sbc_name, sbc_hp, sbc_email, sbc_title, sbc_contents, sbc_file, sbc_rdate, sbc_udate) VALUES ('$name','$hp','$email','$title','$content','$new_file1',now(),now())";
	$conn->query($query);
	$url = "/page/scenter/s1.php";
	echoAlert("고객의 소리가 등록되었습니다.");
	echoMovePage($url);
}else if($flag == 'business'){
	$board_name	= "sb_business";

	$query = "INSERT INTO $board_name (sbb_name, sbb_hp, sbb_email, sbb_aria, sbb_aria2, sbb_contents, sbb_store, sbb_use, sbb_rdate) VALUES ('$name','$hp2','$email2','$aria','$aria2','$content','$store','$use',now())";
	$conn->query($query);
	$url = "/together/";
	echoAlert("창업상담이 등록되었습니다.");
	echoMovePage($url);
}else if($flag == 'notice'){
	$board_name	= "sb_notice";

	if($mode == 'w')	{
		$query = "INSERT INTO $board_name (sbn_title, sbn_contents, sbn_file, sbn_count, sbn_rdate, sbn_udate) VALUES ('$title','$content','$new_file1',0,now(),now())";
		$conn->query($query);
		$url = "/page/s1/s6.php";
		echoAlert("공지사항이 등록되었습니다.");
		echoMovePage($url);
	}else if($mode == 'd'){
		$query = "SELECT * FROM $board_name where sbn_idx = '".$idx."'";
		$result = $conn->query($query);
		$row = $result->fetch_assoc();

		$query2 = "delete FROM $board_name where sbn_idx = '".$row['sbn_idx']."'";
		$conn->query($query2);

		@unlink("/data/notice/".$row['sbn_file']);

		$url = "/page/s1/s6.php";
		echoAlert("공지사항이 삭제되었습니다.");
		echoMovePage($url);
	}else if($mode == 'u'){
		$query	 = "UPDATE $board_name SET ";
		$query .= " sbn_title					=	'".$title."',";
		$query .= " sbn_contents			=	'".$content."',";
		$query .= " sbn_file					=	'".$new_file1."',";
		$query .= " sbn_udate				=	now()";
		$query .= "	WHERE sbn_idx	=	'".$idx."'";
		$conn->query($query);
		$url = "/page/s1/s6.php";
		echoAlert("공지사항이 수정되었습니다.");
		echoMovePage($url);
	}
}else if($flag == 'store'){
	$board_name	= "sb_store";
	//print_r($sbs_option);
	$sbs_option = implode('||',$sbs_option);
	//echo $sbs_option;
	//exit;
	if($mode == 'w'){
		$query = "INSERT INTO $board_name (sbs_no, sbs_series, sbs_type, sbs_new, sbs_name, sbs_tel, sbs_link1, sbs_link2, sbs_zip, sbs_address, sbs_address2, sbs_option, sbs_op_p, sbs_op_q1, sbs_op_q2, sbs_rdate) VALUES ('$no','$series','$type','$new','$name','$tel','$link1','$link2','$zip','$address','$address2','$sbs_option,'$sbs_op_p','$sbs_op_q1','$sbs_op_q2',now())";
		$conn->query($query);
		$url = "/page/s3/s1.php";
		echoAlert("매장이 등록되었습니다.");
		echoMovePage($url);
	}else if($mode == 'd'){
		$query = "SELECT * FROM $board_name where sbs_idx = '".$idx."'";
		$result = $conn->query($query);
		$row = $result->fetch_assoc();

		$query2 = "delete FROM $board_name where sbs_idx = '".$row['sbs_idx']."'";
		$conn->query($query2);

		$url = "/page/s3/s1.php";
		echoAlert("매장이 삭제되었습니다.");
		echoMovePage($url);
	}else if($mode == 'u'){
		$query	 = "UPDATE $board_name SET ";
		$query .= " sbs_no					=	'".$no."',";
		$query .= " sbs_series				=	'".$series."',";
		$query .= " sbs_type					=	'".$type."',";
		$query .= " sbs_new					=	'".$new."',";
		$query .= " sbs_name				=	'".$name."',";
		$query .= " sbs_tel					=	'".$tel."',";
		$query .= " sbs_link1				=	'".$link1."',";
		$query .= " sbs_link2				=	'".$link2."',";
		$query .= " sbs_zip					=	'".$zip."',";
		$query .= " sbs_address			=	'".$address."',";
		$query .= " sbs_address2		=	'".$address2."',";
		$query .= " sbs_option		=	'".$sbs_option."',";
		$query .= " sbs_op_p		=	'".$sbs_op_p."',";
		$query .= " sbs_op_q1		=	'".$sbs_op_q1."',";
		$query .= " sbs_op_q2		=	'".$sbs_op_q2."'";
		$query .= "	WHERE sbs_idx	=	'".$idx."'";
		$conn->query($query);
		//$url = "/page/s3/s1.php";
		$url = "/page/s3/s1swrite.php?mode=u&idx=".$idx;
		echoAlert("매장이 수정되었습니다.");
		echoMovePage($url);
	}
}else if($flag == 'event'){//이벤트 등록
	$board_name	= "sb_event";
	if($mode == 'w')	{
		$query = "INSERT INTO $board_name (sbe_sdate, sbe_edate, sbe_idate, sbe_title, sbe_contents, sbe_file, sbe_rdate, sbe_udate) VALUES ('$sdate','$edate','$idate','$title','$content','$new_file1',now(),now())";
		$conn->query($query);
		$url = "/page/s6/s2.php";
		echoAlert("이벤트가 등록되었습니다.");
		echoMovePage($url);
	}else if($mode == 'd'){
		$query = "SELECT * FROM $board_name where sbe_idx = '".$idx."'";
		$result = $conn->query($query);
		$row = $result->fetch_assoc();

		$query2 = "delete FROM $board_name where sbe_idx = '".$row['sbe_idx']."'";
		$conn->query($query2);

		@unlink("/data/event/".$row['sbe_file']);

		$url = "/adm/page/s3/s5.php";
		echoAlert("이벤트가 삭제되었습니다.");
		echoMovePage($url);
	}else if($mode == 'u'){
		$query	 = "UPDATE $board_name SET ";
		$query .= " sbe_sdate				=	'".$sdate."',";
		$query .= " sbe_edate				=	'".$edate."',";
		$query .= " sbe_idate				=	'".$idate."',";
		$query .= " sbe_title					=	'".$title."',";
		$query .= " sbe_contents			=	'".$content."',";
		$query .= " sbe_file					=	'".$new_file1."',";
		$query .= " sbe_udate				=	now() ";
		$query .= "	WHERE sbe_idx	=	'".$idx."'";
		$conn->query($query);
		$url = "/adm/page/s3/s5.php";
		echoAlert("이벤트가 수정되었습니다.");
		echoMovePage($url);
	}
}else if($flag=="application"){//신청형 게시판
	if($flag_depth1 != 'shopper' xor $flag_depth1 != 'ftalk' xor $flag_depth1 != 'pick') die('not flag_depth1');//맞지 않으면 애당초 안타게
	//page url
	if($flag_depth1 == 'shopper'){
		$url = "/adm/page/s3/s2sview.php";
	}else if($flag_depth1 == 'ftalk'){
		$url = "/adm/page/s3/s3sview.php";
	}else if($flag_depth1 == 'pick'){
		$url = "/adm/page/s3/s4sview.php";
	}
	$board_name = "sb_application_board";
	$sdate = $_POST['sdate']." 00:00:00";
	$edate = $_POST['edate']." 23:59:59";
	if($mode=="w"){
		//idx check
		$query = "select sbab_idx from $board_name where 1 order by sbab_idx desc limit 1";
		$q = $conn->query($query);
		$v = $q->fetch_assoc();
		if(empty($v['sbab_idx'])){
			$sbab_idx = 1;
		}else{
			$sbab_idx = $v['sbab_idx'];
			$sbab_idx++;
		}
		

		$query = "insert into $board_name 
					(sbab_idx, sbab_cate, sbab_sdate, sbab_edate, sbab_lvl, sbab_area, sbab_limit, sbab_title, sbab_content, sbab_rdate, sbab_id, sbab_ip)
					values
					('$sbab_idx', '$flag_depth1', '$sdate', '$edate', '$shopper_lvl', '$sb_our_area', '$limit_num', $title', '$content', now(), '$w_id', '$ip')";
		if($conn->query($query)){
			$url .= "?idx=$sbab_idx";
			echoAlert("이벤트가 등록되었습니다.");
			echoMovePage($url);	
		}else{
			die('error');
		}
		
	}else if($mode == 'u'){
		$query = "update $board_name set
					sbab_sdate='$sdate',
					sbab_edate='$edate',
					sbab_lvl='$shopper_lvl',
					sbab_area='$sb_our_area',
					sbab_limit = '$limit_num',
					sbab_title='$title',
					sbab_content='$content',
					sbab_udate=now(),
					sbab_id='$w_id',
					sbab_ip='$ip'
				where sbab_idx='$idx' and sbab_cate='$flag_depth1'
				";
		if($conn->query($query)){
			$url .= "?idx=$idx";
			echoAlert("이벤트가 수정되었습니다.");
			echoMovePage($url);
		}else{
			die($query);
		}
	}
}else if($flag == "App_notice"){
	$board_name = "sb_application_notice_board";
	if($mode=="w"){
		//idx check
		$query = "select sbab_idx from $board_name where 1 order by sbab_idx desc limit 1";
		$q = $conn->query($query);
		$v = $q->fetch_assoc();
		if(empty($v['sbab_idx'])){
			$sbab_idx = 1;
		}else{
			$sbab_idx = $v['sbab_idx'];
			$sbab_idx++;
		}
		

		$query = "insert into $board_name 
					(sbab_idx, sbab_area, sbab_title, sbab_content, sbab_rdate, sbab_id, sbab_ip)
					values
					('$sbab_idx', '$sb_our_area', '$title', '$content', now(), '$w_id', '$ip')";
		
		if($conn->query($query)){
			$url = "/adm/page/s3/s6.php?idx=$sbab_idx";
			echoAlert("이벤트가 등록되었습니다.");
			echoMovePage($url);	
		}else{
			die($query);
		}
		
	}else if($mode == 'u'){
		$query = "update $board_name set
					sbab_area='$sb_our_area',
					sbab_title='$title',
					sbab_content='$content',
					sbab_udate=now(),
					sbab_id='$w_id',
					sbab_ip='$ip'
				where sbab_idx='$idx''
				";
		if($conn->query($query)){
			$url = "/adm/page/s3/s6.php?idx=$idx";
			echoAlert("이벤트가 수정되었습니다.");
			echoMovePage($url);
		}else{
			die($query);
		}
	}
}else if($flag == "invite"){
	$invite_rate1 = $_POST['invite_rate1'];
	$invite_rate2 = $_POST['invite_rate2'];

	for($i=1;$i<5;$i++){
		$sbia_option[$i] = $_POST["invite_prize_{$i}"]."||".$_POST["invite_prize_{$i}_product"];
	}
	$board_name = "sb_invite_admin";
	$sdate = $sdate." 00:00:00";
	$edate = $edate." 23:59:59";
	//여긴 update 따윈 없다
	$sql = "select sbia_idx from $board_name where 1=1 order by sbia_idx desc limit 1";
	$q = $conn->query($sql);
	$v = $q->fetch_assoc();
	if(empty($v['sbia_idx'])){
		$sbia_idx = 1;
	}else{
		$sbia_idx = $v['sbia_idx'];
		$sbia_idx++;
	}
	//insert
	$query = "insert into $board_name
			(sbia_idx, sbia_sdate, sbia_edate, sbia_prize_rate1, sbia_prize_rate2, sbia_prize_option1, sbia_prize_option2, sbia_prize_option3, sbia_prize_option4, sbia_rdate, sbia_write, sbia_ip)
			values
			('$sbia_idx', '$sdate', '$edate', '$invite_rate1', '$invite_rate2', '$sbia_option[1]', '$sbia_option[2]', '$sbia_option[3]', '$sbia_option[4]', now(), '$w_id', '$ip')
			";
	if($conn->query($query)){
		$url = "/adm/page/s3/s7slist3.php";
		echoAlert("당첨자 확률이 수정되었습니다.");
		echoMovePage($url);
	}else{
		die($query);
	}
}else if($flag == "ownerchef"){
	$board_name = "sb_ownerchef";
	$sql = "select sbb_idx from $board_name where 1=1 order by sbb_idx desc limit 1";
	$q = $conn->query($sql);
	$v = $q->fetch_assoc();
	if(empty($v[sbb_idx])){
		$sbb_idx = 1;
	}else{
		$sbb_idx = $v[sbb_idx];
		$sbb_idx++;
	}
	$query = "insert into $board_name
				(sbb_idx, sbb_name, sbb_hp, sbb_email, sbb_aria, sbb_aria2, sbb_contents, sbb_store, sbb_use, sbb_rdate)
				values
				('$sbb_idx', '$name','$hp2','$email2','$aria','$aria2','$content','$store','$use',now())";
	if($conn->query($query)){
		$url = "/ownerchef/";
		echoAlert("오너쉐프 상담 신청하기가 등록되었습니다.");
		echoMovePage($url);		
	}else{
		die($query);
	}	
}
?>