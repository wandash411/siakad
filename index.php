<?php $thisPage="Home"; ?>
<?php $title = "Data Mahasiswa" ?>
<?php $description = "Data Mahasiswa" ?>
<?php require('akses.php'); ?> 
<?php 
include("header.php"); 
include("koneksi.php"); 
?>
	
	<div class="container">
		<div class="content">
			<div class="jumbotron">
				<h2>FORM DATA MAHASISWA</h2>
				<p>TEKNIK INFORMATIKA SEMESTER AKHIR</p>
				<a href="login.php" data-toggle="tooltip" title="Login!" class="btn btn-info" role="button"><span class="glyphicon glyphicon-list"></span> Login!</a>
			</div> 
		</div> 
	</div>
	
<?php 
include("footer.php"); 
?>