
<div class="table_wrap1">
	<table>
		<caption>회원목록</caption>
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
		</colgroup>
		<thead>
			<tr>
				<th><input type="checkbox" class="" value="" name="" id="all_check" onclick="javascript:all_check();" placeholder="" /></th>
				<th>글번호</th>
				<th>상태</th>
				<th>발송일</th>
				<th>제목</th>
				<th>아이디</th>
				<th>이름</th>
				<th>핸드폰</th>
				<th>이메일</th>
				<th>승인신청</th>
			</tr>
		</thead>
		<tbody>
			<?
			if($query->num_rows != '0'){
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
				//회원 정보
				$sql = "select * from sb_member where sb_id='".$row['sbr_wid']."'";
				$q = $conn->query($sql);
				$mb_info = $q->fetch_assoc();
			?>
			<tr>
				<td class="txt_c"><input type="checkbox" class="rp_check_class" name="rp_check[]" value="<?=$row['sbabm_idx']?>" placeholder="" /></td>
				<td class="txt_c"><?=$board_no?></td>
				<td class="txt_c"><?=$event_stat?></td>
				<td class="txt_c"><?=date('Y-m-d', strtotime($row['sbr_rdate']))?></td>
				<td><?=$title['sbab_title']?></td>
				<td class="txt_c"><?=$row['sb_id']?></td>
				<td class="txt_c"><?=$row['sb_name']?></td>
				<td class="txt_c"><?=$row['sb_phone']?></td>
				<td class="txt_c"><?=$row['sb_email']?></td>
				<td class="txt_c">
					<input type="text" class="w_input1" value="<?=$row['sbabm_option4']?>" name="review_code" placeholder="승인코드입력" <?=$row['sbabm_option4']!='' ? "disabled" : "" ?> style="width:180px">
					<button type="button" class="bt_s1 input_sel" onclick="javascript:review_accpect('<?=$row['sbabm_fidx']?>','<?=$row['sbabm_idx']?>', this)">승인</button>
				</td>
			</tr>
			<? 
				$board_no--;
				}
			}else{
				echo '<tr><td colspan="10" align=center>등록된 후기가 없습니다.</td></tr>';
			}
			?>
		</tbody>
	</table>
</div>

<div class="bt_wrap1">
	<div class="left_box">
		<button type="button" class="bt_1" onclick="javascript:all_check_t();">전체선택</button>
		<button type="button" class="bt_1" onclick="javascript:all_check_f();">선택해제</button>
		<button type="button" class="bt_1" onclick="javascript:review_refuse_se('1');">선택거절1</button>
		<button type="button" class="bt_1" onclick="javascript:review_refuse_se('2');">선택거절2</button>
		<button type="button" class="bt_1" onclick="javascript:review_refuse_se('3');">선택거절3</button>
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
		$now_prev_page = "javascript:ajax_review('$aType', '$now_prev_page_num', '$stx', '$sval', '$eType');";
	}

	if($total_page == $cur_page){
		$now_next_page = "javascript:void(0);";
	}else{
		$now_next_page = "javascript:ajax_review('$aType', '$now_next_page_num', '$stx', '$sval', '$eType');";
	}
	?>
	<a href="javascript:ajax_review('<?=$aType?>','1','<?=$stx?>','<?=$sval?>','<?=$eType?>');" class="arr all_prev"><i>처음</i></a>
	<a href="<?=$now_prev_page?>" class="arr prev"><i>이전</i></a>
	<?
	for($i = $first_page_num; $i <= $total_page && $i <= $last_page_num; $i ++) {
		if($cur_page == $i){
			echo "<a href=\"javascript:ajax_review('$aType', '$i', '$stx', '$sval', '$eType');\" class=\"active\">{$i}</a>\n";
		}else{
			echo "<a href=\"javascript:ajax_review('$aType', '$i', '$stx', '$sval', '$eType');\" >{$i}</a>\n";
		}
	}

	$final_move_page = "javascript:ajax_review('$aType', '$total_page', '$stx', '$sval', '$eType');";
	?>
		
	<a href="<?=$now_next_page?>" class="arr next"><i>다음</i></a>
	<a href="<?=$final_move_page?>" class="arr all_next"><i>마지막</i></a>
</nav>

<h3>거절 sms template</h3>

<div class="sms_box_wrap">
	<?
	$sql = "select * from sb_sms_template where 1 ";
	$query = $conn->query($sql);
	$sms_no = "1";
	foreach($query as $key => $sms_row){
	?>
	<div>
		<div>
			<p class="title">선택거절<?=$sms_no?></p>
			<textarea name="sms_refuse_type<?=$sms_no?>" id=""><?=stripcslashes($sms_row['st_content'])?></textarea>
			<div style="text-align:center">
				<input type="hidden" name="st_idx<?=$i?>" value="<?=$i?>" />
				<button type="button" class="bt_1" onclick="javascript:sms_save('<?=$sms_row['st_idx']?>', this);">저장</button>
			</div>
		</div>
	</div>
	<? 
		$sms_no++;
	}
	?>
</div>