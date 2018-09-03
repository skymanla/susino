<?php
include_once($_SERVER['DOCUMENT_ROOT']."/lib/login_infomation.php");

$cur_page = $_REQUEST['getPage'];
$getType1 = $_REQUEST['getType1'];
$getType2 = $_REQUEST['getType2'];

unset($_REQUEST);
//전제, 모집중, 마감
$now_date = date('Y-m-d');
switch($getType1){
	case "All" :
		$all_active = "active";
		$Type1_where = '';
		break;
	case "ing" :
		$ing_active = "active";
		$Type1_where = ' and ( "'.$now_date.'"  between date_format(sbab_sdate, "%Y-%m-%d") and date_format(sbab_edate, "%Y-%m-%d") )';
		break;
	case "finish" :
		$finish_active = "active";
		$Type1_where = " and ( date_format(sbab_edate, '%Y-%m-%d') < '".$now_date."' ) ";
		break;
}

switch($getType2){
	case "All" :
		$all2_active = "active";
		$Type2_where = "";
		break;
	case "shopper" :
		$shopper_active = "active";
		$Type2_where = " and sbab_cate='shopper' ";
		break;
	case "ftalk" :
		$ftalk_active = "active";
		$Type2_where = " and sbab_cate='ftalk' ";
		break;
	case "pick" :
		$pick_active = "active";
		$Type2_where = " and sbab_cate='pick' ";
		break;
}

$tbl_info = " sb_application_board a join sb_application_member b on a.sbab_idx=b.sbabm_fidx ";
$area_where = " sbabm_mb_id='".$sb_id."' and (sbab_lvl='' or sbab_lvl='".$sb_level."' or sbab_lvl='A') ";//( sbab_area like '%".$dash_row['dongnae']."%' or sbab_area='A' ) and 
$whereis = $Type1_where." ".$Type2_where;

$count = "select count(sbab_idx) as cnt from $tbl_info where $area_where $whereis ";
$count_result = $conn->query($count);
$cnt_row = $count_result->fetch_assoc();
$cnt = $cnt_row['cnt'];

$limit_num = 5; //몇개씩 리스트에 보여줄 것인지
$offset_num = 5; //몇번 부터 시작할지
$show_offset_num = ($cur_page - 1) * $offset_num; //페이지마다 보여주는 리스트가 40개씩 갱신.

$board_no = $cnt - $show_offset_num;

$total_page = floor ( $cnt / $limit_num -1 ) + 1;
if($total_page == '0') $total_page = '1';
//등록 게시물 가져오기
$sql = "select * from $tbl_info where $area_where $whereis order by sbab_idx desc LIMIT $limit_num OFFSET $show_offset_num";
$v = $conn->query($sql);
?>
		<div class="tab_type1">
			<div class="cate toggle_j">
				<a href="javascript:tab1_list('1', 'All', '<?=$getType2?>');" class="<?=$all_active?>">전체</a>
				<a href="javascript:tab1_list('1', 'ing', '<?=$getType2?>');" class="<?=$ing_active?>">모집중</a>
				<a href="javascript:tab1_list('1', 'finish', '<?=$getType2?>');" class="<?=$finish_active?>">마감</a>
			</div>
		</div>

		<div class="mypage_type1">
			<a href="javascript:tab1_list('1', '<?=$getType1?>', 'All');" class="bt1 <?=$all2_active?>"><i>전체</i></a>
			<a href="javascript:tab1_list('1', '<?=$getType1?>', 'shopper');" class="bt2 <?=$shopper_active?>"><i>미스테리<br />쇼퍼</i></a>
			<a href="javascript:tab1_list('1', '<?=$getType1?>', 'ftalk');" class="bt3 <?=$ftalk_active?>"><i>스시노<br />미식회</i></a>
			<a href="javascript:tab1_list('1', '<?=$getType1?>', 'pick');" class="bt4 <?=$pick_active?>"><i>체험단</i></a>
		</div>

		<ul class="bo_webzine1">
			<?php
			if($v->num_rows == 0){
				echo '<li><a href="javascript:void(0);" style="text-align:center"><div class="cate">등록된 이벤트가 없습니다.</div></a></li>';
			}else{
				foreach($v as $key => $event_board){
					//active val
					$check_win = '';
					$app_active = '';
					$review_active = '';
					$cate_bg = '';
					$app_stat = '';
					//게시물 당첨 및 후기 여부 확인
					$sql = "select * from sb_application_member where sbabm_mb_id='".$sb_id."' and sbabm_fidx='".$event_board['sbab_idx']."'";
					$q = $conn->query($sql);
					if($q->num_rows == '0'){
						$mb_event = "";
					}else{
						$mb_event = $q->fetch_assoc();
						$app_active = "active";
						if($mb_event['sbabm_option5'] == 'Y'){
							$check_win = "check_win";
						}

						if($mb_event['sbabm_option2'] == 'Y'){
							$review_active = "active";
						}
					}

					switch($event_board['sbab_cate']){
						case "shopper":
							$cate_bg = "bg1";
							$cate_title = "미스테리 쇼퍼";
							break;
						case "pick":
							$cate_bg = "bg2";
							$cate_title = "체험단";
							break;
						case "ftalk":
							$cate_bg = "bg3";
							$cate_title = "스시노미식회";
							break;
					}

					$sdate = date('Y-m-d', strtotime($event_board['sbab_sdate']));
					$edate = date('Y-m-d', strtotime($event_board['sbab_edate']));

					//$link_url = "javascript:void(0);";
					$link_url = "/m/page/s5/s2sview.php?idx=".$event_board['sbab_idx']."&page=".$cur_page."&type=myissue";
					if($now_date > $edate){
						$app_stat = 'end';
						$app_stat_title = '마감';
					}else if( ($now_date >= $sdate) && ($now_date <= $edate) ){
						$app_stat = "ing";
						$app_stat_title = '모집중';
						//$go_more = 's2sview.php?idx='.$row['sbab_idx'].'&aType='.$row['sbab_cate'];
					}else if($now_date < $sdate){
						$app_stat_title = '진행예정';
						$app_stat = "etc1";
						//$go_more = 'javascript:void(0)';
					}
			?>
			<li>
				<a href="<?=$link_url?>">
					<div class="cate <?=$cate_bg?> <?=$check_win?>"><i><?=$cate_title?></i></div>
					<div class="info">
						<div class="data_addr">
							<span class="date <?=$app_stat?>"><?=$app_stat_title?></span>
							<span class="addr"><?=$event_board['sbab_area']=="A" ? "전체지역" : $event_board['sbab_area']?></span>
						</div>
						<div class="title"><?=$event_board['sbab_title']?></div>
						<ul class="list">
							<li><span class="s_tit">모집기간</span><span><?=$sdate?> ~ <?=$edate?></span></li>
							<li><span class="s_tit">당첨인원</span><span><?=$event_board['sbab_limit']?>명</span></li>
						</ul>
					</div>
				</a>
				<div class="wrap_cmt">
					<!-- 완료 되었을때 class="active" 추가 -->
					<span class="<?=$app_active?>">신청완료</span>
					<span class="<?=$review_active?>">후기완료</span>
				</div>
			</li>
			<?php
				}
			}
			?>
		</ul>
	</div>
	<div class="paging">
		<!--버튼 비활성시  버튼 내부 a태그에 class="bt_off" 추가 -->
		<!-- ex) <a href="javascript:void(0);" class="bt_prev bt_off">이전목록</a> -->
		<?
		if($cur_page == "1"){
			$prev_page_class = "bt_off";
			$prev_page_script = "void(0);";
		}else{
			$prev_page_class = "";
			$prev_page_num = $cur_page-1;
			$prev_page_script = "tab1_list('".$prev_page_num."', '".$getType1."', '".$getType2."');";
		}
		if($cur_page == $total_page){
			$next_page_class = "bt_off";
			$next_page_script = "void(0);";
		}else{
			$next_page_class = "";
			$next_page_num = $cur_page+1;
			$next_page_script = "tab1_list('".$next_page_num."', '".$getType1."', '".$getType2."');";
		}
		?>
		<a href="javascript:<?=$prev_page_script?>" class="bt_prev <?=$prev_page_class?>">이전목록</a>
		<span><?=$cur_page?> / <?=$total_page?></span>
		<a href="javascript:<?=$next_page_script?>;" class="bt_next <?=$next_page_class?>">다음목록</a>
	</div>

	<? exit; ?>