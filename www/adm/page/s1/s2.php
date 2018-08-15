<?php 
include_once($_SERVER['DOCUMENT_ROOT'].'/adm/_head.php');

$cur_page = (int)$_GET['cur_page'];
if($cur_page=="") $cur_page = 1; //페이지 번호가 없으면 1번 페이지

//개수
$count = "SELECT COUNT(sbb_idx) as cnt FROM sb_business";
$count_result = $conn->query($count);
while($row = $count_result->fetch_assoc())
{
	$cnt = $row['cnt'];
}

$limit_num = 20; //몇개씩 리스트에 보여줄 것인지
$offset_num = 10; //몇번 부터 시작할지
$show_offset_num = ($cur_page - 1) * $offset_num; //페이지마다 보여주는 리스트가 40개씩 갱신.

$board_no = $cnt - $show_offset_num;

$total_page = floor ( $cnt / $limit_num ) + 1;

$query = "SELECT * FROM sb_business ORDER BY sbb_rdate DESC LIMIT $limit_num OFFSET $show_offset_num";
$result = $conn->query($query);
?>

<section class="section1">
	<h3>일성 창업상담</h3>
	<div class="table_wrap1">
		<table>
			<caption>게시글 목록</caption>
			<colgroup>
				<col width="50">
				<col width="100">
				<col width="">
				<col width="">
				<col width="">
				<col width="">
				<col width="">
			</colgroup>
			<thead>
				<tr>
					<th><input type="checkbox" class="" value="" name="" id="all_check" onclick="javascript:all_check();" /></th>
					<th>글번호</th>
					<th>창업희망지역</th>
					<th>이름</th>
					<th>전화번호</th>
					<th>작성일</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$i = 0;
				while($row = $result->fetch_assoc()){
					if($row['sbb_aria'] == 0){
						$sbb_aria = "서울특별시 ".$row['sbb_aria2'];
					}
					if($row['sbb_aria'] == 1){
						$sbb_aria = "부산광역시 ".$row['sbb_aria2'];
					}
					if($row['sbb_aria'] == 2){
						$sbb_aria = "대구광역시 ".$row['sbb_aria2'];
					}
					if($row['sbb_aria'] == 3){
						$sbb_aria = "인천광역시 ".$row['sbb_aria2'];
					}
					if($row['sbb_aria'] == 4){
						$sbb_aria = "광주광역시 ".$row['sbb_aria2'];
					}
					if($row['sbb_aria'] == 5){
						$sbb_aria = "대전광역시 ".$row['sbb_aria2'];
					}
					if($row['sbb_aria'] == 6){
						$sbb_aria = "울산광역시 ".$row['sbb_aria2'];
					}
					if($row['sbb_aria'] == 7){
						$sbb_aria = "세종특별자치시 ".$row['sbb_aria2'];
					}
					if($row['sbb_aria'] == 8){
						$sbb_aria = "경기도 ".$row['sbb_aria2'];
					}
					if($row['sbb_aria'] == 9){
						$sbb_aria = "강원도 ".$row['sbb_aria2'];
					}
					if($row['sbb_aria'] == 10){
						$sbb_aria = "충청북도 ".$row['sbb_aria2'];
					}
					if($row['sbb_aria'] == 11){
						$sbb_aria = "충청남도 ".$row['sbb_aria2'];
					}
					if($row['sbb_aria'] == 12){
						$sbb_aria = "전라북도 ".$row['sbb_aria2'];
					}
					if($row['sbb_aria'] == 13){
						$sbb_aria = "전라남도 ".$row['sbb_aria2'];
					}
					if($row['sbb_aria'] == 14){
						$sbb_aria = "경상북도 ".$row['sbb_aria2'];
					}
					if($row['sbb_aria'] == 15){
						$sbb_aria = "경상남도 ".$row['sbb_aria2'];
					}
					if($row['sbb_aria'] == 16){
						$sbb_aria = "제주특별자치도 ".$row['sbb_aria2'];
					}
					if($row['sbb_aria'] == ''){
						$sbb_aria = "시/도 ".$row['sbb_aria2'];
					}
				?>
				<tr>
					<td class="txt_c"><input type="checkbox" class="rp_check_class" name="rp_check[]" value="<?=$row['sbb_idx']?>" /></td>
					<td class="txt_c"><?php echo $board_no;?></td>
					<td class="txt_c"><a href="s2sview.php?idx=<?php echo $row['sbb_idx'];?>"><?php echo $sbb_aria;?></a></td>
					<td class="txt_c"><?php echo $row['sbb_name'];?></td>
					<td class="txt_c"><?php echo $row['sbb_hp'];?></td>
					<td class="txt_c"><?php echo substr($row['sbb_rdate'],0,10);?></td>
				</tr>
				<?php
					$i++;
					$board_no--;
				}
				?>
				<?php 
				if($i==0)
				{
				?>
				<tr>
					<td class="txt_c" colspan="6">등록된 글이 없습니다.</td>
				</tr>
				<?php 
				}
				?>
			</tbody>
		</table>
	</div>

	<div class="bt_wrap1">
		<div class="left_box">
			<button type="button" class="bt_1" onclick="javascript:all_check_t()" >전체선택</button>
			<button type="button" class="bt_1" onclick="javascript:all_check_f()" >선택해제</button>
			<button type="button" class="bt_1" onclick="javascript:modiy_stat('D')">선택삭제</button>
		</div>
	</div>

	<nav class="paging_type1">
	<?php 
	$first_page_num = (floor ( ($cur_page - 1) / 10 )) * 10 + 1; // 1,11,21,31...
	$last_page_num = $first_page_num + 9; // 10,20,30...last
	$next_page_num = $last_page_num + 1;
	$prev_page_num = $first_page_num - 10;

	if ($first_page_num != 1) { // It's not first page
		echo "<a href='?cur_page=$prev_page_num' class='arr prev'><i>이전</i></a>\n";
	}

	for($i = $first_page_num; $i <= $total_page && $i <= $last_page_num; $i ++) {
		if ($cur_page == $i) {
			echo "<a href='?cur_page=$i' class='active'>$i</a>\n"; // Current page
		} else {
			echo "<a href='?cur_page=$i'>$i</a>\n";
		}
		if ($i % 10 == 0 && $last_page_num != $total_page) {
			echo "<a href='?cur_page=$next_page_num' class='arr next'><i>다음</i></a>";
		}
	}
	?>
	</nav>
	<script>
		/* checkbox function start */
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
		/* checkbox function end */

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
			    if(chk_data == ""){
			    	alert("삭제할 게시물을 선택해 주세요.");
			    	return false;
			    }
			    $.ajax({
			    	type : 'POST',
			    	url : '/ajax/adm_board_del.php',
			    	data : {"mode": mode, "pageinfo" : "s1_s2", "chk_idx" : chk_data},
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