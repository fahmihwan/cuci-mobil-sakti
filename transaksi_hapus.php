<?php
if (empty($_SESSION['id_user'])) {

    $_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
    header('Location: ./');
    die();
} else {

    if (isset($_REQUEST['submit'])) {
        hapusTransaksi($_REQUEST['id_transaksi']);
    }
}


function hapusTransaksi($id_transaksi)
{
    global $koneksi;
    $sql = mysqli_query($koneksi, "DELETE FROM transaksi WHERE id_transaksi='$id_transaksi'");
    if ($sql == true) {
        echo "
        <script>
            window.location.href = './admin.php?hlm=transaksi';
        </script>
        ";
    }
}
