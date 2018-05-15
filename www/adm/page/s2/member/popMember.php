<?
session_start();
include_once $_SERVER['DOCUMENT_ROOT']."/lib/dbconn.php";
$sb_idx = $conn->real_escape_string($_GET['idx']);
$sql = "select * from sb_member where sb_idx='".$sb_idx."'";
$q = $conn->query($sql);
$v = $q->fetch_assoc();

if($v['sb_sex']=="male"){
	$sex_chk = "남";
}else if($v['sb_sex']=="female"){
	$sex_chk = "여";
}

$sb_birth = explode("-", $v['sb_birth']);
$sb_email = explode("@", $v['sb_email']);

$sql = "select sb_level_title from sb_member_level where sb_level_cate='".$v['sb_mem_level']."'";
$level_query = $conn->query($sql);
$lvl = $level_query->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>스시노백쉐프 관리자</title>
	<link rel="stylesheet" type="text/css" href="/adm/css/reset.css" />
	<link rel="stylesheet" type="text/css" href="/adm/css/layout.css" />
	<link rel="stylesheet" type="text/css" href="/adm/css/jquery-ui.min.css" />
	<script type="text/javascript" src="/adm/js/jquery-1.12.4.min.js"></script>
</head>
<body>
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
						<td><?=$lvl['sb_level_title']?></td>
					</tr>
					<tr>
						<th>이름</th>
						<td><?=$v['sb_name']?></td>
					</tr>
					<tr>
						<th>아이디</th>
						<td><?=$v['sb_id']?></td>
					</tr>
					<tr>
						<th>핸드폰</th>
						<td><?=$v['sb_phone']?></td>
					</tr>
					<tr>
						<th>성별</th>
						<td><?=$sex_chk?></td>
					</tr>
					<tr>
						<th>생년월일</th>
						<td><?=$v['sb_birth']?></td>
					</tr>
					<tr>
						<th>이메일</th>
						<td><?=$v['sb_email']?></td>
					</tr>
					<tr>
						<th>주소</th>
						<td><?=$v['sb_addr1']." ".$v['sb_addr2']." "?></td>
					</tr>
					<tr>
						<th>우리동네</th>
						<td><?=$v['sb_dongnae']?></td>
					</tr>
					<tr>
						<th>블로그</th>
						<td><?=$v['sb_blog_url']?></td>
					</tr>
				</tbody>
			</table>
		</div>
</section>
</body>
</html>