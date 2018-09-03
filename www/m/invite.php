<?php
include_once "_head.php";
include_once($_SERVER['DOCUMENT_ROOT']."/lib/function.php");

//이벤트 고유값으로 진행 이벤트 찾아내기
$eUrl = $conn->real_escape_string($_GET['eurl']);
$sql = "select * from sb_invite_admin where sbia_eurl='".$eUrl."' and sbia_edate > now()";
$q = $conn->query($sql);

if($q->num_rows == '0'){//없다
	header("HTTP/1.0 400 Bed Request");
	echoAlert("존재하지 않는 이벤트입니다.");
	echoMovePage("/");
	exit;
}else{
	$info_r = $q->fetch_assoc();
}

//회원 이름, 고유값 가져오기
$sb_id = $conn->real_escape_string($_GET['invite']);
$sql = "select sb_idx, sb_id, sb_name from sb_member where sb_id='".$sb_id."'";
$q = $conn->query($sql);
$r = $q->fetch_assoc();

if($_GET['type']) {
	$w_type = $_GET['type'];
} else {
	$w_type = 3;
}

if($w_type==1){
	$w_copy1 = '님께서 외식 하자고 하시네요!';
} else if($w_type==2){
	$w_copy1 = '님께서 데이트 신청 하셨네요!';
} else if($w_type==3){
	$w_copy1 = '님께서 밥 한번 먹자고 하시네요!';
} else if($w_type==4){
	$w_copy1 = '님께서 밥 한번 먹자고 하시네요!';
}

?>

<div class="wrap_with_go <?php echo 'bg'.$w_type; ?>">
	<div class="go_title"><b><?=$r['sb_name']?></b><?php echo $w_copy1;?></div>
	<div class="wrap_with_bt">
		<a href="javascript:void(0);" class="invite_ok"><img src="/m/img/s6/bt_with<?php echo $w_type; ?>1.jpg" alt="" /></a>
		<a href="javascript:void(0);" class="bts2 invite_cencle"><img src="/m/img/s6/bt_with<?php echo $w_type; ?>2.jpg" alt="" /></a>
	</div>
	<a href="/m/" class="bt_home"><img src="/m/img/s6/ico_home.png" alt="홈으로 가기" /></a>
	<a href="javascript:void(0);" class="bt_facebook"><img src="/m/img/s6/ico_facebook.png" alt="facebook" /></a>
</div>

<script type="text/javascript">
//<![CDATA[
$(function(){
	$('.invite_ok').on('click',function (){
		invite_member(<?=$r[sb_idx]?>, '<?=$r[sb_id]?>', '<?=$r[sb_name]?>');
		//alert('홍길동님과 함께갈래요 참여가 완료되었습니다.');
		//location.href = '/';
	});

	$('.invite_cencle').on('click', function(){
		location.href = '/';
	});
});

function invite_member(idx, id, getName, getTyp){
	$.ajax({
		type : "POST",
		dataType : "json",
		data : { "midx" : idx, "mid" : id, "mname" : getName, "getType" : <?=$_GET[type]?>, "eurl" : "<?=$eUrl?>"},
		url : "/ajax/invite_member.php",
		success : function(result){
			alert(result.msg);
			//location.reload();
			//location.href = '/';
		}, error : function(){
			console.log('error!!!!!');
		}
	});
}
//]]>
</script>


<?php include_once "_tail.php";?>