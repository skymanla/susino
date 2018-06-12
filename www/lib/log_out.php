<?php
	if($_SESSON['sb_id']=='admin'){
		session_start ();
		session_destroy ();
		echo "<script>location.href='/adm/login.php';</script>";	
	}else{
		session_start ();
		session_destroy ();
		echo "<script>location.href='/';</script>";	
	}
	
?>