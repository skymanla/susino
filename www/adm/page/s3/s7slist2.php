<?php 
include_once($_SERVER['DOCUMENT_ROOT'].'/adm/_head.php');

$tbl_info = " sb_invite_member a left join sb_member b on a.sbi_mb_id=b.sb_id ";

$cur_page = (int)$_GET['cur_page'];
if($cur_page=="") $cur_page = 1; //페이지 번호가 없으면 1번 페이지

$where = array();

//검색 조건
$dating_flag = true;
switch($_GET['stx']){
	case "mb_id" :
		$where[] = " b.sb_id like '%".$_GET['sval']."%' ";
		$id_chk = "selected";
		$dating_flag = false;
		break;
	case "mb_name" :
		$where[] = " b.sb_name like '%".$_GET['sval']."%' ";
		$name_chk = "selected";
		$dating_flag = false;
		break;
	case "mb_phone":
		$where[] = " b.sb_phone like '%".$_GET['sval']."%' ";
		$phone_chk = "selected";
		$dating_flag = false;
		break;
	case "mb_email":
		$where[] = " b.sb_email like '%".$_GET['sval']."%' ";
		$email_chk = "selected";
		$dating_flag = false;
		break;
	case "dating" :
		$where[] = " date_format(a.sbi_adate, '%Y-%m-%d') = '".$_GET['sval']."' ";
		$dating_chk = "selected";
		break;
	default :
		$where[] = ' 1 ';
		break;
}

if(!empty($where)){
	$whereis = ' and '.implode(' and ', $where);
}else{
	$whereis = '  ';
}

//개수
$count = "SELECT COUNT(a.sbi_idx) as cnt FROM $tbl_info where a.sbi_option2 <> '' ".$whereis;
$count_result = $conn->query($count);
$row = $count_result->fetch_assoc();
$cnt = $row['cnt'];

$limit_num = 10; //몇개씩 리스트에 보여줄 것인지
$offset_num = 10; //몇번 부터 시작할지
$show_offset_num = ($cur_page - 1) * $offset_num; //페이지마다 보여주는 리스트가 40개씩 갱신.

$board_no = $cnt - $show_offset_num;

$total_page = floor ( $cnt / $limit_num ) + 1;


$sql = "select 
		a.sbi_idx, a.sbi_cate, a.sbi_option,  a.sbi_option2, a.sbi_option3, a.sbi_option4, a.sbi_option5, date_format(a.sbi_rdate, '%Y-%m-%d') as sbi_rdate, date_format(a.sbi_adate, '%Y-%m-%d') as sbi_adate,
		b.sb_idx, b.sb_id, b.sb_name, (select sb_level_title from sb_member_level where sb_level_cate=b.sb_mem_level) as sb_level_title, b.sb_phone, 
		b.sb_email
		from $tbl_info where a.sbi_option2 <> '' $whereis order by a.sbi_idx desc LIMIT $limit_num OFFSET $show_offset_num";
$q = $conn->query($sql);

?>

<section class="section1">
	<h3>함께갈래요 신청자</h3>
	<ul class="tab_type1">
		<li><a href="s7.php">신청자 목록</a></li>
		<li class="active"><a href="s7slist2.php">당첨자</a></li>
		<li><a href="s7slist3.php">당첨자 확률관리</a></li>
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
							<select name="stx" id="stx" title="" class="w_input1" onchange="sFrmval(this);">
								<option value="dating" <?=$dating_chk?> >추천등록일</option>
								<option value="mb_id" <?=$id_chk?> >아이디</option>
								<option value="mb_name" <?=$name_chk?> >이름</option>
								<option value="mb_code" <?=$code_chk?> >코드</option>
								<option value="mb_phone" <?=$phone_chk?> >핸드폰</option>
								<option value="mb_email" <?=$email_chk?> >이메일</option>
							</select>
							<input type="text" class="w_input1" value="<?=$_GET['sval']?>" name="sval" style="width:180px">
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
				<col width="50">
				<col width="80">
				<col width="">
				<col width="">
				<col width="">
				<col width="">
				<col width="">
				<col width="">
				<col width="">
				<col width="">
				<col width="140">
			</colgroup>
			<thead>
				<tr>
					<th><input type="checkbox" class="" value="" name="" /></th>
					<th>글번호</th>
					<th>등수</th>
					<th>추천등록일</th>
					<th>추천인</th>
					<th>아이디</th>
					<th>이름</th>
					<th>핸드폰</th>
					<th>이메일</th>
					<th>레벨</th>
					<th>정보</th>
				</tr>
			</thead>
			<tbody>
				<? foreach($q as $key => $row){ ?>
				<tr>
					<td class="txt_c"><input type="checkbox" class="" value="" name="" /></td>
					<td class="txt_c"><?=$board_no?></td>
					<td class="txt_c"><?=$row[sbi_option2];?> 등</td>
					<td class="txt_c"><?=date('Y-m-d',strtotime($row['sbi_adate']))?></td>
					<td class="txt_c"><?=$row['sbi_option']=='' ? '미등록 고객' : $row['sbi_option']?></td>
					<td class="txt_c"><?=$row['sb_id']?></td>
					<td class="txt_c"><?=$row['sb_name']?></td>
					<td class="txt_c"><?=$row['sb_phone']?></td>
					<td class="txt_c"><?=$row['sb_email']?></td>
					<td class="txt_c"><?=$row['sb_level_title']?></td>
					<td class="txt_c"><a href="/adm/page/s2/s1sview_no_modfy.php?idx=<?=$row[sb_idx]?>&id=<?=$row[sb_id]?>" class="bt_s1" target="_blank" title="새창으로 열립니다.">자세히보기</a></td>
				</tr>
				<? 
					$board_no--;
				} 
				?>
			</tbody>
		</table>
	</div>

	<div class="bt_wrap1">
		<div class="left_box">
			<button type="button" class="bt_1">전체선택</button>
			<button type="button" class="bt_1">선택해제</button>
		</div>
		<div class="right_box">
			<button type="button" class="bt_1" onclick="location.href='s7ssmswrite.php'">선택 sms보내기</button>
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
					echo "<a href='?cur_page={$i}{$query_string}'>{$i}</a>\n";
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
	console.log(getVal.value);

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
</script>
<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/adm/_tail.php');
?>