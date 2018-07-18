<?php 
include_once($_SERVER['DOCUMENT_ROOT'].'/adm/_head.php');

$uri = $_SERVER['REQUEST_SCHEME']."://".$_SERVER['HTTP_HOST'];
$query = "SELECT * FROM sb_event where sbe_idx = '".$_GET['idx']."'";
$result = $conn->query($query);
$row = $result->fetch_assoc();
if(empty($row)){
	$url = "/adm/page/s3/s5.php";
	echoAlert("잘못된 접근입니다.");
	echoMovePage($url);	
}
$qtr = "page=".$_GET['page'];
?>


<script>
function del()
{
	var f = document.forms.myform1;

	var conf = confirm("정말삭제하시겠습니까?");
	if (conf) 
	{
		f.method = "post";
		f.flag.value = $('#flag').val();
		f.mode.value = $('#mode').val();
		f.idx.value = $('#idx').val();
		f.action = '/lib/write_ok.php';
		f.submit();
	}
}
</script>
<form id="myform1" name="myform1" method="post">
<input type="hidden" name="flag" id="flag" value="event">
<input type="hidden" name="mode" id="mode" value="d">
<input type="hidden" name="idx" id="idx" value="<?php echo $row['sbe_idx']?>">

<section class="section1">
	<h3>이벤트</h3>

	<div class="table_wrap1">
		<table>
			<caption>이벤트 상세페이지</caption>
			<colgroup>
				<col width="150">
				<col width="">
			</colgroup>
			<thead>
				<tr>
					<th colspan="4" class="txt_l">이벤트 상세페이지</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th>기간</th>
					<td><?=$row['sbe_sdate'].' ~ '.$row['sbe_edate']?></td>
				</tr>
				<tr>
					<th>작성일</th>
					<td><?=$row['sbe_idate'] ? $row['sbe_idate'] : date('Y-m-d', strtotime($row['sbe_rdate'])) ?></td>
				</tr>
				<tr>
					<th>제목</th>
					<td><?=$row['sbe_title']?></td>
				</tr>
				<tr>
					<th>내용</th>
					<td>
						<?=stripslashes($row['sbe_contents'])?>
					</td>
				</tr>
				<? if(!empty($row['sbe_file'])){ ?>
				<tr>
					<th>섬네일</th>
					<td><img src="<?=$uri?>/data/event/<?=$row[sbe_file]?>" alt="<?=$row[sbe_title]?>의 섬네일" />
				</tr>
				<? } ?>
			</tbody>
		</table>
	</div>
	<div class="bt_wrap2">
		<a href="javascript:del();" class="bt_2">삭제</a>
		<a href="s5swrite.php?mode=u&idx=<?=$row[sbe_idx]?>" class="bt_2">수정</a>
		<a href="./s5.php?<?=$qtr?>" class="bt_1">목록</a>
	</div>
</section>

</form>
<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/adm/_tail.php');
?>