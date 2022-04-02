<?php
if (empty($_SESSION['id_user'])) {

	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {

	$id_transaksi = $_REQUEST['id_transaksi'];

	$row = [];
	$sql = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE id_transaksi='$id_transaksi'");
	while ($rows = mysqli_fetch_assoc($sql)) {
		$row[] = $rows;
	}

	$dSelected = $row[0]['jenis'];
	$q = mysqli_query($koneksi, "SELECT * FROM biaya WHERE biaya='$dSelected'");
	$dSelectedJenis =	mysqli_fetch_row($q);
}

?>


<div class="page-wrapper">
	<div class="page-container">
		<div class="main-content">
			<div class="section__content section__content--p30">
				<div class="container-fluid">

					<div class="row">
						<div class="col-md-12">
							<div class="overview-wrap">
								<h2 class="title-1">Edit Data Transaksi</h2><br><br></br></br>
							</div>
						</div>
					</div>

					<div class="col-md-12">
						<div class="au-card chart-percent-card">
							<div class="au-card-inner">

								<form method="post" action="update_action.php" class="form-horizontal" role="form">
									<div class="form-group">
										<label for="no_nota" class="col-sm-4 control-label">No. Nota</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" id="no_nota" value="<?php echo $row[0]['no_nota']; ?>" name="no_nota" placeholder="No. Nota" readonly>
										</div>
									</div>
									<div class="form-group">
										<label for="jenis" class="col-sm-4 control-label">Jenis Kendaraan</label>
										<input type="hidden" name="id_user" value="<?php echo $_SESSION['id_user']; ?>">
										<input type="hidden" name="id_transaksi" value="<?php echo $row[0]['id_transaksi']; ?>">
										<div class="col-sm-6">
											<select name="jenis" class="form-control" required id="jenis">
												<?php
												if ($dSelectedJenis[2]) {
													echo "<option value='$dSelectedJenis[2]'>$dSelectedJenis[1]</option>";
												}
												$q = mysqli_query($koneksi, "SELECT * FROM biaya");
												while ($selectJenis = mysqli_fetch_row($q)) {
													echo "<option value='$selectJenis[2]' >$selectJenis[1]</option>";
												}
												?>

											</select>
										</div>
									</div>
									<div class="form-group">
										<label for="biaya" class="col-sm-4 control-label">Biaya</label>
										<div class="col-sm-6">
											<input type="number" class="form-control" id="biaya" name="biaya" value="<?= $dSelectedJenis[2]; ?>" required readonly>
										</div>
									</div>
									<div class="form-group">
										<label for="bayar" class="col-sm-4 control-label">Bayar</label>
										<div class="col-sm-6">
											<input type="number" class="form-control" id="bayar" name="bayar" value="<?php echo $row[0]['bayar']; ?>" placeholder="Isi dengan angka" required>
										</div>
									</div>
									<div class="form-group">
										<label for="kembali" class="col-sm-4 control-label">Kembalian</label>
										<div class="col-sm-6">
											<input type="number" class="form-control" id="kembali" name="kembali" value="<?php echo $row[0]['kembali']; ?>" placeholder="Kembalian" readonly required>
										</div>
									</div>
									<div class="form-group">
										<label for="total" class="col-sm-4 control-label">Total Bayar</label>
										<div class="col-sm-6">
											<input type="number" class="form-control" id="total" name="total" value="<?php echo $row[0]['total']; ?>" placeholder="Total Bayar" readonly required>
										</div>
									</div>
									<div class="form-group">
										<label for="nama" class="col-sm-4 control-label">Nama Pelanggan</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" id="nama" name="nama" value="<?php echo $row[0]['nama']; ?>" placeholder="Nama Pelanggan" required>
										</div>
									</div>
									<div class="form-group mt-3">
										<div class="col-sm-offset-2 col-sm-10">
											<button type="submit" name="submit" class="btn btn-success">Simpan</button>
											<a href="./admin.php?hlm=transaksi" class="btn btn-danger">Batal</a>
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