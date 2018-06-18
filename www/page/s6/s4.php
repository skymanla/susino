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
	
	$sdate = date('Y-m-d', strtotime($row['sbia_sdate']));
	$edate = date('Y-m-d', strtotime($row['sbia_edate']));

	$sbia_prize_option = "sbia_prize_option";
	for($i=1;$i<5;$i++){
		${$sbia_prize_option.$i} = explode("||", $row["sbia_prize_option{$i}"]);
	}
}

session_start();
?>

<div class="s6s4_wrap">
	<div class="info_wrap">
		<div class="tab_bt">
			<button type="button" class="active">부모님께</button>
			<button type="button">애인에게</button>
			<button type="button">친구에게</button>
			<button type="button">동료에게</button>
		</div>
		<div class="invite_url_wrap">
			<span><i>초대장 URL</i></span>
			<input type="text" class="go_to_url" value="http://winddesign32.cafe24.com/invite.php?invite=<?=$_SESSION[sb_id]?>&type=1" name="" placeholder="" />
			<a href="s4invite_result.php"><i>당첨</i></a>
		</div>
	</div>
	<div class="invite_result_rank_wrap">
		<ul class="invite_result_rank">
			<li class="rank1">
				<p class="copy1">1등</p>
				<p class="copy2">
					<?=$sbia_prize_option1[1]?> <br />
					(<?=$sbia_prize_option1[0]?>명)
				</p>
			</li>
			<li class="rank2">
				<p class="copy1">2등</p>
				<p class="copy2">
					<?=$sbia_prize_option2[1]?> <br />
					(<?=$sbia_prize_option2[0]?>명)
				</p>
			</li>
			<li class="rank3">
				<p class="copy1">3등</p>
				<p class="copy2">
					<?=$sbia_prize_option3[1]?> <br />
					(<?=$sbia_prize_option3[0]?>명)
				</p>
			</li>
			<li class="rank4">
				<p class="copy1">4등</p>
				<p class="copy2">
					<?=$sbia_prize_option4[1]?> <br />
					(<?=$sbia_prize_option4[0]?>명)
				</p>
			</li>
		</ul>
	</div>
</div>

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
		var wGoUrl = wTar.val().split('type');
		var eNurl = wGoUrl[0]+'type='+wNum;
		$(this).addClass('active').siblings().removeClass('active');
		wTar.val(eNurl);
	});
}
// END 수신인 선택
//]]>
</script>

<?php include_once "../../_tail.php";?>