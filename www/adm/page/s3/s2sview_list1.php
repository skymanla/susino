<?php 
include_once($_SERVER['DOCUMENT_ROOT'].'/adm/_head.php');
?>

<section class="section1">

	<h3>미스테리 쇼퍼 신청자</h3>
	<ul class="tab_type1">
		<li><a href="s2sview.php">신청자 목록</a></li>
		<li class="active"><a href="s2sview_list1.php">당첨자</a></li>
		<li><a href="s2sview_list2.php">당첨자 직접 등록</a></li>
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
			<caption>회원목록</caption>
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
				<col width="140">
			</colgroup>
			<thead>
				<tr>
					<th><input type="checkbox" class="" value="" name="" id="all_check" onclick="javascript:all_check();" placeholder="" /></th>
					<th>글번호</th>
					<th>상태</th>
					<th>아이디</th>
					<th>이름</th>
					<th>핸드폰</th>
					<th>이메일</th>
					<th>레벨</th>
					<th>후기작성</th>
					<th>정보</th>
				</tr>
			</thead>
			<tbody>
				<?php for($i=1;$i<11;$i++){?>
				<tr>
					<td class="txt_c"><input type="checkbox" class="" value="" name="rp_check_class" placeholder="" /></td>
					<td class="txt_c"><?php echo $i;?></td>
					<td class="txt_c">신청자</td>
					<td class="txt_c">admin</td>
					<td class="txt_c">홍길동</td>
					<td class="txt_c">010-0000-0000</td>
					<td class="txt_c">wind@winddesign.co.kr</td>
					<td class="txt_c">일반회원</td>
					<td class="txt_c">작성완료</td>
					<td class="txt_c"><a href="/adm/page/s2/s1sview_no_modfy.php" class="bt_s1" target="_blank" title="새창으로 열립니다.">자세히보기</a></td>
				</tr>
				<?php }?>
			</tbody>
		</table>
	</div>

	<div class="bt_wrap1">
		<div class="left_box">
			<button type="button" class="bt_1">전체선택</button>
			<button type="button" class="bt_1">선택해제</button>
			<button type="button" class="bt_1">선택 당첨자 취소</button>
		</div>
		<div class="right_box">
			<a href="s2ssmswrite.php" class="bt_1">당첨자 sms 발송</a>
			<a href="s2semailwrite.php" class="bt_1">당첨자 E-mail 발송</a>
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

	<div class="table_wrap1">
		<table>
			<caption>미스테리 쇼퍼 내용</caption>
			<colgroup>
				<col width="100">
				<col width="">
			</colgroup>
			<thead>
				<tr>
					<th colspan="4" class="txt_l">미스테리 쇼퍼 내용</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th>상태</th>
					<td>진행중</td>
				</tr>
				<tr>
					<th>우리동네</th>
					<td>서울시 강남구</td>
				</tr>
				<tr>
					<th>기간</th>
					<td>2018-07-01 ~ 2018-08-30</td>
				</tr>
				<tr>
					<th>작성일</th>
					<td>2018-07-01</td>
				</tr>
				<tr>
					<th>제목</th>
					<td>유니크매장 미스테리 쇼퍼를 모집합니다!</td>
				</tr>
				<tr>
					<th>내용</th>
					<td>
						유니크매장 미스테리 쇼퍼를 모집합니다! <br />
						유니크매장 미스테리 쇼퍼를 모집합니다! <br />
						유니크매장 미스테리 쇼퍼를 모집합니다! <br />
						유니크매장 미스테리 쇼퍼를 모집합니다! <br />
						유니크매장 미스테리 쇼퍼를 모집합니다! <br />
						유니크매장 미스테리 쇼퍼를 모집합니다! <br />
						유니크매장 미스테리 쇼퍼를 모집합니다! <br />
						유니크매장 미스테리 쇼퍼를 모집합니다!
					</td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="bt_wrap2">
		<a href="s2swrite.php" class="bt_1">수정하기</a>
		<a href="s2.php" class="bt_2">목록으로</a>
	</div>

</section>

<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/adm/_tail.php');
?>