<?php
$host = "localhost"; // server
$user = "root"; // username
$pass = ""; // password
$database = "datamahasiswa"; // nama database

$koneksi = mysqli_connect($host, $user, $pass, $database, $filter);

if(mysqli_connect_errno()){ 
	echo 'Gagal melakukan koneksi ke Database : '.mysqli_connect_error();
}
?>