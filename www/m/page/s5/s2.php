<?php
include_once "../../_head.php";
include_once($_SERVER['DOCUMENT_ROOT']."/lib/function.php");

if($dash_row == ''){
	go_href("회원만 이용 가능합니다.", "/m/page/member/login.php", "go");
	exit;
}
?>

<div class="wrap_conts">
	<div class="hd_s_img">
		<h2><img src="/m/img/s5/s5s2_tit.png" alt=""></h2>
	</div>
	<div class="wrap_our_village">
		<div class="noodle_intro">
			<div class="info_name">
				<h3><?=$dash_row['sb_name']?>님</h3>
				<ul>
					<li>
						<span class="n_tit loca"><i>위치</i>우리동네</span>
						<span class="n_desc"><?=$dash_row['dongnae']?></span>
					</li>
					<li>
						<span class="n_tit our"><i>주민 수</i>동네주민</span>
						<span class="n_desc"><?=$dash_row['ourdongnae']?>명</span>
					</li>
				</ul>
			</div>
			<div class="info_noodle">
				<h4><img src="/m/img/s5/s5s2_sub_tit3.png" alt="우동맛 스티커"></h4>
				<p>
					우동 다섯그릇 모일때마다<br />
					스시노백쉐프 상품권을!?
				</p>
				<ul class="wrap_sticker">
					<?php 
					for($i=1;$i<=5;$i++){
						if($dash_row['sb_review_cnt'] >= $i){
							$active = "s_on";
						}else{
							$active = "";
						}
						echo '<li class="'.$active.'">'.$i.'</li>';
					}
					?>
					<!--<li class="s_on">스티커 있음</li>
					<li class="s_on">스티커 있음</li>
					<li class="s_on">스티커 있음</li>
					<li>스티커 없음</li>
					<li>스티커 없음</li>-->
				</ul>
				<a href="javascript:void(0);" class="bt_2s_c_border_red pops_btn">우동맛 스티커 안내</a>
				<div class="in_pops pops_open">
					<h4>우동맛 스티커 안내</h4>
					<div class="in_pop_conts">
						<div class="info_noodle pdt10">
							<h4 class="type2"><img src="/m/img/s5/s5s2_sub_tit6.png" alt="나의 우동맛 스티커"></h4>
							<ul class="wrap_sticker">
								<?php 
								for($i=1;$i<=5;$i++){
									if($dash_row['sb_review_cnt'] >= $i){
										$active = "s_on";
									}else{
										$active = "";
									}
									echo '<li class="'.$active.'">'.$i.'</li>';
								}
								?>
							</ul>
							<!-- 상품권 받기 비활성시 class="bt_2s_disabled"로 클래스 변경 -->
							<? if($dash_row['sb_review_cnt'] >= 5){ ?>
							<a href="javascript:get_coupon('<?=$sb_id?>');" class="bt_2s_c_red">상품권 받기</a>
							<? }else{ ?>
							<a href="javascript:void(0);" class="bt_2s_disabled">상품권 받기</a>
							<? } ?>
						</div>
						<div class="noddle_method">
							<h5><img src="/m/img/s5/s5s2_sub_tit7.png" alt="우동맛 스티커란?"></h5>
							<p>스시노백쉐프에 다녀오셨나요?<br />
							미스테리쇼퍼, 스시노 미식회, 체험단을 포함한 모든 방문의
							후기를 전송해주시면 우동맛 스티커를 증정해드립니다!</p>
							<h5><img src="/m/img/s5/s5s2_sub_tit8.png" alt="우동맛 스티커란 사용법"></h5>
							<p>우동맛 스티커를 5개 모으면 스시노백쉐프 3만원권을 드려요!
							스티커 5개 모은 후 상단의 상품권 받기를 클릭하면 신청 끝!</p>
							<div class="wrap_caution type2">
								<h3>신청 전에 알아두세요</h3>
								<ul>
									<li>신청한 상품권은 매주 금요일에 발송됩니다.</li>
									<li>전송하신 후기의 내용이 미흡할 시 우동맛 스티커 증정이 지연되거나,  불가할 수 있습니다.</li>
									<li>상품권을 받은 후에는 우동맛 스티커가 리셋됩니다.</li>
								</ul>
							</div>
						</div>
					</div>
					<button type="button" class="bt_pop_close">팝업 닫기</button>
				</div>
			</div>
		</div>
		<ul class="member_info">
			<li><a href="/m/page/member/register_form_modify.php">회원정보</a></li>
			<li><a href="/m/page/s5/s2s1.php">우리동네 소식</a></li>
			<li><a href="/m/page/s5/s2s2.php">나의 소식<span class="n_new"><?=$dash_row['post_review']?></span></a></li>
			<li><a href="/m/page/s5/s2s3.php">나의 후기<span class="n_num"><?=$dash_row['sb_review_tocnt']?>회</span></a></li>
		</ul>
	</div>
</div>
<script>
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