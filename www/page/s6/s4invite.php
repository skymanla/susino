<?php include_once "../../_head.php";?>

<div class="person_invite_wrap <?php if($_GET['type']){ echo 'bg'.$_GET['type']; } ?>">
	<div class="title"><p><b>홍길동</b></p></div>
	<button type="button" class="invite_ok"><i>함께 갈래요!</i></button>
	<!-- STR 이미 참여 신청이 완료된경우 -->
	<!-- <div class="end_copy">이미 참여가 완료되었습니다.</div> -->
	<!-- END 이미 참여 신청이 완료된경우 -->
</div>

<script type="text/javascript">
//<![CDATA[
$(function(){
	$('.invite_ok').on('click',function (){
		alert('홍길동님과 함께갈래요 참여가 완료되었습니다.');
		location.href = '/';
	});
});
//]]>
</script>

<?php include_once "../../_tail.php";?>