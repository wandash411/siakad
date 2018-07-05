<?php $thisPage="Data"; ?>
<?php $title = "Data Mahasiswa - Data Mahasiswa" ?>
<?php $description = "Data Mahasiswa - Data Mahasiswa" ?>
<?php 
include("header.php"); 
include("../koneksi.php"); 
?>
	<div class="container">
		<div class="content">
			<h2>Data Mahasiswa</h2>
			<hr />
			
			<?php
			if(isset($_GET['aksi']) == 'delete'){
				$nim = $_GET['nim'];
				$cek = mysqli_query($koneksi, "SELECT * FROM tbl_mahasiswa WHERE nim='$nim'");
				if(mysqli_num_rows($cek) == 0){
					echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data tidak ditemukan.</div>';
				}else{
					$delete = mysqli_query($koneksi, "DELETE FROM tbl_mahasiswa WHERE nim='$nim'");
					if($delete){
						echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data berhasil dihapus.</div>';
					}else{
						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data gagal dihapus.</div>';
					}
				}
			}
			?>
			<form class="form-inline" method="get">
				<div class="form-group">
					<select name="filter" class="form-control" onchange="form.submit()">
						<option value="0">Filter Data Mahasiswa</option>
						<?php $filter = (isset($_GET['filter']) ? strtolower($_GET['filter']) : NULL);  ?>
						<option value="Regular" <?php if($filter == 'Regular'){ echo 'selected'; } ?>>17.8A.33</option>
						<option value="Karyawan" <?php if($filter == 'Karyawan'){ echo 'selected'; } ?>>17.8B.33</option>
					</select>
				</div>
			</form>

			<br />
			<div class="table-responsive">
				<table class="table table-striped table-hover">
					<tr>
						<th>No</th>
						<th>NIM</th>
						<th>Nama</th>
						<th>Status Kelas</th>
						<th>No Telepon</th>
						<th>Nilai</th>
						<th>Jurusan</th>
						<th>Kelas</th>
					</tr>
					<?php

					if ($filter)
					{
						$sql = mysqli_query($koneksi, "SELECT * FROM tbl_mahasiswa WHERE kelas='$filter' ORDER BY nim ASC");
					}
					else
					{
						$sql = mysqli_query($koneksi, "SELECT * FROM tbl_mahasiswa ORDER BY nim ASC");
					}
					if(mysqli_num_rows($sql) == 0)
					{ 
						echo '<tr><td colspan="14">Data Tidak Ada.</td></tr>';
					}else
					{
						$no = 1;
						while($row = mysqli_fetch_assoc($sql))
						{
							echo '
							<tr>
								<td>'.$no.'</td>
								<td>'.$row['nim'].'</td>
								<td><a href="profile_mahasiswa.php?nim='.$row['nim'].'">'.$row['nama'].'</a></td>
								<td>'.$row['kelas'].'</td>
								<td>'.$row['no_telepon'].'</td>
								<td>'.$row['nilai'].'</td>
								<td>'.$row['jurusan'].'</td>
								<td>';
								if($row['kelas'] == 'Regular'){
									echo '<span class="label label-success">17.8A.33</span>';
								}
								else if ($row['kelas'] == 'Karyawan' ){
									echo '<span class="label label-success">17.8B.33</span>';
								}
								
								echo '
								</td>
								<td>
									
									<a href="edit_mahasiswa.php?nim='.$row['nim'].'" title="Edit Data" data-toggle="tooltip" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
									<a href="password.php?nim='.$row['nim'].'" title="Ganti Password" data-toggle="tooltip" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></a>
									<a href="data.php?aksi=delete&nim='.$row['nim'].'" title="Hapus Data" data-toggle="tooltip" onclick="return confirm(\'Anda yakin akan menghapus data '.$row['nama'].'?\')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
								</td>
							</tr>
							';
							$no++;
						}
					}

					?>
				</table>
			</div>
		</div>
	</div>
<?php 
include("footer.php");
?>