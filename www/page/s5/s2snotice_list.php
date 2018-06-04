<?php include_once "../../_head.php";?>

<div class="wrap_style1">
	<div class="heading_s1">
		<h2 class="tit"><img src="/img/common/s5s2_notice_title1.png" alt="우리동네 알림"></h2>
	</div>

	<div class="con_wrapStyle1">
		<table class="board_style2">
			<caption>공지사항 영역</caption>
			<colgroup>
				<col width="106px">
				<col width="874px">
				<col width="160px">
				<col width="140px">
			</colgroup>
			<thead>
				<tr>
					<th scope="col">NO</th>
					<th scope="col">제목</th>
					<th scope="col">날짜</th>
					<th scope="col">조회수</th>
				</tr>
			</thead>
			<tbody>
				<?php for($i=0;$i<5;$i++){?>
				<tr>
					<td>1</td>
					<td class="left"><a href="s2snotice_view.php">테스트 공지사항</a></td>
					<td>2018-05-15</td>
					<td>13</td>
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