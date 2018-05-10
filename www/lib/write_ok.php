<?php 
include_once $_SERVER['DOCUMENT_ROOT']."/lib/dbconn.php";
$flag					= trim($_POST['flag']);
if($flag == 'notice' || $flag == 'event')
{
	include_once($_SERVER['DOCUMENT_ROOT']."/lib/Session.php");
}
include_once($_SERVER['DOCUMENT_ROOT']."/lib/function.php");

if($flag != 'business')
{
	if($flag != 'customer')
	{
		if($_POST['file1'])
		{
			include_once($_SERVER['DOCUMENT_ROOT']."/lib/file_upload.php"); // 파일 처리 함수
			$new_file1 = $new_file1;
		}
		else
		{
			$new_file1 = $_POST['file2'];
		}
	}
	else
	{
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

if($flag == 'customer')
{
	$board_name	= "sb_customer";

	$query = "INSERT INTO $board_name (sbc_name, sbc_hp, sbc_email, sbc_title, sbc_contents, sbc_file, sbc_rdate, sbc_udate) VALUES ('$name','$hp','$email','$title','$content','$new_file1',now(),now())";
	$conn->query($query);
	$url = "/page/scenter/s1.php";
	echoAlert("고객의 소리가 등록되었습니다.");
	echoMovePage($url);
}
else if($flag == 'business')
{
	$board_name	= "sb_business";

	$query = "INSERT INTO $board_name (sbb_name, sbb_hp, sbb_email, sbb_aria, sbb_aria2, sbb_contents, sbb_store, sbb_use, sbb_rdate) VALUES ('$name','$hp2','$email2','$aria','$aria2','$content','$store','$use',now())";
	$conn->query($query);
	$url = "/together/";
	echoAlert("창업상담이 등록되었습니다.");
	echoMovePage($url);
}
else if($flag == 'notice')
{
	$board_name	= "sb_notice";

	if($mode == 'w')
	{
		$query = "INSERT INTO $board_name (sbn_title, sbn_contents, sbn_file, sbn_count, sbn_rdate, sbn_udate) VALUES ('$title','$content','$new_file1',0,now(),now())";
		$conn->query($query);
		$url = "/page/s1/s6.php";
		echoAlert("공지사항이 등록되었습니다.");
		echoMovePage($url);
	}
	else if($mode == 'd')
	{
		$query = "SELECT * FROM $board_name where sbn_idx = '".$idx."'";
		$result = $conn->query($query);
		$row = $result->fetch_assoc();

		$query2 = "delete FROM $board_name where sbn_idx = '".$row['sbn_idx']."'";
		$conn->query($query2);

		@unlink("/data/notice/".$row['sbn_file']);

		$url = "/page/s1/s6.php";
		echoAlert("공지사항이 삭제되었습니다.");
		echoMovePage($url);
	}
	else if($mode == 'u')
	{
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
}
else if($flag == 'store')
{
	$board_name	= "sb_store";

	if($mode == 'w')
	{
		$query = "INSERT INTO $board_name (sbs_no, sbs_series, sbs_type, sbs_new, sbs_name, sbs_tel, sbs_link1, sbs_link2, sbs_zip, sbs_address, sbs_address2, sbs_rdate) VALUES ('$no','$series','$type','$new','$name','$tel','$link1','$link2','$zip','$address','$address2',now())";
		$conn->query($query);
		$url = "/page/s3/s1.php";
		echoAlert("매장이 등록되었습니다.");
		echoMovePage($url);
	}
	else if($mode == 'd')
	{
		$query = "SELECT * FROM $board_name where sbs_idx = '".$idx."'";
		$result = $conn->query($query);
		$row = $result->fetch_assoc();

		$query2 = "delete FROM $board_name where sbs_idx = '".$row['sbs_idx']."'";
		$conn->query($query2);

		$url = "/page/s3/s1.php";
		echoAlert("매장이 삭제되었습니다.");
		echoMovePage($url);
	}
	else if($mode == 'u')
	{
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
		$query .= " sbs_address2		=	'".$address2."'";
		$query .= "	WHERE sbs_idx	=	'".$idx."'";
		$conn->query($query);
		$url = "/page/s3/s1.php";
		echoAlert("매장이 수정되었습니다.");
		echoMovePage($url);
	}
}
else if($flag == 'event')
{
	$board_name	= "sb_event";

	if($mode == 'w')
	{
		$query = "INSERT INTO $board_name (sbe_sdate, sbe_edate, sbe_idate, sbe_title, sbe_contents, sbe_file, sbe_rdate, sbe_udate) VALUES ('$sdate','$edate','$idate','$title','$content','$new_file1',now(),now())";
		$conn->query($query);
		$url = "/page/s6/s2.php";
		echoAlert("이벤트가 등록되었습니다.");
		echoMovePage($url);
	}
	else if($mode == 'd')
	{
		$query = "SELECT * FROM $board_name where sbe_idx = '".$idx."'";
		$result = $conn->query($query);
		$row = $result->fetch_assoc();

		$query2 = "delete FROM $board_name where sbe_idx = '".$row['sbe_idx']."'";
		$conn->query($query2);

		@unlink("/data/event/".$row['sbe_file']);

		$url = "/page/s6/s2.php";
		echoAlert("이벤트가 삭제되었습니다.");
		echoMovePage($url);
	}
	else if($mode == 'u')
	{
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
		$url = "/page/s6/s2.php";
		echoAlert("이벤트가 수정되었습니다.");
		echoMovePage($url);
	}
}
?>