<?php
	session_start();
	if( !isset($_SESSION["user_loggedin"]) || $_SESSION["user_loggedin"] !== true ){
		header("Location: login.php");
		exit;
	}
?>