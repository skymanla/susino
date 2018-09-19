<?php 
include_once "../../_head.php";
include_once $_SERVER['DOCUMENT_ROOT']."/lib/dbconn.php";
include_once($_SERVER['DOCUMENT_ROOT']."/lib/function.php");

//당첨 정보 가져오기
//$sql = "select * from sb_invite_admin where 1=1 order by sbia_idx desc limit 1";

$sql = "select * from sb_invite_admin where sbia_edate > now() order by sbia_idx desc limit 1";

$q = $conn->query($sql);

$invite_length = mysqli_num_rows($q);//값이 있는지 여부 없으면;;;;;;;;;;;;;
if($invite_length < 1 ){
	$row = "";	
	echoAlert("현재 등록된 이벤트가 없습니다.\\n메인 페이지로 이동합니다.");
	echoMovePage("/");
	exit;
}else{	
	$row = $q->fetch_assoc();

	//이벤트 날짜가 낮을 경우
	$now_date = date('Y-m-d');
	$e_date = date('Y-m-d', strtotime($row[sbia_edate]));

	//오늘 날짜 배열화
	$now_date_t_arr = explode('-', $now_date);
	//막날 배열화
	$e_date_t_arr = explode('-', $e_date);
	$e_date_t = date('t', mktime(0,0,0,$now_date_t_arr[1],1,$now_date_t_arr[0]));//이벤트 기간 달의 마지막 날짜
	
	$e_count_date = $e_date_t-$now_date_t_arr[2]; //이번달 마지막날까지 남은 날짜
	$e_count_date = sprintf('%02d',$e_count_date); //이번달 마지막날까지 남은 날짜

	if($now_date > $e_date){
		//낮으면 카운팅을??
	}else{
		//아니라면 pass
	}
	
	$sdate = date('Y-m-d', strtotime($row['sbia_sdate']));
	$edate = date('Y-m-d', strtotime($row['sbia_edate']));

	$sbia_prize_option = "sbia_prize_option";
	for($i=1;$i<5;$i++){
		${$sbia_prize_option.$i} = explode("||", $row["sbia_prize_option{$i}"]);
	}

	//고유값
	$eUrl = $row['sbia_eurl'];
	$event_idx = $row['sbia_eurl'];
}

session_start();
if($_SESSION[sb_id]){

	$w_http_host = $_SERVER['HTTP_HOST'];

	$go_to_invite_url = 'http://'.$w_http_host.'/invite.php?invite='.$_SESSION[sb_id].'&eurl='.$eUrl.'&type=1';
} else {
	$go_to_invite_url = '로그인 후 참여 가능합니다.';
}

$sql = "select * from sb_invite_member where sbi_mb_id='".$_SESSION[sb_id]."' and sbi_pidx='".$event_idx."'";

$q = $conn->query($sql);
$r = $q->fetch_assoc();


if($r['sbi_option2'] == ""){
	// 당첨 된 회원 
	$w_event_win = false;
} else {
	// 미당첨 회원
	$w_event_win = true;
}

$sql = "select count(*) as cnt from sb_invite_member where sbi_mb_id='".$_SESSION[sb_id]."' and sbi_pidx='".$event_idx."'";
$q = $conn->query($sql);
$r = $q->fetch_assoc();
if($r[cnt] > 0){
	// 신청 전 및 비로그인 회원
	$w_event_in = true;
} else {
	// 신청 완료 회원
	$w_event_in = false;
}
?>

<div class="s6s4_wrap">

	<?php if(!$w_event_in) {?>
	<!-- STR 신청 전 및 비로그인 -->
	<div class="info_wrap">
		<div class="tab_bt">
			<button type="button" class="active">부모님께</button>
			<button type="button">애인에게</button>
			<button type="button">친구에게</button>
			<button type="button">동료에게</button>
		</div>
		<div class="invite_url_wrap">
			<span><i>초대장 URL</i></span>
			<input type="text" class="go_to_url" value="<?php echo $go_to_invite_url;?>" readonly />
			<?php if($go_to_invite_url == '로그인 후 참여 가능합니다.'){?>
			<button type="button" onClick="location.href = '/page/member/login.php'">로그인하기</button>
			<?php } else { ?>
			<button type="button" id="copy_url_bt" data-clipboard-text="<?php echo $go_to_invite_url;?>">복사하기</button>
			<?php } ?>
		</div>
	</div>
	<!-- END 신청 전 및 비로그인 -->
	<?php } else {?>
	<!-- STR 신청 완료 -->

		<?php if($w_event_win) {?>
		<!-- STR 당첨자 -->
		<div class="info_event win">
			<a href="/page/member/register_form_modify.php"><i>회원정보 확인</i></a>
		</div>
		<!-- END 당첨자 -->
		<?php } else {?>
		<!-- STR 미당첨자 -->
		<div class="info_event notwin">
			<span class="num fr"><?php echo substr($e_count_date,0,1);?></span>
			<span class="num sec"><?php echo substr($e_count_date,1,1);?></span>
			<a href="/page/s5/s2.php"><i>첫 후기 남기고 상품권 받기</i></a>
		</div>
		<!-- END 미당첨자 -->
		<?php } ?>

	<!-- END 신청 완료 -->
	<?php } ?>

	<div class="info_footer">
		<?
			$tbl_info = "sb_invite_admin";
			//저장값 불러오기
			$sql = "select * from $tbl_info where 1=1 order by sbia_idx desc limit 1";
			$q = $conn->query($sql);
			$invite_length = mysqli_num_rows($q);

			if($invite_length < 1 ){
				$row = "";
			}else{
				$row = $q->fetch_assoc();
				
				$sdate = date('Y-m-d', strtotime($row['sbia_sdate']));
				$edate = date('Y-m-d', strtotime($row['sbia_edate']));

				$sbia_prize_option = "sbia_prize_option";
				for($i=1;$i<5;$i++){
					${$sbia_prize_option.$i} = explode("||", $row["sbia_prize_option{$i}"]);
					$sbia_prize_total_count += ${$sbia_prize_option.$i}[0];
				}
			}
		?>
		<div class="count1">(<?php echo $sbia_prize_total_count;?>명)</div>
		<div class="count2">랜덤 <?php echo $sbia_prize_total_count;?>명 실시간 당첨!</div>
	</div>


</div>

<script type="text/javascript" src="/js/clipboard.min.js"></script>
<script type="text/javascript">
//<![CDATA[
$(function(){
	inviteAc1(); // 수신인 선택
});

// STR 수신인 선택
function inviteAc1(){
	$('.s6s4_wrap .tab_bt button').on('click',function(){
		var wNum = $(this).index()+1;
		var wTar = $('.go_to_url');
		if(wTar.val()=='로그인 후 참여 가능합니다.'){
			alert('로그인 후 참여 가능합니다.');
			return false;
		}
		var wGoUrl = wTar.val().split('type');
		var eNurl = wGoUrl[0]+'type='+wNum;
		$(this).addClass('active').siblings().removeClass('active');
		wTar.val(eNurl);
		$('#copy_url_bt').attr('data-clipboard-text',eNurl);
	});


	$('#copy_url_bt').on('click',function(){
		var _This = $(this);
		var _tVal = _This.attr('data-clipboard-text');

		if(_tVal=='로그인 후 참여 가능합니다.'){
			alert('로그인 후 참여 가능합니다.');
		}
	});

	if($('.go_to_url').val()!='로그인 후 참여 가능합니다.'){
		var clipboard = new ClipboardJS('#copy_url_bt');

		clipboard.on('success', function(e) {
			alert('초대장 URL 복사가 완료 되었습니다.');
		});
		clipboard.on('error', function(e) {
			alert('브라우저 버전이 낮아 복사 기능을 사용하실 수 없습니다.');
		});
	}


}
// END 수신인 선택
//]]>
</script>

<?php include_once "../../_tail.php";?>