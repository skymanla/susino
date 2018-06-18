<?php
include_once "../../_head.php";
include_once $_SERVER['DOCUMENT_ROOT']."/lib/dbconn.php";
include_once $_SERVER['DOCUMENT_ROOT']."/lib/function.php";

session_start();

$sb_id = $conn->real_escape_string($_SESSION['sb_id']);
//비회원 튕기기
if($_SESSION['login_chk'] != 99){
	$url = "/page/member/login.php";
	echoAlert("로그인을 해야 이용이 가능합니다.");
	echoMovePage($url);
}
$sb_id = $conn->real_escape_string($_SESSION['sb_id']);
$sql = "select * from sb_invite_member where sbi_mb_id='".$sb_id."'";

$q = $conn->query($sql);
$r = $q->fetch_assoc();

if($r['sbi_option2'] == ""){
	$url = "/";
	echoAlert("아쉽지만 이벤트에 당첨되지 못하셨습니다.");
	echoMovePage($url);	
}

$comP = $r['sbi_option2'];

//결과값
$sql = "select * from sb_invite_admin where 1=1 order by sbia_idx desc limit 1";

$q = $conn->query($sql);
$v = $q->fetch_assoc();

$sbi_prize_val = explode('||', $v["sbia_prize_option{$comP}"]);

$sbia_prize_option = "sbia_prize_option";
	for($i=1;$i<5;$i++){
		${$sbia_prize_option.$i} = explode("||", $v["sbia_prize_option{$i}"]);
	}
?>

<div class="invite_result_wrap">
	<div class="title">
		<p class="rank"><?=$comP?>등</p>
		<p class="copy1"><?=$sbi_prize_val[1]?></p>
	</div>
	<ul class="invite_result_rank">
		<? for($j=1;$j<5;$j++){ ?>
		<li class="rank<?=$j?>">
			<p class="copy1"><?=$j?>등</p>
			<p class="copy2">
				<?=${$sbia_prize_option.$j}[1]?> <br />
				(<?=${$sbia_prize_option.$j}[0]?>명)
			</p>
		</li>
		<? } ?>
	</ul>
</div>
<?php include_once "../../_tail.php";?>