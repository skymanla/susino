<?
/*
WindDesign Ryan
Exp : 당첨확률 로직
 */
function probability($p, $per1, $per2){
	$n = 0;
	$t = 0;
	$c = 0;

	$n = $p * $per1;

    if ($n > $per1.'00') $n = $per1.'00';

    if ($n < 1) $n = 0;

    if($per1 == $per2){//확률을 같게할 경우
    	$st = '1';

    	$t = mt_rand($st, $per1.'00');

    	$c = 1;
    }else{//확률이 다를 경우
    	$st = '0';

    	$t = mt_rand($st, $per1.'00');

    	if ($t <= $n) $c = 1;
    }

    //$c = 1 -> 당첨;
    if($c == 1){
    	$c = mt_rand(1, 4);
    }else{

    }
    return $c;
}

function re_probability($eUrl=""){
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
		//$sql = "select sbia_prize_option{$Num} as comQ from sbi_invite_admin where 1=1 order by sbia_idx desc";
		$sql = "select sbia_prize_option{$Num} as comQ from sbi_invite_admin where sbia_eurl='".$eUrl."'";
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
?>