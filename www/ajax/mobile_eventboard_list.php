<?php
include_once($_SERVER['DOCUMENT_ROOT']."/lib/dbconn.php");

$cur_page = $_REQUEST['cur_page'];

//if($cur_page=="") $cur_page = 1; //페이지 번호가 없으면 1번 페이지

//개수
$count = "SELECT COUNT(sbe_idx) as cnt FROM sb_event";
$query = $conn->query($count);
$row = $query->fetch_assoc();
$cnt = $row['cnt'];

$limit_num = 4; //몇개씩 리스트에 보여줄 것인지
$offset_num = 4; //몇번 부터 시작할지
$show_offset_num = ($cur_page - 1) * $offset_num; //페이지마다 보여주는 리스트가 40개씩 갱신.

$board_no = $cnt - $show_offset_num;

$total_page = floor ( $cnt / $limit_num ) + 1;

$query = "SELECT * FROM sb_event ORDER BY sbe_rdate DESC LIMIT $limit_num OFFSET $show_offset_num";
$result = $conn->query($query);

$now_date = date('Y-m-d');
?>


<? 
if($result->num_rows == '0'){
	echo "99";
	exit;
}else{
	foreach($result as $key => $row){
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
<li>
	<a href="/m/page/s6/s2sview.php?idx=<?=$row['sbe_idx']?>">
		<div class="wrap_evnt_img">
			<img src="/data/event/<?php echo $row['sbe_file'];?>" alt="" />
		</div>
		<div class="wrap_evnt_desc">
			<em class="<?=$class?>"><?=$class_title?></em>
			<!-- STR 진행 예정일때 -->
			<!--
			<em class="mk_ex">진행예정</em>
			 -->
			<!-- END 진행 예정일때 -->
		
			<!-- STR 종료 되었을때 -->
			<!--
			<em class="mk_end">종료</em>
			 -->
			<!-- END 종료 되었을때 -->
			<h3><?=$row['sbe_title']?></h3>
			<span><?=$row['sbe_sdate']?> ~ <?=$row['sbe_edate']?></span>
		</div>
	</a>
</li>
<? 
	} 
}

exit;
?>