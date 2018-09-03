<?php
session_start();

//세션 초기화
if(isset($_SESSION['review']['aType']) && isset($_SESSION['review']['getIdx'])){//세션이 존재할 때
	if( ($_SESSION['review']['aType'] != $_REQUEST['aType']) && ($_SESSION['review']['getIdx'] != $_REQUEST['getIdx'])){//저장된 세션이 넘어온 고유값들과 다르면
		unset($_SESSION['review_type']);
		unset($_SESSION['review']);//초기화
	}
}

$aType = (isset($_SESSION['review']['aType']) ? $_SESSION['review']['aType'] : $_REQUEST['aType']);
$getIdx = (isset($_SESSION['review']['getIdx']) ? $_SESSION['review']['getIdx'] : $_REQUEST['getIdx']);
$visit_date = (isset($_SESSION['review']['visit_date']) ? $_SESSION['review']['visit_date'] : $_REQUEST['visit_date']);
$s_sido = (isset($_SESSION['review']['s_sido']) ? (string) $_SESSION['review']['s_sido'] : (string) $_REQUEST['s_sido']);
$addr_sec = (isset($_SESSION['review']['addr_sec']) ? $_SESSION['review']['addr_sec'] : $_REQUEST['addr_sec']);
$to_gether = (isset($_SESSION['review']['to_gether']) ? $_SESSION['review']['to_gether'] : $_REQUEST['to_gether']);
$to_menu = (isset($_SESSION['review']['to_menu']) ? $_SESSION['review']['to_menu'] : $_REQUEST['to_menu']);
$to_menu_depth = (isset($_SESSION['review']['to_menu_depth']) ? $_SESSION['review']['to_menu_depth'] : $_REQUEST['to_menu_depth']);
$to_menu_time = (isset($_SESSION['review']['to_menu_time']) ? $_SESSION['review']['to_menu_time'] : $_REQUEST['to_menu_time']);
$to_menu_rice = (isset($_SESSION['review']['to_menu_rice']) ? $_SESSION['review']['to_menu_rice'] : $_REQUEST['to_menu_rice']);
$to_menu_fish = (isset($_SESSION['review']['to_menu_fish']) ? $_SESSION['review']['to_menu_fish'] : $_REQUEST['to_menu_fish']);
$to_menu_score = (isset($_SESSION['review']['to_menu_score']) ? $_SESSION['review']['to_menu_score'] : $_REQUEST['to_menu_score']);
$to_ftalk = (isset($_SESSION['review']['to_ftalk']) ? $_SESSION['review']['to_ftalk'] : $_REQUEST['to_ftalk']);
$to_station_hello = (isset($_SESSION['review']['to_station_hello']) ? $_SESSION['review']['to_station_hello'] : $_REQUEST['to_station_hello']);
$to_station_help = (isset($_SESSION['review']['to_station_help']) ? $_SESSION['review']['to_station_help'] : $_REQUEST['to_station_help']);
$to_station_menu = (isset($_SESSION['review']['to_station_menu']) ? $_SESSION['review']['to_station_menu'] : $_REQUEST['to_station_menu']);
$to_station_exp = (isset($_SESSION['review']['to_station_exp']) ? $_SESSION['review']['to_station_exp'] : $_REQUEST['to_station_exp']);
$to_station_score = (isset($_SESSION['review']['to_station_score']) ? $_SESSION['review']['to_station_score'] : $_REQUEST['to_station_score']);
$to_clean_out = (isset($_SESSION['review']['to_clean_out']) ? $_SESSION['review']['to_clean_out'] : $_REQUEST['to_clean_out']);
$to_clean_in = (isset($_SESSION['review']['to_clean_in']) ? $_SESSION['review']['to_clean_in'] : $_REQUEST['to_clean_in']);
$to_clean_sound = (isset($_SESSION['review']['to_clean_sound']) ? $_SESSION['review']['to_clean_sound'] : $_REQUEST['to_clean_sound']);
$to_clean_temper = (isset($_SESSION['review']['to_clean_temper']) ? $_SESSION['review']['to_clean_temper'] : $_REQUEST['to_clean_temper']);
$to_clean_table = (isset($_SESSION['review']['to_clean_table']) ? $_SESSION['review']['to_clean_table'] : $_REQUEST['to_clean_table']);
$to_clean_menu = (isset($_SESSION['review']['to_clean_menu']) ? $_SESSION['review']['to_clean_menu'] : $_REQUEST['to_clean_menu']);
$to_clean_dress = (isset($_SESSION['review']['to_clean_dress']) ? $_SESSION['review']['to_clean_dress'] : $_REQUEST['to_clean_dress']);
$to_clean_score = (isset($_SESSION['review']['to_clean_score']) ? $_SESSION['review']['to_clean_score'] : $_REQUEST['to_clean_score']);
$to_all_score = (isset($_SESSION['review']['to_all_score']) ? $_SESSION['review']['to_all_score'] : $_REQUEST['to_all_score']);
//세션 담기
$_SESSION['review'] = array("aType"=>$aType,
							"getIdx"=>$getIdx,
							"visit_date"=>$visit_date,
							"s_sido"=>(string) $s_sido,
							"addr_sec"=>$addr_sec,
							"to_gether"=>$to_gether,
							"to_menu"=>$to_menu,
							"to_menu_depth"=>$to_menu_depth,
							"to_menu_time"=>$to_menu_time,
							"to_menu_rice"=>$to_menu_rice,
							"to_menu_fish"=>$to_menu_fish,
							"to_menu_score"=>$to_menu_score,
							"to_ftalk"=>$to_ftalk,
							"to_station_hello"=>$to_station_hello,
							"to_station_help"=>$to_station_help,
							"to_station_menu"=>$to_station_menu,
							"to_station_exp"=>$to_station_exp,
							"to_station_score"=>$to_station_score,
							"to_clean_out"=>$to_clean_out,
							"to_clean_in"=>$to_clean_in,
							"to_clean_sound"=>$to_clean_sound,
							"to_clean_temper"=>$to_clean_temper,
							"to_clean_table"=>$to_clean_table,
							"to_clean_menu"=>$to_clean_menu,
							"to_clean_dress"=>$to_clean_dress,
							"to_clean_score"=>$to_clean_score,
							"to_all_score"=>$to_all_score
							);
print_r($_SESSION);
exit;
?>