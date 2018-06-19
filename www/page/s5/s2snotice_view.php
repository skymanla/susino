<?php 
session_start();
include_once "../../_head.php";
include_once $_SERVER['DOCUMENT_ROOT']."/lib/dbconn.php";
include_once $_SERVER['DOCUMENT_ROOT']."/lib/function.php";

$dongnae = $_SESSION['sb_dongnae'];
if($_SESSION['sba_id'] == "admin"){
	$dongnae_where = "";
}else{
	$dongnae_where = " and (sbab_area='".$dongnae."' or sbab_area='A')";
}
$tbl_info = "sb_application_notice_board";
$sql = "select * from $tbl_info where sbab_idx='".$_GET['idx']."'".$dongnae_where;
$q = $conn->query($sql);
$r = $q->fetch_assoc();
if(empty($r)){
	$url = "/page/s5/s2.php";
	echoAlert("잘못된 접근입니다.");
	echoMovePage($url);	
}
//이전글
$sql = "select sbab_idx from $tbl_info where sbab_idx < '".$r['sbab_idx']."' $dongnae_where order by sbab_idx desc limit 1";
$q = $conn->query($sql);
$Pr = $q->fetch_assoc();

//다음글
$sql = "select sbab_idx from $tbl_info where sbab_idx > '".$r['sbab_idx']."' $dongnae_where order by sbab_idx asc limit 1";
$q = $conn->query($sql);
$Nr = $q->fetch_assoc();

//hitup
$sql = "update $tbl_info set sbab_hit=sbab_hit+1 where sbab_idx='".$_GET['idx']."' ";
$conn->query($sql);
?>

<div class="wrap_style1">
	<div class="heading_s1">
		<h2 class="tit"><img src="/img/common/s5s2_notice_title1.png" alt="우리동네 알림"></h2>
	</div>

	<div class="con_wrapStyle1">
		<ul class="evt_wrap view bg1">
			<li>
				<div class="txt_wrap">
					<h3 class="tit"><?=stripslashes($r['sbab_title'])?></h3>
					<p class="desc"><?=date('Y-m-d', strtotime($r['sbab_rdate']))?></p>
				</div>
			</li>
			<li class="view_wrap">
				<!-- <div class="img_wrap_view">
					<img src="/data/notice/" alt="" />
				</div> -->
				<p class="desc_view">
					<?=stripslashes($r['sbab_content'])?>
				</p>
			</li>
		</ul>
		<div class="bt_LR_wrap">
			<div class="f_left">
				<? if(!empty($Pr[sbab_idx])){ ?>
				<a href="?idx=<?=$Pr[sbab_idx]?>" class="bt_s3_bdrGray left">이전글</a>
				<? } ?>

				<? if(!empty($Nr[sbab_idx])){ ?>
				<a href="?idx=<?=$Nr[sbab_idx]?>" class="bt_s3_bdrGray right">다음글</a>
				<? } ?>
			</div>
			<div class="f_right">
				<a href="s2snotice_list.php" class="bt_s2_gray">목록으로</a>
			</div>
		</div>
	</div>


</div>

<?php include_once "../../_tail.php";?>