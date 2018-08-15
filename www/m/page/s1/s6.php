<?php include_once "../../_head.php";?>


<div class="wrap_conts">
	<div class="hd_s_img">
		<h2><img src="/m/img/s1/s1s5_tit.png" alt="" /></h2>
	</div>
	<ul class="list_s1">
		<?php for($i=0;$i<9;$i++){?>
		<li>
			<button type="button">
				<span class="t_num">102</span>
				<strong>스시노백쉐프 홈페이지 리뉴얼 오픈안내페이지 리뉴얼 오픈안내페이지 내</strong>
				<span>2018-05-15</span>
			</button>
			<div class="q_answer">
				<div>
					안녕하세요. 공지사항이 이렇게 글로만 나온다면 이
					런 형식으로 가고싶은데 사진이 들어가거나 매우매
					우 길어지는 경우가 있을지...굼금하네요<br />
					<br />
					지금 공지가 두개밖에없어서... 
					그냥 게시판형식이나으려나아아ㅏ아아ㅏ아아<br />
					<br />
					감사합니다. 
				</div>
			</div>
		</li>
		<?php }?>
		<!-- STR 등록된 글이 없을 경우 -->
		<!-- 
		<li class="none_word">등록된 글이 없습니다.</li>
		 -->
		<!-- END 등록된 글이 없을 경우 -->
	</ul>
	<div class="paging">
		<!--버튼 비활성시  버튼 내부 a태그에 class="bt_off" 추가 -->
		<!-- ex) <a href="javascript:void(0);" class="bt_prev bt_off">이전목록</a> -->
		<a href="javascript:void(0);" class="bt_prev bt_off">이전목록</a>
		<span>1-10 / 102</span>
		<a href="javascript:void(0);" class="bt_next">다음목록</a>
	</div>
	
</div>


<?php include_once "../../_tail.php";?>