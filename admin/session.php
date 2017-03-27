<?php
if (!isset($_SESSION['id_admin']))
{
	die
	("<div align='center'>
	<script>
		alert('Silahkan Login terlebih dahulu...!')
	</script>

	<html>
	<head>
		<meta http-equiv='refresh' content='0;url=login.php'>
	</head>
	</html>
	</div>");
}
?>
