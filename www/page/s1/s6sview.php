<?php 
include_once $_SERVER['DOCUMENT_ROOT']."/lib/dbconn.php";
include_once($_SERVER['DOCUMENT_ROOT'].'/_head.php');

$qry = "update sb_notice set sbn_count = sbn_count + 1 where sbn_idx = '".$_GET['idx']."'";
$conn->query($qry);

$query = "SELECT * FROM sb_notice where sbn_idx = '".$_GET['idx']."'";
$result = $conn->query($query);
$row = $result->fetch_assoc();

$fileurl = "/data/notice";
?>
<script>
function del()
{
	var f = document.forms.myform2;

	var conf = confirm("정말삭제하시겠습니까?");
	if (conf) 
	{
		f.method = "post";
		f.flag.value = $('#flag').val();
		f.mode.value = $('#mode').val();
		f.idx.value = $('#idx').val();
		f.action = '../../lib/write_ok.php';
		f.submit();
	}
}
</script>
<form id="myform2" name="myform2" method="post">
<input type="hidden" name="flag" id="flag" value="notice">
<input type="hidden" name="mode" id="mode" value="d">
<input type="hidden" name="idx" id="idx" value="<?php echo $row['sbn_idx']?>">
<div class="wrap_style1">
	<div class="heading_s1">
		<h2 class="tit"><img src="/img/common/scenter_title2.png" alt="공지사항" /></h2>
		<!-- <p class="desc">스시노벡쉐프의 소식입니다.</p> -->
	</div>
	<div class="con_wrapStyle1">
		<ul class="evt_wrap view bg1">
			<li>
				<div class="txt_wrap">
					<h3 class="tit"><?php echo stripslashes($row['sbn_title']);?></h3>
					<p class="desc"><?php echo substr($row['sbn_rdate'],0,10);?></p>
				</div>
			</li>
			<li class="view_wrap">
				<!-- <div class="img_wrap_view">
					<img src="<?php echo $fileurl."/".$row['sbn_file']?>" alt="" />
				</div> -->
				<p class="desc_view">
					<?php echo stripslashes($row['sbn_contents']);?>
				</p>
			</li>
		</ul>
		<div class="bt_LR_wrap">
			<div class="f_right">
				<?php
				if($_SESSION['sba_id'])
				{
				?>
				<a href="javascript:;" onclick="del();"><button type="button" class="bt_s2_red">삭제</button></a>
				<a href="./s6swrite.php?mode=u&idx=<?php echo $row['sbn_idx']?>"><button type="button" class="bt_s2_gray">수정</button></a>
				<?php
				}
				?>
				<a href="./s6.php"><button type="button" class="bt_s2_gray">목록으로</button></a>
			</div>
			<?php
			$pquery = " select * from sb_notice where sbn_idx > '".$row['sbn_idx']."' order by sbn_idx limit 1";
			$presult = $conn->query($pquery);
			$prow = $presult->fetch_assoc();

			$nquery = " select * from sb_notice where sbn_idx < '".$row['sbn_idx']."' order by sbn_idx desc limit 1";
			$nresult = $conn->query($nquery);
			$nrow = $nresult->fetch_assoc();
			?>
			<div class="f_left">
				<?php
				if($prow['sbn_idx'])
				{
					$sbn_idx = $prow['sbn_idx'];
				?>
				<a href="./s6sview.php?idx=<?php echo $sbn_idx?>"><button type="button" class="bt_s3_bdrGray left">이전글</button></a>
				<?php
				}
				?>
				<?php
				if($nrow['sbn_idx'])
				{
					$sbn_idx = $nrow['sbn_idx'];
				?>
				<a href="./s6sview.php?idx=<?php echo $sbn_idx?>"><button type="button" class="bt_s3_bdrGray right">다음글</button></a>
				<?php
				}
				?>
			</div>
		</div>
	</div>
</div>
</form>

<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/_tail.php');
?>