<?php 
include_once($_SERVER['DOCUMENT_ROOT'].'/adm/_head.php');
include_once($_SERVER['DOCUMENT_ROOT']."/lib/function.php");
$cur_page = (int)$_GET['cur_page'];
if($cur_page=="") $cur_page = 1; //페이지 번호가 없으면 1번 페이지


$query_string = "";

switch($_GET['stx']){
	case "title":
		$stx_id_check = 'selected="selected"';
		$sql_search = " and sb_email_title like '%".$_GET['search_word']."%'";
		$query_string.="&stx=id&search_word=".$_GET['search_word'];
		break;
	case "send_date":
		$stx_regdate_check = 'selected="selected"';
		$sql_search = " and DATE_FORMAT(sb_email_send_date,'%Y-%m-%d')='".$_GET['search_word']."'";
		$query_string.="&stx=send_date&search_word=".$_GET['search_word'];
		break;
	default:
		$stx_option_check = 'selected="selected"';
		break;


}

//개수
$count = "select count(sb_idx) as cnt from sb_email_list where sb_idx <> '' and sb_email_delete_flag is null $sql_mem_stat $sql_search ";

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
			*
			from
			sb_email_list
			where sb_idx <> '' and sb_email_delete_flag is null $sql_mem_stat $sql_search order by sb_email_send_date desc limit $limit_num offset $show_offset_num";

$mail_list_query = $conn->query($sql);


$sql = "select * from sb_member_level where 1 order by sb_level_cate asc";
$level_query = $conn->query($sql);

$sql = "select * from sb_dongnae_set where 1 order by sb_dong_cate asc";
$dong_query = $conn->query($sql);

?>
<section class="section1">
	<h3>회원 E-mail 관리</h3>

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
							<select name="stx" id="stx" title="" class="w_input1">
								<option value="" <?=$stx_option_check?>>구분</option>
								<option value="title" <?=$$stx_id_check?> >제목</option>
								<option value="send_date" <?=$stx_regdate_check?> >발송일시</option>
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
			<caption>EMAIL 목록</caption>
			<colgroup>
				<col width="50">
				<col width="80">
				<col width="140">
				<col width="240">
				<col width="">
				<col width="230">
				<col width="140">
			</colgroup>
			<thead>
				<tr>
					<th><input type="checkbox" class="" value="" name="" id="all_check" onclick="javascript:all_check();" placeholder="" /></th>
					<th>글번호</th>
					<th>구분</th>
					<th>받는이</th>
					<th>제목</th>
					<th>발송일시</th>
					<th>자세히보기</th>
				</tr>
			</thead>
			<tbody>
				<?
					foreach($mail_list_query as $key=>$mail_row){
				?>
				<tr>
					<td class="txt_c"><input type="checkbox" class="rp_check_class" name="rp_check[]" value="<?=$mail_row['sb_idx']?>" placeholder="" /></td>
					<td class="txt_c"><?=$board_no?></td>
					<td class="txt_c"><?=$mail_row['sb_email_send_mb']?></td>
					<td>
						<?
							switch($mail_row['sb_email_send_mb']){
								case "직접입력":
									$sender_list = explode(",",$mail_row['sb_email_send_lvl']);
									$sender_count = count($sender_list);
									echo $sender_list[0]."외 ".($sender_count-1)."명";
									break;
								case "레벨설정":
									foreach($level_query as $key=>$lvl_row){
										if($lvl_row['sb_level_cate']==$mail_row['sb_email_send_lvl']){
											echo $mail_row['sb_email_send_mb']." : ".$lvl_row['sb_level_title'];
										}
									}
									break;
								case "우리동네":
									foreach($dong_query as $key=>$dong_row){
										if($dong_row['sb_dong_cate']==$mail_row['sb_email_send_lvl']){
											echo $mail_row['sb_email_send_mb']." : ".$dong_row['sb_dong_name'];
										}
									}
									break;
							}
						?>
					</td>
					<td><?=$mail_row['sb_email_title']?></td>
					<td class="txt_c"><?=$mail_row['sb_email_send_date']?></td>
					<td class="txt_c"><a href="s3sview.php?idx=<?=$mail_row['sb_idx']?>" class="bt_s1">보기</a></td>
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
			<button type="button" class="bt_1" onclick="javascript:all_check_t();">전체선택</button>
			<button type="button" class="bt_1" onclick="javascript:all_check_f();">선택해제</button>
			<button type="button" class="bt_1" onclick="javascript:chk_delete();">선택삭제</button>
		</div>
		<div class="right_box">
			<a href="s3swrite.php" class="bt_1">E-mail 작성</a>
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
	function chk_delete(){
		var chk_data = new Array()
		var chk_cnt = 0;
		var chkbox = $('.rp_check_class');

		for(var i=0;i<chkbox.length;i++){
	        if(chkbox[i].checked == true){
	            chk_data[chk_cnt] = chkbox[i].value;
	            chk_cnt++;
	        }
	    }
	    $.ajax({
	    	type : "POST",
	    	//dataType : "json",
	    	url : "/ajax/adm_delete_msg.php",
	    	data : {'chk_data' : chk_data},
	    	success : function(result){
	    		alert("삭제되었습니다.");
	    		location.reload();
	    	}, error : function(jqXHR, textStatus, errorThrown){
				console.log("error!\n"+textStatus+" : "+errorThrown);
			}
	    });
	}
	function searchfrm(){
		if($.trim($("#search_word").val())==""){
			alert("검색어를 입력해 주세요");
			return false;
		}
		var frm = document.getElementById("searchFrm");
		

		frm.submit();
	}
</script>
<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/adm/_tail.php');
?>