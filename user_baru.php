<?php
if (empty($_SESSION['id_user'])) {

	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {

	if (isset($_REQUEST['submit'])) {

		$username = $_REQUEST['username'];
		$password = MD5($_REQUEST['password']);
		$nama = $_REQUEST['nama'];
		$alamat = $_REQUEST['alamat'];
		$hp = $_REQUEST['hp'];
		$level = $_REQUEST['level'];
		// upload gambar
		$gambar = upload();
		if (!$gambar) {
			return false;
		}

		$sql = mysqli_query($koneksi, "INSERT INTO user(username, password, nama, alamat, hp, level, image) VALUES('$username', '$password', '$nama', '$alamat', '$hp', '$level','$gambar')");

		if ($sql == true) {
			header('Location: ./admin.php?hlm=user');
			die();
		} else {
			echo 'ERROR! Periksa penulisan querynya.';
		}
	} else {
?>
		<div class="page-wrapper">
			<div class="page-container">
				<div class="main-content">
					<div class="section__content section__content--p30">
						<div class="container-fluid">

							<div class="row">
								<div class="col-md-12">
									<div class="overview-wrap">
										<h2 class="title-1">Tambah User Baru</h2><br><br></br></br>
									</div>
								</div>
							</div>

							<div class="col-md-12">
								<div class="au-card chart-percent-card">
									<div class="au-card-inner">

										<form method="post" action="" class="form-horizontal" role="form" enctype="multipart/form-data">
											<div class="form-group">
												<label for="username" class="col-sm-6 control-label">Username</label>
												<div class="col-sm-6">
													<input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
												</div>
											</div>
											<div class="form-group">
												<label for="password" class="col-sm-6 control-label">Password</label>
												<div class="col-sm-6">
													<input type="password" class="form-control" id="username" name="password" placeholder="Password" required>
												</div>
											</div>
											<div class="form-group">
												<label for="nama" class="col-sm-6 control-label">Nama User</label>
												<div class="col-sm-6">
													<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama User" required>
												</div>
											</div>
											<div class="form-group">
												<label for="alamat" class="col-sm-6 control-label">Alamat</label>
												<div class="col-sm-6">
													<textarea class="form-control" name="alamat" rows="4" required></textarea>
												</div>
											</div>
											<div class="form-group">
												<label for="hp" class="col-sm-6 control-label">Nomor HP</label>
												<div class="col-sm-6">
													<input type="text" class="form-control" id="hp" name="hp" placeholder="Nomor HP" required>
												</div>
											</div>
											<div class="form-group">
												<label for="hp" class="col-sm-6 control-label">Foto</label>
												<div class="col-sm-6">
													<input type="file" class="form-control" id="hp" name="gambar" placeholder="Nomor HP" required>
												</div>
											</div>
											<div class="form-group">
												<label for="jenis" class="col-sm-6 control-label">Jenis User</label>
												<div class="col-sm-6">
													<select name="level" class="form-control" required>
														<option value="">--- Pilih Jenis User ---</option>
														<option value="2">User Biasa</option>
														<option value="1">Admin</option>
													</select>
												</div>
											</div>
											<div class="form-group">
												<div class="col-sm-offset-2 col-sm-10">
													<button type="submit" name="submit" class="btn btn-success">Simpan</button>
													<a href="./admin.php?hlm=user" class="btn btn-danger">Batal</a>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
<?php
	}
}

function upload()
{

	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name'];

	// cek apakah tidak ada gambar yang diupload
	if ($error === 4) {
		echo "<script>
				alert('pilih gambar terlebih dahulu!');
			  </script>";
		return false;
	}

	// cek apakah yang diupload adalah gambar
	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
		echo "<script>
				alert('yang anda upload bukan gambar!');
			  </script>";
		return false;
	}

	// cek jika ukurannya terlalu besar
	if ($ukuranFile > 1000000) {
		echo "<script>
				alert('ukuran gambar terlalu besar!');
			  </script>";
		return false;
	}

	// lolos pengecekan, gambar siap diupload
	// generate nama gambar baru
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;

	move_uploaded_file($tmpName, 'images/users/' . $namaFileBaru);

	return $namaFileBaru;
}
?>