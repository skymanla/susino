<?php 
include_once($_SERVER['DOCUMENT_ROOT'].'/adm/_head.php');
?>

<section class="section1">
	<h3>후기작성 관리</h3>
	<ul class="tab_type1">
		<li><a href="s8.php">미스터리 쇼퍼</a></li>
		<li><a href="s8.php">스시노 미식회</a></li>
		<li><a href="s8.php">체험단</a></li>
		<li><a href="s8.php">자발적 참여자</a></li>
		<li><a href="s8.php">최초1회 참여자</a></li>
		<li class="active"><a href="s8s_tab6.php">5회 신청자</a></li>
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
							<option value="">신청일</option>
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
				<col width="50">
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
					<th><input type="checkbox" class="" value="" name="" placeholder="" /></th>
					<th>글번호</th>
					<th>문자발송</th>
					<th>신청일</th>
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
					<td class="txt_c">발송</td>
					<td class="txt_c">2018-05-29</td>
					<td class="txt_c">winddesign</td>
					<td class="txt_c">홍길동</td>
					<td class="txt_c">010-1234-1234</td>
					<td class="txt_c">winddesign@winddesign.co.kr</td>
					<td class="txt_c">VIP</td>
				</tr>
				<?php for($i=0;$i<2;$i++){?>
				<tr>
					<td class="txt_c"><input type="checkbox" class="" value="" name="" placeholder="" /></td>
					<td class="txt_c">1</td>
					<td class="txt_c">대기</td>
					<td class="txt_c">2018-05-29</td>
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
		</div>
		<div class="right_box">
			<button type="button" class="bt_1" onclick="location.href='s8ssmswrite6.php'">선택 sms보내기</button>
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