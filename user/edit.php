<?php $thisPage="Edit"; ?>
<?php $title = "Edit Profile - Data Mahasiswa" ?>
<?php $description = "Halaman Edit Profile" ?>
<?php 
include("header.php"); 
include("../koneksi.php"); 
?>
	<div class="container">
		<div class="content">
			<h2>Edit Profile</h2>
			<hr />
			
			<?php
			$username = $_SESSION['admin']; 
			$sql = mysqli_query($koneksi, "SELECT * FROM tbl_mahasiswa WHERE username='$username'"); 
			if(mysqli_num_rows($sql) == 0){
				header("Location: index.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			if(isset($_POST['save'])){ 
				$username		 = $_POST['username'];
				$level		     = $_POST['level'];
				$nim		     = $_POST['nim'];
				$nama		     = $_POST['nama'];
				$kelas           = $_POST['kelas'];
				$no_telepon		 = $_POST['no_telepon'];
				$email  		 = $_POST['email'];
				$dosen_pembimbing = $_POST['dosen_pembimbing'];
				$jurusan	     = $_POST['jurusan'];
								
				$update = mysqli_query($koneksi, "UPDATE tbl_mahasiswa SET nama='$nama', kelas='$kelas', no_telepon='$no_telepon', email='$email', dosen_pembimbing='$dosen_pembimbing', jurusan='$jurusan' WHERE username='$username'") or die(mysqli_error()); 
				if($update){ 
					header("Location: edit.php?username=".$username."&pesan=sukses"); 
				}else{ 
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data gagal disimpan, silahkan coba lagi.</div>'; 
				}
			}
			
			if(isset($_GET['pesan']) == 'sukses'){ 
				echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data berhasil disimpan. <- <a href="profile.php">Kembali ke Profile</a></div>';
			}
			?>
			<form class="form-horizontal" action="" method="post">
				<div class="form-group">
					<label class="col-sm-3 control-label">NIM</label>
					<div class="col-sm-2">
						<input type="text" name="nim" value="<?php echo $row ['nim']; ?>" class="form-control" placeholder="nim" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Nama</label>
					<div class="col-sm-4">
						<input type="text" name="nama" value="<?php echo $row ['nama']; ?>" class="form-control" placeholder="Nama" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Kelas</label>
					<div class="col-sm-2">
						<select name="kelas" class="form-control" required>
							<option value="<?php echo $row ['kelas']; ?>"><?php echo $row ['kelas']; ?></option>
							<option value="17.8A.33">Kelas Regular</option>
							<option value="17.8B.33">Kelas Karyawan</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">No Telepon</label>
					<div class="col-sm-3">
						<input type="text" name="no_telepon" value="<?php echo $row ['no_telepon']; ?>" class="form-control" placeholder="No Telepon" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Email</label>
					<div class="col-sm-3">
						<input type="email" name="email" value="<?php echo $row ['email']; ?>" class="form-control" placeholder="Email" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Dosen Pembimbing</label>
					<div class="col-sm-4">
						<input type="text" name="dosen_pembimbing" value="<?php echo $row ['dosen_pembimbing']; ?>" class="form-control" placeholder="Dosen Pembimbing" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Jurusan</label>
					<div class="col-sm-2">
						<select name="jurusan" class="form-control" required>
							<option value="<?php echo $row['Skripsi']; ?>"> - Jurusan - </option>
							<option value="Teknik">Teknik informatika Regular</option>
							<option value="Teknik">Teknik INformatika Karyawan</option>
						</select>
					</div>
				</div>	
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="save" class="btn btn-sm btn-primary" value="Simpan" data-toggle="tooltip" title="Simpan Data Mahasiswa">
						<a href="profile.php" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Batal">Batal</a>
					</div>
				</div>
			</form>
		</div>
	</div> 
<?php 
include("footer.php");
?>