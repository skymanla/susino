<?php 
session_start();
include_once "inc/page.php";
?>
<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=1500, user-scalable=yes">
	<title>수제초밥이 신선하고 맛있는 집, 스시노백쉐프</title>
	<link rel="shortcut icon" type="image/x-icon" href="/img/favicon/favicon1.ico" />
	<link rel="stylesheet" type="text/css" href="/css/reset.css" />
	<link rel="stylesheet" type="text/css" href="/css/layout.css" />
	<link rel="stylesheet" type="text/css" href="/css/sub.css" />
	<link type="text/css" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.4/themes/base/jquery-ui.css" rel="stylesheet" />
	<link type="text/css" href="/js/datepicker_style.css">
	<script type="text/javascript" src="/js/jquery-1.12.4.min.js"></script>
	<link type="text/css" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet" />
	<?php if(($w_a_num===0 && $w_b_num===4) || ($w_a_num===5 && $w_b_num===0)){?>
	<link rel="stylesheet" type="text/css" href="/css/wind.instarSns.v.1.0.0.css" />
	<?php }?>
	<!--[if lt IE 9]>
	<script src="/js/html5.js"></script>
	<![endif]-->
	<script type="text/javascript">
	//<![CDATA[
		var a_num = "<?php echo $w_a_num;?>";
		var b_num =  "<?php echo $w_b_num;?>";
		var c_num =  "<?php echo $w_c_num;?>";
	//]]>
	</script>
	<script type="text/javascript" src="/editor/js/HuskyEZCreator.js" charset="utf-8"></script>
</head>
<body>
<div id="wrap">
	<?php include_once "inc/header.php";?>
	<?php 
		if( ($w_a_num===5 && ($w_b_num===0)) || ($w_a_num===0 &&  ( $w_b_num===0 || ($w_b_num===2 || isset($w_c_num)) )) || ($w_a_num===2 && ( $w_b_num===1 || $w_b_num===2 || $w_b_num===3 ))){
			$full_con = true;
		} else {
			$full_con = false;
		}
	?>
	<div id="contents" <?php if($full_con){?>class="w1"<?php } ?>>