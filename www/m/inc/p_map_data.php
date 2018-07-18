<?php
header('Content-Type: application/json');
include_once $_SERVER['DOCUMENT_ROOT']."/lib/dbconn.php";

$query = "SELECT * FROM sb_store where 1=1 order by sbs_no desc";
$result = $conn->query($query);
$total_rows = mysqli_num_rows($result);

$data = '';
$i = 0;
while($row = $result->fetch_assoc())
{
	$sbs_option = explode('||', $row['sbs_option']);
	if($_GET['type']=='delivery'){
		if(in_array("q", $sbs_option)){
			
			if($i > 0) $data .= ',';
			$data .= '{
				"id" : "'.$row['sbs_idx'].'",
				"addr" : "'.$row['sbs_address'].'",
				"info" : "'.$row['sbs_name'].'",
				"call" : "'.$row['sbs_tel'].'",
				"type" : "'.$row['sbs_type'].'",
				"link" : "'.$row['sbs_link1'].'",
				"link2" : "'.$row['sbs_link2'].'",
				"option" : "'.$row['sbs_option'].'",
				"op_p" : "'.$row['sbs_op_p'].'",
				"op_q1" : "'.$row['sbs_op_q1'].'",
				"op_q2" : "'.$row['sbs_op_q2'].'"
			}';
			$i++;
		}
	} else {
		$data .= '{
			"id" : "'.$row['sbs_idx'].'",
			"addr" : "'.$row['sbs_address'].'",
			"info" : "'.$row['sbs_name'].'",
			"call" : "'.$row['sbs_tel'].'",
			"type" : "'.$row['sbs_type'].'",
			"link" : "'.$row['sbs_link1'].'",
			"link2" : "'.$row['sbs_link2'].'",
			"option" : "'.$row['sbs_option'].'",
			"op_p" : "'.$row['sbs_op_p'].'",
			"op_q1" : "'.$row['sbs_op_q1'].'",
			"op_q2" : "'.$row['sbs_op_q2'].'"
		}';
		$i++;
		if($i < $total_rows) $data .= ',';
	}
}

die('['.$data.']');