<?php 
include_once($_SERVER['DOCUMENT_ROOT'].'/_head.php');
?>
<div class="wrap_style1">
	<div class="heading_s1">
		<h2 class="tit"><img src="/img/common/smem_title2.png" alt="아이디/비밀번호 찾기" /></h2>
	</div>
	<form method="post" action="">
		<fieldset>
			<legend>아이디찾기</legend>
			<div class="mem_lost_box">
				<div class="lost_tab">
					<a href="lost_id.php">아이디 찾기</a>
					<a href="javascript:void(0);" class="active">비밀번호 찾기</a>
				</div>
				<div class="form_box">
					<div class="input_box">
						<p class="inpu_title1">아이디</p>
						<input type="text" class="" value="" name="sb_find_id" placeholder="" />
						<p class="inpu_title1">이메일</p>
						<input type="text" class="" value="" name="sb_find_email" placeholder="" />
					</div>
					<button type="button" class="lost_go">비밀번호 찾기</button>
				</div>
				<div class="mem_lost_success" style="display:none;">
					<div class="copy">
						입력하신 계정의 메일로 <b>비밀번호</b>를 발송하였습니다. <br />
						로그인하신 후 <b>정보 변경에서 비밀번호를</b> 변경해 주시길 바랍니다.
					</div>
					<a href="login.php" class="a_bt1">로그인하기</a>
				</div>
			</div>
		</fieldset>
	</form>
</div>

<script type="text/javascript">
//<![CDATA[

$(function (){
	$('.lost_go').on('click',function (){
		lostSearchAc1();
	}); // 비밀번호 찾기
});

// STR 비밀번호 찾기
function lostSearchAc1(){
	if($.trim($("input[name=sb_find_id").val()) == ""){
		alert("아이디를 입력해 주세요.");
		return false;
	}

	if($.trim($("input[name=sb_find_email").val()) == ""){
		alert("이메일을 입력해 주세요.");
		return false;
	}

	$.ajax({
		type : "POST",
		url : "/ajax/find_pw.php",
		data : {"sb_id" : $("input[name=sb_find_id").val(), "sb_email": $("input[name=sb_find_email").val()},
		success : function(data){
			if(data.postnumber == "90"){
				$('.form_box').css({'display':'none'});
				$('.mem_lost_success').css({'display':'block'});
				$('#find_search_id').text(data.postId);	
			}else if(data.postnumber == "99"){
				alert("아이디 및 이메일 주소를 확인해주세요.");
			}
		}, error : function(jqXHR, textStatus, errorThrown){
			console.log("error!\n"+textStatus+" : "+errorThrown);
		}
	});
}
// ENd 비밀번호 찾기

//]]>
</script>

<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/_tail.php');
?>