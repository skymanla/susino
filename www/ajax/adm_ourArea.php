<?
/*
WindDesign Ryan
Exp : sb_member에서 sb_dongnae count 값 가져와서 json 으로 뿌려주기
json
 */
header("Content-Type:application/json");
include_once($_SERVER['DOCUMENT_ROOT']."/lib/dbconn.php");
include_once($_SERVER['DOCUMENT_ROOT']."/lib/function.php");
include_once('./register_our_area.php');

$tbl_name = "sb_member";

$sb_sido = $_REQUEST['sb_sido'];
$sb_sido = our_area($sb_sido);
$sql = "select sb_dongnae, count(sb_dongnae) as cnt from ".$tbl_name." where sb_dongnae like '".$sb_sido."%' group by sb_dongnae";
//$sql = "select sb_dongnae from ".$tbl_name." where sb_dongnae like '".$sb_sido."%'";
$query = $conn->query($sql);
$i=0;
$fv = array();
foreach($query as $key => $row){
	//$area_val[$key] = $row['sb_dongnae'];
	$Area_key = explode(" ", $row['sb_dongnae']);
	$fv += [ $Area_key[1]=>$row['cnt'] ];
	$i++;
}
$r = (object) $fv;
echo json_encode($r);
//$area_val = array_values(array_unique($area_val));//중복값 제거하고 배열 재정리

//print_r($area_val);
/*for($i=0;$i<count($area_val);$i++){
	$depth1 = explode(" ",$area_val[$i]);
	$sql = "select count(*) as cnt from ".$tbl_name." where sb_dongnae='".$area_val[$i]."'";
	//echo $sql.'<Br>';
	$q = $conn->query($sql);
	$v = $q->fetch_assoc();
	$fv += [ $depth1[1]=>$v['cnt'] ];
}*/

?>