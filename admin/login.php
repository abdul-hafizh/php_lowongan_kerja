<!DOCTYPE html>
<html>
<head>
	<title>Job Seeker</title>
	<link rel="stylesheet" href="../stylecss/stylebutton.css" type="text/css">
	<link rel="stylesheet" href="../stylecss/styleheader.css" type="text/css">
	<link rel="stylesheet" href="../stylecss/styleinput.css" type="text/css">
</head>
<body>
<div id="header">
		<div>
			<div id="logo">
				<a href="login.php"><img src="../images/logo.png" alt="LOGO"></a>
			</div>
			<ul id="navigation">
				<li class="selected">
					<a href="login.php">Login</a>
				</li>
			</ul>
		</div>
	</div>	

	<h2>Login Admin</h2> 
	
<form method="post" action="proses_login.php">
	<table>
	<tr>
		<td style='padding-left:20px;'>Email </td>
		<td><input type="email" name="email" size="30" placeholder='example@yahoo.com' required /> </td>
	</tr>
	<tr>
		<td style='padding-left:20px;'>Password </td>
		<td><input type="password" name="password" size="30" placeholder='********' required /></td>
	</tr>	
	</table> <br/>
	<input type="reset" value="Cancel" />
	<input type="submit" value="Login" name='submit' />
</form>
</body>
</html>
