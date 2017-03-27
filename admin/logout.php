<?php
	session_start();
	unset ($_SESSION ['id_admin']);
	header("Location: login.php");
?>