<?php

include './koneksi.php';


$id_transaksi = $_POST['id_transaksi'];
$jenis = $_POST['jenis'];
$nama = $_POST['nama'];
$bayar = $_POST['bayar'];
$kembali = $_POST['kembali'];
$total = $_POST['total'];
$id_user = $_POST['id_user'];


$sqll = mysqli_query($koneksi, "UPDATE transaksi SET jenis='$jenis', nama='$nama', bayar='$bayar', kembali='$kembali', total='$total', tanggal=NOW(), id_user='$id_user' WHERE id_transaksi='$id_transaksi'");


header('Location: ./admin.php?hlm=transaksi');
// if ($sqll == true) {
//     header('Location: ./admin.php?hlm=transaksi');
// } else {
//     echo 'ERROR! Periksa penulisan querynya.';
//     die;
// }
