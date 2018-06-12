<?php include_once "../../_head.php";?>

<div class="s6s4_wrap">
	<div class="box1"></div>
	<div class="box2"></div>
	<div class="box3">
		<ul class="info">
			<li class="dep1"><span><i>이벤트기간</i></span><input type="text" class="" value="2018 / 07 / 01 ~ 2018 / 07 / 31" style="text-align:center"/></li>
			<li class="dep2">
				<span><i>수신인선택</i></span>
				<div class="tab_bt">
					<button type="button" class="active">부모님께</button>
					<button type="button">애인에게</button>
					<button type="button">친구에게</button>
					<button type="button">동료에게</button>
				</div>
			</li>
			<li class="dep3"><span><i>함께갈래요?</i></span><input type="text" class="go_to_url" value="http://winddesign32.cafe24.com/page/s6/s4invite.php?invite=wind&type=1" name="" placeholder="" /></li>
		</ul>
		<div class="submit_wrap">
			<div class="copy">
				· 수신자가 버튼을 누르면 초대자에게 바로 당첨 결과가 발송됩니다. <br />
				· 함께갈래요? 초대 이벤트는 이벤트 기간마다 한번씩 참여가능합니다.
			</div>
			<div class="bt_wrap">
				<!-- STR 로그인 이전에 만 나오게 -->
				<a href="/page/member/login.php" class="go_login">로그인 하기</a>
				<!-- END 로그인 이전에 만 나오게 -->
				<a href="s4invite_result.php" class="go_event">당첨 확인하기<span><i>당첨</i></span></a>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
//<![CDATA[
$(function(){
	inviteAc1(); // 수신인 선택
});

// STR 수신인 선택
function inviteAc1(){
	$('.s6s4_wrap .dep2 .tab_bt button').on('click',function(){
		var wNum = $(this).index()+1;
		var wTar = $('.go_to_url');
		var wGoUrl = wTar.val().split('type');
		var eNurl = wGoUrl[0]+'type='+wNum;
		$(this).addClass('active').siblings().removeClass('active');
		wTar.val(eNurl);
	});
}
// END 수신인 선택
//]]>
</script>

<?php include_once "../../_tail.php";?>