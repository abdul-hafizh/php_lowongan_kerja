<?php
if (!isset($_SESSION['id_pelamar']))
{
	die
	("<div align='center'>
	<script>
		alert('Silahkan Login terlebih dahulu...!')
	</script>

	<html>
	<head>
		<meta http-equiv='refresh' content='0;url=../login/login.php'>
	</head>
	</html>
	</div>");
}
?>
