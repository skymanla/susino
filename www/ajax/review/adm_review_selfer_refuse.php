
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
		</colgroup>
		<thead>
			<tr>
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
				<td class="txt_c"><?=$board_no?></td>
				<td class="txt_c"><?=$event_stat?></td>
				<td class="txt_c"><?=date('Y-m-d', strtotime($row['sbr_rdate']))?></td>
				<td class="txt_c"><?=$row['sb_id']?></td>
				<td class="txt_c"><?=$row['sb_name']?></td>
				<td class="txt_c"><?=$row['sb_phone']?></td>
				<td class="txt_c"><?=$row['sb_email']?></td>
				<td class="txt_c"><?=$row['sb_level_title']?></td>
			</tr>
			<? 
				$board_no--;
				}
			}else{
				echo '<tr><td colspan="8" align=center>등록된 후기가 없습니다.</td></tr>';
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