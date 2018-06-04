<?php 
include_once($_SERVER['DOCUMENT_ROOT'].'/adm/_head.php');
?>

<section class="section1">
	<h3>이벤트</h3>

	<div class="table_wrap1 no_line">
		<table>
			<caption>검색필터</caption>
			<colgroup>
				<col width="100">
				<col width="">
			</colgroup>
			<tbody>
				<tr>
					<th>검색필터</th>
					<td>
						<select name="" title="" class="w_input1">
							<option value="">제목</option>
							<option value="">기간</option>
							<option value="">작성일</option>
						</select>
						<input type="text" class="w_input1" value="" name="" style="width:180px">
						<button type="button" class="bt_s1 input_sel">검색</button>
					</td>
				</tr>
			</tbody>
		</table>
	</div>

	<div class="table_wrap1">
		<table>
			<caption>회원 목록</caption>
			<colgroup>
				<col width="50">
				<col width="80">
				<col width="300">
				<col width="">
				<col width="">
				<col width="">
				<col width="140">
			</colgroup>
			<thead>
				<tr>
					<th><input type="checkbox" class="" value="" name="" id="all_check" onclick="javascript:all_check();" placeholder="" /></th>
					<th>글번호</th>
					<th>섬네일</th>
					<th>제목</th>
					<th>기간</th>
					<th>작성일</th>
					<th>정보</th>
				</tr>
			</thead>
			<tbody>
				<?php for($i=0;$i<5;$i++){?>
				<tr>
					<td class="txt_c"><input type="checkbox" class="" value="" name="rp_check_class" placeholder="" /></td>
					<td class="txt_c">1</td>
					<td class="txt_c">
						<div class="img_wrap">
							<img src="http://winddesign32.cafe24.com/data/event/event180228113919.jpg" alt="" />
						</div>
					</td>
					<td class="txt_c">(스시노 미식회) 화이트데이 신메뉴 평가단 모집</td>
					<td class="txt_c">2018-07-01 ~ 2018-08-30</td>
					<td class="txt_c">2018-07-01</td>
					<td class="txt_c"><a href="s5sview.php" class="bt_s1">자세히보기</a></td>
				</tr>
				<?php }?>
			</tbody>
		</table>
	</div>

	<div class="bt_wrap1">
		<div class="left_box">
			<button type="button" class="bt_1">전체선택</button>
			<button type="button" class="bt_1">선택해제</button>
			<button type="button" class="bt_1">선택삭제</button>
		</div>
		<div class="right_box">
			<a href="s5swrite.php" class="bt_1">이벤트 등록</a>
		</div>
	</div>

	<nav class="paging_type1">
		<a href="javascript:void(0);" class="arr all_prev"><i>처음</i></a>
		<a href="javascript:void(0);" class="arr prev"><i>이전</i></a>
		<a href="?cur_page=1" class="active">1</a>
		<a href="?cur_page=2">2</a>		
		<a href="?cur_page=2" class="arr next"><i>다음</i></a>
		<a href="javascript:void(0);" class="arr all_next"><i>마지막</i></a>
	</nav>

</section>

<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/adm/_tail.php');
?>