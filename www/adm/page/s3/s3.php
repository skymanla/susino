<?php 
include_once($_SERVER['DOCUMENT_ROOT'].'/adm/_head.php');

$cur_page = (int)$_GET['cur_page'];
if($cur_page=="") $cur_page = 1; //페이지 번호가 없으면 1번 페이지

/* 스시노 미식회 */
$tbl_info = "sb_application_board";
$flag_depth = "ftalk";

$where = array();
$where[] = " sbab_cate='$flag_depth' ";
switch($_GET['mvpage']){
	case "ing" :
		$ing_chk = 'class="active"';
		$where[] = ' date_format(sbab_sdate, "%Y-%m-%d") >= "'.date('Y-m-d').'" ';
		break;
	case "endding" :
		$endding_chk = 'class="active"';
		$where[] = ' date_format(sbab_edate, "%Y-%m-%d") < "'.date('Y-m-d').'" ';
		break;
	default :
		$a_chk = 'class="active"';
		break;
}

//검색 조건
switch($_GET['stx']){
	case "area" :
		$where[] = " sbab_area like '%".$_GET['sval']."%' ";
		$area_chk = "selected";
		break;
	case "title" :
		$where[] = " sbab_title like '%".$_GET['sval']."%' ";
		$title_chk = "selected";
		break;
	case "dating" :
		$where[] = " date_format(sbab_edate, '%Y-%m-%d') < '".$_GET['sval']."' ";
		$dating_chk = "selected";
		break;
	case "rdating" :
		$where[] = " date_format(sbab_rdate, '%Y-%m-%d') = '".$_GET['sval']."' ";
		$rdating_chk = "selected";
		break;
	default :
		break;
}
if(!empty($where)){
	$whereis = ' where '.implode(' and ', $where);
}else{
	$whereis = ' where 1 ';
}

//개수
$count = "SELECT COUNT(sbab_idx) as cnt FROM $tbl_info ".$whereis;
$count_result = $conn->query($count);
$row = $count_result->fetch_assoc();
$cnt = $row['cnt'];

$limit_num = 10; //몇개씩 리스트에 보여줄 것인지
$offset_num = 10; //몇번 부터 시작할지
$show_offset_num = ($cur_page - 1) * $offset_num; //페이지마다 보여주는 리스트가 40개씩 갱신.

$board_no = $cnt - $show_offset_num;

$total_page = floor ( $cnt / $limit_num ) + 1;


$sql = "select * from $tbl_info $whereis order by sbab_idx desc LIMIT $limit_num OFFSET $show_offset_num";
$q = $conn->query($sql);
?>

<section class="section1">
	<h3>스시노 미식회</h3>

	<ul class="tab_type1">
		<li <?=$a_chk?> ><a href="javascript:mv_page('a');">전체목록</a></li>
		<li <?=$ing_chk?> ><a href="javascript:mv_page('ing');">모집중</a></li>
		<li <?=$endding_chk?> ><a href="javascript:mv_page('endding');">마감</a></li>
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
								<option value="area" <?=$area_chk?> >우리동네</option>
								<option value="title" <?=$title_chk?> >제목</option>
								<option value="dating" <?=$dating_chk?> >기간</option>
								<option value="rdating" <?=$rdating_chk?> >작성일</option>
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
			<caption>게시물 목록</caption>
			<colgroup>
				<col width="50">
				<col width="80">
				<col width="">
				<col width="">
				<col width="">
				<col width="">
				<col width="">
				<col width="140">
			</colgroup>
			<thead>
				<tr>
					<th><input type="checkbox" class="" value="" name="" id="all_check" onclick="javascript:all_check();" placeholder="" /></th>
					<th>글번호</th>
					<th>우리동네</th>
					<th>제목</th>
					<th>기간</th>
					<th>작성일</th>
					<th>상태</th>
					<th>정보</th>
				</tr>
			</thead>
			<tbody>
				<? 
					foreach($q as $key => $r){ 
						$sdate = date('Y-m-d', strtotime($r['sbab_sdate']));
						$edate = date('Y-m-d', strtotime($r['sbab_edate']));
				?>
				<tr>
					<td class="txt_c"><input type="checkbox" class="rp_check_class" value="<?=$r['sbab_idx']?>" name="rp_checkp[]" placeholder="" /></td>
					<td class="txt_c"><?=$board_no?></td>
					<td class="txt_c"><?=$r['sbab_area']=="A" ? '전체' : $r['sbab_area'] ?></td>
					<td class="txt_c"><?=$r['sbab_title']?></td>
					<td class="txt_c"><?=$sdate?> ~ <?=$edate?></td>
					<td class="txt_c"><?=date('Y-m-d', strtotime($r['sbab_rdate']))?></td>
					<td class="txt_c">
						<?
							$now_date = date('Y-m-d');
							if($now_date > $edate){
								echo '<span class="txt_col1">마감</span>';
							}else if( ($now_date >= $sdate) && ($now_date <= $edate) ){
								echo "모집중";
							}
						?>
					</td>
					<td class="txt_c"><a href="s3sview.php?idx=<?=$r[sbab_idx]?>" class="bt_s1">자세히보기</a></td>
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
			<button type="button" class="bt_1" onclick="javascript:modiy_stat('D')">선택삭제</button>
		</div>
		<div class="right_box">
			<a href="s3swrite.php" class="bt_1">스시노 미식회 등록</a>
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
	function mv_page(getVal){
		if(getVal == "a"){
			location.href = './s3.php';
		}else if(getVal == "ing"){
			location.href = './s3.php?mvpage=ing';
		}else if(getVal == "endding"){
			location.href = './s3.php?mvpage=endding';
		}
	}
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
		    if(chk_data == ""){
				alert("삭제할 게시물을 선택해 주세요.");
				return false;
			}
		    $.ajax({
		    	type : 'POST',
		    	url : '/ajax/adm_board_del.php',
		    	data : {"mode": mode, "pageinfo" : "application", "flag_depth" : "<?=$flag_depth?>", "chk_idx" : chk_data},
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
<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/adm/_tail.php');
?>