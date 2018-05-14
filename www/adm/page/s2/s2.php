<?php 
include_once($_SERVER['DOCUMENT_ROOT'].'/adm/_head.php');
?>
<section class="section1">
	<h3>회원 SMS 관리</h3>

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
							<option value="" selected="selected">구분</option>
							<option value="">제목</option>
							<option value="">발송일시</option>
						</select>
						<input type="text" class="w_input1"value="" name="" style="width:180px">
						<button type="button" class="bt_s1 input_sel" id="cate_append_bt">검색</button>
					</td>
				</tr>
			</tbody>
		</table>
	</div>

	<div class="table_wrap1">
		<table>
			<caption>SMS 목록</caption>
			<colgroup>
				<col width="50">
				<col width="80">
				<col width="140">
				<col width="240">
				<col width="">
				<col width="230">
				<col width="140">
			</colgroup>
			<thead>
				<tr>
					<th><input type="checkbox" class="" value="" name="" placeholder="" /></th>
					<th>글번호</th>
					<th>구분</th>
					<th>받는이</th>
					<th>제목</th>
					<th>발송일시</th>
					<th>자세히보기</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td class="txt_c"><input type="checkbox" class="" value="" name="" placeholder="" /></td>
					<td class="txt_c">1</td>
					<td class="txt_c">직접발송</td>
					<td>우리동네 : 지역1</td>
					<td>테스트 테스트 테스트</td>
					<td class="txt_c">2018-00-00&nbsp;&nbsp;&nbsp;00 : 00 : 00</td>
					<td class="txt_c"><a href="s2sview.php" class="bt_s1">보기</a></td>
				</tr>
				<tr>
					<td class="txt_c"><input type="checkbox" class="" value="" name="" placeholder="" /></td>
					<td class="txt_c">1</td>
					<td class="txt_c">직접발송</td>
					<td>레벨 : VIP</td>
					<td>테스트 테스트 테스트</td>
					<td class="txt_c">2018-00-00&nbsp;&nbsp;&nbsp;00 : 00 : 00</td>
					<td class="txt_c"><a href="s2sview.php" class="bt_s1">보기</a></td>
				</tr>
				<tr>
					<td class="txt_c"><input type="checkbox" class="" value="" name="" placeholder="" /></td>
					<td class="txt_c">1</td>
					<td class="txt_c">미스테리 쇼퍼</td>
					<td>admin 외 2명</td>
					<td>테스트 테스트 테스트</td>
					<td class="txt_c">2018-00-00&nbsp;&nbsp;&nbsp;00 : 00 : 00</td>
					<td class="txt_c"><a href="s2sview.php" class="bt_s1">보기</a></td>
				</tr>
				<?php for($i=2;$i<11;$i++){?>
				<tr>
					<td class="txt_c"><input type="checkbox" class="" value="" name="" placeholder="" /></td>
					<td class="txt_c"><?php echo $i;?></td>
					<td class="txt_c">스시노미식회</td>
					<td>admin 외 2명</td>
					<td>테스트 테스트 테스트</td>
					<td class="txt_c">2018-00-00&nbsp;&nbsp;&nbsp;00 : 00 : 00</td>
					<td class="txt_c"><a href="s2sview.php" class="bt_s1">보기</a></td>
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
			<a href="s2swrite.php" class="bt_1">SMS 작성</a>
		</div>
	</div>

	<nav class="paging_type1">
		<a href="javascript:void(0);" class="arr all_prev"><i>처음</i></a>
		<a href="javascript:void(0);" class="arr prev"><i>이전</i></a>
		<a href="javascript:void(0);" class="active">1</a>
		<a href="javascript:void(0);">2</a>
		<a href="javascript:void(0);">3</a>
		<a href="javascript:void(0);">4</a>
		<a href="javascript:void(0);">5</a>
		<a href="javascript:void(0);">6</a>
		<a href="javascript:void(0);">7</a>
		<a href="javascript:void(0);">8</a>
		<a href="javascript:void(0);">9</a>
		<a href="javascript:void(0);">10</a>
		<a href="javascript:void(0);" class="arr next"><i>다음</i></a>
		<a href="javascript:void(0);" class="arr all_next"><i>마지막</i></a>
	</nav>

</section>

<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/adm/_tail.php');
?>