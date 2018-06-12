<?
header("Content-Type:application/json");
include_once($_SERVER['DOCUMENT_ROOT']."/lib/dbconn.php");
include_once($_SERVER['DOCUMENT_ROOT']."/lib/function.php");

$tbl_name = "sb_member";

$sb_sido = $_REQUEST['sb_sido'];
include_once('./register_our_area.php');
$sql = "select sb_dongnae from ".$tbl_name." where sb_dongnae like '".$sb_sido."%'";
$query = $conn->query($sql);
//print_r($query);
$i=0;
foreach($query as $key => $row){
	$area_val[$i] = $row['sb_dongnae'];
	$i++;
}
$area_val = array_values(array_unique($area_val));
$fv = array();
//print_r($area_val);
for($i=0;$i<count($area_val);$i++){
	$depth1 = explode(" ",$area_val[$i]);
	$sql = "select count(*) as cnt from ".$tbl_name." where sb_dongnae='".$area_val[$i]."'";
	//echo $sql.'<Br>';
	$q = $conn->query($sql);
	$v = $q->fetch_assoc();
	$fv += [ $depth1[1]=>$v['cnt'] ];
}

$r = (object) $fv;
echo json_encode($r);
?>