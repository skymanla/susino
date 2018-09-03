<?php 
include_once "../../_head.php";

//우리동네 알림 가져오기
$sql_notice = "select * from sb_application_notice_board where (sbab_area='".$dongnae."' or sbab_area='A') order by sbab_idx limit 0, 10";
$val_notice = $conn->query($sql_notice);
$notice_length = $val_notice->num_rows;

$cur_page = (isset($_GET['cur_page']) ? $_GET['cur_page'] : "1");
if(empty($cur_page)) $cur_page = "1";
?>

<div class="wrap_conts">
	<div class="hd_s_img">
		<h2><img src="/m/img/s5/s5s2_tit.png" alt=""></h2>
	</div>
	<div class="my_notice_wrap" id="mv_page_top">

		<div class="my_notice_roll_wrap type2">
			<h3><img src="/m/img/s5/s5s2_sub_tit2.png" alt="우리동네 소식"></h3>
		</div>
		<div id="udong_list_view">
		</div>
	</div>
<script>
$(function(){
	tab1_list("<?=$cur_page?>", "All", "All");
});
function tab1_list(getPage, getType1, getType2){
	$.ajax({
		type : "POST",
		url : "/ajax/mobile_udong_list_myissue.php",
		data : {"getPage" : getPage, "getType1" : getType1, "getType2" : getType2},
		success : function(result){
			$('#udong_list_view').html(result);
		}, error : function(){
			console.log('errrrr');
		}
	});
}
</script>
<?php include_once "../../_tail.php";?>