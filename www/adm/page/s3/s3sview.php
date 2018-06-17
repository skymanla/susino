<?php 
include_once($_SERVER['DOCUMENT_ROOT'].'/adm/_head.php');
include_once($_SERVER['DOCUMENT_ROOT']."/lib/function.php");
/*
미식회 등록 내용 가져오기
 */
$tbl_info = "sb_application_board";
$flag_depth = "ftalk";
$sql = "select * from  $tbl_info where sbab_idx='".$_GET['idx']."' and sbab_cate='$flag_depth' ";
$q = $conn->query($sql);
$row = $q->fetch_assoc();
if(empty($row)){
	$url = "/adm/page/s3/s3.php";
	echoAlert("잘못된 접근입니다.");
	echoMovePage($url);	
}
//날짜 변환
$now_date = date('Y-m-d');
$sdate = date('Y-m-d', strtotime($row['sbab_sdate']));
$edate = date('Y-m-d', strtotime($row['sbab_edate']));
?>
<script>
$(function(){
	app_mb_list(1, "application", "<?=$flag_depth?>", "<?=$_GET[idx]?>");

	$('.tab_type1 > li').on('click', function(e){
		$(this).parent().find('li').removeClass();
		$(this).addClass('active');
	});
});

function app_mb_list(pageNo, aType, fType, Aidx, stx="", searchword=""){
	var keyword = document.getElementById("stx");
	var sword = document.getElementById("search_word");
	if(keyword != null){
		stx = keyword.options[keyword.selectedIndex].value;
	}
	if(sword != null){
		searchword = sword.value.trim();
	}
	if(searchword == ""){
		stx = "";
		searchword = "";
	}
	if(aType=="manual"){
		var url = '/ajax/adm_application_member_list_all.php';
	}else{
		var url = '/ajax/adm_application_member_list.php';
	}
	$.ajax({
		type : 'POST',
		url : url,
		data : {'cur_page' : pageNo, 'aType' : aType, 'fType' : fType, 'Aidx': Aidx, 'stx' : stx, 'search_word' : searchword},
		//dataType: 'html',
		success : function(data){
			$("#mem_list").html(data);
		}, error : function(){
			console.log('error!!!!');
		}
	})
}
</script>
<section class="section1">
	<h3>스시노 미식회 신청자</h3>
	<ul class="tab_type1">
		<li class="active"><a href="javascript:app_mb_list(1, 'application', '<?=$flag_depth?>', <?=$_GET[idx]?>)">신청자 목록</a></li>
		<li><a href="javascript:app_mb_list(1, 'prize', '<?=$flag_depth?>', <?=$_GET[idx]?>)">당첨자</a></li>
		<li><a href="javascript:app_mb_list(1, 'manual', '<?=$flag_depth?>', <?=$_GET[idx]?>)">당첨자 직접 등록</a></li>
	</ul>

	<div id="mem_list">
	</div>

	
	<div class="table_wrap1">
		<table>
			<caption>스시노 미식회 내용</caption>
			<colgroup>
				<col width="100">
				<col width="">
			</colgroup>
			<thead>
				<tr>
					<th colspan="4" class="txt_l">스시노 미식회 내용</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th>상태</th>
					<td>
						<?
							if($now_date > $edate){
								echo '<span class="txt_col1">마감</span>';
							}else if( ($now_date >= $sdate) && ($now_date <= $edate) ){
								echo "모집중";
							}else if( $now_date < $sdate){
								echo "진행 대기";
							}
						?>
					</td>
				</tr>
				<tr>
					<th>우리동네</th>
					<td>
						<?=$row['sbab_area'] == "A" ? "전체 지역" : $row['sbab_area']?>
					</td>
				</tr>
				<tr>
					<th>기간</th>
					<td><?=$sdate.' ~ '.$edate?></td>
				</tr>
				<tr>
					<th>작성일</th>
					<td><?=date('Y-m-d', strtotime($row['sbab_rdate']))?></td>
				</tr>
				<tr>
					<th>제목</th>
					<td><?=stripslashes($row['sbab_title'])?></td>
				</tr>
				<tr>
					<th>내용</th>
					<td>
						<?=stripslashes($row['sbab_content'])?>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="bt_wrap2">
		<a href="./s3swrite.php?mode=u&idx=<?=$_GET[idx]?>" class="bt_1">수정하기</a>
		<a href="s3.php" class="bt_2">목록으로</a>
	</div>

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

/* select delete start */
function modiy_stat(mode){
	if(mode=="P"){
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
			alert("담첨될 회원을 선택해 주세요.");
			return false;
		}
	    $.ajax({
	    	type : 'POST',
	    	url : '/ajax/adm_prize_member.php',
	    	data : {"mode": mode, "pageinfo" : "prize", "flag_depth" : "<?=$flag_depth?>", "chk_idx" : chk_data, "Fidx" : <?=$_GET[idx]?> },
	    	success : function(result){
	    		//console.log(result);
	    		alert("총 "+result+"명 회원이 당첨되었습니다.\n페이지를 새로고침합니다.");
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