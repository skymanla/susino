<?php
include_once "../../_head.php";

$cur_page = (int)$_GET['cur_page'];
if($cur_page=="") $cur_page = 1; //페이지 번호가 없으면 1번 페이지

//개수
$count = "SELECT COUNT(sbn_idx) as cnt FROM sb_notice";
$count_result = $conn->query($count);

while($row = $count_result->fetch_assoc()){
	$cnt = $row['cnt'];
}

$limit_num = 10; //몇개씩 리스트에 보여줄 것인지
$offset_num = 10; //몇번 부터 시작할지
$show_offset_num = ($cur_page - 1) * $offset_num; //페이지마다 보여주는 리스트가 40개씩 갱신.

$board_no = $cnt - $show_offset_num;

$total_page = floor ( $cnt / $limit_num ) + 1;

$query = "SELECT * FROM sb_notice ORDER BY sbn_rdate DESC LIMIT $limit_num OFFSET $show_offset_num";
$result = $conn->query($query);
?>


<div class="wrap_conts">
	<div class="hd_s_img">
		<h2><img src="/m/img/s1/s1s5_tit.png" alt="" /></h2>
	</div>
	<ul class="list_s1">
		<?
		if($result->num_rows == '0'){
			echo '<li class="none_word">등록된 글이 없습니다.</li>';	
		}else{
			foreach($result as $key => $row){
		?>
		<li>
			<button type="button">
				<span class="t_num"><?=$board_no?></span>
				<strong><?=$row['sbn_title']?></strong>
				<span><?=substr($row['sbn_rdate'],0,10)?></span>
			</button>
			<div class="q_answer">
				<div>
					<?=stripslashes($row['sbn_contents'])?>
				</div>
			</div>
		</li>
		<? 
				$board_no--;
			}
		}
		?>
		<!-- STR 등록된 글이 없을 경우 -->
		<!-- 
		<li class="none_word">등록된 글이 없습니다.</li>
		 -->
		<!-- END 등록된 글이 없을 경우 -->
	</ul>
	<div class="paging">
		<!--버튼 비활성시  버튼 내부 a태그에 class="bt_off" 추가 -->
		<!-- ex) <a href="javascript:void(0);" class="bt_prev bt_off">이전목록</a> -->
		<?	if($cur_page == '1'){	?>
		<a href="javascript:void(0);" class="bt_prev bt_off">이전목록</a>
		<? }else{ ?>
		<a href="javascript:move_page('<?=$cur_page-1?>');" class="bt_prev">이전목록</a>
		<? } ?>
		<span><?=$cur_page?> / <?=$total_page?></span>
		<? if($cur_page == $total_page){ ?>
		<a href="javascript:void(0);" class="bt_next bt_off">다음목록</a>
		<? }else{ ?>
		<a href="javascript:move_page('<?=$cur_page+1?>');" class="bt_next">다음목록</a>
		<? } ?>
	</div>
</div>

<script>
function move_page(pageNum){
	location.href="?cur_page="+pageNum;
}
</script>

<?php include_once "../../_tail.php";?>