<?php
	session_start ();
	session_destroy ();
	echo "<script>location.href='/adm/login.php';</script>";
?>