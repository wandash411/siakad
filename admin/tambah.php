<?php $thisPage="Tambah"; ?>
<?php $title = "Tambah Data Mahasiswa - Data Mahasiswa v2.0" ?>
<?php $description = "Tambah Data Mahasiswa - Data Mahasiswa v2.0" ?>
<?php 
include("header.php"); 
include("../koneksi.php");
?>
	<div class="container">
		<div class="content">
			<h2>Data mahasiswa &raquo; Tambah Data</h2>
			<hr />
			
			<?php
			if(isset($_POST['add'])){
				$nim		     = $_POST['nim'];
				$nama		     = $_POST['nama'];
				$kelas           = $_POST['kelas'];
				$no_telepon		 = $_POST['no_telepon'];
				$email  		 = $_POST['email'];
				$dosen_pembimbing = $_POST['dosen_pembimbing'];
				$jurusan	     = $_POST['jurusan'];
				$username		 = $_POST['username'];
				$level			 = $_POST['level'];
				$pass1	         = $_POST['pass1'];
				$pass2           = $_POST['pass2'];
				$nilai			 = $_POST['nilai'];
			
				$cek = mysqli_query($koneksi, "SELECT * FROM tbl_mahasiswa WHERE nim='$nim'");
				if(mysqli_num_rows($cek) == 0){
					if($pass1 == $pass2){
						$pass = md5($pass1);
						$insert = mysqli_query($koneksi, "INSERT INTO tbl_mahasiswa(nim, nama, kelas, no_telepon, email, nilai, jurusan, username, level, password) VALUES('$nim','$nama', '$kelas', '$no_telepon', '$email', '$nilai', '$jurusan', '$username', '$level', '$pass')"
					)
					 or die(mysqli_error());
						if($insert)
						{
							echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data Mahasiswa Berhasil Di Simpan. <a href="data.php"><- Kembali</a></div>';
						}else{
							echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Data Mahasiswa Gagal Di simpan! <a href="data.php"><- Kembali</a></div>';
						}
					} else{
						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Password Tidak sama!</div>';
					}
				}else{
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>NIM Sudah Ada..! <a href="data.php"><- Kembali</a></div>';
				}
			}
			?>
			<form class="form-horizontal" action="" method="post">
				<div class="form-group">
					<label class="col-sm-3 control-label">NIM</label>
					<div class="col-sm-2">
						<input type="text" name="nim" class="form-control" placeholder="nim" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Nama</label>
					<div class="col-sm-4">
						<input type="text" name="nama" class="form-control" placeholder="Nama" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Kelas</label>
					<div class="col-sm-2">
						<select name="kelas" class="form-control" required>
							<option value=""> - Pilih - </option>
							<option value="Regular">17.8A.33</option>
							<option value="Karyawan">17.8B.33</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">No Telepon</label>
					<div class="col-sm-3">
						<input type="text" name="no_telepon" class="form-control" placeholder="No Telepon" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Email</label>
					<div class="col-sm-3">
						<input type="email" name="email" class="form-control" placeholder="Email" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Nilai</label>
					<div class="col-sm-2">
						<input type="text" name="nilai" class="form-control" placeholder="nilai" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Jurusan</label>
					<div class="col-sm-2">
						<select name="jurusan" class="form-control" required>
							<option value="<?php echo $row['Skripsi']; ?>"> - Pilih Jurusan- </option>
							<option value="Teknik Informatika">Teknik Informatika Regular</option>
							<option value="Teknik Informatika">Teknik Informatika Karyawan</option>
						</select>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label">Username</label>
					<div class="col-sm-2">
						<input type="text" name="username" class="form-control" placeholder="Username" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Level</label>
					<div class="col-sm-2">
						<select name="level" class="form-control" required>
							<option value=""> - Pilih - </option>
							<option value="admin">Admin</option>
							<option value="user">User</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Password</label>
					<div class="col-sm-2">
						<input type="password" name="pass1" class="form-control" placeholder="Password" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Ulangi Password</label>
					<div class="col-sm-2">
						<input type="password" name="pass2" class="form-control" placeholder="Ulangi Password" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="add" class="btn btn-sm btn-primary" value="Simpan" data-toggle="tooltip" title="Simpan Data mahasiswa">
						<a href="index.php" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Batal">Batal</a>
					</div>
				</div>
			</form> 
		</div> 
	</div> 
<?php 
include("footer.php"); 
?>