<?php $thisPage="Cari"; ?>
<?php $title = "Cari Data Mahasiswa - Data Mahasiswa " ?>
<?php $description = "Cari Data Mahasiswa - Data Mahasiswa " ?>
<?php 
include("header.php"); 
include("../koneksi.php"); 
?>
	<div class="container">
		<div class="content">
			<?php $nim = $_POST['carinim']; 
			 ?> 
			<h2>Pencarian Data Mahasiswa &raquo; NIM: <?php echo $nim;
			 ?>
			 </h2>
			<hr />
			
			<?php
			$sql = mysqli_query($koneksi, "SELECT * FROM tbl_mahasiswa WHERE nim='$nim'"); 
			if(mysqli_num_rows($sql) == 0){
				header("Location: no_result.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			
			if(isset($_GET['aksi']) == 'delete'){ 
				$delete = mysqli_query($koneksi, "DELETE FROM tbl_mahasiswa WHERE nim='$nim'"); 
				if($delete){ 
					echo '<div class="alert alert-danger alert-dismissable">><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data berhasil dihapus.</div>'; 
				}else{ 
					echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data gagal dihapus.</div>';
				}
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
					<th>Fakultas</th>
					<td><?php echo $row['fakultas']; ?></td>
				</tr>
				<tr>
					<th>Username</th>
					<td><?php echo $row['username']; ?></td>
				</tr>
			</table>
			
			<a href="data.php" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Kembali</a>
			<a href="edit.php?nim=<?php echo $row['nim']; ?>" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit Data</a>
			<a href="data.php?aksi=delete&nim=<?php echo $row['nim']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin akan mengahapus data <?php echo $row['nama']; ?>')"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Hapus Data</a>
		</div>
	</div>
<?php 
include("footer.php");
?>