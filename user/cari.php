<?php $thisPage="Cari"; ?>
<?php $title = "Cari Data Mahasiswa - Data Mahasiswa" ?>
<?php $description = "Cari Data Mahasiswa - Data Mahasiswa" ?>
<?php 
include("header.php");
include("../koneksi.php");
?>
	<div class="container">
		<div class="content">
			<?php $nim = $_POST['carinim'];?> 
			<h2>Pencarian Data Mahasiswa &raquo; NIM: <?php echo $nim; ?></h2>
			<hr />
			
			<?php
			$sql = mysqli_query($koneksi, "SELECT * FROM tbl_mahasiswa WHERE nim='$nim'");
			if(mysqli_num_rows($sql) == 0){
				header("Location: no_result.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			?>
			<table class="table table-striped table-condensed">
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
				<tr>
					<th>Username</th>
					<td><?php echo $row['username']; ?></td>
				</tr>
			</table>
			
			<a href="data.php" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Kembali</a>
		</div>
	</div>
<?php 
include("footer.php");
?>