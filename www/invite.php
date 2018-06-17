<?php
include_once "_head.php";
include_once $_SERVER['DOCUMENT_ROOT']."/lib/dbconn.php";

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
<div class="person_invite_wrap <?php echo 'bg'.$w_type; ?>">
	<div>
		<div class="title"><b><?=$r['sb_name']?></b><?php echo $w_copy1;?></div>
		<div class="img_wrap"><img src="/img/s6/person_invite_title<?php echo $w_type; ?>.png" alt="" /></div>
		<div class="bt_wrap">
			<a href="javascript:void(0);" class="invite_ok"><img src="/img/s6/person_invite_bt<?php echo $w_type; ?>1.jpg" alt="" /></a>
			<a href="javascript:void(0);" class="invite_cencle"><img src="/img/s6/person_invite_bt<?php echo $w_type; ?>2.jpg" alt="" /></a>
		</div>
		<div class="foot_img_wrap"><img src="/img/s6/person_invite_footer.png" alt="" /></div>
	</div>
</div>

<script type="text/javascript">
//<![CDATA[
$(function(){
	$('.invite_ok').on('click',function (){
		invite_member(<?=$r[sb_idx]?>, '<?=$r[sb_id]?>', '<?=$r[sb_name]?>');
		//alert('홍길동님과 함께갈래요 참여가 완료되었습니다.');
		//location.href = '/';
	});
});

function invite_member(idx, id, getName){
	$.ajax({
		type : "POST",
		url : "/ajax/invite_member.php",
		data : { "midx" : idx, "mid" : id, "mname" : getName},
		success : function(result){
			if(result == "99"){
				alert("본인이 신청할 수 없습니다.");
				location.href = '/';
			}else if(result == "29"){
				alert("탈퇴 혹은 존재하지 않는 회원입니다.");
				location.href = '/';
			}else if(result == "39"){
				alert("이미 신청이 된 회원입니다.");
				location.href = '/';
			}else if(result == "19"){
				alert("<?=$r[sb_name]?>님과 함께갈래요 참여가 완료되었습니다.");
				location.href = '/';
			}
		}, error : function(){
			console.log('error!!!!!');
		}
	});
}
//]]>
</script>

<?php include_once "_tail.php";?>