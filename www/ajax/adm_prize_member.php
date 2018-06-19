<?
/*
WindDesign Ryan
Exp : 미스테리쇼퍼, 미식회, 체험단 이벤트 관리자 일괄 당첨 로직
회원은 limit 제한이 걸려있으나 관리자는 개무시하고 그냥 당첨되게 한다
json
 */
session_start();
include_once $_SERVER['DOCUMENT_ROOT']."/lib/dbconn.php";
//header("Content-Type:application/json");

$mode = $_REQUEST[mode];
$pageinfo = $_REQUEST[pageinfo];
$flag_depth = $_REQUEST[flag_depth];
$chk_idx = $_REQUEST[chk_idx];
$Fidx = $_REQUEST[Fidx];

$tbl_info = "sb_application_member";
$chk_count = count($chk_idx);
$s_cnt = 0;
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
		
		$s_cnt++;
	}
}

echo $s_cnt;
exit;
?>