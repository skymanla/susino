<?php
include_once "../../_head.php";
$sql = "select * from sb_event where sbe_idx='".$_GET['idx']."'";
$query = $conn->query($sql);

if($query->num_rows == '0'){
	header("HTTP/1.0 404 Not Found");
	die("<h3>잘못된 접근입니다.</h3>");	
}
$row = $query->fetch_assoc();

$now_date = date('Y-m-d');
$class = "";
if($now_date >= $row['sbe_sdate'] && $now_date < $row['sbe_edate']){
	$class = "mk_ing";
	$class_title = "진행중";
}else if($now_date < $row['sbe_sdate']){
	$class = "mk_ex";
	$class_title = "진행예정";
}else{
	$class = "mk_end";
	$class_title = "종료";
}
?>

<div class="wrap_conts wid_full">
	<div class="hd_s_img">
		<h2><img src="/m/img/s6/s6s1_tit.png" alt="이달의 이벤트" /></h2>
	</div>
	<div class="wrap_evnt_list">
		<div class="evnt_hd">
			<em class="<?=$class?>"><?=$class_title?></em>
			<h3><?=stripcslashes($row['sbe_title'])?></h3>
			<span>2018-03-02 ~ 2018-03-09</span>
		</div>
		<div class="evnt_conts">
			<img src="/data/event/<?php echo $row['sbe_file'];?>" alt="" />
			<?=stripcslashes($row['sbe_contents'])?>
		</div>
	</div>
	<div class="bt_wrap_right pd_lr">
		<!-- STR 삭제, 수정 -->
		<!-- 
		<a href="javascript:void(0);" class="bt_3s_c_red">삭제</a>
		<a href="javascript:void(0);" class="bt_3s_c_border">수정</a>
		 -->
		<!-- END 삭제, 수정 -->
		<a href="/m/page/s6/s2.php" class="bt_3s_c_border">목록으로</a>
	</div>
</div>

<?php include_once "../../_tail.php";?>