<?php
session_start();
if (empty($_SESSION['id_user'])) {
    //session_destroy();
    $_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
    header('Location: ./');
    die();
} else {
    include "koneksi.php";
?>

    <!doctype html>
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <title>Hello, world!</title>
        <style>
            a {
                text-decoration: none;
            }
        </style>
        <!-- Fontfaces CSS-->
        <link href="css/font-face.css" rel="stylesheet" media="all">
        <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
        <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
        <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

        <!-- Bootstrap CSS-->
        <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
        <!-- Vendor CSS-->
        <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
        <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
        <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
        <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
        <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
        <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
        <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

        <!-- Main CSS-->
        <link href="css/theme.css" rel="stylesheet" media="all">


    </head>

    <body>
        <?php include "menu.php"; ?>
        <div class="page-wrapper">

            <?php
            if (isset($_REQUEST['hlm'])) {

                $hlm = $_REQUEST['hlm'];

                switch ($hlm) {
                    case 'transaksi':
                        include "transaksi.php";
                        break;
                    case 'laporan':
                        include "laporan.php";
                        break;
                    case 'user':
                        include "user.php";
                        break;
                    case 'biaya':
                        include "biaya.php";
                        break;
                    case 'cetak':
                        include "cetak_nota.php";
                        break;
                }
            } else {
            ?>

                <!-- PAGE CONTAINER-->
                <div class="page-container">
                    <!-- MAIN CONTENT-->
                    <div class="main-content">
                        <div class="section__content section__content--p30">
                            <div class="container-fluid">

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="overview-wrap">
                                            <h2>Selamat Datang di Aplikasi Jasa Cuci Juwita Nusantara</h2>
                                        </div>
                                    </div>
                                </div>

                                <div class="row m-t-25">
                                    <div class="col-md-12">
                                        <div class="overview-item overview-item--c4">
                                            <div class="overview__inner">
                                                <div class="overview-box clearfix">
                                                    <center>
                                                        <div class="icon">
                                                            <i class="zmdi zmdi-account-o"></i>
                                                        </div>
                                                        <div class="text">
                                                            <h2>Halo <strong><?php echo $_SESSION['nama']; ?></strong>, Anda login sebagai
                                                                <strong>
                                                                    <?php
                                                                    if ($_SESSION['level'] == 1) {
                                                                        echo 'Admin.';
                                                                    } else {
                                                                        echo 'Petugas Kasir.';
                                                                    }
                                                                    ?>
                                                                </strong>
                                                            </h2>
                                                        </div>
                                                    </center>
                                                </div>
                                                <div class="row m-t-40">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="copyright">
                                            <p>Copyright © <script type="text/javascript">
                                                    var AWTahun = new Date;
                                                    document.write(AWTahun.getFullYear());
                                                </script> Jasa Cuci Mobil & Motor Juwita Nusantara</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END MAIN CONTENT-->

                </div>
                <!-- END PAGE CONTAINER-->
        </div>


        <!-- Optional JavaScript; choose one of the two! -->


        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->

        <script src="vendor/slick/slick.min.js">
        </script>
        <script src="vendor/wow/wow.min.js"></script>
        <script src="vendor/animsition/animsition.min.js"></script>
        <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
        </script>
        <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
        <script src="vendor/counter-up/jquery.counterup.min.js">
        </script>
        <script src="vendor/circle-progress/circle-progress.min.js"></script>
        <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
        <script src="vendor/chartjs/Chart.bundle.min.js"></script>
        <script src="vendor/select2/select2.min.js">
        </script>

        <!-- Main JS-->
        <script src="js/main.js"></script>


    <?php
            }
    ?>


    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            const idJenis = document.getElementById('jenis')
            const idBiaya = document.getElementById('biaya')
            const idBayar = document.getElementById('bayar')
            const idKembali = document.getElementById('kembali')
            const idTotal = document.getElementById('total')

            idJenis.addEventListener('change', function(e) {
                idBiaya.value = e.target.value
            })

            idBayar.addEventListener('keyup', function(e) {
                const biaya = parseInt(idBiaya.value)
                const bayar = parseInt(e.target.value)

                idKembali.value = bayar - biaya
                idTotal.value = biaya;
            })

        });
    </script>


    </body>

    </html>
    <!-- end document-->
<?php
}
?>