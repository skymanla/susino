<?
include_once $_SERVER['DOCUMENT_ROOT']."/lib/dbconn.php";

$cur_page = (int)$_REQUEST['cur_page'];
if($cur_page=="") $cur_page = 1; //페이지 번호가 없으면 1번 페이지


$query_string = "";
if($_REQUEST['memstat']){
	switch($_REQUEST['memstat']){
		case "1":
			$sql_mem_stat = "";
			$active_class1 = "class='active'";
			$query_string.="&memstat=1";
			break;
		case "2":
			$sql_mem_stat = "and sb_delete_flag is null";
			$active_class2 = "class='active'";
			$query_string.="&memstat=2";
			break;
		case "3":
			$sql_mem_stat = "and sb_delete_flag='1'";
			$active_class3 = "class='active'";
			$query_string.="&memstat=3";
			break;
	}
}else{
	$active_class1 = "class='active'";
}

switch($_REQUEST['stx']){
	case "id":
		$stx_id_check = 'selected="selected"';
		$sql_search = " and sb_id='".$_REQUEST['search_word']."'";
		$query_string.="&stx=id&search_word=".$_REQUEST['search_word'];
		break;
	case "name":
		$stx_name_check = 'selected="selected"';
		$sql_search = " and sb_name like '%".$_REQUEST['search_word']."%'";
		$query_string.="&stx=name&search_word=".$_REQUEST['search_word'];
		break;
	case "phone":
		$stx_phone_check = 'selected="selected"';
		$sql_search = " and sb_phone='".$_REQUEST['search_word']."'";
		$query_string.="&stx=phone&search_word=".$_REQUEST['search_word'];
		break;
	case "email":
		$stx_email_check = 'selected="selected"';
		$sql_search = " and sb_email='".$_REQUEST['search_word']."'";
		$query_string.="&stx=email&search_word=".$_REQUEST['search_word'];
		break;
	case "level":
		$stx_level_check = 'selected="selected"';
		$sql_search = " and sb_mem_level='".$_REQUEST['search_word']."'";
		$query_string.="&stx=level&search_word=".$_REQUEST['search_word'];
		break;
	case "regdate":
		$stx_regdate_check = 'selected="selected"';
		$sql_search = " and DATE_FORMAT(sb_regdate,'%Y-%m-%d')='".$_REQUEST['regdate'];
		$query_string.="&stx=regdate&search_word=".$_REQUEST['search_word'];
		break;
	case "dongnae":
		$stx_dongnae_check = 'selected="selected"';
		$sql_search = " and sb_dongnae='".$_REQUEST['search_word']."'";
		$query_string.="&stx=dongnae&search_word=".$_REQUEST['search_word'];
		break;
	default:
		//$stx_id_check = 'selected="selected"';
		break;


}

//개수
$count = "select count(sb_idx) as cnt from sb_member where sb_idx <> '' $sql_mem_stat $sql_search ";
$count_result = $conn->query($count);
while($row = $count_result->fetch_assoc())
{
	$cnt = $row['cnt'];
}

$limit_num = 10; //몇개씩 리스트에 보여줄 것인지
$offset_num = 10; //몇번 부터 시작할지
$show_offset_num = ($cur_page - 1) * $offset_num; //페이지마다 보여주는 리스트가 40개씩 갱신.

$board_no = $cnt - $show_offset_num;

if($cnt == $limit_num){
	$total_page = floor ( $cnt / $limit_num );
}else{
	$total_page = floor ( $cnt / $limit_num )+1;
}

$sql = "select 
			a.sb_idx, a.sb_id as sb_id, a.sb_name as sb_name, a.sb_phone as sb_phone, a.sb_email as sb_email,
			a.sb_mem_level as sb_mem_level, a.sb_dongnae as sb_dongnae, b.sb_level_title as sb_level_title, a.sb_regdate as sb_regdate, a.sb_delete_flag as sb_delete_flag
			from
			sb_member a left join sb_member_level b on
			a.sb_mem_level=b.sb_level_cate
			where a.sb_idx <> '' $sql_mem_stat $sql_search order by a.sb_regdate desc limit $limit_num offset $show_offset_num";

$mem_list_query = $conn->query($sql);


$sql = "select * from sb_member_level where 1 order by sb_level_cate asc";
$level_query = $conn->query($sql);
?>


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
						<select name="stx" id="stx" title="" class="w_input1">
							<option value="id" <?=$stx_id_check?> >아이디</option>
							<option value="name" <?=$stx_name_check?> >이름</option>
							<option value="phone" <?=$stx_phone_check?> >핸드폰</option>
							<option value="email" <?=$stx_email_check?> >이메일</option>
							<option value="level" <?=$stx_level_check?> >레벨</option>
							<option value="dongnae">우리동네</option>
							<option value="regdate" <?=$stx_regdate_check?> >가입일</option>
						</select>
						<input type="text" class="w_input1" value="" name="search_word" id="search_word" style="width:180px">
						<button type="button" class="bt_s1 input_sel" id="cate_append_bt" onclick="javascript:mem_list(1,'','');">검색</button>
					</form>
					</td>
				</tr>
			</tbody>
		</table>
	</div>

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
				<col width="140">
			</colgroup>
			<thead>
				<tr>
					<th>글번호</th>
					<th>우리동네</th>
					<th>아이디</th>
					<th>이름</th>
					<th>핸드폰</th>
					<th>이메일</th>
					<th>레벨</th>
					<th>가입일</th>
					<th>정보</th>
				</tr>
			</thead>
			<tbody>
				<?
					$idx = 0;
					foreach($mem_list_query as $key=>$row){
				?>
				<tr onclick="javascript:mem_click_ev('<?=$row['sb_id']?>')">
					<!--<input type="hidden" name="sb_id" id="sb_id_<?=$row['sb_id']?>" value="<?=$row['sb_id']?>" />-->
					<td class="txt_c"><?=$board_no?></td>
					<td class="txt_c"><?=$row['sb_dongnae']?></td>
					<td class="txt_c"><?=$row['sb_id']?></td>
					<td class="txt_c"><?=$row['sb_name']?></td>
					<td class="txt_c"><?=$row['sb_phone']?></td>
					<td class="txt_c"><?=$row['sb_email']?></td>
					<td class="txt_c">
						<?
							foreach($level_query as $key=>$level_row){
								if($level_row['sb_level_cate']==$row['sb_mem_level']){
									echo $level_row['sb_level_title'];
								}
							}
						?>
					</td>
					<td class="txt_c"><?=date("Y-m-d",strtotime($row['sb_regdate']))?></td>
					<td class="txt_c"><a href="javascript:openMember(<?=$row['sb_idx']?>);" class="bt_s1">자세히보기</a></td>
				</tr>
				<? 	
						$idx++;
						$board_no--;
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
					echo "<a href='javascript:mem_list({$i});' class='active'>{$i}</a>\n";
				}else{
					echo "<a href='javascript:mem_list({$i});'>{$i}</a>";
				}
			}
		?>
		
		<a href="<?=$now_next_page?>" class="arr next"><i>다음</i></a>
		<a href="javascript:void(0);" class="arr all_next"><i>마지막</i></a>
	</nav>
