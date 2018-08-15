<?php 
/*
admin - 후기작성관리 - 5회 신청자
Ryan skymanla
 */
include_once($_SERVER['DOCUMENT_ROOT'].'/adm/_head.php');

$cur_page = (int)$_GET['cur_page'];
if($cur_page=="") $cur_page = 1; //페이지 번호가 없으면 1번 페이지

$stx = (isset($_GET['stx']) ? $_GET['stx'] : '');
$sval = (isset($_GET['sval']) ? $_GET['sval'] : '');

$where = " 1 ";
if(empty(trim($sval))){
	//pass
	//search date reset
}else{
	switch($stx){
		case "dating":
			$where .= " and date_format(sbc_rdate, '%Y-%m-%d')='".$sval."' ";
			$dating_chk = "selected";
			break;
		case "id":
			$where .= " and sbc_id like '%".$sval."%' ";
			$id_chk = "selected";
			break;
		case "name":
			$where .= " and sb_name like '%".$sval."%' ";
			$name_chk = "selected";
			break;
		case "hp":
			$where .= " and sb_phone like '%".$sval."%' ";
			$hp_chk = "selected";
			break;
		case "email":
			$where .= " and sb_email lke '%".$sval."%' ";
			$email_chk = "selected";
			break;
		case "level":
			$where .= " and sb_mem_level in (select sb_level_cate from sb_member_level where sb_level_title='".$sval."')";
			$level_chk = "selected";
			break;
		default:
			$where .= "";
			break;
	}	
}

$from_query = " sb_coupon_member a join sb_member b on a.sbc_id=b.sb_id ";

$board_sql = "select count(sbc_idx) as cnt from ".$from_query." where ".$where;

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

/*$sql = "select *, (select sb_level_title from sb_member_level where sb_level_cate=b.sb_mem_level) as mb_level 
		from sb_coupon_member a join sb_member b on a.sbc_id=b.sb_id 
		where ".$where." 
		order by sbc_idx desc 
		limit $limit_num offset $show_offset_num";*/

$sql = "select *, (select sb_level_title from sb_member_level where sb_level_cate=b.sb_mem_level) as mb_level from ".$from_query."	where ".$where."  order by sbc_idx desc limit $limit_num offset $show_offset_num";
$query = $conn->query($sql);
?>

<section class="section1">
	<h3>후기작성 관리</h3>
	<ul class="tab_type1">
		<li><a href="s8.php?aType=shopper">미스터리 쇼퍼</a></li>
		<li><a href="s8.php?aType=ftalk">스시노 미식회</a></li>
		<li><a href="s8.php?aType=pick">체험단</a></li>
		<li><a href="s8.php?aType=selfer">자발적 참여자</a></li>
		<li><a href="s8s_tab5.php">최초1회 참여자</a></li>
		<li class="active"><a href="s8s_tab6.php">5회 신청자</a></li>
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
							<option value="dating" <?=$dating_chk?>>신청일</option>
							<option value="id" <?=$id_chk?>>아이디</option>
							<option value="name" <?=$name_chk?>>이름</option>
							<option value="hp" <?=$hp_chk?>>핸드폰</option>
							<option value="email" <?=$email_chk?>>이메일</option>
							<option value="level" <?=$level_chk?>>레벨</option>
						</select>
						<input type="text" class="w_input1" value="<?=$sval?>" autocomplete="off" name="sval" style="width:180px">
						<button type="button" class="bt_s1 input_sel" onclick="move_serach($('select[name=stx] option:selected').val(), $('input[name=sval]').val());" >검색</button>
					</td>
				</tr>
			</tbody>
		</table>
	</div>

	<div class="table_wrap1">
		<table>
			<caption>회원 목록</caption>
			<colgroup>
				<col width="80">
				<col width="">
				<col width="">
				<col width="">
				<col width="">
				<col width="">
				<col width="">
			</colgroup>
			<thead>
				<tr>
					<th>글번호</th>
					<th>신청일</th>
					<th>아이디</th>
					<th>이름</th>
					<th>핸드폰</th>
					<th>이메일</th>
					<th>레벨</th>
				</tr>
			</thead>
			<tbody>
				<?
				if($query->num_rows > 0){
					foreach($query as $key => $row){
				?>		
				<tr>
					<td class="txt_c"><?=$board_no?></td>
					<td class="txt_c"><?=date('Y-m-d', strtotime($row['sbc_rdate']))?></td>
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
					echo '<tr><td colspan="7" align=center>신청자가 없습니다.</td></tr>';
				}
				?>
			</tbody>
		</table>
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
				$now_prev_page = "?cur_page=".$now_prev_page_num.$query_string;
			}

			if($total_page == $cur_page){
				$now_next_page = "javascript:void(0);";
			}else{
				$now_next_page = "?cur_page=".$now_next_page_num.$query_string;	
			}
		?>
		<a href="javascript:void(0);" class="arr all_prev"><i>처음</i></a>
		<a href="<?=$now_prev_page?>" class="arr prev"><i>이전</i></a>
		<?
			for($i = $first_page_num; $i <= $total_page && $i <= $last_page_num; $i ++) {
				if($cur_page == $i){
					echo "<a href='?cur_page={$i}{$query_string}' class='active'>{$i}</a>\n";
				}else{
					echo "<a href='?cur_page={$i}{$query_string}'>{$i}</a>";
				}
			}
		?>
		
		<a href="<?=$now_next_page?>" class="arr next"><i>다음</i></a>
		<a href="javascript:void(0);" class="arr all_next"><i>마지막</i></a>
	</nav>

</section>
<script type="text/javascript" src="/adm/js/jquery-ui.min.js"></script>
<script>
$(function(){
	if($('select[name=stx] option:selected').val() == "dating"){
		$('select[name=stx]').siblings($('input[name=sval]')).attr("id", "inp_date");
		$('#inp_date').datepicker({
			dateFormat: 'yy-mm-dd',
			maxDate : 0
		});
	}
});
function stxchg(getVal){
	var Pt = getVal.parentNode.getElementsByClassName('w_input1');
	if(getVal.value == "dating"){
		Pt[1].setAttribute('id', 'inp_date');
		$('#inp_date').datepicker({
			dateFormat: 'yy-mm-dd',
			maxDate : 0
		});
	}else{
		$('#inp_date').datepicker("destroy");
		Pt[1].removeAttribute('id');
	}
}
function move_serach(stx, sval){
	location.href="?stx="+stx+"&sval="+sval;
}
</script>
<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/adm/_tail.php');
?>