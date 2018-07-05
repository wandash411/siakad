<?php $thisPage="Edit Mahasiswa"; ?>
<?php $title = "Edit Data Mahasiswa - Data Mahasiswa v2.0" ?>
<?php $description = "Edit Data Mahasiswa - Data Mahasiswa v2.0" ?>
<?php 
include("header.php"); // memanggil file header.php
include("../koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
?>
	<div class="container">
		<div class="content">
			<h2>Data Mahasiswa &raquo; Edit Data</h2>
			<hr />
			
			<?php
			$nim = $_GET['nim']; // assigment nim dengan nilai nim yang akan diedit
			$sql = mysqli_query($koneksi, "SELECT * FROM tbl_mahasiswa WHERE nim='$nim'"); // query untuk memilih entri data dengan nilai nim terpilih
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
				$nilai 			 = $_POST['nilai'];
				$jurusan	     = $_POST['jurusan'];
				
				$update = mysqli_query($koneksi, "UPDATE tbl_mahasiswa SET username='$username', level='$level', nama='$nama', kelas='$kelas', no_telepon='$no_telepon', email='$email', nilai='$nilai', jurusan='$jurusan' WHERE nim='$nim'") or die(mysqli_error()); 
				if($update){
					header("Location: edit_mahasiswa.php?nim=".$nim."&pesan=sukses");
				}else{
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data gagal disimpan, silahkan coba lagi.</div>'; 
				}
			}
			
			if(isset($_GET['pesan']) == 'sukses'){
				echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data berhasil disimpan. <a href="data.php"><- Kembali</a></div>';
			}
			?>
			
			<form class="form-horizontal" action="" method="post">
				<div class="form-group">
					<label class="col-sm-3 control-label">Username</label>
					<div class="col-sm-2">
						<input type="text" name="username" value="<?php echo $row ['username']; ?>" class="form-control" placeholder="username" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Level</label>
					<div class="col-sm-2">
						<select name="level" class="form-control" required>
							<option value="<?php echo $row ['level']; ?>"><?php echo $row ['level']; ?></option>
							<option value="admin">Admin</option>
							<option value="user">User</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">NIM</label>
					<div class="col-sm-2">
						<input type="text" name="nim" value="<?php echo $row ['nim']; ?>" class="form-control" placeholder="NIM" required>
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
					<label class="col-sm-3 control-label">Nilai</label>
					<div class="col-sm-2">
						<input type="text" name="nilai" value="<?php echo $row ['nilai']; ?>" class="form-control" placeholder="Dosen Pembimbing" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Jurusan</label>
					<div class="col-sm-2">
						<select name="jurusan" class="form-control" required>
							<option value="<?php echo $row['Skripsi']; ?>"> - Jurusan - </option>
							<option value="Teknik Informatika">Teknik informatika Regular</option>
							<option value="Teknik Informatika">Teknik INformatika Karyawan</option>
						</select>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="save" class="btn btn-sm btn-primary" value="Simpan" data-toggle="tooltip" title="Simpan Data Mahasiswa">
						<a href="data.php" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Batal">Batal</a>
					</div>
				</div>
			</form>
		</div> 
	</div> 
<?php 
include("footer.php"); 
?>