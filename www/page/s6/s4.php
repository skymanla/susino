<?php 
include_once "../../_head.php";
session_start();
?>

<div class="s6s4_wrap">
	<div class="info_wrap">
		<div class="tab_bt">
			<button type="button" class="active">부모님께</button>
			<button type="button">애인에게</button>
			<button type="button">친구에게</button>
			<button type="button">동료에게</button>
		</div>
		<div class="invite_url_wrap">
			<span><i>초대장 URL</i></span>
			<input type="text" class="go_to_url" value="http://winddesign32.cafe24.com/invite.php?invite=<?=$_SESSION[sb_id]?>&type=1" name="" placeholder="" />
			<a href="s4invite_result.php"><i>당첨</i></a>
		</div>
	</div>
	<div class="invite_result_rank_wrap">
		<ul class="invite_result_rank">
			<li class="rank1">
				<p class="copy1">1등</p>
				<p class="copy2">
					15만원 초대권 <br />
					(10명)
				</p>
			</li>
			<li class="rank2">
				<p class="copy1">2등</p>
				<p class="copy2">
					10만원 초대권 <br />
					(10명)
				</p>
			</li>
			<li class="rank3">
				<p class="copy1">3등</p>
				<p class="copy2">
					5만원 초대권 <br />
					(30명)
				</p>
			</li>
			<li class="rank4">
				<p class="copy1">4등</p>
				<p class="copy2">
					3만원 초대권 <br />
					(20명)
				</p>
			</li>
		</ul>
	</div>
</div>

<script type="text/javascript">
//<![CDATA[
$(function(){
	inviteAc1(); // 수신인 선택
});

// STR 수신인 선택
function inviteAc1(){
	$('.s6s4_wrap .tab_bt button').on('click',function(){
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