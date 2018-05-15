<?php 
include_once($_SERVER['DOCUMENT_ROOT'].'/adm/_head.php');

$cur_page = (int)$_GET['cur_page'];
if($cur_page=="") $cur_page = 1; //페이지 번호가 없으면 1번 페이지


$query_string = "";
if($_GET['memstat']){
	switch($_GET['memstat']){
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

switch($_GET['stx']){
	case "id":
		$stx_id_check = 'selected="selected"';
		$sql_search = " and sb_id='".$_GET['search_word']."'";
		$query_string.="&stx=id&search_word=".$_GET['search_word'];
		break;
	case "name":
		$stx_name_check = 'selected="selected"';
		$sql_search = " and sb_name like '%".$_GET['search_word']."%'";
		$query_string.="&stx=name&search_word=".$_GET['search_word'];
		break;
	case "phone":
		$stx_phone_check = 'selected="selected"';
		$sql_search = " and sb_phone='".$_GET['search_word']."'";
		$query_string.="&stx=phone&search_word=".$_GET['search_word'];
		break;
	case "email":
		$stx_email_check = 'selected="selected"';
		$sql_search = " and sb_email='".$_GET['search_word']."'";
		$query_string.="&stx=email&search_word=".$_GET['search_word'];
		break;
	case "level":
		$stx_level_check = 'selected="selected"';
		$sql_search = " and sb_mem_level='".$_GET['search_word']."'";
		$query_string.="&stx=level&search_word=".$_GET['search_word'];
		break;
	case "regdate":
		$stx_regdate_check = 'selected="selected"';
		$sql_search = " and DATE_FORMAT(sb_regdate,'%Y-%m-%d')='".$_GET['search_word']."'";
		$query_string.="&stx=regdate&search_word=".$_GET['search_word'];
		break;
	default:
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
			a.sb_mem_level as sb_mem_level, b.sb_level_title as sb_level_title, a.sb_regdate as sb_regdate, a.sb_delete_flag as sb_delete_flag
			from
			sb_member a left join sb_member_level b on
			a.sb_mem_level=b.sb_level_cate
			where a.sb_idx <> '' $sql_mem_stat $sql_search order by a.sb_regdate desc limit $limit_num offset $show_offset_num";

$mem_list_query = $conn->query($sql);


$sql = "select * from sb_member_level where 1 order by sb_level_cate asc";
$level_query = $conn->query($sql);
?>
<section class="section1">
	<h3>회원목록</h3>
	<ul class="tab_type1">
		<li <?=$active_class1?>><a href="javascript:stat_search(1);">전체목록</a></li>
		<li <?=$active_class2?>><a href="javascript:stat_search(2);">스시노백 회원</a></li>
		<li <?=$active_class3?>><a href="javascript:stat_search(3);">탈퇴회원</a></li>
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
						<form method="get" name="searchFrm" id="searchFrm" onsubmit="return searchFrm();">
							<input type="hidden" name="memstat" id="memstat" value="<?=$_GET['memstat']?>" />
							<select name="stx" id="stx" title="" class="w_input1">
								<option value="id" <?=$stx_id_check?> >아이디</option>
								<option value="name" <?=$stx_name_check?> >이름</option>
								<option value="phone" <?=$stx_phone_check?> >핸드폰</option>
								<option value="email" <?=$stx_email_check?> >이메일</option>
								<option value="level" <?=$stx_level_check?> >레벨</option>
								<option value="regdate" <?=$stx_regdate_check?> >가입일</option>
							</select>
							<input type="text" class="w_input1" value="<?=$_GET['search_word']?>" name="search_word" id="search_word" style="width:180px">
							<button type="button" class="bt_s1 input_sel" id="cate_append_bt" onclick="javascript:searchfrm();">검색</button>
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
			</colgroup>
			<thead>
				<tr>
					<th><input type="checkbox" class="" value="" name="" id="all_check" onclick="javascript:all_check();" placeholder="" /></th>
					<th>글번호</th>
					<th>우리동네</th>
					<th>아이디</th>
					<th>이름</th>
					<th>핸드폰</th>
					<th>이메일</th>
					<th>레벨</th>
					<th>가입일</th>
					<th>상태</th>
					<th>정보</th>
				</tr>
			</thead>
			<tbody>
				<?
					$idx = 0;
					foreach($mem_list_query as $key=>$row){
				?>
				<tr>
					<td class="txt_c"><input type="checkbox" class="rp_check_class" name="rp_check[]" value="<?=$row['sb_idx']?>" placeholder="" /></td>
					<td class="txt_c"><?=$board_no?></td>
					<td class="txt_c">지역1</td>
					<td class="txt_c"><?=$row['sb_id']?></td>
					<td class="txt_c"><?=$row['sb_name']?></td>
					<td class="txt_c"><?=$row['sb_phone']?></td>
					<td class="txt_c"><?=$row['sb_email']?></td>
					<td class="txt_c">
						<select id="sb_m_lvl_<?=$idx?>" title="" class="w_input1">
							<?
								foreach($level_query as $key=>$level_row){
							?>
							<option value="<?=$level_row['sb_level_cate']?>" <?=$level_row['sb_level_cate']==$row['sb_mem_level'] ? 'selected="selected"' : '' ?>><?=$level_row['sb_level_title']?></option>
							<? } ?>
						</select>
					</td>
					<td class="txt_c"><?=date("Y-m-d",strtotime($row['sb_regdate']))?></td>
					<td class="txt_c"><?=$row['sb_delete_flag']=="1" ? "탈퇴회원" : "스시노백 회원"?></td>
					<td class="txt_c"><a href="s1sview.php?idx=<?=$row['sb_idx']?>&id=<?=$row['sb_id']?>" class="bt_s1">정보수정</a></td>
				</tr>
				<? 	
						$idx++;
						$board_no--;
					} 
				?>
			</tbody>
		</table>
	</div>

	<div class="bt_wrap1">
		<div class="left_box">
			<button type="button" class="bt_1" onclick="javascript:all_check_t();">전체선택</button>
			<button type="button" class="bt_1" onclick="javascript:all_check_f();">선택해제</button>
			<button type="button" class="bt_1" onclick="javascript:level_all_modify();">선택수정</button>
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

<script>
function stat_search(idx){
	location.replace("?memstat="+idx);
}
function searchfrm(){
	if($.trim($("#search_word").val())==""){
		alert("검색어를 입력해 주세요");
		return false;
	}
	var frm = document.getElementById("searchFrm");
	

	frm.submit();
}

function all_check(){
    if($('#all_check').is(':checked')){
        $(".rp_check_class").prop("checked", true);
    }else{
        $(".rp_check_class").prop("checked", false);   
    }
}

function all_check_t(){
    $(".rp_check_class").prop("checked", true);
}

function all_check_f(){
    $(".rp_check_class").prop("checked", false);   
}

function level_all_modify(){
	var idx_flag = <?=$idx?>;
	var chk_data = new Array()
	var chk_cnt = 0;
	var chkbox = $('.rp_check_class');

	for(var i=0;i<chkbox.length;i++){
        if(chkbox[i].checked == true){
        	chk_data[chk_cnt] = new Array();
        	var lvl_val = document.getElementById('sb_m_lvl_'+i);
            /*chk_data[chk_cnt]['sb_idx'] = chkbox[i].value;
            chk_data[chk_cnt]['sb_lvl_cata'] = lvl_val.options[lvl_val.selectedIndex].value;*/
            chk_data[chk_cnt] = {'sb_idx' : chkbox[i].value, 'sb_lvl_cata' : lvl_val.options[lvl_val.selectedIndex].value}
            chk_cnt++;
        }
    }
    $.ajax({
    	type : "POST",
    	//dataType : "json",
    	url : "/ajax/modify_adm_mem.php",
    	data : {ajax_data : chk_data},
    	success : function(result){
    		alert("회원 레벨이 수정되었습니다.\n페이지를 새로고침합니다.");
    		location.reload();
    	}, error : function(jqXHR, textStatus, errorThrown){
			console.log("error!\n"+textStatus+" : "+errorThrown);
		}
    });
}
</script>
<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/adm/_tail.php');
?>