<?php
if (empty($_SESSION['id_user'])) {
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {

	if (isset($_REQUEST['submit'])) {

		$submit = $_REQUEST['submit'];
		$tgl1 = $_REQUEST['tgl1'];
		$tgl2 = $_REQUEST['tgl2'];

		$sql = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE tanggal BETWEEN '$tgl1' AND '$tgl2'");
		if (mysqli_num_rows($sql) > 0) {
			$no = 0;

			echo '

			<div class="page-container">
				<div class="main-content">
					<div class="section__content section__content--p30">
						<div class="container-fluid">

							<div class="row">
								<div class="col-md-12">
									<div class="overview-wrap">
										<h2 class="title-1">Rekap Laporan Penghasilan <small>' . $tgl1 . ' sampai ' . $tgl2 . '</small></h2><br></br>										
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-5 pull-right">
									<div >
										<a href="./admin.php?hlm=transaksi&aksi=baru" class="btn btn-success">Tambah Transaksi</a>
										<a href="?hlm=laporan" id="tombol" class="btn btn-info">Kembali</a>
										<a class="btn btn-warning" href="export_transaksi.php?tgl1=' . $tgl1 . '&tgl2=' . $tgl2 . '"> Cetak  </a>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-lg-12">
								<h2 class="title-1 m-b-25"></h2>
									<div class="table-responsive table--no-card m-b-40">
										<table class="table table-borderless table-striped table-earning">
									
											<thead>
												<tr class="info">
													<th width="5%">No</th>
													<th width="10%">No. Nota</th>
													<th width="20%">Nama Pelanggan</th>
													<th width="20%">Jenis</th>
													<th width="10%">Total Bayar</th>
													<th width="10%">Tanggal</th>
												</tr>
											</thead>
								
											<tbody>';

			while ($row = mysqli_fetch_array($sql)) {
				$no++;
				echo '

												<tr>
													<td>' . $no . '</td>
													<td>' . $row['no_nota'] . '</td>
													<td>' . $row['nama'] . '</td>
													<td>' . $row['jenis'] . '</td>
													<td>RP. ' . number_format($row['total']) . '</td>
													<td>' . date("d M Y", strtotime($row['tanggal'])) . '</td> <tr>';
			}
		}

		$sql = mysqli_query($koneksi, "SELECT count(nama), sum(total) FROM transaksi WHERE tanggal BETWEEN '$tgl1' AND '$tgl2'");

		list($nama, $total) = mysqli_fetch_array($sql);

		echo '
			<tfooter >
			<tr >
				<th colspan="3" class="text-center py-4" >Jumlah Pelanggan: ' . $nama . ' orang</th>
				<th colspan="3" class="text-center py-4">Jumlah Pendapatan: ' . $total . '</th>
			</tr>
			<tfooter>
											</tbody>
										</table>

										<div class="col-sm-12"><table class="table table-borderless table-striped table-earning">';
	} else {

		echo '

			<div class="page-container">
				<div class="main-content">
					<div class="section__content section__content--p30">
						<div class="container-fluid">
	
							<div class="row">
								<div class="col-md-12">
									<div class="overview-wrap">
										<h2 class="title-1">Rekap Laporan Penghasilan Hari Ini (<small>' . date('d-m-Y') . '</small>)</h2><hr>										
									</div>
								</div>
							</div>';

?>
		<div class="row m-t-25">
			<div class="col-md-6">
				<div class="well well-sm noprint">
					<form class="form-inline" role="form" method="post" action="">
						<div class="form-group">
							<label class="sr-only" for="tgl1">Mulai</label>
							<input type="date" class="form-control" id="tgl1" name="tgl1" required>
						</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<div class="form-group">
							<label class="sr-only" for="tgl2">Hingga</label>
							<input type="date" class="form-control" id="tgl2" name="tgl2" required>
						</div>
						<button type="submit" name="submit" class="btn btn-success mt-3">Tampilkan</button>
					</form>
				</div>
			</div>
		</div><br></br>
<?php



	}
}
?>