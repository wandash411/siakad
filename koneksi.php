<?php
$host = "localhost"; // server
$user = "root"; // username
$pass = "sokatiati"; // password
$database = "siakad-3"; 

$koneksi = mysqli_connect($host, $user, $pass, $database, $filter); 

if(mysqli_connect_errno()){ // mengecek apakah koneksi database error
	echo 'Gagal melakukan koneksi ke Database : '.mysqli_connect_error(); // pesan ketika koneksi database error
}
?>