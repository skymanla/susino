<?php 
include_once($_SERVER['DOCUMENT_ROOT'].'/adm/_head.php');
?>
<section class="section1">
	<h3>회원 E-mail 관리</h3>

	<div class="table_wrap1">
		<table>
			<caption>E-mail 작성</caption>
			<colgroup>
				<col width="150">
				<col width="">
			</colgroup>
			<thead>
				<tr>
					<th colspan="4" class="txt_l">E-mail 작성</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th>받는이 설정</th>
					<td>
						<div class="label_box1_wrap" id="mail_target_tab">
							<div class="label_box1"><input type="radio" name="mail_target" id="check_1" checked=""><label for="check_1">직접입력</label></div>
							<div class="label_box1"><input type="radio" name="mail_target" id="check_2"><label for="check_2">레벨설정</label></div>
							<div class="label_box1"><input type="radio" name="mail_target" id="check_3"><label for="check_3">우리동네</label></div>
						</div>
					</td>
				</tr>
				<tr class="mail_target_tr tr1">
					<th>받는이 ID</th>
					<td><input type="text" class="w_input1" value="" name="" placeholder="" style="width:300px" /> <span class="copy1">다중으로 보낼시  , 로 구분하세요 (예:   crashoxsusu, wind, gaga )</span></td>
				</tr>
				<tr class="mail_target_tr tr2" style="display:none">
					<th>받는이 레벨</th>
					<td>
						<select name="" title="" class="w_input1">
							<option value="" selected="selected">일반회원</option>
							<option value="">VIP</option>
							<option value="">점주</option>
						</select>
					</td>
				</tr>
				<tr class="mail_target_tr tr3" style="display:none">
					<th>받는이 우리동네</th>
					<td>
						<select name="" title="" class="w_input1">
							<option value="" selected="selected">지역선택</option>
							<option value="">지역1</option>
							<option value="">지역2</option>
							<option value="">지역3</option>
							<option value="">지역4</option>
							<option value="">지역5</option>
						</select>
					</td>
				</tr>
				<tr>
					<th>제목</th>
					<td><input type="text" class="w_input1" value="" name="" style="width:100%" /></td>
				</tr>
				<tr>
					<th>내용</th>
					<td>
						<textarea name="" id="" class="w_input1" style="height:200px">에디터삽입</textarea>
					</td>
				</tr>
			</tbody>
		</table>
	</div>

	<div class="bt_wrap2">
		<a href="s3.php" class="bt_2">취소</a>
		<a href="s3sview.php" class="bt_1">E-mail 발송</a>
	</div>

	<h3>회원목록</h3>
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
							<option value="">우리동네</option>
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
			<caption>회원목록</caption>
			<colgroup>
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
					<th>글번호</th>
					<th>우리동네</th>
					<th>아이디</th>
					<th>이름</th>
					<th>핸드폰</th>
					<th>이메일</th>
					<th>레벨</th>
					<th>가입일</th>
					<th>정보</th>
				</tr>
			</thead>
			<tbody>
				<?php for($i=1;$i<11;$i++){?>
				<tr>
					<td class="txt_c"><?php echo $i;?></td>
					<td class="txt_c">지역1</td>
					<td class="txt_c">admin</td>
					<td class="txt_c">홍길동</td>
					<td class="txt_c">010-0000-0000</td>
					<td class="txt_c">wind@winddesign.co.kr</td>
					<td class="txt_c">일반회원</td>
					<td class="txt_c">2018-00-00</td>
					<td class="txt_c"><a href="/adm/page/s2/s1sview_no_modfy.php" class="bt_s1" target="_blank" title="새창으로 열립니다.">자세히보기</a></td>
				</tr>
				<?php }?>
			</tbody>
		</table>
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

<script type="text/javascript">
//<![CDATA[

$(function (){
	marTarAc1(); //받는이 설정
});

// STR 받는이 설정
function marTarAc1(){
	$('#mail_target_tab input').on('click',function(){
		var $_This = $(this);
		var w_ch_num = $_This.attr('id').split('_')[1];
		$('.mail_target_tr').find('input, select').val('');
		$('.mail_target_tr').css({'display':'none'});
		$('.tr'+w_ch_num+'').css({'display':'table-row'});
	});

	$('#mail_target_tab input').each(function (){
		var $_This = $(this);
		var w_check = $_This.prop('checked');
		var w_ch_num = $_This.attr('id').split('_')[1];
		if(w_check){
			$('.mail_target_tr').css({'display':'none'});
			$('.tr'+w_ch_num+'').css({'display':'table-row'});
		}
	});
}
// ENd 받는이 설정

//]]>
</script>

<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/adm/_tail.php');
?>