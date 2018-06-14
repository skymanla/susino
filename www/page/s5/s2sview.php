<?php
/*
미스테리쇼퍼, 체험단, 미식회 공통 view 파일
 */
include_once "../../_head.php";
include_once $_SERVER['DOCUMENT_ROOT']."/lib/dbconn.php";
include_once $_SERVER['DOCUMENT_ROOT']."/lib/function.php";

//비회원 튕기기
if($_SESSION['login_chk'] != 99){
	$url = "/page/member/login.php";
	echoAlert("로그인을 해야 이용이 가능합니다.");
	echoMovePage($url);
}
$mb_id = $_SESSION['sb_id'];
//등록 게시물 가져오기
$sql = "select a.*, b.* from sb_application_board a left join sb_application_member b on a.sbab_idx=b.sbabm_fidx where a.sbab_idx='".$_GET['idx']."' and a.sbab_cate='".$_GET['aType']."'";
$q = $conn->query($sql);
$row = $q->fetch_assoc();
if(empty($row)){
	$url = "./s2.php";
	echoAlert("잘못된 접근입니다.");
	echoMovePage($url);	
}
?>

<div class="wrap_style1">
	<div class="heading_s1">
		<h2 class="tit"><img src="/img/s5/mypage_title.png" alt="우리동네 맛평가단"></h2>
	</div>

	<div class="con_wrapStyle1 w1">
		<?
			$prize_flag = false;
			switch($row['sbab_cate']){
				case "shopper" :
					$cateType = "미스테리 쇼퍼";
					$bgType = "bg1";
					break;
				case "ftalk" :
					$cateType = "스시노미식회";
					$bgType = "bg2";
					break;
				case "pick" :
					$cateType = "체험단";
					$bgType = "bg3";
					break;
			}
			$now_date = date('Y-m-d');
			$sdate = date('Y-m-d', strtotime($row['sbab_sdate']));
			$edate = date('Y-m-d', strtotime($row['sbab_edate']));	
		?>
		<div class="my_page_view">
			<div class="title_wrap">
				<div class="cate">
					<div class="<?=$bgType?>"><i><?=$cateType?></i></div>
				</div>
				<div class="title">
					<h3 class="tit"><?=stripslashes($row['sbab_title'])?></h3>
					<p class="desc">모집 기간 : <?=$sdate?> ~ <?=$edate?></p>
					<p class="desc">모집 인원 : <?=$row['sbab_limit']?>명</p>
				</div>
			</div>
			<div class="con_view1">
				<?=stripslashes($row['sbab_content'])?>
			</div>
			<? 
				if(empty($row['sbabm_fidx'])){//신청 안한경우
					//pass
				}else{
					$prize_flag = true;
			?>
			<div class="con_view2">
				<?
				if(empty($row['sbabm_adate'])){ //신청만 한 경우, adate 는 당첨된 날짜
				?>
				<div class="my_end"><i>신청이 완료되었습니다. 당첨자분들에게는 개별로 연락을 드립니다.</i></div>
				<?
				}else{
					if(empty($row['sbabm_option2'])){//후기 작성이 되면 저 필드를 update 하자
				?>
				<div class="my_win">
					<div class="title"><b>홍길동</b>님 당첨을 축하드립니다!</div>
					<div class="bt_wrap_c">
						<a href="s2sreview.php" class="bt_s2_red">후기 작성하기</a>
					</div>
				</div>
				<?	}else{//당첨이 되고 후기까지 작성한 경우	?> 
				<div class="my_end2"><i>후기 작성이 완료되었습니다. 당첨자분들에게는 개별로 연락을 드립니다.</i></div>
				<?
					}
				}
				?>
			</div>
			<? } ?>
		</div>
		<div class="bt_wrap_c">
			<? if($prize_flag == false){ ?>
			<a href="javascript:into_App('<?=$mb_id?>','<?=$_GET[idx]?>','<?=$_GET[aType]?>');" class="bt_s2_red">신청하기</a>
			<? } ?>
			<a href="s2.php" class="bt_s2_gray">목록으로</a>
		</div>
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
				console.log(result);
			},error : function(jqXHR, textStatus, errorThrown){
				console.log("error!\n"+textStatus+" : "+errorThrown);
			}
		});
	}
</script>
<?php include_once "../../_tail.php";?>