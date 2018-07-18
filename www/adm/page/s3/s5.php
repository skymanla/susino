<?php 
include_once($_SERVER['DOCUMENT_ROOT'].'/adm/_head.php');

//
$uri = $_SERVER['HTTP_HOST'];
$cur_page = (int)$_GET['cur_page'];
if($cur_page=="") $cur_page = 1; //페이지 번호가 없으면 1번 페이지

//search value


//개수
$count = "SELECT COUNT(sbe_idx) as cnt FROM sb_event";
$count_result = $conn->query($count);
while($row = $count_result->fetch_assoc()){
	$cnt = $row['cnt'];
}

$limit_num = 10; //몇개씩 리스트에 보여줄 것인지
$offset_num = 10; //몇번 부터 시작할지
$show_offset_num = ($cur_page - 1) * $offset_num; //페이지마다 보여주는 리스트가 40개씩 갱신.

$board_no = $cnt - $show_offset_num;

$total_page = floor ( $cnt / $limit_num ) + 1;

$query = "SELECT * FROM sb_event ORDER BY sbe_rdate DESC LIMIT $limit_num OFFSET $show_offset_num";
$result = $conn->query($query);

$qtr = "page=".$cur_page;
?>

<section class="section1">
	<h3>이벤트</h3>
	<form name="searchFrm" id="searchFrm">
		<input type="hidden" name="stype" id="stype" value="event" />
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
							<select name="stitle" title="" class="w_input1">
								<option value="title">제목</option>
								<option value="bdate">기간</option>
								<option value="rdate">작성일</option>
							</select>
							<input type="text" class="w_input1" value="" name="scont" style="width:180px">
							<button type="button" class="bt_s1 input_sel" onclick="document.searchFrm.submit()">검색</button>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</form>

	<div class="table_wrap1">
		<table>
			<caption>이벤트 목록</caption>
			<colgroup>
				<col width="50">
				<col width="80">
				<col width="300">
				<col width="">
				<col width="">
				<col width="">
				<col width="140">
			</colgroup>
			<thead>
				<tr>
					<th><input type="checkbox" class="" value="" name="" id="all_check" onclick="javascript:all_check();" placeholder="" /></th>
					<th>글번호</th>
					<th>섬네일</th>
					<th>제목</th>
					<th>기간</th>
					<th>작성일</th>
					<th>정보</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$i = 0;
					while($row = $result->fetch_assoc()){
				?>
				<tr>
					<td class="txt_c"><input type="checkbox" class="rp_check_class" value="<?=$row[sbe_idx]?>" name="rp_check[]" placeholder="" /></td>
					<td class="txt_c"><?=$board_no?></td>
					<td class="txt_c">
						<div class="img_wrap">
							<a href="./s5sview.php?idx=<?=$row['sbe_idx']?>&<?=$qtr?>">
							<? if(!empty($row['sbe_file'])){ ?>
							<img src="http://<?=$uri?>/data/event/<?=$row['sbe_file']?>" alt="<?=$row['sbe_title']?>의 섬네일" />
							<? } ?>
							</a>
						</div>
					</td>
					<td class="txt_c"><?=$row['sbe_title']?></td>
					<td class="txt_c">
						<?	
							echo $row['sbe_sdate']?> ~ <?=$row['sbe_edate'];
							$class = "";
							if(date('Y-m-d') >= $row['sbe_sdate'] && date('Y-m-d') < $row['sbe_edate']){
								echo "<span class='mk_ing'>(진행중)</span>";
							}else if(date('Y-m-d') < $row['sbe_sdate']){
								echo "<span class='mk_ex'>(진행예정)</span>";
							}else{
								echo "<span class='mk_end'>(종료)</span>";
							}
						?>
					</td>
					<td class="txt_c">
						<?
							echo $row['sbe_idate'] ? $row['sbe_idate'] : date('Y-m-d', strtotime($row['sbe_rdate']));
						?>
					</td>
					<td class="txt_c"><a href="./s5sview.php?idx=<?=$row['sbe_idx']?>&<?=$qtr?>" class="bt_s1">자세히보기</a></td>
				</tr>
				<?php
					$i++;
					$board_no--;
					}
					if($i==0){
				?>
				<tr>
					<td colspan="7" style="text-align:center">등록된 이벤트가 없습니다.</td>
				</tr>
				<? } ?>
			</tbody>
		</table>
	</div>

	
	<div class="bt_wrap1">
		<div class="left_box">
			<button type="button" class="bt_1" onclick="javascript:all_check_t();">전체선택</button>
			<button type="button" class="bt_1" onclick="javascript:all_check_f();">선택해제</button>
			<button type="button" class="bt_1" onclick="javascript:modiy_stat('D')">선택삭제</button>
		</div>
		<div class="right_box">
			<a href="s5swrite.php" class="bt_1">이벤트 등록</a>
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

	/* select delete start */
	function modiy_stat(mode){
		if(mode=="D"){
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
		    	type : 'POST',
		    	url : '/ajax/adm_board_del.php',
		    	data : {"mode": mode, "pageinfo" : "s3_s5", "chk_idx" : chk_data},
		    	success : function(result){
		    		//console.log(result);
		    		alert("선택된 게시물이 삭제되었습니다.");
		    		location.reload();
		    	}, error : function(jqXHR, textStatus, errorThrown){
					console.log("error!\n"+textStatus+" : "+errorThrown);
				}
		    });
		}else{
			console.log('undefinded mode');
			return false;
		}
	}
	/* select delete end */
</script>
</section>

<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/adm/_tail.php');
?>