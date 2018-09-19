<?
/*
WindDesign Ryan
Exp : 함께갈래요 당첨 로직
table : sb_invite_member
옵션에 관한 필드가 sb_option{x}, 저장 내용을 추가하는 경우 저 칼럼을 추가하는 식으로
 */
include_once $_SERVER['DOCUMENT_ROOT']."/lib/dbconn.php";
include_once $_SERVER['DOCUMENT_ROOT']."/lib/function.php";
include_once $_SERVER['DOCUMENT_ROOT']."/lib/Invite_Function.php";
header("Content-Type:application/json");

session_start();

$sb_idx = $conn->real_escape_string($_REQUEST['midx']);
$sb_id = $conn->real_escape_string($_REQUEST['mid']);
$sb_name = $conn->real_escape_string($_REQUEST['name']);
$sbi_option = $conn->real_escape_string($_SESSION['sb_id']);
$sbi_option3 = $conn->real_escape_string($_REQUEST['getType']);
$eUrl = $conn->real_escape_string($_REQUEST['eurl']);

/*$r = (object) $_REQUEST;
echo json_encode($r);
exit;*/

$tbl_info = "sb_invite_member";
if($_SESSION['sba_id']) die('404 Not Found');

if($sb_id == $sbi_option){
	$r = array("msg"=>"본인이 신청할 수 없습니다.", "codeNum"=>"99");
	$r = (object) $r;
	echo json_encode($r);
	exit;
}else{
	//이미 등록 여부 확인
	$sql = "select count(*) as cnt from $tbl_info where sbi_mb_id='".$sb_id."' and sbi_pidx='".$eUrl."'";
	$q = $conn->query($sql);
	$r = $q->fetch_assoc();
	if($r['cnt'] > 0){
		$r = array("msg"=>"이미 신청이 된 회원입니다.", "codeNum"=>"39");
		$r = (object) $r;
		echo json_encode($r);
		exit;
	}
	//존재 회원인지 확인
	$sql = "select * from sb_member where sb_idx='".$sb_idx."' and sb_id='".$sb_id."' and sb_delete_flag is null";
	$q = $conn->query($sql);
	$mb_info = $q->fetch_assoc();
	if($q->num_rows == "1"){
		//확률 구하기
		//$sql = "select * from sb_invite_admin where 1=1 order by sbia_idx desc limit 1";
		$sql = "select * from sb_invite_admin where sbia_eurl='".$eUrl."' and sbia_edate > now()";
		$q = $conn->query($sql);
		if($q->num_rows == '0'){
			$r = array("msg"=>"이벤트 신청 기간이 지났습니다.", "codeNum"=>"89");
			$r = (object) $r;
			echo json_encode($r);
			exit;
		}
		$r = $q->fetch_assoc();
		$sbia_idx = $r['sbia_idx'];
		//print_r($r);
		$sbi_per = floor( ($r['sbia_prize_rate1']/$r['sbia_prize_rate2'])*$r['sbia_prize_rate2']);

		$sbi_prize = probability($sbi_per, $r['sbia_prize_rate2'], $r['sbia_prize_rate1']);//당첨 내용(0~4)// 0이면 꽝??

		/*$r = array("msg"=>$sbi_prize.", ".$sbi_per);
		$r = (object) $r;
		echo json_encode($r);
		exit;*/

		if($sbi_prize == 0) $sbi_prize = null;		
		if(!empty($sbi_prize)){//당첨이 된 경우 최대 당첨자 수 확인
			//당첨된 등수의 최대 인원 확인
			$comP_num = explode("||", $r["sbia_prize_option{$sbi_prize}"]);
			//현재 당첨자 수 확인
			$sql = "select count(*) as cnt from sb_invite_member where sbi_option2='".$sbi_prize."' and sbi_pidx='".$eUrl."'";
			$q = $conn->query($sql);
			$comP_sum = $q->fetch_assoc();
			if($comP_sum['cnt'] < $comP_num[0]){
				//pass
			}else{
				$sbi_prize = re_probability($eUrl);//당첨자에서 다시 값 받기
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
		//sbi_option2 = 당첨 등수(1~4) -> 사실상 의미없음
		//sbi_option3 = 타입번호(친구, 부모, 연인)
		$sql = "insert into $tbl_info
					(sbi_idx, sbi_fidx, sbi_mb_id, sbi_cate, sbi_option, sbi_option2, sbi_option3, sbi_rdate, sbi_adate, sbi_pidx) values
					('$sbi_idx', '$sbi_idx', '$sb_id', 'invite', '$sbi_option', '$sbi_prize', '$sbi_option3', now(), now(), '$eUrl')";
		if($conn->query($sql)){
			if(!empty($sbi_prize)){
				$smsType = "L";
				$sms_title = "[스시노백쉐프] 우리, 함께 갈래요? 이벤트 당첨 안내";
				$sms_content = $sb_id."님! 스시노백쉐프 우리, 함께 갈래요? 이벤트에 당첨되신 것을 축하드립니다! 
							".$sb_id."님의 초대에 응답해주신 함께 가고 싶은 분과
							스시노백쉐프에서 맛있는 초밥을 드셔보세요!
							 스시노백쉐프 키프트카드 3만원권은 다음날 발송될 예정입니다.
							  기프트카드의 유효기간과, 사용가능 매장 확인 후 방문 부탁드립니다!";
				$smsSender = getSmsSender();
				$smsSender = explode("-", $smsSender);
					
				$sphone1 = $smsSender[0];
				$sphone2 = $smsSender[1];
				$sphone3 = $smsSender[2];

				$rphone = $mb_info['sb_phone'];
				include($_SERVER['DOCUMENT_ROOT']."/lib/smsLib2.php");

				$sql = "insert into sb_refuse_sms (sb_idx2, sb_fidx, sb_refuse_type, sb_sms_content, sb_sms_send_mb, sb_sms_send_phone, sb_sms_w_date, sb_sms_result) values 
						('".$sbi_idx."', '0', 'invite', '".$sms_content."', '".$sb_id."', '".$mb_info['sb_phone']."', now(), '".$Result."')";		
				$conn->query($sql);
			}
			$r = array("msg"=>"함께갈래요 참여가 완료되었습니다.", "codeNum"=>"19");
			$r = (object) $r;
			echo json_encode($r);
			exit;
		}
	}else{
		$r = array("msg"=>"탈퇴하거나 혹은 없는 회원입니다.", "codeNum"=>"29");
		$r = (object) $r;
		echo json_encode($r);
		exit;
	}
}
exit;
?>