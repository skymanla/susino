<?
include_once $_SERVER['DOCUMENT_ROOT']."/lib/dbconn.php";
session_start();

$sb_idx = $conn->real_escape_string($_REQUEST[midx]);
$sb_id = $conn->real_escape_string($_REQUEST[mid]);
$sb_name = $conn->real_escape_string($_REQUEST[name]);
$sbi_option = $conn->real_escape_string($_SESSION['sb_id']);
$sbi_option3 = $conn->real_escape_string($_REQUEST[getType]);
function probability($p, $per1){
	$n = 0;
	$t = 0;
	$c = 0;

	$n = $p * $per1;

    if ($n > $per1.'00') $n = $per1.'00';

    if ($n < 1) $n = 0;

    $t = mt_rand(0, $per1.'00');

    if ($t <= $n) $c = 1;

    //$c = 1 -> 당첨;
    if($c == 1){
    	$c = mt_rand(1, 4);
    }else{

    }
    return $c;
}

function re_probability(){
	global $conn;
	$comP_arr = array(1, 2, 3, 4);//1~4등 배열 수
	$chk_flag = false;
	for($i=0;$i<count($comP_arr);$i++){
		$callRef = array_rand($comP_arr);//랜덤 등수 가져오기
		$Num = $comP_arr[$callRef];
		//n번 배열의 합격자 수
		$sql = "select count(*) as cnt from sb_invite_member where sbi_option2='".$Num."'";
		$q = $conn->query($sql);
		$comP = $q->fetch_assoc();
		//기준 합격자 수
		$sql = "select sbia_prize_option{$Num} as comQ from sbi_invite_admin where 1=1 order by sbia_idx desc";
		$q = $conn->query($sql);
		$comQ = $q->fetch_assoc();
		$comQ = explode('||', $comQ['comQ']);
		if($comP['cnt'] >= $comQ[0]){
			$chk_flag = false;//false 면 for문 다시
			$i = 0;
			continue;
		}else{
			$chk_flag = true;//있으면 for문 종료
			return $Num;
			break;
		}
	}
}

$tbl_info = "sb_invite_member";
if($_SESSION['sba_id']) die('404 Not Found');
if($sb_id == $sbi_option){
	echo "99";//실패
	exit;
}else{
	//이미 등록 여부 확인
	$sql = "select count(*) as cnt from $tbl_info where sbi_mb_id='".$sb_id."'";
	$q = $conn->query($sql);
	$r = $q->fetch_assoc();
	if($r[cnt] > 0){
		echo "39";
		exit;
	}
	//존재 회원인지 확인
	$sql = "select count(*) as cnt from sb_member where sb_idx='".$sb_idx."' and sb_id='".$sb_id."' and sb_delete_flag is null";
	$q = $conn->query($sql);
	$r = $q->fetch_assoc();
	if($r['cnt'] == "1"){
		//확률 구하기
		$sql = "select * from sb_invite_admin where 1=1 order by sbia_idx desc limit 1";
		$q = $conn->query($sql);
		$r = $q->fetch_assoc();

		//print_r($r);
		$sbi_per = floor( ($r[sbia_prize_rate1]/$r[sbia_prize_rate2])*$r[sbia_prize_rate2]);
		$sbi_prize = probability($sbi_per, $r[sbia_prize_rate2]);//당첨 내용(0~4)// 0이면 꽝??
		if($sbi_prize == 0) $sbi_prize = null;		
		if(!empty($sbi_prize)){//당첨이 된 경우 최대 당첨자 수 확인
			//당첨된 등수의 최대 인원 확인
			$comP_num = explode("||", $r["sbia_prize_option{$sbi_prize}"]);
			//현재 당첨자 수 확인
			$sql = "select count(*) as cnt from sb_invite_member where sbi_option2='".$sbi_prize."'";
			$q = $conn->query($sql);
			$comP_sum = $q->fetch_assoc();
			if($comP_sum['cnt'] < $comP_num[0]){
				//pass
			}else{
				$sbi_prize = re_probability();//당첨자에서 다시 값 받기
			}
		}
		//echo $sbi_prize;
		//exit;

		$sql = "select sbi_idx from $tbl_info where 1=1 order by sbi_idx desc limit 1";
		$q = $conn->query($sql);
		$r = $q->fetch_assoc();
		if(empty($r['sbi_idx'])){
			$sbi_idx = 1;
		}else{
			$sbi_idx = $r['sbi_idx'];
			$sbi_idx++;
		}
		$sql = "insert into $tbl_info
					(sbi_idx, sbi_fidx, sbi_mb_id, sbi_cate, sbi_option, sbi_option2, sbi_option3, sbi_rdate, sbi_adate) values
					('$sbi_idx', '$sb_idx', '$sb_id', 'invite', '$sbi_option', '$sbi_prize', '$sbi_option3', now(), now())";
		$conn->query($sql);
		echo "19";//성공
		exit;
	}else{
		echo "29";//탈퇴한 회원 혹은 없는 회원
		exit;
	}
}
exit;
?>