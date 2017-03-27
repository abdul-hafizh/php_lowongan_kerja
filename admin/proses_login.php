<?php
include_once("../crud/koneksi_db_loker.php");
function login(){
	session_start();   
	$koneksi = koneksi_db();
	$sql      = "SELECT * FROM admin WHERE email = '$_POST[email]' 
				AND password = '$_POST[password]'"or die(mysqli_error());
	if(isset($_POST['email']))
	{
		
		$query  = mysqli_query($koneksi,$sql);
		$row    = mysqli_fetch_assoc($query);
		if(!empty($row['email']) AND !empty($row['password']))
		{
			$_SESSION['email']    = $row['email'];
			$_SESSION['password'] = $row['password'];
			$_SESSION['id_admin'] = $row['id_admin'];
			header('location:index.php');
		} 
		else {
			header('location:login.php?pesan= Email atau Password salah');
		}
	}
}
if(isset($_POST['submit']))
{
	login();
}
?>