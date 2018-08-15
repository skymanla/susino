<?php 
include_once($_SERVER['DOCUMENT_ROOT'].'/adm/_head.php');

$tbl_info = "sb_invite_admin";

$cur_page = (int)$_GET['cur_page'];
if($cur_page=="") $cur_page = 1; //페이지 번호가 없으면 1번 페이지

$sval = $conn->real_escape_string($_GET['sval']);
$dating_flag = false;
switch($_GET['stx']){
	case "dating":
		$datingchk = "selected";
		$dating_flag = true;
		$search = " and date_format(sbia_rdate, '%Y-%m-%d') = '$sval'";
		$search_string = "&stx=dating&sval=".$sval;
		break;
	case "with_title":
		$with_title = "selected";
		$search = " and sbia_title like '%$sval%'";
		$search_string = "&stx=with_title&sval=".$sval;
		break;
	default:
		$search = '';
		$search_string = '';
		break;
}
$count = "select count(*) as cnt from ".$tbl_info." where 1 $search ";
$count_result = $conn->query($count);
$row = $count_result->fetch_assoc();
$cnt = $row['cnt'];

$limit_num = 10; //몇개씩 리스트에 보여줄 것인지
$offset_num = 10; //몇번 부터 시작할지
$show_offset_num = ($cur_page - 1) * $offset_num; //페이지마다 보여주는 리스트가 40개씩 갱신.

$board_no = $cnt - $show_offset_num;

$total_page = floor ( $cnt / $limit_num ) + 1;

$sql = "select * from ".$tbl_info." where 1 $search order by sbia_idx desc LIMIT $limit_num OFFSET $show_offset_num";
$q = $conn->query($sql);

$qstring = "?cur_page=".$cur_page.$search_string;
?>

<section class="section1">
	<h3>함께갈래요 신청자</h3>
	<ul class="tab_type1">
		<li><a href="s7.php">신청자 목록</a></li>
		<li><a href="s7slist2.php">당첨자</a></li>
		<li class="active"><a href="s7slist3_list.php">당첨자 확률관리</a></li>
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
						<form name="searchFrm" id="searchFrm" method="get">
							<input type="hidden" name="cur_page" value="<?=$cur_page?>" />
							<select name="stx" id="stx" title="" class="w_input1" onchange="sFrmval(this);">
								<option value="with_title" <?=$with_titlechk?>>제목</option>
								<option value="dating" <?=$datingchk?>>등록일</option>
							</select>
							<input type="text" class="w_input1" value="<?=$_GET['sval']?>" name="sval" style="width:180px" id="inp_date">
							<button type="button" class="bt_s1 input_sel" onclick="document.searchFrm.submit()">검색</button>
						</form>
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
				<col width="140">
			</colgroup>
			<thead>
				<tr>
					<th>글번호</th>
					<th>제목</th>
					<th>이벤트기간</th>
					<th>등록일</th>
					<th>정보</th>
				</tr>
			</thead>
			<tbody>
				<? 
				if($q->num_rows > '0'){
					foreach($q as $key => $row){ 
				?>
				<tr>
					<td class="txt_c"><?=$board_no?></td>
					<td class="txt_c"><?=$row['sbia_title']?></td>
					<td class="txt_c"><?=date('Y-m-d', strtotime($row['sbia_sdate']))?> ~ <?=date('Y-m-d', strtotime($row['sbia_edate']))?></td>
					<td class="txt_c"><?=date('Y-m-d', strtotime($row['sbia_rdate']))?></td>
					<td class="txt_c"><a href="javascript:move_page(<?=$row['sbia_idx']?>);" class="bt_s1">자세히보기</a></td>
				</tr>
				
				<? 
					$board_no--;
					}
				}else{
					echo '<tr><td colspan="5" align=center>등록된 이벤트가 없습니다.</td></td>';
				}
				?>
			</tbody>
		</table>
	</div>

	<div class="bt_wrap1">
		<div class="right_box">
			<a href="s7slist3.php" class="bt_1">이벤트 등록</a>
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
	<? if($dating_flag == true){ ?>
	$('#stx option[value="dating"]').attr('selected', 'selected');
	//console.log($('input[name=s_sido'));
	sFrmval($('#stx')[0]);
	<? } ?>
});
function sFrmval(getVal){
	var Pt = getVal.parentNode.getElementsByClassName('w_input1');
	if(getVal.value == "dating" || getVal.value == "rdating"){
		Pt[1].setAttribute('id', 'inp_date');
		$('#inp_date').datepicker({
			dateFormat: 'yy-mm-dd'
		});
	}else{
		$('#inp_date').datepicker("destroy");
		Pt[1].removeAttribute('id');
	}
}
function move_page(getIdx){
	location.href="./s7slist3.php<?=$qstring?>&idx="+getIdx+"&mode=u";
}
</script>
<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/adm/_tail.php');
?>