<?php 
include_once($_SERVER['DOCUMENT_ROOT'].'/adm/_head.php');
?>

<section class="section1">
	<h3>후기작성 관리</h3>
	<ul class="tab_type1">
		<li class="active"><a href="javascript:void(0);">미스터리 쇼퍼</a></li>
		<li><a href="javascript:void(0);">스시노 미식회</a></li>
		<li><a href="javascript:void(0);">체험단</a></li>
		<li><a href="javascript:void(0);">자발적 참여자</a></li>
	</ul>
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
							<option value="">발송일</option>
							<option value="">아이디</option>
							<option value="">이름</option>
							<option value="">핸드폰</option>
							<option value="">이메일</option>
							<option value="">레벨</option>
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
				<col width="80">
				<col width="">
				<col width="">
				<col width="">
				<col width="">
				<col width="">
				<col width="">
				<col width="">
			</colgroup>
			<thead>
				<tr>
					<th>글번호</th>
					<th>발송일</th>
					<th>제목</th>
					<th>아이디</th>
					<th>이름</th>
					<th>핸드폰</th>
					<th>이메일</th>
					<th>레벨</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td class="txt_c">1</td>
					<td class="txt_c">2018-05-29</td>
					<td>정말 기분이 좋군요 맛이 기가 막히고 코가 막힌다 그렇죠?</td>
					<td class="txt_c">미등록 고객</td>
					<td class="txt_c">홍길동</td>
					<td class="txt_c">010-1234-1234</td>
					<td class="txt_c">winddesign@winddesign.co.kr</td>
					<td class="txt_c">-</td>
				</tr>
				<?php for($i=0;$i<10;$i++){?>
				<tr>
					<td class="txt_c">1</td>
					<td class="txt_c">2018-05-29</td>
					<td>정말 기분이 좋군요 맛이 기가 막히고 코가 막힌다 그렇죠?</td>
					<td class="txt_c">winddesign</td>
					<td class="txt_c">홍길동</td>
					<td class="txt_c">010-1234-1234</td>
					<td class="txt_c">winddesign@winddesign.co.kr</td>
					<td class="txt_c">VIP</td>
				</tr>
				<?php }?>
			</tbody>
		</table>
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