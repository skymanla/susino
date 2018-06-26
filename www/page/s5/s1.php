<?php 
	include_once "../../_head.php";
	$sb_id = $_SESSION['sb_id'];
	$sb_addr = $_SESSION['sb_addr1']." ".$_SESSION['sb_addr2'];
	$rui = explode("/", $_SERVER['REQUEST_URI']);
	$rui[3] = substr($rui[3], 0, strrpos($rui[3], '.'));
	$_SESSION['re_uri'] = $_SERVER['REQUEST_URI'];
?>
<div class="s5s1_wrap">
	<div class="box1"></div>
	<div class="w_code">
		<img src="/img/s5/s5s1_tit1.png" alt="받은 쿠폰의 코드 등록 후 전물 받을 주소 체크" />
		<fieldset class="w_info">
			<legend>코드입력 란</legend>
			<ul>
				<li>
					<label for="inplbl_01"><img src="/img/s5/s5s1_txt1.png" alt="나의주소" /></label>
					<div>
						<input type="text" id="inplbl_01" name="" <?=$sb_id ? 'value="'.$sb_addr.'"' :  'placeholder="로그인이 필요합니다."' ?> readonly />
					</div>
				</li>
				<li>
					<label for="inplbl_02"><img src="/img/s5/s5s1_txt2.png" alt="코드입력" /></label>
					<div>
						<input type="text" id="inplbl_02" value="" name="" placeholder="코드-자리를 입력해주세요" />
					</div>
					<div>
						<a href="javascript:void(0);" class="bt_code1">코드인증하기</a>
					</div>
				</li>
			</ul>
		</fieldset>
		<div class="w_btn">
			<div>
				<a href="/page/member/register_form_modify.php" class="bt_code2">회원정보변경</a>
				<?php if(!$sb_id){?>
				<a href="javascript:mv_login('<?=$sb_id?>');" class="bt_code3">로그인하기</a>
				<?}?>
			</div>
		</div>
	</div>
	<div class="box2"></div>
</div>

<script>
	function mv_login(mb_id=''){
		if(mb_id==''){
			//location.href='/page/member/login.php?qtr=9&d1=<?=$rui[1]?>&d2=<?=$rui[2]?>&d3<?=$rui[3]?>';
			location.href='/page/member/login.php';
		}else if(mb_id=='admin'){
			alert('관리자는 불가능합니다.');
			return false;
		}else{
			alert('이미 로그인 하셨습니다.');
			return false;
		}
	}
</script>
<?php include_once "../../_tail.php";?>