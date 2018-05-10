<?php
	session_start();
	if($_SESSION['sba_id'] == "" || $_SESSION['sba_id'] == null)
	{
		echo "<script>location.href='/adm/login.php';</script>";
		exit;
	}
?>