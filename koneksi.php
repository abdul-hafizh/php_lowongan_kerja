<?php
$host	="localhost";
$user 	="root";
$pass	="";
$dbname="lowongan_kerja";

$koneksi	= mysql_connect($host,$user,$pass);

if(!$koneksi)
die("gagal koneksi karena ".mysql_error());

$dbKon = mysql_select_db($dbname,$koneksi);

if(!$dbKon)
die("gagal buka database $dbname karena ".mysql_error());
?> 