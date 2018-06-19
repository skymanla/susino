<?php 
/*
미스테리쇼퍼, 미식회, 체험단 공통 list
 */
include_once "../../_head.php";
include_once $_SERVER['DOCUMENT_ROOT']."/lib/dbconn.php";
include_once $_SERVER['DOCUMENT_ROOT']."/lib/function.php";

$sb_id = $conn->real_escape_string($_SESSION['sb_id']);
//비회원 튕기기
if($_SESSION['login_chk'] != 99){
	$url = "/page/member/login.php";
	echoAlert("로그인을 해야 이용이 가능합니다.");
	echoMovePage($url);
}
$cur_page = (int)$_GET['cur_page'];
if($cur_page=="") $cur_page = 1; //페이지 번호가 없으면 1번 페이지

$tbl_info = "sb_application_board";
//검색
$where = array();
$where[] = '';
$qtr[] = '';
switch($_GET['aType']){
	case 'shopper' :
		$where[] = " sbab_cate='shopper' ";
		$shopper_chk = "active";
		$qtr[] = 'aType='.$_GET['aType'];
		break;
	case 'ftalk' :
		$where[] = " sbab_cate='ftalk' ";
		$ftalk_chk = "active";
		$qtr[] = 'aType='.$_GET['aType'];
		break;
	case 'pick' :
		$where[] = " sbab_cate='pick' ";
		$pick_chk = "active";
		$qtr[] = 'aType='.$_GET['aType'];
		break;
	default :
		$a_chk = "active";
		break;
}

//전제, 모집중, 마감
$now_date = date('Y-m-d');
switch($_GET['bType']){
	case 'ing' :
		$where[] = ' "'.$now_date.'"  between date_format(sbab_sdate, "%Y-%m-%d") and date_format(sbab_edate, "%Y-%m-%d")';
		//$where[] = " ( date_format(sbab_sdate, 'Y-m-d') >= '".$now_date."' and date_format(sbab_edate, 'Y-m-d') >= '".$now_date."' )";
		$ing_chk = "active";
		$qtr[] = 'bType='.$_GET['bType'];
		break;
	case 'end' :
		$where[] = " ( date_format(sbab_edate, 'Y-m-d') < '".$now_date."' ) ";
		$end_chk = "active";
		$qtr[] = 'bType='.$_GET['bType'];
		break;
	default :
		$Da_chk = "active";
		break;
}

$sub_q = implode('&', $qtr);

if(!empty($where)){
	$whereis = implode(" and ", $where);
}else{
	$whereis = "";
}

//쿼리(관리자일 때는 어카지????)
if($_SESSION['sba_id'] == "admin"){//관리자
	//우리동네 소식 가져오기(얘도 관리자는 어쩌하냐....관리자용 쿼리 만들잡...)
	$dongnae = "스시노백";
	$sql_A = "select count(sb_dongnae) as cnt from sb_member";
	//동네 가져오기
	$q = $conn->query($sql_A);
	$vA = $q->fetch_assoc();

	$vL['rate'] = "관리자";

	//전체 당첨자 수 불러오기
	//체험기 가져오기(당첨된 것 만)
	$sql_C = "select count(sbabm_mb_id) as cnt from sb_application_member where sbabm_option4 is null and sbabm_option5='Y'";
	$q = $conn->query($sql_C);
	$vC = $q->fetch_assoc();

	//우리동네 알림 가져오기
	$sql_N = "select * from sb_application_notice_board where 1 order by sbab_idx";
	$vN = $conn->query($sql_N);
	
	//개수
	$count = "SELECT COUNT(sbab_idx) as cnt FROM $tbl_info where 1 ".$whereis;
	$count_result = $conn->query($count);
	$row = $count_result->fetch_assoc();
	$cnt = $row['cnt'];

	$limit_num = 10; //몇개씩 리스트에 보여줄 것인지
	$offset_num = 10; //몇번 부터 시작할지
	$show_offset_num = ($cur_page - 1) * $offset_num; //페이지마다 보여주는 리스트가 40개씩 갱신.

	$board_no = $cnt - $show_offset_num;

	$total_page = floor ( $cnt / $limit_num ) + 1;

	//등록 게시물 가져오기
	$sql_B = "select * from $tbl_info where 1 $whereis order by sbab_idx desc LIMIT $limit_num OFFSET $show_offset_num";
	$vB = $conn->query($sql_B);
}else{//회원
	$dongnae = $_SESSION['sb_dongnae'];
	//동네 가져오기
	$sql_A = "select count(sb_dongnae) as cnt from sb_member where sb_dongnae='".$dongnae."'";
	$q = $conn->query($sql_A);
	$vA = $q->fetch_assoc();
	//등급 가져오기
	$sql_L = "select sb_level_title as rate from sb_member_level where sb_level_cate='".$_SESSION['sb_mem_level']."'";
	$q = $conn->query($sql_L);
	$vL = $q->fetch_assoc();
	//체험기 가져오기(당첨된 것 만)
	$sql_C = "select count(sbabm_mb_id) as cnt from sb_application_member where 
				sbabm_mb_id='".$sb_id."' and sbabm_option4=''";
	$q = $conn->query($sql_C);
	$vC = $q->fetch_assoc();
	//우리동네 알림 가져오기
	$sql_N = "select * from sb_application_notice_board where sbab_area='".$dongnae."' or sbab_area='A' order by sbab_idx";
	$vN = $conn->query($sql_N);
	$vN_length = mysqli_num_rows($vN);

	//개수
	$count = "select count(sbab_idx) as cnt from $tbl_info where ( sbab_area='$dongnae' or sbab_area='A' ) $whereis ";	
	$count_result = $conn->query($count);
	$row = $count_result->fetch_assoc();
	$cnt = $row['cnt'];

	$limit_num = 10; //몇개씩 리스트에 보여줄 것인지
	$offset_num = 10; //몇번 부터 시작할지
	$show_offset_num = ($cur_page - 1) * $offset_num; //페이지마다 보여주는 리스트가 40개씩 갱신.

	$board_no = $cnt - $show_offset_num;

	$total_page = floor ( $cnt / $limit_num ) + 1;

	//등록 게시물 가져오기
	$sql_B = "select * from $tbl_info where ( sbab_area='$dongnae' or sbab_area='A' ) $whereis order by sbab_idx desc LIMIT $limit_num OFFSET $show_offset_num";
	$vB = $conn->query($sql_B);
}

?>

<div class="wrap_style1 pabno">
	<div class="heading_s1">
		<h2 class="tit"><img src="/img/s5/mypage_title.png" alt="우리동네 맛평가단"></h2>
	</div>
	<div class="my_info_wrap">
		<div class="my_info">
			<div>
				<div>
					<h3 class="title1"><i>우리동네</i></h3>
					<p class="copy1"><b><?=$dongnae?></b></p>
					<p class="copy2">
						우리동네가 아닌가요? <br />
						회원정보를 변경해주세요.
					</p>
					<div class="bt_wrap">
						<a href="/page/member/register_form_modify.php" class="bt1">회원 정보 변경</a>
					</div>
				</div>
			</div>
			<div>
				<div>
					<h3 class="title2"><i>동네주민</i></h3>
					<!--<p class="copy1">서울시 강남구에</p>-->
					<p class="copy1"><?=$dongnae?>에</p>
					<!--<p class="copy3">255명의</b></p>-->
					<p class="copy3"><?=$vA['cnt']?>명의</b></p>
					<p class="copy_people"><i>스시노백쉐프 주민이 있습니다.</i></p>
				</div>
			</div>
			<div>
				<div>
					<h3 class="title3"><i>나의 체험기</i></h3>
					<p class="copy1"><b><?=$vC['cnt']?>회</b></p>
					<p class="copy2">
						최근에 체험에 참여하셨네요!<br />
						후기를 전송해주세요!
					</p>
					<div class="bt_wrap">
						<a href="s2sreview.php" class="bt2">자발적 후기 전송하기</a>
					</div>
				</div>
			</div>
			<div>
				<div>
					<h3 class="title4"><i>나의 등급</i></h3>
					<p class="copy1"><b><?=$vL['rate']?></b></p>
					<p class="copy2">
						스시노백쉐프의 단골고객이 되면?<br />
						깜짝 놀랄 선물을 드려요!
					</p>
					<div class="bt_wrap">
						<a href="/page/s5/s1.php" class="bt1">단골 고객 혜택</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="my_notice_wrap"id="mv_page_top">

		<div class="tab_type1">
			<a href="javascript:void(0);" class="bt active">우리동네소식</a>
			<a href="javascript:void(0);" class="bt">나의소식 <span class="count"><?=$vC['cnt']?></span></a>
			<div class="cate toggle_j">
				<a href="javascript:mv_page2('A');" class="<?=$Da_chk?>">전체</a>
				<a href="javascript:mv_page2('ing');" class="<?=$ing_chk?>">모집중</a>
				<a href="javascript:mv_page2('end');" class="<?=$end_chk?>">마감</a>
			</div>
		</div>

		<div class="mypage_type1">
			<a href="javascript:mv_page('A');" class="<?=$a_chk?> bt1"><i>전체</i></a>
			<a href="javascript:mv_page('shopper');" class="<?=$shopper_chk?> bt2"><i>미스테리 쇼퍼</i></a>
			<a href="javascript:mv_page('ftalk');" class="<?=$ftalk_chk?> bt3"><i>스시노 미식회</i></a>
			<a href="javascript:mv_page('pick');" class="<?=$pick_chk?> bt4"><i>체험단</i></a>
		</div>

		<div class="my_notice_roll_wrap">
			<h3><i>우리동네 알림</i></h3>
			<div class="roll_wrap">
				<ul class="roll">
					<? if($vN_length < 1){ ?>
					<li><a href="javascript:void(0)">등록된 알림이 없습니다.</a></li>
					<? 
						}else{ 
							foreach($vN as $key => $rowV){
					?>
					<li><a href="s2snotice_view.php?idx=<?=$rowV['sbab_idx']?>"><?=stripslashes($rowV['sbab_title'])?></a></li>
					<? 
						} 
					}
					?>
					<!--<li><a href="s2snotice_view.php">우동맛의 미스테리 쇼퍼 자체 후기를 작성하면 스시노백쉐프 할인권을 드립니다!</a></li>
					<li><a href="s2snotice_view.php">우동맛의 미스테리 쇼퍼 자체 후기를 작성하면 스시노백쉐프 할인권을 드립니다!</a></li>
					<li><a href="s2snotice_view.php">우동맛의 미스테리 쇼퍼 자체 후기를 작성하면 스시노백쉐프 할인권을 드립니다!</a></li>-->
				</ul>
			</div>
			<div class="bt_wrap">
				<button type="button" class="prev"><i>이전</i></button>
				<button type="button" class="next"><i>다음</i></button>
			</div>
		</div>

		<ul class="bo_webzine1">
			<? 
				foreach($vB as $key=>$row){ 
					switch($row['sbab_cate']){
						case "shopper" :
							$cateType = "미스테리 쇼퍼";
							$bgType = "bg1";
							break;
						case "ftalk" :
							$cateType = "스시노미식회";
							$bgType = "bg3";
							break;
						case "pick" :
							$cateType = "체험단";
							$bgType = "bg2";
							break;
					}
					$sdate = date('Y-m-d', strtotime($row['sbab_sdate']));
					$edate = date('Y-m-d', strtotime($row['sbab_edate']));
					$go_more = 's2sview.php?idx='.$row['sbab_idx'].'&aType='.$row['sbab_cate'];
					if($now_date > $edate){
						$app_stat = 'end';
					}else if( ($now_date >= $sdate) && ($now_date <= $edate) ){
						$app_stat = "ing";
						$go_more = 's2sview.php?idx='.$row['sbab_idx'].'&aType='.$row['sbab_cate'];
					}else if($now_date < $sdate){
						$app_stat = "etc1";
						$go_more = 'javascript:void(0)';
					}
			?>
			<li>
				<div>
					<!-- <span><img src="/img/s5/win_icon1.png" alt="당첨" /></span> -->
					<div class="cate <?=$bgType?>">
						<div>
							<i><?=$cateType?></i>
						</div>
					</div>
					<div class="info">
						<div class="date <?=$app_stat?>"><i><?=$app_stat?></i></div>
						<div class="addr">[<?=$row['sbab_area']=="A" ? "전체지역" : $row['sbab_area']?>]</div>
						<div class="title"><?=stripslashes($row['sbab_title'])?></div>
						<ul class="list">
							<li>모집기간 : <?=$sdate?> ~ <?=$edate?></li>
							<!--<li>체험기간 : 2018-02-13 ~ 2018-02-26</li>-->
							<li>당첨인원 : <?=$row['sbab_limit']?>명</li>
						</ul>
						<a href="<?=$go_more?>" class="go_more">자세히 보기</a>
					</div>
				</div>
			</li>
			<? } ?>
		</ul>

		<div class="paging">
			<?php 
			$first_page_num = (floor ( ($cur_page - 1) / 10 )) * 10 + 1; // 1,11,21,31...
			$last_page_num = $first_page_num + 9; // 10,20,30...last
			$next_page_num = $last_page_num + 1;
			$prev_page_num = $first_page_num - 10;

			if ($first_page_num != 1) { // It's not first page
				echo "<a href='?cur_page=$prev_page_num{$sub_q}' class='arr prev'><button type='button' class='bt_prev'>전페이지 버튼</button></a>";
			}

			echo "<ul class='paing'>";

			for($i = $first_page_num; $i <= $total_page && $i <= $last_page_num; $i ++) {
				if ($cur_page == $i) {
					echo "<li class='active'><a href='?cur_page=$i{$sub_q}'><strong>$i</strong></a></li>"; // Current page
				} else {
					echo "<li><a href='?cur_page=$i{$sub_q}'>$i</a></li>";
				}
				if ($i % 10 == 0 && $last_page_num != $total_page) {
					echo "</ul>";
					echo "<a href='?cur_page=$next_page_num{$sub_q}' class='arr next'><button type='button' class='bt_next'>다음 페이지 버튼</button></a>";
				}
			}
			?>
		</div>
	</div>
</div>
<script>
function mv_page(getType){
	if(getType=="A"){
		location.href="./s2.php#mv_page_top";
	}else if(getType=="shopper"){
		location.href="./s2.php?aType="+getType+"#mv_page_top";
	}else if(getType=="ftalk"){
		location.href="./s2.php?aType="+getType+"#mv_page_top";
	}else if(getType=="pick"){
		location.href="./s2.php?aType="+getType+"#mv_page_top";
	}
}

function mv_page2(getType){
	if(getType=="A"){
		location.href="./s2.php?cur_page=1&aType=<?=$_GET['aType']?>#mv_page_top";
	}else if(getType=="ing"){
		location.href="./s2.php?cur_page=1&aType=<?=$_GET['aType']?>&bType="+getType+"#mv_page_top";
	}else if(getType=="end"){
		location.href="./s2.php?cur_page=1&aType=<?=$_GET['aType']?>&bType="+getType+"#mv_page_top";
	}
}
</script>
<?php include_once "../../_tail.php";?>