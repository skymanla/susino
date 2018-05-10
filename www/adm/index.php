<?php
session_start ();

if($_SESSION['sba_id'] == "")
{
	echo "<script>location.replace('/adm/login.php');</script>";
}
else
{
	echo "<script>location.replace('/adm/page/s1/s1.php');</script>";
}
?>
