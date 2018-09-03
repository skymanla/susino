<?php
include_once "../../_head.php";
include_once($_SERVER['DOCUMENT_ROOT']."/lib/function.php");

if($dash_row == ''){
	header("HTTP/1.1 400 Bad Request");
	go_href("잘못된 접근입니다.", "/", "go");
	exit;
}

$dongnae = explode(" ", $dash_row["dongnae"]);

if(isset($_GET['idx'])){
	$sql = "select * from sb_application_notice_board where sbab_idx='".$_GET['idx']."' and (sbab_area='A' or sbab_area like '%".$dongnae[1]."%')";// 
	$q = $conn->query($sql);
	if($q->num_rows == false){
		header("HTTP/1.1 400 Bad Request");
		go_href("잘못된 접근입니다.", "/", "go");
		exit;
	}else{
		$row = $q->fetch_assoc();
	}
}else{
	header("HTTP/1.1 400 Bad Request");
	go_href("잘못된 접근입니다.", "/", "go");
	exit;
}

//sbab_area
if($row['sbab_area'] == "A"){
	//pass
}else{	
	if(preg_match("/$dongnae[1]/", $row['sbab_area'])){
		//echo '123123123';
	}else{
		//echo 'njsdfsfsdf';
	}
}

?>

<div class="wrap_conts wid_full">
	<div class="hd_s_img">
		<h2><img src="/m/img/s5/s5s2_notice_tit.png" alt="나의 소식" /></h2>
	</div>
	<div class="wrap_evnt_list">
		<div class="evnt_hd">
			<h3><?=$row['sbab_title']?></h3>
			<? if(!empty($row['sbab_sdate']) && !empty($row['sbab_sdate'])){ ?>
			<span><?=date('Y-m-d', strtotime($row['sbab_sdate']))?> ~ <?=date('Y-m-d', strtotime($row['sbab_edate']))?></span>
			<? }else{ } ?>
		</div>
		<div class="evnt_conts">
			<?=$row['sbab_content']?>
		</div>
	</div>
	<div class="bt_wrap_right pd_lr">
		<a href="/m/page/s5/s2s1.php" class="bt_3s_c_border">목록으로</a>
	</div>

<?php include_once "../../_tail.php";?>