<?php include_once "../../_head.php";?>

<div class="wrap_conts wid_full">
	<div class="hd_s_img">
		<h2><img src="/m/img/s6/s6s1_tit.png" alt="이달의 이벤트" /></h2>
	</div>
	<div class="wrap_register_form">
		<div class="bg_box">
			<!-- STR <form method="" action=""> -->
			<div class="in_form">
				<h5><label for="form_lbl_30">제목</label></h5>
				<input type="text" id="form_lbl_30" value="" name="" />
				<h5><label for="form_lbl_31">이벤트 진행일</label></h5>
				<ul class="f_table">
					<li><input type="date" id="form_lbl_31" value="" name="" placeholder="연도-월-일" /></li>
					<li class="m_at"><span>~</span></li>
					<li><input type="date" value="" name="" placeholder="연도-월-일" /></li>
				</ul>
				<h5><label for="form_lbl_32">작성일</label></h5>
				<input type="text" id="form_lbl_32" value="" name="" />
				<h5><label for="form_lbl_33">내용</label></h5>
				<textarea name="" id="form_lbl_33" cols="30" rows="10"></textarea>
				<h5><label for="form_lbl_34">파일첨부</label></h5>
				<input type="file" id="form_lbl_34" value="" name="" />
			</div>
			<!-- END </form> -->
		</div>
	</div>
</div>

<?php include_once "../../_tail.php";?>