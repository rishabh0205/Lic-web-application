<?php
	session_start();
	session_destroy();

	unset($_SESSION['name']);
	unset($_SESSION['email']);

	header('location:login.php');
?>