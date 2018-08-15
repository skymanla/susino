<?php
include_once $_SERVER['DOCUMENT_ROOT']."/lib/dbconn.php";

$cur_page = (int)$_REQUEST['cur_page'];
if($cur_page=="") $cur_page = 1; //페이지 번호가 없으면 1번 페이지


$aType = ($_REQUEST['aType']=="" ? "shopper" : $_REQUEST['aType']);
switch($aType){
	case "shopper":
		$shopper_active = "class='active'";
		break;
	case "ftalk":
		$ftalk_active = "class='active'";
		break;
	case "pick":
		$pick_active = "class='active'";
		break;
	case "selfer":
		$selfer_active = "class='active'";
		break;
}
$where = " 1 and sbr_atype='".$aType."' and sbabm_option5='Y' and sbabm_option2='Y' ";

$eType = $_REQUEST['Etype'];
switch($eType){
	case "accept":
		$where .= " and sbabm_option3='Y' ";
		$accept_active = "class='active'";
		break;
	case "refuse":
		$where .= " and sbabm_option3='N' ";
		$refuse_active = "class='active'";
		break;
	case "waiting":
		$where .= " and sbabm_option3='' ";
		$waiting_active = "class='active'";
		break;
	default:
		$where .= '';
		$all_active = "class='active'";
		break;
}

$stx = $_REQUEST['stx'];
$sval = $_REQUEST['sval'];
if(empty(trim($sval))){
	//pass
}else{
	switch($stx){
		case "pdate":
			$where .= " and date_format(sbabm_review_date, '%Y-%m-%d')='".$sval."' ";
			$pdate_select = 'selected';
			break;
		case "id":
			$where .= " and sbabm_mb_id='".$sval."' ";
			$id_select = 'selected';
			break;
		case "name":
			$where .= " and sb_name like '%".$sval."%' ";
			$name_select = 'selected';
			break;
		case "hp":
			$where .= " and sb_phone likr '%".$sval."%' ";
			$hp_select = 'selected';
			break;
		case "email":
			$where .= " and sb_email like '%".$sval."%' ";
			$email_select = 'selected';
			break;
		case "lvl":
			$where .= " and sb_mem_level in (select sb_level_cate from sb_member_level where sb_level_title='".$sval."')";
			$lvl_select = 'selected';
			break;
		default:
			break;
	}
}
//count
$board_sql = "select count(sbr_idx) as cnt 
			from sb_review_board a join sb_application_member b on a.sbr_aidx=b.sbabm_fidx join sb_member c on b.sbabm_mb_id=c.sb_id
			where ".$where;
$query = $conn->query($board_sql);
$board_cnt = $query->fetch_assoc();
$cnt = $board_cnt['cnt'];

$limit_num = 10; //몇개씩 리스트에 보여줄 것인지
$offset_num = 10; //몇번 부터 시작할지
$show_offset_num = ($cur_page - 1) * $offset_num; //페이지마다 보여주는 리스트가 40개씩 갱신.

$board_no = $cnt - $show_offset_num;

if($cnt == $limit_num){
	$total_page = floor ( $cnt / $limit_num );
}else{
	$total_page = floor ( $cnt / $limit_num )+1;
}

$sql = "select * , (select sb_level_title from sb_member_level where sb_level_cate=c.sb_mem_level) as mb_level
		from sb_review_board a join sb_application_member b on a.sbr_aidx=b.sbabm_fidx join sb_member c on b.sbabm_mb_id=c.sb_id
		where ".$where." 
		order by sbr_idx desc limit $limit_num offset $show_offset_num";
$query = $conn->query($sql);
?>
<ul class="tab_type1">
	<li <?=$shopper_active?>><a href="javascript:move_page('shopper');">미스터리 쇼퍼</a></li>
	<li <?=$ftalk_active?>><a href="javascript:move_page('ftalk');">스시노 미식회</a></li>
	<li <?=$pick_active?>><a href="javascript:move_page('pick');">체험단</a></li>
	<li <?=$selfer_active?>><a href="javascript:move_page('selfer');">자발적 참여자</a></li>
	<li><a href="javascript:move_page('once');">최초1회 참여자</a></li>
	<li><a href="javascript:move_page('five');">5회 신청자</a></li>

	<!--<li class="active"><a href="s8.php">미스터리 쇼퍼</a></li>
	<li><a href="s8.php">스시노 미식회</a></li>
	<li><a href="s8.php">체험단</a></li>
	<li><a href="s8.php">자발적 참여자</a></li>
	<li><a href="s8s_tab5.php">최초1회 참여자</a></li>
	<li><a href="s8s_tab6.php">5회 신청자</a></li>-->
</ul>

<div class="table_wrap1 no_line">
	<table>
		<caption>검색필터</caption>
		<colgroup>
			<col width="100">
			<col width="">
		</colgroup>
		<tbody>
			<tr>
				<th>검색필터</th>
				<td>
					<select name="stx" title="" class="w_input1">
						<option value="pdate" <?=$pdate_select?>>발송일</option>
						<option value="id" <?=$id_select?>>아이디</option>
						<option value="name" <?=$name_select?>>이름</option>
						<option value="hp" <?=$hp_select?>>핸드폰</option>
						<option value="email" <?=$email_select?>>이메일</option>
						<option value="lvl" <?=$lvl_select?>>레벨</option>
					</select>
					<input type="text" class="w_input1" value="<?=$sval?>" autocomplete="off" name="sval" style="width:180px">
					<button type="button" class="bt_s1 input_sel" onclick="javascript:ajax_review_excel('<?=$aType?>', '1', $('select[name=stx] option:selected').val(), $('input[name=sval]').val(), '<?=$eType?>');">검색</button>
				</td>
			</tr>
		</tbody>
	</table>
</div>

<ul class="tab_type1">
	<li <?=$all_active?>><a href="javascript:ajax_review_excel('<?=$aType?>','1','<?=$stx?>','<?=$sval?>', '');">전체</a></li>
	<li <?=$waiting_active?>><a href="javascript:ajax_review_excel('<?=$aType?>','1','<?=$stx?>','<?=$sval?>', 'waiting');">대기</a></li>
	<li <?=$accept_active?>><a href="javascript:ajax_review_excel('<?=$aType?>','1','<?=$stx?>','<?=$sval?>', 'accept');">승인</a></li>
	<li <?=$refuse_active?>><a href="javascript:ajax_review_excel('<?=$aType?>','1','<?=$stx?>','<?=$sval?>', 'refuse');">거절</a></li>
</ul>


<div class="table_wrap1">
	<table>
		<caption>회원목록</caption>
		<colgroup>
			<col width="80">
			<col width="">
			<col width="">
			<col width="">
			<col width="">
			<col width="">
			<col width="">
			<col width="">
			<col width="">
		</colgroup>
		<thead>
			<tr>
				<th><input type="checkbox" class="" value="" name="" id="all_check" onclick="javascript:all_check();" placeholder="" /></th>
				<th>글번호</th>
				<th>상태</th>
				<th>발송일</th>
				<th>아이디</th>
				<th>이름</th>
				<th>핸드폰</th>
				<th>이메일</th>
				<th>레벨</th>
			</tr>
		</thead>
		<tbody>
			<?
			if($query->num_rows != '0'){
				$data_inval = true;
			foreach($query as $key => $row){
				switch($row['sbabm_option3']){
					case "Y":
						$event_stat = "승인";
						break;
					case "N":
						$event_stat = "거절";
						break;
					default:
						$event_stat = "대기";
						break;
				}
				//글 제목
				$sql = "select * from sb_application_board where sbab_idx='".$row['sbabm_fidx']."'";
				$q = $conn->query($sql);
				$title = $q->fetch_assoc();
			?>
			<tr>
				<td class="txt_c"><input type="checkbox" class="rp_check_class" name="rp_check[]" value="<?=$row['sbabm_idx']?>" placeholder="" /></td>
				<td class="txt_c"><?=$board_no?></td>
				<td class="txt_c"><?=$event_stat?></td>
				<td class="txt_c"><?=date('Y-m-d', strtotime($row['sbr_rdate']))?></td>
				<td class="txt_c"><?=$row['sb_id']?></td>
				<td class="txt_c"><?=$row['sb_name']?></td>
				<td class="txt_c"><?=$row['sb_phone']?></td>
				<td class="txt_c"><?=$row['sb_email']?></td>
				<td class="txt_c"><?=$row['mb_level']?></td>
			</tr>
			<? 
				$board_no--;
				}
			}else{
				$data_inval = false;
				echo '<tr><td colspan="8" align=center>등록된 후기가 없습니다.</td></tr>';
			}
			?>
		</tbody>
	</table>
</div>

<div class="bt_wrap1">
	<div class="left_box">
		<button type="button" class="bt_1" onclick="javascript:all_check_t();">전체선택</button>
		<button type="button" class="bt_1" onclick="javascript:all_check_f();">선택해제</button>
		<button type="button" class="bt_1" onclick="javascript:review_excel_download('<?=$eType?>','a')">선택 엑셀 다운로드</button>
		<? if($data_inval == true){ ?>
		<button type="button" class="bt_1" onclick="javascript:review_excel_download('<?=$eType?>','b')">전체 엑셀 다운로드</button>
		<? }else if($data_inval == false){ ?>
		<button type="button" class="bt_1" onclick="javascript:alert('자료가 없습니다.')">전체 엑셀 다운로드</button>
		<? } ?>
	</div>
</div>

<nav class="paging_type1">
	<?
	$first_page_num = (floor ( ($cur_page - 1) / 10 )) * 10 + 1; // 1,11,21,31...
	$last_page_num = $first_page_num + 9; // 10,20,30...last
	//$next_page_num = $last_page_num + 1;
	//$prev_page_num = $first_page_num - 10;
	$now_next_page_num = $cur_page+1;
	$now_prev_page_num = $cur_page-1;

	if($now_prev_page_num == 0){
		$now_prev_page = "javascript:void(0);";
	}else{
		$now_prev_page = "javascript:ajax_review_excel('$aType', '$now_prev_page_num', '$stx', '$sval', '$eType');";
	}

	if($total_page == $cur_page){
		$now_next_page = "javascript:void(0);";
	}else{
		$now_next_page = "javascript:ajax_review_excel('$aType', '$now_next_page_num', '$stx', '$sval', '$eType');";
	}
	?>
	<a href="javascript:ajax_review_excel('<?=$aType?>','1','<?=$stx?>','<?=$sval?>','<?=$eType?>');" class="arr all_prev"><i>처음</i></a>
	<a href="<?=$now_prev_page?>" class="arr prev"><i>이전</i></a>
	<?
	for($i = $first_page_num; $i <= $total_page && $i <= $last_page_num; $i ++) {
		if($cur_page == $i){
			echo "<a href=\"javascript:ajax_review_excel('$aType', '$i', '$stx', '$sval', '$eType');\" class=\"active\">{$i}</a>\n";
		}else{
			echo "<a href=\"javascript:ajax_review_excel('$aType', '$i', '$stx', '$sval', '$eType');\" >{$i}</a>\n";
		}
	}

	$final_move_page = "javascript:ajax_review_excel('$aType', '$total_page', '$stx', '$sval', '$eType');";
	?>
		
	<a href="<?=$now_next_page?>" class="arr next"><i>다음</i></a>
	<a href="<?=$final_move_page?>" class="arr all_next"><i>마지막</i></a>
</nav>

<? exit; ?>