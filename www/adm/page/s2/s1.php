<?php 
include_once($_SERVER['DOCUMENT_ROOT'].'/adm/_head.php');
?>
<section class="section1">
	<h3>회원목록</h3>
	<ul class="tab_type1">
		<li class="active"><a href="javascript:void(0);">전체목록</a></li>
		<li><a href="javascript:void(0);">스시노백 회원</a></li>
		<li><a href="javascript:void(0);">탈퇴회원</a></li>
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
							<option value="" selected="selected">아이디</option>
							<option value="">이름</option>
							<option value="">핸드폰</option>
							<option value="">이메일</option>
							<option value="">레벨</option>
							<option value="">가입일</option>
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
			<caption>회원 목록</caption>
			<colgroup>
				<col width="50">
				<col width="80">
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
					<th>아이디</th>
					<th>이름</th>
					<th>핸드폰</th>
					<th>이메일</th>
					<th>레벨</th>
					<th>가입일</th>
					<th>상태</th>
					<th>정보</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td class="txt_c"><input type="checkbox" class="" value="" name="" placeholder="" /></td>
					<td class="txt_c">1</td>
					<td class="txt_c">admin</td>
					<td class="txt_c">홍길동</td>
					<td class="txt_c">010-0000-0000</td>
					<td class="txt_c">wind@winddesign.co.kr</td>
					<td class="txt_c">
						<select name="" title="" class="w_input1">
							<option value="" selected="selected">일반회원</option>
							<option value="">VIP</option>
							<option value="">점주</option>
						</select>
					</td>
					<td class="txt_c">2018-00-00</td>
					<td class="txt_c">스시노백 회원</td>
					<td class="txt_c"><a href="s1sview.php" class="bt_s1">정보수정</a></td>
				</tr>
				<?php for($i=2;$i<11;$i++){?>
				<tr>
					<td class="txt_c"><input type="checkbox" class="" value="" name="" placeholder="" /></td>
					<td class="txt_c"><?php echo $i;?></td>
					<td class="txt_c">admin</td>
					<td class="txt_c">홍길동</td>
					<td class="txt_c">010-0000-0000</td>
					<td class="txt_c">wind@winddesign.co.kr</td>
					<td class="txt_c">
						<select name="" title="" class="w_input1">
							<option value="" selected="selected">일반회원</option>
							<option value="">VIP</option>
							<option value="">점주</option>
						</select>
					</td>
					<td class="txt_c">2018-00-00</td>
					<td class="txt_c">탈퇴회원</td>
					<td class="txt_c"><a href="s1sview.php" class="bt_s1">정보수정</a></td>
				</tr>
				<?php }?>
			</tbody>
		</table>
	</div>

	<div class="bt_wrap1">
		<div class="left_box">
			<button type="button" class="bt_1">전체선택</button>
			<button type="button" class="bt_1">선택해제</button>
			<button type="button" class="bt_1">선택수정</button>
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