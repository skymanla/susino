<?php 
include_once($_SERVER['DOCUMENT_ROOT'].'/adm/_head.php');
?>

<section class="section1">
	<h3>엑셀 관리</h3>
	<ul class="tab_type1">
		<li class="active"><a href="s9.php">미스터리 쇼퍼</a></li>
		<li><a href="s9.php">스시노 미식회</a></li>
		<li><a href="s9.php">체험단</a></li>
		<li><a href="s9.php">자발적 참여자</a></li>
		<li><a href="s9.php">최초1회 참여자</a></li>
		<li><a href="s9s_tab6.php">5회 신청자</a></li>
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

	<ul class="tab_type1">
		<li class="active"><a href="javascript:void(0);">전체</a></li>
		<li><a href="javascript:void(0);">대기</a></li>
		<li><a href="javascript:void(0);">승인</a></li>
		<li><a href="javascript:void(0);">거절</a></li>
	</ul>

	<div class="table_wrap1">
		<table>
			<caption>회원 목록</caption>
			<colgroup>
				<col width="50">
				<col width="80">
				<col width="">
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
					<th><input type="checkbox" class="" value="" name="" placeholder="" /></th>
					<th>글번호</th>
					<th>상태</th>
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
					<td class="txt_c"><input type="checkbox" class="" value="" name="" placeholder="" /></td>
					<td class="txt_c">1</td>
					<td class="txt_c">승인</td>
					<td class="txt_c">2018-05-29</td>
					<td>정말 기분이 좋군요 맛이 기가 막히고 코가 막힌다 그렇죠?</td>
					<td class="txt_c">미등록 고객</td>
					<td class="txt_c">홍길동</td>
					<td class="txt_c">010-1234-1234</td>
					<td class="txt_c">winddesign@winddesign.co.kr</td>
					<td class="txt_c">-</td>
				</tr>
				<?php for($i=0;$i<2;$i++){?>
				<tr>
					<td class="txt_c"><input type="checkbox" class="" value="" name="" placeholder="" /></td>
					<td class="txt_c">1</td>
					<td class="txt_c">대기</td>
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

	<div class="bt_wrap1">
		<div class="left_box">
			<button type="button" class="bt_1">전체선택</button>
			<button type="button" class="bt_1">선택해제</button>
			<button type="button" class="bt_1">선택 엑셀 다운로드</button>
			<button type="button" class="bt_1">전체 엑셀 다운로드</button>
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