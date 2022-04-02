<?php
include 'koneksi.php';

$tgl1 = $_GET['tgl1'];
$tgl2 = $_GET['tgl2'];

?>

<!doctype html>
<html lang="en">

<head>header("Content-type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename= Data_costumer.xls");
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <?php


    ?>

    <title>Harga Laundry</title>
</head>


<!--ini awal content-->
<h3>
    <p class="text-center mt-4">Data Masuk Minggu Ini</p>
</h3>

<center>
    <table class=" mt-4" width="1000px" border="1">
        <tr>
            <td>
                <center>id transaksi
            </td>
            <td>
                <center>no nota
            </td>
            <td>
                <center>jenis
            </td>
            <td>
                <center>nama
            </td>
            <td>
                <center>bayar
            </td>
            <td>
                <center>kembali
            </td>
            <td>
                <center>total
            </td>
            <td>
                <center>tanggal
            </td>

        </tr>

        <?php
        $query = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE tanggal BETWEEN '$tgl1' AND '$tgl2'");
        while ($row = mysqli_fetch_assoc($query)) {
        ?>
            <tr>
                <td>
                    <center><?php echo $row['id_transaksi'] ?>
                </td>
                <td>
                    <center><?php echo $row['no_nota'] ?>
                </td>

                <?php
                $que = mysqli_query($koneksi, "SELECT jenis FROM biaya WHERE biaya=" . $row['jenis'] . "");
                $d = mysqli_fetch_assoc($que)['jenis'];

                ?>
                <td>
                    <center><?php echo $d ?>
                </td>
                <td>
                    <center><?php echo $row['nama'] ?>
                </td>
                <td>
                    <center><?php echo $row['bayar'] ?>
                </td>
                <td>
                    <center><?php echo $row['kembali'] ?>
                </td>
                <td>
                    <center><?php echo $row['total'] ?>
                </td>
                <td>
                    <center>Rp.<?php echo $row['tanggal'] ?>
                </td>
            </tr>
        <?php
        }
        ?>






</html>