<?php $thisPage="Profile"; ?>
<?php $title = "Profile - Data Mahasiswa" ?>
<?php $description = "Halaman Profile" ?>
<?php 
include("header.php"); 
include("../koneksi.php"); 
?>
	<div class="container">
		<div class="content">
			<h2>Profile</h2>
			<hr />
			
			<?php
			$username = $_SESSION['admin']; 
			
			$sql = mysqli_query($koneksi, "SELECT * FROM tbl_mahasiswa WHERE username='$username'"); 
			if(mysqli_num_rows($sql) == 0){
				header("Location: index.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			?>
			
			<table class="table table-striped table-condensed">
				<tr>
					<th>Username</th>
					<td><?php echo $row['username']; ?></td>
				</tr>
				<tr>
					<th width="20%">NIM</th>
					<td><?php echo $row['nim']; ?></td>
				</tr>
				<tr>
					<th>Nama mahasiswa</th>
					<td><?php echo $row['nama']; ?></td>
				</tr>
				<tr>
					<th>Kelas</th>
					<td><?php echo $row['kelas']; ?></td>
				</tr>
				<tr>
					<th>No Telepon</th>
					<td><?php echo $row['no_telepon']; ?></td>
				</tr>
				<tr>
					<th>Email</th>
					<td><?php echo $row['email']; ?></td>
				</tr>
				<tr>
					<th>Dosen Pembimbing</th>
					<td><?php echo $row['dosen_pembimbing']; ?></td>
				</tr>
				<tr>
					<th>Jurusan</th>
					<td><?php echo $row['jurusan']; ?></td>
				</tr>
			</table>
			
			<a href="index.php" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Dashboard</a>
		</div>
	</div>
<?php 
include("footer.php");
?>