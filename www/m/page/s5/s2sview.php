<?php
include_once "../../_head.php";
//글목록 및 신청/당첨/후기 여부 가져오기
$tbl_info = " sb_application_board ";
$where = " sbab_idx='".$_GET['idx']."' ";
$sql = "select * from ".$tbl_info." where ".$where;
$query = $conn->query($sql);

if($query->num_rows == '0'){
	header("HTTP/1.1 500 Interval Error");
	die("잘못된 접근입니다.");
}else{
	$page = $_GET['page'];
	$type = $_GET['type'];
	if($type == "myissue"){
		$move_php = "s2s2";
	}else{
		$move_php = "s2s1";
	}
	$row = $query->fetch_assoc();

	switch($row['sbab_cate']){
		case "shopper":
			$cate_bg = "bg1";
			$cate_title = "미스테리 쇼퍼";
			break;
		case "pick":
			$cate_bg = "bg3";
			$cate_title = "체험단";
			break;
		case "ftalk":
			$cate_bg = "bg2";
			$cate_title = "스시노미식회";
			break;
	}

	//전제, 모집중, 마감
	$now_date = date('Y-m-d');
	$sdate = date('Y-m-d', strtotime($row['sbab_sdate']));
	$edate = date('Y-m-d', strtotime($row['sbab_edate']));
}
?>

<div class="wrap_conts wid_full">
	<div class="hd_s_img">
		<h2><img src="/m/img/s5/s5s2_tit.png" alt="우리동네 맛 평가단" /></h2>
	</div>
	<div class="wrap_evnt_list">
		<div class="wrap_showper_ico">
			<div class="view_showper_wrap">
				<em class="<?=$cate_bg?>"><?=$cate_title?></em>
			</div>
			<div class="evnt_hd">
				<h3><?=stripslashes($row['sbab_title'])?></h3>
				<span>모집기간 : <?=$sdate?> ~ <?=$edate?></span>
				<span>당첨인원 : <?=$row['sbab_limit']?> 명</span>
			</div>
		</div>
		<div class="evnt_conts">
			<?=stripcslashes($row['sbab_content'])?>
		</div>


		<div class="part_complete">
			<?php
			//신청 여부
			$sql = "select * from sb_application_member where sbabm_fidx='".$row['sbab_idx']."' and sbabm_mb_id='".$sb_id."'";
			$query = $conn->query($sql);
			$app_check = false;
			if($query->num_rows == '0'){
				//신청이력이 없다능
			}else{
				$app_check = true;
				$app_value = $query->fetch_assoc();
			}
			?>
			<!-- STR 신청 안한 경우 -->
			<?php 
				if($app_check == false){
					//신청 안했는데 기간 만료인 경우
					$link_script = "javascript:void(0);";
					if($now_date > $edate){
						$app_stat = 'end';
						$link_script = "javascript:alert('이벤트가 종료되었습니다.');";
					}else if( ($now_date >= $sdate) && ($now_date <= $edate) ){
						$app_stat = "ing";
						$link_script = "javascript:into_App('".$sb_id."','".$row['sbab_idx']."','".$row['sbab_cate']."');";
					}else if($now_date < $sdate){
						$app_stat_title = '진행예정';
						$link_script = "javascript:alert('이벤트가 진행 예정입니다.\n기다려주세요~');";
					}
			?>
			<a href="<?=$link_script?>" class="bt_2s_c_red" style="margin-top:0">신청하기</a>
			<? }else {?>
			<!-- END 신청 안한 경우 -->

			<!-- STR 신청만 한 경우 -->
			<? if( !empty($app_value['sbabm_rdate']) && empty($app_value['sbabm_adate']) && empty($app_value['sbabm_review_date']) ){ ?>
			<div class="wrap_app">
				<img src="/m/img/s5/txt_complete.png" alt="" class="txt_com" />
			</div>			
			<!-- END 신청만 한 경우 -->


			<!-- STR 당첨이 되었지만 후기작성을 하지않은경우 -->
			<? }else if( !empty($app_value['sbabm_rdate']) && !empty($app_value['sbabm_adate']) && empty($app_value['sbabm_review_date']) ){ ?>
			<div class="wrap_txt_com">
				<p><strong><?=$sb_id?></strong>님 당첨을 축하드립니다</p>
				<a href="/m/page/s5/s2sreview_<?=$row['sbab_cate']?>.php?getIdx=<?=$row['sbab_idx']?>&aType=<?=$row['sbab_cate']?>" class="bt_2s_c_red">후기 작성하기</a>
			</div>
			<!-- END 당첨이 되었지만 후기작성을 하지않은경우 -->


			<!-- STR 당첨이 되고 후기까지 작성한 경우 -->
			<? }else if( !empty($app_value['sbabm_rdate']) && !empty($app_value['sbabm_adate']) && !empty($app_value['sbabm_review_date']) ){ ?>
			<div class="wrap_txt_comAll">
				<img src="/m/img/s5/txt_complete2.png" alt="" class="txt_com" />
			</div>
			<? 
				} 
			}
			?>
			<!-- END 당첨이 되고 후기까지 작성한 경우 -->

		</div>
	</div>
	<div class="bt_wrap_right pd_lr">
		<!-- STR 삭제, 수정 -->
		<!-- 
		<a href="javascript:void(0);" class="bt_3s_c_red">삭제</a>
		<a href="javascript:void(0);" class="bt_3s_c_border">수정</a>
		 -->
		<!-- END 삭제, 수정 -->
		<a href="/m/page/s5/<?=$move_php?>.php?cur_page=<?=$page?>" class="bt_3s_c_border">목록으로</a>
	</div>
</div>

<script>
	function into_App(mb_id, idx, aType){
		if(mb_id.trim() == ''){
			alert("관리자 및 비회원은 신청할 수 없습니다."); 
			return false;
		}

		$.ajax({
			type : 'POST',
			url : '/ajax/into_App.php',
			data : { "mb_id" : mb_id, "idx" : idx, "aType" : aType},
			dataType : 'json',
			success : function(result){
				alert(result.msg);
				if(result.codeNum=="19"){
					location.reload();
				}
			},error : function(jqXHR, textStatus, errorThrown){
				console.log("error!\n"+textStatus+" : "+errorThrown);
			}
		});
	}
</script>
<?php include_once "../../_tail.php";?>