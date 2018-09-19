<?
/*
WindDesign Ryan
Exp : 미스테리쇼퍼, 미식회, 체험단 이벤트 관리자 일괄 당첨 로직
회원은 limit 제한이 걸려있으나 관리자는 개무시하고 그냥 당첨되게 한다
json
 */
session_start();
include_once $_SERVER['DOCUMENT_ROOT']."/lib/dbconn.php";
include_once $_SERVER['DOCUMENT_ROOT']."/lib/function.php";
//header("Content-Type:application/json");

$mode = $_REQUEST[mode];
$pageinfo = $_REQUEST[pageinfo];
$flag_depth = $_REQUEST[flag_depth];
$chk_idx = $_REQUEST[chk_idx];
$Fidx = $_REQUEST[Fidx];

$tbl_info = "sb_application_member";
$chk_count = count($chk_idx);
$s_cnt = 0;


$smsType = "L";
switch($flag_depth){
	case "shopper":
		$cate_title = "미스테리쇼퍼";
		break;
	case "pick":
		$cate_title = "체험단";
		break;
	case "ftalk":
		$cate_title = "스시노미식회";
		break;
	default:
		$cate_title = "자발적 후기";
		break;
}
$sms_title = "[스시노백쉐프] -".$cate_title."- 우동맛 후기 등록 완료 안내";

for($i=0;$i<$chk_count;$i++){
	$chk_arr = explode('||', $chk_idx[$i]);
	//당첨 여부 확인
	$sql = "select count(*) as cnt from $tbl_info where sbabm_mb_id='".$chk_arr[1]."' and sbabm_fidx='".$Fidx."' and sbabm_cate='".$flag_depth."' and sbabm_adate <> '' and sbabm_option5='Y'";
	$q = $conn->query($sql);
	$r = $q->fetch_assoc();
	if($r['cnt'] == '1'){
		//pass
	}else{
		//등록여부 확인
		$sql = "select count(*) as cnt from $tbl_info where sbabm_mb_id='".$chk_arr[1]."' and sbabm_fidx='".$Fidx."' and sbabm_cate='".$flag_depth."'";
		$q = $conn->query($sql);
		$r = $q->fetch_assoc();
		if($r['cnt']=='0'){//미등록자
			//pk
			$sql = "select sbabm_idx from $tbl_info where 1=1 order by sbabm_idx desc limit 1";
			$q = $conn->query($sql);
			$r = $q->fetch_assoc();
			if(empty($r[sbabm_idx])){
				$Midx = 1;
			}else{
				$Midx = $r[sbabm_idx];
				$Midx++;
			}
			//아이디 가져오기
			$sql = "insert into $tbl_info 
						(sbabm_idx, sbabm_fidx, sbabm_mb_id, sbabm_cate, sbabm_option5, sbabm_rdate, sbabm_adate) values
						('$Midx', '$Fidx', '$chk_arr[1]', '$flag_depth', 'Y', now(), now())
					";
			$conn->query($sql);
		}else{
			$sql = "update $tbl_info set
					sbabm_option5='Y', sbabm_adate=now()
					where sbabm_mb_id='".$chk_arr[1]."' and sbabm_fidx='".$Fidx."' and sbabm_cate='".$flag_depth."'";
			$conn->query($sql);	
		}

		//event pk
		$sql = "select sbabm_idx from $tbl_info where sbabm_mb_id='".$chk_arr[1]."' and sbabm_fidx='".$Fidx."' and sbabm_cate='".$flag_depth."'";
		$query = $conn->query($sql);
		$sbabm = $query->fetch_assoc();
		//문자API넣기
		$sql = "select sb_id, sb_name, sb_phone from sb_member where sb_id='".$chk_arr[1]."'";
		$query = $conn->query($sql);
		$mb_info = $query->fetch_assoc();
		
		/*$ret['sbabm_idx'][] = $sbabm['sbabm_idx'];
		$ret['sb_id'][] = $chk_arr[1];
		$ret['sb_name'][] = $mb_info['sb_name'];
		$ret['sb_phone'][] = $mb_info['sb_phone'];*/

		$sms_content = $chk_arr[1]."님! 우리동네 맛평가단 등록이 완료 되었습니다!
						꼼꼼한 답변으로 채워진 소중한 후기 감사 드립니다.
						후기 등록이 완료되면 우동맛 스티커가 증정됩니다.
						총 우동 다섯그릇이 모이면 스시노백쉐프 기프티카드 3만권을
						드리오니, 앞으로도 스시노백쉐프의 우동맛 적극적인
						참여 부탁 드립니다.
						";

		$smsSender = getSmsSender();
		$smsSender = explode("-", $smsSender);
			
		$sphone1 = $smsSender[0];
		$sphone2 = $smsSender[1];
		$sphone3 = $smsSender[2];

		$rphone = $mb_info['sb_phone'];
		include($_SERVER['DOCUMENT_ROOT']."/lib/smsLib2.php");

		$sql = "insert into sb_refuse_sms (sb_idx2, sb_fidx, sb_refuse_type, sb_sms_content, sb_sms_send_mb, sb_sms_send_phone, sb_sms_w_date, sb_sms_result) values 
				('".$chk_arr[0]."', '".$Fidx."', '0', '".$sms_content."', '".$chk_arr[1]."', '".$mb_info['sb_phone']."', now(), '".$Result."')";		
		$conn->query($sql);
		
		$s_cnt++;
	}
}
//print_r($smsSender);
echo $s_cnt;
exit;
?>