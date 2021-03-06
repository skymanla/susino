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

//Tab Move
$udong_mv_tab_our = "";
$udong_mv_tab_myissue = "";
if($_GET['cType'] == 'ourlocate' || !isset($_GET['cType'])){
	$udong_mv_tab_our = "active";
}else if($_GET['cType'] == 'myissue'){
	$udong_mv_tab_myissue = "active";
}
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
		$where[] = " ( date_format(sbab_edate, '%Y-%m-%d') < '".$now_date."' ) ";
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
	//$dongnae = explode(" ", $_SESSION['sb_dongnae']);
	//$dongnae = $dongnae[1];
	$dongnae = $_SESSION['sb_dongnae'];
	
	//DashBoard sql
	$sql_dash = "select sb_review_cnt, sb_review_tocnt, sb_review_get_coupon, sb_dongnae as dongnae,
				(select count(sb_dongnae) as cnt from sb_member where sb_dongnae=dongnae) as ourdongnae,
				(select count(sbabm_mb_id) as cnt from sb_application_member where sbabm_mb_id='".$sb_id."' and (sbabm_option2='Y' and sbabm_option5='Y')) as accept_review,
				(select count(sbabm_mb_id) as cnt from sb_application_member where sbabm_mb_id='".$sb_id."' and (sbabm_option2 != 'Y' and sbabm_option5='Y')) as post_review
				from sb_member where sb_id='".$sb_id."'";
	$query = $conn->query($sql_dash);
	$dash_row = $query->fetch_assoc();

	//우리동네 알림 가져오기
	$sql_N = "select * from sb_application_notice_board where sbab_area like '%".$dongnae."%' or sbab_area='A' order by sbab_idx limit 0, 10";
	$vN = $conn->query($sql_N);
	$vN_length = mysqli_num_rows($vN);

	//개수
	$count_cType = '';
	$area_where = " ( sbab_area like '%$dongnae%' or sbab_area='A' ) ";
	if($_GET['cType'] == 'ourlocate' || !isset($_GET['cType'])){
		//pass
	}else if($_GET['cType'] == 'myissue'){//만약에 이사를 갔다거나...주로 다니는 곳이 변경되었을 경우
		$tbl_info = $tbl_info." a right join sb_application_member b on a.sbab_idx=b.sbabm_fidx";
		$whereis = $whereis." and sbabm_mb_id='".$sb_id."' and sbabm_option5='Y' and sbabm_cate!='selfer' ";
		$area_where = " 1 ";//내 지역이 변경되지 않는다면 $area_where 를 초기화 시킬 필요가 없다.
	}
	$count = "select count(sbab_idx) as cnt from $tbl_info where $area_where $whereis ";	
	$count_result = $conn->query($count);
	$row = $count_result->fetch_assoc();
	$cnt = $row['cnt'];

	$limit_num = 10; //몇개씩 리스트에 보여줄 것인지
	$offset_num = 10; //몇번 부터 시작할지
	$show_offset_num = ($cur_page - 1) * $offset_num; //페이지마다 보여주는 리스트가 40개씩 갱신.

	$board_no = $cnt - $show_offset_num;

	$total_page = floor ( $cnt / $limit_num ) + 1;

	//등록 게시물 가져오기
	$sql_B = "select * from $tbl_info where $area_where $whereis order by sbab_idx desc LIMIT $limit_num OFFSET $show_offset_num";
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
					<p class="copy3"><?=$dash_row['ourdongnae']?>명의</b></p>
					<p class="copy_people"><i>스시노백쉐프 주민이 있습니다.</i></p>
				</div>
			</div>
			<div>
				<div>
					<h3 class="title3"><i>나의 후기</i></h3>
					<p class="copy4"><b><?=$dash_row['sb_review_tocnt']?>회</b></p>
					<p class="copy5">
						스시노백쉐프에 다녀오셨나요? <br />
						후기 등록하면 우동맛 스티커 증정!
					</p>
					<!-- <div class="bt_wrap">
						<a href="s2sreview.php" class="bt2">자발적 후기 전송하기</a>
					</div> -->
				</div>
			</div>
			<div>
				<div>
					<h3 class="title4"><i>우동맛 스티커</i></h3>
					<div class="my_sticker1">
						<?php 
						for($i=1;$i<=5;$i++){
							if($dash_row['sb_review_cnt'] >= $i){
								$active = "active";
							}else{
								$active = "";
							}
							echo '<div class="'.$active.'"><i>'.$i.'</i></div>';
						}
						?>
						<!--<div class="active"><i>1</i></div>
						<div class="active"><i>2</i></div>
						<div class="active"><i>3</i></div>
						<div><i>4</i></div>
						<div><i>5</i></div>-->
					
					</div>
					<p class="copy2">
						우동 다섯그릇 모일때마다 3만원권을! <br />
						신청 시 매주 금요일에 발송됩니다.
					</p>
					<div class="bt_wrap">
						<? if($dash_row['sb_review_cnt'] >= 5){ ?>
						<!-- STR 5회시 나오게 -->
						<a href="javascript:get_coupon('<?=$sb_id?>');" class="bt2">상품권 받기</a>
						<!-- END 5회시 나오게 -->
						<? }else{ ?>
						<span class="bt3">상품권 받기</span>
						<? } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="my_notice_wrap"id="mv_page_top">

		<div class="tab_type1">
			<a href="javascript:mv_page3('ourlocate');" class="bt <?=$udong_mv_tab_our?>">우리동네소식</a>
			<a href="javascript:mv_page3('myissue');" class="bt <?=$udong_mv_tab_myissue?>">나의소식 <span class="count"><?=$dash_row['post_review']?></span></a>
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
				</ul>
			</div>
			<div class="bt_wrap">
				<button type="button" class="prev"><i>이전</i></button>
				<button type="button" class="next"><i>다음</i></button>
			</div>
		</div>

		<ul class="bo_webzine1">
			<li>
				<div class="fr_banner">
					<div class="copy">
						셀프 미스테리 쇼퍼

						매장 방분 후 후기 전송하면 우동맛 스터키가 팡팡!

						우동맛 체험단에 당첨 안되었다고 아쉬워하지 말아요~!
						자발적으로 스시노백쉐프의 미스테리 쇼퍼가 되어주세요!

						첫 후기 등록하면 스시노백쉐프 1만원권을,
						5번 등록마다 스시노백쉐프 3만원권을 드려요!
					</div>
					<a href="s2sreview_self.php" class="go_more">후기 전송하기</a>
				</div>
			</li>
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
					//게시물 당첨 및 후기 여부 확인
					$sql = "select * from sb_application_member where sbabm_mb_id='".$sb_id."' and sbabm_fidx='".$row['sbab_idx']."'";
					$q = $conn->query($sql);
					$mb_event = $q->fetch_assoc();
			?>
			<li>
				<div>
					<div class="cate <?=$bgType?>">
						<div>
							<?php if($mb_event['sbabm_option5'] == "Y"){ ?>
							<span><img src="/img/s5/win_icon1.png" alt="당첨" /></span>
							<? }else{  } ?>
							<i><?=$cateType?></i>
						</div>
					</div>
					<div class="info">
						<div class="date_wrap">
							<div class="date <?=$app_stat?>"><i><?=$app_stat?></i></div>
							<?
							if(!empty($mb_event)){
								if($mb_event['sbabm_option2'] == "Y"){
							?>
							<div class="order_state"><img src="/img/s5/my_event_img_list_end2.png" alt="후기 완료" /></div>
							<? }else{ ?>
							<div class="order_state"><img src="/img/s5/my_event_img_list_end.png" alt="신청완료" /></div>
							<? 
								} 
							}
							?>
						</div>
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
		location.href="./s2.php?aType=&bType=<?=$_GET['bType']?>&cType=<?=$_GET['cType']?>#mv_page_top";
	}else{
		location.href="./s2.php?aType="+getType+"&bType=<?=$_GET['bType']?>&cType=<?=$_GET['cType']?>#mv_page_top";
	}
}

function mv_page2(getType){
	if(getType=="A"){
		location.href="./s2.php?cur_page=1&aType=<?=$_GET['aType']?>&bType=&cType=<?=$_GET['cType']?>#mv_page_top";
	}else if(getType=="ing"){
		location.href="./s2.php?cur_page=1&aType=<?=$_GET['aType']?>&bType="+getType+"&cType=<?=$_GET['cType']?>#mv_page_top";
	}else if(getType=="end"){
		location.href="./s2.php?cur_page=1&aType=<?=$_GET['aType']?>&bType="+getType+"&cType=<?=$_GET['cType']?>#mv_page_top";
	}
}

function mv_page3(getType){
	location.href="./s2.php?cur_page=1&aType=<?=$_GET['aType']?>&bType=<?=$_GET['bType']?>&cType="+getType+"#mv_page_top";
}

function get_coupon(getId){
	if(getId != "<?=$sb_id?>"){
		alert("현재 접속 ID와 다릅니다.");
		return false;
	}else{
		$.ajax({
			type : "POST",
			dataType : "json",
			data : {"getId" : getId},
			url : "/ajax/get_coupon.php",
			success : function(result){
				alert(result.msg);
				location.reload();
			}, error : function(){
				console.log('errrrrrr');
			}
		});
	}
}
</script>
<?php include_once "../../_tail.php";?>