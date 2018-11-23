<?php
	session_start();
	session_destroy();
	
	//Redirect to calling page
	$welcome_page=$_SERVER['HTTP_REFERER'];
	header("Location:$welcome_page", TRUE);
?>