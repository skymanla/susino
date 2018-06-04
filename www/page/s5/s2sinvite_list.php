<?php include_once "../../_head.php";?>

<div class="wrap_style1">
	<div class="heading_s1">
		<h2 class="tit"><img src="/img/common/s5s2_invite_title1.png" alt="함께갈래요 당첨확인"></h2>
	</div>

	<div class="con_wrapStyle1">
		<table class="board_style2">
			<caption>함께갈래요 당첨확인 영역</caption>
			<colgroup>
				<col width="106px">
				<col width="">
				<col width="">
				<col width="110px">
			</colgroup>
			<thead>
				<tr>
					<th scope="col">NO</th>
					<th scope="col">당첨월</th>
					<th scope="col">당첨일</th>
					<th scope="col">자세히보기</th>
				</tr>
			</thead>
			<tbody>
				<?php for($i=0;$i<5;$i++){?>
				<tr>
					<td>1</td>
					<td>2018-05</td>
					<td>2018-05-15</td>
					<td><a href="s2sinvite_view.php" class="go_more1">자세히보기</a></td>
				</tr>
				<?php }?>
			</tbody>
		</table>
	</div>
	<div class="paging">
		<a href="javascript:void(0);" class="bt_prev">전 페이지 버튼</a>
		<ul class="paing">
			<li><a href="javascript:void(0);">1</a></li>
			<li><a href="javascript:void(0);">2</a></li>
			<li class="active"><a href="javascript:void(0);"><strong>3</strong></a></li>
			<li><a href="javascript:void(0);">4</a></li>
			<li><a href="javascript:void(0);">5</a></li>
		</ul>
		<a href="javascript:void(0);" class="bt_next">다음 페이지 버튼</a>
	</div>
	<div class="bt_wrap_c">
		<a href="s2.php" class="bt_s2_gray">우동맛 돌아가기</a>
	</div>
</div>

<?php include_once "../../_tail.php";?>