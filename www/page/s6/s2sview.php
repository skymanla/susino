<?php 
include_once $_SERVER['DOCUMENT_ROOT']."/lib/dbconn.php";
include_once($_SERVER['DOCUMENT_ROOT'].'/_head.php');

$query = "SELECT * FROM sb_event where sbe_idx = '".$_GET['idx']."'";
$result = $conn->query($query);
$row = $result->fetch_assoc();

$fileurl = "/data/event";
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
		f.action = '../../lib/write_ok.php';
		f.submit();
	}
}
</script>
<form id="myform1" name="myform1" method="post">
<input type="hidden" name="flag" id="flag" value="event">
<input type="hidden" name="mode" id="mode" value="d">
<input type="hidden" name="idx" id="idx" value="<?php echo $row['sbe_idx']?>">
<div class="wrap_style1">
	<div class="heading_s1">
		<h2 class="tit"><img src="/img/common/s6_title2.png" alt="이달의 이벤트" /></h2>
		<!-- <p class="desc">스시노백쉐프와 어울리는 FUN FUN한 이벤트!<br />
		매달 진행되는 다양한 이벤트에 참여해보세요!</p> -->
	</div>
	<div class="con_wrapStyle1 w1">
		<ul class="evt_wrap view bg1">
			<li>
				<div class="txt_wrap">
					<h3 class="tit"><?php echo stripslashes($row['sbe_title']);?></h3>
					<p class="desc">이벤트 기간 : <?php echo $row['sbe_sdate'];?> ~ <?php echo $row['sbe_edate'];?></p>
					<?php
					$class = "";
					if(date('Y-m-d') >= $row['sbe_sdate'] && date('Y-m-d') < $row['sbe_edate'])
					{
						echo "<span class='mk_ing'>진행중</span>";
					}
					else if(date('Y-m-d') < $row['sbe_sdate'])
					{
						echo "<span class='mk_ing2'>진행예정</span>";
					}
					else
					{
						echo "<span class='mk_end'>종료</span>";
					}
					?>
				</div>
			</li>
			<li class="view_wrap">
				<!-- <div class="img_wrap_view">
					<img src="<?php echo $fileurl."/".$row['sbe_file']?>" alt="" />
				</div> -->
				<?php echo stripslashes($row['sbe_contents']);?>
			</li>
		</ul>
		<div class="bt_LR_wrap">
			<div class="f_right">
				<?php
				if($_SESSION['sba_id'])
				{
				?>
				<a href="javascript:;" onclick="del();"><button type="button" class="bt_s2_red">삭제</button></a>
				<a href="./s2swrite.php?mode=u&idx=<?php echo $row['sbe_idx']?>"><button type="button" class="bt_s2_gray">수정</button></a>
				<?php
				}
				?>
				<a href="./s2.php"><button type="button" class="bt_s2_gray">목록으로</button></a>
			</div>
			<?php
			$pquery = " select * from sb_notice where sbn_idx > '".$row['sbe_idx']."' order by sbn_idx limit 1";
			$presult = $conn->query($pquery);
			$prow = $presult->fetch_assoc();

			$nquery = " select * from sb_notice where sbn_idx < '".$row['sbe_idx']."' order by sbn_idx desc limit 1";
			$nresult = $conn->query($nquery);
			$nrow = $nresult->fetch_assoc();
			?>
			<div class="f_left">
				<?php
				if($prow['sbe_idx'])
				{
					$sbe_idx = $prow['sbe_idx'];
				?>
				<a href="./s2sview.php?idx=<?php echo $sbe_idx?>"><button type="button" class="bt_s3_bdrGray left">이전글</button></a>
				<?php
				}
				?>
				<?php
				if($nrow['sbe_idx'])
				{
					$sbe_idx = $nrow['sbe_idx'];
				?>
				<a href="./s2sview.php?idx=<?php echo $sbe_idx?>"><button type="button" class="bt_s3_bdrGray right">다음글</button></a>
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