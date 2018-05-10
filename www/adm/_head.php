<?php 
session_start();
include_once $_SERVER['DOCUMENT_ROOT']."/lib/dbconn.php";
include_once($_SERVER['DOCUMENT_ROOT']."/lib/Session.php");
include_once($_SERVER['DOCUMENT_ROOT']."/adm/_inc/page.php");
?>
<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>스시노백쉐프 관리자</title>
	<link rel="stylesheet" type="text/css" href="/adm/css/reset.css" />
	<link rel="stylesheet" type="text/css" href="/adm/css/layout.css" />
	<link rel="stylesheet" type="text/css" href="/adm/css/jquery-ui.min.css" />
	<script type="text/javascript" src="/adm/js/jquery-1.12.4.min.js"></script>
	<script type="text/javascript">
	//<![CDATA[
		var a_num = "<?php echo $w_a_num;?>";
		var b_num =  "<?php echo $w_b_num;?>";
	//]]>
	</script>
</head>
<body>
<!-- STR warp -->
<div id="wrap">
	<!-- STR header -->
	<?php include_once '_inc/header.php';?>
	<!-- END header -->
	<!-- STR lng_wrap -->
	<nav id="lng_wrap">
		<div class="member_wrap">
			<div class="m_info">
				<div class="name">최고관리자님</div>
				<a href="/lib/log_out.php">로그아웃</a>
			</div>
			<dl class="data">
				<dt>로그인 IP</dt><dd><?php echo $_SERVER['REMOTE_ADDR'];?></dd>
				<dt>등급</dt><dd>최고관리자</dd>
			</dl>
		</div>
		<?php include_once '_inc/lnb'.$w_a_num.'.php';?>
		<a href="/" target="_blank" title="새창으로 열립니다." class="title go_home">스시노백 바로가기</a>
		<a href="/together" target="_blank" title="새창으로 열립니다." class="title go_home">일성창업 바로가기</a>
	</nav>
	<!-- END lng_wrap -->
	<!-- STR contents -->
	<section id="contents">
		<div class="headgroup1">
			<h2><?php echo $w_s_title_1;?></h2>
			<nav>관리자 홈<span>/</span><?php echo $w_s_title_1;?><span>/</span><?php echo $w_s_title_2;?></nav>
		</div>