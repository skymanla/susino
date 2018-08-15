<?php
include_once $_SERVER['DOCUMENT_ROOT']."/lib/dbconn.php";
$cur_page = (int)$_REQUEST['cur_page'];
if($cur_page=="") $cur_page = 1; //페이지 번호가 없으면 1번 페이지

$where = " 1 and sbr_wid in (select sb_id from sb_member where sb_review_tocnt='1') and sbabm_option5='Y' and sbabm_option2='Y' ";

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
	default:
		$where .= " and sbabm_option3='' ";
		$waiting_active = "class='active'";
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
			from sb_review_board a join sb_application_member b on a.sbr_aidx2=b.sbabm_idx join sb_member c on b.sbabm_mb_id=c.sb_id
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
		from sb_review_board a join sb_application_member b on a.sbr_aidx2=b.sbabm_idx join sb_member c on b.sbabm_mb_id=c.sb_id
		where ".$where." 
		order by sbr_idx desc limit $limit_num offset $show_offset_num";
$query = $conn->query($sql);
?>
<ul class="tab_type1">
	<li><a href="s8.php?aType=shopper">미스터리 쇼퍼</a></li>
	<li><a href="s8.php?aType=ftalk">스시노 미식회</a></li>
	<li><a href="s8.php?aType=pick">체험단</a></li>
	<li><a href="s8.php?aType=selfer">자발적 참여자</a></li>
	<li class="active"><a href="s8s_tab5.php">최초1회 참여자</a></li>
	<li><a href="s8s_tab6.php">5회 신청자</a></li>
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
					<select name="stx" title="" class="w_input1" onchange="stxchg(this);">
						<option value="pdate" <?=$pdate_select?>>발송일</option>
						<option value="id" <?=$id_select?>>아이디</option>
						<option value="name" <?=$name_select?>>이름</option>
						<option value="hp" <?=$hp_select?>>핸드폰</option>
						<option value="email" <?=$email_select?>>이메일</option>
						<option value="lvl" <?=$lvl_select?>>레벨</option>
					</select>
					<input type="text" class="w_input1" value="<?=$sval?>" autocomplete="off" name="sval" style="width:180px">
					<button type="button" class="bt_s1 input_sel" onclick="javascript:ajax_review('<?=$aType?>', '1', $('select[name=stx] option:selected').val(), $('input[name=sval]').val(), '<?=$eType?>');">검색</button>
				</td>
			</tr>
		</tbody>
	</table>
</div>

<ul class="tab_type1">
	<li <?=$waiting_active?>><a href="javascript:ajax_review('<?=$aType?>','1','<?=$stx?>','<?=$sval?>', 'waiting');">대기</a></li>
	<li <?=$accept_active?>><a href="javascript:ajax_review('<?=$aType?>','1','<?=$stx?>','<?=$sval?>', 'accept');">승인</a></li>
	<li <?=$refuse_active?>><a href="javascript:ajax_review('<?=$aType?>','1','<?=$stx?>','<?=$sval?>', 'refuse');">거절</a></li>
</ul>

<?php
if($eType == "waiting" || $eType == ""){
	include_once($_SERVER['DOCUMENT_ROOT']."/ajax/review/adm_review_one_waiting.php");
}else if($eType == "accept"){
	include_once($_SERVER['DOCUMENT_ROOT']."/ajax/review/adm_review_one_accept.php");
}else if($eType == "refuse"){
	include_once($_SERVER['DOCUMENT_ROOT']."/ajax/review/adm_review_one_refuse.php");
}


exit;
?>

