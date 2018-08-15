<?php 
include_once "../../_head.php";
include_once $_SERVER['DOCUMENT_ROOT']."/lib/dbconn.php";

//당첨 정보 가져오기
$sql = "select * from sb_invite_admin where 1=1 order by sbia_idx desc limit 1";

$q = $conn->query($sql);

$invite_length = mysqli_num_rows($q);//값이 있는지 여부 없으면;;;;;;;;;;;;;

if($invite_length < 1 ){
	$row = "";
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
}

session_start();
if($_SESSION[sb_id]){

	$w_http_host = $_SERVER['HTTP_HOST'];

	$go_to_invite_url = 'http://'.$w_http_host.'/m/invite.php?invite='.$_SESSION[sb_id].'&type=1';
} else {
	$go_to_invite_url = '로그인 후 참여 가능합니다.';
}

$sql = "select * from sb_invite_member where sbi_mb_id='".$_SESSION[sb_id]."'";

$q = $conn->query($sql);
$r = $q->fetch_assoc();


if($r['sbi_option2'] == ""){
	// 당첨 된 회원 
	$w_event_win = false;
} else {
	// 미당첨 회원
	$w_event_win = true;
}

$sql = "select count(*) as cnt from sb_invite_member where sbi_mb_id='".$_SESSION[sb_id]."'";
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


<div class="wrap_conts_img">
	<img src="/m/img/s6/06_01.jpg" alt="" />

	<div class="wrap_width_go">
		<?php if(!$w_event_in) {?>
		<!-- STR 신청 전 및 비로그인 -->
		<div class="fam_fri_send">
			<ul class="with_tab">
				<li class="active"><button type="button">부모님께</button></li>
				<li><button type="button" class="">애인에게</button></li>
				<li><button type="button" class="">친구에게</button></li>
				<li><button type="button" class="">동료에게</button></li>
			</ul>
			<ul class="with_con">
				<li class="active">
					<h3><img src="/m/img/s6/s6s2_tabcon_tit1.png" alt="초대장" /></h3>
					<fieldset class="win_box">
						<legend>초대장 URL</legend>
						<input type="text" class="go_to_url" value="<?php echo $go_to_invite_url;?>" readonly />
					</fieldset>
				</li>
			</ul>
			<div class="copy_wrap"><button type="button" id="copy_url_bt" data-clipboard-text="<?php echo $go_to_invite_url;?>">복사하기</button></div>
		</div>
		<!-- END 신청 전 및 비로그인 -->
		<?php } else {?>
		<!-- STR 신청 완료 -->

			<?php if($w_event_win) {?>
			<!-- STR 당첨자 -->
			<div class="wrap_celebration">
				<img src="/m/img/s6/06_03.jpg" alt="" />
				<div class="bt_wrap_center pd_lr">
					<a href="/m/page/member/register_form_modify.php" class="bt_2s_c_border_black">회원정보 확인</a>
				</div>
			</div>
			<!-- END 당첨자 -->
			<?php } else {?>
			<!-- STR 미당첨자 -->
			<div class="info_not_win">
				<img src="/m/img/s6/06_04.jpg" alt="" />
				<div class="re_challenge">
					<p>
						재도전 가능한 날까지 일 남았어요!
						<span class="num1"><?php echo substr($e_count_date,0,1);?></span>
						<span class="num2"><?php echo substr($e_count_date,1,1);?></span>
					</p>
				</div>
				<img src="/m/img/s6/06_05.jpg" alt="" />
				<div class="bt_wrap_center pd_lr">
					<a href="/m/page/s5/s2.php" class="bt_2s_c_border_black">첫 후기 남기고 상품권 받기</a>
				</div>
			</div>
			<!-- END 미당첨자 -->
			<?php } ?>

		<!-- END 신청 완료 -->
		<?php } ?>
	</div>



	<img src="/m/img/s6/06_02.jpg" alt="" />
</div>

<script type="text/javascript" src="/m/js/clipboard.min.js"></script>
<script type="text/javascript">
//<![CDATA[
$(function(){
	inviteAc1(); // 수신인 선택
});

// STR 수신인 선택
function inviteAc1(){
	$('.with_tab button').on('click',function(){
		var wNum = $(this).parent().index()+1;
		var wTar = $('.go_to_url');
		if(wTar.val()=='로그인 후 참여 가능합니다.'){
			alert('로그인 후 참여 가능합니다.');
			return false;
		}
		var wGoUrl = wTar.val().split('type');
		var eNurl = wGoUrl[0]+'type='+wNum;
		$(this).parent().addClass('active').siblings().removeClass('active');
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

