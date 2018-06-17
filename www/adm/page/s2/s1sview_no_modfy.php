<?php 
include_once($_SERVER['DOCUMENT_ROOT'].'/adm/_head.php');
$sb_idx = $conn->real_escape_string($_GET['idx']);
$sb_id = $conn->real_escape_string($_GET['id']);

$sql = "select *, (select sb_level_title from sb_member_level where sb_level_cate=sb_mem_level) as sb_l_title from sb_member where sb_idx='".$sb_idx."' and sb_id='".$sb_id."'";
$q = $conn->query($sql);
$v = $q->fetch_assoc();

?>

<section class="section1">
	<h3>회원정보</h3>
		<div class="table_wrap1">
			<table>
				<caption>회원정보</caption>
				<colgroup>
					<col width="100">
					<col width="">
				</colgroup>
				<thead>
					<tr>
						<th colspan="4" class="txt_l">회원정보</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<th>상태</th>
						<td><?=$v['sb_delete_flag']=='1' ? '탈퇴회원' : '스시노백 회원' ?></td>
					</tr>
					<tr>
						<th>레벨</th>
						<td><?=$v[sb_l_title]?></td>
					</tr>
					<tr>
						<th>이름</th>
						<td><?=$v[sb_name]?></td>
					</tr>
					<tr>
						<th>아이디</th>
						<td><?=$v[sb_id]?></td>
					</tr>
					<tr>
						<th>핸드폰</th>
						<td><?=$v[sb_phone]?></td>
					</tr>
					<tr>
						<th>성별</th>
						<td><?=$v[sb_sex]=='male' ? "남성" : "여성"?></td>
					</tr>
					<tr>
						<th>생년월일</th>
						<td><?=$v[sb_birth]?></td>
					</tr>
					<tr>
						<th>이메일</th>
						<td><?=$v[sb_email]?></td>
					</tr>
					<tr>
						<th>주소</th>
						<td><?=$v[sb_addr1].' '.$v[sb_addr2]?></td>
					</tr>
					<tr>
						<th>우리동네</th>
						<td><?=$v[sb_dongnae]?></td>
					</tr>
					<tr>
						<th>블로그</th>
						<td><?=$v[sb_blog_url]?></td>
					</tr>
				</tbody>
			</table>
		</div>

		<div class="bt_wrap2">
			<a href="s1.php" class="bt_2">목록으로</a>
		</div>
</section>

<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/adm/_tail.php');
?>